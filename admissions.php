<?php
declare(strict_types=1);

/**
 * Admissions Page
 * 
 * @package SathyaSaiSchool
 */

// Include necessary configuration and header
require_once 'includes/config.php';
require_once 'includes/header.php';
?>

<main class="admissions-page">
    <!-- Page Title -->
    <section class="page-title">
        <div class="container">
            <div class="row">
                <div class="col-12">
                    <h1>Admissions</h1>
                    <nav aria-label="breadcrumb">
                        <ol class="breadcrumb">
                            <li class="breadcrumb-item"><a href="./">Home</a></li>
                            <li class="breadcrumb-item active" aria-current="page">Admissions</li>
                        </ol>
                    </nav>
                </div>
            </div>
        </div>
    </section>

    <!-- Welcome Section -->
    <section class="welcome-section py-5">
        <div class="container">
            <div class="row align-items-center">
                <div class="col-lg-6 mb-4 mb-lg-0">
                    <h2 class="section-title">Join Our Family</h2>
                    <p class="lead mb-4">We welcome learners from all backgrounds who seek an education rooted in strong moral values and academic excellence.</p>
                    <p>At Sathya Sai School Chatsworth, we believe in providing quality education that nurtures both academic excellence and character development. Our admissions process is designed to be inclusive and supportive, ensuring that every child has the opportunity to benefit from our unique educational approach.</p>
                </div>
                <div class="col-lg-6">
                    <div class="image-container">
                        <img src="assets/images/admissions-hero.jpg" alt="Students at Sathya Sai School" class="img-fluid rounded shadow">
                    </div>
                </div>
            </div>
        </div>
    </section>

    <!-- Requirements Section -->
    <section class="requirements-section py-5 bg-light">
        <div class="container">
            <div class="row">
                <div class="col-12">
                    <h2 class="section-title text-center">Admission Requirements</h2>
                </div>
            </div>
            <div class="row g-4">
                <div class="col-md-6">
                    <div class="requirements-card h-100">
                        <div class="card">
                            <div class="card-body">
                                <h3 class="card-title h4 mb-4">Eligibility Criteria</h3>
                                <ul class="requirements-list">
                                    <li>
                                        <i class="fa-solid fa-check text-primary me-2"></i>
                                        Open to all students regardless of religion, race, or socio-economic background
                                    </li>
                                    <li>
                                        <i class="fa-solid fa-check text-primary me-2"></i>
                                        Completion of registration forms and commitment to the school's values
                                    </li>
                                    <li>
                                        <i class="fa-solid fa-check text-primary me-2"></i>
                                        Interview and assessment for appropriate grade placement
                                    </li>
                                    <li>
                                        <i class="fa-solid fa-check text-primary me-2"></i>
                                        Affordable levy structure with support available for indigent learners
                                    </li>
                                </ul>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="col-md-6">
                    <div class="requirements-card h-100">
                        <div class="card">
                            <div class="card-body">
                                <h3 class="card-title h4 mb-4">Required Documents</h3>
                                <ul class="requirements-list">
                                    <li>
                                        <i class="fa-solid fa-file-lines text-primary me-2"></i>
                                        Completed application form
                                    </li>
                                    <li>
                                        <i class="fa-solid fa-file-lines text-primary me-2"></i>
                                        Copy of learner's birth certificate
                                    </li>
                                    <li>
                                        <i class="fa-solid fa-file-lines text-primary me-2"></i>
                                        Most recent school reports
                                    </li>
                                    <li>
                                        <i class="fa-solid fa-file-lines text-primary me-2"></i>
                                        Transfer card from previous school (if applicable)
                                    </li>
                                    <li>
                                        <i class="fa-solid fa-file-lines text-primary me-2"></i>
                                        Parents' ID documents
                                    </li>
                                </ul>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>

    <!-- Process Section -->
    <section class="process-section py-5">
        <div class="container">
            <h2 class="section-title text-center mb-5">Admissions Process</h2>
            <div class="row g-4">
                <div class="col-md-3">
                    <div class="process-step text-center">
                        <div class="process-icon mb-3">
                            <i class="fa-solid fa-file-pen fa-2x text-primary"></i>
                        </div>
                        <h3 class="h5">1. Application</h3>
                        <p>Submit completed application form with all required documents</p>
                    </div>
                </div>
                <div class="col-md-3">
                    <div class="process-step text-center">
                        <div class="process-icon mb-3">
                            <i class="fa-solid fa-clipboard-check fa-2x text-primary"></i>
                        </div>
                        <h3 class="h5">2. Assessment</h3>
                        <p>Complete placement assessment and family interview</p>
                    </div>
                </div>
                <div class="col-md-3">
                    <div class="process-step text-center">
                        <div class="process-icon mb-3">
                            <i class="fa-solid fa-envelope-open-text fa-2x text-primary"></i>
                        </div>
                        <h3 class="h5">3. Acceptance</h3>
                        <p>Receive acceptance letter and welcome package</p>
                    </div>
                </div>
                <div class="col-md-3">
                    <div class="process-step text-center">
                        <div class="process-icon mb-3">
                            <i class="fa-solid fa-handshake fa-2x text-primary"></i>
                        </div>
                        <h3 class="h5">4. Enrollment</h3>
                        <p>Complete enrollment process and orientation</p>
                    </div>
                </div>
            </div>
        </div>
    </section>

    <!-- School Fees Section -->
    <section class="fees-section py-5 bg-light">
        <div class="container">
            <h2 class="section-title text-center mb-5">School Fees</h2>
            <div class="row g-4">
                <!-- Annual Fees -->
                <div class="col-lg-6">
                    <div class="fees-card h-100">
                        <div class="card">
                            <div class="card-header bg-primary text-white">
                                <h3 class="h5 mb-0">Annual School Fees</h3>
                            </div>
                            <div class="card-body">
                                <div class="fee-item mb-4">
                                    <h4 class="h6 text-primary">Grade R</h4>
                                    <div class="d-flex justify-content-between align-items-center mb-2">
                                        <span>Annual Fee</span>
                                        <strong>R3,500.00</strong>
                                    </div>
                                    <div class="d-flex justify-content-between align-items-center small text-muted">
                                        <span>Monthly Payment (10 months):</span>
                                        <span>R350.00 per month</span>
                                    </div>
                                </div>
                                <div class="fee-item">
                                    <h4 class="h6 text-primary">Grades 1 - 7</h4>
                                    <div class="d-flex justify-content-between align-items-center mb-2">
                                        <span>Annual Fee</span>
                                        <strong>R6,000.00</strong>
                                    </div>
                                    <div class="d-flex justify-content-between align-items-center small text-muted">
                                        <span>Monthly Payment (10 months):</span>
                                        <span>R600.00 per month</span>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>

                <!-- Additional Fees -->
                <div class="col-lg-6">
                    <div class="fees-card h-100">
                        <div class="card">
                            <div class="card-header bg-primary text-white">
                                <h3 class="h5 mb-0">Additional Fees</h3>
                            </div>
                            <div class="card-body">
                                <div class="fee-item mb-4">
                                    <h4 class="h6 text-primary">Registration Fee</h4>
                                    <div class="d-flex justify-content-between align-items-center mb-2">
                                        <span>All Grades</span>
                                        <strong>R600.00</strong>
                                    </div>
                                    <p class="small text-muted mb-0">
                                        This amount is absorbed into the school fees at the end of the year (10th month)
                                    </p>
                                </div>
                                <div class="fee-item">
                                    <h4 class="h6 text-primary">Application Fee</h4>
                                    <div class="d-flex justify-content-between align-items-center mb-2">
                                        <span>Once-off Fee</span>
                                        <strong>R100.00</strong>
                                    </div>
                                    <p class="small text-muted mb-0">
                                        Non-refundable application processing fee
                                    </p>
                                </div>
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
            <h2 class="mb-4">Begin Your Journey With Us</h2>
            <p class="lead mb-4">Take the first step towards providing your child with an education that nurtures both academic excellence and character development.</p>
            <div class="d-flex justify-content-center gap-3">
                <a href="contact.php" class="btn btn-light btn-lg">Contact Us</a>
                <a href="#" class="btn btn-outline-light btn-lg" data-bs-toggle="modal" data-bs-target="#applicationModal">Apply Now</a>
            </div>
        </div>
    </section>
</main>

<style>
/* School Fees Section Styles */
.fees-section .card {
    border: none;
    box-shadow: 0 2px 4px rgba(0,0,0,0.05);
    transition: all 0.3s ease;
}

.fees-section .card:hover {
    transform: translateY(-5px);
    box-shadow: 0 5px 15px rgba(0,0,0,0.1);
}

.fees-section .card-header {
    border-bottom: none;
    padding: 1.25rem 1.5rem;
}

.fees-section .card-body {
    padding: 1.5rem;
}

.fee-item {
    padding-bottom: 1.5rem;
    border-bottom: 1px solid #e9ecef;
    margin-bottom: 1.5rem;
}

.fee-item:last-child {
    padding-bottom: 0;
    border-bottom: none;
    margin-bottom: 0;
}

.fee-item h4 {
    margin-bottom: 1rem;
}

.fee-item strong {
    font-size: 1.1rem;
    color: var(--primary-color);
}

@media (max-width: 991.98px) {
    .fees-card {
        margin-bottom: 1.5rem;
    }
}
</style>

<?php
// Include footer
require_once 'includes/footer.php';
?> 