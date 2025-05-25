<?php
declare(strict_types=1);

/**
 * Contact Form Handler
 * 
 * @package SathyaSaiSchool
 */

// Include configuration
require_once 'config.php';

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

        // Log the contact form submission
        $log_entry = [
            'timestamp' => date('Y-m-d H:i:s'),
            'name' => $name,
            'email' => $email,
            'phone' => $phone,
            'subject' => $subject,
            'message' => $message,
            'ip' => $_SERVER['REMOTE_ADDR'] ?? 'unknown'
        ];

        // Try to save to a log file
        $log_file = ROOT_PATH . 'contact_submissions.log';
        $log_line = json_encode($log_entry) . "\n";
        file_put_contents($log_file, $log_line, FILE_APPEND | LOCK_EX);

        // Try to send email if mail function is available
        $email_sent = false;
        if (function_exists('mail')) {
            try {
                // Prepare email content
                $to = ADMIN_EMAIL;
                $email_subject = "New Contact Form Submission: " . $subject;
                
                $email_body = "You have received a new message from the contact form.\n\n";
                $email_body .= "Name: " . $name . "\n";
                $email_body .= "Email: " . $email . "\n";
                if (!empty($phone)) {
                    $email_body .= "Phone: " . $phone . "\n";
                }
                $email_body .= "Subject: " . $subject . "\n\n";
                $email_body .= "Message:\n" . $message . "\n\n";
                $email_body .= "Submitted on: " . date('Y-m-d H:i:s') . "\n";
                $email_body .= "IP Address: " . ($_SERVER['REMOTE_ADDR'] ?? 'unknown');

                // Basic email headers
                $headers = [];
                $headers[] = "From: " . SITE_NAME . " <noreply@saischoolchats.co.za>";
                $headers[] = "Reply-To: " . $email;
                $headers[] = "Content-Type: text/plain; charset=UTF-8";
                $headers[] = "MIME-Version: 1.0";
                $headers[] = "X-Mailer: PHP/" . phpversion();

                // Send email
                $email_sent = mail($to, $email_subject, $email_body, implode("\r\n", $headers));

                // Send auto-reply if main email was sent successfully
                if ($email_sent) {
                    $auto_reply_subject = "Thank you for contacting " . SITE_NAME;
                    $auto_reply_message = "Dear " . $name . ",\n\n";
                    $auto_reply_message .= "Thank you for contacting us. We have received your message and will respond as soon as possible.\n\n";
                    $auto_reply_message .= "Your message:\n";
                    $auto_reply_message .= "Subject: " . $subject . "\n";
                    $auto_reply_message .= "Message: " . $message . "\n\n";
                    $auto_reply_message .= "Best regards,\n";
                    $auto_reply_message .= SITE_NAME . " Team";

                    // Auto-reply headers
                    $auto_headers = [];
                    $auto_headers[] = "From: " . SITE_NAME . " <noreply@saischoolchats.co.za>";
                    $auto_headers[] = "Reply-To: " . ADMIN_EMAIL;
                    $auto_headers[] = "Content-Type: text/plain; charset=UTF-8";
                    $auto_headers[] = "MIME-Version: 1.0";
                    $auto_headers[] = "X-Mailer: PHP/" . phpversion();

                    // Send auto-reply
                    mail($email, $auto_reply_subject, $auto_reply_message, implode("\r\n", $auto_headers));
                }
            } catch (Exception $mail_error) {
                error_log('Contact Form Mail Error: ' . $mail_error->getMessage());
                // Don't throw exception here, just log it
            }
        }

        // Success response regardless of email status
        $response['success'] = true;
        if ($email_sent) {
            $response['message'] = 'Thank you for your message. We have received it and will get back to you soon.';
        } else {
            $response['message'] = 'Thank you for your message. We have received it and will contact you soon. If urgent, please call us directly at 031 402 1740.';
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