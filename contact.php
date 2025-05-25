<?php
declare(strict_types=1);

/**
 * Contact Page
 * 
 * @package SathyaSaiSchool
 */

// Include necessary configuration and header
require_once 'includes/config.php';
require_once 'includes/header.php';
?>

<main class="contact-page">
    <!-- Page Title -->
    <section class="page-title">
        <div class="container">
            <div class="row">
                <div class="col-12">
                    <h1>Contact Us</h1>
                    <nav aria-label="breadcrumb">
                        <ol class="breadcrumb">
                            <li class="breadcrumb-item"><a href="<?= SITE_URL ?>">Home</a></li>
                            <li class="breadcrumb-item active" aria-current="page">Contact</li>
                        </ol>
                    </nav>
                </div>
            </div>
        </div>
    </section>

    <!-- Contact Information -->
    <section class="contact-info-section py-5">
        <div class="container">
            <div class="row g-4">
                <!-- Address Card -->
                <div class="col-md-4">
                    <div class="contact-card h-100">
                        <div class="card">
                            <div class="card-body text-center">
                                <div class="contact-icon mb-3">
                                    <i class="fa-solid fa-location-dot fa-2x text-primary"></i>
                                </div>
                                <h3 class="h5 mb-3">Our Location</h3>
                                <p class="mb-0">98 Powerline Street</p>
                                <p class="mb-0">Westcliff, Chatsworth</p>
                                <p class="mb-0">Durban, 4030</p>
                            </div>
                        </div>
                    </div>
                </div>

                <!-- Phone Card -->
                <div class="col-md-4">
                    <div class="contact-card h-100">
                        <div class="card">
                            <div class="card-body text-center">
                                <div class="contact-icon mb-3">
                                    <i class="fa-solid fa-phone fa-2x text-primary"></i>
                                </div>
                                <h3 class="h5 mb-3">Phone</h3>
                                <p class="mb-2">Tel: <a href="tel:0314021740" class="text-decoration-none">031 402 1740</a></p>
                                <p class="mb-0">Monday - Friday</p>
                                <p class="mb-0">7:30 AM - 2:30 PM</p>
                            </div>
                        </div>
                    </div>
                </div>

                <!-- Email Card -->
                <div class="col-md-4">
                    <div class="contact-card h-100">
                        <div class="card">
                            <div class="card-body text-center">
                                <div class="contact-icon mb-3">
                                    <i class="fa-solid fa-envelope fa-2x text-primary"></i>
                                </div>
                                <h3 class="h5 mb-3">Email</h3>
                                <p class="mb-0">
                                    <a href="mailto:contact@saischoolchats.co.za" class="text-decoration-none">contact@saischoolchats.co.za</a>
                                </p>
                                <p class="mb-0 mt-2">We'll respond as soon as possible</p>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>

    <!-- Contact Form & Map -->
    <section class="contact-form-section py-5 bg-light">
        <div class="container">
            <div class="row">
                <!-- Contact Form -->
                <div class="col-lg-6 mb-4 mb-lg-0">
                    <div class="contact-form-wrapper">
                        <h2 class="section-title mb-4">Send Us a Message</h2>
                        <form id="contactForm" class="contact-form needs-validation" novalidate>
                            <input type="hidden" name="csrf_token" value="<?= generate_csrf_token() ?>">
                            <div class="mb-3">
                                <label for="name" class="form-label">Full Name *</label>
                                <input type="text" class="form-control" id="name" name="name" required>
                                <div class="invalid-feedback">Please enter your name</div>
                            </div>
                            <div class="mb-3">
                                <label for="email" class="form-label">Email Address *</label>
                                <input type="email" class="form-control" id="email" name="email" required>
                                <div class="invalid-feedback">Please enter a valid email address</div>
                            </div>
                            <div class="mb-3">
                                <label for="phone" class="form-label">Phone Number</label>
                                <input type="tel" class="form-control" id="phone" name="phone">
                            </div>
                            <div class="mb-3">
                                <label for="subject" class="form-label">Subject *</label>
                                <input type="text" class="form-control" id="subject" name="subject" required>
                                <div class="invalid-feedback">Please enter a subject</div>
                            </div>
                            <div class="mb-3">
                                <label for="message" class="form-label">Message *</label>
                                <textarea class="form-control" id="message" name="message" rows="5" required></textarea>
                                <div class="invalid-feedback">Please enter your message</div>
                            </div>
                            <div class="alert alert-success d-none" id="formSuccess"></div>
                            <div class="alert alert-danger d-none" id="formError"></div>
                            <button type="submit" class="btn btn-primary" id="submitBtn">Send Message</button>
                        </form>
                    </div>
                </div>

                <!-- Map -->
                <div class="col-lg-6">
                    <div class="map-wrapper">
                        <h2 class="section-title mb-4">Find Us</h2>
                        <div class="map-container rounded shadow">
                            <iframe 
                                src="https://embed.waze.com/iframe?zoom=16&lat=-29.912470011455333&lon=30.911635018944413&pin=1"
                                width="100%" 
                                height="450" 
                                style="border:0;" 
                                allowfullscreen="" 
                                loading="lazy">
                            </iframe>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>
</main>

<script>
document.addEventListener('DOMContentLoaded', function() {
    const form = document.getElementById('contactForm');
    const submitBtn = document.getElementById('submitBtn');
    const successAlert = document.getElementById('formSuccess');
    const errorAlert = document.getElementById('formError');

    form.addEventListener('submit', function(e) {
        e.preventDefault();
        
        // Reset alerts
        successAlert.classList.add('d-none');
        errorAlert.classList.add('d-none');

        // Check form validity
        if (!form.checkValidity()) {
            e.stopPropagation();
            form.classList.add('was-validated');
            return;
        }

        // Disable submit button and show loading state
        submitBtn.disabled = true;
        submitBtn.innerHTML = '<span class="spinner-border spinner-border-sm" role="status" aria-hidden="true"></span> Sending...';

        // Collect form data
        const formData = new FormData(form);

        // Send AJAX request
        fetch('includes/process_contact.php', {
            method: 'POST',
            body: formData,
            headers: {
                'Accept': 'application/json'
            }
        })
        .then(response => response.json())
        .then(data => {
            if (data.success) {
                // Show success message
                successAlert.textContent = data.message || 'Thank you for your message. We will get back to you soon.';
                successAlert.classList.remove('d-none');
                
                // Reset form and validation state
                form.reset();
                form.classList.remove('was-validated');
                
                // Clear any custom validation styling
                const inputs = form.querySelectorAll('.form-control');
                inputs.forEach(input => {
                    input.classList.remove('is-valid', 'is-invalid');
                });
            } else {
                // Show error message
                errorAlert.textContent = data.message || 'An error occurred while sending your message.';
                errorAlert.classList.remove('d-none');
            }
        })
        .catch(error => {
            console.error('Error:', error);
            errorAlert.textContent = 'An error occurred. Please try again later.';
            errorAlert.classList.remove('d-none');
        })
        .finally(() => {
            // Re-enable submit button and restore original text
            submitBtn.disabled = false;
            submitBtn.innerHTML = 'Send Message';
            
            // Scroll to the appropriate alert message
            const activeAlert = successAlert.classList.contains('d-none') ? errorAlert : successAlert;
            if (!activeAlert.classList.contains('d-none')) {
                activeAlert.scrollIntoView({ behavior: 'smooth', block: 'center' });
            }
        });
    });

    // Reset validation state when form is reset
    form.addEventListener('reset', function() {
        form.classList.remove('was-validated');
        const inputs = form.querySelectorAll('.form-control');
        inputs.forEach(input => {
            input.classList.remove('is-valid', 'is-invalid');
        });
    });
});
</script>

<?php
// Include footer
require_once 'includes/footer.php';
?> 