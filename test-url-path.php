<?php
declare(strict_types=1);

/**
 * Test URL Path Function
 * 
 * This script is for testing purposes only. 
 * Remove from production server after testing.
 */

// Include configuration and functions
require_once 'includes/config.php';
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>URL Path Test</title>
    <style>
        body { font-family: Arial, sans-serif; max-width: 800px; margin: 0 auto; padding: 20px; }
        h1 { color: #333; }
        table { width: 100%; border-collapse: collapse; margin: 20px 0; }
        th, td { padding: 10px; text-align: left; border: 1px solid #ddd; }
        th { background-color: #f5f5f5; }
        .success { color: green; }
        .warning { color: orange; }
        .note { background-color: #f9f9f9; padding: 15px; border-left: 4px solid #333; margin: 20px 0; }
    </style>
</head>
<body>
    <h1>URL Path Function Test</h1>
    <p>This page tests the url_path() function to ensure proper URL generation.</p>
    
    <div class="note">
        <p><strong>Note:</strong> This file is for testing purposes only. Remove from the production server after testing.</p>
    </div>
    
    <h2>Environment Information</h2>
    <table>
        <tr>
            <th>Variable</th>
            <th>Value</th>
        </tr>
        <tr>
            <td>SERVER_NAME</td>
            <td><?= htmlspecialchars($_SERVER['SERVER_NAME'] ?? 'Not set') ?></td>
        </tr>
        <tr>
            <td>HTTP_HOST</td>
            <td><?= htmlspecialchars($_SERVER['HTTP_HOST'] ?? 'Not set') ?></td>
        </tr>
        <tr>
            <td>SCRIPT_NAME</td>
            <td><?= htmlspecialchars($_SERVER['SCRIPT_NAME'] ?? 'Not set') ?></td>
        </tr>
        <tr>
            <td>REQUEST_URI</td>
            <td><?= htmlspecialchars($_SERVER['REQUEST_URI'] ?? 'Not set') ?></td>
        </tr>
        <tr>
            <td>HTTPS</td>
            <td><?= isset($_SERVER['HTTPS']) && $_SERVER['HTTPS'] === 'on' ? 'Yes' : 'No' ?></td>
        </tr>
        <tr>
            <td>SERVER_PORT</td>
            <td><?= htmlspecialchars($_SERVER['SERVER_PORT'] ?? 'Not set') ?></td>
        </tr>
        <tr>
            <td>HTTP_X_FORWARDED_PROTO</td>
            <td><?= htmlspecialchars($_SERVER['HTTP_X_FORWARDED_PROTO'] ?? 'Not set') ?></td>
        </tr>
    </table>
    
    <h2>URL Path Test Results</h2>
    <table>
        <tr>
            <th>Page</th>
            <th>Generated URL</th>
        </tr>
        <tr>
            <td>index</td>
            <td><?= url_path('index') ?></td>
        </tr>
        <tr>
            <td>about</td>
            <td><?= url_path('about') ?></td>
        </tr>
        <tr>
            <td>contact</td>
            <td><?= url_path('contact') ?></td>
        </tr>
        <tr>
            <td>about.php</td>
            <td><?= url_path('about.php') ?></td>
        </tr>
    </table>
    
    <p>After verifying that these URLs work correctly, you can delete this test file.</p>
</body>
</html> 