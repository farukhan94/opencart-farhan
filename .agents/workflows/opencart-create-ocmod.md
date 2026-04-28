---
description: Create an OpenCart 3 OCMod Modification File
---
# Creating an OCMod file for OpenCart 3

This workflow provides guidance on how to define modifications to OpenCart core files without changing the files themselves. This is done through `.ocmod.xml` files.

## Step-by-Step Guide

1.  **Determine the File and Target**
    Identify the exact controller, model, or view file you need to modify. Find the exact block of code you need to patch.
    
    *Pro Tip: Try to search for code that is incredibly unique within the target file so your search doesn't mistakenly catch unintended lines.*

2.  **Scaffold the XML Structure**
    A standard OCMod follows this structure:

    ```xml
    <?xml version="1.0" encoding="utf-8"?>
    <modification>
        <name>Your Custom Modification Name</name>
        <code>your_unique_internal_modification_code</code>
        <version>1.0.0</version>
        <author>Your Name</author>
        <link>https://www.your-link.com</link>
        
        <file path="catalog/controller/product/product.php">
            <operation>
                <search><![CDATA[ $data['heading_title'] = $product_info['name']; ]]></search>
                <add position="after"><![CDATA[
                    $data['my_custom_var'] = "Injected Custom Variable";
                ]]></add>
            </operation>
        </file>
    </modification>
    ```

3.  **Define the Path correctly**
    Always use standard paths. If you need to specify multiple files, you can use a glob (e.g. `catalog/view/theme/*/template/product/product.twig`) or specify `<file>` blocks sequentially.

4.  **Selecting an `add` Position**
    The `<add position="***">` parameter takes one of three values:
    - `replace`: Replaces the search string entirely.
    - `before`: Injects code before the found string.
    - `after`: Injects code after the found string.

5.  **Refining your `<search>` Indexing**
    If the text occurs multiple times but you only want to affect the first matching instance, you can use `<search index="0">`.

6.  **Saving the Output**
    Always name the file `[feature_name].ocmod.xml` (e.g. `enhanced_checkout.ocmod.xml`).
    Place it inside `system/` (for manual backend processing) or provide it directly to the user to upload via the Extension Installer.
    **Note**: It is often easiest to recommend placing it in `system/` directory directly for a quick drop-in without needing to hit "Install".
