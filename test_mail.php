<?php
declare(strict_types=1);

require_once 'includes/config.php';
require_once 'vendor/autoload.php';

use SathyaSaiSchool\MailService;

try {
    $mailService = new MailService();
    
    // Test the configuration
    $results = $mailService->testConfiguration('contact@saischoolchats.co.za');
    
    echo "SMTP Connection Test:\n";
    echo "--------------------\n";
    echo "Connection successful: " . ($results['smtp_connect'] ? 'Yes' : 'No') . "\n";
    
    if ($results['send_test']) {
        echo "Test email sent successfully!\n";
    } else {
        echo "Failed to send test email.\n";
    }
    
    if (!empty($results['errors'])) {
        echo "\nErrors encountered:\n";
        foreach ($results['errors'] as $error) {
            echo "- $error\n";
        }
    }
    
} catch (Exception $e) {
    echo "Error: " . $e->getMessage() . "\n";
} 