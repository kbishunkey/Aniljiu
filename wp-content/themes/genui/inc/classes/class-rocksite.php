<?php



if (!class_exists('genui')) {

    /**
     * Root Class for initialize
     */
    class Rocksite {

        private static $instance;
        private static $theme_mods;
        public static $layout; // zmienna przechowująca obiekt layoutu
        private static $setup;
        private static $customizer;
        public $config;
        public $settings;







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



            $this->config = Rocksite_Config::get_instance();


            // Create theme classes and inject config & settings


            self::$customizer = Rocksite_Customizer::get_instance($this->config, $this->settings);
            self::$setup = Rocksite_Setup::get_instance($this->config, $this->settings);



            //main layout class

            self::$layout = Rocksite_Layout::get_instance($this->config, $this->settings);

            Rocksite_Assets::get_instance($this->config, $this->settings);
            Rocksite_Content::get_instance($this->config, $this->settings);
            Rocksite_Navigation::get_instance($this->config, $this->settings);

            // Class for admin area
            if (is_user_logged_in()) {

                Rocksite_Admin::get_instance($this->config, $this->settings);

            }

        }



        public static function layout() {

            return self::$layout;

        }

        public static function setup() {

            self::$setup->theme_setup();

        }


    }
}