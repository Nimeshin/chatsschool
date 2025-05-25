<?php
declare(strict_types=1);

/**
 * Contact Form Handler
 * 
 * @package SathyaSaiSchool
 */

// Include configuration
require_once 'config.php';

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
        $name = filter_input(INPUT_POST, 'name', FILTER_SANITIZE_STRING);
        $email = filter_input(INPUT_POST, 'email', FILTER_SANITIZE_EMAIL);
        $phone = filter_input(INPUT_POST, 'phone', FILTER_SANITIZE_STRING);
        $subject = filter_input(INPUT_POST, 'subject', FILTER_SANITIZE_STRING);
        $message = filter_input(INPUT_POST, 'message', FILTER_SANITIZE_STRING);

        // Validate required fields
        if (!$name || !$email || !$subject || !$message) {
            throw new Exception('Please fill in all required fields.');
        }

        // Validate email
        if (!filter_var($email, FILTER_VALIDATE_EMAIL)) {
            throw new Exception('Please enter a valid email address.');
        }

        // Prepare email content
        $to = ADMIN_EMAIL;
        $email_subject = "New Contact Form Submission: " . $subject;
        
        $email_body = "You have received a new message from the contact form.\n\n";
        $email_body .= "Name: " . $name . "\n";
        $email_body .= "Email: " . $email . "\n";
        if ($phone) {
            $email_body .= "Phone: " . $phone . "\n";
        }
        $email_body .= "Subject: " . $subject . "\n\n";
        $email_body .= "Message:\n" . $message . "\n";

        // Basic email headers
        $headers = "";
        $headers .= "From: " . SITE_NAME . " <contact@saischoolchats.co.za>\r\n";
        $headers .= "Reply-To: " . $email . "\r\n";
        $headers .= "Content-Type: text/plain; charset=UTF-8\r\n";
        $headers .= "MIME-Version: 1.0\r\n";
        $headers .= "X-Mailer: PHP/" . phpversion();

        // Additional parameters for mail()
        $additional_params = "-f contact@saischoolchats.co.za";

        // Send email
        if (!mail($to, $email_subject, $email_body, $headers, $additional_params)) {
            throw new Exception('Failed to send email. Please try again later.');
        }

        // Send auto-reply
        $auto_reply_subject = "Thank you for contacting " . SITE_NAME;
        $auto_reply_message = "Dear " . $name . ",\n\n";
        $auto_reply_message .= "Thank you for contacting us. We have received your message and will respond as soon as possible.\n\n";
        $auto_reply_message .= "Best regards,\n";
        $auto_reply_message .= SITE_NAME . " Team";

        // Auto-reply headers
        $auto_headers = "";
        $auto_headers .= "From: " . SITE_NAME . " <contact@saischoolchats.co.za>\r\n";
        $auto_headers .= "Reply-To: " . ADMIN_EMAIL . "\r\n";
        $auto_headers .= "Content-Type: text/plain; charset=UTF-8\r\n";
        $auto_headers .= "MIME-Version: 1.0\r\n";
        $auto_headers .= "X-Mailer: PHP/" . phpversion();

        // Send auto-reply with additional parameters
        mail($email, $auto_reply_subject, $auto_reply_message, $auto_headers, $additional_params);

        $response['success'] = true;
        $response['message'] = 'Thank you for your message. We will get back to you soon.';

    } catch (Exception $e) {
        error_log('Contact Form Error: ' . $e->getMessage());
        $response['message'] = $e->getMessage();
    }
} else {
    $response['message'] = 'Invalid request method.';
}

// Ensure clean output
if (ob_get_length()) ob_clean();

// Set proper JSON headers
header('Content-Type: application/json');
header('Cache-Control: no-cache, must-revalidate');
header('Access-Control-Allow-Origin: ' . SITE_URL);
header('Access-Control-Allow-Methods: POST');
header('Access-Control-Allow-Headers: Content-Type, Accept');

// Return JSON response
echo json_encode($response); 