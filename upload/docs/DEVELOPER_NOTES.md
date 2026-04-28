# Developer Notes

### Architecture
The module follows OpenCart's standard MVC-L pattern.
- **Admin:** Handles rule configuration, manual overrides, and Firebase setup.
- **Catalog/API:** Handles content delivery to the app and FCM token registration.
- **Segmentation Engine:** Lives in the Admin Model to centralize query logic.

### Database Schema
- `oc_customer_segment_rule`: The heart of the module.
- `oc_customer_segment_log`: Audit trail for every group switch.
- `oc_customer_segment_fcm_token`: Stores mobile device tokens.

### API Endpoints for Mobile App
- `registerToken`: `POST index.php?route=api/customer_segment_api/registerToken`
- `removeToken`: `POST index.php?route=api/customer_segment_api/removeToken`
- `getPersonalization`: `GET index.php?route=api/customer_segment_api/getPersonalization&customer_id=X`
  - Returns JSON containing banners, sliders, and promotions targeted for the customer's segment.

### Firebase FCM Integration
Modern **FCM v1** requires generating a Bearer Token via Service Account JSON. The included library handles both legacy and v1 protocols automatically.
