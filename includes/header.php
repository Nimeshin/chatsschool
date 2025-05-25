<?php
declare(strict_types=1);

/**
 * Header Template
 * 
 * @package SathyaSaiSchool
 */

if (!defined('ROOT_PATH')) {
    exit('Direct script access denied.');
}

// Include SEO configuration
require_once INCLUDES_PATH . 'seo.php';

// Calculate base path for assets
$script_name = dirname($_SERVER['SCRIPT_NAME']);
$base_path = $script_name !== '/' ? $script_name : '';

// Get current page SEO data
$current_page = basename($_SERVER['PHP_SELF'], '.php');
$seo_data = get_seo_data($current_page);
$canonical_url = get_canonical_url();
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    
    <!-- Primary Meta Tags -->
    <title><?= escape_html($seo_data['title']) ?></title>
    <meta name="title" content="<?= escape_html($seo_data['title']) ?>">
    <meta name="description" content="<?= escape_html($seo_data['description']) ?>">
    <meta name="keywords" content="<?= escape_html($seo_data['keywords']) ?>">
    <meta name="author" content="Sathya Sai School Chatsworth">
    <meta name="robots" content="index, follow">
    <meta name="language" content="English">
    <meta name="revisit-after" content="7 days">
    
    <!-- Canonical URL -->
    <link rel="canonical" href="<?= escape_html($canonical_url) ?>">
    
    <!-- Open Graph / Facebook -->
    <meta property="og:type" content="<?= escape_html($seo_data['og_type']) ?>">
    <meta property="og:url" content="<?= escape_html($canonical_url) ?>">
    <meta property="og:title" content="<?= escape_html($seo_data['title']) ?>">
    <meta property="og:description" content="<?= escape_html($seo_data['description']) ?>">
    <meta property="og:image" content="<?= escape_html(SITE_URL . '/' . $seo_data['og_image']) ?>">
    <meta property="og:site_name" content="<?= escape_html(SITE_NAME) ?>">
    <meta property="og:locale" content="en_ZA">
    
    <!-- Twitter -->
    <meta property="twitter:card" content="summary_large_image">
    <meta property="twitter:url" content="<?= escape_html($canonical_url) ?>">
    <meta property="twitter:title" content="<?= escape_html($seo_data['title']) ?>">
    <meta property="twitter:description" content="<?= escape_html($seo_data['description']) ?>">
    <meta property="twitter:image" content="<?= escape_html(SITE_URL . '/' . $seo_data['og_image']) ?>">
    
    <!-- Favicon and Icons -->
    <link rel="icon" type="image/x-icon" href="<?= $base_path ?? '' ?>/assets/images/favicon.ico">
    <link rel="apple-touch-icon" sizes="180x180" href="<?= $base_path ?? '' ?>/assets/images/apple-touch-icon.png">
    <link rel="icon" type="image/png" sizes="32x32" href="<?= $base_path ?? '' ?>/assets/images/favicon-32x32.png">
    <link rel="icon" type="image/png" sizes="16x16" href="<?= $base_path ?? '' ?>/assets/images/favicon-16x16.png">
    
    <!-- Preconnect for performance -->
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link rel="preconnect" href="https://cdn.jsdelivr.net">
    
    <!-- CSS -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">
    <link href="https://fonts.googleapis.com/css2?family=Open+Sans:wght@400;600;700&display=swap" rel="stylesheet">
    <link href="<?= $base_path ?? '' ?>/assets/css/style.css" rel="stylesheet">
    <?php if (basename($_SERVER['PHP_SELF']) === 'academics.php'): ?>
    <link href="<?= $base_path ?? '' ?>/assets/css/academics.css" rel="stylesheet">
    <?php endif; ?>
    
    <!-- Structured Data -->
    <script type="application/ld+json">
    <?= get_organization_schema() ?>
    </script>
    
    <!-- Google Analytics (replace with your tracking ID) -->
    <!-- <script async src="https://www.googletagmanager.com/gtag/js?id=GA_TRACKING_ID"></script>
    <script>
        window.dataLayer = window.dataLayer || [];
        function gtag(){dataLayer.push(arguments);}
        gtag('js', new Date());
        gtag('config', 'GA_TRACKING_ID');
    </script> -->
    
    <!-- Scripts -->
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js" defer></script>
    <script src="<?= $base_path ?? '' ?>/assets/js/main.js" defer></script>
</head>
<body>
    <!-- Skip to main content for accessibility -->
    <a class="visually-hidden-focusable" href="#main-content">Skip to main content</a>
    
    <!-- Header -->
    <header class="site-header">
        <nav class="navbar navbar-expand-lg navbar-light bg-light" role="navigation" aria-label="Main navigation">
            <div class="container">
                <a class="navbar-brand" href="<?= url_path('index') ?>" aria-label="<?= escape_html(SITE_NAME) ?> Homepage">
                    <img src="<?= $base_path ?? '' ?>/assets/images/logo.png" alt="<?= escape_html(SITE_NAME) ?> Logo" height="50" width="auto">
                </a>
                
                <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarMain" aria-controls="navbarMain" aria-expanded="false" aria-label="Toggle navigation">
                    <span class="navbar-toggler-icon"></span>
                </button>
                
                <div class="collapse navbar-collapse" id="navbarMain">
                    <ul class="navbar-nav ms-auto" role="menubar">
                        <li class="nav-item" role="none">
                            <a class="nav-link <?= is_active_page('index.php') ?>" href="<?= url_path('index') ?>" role="menuitem">Home</a>
                        </li>
                        <li class="nav-item" role="none">
                            <a class="nav-link <?= is_active_page('about.php') ?>" href="<?= url_path('about.php') ?>" role="menuitem">About Us</a>
                        </li>
                        <li class="nav-item" role="none">
                            <a class="nav-link <?= is_active_page('academics.php') ?>" href="<?= url_path('academics.php') ?>" role="menuitem">Academics</a>
                        </li>
                        <li class="nav-item" role="none">
                            <a class="nav-link <?= is_active_page('admissions.php') ?>" href="<?= url_path('admissions.php') ?>" role="menuitem">Admissions</a>
                        </li>
                        <li class="nav-item" role="none">
                            <a class="nav-link <?= is_active_page('contact.php') ?>" href="<?= url_path('contact.php') ?>" role="menuitem">Contact</a>
                        </li>
                    </ul>
                </div>
            </div>
        </nav>
    </header>
    
    <!-- Flash Messages -->
    <?php if ($flash_message = get_flash_message()): ?>
    <div class="alert alert-<?= escape_html($flash_message['type']) ?> alert-dismissible fade show" role="alert">
        <?= escape_html($flash_message['message']) ?>
        <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
    </div>
    <?php endif; ?>

    <!-- Main Content Start -->
    <main id="main-content"> 