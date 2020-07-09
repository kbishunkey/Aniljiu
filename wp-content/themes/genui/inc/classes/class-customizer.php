<?php

if (!class_exists('Rocksite_Customizer')) {

    /**
     * Class for generate customizer options
     */
    class Rocksite_Customizer extends Rocksite_Base {

        /**
         * Constructor
         */
        public function __construct($config, $settings) {

            parent::__construct($config, $settings);

            if( class_exists('Kirki') ){

                Kirki::add_config( ROCKSITE_THEME_SETTINGS, array(
                    'capability'    => 'edit_theme_options',
                    'option_type'   => 'theme_mod',
                ) );

                add_action('init', array( $this, 'add_panels' ));
                add_action('init', array( $this, 'add_sections' ));
                add_action('init', array( $this, 'add_fields' ));

            }else {

                add_action( 'customize_register', array( $this, 'add_basic_fields' ) );
                add_action( 'customize_register', array( $this, 'custom_font_fields' ) );



            }



        }

        /**
         * Add Kirki Fields
         */

        public function add_panels() {

            $panels = apply_filters('rocksite_kit_filter_customizer_panels', $this->config->get_customizer_panels());

            if( is_array( $panels)) {

                foreach( $panels as $key=>$panel) {

                    Kirki::add_panel( $key, $panel );

                }

            }

        }

        /**
         * Add Kirki Sections
         */

        public function add_sections() {

            $sections = apply_filters('rocksite_kit_filter_customizer_sections',$this->config->get_customizer_sections());

            if( is_array( $sections )) {

                foreach( $sections as $key => $section) {

                    Kirki::add_section( $key, $section );

                }

            }

        }

        /**
         * Add Kirki Fields
         */

        public function add_fields() {

            $fields = apply_filters('rocksite_kit_filter_customizer_fields', $this->config->get_customizer_fields());

            foreach($fields as $field_name => $field_args) {

                Kirki::add_field( ROCKSITE_THEME_SETTINGS, $this->add_default_values_to_field( $field_name, $field_args ) );

            }



        }

        /**
         * Ads default value from the configuration file into single field configuration
         * @param $field_name
         * @param array $field_configuration
         *
         * @return array
         */

        private function add_default_values_to_field ($field_name, array $field_configuration) {

            $default_settings = $this->config->default_settings();

            if( !isset ($field_configuration['default']) ) {

                if( isset( $default_settings[$field_name] )) {
                    $field_configuration['default'] = $default_settings[$field_name];
                }

            }


            return $field_configuration;



        }

        /**
         * Add Basic Settings without installing any plugin
         * @param $wp_customize
         */

        public function add_basic_fields($wp_customize) {


            // remove unused controls

            $wp_customize->remove_control("header_textcolor");

            // Add Customize Section


            $wp_customize->add_setting('footer_copyright_text', array(
                'sanitize_callback' => 'sanitize_text_field',
                'default' => __('Footer Text', 'genui')
            ));

            $wp_customize->add_control( 'footer_copyright_text', array(

                'label' => __('Footer copyright text', 'genui'),
                'section'   => 'title_tagline'

            ) );

            // Header Section

            $wp_customize->add_setting('header_image_title', array(
                'sanitize_callback' => 'sanitize_text_field',
                'default' => __('Default Website Title', 'genui')
            ));

            $wp_customize->add_control( 'header_image_title', array(

                'label' => __('Header Title', 'genui'),
                'section'   => 'header_image'

            ) );

            $wp_customize->add_setting('header_image_description', array(
                'sanitize_callback' => 'sanitize_text_field',
                'default' => __('Short description below the title. You can change it in the customizer', 'genui')
            ));

            $wp_customize->add_control( 'header_image_description', array(

                'label' => __('Header Description', 'genui'),
                'section'   => 'header_image'

            ) );

            /**
             * Section color
             */

            // Primary Color

            $wp_customize->add_setting( 'color-primary', array (
                'sanitize_callback' => 'sanitize_hex_color',
                'default' => $this->config->get_project_variables('color-primary'),

            ));

            $wp_customize->add_control(
                new WP_Customize_Color_Control( $wp_customize, 'color-primary',
                    array(
                        'label' => __( 'Primary Color', 'genui' ),

                        'section' => 'colors', // Add a default or your own section
                    ) ) );

            // Sectondary Color

            $wp_customize->add_setting( 'color-secondary', array (
                'sanitize_callback' => 'sanitize_hex_color',
                'default' => $this->config->get_project_variables('color-secondary')
            ));

            $wp_customize->add_control(
                new WP_Customize_Color_Control( $wp_customize, 'color-secondary',
                    array(
                        'label' => __( 'Secondary Color', 'genui' ),

                        'section' => 'colors', // Add a default or your own section
                    ) ) );

            // Text Color

            $wp_customize->add_setting( 'color-text', array (
                'sanitize_callback' => 'sanitize_hex_color',
                'default' => $this->config->get_project_variables('color-text')
            ));

            $wp_customize->add_control(
                new WP_Customize_Color_Control( $wp_customize, 'color-text',
                    array(
                        'label' => __( 'Text Color (Headings)', 'genui' ),

                        'section' => 'colors', // Add a default or your own section
                    ) ) );

            // Third Color Lighten

            $wp_customize->add_setting( 'color-text-lighten', array (
                'sanitize_callback' => 'sanitize_hex_color',
                'default' => $this->config->get_project_variables('color-text-lighten')
            ));

            $wp_customize->add_control(
                new WP_Customize_Color_Control( $wp_customize, 'color-text-lighten',
                    array(
                        'label' => __( 'Text Color Lighten', 'genui' ),
                        'section' => 'colors', // Add a default or your own section
                    ) ) );


            // Color Background -> section background image

            $wp_customize->add_setting( 'color-background', array (
                'sanitize_callback' => 'sanitize_hex_color',
                'default' => $this->config->get_project_variables('color-background')
            ));

            $wp_customize->add_control(
                new WP_Customize_Color_Control( $wp_customize, 'color-background',
                    array(
                        'label' => __( 'Background Color', 'genui' ),

                        'section' => 'background_image', // Add a default or your own section
                    ) ) );

            // Search Bar

            $wp_customize->add_section( 'searchbar_section', array(
                'title'       => __( 'Search Bar Section', 'genui'),
                'priority'       => 24,
            ) );

            $wp_customize->add_setting( 'main_menu_search_display', array(
                'capability' => 'edit_theme_options',
                'sanitize_callback' => array( $this, 'sanitize_checkbox'),
                'default' => true
            ) );

            $wp_customize->add_control( 'main_menu_search_display', array(
                'type' => 'checkbox',
                'section' => 'searchbar_section', // Add a default or your own section
                'label' => esc_html__( 'Display Search Bar', 'genui'),

            ) );

            // Top Bar

            $wp_customize->add_section( 'topbar_section', array(
                'title'       => __( 'Top Bar Section', 'genui'),
                'priority'       => 24,
            ) );

            $wp_customize->add_setting( 'topbar_display', array(
                'capability' => 'edit_theme_options',
                'sanitize_callback' => array( $this, 'sanitize_checkbox'),
                'default' => false
            ) );

            $wp_customize->add_control( 'topbar_display', array(
                'type' => 'checkbox',
                'section' => 'topbar_section', // Add a default or your own section
                'label' => esc_html__( 'Display Top Bar', 'genui'),

            ) );

            // Primary Color

            $wp_customize->add_setting( 'color-background-topbar', array (
                'sanitize_callback' => 'sanitize_hex_color',
                'default' => $this->config->get_project_variables('color-background-topbar'),

            ));

            $wp_customize->add_control(
                new WP_Customize_Color_Control( $wp_customize, 'color-background-topbar',
                    array(
                        'label' => __( 'Top Bar Background', 'genui' ),

                        'section' => 'topbar_section', // Add a default or your own section
                    ) ) );


            $wp_customize->add_setting('topbar_info', array(
                            'sanitize_callback' => 'wp_kses_post',
                            'default' => ''
            ));

            $wp_customize->add_control( 'topbar_info', array(

                'label'    => esc_html__( 'Top Bar Info', 'genui'),
                'section'   => 'topbar_section'

            ) );

        }

        public function custom_font_fields($wp_customize) {

            $wp_customize->add_section( 'fonts_section', array(
                'title'       => __( 'Theme Fonts', 'genui'),
                'priority'       => 24,
            ) );

            $wp_customize->add_setting( 'font-primary', array(
                    'sanitize_callback' => array( $this, 'sanitize_fonts'),
                    'default' => $this->config->get_fonts('font-primary'),
                )
            );
            $wp_customize->add_control( 'font-primary', array(
                    'type' => 'select',
                    'description' => __('Primary font family: paragraphs, buttons, forms', 'genui'),
                    'section' => 'fonts_section',
                    'choices' => $this->config->get_google_fonts_options()
                )
            );
            $wp_customize->add_setting( 'font-secondary', array(
                    'sanitize_callback' => array( $this, 'sanitize_fonts'),
                    'default' =>  $this->config->get_fonts('font-secondary'),
                )
            );
            $wp_customize->add_control( 'font-secondary', array(
                    'type' => 'select',
                    'description' => __( 'Secondary font family: Headings, Titles', 'genui'),
                    'section' => 'fonts_section',
                    'choices' => $this->config->get_google_fonts_options()
                )
            );

        }


        /**
         * TO DO: change sanitize select
         * @param $input
         * @return string
         */

        function sanitize_fonts( $input ) {


            if ( array_key_exists( $input,  $this->config->get_google_fonts_options() ) ) {

                return $input;

            } else {

                return '';

            }

        }

        /**
         * Sanitize Checkbox
         * @param $checked
         * @return bool
         */

        function sanitize_checkbox( $checked ) {
            // Boolean check.
            return ( ( isset( $checked ) && true == $checked ) ? true : false );
        }


    }


}

