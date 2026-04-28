<?php
class ControllerExtensionModuleCustomerSegmentPromo extends Controller
{
    public function index($setting)
    {
        if (!isset($setting['status']) || !$setting['status']) {
            return '';
        }

        $this->load->model('extension/module/customer_segment');

        $customer_group_id = (int) $this->customer->getGroupId();
        if (!$customer_group_id) {
            $customer_group_id = (int) $this->config->get('config_customer_group_id');
        }

        $promotions = array();
        if (!empty($setting['target_id'])) {
            $promo = $this->model_extension_module_customer_segment->getPromotion($setting['target_id'], $customer_group_id);
            if ($promo) {
                $promotions[] = $promo;
            }
        } else {
            $promotions = $this->model_extension_module_customer_segment->getPromotions($customer_group_id);
        }

        if (!$promotions) {
            return '';
        }

        $data['promotions'] = $promotions;

        return $this->load->view('extension/module/customer_segment_promo', $data);
    }
}
