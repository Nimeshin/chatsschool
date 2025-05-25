<?php
declare(strict_types=1);

/**
 * About Page
 * 
 * @package SathyaSaiSchool
 */

// Include necessary configuration and header
require_once 'includes/config.php';
require_once 'includes/header.php';
?>

<!-- Page Title -->
<section class="page-title">
    <div class="container">
        <div class="row">
            <div class="col-12">
                <h1>About Us</h1>
                <nav aria-label="breadcrumb">
                    <ol class="breadcrumb">
                        <li class="breadcrumb-item"><a href="./">Home</a></li>
                        <li class="breadcrumb-item active" aria-current="page">About Us</li>
                    </ol>
                </nav>
            </div>
        </div>
    </div>
</section>

<!-- Legacy Section -->
<section class="about-section py-5">
    <div class="container">
        <div class="row align-items-center">
            <div class="col-md-6 mb-4 mb-md-0">
                <h2 class="section-title">A Legacy of Excellence</h2>
                <p class="lead mb-4">Founded on the divine teachings of Sri Sathya Sai Baba, our school stands as a model of value-integrated education. We believe that "The End of Education is Character," and our mission is to inspire students to develop human values alongside academic achievements.</p>
                <p>Since our establishment, we have been committed to providing holistic education that nurtures both the mind and spirit of our students. Our approach combines academic excellence with character development, creating well-rounded individuals who are prepared for life's challenges.</p>
            </div>
            <div class="col-md-6">
                <div class="founder-image">
                    <img src="assets/images/founder.jpg" alt="Sri Sathya Sai Baba" class="img-fluid rounded">
                </div>
            </div>
        </div>
    </div>
</section>

<!-- Founder Section -->
<section class="founder-section py-5">
    <div class="container">
        <div class="row">
            <div class="col-12 text-center mb-5">
                <h2 class="section-title">Our Founder: Sri Sathya Sai Baba</h2>
                <p class="lead">Sri Sathya Sai Baba envisioned a world where education is not just a means to a livelihood but a path to a noble and purposeful life. His philosophy, based on Truth, Right Conduct, Peace, Love, and Non-Violence, forms the foundation of our curriculum and school ethos.</p>
            </div>
        </div>
    </div>
</section>

<!-- Mission & Values Section -->
<section class="mission-section py-5">
    <div class="container">
        <div class="row g-4">
            <!-- Mission Card -->
            <div class="col-md-6">
                <div class="mission-card h-100">
                    <h2 class="section-title text-center mb-4">Our Vision: Education for Life</h2>
                    <p class="lead text-center mb-4">We are committed to:</p>
                    <ul class="mission-list">
                        <li>
                            <i class="fa-solid fa-check-circle text-primary"></i>
                            Providing a curriculum that integrates Sathya Sai Educare principles
                        </li>
                        <li>
                            <i class="fa-solid fa-check-circle text-primary"></i>
                            Fostering an environment of love, respect, and academic excellence
                        </li>
                        <li>
                            <i class="fa-solid fa-check-circle text-primary"></i>
                            Developing students with a strong moral compass and leadership skills
                        </li>
                        <li>
                            <i class="fa-solid fa-check-circle text-primary"></i>
                            Encouraging service to society and selfless acts of kindness
                        </li>
                    </ul>
                </div>
            </div>
            
            <!-- Values Card -->
            <div class="col-md-6">
                <div class="values-card h-100">
                    <h2 class="section-title text-center mb-4">Core Values</h2>
                    <div class="values-grid">
                        <div class="value-item animate-on-scroll">
                            <i class="fa-solid fa-star"></i>
                            <h4>Truth</h4>
                            <p>Living with honesty and integrity</p>
                        </div>
                        <div class="value-item animate-on-scroll">
                            <i class="fa-solid fa-hand-holding-heart"></i>
                            <h4>Right Conduct</h4>
                            <p>Acting with discipline and responsibility</p>
                        </div>
                        <div class="value-item animate-on-scroll">
                            <i class="fa-solid fa-dove"></i>
                            <h4>Peace</h4>
                            <p>Developing inner harmony and mindfulness</p>
                        </div>
                        <div class="value-item animate-on-scroll">
                            <i class="fa-solid fa-heart"></i>
                            <h4>Love</h4>
                            <p>Cultivating compassion and selflessness</p>
                        </div>
                        <div class="value-item grid-span-2 animate-on-scroll">
                            <i class="fa-solid fa-seedling"></i>
                            <h4>Non-Violence</h4>
                            <p>Promoting respect for all life</p>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</section>

<!-- Call to Action -->
<section class="cta-section py-5 bg-primary text-white">
    <div class="container text-center">
        <h2 class="mb-4">Join Our School Community</h2>
        <p class="lead mb-4">Experience the unique blend of academic excellence and value-based education at Sathya Sai School Chatsworth.</p>
        <div class="d-flex justify-content-center gap-3">
            <a href="<?= SITE_URL ?>/admissions.php" class="btn btn-light btn-lg">Apply Now</a>
            <a href="<?= SITE_URL ?>/contact.php" class="btn btn-outline-light btn-lg">Contact Us</a>
        </div>
    </div>
</section>

<?php
// Include footer
require_once 'includes/footer.php';
?>