<?php get_header(); ?>

<!-- Hero Section -->
<section class="hero-section fade-in">
    <div class="container">
        <div class="hero-content">
            <h1 class="hero-title">Find Your Dream Home</h1>
            <p class="hero-subtitle">Discover the perfect property with our expert real estate agents</p>
            <div class="hero-search">
                <form class="search-form" method="get" action="<?php echo home_url('/properties'); ?>">
                    <input type="text" name="s" placeholder="Enter location, property type..." class="search-input">
                    <button type="submit" class="btn-primary">Search Properties</button>
                </form>
            </div>
        </div>
    </div>
</section>

<!-- Featured Properties Section -->
<section class="featured-properties">
    <div class="container">
        <div class="section-header slide-up">
            <h2 class="section-title">Featured Listings</h2>
            <p class="section-description">Explore our handpicked selection of premium properties</p>
        </div>
        
        <div class="properties-grid">
            <?php
            $args = array(
                'post_type' => 'property',
                'posts_per_page' => 6,
                'meta_key' => 'featured',
                'meta_value' => '1'
            );
            $properties = new WP_Query($args);
            
            if ($properties->have_posts()):
                while ($properties->have_posts()): $properties->the_post();
            ?>
                <div class="listing-card slide-up">
                    <?php if (has_post_thumbnail()): ?>
                        <div class="listing-image">
                            <?php the_post_thumbnail('medium_large'); ?>
                            <span class="listing-badge">Featured</span>
                        </div>
                    <?php endif; ?>
                    
                    <div class="listing-content">
                        <h3 class="listing-title"><?php the_title(); ?></h3>
                        <p class="listing-location">
                            <svg width="16" height="16" fill="currentColor" viewBox="0 0 16 16">
                                <path d="M8 0a5 5 0 0 0-5 5c0 3.5 5 11 5 11s5-7.5 5-11a5 5 0 0 0-5-5zm0 7a2 2 0 1 1 0-4 2 2 0 0 1 0 4z"/>
                            </svg>
                            <?php echo get_post_meta(get_the_ID(), 'location', true); ?>
                        </p>
                        <div class="listing-details">
                            <span class="detail-item">
                                <strong><?php echo get_post_meta(get_the_ID(), 'bedrooms', true); ?></strong> Beds
                            </span>
                            <span class="detail-item">
                                <strong><?php echo get_post_meta(get_the_ID(), 'bathrooms', true); ?></strong> Baths
                            </span>
                            <span class="detail-item">
                                <strong><?php echo get_post_meta(get_the_ID(), 'sqft', true); ?></strong> Sq Ft
                            </span>
                        </div>
                        <div class="listing-footer">
                            <span class="listing-price">₹<?php echo get_post_meta(get_the_ID(), 'price', true); ?></span>
                            <a href="<?php the_permalink(); ?>" class="btn-primary btn-small">View Details</a>
                        </div>
                    </div>
                </div>
            <?php
                endwhile;
                wp_reset_postdata();
            else:
            ?>
                <p>No featured properties available.</p>
            <?php endif; ?>
        </div>
        
        <div class="section-cta">
            <a href="<?php echo home_url('/properties'); ?>" class="btn-primary">View All Properties</a>
        </div>
    </div>
</section>

<!-- Why Choose Us Section -->
<section class="why-choose-us">
    <div class="container">
        <div class="section-header slide-up">
            <h2 class="section-title">Why Choose Us</h2>
            <p class="section-description">Your trusted partner in real estate excellence</p>
        </div>
        
        <div class="features-grid">
            <div class="feature-card fade-in">
                <div class="feature-icon">
                    <svg width="48" height="48" fill="currentColor" viewBox="0 0 16 16">
                        <path d="M8 15A7 7 0 1 1 8 1a7 7 0 0 1 0 14zm0 1A8 8 0 1 0 8 0a8 8 0 0 0 0 16z"/>
                        <path d="M10.97 4.97a.235.235 0 0 0-.02.022L7.477 9.417 5.384 7.323a.75.75 0 0 0-1.06 1.06L6.97 11.03a.75.75 0 0 0 1.079-.02l3.992-4.99a.75.75 0 0 0-1.071-1.05z"/>
                    </svg>
                </div>
                <h3 class="feature-title">Verified Listings</h3>
                <p class="feature-description">All properties are thoroughly verified and authenticated</p>
            </div>
            
            <div class="feature-card fade-in">
                <div class="feature-icon">
                    <svg width="48" height="48" fill="currentColor" viewBox="0 0 16 16">
                        <path d="M8 4.754a3.246 3.246 0 1 0 0 6.492 3.246 3.246 0 0 0 0-6.492zM5.754 8a2.246 2.246 0 1 1 4.492 0 2.246 2.246 0 0 1-4.492 0z"/>
                        <path d="M9.796 1.343c-.527-1.79-3.065-1.79-3.592 0l-.094.319a.873.873 0 0 1-1.255.52l-.292-.16c-1.64-.892-3.433.902-2.54 2.541l.159.292a.873.873 0 0 1-.52 1.255l-.319.094c-1.79.527-1.79 3.065 0 3.592l.319.094a.873.873 0 0 1 .52 1.255l-.16.292c-.892 1.64.901 3.434 2.541 2.54l.292-.159a.873.873 0 0 1 1.255.52l.094.319c.527 1.79 3.065 1.79 3.592 0l.094-.319a.873.873 0 0 1 1.255-.52l.292.16c1.64.893 3.434-.902 2.54-2.541l-.159-.292a.873.873 0 0 1 .52-1.255l.319-.094c1.79-.527 1.79-3.065 0-3.592l-.319-.094a.873.873 0 0 1-.52-1.255l.16-.292c.893-1.64-.902-3.433-2.541-2.54l-.292.159a.873.873 0 0 1-1.255-.52l-.094-.319z"/>
                    </svg>
                </div>
                <h3 class="feature-title">Expert Guidance</h3>
                <p class="feature-description">Professional agents with years of market experience</p>
            </div>
            
            <div class="feature-card fade-in">
                <div class="feature-icon">
                    <svg width="48" height="48" fill="currentColor" viewBox="0 0 16 16">
                        <path d="M0 4a2 2 0 0 1 2-2h12a2 2 0 0 1 2 2v8a2 2 0 0 1-2 2H2a2 2 0 0 1-2-2V4zm2-1a1 1 0 0 0-1 1v.217l7 4.2 7-4.2V4a1 1 0 0 0-1-1H2zm13 2.383-4.758 2.855L15 11.114v-5.73zm-.034 6.878L9.271 8.82 8 9.583 6.728 8.82l-5.694 3.44A1 1 0 0 0 2 13h12a1 1 0 0 0 .966-.739zM1 11.114l4.758-2.876L1 5.383v5.73z"/>
                    </svg>
                </div>
                <h3 class="feature-title">24/7 Support</h3>
                <p class="feature-description">Round-the-clock assistance for all your queries</p>
            </div>
        </div>
    </div>
</section>

<!-- Call to Action -->
<section class="cta-section">
    <div class="container">
        <div class="cta-content fade-in">
            <h2 class="cta-title">Ready to Find Your Perfect Home?</h2>
            <p class="cta-description">Let our expert agents guide you through your real estate journey</p>
            <a href="<?php echo home_url('/contact'); ?>" class="btn-primary btn-large">Contact Us Today</a>
        </div>
    </div>
</section>

<style>
/* General Spacing */
section {
    padding: 80px 0;
}

/* Hero Section */
.hero-section {
    background: linear-gradient(135deg, var(--primary-color) 0%, var(--secondary-color) 100%);
    color: #ffffff;
    padding: 120px 0;
    text-align: center;
}

.hero-title {
    font-size: 48px;
    font-weight: 700;
    margin-bottom: 20px;
    font-family: 'Poppins', sans-serif;
}

.hero-subtitle {
    font-size: 20px;
    margin-bottom: 40px;
    opacity: 0.9;
}

.search-form {
    display: flex;
    max-width: 600px;
    margin: 0 auto;
    gap: 10px;
}

.search-input {
    flex: 1;
    padding: 15px 20px;
    border: none;
    border-radius: 5px;
    font-size: 16px;
    font-family: 'Poppins', sans-serif;
}

/* Section Headers */
.section-header {
    text-align: center;
    margin-bottom: 60px;
}

.section-title {
    font-size: 36px;
    font-weight: 700;
    margin-bottom: 15px;
    font-family: 'Poppins', sans-serif;
    padding-bottom: 20px;
}

.section-description {
    font-size: 18px;
    color: #666;
}

/* Properties Grid */
.properties-grid {
    display: grid;
    grid-template-columns: repeat(auto-fit, minmax(320px, 1fr));
    gap: 30px;
    margin-bottom: 40px;
}

.listing-card {
    border-radius: 10px;
    overflow: hidden;
    box-shadow: 0 5px 15px rgba(0,0,0,0.1);
}

.listing-image {
    position: relative;
    overflow: hidden;
    height: 250px;
}

.listing-image img {
    width: 100%;
    height: 100%;
    object-fit: cover;
    transition: transform 0.3s ease;
}

.listing-card:hover .listing-image img {
    transform: scale(1.1);
}

.listing-badge {
    position: absolute;
    top: 15px;
    right: 15px;
    background-color: var(--secondary-color);
    color: #ffffff;
    padding: 5px 15px;
    border-radius: 20px;
    font-size: 14px;
    font-weight: 600;
}

.listing-content {
    padding: 25px;
}

.listing-title {
    font-size: 22px;
    font-weight: 600;
    margin-bottom: 10px;
    font-family: 'Poppins', sans-serif;
    color: var(--primary-color);
}

.listing-location {
    display: flex;
    align-items: center;
    gap: 5px;
    color: #666;
    margin-bottom: 15px;
}

.listing-details {
    display: flex;
    gap: 20px;
    padding: 15px 0;
    border-top: 1px solid #eee;
    border-bottom: 1px solid #eee;
    margin-bottom: 15px;
}

.detail-item {
    font-size: 14px;
    color: #666;
}

.detail-item strong {
    color: var(--primary-color);
    font-size: 16px;
}

.listing-footer {
    display: flex;
    justify-content: space-between;
    align-items: center;
}

.listing-price {
    font-size: 24px;
    font-weight: 700;
    color: var(--secondary-color);
}

/* Buttons */
.btn-primary {
    padding: 12px 30px;
    border: none;
    border-radius: 5px;
    font-size: 16px;
    font-weight: 600;
    cursor: pointer;
    text-decoration: none;
    display: inline-block;
    font-family: 'Poppins', sans-serif;
}

.btn-small {
    padding: 8px 20px;
    font-size: 14px;
}

.btn-large {
    padding: 15px 40px;
    font-size: 18px;
}

.section-cta {
    text-align: center;
}

/* Features Section */
.features-grid {
    display: grid;
    grid-template-columns: repeat(auto-fit, minmax(280px, 1fr));
    gap: 40px;
}

.feature-card {
    text-align: center;
    padding: 30px;
    border-radius: 10px;
    transition: transform 0.3s ease;
}

.feature-card:hover {
    transform: translateY(-10px);
}

.feature-icon {
    color: var(--secondary-color);
    margin-bottom: 20px;
}

.feature-title {
    font-size: 22px;
    font-weight: 600;
    margin-bottom: 15px;
    font-family: 'Poppins', sans-serif;
    color: var(--primary-color);
}

.feature-description {
    font-size: 16px;
    color: #666;
    line-height: 1.6;
}

/* Why Choose Us */
.why-choose-us {
    background-color: var(--accent-color);
}

/* CTA Section */
.cta-section {
    background: linear-gradient(135deg, var(--secondary-color) 0%, var(--primary-color) 100%);
    color: #ffffff;
    text-align: center;
}

.cta-title {
    font-size: 36px;
    font-weight: 700;
    margin-bottom: 15px;
    font-family: 'Poppins', sans-serif;
}

.cta-description {
    font-size: 18px;
    margin-bottom: 30px;
    opacity: 0.9;
}

/* Responsive Styles */
@media (max-width: 768px) {
    .hero-title {
        font-size: 32px;
    }
    
    .hero-subtitle {
        font-size: 16px;
    }
    
    .search-form {
        flex-direction: column;
    }
    
    .section-title {
        font-size: 28px;
    }
    
    .properties-grid {
        grid-template-columns: 1fr;
    }
    
    section {
        padding: 50px 0;
    }
}

@media (min-width: 769px) and (max-width: 1024px) {
    .properties-grid {
        grid-template-columns: repeat(2, 1fr);
    }
    
    .hero-title {
        font-size: 40px;
    }
}
</style>

<?php get_footer(); ?>