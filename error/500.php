<?php
declare(strict_types=1);

/**
 * 500 Error Page
 * 
 * @package SathyaSaiSchool
 */

// Include necessary configuration and header
require_once '../includes/config.php';
require_once '../includes/header.php';
?>

<main class="error-page">
    <!-- Page Title -->
    <section class="page-title">
        <div class="container">
            <div class="row">
                <div class="col-12">
                    <h1>500 - Server Error</h1>
                    <nav aria-label="breadcrumb">
                        <ol class="breadcrumb">
                            <li class="breadcrumb-item"><a href="<?= url_path('index') ?>">Home</a></li>
                            <li class="breadcrumb-item active" aria-current="page">500 Error</li>
                        </ol>
                    </nav>
                </div>
            </div>
        </div>
    </section>

    <!-- Error Message Section -->
    <section class="error-message-section py-5">
        <div class="container">
            <div class="row justify-content-center">
                <div class="col-lg-8 text-center">
                    <div class="error-icon mb-4">
                        <i class="fa-solid fa-server fa-5x text-primary"></i>
                    </div>
                    <h2 class="h3 mb-4">Oops! Something Went Wrong</h2>
                    <p class="lead mb-4">We're experiencing some technical difficulties right now.</p>
                    <p class="mb-5">Our team has been notified and is working to fix the issue. Please try again later or contact us if the problem persists.</p>
                    <div class="d-flex justify-content-center gap-3">
                        <a href="<?= url_path('index') ?>" class="btn btn-primary">
                            <i class="fa-solid fa-house me-2"></i>Return to Homepage
                        </a>
                        <a href="<?= url_path('contact') ?>" class="btn btn-outline-primary">
                            <i class="fa-solid fa-envelope me-2"></i>Contact Support
                        </a>
                    </div>
                </div>
            </div>
        </div>
    </section>
</main>

<style>
.error-page .error-message-section {
    min-height: 50vh;
    display: flex;
    align-items: center;
}

.error-page .error-icon {
    color: var(--primary-color);
    opacity: 0.8;
}

.error-page .btn {
    padding: 0.75rem 1.5rem;
    font-weight: 500;
    border-radius: 4px;
    transition: all 0.3s ease;
}

.error-page .btn:hover {
    transform: translateY(-3px);
    box-shadow: 0 4px 8px rgba(0, 0, 0, 0.1);
}
</style>

<?php
// Include footer
require_once '../includes/footer.php';
?> 