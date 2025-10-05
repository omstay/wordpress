<?php
/*
Template Name: Contact Page
*/
get_header();
?>

<section class="page-header">
    <div class="container">
        <h1 class="page-title fade-in">Contact Us</h1>
        <p class="page-subtitle fade-in">Get in touch with our team</p>
    </div>
</section>

<section class="contact-section">
    <div class="container">
        <div class="contact-wrapper">
            <!-- Contact Form -->
            <div class="contact-form-container slide-up">
                <h2 class="form-title">Send Us a Message</h2>
                <form class="contact-form" id="contactForm" method="post" action="<?php echo admin_url('admin-post.php'); ?>">
                    <input type="hidden" name="action" value="submit_contact_form">
                    <?php wp_nonce_field('contact_form_nonce', 'contact_nonce'); ?>
                    
                    <div class="form-row">
                        <div class="form-group">
                            <label for="name">Full Name *</label>
                            <input type="text" id="name" name="name" required class="form-control">
                        </div>
                        <div class="form-group">
                            <label for="email">Email Address *</label>
                            <input type="email" id="email" name="email" required class="form-control">
                        </div>
                    </div>
                    
                    <div class="form-row">
                        <div class="form-group">
                            <label for="phone">Phone Number *</label>
                            <input type="tel" id="phone" name="phone" required class="form-control">
                        </div>
                        <div class="form-group">
                            <label for="subject">Subject *</label>
                            <input type="text" id="subject" name="subject" required class="form-control">
                        </div>
                    </div>
                    
                    <div class="form-group">
                        <label for="message">Message *</label>
                        <textarea id="message" name="message" rows="5" required class="form-control"></textarea>
                    </div>
                    
                    <button type="submit" class="btn-primary btn-large">Send Message</button>
                </form>
            </div>

            <!-- Contact Information -->
            <div class="contact-info-container slide-up">
                <h2 class="form-title">Contact Information</h2>
                
                <div class="info-card">
                    <div class="info-icon">
                        <svg width="30" height="30" fill="currentColor" viewBox="0 0 16 16">
                            <path d="M8 0a5 5 0 0 0-5 5c0 3.5 5 11 5 11s5-7.5 5-11a5 5 0 0 0-5-5zm0 7a2 2 0 1 1 0-4 2 2 0 0 1 0 4z"/>
                        </svg>
                    </div>
                    <div class="info-content">
                        <h3>Office Address</h3>
                        <p>123 Real Estate Street<br>Chennai, Tamil Nadu 600001<br>India</p>
                    </div>
                </div>

                <div class="info-card">
                    <div class="info-icon">
                        <svg width="30" height="30" fill="currentColor" viewBox="0 0 16 16">
                            <path d="M3.654 1.328a.678.678 0 0 0-1.015-.063L1.605 2.3c-.483.484-.661 1.169-.45 1.77a17.568 17.568 0 0 0 4.168 6.608 17.569 17.569 0 0 0 6.608 4.168c.601.211 1.286.033 1.77-.45l1.034-1.034a.678.678 0 0 0-.063-1.015l-2.307-1.794a.678.678 0 0 0-.58-.122l-2.19.547a1.745 1.745 0 0 1-1.657-.459L5.482 8.062a1.745 1.745 0 0 1-.46-1.657l.548-2.19a.678.678 0 0 0-.122-.58L3.654 1.328z"/>
                        </svg>
                    </div>
                    <div class="info-content">
                        <h3>Phone Number</h3>
                        <p>+91 9962214714<br>+91 1234567890</p>
                    </div>
                </div>

                <div class="info-card">
                    <div class="info-icon">
                        <svg width="30" height="30" fill="currentColor" viewBox="0 0 16 16">
                            <path d="M0 4a2 2 0 0 1 2-2h12a2 2 0 0 1 2 2v8a2 2 0 0 1-2 2H2a2 2 0 0 1-2-2V4zm2-1a1 1 0 0 0-1 1v.217l7 4.2 7-4.2V4a1 1 0 0 0-1-1H2zm13 2.383-4.758 2.855L15 11.114v-5.73zm-.034 6.878L9.271 8.82 8 9.583 6.728 8.82l-5.694 3.44A1 1 0 0 0 2 13h12a1 1 0 0 0 .966-.739zM1 11.114l4.758-2.876L1 5.383v5.73z"/>
                        </svg>
                    </div>
                    <div class="info-content">
                        <h3>Email Address</h3>
                        <p>info@realestate.com<br>support@realestate.com</p>
                    </div>
                </div>

                <div class="info-card">
                    <div class="info-icon">
                        <svg width="30" height="30" fill="currentColor" viewBox="0 0 16 16">
                            <path d="M8 3.5a.5.5 0 0 0-1 0V9a.5.5 0 0 0 .252.434l3.5 2a.5.5 0 0 0 .496-.868L8 8.71V3.5z"/>
                            <path d="M8 16A8 8 0 1 0 8 0a8 8 0 0 0 0 16zm7-8A7 7 0 1 1 1 8a7 7 0 0 1 14 0z"/>
                        </svg>
                    </div>
                    <div class="info-content">
                        <h3>Working Hours</h3>
                        <p>Monday - Friday: 9:00 AM - 6:00 PM<br>Saturday: 10:00 AM - 4:00 PM<br>Sunday: Closed</p>
                    </div>
                </div>
            </div>
        </div>

        <!-- Map Section -->
        <div class="map-container slide-up">
            <h2 class="section-title">Find Us Here</h2>
            <div class="map-wrapper">
                <iframe 
                    src="https://www.google.com/maps/embed?pb=!1m18!1m12!1m3!1d3887.6473547890836!2d80.22086431482183!3d12.993094890845782!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x3a525d5f4b3f43e9%3A0x7b7b1b1b1b1b1b1b!2sChennai%2C%20Tamil%20Nadu!5e0!3m2!1sen!2sin!4v1234567890123!5m2!1sen!2sin" 
                    width="100%" 
                    height="450" 
                    style="border:0;" 
                    allowfullscreen="" 
                    loading="lazy">
                </iframe>
            </div>
        </div>
    </div>
</section>

<style>
/* Page Header */
.page-header {
    background: linear-gradient(135deg, var(--primary-color) 0%, var(--secondary-color) 100%);
    color: #ffffff;
    padding: 80px 0;
    text-align: center;
}

.page-title {
    font-size: 48px;
    font-weight: 700;
    margin-bottom: 15px;
    font-family: 'Poppins', sans-serif;
}

.page-subtitle {
    font-size: 20px;
    opacity: 0.9;
}

/* Contact Section */
.contact-section {
    padding: 80px 0;
}

.contact-wrapper {
    display: grid;
    grid-template-columns: 1fr 1fr;
    gap: 50px;
    margin-bottom: 60px;
}

.contact-form-container,
.contact-info-container {
    background-color: var(--accent-color);
    padding: 40px;
    border-radius: 10px;
    box-shadow: 0 5px 20px rgba(0,0,0,0.1);
}

.form-title {
    font-size: 28px;
    font-weight: 600;
    margin-bottom: 30px;
    color: var(--primary-color);
    font-family: 'Poppins', sans-serif;
}

/* Form Styles */
.contact-form {
    display: flex;
    flex-direction: column;
    gap: 20px;
}

.form-row {
    display: grid;
    grid-template-columns: 1fr 1fr;
    gap: 20px;
}

.form-group {
    display: flex;
    flex-direction: column;
}

.form-group label {
    font-weight: 500;
    margin-bottom: 8px;
    color: var(--primary-color);
    font-size: 14px;
}

.form-control {
    padding: 12px 15px;
    border: 2px solid #e0e0e0;
    border-radius: 5px;
    font-size: 16px;
    font-family: 'Poppins', sans-serif;
    transition: all 0.3s ease;
    background-color: #ffffff;
}

.form-control:focus {
    border-color: var(--secondary-color);
    outline: none;
    box-shadow: 0 0 0 3px rgba(0,0,0,0.05);
}

textarea.form-control {
    resize: vertical;
    min-height: 120px;
}

/* Contact Info Cards */
.info-card {
    display: flex;
    gap: 20px;
    padding: 25px;
    margin-bottom: 20px;
    background-color: #ffffff;
    border-radius: 8px;
    transition: transform 0.3s ease, box-shadow 0.3s ease;
}

.info-card:hover {
    transform: translateX(5px);
    box-shadow: 0 5px 15px rgba(0,0,0,0.1);
}

.info-icon {
    color: var(--secondary-color);
    flex-shrink: 0;
}

.info-content h3 {
    font-size: 18px;
    font-weight: 600;
    margin-bottom: 10px;
    color: var(--primary-color);
    font-family: 'Poppins', sans-serif;
}

.info-content p {
    font-size: 15px;
    color: #666;
    line-height: 1.6;
    margin: 0;
}

/* Map Section */
.map-container {
    margin-top: 60px;
}

.map-container .section-title {
    text-align: center;
    margin-bottom: 40px;
}

.map-wrapper {
    border-radius: 10px;
    overflow: hidden;
    box-shadow: 0 5px 20px rgba(0,0,0,0.1);
}

/* Responsive Styles */
@media (max-width: 768px) {
    .page-title {
        font-size: 32px;
    }
    
    .page-subtitle {
        font-size: 16px;
    }
    
    .contact-wrapper {
        grid-template-columns: 1fr;
        gap: 30px;
    }
    
    .form-row {
        grid-template-columns: 1fr;
        gap: 20px;
    }
    
    .contact-form-container,
    .contact-info-container {
        padding: 30px 20px;
    }
    
    .form-title {
        font-size: 24px;
    }
    
    .map-wrapper iframe {
        height: 300px;
    }
}

@media (min-width: 769px) and (max-width: 1024px) {
    .contact-wrapper {
        gap: 40px;
    }
    
    .page-title {
        font-size: 40px;
    }
}

@media (max-width: 393px) {
    .contact-section {
        padding: 50px 0;
    }
    
    .info-card {
        padding: 20px;
        flex-direction: column;
        text-align: center;
    }
}
</style>

<?php
// Handle form submission
function handle_contact_form_submission() {
    if (isset($_POST['contact_nonce']) && wp_verify_nonce($_POST['contact_nonce'], 'contact_form_nonce')) {
        $name = sanitize_text_field($_POST['name']);
        $email = sanitize_email($_POST['email']);
        $phone = sanitize_text_field($_POST['phone']);
        $subject = sanitize_text_field($_POST['subject']);
        $message = sanitize_textarea_field($_POST['message']);
        
        // Send email
        $to = get_option('admin_email');
        $email_subject = "Contact Form: " . $subject;
        $email_body = "Name: $name\n";
        $email_body .= "Email: $email\n";
        $email_body .= "Phone: $phone\n\n";
        $email_body .= "Message:\n$message";
        
        $headers = array('Content-Type: text/plain; charset=UTF-8', "Reply-To: $email");
        
        wp_mail($to, $email_subject, $email_body, $headers);
        
        wp_redirect(home_url('/contact?success=1'));
        exit;
    }
}
add_action('admin_post_nopriv_submit_contact_form', 'handle_contact_form_submission');
add_action('admin_post_submit_contact_form', 'handle_contact_form_submission');
?>

<script>
document.addEventListener('DOMContentLoaded', function() {
    // Check for success parameter
    const urlParams = new URLSearchParams(window.location.search);
    if (urlParams.get('success') === '1') {
        alert('Thank you for contacting us! We will get back to you soon.');
        // Remove success parameter from URL
        window.history.replaceState({}, document.title, window.location.pathname);
    }
    
    // Form validation
    const form = document.getElementById('contactForm');
    if (form) {
        form.addEventListener('submit', function(e) {
            const phone = document.getElementById('phone').value;
            const phoneRegex = /^[0-9+\-\s()]+$/;
            
            if (!phoneRegex.test(phone)) {
                e.preventDefault();
                alert('Please enter a valid phone number');
                return false;
            }
        });
    }
});
</script>

<?php get_footer(); ?>