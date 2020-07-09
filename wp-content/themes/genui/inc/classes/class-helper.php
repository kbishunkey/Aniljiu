<?php



if (!class_exists('Rocksite_Helper')) {

    /**
     * Helper Class with static methods
     */
    class Rocksite_Helper {

        protected static $instance;

        public $config;
        public $settings;




        private function __construct() {

        }


        /**
         * Returns type of content based on WordPress template tags
         * @return string
         */

        public static function get_content_type() {

            $type = '';

            if( is_single() ){

                $type = 'single_';

            }else if(is_archive()) {

                $type = 'archive_';

            }else if(is_page()) {

                $type = 'page_';

            }

            return $type;

        }
    }
}