<?php

namespace CustomerSegment;

class Firebase
{
    private $service_account;
    private $project_id;
    private $log;

    public function __construct($json_string, $registry)
    {
        $this->log = $registry->get('log');

        // Clean up the string (sometimes users paste with extra spaces or HTML entites)
        $json_string = html_entity_decode($json_string, ENT_QUOTES, 'UTF-8');

        $this->service_account = json_decode($json_string, true);

        if (json_last_error() !== JSON_ERROR_NONE) {
            $this->log->write("CustomerSegment Error: JSON Decode failed. Error: " . json_last_error_msg());
            // Debug: show first 50 chars of the string
            $this->log->write("CustomerSegment Debug: JSON partial string: " . substr($json_string, 0, 100));
        }

        if ($this->service_account && isset($this->service_account['project_id'])) {
            $this->project_id = $this->service_account['project_id'];
            $this->log->write("CustomerSegment: Firebase initialized for project " . $this->project_id);
        } else {
            $this->log->write("CustomerSegment Error: Invalid Firebase Service Account JSON provided (Missing project_id).");
        }
    }

    public function verifyConnection()
    {
        $this->log->write("CustomerSegment: Verifying Firebase connection...");
        $token = $this->getAccessToken();

        if ($token && $token !== 'MOCK_ACCESS_TOKEN') {
            $this->log->write("CustomerSegment: Firebase connection verified successfully.");
            return array('success' => true, 'project_id' => $this->project_id);
        } else {
            $this->log->write("CustomerSegment Error: Firebase verification failed.");
            return array('success' => false, 'error' => 'Could not retrieve access token.');
        }
    }

    public function sendToDevice($token, $title, $body, $data = array())
    {
        $this->log->write("CustomerSegment: Sending FCM v1 notification to device: " . substr($token, 0, 10) . "...");

        $url = 'https://fcm.googleapis.com/v1/projects/' . $this->project_id . '/messages:send';
        $access_token = $this->getAccessToken();

        $message = array(
            'message' => array(
                'token' => $token,
                'notification' => array(
                    'title' => $title,
                    'body' => $body
                ),
                'data' => (object) $data
            )
        );

        $headers = array(
            'Authorization: Bearer ' . $access_token,
            'Content-Type: application/json'
        );

        $response = $this->executeCurl($url, $headers, $message);

        if ($response['status'] == 200) {
            $this->log->write("CustomerSegment: FCM notification sent successfully.");
        } else {
            $this->log->write("CustomerSegment Error: FCM notification failed. Status: " . $response['status'] . " Response: " . json_encode($response['response']));
        }

        return $response;
    }

    private function executeCurl($url, $headers, $fields)
    {
        $ch = curl_init();
        curl_setopt($ch, CURLOPT_URL, $url);
        curl_setopt($ch, CURLOPT_POST, true);
        curl_setopt($ch, CURLOPT_HTTPHEADER, $headers);
        curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);
        curl_setopt($ch, CURLOPT_SSL_VERIFYPEER, false);
        curl_setopt($ch, CURLOPT_POSTFIELDS, json_encode($fields));

        $result = curl_exec($ch);
        $status_code = curl_getinfo($ch, CURLINFO_HTTP_CODE);
        curl_close($ch);

        return array('status' => $status_code, 'response' => json_decode($result, true));
    }

    private function base64UrlEncode($data)
    {
        return rtrim(strtr(base64_encode($data), '+/', '-_'), '=');
    }

    private function getAccessToken()
    {
        if (!$this->service_account || !isset($this->service_account['private_key'])) {
            return false;
        }

        $header = json_encode(['alg' => 'RS256', 'typ' => 'JWT']);
        $now = time();
        $payload = json_encode([
            'iss' => $this->service_account['client_email'],
            'scope' => 'https://www.googleapis.com/auth/cloud-platform',
            'aud' => 'https://oauth2.googleapis.com/token',
            'exp' => $now + 3600,
            'iat' => $now
        ]);

        $base64UrlHeader = $this->base64UrlEncode($header);
        $base64UrlPayload = $this->base64UrlEncode($payload);

        $signature = '';
        openssl_sign($base64UrlHeader . "." . $base64UrlPayload, $signature, $this->service_account['private_key'], "sha256WithRSAEncryption");
        $base64UrlSignature = $this->base64UrlEncode($signature);

        $jwt = $base64UrlHeader . "." . $base64UrlPayload . "." . $base64UrlSignature;

        $post_data = http_build_query([
            'grant_type' => 'urn:ietf:params:oauth:grant-type:jwt-bearer',
            'assertion' => $jwt
        ]);

        $ch = curl_init('https://oauth2.googleapis.com/token');
        curl_setopt($ch, CURLOPT_POST, true);
        curl_setopt($ch, CURLOPT_POSTFIELDS, $post_data);
        curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);
        curl_setopt($ch, CURLOPT_SSL_VERIFYPEER, false);
        $result = curl_exec($ch);
        curl_close($ch);

        $response = json_decode($result, true);

        if (isset($response['access_token'])) {
            return $response['access_token'];
        }

        $this->log->write("CustomerSegment Error: Failed to exchange JWT for Access Token. Response: " . $result);
        return false;
    }
}
