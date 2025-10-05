<?php
/**
 * Theme Name: RealEstate Dynamic Color Theme
 * Description: Agent-based real estate theme with dynamic color schemes
 * Version: 1.0
 * Author: IT Spaxios Innovation
 */

// Theme Setup
function realestate_theme_setup() {
    add_theme_support('title-tag');
    add_theme_support('post-thumbnails');
    add_theme_support('custom-logo');
    register_nav_menus(array(
        'primary' => __('Primary Menu', 'realestate'),
    ));
}
add_action('after_setup_theme', 'realestate_theme_setup');

// Enqueue Styles and Scripts
function realestate_enqueue_assets() {
    wp_enqueue_style('google-fonts', 'https://fonts.googleapis.com/css2?family=Poppins:wght@300;400;500;600;700&display=swap');
    wp_enqueue_style('main-style', get_stylesheet_uri());
    wp_enqueue_style('dynamic-colors', get_template_directory_uri() . '/assets/css/dynamic-colors.css');
    wp_enqueue_script('main-script', get_template_directory_uri() . '/assets/js/main.js', array('jquery'), '1.0', true);
}
add_action('wp_enqueue_scripts', 'realestate_enqueue_assets');

// Dynamic Color Schemes (30 unique combinations)
function get_color_schemes() {
    return array(
        1 => array('primary' => '#2C3E50', 'secondary' => '#E74C3C', 'accent' => '#ECF0F1'),
        2 => array('primary' => '#1ABC9C', 'secondary' => '#34495E', 'accent' => '#F39C12'),
        3 => array('primary' => '#9B59B6', 'secondary' => '#3498DB', 'accent' => '#E8F8F5'),
        4 => array('primary' => '#E67E22', 'secondary' => '#2C3E50', 'accent' => '#BDC3C7'),
        5 => array('primary' => '#16A085', 'secondary' => '#C0392B', 'accent' => '#ECF0F1'),
        6 => array('primary' => '#27AE60', 'secondary' => '#8E44AD', 'accent' => '#F4F6F7'),
        7 => array('primary' => '#2980B9', 'secondary' => '#F39C12', 'accent' => '#FDFEFE'),
        8 => array('primary' => '#D35400', 'secondary' => '#1ABC9C', 'accent' => '#E8F6F3'),
        9 => array('primary' => '#C0392B', 'secondary' => '#16A085', 'accent' => '#F8F9F9'),
        10 => array('primary' => '#8E44AD', 'secondary' => '#27AE60', 'accent' => '#EAECEE'),
        11 => array('primary' => '#2C3E50', 'secondary' => '#F39C12', 'accent' => '#ECF0F1'),
        12 => array('primary' => '#1ABC9C', 'secondary' => '#E74C3C', 'accent' => '#F7F9F9'),
        13 => array('primary' => '#3498DB', 'secondary' => '#E67E22', 'accent' => '#EBF5FB'),
        14 => array('primary' => '#9B59B6', 'secondary' => '#16A085', 'accent' => '#F4ECF7'),
        15 => array('primary' => '#34495E', 'secondary' => '#1ABC9C', 'accent' => '#ECF0F1'),
        16 => array('primary' => '#E74C3C', 'secondary' => '#3498DB', 'accent' => '#FADBD8'),
        17 => array('primary' => '#F39C12', 'secondary' => '#9B59B6', 'accent' => '#FEF5E7'),
        18 => array('primary' => '#16A085', 'secondary' => '#E67E22', 'accent' => '#E8F8F5'),
        19 => array('primary' => '#C0392B', 'secondary' => '#27AE60', 'accent' => '#F9EBEA'),
        20 => array('primary' => '#8E44AD', 'secondary' => '#2980B9', 'accent' => '#F4ECF7'),
        21 => array('primary' => '#27AE60', 'secondary' => '#D35400', 'accent' => '#EAFAF1'),
        22 => array('primary' => '#2980B9', 'secondary' => '#C0392B', 'accent' => '#EBF5FB'),
        23 => array('primary' => '#D35400', 'secondary' => '#8E44AD', 'accent' => '#FEF5E7'),
        24 => array('primary' => '#1ABC9C', 'secondary' => '#2C3E50', 'accent' => '#E8F8F5'),
        25 => array('primary' => '#3498DB', 'secondary' => '#F39C12', 'accent' => '#D6EAF8'),
        26 => array('primary' => '#E67E22', 'secondary' => '#16A085', 'accent' => '#FDEBD0'),
        27 => array('primary' => '#9B59B6', 'secondary' => '#27AE60', 'accent' => '#EBDEF0'),
        28 => array('primary' => '#34495E', 'secondary' => '#E74C3C', 'accent' => '#D5DBDB'),
        29 => array('primary' => '#F39C12', 'secondary' => '#2980B9', 'accent' => '#FCF3CF'),
        30 => array('primary' => '#16A085', 'secondary' => '#9B59B6', 'accent' => '#D1F2EB'),
    );
}

// Get current site color scheme
function get_current_color_scheme() {
    $site_number = get_option('site_color_number', 1);
    $schemes = get_color_schemes();
    return isset($schemes[$site_number]) ? $schemes[$site_number] : $schemes[1];
}

// Generate Dynamic CSS
function generate_dynamic_css() {
    $colors = get_current_color_scheme();
    ?>
    <style id="dynamic-colors">
        :root {
            --primary-color: <?php echo $colors['primary']; ?>;
            --secondary-color: <?php echo $colors['secondary']; ?>;
            --accent-color: <?php echo $colors['accent']; ?>;
        }

        /* Header Styles */
        .site-header {
            background-color: var(--primary-color);
            position: sticky;
            top: 0;
            z-index: 1000;
            box-shadow: 0 2px 10px rgba(0,0,0,0.1);
        }

        /* Buttons & Links */
        .btn-primary {
            background-color: var(--secondary-color);
            color: #ffffff;
            transition: all 0.3s ease;
        }

        .btn-primary:hover {
            background-color: var(--primary-color);
            transform: translateY(-2px);
            box-shadow: 0 5px 15px rgba(0,0,0,0.2);
        }

        /* Featured Listings */
        .listing-card {
            border-top: 3px solid var(--secondary-color);
            background-color: var(--accent-color);
            transition: transform 0.3s ease, box-shadow 0.3s ease;
        }

        .listing-card:hover {
            transform: translateY(-5px);
            box-shadow: 0 10px 30px rgba(0,0,0,0.15);
        }

        /* Section Titles */
        .section-title {
            color: var(--primary-color);
            position: relative;
        }

        .section-title::after {
            content: '';
            position: absolute;
            bottom: -10px;
            left: 0;
            width: 60px;
            height: 3px;
            background-color: var(--secondary-color);
        }

        /* Footer */
        .site-footer {
            background-color: var(--primary-color);
            color: #ffffff;
        }

        .footer-link:hover {
            color: var(--secondary-color);
        }

        /* Form Elements */
        input:focus, textarea:focus, select:focus {
            border-color: var(--secondary-color);
            outline: none;
            box-shadow: 0 0 0 3px rgba(<?php echo implode(',', sscanf($colors['secondary'], "#%02x%02x%02x")); ?>, 0.1);
        }

        /* Navigation */
        .nav-link {
            color: #ffffff;
            transition: color 0.3s ease;
        }

        .nav-link:hover {
            color: var(--secondary-color);
        }

        /* Animations */
        .fade-in {
            animation: fadeIn 0.6s ease-in;
        }

        .slide-up {
            animation: slideUp 0.8s ease-out;
        }

        @keyframes fadeIn {
            from { opacity: 0; }
            to { opacity: 1; }
        }

        @keyframes slideUp {
            from {
                opacity: 0;
                transform: translateY(30px);
            }
            to {
                opacity: 1;
                transform: translateY(0);
            }
        }

        /* Responsive Styles */
        @media (max-width: 768px) {
            .site-header {
                padding: 15px 0;
            }
        }
    </style>
    <?php
}
add_action('wp_head', 'generate_dynamic_css');

// Custom Post Type: Properties
function register_property_post_type() {
    $args = array(
        'labels' => array(
            'name' => 'Properties',
            'singular_name' => 'Property'
        ),
        'public' => true,
        'has_archive' => true,
        'supports' => array('title', 'editor', 'thumbnail', 'custom-fields'),
        'menu_icon' => 'dashicons-admin-home',
    );
    register_post_type('property', $args);
}
add_action('init', 'register_property_post_type');

// Admin Settings Page
function realestate_add_admin_page() {
    add_theme_page(
        'Color Scheme Settings',
        'Color Scheme',
        'manage_options',
        'realestate-colors',
        'realestate_color_settings_page'
    );
}
add_action('admin_menu', 'realestate_add_admin_page');
// Create default pages on theme activation
function realestate_create_default_pages() {
    // Check if pages already exist
    $about_page = get_page_by_path('about');
    $contact_page = get_page_by_path('contact');
    $properties_page = get_page_by_path('properties');
    
    // Create About page
    if (!$about_page) {
        wp_insert_post(array(
            'post_title' => 'About Us',
            'post_name' => 'about',
            'post_content' => '',
            'post_status' => 'publish',
            'post_type' => 'page',
            'page_template' => 'page-about.php'
        ));
    }
    
    // Create Contact page
    if (!$contact_page) {
        wp_insert_post(array(
            'post_title' => 'Contact',
            'post_name' => 'contact',
            'post_content' => '',
            'post_status' => 'publish',
            'post_type' => 'page',
            'page_template' => 'page-contact.php'
        ));
    }
    
    // Create Properties archive page
    if (!$properties_page) {
        wp_insert_post(array(
            'post_title' => 'Properties',
            'post_name' => 'properties',
            'post_content' => '',
            'post_status' => 'publish',
            'post_type' => 'page'
        ));
    }
}
add_action('after_switch_theme', 'realestate_create_default_pages');
function realestate_color_settings_page() {
    if (isset($_POST['site_color_number'])) {
        update_option('site_color_number', intval($_POST['site_color_number']));
        echo '<div class="notice notice-success"><p>Color scheme updated!</p></div>';
    }
    
    $current = get_option('site_color_number', 1);
    $schemes = get_color_schemes();
    ?>
    <div class="wrap">
        <h1>Select Color Scheme (1-30)</h1>
        <form method="post">
            <table class="form-table">
                <tr>
                    <th>Site Number (1-30)</th>
                    <td>
                        <select name="site_color_number">
                            <?php for($i = 1; $i <= 30; $i++): ?>
                                <option value="<?php echo $i; ?>" <?php selected($current, $i); ?>>
                                    Site <?php echo $i; ?> - 
                                    <?php echo $schemes[$i]['primary']; ?>, 
                                    <?php echo $schemes[$i]['secondary']; ?>, 
                                    <?php echo $schemes[$i]['accent']; ?>
                                </option>
                            <?php endfor; ?>
                        </select>
                    </td>
                </tr>
            </table>
            <?php submit_button('Save Color Scheme'); ?>
        </form>
        
        <h2>Color Preview</h2>
        <div style="display: flex; gap: 20px; margin-top: 20px;">
            <?php 
            $colors = get_current_color_scheme();
            foreach($colors as $name => $color): ?>
                <div style="text-align: center;">
                    <div style="width: 100px; height: 100px; background-color: <?php echo $color; ?>; border: 2px solid #ccc;"></div>
                    <p><strong><?php echo ucfirst($name); ?></strong><br><?php echo $color; ?></p>
                </div>
            <?php endforeach; ?>
        </div>
    </div>
    <?php
}
?>