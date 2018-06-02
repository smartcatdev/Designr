<?php
/**
 * Custom template tags for this theme
 *
 * Eventually, some of the functionality here could be replaced by core features.
 *
 * @package Buildr
 */
if ( !function_exists( 'buildr_posted_on' ) ) :

    /**
     * Prints HTML with meta information for the current post-date/time.
     */
    function buildr_posted_on() {
        $time_string = '<time class="entry-date published updated" datetime="%1$s">%2$s</time>';
        if ( get_the_time( 'U' ) !== get_the_modified_time( 'U' ) ) {
            $time_string = '<time class="entry-date published" datetime="%1$s">%2$s</time>';
        }

        $time_string = sprintf( $time_string, esc_attr( get_the_date( 'c' ) ), esc_html( get_the_date() ), esc_attr( get_the_modified_date( 'c' ) ), esc_html( get_the_modified_date() )
        );

        $posted_on = sprintf(
                /* translators: %s: post date. */
                esc_html_x( 'Posted on %s', 'post date', 'buildr' ), '<a href="' . esc_url( get_permalink() ) . '" rel="bookmark">' . $time_string . '</a>'
        );

        echo '<span class="posted-on">' . $posted_on . '</span>'; // WPCS: XSS OK.
    }

endif;

if ( !function_exists( 'buildr_posted_by' ) ) :

    /**
     * Prints HTML with meta information for the current author.
     */
    function buildr_posted_by() {
        $byline = sprintf(
                /* translators: %s: post author. */
                esc_html_x( 'by %s', 'post author', 'buildr' ), '<span class="author vcard"><a class="url fn n" href="' . esc_url( get_author_posts_url( get_the_author_meta( 'ID' ) ) ) . '">' . esc_html( get_the_author() ) . '</a></span>'
        );

        echo '<span class="byline"> ' . $byline . '</span>'; // WPCS: XSS OK.
    }

endif;

if ( !function_exists( 'buildr_entry_footer' ) ) :

    /**
     * Prints HTML with meta information for the categories, tags and comments.
     */
    function buildr_entry_footer() {
        // Hide category and tag text for pages.
        if ( 'post' === get_post_type() ) {
            /* translators: used between list items, there is a space after the comma */
            $categories_list = get_the_category_list( esc_html__( ', ', 'buildr' ) );
            if ( $categories_list ) {
                /* translators: 1: list of categories. */
                printf( '<span class="cat-links">' . esc_html__( 'Posted in %1$s', 'buildr' ) . '</span>', $categories_list ); // WPCS: XSS OK.
            }

            /* translators: used between list items, there is a space after the comma */
            $tags_list = get_the_tag_list( '', esc_html_x( ', ', 'list item separator', 'buildr' ) );
            if ( $tags_list ) {
                /* translators: 1: list of tags. */
                printf( '<span class="tags-links">' . esc_html__( 'Tagged %1$s', 'buildr' ) . '</span>', $tags_list ); // WPCS: XSS OK.
            }
        }

        if ( !is_single() && !post_password_required() && ( comments_open() || get_comments_number() ) ) {
            echo '<span class="comments-link">';
            comments_popup_link(
                    sprintf(
                            wp_kses(
                                    /* translators: %s: post title */
                                    __( 'Leave a Comment<span class="screen-reader-text"> on %s</span>', 'buildr' ), array (
                'span' => array (
                    'class' => array (),
                ),
                                    )
                            ), get_the_title()
                    )
            );
            echo '</span>';
        }

        edit_post_link(
                sprintf(
                        wp_kses(
                                /* translators: %s: Name of current post. Only visible to screen readers */
                                __( 'Edit <span class="screen-reader-text">%s</span>', 'buildr' ), array (
            'span' => array (
                'class' => array (),
            ),
                                )
                        ), get_the_title()
                ), '<span class="edit-link">', '</span>'
        );
    }

endif;

if ( !function_exists( 'buildr_post_thumbnail' ) ) :

    /**
     * Displays an optional post thumbnail.
     *
     * Wraps the post thumbnail in an anchor element on index views, or a div
     * element when on single views.
     */
    function buildr_post_thumbnail() {
        if ( post_password_required() || is_attachment() || !has_post_thumbnail() ) {
            return;
        }

        if ( is_singular() ) :
            ?>

            <div class="post-thumbnail">
            <?php the_post_thumbnail(); ?>
            </div><!-- .post-thumbnail -->

        <?php else : ?>

            <a class="post-thumbnail" href="<?php the_permalink(); ?>" aria-hidden="true">
            <?php
            the_post_thumbnail( 'post-thumbnail', array (
                'alt' => the_title_attribute( array (
                    'echo' => false,
                ) ),
            ) );
            ?>
            </a>

            <?php
            endif; // End is_singular().
        }


endif;

/**
 * Render the SC designer section.
 * 
 * @since 1.0.0
 * @return void
 */

if ( !function_exists( 'buildr_pro\buildr_render_designer' ) ) :
    
    add_action( 'buildr_designer', 'buildr_render_designer', 10 );
    function buildr_render_designer() { ?>

        <span class="buildr_by">
            <?php esc_html_e( 'Design by', 'buildr' ); ?>
        </span>
        <a href="https://smartcatdesign.net/" rel="designer" class="rel">
            <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 647.2 117"><path d="M1.1,78.5H11.3l2.9,18.2a19.59,19.59,0,0,0,8.1,4.4,38.87,38.87,0,0,0,12.1,1.8c7.3,0,12.8-1.6,16.4-4.7s5.5-7.5,5.5-13.2a14.89,14.89,0,0,0-3-9.4,28.57,28.57,0,0,0-8.2-7c-3.5-2-8.2-4.3-14.3-7A99.22,99.22,0,0,1,16.6,54,37.54,37.54,0,0,1,5.8,43.4,26.06,26.06,0,0,1,1.3,28.1,24.46,24.46,0,0,1,5.8,13.6a29.19,29.19,0,0,1,12.7-10A47.82,47.82,0,0,1,37.8,0,70.06,70.06,0,0,1,50.3,1.1c3.8.8,7.8,1.7,11.9,2.9a48.66,48.66,0,0,0,5.2,1.3l-1,24.5H56.6L53.2,12.5c-.9-1-2.9-1.9-5.9-2.7a37.36,37.36,0,0,0-9.7-1.2c-13.2,0-19.8,5.2-19.8,15.5a14.81,14.81,0,0,0,3,9.3,28.48,28.48,0,0,0,8,6.8c3.3,2,8.2,4.5,14.7,7.6a163.89,163.89,0,0,1,15.8,8.5,37.67,37.67,0,0,1,10.5,9.8,23.42,23.42,0,0,1,4.4,14.1,28.23,28.23,0,0,1-4.5,15.1,32.75,32.75,0,0,1-13.5,11.8c-6,3-13.3,4.6-21.9,4.6a70.33,70.33,0,0,1-14.4-1.4c-4.3-1-8.9-2.2-13.5-3.7A41.37,41.37,0,0,0,0,104.9Z"/><path class="cls-1" d="M88.7,102.7V43.2L78.2,40.4V31.1l21.6-2.9h.4l3.5,2.9v6.2l-.1,3.5a39.51,39.51,0,0,1,8.5-6,60.65,60.65,0,0,1,11.1-4.7,36.21,36.21,0,0,1,10.6-1.8c5.4,0,9.7.9,13,2.7a17.2,17.2,0,0,1,7.5,8.4,36,36,0,0,1,7.9-5.1A59.77,59.77,0,0,1,172.9,30a38.26,38.26,0,0,1,10.6-1.7c6.3,0,11.3,1.2,14.8,3.5s6,5.9,7.4,10.7,2.1,11.3,2.1,19.5v40.8l10.5,1.2v7.7h-36V104l8.6-1.3V62.6a57,57,0,0,0-1.2-13.2,12.19,12.19,0,0,0-4.7-7.3c-2.3-1.6-5.6-2.5-9.9-2.5a26.15,26.15,0,0,0-9.7,2.1,45.77,45.77,0,0,0-9.1,4.9,77.34,77.34,0,0,1,1.3,16v40.1l10.7,1.3v7.7H131.1V104l9.7-1.3V62.2a63.16,63.16,0,0,0-1.1-13.1,11.68,11.68,0,0,0-4.3-7.1q-3.15-2.4-9.3-2.4a29.56,29.56,0,0,0-10.8,2.3,39.31,39.31,0,0,0-9.9,5.6v55.2l9.8,1.3v7.7H79.5V104Z"/><path class="cls-1" d="M271.3,56.2a26,26,0,0,0-1.4-9.3A9.05,9.05,0,0,0,265,42a26,26,0,0,0-10-1.6c-8.3,0-16.9,2-26.1,6h-.1l-3.7-6.7a33,33,0,0,1,7.6-4.5,74.76,74.76,0,0,1,12.7-4.9A48.46,48.46,0,0,1,259,28.2c7.1,0,12.7.9,16.8,2.8a16.66,16.66,0,0,1,8.8,8.9q2.7,6.15,2.7,16.5V102h8.9v7.2c-7.1,1.7-12.5,2.6-16.1,2.6a18.08,18.08,0,0,1-4.7-.5,3.59,3.59,0,0,1-2.4-2.1,11.77,11.77,0,0,1-.8-4.9v-3.5a44.16,44.16,0,0,1-10.4,7.4,29,29,0,0,1-14.4,3.6,31.48,31.48,0,0,1-12.8-2.6,21.36,21.36,0,0,1-9.2-7.9c-2.3-3.6-3.4-8-3.4-13.4a21.14,21.14,0,0,1,6.8-16.1c4.5-4.2,10.4-7.3,17.8-9.3a92.89,92.89,0,0,1,24.5-3V56.2Zm0,11.5c-7.2,0-13.1.8-17.7,2.5s-8,3.8-10,6.5a14.41,14.41,0,0,0-3.1,9.2c0,5.1,1.3,8.9,3.8,11.3s6,3.6,10.3,3.6a22.63,22.63,0,0,0,8.3-1.9,38.24,38.24,0,0,0,8.5-4.7V67.7Z"/><path class="cls-1" d="M314.8,102.5V43.1l-10.4-2.9V31.4l20.9-2.9h.4l3.5,2.9v4.8l-.1,9.9h.1a38,38,0,0,1,5.1-6.7,40.66,40.66,0,0,1,9.7-7.7,25.59,25.59,0,0,1,13-3.5,13.37,13.37,0,0,1,4.8.8V47.6a10.6,10.6,0,0,0-3.7-1.7,15.7,15.7,0,0,0-4.9-.7,37.92,37.92,0,0,0-12.8,1.9,31.7,31.7,0,0,0-9,4.7v51.3h19.3v8.5H303.3v-7.9Z"/><path class="cls-1" d="M368,38.8v-7c1.4-.4,2.9-.9,4.7-1.6a20.66,20.66,0,0,0,3.5-1.6c1.6-1.2,2.9-3.3,4-6.1.7-1.8,1.7-4.6,2.9-8.4s2-6.8,2.5-8.8h9.5l.1,22.9h24.6V38.7H395.3V81.9a105,105,0,0,0,.5,12.1c.3,2.3,1,3.7,2.1,4.4a12.27,12.27,0,0,0,5.7,1h.1a47.47,47.47,0,0,0,8.6-.9,51.17,51.17,0,0,0,7.4-1.9h.1l2.5,7a27.6,27.6,0,0,1-6.6,3.7,64.72,64.72,0,0,1-9.4,3.1,40.91,40.91,0,0,1-9.3,1.2h-.1c-6.1,0-10.6-1.3-13.7-3.9s-4.6-7-4.6-13.1V38.7H368Z"/><path class="cls-1" d="M566.6,56.2a26,26,0,0,0-1.4-9.3,9.05,9.05,0,0,0-4.9-4.9,26,26,0,0,0-10-1.6c-8.3,0-16.9,2-26.1,6h-.1l-3.7-6.7a33,33,0,0,1,7.6-4.5,74.76,74.76,0,0,1,12.7-4.9,48.46,48.46,0,0,1,13.6-2.1c7.1,0,12.7.9,16.8,2.8a16.66,16.66,0,0,1,8.8,8.9q2.7,6.15,2.7,16.5V102h8.9v7.2c-7.1,1.7-12.5,2.6-16.1,2.6a18.08,18.08,0,0,1-4.7-.5,3.59,3.59,0,0,1-2.4-2.1,11.77,11.77,0,0,1-.8-4.9v-3.5a44.16,44.16,0,0,1-10.4,7.4,29,29,0,0,1-14.4,3.6,31.48,31.48,0,0,1-12.8-2.6,21.36,21.36,0,0,1-9.2-7.9c-2.3-3.6-3.4-8-3.4-13.4a21.14,21.14,0,0,1,6.8-16.1c4.5-4.2,10.4-7.3,17.8-9.3a92.89,92.89,0,0,1,24.5-3V56.2Zm0,11.5c-7.2,0-13.1.8-17.7,2.5s-8,3.8-10,6.5a14.41,14.41,0,0,0-3.1,9.2c0,5.1,1.3,8.9,3.8,11.3s6,3.6,10.3,3.6a22.63,22.63,0,0,0,8.3-1.9,38.24,38.24,0,0,0,8.5-4.7V67.7Z"/><path class="cls-1" d="M592.9,38.8v-7c1.4-.4,2.9-.9,4.7-1.6a20.66,20.66,0,0,0,3.5-1.6c1.6-1.2,2.9-3.3,4-6.1.7-1.8,1.7-4.6,2.9-8.4s2-6.8,2.5-8.8H620l.1,22.9h24.6V38.7H620.2V81.9a105,105,0,0,0,.5,12.1c.3,2.3,1,3.7,2.1,4.4a12.27,12.27,0,0,0,5.7,1h.1a47.47,47.47,0,0,0,8.6-.9,51.17,51.17,0,0,0,7.4-1.9h.1l2.5,7a27.6,27.6,0,0,1-6.6,3.7,64.72,64.72,0,0,1-9.4,3.1,40.91,40.91,0,0,1-9.3,1.2h-.1c-6.1,0-10.6-1.3-13.7-3.9s-4.6-7-4.6-13.1V38.7H592.9Z"/><path class="cls-1" d="M456.5,34.6c4.2-1.5,16.3,7.8,20.2,9.5s7-1.6,14.2-4.4,10.7-.7,13.3-6.4c2.4-5,6-14.2,8.4-16.6a53.57,53.57,0,0,0-28.8-8.3A54.3,54.3,0,1,0,508.6,111a79,79,0,0,1-5.9-9.8c-2.6-4.8-8.7-4.9-13.1-7.5s-10.8-4.8-16.8-12-7.1-14.1-6.4-16.9-4.1-5.6-7.5-10.6S452.3,36,456.5,34.6Z"/></svg>
        </a>

    <?php }
    
endif;
    
/**
 * Render the HTML that opens the wrap of the Masonry Blog
 *
 * @since 1.0.0
 * @return void
 */
function buildr_render_masonry_wrap_open() { ?>
    
    <div class="masonry-card-blog">

        <div class="container">

            <div class="row">

                <div class="<?php echo buildr_is_single_sidebar_active( 'blog' ) ? 'col-sm-9 col-md-9 col-lg-9' : 'col-sm-12'; ?>">

                    <div class="masonry_card_blog">

                        <div class="grid_sizer"></div>
                        <div class="grid_spaced"></div>

<?php }
add_action( 'buildr_blog_masonry_wrap_open', 'buildr_render_masonry_wrap_open');               
    
/**
 * Render the HTML that closes the wrap of the Masonry Blog
 *
 * @since 1.0.0
 * @return void
 */
function buildr_render_masonry_wrap_close() { ?>
                        
                    </div>
                    
                    <div class="buildr-pagination-links">
                        <?php the_posts_pagination( array( 'mid_size' => 1 ) ); ?>
                    </div>

                </div>
                
                <?php buildr_output_side_sidebar( 'blog', 'right' ) ?>

            </div>

        </div>

    </div>

<?php }
add_action( 'buildr_blog_masonry_wrap_close', 'buildr_render_masonry_wrap_close');        

/**
 * Render the HTML that opens the wrap of the Mosaic Blog
 *
 * @since 1.0.0
 * @return void
 */
function buildr_render_mosaic_wrap_open() { ?>
    
    <div class="mosaic-grid-blog">

        <div class="container">

            <div class="row">

                <div class="<?php echo buildr_is_single_sidebar_active( 'blog' ) ? 'col-sm-9 col-md-9 col-lg-9' : 'col-sm-12'; ?>">
                    
                    <div class="mosaic-grid">

<?php }
add_action( 'buildr_blog_mosaic_wrap_open', 'buildr_render_mosaic_wrap_open'); 

/**
 * Render the HTML that closes the wrap of the Mosaic Blog
 *
 * @since 1.0.0
 * @return void
 */
function buildr_render_mosaic_wrap_close() { ?>
                        
                    </div>
                        
                    <div class="buildr-pagination-links">
                        <?php the_posts_pagination( array( 'mid_size' => 1 ) ); ?>
                    </div>

                </div>
                
                <?php buildr_output_side_sidebar( 'blog', 'right' ) ?>

            </div>

        </div>

    </div>

<?php }
add_action( 'buildr_blog_mosaic_wrap_close', 'buildr_render_mosaic_wrap_close');        

/**
 * Render the HTML that opens the wrap of the Standard Blog
 *
 * @since 1.0.0
 * @return void
 */
function buildr_render_standard_wrap_open() { ?>
    
    <div class="standard-stacked-blog">

        <div class="container">

            <div class="row">

                <div class="<?php echo buildr_is_single_sidebar_active( 'blog' ) ? 'col-sm-9 col-md-9 col-lg-9' : 'col-sm-12'; ?>">
                    
                    <div class="standard-blog">

<?php }
add_action( 'buildr_blog_standard_wrap_open', 'buildr_render_standard_wrap_open'); 

/**
 * Render the HTML that closes the wrap of the Standard Blog
 *
 * @since 1.0.0
 * @return void
 */
function buildr_render_standard_wrap_close() { ?>
                        
                    </div>
                        
                    <div class="buildr-pagination-links">
                        <?php the_posts_pagination( array( 'mid_size' => 1 ) ); ?>
                    </div>

                </div>
                
                <?php buildr_output_side_sidebar( 'blog', 'right' ) ?>

            </div>

        </div>

    </div>

<?php }
add_action( 'buildr_blog_standard_wrap_close', 'buildr_render_standard_wrap_close');        

/**
 * 
 * Outputs a side-located sidebar if conditionally appropriate
 * 
 * @since 1.1.0
 * @param type $template
 * @param type $location
 * @return HTML and sidebar content
 */
function buildr_output_side_sidebar( $template = 'single', $location = 'right' ) {
    
    // Return if the template argument is not for Single (Post/Page) or Blog (includes Archive pages)
    if ( $template != 'single' && $template != 'blog' ) { return; }
    
    // Which template is this check for?
    if ( $template == 'single' ) :

        // Page & Post Sidebar
        
        if ( get_post_meta( get_the_ID(), BUILDR_META::SIDEBAR_TEMPLATE, true ) != 'none' && get_post_meta( get_the_ID(), BUILDR_META::SIDEBAR_LOCATION, true ) == 'sidebar-' . $location ) :

            if ( is_active_sidebar( get_post_meta( get_the_ID(), BUILDR_META::SIDEBAR_TEMPLATE, true ) ) ) : ?>

                <div class="col-sm-3 col-md-3 col-lg-3">

                    <div class="buildr-landr-sidebar-wrap single <?php echo esc_attr( $location ); ?>">

                        <?php dynamic_sidebar( get_post_meta( get_the_ID(), BUILDR_META::SIDEBAR_TEMPLATE, true ) ); ?>

                    </div>

                </div>

            <?php endif;

        endif;
        
    else :
        
        // Blog Sidebar
        
        if ( is_active_sidebar( 'sidebar-blog-side' ) ) : ?>

            <div class="col-sm-3 col-md-3 col-lg-3">

                <div class="buildr-landr-sidebar-wrap archive <?php echo esc_attr( $location ); ?>">

                    <?php dynamic_sidebar( 'sidebar-blog-side' ); ?>

                </div>

            </div>

        <?php endif;
        
    endif;

}