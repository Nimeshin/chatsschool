<?php
declare(strict_types=1);

// Start output buffering
ob_start();

/**
 * Contact Form Handler with PHPMailer
 * 
 * @package SathyaSaiSchool
 */

// Enable error reporting for debugging
error_reporting(E_ALL);
ini_set('display_errors', '1');

// Include configuration
require_once 'config.php';

use SathyaSaiSchool\MailService;

// Set proper headers first
header('Content-Type: application/json');
header('Cache-Control: no-cache, must-revalidate');

// Initialize response array
$response = [
    'success' => false,
    'message' => ''
];

// Debug: Log request method and data
error_log('Request Method: ' . $_SERVER['REQUEST_METHOD']);
error_log('POST Data: ' . print_r($_POST, true));
error_log('Session Data: ' . print_r($_SESSION, true));

// Check if it's a POST request
if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    try {
        // Debug: Check CSRF token
        error_log('Received CSRF Token: ' . ($_POST['csrf_token'] ?? 'not set'));
        error_log('Session CSRF Token: ' . ($_SESSION['csrf_token'] ?? 'not set'));
        
        // Verify CSRF token
        if (!verify_csrf_token($_POST['csrf_token'] ?? '')) {
            throw new Exception('Invalid request. Please try again. (CSRF validation failed)');
        }

        // Sanitize and validate input
        $name = trim(filter_input(INPUT_POST, 'name', FILTER_SANITIZE_FULL_SPECIAL_CHARS) ?? '');
        $email = trim(filter_input(INPUT_POST, 'email', FILTER_SANITIZE_EMAIL) ?? '');
        $phone = trim(filter_input(INPUT_POST, 'phone', FILTER_SANITIZE_FULL_SPECIAL_CHARS) ?? '');
        $subject = trim(filter_input(INPUT_POST, 'subject', FILTER_SANITIZE_FULL_SPECIAL_CHARS) ?? '');
        $message = trim(filter_input(INPUT_POST, 'message', FILTER_SANITIZE_FULL_SPECIAL_CHARS) ?? '');

        // Debug: Log sanitized input
        error_log('Sanitized Input:');
        error_log("Name: $name");
        error_log("Email: $email");
        error_log("Phone: $phone");
        error_log("Subject: $subject");
        error_log("Message: $message");

        // Validate required fields
        if (empty($name) || empty($email) || empty($subject) || empty($message)) {
            throw new Exception('Please fill in all required fields.');
        }

        // Validate email
        if (!filter_var($email, FILTER_VALIDATE_EMAIL)) {
            throw new Exception('Please enter a valid email address.');
        }

        // Validate message length
        if (strlen($message) < 10) {
            throw new Exception('Please enter a more detailed message (at least 10 characters).');
        }

        // Prepare data array
        $contact_data = [
            'name' => $name,
            'email' => $email,
            'phone' => $phone,
            'subject' => $subject,
            'message' => $message,
            'ip' => $_SERVER['REMOTE_ADDR'] ?? 'unknown',
            'timestamp' => date('Y-m-d H:i:s')
        ];

        // Debug: Log contact data
        error_log('Contact Data: ' . print_r($contact_data, true));

        // Log the contact form submission
        try {
            // Use the logs directory instead of root
            $log_dir = dirname(dirname(__FILE__)) . '/logs';
            if (!is_dir($log_dir)) {
                mkdir($log_dir, 0755, true);
            }
            $log_file = $log_dir . '/contact_submissions.log';
            
            // Check if file exists and is writable, or can be created
            if ((!file_exists($log_file) && is_writable($log_dir)) || is_writable($log_file)) {
                $log_line = json_encode($contact_data) . "\n";
                if (file_put_contents($log_file, $log_line, FILE_APPEND | LOCK_EX) === false) {
                    error_log('Failed to write to log file: ' . $log_file);
                }
            } else {
                error_log('Log file is not writable: ' . $log_file);
            }
        } catch (Exception $log_error) {
            error_log('Error writing to log file: ' . $log_error->getMessage());
        }

        // Try to send email using PHPMailer
        $email_sent = false;
        $auto_reply_sent = false;
        
        try {
            $mailService = new MailService();
            
            // Debug: Log mail service initialization
            error_log('Mail service initialized');
            
            // Send main contact email
            $email_sent = $mailService->sendContactForm($contact_data);
            error_log('Main email sent: ' . ($email_sent ? 'true' : 'false'));
            
            // Send auto-reply if main email was successful
            if ($email_sent) {
                $auto_reply_sent = $mailService->sendAutoReply($contact_data);
                error_log('Auto-reply sent: ' . ($auto_reply_sent ? 'true' : 'false'));
            }
            
        } catch (Exception $mail_error) {
            error_log('PHPMailer Error: ' . $mail_error->getMessage());
            // Don't throw exception here, just log it
        }

        // Success response with appropriate message
        $response['success'] = true;
        
        if ($email_sent) {
            if ($auto_reply_sent) {
                $response['message'] = 'Thank you for your message! We have received it and sent you a confirmation email. We will get back to you soon.';
            } else {
                $response['message'] = 'Thank you for your message! We have received it and will get back to you soon.';
            }
        } else {
            $response['message'] = 'Thank you for your message! We have received it and will contact you soon. If urgent, please call us directly at 031 402 1740.';
        }

    } catch (Exception $e) {
        error_log('Contact Form Error: ' . $e->getMessage());
        $response['message'] = $e->getMessage();
    }
} else {
    $response['message'] = 'Invalid request method.';
}

// Debug: Log final response
error_log('Final Response: ' . print_r($response, true));

// Ensure clean output
if (ob_get_length()) ob_clean();

// Return JSON response
echo json_encode($response, JSON_UNESCAPED_UNICODE);
exit; 