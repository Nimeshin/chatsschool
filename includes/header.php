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

// Calculate base path for assets
$script_name = dirname($_SERVER['SCRIPT_NAME']);
$base_path = $script_name !== '/' ? $script_name : '';
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title><?= escape_html(SITE_NAME) ?></title>
    
    <!-- Meta tags -->
    <meta name="description" content="Sathya Sai School Chatsworth - Cultivating Character, Inspiring Excellence, Transforming Lives">
    <meta name="keywords" content="Sathya Sai School, Chatsworth, Education, Values, Academic Excellence">
    
    <!-- Favicon -->
    <link rel="icon" type="image/x-icon" href="<?= $base_path ?? '' ?>/assets/images/favicon.ico">
    
    <!-- CSS -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">
    <link href="https://fonts.googleapis.com/css2?family=Open+Sans:wght@400;600;700&display=swap" rel="stylesheet">
    <link href="<?= $base_path ?? '' ?>/assets/css/style.css" rel="stylesheet">
    <?php if (basename($_SERVER['PHP_SELF']) === 'academics.php'): ?>
    <link href="<?= $base_path ?? '' ?>/assets/css/academics.css" rel="stylesheet">
    <?php endif; ?>
    
    <!-- Scripts -->
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js" defer></script>
    <script src="<?= $base_path ?? '' ?>/assets/js/main.js" defer></script>
</head>
<body>
    <!-- Header -->
    <header class="site-header">
        <nav class="navbar navbar-expand-lg navbar-light bg-light">
            <div class="container">
                <a class="navbar-brand" href="<?= url_path('index') ?>">
                    <img src="<?= $base_path ?? '' ?>/assets/images/logo.png" alt="<?= escape_html(SITE_NAME) ?>" height="50">
                </a>
                
                <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarMain">
                    <span class="navbar-toggler-icon"></span>
                </button>
                
                <div class="collapse navbar-collapse" id="navbarMain">
                    <ul class="navbar-nav ms-auto">
                        <li class="nav-item">
                            <a class="nav-link <?= is_active_page('index.php') ?>" href="<?= url_path('index') ?>">Home</a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link <?= is_active_page('about.php') ?>" href="<?= url_path('about.php') ?>">About Us</a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link <?= is_active_page('academics.php') ?>" href="<?= url_path('academics.php') ?>">Academics</a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link <?= is_active_page('admissions.php') ?>" href="<?= url_path('admissions.php') ?>">Admissions</a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link <?= is_active_page('contact.php') ?>" href="<?= url_path('contact.php') ?>">Contact</a>
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
        <button type="button" class="btn-close" data-bs-dismiss="alert"></button>
    </div>
    <?php endif; ?>

    <!-- Main Content Start --> 