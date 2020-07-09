<?php

if (class_exists( 'WooCommerce' )) {



    function genui_theme_woocommerce_widgets_init() {
        register_sidebar( array(
            'name'          => __( 'Woocommerce Sidebar', 'genui' ),
            'id'            => 'woocommerce_sidebar',
            'description'   => __( 'Widgets in this area will be shown on Woocommerce pages.', 'genui' ),
            'before_widget' => '<li><div id="%1$s" class="rocksite-o-widget rocksite-o-widget -%2$s">',
            'after_widget' => '</div></li>',
            'before_title' => '<header class="rocksite-o-widget__header"><h3 class="rocksite-o-widget__header__title">',
            'after_title' => '</h3></header>',
        ) );
    }
    add_action( 'widgets_init', 'genui_theme_woocommerce_widgets_init' );

    // add cart menu item

    add_filter( 'genui_add_menu_item', function() {

        return Rocksite_Component_Nav::cart_menu_item();

    });


    if( !function_exists('genui_single_product_customize') ){

        function genui_single_product_customize(){

            if (is_product() || is_product_category() || is_shop()) {

                add_filter( 'rcoksite_header_page_type', function() {
                    return '0';
                } );

                add_filter( 'rocksite_meta_info', function(){

                    return array();

                });

                add_filter( 'comments_open', function() {
                    return false;
                });

                add_filter( 'rocksite_get_sidebar_type', function() {

                    return 'woocommerce';

                });

            }

        }


    }



    add_action( 'template_redirect', 'genui_single_product_customize', 5 );

}





