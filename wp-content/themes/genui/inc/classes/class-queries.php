<?php



if (!class_exists('Rocksite_Queries')) {

    /**
     * Helper Class with static methods
     */
    class Rocksite_Queries {

        protected static $instance;

        public $config;
        public $settings;




        private function __construct() {

        }

        public static function related_post( $category, $post_ID, $display_post_limit ) {
            global $post;

            $args = array(
                'cat'           => $category,
                'post__not_in'  => array( $post_ID * - 1 ),
                'posts_per_page'=> $display_post_limit,
                'tax_query'     => array(
                    'relation' => 'OR',
                    array(
                        'taxonomy' => 'post_format',
                        'field'    => 'slug',
                        'terms'    => array( 'post-format-gallery' )
                    ),
                    array(
                        'taxonomy' => 'post_format',
                        'field'    => 'slug',
                        'terms'    => array( 'post-format-video' )
                    ),
                    array(
                        'taxonomy' => 'post_format',
                        'field'    => 'slug',
                        'terms'    => array( 'post-format-standard' )
                    )

                )
            );


            $query = new WP_Query( $args );


            return $query;

            //if limit >0

        }


    }
}