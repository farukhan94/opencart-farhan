<?php
class ControllerExtensionModuleCustomerSegmentCombo extends Controller
{
    public function index($setting)
    {
        if (!isset($setting['status']) || !$setting['status']) {
            return '';
        }

        $this->load->model('extension/module/customer_segment');

        $customer_group_id = (int)$this->customer->getGroupId();
        if (!$customer_group_id) {
            $customer_group_id = (int)$this->config->get('config_customer_group_id');
        }

        $this->document->addStyle('catalog/view/javascript/jquery/swiper/css/swiper.min.css');
        $this->document->addStyle('catalog/view/javascript/jquery/swiper/css/opencart.css');
        $this->document->addScript('catalog/view/javascript/jquery/swiper/js/swiper.jquery.js');

        $target_id = !empty($setting['target_id']) ? (int)$setting['target_id'] : 0;
        $combos = $this->model_extension_module_customer_segment->getComboOffers(array($customer_group_id), $target_id);

        if (!$combos) {
            return '';
        }

        static $module = 0;
        $data['module'] = $module++;
        $data['combos'] = $combos;

        return $this->load->view('extension/module/customer_segment_combo', $data);
    }
}
