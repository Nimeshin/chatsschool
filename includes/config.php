<?php

declare(strict_types=1);

/**
 * Configuration File
 * 
 * @package SathyaSaiSchool
 */

// Error reporting - disabled in production
ini_set('display_errors', '0');
error_reporting(0);

// Session configuration - MUST be set before session_start()
ini_set('session.cookie_httponly', '1');
ini_set('session.use_only_cookies', '1');
ini_set('session.cookie_secure', '1'); // Enable secure cookies for HTTPS
ini_set('session.cookie_samesite', 'Strict'); // Add SameSite protection

// Start session after configuration
session_start();

// Database configuration
define('DB_HOST', 'localhost');
define('DB_NAME', 'sathyasai_school');
define('DB_USER', 'root');
define('DB_PASS', '');

// Application configuration
define('SITE_NAME', 'Sathya Sai School Chatsworth');
define('SITE_URL', 'https://www.saischoolchats.co.za');
define('ADMIN_EMAIL', 'contact@saischoolchats.co.za');

// Directory paths
define('ROOT_PATH', dirname(__DIR__) . DIRECTORY_SEPARATOR);
define('INCLUDES_PATH', ROOT_PATH . 'includes' . DIRECTORY_SEPARATOR);
define('ASSETS_PATH', ROOT_PATH . 'assets' . DIRECTORY_SEPARATOR);

// Load Composer autoloader
require_once ROOT_PATH . 'vendor/autoload.php';

// Load mail configuration
require_once INCLUDES_PATH . 'mail_config.php';

// Load essential functions
require_once INCLUDES_PATH . 'functions.php';

// Set default timezone
date_default_timezone_set('Africa/Johannesburg');

// Character encoding
mb_internal_encoding('UTF-8'); 