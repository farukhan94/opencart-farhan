<?php
class ControllerExtensionModuleCustomerSegment extends Controller
{
    private $error = array();

    public function index()
    {
        $this->load->language('extension/module/customer_segment');

        $this->document->setTitle($this->language->get('heading_title'));

        $this->load->model('setting/setting');
        $this->load->model('extension/module/customer_segment');

        // Automatically ensure latest schema structure without requiring manual repair
        $this->model_extension_module_customer_segment->install();

        if (($this->request->server['REQUEST_METHOD'] == 'POST') && $this->validate()) {
            $this->model_setting_setting->editSetting('module_customer_segment', $this->request->post);

            $status_val = isset($this->request->post['module_customer_segment_status']) ? $this->request->post['module_customer_segment_status'] : '0';
            $status_text = ($status_val == '1') ? 'Enabled' : 'Disabled';
            $this->log->write("CustomerSegment: Module settings saved. Status: " . $status_text . " by user " . $this->user->getId());

            $this->session->data['success'] = $this->language->get('text_success');

            $this->response->redirect($this->url->link('marketplace/extension', 'user_token=' . $this->session->data['user_token'] . '&type=module', true));
        }

        if (isset($this->error['warning'])) {
            $data['error_warning'] = $this->error['warning'];
        } else {
            $data['error_warning'] = '';
        }

        $data['breadcrumbs'] = array();

        $data['breadcrumbs'][] = array(
            'text' => $this->language->get('text_home'),
            'href' => $this->url->link('common/dashboard', 'user_token=' . $this->session->data['user_token'], true)
        );

        $data['breadcrumbs'][] = array(
            'text' => $this->language->get('text_extension'),
            'href' => $this->url->link('marketplace/extension', 'user_token=' . $this->session->data['user_token'] . '&type=module', true)
        );

        $data['breadcrumbs'][] = array(
            'text' => $this->language->get('heading_title'),
            'href' => $this->url->link('extension/module/customer_segment', 'user_token=' . $this->session->data['user_token'], true)
        );

        $data['action'] = $this->url->link('extension/module/customer_segment', 'user_token=' . $this->session->data['user_token'], true);
        $data['cancel'] = $this->url->link('marketplace/extension', 'user_token=' . $this->session->data['user_token'] . '&type=module', true);

        if (isset($this->request->post['module_customer_segment_status'])) {
            $data['module_customer_segment_status'] = $this->request->post['module_customer_segment_status'];
        } else {
            $data['module_customer_segment_status'] = $this->config->get('module_customer_segment_status');
        }

        if (isset($this->request->post['module_customer_segment_firebase_json'])) {
            $data['module_customer_segment_firebase_json'] = $this->request->post['module_customer_segment_firebase_json'];
        } else {
            $data['module_customer_segment_firebase_json'] = $this->config->get('module_customer_segment_firebase_json');
        }

        if (isset($this->request->post['module_customer_segment_firebase_project_id'])) {
            $data['module_customer_segment_firebase_project_id'] = $this->request->post['module_customer_segment_firebase_project_id'];
        } else {
            $data['module_customer_segment_firebase_project_id'] = $this->config->get('module_customer_segment_firebase_project_id');
        }

        // Customer Groups
        $this->load->model('customer/customer_group');
        $data['customer_groups'] = $this->model_customer_customer_group->getCustomerGroups();

        $data['user_token'] = $this->session->data['user_token'];

        // Logs
        $data['user_token'] = $this->session->data['user_token'];

        // Analytics
        $data['analytics'] = array();
        $query = $this->db->query("SELECT cg.name, COUNT(c.customer_id) as total FROM " . DB_PREFIX . "customer c JOIN " . DB_PREFIX . "customer_group_description cg ON (c.customer_group_id = cg.customer_group_id) WHERE cg.language_id = '" . (int) $this->config->get('config_language_id') . "' GROUP BY c.customer_group_id");
        $data['analytics'] = $query->rows;

        // Health Check
        $query = $this->db->query("SELECT * FROM " . DB_PREFIX . "event WHERE `code` = 'module_customer_segment' LIMIT 1");
        $data['event_status'] = $query->num_rows ? true : false;
        $data['repair'] = $this->url->link('extension/module/customer_segment/repair', 'user_token=' . $this->session->data['user_token'], true);

        // Cron settings
        $data['module_customer_segment_cron_key'] = $this->config->get('module_customer_segment_cron_key');
        $data['module_customer_segment_cron_interval'] = $this->config->get('module_customer_segment_cron_interval') ? $this->config->get('module_customer_segment_cron_interval') : 'daily';
        $data['module_customer_segment_reset_day'] = $this->config->get('module_customer_segment_reset_day') ? (int) $this->config->get('module_customer_segment_reset_day') : 1;
        $data['store_url'] = HTTPS_SERVER;

        $this->load->model('tool/image');
        $data['placeholder'] = $this->model_tool_image->resize('no_image.png', 100, 100);

        $data['header'] = $this->load->controller('common/header');
        $data['column_left'] = $this->load->controller('common/column_left');
        $data['footer'] = $this->load->controller('common/footer');

        $this->response->setOutput($this->load->view('extension/module/customer_segment', $data));
    }

    protected function validate()
    {
        if (!$this->user->hasPermission('modify', 'extension/module/customer_segment')) {
            $this->error['warning'] = $this->language->get('error_permission');
        }

        return !$this->error;
    }

    public function install()
    {
        $this->load->model('extension/module/customer_segment');
        $this->model_extension_module_customer_segment->install();
    }

    public function uninstall()
    {
        $this->load->model('extension/module/customer_segment');
        $this->model_extension_module_customer_segment->uninstall();
    }

    // AJAX methods for rule management would go here
    public function verifyFirebase()
    {
        $this->load->language('extension/module/customer_segment');
        $json = array();

        if (!$this->user->hasPermission('modify', 'extension/module/customer_segment')) {
            $json['error'] = $this->language->get('error_permission');
        } else if (empty($this->request->post['firebase_json'])) {
            $json['error'] = 'JSON is empty';
        } else {
            $this->load->model('setting/setting');

            require_once(DIR_SYSTEM . 'library/customer_segment/firebase.php');
            $firebase = new \CustomerSegment\Firebase($this->request->post['firebase_json'], $this->registry);

            $result = $firebase->verifyConnection();

            if ($result['success']) {
                // Get current settings first to avoid overwriting other values
                $settings = $this->model_setting_setting->getSetting('module_customer_segment');

                $settings['module_customer_segment_firebase_json'] = $this->request->post['firebase_json'];
                $settings['module_customer_segment_firebase_project_id'] = $result['project_id'];

                $this->model_setting_setting->editSetting('module_customer_segment', $settings);

                $json['success'] = $this->language->get('text_success_firebase');
                $json['project_id'] = $result['project_id'];
                $json['html'] = sprintf($this->language->get('text_firebase_connected'), $result['project_id']);

                $this->log->write("CustomerSegment: Firebase connected by admin " . $this->user->getId());
            } else {
                $json['error'] = (isset($result['error'])) ? $result['error'] : $this->language->get('text_error_firebase');
            }
        }

        $this->response->addHeader('Content-Type: application/json');
        $this->response->setOutput(json_encode($json));
    }

    public function disconnectFirebase()
    {
        $this->load->language('extension/module/customer_segment');
        $json = array();

        if (!$this->user->hasPermission('modify', 'extension/module/customer_segment')) {
            $json['error'] = $this->language->get('error_permission');
        } else {
            $this->load->model('setting/setting');

            $settings = $this->model_setting_setting->getSetting('module_customer_segment');

            $settings['module_customer_segment_firebase_json'] = '';
            $settings['module_customer_segment_firebase_project_id'] = '';

            $this->model_setting_setting->editSetting('module_customer_segment', $settings);

            $json['success'] = "Disconnected";
            $this->log->write("CustomerSegment: Firebase disconnected by admin " . $this->user->getId());
        }

        $this->response->addHeader('Content-Type: application/json');
        $this->response->setOutput(json_encode($json));
    }

    public function getRules()
    {
        $this->load->model('extension/module/customer_segment');

        $results = $this->model_extension_module_customer_segment->getRules();

        $json = array();
        foreach ($results as $result) {
            $json[] = array(
                'rule_id' => $result['rule_id'],
                'name' => $result['name'],
                'status' => $result['status'] ? $this->language->get('text_enabled') : $this->language->get('text_disabled'),
                'priority' => $result['priority']
            );
        }

        $this->response->addHeader('Content-Type: application/json');
        $this->response->setOutput(json_encode($json));
    }

    public function getRule()
    {
        $this->load->model('extension/module/customer_segment');

        $json = array();
        if (isset($this->request->get['rule_id'])) {
            $json = $this->model_extension_module_customer_segment->getRule($this->request->get['rule_id']);
        }

        $this->response->addHeader('Content-Type: application/json');
        $this->response->setOutput(json_encode($json));
    }

    public function saveRule()
    {
        $this->load->language('extension/module/customer_segment');
        $json = array();

        if (!$this->user->hasPermission('modify', 'extension/module/customer_segment')) {
            $json['error'] = $this->language->get('error_permission');
        } else if (empty($this->request->post['name'])) {
            $json['error'] = $this->language->get('error_name');
        } else {
            $this->load->model('extension/module/customer_segment');

            if (isset($this->request->post['rule_id']) && $this->request->post['rule_id']) {
                $this->model_extension_module_customer_segment->editRule($this->request->post['rule_id'], $this->request->post);
                $this->log->write("CustomerSegment: Rule updated: " . $this->request->post['name'] . " (ID: " . $this->request->post['rule_id'] . ")");
            } else {
                $rule_id = $this->model_extension_module_customer_segment->addRule($this->request->post);
                $this->log->write("CustomerSegment: New rule created: " . $this->request->post['name'] . " (ID: " . $rule_id . ")");
            }

            $json['success'] = $this->language->get('text_success');
        }

        $this->response->addHeader('Content-Type: application/json');
        $this->response->setOutput(json_encode($json));
    }

    public function deleteRule()
    {
        $json = array();

        if (!$this->user->hasPermission('modify', 'extension/module/customer_segment')) {
            $json['error'] = 'Permission Denied';
        } else if (isset($this->request->get['rule_id'])) {
            $this->load->model('extension/module/customer_segment');
            $this->model_extension_module_customer_segment->deleteRule($this->request->get['rule_id']);
            $this->log->write("CustomerSegment: Rule deleted (ID: " . $this->request->get['rule_id'] . ")");
            $json['success'] = true;
        }

        $this->response->addHeader('Content-Type: application/json');
        $this->response->setOutput(json_encode($json));
    }

    public function testRule()
    {
        $this->load->language('extension/module/customer_segment');
        $json = array();

        if (isset($this->request->post['rule_id']) && isset($this->request->post['customer_id'])) {
            require_once(DIR_SYSTEM . 'library/customer_segment/segmentation.php');
            $segmentation = new \CustomerSegment\Segmentation($this->registry);

            $result = $segmentation->evaluate($this->request->post['customer_id'], $this->request->post['rule_id']);

            if (isset($result['error'])) {
                $json['error'] = $result['error'];
            } else {
                $json['match'] = $result['match'];
                $json['trace'] = $result['trace'];
            }
        } else {
            $json['error'] = 'Missing rule_id or customer_id';
        }

        $this->response->addHeader('Content-Type: application/json');
        $this->response->setOutput(json_encode($json));
    }

    public function bulkRebuild()
    {
        $this->load->language('extension/module/customer_segment');
        $json = array();

        if (!$this->user->hasPermission('modify', 'extension/module/customer_segment')) {
            $json['error'] = $this->language->get('error_permission');
        } else {
            $this->load->model('extension/module/customer_segment');

            $start = isset($this->request->get['start']) ? (int) $this->request->get['start'] : 0;
            $limit = 50;

            $query = $this->db->query("SELECT customer_id FROM `" . DB_PREFIX . "customer` LIMIT " . $start . "," . $limit);
            $count = 0;
            foreach ($query->rows as $row) {
                $this->model_extension_module_customer_segment->evaluateRulesForCustomer($row['customer_id']);
                $count++;
            }

            if ($count < $limit) {
                $json['success'] = "Rebuild complete. Evaluated all customers.";
                $json['done'] = true;
                $this->log->write("CustomerSegment: Admin triggered Bulk Rebuild. Completed total " . ($start + $count) . " customers.");
            } else {
                $json['success'] = "Evaluating... (" . ($start + $count) . " customers processed)";
                $json['next'] = $start + $limit;
            }
        }

        $this->response->addHeader('Content-Type: application/json');
        $this->response->setOutput(json_encode($json));
    }

    public function getDynamicLogs()
    {
        $this->load->model('extension/module/customer_segment');
        $this->load->language('extension/module/customer_segment');

        $filter_customer_id = isset($this->request->get['filter_customer_id']) ? $this->request->get['filter_customer_id'] : '';
        $filter_new_group_id = isset($this->request->get['filter_new_group_id']) ? $this->request->get['filter_new_group_id'] : '';
        $page = isset($this->request->get['page']) ? (int) $this->request->get['page'] : 1;
        $limit = 20;

        $filter_data = array(
            'filter_customer_id' => $filter_customer_id,
            'filter_new_group_id' => $filter_new_group_id,
            'start' => ($page - 1) * $limit,
            'limit' => $limit
        );

        $results = $this->model_extension_module_customer_segment->getLogs($filter_data);

        $json = array();
        foreach ($results as $result) {
            $json['logs'][] = array(
                'log_id' => $result['log_id'],
                'customer' => $result['firstname'] . ' ' . $result['lastname'] . ' (#' . $result['customer_id'] . ')',
                'old_group' => $result['old_group'] ? $result['old_group'] : 'Default',
                'new_group' => $result['new_group'] ? $result['new_group'] : 'Default',
                'rule_id' => $result['rule_id'],
                'date_added' => date($this->language->get('datetime_format'), strtotime($result['date_added']))
            );
        }
        $json['total'] = $this->model_extension_module_customer_segment->getTotalLogs($filter_data);
        $json['page'] = $page;

        $this->response->addHeader('Content-Type: application/json');
        $this->response->setOutput(json_encode($json));
    }

    public function getManuals()
    {
        $this->load->model('extension/module/customer_segment');
        $this->load->language('extension/module/customer_segment');

        $results = $this->model_extension_module_customer_segment->getManuals();

        $json = array();
        foreach ($results as $result) {
            $json[] = array(
                'customer_id' => $result['customer_id'],
                'customer_name' => $result['firstname'] . ' ' . $result['lastname'],
                'group_name' => $result['customer_group'],
                'date_added' => date($this->language->get('date_format_short'), strtotime($result['date_added']))
            );
        }

        $this->response->addHeader('Content-Type: application/json');
        $this->response->setOutput(json_encode($json));
    }

    public function addManual()
    {
        $this->load->language('extension/module/customer_segment');
        $json = array();

        if (!$this->user->hasPermission('modify', 'extension/module/customer_segment')) {
            $json['error'] = $this->language->get('error_permission');
        } else if (empty($this->request->post['customer_id']) || empty($this->request->post['customer_group_id'])) {
            $json['error'] = 'Invalid selection';
        } else {
            $this->load->model('extension/module/customer_segment');

            $this->model_extension_module_customer_segment->addManual($this->request->post['customer_id'], $this->request->post['customer_group_id']);

            // Also reassign them immediately
            $this->model_extension_module_customer_segment->reassignCustomerGroup($this->request->post['customer_id'], $this->request->post['customer_group_id'], 0);

            $this->log->write("CustomerSegment: Manual segment assigned to Customer ID " . $this->request->post['customer_id']);

            $json['success'] = $this->language->get('text_success');
        }

        $this->response->addHeader('Content-Type: application/json');
        $this->response->setOutput(json_encode($json));
    }

    public function deleteManual()
    {
        $json = array();

        if (!$this->user->hasPermission('modify', 'extension/module/customer_segment')) {
            $json['error'] = 'Permission Denied';
        } else if (isset($this->request->get['customer_id'])) {
            $this->load->model('extension/module/customer_segment');
            $this->model_extension_module_customer_segment->deleteManual($this->request->get['customer_id']);
            $this->log->write("CustomerSegment: Manual segment removed for Customer ID " . $this->request->get['customer_id']);
            $json['success'] = true;
        }

        $this->response->addHeader('Content-Type: application/json');
        $this->response->setOutput(json_encode($json));
    }

    public function autocomplete()
    {
        $json = array();

        if (isset($this->request->get['filter_name'])) {
            $this->load->model('customer/customer');

            $filter_data = array(
                'filter_name' => $this->request->get['filter_name'],
                'start' => 0,
                'limit' => 5
            );

            $results = $this->model_customer_customer->getCustomers($filter_data);

            foreach ($results as $result) {
                $json[] = array(
                    'customer_id' => $result['customer_id'],
                    'customer_group_id' => $result['customer_group_id'],
                    'name' => strip_tags(html_entity_decode($result['name'], ENT_QUOTES, 'UTF-8')),
                );
            }
        }

        $this->response->addHeader('Content-Type: application/json');
        $this->response->setOutput(json_encode($json));
    }

    public function openTestingApp()
    {
        if (!$this->user->hasPermission('modify', 'extension/module/customer_segment')) {
            die('Permission Denied');
        }

        $customer_id = isset($this->request->post['customer_id']) ? (int) $this->request->post['customer_id'] : 0;
        $firebase_config = isset($this->request->post['firebase_config']) ? html_entity_decode($this->request->post['firebase_config'], ENT_QUOTES, 'UTF-8') : '';
        $vapid_key = isset($this->request->post['vapid_key']) ? html_entity_decode($this->request->post['vapid_key'], ENT_QUOTES, 'UTF-8') : '';
        $user_token = $this->session->data['user_token'];

        $html = '<!DOCTYPE html>
<html>
<head>
    <title>Firebase Testing App</title>
    <!-- Use Firebase v8 compat for standalone test app -->
    <script src="https://www.gstatic.com/firebasejs/8.10.1/firebase-app.js"></script>
    <script src="https://www.gstatic.com/firebasejs/8.10.1/firebase-messaging.js"></script>
    <style>
        body { font-family: sans-serif; padding: 20px; background: #f0f2f5; }
        .log { background: #1e1e1e; color: #00ff00; padding: 15px; border-radius: 5px; height: 350px; overflow-y: scroll; font-family: monospace; white-space: pre-wrap; font-size: 13px; margin-top: 15px; }
        .card { background: white; border: 1px solid #ddd; padding: 25px; border-radius: 8px; max-width: 700px; margin: 0 auto; box-shadow: 0 4px 6px rgba(0,0,0,0.1); }
        h2 { margin-top: 0; color: #333; }
        .btn { padding: 12px 20px; background: #007bff; color: white; border: none; border-radius: 4px; cursor: pointer; font-size: 16px; width: 100%; transition: 0.2s; }
        .btn:hover { background: #0056b3; }
    </style>
</head>
<body>
    <div class="card">
        <h2>Push Notification Tester</h2>
        <p style="color:#666; margin-bottom: 20px;">Testing for Customer ID: <strong style="color:#333;">' . $customer_id . '</strong></p>
        <button id="btn-request" class="btn">Request Permission & Get Token</button>
        <div id="logs" class="log">Waiting for action...</div>
    </div>
    
    <script>
        function log(msg) {
            const el = document.getElementById("logs");
            el.innerHTML += "\n" + msg;
            el.scrollTop = el.scrollHeight;
        }

        try {
            // User provided config snippet
            ' . $firebase_config . '
            
            const vapidKey = "' . trim($vapid_key) . '";
            const customerId = "' . $customer_id . '";
            const userToken = "' . $user_token . '";

            firebase.initializeApp(firebaseConfig);
            const messaging = firebase.messaging();

            messaging.onMessage((payload) => {
                log("-------------------");
                log("Message received in foreground: \n" + JSON.stringify(payload, null, 2));
                log("-------------------");
                if (Notification.permission === "granted") {
                    new Notification(payload.notification.title, { body: payload.notification.body });
                }
            });

            // Listen for background tab messages from the service worker
            const channel = new BroadcastChannel("fcm_test_channel");
            channel.onmessage = (event) => {
                log("-------------------");
                log("Message received in BACKGROUND tab (via SW): \n" + JSON.stringify(event.data, null, 2));
                log("-------------------");
            };

            document.getElementById("btn-request").addEventListener("click", async () => {
                document.getElementById("btn-request").disabled = true;
                log("Requesting notification permission...");
                const permission = await Notification.requestPermission();
                if (permission === "granted") {
                    log("Notification permission granted.");
                    
                    try {
                        log("Clearing old service workers...");
                        const regs = await navigator.serviceWorker.getRegistrations();
                        for(let reg of regs) {
                            await reg.unregister();
                        }

                        log("Registering service worker with dynamic config...");
                        const swUrl = "/firebase-messaging-sw.js?config=" + encodeURIComponent(JSON.stringify(firebaseConfig));
                        const registration = await navigator.serviceWorker.register(swUrl);
                        await navigator.serviceWorker.ready;
                        
                        log("Fetching FCM token (this might take a few seconds)...");
                        const currentToken = await messaging.getToken({ 
                            vapidKey: vapidKey,
                            serviceWorkerRegistration: registration
                        });
                        
                        if (currentToken) {
                            log("FCM Token received successfully!");
                            log("Sending token to backend...");
                            
                            const formData = new FormData();
                            formData.append("customer_id", customerId);
                            formData.append("token", currentToken);
                            
                            fetch("index.php?route=extension/module/customer_segment/saveFcmToken&user_token=" + userToken, {
                                method: "POST",
                                body: formData
                            }).then(res => res.json()).then(data => {
                                if(data.success) {
                                    log("SUCCESS: Token registered in backend for customer " + customerId);
                                    log("You can now trigger push notifications for this customer from the segmentation rules!");
                                } else {
                                    log("Error registering token: " + data.error);
                                }
                            }).catch(err => {
                                log("Fetch error: " + err.message);
                            });

                        } else {
                            log("No registration token available. Request permission to generate one.");
                        }
                    } catch (err) {
                        log("An error occurred while retrieving token: " + err);
                    }
                } else {
                    log("Unable to get permission to notify. Please allow notifications in your browser settings.");
                }
                document.getElementById("btn-request").disabled = false;
            });

            log("Firebase initialized successfully. Ready to request token.");
        } catch (e) {
            log("Initialization Error: " + e.message);
            log("Ensure your Firebase Config snippet is correct and defined as `const firebaseConfig = {...}`");
        }
    </script>
</body>
</html>';

        $this->response->setOutput($html);
    }

    public function saveFcmToken()
    {
        $json = array();

        if (!$this->user->hasPermission('modify', 'extension/module/customer_segment')) {
            $json['error'] = 'Permission Denied';
        } else if (isset($this->request->post['customer_id']) && isset($this->request->post['token'])) {
            $customer_id = (int) $this->request->post['customer_id'];
            $token = $this->request->post['token'];

            $this->db->query("DELETE FROM `" . DB_PREFIX . "customer_segment_fcm_token` WHERE token = '" . $this->db->escape($token) . "'");

            $this->db->query("INSERT INTO `" . DB_PREFIX . "customer_segment_fcm_token` SET customer_id = '" . $customer_id . "', token = '" . $this->db->escape($token) . "', date_added = NOW()");

            $this->log->write("CustomerSegment: Registered test FCM token for Customer ID " . $customer_id);
            $json['success'] = true;
        } else {
            $json['error'] = 'Missing parameters';
        }

        $this->response->addHeader('Content-Type: application/json');
        $this->response->setOutput(json_encode($json));
    }

    // ----------------------------------------------------------------
    // PERSONALIZED DISPLAY — BANNERS
    // ----------------------------------------------------------------
    public function getBanners()
    {
        $this->load->model('extension/module/customer_segment');
        $group_id = isset($this->request->get['customer_group_id']) ? (int) $this->request->get['customer_group_id'] : 0;
        $rows = $this->model_extension_module_customer_segment->getBanners($group_id);

        $this->load->model('tool/image');
        foreach ($rows as &$row) {
            if ($row['image'] && is_file(DIR_IMAGE . $row['image'])) {
                $row['thumb'] = $this->model_tool_image->resize($row['image'], 100, 100);
            } else {
                $row['thumb'] = $this->model_tool_image->resize('no_image.png', 100, 100);
            }
        }

        $this->response->addHeader('Content-Type: application/json');
        $this->response->setOutput(json_encode($rows));
    }

    public function saveBanner()
    {
        $json = array();
        if (!$this->user->hasPermission('modify', 'extension/module/customer_segment')) {
            $json['error'] = 'Permission Denied';
        } elseif (empty($this->request->post['title'])) {
            $json['error'] = 'Title is required';
        } else {
            $this->load->model('extension/module/customer_segment');
            if (!empty($this->request->post['banner_id'])) {
                $this->model_extension_module_customer_segment->editBanner($this->request->post['banner_id'], $this->request->post);
            } else {
                $this->model_extension_module_customer_segment->addBanner($this->request->post);
            }
            $json['success'] = true;
        }
        $this->response->addHeader('Content-Type: application/json');
        $this->response->setOutput(json_encode($json));
    }

    public function deleteBanner()
    {
        $json = array();
        if (!$this->user->hasPermission('modify', 'extension/module/customer_segment')) {
            $json['error'] = 'Permission Denied';
        } elseif (isset($this->request->get['banner_id'])) {
            $this->load->model('extension/module/customer_segment');
            $this->model_extension_module_customer_segment->deleteBanner($this->request->get['banner_id']);
            $json['success'] = true;
        }
        $this->response->addHeader('Content-Type: application/json');
        $this->response->setOutput(json_encode($json));
    }

    // ----------------------------------------------------------------
    // PERSONALIZED DISPLAY — SLIDERS
    // ----------------------------------------------------------------
    public function getSliders()
    {
        $this->load->model('extension/module/customer_segment');
        $group_id = isset($this->request->get['customer_group_id']) ? (int) $this->request->get['customer_group_id'] : 0;
        $rows = $this->model_extension_module_customer_segment->getSliders($group_id);
        $this->response->addHeader('Content-Type: application/json');
        $this->response->setOutput(json_encode($rows));
    }

    public function saveSlider()
    {
        $json = array();
        if (!$this->user->hasPermission('modify', 'extension/module/customer_segment')) {
            $json['error'] = 'Permission Denied';
        } elseif (empty($this->request->post['name'])) {
            $json['error'] = 'Name is required';
        } else {
            $this->load->model('extension/module/customer_segment');
            if (!empty($this->request->post['slider_id'])) {
                $this->model_extension_module_customer_segment->editSlider($this->request->post['slider_id'], $this->request->post);
            } else {
                $this->model_extension_module_customer_segment->addSlider($this->request->post);
            }
            $json['success'] = true;
        }
        $this->response->addHeader('Content-Type: application/json');
        $this->response->setOutput(json_encode($json));
    }

    public function deleteSlider()
    {
        $json = array();
        if (!$this->user->hasPermission('modify', 'extension/module/customer_segment')) {
            $json['error'] = 'Permission Denied';
        } elseif (isset($this->request->get['slider_id'])) {
            $this->load->model('extension/module/customer_segment');
            $this->model_extension_module_customer_segment->deleteSlider($this->request->get['slider_id']);
            $json['success'] = true;
        }
        $this->response->addHeader('Content-Type: application/json');
        $this->response->setOutput(json_encode($json));
    }

    // ----------------------------------------------------------------
    // PERSONALIZED DISPLAY — PROMOTIONS
    // ----------------------------------------------------------------
    public function getPromotions()
    {
        $this->load->model('extension/module/customer_segment');
        $group_id = isset($this->request->get['customer_group_id']) ? (int) $this->request->get['customer_group_id'] : 0;
        $rows = $this->model_extension_module_customer_segment->getPromotions($group_id);
        $this->response->addHeader('Content-Type: application/json');
        $this->response->setOutput(json_encode($rows));
    }

    public function savePromotion()
    {
        $json = array();
        if (!$this->user->hasPermission('modify', 'extension/module/customer_segment')) {
            $json['error'] = 'Permission Denied';
        } elseif (empty($this->request->post['title'])) {
            $json['error'] = 'Title is required';
        } else {
            $this->load->model('extension/module/customer_segment');
            if (!empty($this->request->post['promotion_id'])) {
                $this->model_extension_module_customer_segment->editPromotion($this->request->post['promotion_id'], $this->request->post);
            } else {
                $this->model_extension_module_customer_segment->addPromotion($this->request->post);
            }
            $json['success'] = true;
        }
        $this->response->addHeader('Content-Type: application/json');
        $this->response->setOutput(json_encode($json));
    }

    public function deletePromotion()
    {
        $json = array();
        if (!$this->user->hasPermission('modify', 'extension/module/customer_segment')) {
            $json['error'] = 'Permission Denied';
        } elseif (isset($this->request->get['promotion_id'])) {
            $this->load->model('extension/module/customer_segment');
            $this->model_extension_module_customer_segment->deletePromotion($this->request->get['promotion_id']);
            $json['success'] = true;
        }
        $this->response->addHeader('Content-Type: application/json');
        $this->response->setOutput(json_encode($json));
    }

    public function repair()
    {
        $this->load->language('extension/module/customer_segment');
        $this->load->model('extension/module/customer_segment');
        $this->model_extension_module_customer_segment->install();
        $this->session->data['success'] = "Extension health restored. Events re-registered.";
        $this->response->redirect($this->url->link('extension/module/customer_segment', 'user_token=' . $this->session->data['user_token'], true));
    }

    public function getCategories() {
        $this->load->model("catalog/category");
        $results = $this->model_catalog_category->getCategories(array("sort" => "name"));
        $json = array();
        foreach ($results as $result) {
            $json[] = array(
                "category_id" => $result["category_id"],
                "name"        => $result["name"]
            );
        }
        $this->response->addHeader("Content-Type: application/json");
        $this->response->setOutput(json_encode($json));
    }

    public function getCoupons() {
        $query = $this->db->query("SELECT coupon_id, name, code FROM " . DB_PREFIX . "coupon WHERE status = 1 ORDER BY name ASC");
        $this->response->addHeader("Content-Type: application/json");
        $this->response->setOutput(json_encode($query->rows));
    }

    public function getProducts() {
        $this->load->model("catalog/product");
        $results = $this->model_catalog_product->getProducts(array('sort' => 'pd.name'));
        $json = array();
        foreach ($results as $result) {
            $json[] = array(
                "product_id" => $result["product_id"],
                "name"        => $result["name"]
            );
        }
        $this->response->addHeader("Content-Type: application/json");
        $this->response->setOutput(json_encode($json));
    }

    public function getCountries() {
        $this->load->model("localisation/country");
        $results = $this->model_localisation_country->getCountries();
        $this->response->addHeader("Content-Type: application/json");
        $this->response->setOutput(json_encode($results));
    }

    public function getZones() {
        $this->load->model("localisation/zone");
        if (isset($this->request->get["country_id"])) {
            $results = $this->model_localisation_zone->getZonesByCountryId($this->request->get["country_id"]);
        } else {
            $query = $this->db->query("SELECT * FROM " . DB_PREFIX . "zone ORDER BY name ASC");
            $results = $query->rows;
        }
        $this->response->addHeader("Content-Type: application/json");
        $this->response->setOutput(json_encode($results));
    }

    public function getCategoryInfo() {
        $json = array();
        if (isset($this->request->get["ids"])) {
            $this->load->model("catalog/category");
            $ids = explode(",", $this->request->get["ids"]);
            foreach ($ids as $id) {
                $info = $this->model_catalog_category->getCategory($id);
                if ($info) {
                    $json[] = array("category_id" => $info["category_id"], "name" => $info["name"]);
                }
            }
        }
        $this->response->addHeader("Content-Type: application/json");
        $this->response->setOutput(json_encode($json));
    }

    public function getProductInfo() {
        $json = array();
        if (isset($this->request->get['ids'])) {
            $this->load->model('catalog/product');
            $product_ids = explode(',', $this->request->get['ids']);
            foreach ($product_ids as $product_id) {
                $product_info = $this->model_catalog_product->getProduct($product_id);

                if ($product_info) {
                    $json[] = array(
                        'product_id' => $product_info['product_id'],
                        'name' => $product_info['name']
                    );
                }
            }
        }

        $this->response->addHeader('Content-Type: application/json');
        $this->response->setOutput(json_encode($json));
    }
}
