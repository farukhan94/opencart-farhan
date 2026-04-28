# Installation Guide — Dynamic Segmentation Module

1. **Upload Files:** Upload the contents of the `upload/` directory to your OpenCart root.
2. **Admin Install:** Go to `Admin -> Extensions -> Extensions`. Select `Modules` from the dropdown. Find "Dynamic Segmentation" and click the **Install (+) button**.
3. **Permissions:** Ensure your admin user has `access/modify` permissions for `extension/module/customer_segment`.
4. **Configuration:**
   - Go to `Admin -> Extensions -> Modules` and click **Edit** on Dynamic Segmentation.
   - Set Status to **Enabled**.
   - Paste your **Firebase Service Account JSON** or **Legacy Server Key** in the Firebase tab.
   - Click **Verify Connection** to test.
5. **CRON Setup:** 
   Add the following to your server's crontab (replace with your actual domain and secret key):
   `*/15 * * * * wget -qO- "https://yourdomain.com/index.php?route=extension/module/customer_segment/cron&key=YOUR_SECRET_KEY" > /dev/null 2>&1`
