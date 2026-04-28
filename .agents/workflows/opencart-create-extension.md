---
description: Create a scaffolded OpenCart 3 Extension (Admin + Catalog)
---
# How to scaffold a new OpenCart 3 Extension

This workflow helps you quickly generate the MVC-L structure for a new OpenCart module.
When the user asks to "create an extension" or "create a module", execute these steps iteratively to build the required files. Keep in mind whether the module is `admin` (backend) specific, `catalog` (frontend) specific, or both.

## Step-by-Step Guide

1.  **Define the Code and Name**
    Determine the internal system name for the extension (e.g., `extension/module/my_feature`).
    Ensure the path corresponds to `extension/module/` which is the standard OpenCart 3 module directory.

2.  **Create the Admin Language File**
    Create `admin/language/en-gb/extension/module/YOUR_MODULE.php`.
    ```php
    <?php
    $_['heading_title']    = 'Your Module Name';
    $_['text_extension']   = 'Extensions';
    $_['text_success']     = 'Success: You have modified the module!';
    $_['text_edit']        = 'Edit Module';
    $_['entry_status']     = 'Status';
    $_['error_permission'] = 'Warning: You do not have permission to modify this module!';
    ```

3.  **Create the Admin Controller**
    Create `admin/controller/extension/module/YOUR_MODULE.php`. Set up the `index()`, `validate()`, `install()` and `uninstall()` functions. Make sure the class name extends `Controller` (e.g., `class ControllerExtensionModuleYourModule extends Controller { ... }`). Check user permissions via `$this->user->hasPermission('modify', 'extension/module/YOUR_MODULE')`.

4.  **Create the Admin View (Twig)**
    Create `admin/view/template/extension/module/YOUR_MODULE.twig`. Use the standard Bootstrap 3 layout OpenCart templates use (with `#content`, `.container-fluid`, and standard panels). 
    Remember to use `{{ heading_title }}` not `$heading_title`.

5.  **Create Catalog Controller (Optional)**
    If the module outputs to the frontend, create `catalog/controller/extension/module/YOUR_MODULE.php`.

6.  **Create Catalog View (Optional)**
    If applicable, create `catalog/view/theme/default/template/extension/module/YOUR_MODULE.twig`. Use OpenCart's standard grid layouts where appropriate.

## Important Considerations
- All file names should use **snake_case** for paths (e.g. `my_module.php`).
- **Permissions**: Every admin controller should validate `$this->user->hasPermission()`.
- **Settings**: Module data is stored in the `setting` DB table. To access setting data use `$this->model_setting_setting->editSetting('module_YOUR_MODULE', $this->request->post)`.
