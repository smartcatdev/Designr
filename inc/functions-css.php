<?php

/**
 * Enqueue scripts and styles.
 */
function buildr_wp_head_styles() { ?>

    <style type="text/css">

        /* ---------------------------------------------------------------------
         * Typography
         * ------------------------------------------------------------------ */

        body,
        .site-branding .site-title,
        div#footer-branding-wrap .site-title,
        div#custom-header-content .custom-header-title,
        div#buildr-custom-header.parallax_layers .custom-header-title,
        h2.widget-title,
        ul.product_list_widget .product-wrap .product-title .price-wrap,
        #buildr-featured-woocommerce h4.product_category_title,
        div#buildr-woocommerce-wrap ul.products li.product .product_category_title,
        div#buildr-woocommerce-wrap ul.products li.product .woocommerce-loop-category__title mark {
            font-family: <?php echo esc_attr( get_theme_mod( BUILDR_OPTIONS::FONT_SECONDARY, BUILDR_DEFAULTS::FONT_SECONDARY ) ); ?>;
        }

        h1,h2,h3,h4,h5,h6,
        button, 
        input[type="submit"],
        a.button,
        ul#mobile-menu li a,
        ul.slim-header-menu > li a,
        ul#custom-header-menu > li a,
        .blog_item_wrap .blog_item .inner .blog-meta,
        .standard-stacked-blog .blog_item_wrap .blog_item .blog-meta .posted-meta,
        ul.product_list_widget .product-wrap .product-title,
        .woocommerce-tabs.wc-tabs-wrapper ul.tabs li,
        .woocommerce table.variations .label,
        table.shop_attributes th {
            font-family: <?php echo esc_attr( get_theme_mod( BUILDR_OPTIONS::FONT_PRIMARY, BUILDR_DEFAULTS::FONT_PRIMARY ) ); ?>;
        }

        h1,h2,h3,h4,h5,h6 {
            letter-spacing: <?php echo esc_attr( get_theme_mod( BUILDR_OPTIONS::FONT_HEADINGS_LETTER_GAP, BUILDR_DEFAULTS::FONT_HEADINGS_LETTER_GAP ) ); ?>em;
        }

        body {
            font-size: <?php echo intval( get_theme_mod( BUILDR_OPTIONS::FONT_BODY_SIZE, BUILDR_DEFAULTS::FONT_BODY_SIZE ) ); ?>px;
        }
        
        <?php if ( get_theme_mod( BUILDR_OPTIONS::NAVBAR_LINKS_FONT_FAMILY, BUILDR_DEFAULTS::NAVBAR_LINKS_FONT_FAMILY ) == 'secondary' ) : ?>

            ul#mobile-menu li a,
            ul.slim-header-menu > li a {
                font-family: <?php echo esc_attr( get_theme_mod( BUILDR_OPTIONS::FONT_SECONDARY, BUILDR_DEFAULTS::FONT_SECONDARY ) ); ?>;
            }

        <?php endif; ?>

        <?php if ( get_theme_mod( BUILDR_OPTIONS::CUSTOM_HEADER_MENU_FONT_FAMILY, BUILDR_DEFAULTS::CUSTOM_HEADER_MENU_FONT_FAMILY ) == 'secondary' ) : ?>

            ul#custom-header-menu > li a {
                font-family: <?php echo esc_attr( get_theme_mod( BUILDR_OPTIONS::FONT_SECONDARY, BUILDR_DEFAULTS::FONT_SECONDARY ) ); ?>;
            }

        <?php endif; ?>

        <?php if ( get_theme_mod( BUILDR_OPTIONS::CUSTOM_HEADER_TITLE_FONT_FAMILY, BUILDR_DEFAULTS::CUSTOM_HEADER_TITLE_FONT_FAMILY ) == 'primary' ) : ?>

            div#custom-header-content .custom-header-title,
            div#buildr-custom-header.parallax_layers .custom-header-title {
                font-family: <?php echo esc_attr( get_theme_mod( BUILDR_OPTIONS::FONT_PRIMARY, BUILDR_DEFAULTS::FONT_PRIMARY ) ); ?>;
            }

        <?php endif; ?>
        
        <?php if ( get_theme_mod( BUILDR_OPTIONS::WIDGETS_TITLE_FONT_FAMILY, BUILDR_DEFAULTS::WIDGETS_TITLE_FONT_FAMILY ) == 'primary' ) : ?>

            h2.widget-title {
                font-family: <?php echo esc_attr( get_theme_mod( BUILDR_OPTIONS::FONT_PRIMARY, BUILDR_DEFAULTS::FONT_PRIMARY ) ); ?>;
            }

        <?php endif; ?>
        
        header#masthead .site-title {
           text-transform: <?php echo get_theme_mod( BUILDR_OPTIONS::NAVBAR_SITE_TITLE_ALL_CAPS, BUILDR_DEFAULTS::NAVBAR_SITE_TITLE_ALL_CAPS ) ? 'uppercase' : 'none'; ?>;
        }
        div#custom-header-content .custom-header-title, 
        div#buildr-custom-header.parallax_layers .custom-header-title {
           text-transform: <?php echo get_theme_mod( BUILDR_OPTIONS::CUSTOM_HEADER_TITLE_ALL_CAPS, BUILDR_DEFAULTS::CUSTOM_HEADER_TITLE_ALL_CAPS ) ? 'uppercase' : 'none'; ?>;
        }
        footer div#footer-branding-wrap .site-title {
           text-transform: <?php echo get_theme_mod( BUILDR_OPTIONS::FOOTER_SITE_TITLE_ALL_CAPS, BUILDR_DEFAULTS::FOOTER_SITE_TITLE_ALL_CAPS ) ? 'uppercase' : 'none'; ?>;
        }
        h2.widget-title {
            text-transform: <?php echo get_theme_mod( BUILDR_OPTIONS::WIDGETS_TITLE_ALL_CAPS, BUILDR_DEFAULTS::WIDGETS_TITLE_ALL_CAPS ) ? 'uppercase' : 'none'; ?>;
        }
        
        /* ---------------------------------------------------------------------
         * Colors
         * ------------------------------------------------------------------ */

        <?php $theme_colors = buildr_get_all_theme_colors(); ?>

        /* ----- Primary Color ---------------------------------------------- */

        ul.slim-header-menu > li.current-menu-item > a:before,
        ul.slim-header-menu > li:not(.menu-item-has-children) > a:before,
        div#slim-header ul#mobile-menu:before,
        div#banner-header ul#mobile-menu:before,
        ul.slim-header-menu > li.menu-item-has-children > ul.sub-menu:before,
        div#buildr-woocommerce-wrap span.onsale,
        button, 
        input[type="submit"],
        a.button,
        .widget_price_filter .ui-slider .ui-slider-range,
        .widget_price_filter .ui-slider .ui-slider-handle,
        h3.shop-sub-heading,
        form.woocommerce-ordering > select,
        .woocommerce select,
        .pagination-links .page-numbers:hover,
        .woocommerce nav.woocommerce-pagination ul li:hover span,
        .woocommerce nav.woocommerce-pagination ul li:hover > a,
        .buildr-pagination-links .page-numbers:hover,
        nav.navigation.post-navigation .nav-links a:hover,
        #wpadminbar .buildr-toolbar-link a.ab-item,
        #wpadminbar .buildr-toolbar-link a.ab-item:hover {
            background-color: <?php echo esc_attr( $theme_colors['primary'] ); ?>;
        }
           
        <?php if( 
                get_theme_mod( BUILDR_OPTIONS::NAVBAR_FINAL_LINK_FILL, BUILDR_DEFAULTS::NAVBAR_FINAL_LINK_FILL ) 
                && get_theme_mod( BUILDR_OPTIONS::NAVBAR_FINAL_LINK_ACCENT, BUILDR_DEFAULTS::NAVBAR_FINAL_LINK_ACCENT ) 
                ) : ?>
            
            ul#slim-header-b > li:last-child > a,
            ul#slim-header-primary > li:last-child > a,
            ul#banner-header-primary > li:last-child > a {
                color: <?php echo esc_attr( $theme_colors['primary'] ); ?>;
            }
            
            ul#slim-header-b > li:last-child > a:hover,
            ul#slim-header-primary > li:last-child > a:hover,
            ul#banner-header-primary > li:last-child > a:hover {
                background-color: <?php echo esc_attr( $theme_colors['primary'] );?>;
                border-color: <?php echo esc_attr( $theme_colors['primary'] );?>;
                color: #fff;
            }
            
        <?php endif; ?>

        a,
        div#slim-header a:hover,
        div#banner-header a:hover,
        ul.slim-header-menu > li.menu-item-has-children > ul.sub-menu li a:hover,
        .woocommerce p.stars:hover a:before {
            color: <?php echo esc_attr( $theme_colors['primary'] ); ?>;
        }

        footer #buildr_designer path {
            fill: <?php echo esc_attr($theme_colors['primary']); ?>;
        }
        
        button, 
        input[type="submit"],
        a.button {
            border-color: <?php echo esc_attr( $theme_colors['primary'] ); ?>;
        }
        
        /* ----- Secondary Color -------------------------------------------- */

        a:not(.button):hover {
            color: <?php echo esc_attr( $theme_colors['secondary'] ); ?>;
        }
        
        button.secondary, 
        a.button.secondary {
            border-color: <?php echo esc_attr( $theme_colors['secondary'] ); ?>;
            background-color: <?php echo esc_attr( $theme_colors['secondary'] ); ?>;
        }

        /* ----- Navbar Colors & Image -------------------------------------- */

        <?php if ( get_theme_mod( BUILDR_OPTIONS::NAVBAR_BG_STYLE, BUILDR_DEFAULTS::NAVBAR_BG_STYLE ) == 'color' ) : ?>

            div#slim-header-wrap,
            div#banner-header-wrap {
                background-color: <?php echo esc_attr( $theme_colors['navbar_bg'] ); ?>;
            }

        <?php else : ?>

            div#slim-header-wrap,
            div#banner-header-wrap {
                background-image: url(<?php echo esc_url( get_theme_mod( BUILDR_OPTIONS::NAVBAR_BG_IMAGE, BUILDR_DEFAULTS::NAVBAR_BG_IMAGE ) ); ?>);
            }

            div#slim-header ul#mobile-menu {
                background-color: <?php echo esc_attr( $theme_colors['navbar_bg'] ); ?>;
            }

        <?php endif; ?>

        ul.slim-header-menu > li.menu-item-has-children > ul.sub-menu {
            background-color: <?php echo esc_attr( $theme_colors['navbar_bg'] ); ?>;
        }

        div#slim-header,
        div#slim-header a,
        div#banner-header,
        div#banner-header a,
        ul.slim-header-menu > li.current-menu-item > a,
        header#masthead.header-style-split .navbar-social #split-social-trigger,
        div.site-branding a,
        ul#mobile-menu li a {
            color: <?php echo esc_attr( $theme_colors['navbar_fg'] ); ?>;
        }
        
        div.site-branding a:hover {
            color: <?php echo esc_attr( $theme_colors['navbar_fg'] ); ?> !important;
        }

        a#split-social-trigger path {
            fill: <?php echo esc_attr( $theme_colors['navbar_fg'] ); ?>;
        }

        #mobile-menu-trigger .bar,
        #mobile-menu-trigger .bar:before,
        #mobile-menu-trigger .bar:after {
            background: <?php echo esc_attr( $theme_colors['navbar_fg'] ); ?>;
        }
        
        ul.slim-header-menu > li.menu-item-has-children > ul.sub-menu > li > ul.sub-menu > li a,
        ul.slim-header-menu > li.menu-item-has-children > ul.sub-menu > li > ul.sub-menu > li > ul.sub-menu > li > a {
            color: <?php echo esc_attr( buildr_hex2rgba( $theme_colors['navbar_fg'], .6 ) ); ?> !important;
        }
        
        ul.slim-header-menu > li.menu-item-has-children > ul.sub-menu > li > ul.sub-menu > li > a:hover,
        ul.slim-header-menu > li.menu-item-has-children > ul.sub-menu > li > ul.sub-menu > li > ul.sub-menu > li > a:hover {
            color: <?php echo esc_attr( buildr_hex2rgba( $theme_colors['primary'], 1 ) ); ?> !important;
        }
        
        <?php if ( get_theme_mod( BUILDR_OPTIONS::NAVBAR_STYLE, BUILDR_DEFAULTS::NAVBAR_STYLE ) == 'banner' && ! get_theme_mod( BUILDR_OPTIONS::NAVBAR_TRANSPARENT_MENU_BG, BUILDR_DEFAULTS::NAVBAR_TRANSPARENT_MENU_BG ) ) : ?>
        
            header#masthead.header-style-banner #banner-header-wrap #banner-header-menu-wrap,
            ul.slim-header-menu > li.menu-item-has-children > ul.sub-menu {
                background-color: <?php echo esc_attr( $theme_colors['navbar_menu_bg'] ); ?>;
            }
            
            div#banner-header ul.slim-header-menu a {
                color: <?php echo esc_attr( $theme_colors['navbar_menu_fg'] ); ?>;
            }
        
        <?php endif; ?>
        
        header#masthead.header-style-split div#split-social-slide-in {
            background-color: <?php echo esc_attr( $theme_colors['social_bg'] ); ?>;
        }

        header#masthead.header-style-slim .navbar-social a.navbar-icon,
        header#masthead.header-style-split div#split-social-slide-in a.navbar-icon {
            color: <?php echo esc_attr( $theme_colors['social_fg'] ); ?>;
        }

        header#masthead.header-style-slim .navbar-social a.navbar-icon:hover,
        header#masthead.header-style-split div#split-social-slide-in a.navbar-icon:hover {
            color: <?php echo esc_attr( $theme_colors['social_fg_hov'] ); ?>;
        }
       
        /* ----- Custom Header Colors --------------------------------------- */

        div#custom-header-content .custom-header-title,
        div#buildr-custom-header.parallax_layers .custom-header-title {
            color: <?php echo esc_attr( $theme_colors['custom_header_title'] ); ?>;
        }

        ul#custom-header-menu > li a {
            color: <?php echo esc_attr( $theme_colors['custom_header_menu'] ); ?>;
        }

        /* ----- Footer Colors ---------------------------------------------- */

        div#pre-footer-wrap {
            border-top: <?php echo intval( get_theme_mod( BUILDR_OPTIONS::FOOTER_BORDER_TOP_THICKNESS, BUILDR_DEFAULTS::FOOTER_BORDER_TOP_THICKNESS ) ) ?>px solid <?php echo esc_attr( $theme_colors['primary'] ); ?>;
            background-color: <?php echo esc_attr( $theme_colors['prefooter_bg'] ); ?>;
            color: <?php echo esc_attr( $theme_colors['prefooter_fg'] ); ?>;
        }
        
        footer#colophon #pre-footer,
        aside.widget table#wp-calendar th, 
        aside.widget table#wp-calendar td {
            color: <?php echo esc_attr( $theme_colors['prefooter_fg'] ); ?>;
        }
        
        footer#colophon #pre-footer h2.widget-title {
            color: <?php echo esc_attr( $theme_colors['footer_widget_title'] ); ?>;
        }
        
        html,
        footer div#slim-footer-wrap {
            background-color: <?php echo esc_attr( $theme_colors['footer_bg'] ); ?>;
        }

        div#slim-footer,
        div#slim-footer a {
            color: <?php echo esc_attr( $theme_colors['footer_fg'] ); ?>;
        }
        
        footer span.buildr_by {
            border-color: <?php echo esc_attr( $theme_colors['footer_fg'] ); ?> !important;
        }
        
        #footer-branding-wrap svg path {
            fill: <?php echo esc_attr( $theme_colors['footer_fg'] ); ?>;
        }
        
        /* ----- Slide-in Cart Tab ------------------------------------------ */
        
        div#cart-panel-trigger {
            background-color: <?php echo esc_attr( $theme_colors['cart_tab'] ); ?>;
        }
        
        /* ---------------------------------------------------------------------
         * Navbar
         * ------------------------------------------------------------------ */

        <?php if ( get_theme_mod( BUILDR_OPTIONS::NAVBAR_STYLE, BUILDR_DEFAULTS::NAVBAR_STYLE ) == 'slim_split' || get_theme_mod( BUILDR_OPTIONS::NAVBAR_STYLE, BUILDR_DEFAULTS::NAVBAR_STYLE ) == 'slim_left' ) : ?>
            
            @media (min-width: 992px) {
                div#content {
                    padding-top: <?php echo intval( get_theme_mod( BUILDR_OPTIONS::NAVBAR_INITIAL_HEIGHT, BUILDR_DEFAULTS::NAVBAR_INITIAL_HEIGHT ) - 1 ); ?>px;
                }
                div#content.sticky-header {
                    padding-top: <?php echo intval( get_theme_mod( BUILDR_OPTIONS::NAVBAR_STICKY_HEIGHT, BUILDR_DEFAULTS::NAVBAR_STICKY_HEIGHT ) - 1 ); ?>px;
                }
            }
            
        <?php endif; ?>

        <?php if ( get_theme_mod( BUILDR_OPTIONS::NAVBAR_HAS_SHADOW, BUILDR_DEFAULTS::NAVBAR_HAS_SHADOW ) ) : ?>
            
            div#slim-header-wrap,
            div#banner-header-wrap {
                box-shadow: 0px 0px 10px 0px rgba(0,0,0,.75);
            }
            
        <?php endif; ?>
        
        <?php if ( get_theme_mod( BUILDR_OPTIONS::NAVBAR_FINAL_LINK_ACCENT, BUILDR_DEFAULTS::NAVBAR_FINAL_LINK_ACCENT ) ) : ?>
            
            ul#slim-header-b > li:last-child,
            ul#slim-header-primary > li:last-child,
            ul#banner-header-primary > li:last-child {
                padding-left: 5px;
            }
            
            ul#slim-header-b > li:last-child > a,
            ul#slim-header-primary > li:last-child > a,
            ul#banner-header-primary > li:last-child > a {
                border: 2px solid;
                padding: 8px 20px !important;
                padding-left: calc(20px + .5em) !important;
            }
            
            ul#slim-header-b > li:not(.menu-item-has-children):last-child > a:hover:before,
            ul#slim-header-primary > li:not(.menu-item-has-children):last-child > a:hover:before,
            ul#banner-header-primary > li:not(.menu-item-has-children):last-child > a:hover:before {
                visibility: hidden; 
                opacity: 0; 
                -webkit-transform: scaleX(0); 
                transform: scaleX(0); 
            }
            
            ul#slim-header-b > li.current-menu-item:last-child > a:before,
            ul#slim-header-primary > li.current-menu-item:last-child > a:before,
            ul#banner-header-primary > li.current-menu-item:last-child > a:before {
                visibility: hidden; 
                opacity: 0; 
                -webkit-transform: scaleX(0); 
                transform: scaleX(0); 
            }
            
        <?php endif; ?>
            
        <?php if( get_theme_mod( BUILDR_OPTIONS::NAVBAR_FINAL_LINK_ROUNDED, BUILDR_DEFAULTS::NAVBAR_FINAL_LINK_ROUNDED ) ) : ?>
            
            ul#slim-header-b > li:last-child > a,
            ul#slim-header-primary > li:last-child > a,
            ul#banner-header-primary > li:last-child > a {
                border-radius: 30px;
            }
            
        <?php endif; ?>    


        /* ----- Slim Navbars: Logo Settings -------------------------------- */

        <?php if ( get_theme_mod( BUILDR_OPTIONS::NAVBAR_ALWAYS_SHOW_LOGO, BUILDR_DEFAULTS::NAVBAR_ALWAYS_SHOW_LOGO ) || get_theme_mod( BUILDR_OPTIONS::NAVBAR_STYLE, BUILDR_DEFAULTS::NAVBAR_STYLE ) == 'banner' ) : ?>
            header img.custom-logo {
                height: <?php echo intval( get_theme_mod( BUILDR_OPTIONS::NAVBAR_INITIAL_HEIGHT, BUILDR_DEFAULTS::NAVBAR_INITIAL_HEIGHT ) ); ?>px;
                margin: 0 <?php echo intval( get_theme_mod( BUILDR_OPTIONS::NAVBAR_LOGO_HORIZONTAL_PADDING, BUILDR_DEFAULTS::NAVBAR_LOGO_HORIZONTAL_PADDING ) ); ?>px;
                opacity: 1;
            }
        <?php else : ?>
            header img.custom-logo {
                height: 0px;
                opacity: 0;
            }
        <?php endif; ?>

        .is-sticky img.custom-logo {
            height: <?php echo intval( get_theme_mod( BUILDR_OPTIONS::NAVBAR_STICKY_HEIGHT, BUILDR_DEFAULTS::NAVBAR_STICKY_HEIGHT ) ); ?>px;
            margin: 0 <?php echo intval( get_theme_mod( BUILDR_OPTIONS::NAVBAR_LOGO_HORIZONTAL_PADDING, BUILDR_DEFAULTS::NAVBAR_LOGO_HORIZONTAL_PADDING ) ); ?>px;
        }

        /* ----- Slim Navbars: Collapse ------------------------------------- */

        @media (min-width:992px) {
            div#slim-header .right-half {
                min-height: <?php echo intval( get_theme_mod( BUILDR_OPTIONS::NAVBAR_INITIAL_HEIGHT, BUILDR_DEFAULTS::NAVBAR_INITIAL_HEIGHT ) - 1 ); ?>px;
            }
        }
        
        #slim-header-wrap ul.slim-header-menu > li > a,
        #slim-header-wrap ul.slim-header-menu > li {
            line-height: <?php echo intval( get_theme_mod( BUILDR_OPTIONS::NAVBAR_INITIAL_HEIGHT, BUILDR_DEFAULTS::NAVBAR_INITIAL_HEIGHT ) ); ?>px;
        }

        /* ----- Slim Navbars: Expand --------------------------------------- */

        @media (min-width:992px) {
            .is-sticky div#slim-header .right-half {
                min-height: <?php echo intval( get_theme_mod( BUILDR_OPTIONS::NAVBAR_STICKY_HEIGHT, BUILDR_DEFAULTS::NAVBAR_STICKY_HEIGHT ) - 1 ); ?>px;
            }
        }
        
        .is-sticky #slim-header-wrap ul.slim-header-menu > li > a,
        .is-sticky #slim-header-wrap ul.slim-header-menu > li {
            line-height: <?php echo intval( get_theme_mod( BUILDR_OPTIONS::NAVBAR_STICKY_HEIGHT, BUILDR_DEFAULTS::NAVBAR_STICKY_HEIGHT ) ); ?>px;
        }

        /* ----- Slim Navbars: Site Title ----------------------------------- */

        .site-branding .site-title {
            font-size: <?php echo intval( get_theme_mod( BUILDR_OPTIONS::NAVBAR_SITE_TITLE_FONT_SIZE, BUILDR_DEFAULTS::NAVBAR_SITE_TITLE_FONT_SIZE ) ); ?>px;
            letter-spacing: <?php echo esc_attr( get_theme_mod( BUILDR_OPTIONS::NAVBAR_SITE_TITLE_LETTER_GAP, BUILDR_DEFAULTS::NAVBAR_SITE_TITLE_LETTER_GAP ) ); ?>em;
        }

        <?php if ( get_theme_mod( BUILDR_OPTIONS::NAVBAR_SITE_TITLE_FONT_FAMILY, BUILDR_DEFAULTS::NAVBAR_SITE_TITLE_FONT_FAMILY ) == 'primary' ) : ?>

            .site-branding .site-title,
            div#footer-branding-wrap .site-title {
                font-family: <?php echo esc_attr( get_theme_mod( BUILDR_OPTIONS::FONT_PRIMARY, BUILDR_DEFAULTS::FONT_PRIMARY ) ); ?>;
            }

        <?php endif; ?>

        /* ----- Slim Navbars: Site Description ----------------------------- */

        .site-branding .site-tagline {
            font-size: <?php echo intval( get_theme_mod( BUILDR_OPTIONS::NAVBAR_TAGLINE_FONT_SIZE, BUILDR_DEFAULTS::NAVBAR_TAGLINE_FONT_SIZE ) ); ?>px;
        }

        <?php if ( get_theme_mod( BUILDR_OPTIONS::NAVBAR_TAGLINE_FONT_FAMILY, BUILDR_DEFAULTS::NAVBAR_TAGLINE_FONT_FAMILY ) == 'primary' ) : ?>

            .site-branding .site-tagline {
                font-family: <?php echo esc_attr( get_theme_mod( BUILDR_OPTIONS::FONT_PRIMARY, BUILDR_DEFAULTS::FONT_PRIMARY ) ); ?>;
            }

        <?php endif; ?>

        <?php if ( get_theme_mod( BUILDR_OPTIONS::NAVBAR_HIDE_TAGLINE, BUILDR_DEFAULTS::NAVBAR_HIDE_TAGLINE ) ) : ?>

            .site-branding .site-tagline {
                display: none !important;
            }

        <?php endif; ?>

        /* ----- Slim Navbars: Nav Links ------------------------------------ */

        ul.slim-header-menu > li {
            padding: 0 <?php echo intval( get_theme_mod( BUILDR_OPTIONS::NAVBAR_LINKS_GAP, BUILDR_DEFAULTS::NAVBAR_LINKS_GAP ) / 2 ); ?>px;
        }

        ul#mobile-menu li a,
        ul.slim-header-menu > li a {
            font-size: <?php echo intval( get_theme_mod( BUILDR_OPTIONS::NAVBAR_LINKS_FONT_SIZE, BUILDR_DEFAULTS::NAVBAR_LINKS_FONT_SIZE ) ); ?>px;
        }

        /* ----- Slim Navbars: Left Aligned Logo & Right Aligned Menu ------- */

        <?php if ( get_theme_mod( BUILDR_OPTIONS::NAVBAR_RIGHT_ALIGN_MENU, BUILDR_DEFAULTS::NAVBAR_RIGHT_ALIGN_MENU ) ) : ?>
        
            header#masthead.header-style-slim div#slim-header .right-half {
                justify-content: flex-end;
            }
            @media (min-width:992px) {
                header#masthead.header-style-slim div#slim-header .left-half {
                    display: none;
                }
            }
            
        <?php endif; ?>

        /* ----- Mobile Nav: Fixed Logo Height ------------------------------ */

        @media (max-width:991px) {
            header img.custom-logo {
                padding: 0;
                height: <?php echo intval( get_theme_mod( BUILDR_OPTIONS::NAVBAR_LOGO_HEIGHT_MBL, BUILDR_DEFAULTS::NAVBAR_LOGO_HEIGHT_MBL ) ); ?>px !important;
            }
        }

        /* ----- Banner Navbar: Logo Settings ------------------------------- */
        
        header#masthead.header-style-banner div#banner-header-wrap #custom-logo-wrap img.custom-logo {
            height: <?php echo intval( get_theme_mod( BUILDR_OPTIONS::NAVBAR_LOGO_HEIGHT_DSK, BUILDR_DEFAULTS::NAVBAR_LOGO_HEIGHT_DSK ) ); ?>px;
        }
        
        header#masthead.header-style-banner div#banner-header-wrap #custom-logo-wrap {
            padding-top: <?php echo intval( get_theme_mod( BUILDR_OPTIONS::NAVBAR_BRANDING_SPACE_TOP_DSK, BUILDR_DEFAULTS::NAVBAR_BRANDING_SPACE_TOP_DSK ) ); ?>px;
            padding-bottom: <?php echo intval( get_theme_mod( BUILDR_OPTIONS::NAVBAR_BRANDING_SPACE_BOTTOM_DSK, BUILDR_DEFAULTS::NAVBAR_BRANDING_SPACE_BOTTOM_DSK ) ); ?>px;
        }
        
        @media (max-width:991px) {
            header#masthead.header-style-banner div#banner-header-wrap #custom-logo-wrap img.custom-logo {
                height: <?php echo intval( get_theme_mod( BUILDR_OPTIONS::NAVBAR_LOGO_HEIGHT_MBL, BUILDR_DEFAULTS::NAVBAR_LOGO_HEIGHT_MBL ) ); ?>px !important;
            }
            header#masthead.header-style-banner div#banner-header-wrap #custom-logo-wrap {
                padding-top: <?php echo intval( get_theme_mod( BUILDR_OPTIONS::NAVBAR_BRANDING_SPACE_TOP_MBL, BUILDR_DEFAULTS::NAVBAR_BRANDING_SPACE_TOP_MBL ) ); ?>px;
                padding-bottom: <?php echo intval( get_theme_mod( BUILDR_OPTIONS::NAVBAR_BRANDING_SPACE_BOTTOM_MBL, BUILDR_DEFAULTS::NAVBAR_BRANDING_SPACE_BOTTOM_MBL ) ); ?>px;
            }
        }
        
        <?php if ( get_theme_mod( BUILDR_OPTIONS::NAVBAR_BRANDING_ALIGNMENT, BUILDR_DEFAULTS::NAVBAR_BRANDING_ALIGNMENT ) == 'right' || get_theme_mod( BUILDR_OPTIONS::NAVBAR_BRANDING_ALIGNMENT, BUILDR_DEFAULTS::NAVBAR_BRANDING_ALIGNMENT ) == 'center' ) : ?>
        
            header#masthead.header-style-banner div#banner-header-wrap #custom-logo-wrap {
                text-align: <?php echo esc_attr( get_theme_mod( BUILDR_OPTIONS::NAVBAR_BRANDING_ALIGNMENT, BUILDR_DEFAULTS::NAVBAR_BRANDING_ALIGNMENT ) ); ?>;
            }
        
        <?php endif; ?>
        
        <?php if ( get_theme_mod( BUILDR_OPTIONS::NAVBAR_MENU_ALIGNMENT, BUILDR_DEFAULTS::NAVBAR_MENU_ALIGNMENT ) == 'right' || get_theme_mod( BUILDR_OPTIONS::NAVBAR_MENU_ALIGNMENT, BUILDR_DEFAULTS::NAVBAR_MENU_ALIGNMENT ) == 'center' ) : ?>
        
            <?php if ( get_theme_mod( BUILDR_OPTIONS::NAVBAR_MENU_ALIGNMENT, BUILDR_DEFAULTS::NAVBAR_MENU_ALIGNMENT ) == 'right' ) : ?>
            
                header#masthead.header-style-banner ul#banner-header-primary {
                    float: right;
                }
                
                header#masthead.header-style-banner #mobile-menu-trigger {
                    margin: 15px 15px 0 auto;
                }
                
                header#masthead.header-style-banner ul#mobile-menu {
                    text-align: right;
                }
            
            <?php else : ?>
        
                header#masthead.header-style-banner ul#banner-header-primary {
                    float: none;
                    margin: 0 auto;
                }
        
                header#masthead.header-style-banner #mobile-menu-trigger {
                    margin: 15px auto 0;
                }
                
                header#masthead.header-style-banner ul#mobile-menu {
                    text-align: center;
                }
                
            <?php endif; ?>
            
        <?php endif; ?>
        
        /* ---------------------------------------------------------------------
         * Homepage
         * ------------------------------------------------------------------ */
                
        <?php if ( ! get_theme_mod( BUILDR_OPTIONS::HOMEPAGE_SHOW_CONTENT, BUILDR_DEFAULTS::HOMEPAGE_SHOW_CONTENT ) ) : ?>
            #front-page-content {
                display: none;
            }
        <?php endif; ?>
        
        /* ---------------------------------------------------------------------
         * Blog
         * ------------------------------------------------------------------ */

        <?php

        switch ( get_theme_mod( BUILDR_OPTIONS::BLOG_LAYOUT_NUM_COLS, BUILDR_DEFAULTS::BLOG_LAYOUT_NUM_COLS ) ) :

            case '1col':
                $col_width = "100%";
                break;
            case '2col':
                $col_width = "50%";
                break;
            case '3col':
                $col_width = "33.333333%";
                break;
            case '4col':
                $col_width = "25%";
                break;
            default :
                $col_width = "33.333333%";

        endswitch;
        ?>

        @media (min-width:1200px) {
            .masonry-card-blog .blog_item_wrap,
            .masonry-card-blog .grid_sizer {
                width: <?php echo esc_attr( $col_width ); ?> !important;
            }
        }

        /* ----- Masonry Blog Cards: Border Radius -------------------------- */

        <?php $card_radius = get_theme_mod( BUILDR_OPTIONS::BLOG_CARD_BORDER_RADIUS, BUILDR_DEFAULTS::BLOG_CARD_BORDER_RADIUS ); ?>
        
        .mosaic-grid-blog .mosaic-grid > .blog_item_wrap {
            padding: <?php echo intval( get_theme_mod( BUILDR_OPTIONS::BLOG_CARD_MOSAIC_GAP, BUILDR_DEFAULTS::BLOG_CARD_MOSAIC_GAP ) ); ?>px;
        }
        
        .masonry-card-blog .blog_item_wrap img {
            border-radius: <?php echo intval( $card_radius ); ?>px <?php echo intval( $card_radius ); ?>px 0 0;
        }
        .masonry-card-blog .blog_item_wrap .blog_item,
        .masonry-card-blog .blog_item_wrap {
            border-radius: <?php echo intval( $card_radius ); ?>px;
        }
        .masonry-card-blog .blog_item_wrap .inner-wrap {
            border-radius: 0 0 <?php echo intval( $card_radius ); ?>px <?php echo intval( $card_radius ); ?>px;
        }
        
        .mosaic-grid-blog .mosaic-grid > .blog_item_wrap .blog_item,
        .standard-stacked-blog .blog_item_wrap,
        .standard-stacked-blog .excerpt img.featured-image {
            border-radius: <?php echo intval( $card_radius ); ?>px;
        }
        
        .mosaic-grid-blog .mosaic-grid > .blog_item_wrap:nth-child(7n+1) > .blog_item > .inner-wrap,
        .mosaic-grid-blog .mosaic-grid > .blog_item_wrap:nth-child(7n+6) > .blog_item > .inner-wrap {
            border-top-right-radius: <?php echo intval( $card_radius ); ?>px;
            border-bottom-left-radius: <?php echo intval( $card_radius ); ?>px;
        }
        
        .mosaic-grid-blog .mosaic-grid > .blog_item_wrap:nth-child(7n+2) > .blog_item > .inner-wrap,
        .mosaic-grid-blog .mosaic-grid > .blog_item_wrap:nth-child(7n+4) > .blog_item > .inner-wrap {
            border-top-left-radius: <?php echo intval( $card_radius ); ?>px;
            border-bottom-right-radius: <?php echo intval( $card_radius ); ?>px;
        }
        
        .mosaic-grid-blog .mosaic-grid > .blog_item_wrap:nth-child(7n+3) > .blog_item > .inner-wrap,
        .mosaic-grid-blog .mosaic-grid > .blog_item_wrap:nth-child(7n+7) > .blog_item > .inner-wrap {
            border-top-right-radius: <?php echo intval( $card_radius ); ?>px;
            border-bottom-left-radius: <?php echo intval( $card_radius ); ?>px;
        }
        
        .mosaic-grid-blog .mosaic-grid > .blog_item_wrap:nth-child(7n+5) > .blog_item > .inner-wrap {
            border-top-left-radius: <?php echo intval( $card_radius ); ?>px;
            border-bottom-right-radius: <?php echo intval( $card_radius ); ?>px;
        }

        /* ----- Masonry Blog Cards: Hidden Categories Bar ------------------ */

        <?php if ( ! get_theme_mod( BUILDR_OPTIONS::BLOG_SHOW_CATEGORY, BUILDR_DEFAULTS::BLOG_SHOW_CATEGORY ) ) : ?>
            .blog_item_wrap .blog_item .footer-meta {
                padding-bottom: 0;
                border: none;
            }
            .masonry-card-blog .blog_item_wrap .blog_item .inner-wrap {
                padding-bottom: 15px;
            }
            .masonry-card-blog .blog_item_wrap:hover .blog_item .inner-wrap {
                border-radius: 0;
            }
        <?php endif; ?>

        /* ----- Masonry Blog Cards: Hidden Comment & View Counts ----------- */

        <?php if ( ! get_theme_mod( BUILDR_OPTIONS::BLOG_SHOW_COMMENT_COUNT, BUILDR_DEFAULTS::BLOG_SHOW_COMMENT_COUNT ) && ! get_theme_mod( 'blog_layout_show_view_count', false ) ) : ?>
            .masonry-card-blog .blog_item_wrap .blog_item .inner {
                padding-bottom: 15px;
            }
        <?php endif; ?>

        /* ----- Masonry Blog Cards: Typography ----------------------------- */

        .blog_item_wrap .blog_item .entry-title {
            font-size: <?php echo intval( get_theme_mod( BUILDR_OPTIONS::BLOG_CARD_FONT_SIZE_DSK, BUILDR_DEFAULTS::BLOG_CARD_FONT_SIZE_DSK ) ); ?>px;
        }

        .blog_item_wrap .blog_item .inner .blog-meta,
        .standard-stacked-blog .blog_item_wrap .blog_item .blog-meta .posted-meta,
        .standard-stacked-blog .blog-meta div.category-meta .categories-bar {
            font-size: <?php echo intval( get_theme_mod( BUILDR_OPTIONS::BLOG_META_FONT_SIZE, BUILDR_DEFAULTS::BLOG_META_FONT_SIZE ) ); ?>px;
        }

        @media (max-width: 767px) {
            .blog_item_wrap .blog_item .entry-title {
                font-size: <?php echo intval( get_theme_mod( BUILDR_OPTIONS::BLOG_CARD_FONT_SIZE_MBL, BUILDR_DEFAULTS::BLOG_CARD_FONT_SIZE_MBL ) ); ?>px;
            }
        }
        
        /* ----- Standard Blog Cards: Flat or Raised ------------------------ */
        
        <?php if ( get_theme_mod( BUILDR_OPTIONS::BLOG_CARD_APPEARANCE, BUILDR_DEFAULTS::BLOG_CARD_APPEARANCE ) == 'raised' ) : ?>
            
            .standard-stacked-blog .blog_item_wrap {
                box-shadow: 0px 0px 20px 0px rgba(0,0,0,0.15);
                border: none;
            }
            
            .standard-stacked-blog .blog-meta div.category-meta, 
            .standard-stacked-blog .blog-meta div.posted-meta {
                border-bottom: thin solid #eeeeee;
            }
            
            .standard-stacked-blog .blog_item_wrap .blog_item .blog-meta .posted-meta {
                margin-bottom: 15px;
            }
            
            @media (max-width:767px) {
                .standard-stacked-blog .blog-meta div.posted-meta {
                    border-bottom: thin solid #eee;
                }
                .standard-stacked-blog .blog-meta div.category-meta {
                    border: none;
                }
            }
        
        <?php endif; ?>
        
        /* ---------------------------------------------------------------------
         * Custom Header
         * ------------------------------------------------------------------ */

        div#custom-header-content .custom-header-title,
        div#buildr-custom-header.parallax_layers .custom-header-title {
            font-size: <?php echo intval( get_theme_mod( BUILDR_OPTIONS::CUSTOM_HEADER_TITLE_FONT_SIZE, BUILDR_DEFAULTS::CUSTOM_HEADER_TITLE_FONT_SIZE ) ); ?>px;
            letter-spacing: <?php echo esc_attr( get_theme_mod( BUILDR_OPTIONS::CUSTOM_HEADER_TITLE_LETTER_GAP, BUILDR_DEFAULTS::CUSTOM_HEADER_TITLE_LETTER_GAP ) ); ?>em;
        }

        ul#custom-header-menu > li a {
            font-size: <?php echo intval( get_theme_mod( BUILDR_OPTIONS::CUSTOM_HEADER_MENU_FONT_SIZE, BUILDR_DEFAULTS::CUSTOM_HEADER_MENU_FONT_SIZE ) ); ?>px;
            letter-spacing: <?php echo esc_attr( get_theme_mod( BUILDR_OPTIONS::CUSTOM_HEADER_MENU_LETTER_GAP, BUILDR_DEFAULTS::CUSTOM_HEADER_MENU_LETTER_GAP ) ); ?>em;
            margin: 2px <?php echo intval( get_theme_mod( BUILDR_OPTIONS::CUSTOM_HEADER_MENU_LINKS_GAP, BUILDR_DEFAULTS::CUSTOM_HEADER_MENU_LINKS_GAP ) / 2 ); ?>px;
        }

        div#buildr-custom-header.buildr_parallax,
        div#buildr-custom-header.buildr_parallax .util-tbl-wrap,
        div#buildr-custom-header.parallax_layers {
            height: <?php echo get_theme_mod( BUILDR_OPTIONS::CUSTOM_HEADER_HEIGHT_CALC, BUILDR_DEFAULTS::CUSTOM_HEADER_HEIGHT_CALC ) == 'percent' ? intval( get_theme_mod( BUILDR_OPTIONS::CUSTOM_HEADER_HEIGHT_PCT, BUILDR_DEFAULTS::CUSTOM_HEADER_HEIGHT_PCT ) ) . 'vh' : intval( get_theme_mod( BUILDR_OPTIONS::CUSTOM_HEADER_HEIGHT_PX, BUILDR_DEFAULTS::CUSTOM_HEADER_HEIGHT_PX ) ) . 'px'; ?>;
        }

        <?php if ( get_theme_mod( BUILDR_OPTIONS::CUSTOM_HEADER_MENU_BUTTONS, BUILDR_DEFAULTS::CUSTOM_HEADER_MENU_BUTTONS ) ) : ?>
            
            ul#custom-header-menu > li a {
                border: 2px solid;
                padding: 8px 20px !important;
                border-radius: 30px;
                padding-left: calc(20px + .5em) !important;
            }
        
        <?php endif; ?>
        
        /* ----- Perspective Layer ------------------------------------------ */

        div#buildr-custom-header.parallax_layers .jparallax-layer.texture-layer,
        div#buildr-custom-header.parallax_layers .jparallax-layer.color-layer,
        div#buildr-custom-header.parallax_layers .jparallax-layer.image-layer {
            width: 115vw;
            height: <?php echo get_theme_mod( BUILDR_OPTIONS::CUSTOM_HEADER_HEIGHT_CALC, BUILDR_DEFAULTS::CUSTOM_HEADER_HEIGHT_CALC ) == 'percent' ? intval( get_theme_mod( BUILDR_OPTIONS::CUSTOM_HEADER_HEIGHT_PCT, BUILDR_DEFAULTS::CUSTOM_HEADER_HEIGHT_PCT ) + 15 ) . 'vh' : intval( get_theme_mod( BUILDR_OPTIONS::CUSTOM_HEADER_HEIGHT_PX, BUILDR_DEFAULTS::CUSTOM_HEADER_HEIGHT_PX ) * 1.15 ) . 'px'; ?>;
            background-size: cover;
            background-position: 50%;
        }

        div#buildr-custom-header.parallax_layers .jparallax-layer.texture-layer {
            opacity: <?php echo esc_attr( get_theme_mod( BUILDR_OPTIONS::CUSTOM_HEADER_TEXTURE_OPAC, BUILDR_DEFAULTS::CUSTOM_HEADER_TEXTURE_OPAC ) ); ?>;
        }

        div#buildr-custom-header.parallax_layers .jparallax-layer.color-layer {
            opacity: <?php echo esc_attr( get_theme_mod( BUILDR_OPTIONS::CUSTOM_HEADER_COLOR_LAYER_OPACITY, BUILDR_DEFAULTS::CUSTOM_HEADER_COLOR_LAYER_OPACITY ) ); ?>;
        }

        div#buildr-custom-header.buildr_parallax div#custom-header-overlay.single,
        div#buildr-custom-header.parallax_layers .jparallax-layer.color-layer.single {
            background: <?php echo esc_attr( buildr_hex2rgba( $theme_colors['plx_overlay_single'], get_theme_mod( BUILDR_OPTIONS::CUSTOM_HEADER_COLOR_LAYER_OPACITY, BUILDR_DEFAULTS::CUSTOM_HEADER_COLOR_LAYER_OPACITY ) ) ); ?>;
        }

        div#buildr-custom-header.buildr_parallax img.custom-logo,
        div#buildr-custom-header.parallax_layers .jparallax-layer.content-layer img.custom-logo {
            height: <?php echo intval( get_theme_mod( BUILDR_OPTIONS::CUSTOM_HEADER_LOGO_HEIGHT, BUILDR_DEFAULTS::CUSTOM_HEADER_LOGO_HEIGHT ) ); ?>px;
        }

        /* ----- Custom Header - Mobile Heights ----------------------------- */

        @media (max-width: 991px) {

            div#buildr-custom-header.buildr_parallax,
            div#buildr-custom-header.buildr_parallax .util-tbl-wrap,
            div#buildr-custom-header.parallax_layers {
                height: <?php echo get_theme_mod( BUILDR_OPTIONS::CUSTOM_HEADER_HEIGHT_CALC, BUILDR_DEFAULTS::CUSTOM_HEADER_HEIGHT_CALC ) == 'percent' ? intval( get_theme_mod( BUILDR_OPTIONS::CUSTOM_HEADER_HEIGHT_PCT_MBL, BUILDR_DEFAULTS::CUSTOM_HEADER_HEIGHT_PCT_MBL ) ) . 'vh' : intval( get_theme_mod( BUILDR_OPTIONS::CUSTOM_HEADER_HEIGHT_PX_MBL, BUILDR_DEFAULTS::CUSTOM_HEADER_HEIGHT_PX_MBL ) ) . 'px'; ?>;
            }

            div#buildr-custom-header.parallax_layers .jparallax-layer.texture-layer,
            div#buildr-custom-header.parallax_layers .jparallax-layer.color-layer,
            div#buildr-custom-header.parallax_layers .jparallax-layer.image-layer {
                height: <?php echo get_theme_mod( BUILDR_OPTIONS::CUSTOM_HEADER_HEIGHT_CALC, BUILDR_DEFAULTS::CUSTOM_HEADER_HEIGHT_CALC ) == 'percent' ? intval( get_theme_mod( BUILDR_OPTIONS::CUSTOM_HEADER_HEIGHT_PCT_MBL, BUILDR_DEFAULTS::CUSTOM_HEADER_HEIGHT_PCT_MBL ) + 15 ) . 'vh' : intval( ( get_theme_mod( BUILDR_OPTIONS::CUSTOM_HEADER_HEIGHT_PX_MBL, BUILDR_DEFAULTS::CUSTOM_HEADER_HEIGHT_PX_MBL ) * 1.15 ) ) . 'px'; ?>;
            }

            div#buildr-custom-header.buildr_parallax img.custom-logo,
            div#buildr-custom-header.parallax_layers .jparallax-layer.content-layer img.custom-logo {
                height: <?php echo intval( get_theme_mod( BUILDR_OPTIONS::CUSTOM_HEADER_LOGO_HEIGHT_MBL, BUILDR_DEFAULTS::CUSTOM_HEADER_LOGO_HEIGHT_MBL ) ); ?>px;
            }

        }

        /* ----- Match Height : Vertical Scroll Parallax Header Only ----- */
        
        <?php if ( get_theme_mod( BUILDR_OPTIONS::NAVBAR_STYLE, BUILDR_DEFAULTS::NAVBAR_STYLE ) != 'banner' && get_theme_mod( BUILDR_OPTIONS::CUSTOM_HEADER_HEIGHT_CALC, BUILDR_DEFAULTS::CUSTOM_HEADER_HEIGHT_CALC ) == 'percent' && get_theme_mod( BUILDR_OPTIONS::CUSTOM_HEADER_HEIGHT_PCT, BUILDR_DEFAULTS::CUSTOM_HEADER_HEIGHT_PCT ) == 100 && get_theme_mod( 'custom_header_style_toggle', 'parallax_vertical' ) == 'parallax_vertical' ) : ?>
        
            div#buildr-custom-header.buildr_parallax,
            div#buildr-custom-header.buildr_parallax .util-tbl-wrap {
                height: calc(100vh - <?php echo intval( get_theme_mod( BUILDR_OPTIONS::NAVBAR_INITIAL_HEIGHT, BUILDR_DEFAULTS::NAVBAR_INITIAL_HEIGHT ) - 1 ); ?>px);
            }
            
            body.admin-bar div#buildr-custom-header.buildr_parallax,
            body.admin-bar div#buildr-custom-header.buildr_parallax .util-tbl-wrap {
                height: calc(100vh - <?php echo intval( get_theme_mod( BUILDR_OPTIONS::NAVBAR_INITIAL_HEIGHT, BUILDR_DEFAULTS::NAVBAR_INITIAL_HEIGHT ) - 1 + 32 ); ?>px);
            }
            
        <?php endif; ?>
        
        /* ----- Perspective Layer - Gradient Overlay ----------------------- */

        <?php
        switch ( get_theme_mod( BUILDR_OPTIONS::GRADIENT_LINEAR_DIRECTION, BUILDR_DEFAULTS::GRADIENT_LINEAR_DIRECTION ) ) :

            case 'down':
                $linear_degrees = '180deg';
                break;

            case 'right':
                $linear_degrees = '90deg';
                break;

            case 'left':
                $linear_degrees = '-90deg';
                break;

            default:
                $linear_degrees = '0deg';
                break;

        endswitch; ?>

        div#buildr-custom-header.buildr_parallax div#custom-header-overlay.gradient,
        div#buildr-custom-header.parallax_layers .jparallax-layer.color-layer.gradient {
            <?php if ( get_theme_mod( BUILDR_OPTIONS::GRADIENT_STYLE, BUILDR_DEFAULTS::GRADIENT_STYLE ) == 'linear' ) : ?>

                background: -moz-linear-gradient(<?php echo esc_attr( $linear_degrees ); ?>,
                    <?php echo esc_attr( buildr_hex2rgba( $theme_colors['plx_overlay_grad_start'], get_theme_mod( BUILDR_OPTIONS::GRADIENT_START_COLOR_OPACITY, BUILDR_DEFAULTS::GRADIENT_START_COLOR_OPACITY ) ) ); ?> 0%,
                    <?php echo esc_attr( buildr_hex2rgba( $theme_colors['plx_overlay_grad_end'], get_theme_mod( BUILDR_OPTIONS::GRADIENT_END_COLOR_OPACITY, BUILDR_DEFAULTS::GRADIENT_END_COLOR_OPACITY ) ) ); ?> 100%);
                background: -webkit-linear-gradient(<?php echo esc_attr( $linear_degrees ); ?>,
                    <?php echo esc_attr( buildr_hex2rgba( $theme_colors['plx_overlay_grad_start'], get_theme_mod( BUILDR_OPTIONS::GRADIENT_START_COLOR_OPACITY, BUILDR_DEFAULTS::GRADIENT_START_COLOR_OPACITY ) ) ); ?> 0%,
                    <?php echo esc_attr( buildr_hex2rgba( $theme_colors['plx_overlay_grad_end'], get_theme_mod( BUILDR_OPTIONS::GRADIENT_END_COLOR_OPACITY, BUILDR_DEFAULTS::GRADIENT_END_COLOR_OPACITY ) ) ); ?> 100%);
                background: linear-gradient(<?php echo esc_attr( $linear_degrees ); ?>,
                    <?php echo esc_attr( buildr_hex2rgba( $theme_colors['plx_overlay_grad_start'], get_theme_mod( BUILDR_OPTIONS::GRADIENT_START_COLOR_OPACITY, BUILDR_DEFAULTS::GRADIENT_START_COLOR_OPACITY ) ) ); ?> 0%,
                    <?php echo esc_attr( buildr_hex2rgba( $theme_colors['plx_overlay_grad_end'], get_theme_mod( BUILDR_OPTIONS::GRADIENT_END_COLOR_OPACITY, BUILDR_DEFAULTS::GRADIENT_END_COLOR_OPACITY ) ) ); ?> 100%);

            <?php else : ?>

                background: -moz-radial-gradient(center, ellipse cover,
                    <?php echo esc_attr( buildr_hex2rgba( $theme_colors['plx_overlay_grad_start'], get_theme_mod( BUILDR_OPTIONS::GRADIENT_START_COLOR_OPACITY, BUILDR_DEFAULTS::GRADIENT_START_COLOR_OPACITY ) ) ); ?> 0%,
                    <?php echo esc_attr( buildr_hex2rgba( $theme_colors['plx_overlay_grad_end'], get_theme_mod( BUILDR_OPTIONS::GRADIENT_END_COLOR_OPACITY, BUILDR_DEFAULTS::GRADIENT_END_COLOR_OPACITY ) ) ); ?> 100%);
                background: -webkit-radial-gradient(center, ellipse cover,
                    <?php echo esc_attr( buildr_hex2rgba( $theme_colors['plx_overlay_grad_start'], get_theme_mod( BUILDR_OPTIONS::GRADIENT_START_COLOR_OPACITY, BUILDR_DEFAULTS::GRADIENT_START_COLOR_OPACITY ) ) ); ?> 0%,
                    <?php echo esc_attr( buildr_hex2rgba( $theme_colors['plx_overlay_grad_end'], get_theme_mod( BUILDR_OPTIONS::GRADIENT_END_COLOR_OPACITY, BUILDR_DEFAULTS::GRADIENT_END_COLOR_OPACITY ) ) ); ?> 100%);
                background: radial-gradient(center, ellipse cover,
                    <?php echo esc_attr( buildr_hex2rgba( $theme_colors['plx_overlay_grad_start'], get_theme_mod( BUILDR_OPTIONS::GRADIENT_START_COLOR_OPACITY, BUILDR_DEFAULTS::GRADIENT_START_COLOR_OPACITY ) ) ); ?> 0%,
                    <?php echo esc_attr( buildr_hex2rgba( $theme_colors['plx_overlay_grad_end'], get_theme_mod( BUILDR_OPTIONS::GRADIENT_END_COLOR_OPACITY, BUILDR_DEFAULTS::GRADIENT_END_COLOR_OPACITY ) ) ); ?> 100%);

            <?php endif; ?>
            opacity: <?php echo esc_attr( get_theme_mod( BUILDR_OPTIONS::GRADIENT_OVERALL_OPACITY, BUILDR_DEFAULTS::GRADIENT_OVERALL_OPACITY ) ); ?>;
        }

        /* ---------------------------------------------------------------------
         * Footer
         * ------------------------------------------------------------------ */

        h2.widget-title {
            font-size: <?php echo intval( get_theme_mod( BUILDR_OPTIONS::WIDGETS_TITLE_FONT_SIZE, BUILDR_DEFAULTS::WIDGETS_TITLE_FONT_SIZE ) ); ?>px;
            letter-spacing: <?php echo esc_attr( get_theme_mod( BUILDR_OPTIONS::WIDGETS_TITLE_FONT_LETTER_GAP, BUILDR_DEFAULTS::WIDGETS_TITLE_FONT_LETTER_GAP ) ); ?>em;
        }
        
        footer div#footer-branding-wrap img.custom-logo {
            height: <?php echo intval( get_theme_mod( BUILDR_OPTIONS::FOOTER_ALTERNATE_LOGO_HEIGHT, BUILDR_DEFAULTS::FOOTER_ALTERNATE_LOGO_HEIGHT ) ); ?>px;
        }
        
        div#footer-branding-wrap .site-title {
            font-size: <?php echo intval( get_theme_mod( BUILDR_OPTIONS::FOOTER_SITE_TITLE_FONT_SIZE, BUILDR_DEFAULTS::FOOTER_SITE_TITLE_FONT_SIZE ) ); ?>px;
            letter-spacing: <?php echo esc_attr( get_theme_mod( BUILDR_OPTIONS::NAVBAR_SITE_TITLE_LETTER_GAP, BUILDR_DEFAULTS::NAVBAR_SITE_TITLE_LETTER_GAP ) ); ?>em;
        }

        footer div#footer-branding-wrap {
            font-size: <?php echo intval( get_theme_mod( BUILDR_OPTIONS::FOOTER_COPYRIGHT_TAGLINE_FONT_SIZE, BUILDR_DEFAULTS::FOOTER_COPYRIGHT_TAGLINE_FONT_SIZE ) ); ?>px;
        }

        <?php if ( ! get_theme_mod( BUILDR_OPTIONS::FOOTER_SHOW_BRANDING, BUILDR_DEFAULTS::FOOTER_SHOW_BRANDING ) && ! get_theme_mod( BUILDR_OPTIONS::FOOTER_SHOW_COPYRIGHT, BUILDR_DEFAULTS::FOOTER_SHOW_COPYRIGHT ) ) : ?>
            footer span.buildr_by {
                padding-left: 0;
                border-left: none;
            }
        <?php endif; ?>
        
        <?php if ( get_theme_mod( BUILDR_OPTIONS::FOOTER_SHOW_BRANDING, BUILDR_DEFAULTS::FOOTER_SHOW_BRANDING ) && ! get_theme_mod( BUILDR_OPTIONS::FOOTER_SHOW_COPYRIGHT, BUILDR_DEFAULTS::FOOTER_SHOW_COPYRIGHT ) ) : ?>
        
            footer span.buildr_by {
                margin-left: 15px;
            }
        
        <?php endif; ?>
            
    </style>

<?php
}
add_action( 'wp_head', 'buildr_wp_head_styles' );
