<?php
declare(strict_types=1);

/**
 * Mail Configuration for PHPMailer
 * 
 * @package SathyaSaiSchool
 */

// Mail server configuration
define('MAIL_HOST', 'mail.saischoolchats.co.za'); // Your domain's mail server
define('MAIL_PORT', 587); // Common secure SMTP port
define('MAIL_USERNAME', 'contact@saischoolchats.co.za'); // Your email username
define('MAIL_PASSWORD', ''); // Your email password - set this in cPanel
define('MAIL_ENCRYPTION', 'tls'); // Use TLS encryption

// Mail settings
define('MAIL_FROM_EMAIL', 'contact@saischoolchats.co.za');
define('MAIL_FROM_NAME', SITE_NAME);
define('MAIL_REPLY_TO', ADMIN_EMAIL);

// Mail debugging (set to 0 in production)
define('MAIL_DEBUG', 2); // Temporarily set to 2 for debugging

// Alternative configuration for different local setups
// Uncomment and modify as needed based on your server configuration

// For Mercury Mail (XAMPP/WAMP default)
// define('MAIL_HOST', 'localhost');
// define('MAIL_PORT', 25);

// For hMailServer
// define('MAIL_HOST', 'localhost');
// define('MAIL_PORT', 587);
// define('MAIL_ENCRYPTION', 'tls');

// For Postfix (Linux servers)
// define('MAIL_HOST', 'localhost');
// define('MAIL_PORT', 587);
// define('MAIL_ENCRYPTION', 'tls');

// For local development with authentication
// define('MAIL_USERNAME', 'your_username');
// define('MAIL_PASSWORD', 'your_password');

/**
 * Get mail configuration as array
 * 
 * @return array
 */
function get_mail_config(): array
{
    return [
        'host' => MAIL_HOST,
        'port' => MAIL_PORT,
        'username' => MAIL_USERNAME,
        'password' => MAIL_PASSWORD,
        'encryption' => MAIL_ENCRYPTION,
        'from_email' => MAIL_FROM_EMAIL,
        'from_name' => MAIL_FROM_NAME,
        'reply_to' => MAIL_REPLY_TO,
        'debug' => MAIL_DEBUG
    ];
}