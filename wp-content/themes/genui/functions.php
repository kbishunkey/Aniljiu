<?php

/**
 * Define Constants
 */

if (!defined('ROCKSITE_THEME_DIR')) {
    define('ROCKSITE_THEME_DIR', trailingslashit(get_template_directory()));
}

if (!defined('ROCKSITE_THEME_URI')) {
    define('ROCKSITE_THEME_URI', trailingslashit(esc_url(get_template_directory_uri())));
}

if (!defined('ROCKSITE_THEME_SETTINGS')) {
    define('ROCKSITE_THEME_SETTINGS', 'rocksite-settings');
}

if (!defined('ROCKSITE_THEME_LIB')) {
    define('ROCKSITE_THEME_LIB', ROCKSITE_THEME_DIR . 'inc/');
}

if (!defined('ROCKSITE_THEME_CONFIG')) {
    define('ROCKSITE_THEME_CONFIG', ROCKSITE_THEME_DIR . 'config/');
}

if (!defined('ROCKSITE_THEME_CLASSES')) {
    define('ROCKSITE_THEME_CLASSES', ROCKSITE_THEME_LIB . 'classes/');
}

if (!defined('ROCKSITE_THEME_FUNCTIONS')) {
    define('ROCKSITE_THEME_FUNCTIONS', ROCKSITE_THEME_LIB . 'functions/');
}

if (!defined('ROCKSITE_THEME_INTEGRATIONS')) {
    define('ROCKSITE_THEME_INTEGRATIONS', ROCKSITE_THEME_LIB . 'integrations/');
}

if (!defined('ROCKSITE_THEME_VENDOR')) {
    define('ROCKSITE_THEME_VENDOR', ROCKSITE_THEME_LIB . 'vendor/');
}

if (!defined('ROCKSITE_THEME_ASSETS')) {
    define('ROCKSITE_THEME_ASSETS', ROCKSITE_THEME_URI . 'assets/');
}

if (!defined('ROCKSITE_THEME_ADMIN_ASSETS')) {
    define('ROCKSITE_THEME_ADMIN_ASSETS', ROCKSITE_THEME_URI . 'admin/assets/');
}

if (!defined('ROCKSITE_THEME_EXTEND')) {
    define('ROCKSITE_THEME_EXTEND', ROCKSITE_THEME_LIB . 'extend/');
}


/**
 * Load library files
 */

require_once ROCKSITE_THEME_LIB . 'loader.php';


Rocksite::get_instance();


if (!function_exists('rocksite_theme_setup')) {

    /**
     * Theme Setup Function
     */

    function rocksite_theme_setup() {



        //Execute theme setup method
        Rocksite::setup();


    }

    add_action('after_setup_theme', 'rocksite_theme_setup');

    // Enqueue editor styles.


    // TO DO: remove to proper class
    add_filter( 'use_default_gallery_style', '__return_false' );

}
