<?php
declare(strict_types=1);

/**
 * Mail Configuration for PHPMailer
 * 
 * @package SathyaSaiSchool
 */

// Mail server configuration
define('MAIL_HOST', 'localhost'); // Local mail server
define('MAIL_PORT', 25); // Standard SMTP port for local server
define('MAIL_USERNAME', ''); // Usually empty for local server
define('MAIL_PASSWORD', ''); // Usually empty for local server
define('MAIL_ENCRYPTION', ''); // Usually none for local server ('tls', 'ssl', or '')

// Mail settings
define('MAIL_FROM_EMAIL', 'noreply@saischoolchats.co.za');
define('MAIL_FROM_NAME', SITE_NAME);
define('MAIL_REPLY_TO', ADMIN_EMAIL);

// Mail debugging (set to 0 in production)
define('MAIL_DEBUG', 1); // 0 = off, 1 = client messages, 2 = client and server messages

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