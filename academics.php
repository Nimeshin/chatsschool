<?php
declare(strict_types=1);

/**
 * Academics Page
 * 
 * @package SathyaSaiSchool
 */

// Include necessary configuration and header
require_once 'includes/config.php';
require_once 'includes/header.php';
?>

<main class="academics-page">
    <!-- Page Title -->
    <section class="page-title">
        <div class="container">
            <div class="row">
                <div class="col-12">
                    <h1>Our Academic Approach</h1>
                    <nav aria-label="breadcrumb">
                        <ol class="breadcrumb">
                            <li class="breadcrumb-item"><a href="<?= SITE_URL ?>">Home</a></li>
                            <li class="breadcrumb-item active" aria-current="page">Academics</li>
                        </ol>
                    </nav>
                </div>
            </div>
        </div>
    </section>

    <!-- Main Content -->
    <section class="academic-content py-5">
        <div class="container">
            <div class="row">
                <!-- Curriculum Overview -->
                <div class="col-lg-8">
                    <article class="mb-5">
                        <h2 class="section-title mb-4">Excellence in Learning</h2>
                        <p class="lead mb-4">Discover our comprehensive academic program that combines the South African National Curriculum (CAPS) with Sathya Sai Integral Education.</p>
                        <p class="lead">At Sathya Sai School Chatsworth, we follow the South African National Curriculum (CAPS) while incorporating Sathya Sai Integral Education. Our approach ensures holistic development, including intellectual, physical, emotional, and spiritual growth.</p>
                    </article>

                    <!-- Education Phases -->
                    <article class="education-phases">
                        <h2 class="mb-4">Phases of Education</h2>
                        
                        <div class="phase-card mb-4">
                            <h3 class="h4">Foundation Phase (Grades R-3)</h3>
                            <div class="phase-content">
                                <p>Building strong literacy and numeracy skills alongside value-based education. This phase focuses on:</p>
                                <ul>
                                    <li>Basic literacy and numeracy development</li>
                                    <li>Introduction to value-based learning</li>
                                    <li>Creative expression and motor skills</li>
                                    <li>Social development and interaction</li>
                                </ul>
                            </div>
                        </div>

                        <div class="phase-card mb-4">
                            <h3 class="h4">Intermediate Phase (Grades 4-6)</h3>
                            <div class="phase-content">
                                <p>Strengthening academic foundations with a focus on ethics and moral values. Key aspects include:</p>
                                <ul>
                                    <li>Advanced literacy and numeracy skills</li>
                                    <li>Introduction to specialized subjects</li>
                                    <li>Character development through integrated learning</li>
                                    <li>Critical thinking and problem-solving skills</li>
                                </ul>
                            </div>
                        </div>

                        <div class="phase-card mb-4">
                            <h3 class="h4">Senior Phase (Grade 7)</h3>
                            <div class="phase-content">
                                <p>Broadening critical thinking, problem-solving, and leadership abilities through:</p>
                                <ul>
                                    <li>Advanced subject-specific learning</li>
                                    <li>Leadership development opportunities</li>
                                    <li>Project-based learning initiatives</li>
                                    <li>Community service integration</li>
                                </ul>
                            </div>
                        </div>
                    </article>
                </div>

                <!-- Sidebar -->
                <div class="col-lg-4">
                    <aside class="academic-sidebar">
                        <div class="card mb-4">
                            <div class="card-body">
                                <h3 class="h5">Academic Excellence</h3>
                                <p>Our integrated approach ensures that students receive:</p>
                                <ul class="list-unstyled">
                                    <li>✓ Quality Education</li>
                                    <li>✓ Character Development</li>
                                    <li>✓ Holistic Growth</li>
                                    <li>✓ Value-Based Learning</li>
                                </ul>
                            </div>
                        </div>

                        <!-- Quick Links -->
                        <div class="card">
                            <div class="card-body">
                                <h3 class="h5">Quick Links</h3>
                                <ul class="list-unstyled">
                                    <li><a href="curriculum.php">Detailed Curriculum</a></li>
                                    <li><a href="admissions.php">Admissions Process</a></li>
                                    <li><a href="calendar.php">Academic Calendar</a></li>
                                    <li><a href="contact.php">Contact Academic Office</a></li>
                                </ul>
                            </div>
                        </div>
                    </aside>
                </div>
            </div>
        </div>
    </section>

    <!-- Parent Involvement -->
    <section class="parent-section py-5">
        <div class="container">
            <div class="row align-items-center">
                <div class="col-lg-6 order-lg-2 mb-4 mb-lg-0">
                    <h2 class="section-title">Parental Involvement</h2>
                    <p class="lead mb-4">A Tripartite Approach: Teacher-Parent-Learner</p>
                    <p class="mb-4">We believe that education is a partnership between school and home. Parents are encouraged to actively participate in their child's educational journey.</p>
                    <ul class="parent-involvement-list">
                        <li>
                            <i class="fa-solid fa-circle-check text-primary me-2"></i>
                            Participate in parenting programs and school events
                        </li>
                        <li>
                            <i class="fa-solid fa-circle-check text-primary me-2"></i>
                            Attend regular progress meetings and consultations
                        </li>
                        <li>
                            <i class="fa-solid fa-circle-check text-primary me-2"></i>
                            Support homework and academic enrichment activities
                        </li>
                        <li>
                            <i class="fa-solid fa-circle-check text-primary me-2"></i>
                            Engage in community service initiatives with their children
                        </li>
                    </ul>
                </div>
                <div class="col-lg-6 order-lg-1">
                    <div class="image-container">
                        <img src="assets/images/parent-involvement.jpg" alt="Parent and Student Activities" class="img-fluid rounded shadow">
                    </div>
                </div>
            </div>
        </div>
    </section>
</main>

<?php
// Include footer
require_once 'includes/footer.php';
?> 