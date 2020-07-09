<?php
return array(

    // Panel: Genearl Settings

    'section_logo' => array(
        'title' => __('Logo & favicon', 'genui'),
        'panel' => 'panel_general_settings',
        'priority' => 20,
    ),

    'section_typography' => array(
        'title' => __('Page Typography', 'genui'),
        'panel' => 'panel_general_settings',
        'priority' => 30,
    ),

    // Blog settings

    'section_blog_layout' => array(
        'title' => __('Blog layout', 'genui'),
        'priority' => 31,
        'panel' => 'panel_blog_settings',
    ),

    'section_archive_header' => array(
        'title' => __('Archives header', 'genui'),
        'priority' => 31,
        'panel' => 'panel_blog_settings',
    ),
    'section_posts_list' => array(
        'title' => __('Posts list', 'genui'),
        'priority' => 31,
        'panel' => 'panel_blog_settings',
    ),

    'section_articles_header' => array(
        'title' => __('Articles Header', 'genui'),
        'priority' => 31,
        'panel' => 'panel_blog_settings',
    ),

    'section_articles_content' => array(
        'title' => __('Articles Content', 'genui'),
        'priority' => 31,
        'panel' => 'panel_blog_settings',
    ),

    // Pages settings

    'section_page_header' => array(
        'title' => __('Page Header', 'genui'),
        'priority' => 31,
        'panel' => 'panel_pages_settings',
    ),



    // Navigation Settings

    'section_breadcrumbs' => array(
        'title' => __('Breadcrumbs', 'genui'),
        'priority' => 31,
        'panel' => 'panel_navigation_settings',
    ),

    // Top Bar

    'section_topbar' => array(
        'title' => __('Top Bar', 'genui'),
        'priority' => 31,
        'panel' => 'panel_layout_sections'
    ),

    // Main Navigation Bar

    'section_main_navbar' => array(
        'title' => __('Main Navigation Bar', 'genui'),
        'priority' => 31,
        'panel' => 'panel_layout_sections'
    ),

    // Main Menu

    'section_main_menu' => array(
        'title' => __('Main Menu', 'genui'),
        'priority' => 31,
        'panel' => 'panel_layout_sections'
    ),

    // Footer

    'section_footer' => array(
        'title' => __('Footer', 'genui'),
        'priority' => 31,
        'panel' => 'panel_layout_sections'
    ),

    'section_smartlib_custom_code' => array(
        'title' => __('Custom Code', 'genui'),
        'priority' => 80,
        'panel' => 'smartlib_panel_general_settings',
    ),

    'smartlib_layout' => array(
        'title' => __('Layout', 'genui'),
        'priority' => 40,
        'panel'          => 'smartlib_panel_general_settings',
    ),

    'smartlib_pages_settings' => array(
        'title' => __('Pages Settings', 'genui'),
        'priority' => 80,
        'panel'          => 'smartlib_panel_general_settings',
    ),

    'smartlib_blog_settings' => array(
        'title' => __('Blog Settings', 'genui'),
        'priority' => 80,
        'panel'          => 'smartlib_panel_general_settings',
    )
);