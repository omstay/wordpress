<!DOCTYPE html>
<html <?php language_attributes(); ?>>
<head>
    <meta charset="<?php bloginfo('charset'); ?>">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <?php wp_head(); ?>
</head>
<body <?php body_class(); ?>>

<!-- Sticky Header -->
<header class="site-header">
    <div class="container">
        <div class="header-wrapper">
            <div class="logo">
                <?php if (has_custom_logo()): ?>
                    <?php the_custom_logo(); ?>
                <?php else: ?>
                    <h1 class="site-title">
                        <a href="<?php echo esc_url(home_url('/')); ?>">
                            <?php bloginfo('name'); ?>
                        </a>
                    </h1>
                <?php endif; ?>
            </div>
            
            <nav class="main-navigation">
                <button class="mobile-menu-toggle" aria-label="Menu">
                    <span></span>
                    <span></span>
                    <span></span>
                </button>
                
                <?php
                wp_nav_menu(array(
                    'theme_location' => 'primary',
                    'container' => false,
                    'menu_class' => 'nav-menu',
                    'fallback_cb' => function() {
                        echo '<ul class="nav-menu">';
                        echo '<li><a href="' . home_url('/') . '">Home</a></li>';
                        echo '<li><a href="' . home_url('/about') . '">About Us</a></li>';
                        echo '<li><a href="' . home_url('/properties') . '">Featured Listings</a></li>';
                        echo '<li><a href="' . home_url('/contact') . '">Contact</a></li>';
                        echo '</ul>';
                    }
                ));
                ?>
            </nav>
        </div>
    </div>
</header>

<style>
/* Header Styles */
.site-header {
    padding: 20px 0;
    transition: all 0.3s ease;
}

.container {
    max-width: 1200px;
    margin: 0 auto;
    padding: 0 20px;
}

.header-wrapper {
    display: flex;
    justify-content: space-between;
    align-items: center;
}

.logo a {
    text-decoration: none;
    color: #ffffff;
    font-size: 28px;
    font-weight: 700;
    font-family: 'Poppins', sans-serif;
}

.main-navigation {
    display: flex;
    align-items: center;
}

.nav-menu {
    display: flex;
    list-style: none;
    margin: 0;
    padding: 0;
    gap: 30px;
}

.nav-menu li a {
    font-family: 'Poppins', sans-serif;
    font-size: 16px;
    font-weight: 500;
    text-decoration: none;
    padding: 10px 0;
    display: block;
    position: relative;
}

.nav-menu li a::after {
    content: '';
    position: absolute;
    bottom: 5px;
    left: 0;
    width: 0;
    height: 2px;
    background-color: var(--secondary-color);
    transition: width 0.3s ease;
}

.nav-menu li a:hover::after {
    width: 100%;
}

.mobile-menu-toggle {
    display: none;
    flex-direction: column;
    background: none;
    border: none;
    cursor: pointer;
    padding: 10px;
}

.mobile-menu-toggle span {
    width: 25px;
    height: 3px;
    background-color: #ffffff;
    margin: 3px 0;
    transition: 0.3s;
}

/* Responsive Styles */
@media (max-width: 768px) {
    .mobile-menu-toggle {
        display: flex;
    }
    
    .nav-menu {
        position: fixed;
        top: 80px;
        left: -100%;
        flex-direction: column;
        background-color: var(--primary-color);
        width: 100%;
        padding: 20px;
        gap: 10px;
        transition: left 0.3s ease;
        box-shadow: 0 5px 20px rgba(0,0,0,0.2);
    }
    
    .nav-menu.active {
        left: 0;
    }
}

@media (max-width: 393px) {
    .logo a {
        font-size: 22px;
    }
    
    .header-wrapper {
        padding: 10px 0;
    }
}

@media (min-width: 769px) and (max-width: 1024px) {
    .nav-menu {
        gap: 20px;
    }
    
    .nav-menu li a {
        font-size: 15px;
    }
}
</style>

<script>
// Mobile Menu Toggle
document.addEventListener('DOMContentLoaded', function() {
    const menuToggle = document.querySelector('.mobile-menu-toggle');
    const navMenu = document.querySelector('.nav-menu');
    
    if (menuToggle) {
        menuToggle.addEventListener('click', function() {
            navMenu.classList.toggle('active');
        });
    }
});
</script>