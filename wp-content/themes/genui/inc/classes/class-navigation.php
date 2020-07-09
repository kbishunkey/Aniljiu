<?php

if (!class_exists('Rocksite_Navigation')) {

    /**
     * Navigation Hooks Class
     */
    class Rocksite_Navigation extends Rocksite_Base {


        public function __construct( $config, $settings ) {

            parent::__construct($config, $settings);


            $this->hooks();

            $this->run_adds();

        }

        public function hooks() {

            // WordPress & plugins hooks

            $this->add_filter('widget_nav_menu_args', $this, 'global_custom_walker');



            // Theme hooks

            $this->add_action('rocksite_action_get_menu', $this, 'action_get_menu', 1, 4);
            $this->add_action('rocksite_action_language_selector', $this, 'action_get_language_selector');
            $this->add_filter('rocksite_filter_social_menu_icons', $this, 'filter_social_menu_icons');
            $this->add_action('rocksite_action_breadcrumbs', $this, 'action_breadcrumbs', 1, 1);
            $this->add_action('rocksite_action_archives_pagination', $this, 'action_archives_pagination');
            $this->add_action('rocksite_the_post_navigation', $this, 'action_the_post_navigation');
            $this->add_filter('rocksite_main_navbar_features', $this, 'filter_main_navbar_features');

            $this->add_action('rocksite_action_toggle_search_menu', $this, 'action_toggle_search_menu', 1, 4);



        }

        /**
         * Ads menu walker on widget menu
         *
         * @param $args
         *
         * @return array
         */

        public function global_custom_walker( $args ) {

            return array_merge($args, array( 'walker' => new BEMWalkerNavMenu(), // another setting go here ...
            ));

        }



        /**
         * Returns main navbar features
         * @param string $classes
         *
         * @return string
         */

        function filter_main_navbar_features($classes = '') {

            $navbar_fixed = esc_attr( Rocksite_Settings::get('navbar_fixed', true) );

            if ($navbar_fixed) {
                $classes .= ' js-fixed-navbar';
            }

            return $classes;

        }

        /**
         * Displays Menu modified by walker
         *
         * @param $menu_location
         * @param $container_classes
         */

        public function action_get_menu( $menu_location, $container_classes, $walker_class = 'rocksite-m-nav-menu', $depth = 1 ) {




            if (has_nav_menu($menu_location)) {



                if ($menu_location == 'social_menu') {

                    $topbar_social_menu = esc_attr( Rocksite_Settings::get('topbar_social_menu', true));

                    if ( $topbar_social_menu ) {

                        wp_nav_menu(array( 'theme_location' => $menu_location, 'menu_class' => $container_classes, 'container' => '', 'depth' => $depth, 'walker' => new WO_Nav_Social_Walker() ));

                    }


                } else {

                    wp_nav_menu(array( 'theme_location' => $menu_location, 'menu_class' => $container_classes, 'container' => '', 'depth' => $depth, 'walker' => new BEMWalkerNavMenu($walker_class) ));


                }


            }


        }



        /**
         * Displays language selector based on language plugin detection
         */

        public function action_get_language_selector() {

            if (class_exists('SitePress')) {

                Rocksite_Component_Nav::wpml_selector();

            } elseif (function_exists('pll_the_languages')) {

                Rocksite_Component_Nav::polylang_selector();

            }

        }

        /**
         * Returns social icons
         *
         * @param $default
         *
         * @return mixed
         */

        public function filter_social_menu_icons( $default ) {

            $social_icons = $this->config->get_social_icons();

            if (is_array($social_icons)) {

                return $social_icons;

            } else {

                return $default;

            }

        }

        /**
         * Construct and display search and mobile menu
         */

        public function action_toggle_search_menu() {

            $menu_items = apply_filters('genui_add_menu_item', '');
            $main_menu_search_display = esc_attr( Rocksite_Settings::get('main_menu_search_display', true) );



            $menu_items .= Rocksite_Component_Nav::hamburger_menu_item();

            if ($main_menu_search_display) {

                $menu_items .=  Rocksite_Component_Nav::search_menu_item();

            }


            Rocksite_Component_Nav::toggle_search_menu( $menu_items );

        }

        /**
         * Displays breadcrumbs based on settings
         */

        public function action_breadcrumbs($modifier='') {

            $type = Rocksite_Helper::get_content_type();




            $home = esc_attr( Rocksite_Settings::get('breadcrumbs_homepage_name', __('Home', 'genui')));
            $separator = esc_attr(Rocksite_Settings::get('breadcrumbs_separator', ' / '));
            $display = esc_attr(Rocksite_Settings::get($type . 'breadcrumbs_show', true));

            Rocksite_Component_Nav::breadcrumbs($display, $home, $separator, $modifier);

        }

        public function action_archives_pagination() {

            global $wp_query;


            $query_args = array_merge( $wp_query->query, $wp_query->query_vars );


            if ( ! array_key_exists( 'max_num_pages', $query_args ) ) {
                $query_args['max_num_pages'] = $wp_query->max_num_pages;
            }


            if ( ! array_key_exists( 'post_status', $query_args ) ) {
                $query_args['post_status'] = 'publish';
            }


            if ( ! array_key_exists( 'paged', $query_args ) || 0 == $query_args['paged'] ) {


                $query_args['paged'] = 1;

            }

            // if is numeric pagination



                $big = 999999999; // This needs to be an unlikely integer
                $current = max(1, get_query_var('paged'));
                // For more options and info view the docs for paginate_links()
                // http://codex.wordpress.org/public function_Reference/paginate_links
                $paginate_links = paginate_links(array( 'base' => str_replace($big, '%#%', get_pagenum_link($big)), 'current' => $current, 'total' => $wp_query->max_num_pages, 'mid_size' => 5, 'type' => 'array' ));


                if (is_array($paginate_links) && count($paginate_links) > 0) {

                    Rocksite_Component_Nav::pager_navigation($paginate_links);

                }

                // if is prev next pagination




        }

        /**
         * Displays the navigation to next/previous post, when applicable.
         */

        public function action_the_post_navigation() {

            $navigation_prev_next = esc_attr( Rocksite_Settings::get('navigation_prev_next', true) );

            if ($navigation_prev_next) {

                if (is_singular('attachment')) {

                    // Parent post navigation.
                    $options = array( /* translators: %s: parent post link */
                        'prev_text' => sprintf(__('<span class="meta-nav">Published in</span><span class="post-title">%s</span>', 'genui'), '%title'), );


                    the_post_navigation($options);

                } elseif (is_singular('post')) {

                    $options = array( 'next_text' => '<span class="post-navigation__meta-nav" aria-hidden="true"><span class="rocksite-a-button-icon "><i class="la la-angle-right"></i></span><span class="post-navigation__link__meta-nav">' . __('Next Post', 'genui') . '</span></span> ' . '<span class="screen-reader-text">' . __('Next post:', 'genui') . '</span>' . '<span class="post-navigation__link__title__text">%title</span>', 'prev_text' => '<span class="post-navigation__meta-nav" aria-hidden="true"><span class="rocksite-a-button-icon "><i class="la la-angle-left"></i></span><span class="post-navigation__link__meta-nav">' . __('Previous Post', 'genui') . '</span></span> ' . '<span class="screen-reader-text">' . __('Previous post:', 'genui') . '</span>' . '<span class="post-navigation__link__title__text">%title</span>', );

                    // Previous/next post navigation.
                    the_post_navigation($options);

                }

            }

        }


    }
}



