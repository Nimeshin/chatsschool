<?php
declare(strict_types=1);

/**
 * Check and Enable mod_rewrite for WAMP
 * 
 * This script checks if mod_rewrite is enabled in your WAMP installation
 * and provides instructions to enable it if needed.
 */

// Check if we're on Apache
if (!function_exists('apache_get_modules')) {
    echo "This script must be run on an Apache server (like WAMP) to check for mod_rewrite.";
    exit;
}

// Check for mod_rewrite
$modules = apache_get_modules();
$mod_rewrite_enabled = in_array('mod_rewrite', $modules);

// Output clean HTML
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>mod_rewrite Check</title>
    <style>
        body {
            font-family: Arial, sans-serif;
            line-height: 1.6;
            max-width: 800px;
            margin: 0 auto;
            padding: 20px;
        }
        .status {
            padding: 15px;
            margin-bottom: 20px;
            border-radius: 4px;
        }
        .status.success {
            background-color: #d4edda;
            color: #155724;
            border: 1px solid #c3e6cb;
        }
        .status.error {
            background-color: #f8d7da;
            color: #721c24;
            border: 1px solid #f5c6cb;
        }
        .steps {
            background-color: #f8f9fa;
            padding: 20px;
            border-radius: 4px;
            margin-bottom: 20px;
        }
        h1 {
            color: #333;
        }
        .step {
            margin-bottom: 10px;
        }
        code {
            background-color: #f1f1f1;
            padding: 2px 6px;
            border-radius: 3px;
        }
    </style>
</head>
<body>
    <h1>mod_rewrite Module Status</h1>
    
    <?php if ($mod_rewrite_enabled): ?>
    <div class="status success">
        <strong>Success!</strong> mod_rewrite is enabled on your server.
    </div>
    <p>Your server is properly configured for SEO-friendly URLs. Make sure you've also set up your .htaccess file correctly.</p>
    
    <?php else: ?>
    <div class="status error">
        <strong>Attention!</strong> mod_rewrite is NOT enabled on your WAMP server.
    </div>
    
    <div class="steps">
        <h2>How to Enable mod_rewrite in WAMP:</h2>
        
        <div class="step">
            <strong>Step 1:</strong> Left-click on the WAMP icon in your system tray.
        </div>
        
        <div class="step">
            <strong>Step 2:</strong> Go to "Apache" → "Apache Modules".
        </div>
        
        <div class="step">
            <strong>Step 3:</strong> Find "rewrite_module" in the list and click on it to enable it.
        </div>
        
        <div class="step">
            <strong>Step 4:</strong> WAMP will restart Apache with the new configuration.
        </div>
        
        <div class="step">
            <strong>Step 5:</strong> Refresh this page to verify that mod_rewrite is now enabled.
        </div>
    </div>
    <?php endif; ?>
    
    <h2>Additional Configuration Tips</h2>
    <ul>
        <li>Make sure your .htaccess file has the correct syntax</li>
        <li>Check that AllowOverride is set to "All" in your Apache configuration</li>
        <li>For WAMP, edit <code>httpd.conf</code> and find the section with <code>&lt;Directory "c:/wamp64/www/"&gt;</code> and ensure <code>AllowOverride All</code> is set</li>
        <li>After making any Apache config changes, restart WAMP</li>
    </ul>
    
    <p>Once mod_rewrite is properly enabled, your SEO-friendly URLs should work correctly.</p>
</body>
</html>
<?php
// Additional Apache info for troubleshooting
if (function_exists('apache_get_version')) {
    echo "<p><strong>Apache Version:</strong> " . apache_get_version() . "</p>";
}
?> 