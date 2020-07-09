<?php

/**
 * displays page header based on customizer settings
 */
function rocksite_action_content_header($type='page') {

    do_action('rocksite_action_content_header', $type);
}

/**
 * Displays sidebar based on customizer settings
 */

function rocksite_action_get_sidebar($type='main') {
    do_action('rocksite_get_sidebar', $type);
}

function rocksite_filter_layout_class($default, $type='main') {
    echo apply_filters('rocksite_layout_class', $default, $type);
}

function rocksite_breadcrumbs($modifier='') {
    do_action('rocksite_action_breadcrumbs', $modifier);
}

function rocksite_action_title_header () {

    do_action('rocksite_title_header');

}

function rocksite_content_header_styles ($default = '', $type='page') {

    echo apply_filters('rocksite_filter_content_header_styles', $default, $type);

}

function rocksite_content_header_class ($default = '', $type='page') {

    echo apply_filters('rocksite_filter_content_header_class', $default, $type);

}

function rocksite_header_lead_class ($default = '') {

    echo apply_filters('rocksite_filter_header_lead_class', $default);

}



function rocksite_action_featured_image($type='page') {



    do_action('rocksite_featured_image', $type);

}

function rocksite_action_featured_video($type='page') {

    do_action('rocksite_featured_video', $type);

}



function rocksite_action_page_title ($type='') {

    do_action('rocksite_action_page_title', $type);

}

function rocksite_action_get_menu ($menu_location, $container_classes, $walker_class = 'rocksite-m-nav-menu', $depth=1) {

    do_action('rocksite_action_get_menu', $menu_location, $container_classes, $walker_class, $depth );

}

function rocksite_get_settings_text( $default, $settings_key ) {

    echo apply_filters('rocksite_filter_get_settings_text', $default, $settings_key );
}

function rocksite_action_footer_section_sidebar() {
    do_action('rocksite_action_footer_section_sidebar');
}

/**
 * Display meta post based on cotext
 * @param string $context
 */


function rocksite_action_meta_post($context='list', $echo=false, $html =false) {



    do_action('rocksite_action_meta_post', $context, $echo, $html);

}

/**
 * Displays post category
 * @param $container_class
 */

function  rocksite_category_post($container_class) {

    do_action('rocksite_category_post', $container_class);

}

function rocksite_action_article_header($type='page') {

    do_action('rocksite_action_article_header', $type);

}

function rocksite_search_navbar() {

    do_action('rocksite_search_navbar');

}

/**
 * Displays language selector based on language plugin detection

 */

function rocksite_action_language_selector() {

    do_action('rocksite_action_language_selector');

}

/**
 * Load template part based on customizer option
 * @param $partial_name
 * @param $option_name
 */

function rocksite_get_template_part( $partial_name, $option_name ) {

    do_action('rocksite_action_get_template_part', $partial_name, $option_name);

}

/**
 * Load template area
 * @param $directory
 * @param $area_name
 */

function rocksite_get_template_area( $directory, $area_name ) {

    do_action('rocksite_action_get_template_area', $directory, $area_name);

}



function rocksite_logo( $logo_path = '') {

    echo apply_filters('rocksite_filter_logo', $logo_path);

}

/**
 * Displays archives pagination
 */

function rocksite_action_archives_pagination() {

    do_action('rocksite_action_archives_pagination');

}

/**
 * Displays related posts
 * @param int $display_post_limit
 */

function rocksite_action_related_posts($display_post_limit = 6) {

    do_action('rocksite_action_related_posts', $display_post_limit);

}

/**
 * Displays single author info below the content
 */

function rocksite_author_box() {

    do_action('rocksite_action_author_box');

}

/**
 * Displays entry tags below the content
 */

function rocksite_entry_tags() {

    do_action('rocksite_entry_tags');

}


/**
 * Displays the navigation to next/previous post, when applicable.
 */

function rocksite_the_post_navigation() {

    do_action('rocksite_the_post_navigation');

}

/***
 * Portfolio functions need roocksite-kit plugin
 */

/**
 * Portfolio slider component
 */

function rocksite_portfolio_gallery() {

    do_action('rocksite_action_portfolio_gallery');

}

/**
 * Portfolio technologies
 */

function rocksite_portfolio_technologies() {

    do_action('rocksite_action_portfolio_technologies');
}

/**
 * Portfolio details
 */

function rocksite_portfolio_details() {

    do_action('rocksite_action_portfolio_details');

}

/**
 * Displays related portfolio works
 */

function rocksite_related_portfolio($display_post_limit = 8, $columns_per_slide = 5) {

    do_action('rocksite_action_related_portfolio', $display_post_limit, $columns_per_slide);

}

function rocksite_main_navbar_features($classes=''){

    echo apply_filters('rocksite_main_navbar_features', $classes);

}

/**
 * Displays Main Header
 */

function rocksite_action_header_page() {

    do_action('rocksite_action_header_page');

}

/**
 * Displays toggle and search menu
 */

function rocksite_action_toggle_search_menu() {

    do_action('rocksite_action_toggle_search_menu');

}

/**
 * return sidebar clases
 * @param $default
 */

function rocksite_filter_class_sidebar($default='') {

    echo apply_filters('rocksite_filter_class_sidebar', $default);

}







