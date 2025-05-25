<?php
declare(strict_types=1);

/**
 * Vacancy Page
 * 
 * @package SathyaSaiSchool
 */

// Include necessary configuration and header
require_once 'includes/config.php';
require_once 'includes/header.php';
?>

<main class="vacancy-page">
    <!-- Page Title -->
    <section class="page-title">
        <div class="container">
            <div class="row">
                <div class="col-12">
                    <h1>Vacancies</h1>
                    <nav aria-label="breadcrumb">
                        <ol class="breadcrumb">
                            <li class="breadcrumb-item"><a href="<?= url_path('index') ?>">Home</a></li>
                            <li class="breadcrumb-item active" aria-current="page">Vacancies</li>
                        </ol>
                    </nav>
                </div>
            </div>
        </div>
    </section>

    <!-- Introduction Section -->
    <section class="introduction-section py-5">
        <div class="container">
            <div class="row justify-content-center">
                <div class="col-lg-10">
                    <div class="text-center mb-5">
                        <h2 class="h3 mb-4">SRI SATHYA SAI EDUCATION TRUST OF SOUTH AFRICA</h2>
                        <h3 class="h4 mb-4">AFRICAN INSTITUTE OF SRI SATHYA SAI EDUCATION</h3>
                        <p class="lead">A Sathya Sai School is a full-time independent, private school that integrates secular education with Sri Sathya Sai Educare which uses the Sri Sathya Sai pedagogy of Integral Education, fostering character development through the unfolding of human values that are inherent in individuals, both educator and learners.</p>
                    </div>
                </div>
            </div>
        </div>
    </section>

    <!-- Foundation Phase Teacher Vacancy Section -->
    <section class="vacancy-details py-5">
        <div class="container">
            <div class="row justify-content-center">
                <div class="col-lg-10">
                    <div class="card shadow-sm">
                        <div class="card-body">
                            <h2 class="card-title h4 text-primary mb-4">Level 1 Post: Foundation Phase Educator</h2>
                            <div class="alert alert-info">
                                <strong>Closing Date:</strong> 26th May 2025
                            </div>

                            <h3 class="h5 mb-3">Position Requirements:</h3>
                            <ul class="list-unstyled">
                                <li class="mb-2">
                                    <i class="fa-solid fa-check text-primary me-2"></i>
                                    B.ED (Foundation Phase) degree
                                </li>
                                <li class="mb-2">
                                    <i class="fa-solid fa-check text-primary me-2"></i>
                                    Minimum 3 years teaching experience
                                </li>
                                <li class="mb-2">
                                    <i class="fa-solid fa-check text-primary me-2"></i>
                                    SSSEHV Qualification (mandatory, training available if not qualified)
                                </li>
                            </ul>

                            <h3 class="h5 mb-3 mt-4">Key Responsibilities:</h3>
                            <ul class="list-unstyled">
                                <li class="mb-2">
                                    <i class="fa-solid fa-circle-check text-primary me-2"></i>
                                    Create and achieve a Sri Sathya Sai Model School environment for developing human excellence
                                </li>
                                <li class="mb-2">
                                    <i class="fa-solid fa-circle-check text-primary me-2"></i>
                                    Integrate the five human values (Truth, Right Conduct, Peace, Love and Non-Violence) in daily teaching
                                </li>
                                <li class="mb-2">
                                    <i class="fa-solid fa-circle-check text-primary me-2"></i>
                                    Provide experiential and transformational education using Sri Sathya Sai pedagogy
                                </li>
                                <li class="mb-2">
                                    <i class="fa-solid fa-circle-check text-primary me-2"></i>
                                    Foster self-discipline, self-sacrifice, and selfless service to community
                                </li>
                                <li class="mb-2">
                                    <i class="fa-solid fa-circle-check text-primary me-2"></i>
                                    Nurture the tripartite relationship of teacher, parent and child
                                </li>
                                <li class="mb-2">
                                    <i class="fa-solid fa-circle-check text-primary me-2"></i>
                                    Promote unity of faiths and encourage unity of thought, word and deed
                                </li>
                            </ul>

                            <h3 class="h5 mb-3 mt-4">Required Documentation:</h3>
                            <ul class="list-unstyled">
                                <li class="mb-2">
                                    <i class="fa-solid fa-file-lines text-primary me-2"></i>
                                    Completed application form
                                </li>
                                <li class="mb-2">
                                    <i class="fa-solid fa-file-lines text-primary me-2"></i>
                                    Curriculum Vitae (prescribed CV form)
                                </li>
                                <li class="mb-2">
                                    <i class="fa-solid fa-file-lines text-primary me-2"></i>
                                    Certified copies of qualifications
                                </li>
                                <li class="mb-2">
                                    <i class="fa-solid fa-file-lines text-primary me-2"></i>
                                    Police Clearance Certificate
                                </li>
                                <li class="mb-2">
                                    <i class="fa-solid fa-file-lines text-primary me-2"></i>
                                    SACE Certificate
                                </li>
                                <li class="mb-2">
                                    <i class="fa-solid fa-file-lines text-primary me-2"></i>
                                    Copy of ID document
                                </li>
                            </ul>

                            <!-- Application Documents Section -->
                            <h3 class="h5 mb-3 mt-4">Download Application Documents:</h3>
                            <div class="row g-3 mb-4">
                                <div class="col-md-4">
                                    <a href="assets/vacancies/Job Advert For Foundation Phase Teacher.pdf" class="btn btn-outline-primary w-100" target="_blank">
                                        <i class="fa-solid fa-file-pdf me-2"></i>
                                        Job Description
                                    </a>
                                </div>
                                <div class="col-md-4">
                                    <a href="assets/vacancies/Application Form For Foundation Phase.pdf" class="btn btn-outline-primary w-100" target="_blank">
                                        <i class="fa-solid fa-file-pdf me-2"></i>
                                        Application Form
                                    </a>
                                </div>
                                <div class="col-md-4">
                                    <a href="assets/vacancies/Curriculam Vitae Form-2025.pdf" class="btn btn-outline-primary w-100" target="_blank">
                                        <i class="fa-solid fa-file-pdf me-2"></i>
                                        CV Form
                                    </a>
                                </div>
                            </div>

                            <!-- Application Instructions -->
                            <div class="application-instructions bg-light p-4 rounded mb-4">
                                <h3 class="h5 mb-3">How to Apply:</h3>
                                <p class="mb-3">Please send your completed application with all required documents to:</p>
                                <div class="d-flex align-items-center mb-3">
                                    <i class="fa-solid fa-envelope text-primary me-2"></i>
                                    <a href="mailto:vacancy@saischoolchats.co.za" class="text-decoration-none">
                                        vacancy@saischoolchats.co.za
                                    </a>
                                </div>
                                <p class="small mb-0">
                                    <i class="fa-solid fa-circle-info text-primary me-2"></i>
                                    Ensure all required documents are attached and properly certified where applicable.
                                </p>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>

</main>

<style>
.vacancy-page .introduction-section {
    background: linear-gradient(135deg, var(--primary-color) 0%, var(--secondary-color) 100%);
    color: white;
    padding: 3rem 0;
}

.vacancy-page .introduction-section h2,
.vacancy-page .introduction-section h3 {
    color: white;
}

.vacancy-page .card {
    border: none;
    border-radius: 10px;
    box-shadow: 0 2px 15px rgba(0, 0, 0, 0.05);
}

.vacancy-page .list-unstyled li {
    position: relative;
    padding-left: 0.5rem;
}

.vacancy-page .alert-info {
    background-color: rgba(30, 60, 114, 0.1);
    border: none;
    color: var(--primary-color);
}

.vacancy-page .btn-outline-primary {
    border-width: 2px;
    font-weight: 500;
    padding: 0.75rem 1rem;
    transition: all 0.3s ease;
}

.vacancy-page .btn-outline-primary:hover {
    background-color: var(--primary-color);
    color: white;
    transform: translateY(-2px);
}

.vacancy-page .application-instructions {
    background-color: rgba(30, 60, 114, 0.05);
    border-left: 4px solid var(--primary-color);
}

.vacancy-page .application-instructions a {
    color: var(--primary-color);
    font-weight: 500;
}

.vacancy-page .application-instructions a:hover {
    color: var(--secondary-color);
}

.vacancy-page .vacancy-details:nth-child(even) {
    border-top: 1px solid rgba(0, 0, 0, 0.05);
    border-bottom: 1px solid rgba(0, 0, 0, 0.05);
}

@media (max-width: 768px) {
    .vacancy-page .introduction-section {
        padding: 2rem 0;
    }
    
    .vacancy-page .card {
        margin: 1rem;
    }

    .vacancy-page .btn-outline-primary {
        margin-bottom: 0.5rem;
    }
}
</style>

<?php
// Include footer
require_once 'includes/footer.php';
?> 