<?php
/*
Template Name: Single Property
Template Post Type: property
*/
get_header();

while (have_posts()): the_post();
    $property_id = get_the_ID();
    $price = get_post_meta($property_id, 'price', true);
    $location = get_post_meta($property_id, 'location', true);
    $bedrooms = get_post_meta($property_id, 'bedrooms', true);
    $bathrooms = get_post_meta($property_id, 'bathrooms', true);
    $sqft = get_post_meta($property_id, 'sqft', true);
    $property_type = get_post_meta($property_id, 'property_type', true);
    $year_built = get_post_meta($property_id, 'year_built', true);
    $parking = get_post_meta($property_id, 'parking', true);
?>

<!-- Property Hero Section -->
<section class="property-hero">
    <div class="container">
        <div class="property-header fade-in">
            <div class="property-title-section">
                <h1 class="property-title"><?php the_title(); ?></h1>
                <p class="property-location">
                    <svg width="20" height="20" fill="currentColor" viewBox="0 0 16 16">
                        <path d="M8 0a5 5 0 0 0-5 5c0 3.5 5 11 5 11s5-7.5 5-11a5 5 0 0 0-5-5zm0 7a2 2 0 1 1 0-4 2 2 0 0 1 0 4z"/>
                    </svg>
                    <?php echo esc_html($location); ?>
                </p>
            </div>
            <div class="property-price-section">
                <span class="property-price">₹<?php echo number_format($price); ?></span>
            </div>
        </div>
    </div>
</section>

<!-- Property Gallery -->
<section class="property-gallery">
    <div class="container">
        <div class="gallery-main slide-up">
            <?php if (has_post_thumbnail()): ?>
                <div class="main-image">
                    <?php the_post_thumbnail('full'); ?>
                </div>
            <?php endif; ?>
            
            <!-- Additional Images Gallery -->
            <div class="gallery-thumbnails">
                <?php
                $images = get_post_meta($property_id, 'gallery_images', true);
                if ($images):
                    foreach ($images as $image):
                ?>
                    <div class="thumbnail-item">
                        <img src="<?php echo esc_url($image); ?>" alt="Property Image">
                    </div>
                <?php
                    endforeach;
                endif;
                ?>
            </div>
        </div>
    </div>
</section>

<!-- Property Details -->
<section class="property-details-section">
    <div class="container">
        <div class="details-wrapper">
            <!-- Main Content -->
            <div class="property-main-content">
                <!-- Quick Facts -->
                <div class="property-facts slide-up">
                    <div class="fact-item">
                        <div class="fact-icon">
                            <svg width="32" height="32" fill="currentColor" viewBox="0 0 16 16">
                                <path d="M8.707 1.5a1 1 0 0 0-1.414 0L.646 8.146a.5.5 0 0 0 .708.708L2 8.207V13.5A1.5 1.5 0 0 0 3.5 15h9a1.5 1.5 0 0 0 1.5-1.5V8.207l.646.647a.5.5 0 0 0 .708-.708L13 5.793V2.5a.5.5 0 0 0-.5-.5h-1a.5.5 0 0 0-.5.5v1.293L8.707 1.5ZM13 7.207V13.5a.5.5 0 0 1-.5.5h-9a.5.5 0 0 1-.5-.5V7.207l5-5 5 5Z"/>
                            </svg>
                        </div>
                        <div class="fact-content">
                            <h4><?php echo esc_html($bedrooms); ?></h4>
                            <p>Bedrooms</p>
                        </div>
                    </div>

                    <div class="fact-item">
                        <div class="fact-icon">
                            <svg width="32" height="32" fill="currentColor" viewBox="0 0 16 16">
                                <path d="M8 1a2 2 0 0 1 2 2v4H6V3a2 2 0 0 1 2-2zm3 6V3a3 3 0 1 0-6 0v4a2 2 0 0 0-2 2v5a2 2 0 0 0 2 2h6a2 2 0 0 0 2-2V9a2 2 0 0 0-2-2z"/>
                            </svg>
                        </div>
                        <div class="fact-content">
                            <h4><?php echo esc_html($bathrooms); ?></h4>
                            <p>Bathrooms</p>
                        </div>
                    </div>

                    <div class="fact-item">
                        <div class="fact-icon">
                            <svg width="32" height="32" fill="currentColor" viewBox="0 0 16 16">
                                <path d="M0 0h16v16H0V0zm1 1v14h14V1H1zm2 2h10v10H3V3zm1 1v8h8V4H4z"/>
                            </svg>
                        </div>
                        <div class="fact-content">
                            <h4><?php echo number_format($sqft); ?></h4>
                            <p>Square Feet</p>
                        </div>
                    </div>

                    <div class="fact-item">
                        <div class="fact-icon">
                            <svg width="32" height="32" fill="currentColor" viewBox="0 0 16 16">
                                <path d="M2.52 3.515A2.5 2.5 0 0 1 4.82 2h6.362c1 0 1.904.596 2.298 1.515l.792 1.848c.075.175.21.319.38.404.5.25.855.715.965 1.262l.335 1.679c.033.161.049.325.049.49v.413c0 .814-.39 1.543-1 1.997V13.5a.5.5 0 0 1-.5.5h-2a.5.5 0 0 1-.5-.5v-1.338c-1.292.048-2.745.088-4 .088s-2.708-.04-4-.088V13.5a.5.5 0 0 1-.5.5h-2a.5.5 0 0 1-.5-.5v-1.892c-.61-.454-1-1.183-1-1.997v-.413a2.5 2.5 0 0 1 .049-.49l.335-1.68c.11-.546.465-1.012.964-1.261a.807.807 0 0 0 .381-.404l.792-1.848ZM4.82 3a1.5 1.5 0 0 0-1.379.91l-.792 1.847a1.8 1.8 0 0 1-.853.904.807.807 0 0 0-.43.564L1.03 8.904a1.5 1.5 0 0 0-.03.294v.413c0 .796.62 1.448 1.408 1.484 1.555.07 3.786.155 5.592.155 1.806 0 4.037-.084 5.592-.155A1.479 1.479 0 0 0 15 9.611v-.413c0-.099-.01-.197-.03-.294l-.335-1.68a.807.807 0 0 0-.43-.563 1.807 1.807 0 0 1-.853-.904l-.792-1.848A1.5 1.5 0 0 0 11.18 3H4.82Z"/>
                            </svg>
                        </div>
                        <div class="fact-content">
                            <h4><?php echo esc_html($parking); ?></h4>
                            <p>Parking Spaces</p>
                        </div>
                    </div>
                </div>

                <!-- Description -->
                <div class="property-description slide-up">
                    <h2 class="section-title">Property Description</h2>
                    <div class="description-content">
                        <?php the_content(); ?>
                    </div>
                </div>

                <!-- Property Features -->
                <div class="property-features slide-up">
                    <h2 class="section-title">Property Features</h2>
                    <div class="features-grid">
                        <div class="feature-item">
                            <svg width="24" height="24" fill="currentColor" viewBox="0 0 16 16">
                                <path d="M2 0a2 2 0 0 0-2 2v12a2 2 0 0 0 2 2h12a2 2 0 0 0 2-2V2a2 2 0 0 0-2-2H2zm0 1h12a1 1 0 0 1 1 1v12a1 1 0 0 1-1 1H2a1 1 0 0 1-1-1V2a1 1 0 0 1 1-1z"/>
                            </svg>
                            <span>Air Conditioning</span>
                        </div>
                        <div class="feature-item">
                            <svg width="24" height="24" fill="currentColor" viewBox="0 0 16 16">
                                <path d="M8 16A8 8 0 1 0 8 0a8 8 0 0 0 0 16zm0-1A7 7 0 1 1 8 1a7 7 0 0 1 0 14z"/>
                            </svg>
                            <span>Swimming Pool</span>
                        </div>
                        <div class="feature-item">
                            <svg width="24" height="24" fill="currentColor" viewBox="0 0 16 16">
                                <path d="M8 0a8 8 0 1 0 0 16A8 8 0 0 0 8 0zM1 8a7 7 0 1 1 14 0A7 7 0 0 1 1 8z"/>
                            </svg>
                            <span>Garden</span>
                        </div>
                        <div class="feature-item">
                            <svg width="24" height="24" fill="currentColor" viewBox="0 0 16 16">
                                <path d="M0 2a2 2 0 0 1 2-2h12a2 2 0 0 1 2 2v12a2 2 0 0 1-2 2H2a2 2 0 0 1-2-2V2z"/>
                            </svg>
                            <span>Modern Kitchen</span>
                        </div>
                        <div class="feature-item">
                            <svg width="24" height="24" fill="currentColor" viewBox="0 0 16 16">
                                <path d="M8 1a7 7 0 1 0 0 14A7 7 0 0 0 8 1zM0 8a8 8 0 1 1 16 0A8 8 0 0 1 0 8z"/>
                            </svg>
                            <span>Security System</span>
                        </div>
                        <div class="feature-item">
                            <svg width="24" height="24" fill="currentColor" viewBox="0 0 16 16">
                                <path d="M2 2a2 2 0 0 1 2-2h8a2 2 0 0 1 2 2v13.5a.5.5 0 0 1-.777.416L8 13.101l-5.223 2.815A.5.5 0 0 1 2 15.5V2z"/>
                            </svg>
                            <span>Gym/Fitness Center</span>
                        </div>
                    </div>
                </div>

                <!-- Additional Details -->
                <div class="additional-details slide-up">
                    <h2 class="section-title">Additional Details</h2>
                    <div class="details-table">
                        <div class="detail-row">
                            <span class="detail-label">Property Type:</span>
                            <span class="detail-value"><?php echo esc_html($property_type); ?></span>
                        </div>
                        <div class="detail-row">
                            <span class="detail-label">Year Built:</span>
                            <span class="detail-value"><?php echo esc_html($year_built); ?></span>
                        </div>
                        <div class="detail-row">
                            <span class="detail-label">Parking:</span>
                            <span class="detail-value"><?php echo esc_html($parking); ?> spaces</span>
                        </div>
                        <div class="detail-row">
                            <span class="detail-label">Square Footage:</span>
                            <span class="detail-value"><?php echo number_format($sqft); ?> sq ft</span>
                        </div>
                    </div>
                </div>
            </div>

            <!-- Sidebar -->
            <div class="property-sidebar">
                <!-- Contact Agent Card -->
                <div class="agent-card slide-up">
                    <h3 class="card-title">Contact Agent</h3>
                    <form class="agent-contact-form" method="post" action="<?php echo admin_url('admin-post.php'); ?>">
                        <input type="hidden" name="action" value="property_inquiry">
                        <input type="hidden" name="property_id" value="<?php echo $property_id; ?>">
                        <?php wp_nonce_field('property_inquiry_nonce', 'inquiry_nonce'); ?>
                        
                        <div class="form-group">
                            <input type="text" name="name" placeholder="Your Name *" required class="form-control">
                        </div>
                        <div class="form-group">
                            <input type="email" name="email" placeholder="Your Email *" required class="form-control">
                        </div>
                        <div class="form-group">
                            <input type="tel" name="phone" placeholder="Your Phone *" required class="form-control">
                        </div>
                        <div class="form-group">
                            <textarea name="message" rows="4" placeholder="Your Message" class="form-control"></textarea>
                        </div>
                        <button type="submit" class="btn-primary btn-block">Send Inquiry</button>
                    </form>
                    
                    <div class="agent-contact-info">
                        <a href="tel:+919962214714" class="contact-button">
                            <svg width="20" height="20" fill="currentColor" viewBox="0 0 16 16">
                                <path d="M3.654 1.328a.678.678 0 0 0-1.015-.063L1.605 2.3c-.483.484-.661 1.169-.45 1.77a17.568 17.568 0 0 0 4.168 6.608 17.569 17.569 0 0 0 6.608 4.168c.601.211 1.286.033 1.77-.45l1.034-1.034a.678.678 0 0 0-.063-1.015l-2.307-1.794a.678.678 0 0 0-.58-.122l-2.19.547a1.745 1.745 0 0 1-1.657-.459L5.482 8.062a1.745 1.745 0 0 1-.46-1.657l.548-2.19a.678.678 0 0 0-.122-.58L3.654 1.328z"/>
                            </svg>
                            Call Now
                        </a>
                        <a href="https://wa.me/919962214714" class="contact-button whatsapp" target="_blank">
                            <svg width="20" height="20" fill="currentColor" viewBox="0 0 16 16">
                                <path d="M13.601 2.326A7.854 7.854 0 0 0 7.994 0C3.627 0 .068 3.558.064 7.926c0 1.399.366 2.76 1.057 3.965L0 16l4.204-1.102a7.933 7.933 0 0 0 3.79.965h.004c4.368 0 7.926-3.558 7.93-7.93A7.898 7.898 0 0 0 13.6 2.326zM7.994 14.521a6.573 6.573 0 0 1-3.356-.92l-.24-.144-2.494.654.666-2.433-.156-.251a6.56 6.56 0 0 1-1.007-3.505c0-3.626 2.957-6.584 6.591-6.584a6.56 6.56 0 0 1 4.66 1.931 6.557 6.557 0 0 1 1.928 4.66c-.004 3.639-2.961 6.592-6.592 6.592zm3.615-4.934c-.197-.099-1.17-.578-1.353-.646-.182-.065-.315-.099-.445.099-.133.197-.513.646-.627.775-.114.133-.232.148-.43.05-.197-.1-.836-.308-1.592-.985-.59-.525-.985-1.175-1.103-1.372-.114-.198-.011-.304.088-.403.087-.088.197-.232.296-.346.1-.114.133-.198.198-.33.065-.134.034-.248-.015-.347-.05-.099-.445-1.076-.612-1.47-.16-.389-.323-.335-.445-.34-.114-.007-.247-.007-.38-.007a.729.729 0 0 0-.529.247c-.182.198-.691.677-.691 1.654 0 .977.71 1.916.81 2.049.098.133 1.394 2.132 3.383 2.992.47.205.84.326 1.129.418.475.152.904.129 1.246.08.38-.058 1.171-.48 1.338-.943.164-.464.164-.86.114-.943-.049-.084-.182-.133-.38-.232z"/>
                            </svg>
                            WhatsApp
                        </a>
                    </div>
                </div>

                <!-- Property Summary -->
                <div class="property-summary-card slide-up">
                    <h3 class="card-title">Property Summary</h3>
                    <div class="summary-details">
                        <div class="summary-row">
                            <span>Price:</span>
                            <strong>₹<?php echo number_format($price); ?></strong>
                        </div>
                        <div class="summary-row">
                            <span>Bedrooms:</span>
                            <strong><?php echo esc_html($bedrooms); ?></strong>
                        </div>
                        <div class="summary-row">
                            <span>Bathrooms:</span>
                            <strong><?php echo esc_html($bathrooms); ?></strong>
                        </div>
                        <div class="summary-row">
                            <span>Area:</span>
                            <strong><?php echo number_format($sqft); ?> sq ft</strong>
                        </div>
                        <div class="summary-row">
                            <span>Type:</span>
                            <strong><?php echo esc_html($property_type); ?></strong>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</section>

<style>
/* Property Hero */
.property-hero {
    background: linear-gradient(135deg, var(--primary-color) 0%, var(--secondary-color) 100%);
    padding: 60px 0;
    color: #ffffff;
}

.property-header {
    display: flex;
    justify-content: space-between;
    align-items: center;
    flex-wrap: wrap;
    gap: 20px;
}

.property-title {
    font-size: 36px;
    font-weight: 700;
    margin-bottom: 10px;
}

.property-location {
    display: flex;
    align-items: center;
    gap: 8px;
    font-size: 18px;
    opacity: 0.9;
}

.property-price {
    font-size: 42px;
    font-weight: 700;
    color: #ffffff;
}

/* Property Gallery */
.property-gallery {
    padding: 60px 0;
    background-color: var(--accent-color);
}

.gallery-main {
    display: flex;
    flex-direction: column;
    gap: 20px;
}

.main-image {
    border-radius: 15px;
    overflow: hidden;
    box-shadow: 0 10px 30px rgba(0,0,0,0.15);
}

.main-image img {
    width: 100%;
    height: 500px;
    object-fit: cover;
}

.gallery-thumbnails {
    display: grid;
    grid-template-columns: repeat(auto-fill, minmax(150px, 1fr));
    gap: 15px;
}

.thumbnail-item {
    border-radius: 8px;
    overflow: hidden;
    cursor: pointer;
    transition: transform 0.3s ease;
}

.thumbnail-item:hover {
    transform: scale(1.05);
}

.thumbnail-item img {
    width: 100%;
    height: 120px;
    object-fit: cover;
}

/* Property Details Section */
.property-details-section {
    padding: 60px 0;
}

.details-wrapper {
    display: grid;
    grid-template-columns: 2fr 1fr;
    gap: 40px;
}

/* Property Facts */
.property-facts {
    display: grid;
    grid-template-columns: repeat(auto-fit, minmax(200px, 1fr));
    gap: 20px;
    margin-bottom: 40px;
}

.fact-item {
    background-color: var(--accent-color);
    padding: 30px;
    border-radius: 10px;
    display: flex;
    align-items: center;
    gap: 20px;
    box-shadow: 0 5px 15px rgba(0,0,0,0.08);
    transition: transform 0.3s ease;
}

.fact-item:hover {
    transform: translateY(-5px);
}

.fact-icon {
    color: var(--secondary-color);
    flex-shrink: 0;
}

.fact-content h4 {
    font-size: 28px;
    font-weight: 700;
    color: var(--primary-color);
    margin-bottom: 5px;
}

.fact-content p {
    font-size: 14px;
    color: #666;
    margin: 0;
}

/* Description */
.property-description {
    margin-bottom: 40px;
}

.section-title {
    font-size: 28px;
    font-weight: 600;
    color: var(--primary-color);
    margin-bottom: 20px;
    padding-bottom: 15px;
    border-bottom: 3px solid var(--secondary-color);
    display: inline-block;
}

.description-content {
    font-size: 16px;
    line-height: 1.8;
    color: #555;
}

/* Features Grid */
.property-features {
    margin-bottom: 40px;
}

.features-grid {
    display: grid;
    grid-template-columns: repeat(auto-fill, minmax(250px, 1fr));
    gap: 15px;
}

.feature-item {
    display: flex;
    align-items: center;
    gap: 12px;
    padding: 15px;
    background-color: var(--accent-color);
    border-radius: 8px;
    transition: all 0.3s ease;
}

.feature-item:hover {
    background-color: var(--primary-color);
    color: #ffffff;
}

.feature-item:hover svg {
    color: #ffffff;
}

.feature-item svg {
    color: var(--secondary-color);
    flex-shrink: 0;
}

.feature-item span {
    font-size: 15px;
    font-weight: 500;
}

/* Additional Details */
.additional-details {
    margin-bottom: 40px;
}

.details-table {
    background-color: var(--accent-color);
    border-radius: 10px;
    overflow: hidden;
}

.detail-row {
    display: flex;
    justify-content: space-between;
    padding: 20px 25px;
    border-bottom: 1px solid rgba(0,0,0,0.1);
}

.detail-row:last-child {
    border-bottom: none;
}

.detail-label {
    font-weight: 500;
    color: #666;
}

.detail-value {
    font-weight: 600;
    color: var(--primary-color);
}

/* Sidebar */
.property-sidebar {
    position: sticky;
    top: 100px;
}

.agent-card,
.property-summary-card {
    background-color: var(--accent-color);
    padding: 30px;
    border-radius: 10px;
    box-shadow: 0 5px 20px rgba(0,0,0,0.1);
    margin-bottom: 30px;
}

.card-title {
    font-size: 22px;
    font-weight: 600;
    color: var(--primary-color);
    margin-bottom: 20px;
    padding-bottom: 15px;
    border-bottom: 2px solid var(--secondary-color);
}

/* Agent Contact Form */
.agent-contact-form {
    display: flex;
    flex-direction: column;
    gap: 15px;
    margin-bottom: 20px;
}

.form-group {
    display: flex;
    flex-direction: column;
}

.form-control {
    padding: 12px 15px;
    border: 2px solid #e0e0e0;
    border-radius: 5px;
    font-size: 15px;
    font-family: 'Poppins', sans-serif;
    transition: all 0.3s ease;
}

.form-control:focus {
    border-color: var(--secondary-color);
    outline: none;
}

.btn-block {
    width: 100%;
}

/* Contact Buttons */
.agent-contact-info {
    display: flex;
    flex-direction: column;
    gap: 10px;
}

.contact-button {
    display: flex;
    align-items: center;
    justify-content: center;
    gap: 10px;
    padding: 12px 20px;
    background-color: var(--secondary-color);
    color: #ffffff;
    border-radius: 5px;
    text-decoration: none;
    font-weight: 600;
    transition: all 0.3s ease;
}

.contact-button:hover {
    background-color: var(--primary-color);
    transform: translateY(-2px);
    box-shadow: 0 5px 15px rgba(0,0,0,0.2);
}

.contact-button.whatsapp {
    background-color: #25D366;
}

.contact-button.whatsapp:hover {
    background-color: #128C7E;
}

/* Property Summary */
.summary-details {
    display: flex;
    flex-direction: column;
    gap: 15px;
}

.summary-row {
    display: flex;
    justify-content: space-between;
    padding: 12px 0;
    border-bottom: 1px solid rgba(0,0,0,0.1);
}

.summary-row:last-child {
    border-bottom: none;
}

.summary-row span {
    color: #666;
}

.summary-row strong {
    color: var(--primary-color);
    font-size: 16px;
}

/* Responsive Styles */
@media (max-width: 1024px) {
    .details-wrapper {
        grid-template-columns: 1fr;
    }
    
    .property-sidebar {
        position: static;
    }
}

@media (max-width: 768px) {
    .property-title {
        font-size: 28px;
    }
    
    .property-price {
        font-size: 32px;
    }
    
    .property-header {
        flex-direction: column;
        align-items: flex-start;
    }
    
    .main-image img {
        height: 300px;
    }
    
    .property-facts {
        grid-template-columns: 1fr;
    }
    
    .features-grid {
        grid-template-columns: 1fr;
    }
    
    .agent-card,
    .property-summary-card {
        padding: 20px;
    }
}

@media (max-width: 393px) {
    .property-hero {
        padding: 40px 0;
    }
    
    .property-title {
        font-size: 24px;
    }
    
    .property-price {
        font-size: 28px;
    }
    
    .fact-item {
        padding: 20px;
    }
    
    .fact-content h4 {
        font-size: 24px;
    }
}
</style>

<?php
endwhile;
get_footer();
?>