<?php
declare(strict_types=1);

/**
 * Blog Page
 * 
 * @package SathyaSaiSchool
 */

// Include necessary configuration and header
require_once 'includes/config.php';
require_once 'includes/header.php';
?>

<main class="blog-page">
    <!-- Page Title -->
    <section class="page-title">
        <div class="container">
            <div class="row">
                <div class="col-12">
                    <h1>Blog</h1>
                    <nav aria-label="breadcrumb">
                        <ol class="breadcrumb">
                            <li class="breadcrumb-item"><a href="./">Home</a></li>
                            <li class="breadcrumb-item active" aria-current="page">Blog</li>
                        </ol>
                    </nav>
                </div>
            </div>
        </div>
    </section>

    <!-- Blog Posts Section -->
    <section class="blog-posts py-5">
        <div class="container">
            <div class="row">
                <!-- Example Blog Post -->
                <div class="col-md-4 mb-4">
                    <div class="card h-100">
                        <img src="assets/images/blog-placeholder.jpg" class="card-img-top" alt="Blog Post">
                        <div class="card-body">
                            <h3 class="h5 card-title">Blog Post Title</h3>
                            <p class="card-text">This is a short excerpt from the blog post. It provides a brief overview of the content.</p>
                            <a href="#" class="btn btn-primary">Read More</a>
                        </div>
                    </div>
                </div>
                <!-- Repeat for more blog posts -->
            </div>
        </div>
    </section>
</main>

<?php
// Include footer
require_once 'includes/footer.php';
?> 