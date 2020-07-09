<?php


if (!class_exists('Rocksite_Assets')) {

    /**
     * Root Class for initialize
     */
    class Rocksite_Assets extends Rocksite_Base {

        public $actions;

        public $assets_path;
        public $google_fonts_url = 'https://fonts.googleapis.com/css?family=';


        public function __construct( $config, $settings ) {

            parent::__construct($config, $settings);

            $this->assets_path = ROCKSITE_THEME_ASSETS ;



            $this->hooks();

            $this->run_adds();

        }

        public function hooks() {

            $this->add_action('wp_enqueue_scripts', $this, 'enqueue_css_assets');
            $this->add_action('wp_enqueue_scripts', $this, 'enqueue_js_assets');
            $this->add_action('wp_enqueue_scripts', $this, 'inline_css_variables');

            $this->add_action('admin_enqueue_scripts', $this, 'enqueue_admin_css_assets');
            $this->add_action('admin_enqueue_scripts', $this, 'inline_css_variables');





            //$this->add_filter('body_class', $this, 'body_class_modyficator');


        }

        /**
         * Regster all scripts from the config file
         */

        private function register_scripts() {

            $scripts = $this->config->get_js_assets();

            if (is_array($scripts)) {

                foreach ($scripts as $key => $file) {

                    $handle = $key;



                    if( WP_DEBUG !== false ) {

                        $src = $this->assets_path . $file[ 'path_full' ];

                    }else {

                        $src = $this->assets_path . $file[ 'path' ];

                    }


                    $deps = isset( $file[ 'deps' ] ) ? $file[ 'deps' ] : array();
                    $in_footer = isset( $file[ 'in_footer' ] ) ? $file[ 'in_footer' ] : false;

                    wp_register_script($handle, $src, $deps, $this->config->version(), $in_footer);

                }

            }

        }

        /**
         * Rgester all styles from the config
         */

        private function register_styles() {

            //Register fonts firstly

            $this->register_fonts();

            $styles = $this->config->get_css_assets();

            if (is_array($styles)) {

                foreach ($styles as $key => $file) {

                    $handle = $key;

                    if( WP_DEBUG !== false ) {

                        $src = $this->assets_path . $file[ 'path_full' ];

                    }else {

                        $src = $this->assets_path . $file[ 'path' ];

                    }

                    $deps = isset( $file[ 'deps' ] ) ? $file[ 'deps' ] : array();
                    $media = isset( $file[ 'media' ] ) ? $file[ 'media' ] : false;

                    wp_register_style($handle, $src, $deps, $this->config->version(), $media);

                }

            }

        }

        /**
         * Add assets to editor
         */

        public function enqueue_admin_css_assets() {

            $this->register_fonts();
            $this->register_styles();

            wp_enqueue_style('genui-custom-fonts');
            wp_enqueue_style('genui-root-variables');







        }

        public function enqueue_css_assets() {

            //1_ Register styles

            $this->register_styles();

            //2_ Enqueue styles

            wp_enqueue_style('genui-main');


        }

        public function enqueue_js_assets() {

            $this->register_scripts();

            wp_enqueue_script('genui-main');


        }

        public function register_fonts() {

            $fonts = $this->config->get_fonts();




            if (is_array($fonts)) {

                $custom_font_string = '';

                foreach ($fonts as $handle => $font) {

                    $custom_font = get_theme_mod($handle);


                    if ( $custom_font && !is_array( $custom_font )) {

                        if( $custom_font!==false ) {

                            $url = explode('&', $this->config->get_google_font($custom_font));

                            if(isset($url[0])) {

                                $custom_font_string .= str_replace(' ', '+',$url[0] ). '|';

                            }

                        }

                    } else {

                        //font handler same as option name

                        if ( is_array ($font ) ) {

                            foreach ( $font as $key =>$params) {

                                if( ($handle != 'supported_google_fonts') && ($handle != 'options_google_fonts') ){

                                    if(strpos($params, ':')) {

                                        $url = explode('&', $params);

                                        if(isset($url[0])) {

                                            $custom_font_string .= str_replace(' ', '+',$url[0] ). '|';

                                        }

                                    }

                                }

                            }

                        }


                    }

                }

                wp_register_style('genui-custom-fonts', html_entity_decode( esc_url($this->google_fonts_url . substr($custom_font_string, 0, -1)). '&display=swap&subset=latin-ext' ), array(), $this->config->version(), 'all');

            }

        }

        /**
         * Displays custom CSS variables based on customizer values
         */

        public function inline_css_variables() {

            $start_css = ":root {"."\n";

            $ouput_css = "";


            $project_variables = $this->config->get_project_variables();



            foreach ( $project_variables as $css_variable => $css_value ) {

                $value = get_theme_mod($css_variable);


                if( $value!==false && !is_array($value) ) {

                    $ouput_css .= '--'.$css_variable .':'.$value .';' ."\n";

                }



            }

            $end_css = '}';

            if (strlen ($ouput_css) >0) {

               $header_css =  $start_css. $ouput_css . $end_css;

                // pass style name whoch is upper than main style

                wp_add_inline_style( 'genui-root-variables',  $header_css );

            }




        }


    }
}