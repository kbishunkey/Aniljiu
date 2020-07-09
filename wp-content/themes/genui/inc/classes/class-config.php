<?php

if (!class_exists('Rocksite_Config')) {

    /**
     * Class for getting config
     */
    class Rocksite_Config {

        private static $instance;
        private $default_settings;
        private $customizer_panels;
        private $customizer_sections;
        private $customizer_fields;
        private $sidebars;
        private $theme_assets;
        public $theme_info;



        /**
         * Get only one instance
         */
        public static function get_instance() {
            if (!isset( self::$instance )) {
                self::$instance = new self();
            }
            return self::$instance;
        }


        private function __construct() {


            // default theme config

            $this->default_settings = include ROCKSITE_THEME_CONFIG . 'default-values.php';

            // customizer

            $this->customizer_panels = include ROCKSITE_THEME_CONFIG . 'customizer/customizer-panels.php';
            $this->customizer_sections = include ROCKSITE_THEME_CONFIG . 'customizer/customizer-sections.php';
            $this->customizer_fields = include ROCKSITE_THEME_CONFIG . 'customizer/customizer-fields.php';
            $this->theme_info = wp_get_theme();

            $this->theme_assets = include ROCKSITE_THEME_CONFIG . 'assets.php';
            $this->theme_fonts = include ROCKSITE_THEME_CONFIG . 'fonts.php';
            $this->sidebars = include ROCKSITE_THEME_CONFIG . 'sidebars.php';
            $this->project_variables = include ROCKSITE_THEME_CONFIG . 'project-variables.php';


        }

        public function get_theme_mod( $key ) {

            if (isset( self::$theme_mods[ $key ] )) {
                return self::$theme_mods[ $key ];
            }

            return false;

        }


        public function default_settings($key='') {


            if(strlen($key)>0 && isset($this->default_settings[$key])) {

                return $this->default_settings[$key];

            }
            return $this->default_settings;

        }

        /**
         * Get default logo attributes
         * @return array
         */

        public function get_logo_attributes() {

            return isset($this->default_settings['logo_settings'])?$this->default_settings['logo_settings']: array();

        }



        /**
         * Returns default image sizes
         * @return array
         */

        public function get_image_sizes() {

            return isset($this->default_settings['images_sizes'])?$this->default_settings['images_sizes']: array();

        }

        /**
         * Returns menus locations
         * @return array
         */

        public function get_menus_locations() {

            return isset($this->default_settings['menus'])?$this->default_settings['menus']: array();

        }

        /**
         * Returns social icons mapped on fontawesome class
         * @param string $icon_name
         *
         * @return array
         */

        public function get_social_icons($icon_name = '') {

            $social_icons = $this->default_settings['social_icons'];

            if(!empty($icon_name)) {

                return isset($social_icons[$icon_name])?$social_icons[$icon_name]: array();

            }else {

                return $social_icons;

            }

        }


        public function get_customizer_panels() {

            return $this->customizer_panels;

        }

        public function get_customizer_sections() {

            return $this->customizer_sections;

        }

        public function get_customizer_fields() {

            return $this->customizer_fields;

        }

        /**
         * Return styles assets
         * @return bool
         */

        public function get_css_assets() {

            if (isset( $this->theme_assets[ 'styles' ] )) {
                return $this->theme_assets[ 'styles' ];
            } else {

                return false;

            }


        }

        /**
         * Return styles assets
         * @return bool
         */

        public function get_js_assets() {

            if (isset( $this->theme_assets[ 'scripts' ] )) {
                return $this->theme_assets[ 'scripts' ];
            } else {

                return false;

            }


        }

        /**
         * Return theme fonts from the config
         * @return mixed
         */

        public function get_fonts( $key=false) {


            if ($key === false) {

                return $this->theme_fonts;

            } else {

                foreach ($this->theme_fonts[$key] as $font_name => $value ) {

                    return $font_name;

                }



            }


        }


        /**
         * Return google font url params
         * @param $key
         * @return string/bool
         */

        public function get_google_font($key) {


            if( isset($this->theme_fonts['supported_google_fonts'][$key])) {

                return  $this->theme_fonts['supported_google_fonts'][$key];

            } else {

                return false;

            }

        }

        /**
         * Return all font options
         * @return mixed
         */

        public function get_google_fonts_options() {

           return $this->theme_fonts['options_google_fonts'];

        }

        /**
         * Returns theme version
         * @return mixed
         */

        public function version() {

            return $this->theme_info->Version;

        }

        public function get_sidebars() {

            return $this->sidebars;

        }

        public function get_project_variables( $key=false ) {

            if( $key !==false ) {

                return $this->project_variables[$key];

            } else {

                return $this->project_variables;

            }


        }

    }
}