<?php get_header(); ?>

<section class="page-header">
    <div class="container">
        <h1 class="page-title fade-in">All Properties</h1>
        <p class="page-subtitle fade-in">Browse our complete property listings</p>
    </div>
</section>

<section class="properties-archive">
    <div class="container">
        <div class="properties-grid">
            <?php
            if (have_posts()):
                while (have_posts()): the_post();
                    $property_id = get_the_ID();
            ?>
                <div class="listing-card slide-up">
                    <?php if (has_post_thumbnail()): ?>
                        <div class="listing-image">
                            <a href="<?php the_permalink(); ?>">
                                <?php the_post_thumbnail('medium_large'); ?>
                            </a>
                        </div>
                    <?php endif; ?>
                    
                    <div class="listing-content">
                        <h3 class="listing-title">
                            <a href="<?php the_permalink(); ?>"><?php the_title(); ?></a>
                        </h3>
                        <p class="listing-location">
                            <svg width="16" height="16" fill="currentColor" viewBox="0 0 16 16">
                                <path d="M8 0a5 5 0 0 0-5 5c0 3.5 5 11 5 11s5-7.5 5-11a5 5 0 0 0-5-5zm0 7a2 2 0 1 1 0-4 2 2 0 0 1 0 4z"/>
                            </svg>
                            <?php echo get_post_meta($property_id, 'location', true); ?>
                        </p>
                        <div class="listing-details">
                            <span class="detail-item">
                                <strong><?php echo get_post_meta($property_id, 'bedrooms', true); ?></strong> Beds
                            </span>
                            <span class="detail-item">
                                <strong><?php echo get_post_meta($property_id, 'bathrooms', true); ?></strong> Baths
                            </span>
                            <span class="detail-item">
                                <strong><?php echo get_post_meta($property_id, 'sqft', true); ?></strong> Sq Ft
                            </span>
                        </div>
                        <div class="listing-footer">
                            <span class="listing-price">₹<?php echo get_post_meta($property_id, 'price', true); ?></span>
                            <a href="<?php the_permalink(); ?>" class="btn-primary btn-small">View Details</a>
                        </div>
                    </div>
                </div>
            <?php
                endwhile;
            else:
            ?>
                <p>No properties found.</p>
            <?php endif; ?>
        </div>
        
        <?php the_posts_pagination(); ?>
    </div>
</section>

<?php get_footer(); ?>