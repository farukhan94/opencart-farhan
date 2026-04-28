<?php
class ControllerApiCustomerSegmentCron extends Controller
{
    public function index()
    {
        // Extremely simple cron endpoint that evaluates all customers.
        // Needs a secret key or API token validation in production.

        $this->load->model('extension/module/customer_segment');

        $query = $this->db->query("SELECT customer_id FROM `" . DB_PREFIX . "customer`");
        $count = 0;
        foreach ($query->rows as $row) {
            $this->model_extension_module_customer_segment->evaluateRulesForCustomer($row['customer_id']);
            $count++;
        }

        $this->log->write("CustomerSegment: API Cron Builder evaluated $count customers.");

        $this->response->addHeader('Content-Type: application/json');
        $this->response->setOutput(json_encode(array(
            'success' => true,
            'message' => "Successfully evaluated $count customers."
        )));
    }
}
