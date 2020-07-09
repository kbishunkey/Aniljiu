<?php
return array(

    // tests

    'font-primary' => array(
        'type'        => 'typography',
        'label' => __('Font Family', 'genui'),
        'section' => 'section_typography',
        'settings' => 'font-primary',
        'description' => __('Choose a default font for your site', 'genui'),
        'priority'    => 10,
        'output'      => [
            [
                'element' => 'body',
            ],
        ],

    ),

    // Blog settings

    'blog_sidebar' => array(
        'type' => 'radio-image',
        'settings' => 'blog_sidebar',
        'label' => __('Blog Layout Settings:', 'genui'),
        'section' => 'section_blog_layout',
        'description' => 'Note: this change has impact on archive pages and single post',
        'priority' => 1,
        'default' => '1',
        'choices' => array(
            '0' => ROCKSITE_THEME_ADMIN_ASSETS . 'images/1c.png',
            '1' => ROCKSITE_THEME_ADMIN_ASSETS . 'images/2cr.png',
            '2' => ROCKSITE_THEME_ADMIN_ASSETS . 'images/2cl.png',
        )
    ),

    // articles content
    'single_show_entry_tags' => array(
        'type' => 'toggle',
        'settings' => 'single_show_entry_tags',
        'label' => __('Display Entry Tags Below the Content', 'genui'),
        'section' => 'section_articles_content',
        'priority' => 1,
        'default' => 1,

    ),



    'article_meta' => array(
        'type' => 'multicheck',
        'settings' => 'article_meta',
        'label' => __('Article Meta Settings:', 'genui'),
        'section' => 'section_articles_content',
        'choices'     => array(
            'show_date' => esc_html__( 'Show Date', 'genui'),
            'show_update_date' => esc_html__( 'Show Update Date', 'genui'),
            'show_author' => esc_html__( 'Show Author', 'genui'),
            'show_comments_count' => esc_html__( 'Show Comments Count', 'genui'),
            'show_category_line' => esc_html__( 'Show Category Line', 'genui'),
        ),
    ),

    //Displays the navigation to next/previous post

    'show_related_posts' => array(
        'type' => 'toggle',
        'settings' => 'show_related_posts',
        'label' => __('Display related posts box', 'genui'),
        'section' => 'section_articles_content',
        'default' => true,
        'priority' => 1,
    ),

    //Displays the navigation to next/previous post

    'navigation_prev_next' => array(
        'type' => 'toggle',
        'settings' => 'navigation_prev_next',
        'label' => __('Display the navigation to next/previous post', 'genui'),
        'description'=> __('User can navigate to previous or next post below the article', 'genui'),
        'section' => 'section_articles_content',
        'default' => false,
        'priority' => 1,
    ),

    // Archives settings

    'archive_header_layout' => array(
        'type' => 'radio-image',
        'settings' => 'archive_header_layout',
        'label' => __('Archive Header Layout', 'genui'),
        'section' => 'section_archive_header',
        'priority' => 1,
        'default' => '1',
        'choices' => array(
            '0' => ROCKSITE_THEME_ADMIN_ASSETS . 'images/page-no-header.png',
            '1' => ROCKSITE_THEME_ADMIN_ASSETS . 'images/page-header.png',
        )
    ),

    'archive_show_category_name' => array(
        'type' => 'toggle',
        'settings' => 'archive_show_category_name',
        'label' => __('Display Category Name', 'genui'),
        'section' => 'section_archive_header',
        'priority' => 1,
        'default' => 1,

    ),

    'archive_category_prefix' => array(
        'type' => 'text',
        'settings' => 'archive_category_prefix',
        'label' => __('Text before category', 'genui'),
        'section' => 'section_archive_header',
        'priority' => 1,
        'default' => '',

    ),

    'archive_breadcrumbs_show' => array(
        'type' => 'toggle',
        'settings' => 'archive_breadcrumbs_show',
        'label' => __('Display breadcrumbs', 'genui'),
        'section' => 'section_archive_header',
        'priority' => 1,
        'default' => 1,

    ),

    'archive_breadcrumbs_color' => array(
        'type' => 'color',
        'settings' => 'archive_breadcrumbs_color',
        'label' => __('Breadcrumbs Color', 'genui'),
        'section' => 'section_archive_header',
        'priority' => 1,
        'transport' => 'auto',
        'output'      => array(
            'element' => '.archive .rocksite-m-breadcrumbs__item a, .archive .rocksite-m-breadcrumbs__item span',
            'property' => 'color'
        )
    ),

    'archive_breadcrumbs_color_hover' => array(
        'type' => 'color',
        'settings' => 'archive_breadcrumbs_color_hover',
        'label' => __('Breadcrumbs Hover Color', 'genui'),
        'section' => 'section_archive_header',
        'priority' => 1,
        'transport' => 'auto',
        'output'      => array(
            'element' => '.archive .rocksite-m-breadcrumbs__item a:hover',
            'property' => 'color'
        )
    ),





    'archive_header_background' => array(
        'type' => 'image',
        'settings' => 'archive_header_background',
        'label' => __('Archive Header Background Image', 'genui'),
        'description' => esc_html__( 'Default background image for all pages', 'genui'),
        'section' => 'section_archive_header',
        'transport' => 'auto',
        'priority' => 1,
        'choices'     => array(
            'save_as' => 'id',
        ),

    ),


    'archive_header_background_paralax' => array(
        'type' => 'toggle',
        'settings' => 'archive_header_background_paralax',
        'label' => __('Paralax Background', 'genui'),
        'description'=> __('Enabling this option will animate background image while Archive is scrolling', 'genui'),
        'section' => 'section_archive_header',
        'default' => false,
        'priority' => 1,
    ),


    'archive_header_background_overlay' => array(
        'type' => 'color',
        'settings' => 'archive_header_background_overlay',
        'label' => __('Background Overlay', 'genui'),
        'section' => 'section_archive_header',

        'priority' => 2,
        'choices'     => [
            'alpha' => true,
        ],
    ),

    'archive_header_invert_section' => array(
        'type' => 'toggle',
        'settings' => 'archive_header_invert_section',
        'label' => __('Invert section: white text and dark background', 'genui'),
        'section' => 'section_archive_header',
        'default' => false,
        'priority' => 1,
    ),

    'archive_header_text_alignment' => array(
        'type' => 'radio-buttonset',
        'settings' => 'archive_header_text_alignment',
        'label' => __('Text alignment', 'genui'),
        'description'=> __('Enabling this option will animate background image while Archive is scrolling', 'genui'),
        'section' => 'section_archive_header',
        'default' => 'left',
        'priority' => 1,
        'transport' => 'auto',
        'output'      => array(
            'element' => '.rocksite-o-content-header__title',
            'property' => 'text-align'
        ),
        'choices'     => array(
            'left'   => esc_html__( 'Left', 'genui'),
            'center' => esc_html__( 'Center', 'genui'),
            'right' => esc_html__( 'Right', 'genui'),
        ),
    ),


    'archive_header_title_color' => array(
        'type' => 'color',
        'settings' => 'archive_header_title_color',
        'label' => __('Category Name & Description Text Color', 'genui'),
        'section' => 'section_archive_header',
        'priority' => 4,
        'transport' => 'auto',
        'choices'     => array(
            'alpha' => true,
        ),
        'output'      => array(
            'element' => '.rocksite-o-content-header .rocksite-o-content-header__title',
            'property' => 'color'
        )
    ),



    // Posts list Section

    'archive_list_type' => array(
        'type' => 'select',
        'settings' => 'archive_list_type',
        'label' => __('Articles List Type', 'genui'),
        'section' => 'section_posts_list',
        'default' => 1,
        'priority' => 1,
        'transport' => 'auto',
        'choices'     => array(
            1   => esc_html__( 'One Column', 'genui'),
            2 => esc_html__( 'Two Columns', 'genui'),
            3 => esc_html__( 'Three Columns', 'genui'),
            4 => esc_html__( 'Four Columns', 'genui'),
        ),
    ),

    'archive_pagination_type' => array(
        'type' => 'radio-buttonset',
        'settings' => 'archive_pagination_type',
        'label' => __('Archives Pagination Type', 'genui'),
        'section' => 'section_posts_list',
        'default' => 'prev-next',
        'priority' => 1,
        'transport' => 'auto',
        'choices'     => array(
            'prev-next'   => esc_html__( 'Older and Newer pagination links', 'genui'),
            'numeric' => esc_html__( 'Numeric Pagination', 'genui'),
        ),
    ),


    // Articles header

    'single_header_layout' => array(
        'type' => 'radio-image',
        'settings' => 'single_header_layout',
        'label' => __('Archive Header Layout', 'genui'),
        'section' => 'section_articles_header',
        'priority' => 1,
        'default' => '1',
        'choices' => array(
            '0' => ROCKSITE_THEME_ADMIN_ASSETS . 'images/page-no-header.png',
            '1' => ROCKSITE_THEME_ADMIN_ASSETS . 'images/page-header.png',
        )
    ),

    'single_breadcrumbs_show' => array(
        'type' => 'toggle',
        'settings' => 'single_breadcrumbs_show',
        'label' => __('Display breadcrumbs', 'genui'),
        'section' => 'section_articles_header',
        'priority' => 1,
        'default' => true,

    ),

    'single_breadcrumbs_color' => array(
        'type' => 'color',
        'settings' => 'single_breadcrumbs_color',
        'label' => __('Breadcrumbs Color', 'genui'),
        'section' => 'section_articles_header',
        'priority' => 1,
        'transport' => 'auto',
        'output'      => array(
            'element' => '.single .rocksite-m-breadcrumbs__item, .single .rocksite-m-breadcrumbs__item a, .single .rocksite-m-breadcrumbs__item span',
            'property' => 'color'
        )
    ),

    'single_breadcrumbs_color_hover' => array(
        'type' => 'color',
        'settings' => 'single_breadcrumbs_color_hover',
        'label' => __('Breadcrumbs Hover Color', 'genui'),
        'section' => 'section_articles_header',
        'priority' => 1,
        'transport' => 'auto',
        'output'      => array(
            'element' => '.single .rocksite-m-breadcrumbs__item a:hover',
            'property' => 'color'
        )
    ),

    'single_header_text_alignment' => array(
        'type' => 'radio-buttonset',
        'settings' => 'single_header_text_alignment',
        'label' => __('Text alignment', 'genui'),
        'description'=> __('Enabling this option will animate background image while Archive is scrolling', 'genui'),
        'section' => 'section_articles_header',
        'default' => 'left',
        'priority' => 1,
        'transport' => 'auto',
        'output'      => array(

            array(
                'element' => '.rocksite-o-content-header__title',
                'property' =>'text-align'
            ),

            array(
                'element' => '.rocksite-o-content-header .rocksite-o-content__meta',
                'property' => 'justify-content'

            )

        ),
        'choices'     => array(
            'left'   => esc_html__( 'Left', 'genui'),
            'center' => esc_html__( 'Center', 'genui'),
            'right' => esc_html__( 'Right', 'genui'),
        ),
    ),

    'single_header_title_color' => array(
        'type' => 'color',
        'settings' => 'single_header_title_color',
        'label' => __('Title Text Color in the large header', 'genui'),
        'section' => 'section_articles_header',
        'priority' => 4,
        'transport' => 'auto',
        'output'      => array(
            'element' => '.single .rocksite-o-content-header .rocksite-o-content-header__title',
            'property' => 'color'
        )
    ),

    'single_header_meta_color' => array(
        'type' => 'color',
        'settings' => 'single_header_meta_color',
        'label' => __('Meta Color in the large header', 'genui'),
        'section' => 'section_articles_header',
        'priority' => 4,
        'transport' => 'auto',
        'output'      => array(
            'element' => '.single .rocksite-o-content-header .rocksite-o-content__meta span, .single .rocksite-o-content-header .rocksite-o-content__meta a, .single .rocksite-o-content-header .rocksite-o-content__meta i',
            'property' => 'color'
        )
    ),



    // pages settings

    'page_header_layout' => array(
        'type' => 'radio-image',
        'settings' => 'page_header_layout',
        'label' => __('Page Header Layout', 'genui'),
        'section' => 'section_page_header',
        'priority' => 1,
        'default' => 1,
        'choices' => array(
            0 => ROCKSITE_THEME_ADMIN_ASSETS . 'images/page-no-header.png',
            1 => ROCKSITE_THEME_ADMIN_ASSETS . 'images/page-header.png',
        )
    ),

    'page_header_background' => array(
        'type' => 'image',
        'settings' => 'page_header_background',
        'label' => __('Page Header Background Image', 'genui'),
        'description' => esc_html__( 'Default background image for all pages', 'genui'),
        'section' => 'section_page_header',
        'priority' => 1,
        'choices'     => array(
            'save_as' => 'id',
        ),

    ),


    'page_header_background_paralax' => array(
        'type' => 'toggle',
        'settings' => 'page_header_background_paralax',
        'label' => __('Paralax Background', 'genui'),
        'description'=> __('Enabling this option will animate background image while page is scrolling', 'genui'),
        'section' => 'section_page_header',
        'default' => false,
        'priority' => 1,
    ),


    'page_header_background_overlay' => array(
        'type' => 'color',
        'settings' => 'page_header_background_overlay',
        'label' => __('Background Overlay', 'genui'),
        'section' => 'section_page_header',
        'default' => '#0088CC',
        'priority' => 2,
        'choices'     => [
            'alpha' => true,
        ],
    ),

    'page_header_invert_section' => array(
        'type' => 'toggle',
        'settings' => 'page_header_invert_section',
        'label' => __('Invert section: white text and dark background', 'genui'),
        'section' => 'section_page_header',
        'default' => false,
        'priority' => 1,
    ),


    'page_header_title_color' => array(
        'type' => 'color',
        'settings' => 'page_header_title_color',
        'label' => __('Title & Subtitle Text Color', 'genui'),
        'section' => 'section_page_header',

        'priority' => 4,
        'choices'     => [
            'alpha' => true,
        ],
    ),

    // navigation

    'breadcrumbs_show' => array(
        'type' => 'toggle',
        'settings' => 'breadcrumbs_show',
        'label' => __('Enabling this option will display breadcrumbs block', 'genui'),
        'section' => 'section_breadcrumbs',
        'transport' => 'auto',
        'default' => true,
        'priority' => 1,
    ),

    'breadcrumbs_homepage_name' => array(
        'type' => 'text',
        'settings' => 'breadcrumbs_homepage_name',
        'section' => 'section_breadcrumbs',
        'default' => __('Home', 'genui'),

        'priority' => 1,
        /*
        'active_callback' => [
            [
                'setting'  => 'breadcrumbs_show',
                'operator' => '==',
                'value'    => true,
            ],

        ]
        */

    ),

    // Top Bar

    'topbar_display' => array(
        'type' => 'toggle',
        'settings' => 'topbar_display',
        'label'    => esc_html__( 'Display Top Bar', 'genui'),
        'section' => 'section_topbar',
        'default' => true,
        'priority' => 1,
    ),

    'topbar_social_menu' => array(
        'type' => 'toggle',
        'settings' => 'topbar_social_menu',
        'label'    => esc_html__( 'Display Social Menu', 'genui'),
        'section' => 'section_topbar',
        'default' => true,
        'priority' => 2,
    ),


    'topbar_info' => array(
        'type' => 'textarea',
        'settings' => 'topbar_info',
        'label'    => esc_html__( 'Top Bar Info', 'genui'),
        'section' => 'section_topbar',
        'default' => '',
        'priority' => 3,
    ),

    // Main Navbar



    'navbar_background' => array(
        'type' => 'color',
        'settings' => 'navbar_background',
        'label' => __('Navbar Background', 'genui'),
        'section' => 'section_main_navbar',
        'priority' => 2,
        'transport'   => 'auto',
        'output'      => array(
            'element' => '.rocksite-s-main-header, .rocksite-o-navbar-main .rocksite-o-navbar-main__main-menu',
            'property' => 'background-color'
        )

    ),

    'navbar_fixed' => array(
        'type' => 'toggle',
        'settings' => 'navbar_fixed',
        'label'    => esc_html__( 'Fixed navbar', 'genui'),
        'section' => 'section_main_navbar',
        'default' => true,
        'priority' => 2,
    ),



    // Main Menu

    'main_menu_search_display' => array(
        'type' => 'toggle',
        'settings' => 'main_menu_search_display',
        'label'    => esc_html__( 'Display Search Button In Navbar', 'genui'),
        'section' => 'section_main_menu',
        'default' => true,
        'priority' => 1,
    ),

    'main_menu_typography' => array(
        'type' => 'typography',
        'settings' => 'main_menu_typography',
        'label'    => esc_html__( 'Main Menu Typography', 'genui'),
        'section' => 'section_main_menu',
        'default'     => [
            'font-family'    => 'Roboto',
            'variant'        => '600',
            'font-size'      => '14px',
            'letter-spacing' => '0',
            'text-transform' => 'uppercase',
        ],
        'priority' => 2,
        'transport'   => 'auto',
        'output'      => [
            [
                'element' => '.rocksite-o-navbar-main .rocksite-o-navbar-main__main-menu > .rocksite-o-navbar-main__main-menu__item > .rocksite-o-navbar-main__main-menu__link',
            ],
        ],
    ),

    'main_menu_link_color' => array(
        'type' => 'color',
        'settings' => 'main_menu_link_color',
        'label' => __('Link Color', 'genui'),
        'section' => 'section_main_menu',
        'priority' => 2,
        'transport'   => 'auto',
        'output'      => array(
            'element' => '.rocksite-o-navbar-main .rocksite-o-navbar-main__main-menu > .rocksite-o-navbar-main__main-menu__item > a.rocksite-o-navbar-main__main-menu__link',
            'property' => 'color'
        )

    ),

    'main_menu_link_color_hover' => array(
        'type' => 'color',
        'settings' => 'main_menu_link_color_hover',
        'label' => __('Link Color on Hover', 'genui'),
        'section' => 'section_main_menu',
        'priority' => 2,
        'transport'   => 'auto',
        'output'      => array(
            'element' => '.rocksite-o-navbar-main .rocksite-o-navbar-main__main-menu > .rocksite-o-navbar-main__main-menu__item > a.rocksite-o-navbar-main__main-menu__link:hover',
            'property' => 'color'
        )

    ),

    'main_menu_decoration_color' => array(
        'type' => 'color',
        'settings' => 'main_menu_decoration_color',
        'label' => __('Link Decoration Color', 'genui'),
        'section' => 'section_main_menu',
        'priority' => 2,
        'transport'   => 'auto',
        'output'      => array(
            'element' => '.rocksite-o-navbar-main .rocksite-o-navbar-main__main-menu > .rocksite-o-navbar-main__main-menu__item:not(.-icon-item) > a:before',
            'property' => 'background-color'
        )

    ),

    'main_menu_submenu_background' => array(
        'type' => 'color',
        'settings' => 'main_menu_submenu_background',
        'label' => __('Submenu background color', 'genui'),
        'section' => 'section_main_menu',
        'priority' => 2,
        'output'      => array(
            'element' => '.rocksite-o-navbar-main .rocksite-o-navbar-main__main-menu .rocksite-o-navbar-main__main-menu__item .rocksite-o-navbar-main__main-menu__sub-nav .rocksite-o-navbar-main__main-menu__sub-nav__item .rocksite-o-navbar-main__main-menu__sub-nav__link:before',
            'property' => 'background-color'
        )

    ),

    'main_menu_submenu_color' => array(
        'type' => 'color',
        'settings' => 'main_menu_submenu_color',
        'label' => __('Submenu text color', 'genui'),
        'section' => 'section_main_menu',
        'priority' => 2,
        'output'      => array(
            'element' => '.rocksite-o-navbar-main .rocksite-o-navbar-main__main-menu .rocksite-o-navbar-main__main-menu__item .rocksite-o-navbar-main__main-menu__sub-nav .rocksite-o-navbar-main__main-menu__sub-nav__item .rocksite-o-navbar-main__main-menu__sub-nav__link',
            'property' => 'color'
        )

    ),

    'main_menu_submenu_color_hover' => array(
        'type' => 'color',
        'settings' => 'main_menu_submenu_color_hover',
        'label' => __('Submenu text color: hover', 'genui'),
        'section' => 'section_main_menu',
        'priority' => 2,
        'output'      => array(
            'element' => '.rocksite-o-navbar-main .rocksite-o-navbar-main__main-menu .rocksite-o-navbar-main__main-menu__item .rocksite-o-navbar-main__main-menu__sub-nav .rocksite-o-navbar-main__main-menu__sub-nav__item .rocksite-o-navbar-main__main-menu__sub-nav__link:hover',
            'property' => 'color'
        )

    ),

    'main_menu_submenu_background_hover' => array(
        'type' => 'color',
        'settings' => 'main_menu_submenu_background_hover',
        'label' => __('Submenu link hover background', 'genui'),
        'section' => 'section_main_menu',
        'priority' => 2,
        'output'      => array(
            'element' => '.rocksite-o-navbar-main .rocksite-o-navbar-main__main-menu .rocksite-o-navbar-main__main-menu__item .rocksite-o-navbar-main__main-menu__sub-nav .rocksite-o-navbar-main__main-menu__sub-nav__item .rocksite-o-navbar-main__main-menu__sub-nav__link:hover:after',
            'property' => 'background-color'
        )

    ),




    // Brand logo

    'brand_logo' => array(
        'type' => 'image',
        'settings' => 'brand_logo',
        'label' => __('Brand Logo', 'genui'),
        'section' => 'title_tagline',
        'priority' => 1,
        'default' => false,

    ),

    // Footer


    'footer_sidebar_background' => array(
        'type' => 'color',
        'settings' => 'footer_sidebar_background',
        'label' => __('Footer Sidebar Background', 'genui'),
        'section' => 'section_footer',
        'transport' => 'auto',
        'priority' => 2,
        'output'      => array(
            'element' => '.rocksite-s-footer__top',
            'property' => 'background-color'
            ),
    ),


    'footer_sidebar_header_color' => array(
        'type' => 'color',
        'settings' => 'footer_sidebar_header_color',
        'label' => __('Footer Sidebar Header Color', 'genui'),
        'section' => 'section_footer',
        'transport' => 'auto',
        'priority' => 2,
        'output'      => array(
            'element' => '.rocksite-s-footer__top .rocksite-o-widget__header .rocksite-o-widget__header__title',
            'property' => 'color'
        ),
    ),

    'footer_sidebar_link_color' => array(
        'type' => 'color',
        'settings' => 'footer_sidebar_link_color',
        'label' => __('Footer Sidebar Link Color', 'genui'),
        'section' => 'section_footer',
        'transport' => 'auto',
        'priority' => 2,
        'output'      => array(
            'element' => '.rocksite-s-footer__top .rocksite-o-widget a',
            'property' => 'color'
        ),
    ),

    'footer_sidebar_link_color_hover' => array(
        'type' => 'color',
        'settings' => 'footer_sidebar_link_color_hover',
        'label' => __('Footer Sidebar Link Color Hover', 'genui'),
        'section' => 'section_footer',
        'transport' => 'auto',
        'priority' => 2,
        'output'      => array(
            'element' => '.rocksite-s-footer__top .rocksite-o-widget a:hover',
            'property' => 'color'
        ),
    ),

    'footer_sidebar_text_color' => array(
        'type' => 'color',
        'settings' => 'footer_sidebar_text_color',
        'label' => __('Footer Sidebar Text Color', 'genui'),
        'section' => 'section_footer',
        'transport' => 'auto',
        'priority' => 2,
        'output'      => array(
            'element' => '.rocksite-s-footer__top .rocksite-o-widget p, .rocksite-s-footer__top .rocksite-o-widget ul, .rocksite-s-footer__top .rocksite-o-widget div',
            'property' => 'color'
        ),
    )








);

