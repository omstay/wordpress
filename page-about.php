<?php
/*
Template Name: About Page
*/
get_header();
?>

<section class="page-header">
    <div class="container">
        <h1 class="page-title fade-in">About Us</h1>
        <p class="page-subtitle fade-in">Your trusted real estate partner</p>
    </div>
</section>

<section class="about-intro">
    <div class="container">
        <div class="about-content-wrapper">
            <div class="about-text slide-up">
                <h2 class="section-title">Who We Are</h2>
                <p>Welcome to our real estate agency, where dreams meet reality. With over a decade of experience in the property market, we've helped thousands of families find their perfect homes and investors discover lucrative opportunities.</p>
                <p>Our team of dedicated professionals combines local market expertise with cutting-edge technology to provide you with the best possible service. Whether you're buying, selling, or renting, we're here to guide you every step of the way.</p>
            </div>
            <div class="about-image slide-up">
                <img src="<?php echo get_template_directory_uri(); ?>/assets/images/about-image.jpg" alt="About Us" style="width: 100%; border-radius: 10px; box-shadow: 0 10px 30px rgba(0,0,0,0.15);">
            </div>
        </div>
    </div>
</section>

<section class="our-mission">
    <div class="container">
        <div class="mission-grid">
            <div class="mission-card slide-up">
                <div class="mission-icon">
                    <svg width="60" height="60" fill="currentColor" viewBox="0 0 16 16">
                        <path d="M8 15A7 7 0 1 1 8 1a7 7 0 0 1 0 14zm0 1A8 8 0 1 0 8 0a8 8 0 0 0 0 16z"/>
                        <path d="M10.97 4.97a.235.235 0 0 0-.02.022L7.477 9.417 5.384 7.323a.75.75 0 0 0-1.06 1.06L6.97 11.03a.75.75 0 0 0 1.079-.02l3.992-4.99a.75.75 0 0 0-1.071-1.05z"/>
                    </svg>
                </div>
                <h3>Our Mission</h3>
                <p>To provide exceptional real estate services through integrity, innovation, and personalized attention to every client's unique needs.</p>
            </div>

            <div class="mission-card slide-up">
                <div class="mission-icon">
                    <svg width="60" height="60" fill="currentColor" viewBox="0 0 16 16">
                        <path d="M8 2a.5.5 0 0 1 .5.5V4a.5.5 0 0 1-1 0V2.5A.5.5 0 0 1 8 2zM3.732 3.732a.5.5 0 0 1 .707 0l.915.914a.5.5 0 1 1-.708.708l-.914-.915a.5.5 0 0 1 0-.707zM2 8a.5.5 0 0 1 .5-.5h1.586a.5.5 0 0 1 0 1H2.5A.5.5 0 0 1 2 8zm9.5 0a.5.5 0 0 1 .5-.5h1.5a.5.5 0 0 1 0 1H12a.5.5 0 0 1-.5-.5zm.754-4.246a.389.389 0 0 0-.527-.02L7.547 7.31A.91.91 0 1 0 8.85 8.569l3.434-4.297a.389.389 0 0 0-.029-.518z"/>
                        <path fill-rule="evenodd" d="M6.664 15.889A8 8 0 1 1 9.336.11a8 8 0 0 1-2.672 15.78zm-4.665-4.283A11.945 11.945 0 0 1 8 10c2.186 0 4.236.585 6.001 1.606a7 7 0 1 0-12.002 0z"/>
                    </svg>
                </div>
                <h3>Our Vision</h3>
                <p>To be the most trusted and innovative real estate company, setting new standards in customer service and market expertise.</p>
            </div>

            <div class="mission-card slide-up">
                <div class="mission-icon">
                    <svg width="60" height="60" fill="currentColor" viewBox="0 0 16 16">
                        <path d="M3 14s-1 0-1-1 1-4 6-4 6 3 6 4-1 1-1 1H3Zm5-6a3 3 0 1 0 0-6 3 3 0 0 0 0 6Z"/>
                    </svg>
                </div>
                <h3>Our Values</h3>
                <p>Integrity, transparency, professionalism, and commitment to excellence guide everything we do for our clients.</p>
            </div>
        </div>
    </div>
</section>

<section class="our-team">
    <div class="container">
        <div class="section-header slide-up">
            <h2 class="section-title">Meet Our Team</h2>
            <p class="section-description">Experienced professionals dedicated to your success</p>
        </div>

        <div class="team-grid">
            <div class="team-member slide-up">
                <div class="member-photo">
                    <div style="width: 100%; height: 300px; background: linear-gradient(135deg, var(--primary-color) 0%, var(--secondary-color) 100%); border-radius: 10px; display: flex; align-items: center; justify-content: center; color: white; font-size: 60px; font-weight: bold;">JD</div>
                </div>
                <div class="member-info">
                    <h3>John Doe</h3>
                    <p class="member-role">CEO & Founder</p>
                    <p class="member-bio">20+ years of experience in real estate investment and development.</p>
                </div>
            </div>

            <div class="team-member slide-up">
                <div class="member-photo">
                    <div style="width: 100%; height: 300px; background: linear-gradient(135deg, var(--secondary-color) 0%, var(--primary-color) 100%); border-radius: 10px; display: flex; align-items: center; justify-content: center; color: white; font-size: 60px; font-weight: bold;">JS</div>
                </div>
                <div class="member-info">
                    <h3>Jane Smith</h3>
                    <p class="member-role">Head of Sales</p>
                    <p class="member-bio">Expert in residential properties with a proven track record of success.</p>
                </div>
            </div>

            <div class="team-member slide-up">
                <div class="member-photo">
                    <div style="width: 100%; height: 300px; background: linear-gradient(135deg, var(--primary-color) 0%, var(--secondary-color) 100%); border-radius: 10px; display: flex; align-items: center; justify-content: center; color: white; font-size: 60px; font-weight: bold;">MJ</div>
                </div>
                <div class="member-info">
                    <h3>Mike Johnson</h3>
                    <p class="member-role">Commercial Specialist</p>
                    <p class="member-bio">Specializing in commercial real estate and investment properties.</p>
                </div>
            </div>
        </div>
    </div>
</section>

<section class="stats-section">
    <div class="container">
        <div class="stats-grid">
            <div class="stat-item fade-in">
                <h2 class="stat-number">500+</h2>
                <p class="stat-label">Properties Sold</p>
            </div>
            <div class="stat-item fade-in">
                <h2 class="stat-number">1000+</h2>
                <p class="stat-label">Happy Clients</p>
            </div>
            <div class="stat-item fade-in">
                <h2 class="stat-number">15+</h2>
                <p class="stat-label">Years Experience</p>
            </div>
            <div class="stat-item fade-in">
                <h2 class="stat-number">50+</h2>
                <p class="stat-label">Expert Agents</p>
            </div>
        </div>
    </div>
</section>

<section class="cta-section">
    <div class="container">
        <div class="cta-content fade-in">
            <h2 class="cta-title">Ready to Work With Us?</h2>
            <p class="cta-description">Let's find your perfect property together</p>
            <a href="<?php echo home_url('/contact'); ?>" class="btn-primary btn-large">Get In Touch</a>
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
}

.page-subtitle {
    font-size: 20px;
    opacity: 0.9;
}

/* About Intro Section */
.about-intro {
    padding: 80px 0;
}

.about-content-wrapper {
    display: grid;
    grid-template-columns: 1fr 1fr;
    gap: 60px;
    align-items: center;
}

.about-text h2 {
    margin-bottom: 25px;
}

.about-text p {
    font-size: 16px;
    line-height: 1.8;
    color: #555;
    margin-bottom: 20px;
}

/* Mission Section */
.our-mission {
    padding: 80px 0;
    background-color: var(--accent-color);
}

.mission-grid {
    display: grid;
    grid-template-columns: repeat(auto-fit, minmax(300px, 1fr));
    gap: 40px;
}

.mission-card {
    background-color: #ffffff;
    padding: 40px;
    border-radius: 10px;
    text-align: center;
    box-shadow: 0 5px 20px rgba(0,0,0,0.08);
    transition: transform 0.3s ease;
}

.mission-card:hover {
    transform: translateY(-10px);
}

.mission-icon {
    color: var(--secondary-color);
    margin-bottom: 20px;
}

.mission-card h3 {
    font-size: 24px;
    font-weight: 600;
    color: var(--primary-color);
    margin-bottom: 15px;
}

.mission-card p {
    font-size: 15px;
    color: #666;
    line-height: 1.6;
}

/* Team Section */
.our-team {
    padding: 80px 0;
}

.section-header {
    text-align: center;
    margin-bottom: 60px;
}

.section-title {
    font-size: 36px;
    font-weight: 700;
    color: var(--primary-color);
    margin-bottom: 15px;
    position: relative;
    display: inline-block;
    padding-bottom: 15px;
}

.section-title::after {
    content: '';
    position: absolute;
    bottom: 0;
    left: 50%;
    transform: translateX(-50%);
    width: 60px;
    height: 3px;
    background-color: var(--secondary-color);
}

.section-description {
    font-size: 18px;
    color: #666;
}

.team-grid {
    display: grid;
    grid-template-columns: repeat(auto-fit, minmax(300px, 1fr));
    gap: 40px;
}

.team-member {
    background-color: var(--accent-color);
    border-radius: 10px;
    overflow: hidden;
    box-shadow: 0 5px 20px rgba(0,0,0,0.1);
    transition: transform 0.3s ease;
}

.team-member:hover {
    transform: translateY(-10px);
}

.member-photo {
    overflow: hidden;
}

.member-info {
    padding: 25px;
    text-align: center;
}

.member-info h3 {
    font-size: 22px;
    font-weight: 600;
    color: var(--primary-color);
    margin-bottom: 8px;
}

.member-role {
    font-size: 14px;
    color: var(--secondary-color);
    font-weight: 600;
    margin-bottom: 15px;
    text-transform: uppercase;
    letter-spacing: 1px;
}

.member-bio {
    font-size: 15px;
    color: #666;
    line-height: 1.6;
}

/* Stats Section */
.stats-section {
    padding: 80px 0;
    background: linear-gradient(135deg, var(--primary-color) 0%, var(--secondary-color) 100%);
    color: #ffffff;
}

.stats-grid {
    display: grid;
    grid-template-columns: repeat(auto-fit, minmax(200px, 1fr));
    gap: 40px;
    text-align: center;
}

.stat-item {
    padding: 20px;
}

.stat-number {
    font-size: 48px;
    font-weight: 700;
    margin-bottom: 10px;
    color: #ffffff;
}

.stat-label {
    font-size: 18px;
    opacity: 0.9;
}

/* CTA Section */
.cta-section {
    padding: 80px 0;
    background: linear-gradient(135deg, var(--secondary-color) 0%, var(--primary-color) 100%);
    color: #ffffff;
    text-align: center;
}

.cta-title {
    font-size: 36px;
    font-weight: 700;
    margin-bottom: 15px;
}

.cta-description {
    font-size: 18px;
    margin-bottom: 30px;
    opacity: 0.9;
}

.btn-primary {
    background-color: #ffffff;
    color: var(--primary-color);
    padding: 15px 40px;
    border: none;
    border-radius: 5px;
    font-size: 18px;
    font-weight: 600;
    cursor: pointer;
    text-decoration: none;
    display: inline-block;
    transition: all 0.3s ease;
}

.btn-primary:hover {
    transform: translateY(-3px);
    box-shadow: 0 10px 25px rgba(0,0,0,0.2);
}

.btn-large {
    padding: 15px 40px;
    font-size: 18px;
}

/* Responsive Styles */
@media (max-width: 768px) {
    .page-title {
        font-size: 32px;
    }
    
    .page-subtitle {
        font-size: 16px;
    }
    
    .about-content-wrapper {
        grid-template-columns: 1fr;
        gap: 40px;
    }
    
    .mission-grid,
    .team-grid {
        grid-template-columns: 1fr;
    }
    
    .stats-grid {
        grid-template-columns: repeat(2, 1fr);
        gap: 30px;
    }
    
    .stat-number {
        font-size: 36px;
    }
    
    .section-title {
        font-size: 28px;
    }
    
    .cta-title {
        font-size: 28px;
    }
}

@media (max-width: 393px) {
    .page-header {
        padding: 50px 0;
    }
    
    .about-intro,
    .our-mission,
    .our-team,
    .stats-section,
    .cta-section {
        padding: 50px 0;
    }
    
    .mission-card,
    .member-info {
        padding: 25px 20px;
    }
    
    .stats-grid {
        grid-template-columns: 1fr;
    }
}
</style>

<?php get_footer(); ?>