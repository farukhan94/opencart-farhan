<?php
class ControllerApiCustomerSegmentApi extends Controller
{
    public function registerToken()
    {
        $this->load->language('api/customer_segment_api');

        $json = array();

        if (!isset($this->session->data['api_id'])) {
            $json['error'] = $this->language->get('error_permission');
        } else {
            if (($this->request->server['REQUEST_METHOD'] == 'POST') && isset($this->request->post['token'])) {
                $customer_id = isset($this->request->post['customer_id']) ? (int) $this->request->post['customer_id'] : 0;
                $token = $this->request->post['token'];
                $device_type = isset($this->request->post['device_type']) ? $this->request->post['device_type'] : '';

                $this->db->query("DELETE FROM `" . DB_PREFIX . "customer_segment_fcm_token` WHERE token = '" . $this->db->escape($token) . "'");

                $this->db->query("INSERT INTO `" . DB_PREFIX . "customer_segment_fcm_token` SET 
					customer_id = '" . (int) $customer_id . "', 
					token = '" . $this->db->escape($token) . "', 
					device_type = '" . $this->db->escape($device_type) . "', 
					date_added = NOW()");

                $json['success'] = $this->language->get('text_success');
            } else {
                $json['error'] = $this->language->get('error_token');
            }
        }

        $this->response->addHeader('Content-Type: application/json');
        $this->response->setOutput(json_encode($json));
    }

    public function removeToken()
    {
        $json = array();

        if (($this->request->server['REQUEST_METHOD'] == 'POST') && isset($this->request->post['token'])) {
            $this->db->query("DELETE FROM `" . DB_PREFIX . "customer_segment_fcm_token` WHERE token = '" . $this->db->escape($this->request->post['token']) . "'");
            $json['success'] = true;
        }

        $this->response->addHeader('Content-Type: application/json');
        $this->response->setOutput(json_encode($json));
    }

    public function getPersonalization()
    {
        $json = array();

        if (!isset($this->session->data['api_id'])) {
            $json['error'] = 'Permission Denied';
        } else {
            $this->load->model('extension/module/customer_segment');

            // If customer_id is provided, resolve their group, otherwise use default
            if (isset($this->request->get['customer_id'])) {
                $customer_id = (int) $this->request->get['customer_id'];

                // Re-evaluate group for the customer to ensure they have the latest segment content
                require_once(DIR_SYSTEM . 'library/customer_segment/segmentation.php');
                $segmentation = new \CustomerSegment\Segmentation($this->registry);
                $this->load->model('extension/module/customer_segment');
                $customer_group_id = $segmentation->evaluate($customer_id);

                // Persist the change
                $this->model_extension_module_customer_segment->updateCustomerGroup($customer_id, $customer_group_id);
            } else {
                $customer_group_id = $this->config->get('config_customer_group_id');
            }

            $json['banners'] = $this->model_extension_module_customer_segment->getBanners($customer_group_id);
            $json['sliders'] = $this->model_extension_module_customer_segment->getSliders($customer_group_id);
            $json['promotions'] = $this->model_extension_module_customer_segment->getPromotions($customer_group_id);
        }

        $this->response->addHeader('Content-Type: application/json');
        $this->response->setOutput(json_encode($json));
    }
}
