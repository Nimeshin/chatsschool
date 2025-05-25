<?php
declare(strict_types=1);

/**
 * Home Page
 * 
 * @package SathyaSaiSchool
 */

// Include necessary configuration and header
require_once 'includes/config.php';
require_once 'includes/header.php';
?>

<!-- Hero Section -->
<header class="hero-section position-relative">
    <div id="heroCarousel" class="carousel slide carousel-fade" data-bs-ride="carousel" data-bs-interval="5000">
        <div class="carousel-inner">
            <div class="carousel-item active" data-bs-interval="7000">
                <img src="assets/images/hero-bg.jpg" class="d-block w-100" alt="School Building">
            </div>
            <div class="carousel-item" data-bs-interval="7000">
                <img src="assets/images/hero-bg-2.jpg" class="d-block w-100" alt="School Activities">
            </div>
        </div>
        <button class="carousel-control-prev" type="button" data-bs-target="#heroCarousel" data-bs-slide="prev">
            <span class="carousel-control-prev-icon" aria-hidden="true"></span>
            <span class="visually-hidden">Previous</span>
        </button>
        <button class="carousel-control-next" type="button" data-bs-target="#heroCarousel" data-bs-slide="next">
            <span class="carousel-control-next-icon" aria-hidden="true"></span>
            <span class="visually-hidden">Next</span>
        </button>
    </div>
    <div class="hero-content position-absolute top-0 start-0 w-100 h-100">
        <div class="container h-100">
            <div class="row h-100 align-items-center">
                <div class="col-12 text-white text-center">
                    <h1 class="display-4 mb-4"><?= escape_html(SITE_NAME) ?></h1>
                    <h2 class="h3 mb-4">Cultivating Character, Inspiring Excellence, Transforming Lives</h2>
                    <p class="lead mb-4">Welcome to Sathya Sai School Chatsworth, where academic excellence meets holistic development through the principles of Sathya Sai Educare. Our school is a beacon of value-based education, nurturing students into responsible, compassionate, and enlightened individuals.</p>
                    <a href="contact.php" class="btn btn-primary btn-lg">Contact us</a>
                </div>
            </div>
        </div>
    </div>
</header>

<!-- Welcome Section -->
<section class="welcome-section py-5" id="about">
    <div class="container">
        <div class="row">
            <div class="col-md-6">
                <h2 class="section-title mb-4">A Legacy of Excellence</h2>
                <p class="lead mb-4">Founded on the divine teachings of Sri Sathya Sai Baba, our school stands as a model of value-integrated education. We believe that "The End of Education is Character," and our mission is to inspire students to develop human values alongside academic achievements.</p>
                <h3 class="h4 mt-4 mb-3">Our Core Values</h3>
                <ul class="core-values list-unstyled">
                    <li>
                        <span class="blue-dot"></span>
                        Truth – Living with honesty and integrity
                    </li>
                    <li>
                        <span class="blue-dot"></span>
                        Right Conduct – Acting with discipline and responsibility
                    </li>
                    <li>
                        <span class="blue-dot"></span>
                        Peace – Developing inner harmony and mindfulness
                    </li>
                    <li>
                        <span class="blue-dot"></span>
                        Love – Cultivating compassion and selflessness
                    </li>
                    <li>
                        <span class="blue-dot"></span>
                        Non-Violence – Promoting respect for all life
                    </li>
                </ul>
                <a href="about.php" class="btn btn-primary mt-4">Learn More</a>
            </div>
            <div class="col-md-6">
                <div class="image-container">
                    <img src="assets/images/about-image.jpg" alt="School Values" class="img-fluid rounded shadow">
                </div>
            </div>
        </div>
    </div>
</section>

<!-- Featured Programs Section -->
<section class="featured-programs py-5 bg-light">
    <div class="container">
        <h2 class="text-center mb-5">Our Educational Programs</h2>
        <div class="row g-4">
            <div class="col-md-4">
                <div class="card h-100 shadow-sm">
                    <div class="card-body">
                        <h3 class="h5 card-title">Foundation Phase</h3>
                        <p class="card-text">Building strong literacy and numeracy skills alongside value-based education for Grades R-3.</p>
                        <a href="academics.php#foundation" class="btn btn-outline-primary">Learn More</a>
                    </div>
                </div>
            </div>
            <div class="col-md-4">
                <div class="card h-100 shadow-sm">
                    <div class="card-body">
                        <h3 class="h5 card-title">Intermediate Phase</h3>
                        <p class="card-text">Strengthening academic foundations with a focus on ethics and moral values for Grades 4-6.</p>
                        <a href="academics.php#intermediate" class="btn btn-outline-primary">Learn More</a>
                    </div>
                </div>
            </div>
            <div class="col-md-4">
                <div class="card h-100 shadow-sm">
                    <div class="card-body">
                        <h3 class="h5 card-title">Senior Phase</h3>
                        <p class="card-text">Preparing students for academic excellence and character development in Grade 7.</p>
                        <a href="academics.php#senior" class="btn btn-outline-primary">Learn More</a>
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
            <a href="admissions.php" class="btn btn-light btn-lg">Apply Now</a>
            <a href="contact.php" class="btn btn-outline-light btn-lg">Contact Us</a>
        </div>
    </div>
</section>

<?php
// Include footer
require_once 'includes/footer.php';
?> 