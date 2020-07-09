<?php


if (!class_exists('Rocksite_Layout')) {

    /**
     * Root Class for initialize
     */
    class Rocksite_Layout extends Rocksite_Base {

        public $actions;


        public function __construct( $config, $settings ) {

            parent::__construct($config, $settings);

            $this->hooks();

            $this->run_adds();

        }

        public function hooks() {

            // WordPress hooks


            $this->add_filter('body_class', $this, 'body_class_modyficator');
            $this->add_action('widgets_init', $this, 'widgets_register');


            // Theme hooks

            $this->add_action('rocksite_get_sidebar', $this, 'get_sidebar');
            $this->add_action('rocksite_action_get_template_part', $this, 'action_get_template_part', 1, 2);
            $this->add_action('rocksite_action_get_template_area', $this, 'action_get_template_area', 1, 2);
            $this->add_action('rocksite_action_content_header', $this, 'action_content_header');
            $this->add_action('rocksite_action_footer_section_sidebar', $this, 'action_footer_section_sidebar');
            $this->add_action('rocksite_search_navbar', $this, 'action_search_navbar');
            $this->add_action('rocksite_action_header_page', $this, 'action_header_page');





            $this->add_filter('rocksite_filter_content_header_styles', $this, 'filter_content_header_styles', 1, 2);
            $this->add_filter('rocksite_filter_content_header_class', $this, 'filter_content_header_class', 1, 2);
            $this->add_filter('rocksite_filter_header_lead_class', $this, 'filter_header_lead_class', 1, 2);
            $this->add_filter('rocksite_layout_class', $this, 'filter_layout_class', 1, 2);
            $this->add_filter('rocksite_filter_get_settings_text', $this, 'filter_get_settings_text', 1, 2);
            $this->add_filter('rocksite_filter_logo', $this, 'filter_logo');


        }


        public function body_class_modyficator( $classes ) {

            $classes[] = 'rocksite-body-has-topbar';

            return $classes;

        }

        public function filter_layout_class( $default, $type = 'main' ) {

            $class = 'class="' . $default;

            $type = apply_filters( 'rocksite_get_sidebar_type',  $type);
            $type_sidebar = Rocksite_Settings::get($type . '_sidebar', '1');



            if (is_active_sidebar($type.'_sidebar') && !is_page_template( array('templates/template-full-width.php', 'templates/template-gutenberg-layout.php') )) {




            switch (  $type_sidebar ) {
                case 1:
                    $class .= ' -sidebar';
                    break;
                case 2:
                    $class .= ' -sidebar -left-sidebar';
                    break;

            }
            }
            $class .= '"';

            return $class;


        }



        public function widgets_register() {


            register_widget('Rocksite_Widget_Recent_Posts');

        }

        /**
         * Displays large header on single page
         */

        function action_content_header( $type = 'page' ) {

            global $post;



            $type = esc_attr( apply_filters('rcoksite_header_page_type', $type) );



            $page_header_layout = esc_attr( Rocksite_Settings::get($type . '_header_layout', '1') );




            if ( $page_header_layout == '1') {


                if(has_post_thumbnail()) {

                    get_template_part('views/snippets/header', $type);

                }else {

                    get_template_part('views/snippets/header-simple');
                }



            } else {

                if( $type == 'single') {

                    get_template_part('views/snippets/header-single');

                } else {


                    if ($type != '0' ) {

                        get_template_part('views/snippets/header-simple');

                    }


                }



            }

        }

        /**
         * Displays Search navbar
         */

        function action_search_navbar( ) {

            get_template_part('views/snippets/navbar-search');

        }

        /**
         * display WordPress header image
         */

        function action_header_page() {

            if ( get_header_image() && is_home() ) {

                get_template_part('views/sections/header-image');

            }

        }

        function action_footer_section_sidebar() {

            if (is_active_sidebar('footer_sidebar')) {

                get_template_part('views/sections/footer', 'sidebar');

            }


        }


        /**
         * Returns style & attributes string for Page Header
         *
         * @param $default
         *
         * @return string
         */

        function filter_content_header_styles( $default, $type = 'page' ) {

            $attributes_string = $default;
            $style_string = '';

            $image = esc_attr( Rocksite_Settings::get($type . '_header_background') );
            $color = esc_attr( Rocksite_Settings::get($type . '_header_background_overlay'));


            if (strlen($image) > 0 || strlen($color) > 0) {


                $style_string = 'style="';

                if (strlen($image) > 0) {

                    $background_image = wp_get_attachment_image_src($image, 'full');

                    $style_string .= 'background-image: url(' . $background_image[ 0 ] . ');';

                }

                if (strlen($color) > 0) {

                    $style_string .= 'background-color: ' . $color . ';';

                }


                $style_string .= '"';

                if (strlen($image) > 0 && strlen($color) > 0) {

                    $attributes_string = 'data-type="background" data-overlay-color="' . $color . '"';
                }


            }

            return $style_string . ' ' . $attributes_string;

        }

        /**
     * Get Content Header Class
     *
     * @param $default
     * @param $dark_section
     *
     * @return string
     */

        function filter_content_header_class( $default, $type = 'page' ) {

            $header_class = 'class="' . $default;

            $dark_section = esc_attr( Rocksite_Settings::get($type . '_header_invert_section'));

            $paralax_section = esc_attr( Rocksite_Settings::get($type . '_header_background_paralax'));

            $overlay = esc_attr( Rocksite_Settings::get($type . '_header_background_overlay'));

            if ($dark_section) {
                $header_class .= ' -invert';
            }

            if ($paralax_section) {
                $header_class .= ' u-paralax-section';
            }

            if (strlen($overlay) > 0) {
                $header_class .= ' u-overlay-section';
            }


            return $header_class . '"';

        }


        /**
         * Displays text from theme settings
         *
         * @param $default
         * @param $settings_key
         *
         * @return mixed
         */

        public function filter_get_settings_text( $default, $settings_key ) {

            $text = esc_attr( Rocksite_Settings::get($settings_key) );


            if (is_string($text) && strlen($text)>0) {

                return $text;

            }

            if (is_user_logged_in() && current_user_can('edit_theme_options')) {

                return $default;

            }




        }

        /**
         * Get Header Lead Class
         *
         * @param $default
         *
         * @return string
         */

        function filter_header_lead_class( $default, $sidebar = 'main' ) {

            $lead_class = 'class="' . $default;

            if ( !has_post_thumbnail() ) {

                $lead_class .= ' -no-image';

            }

            if (is_active_sidebar($sidebar.'_sidebar')) {

                $sidebar_type = esc_attr( Rocksite_Settings::get($sidebar . '_sidebar', '1') );

                switch ( $sidebar_type ) {
                    case 1:
                        $lead_class .= ' -sidebar';
                        break;
                    case 2:
                        $lead_class .= ' -sidebar -left-sidebar';
                        break;

                }
            }




            return $lead_class . '"';

        }


        /**
         * Includes sidebar
         * @param string $type
         */

        public function get_sidebar( $type = 'main' ) {

            $type = apply_filters( 'rocksite_get_sidebar_type',  $type);

            $type_sidebar =   esc_attr( Rocksite_Settings::get($type . '_sidebar', '1'));





            if ($type_sidebar == '1' || $type_sidebar == '2') {

                get_template_part('views/sidebar', $type);

            }


        }

        /**
         * Load template part based on customizer option
         *
         * @param $partial_name
         * @param $option_name
         */

        public function action_get_template_part( $partial_name, $option_name ) {


            $option_value = esc_attr( Rocksite_Settings::get($option_name, false));

            if ($option_value == '1') {

                get_template_part($partial_name);

            }

        }

        /**
         * Load main template area
         * @param $directory
         * @param $area_name
         */

        public function action_get_template_area( $directory, $area_name ) {


            // Elementor location

            if ( ! function_exists( 'elementor_theme_do_location' ) || ! elementor_theme_do_location( $area_name ) ) {

                get_template_part( $directory. '/'.$area_name );

            }


        }


        /**
         * Displays brand theme logo
         *
         * @param bool $default_path
         */

        function filter_logo( $default_path = false ) {

            $path = get_template_directory_uri() . $default_path;

            $custom_logo_id = esc_attr( Rocksite_Settings::get('custom_logo'));




            $settings_path = wp_get_attachment_image_src( $custom_logo_id , 'full' );




            if ($custom_logo_id !== false && isset($settings_path[0])) {



                Rocksite_Component_Layout::brand_logo($settings_path[0]);

            } else {



                if($default_path !== false) {

                    Rocksite_Component_Layout::brand_logo($path);

                }


            }

            if (get_theme_mod('header_text', 0) == 1) {

                Rocksite_Component_Layout::site_title_logo();

            }

        }


        public function filter_sidebars_list() {


        }


    }
}