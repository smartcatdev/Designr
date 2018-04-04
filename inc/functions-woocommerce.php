<?php
/**
 * WooCommerce Compatibility File
 *
 * @link https://woocommerce.com/
 *
 * @package Designr
 */

/**
 * Removals --------------------------------------------------------------------
 * 
 */

remove_action( 'woocommerce_before_main_content', 'woocommerce_breadcrumb', 20 );                                       // Prevent Breadcrumbs from outputting in default location
remove_action( 'woocommerce_sidebar', 'woocommerce_get_sidebar', 10 );                                                  // Prevent WooCommerce sidebar from outputting in default location
remove_action( 'woocommerce_single_product_summary', 'woocommerce_template_single_meta', 40 );                          // Prevent WooCommerce categories and meta from outputting in default location
remove_action( 'woocommerce_after_single_product_summary', 'woocommerce_output_related_products', 20 );                 // Prevent Related Products section fro being output in default location

/**
 * Actions ---------------------------------------------------------------------
 * 
 */

add_action( 'woocommerce_before_shop_loop', 'designr_results_bar_wrapper_before', 15 );                                 // Wrap the Results Count and Filter Select in a <div> for styling
add_action( 'woocommerce_before_shop_loop', 'designr_results_bar_wrapper_after', 35 );                                  // Wrap the Results Count and Filter Select in a </div> for styling
add_action( 'woocommerce_before_shop_loop_item_title', 'designr_woocommerce_product_details_wrapper_before', 50 );      // Wrap the Shop loop Product content in <div class="details-wrap"> for styling
add_action( 'woocommerce_after_shop_loop_item', 'designr_woocommerce_product_details_wrapper_after', 50 );              // Wrap the Shop loop Product content in <div class="details-wrap"> for styling
add_action( 'woocommerce_before_subcategory_title', 'designr_woocommerce_product_details_wrapper_before', 50 );         // Wrap the Shop loop Category content in <div class="details-wrap"> for styling
add_action( 'woocommerce_after_subcategory', 'designr_woocommerce_product_details_wrapper_after', 50 );                 // Wrap the Shop loop Category content in <div class="details-wrap"> for styling
add_action( 'woocommerce_shop_loop_item_title', 'designr_woocommerce_product_loop_category', 5 );                       // Inject the Category in the Product details
add_action( 'woocommerce_shop_loop_item_title', 'designr_woocommerce_product_loop_excerpt', 20 );                       // Inject the Excerpt in the Product details
add_action( 'designr_featured_products', 'designr_render_featured_products', 10 );                                      // Output the Featured Products section
add_action( 'after_setup_theme', 'designr_woocommerce_setup' );                                                         // Add WooCommerce theme support
add_action( 'wp_enqueue_scripts', 'designr_woocommerce_scripts' );                                                      // Enqueue WooCommerce scripts
add_action( 'woocommerce_single_product_summary', 'designr_woocommerce_product_underline', 7 );                         // Inject an underline <span> after the product title
add_action( 'woocommerce_single_product_summary', 'designr_woocommerce_single_product_category', 3 );                   // Inject the category before the product title
add_action( 'woocommerce_after_single_product_summary', 'designr_woocommerce_single_product_clear', 5 );                // Inject a float clear after the product summary section


/**
 * Filters ---------------------------------------------------------------------
 * 
 */

add_filter( 'woocommerce_enqueue_styles', 'designr_woocommerce_dequeue_styles' );                                       // Dequeue select WooCommerce default styles
add_filter( 'body_class', 'designr_woocommerce_active_body_class' );                                                    // Add active WooCommerce body class
add_filter( 'woocommerce_output_related_products_args', 'designr_woocommerce_related_products_args' );                  // Set arguments for Related Products
add_filter( 'woocommerce_add_to_cart_fragments', 'designr_woocommerce_cart_link_fragment' );                            // Code for AJAX-ed Cart subtotal updates

/**
 * Hooked & Filtered Functions -------------------------------------------------
 * 
 */

/**
 * WooCommerce setup function to add_theme_support.
 *
 * @link https://docs.woocommerce.com/document/third-party-custom-theme-compatibility/
 * @link https://github.com/woocommerce/woocommerce/wiki/Enabling-product-gallery-features-(zoom,-swipe,-lightbox)-in-3.0.0
 *
 * @return void
 */
function designr_woocommerce_setup() {
    add_theme_support( 'woocommerce' );
    add_theme_support( 'wc-product-gallery-zoom' );
    add_theme_support( 'wc-product-gallery-lightbox' );
    add_theme_support( 'wc-product-gallery-slider' );
}

/**
 * WooCommerce specific scripts & stylesheets.
 *
 * @return void
 */
function designr_woocommerce_scripts() {
    
    wp_enqueue_style( 'designr-woocommerce-style', get_template_directory_uri() . '/woocommerce.css' );

    $font_path = WC()->plugin_url() . '/assets/fonts/';
    $inline_font = '@font-face {
        font-family: "star";
        src: url("' . $font_path . 'star.eot");
        src: url("' . $font_path . 'star.eot?#iefix") format("embedded-opentype"),
            url("' . $font_path . 'star.woff") format("woff"),
            url("' . $font_path . 'star.ttf") format("truetype"),
            url("' . $font_path . 'star.svg#star") format("svg");
        font-weight: normal;
        font-style: normal;
    }';

    wp_add_inline_style( 'designr-woocommerce-style', $inline_font );
    
}

/**
 * Disable the default WooCommerce stylesheet.
 *
 * Removing the default WooCommerce stylesheet and enqueing your own will
 * protect you during WooCommerce core updates.
 *
 * @link https://docs.woocommerce.com/document/disable-the-default-stylesheet/
 */

function designr_woocommerce_dequeue_styles( $enqueue_styles ) {
    unset( $enqueue_styles['woocommerce-general'] );	// Remove the gloss
    //  unset( $enqueue_styles['woocommerce-layout'] );		// Remove the layout
    //  unset( $enqueue_styles['woocommerce-smallscreen'] );	// Remove the smallscreen optimisation
    return $enqueue_styles;
}

/**
 * Add 'woocommerce-active' class to the body tag.
 *
 * @param  array $classes CSS classes applied to the body tag.
 * @return array $classes modified to include 'woocommerce-active' class.
 */
function designr_woocommerce_active_body_class( $classes ) {
    $classes[] = 'woocommerce-active';
    return $classes;
}

/**
 * Related Products Args.
 *
 * @param array $args related products args.
 * @return array $args related products args.
 */
function designr_woocommerce_related_products_args( $args ) {

    $defaults = array (
        'posts_per_page'    => 3,
        'columns'           => 3,
    );

    $args = wp_parse_args( $defaults, $args );

    return $args;

}

/**
 * Cart Fragments.
 *
 * Ensure cart contents update when products are added to the cart via AJAX.
 *
 * @param array $fragments Fragments to refresh via AJAX.
 * @return array Fragments to refresh via AJAX.
 */
function designr_woocommerce_cart_link_fragment( $fragments ) {
    ob_start();
    designr_woocommerce_cart_link();
    $fragments[ 'a.cart-contents' ] = ob_get_clean(); 

    return $fragments;
}

/**
 * Cart Link.
 *
 * Displayed a link to the cart including the number of items present and the cart total.
 *
 * @return void
 */
function designr_woocommerce_cart_link() { ?>

    <a class="cart-contents" href="<?php echo esc_url( wc_get_cart_url() ); ?>" title="<?php esc_attr_e( 'View your shopping cart', 'designr' ); ?>">
        <?php echo wp_kses_data( sprintf( _n( '%d item', '%d items', WC()->cart->get_cart_contents_count(), 'designr' ), WC()->cart->get_cart_contents_count() ) ); ?> 
        - 
        <?php echo wp_kses_data( WC()->cart->get_cart_subtotal() ); ?>
    </a> 

<?php 

}

if ( !function_exists( 'designr_results_bar_wrapper_before' ) ) {

    /**
     * Wraps woocommerce_result_count and woocommerce_catalog_ordering in a <div>
     *
     * @return void
     */
    function designr_results_bar_wrapper_before() { ?>
        
        <div class="results-bar-wrap">
          
    <?php }

}

if ( !function_exists( 'designr_results_bar_wrapper_after' ) ) {

    /**
     * Wraps woocommerce_result_count and woocommerce_catalog_ordering in a </div>
     *
     * @return void
     */
    function designr_results_bar_wrapper_after() { ?>
        
        </div>
          
    <?php }

}

if ( !function_exists( 'woocommerce_output_content_wrapper' ) ) {

    /**
     * Before Content.
     *
     * Wraps all WooCommerce content in wrappers which match the theme markup.
     *
     * @return void
     */
    function woocommerce_output_content_wrapper() { ?>
        
        <div id="primary" class="content-area woo-shop">
            
            <main id="main" class="site-main" role="main">
            
                <?php if ( is_active_sidebar( 'sidebar-shop-above') ) : ?>

                    <div class="sidebar-wrap shop above">

                        <?php dynamic_sidebar('sidebar-shop-above'); ?>

                    </div>

                <?php endif; ?>
                
                <div id="designr-woocommerce-wrap" class="<?php echo is_shop() ? 'shop-archive' : 'single'; ?>">
                
                    <div class="container">
                    
                        <div class="row">
                            
                            <?php if ( is_shop() ) : ?>
                            
                                <div class="col-sm-12">

                                    <header class="woocommerce-products-header">

                                        <?php if ( apply_filters( 'woocommerce_show_page_title', true ) ) : ?>
                                            <h1 class="woocommerce-products-header__title page-title"><?php woocommerce_page_title(); ?></h1>
                                        <?php endif; ?>

                                        <?php
                                        /**
                                         * Hook: woocommerce_archive_description.
                                         *
                                         * @hooked woocommerce_taxonomy_archive_description - 10
                                         * @hooked woocommerce_product_archive_description - 10
                                         */
                                        do_action( 'woocommerce_archive_description' );
                                        ?>

                                    </header>

                                </div>
                            
                            <?php endif; ?>
                            
                            <div class="col-md-<?php echo is_shop() && is_active_sidebar( 'sidebar-shop' ) ? '9' : '12'; ?>">
                
        <?php
            
    }

}

if ( !function_exists( 'woocommerce_output_content_wrapper_end' ) ) {

    /**
     * After Content.
     *
     * Closes the wrapping divs.
     *
     * @return void
     */
    function woocommerce_output_content_wrapper_end() { ?>
                        
                            </div><!-- .col-md-* -->

                            <?php if ( is_shop() && is_active_sidebar('sidebar-shop') ) : ?>
                            
                                <div class="col-sm-3">
                                    
                                    <div class="designr-sidebar">
                                        <?php woocommerce_get_sidebar(); ?>
                                    </div>
                                    
                                </div>
                            
                            <?php endif; ?>
                                
                        </div><!-- .row -->
                
                    </div><!-- .container -->
                    
                    <?php if ( is_product() ) : ?>

                        <?php woocommerce_output_related_products(); ?>

                    <?php endif; ?>
                    
                </div><!-- #designr-woocommerce-wrap -->
                              
                <?php if ( is_active_sidebar( 'sidebar-shop-below') ) : ?>

                    <div class="sidebar-wrap shop below">

                        <?php dynamic_sidebar('sidebar-shop-below'); ?>

                    </div>

                <?php endif; ?>
                
            </main><!-- #main -->
            
        </div><!-- #primary -->
        
        <?php
        
    }

}

if ( !function_exists( 'designr_woocommerce_product_details_wrapper_before' ) ) {

    /**
     * Before the Title in WooCommerce Product content.
     * 
     * Add a wrapper div.
     *
     * @return void
     */
    function designr_woocommerce_product_details_wrapper_before() { ?>
        
        <div class="details-wrap">

        <?php
            
    }

}

if ( !function_exists( 'designr_woocommerce_product_details_wrapper_after' ) ) {

    /**
     * After the Title in WooCommerce Product content.
     *
     * Closes the wrapping divs.
     *
     * @return void
     */
    function designr_woocommerce_product_details_wrapper_after() { ?>
                        
            <div class="clear"></div>
            
        </div><!-- .product-details -->

        <?php
        
    }

}

if ( !function_exists( 'designr_woocommerce_product_loop_category' ) ) {

    if ( get_theme_mod( 'designr_woocommerce_loop_show_categories', true ) ) {
        
        /**
         * Output the category for the product if toggled on.
         */
        function designr_woocommerce_product_loop_category() {

            $product_cats = wp_get_post_terms( get_the_ID(), 'product_cat' );

            if ( $product_cats && ! is_wp_error ( $product_cats ) ) {

                $single_cat = array_shift( $product_cats ); ?>

                <h4 class="product_category_title">
                    <?php echo esc_html( $single_cat->name ); ?>
                </h4>

            <?php 

            }

        }
        
    }
    
}

if ( !function_exists( 'designr_woocommerce_product_loop_excerpt' ) ) {

    if ( get_theme_mod( 'designr_woocommerce_loop_show_excerpts', true ) ) {

        /**
         * Output the excerpt/content for the product if toggled on.
         */
        function designr_woocommerce_product_loop_excerpt() { ?>

            <div class="product_category_excerpt">
                <?php the_excerpt(); ?>
            </div>

        <?php 

        }

    }

}

if ( !function_exists( 'designr_woocommerce_product_underline' ) ) {

    /**
     * Output an underline span
     */
    function designr_woocommerce_product_underline() { ?>

        <span class="small-divider dark"></span>

    <?php 

    }

}

if ( !function_exists( 'designr_woocommerce_single_product_category' ) ) {

    /**
     * Output the single product category
     */
    function designr_woocommerce_single_product_category() { ?>

        <?php global $product; ?>
        <?php echo wc_get_product_category_list( $product->get_id(), ', ', '<span class="posted_in product-cat">', '</span>' ); ?>

    <?php 

    }

}

if ( !function_exists( 'designr_woocommerce_single_product_clear' ) ) {

    /**
     * Output a clear div at the end of the product summary and image gallery wrapper
     */
    function designr_woocommerce_single_product_clear() { ?>

        <div class="clear"></div>

    <?php 

    }

}

if ( !function_exists( 'designr_woocommerce_product_loop_cta' ) ) {

    /**
     * Output a CTA in the middle of the Product Loop after the first row
     */
    function designr_woocommerce_product_loop_cta( $ctr = 0 ) { ?>

        <?php if ( $ctr == get_option( 'woocommerce_catalog_columns', 4 ) ) : ?>

            </ul>

            <div class="woocommerce-cta" style="background-image: url(<?php echo esc_url( get_theme_mod( 'designr_woocommerce_loop_cta_bg_image', get_template_directory_uri() . '/assets/images/sougwen.jpg' ) ); ?>);">

                <div class="woocommerce-cta-inner dark-unsat-gradient">

                    <span class="pre-title wow fadeInLeftBig">
                        About Us
                    </span>

                    <h2 class="hero-title wow fadeInLeft">
                        We live where style meets substance.
                    </h2>

                    <p class="wow fadeInLeft">
                        Every space has its own purpose. Our task is to understand, see and implement it. We speak the architectural language fluently.
                    </p>

                    <a class="button hollow wow fadeInUpBig" href="#">
                        Discover
                    </a>

                </div>

            </div>

            <ul class="products columns-<?php echo esc_attr( wc_get_loop_prop( 'columns' ) ); ?>">

        <?php endif; ?>

    <?php 

    }

}

if ( !function_exists( 'designr_render_featured_products' ) ) {

    /**
     * Output all Featured Products if they're toggled on in Customizer
     */
    function designr_render_featured_products() {

        if ( get_theme_mod( DESIGNR_OPTIONS::WOO_SHOW_FEATURED_PRODUCTS, DESIGNR_DEFAULTS::WOO_SHOW_FEATURED_PRODUCTS ) ) : 

            $args = array(
                'post_type' => 'product',
                'posts_per_page' => -1,
                'tax_query' => array(
                    array(
                        'taxonomy' => 'product_visibility',
                        'field'    => 'name',
                        'terms'    => 'featured',
                    ),
                ),
            );
            $featured_products_loop = new WP_Query( $args ); ?>

            <?php if ( $featured_products_loop->have_posts() ) : ?>

                <div id="designr-featured-woocommerce">

                    <?php if ( get_theme_mod( DESIGNR_OPTIONS::WOO_SHOW_FEATURED_PRODUCT_HEADING, DESIGNR_DEFAULTS::WOO_SHOW_FEATURED_PRODUCT_HEADING ) ) : ?>
                    
                        <h3 class="shop-sub-heading">
                            <?php _e( 'Featured', 'designr' ); ?>
                        </h3>
                    
                    <?php endif; ?>

                    <ul class="products columns-<?php echo get_theme_mod( DESIGNR_OPTIONS::WOO_FEATURED_PRODUCTS_NUM_COLS, DESIGNR_DEFAULTS::WOO_FEATURED_PRODUCTS_NUM_COLS ) == 'two' ? 2 : 3; ?>">

                        <?php 
                        while ( $featured_products_loop->have_posts() ) : $featured_products_loop->the_post();
                            wc_get_template_part( 'content', 'product' );
                        endwhile;
                        ?>

                        <?php wp_reset_postdata(); ?>

                    </ul><!--/.products-->

                </div>

            <?php endif;

        endif;

    }

}
