<?php

declare(strict_types=1);

/**
 * Helper Functions
 * 
 * @package SathyaSaiSchool
 */

/**
 * Sanitize output
 *
 * @param string $text
 * @return string
 */
function escape_html(string $text): string
{
    return htmlspecialchars($text, ENT_QUOTES | ENT_HTML5, 'UTF-8');
}

/**
 * Generate CSRF token
 *
 * @return string
 */
function generate_csrf_token(): string
{
    if (empty($_SESSION['csrf_token'])) {
        $_SESSION['csrf_token'] = bin2hex(random_bytes(32));
    }
    return $_SESSION['csrf_token'];
}

/**
 * Verify CSRF token
 *
 * @param string $token
 * @return bool
 */
function verify_csrf_token(string $token): bool
{
    return isset($_SESSION['csrf_token']) && hash_equals($_SESSION['csrf_token'], $token);
}

/**
 * Database connection
 *
 * @return PDO
 */
function get_db_connection(): PDO
{
    static $pdo = null;
    
    if ($pdo === null) {
        try {
            $dsn = sprintf('mysql:host=%s;dbname=%s;charset=utf8mb4', DB_HOST, DB_NAME);
            $pdo = new PDO($dsn, DB_USER, DB_PASS, [
                PDO::ATTR_ERRMODE => PDO::ERRMODE_EXCEPTION,
                PDO::ATTR_DEFAULT_FETCH_MODE => PDO::FETCH_ASSOC,
                PDO::ATTR_EMULATE_PREPARES => false
            ]);
        } catch (PDOException $e) {
            error_log('Database Connection Error: ' . $e->getMessage());
            throw new RuntimeException('Database connection failed');
        }
    }
    
    return $pdo;
}

/**
 * Generate a URL path without .php extension
 * 
 * @param string $path The file path (e.g., 'about.php', 'contact.php')
 * @return string The SEO-friendly URL path
 */
function url_path(string $path): string
{
    // Get base URL - handles both localhost and production domain
    $is_secure = (!empty($_SERVER['HTTPS']) && $_SERVER['HTTPS'] !== 'off') || 
                 (isset($_SERVER['SERVER_PORT']) && $_SERVER['SERVER_PORT'] == 443) ||
                 (isset($_SERVER['HTTP_X_FORWARDED_PROTO']) && $_SERVER['HTTP_X_FORWARDED_PROTO'] == 'https');
    
    $base_url = ($is_secure ? "https" : "http") . "://" . $_SERVER['HTTP_HOST'];
    
    // Add directory path if on localhost/subdirectory
    $script_name = dirname($_SERVER['SCRIPT_NAME']);
    $base_path = ($script_name !== '/' && $script_name !== '\\') ? $script_name : '';
    
    // Remove .php extension for internal links
    if (strpos($path, '.php') !== false) {
        $path = str_replace('.php', '', $path);
    }
    
    // Handle special case for home page
    if ($path === 'index') {
        return $base_url . $base_path . '/';
    }
    
    return $base_url . $base_path . '/' . $path;
}

/**
 * Check if the current page matches the given path
 * 
 * @param string $path The path to check against
 * @return string CSS class 'active' if current page matches the path
 */
function is_active_page(string $path): string
{
    $current_page = basename($_SERVER['PHP_SELF']);
    return ($current_page === $path) ? 'active' : '';
}

/**
 * Format date
 *
 * @param string $date
 * @param string $format
 * @return string
 */
function format_date(string $date, string $format = 'd F Y'): string
{
    return date($format, strtotime($date));
}

/**
 * Redirect with flash message
 *
 * @param string $url
 * @param string $message
 * @param string $type
 * @return void
 */
function redirect_with_message(string $url, string $message, string $type = 'success'): void
{
    $_SESSION['flash_message'] = [
        'message' => $message,
        'type' => $type
    ];
    header("Location: $url");
    exit;
}

/**
 * Get and clear flash message
 *
 * @return array|null
 */
function get_flash_message(): ?array
{
    $message = $_SESSION['flash_message'] ?? null;
    unset($_SESSION['flash_message']);
    return $message;
} 