<?php
declare(strict_types=1);

/**
 * Contact Form Test Script
 * 
 * Remove this file after testing
 */

require_once 'includes/config.php';

echo "<h1>Contact Form Test</h1>";

// Test CSRF token generation
echo "<h2>CSRF Token Test</h2>";
$token = generate_csrf_token();
echo "Generated token: " . $token . "<br>";
echo "Token verification: " . (verify_csrf_token($token) ? "✅ Pass" : "❌ Fail") . "<br>";

// Test mail function
echo "<h2>Mail Function Test</h2>";
if (function_exists('mail')) {
    echo "✅ mail() function is available<br>";
    
    // Test basic mail sending
    $test_result = mail(
        ADMIN_EMAIL, 
        "Test Email from " . SITE_NAME, 
        "This is a test email to verify mail functionality.",
        "From: " . SITE_NAME . " <noreply@saischoolchats.co.za>"
    );
    
    echo "Test email result: " . ($test_result ? "✅ Sent" : "❌ Failed") . "<br>";
} else {
    echo "❌ mail() function is not available<br>";
}

// Test file writing permissions
echo "<h2>File Permissions Test</h2>";
$test_file = ROOT_PATH . 'test_write.log';
$write_result = file_put_contents($test_file, "Test write: " . date('Y-m-d H:i:s') . "\n");

if ($write_result !== false) {
    echo "✅ File writing is working<br>";
    unlink($test_file); // Clean up
} else {
    echo "❌ File writing failed<br>";
}

// Test configuration
echo "<h2>Configuration Test</h2>";
echo "SITE_NAME: " . SITE_NAME . "<br>";
echo "ADMIN_EMAIL: " . ADMIN_EMAIL . "<br>";
echo "ROOT_PATH: " . ROOT_PATH . "<br>";

// Test form processing endpoint
echo "<h2>Form Processing Test</h2>";
echo '<form method="post" action="includes/process_contact.php">';
echo '<input type="hidden" name="csrf_token" value="' . $token . '">';
echo '<input type="text" name="name" value="Test User" required><br>';
echo '<input type="email" name="email" value="test@example.com" required><br>';
echo '<input type="text" name="subject" value="Test Subject" required><br>';
echo '<textarea name="message" required>This is a test message from the contact form.</textarea><br>';
echo '<button type="submit">Test Submit</button>';
echo '</form>';

echo "<p><strong>Note:</strong> Remove this file after testing.</p>";
?> 