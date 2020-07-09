<?php

if (function_exists('shared_counts')) {


    add_action( 'wp_enqueue_scripts', 'deregister_plugin_styles', 10 );


    function deregister_plugin_styles() {

        $options = shared_counts()->admin->options();

        if (isset($options['style']) && $options['style']=='classic'){

            wp_deregister_style( 'shared-counts' );


        }



    }

}





