<?php
declare(strict_types=1);

/**
 * Contact Form Handler with PHPMailer
 * 
 * @package SathyaSaiSchool
 */

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

// Check if it's a POST request
if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    try {
        // Verify CSRF token
        if (!verify_csrf_token($_POST['csrf_token'] ?? '')) {
            throw new Exception('Invalid request. Please try again.');
        }

        // Sanitize and validate input
        $name = trim(filter_input(INPUT_POST, 'name', FILTER_SANITIZE_FULL_SPECIAL_CHARS) ?? '');
        $email = trim(filter_input(INPUT_POST, 'email', FILTER_SANITIZE_EMAIL) ?? '');
        $phone = trim(filter_input(INPUT_POST, 'phone', FILTER_SANITIZE_FULL_SPECIAL_CHARS) ?? '');
        $subject = trim(filter_input(INPUT_POST, 'subject', FILTER_SANITIZE_FULL_SPECIAL_CHARS) ?? '');
        $message = trim(filter_input(INPUT_POST, 'message', FILTER_SANITIZE_FULL_SPECIAL_CHARS) ?? '');

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

        // Log the contact form submission
        $log_file = ROOT_PATH . 'contact_submissions.log';
        $log_line = json_encode($contact_data) . "\n";
        file_put_contents($log_file, $log_line, FILE_APPEND | LOCK_EX);

        // Try to send email using PHPMailer
        $email_sent = false;
        $auto_reply_sent = false;
        
        try {
            $mailService = new MailService();
            
            // Send main contact email
            $email_sent = $mailService->sendContactForm($contact_data);
            
            // Send auto-reply if main email was successful
            if ($email_sent) {
                $auto_reply_sent = $mailService->sendAutoReply($contact_data);
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

// Ensure clean output
if (ob_get_length()) ob_clean();

// Return JSON response
echo json_encode($response, JSON_UNESCAPED_UNICODE);
exit; 