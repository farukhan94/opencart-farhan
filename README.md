# Customer Segmentation & Targeting Guide

A comprehensive guide to the Customer Segmentation module for OpenCart 3.0.3.8. This module enables advanced customer group management, personalized frontend experiences, targeted promotions with checkout discounts, secret content visibility controls, exclusive bundle deals, and automated push notifications through Firebase integration.

## Table of Contents
- [Live Demo & Access](#live-demo--access)
- [Quick Start: Installation Options](#quick-start-installation-options)
  - [Option A: Full Sample Project](#option-a-full-sample-project-recommended-for-testing)
  - [Option B: Standalone Plugin Installation](#option-b-standalone-plugin-installation)
- [Overview](#overview)
  - [Customer Group Base](#customer-group-base)
  - [Key Features](#key-features)
- [Administrative Interface](#administrative-interface)
  - [General Settings Tab](#general-settings-tab)
  - [Rules Tab](#rules-tab)
  - [Manual Assignments Tab](#manual-assignments-tab)
  - [Activity Logs Tab](#activity-logs-tab)
  - [Promotions Tab](#promotions-tab)
  - [Secret Items Tab](#secret-items-tab)
  - [Exclusive Combos Tab](#exclusive-combos-tab)
- [Rule Engine](#rule-engine)
  - [Rule Configuration](#rule-configuration)
  - [Available Conditions](#available-conditions)
  - [Timeframe Options](#timeframe-options)
  - [Bulk Rebuild](#bulk-rebuild)
  - [Rule Tester](#rule-tester)
- [Promotions System](#promotions-system)
  - [Visual Types](#visual-types)
  - [Reward Actions](#reward-actions)
  - [Scope Configuration](#scope-configuration)
  - [Notification Overrides](#notification-overrides)
- [Secret Items (Visibility Restrictions)](#secret-items-visibility-restrictions)
- [Exclusive Combos (Bundle Deals)](#exclusive-combos-bundle-deals)
- [Firebase Integration & Push Notifications](#firebase-integration--push-notifications)
  - [Setup Process](#setup-process)
  - [Mock Notifications App](#mock-notifications-app)
  - [Notification Priority Logic](#notification-priority-logic)
- [Frontend Display Modules](#frontend-display-modules)
  - [Layout Module Types](#layout-module-types)
  - [Product Slider Features](#product-slider-features)
  - [Combo Display ("Just For You")](#combo-display-just-for-you)
- [Frontend & Mobile APIs](#frontend--mobile-apis)
  - [Catalog APIs (Customer-Facing)](#catalog-apis-customer-facing)
  - [Administrative APIs (Management)](#administrative-apis-management)
- [Developer Information](#developer-information)
  - [Database Schema](#database-schema)
  - [Event Hooks](#event-hooks)
  - [Checkout Discount Extension](#checkout-discount-extension)
  - [Server Deployment (VPS)](#server-deployment-vps)

---

## Live Demo & Access

The project is automatically deployed using GitHub Actions to a VPS.

- **Store Frontend**: [http://79.143.187.33/](http://79.143.187.33/)
- **Admin Panel**: [http://79.143.187.33/admin/](http://79.143.187.33/admin/)
  - **Username**: `opencart`
  - **Password**: `opencart`
- **Customer Account (Sample)**:
  - **Email**: `customer@opencart.com`
  - **Password**: `opencart`

### GitHub Repository
- **URL**: [https://github.com/farukhan94/opencart-farhan](https://github.com/farukhan94/opencart-farhan)
- **CI/CD**: The code automatically pushes using GitHub Actions and updates on the server.

---

## Quick Start: Installation Options

### Option A: Full Sample Project (Recommended for Testing)
Use the **`opencart_customer_segmentation_sample.zip`** package. This contains a complete, containerized OpenCart environment.

1. **Extract** the ZIP file onto your machine.
2. **Launch**: Open your terminal in the project directory and run:
   ```bash
   docker-compose up --build
   ```
3. **Access**:
   - **Store Frontend**: `http://localhost/`
   - **Admin Panel**: `http://localhost/admin/` (Login: `opencart` / `opencart`)
   - **Database (phpMyAdmin)**: `http://localhost:8080/`

---

### Option B: Standalone Plugin Installation
Use the **`customer_segmentation.ocmod.zip`** package if you already have an existing OpenCart 3.0.3.8 site.

1. **Extract** the plugin ZIP locally.
2. **Upload**: Copy the contents of the `upload/` folder to your OpenCart root directory (preserving the directory structure).
3. **Installer Option**: Alternatively, go to **Extensions -> Installer** and upload the `customer_segmentation.ocmod.zip` file directly.
4. **Install**:
   - Go to **Extensions -> Extensions -> Modules**.
   - Find **Segmentation & Targeting (Manager)** and click **Install**.
   - Click **Edit** to configure settings and rebuild the database schema (automatic on first run).
5. **Events**: The module automatically registers the necessary event hooks upon installation.

---

## Overview

The Customer Segmentation module is a powerful tool designed to help store owners deliver targeted content and automated marketing actions based on customer behavior and attributes.

### Customer Group Base
> [!IMPORTANT]
> The segmentation feature is built directly on top of OpenCart's internal **Customer Groups**. All rules eventually result in moving a customer between these groups, which then controls the visibility of personalized banners, sliders, promotions, secret items, and exclusive combo deals.

### Key Features
- **Dynamic Segmentation**: Automatically reassign customers to different groups based on custom rules (e.g., total spend, order frequency, purchase history, demographics, geography).
- **Unified Promotions**: Configure promotions with independent visual presentation (banner/carousel, product slider) and reward actions (checkout discount, coupon/promo code).
- **Secret Items**: Restrict specific products or categories to be visible only to designated customer groups.
- **Exclusive Combos**: Create bundle deals with group-specific discounts, showing individual item savings and total bundle price.
- **Push Notifications**: Integrated Firebase Cloud Messaging (FCM v1) for sending automated push notifications when customers enter new segments, with per-promotion notification overrides and dynamic placeholders.
- **Checkout Discounts**: Automatic cart-level discounts applied at checkout based on the customer's group and active promotions.
- **Comprehensive Logging**: Unified activity log tracking segment changes, push notifications, coupon usage, and manual assignments with type-based filtering.
- **Rule Tester**: Built-in rule evaluation tester with detailed trace output for debugging segmentation logic.

---

## Administrative Interface

The module's main management interface is located under **Extensions -> Extensions -> Modules -> Segmentation & Targeting (Manager)**. It is organized into **7 tabs**:

### General Settings Tab

The General tab contains the module enable/disable toggle, Firebase connection management, and cron configuration.

**Module Status**: Enable or disable the entire segmentation engine.

**Firebase Connection**: Upload your Firebase Service Account JSON and verify connectivity. Once connected, a green status badge shows the linked project ID, with buttons to disconnect or open the Mock Notifications App.

**Cron Settings**:
- **Cron Secret Key**: A secret key used to secure the cron endpoint URL.
- **Cron Interval**: Choose Daily (recommended), Hourly, or Weekly.
- **Monthly Reset Day**: The day of each month when Calendar Month-based rule windows reset.

The cron URL format is: `{STORE_URL}index.php?route=extension/module/customer_segment/cron&key=YOUR_KEY`

**Health Check**: If the module's event hooks are missing, a warning bar appears with a one-click **Repair Extension** button.

<!-- IMAGE: admin_general_tab.png — Screenshot of the General Settings tab showing the module status toggle, Firebase connected status badge with project ID, the Cron Secret Key field, Cron Interval dropdown, and Monthly Reset Day selector -->

---

### Rules Tab

Lists all segmentation rules in a table with columns for Name, Priority, Status, and Actions (Edit/Delete). Three action buttons appear at the top:

- **Bulk Rebuild**: Re-evaluate all customers against active rules (processes in batches of 50).
- **Test Rule**: Open the Rule Tester modal to simulate evaluation against a specific customer.
- **Add Rule**: Open the rule creation modal.

<!-- IMAGE: admin_rules_tab.png — Screenshot of the Rules tab showing the rules table with sample rules listed, and the Bulk Rebuild, Test Rule, and Add Rule buttons at the top right -->

---

### Manual Assignments Tab

Allows administrators to manually override a customer's group assignment. Features:

- **Customer Search**: Type-ahead autocomplete to find customers by name.
- **Target Group**: Dropdown to select the destination customer group.
- **Assignment Table**: Shows all manually assigned customers with their name, assigned segment, date, and a remove action.

Manual assignments create a "lock" — the customer will not be reassigned by automated rules until the manual assignment is removed.

<!-- IMAGE: admin_manual_tab.png — Screenshot of the Manual Assignments tab showing the search field, group dropdown, Assign Segment button, and the table of existing manual assignments -->

---

### Activity Logs Tab

A unified activity log that tracks all module events with type-based filtering. Each log entry displays a colored icon and badge based on the activity type.

**Log Types**:
| Type | Icon | Badge | Description |
|------|------|-------|-------------|
| Segment Change | Exchange arrows | Primary (blue) | Customer moved from one group to another |
| Push Notification | Bell | Warning (yellow) | Firebase notification sent to customer |
| Coupon Usage | Ticket | Success (green) | Promo code used in an order |
| Manual Assignment | User Plus | Info (cyan) | Admin manually assigned customer to group |

**Filters**:
- **Customer ID / Name**: Search logs for a specific customer.
- **Activity Type**: Filter by segment changes, notifications, coupon usage, or manual assignments.

Logs are paginated (20 per page) and sorted newest-first.

<!-- IMAGE: admin_logs_tab.png — Screenshot of the Activity Logs tab showing the filter bar (Customer ID field and Activity Type dropdown), and the log table with sample entries displaying colored badges for different activity types -->

---

### Promotions Tab

The central hub for managing promotional offers. Each promotion combines an optional **Visual Type** (how it looks) with an optional **Reward Action** (what it does). Promotions are targeted at one or more customer groups.

Features a filter-by-group dropdown and an Add Promotion button. The promotions table shows ID, Group(s), Title, Type, Status, and Actions.

<!-- IMAGE: admin_promotions_tab.png — Screenshot of the Promotions tab showing the filter dropdown, Add Promotion button, and the promotions table with sample entries -->

<!-- IMAGE: admin_promotion_modal.png — Screenshot of the Promotion edit modal showing all fields: Target Groups, Title, Description, Promotion Schedule (Start/End dates), Repeat Logic (Active Days, Time Slots, Exclude Dates), Visual Type, Reward Action, Banner settings area, Cart Discount fields, Coupon/Promo Code field, Scope dropdown, Firebase Notification Override section, and Status -->

---

### Secret Items Tab

Configure products or categories that should only be visible to members of specific customer groups. Other customers will not see these items in search results, category listings, or direct product pages.

An info banner at the top explains: *"Items listed here will ONLY be visible to members of the selected groups. Others will not see them in search or categories."*

The table shows Type (Product/Category), Item Name, Visible To Groups, and an Action column.

<!-- IMAGE: admin_secret_items_tab.png — Screenshot of the Secret Items tab showing the info banner, Add Secret Item button, and the table with sample restricted products/categories and their assigned visibility groups -->

<!-- IMAGE: admin_secret_item_modal.png — Screenshot of the Secret Item modal showing the Type dropdown (Secret Product / Secret Category), Item search field, and Visible To Groups selector with help text -->

---

### Exclusive Combos Tab

Create bundle deals for specific customer groups. When a customer belongs to the target group and has the combo's products in their cart, the discount is applied at checkout.

An info banner explains: *"Create special bundle deals for specific user groups."*

The table shows ID, Name, Groups, Discount, Status, and Actions.

**Combo Configuration Fields**:
- **Combo Name**: Descriptive name (e.g., "Buy A + B and get 20% off").
- **Products**: Search and select multiple products for the bundle.
- **Discount**: Value and type (Percentage or Fixed Amount).
- **Discount Mode**: Apply to both (bundle price), apply to cheapest only, or apply to all items.
- **Target Groups**: Customer groups eligible for this deal.

<!-- IMAGE: admin_combos_tab.png — Screenshot of the Exclusive Combos tab showing the info banner, Add Exclusive Combo button, and the table with sample combo deals -->

<!-- IMAGE: admin_combo_modal.png — Screenshot of the Exclusive Combo modal showing the Name field, Products search/list, Discount value and type fields, Discount Mode dropdown, and Target Groups selector -->

---

## Rule Engine

### Rule Configuration

Each rule is configured via a modal dialog with the following fields:

- **Rule Name**: A descriptive name for the rule.
- **Target Customer Group**: The group customers will be assigned to when this rule matches.
- **Requirements Builder**: A dynamic, nested condition builder supporting AND/OR logic groups.
- **Priority**: Higher priority rules are evaluated first. If multiple rules match, the highest priority wins.
- **Status**: Enable or disable the rule.
- **Firebase Notifications**: Optional push notification title and body to send when a customer matches this rule.

<!-- IMAGE: admin_rule_modal.png — Screenshot of the Rule edit modal showing the Name field, Target Customer Group dropdown, the Requirements Builder with nested AND/OR groups and condition rows, Priority/Status fields, and the Firebase Notifications section -->

### Available Conditions

The rule engine supports the following condition types:

| Condition | Description | Operators |
|-----------|-------------|-----------|
| `spend_total` | Customer's total order spend | `>`, `>=`, `<`, `<=`, `==`, `!=` |
| `order_count` | Total number of completed orders | `>`, `>=`, `<`, `<=`, `==`, `!=` |
| `last_order_days_ago` | Days since last order | `>`, `>=`, `<`, `<=`, `==`, `!=` |
| `inactive_days` | Days of inactivity (no orders since registration or last order) | `>`, `>=`, `<`, `<=`, `==`, `!=` |
| `has_category` | Whether customer has ordered from a specific category | `==` (has), `!=` (has not) |
| `has_product` | Whether customer has ordered a specific product | `==` (has), `!=` (has not) |
| `has_coupon` | Whether customer has used a specific coupon code | `==` (has), `!=` (has not) |
| `age` | Customer's age (calculated from `date_of_birth`) | `>`, `>=`, `<`, `<=`, `==`, `!=` |
| `gender` | Customer's gender | `==`, `!=` |
| `country_id` | Customer's address country | `==`, `!=` |
| `zone_id` | Customer's address zone/state | `==`, `!=` |

### Timeframe Options

Conditions that query order history (`spend_total`, `order_count`, `has_category`, `has_product`, `has_coupon`) support timeframe filtering:

| Timeframe | Description |
|-----------|-------------|
| **All Time** | No date restriction (default) |
| **Calendar Month** | Current calendar month only (resets on the configured Monthly Reset Day) |
| **Rolling Window** | Last N days (configurable, e.g., "Last 30 Days") |
| **Custom Date Range** | Specific start and end dates |

### Bulk Rebuild

The **Bulk Rebuild** button re-evaluates all customers in the database against all active rules. It processes in batches of 50 customers to avoid timeouts, with a progress indicator showing how many have been processed.

### Rule Tester

The **Test Rule** modal allows you to simulate rule evaluation:
1. Select a rule from the dropdown.
2. Enter a Customer ID.
3. Click "Test Evaluation" to see a detailed trace showing each condition evaluated, actual vs. expected values, and PASS/FAIL results for each.

<!-- IMAGE: admin_rule_tester.png — Screenshot of the Rule Tester modal showing the Rule dropdown, Customer ID input, Test Evaluation button, and the trace output with color-coded PASS/FAIL results for each condition -->

---

## Promotions System

Promotions are the most flexible feature in the module. Each promotion independently combines a **Visual Type** (how it's displayed), a **Reward Action** (what it does), and a granular **Active Schedule**.

#### Active Schedule & Repeat Logic

Promotions support advanced scheduling to target specific times and dates:

- **Promotion Boundaries**: Set a strict **Start Date** and **End Date** for the overall campaign.
- **Repeat Logic (Active Days)**: Select specific days of the week (e.g., "Weekends Only" or "Monday - Friday") when the promotion should be active.
- **Active Time Slots**: Define multiple time windows per day (e.g., "09:00 - 11:00" and "18:00 - 20:00"). If no slots are added, the promotion runs all day (00:00 - 23:59).
- **Exclude Specific Dates**: Block out specific holiday dates or maintenance windows from an otherwise active promotion.
- **Store Time Sync**: The management interface displays a **Live Server Clock** and timezone to ensure schedules are configured relative to the store's actual location.

#### Visual Types

| Visual Type | Description |
|------------|-------------|
| **None** | No visual component — used for purely discount-based promotions |
| **Banner / Carousel** | Multi-image banner carousel with per-image links. Managed via an image table in the modal |
| **Product Slider** | Displays specific products in a Swiper-based slider with discount badges and add-to-cart buttons |

### Reward Actions

| Reward Action | Description |
|--------------|-------------|
| **None** | No reward — used for purely visual/announcement promotions |
| **Checkout Discount (Automatic)** | Automatically applies a percentage or fixed discount to the cart total at checkout. Configured with a discount value and type (percent/fixed) |
| **Coupon / Promo Code** | Associates a manually-entered promo code with the promotion. Coupon usage is tracked in the Activity Logs |

### Scope Configuration

Promotions with checkout discounts can be scoped to:
- **None**: No product scope
- **All Products**: Applies to the entire cart
- **Specific Products**: Search and select individual products
- **Specific Categories**: Search and select categories

### Notification Overrides

Each promotion has optional **Firebase Notification Override** fields (Push Title and Push Body). When a customer's group is reassigned via a rule:

1. The system checks if any active promotion for the target group has a notification title defined.
2. If found, the **first matching promotion's notification** is used (overriding the rule's notification).
3. If no promotion override exists, the rule's own notification settings are used as fallback.

**Dynamic Placeholders**: `{F_NAME}` (first name), `{L_NAME}` (last name) are resolved automatically in both rule and promotion notifications.

---

## Secret Items (Visibility Restrictions)

Secret Items enforce visibility restrictions at the OpenCart event/hook level. When a product or category is marked as "secret":

- **Product Restriction**: The product is hidden from `getProduct` and `getProducts` model calls for non-authorized groups. It won't appear in search results, category pages, or direct URL access.
- **Category Restriction**: The category is hidden from `getCategory` and `getCategories` model calls for non-authorized groups.

This is enforced through OpenCart's event system, intercepting model output before it reaches the controller/view layer.

---

## Exclusive Combos (Bundle Deals)

Exclusive Combos create bundle deals that are displayed on the storefront with the **"Just For You"** badge. The frontend display shows:

- **Per-item details**: Product image, name, original price, bundle-discounted price, and individual savings.
- **Bundle summary**: Total savings amount and final bundle price.
- **Discount Modes**:
  - **Bundle**: Discount applies to the combined total of all bundle products.
  - **Cheapest**: Discount applies only to the cheapest item in the bundle.
  - **All**: Discount applies to all items of these types in the cart.

<!-- IMAGE: frontend_combo_display.png — Screenshot of the storefront showing an Exclusive Bundle Deals section with the "Just For You" badge, product cards showing item names, original prices with strikethrough, discounted bundle prices, per-item savings badges, total savings, final bundle price, and a View Bundle Details button -->

---

## Firebase Integration & Push Notifications

The module uses Firebase Cloud Messaging (FCM v1 API) for real-time customer engagement.

### Setup Process
1. Create a project in the [Firebase Console](https://console.firebase.google.com/).
2. Generate a **Service Account JSON** file from Project Settings -> Service Accounts.
3. In the module's General tab, paste or upload the JSON file.
4. Click **Verify & Connect** — the module validates the JSON and stores the project ID.
5. Configure your **VAPID Key** for web push notifications (used in the Mock App and frontend).

### Mock Notifications App

A built-in testing tool accessible from the General tab (when Firebase is connected):

1. Click **"View Mock Notifications App"** on the Firebase connected status badge.
2. Select a Customer ID in the testing modal.
3. Enter your Firebase Config snippet and VAPID Key.
4. Click **"Open Mock App"** — a standalone page opens with:
   - A "Request Permission & Get Token" button.
   - A dark terminal-style log showing all Firebase events.
   - Automatic token registration for the selected customer.
5. Trigger a rule action to see the notification arrive in real-time.

<!-- IMAGE: admin_mock_app.png — Screenshot of the Firebase Testing App page showing the Push Notification Tester card with the Customer ID, the Request Permission button, and the dark terminal log area with sample output -->

### Notification Priority Logic

When a customer is reassigned to a new group, notifications are resolved in this order:
1. **Promotion Override**: Check for active promotions linked to the target group that have a `notification_title` defined. The first matching promotion wins.
2. **Rule Fallback**: If no promotion override exists, use the rule's own notification title and body from the Firebase Notifications section.
3. **No Notification**: If neither is configured, no push notification is sent.

---

## Frontend Display Modules

### Layout Module Types

The module registers **4 separate layout modules** that can be placed on any page via **Design -> Layouts**:

| Module | Controller | Description |
|--------|-----------|-------------|
| **Segmentation (Main)** | `customer_segment` | Combines banners, sliders, and combos in a single widget |
| **Segment Banner** | `customer_segment_banner` | Standalone targeted banner display |
| **Segment Slider** | `customer_segment_slider` | Standalone targeted product slider with Swiper carousel |
| **Segment Promo** | `customer_segment_promo` | Standalone promotional content display |
| **Segment Combo** | `customer_segment_combo` | Standalone exclusive bundle deals display |

### Product Slider Features

The product slider adapts its display based on item count:
- **4+ products**: Full Swiper carousel with navigation arrows, pagination dots, and autoplay.
- **3 or fewer products**: Static grid layout (no carousel behavior).

Each product card shows:
- Product image with link to product page.
- Product name and truncated description.
- **Segment discount badge** (green, e.g., "-20%") for group-specific discounts.
- **Special price badge** (red, e.g., "50% OFF") for standard OpenCart specials.
- Original price with strikethrough and discounted price.
- **Add to Cart** button with `cart.add()` integration.

<!-- IMAGE: frontend_product_slider.png — Screenshot of a product slider on the storefront showing product cards with images, names, discount badges, strikethrough original prices, discounted prices, and Add to Cart buttons -->

### Combo Display ("Just For You")

The combo section on the frontend is branded as **"Exclusive Bundle Deals"** with a gradient **"Just For You"** badge. Each combo card displays:
- Combo name as the heading.
- Individual product rows with thumbnail, name, bundle price (green), original price (strikethrough), and per-item savings badge.
- A dashed-border summary box showing **Total Savings** (red) and **Bundle Price** (large green).
- A **"View Bundle Details"** call-to-action button.

<!-- IMAGE: frontend_banner_display.png — Screenshot of the storefront showing a targeted banner carousel with promotional images, navigation arrows, and pagination dots -->

---

## Frontend & Mobile APIs

The module provides specialized JSON endpoints categorized into customer-facing (Catalog) and management-facing (Administrative) APIs.

### Catalog APIs (Customer-Facing)
These endpoints are used by the storefront or mobile app. They require a valid customer session.

#### 1. Get Personalized Content
Returns segment-specific content for the logged-in customer, including banners, sliders, promotions, and combo offers.
- **URL**: `index.php?route=extension/module/customer_segment/getPersonalized`
- **Method**: `GET`
- **Response**: JSON object containing `customer_group_id`, `banners`, `sliders`, `promotions`, and `combos`.

#### 2. Save FCM Token
Registers a Firebase token for push notifications.
- **URL**: `index.php?route=extension/module/customer_segment/saveToken`
- **Method**: `POST` (Param: `token`)

#### 3. Trigger Calculation (Cron)
Securely triggers the rule evaluation engine for all customers.
- **URL**: `index.php?route=extension/module/customer_segment/cron&key=YOUR_KEY`
- **Method**: `GET`

### Administrative APIs (Management)
These endpoints are used for building custom administrative dashboards or integrations. They require a valid `user_token` (Admin Session).

#### Rule Management
- **List Rules**: `GET .../getRules&user_token=...`
- **Get Rule Details**: `GET .../getRule&rule_id=X&user_token=...`
- **Save Rule**: `POST .../saveRule&user_token=...`
- **Delete Rule**: `GET .../deleteRule&rule_id=X&user_token=...`
- **Test Rule**: `POST .../testRule&user_token=...` (Params: `rule_id`, `customer_id`)

#### Segment & Content Management
- **Manual Assignments**: `GET .../getManuals`, `POST .../addManual`, `GET .../deleteManual`
- **Promotions**: `GET .../getPromotions`, `GET .../getPromotion`, `POST .../savePromotion`, `GET .../deletePromotion`
- **Secret Items**: `GET .../getSpecialItems`, `POST .../saveSpecialItem`, `GET .../deleteSpecialItem`
- **Combos**: `GET .../getCombos`, `POST .../saveCombo`, `GET .../deleteCombo`

#### Analytics & Utilities
- **Activity Logs**: `GET .../getDynamicLogs` (Supports pagination, customer ID/name filter, and activity type filter)
- **Bulk Rebuild**: `GET .../bulkRebuild&start=0` (Processes in batches of 50)
- **Firebase**: `POST .../verifyFirebase`, `POST .../disconnectFirebase`
- **Helpers**: `GET .../autocomplete` (Customer search), `GET .../getProductInfo` (Multi-product details), `GET .../getCategories`, `GET .../getProducts`, `GET .../getCountries`, `GET .../getZones`, `GET .../getCategoryInfo`

---

## Developer Information

### Database Schema
The module introduces the following tables:

| Table Name | Description |
|-----------|-------------|
| `customer_segment_rule` | Stores rule definitions with name, target group, priority, conditions JSON, actions JSON, and status |
| `customer_segment_fcm_token` | Stores Firebase device tokens linked to customer IDs |
| `customer_segment_log` | Unified activity log with type (`group_change`, `notification`, `coupon_usage`, `manual_assignment`), target ID, old/new group IDs, rule ID, and JSON data |
| `customer_segment_manual` | Manual segment overrides with lock flag to prevent automatic rule reassignment |
| `customer_segment_banner` | Targeted banner content (title, image, link, status) |
| `customer_segment_banner_group` | Junction table linking banners to customer groups (many-to-many) |
| `customer_segment_slider` | Targeted product slider configurations (name, product IDs, status) |
| `customer_segment_slider_group` | Junction table linking sliders to customer groups (many-to-many) |
| `customer_segment_promotion` | Promotions with visual type, reward type, discount configuration, scope, product/category IDs, coupon code, banner data, notification overrides, date range, and status |
| `customer_segment_promotion_group` | Junction table linking promotions to customer groups (many-to-many) |
| `customer_segment_special` | Secret item restrictions mapping item type (product/category) and item ID to allowed customer group IDs |
| `customer_segment_combo` | Exclusive combo/bundle deals with product IDs, discount type/value/mode, customer group IDs, date range, and status |

Additionally, the core `customer` table is extended with:
- `date_of_birth`: Supports age-based segmentation rules.
- `gender`: Supports demographic targeting rules.

### Event Hooks
The module registers the following OpenCart events:

| Event Trigger | Handler | Purpose |
|--------------|---------|---------|
| `catalog/model/checkout/order/addOrderHistory/after` | `eventOrderComplete` | Evaluates rules after checkout; logs coupon usage if a segment promo code was used |
| `catalog/controller/common/footer/after` | `eventFooterAfter` | Injects Firebase SDK and token registration script into the storefront footer |
| `catalog/model/catalog/product/getProduct/after` | `eventCheckProduct` | Hides secret products from unauthorized groups; applies dynamic segment discounts to product pricing |
| `catalog/model/catalog/product/getProducts/after` | `eventCheckProduct` | Filters secret products from product listings; applies dynamic segment discounts |
| `catalog/model/catalog/category/getCategory/after` | `eventCheckCategory` | Hides secret categories from unauthorized groups |
| `catalog/model/catalog/category/getCategories/after` | `eventCheckCategory` | Filters secret categories from category listings |

### Checkout Discount Extension

The module includes a custom **Order Total** extension (`total_customer_segment_discount`) that is automatically enabled during installation. It:

1. Detects the logged-in customer's group.
2. Queries active promotions with `cart_discount` reward type for that group.
3. Calculates the best available discount (percentage or fixed).
4. Applies it as a negative line item in the order totals at checkout.

### Server Deployment (VPS)
For a complete walkthrough on deploying this project to a fresh Contabo VPS using Docker, see the dedicated **[SERVER_DEPLOYMENT.md](guide/SERVER_DEPLOYMENT.md)** file.

It includes:
- Commands to install Docker/Compose on Ubuntu.
- `scp` command for file transfer.
- Automated launch commands.
- GitHub Actions CI/CD configuration.
