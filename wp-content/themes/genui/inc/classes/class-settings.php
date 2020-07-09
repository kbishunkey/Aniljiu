<?php

if (!class_exists('Rocksite_Settings')) {

    /**
     * Class for getting config
     */
    class Rocksite_Settings {

        private static $instance;
        private static $theme_mods;
        private static $config;
        public static $lang_string = '';

        /**
         * Get only one instance
         */
        public static function get_instance( $config ) {
            if (!isset( self::$instance )) {
                self::$instance = new self($config);
            }
            return self::$instance;
        }


        private function __construct( $config ) {

            self::$config = $config;


        }

        /**
         * Returns modified theme mod
         *
         * @param $key | meta or post meta key
         *
         * @return mixed
         */

        public static function get( $key, $default = false ) {

            $settings_local = self::_get_local_settings( $key, $default ); // local settings based on post meta

            $settings_global = get_theme_mod($key , $default);

            if (defined('ICL_LANGUAGE_CODE')) {

                self::$lang_string = '_' . ICL_LANGUAGE_CODE; // adds language sufix if language is defined

                $settings_global = get_theme_mod($key . self::$lang_string, $default);

            }

            return ( $settings_local !== false) ? $settings_local : $settings_global;

        }

        /**
         * Returns post meta fields which don't have representation in the customizer
         * @param $key
         * @param bool $default
         *
         * @return bool|mixed
         */
        public static function get_meta( $key, $default = false ) {

            return self::_get_local_settings( $key, $default ); // local settings based on post meta

        }

        /**
         * Returns post meta fields
         * @param $key
         * @param bool $default
         *
         * @return bool|mixed
         */

        private static function _get_local_settings( $key, $default = false ) {

            global $post;


            if( isset($post->ID) ) {

                if (function_exists('carbon_get_post_meta')) {

                    $settings_local = carbon_get_post_meta($post->ID, $key); // reruns null if not exists

                } else {

                    $settings_local = get_post_meta($post->ID, $key, true); // returns empty string


                }

            }


            if( isset($settings_local) && !empty($settings_local) ) {

                return (string)$settings_local;

            } else {

                return false;

            }

        }


    }
}