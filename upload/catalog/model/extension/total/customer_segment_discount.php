<?php
class ModelExtensionTotalCustomerSegmentDiscount extends Model {
	public function getTotal($total) {
		if (!$this->config->get('total_customer_segment_discount_status')) {
			return;
		}

		$this->load->model('extension/module/customer_segment');
		$this->load->model('account/customer');

		$customer_group_id = ($this->customer->isLogged()) ? (int)$this->customer->getGroupId() : (int)$this->config->get('config_customer_group_id');
		$cart_products = $this->cart->getProducts();

		// We pass array of group IDs (could be multiple if we support multi-assignment later, for now just one)
		$best_discount = $this->model_extension_module_customer_segment->getBestCartDiscount(array($customer_group_id), $cart_products);

		if ($best_discount && $best_discount['value'] > 0) {
			$amount = 0;
			if ($best_discount['type'] == 'percent') {
				$amount = ($total['total'] * $best_discount['value']) / 100;
			} else {
				$amount = $best_discount['value'];
			}
			if ($amount > 0) {
				$total['totals'][] = array(
					'code'       => 'customer_segment_discount',
					'title'      => $best_discount['title'],
					'value'      => -$amount,
					'sort_order' => (int)$this->config->get('total_customer_segment_discount_sort_order')
				);

				$total['total'] -= $amount;
			}
		}
	}
}
