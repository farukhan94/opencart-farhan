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

        $customer_group_id = (int) $this->customer->getGroupId();
        if (!$customer_group_id) {
            $customer_group_id = (int) $this->config->get('config_customer_group_id');
        }

        $banners = array();
        if (!empty($setting['target_id'])) {
            $banner = $this->model_extension_module_customer_segment->getBanner($setting['target_id'], $customer_group_id);
            if ($banner) {
                $banners[] = $banner;
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
