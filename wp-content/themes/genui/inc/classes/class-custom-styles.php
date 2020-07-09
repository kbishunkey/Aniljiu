<?php


if (!class_exists('Rocksite_Custom_Styles')) {

    /**
     * Root Class for initialize
     */
    class Rocksite_Custom_Styles extends Rocksite_Base {

        public $actions;

        public $output_css;



        public function __construct( $config, $settings ) {

            parent::__construct($config, $settings);



            $this->hooks();

            $this->run_adds();

        }

        public function hooks() {

            $this->add_action('wp_enqueue_scripts', $this, 'enqueue_css_assets');
            $this->add_action('wp_enqueue_scripts', $this, 'enqueue_js_assets');

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
                    $src = $this->js_path .$file[ 'path' ];
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

            $styles = $this->config->get_css_assets();



            if (is_array($styles)) {

                foreach ($styles as $key => $file) {

                    $handle = $key;
                    $src = $this->css_path . $file[ 'path' ];
                    $deps = isset( $file[ 'deps' ] ) ? $file[ 'deps' ] : array();
                    $media = isset( $file[ 'media' ] ) ? $file[ 'media' ] : false;

                    wp_register_style($handle, $src, $deps, $this->config->version(), $media);

                }

            }

        }

        public function enqueue_css_assets() {

            //1_ Register styles

            $this->register_styles();

            //2_ Enqueue styles
            wp_enqueue_style('main');


        }

        public function enqueue_js_assets() {

            $this->register_scripts();

            wp_enqueue_script('main');


        }


    }
}