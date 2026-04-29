<?php
class ControllerExtensionModuleCustomerSegment extends Controller
{
    public function index()
    {
        if (!$this->config->get('module_customer_segment_status')) {
            return '';
        }

        $this->load->model('extension/module/customer_segment');
        $this->load->model('tool/image');
        $this->load->model('catalog/product');

        $customer_group_id = ($this->customer->isLogged()) ? $this->customer->getGroupId() : $this->config->get('config_customer_group_id');

        // Banners
        $banners = $this->model_extension_module_customer_segment->getBanners($customer_group_id);
        $data['banners'] = array();
        foreach ($banners as $banner) {
            if ($banner['image'] && is_file(DIR_IMAGE . $banner['image'])) {
                $image = $this->model_tool_image->resize($banner['image'], 1140, 380);
            } else {
                $image = '';
            }

            $data['banners'][] = array(
                'title' => $banner['title'],
                'link' => $banner['link'],
                'image' => $image
            );
        }

        // Sliders with product details
        $sliders = $this->model_extension_module_customer_segment->getSliders($customer_group_id);
        $data['sliders'] = array();
        foreach ($sliders as $slider) {
            $products = array();
            if ($slider['product_ids']) {
                $product_ids = explode(',', $slider['product_ids']);
                foreach ($product_ids as $product_id) {
                    $product_info = $this->model_catalog_product->getProduct($product_id);
                    if ($product_info) {
                        if ($product_info['image']) {
                            $image = $this->model_tool_image->resize($product_info['image'], 200, 200);
                        } else {
                            $image = $this->model_tool_image->resize('placeholder.png', 200, 200);
                        }

                        if ($this->customer->isLogged() || !$this->config->get('config_customer_price')) {
                            $price = $this->currency->format($this->tax->calculate($product_info['price'], $product_info['tax_class_id'], $this->config->get('config_tax')), $this->session->data['currency']);
                        } else {
                            $price = false;
                        }

                        $products[] = array(
                            'product_id'  => $product_info['product_id'],
                            'thumb'       => $image,
                            'name'        => $product_info['name'],
                            'description' => utf8_substr(strip_tags(html_entity_decode($product_info['description'], ENT_QUOTES, 'UTF-8')), 0, $this->config->get('theme_' . $this->config->get('config_theme') . '_product_description_length')) . '..',
                            'price'       => $price,
                            'href'        => $this->url->link('product/product', 'product_id=' . $product_info['product_id'])
                        );
                    }
                }
            }

            if ($products) {
                $data['sliders'][] = array(
                    'name'     => $slider['name'],
                    'products' => $products
                );
            }
        }

        return $this->load->view('extension/module/customer_segment', $data);
    }

    public function cron()
    {
        $this->log->write("CustomerSegment: CRON job started.");

        // Verify Secret Key
        $secret = $this->config->get('module_customer_segment_cron_key');
        if (!$secret || !isset($this->request->get['key']) || $this->request->get['key'] !== $secret) {
            $this->log->write("CustomerSegment Error: CRON attempted with invalid key.");
            $this->response->addHeader('HTTP/1.1 403 Forbidden');
            $this->response->setOutput('Access Denied');
            return;
        }

        $this->load->model('extension/module/customer_segment');
        $this->load->model('customer/customer');

        $customers = $this->model_customer_customer->getCustomers();

        require_once(DIR_SYSTEM . 'library/customer_segment/segmentation.php');
        $segmentation = new \CustomerSegment\Segmentation($this->registry);

        foreach ($customers as $customer) {
            $eval_result = $segmentation->evaluate($customer['customer_id']);
            $this->model_extension_module_customer_segment->updateCustomerGroup($customer['customer_id'], $eval_result['group_id'], $eval_result['rule_id']);
        }

        echo "CRON completed successfully.";
    }

    public function eventOrderComplete($route, $args, $output)
    {
        // Event hook for catalog/model/checkout/order/addOrderHistory/after
        if (isset($args[0])) {
            $order_id = $args[0];

            $this->load->model('checkout/order');
            $order_info = $this->model_checkout_order->getOrder($order_id);

            if ($order_info && $order_info['customer_id']) {
                $this->log->write("CustomerSegment: Order complete event triggered for customer " . $order_info['customer_id'] . " (Order ID: " . $order_id . ")");

                require_once(DIR_SYSTEM . 'library/customer_segment/segmentation.php');
                $segmentation = new \CustomerSegment\Segmentation($this->registry);

                $eval_result = $segmentation->evaluate($order_info['customer_id']);
                $new_group_id = $eval_result['group_id'];
                $rule_id = isset($eval_result['rule_id']) ? $eval_result['rule_id'] : 0;

                $old_group_id = isset($order_info['customer_group_id']) ? $order_info['customer_group_id'] : 0;

                if ($new_group_id != $old_group_id) {
                    $this->load->model('extension/module/customer_segment');
                    $this->model_extension_module_customer_segment->updateCustomerGroup($order_info['customer_id'], $new_group_id, $rule_id);
                    $this->log->write("CustomerSegment: Customer " . $order_info['customer_id'] . " group changed from " . $old_group_id . " to " . $new_group_id);
                }
            }
        }
    }

    public function eventFooterAfter(&$route, &$args, &$output)
    {
        if ($this->customer->isLogged() && $this->config->get('module_customer_segment_firebase_project_id')) {
            $project_id = $this->config->get('module_customer_segment_firebase_project_id');
            $sender_id = ''; // Not strictly required with new v9 SDK but helpful

            $js = "
            <script type='module'>
              import { initializeApp } from 'https://www.gstatic.com/firebasejs/9.22.1/firebase-app.js';
              import { getMessaging, getToken } from 'https://www.gstatic.com/firebasejs/9.22.1/firebase-messaging.js';
              const firebaseConfig = { projectId: '{$project_id}' };
              const app = initializeApp(firebaseConfig);
              const messaging = getMessaging(app);
              
              if ('Notification' in window && Notification.permission !== 'denied') {
                  Notification.requestPermission().then((permission) => {
                      if (permission === 'granted') {
                          getToken(messaging, {vapidKey: ''}).then((currentToken) => {
                            if (currentToken) {
                                $.post('index.php?route=extension/module/customer_segment/saveToken', { token: currentToken });
                            }
                          });
                      }
                  });
              }
            </script>";

            $output = str_replace('</body>', $js . '</body>', $output);
        }
    }

    public function saveToken()
    {
        if ($this->customer->isLogged() && isset($this->request->post['token'])) {
            $this->load->model('extension/module/customer_segment');
            $this->model_extension_module_customer_segment->addFCMToken($this->customer->getId(), $this->request->post['token']);
        }
    }

    /**
     * JSON API for mobile/front-end: returns segment-personalized content.
     * URL: index.php?route=extension/module/customer_segment/getPersonalized
     */
    public function getPersonalized()
    {
        $this->response->addHeader('Content-Type: application/json');

        $group_id = ($this->customer->isLogged()) ? (int)$this->customer->getGroupId() : (int)$this->config->get('config_customer_group_id');
        $this->load->model('extension/module/customer_segment');
        $this->load->model('tool/image');

        $banners = $this->model_extension_module_customer_segment->getBanners($group_id);
        $resolved_banners = array();
        foreach ($banners as $banner) {
            if ($banner['image'] && is_file(DIR_IMAGE . $banner['image'])) {
                $image = $this->model_tool_image->resize($banner['image'], 1140, 380);
            } else {
                $image = '';
            }
            $resolved_banners[] = array(
                'banner_id' => $banner['banner_id'],
                'title' => $banner['title'],
                'link' => $banner['link'],
                'image' => $image
            );
        }

        $data = array(
            'customer_group_id' => $group_id,
            'banners' => $resolved_banners,
            'sliders' => $this->model_extension_module_customer_segment->getSliders($group_id),
            'promotions' => $this->model_extension_module_customer_segment->getPromotions($group_id),
            'combos' => $this->model_extension_module_customer_segment->getCombosForGroups(array($group_id))
        );

        $this->response->setOutput(json_encode($data));
    }

    // ----------------------------------------------------------------
    // RESTRICTION ENFORCEMENT HOOKS
    // ----------------------------------------------------------------
    
    public function eventCheckProduct(&$route, &$args, &$output)
    {
        if (!$this->config->get('module_customer_segment_status')) return;
        
        $this->load->model('extension/module/customer_segment');
        $restrictions = $this->model_extension_module_customer_segment->getRestrictedItems();
        
        if (empty($restrictions['product'])) return;

        $customer_group_id = ($this->customer->isLogged()) ? (int)$this->customer->getGroupId() : (int)$this->config->get('config_customer_group_id');

        // getProduct hook
        if ($route == 'catalog/model/catalog/product/getProduct/after' && !empty($output)) {
            $product_id = (int)$output['product_id'];
            if (isset($restrictions['product'][$product_id])) {
                if (!in_array($customer_group_id, $restrictions['product'][$product_id])) {
                    $output = false; // Hide product
                }
            }
        }

        // getProducts hook (usually returns array of products)
        if ($route == 'catalog/model/catalog/product/getProducts/after' && is_array($output)) {
            foreach ($output as $key => $product) {
                $product_id = (int)$product['product_id'];
                if (isset($restrictions['product'][$product_id])) {
                    if (!in_array($customer_group_id, $restrictions['product'][$product_id])) {
                        unset($output[$key]);
                    }
                }
            }
            $output = array_values($output);
        }
    }

    public function eventCheckCategory(&$route, &$args, &$output)
    {
        if (!$this->config->get('module_customer_segment_status')) return;

        $this->load->model('extension/module/customer_segment');
        $restrictions = $this->model_extension_module_customer_segment->getRestrictedItems();
        
        if (empty($restrictions['category'])) return;

        $customer_group_id = ($this->customer->isLogged()) ? (int)$this->customer->getGroupId() : (int)$this->config->get('config_customer_group_id');

        // getCategory hook
        if ($route == 'catalog/model/catalog/category/getCategory/after' && !empty($output)) {
            $category_id = (int)$output['category_id'];
            if (isset($restrictions['category'][$category_id])) {
                if (!in_array($customer_group_id, $restrictions['category'][$category_id])) {
                    $output = false; // Hide category
                }
            }
        }

        // getCategories hook
        if ($route == 'catalog/model/catalog/category/getCategories/after' && is_array($output)) {
            foreach ($output as $key => $category) {
                $category_id = (int)$category['category_id'];
                if (isset($restrictions['category'][$category_id])) {
                    if (!in_array($customer_group_id, $restrictions['category'][$category_id])) {
                        unset($output[$key]);
                    }
                }
            }
            $output = array_values($output);
        }
    }
}


