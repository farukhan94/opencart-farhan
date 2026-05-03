<?php
class ControllerExtensionModuleCustomerSegmentBanner extends Controller
{
    public function index($setting)
    {
        if (!isset($setting['status']) || !$setting['status']) {
            return '';
        }

        $this->load->model('extension/module/customer_segment');
        $this->load->model('tool/image');

        $this->document->addStyle('catalog/view/javascript/jquery/swiper/css/swiper.min.css');
        $this->document->addStyle('catalog/view/javascript/jquery/swiper/css/opencart.css');
        $this->document->addScript('catalog/view/javascript/jquery/swiper/js/swiper.jquery.js');

        $customer_group_id = (int) $this->customer->getGroupId();
        if (!$customer_group_id) {
            $customer_group_id = (int) $this->config->get('config_customer_group_id');
        }

        $banners = array();
        if (!empty($setting['target_id'])) {
            $promotion = $this->model_extension_module_customer_segment->getBanner($setting['target_id'], $customer_group_id);
            if ($promotion && !empty($promotion['banner_data'])) {
                $bdata = json_decode($promotion['banner_data'], true);
                if (is_array($bdata)) {
                    foreach ($bdata as $b) {
                        $banners[] = array(
                            'title' => $promotion['title'],
                            'link'  => isset($b['link']) ? $b['link'] : '',
                            'image' => isset($b['image']) ? $b['image'] : ''
                        );
                    }
                }
            }
        } else {
            $banners = $this->model_extension_module_customer_segment->getBanners($customer_group_id);
        }

        if (!$banners) {
            return '';
        }

        $data['banners'] = array();
        foreach ($banners as $banner) {
            if ($banner['image'] && is_file(DIR_IMAGE . $banner['image'])) {
                $image = $this->model_tool_image->resize($banner['image'], 1140, 380);
            } else {
                $image = $this->model_tool_image->resize('no_image.png', 1140, 380);
            }

            $data['banners'][] = array(
                'title' => $banner['title'],
                'link' => $banner['link'],
                'image' => $image
            );
        }

        return $this->load->view('extension/module/customer_segment_banner', $data);
    }
}
