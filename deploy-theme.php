<?php
/**
 * Automated Theme Deployment Script
 * Run this once after uploading theme to each site
 * Access: yoursite.com/wp-content/themes/realestate-dynamic/deploy-theme.php
 */

// Security check
define('DEPLOYMENT_KEY', 'itspaxios2025'); // Change this for security

if (!isset($_GET['key']) || $_GET['key'] !== DEPLOYMENT_KEY) {
    die('Unauthorized access');
}

// Load WordPress
require_once('../../../wp-load.php');

if (!current_user_can('administrator')) {
    die('You must be logged in as administrator');
}

echo '<h1>Theme Deployment in Progress...</h1>';
echo '<style>body{font-family:Arial;padding:20px;background:#f5f5f5;} .success{color:green;} .error{color:red;}</style>';

// Step 1: Set site color number based on domain
function get_site_number_from_domain() {
    $domain = $_SERVER['HTTP_HOST'];
    preg_match('/itspaxio(\d+)/', $domain, $matches);
    return isset($matches[1]) ? intval($matches[1]) : 1;
}

$site_number = get_site_number_from_domain();
update_option('site_color_number', $site_number);
echo "<p class='success'>✓ Color scheme set to: Site $site_number</p>";

// Step 2: Create required pages
$pages = array(
    'about' => array(
        'title' => 'About Us',
        'template' => 'page-about.php'
    ),
    'contact' => array(
        'title' => 'Contact',
        'template' => 'page-contact.php'
    )
);

foreach ($pages as $slug => $page_data) {
    $existing_page = get_page_by_path($slug);
    
    if (!$existing_page) {
        $page_id = wp_insert_post(array(
            'post_title' => $page_data['title'],
            'post_name' => $slug,
            'post_status' => 'publish',
            'post_type' => 'page',
            'post_content' => ''
        ));
        
        if ($page_id && !is_wp_error($page_id)) {
            update_post_meta($page_id, '_wp_page_template', $page_data['template']);
            echo "<p class='success'>✓ Created page: {$page_data['title']}</p>";
        } else {
            echo "<p class='error'>✗ Failed to create: {$page_data['title']}</p>";
        }
    } else {
        echo "<p class='success'>✓ Page already exists: {$page_data['title']}</p>";
    }
}

// Step 3: Create sample properties
function create_sample_properties() {
    $properties = array(
        array(
            'title' => 'Luxury Villa in Chennai',
            'location' => 'Anna Nagar, Chennai',
            'price' => '1,50,00,000',
            'bedrooms' => '4',
            'bathrooms' => '3',
            'sqft' => '2500',
            'property_type' => 'Villa',
            'year_built' => '2023',
            'parking' => '2',
            'featured' => '1'
        ),
        array(
            'title' => 'Modern Apartment',
            'location' => 'T Nagar, Chennai',
            'price' => '85,00,000',
            'bedrooms' => '3',
            'bathrooms' => '2',
            'sqft' => '1800',
            'property_type' => 'Apartment',
            'year_built' => '2024',
            'parking' => '1',
            'featured' => '1'
        ),
        array(
            'title' => 'Spacious Family Home',
            'location' => 'Velachery, Chennai',
            'price' => '1,20,00,000',
            'bedrooms' => '3',
            'bathrooms' => '2',
            'sqft' => '2000',
            'property_type' => 'House',
            'year_built' => '2023',
            'parking' => '2',
            'featured' => '1'
        ),
        array(
            'title' => 'Premium Penthouse',
            'location' => 'Adyar, Chennai',
            'price' => '2,50,00,000',
            'bedrooms' => '5',
            'bathrooms' => '4',
            'sqft' => '3500',
            'property_type' => 'Penthouse',
            'year_built' => '2024',
            'parking' => '3',
            'featured' => '1'
        ),
        array(
            'title' => 'Cozy Studio Apartment',
            'location' => 'OMR, Chennai',
            'price' => '45,00,000',
            'bedrooms' => '2',
            'bathrooms' => '1',
            'sqft' => '1200',
            'property_type' => 'Studio',
            'year_built' => '2024',
            'parking' => '1',
            'featured' => '1'
        ),
        array(
            'title' => 'Beachfront Property',
            'location' => 'ECR, Chennai',
            'price' => '3,00,00,000',
            'bedrooms' => '4',
            'bathrooms' => '3',
            'sqft' => '3000',
            'property_type' => 'Villa',
            'year_built' => '2023',
            'parking' => '2',
            'featured' => '1'
        )
    );
    
    $created = 0;
    foreach ($properties as $property) {
        // Check if property already exists
        $existing = get_posts(array(
            'post_type' => 'property',
            'title' => $property['title'],
            'posts_per_page' => 1
        ));
        
        if (empty($existing)) {
            $property_id = wp_insert_post(array(
                'post_title' => $property['title'],
                'post_type' => 'property',
                'post_status' => 'publish',
                'post_content' => 'This is a beautiful property with modern amenities and excellent location. Perfect for families looking for a comfortable and luxurious living space.'
            ));
            
            if ($property_id && !is_wp_error($property_id)) {
                foreach ($property as $key => $value) {
                    if ($key !== 'title') {
                        update_post_meta($property_id, $key, $value);
                    }
                }
                $created++;
            }
        }
    }
    
    return $created;
}

$created_properties = create_sample_properties();
echo "<p class='success'>✓ Created $created_properties sample properties</p>";

// Step 4: Create and assign menu
$menu_name = 'Primary Menu';
$menu_exists = wp_get_nav_menu_object($menu_name);

if (!$menu_exists) {
    $menu_id = wp_create_nav_menu($menu_name);
    
    // Add Home
    wp_update_nav_menu_item($menu_id, 0, array(
        'menu-item-title' => 'Home',
        'menu-item-url' => home_url('/'),
        'menu-item-status' => 'publish'
    ));
    
    // Add About
    $about_page = get_page_by_path('about');
    if ($about_page) {
        wp_update_nav_menu_item($menu_id, 0, array(
            'menu-item-object-id' => $about_page->ID,
            'menu-item-object' => 'page',
            'menu-item-type' => 'post_type',
            'menu-item-status' => 'publish'
        ));
    }
    
    // Add Properties
    wp_update_nav_menu_item($menu_id, 0, array(
        'menu-item-title' => 'Featured Listings',
        'menu-item-url' => get_post_type_archive_link('property'),
        'menu-item-status' => 'publish'
    ));
    
    // Add Contact
    $contact_page = get_page_by_path('contact');
    if ($contact_page) {
        wp_update_nav_menu_item($menu_id, 0, array(
            'menu-item-object-id' => $contact_page->ID,
            'menu-item-object' => 'page',
            'menu-item-type' => 'post_type',
            'menu-item-status' => 'publish'
        ));
    }
    
    // Assign to primary location
    $locations = get_theme_mod('nav_menu_locations');
    $locations['primary'] = $menu_id;
    set_theme_mod('nav_menu_locations', $locations);
    
    echo "<p class='success'>✓ Created and assigned Primary Menu</p>";
} else {
    echo "<p class='success'>✓ Menu already exists</p>";
}

// Step 5: Set permalinks
update_option('permalink_structure', '/%postname%/');
flush_rewrite_rules();
echo "<p class='success'>✓ Permalinks set to Post Name</p>";

// Step 6: Set site title
$site_title = "Real Estate Site " . $site_number;
update_option('blogname', $site_title);
echo "<p class='success'>✓ Site title set to: $site_title</p>";

// Step 7: Set homepage
$home = get_page_by_path('home');
if (!$home) {
    // Create home page if doesn't exist
    $home_id = wp_insert_post(array(
        'post_title' => 'Home',
        'post_name' => 'home',
        'post_status' => 'publish',
        'post_type' => 'page',
        'post_content' => ''
    ));
} else {
    $home_id = $home->ID;
}

update_option('show_on_front', 'page');
update_option('page_on_front', $home_id);
echo "<p class='success'>✓ Homepage configured</p>";

echo '<hr>';
echo '<h2 class="success">Deployment Complete!</h2>';
echo '<p>Your site is now ready with:</p>';
echo '<ul>';
echo "<li>Color Scheme: Site $site_number</li>";
echo '<li>Pages: Home, About Us, Contact</li>';
echo "<li>Sample Properties: $created_properties listings</li>";
echo '<li>Navigation Menu: Configured</li>';
echo '<li>Permalinks: Set to Post Name</li>';
echo '</ul>';
echo '<p><strong>Next Steps:</strong></p>';
echo '<ol>';
echo '<li>Delete this deployment file for security</li>';
echo '<li>Visit <a href="' . home_url() . '">homepage</a> to verify</li>';
echo '<li>Go to <a href="' . admin_url('admin.php?page=realestate-colors') . '">Appearance → Color Scheme</a> to change colors if needed</li>';
echo '</ol>';
?>