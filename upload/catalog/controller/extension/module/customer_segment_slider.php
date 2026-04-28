<?php
class ControllerExtensionModuleCustomerSegmentSlider extends Controller
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

        $this->document->addStyle('catalog/view/javascript/jquery/swiper/css/swiper.min.css');
        $this->document->addStyle('catalog/view/javascript/jquery/swiper/css/opencart.css');
        $this->document->addScript('catalog/view/javascript/jquery/swiper/js/swiper.jquery.js');

        $sliders = array();
        if (!empty($setting['target_id'])) {
            $slider = $this->model_extension_module_customer_segment->getSlider($setting['target_id'], $customer_group_id);
            if ($slider) {
                $sliders[] = $slider;
            }
        } else {
            $sliders = $this->model_extension_module_customer_segment->getSliders($customer_group_id);
        }

        if (!$sliders) {
            return '';
        }

        $data['sliders'] = $sliders;

        return $this->load->view('extension/module/customer_segment_slider', $data);
    }
}
