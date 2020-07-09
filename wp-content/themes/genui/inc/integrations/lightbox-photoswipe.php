<?php

if (class_exists( 'LightboxPhotoSwipe' )) {


    /**
     * Remove default CSS
     */

    add_action( 'wp_enqueue_scripts', 'remove_lightbox_photoswipe_stylesheet', 20 );

    function remove_lightbox_photoswipe_stylesheet() {

        wp_deregister_style( 'lbwps-lib' );
        wp_deregister_style( 'photoswipe-skin' );


    }

    /**
     * Remove lightbox when block gallery doesn't exist
     */

    add_action( 'wp_enqueue_scripts', 'blockgallery_frontend_scripts' );

    function blockgallery_frontend_scripts() {

	if ( !has_block( 'gallery' ) ) {


        wp_dequeue_script( 'lbwps-lib' );



    }
}



}



