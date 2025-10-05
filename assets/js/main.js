/**
 * Main JavaScript File
 * RealEstate Dynamic Color Theme
 * Version: 1.0
 */

(function($) {
    'use strict';

    // Document Ready
    $(document).ready(function() {
        
        // Initialize all functions
        initStickyHeader();
        initMobileMenu();
        initScrollAnimations();
        initPropertyGallery();
        initSearchFilter();
        initFormValidation();
        initBackToTop();
        initLazyLoading();
        initPropertyCards();
        
    });

    /**
     * Sticky Header on Scroll
     */
    function initStickyHeader() {
        let lastScroll = 0;
        const header = $('.site-header');
        
        $(window).scroll(function() {
            const currentScroll = $(this).scrollTop();
            
            if (currentScroll > 100) {
                header.addClass('scrolled');
                
                // Hide header on scroll down, show on scroll up
                if (currentScroll > lastScroll) {
                    header.css('transform', 'translateY(-100%)');
                } else {
                    header.css('transform', 'translateY(0)');
                }
            } else {
                header.removeClass('scrolled');
                header.css('transform', 'translateY(0)');
            }
            
            lastScroll = currentScroll;
        });
    }

    /**
     * Mobile Menu Toggle
     */
    function initMobileMenu() {
        const menuToggle = $('.mobile-menu-toggle');
        const navMenu = $('.nav-menu');
        
        menuToggle.on('click', function() {
            $(this).toggleClass('active');
            navMenu.toggleClass('active');
            $('body').toggleClass('menu-open');
        });
        
        // Close menu on link click
        $('.nav-menu a').on('click', function() {
            if ($(window).width() <= 768) {
                menuToggle.removeClass('active');
                navMenu.removeClass('active');
                $('body').removeClass('menu-open');
            }
        });
        
        // Close menu on outside click
        $(document).on('click', function(e) {
            if (!$(e.target).closest('.main-navigation').length) {
                menuToggle.removeClass('active');
                navMenu.removeClass('active');
                $('body').removeClass('menu-open');
            }
        });
    }

    /**
     * Scroll Animations
     */
    function initScrollAnimations() {
        const animatedElements = $('.fade-in, .slide-up, .slide-in-left, .slide-in-right, .zoom-in');
        
        function checkAnimation() {
            const windowHeight = $(window).height();
            const scrollTop = $(window).scrollTop();
            
            animatedElements.each(function() {
                const elementTop = $(this).offset().top;
                
                if (scrollTop + windowHeight > elementTop + 100) {
                    $(this).addClass('animated');
                }
            });
        }
        
        // Check on scroll
        $(window).on('scroll', checkAnimation);
        
        // Check on load
        checkAnimation();
    }

    /**
     * Property Gallery with Lightbox
     */
    function initPropertyGallery() {
        const mainImage = $('.main-image img');
        const thumbnails = $('.thumbnail-item');
        
        thumbnails.on('click', function() {
            const newSrc = $(this).find('img').attr('src');
            mainImage.fadeOut(200, function() {
                $(this).attr('src', newSrc).fadeIn(200);
            });
            
            thumbnails.removeClass('active');
            $(this).addClass('active');
        });
        
        // Lightbox functionality
        if (mainImage.length) {
            mainImage.on('click', function() {
                const src = $(this).attr('src');
                createLightbox(src);
            });
        }
    }

    /**
     * Create Lightbox
     */
    function createLightbox(imageSrc) {
        const lightbox = $('<div class="lightbox-overlay"></div>');
        const lightboxContent = $(`
            <div class="lightbox-content">
                <img src="${imageSrc}" alt="Property Image">
                <button class="lightbox-close">&times;</button>
            </div>
        `);
        
        lightbox.append(lightboxContent);
        $('body').append(lightbox);
        
        setTimeout(() => lightbox.addClass('active'), 10);
        
        // Close lightbox
        lightbox.on('click', function(e) {
            if ($(e.target).is('.lightbox-overlay') || $(e.target).is('.lightbox-close')) {
                lightbox.removeClass('active');
                setTimeout(() => lightbox.remove(), 300);
            }
        });
    }

    /**
     * Property Search Filter
     */
    function initSearchFilter() {
        const searchForm = $('.search-form');
        const filterButtons = $('.filter-button');
        
        // Handle filter buttons
        filterButtons.on('click', function() {
            const filterType = $(this).data('filter');
            
            filterButtons.removeClass('active');
            $(this).addClass('active');
            
            filterProperties(filterType);
        });
        
        // Handle search form
        searchForm.on('submit', function(e) {
            // Add loading state
            $(this).addClass('loading');
        });
    }

    /**
     * Filter Properties
     */
    function filterProperties(filterType) {
        const properties = $('.listing-card');
        
        if (filterType === 'all') {
            properties.fadeIn(300);
        } else {
            properties.each(function() {
                const propertyType = $(this).data('type');
                
                if (propertyType === filterType) {
                    $(this).fadeIn(300);
                } else {
                    $(this).fadeOut(300);
                }
            });
        }
    }

    /**
     * Form Validation
     */
    function initFormValidation() {
        const forms = $('form');
        
        forms.on('submit', function(e) {
            const form = $(this);
            let isValid = true;
            
            // Remove previous errors
            form.find('.error-message').remove();
            form.find('.error').removeClass('error');
            
            // Validate required fields
            form.find('[required]').each(function() {
                const field = $(this);
                const value = field.val().trim();
                
                if (value === '') {
                    showError(field, 'This field is required');
                    isValid = false;
                }
            });
            
            // Validate email
            form.find('input[type="email"]').each(function() {
                const field = $(this);
                const value = field.val().trim();
                const emailRegex = /^[^\s@]+@[^\s@]+\.[^\s@]+$/;
                
                if (value && !emailRegex.test(value)) {
                    showError(field, 'Please enter a valid email address');
                    isValid = false;
                }
            });
            
            // Validate phone
            form.find('input[type="tel"]').each(function() {
                const field = $(this);
                const value = field.val().trim();
                const phoneRegex = /^[0-9+\-\s()]+$/;
                
                if (value && !phoneRegex.test(value)) {
                    showError(field, 'Please enter a valid phone number');
                    isValid = false;
                }
            });
            
            if (!isValid) {
                e.preventDefault();
                
                // Scroll to first error
                const firstError = form.find('.error').first();
                if (firstError.length) {
                    $('html, body').animate({
                        scrollTop: firstError.offset().top - 100
                    }, 500);
                }
            }
        });
    }

    /**
     * Show Form Error
     */
    function showError(field, message) {
        field.addClass('error');
        const errorElement = $(`<span class="error-message">${message}</span>`);
        field.after(errorElement);
    }

    /**
     * Back to Top Button
     */
    function initBackToTop() {
        // Create back to top button
        const backToTop = $('<button class="back-to-top" aria-label="Back to Top"><svg width="24" height="24" fill="currentColor" viewBox="0 0 16 16"><path d="M8 15a.5.5 0 0 0 .5-.5V2.707l3.146 3.147a.5.5 0 0 0 .708-.708l-4-4a.5.5 0 0 0-.708 0l-4 4a.5.5 0 1 0 .708.708L7.5 2.707V14.5a.5.5 0 0 0 .5.5z"/></svg></button>');
        
        $('body').append(backToTop);
        
        // Show/hide button
        $(window).scroll(function() {
            if ($(this).scrollTop() > 300) {
                backToTop.addClass('visible');
            } else {
                backToTop.removeClass('visible');
            }
        });
        
        // Scroll to top
        backToTop.on('click', function() {
            $('html, body').animate({ scrollTop: 0 }, 600);
        });
    }

    /**
     * Lazy Loading Images
     */
    function initLazyLoading() {
        if ('IntersectionObserver' in window) {
            const imageObserver = new IntersectionObserver(function(entries) {
                entries.forEach(function(entry) {
                    if (entry.isIntersecting) {
                        const img = entry.target;
                        const src = img.getAttribute('data-src');
                        
                        if (src) {
                            img.src = src;
                            img.removeAttribute('data-src');
                            img.classList.add('loaded');
                        }
                        
                        imageObserver.unobserve(img);
                    }
                });
            });
            
            const lazyImages = document.querySelectorAll('img[data-src]');
            lazyImages.forEach(function(img) {
                imageObserver.observe(img);
            });
        }
    }

    /**
     * Property Cards Hover Effect
     */
    function initPropertyCards() {
        const cards = $('.listing-card');
        
        cards.each(function() {
            const card = $(this);
            
            card.on('mouseenter', function() {
                $(this).find('.listing-image img').css('transform', 'scale(1.1)');
            });
            
            card.on('mouseleave', function() {
                $(this).find('.listing-image img').css('transform', 'scale(1)');
            });
        });
        
        // Add favorite functionality
        const favoriteButtons = $('.favorite-button');
        
        favoriteButtons.on('click', function(e) {
            e.preventDefault();
            e.stopPropagation();
            
            $(this).toggleClass('active');
            
            // Store in localStorage
            const propertyId = $(this).data('property-id');
            toggleFavorite(propertyId);
        });
    }

    /**
     * Toggle Favorite Property
     */
    function toggleFavorite(propertyId) {
        let favorites = JSON.parse(localStorage.getItem('favorites') || '[]');
        
        if (favorites.includes(propertyId)) {
            favorites = favorites.filter(id => id !== propertyId);
        } else {
            favorites.push(propertyId);
        }
        
        localStorage.setItem('favorites', JSON.stringify(favorites));
    }

    /**
     * Number Counter Animation
     */
    function animateCounter(element, target) {
        const duration = 2000;
        const step = target / (duration / 16);
        let current = 0;
        
        const timer = setInterval(function() {
            current += step;
            if (current >= target) {
                current = target;
                clearInterval(timer);
            }
            element.text(Math.floor(current));
        }, 16);
    }

    /**
     * Initialize Counters
     */
    $('.counter').each(function() {
        const counter = $(this);
        const target = parseInt(counter.data('target'));
        
        const observer = new IntersectionObserver(function(entries) {
            entries.forEach(function(entry) {
                if (entry.isIntersecting) {
                    animateCounter(counter, target);
                    observer.unobserve(entry.target);
                }
            });
        });
        
        observer.observe(counter[0]);
    });

    /**
     * Property Comparison
     */
    window.compareProperties = function() {
        const selectedProperties = [];
        
        $('.property-compare-checkbox:checked').each(function() {
            selectedProperties.push($(this).val());
        });
        
        if (selectedProperties.length < 2) {
            alert('Please select at least 2 properties to compare');
            return;
        }
        
        if (selectedProperties.length > 3) {
            alert('You can compare maximum 3 properties at a time');
            return;
        }
        
        // Redirect to comparison page
        window.location.href = '/compare?properties=' + selectedProperties.join(',');
    };

    /**
     * Print Property Details
     */
    window.printProperty = function() {
        window.print();
    };

    /**
     * Share Property
     */
    window.shareProperty = function(platform) {
        const url = window.location.href;
        const title = document.title;
        
        let shareUrl;
        
        switch(platform) {
            case 'facebook':
                shareUrl = `https://www.facebook.com/sharer/sharer.php?u=${encodeURIComponent(url)}`;
                break;
            case 'twitter':
                shareUrl = `https://twitter.com/intent/tweet?url=${encodeURIComponent(url)}&text=${encodeURIComponent(title)}`;
                break;
            case 'whatsapp':
                shareUrl = `https://wa.me/?text=${encodeURIComponent(title + ' ' + url)}`;
                break;
            case 'email':
                shareUrl = `mailto:?subject=${encodeURIComponent(title)}&body=${encodeURIComponent(url)}`;
                break;
        }
        
        if (shareUrl) {
            window.open(shareUrl, '_blank', 'width=600,height=400');
        }
    };

    /**
     * Add CSS for dynamic elements
     */
    const dynamicStyles = `
        <style>
            .lightbox-overlay {
                position: fixed;
                top: 0;
                left: 0;
                width: 100%;
                height: 100%;
                background-color: rgba(0,0,0,0.9);
                z-index: 9999;
                display: flex;
                align-items: center;
                justify-content: center;
                opacity: 0;
                transition: opacity 0.3s ease;
            }
            
            .lightbox-overlay.active {
                opacity: 1;
            }
            
            .lightbox-content {
                position: relative;
                max-width: 90%;
                max-height: 90%;
            }
            
            .lightbox-content img {
                max-width: 100%;
                max-height: 90vh;
                object-fit: contain;
            }
            
            .lightbox-close {
                position: absolute;
                top: -40px;
                right: 0;
                background: none;
                border: none;
                color: white;
                font-size: 40px;
                cursor: pointer;
                line-height: 1;
            }
            
            .back-to-top {
                position: fixed;
                bottom: 30px;
                right: 30px;
                width: 50px;
                height: 50px;
                background-color: var(--secondary-color);
                color: white;
                border: none;
                border-radius: 50%;
                cursor: pointer;
                box-shadow: 0 5px 15px rgba(0,0,0,0.3);
                opacity: 0;
                visibility: hidden;
                transition: all 0.3s ease;
                z-index: 999;
            }
            
            .back-to-top.visible {
                opacity: 1;
                visibility: visible;
            }
            
            .back-to-top:hover {
                background-color: var(--primary-color);
                transform: translateY(-5px);
            }
            
            .error {
                border-color: #e74c3c !important;
            }
            
            .error-message {
                color: #e74c3c;
                font-size: 14px;
                margin-top: 5px;
                display: block;
            }
            
            .animated {
                animation-play-state: running !important;
            }
            
            body.menu-open {
                overflow: hidden;
            }
            
            .site-header.scrolled {
                box-shadow: 0 2px 20px rgba(0,0,0,0.15);
                transition: all 0.3s ease;
            }
        </style>
    `;
    
    $('head').append(dynamicStyles);

})(jQuery);