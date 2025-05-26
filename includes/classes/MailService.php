<?php
declare(strict_types=1);

namespace SathyaSaiSchool;

use PHPMailer\PHPMailer\PHPMailer;
use PHPMailer\PHPMailer\SMTP;
use PHPMailer\PHPMailer\Exception;

/**
 * Mail Service Class using PHPMailer
 * 
 * @package SathyaSaiSchool
 */
class MailService
{
    private PHPMailer $mailer;
    private array $config;

    public function __construct()
    {
        $this->config = get_mail_config();
        $this->mailer = new PHPMailer(true);
        $this->configureSMTP();
    }

    /**
     * Configure SMTP settings
     */
    private function configureSMTP(): void
    {
        try {
            // Server settings
            $this->mailer->SMTPDebug = $this->config['debug'];
            $this->mailer->isSMTP();
            $this->mailer->Host = $this->config['host'];
            $this->mailer->Port = $this->config['port'];
            
            // Authentication
            $this->mailer->SMTPAuth = true; // Always use authentication for cPanel
            $this->mailer->Username = $this->config['username'];
            $this->mailer->Password = $this->config['password'];
            
            // Encryption
            if ($this->config['encryption'] === 'ssl') {
                $this->mailer->SMTPSecure = PHPMailer::ENCRYPTION_SMTPS;
            } elseif ($this->config['encryption'] === 'tls') {
                $this->mailer->SMTPSecure = PHPMailer::ENCRYPTION_STARTTLS;
            }
            
            // Debug settings
            $this->mailer->Debugoutput = function($str, $level) {
                error_log("PHPMailer Debug ($level): $str");
            };
            
            // Additional settings
            $this->mailer->CharSet = 'UTF-8';
            $this->mailer->Encoding = 'base64';
            $this->mailer->Timeout = 60; // Increase timeout for slower connections
            
            // Set default from address
            $this->mailer->setFrom($this->config['from_email'], $this->config['from_name']);
            
        } catch (Exception $e) {
            error_log('PHPMailer Configuration Error: ' . $e->getMessage());
            throw new \RuntimeException('Mail service configuration failed: ' . $e->getMessage());
        }
    }

    /**
     * Send contact form email
     * 
     * @param array $data Contact form data
     * @return bool Success status
     * @throws Exception
     */
    public function sendContactForm(array $data): bool
    {
        try {
            // Clear any previous recipients
            $this->mailer->clearAddresses();
            $this->mailer->clearReplyTos();
            $this->mailer->clearAttachments();
            
            // Recipients
            $this->mailer->addAddress($this->config['reply_to']); // Admin email
            $this->mailer->addReplyTo($data['email'], $data['name']);
            
            // Content
            $this->mailer->Subject = 'New Contact Form Submission: ' . $data['subject'];
            
            $body = "You have received a new message from the contact form.\n\n";
            $body .= "Name: " . $data['name'] . "\n";
            $body .= "Email: " . $data['email'] . "\n";
            if (!empty($data['phone'])) {
                $body .= "Phone: " . $data['phone'] . "\n";
            }
            $body .= "Subject: " . $data['subject'] . "\n\n";
            $body .= "Message:\n" . $data['message'] . "\n\n";
            $body .= "Submitted on: " . date('Y-m-d H:i:s') . "\n";
            $body .= "IP Address: " . ($data['ip'] ?? 'unknown');
            
            $this->mailer->Body = $body;
            $this->mailer->isHTML(false); // Send as plain text
            
            $result = $this->mailer->send();
            
            if ($result) {
                // Try to send auto-reply
                try {
                    $this->sendAutoReply($data);
                } catch (Exception $e) {
                    error_log('Auto-reply failed: ' . $e->getMessage());
                    // Don't throw the error as the main email was sent successfully
                }
            }
            
            return $result;
            
        } catch (Exception $e) {
            error_log('PHPMailer Send Error: ' . $e->getMessage());
            throw new \RuntimeException('Failed to send email: ' . $e->getMessage());
        }
    }

    /**
     * Send auto-reply email to contact form submitter
     * 
     * @param array $data Contact form data
     * @return bool Success status
     */
    public function sendAutoReply(array $data): bool
    {
        try {
            // Clear any previous recipients
            $this->mailer->clearAddresses();
            $this->mailer->clearReplyTos();
            
            // Recipients
            $this->mailer->addAddress($data['email'], $data['name']);
            $this->mailer->addReplyTo($this->config['reply_to'], $this->config['from_name']);
            
            // Content
            $this->mailer->Subject = 'Thank you for contacting ' . $this->config['from_name'];
            
            $body = "Dear " . $data['name'] . ",\n\n";
            $body .= "Thank you for contacting us. We have received your message and will respond as soon as possible.\n\n";
            $body .= "Your message:\n";
            $body .= "Subject: " . $data['subject'] . "\n";
            $body .= "Message: " . $data['message'] . "\n\n";
            $body .= "If you need immediate assistance, please call us at 031 402 1740.\n\n";
            $body .= "Best regards,\n";
            $body .= $this->config['from_name'] . " Team\n\n";
            $body .= "---\n";
            $body .= "This is an automated response. Please do not reply to this email.";
            
            $this->mailer->Body = $body;
            $this->mailer->isHTML(false); // Send as plain text
            
            return $this->mailer->send();
            
        } catch (Exception $e) {
            error_log('PHPMailer Auto-Reply Error: ' . $e->getMessage());
            return false; // Don't throw exception for auto-reply failures
        }
    }

    /**
     * Test mail configuration
     * 
     * @param string $testEmail Email to send test to
     * @return array Test results
     */
    public function testConfiguration(string $testEmail = ''): array
    {
        $results = [
            'smtp_connect' => false,
            'send_test' => false,
            'errors' => []
        ];

        try {
            // Test SMTP connection
            if ($this->mailer->smtpConnect()) {
                $results['smtp_connect'] = true;
                
                // Test sending if email provided
                if (!empty($testEmail)) {
                    $this->mailer->clearAddresses();
                    $this->mailer->addAddress($testEmail);
                    $this->mailer->Subject = 'Test Email from ' . $this->config['from_name'];
                    $this->mailer->Body = 'This is a test email to verify PHPMailer configuration.';
                    $this->mailer->isHTML(false);
                    
                    $results['send_test'] = $this->mailer->send();
                }
                
                $this->mailer->smtpClose();
            }
        } catch (Exception $e) {
            $results['errors'][] = $e->getMessage();
            error_log('Mail Configuration Test Error: ' . $e->getMessage());
        }

        return $results;
    }

    /**
     * Get mailer instance for advanced usage
     * 
     * @return PHPMailer
     */
    public function getMailer(): PHPMailer
    {
        return $this->mailer;
    }
} 