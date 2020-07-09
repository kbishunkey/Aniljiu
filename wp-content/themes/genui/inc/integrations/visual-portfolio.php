<?php

if (class_exists( 'Visual_Portfolio' )) {



    add_action( 'wp_enqueue_scripts', 'remove_portfolio_stylesheet', 20 );

    function remove_portfolio_stylesheet() {

        wp_deregister_style( 'photoswipe' );
        wp_deregister_style( 'photoswipe-default-skin' );




    }

}

if (class_exists( 'LightboxPhotoSwipe' )) {

    add_action( 'wp_enqueue_scripts', 'remove_portfolio_script', 20 );

    function remove_portfolio_script() {

        wp_dequeue_script( 'photoswipe' );
        wp_dequeue_script( 'photoswipe-ui-default' );

    }


}





