# Testing Guide — Dynamic Segmentation Module

Follow these steps to verify that the segmentation module and Firebase integration are working correctly.

### 1. Verify Firebase Connection
1. Go to **Admin -> Extensions -> Modules -> Dynamic Segmentation**.
2. Open the **Firebase v1** tab.
3. Paste your Service Account JSON.
4. Click **Verify & Connect**.
5. **Success Criteria:** The JSON area disappears, and you see "Connected to Project: **your-project-id**" with a red Disconnect button. Check the system log (`system/storage/logs/error.log` or the Module Logs tab) for:
   `CustomerSegment: Firebase connected by admin X`

### 2. Test Real-Time Segmentation
1. Create a Rule under the **Rules** tab:
   - **Name:** VIP Test
   - **Spend Min:** 50
   - **Target Group:** (Select a group like "Wholesale" or "VIP")
   - **Priority:** 10
2. Create a test customer or use an existing one (e.g., `customer_id=1`).
3. Place an order for this customer with a total over $50.
4. Set the order status to "Complete" (or the status that triggers the `addOrderHistory` event).
5. **Success Criteria:** 
   - Check the customer's group in **Admin -> Customers**. It should now be "VIP".
   - Check logs for:
     `CustomerSegment: Order complete event triggered for customer 1`
     `CustomerSegment: Customer 1 matched rule 'VIP Test'`

### 3. Test CRON & Background Processing
1. From the console or browser, hit the CRON URL:
   `https://yourdomain.com/index.php?route=extension/module/customer_segment/cron&key=YOUR_SECRET_KEY`
2. **Success Criteria:**
   - The page should display "CRON completed successfully."
   - Check logs for: `CustomerSegment: CRON job started.`

### 4. Test Mobile API (REST)
Use a tool like Postman to test the registration endpoints:
- **Register Token:**
  `POST /index.php?route=api/customer_segment_api/registerToken`
  Body: `{ "customer_id": 1, "token": "test-fcm-token", "device_type": "android" }`
- **Verify DB:** Check the `oc_customer_segment_fcm_token` table for the entry.
- **Get Personalization:**
  `GET /index.php?route=api/customer_segment_api/getPersonalization&customer_id=1`
  - **Success Criteria:** Returns JSON with banners/sliders assigned to the customer's group in the Admin panel.

### 5. Troubleshooting Logs
The module logs every major event. You can view these in:
- **Admin -> Extensions -> Modules -> Dynamic Segmentation -> Module Logs** (if implemented via shared system log).
- File: `system/storage/logs/error.log` (look for `CustomerSegment:` prefix).
