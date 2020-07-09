<?php

/**
 * Default values - key should be the same in the customizer field
 */

return array(

    'font-primary' =>  array(
        'font-family'    => 'Nunito',
        'variant'        => 'regular',
        'text-transform' => 'none',
        'letter-spacing' => '0',
        'text-align'     => 'left',
    ),

    'images_sizes' => array (

        'rocksite_thumbnail_square' => array(250, 250, true),
        'rocksite_large_square' => array(600, 600, true),
        'rocksite_medium_wide' => array(300, 200, true),
        'rocksite_large_wide' => array(820, 615, true),



    ),

    /**
     * Logo Settings
     */

    'logo_settings' => array(

        'height'      => 77,
        'width'       => 245,
        'flex-height' => true,
        'flex-width'  => true,
        'header-text' => array( 'site-title', 'site-description' )

    ),

    /**
     * Define menus areas
     */

    'menus' => array (

        'main_menu' => __('Main Menu', 'genui'),
        'footer_pages' => __('Footer Menu', 'genui'),
        'top_pages' => __('Top Menu', 'genui'),
        'social_menu' => __('Social Menu', 'genui')

    ),



   'social_icons' => array (

       'facebook' => 'lab la-facebook-f',
       'twitter' => 'lab la-twitter',
       'instagram' => 'lab la-instagram',
       'youtube' => 'lab la-youtube',
       'snapchat' => 'lab la-snapchat'

   ),

    'layout_variables' => array (

        'width' => '1200px',
        'gutter' => '40px',

    )


);