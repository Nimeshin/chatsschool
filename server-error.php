<?php
declare(strict_types=1);

/**
 * 500 Server Error Page
 * 
 * @package SathyaSaiSchool
 */

// Set HTTP response code
http_response_code(500);

// Include necessary configuration and header
require_once 'includes/config.php';
require_once 'includes/header.php';
?>

<main class="error-page py-5">
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-md-8 text-center">
                <h1 class="display-1 text-primary">500</h1>
                <h2 class="mb-4">Server Error</h2>
                <p class="lead mb-5">We're sorry, but something went wrong on our server. Please try again later.</p>
                <div class="d-flex justify-content-center gap-3">
                    <a href="<?= url_path('index') ?>" class="btn btn-primary">Go to Home</a>
                    <a href="<?= url_path('contact.php') ?>" class="btn btn-outline-primary">Contact Us</a>
                </div>
            </div>
        </div>
    </div>
</main>

<?php
// Include footer
require_once 'includes/footer.php';
?> 