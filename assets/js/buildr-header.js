jQuery(document).ready(function ($) {

    /* -------------------------------------------------------------------------
     * Header: Custom A - Split Primary Menu (sticky.js)
     * ---------------------------------------------------------------------- */
    
    // Iterate through all <li> with submenus and match center the <ul> child
    $('ul.slim-header-menu > li.menu-item-has-children').each( function( index ) {
        if ( ( ( 200 - $(this).outerWidth() ) / 2 ) > 0 ) {
            $(this).find('ul.sub-menu').css('transform','translate(-' + ( ( 200 - $(this).outerWidth() ) / 2 ) + 'px,0)');    
        } else {
            $(this).find('ul.sub-menu').css('width', $(this).outerWidth() + 'px');    
        }
    });
  
    $('img.custom-logo').addClass('animated');
  
    $("header#masthead:not(.header-style-vertical) #slim-header-wrap").sticky({
        topSpacing: $('#wpadminbar').length > 0 ? 32 : 0,
        zIndex:9999,
    }).on('sticky-start', function() { 
        
        $('#custom-logo-wrap.sometimes-hidden img.custom-logo').removeClass('fadeOut').addClass('bounceIn');
        
        // Expand Padding Top on #content
        $('div#content,div#buildr-custom-header,div#cart-panel-trigger').addClass('sticky-header');
        
    }).on('sticky-end', function() { 
        
        $('#custom-logo-wrap.sometimes-hidden img.custom-logo').removeClass('bounceIn').addClass('fadeOut');
        
        // Contract Padding Top on #content
        $('div#content,div#buildr-custom-header,div#cart-panel-trigger').removeClass('sticky-header');
        
    });
   
    
    /* -------------------------------------------------------------------------
     * Header: Mobile Menu - Expand / Contract
     * ---------------------------------------------------------------------- */

    var mobile_nav_open = false;
    $( "#mobile-menu-trigger" ).on( 'click', function() {
        
        if ( mobile_nav_open ) {
            
            $('ul#mobile-menu').stop().slideUp().find('li').stop().each( function( index ) {
                $(this).animate({
                    opacity: 0,
                });
            });
            
            $('ul#mobile-menu').removeClass('expanded');
            $('#mobile-menu-trigger .bar').toggleClass('animate');
            mobile_nav_open = false;
            
        } else {
            
            $('ul#mobile-menu').stop().slideDown().find('li').stop().each( function( index ) {
                $(this).stop().delay( index * 75 ).animate({
                    opacity: 1,
                });
            });

            $('ul#mobile-menu').addClass('expanded');
            $('#mobile-menu-trigger .bar').toggleClass('animate');
            mobile_nav_open = true;
            
        }
        
    });
    
    /* -------------------------------------------------------------------------
     * Header: Mobile Menu - Submenu Expansion / Contraction
     * ---------------------------------------------------------------------- */

    $( '#mobile-menu-wrap ul#mobile-menu > li.menu-item-has-children').prepend('<span style="font-family: Helvetica !important;">+</span>');
    $( "#mobile-menu-wrap ul#mobile-menu > li.menu-item-has-children > span" ).on( 'click', function() {
        
        $(this).stop().toggleClass('expanded').parent().find('ul.sub-menu').stop().slideToggle();
        
    });
   
    /* -------------------------------------------------------------------------
     * Header: Slim Split Social Drawer
     * ---------------------------------------------------------------------- */
    $('#split-social-trigger').on( 'click', function() {
        
        $(this).stop().toggleClass('expanded').parentsUntil('header#masthead').find('#split-social-slide-in').stop().toggleClass('slid-in');
        
    });
    
    /* -------------------------------------------------------------------------
     * Custom Header: Layered Parallax Section
     * ---------------------------------------------------------------------- */
    
    if ( $('div#buildr-custom-header.parallax_layers').length ) {
        
        $(window).resize( function(){
            $( '.jparallax-layer' ).parallax({
                // Global Options
                mouseport: $('body')
            },{
                // Image Layer
                xparallax: buildr_local.parallax_image_layer,
                yparallax: buildr_local.parallax_image_layer
            },
            {
                // Texture Layer Options
                xparallax: buildr_local.parallax_texture_layer,
                yparallax: buildr_local.parallax_texture_layer
            },{
                // Color Layer Options
                xparallax: buildr_local.parallax_color_layer,
                yparallax: buildr_local.parallax_color_layer,
                xorigin: 0,
                yorigin: 0,
            },{
                // Content Layer Options
                xparallax: buildr_local.parallax_content_layer,
                yparallax: buildr_local.parallax_content_layer
            });
        });

        $( '.jparallax-layer' ).parallax({
            // Global Options
            mouseport: $('body')
        },{
            // Image Layer
            xparallax: buildr_local.parallax_image_layer,
            yparallax: buildr_local.parallax_image_layer
        },
        {
            // Texture Layer Options
            xparallax: buildr_local.parallax_texture_layer,
            yparallax: buildr_local.parallax_texture_layer
        },{
            // Color Layer Options
            xparallax: buildr_local.parallax_color_layer,
            yparallax: buildr_local.parallax_color_layer,
            xorigin: 0,
            yorigin: 0,
        },{
            // Content Layer Options
            xparallax: buildr_local.parallax_content_layer,
            yparallax: buildr_local.parallax_content_layer
        }).parent().find('.jparallax-layer.content-layer').fadeIn();
        
    }
  
    /* -------------------------------------------------------------------------
     * Cart: Slide In Side-panel
     * ---------------------------------------------------------------------- */
  
    $('#cart-panel-trigger, #cart-panel-close, #dark-cart-overlayer').bigSlide({
        menu: '#cart-panel',
        menuWidth: '280px',
        side: 'right'
    });

    $('#cart-panel-trigger, #cart-panel-close, #dark-cart-overlayer').on( 'click touchstart', function(){
        $('#cart-panel-close, #dark-cart-overlayer').fadeToggle(300);
    });
        
    /*
     * SlimScroll Cart
     */
    $('#cart-panel .inner').slimScroll({
        height: 'auto',
        size: '4px',
        railVisible: true,
        railColor: '#e6e6e6',
        railOpacity: 1.0,
        color: '#333333',
        position: 'right'
    });
        
});