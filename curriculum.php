<?php
declare(strict_types=1);

/**
 * Curriculum Page
 * 
 * @package SathyaSaiSchool
 */

// Include necessary configuration and header
require_once 'includes/config.php';
require_once 'includes/header.php';
?>

<main class="curriculum-page">
    <!-- Page Title -->
    <section class="page-title">
        <div class="container">
            <div class="row">
                <div class="col-12">
                    <h1>Detailed Curriculum</h1>
                    <nav aria-label="breadcrumb">
                        <ol class="breadcrumb">
                            <li class="breadcrumb-item"><a href="<?= SITE_URL ?>">Home</a></li>
                            <li class="breadcrumb-item active" aria-current="page">Detailed Curriculum</li>
                        </ol>
                    </nav>
                </div>
            </div>
        </div>
    </section>

    <!-- Curriculum Content -->
    <section class="curriculum-content py-5">
        <div class="container">
            <!-- Curriculum Approach -->
            <div class="row mb-5">
                <div class="col-12">
                    <div class="card approach-card">
                        <div class="card-body">
                            <h2 class="h2 text-primary mb-4 text-center">Our Curriculum Approach</h2>
                            <div class="approach-content">
                                <p class="approach-text mb-4">At Sathya Sai School Chatsworth, we follow the South African National Curriculum (CAPS) while incorporating Sathya Sai Integral Education. Our approach ensures holistic development, including intellectual, physical, emotional, and spiritual growth.</p>
                                <p class="approach-text">Each phase is carefully designed to build upon the previous one, ensuring continuous development and growth in both academic excellence and character formation.</p>
                            </div>
                        </div>
                    </div>
                </div>
            </div>

            <!-- Phase Cards -->
            <div class="row mb-5">
                <!-- Foundation Phase -->
                <div class="col-lg-4 mb-4">
                    <div class="phase-card h-100">
                        <div class="card">
                            <div class="card-header bg-primary text-white">
                                <h2 class="h4 mb-0">Foundation Phase</h2>
                            </div>
                            <div class="card-body">
                                <ul class="list-unstyled curriculum-list">
                                    <li>
                                        <i class="fa-solid fa-book text-primary me-2"></i>
                                        Mathematics
                                    </li>
                                    <li>
                                        <i class="fa-solid fa-book text-primary me-2"></i>
                                        English
                                    </li>
                                    <li>
                                        <i class="fa-solid fa-book text-primary me-2"></i>
                                        Afrikaans
                                    </li>
                                    <li>
                                        <i class="fa-solid fa-book text-primary me-2"></i>
                                        Life Skills
                                    </li>
                                </ul>
                            </div>
                        </div>
                    </div>
                </div>

                <!-- Intermediate Phase -->
                <div class="col-lg-4 mb-4">
                    <div class="phase-card h-100">
                        <div class="card">
                            <div class="card-header bg-primary text-white">
                                <h2 class="h4 mb-0">Intermediate Phase</h2>
                            </div>
                            <div class="card-body">
                                <ul class="list-unstyled curriculum-list">
                                    <li>
                                        <i class="fa-solid fa-book text-primary me-2"></i>
                                        Mathematics
                                    </li>
                                    <li>
                                        <i class="fa-solid fa-book text-primary me-2"></i>
                                        English
                                    </li>
                                    <li>
                                        <i class="fa-solid fa-book text-primary me-2"></i>
                                        Afrikaans
                                    </li>
                                    <li>
                                        <i class="fa-solid fa-book text-primary me-2"></i>
                                        Natural Science / Technology
                                    </li>
                                    <li>
                                        <i class="fa-solid fa-book text-primary me-2"></i>
                                        Social Science
                                    </li>
                                    <li>
                                        <i class="fa-solid fa-book text-primary me-2"></i>
                                        Life Skills
                                    </li>
                                </ul>
                            </div>
                        </div>
                    </div>
                </div>

                <!-- Senior Phase -->
                <div class="col-lg-4 mb-4">
                    <div class="phase-card h-100">
                        <div class="card">
                            <div class="card-header bg-primary text-white">
                                <h2 class="h4 mb-0">Senior Phase</h2>
                            </div>
                            <div class="card-body">
                                <ul class="list-unstyled curriculum-list">
                                    <li>
                                        <i class="fa-solid fa-book text-primary me-2"></i>
                                        Mathematics
                                    </li>
                                    <li>
                                        <i class="fa-solid fa-book text-primary me-2"></i>
                                        English
                                    </li>
                                    <li>
                                        <i class="fa-solid fa-book text-primary me-2"></i>
                                        Afrikaans
                                    </li>
                                    <li>
                                        <i class="fa-solid fa-book text-primary me-2"></i>
                                        Natural Science
                                    </li>
                                    <li>
                                        <i class="fa-solid fa-book text-primary me-2"></i>
                                        Economic Management Science
                                    </li>
                                    <li>
                                        <i class="fa-solid fa-book text-primary me-2"></i>
                                        Creative Arts
                                    </li>
                                    <li>
                                        <i class="fa-solid fa-book text-primary me-2"></i>
                                        Technology
                                    </li>
                                    <li>
                                        <i class="fa-solid fa-book text-primary me-2"></i>
                                        Social Science
                                    </li>
                                    <li>
                                        <i class="fa-solid fa-book text-primary me-2"></i>
                                        Life Orientation
                                    </li>
                                </ul>
                            </div>
                        </div>
                    </div>
                </div>
            </div>

            <!-- Extra Curricular Activities -->
            <div class="row">
                <div class="col-12">
                    <div class="card extra-activities-card">
                        <div class="card-header bg-primary text-white">
                            <h2 class="h4 mb-0">Extra Curricular Activities</h2>
                        </div>
                        <div class="card-body">
                            <div class="row">
                                <div class="col-md-6">
                                    <div class="activity-item mb-4">
                                        <h3 class="h5 mb-3">
                                            <i class="fa-solid fa-laptop-code text-primary me-2"></i>
                                            Technology
                                        </h3>
                                        <ul class="list-unstyled activity-list">
                                            <li>
                                                <i class="fa-solid fa-circle-check text-success me-2"></i>
                                                Computer Education and Robotics
                                            </li>
                                        </ul>
                                    </div>
                                    <div class="activity-item mb-4">
                                        <h3 class="h5 mb-3">
                                            <i class="fa-solid fa-music text-primary me-2"></i>
                                            Arts
                                        </h3>
                                        <ul class="list-unstyled activity-list">
                                            <li>
                                                <i class="fa-solid fa-circle-check text-success me-2"></i>
                                                Music Lessons
                                            </li>
                                        </ul>
                                    </div>
                                </div>
                                <div class="col-md-6">
                                    <div class="activity-item">
                                        <h3 class="h5 mb-3">
                                            <i class="fa-solid fa-futbol text-primary me-2"></i>
                                            Sports
                                        </h3>
                                        <ul class="list-unstyled activity-list">
                                            <li>
                                                <i class="fa-solid fa-circle-check text-success me-2"></i>
                                                Cricket
                                            </li>
                                            <li>
                                                <i class="fa-solid fa-circle-check text-success me-2"></i>
                                                Soccer
                                            </li>
                                        </ul>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>
</main>

<style>
.curriculum-page .phase-card {
    transition: transform 0.3s ease;
}

.curriculum-page .phase-card:hover {
    transform: translateY(-5px);
}

.curriculum-page .card {
    border: none;
    box-shadow: 0 2px 4px rgba(0,0,0,0.1);
}

.curriculum-page .card-header {
    border-bottom: none;
}

.curriculum-list li {
    padding: 0.5rem 0;
    border-bottom: 1px solid #e9ecef;
}

.curriculum-list li:last-child {
    border-bottom: none;
}

.curriculum-list li i {
    width: 20px;
}

.approach-card {
    background: linear-gradient(to right, #f8f9fa, #ffffff);
    border-radius: 10px;
    border: none;
    box-shadow: 0 4px 6px rgba(0,0,0,0.05);
}

.approach-card .card-body {
    padding: 3rem;
}

.approach-content {
    max-width: 800px;
    margin: 0 auto;
    text-align: center;
}

.approach-text {
    font-size: 1.2rem;
    line-height: 1.8;
    color: #2c3e50;
    margin-bottom: 1.5rem;
}

.curriculum-page h2.text-primary {
    font-size: 2.5rem;
    font-weight: 600;
    margin-bottom: 2rem;
    color: #1a237e !important;
}

@media (max-width: 991.98px) {
    .phase-card {
        margin-bottom: 1.5rem;
    }
    
    .approach-card .card-body {
        padding: 2rem;
    }

    .approach-text {
        font-size: 1.1rem;
        line-height: 1.6;
    }

    .curriculum-page h2.text-primary {
        font-size: 2rem;
    }
}

@media (max-width: 576px) {
    .approach-card .card-body {
        padding: 1.5rem;
    }

    .approach-text {
        font-size: 1rem;
        line-height: 1.5;
        text-align: left;
    }

    .curriculum-page h2.text-primary {
        font-size: 1.75rem;
    }
}

.extra-activities-card {
    border: none;
    box-shadow: 0 4px 6px rgba(0,0,0,0.05);
    border-radius: 10px;
    overflow: hidden;
}

.extra-activities-card .card-header {
    padding: 1.25rem 1.5rem;
    border-bottom: none;
}

.activity-item {
    padding: 0.5rem;
}

.activity-item h3 {
    color: #2c3e50;
    font-weight: 600;
}

.activity-item i {
    width: 24px;
}

.activity-list li {
    padding: 0.75rem 1rem;
    font-size: 1.1rem;
    color: #2c3e50;
    border-radius: 6px;
    transition: background-color 0.3s ease;
}

.activity-list li:hover {
    background-color: #f8f9fa;
}

.activity-list li i {
    font-size: 1rem;
}

@media (max-width: 767.98px) {
    .activity-item {
        margin-bottom: 2rem;
    }
    
    .activity-list li {
        font-size: 1rem;
        padding: 0.5rem 0.75rem;
    }
}
</style>

<?php
// Include footer
require_once 'includes/footer.php';
?> 