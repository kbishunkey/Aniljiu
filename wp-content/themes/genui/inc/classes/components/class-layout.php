<?php


if (!class_exists('Rocksite_Component_Layout')) {

    /**
     * Class generates layout components
     */
    class Rocksite_Component_Layout {

        protected static $instance;


        private function __construct() {

        }

        /**
         * Displays Logo Component
         * @param $path
         */

        public static function brand_logo( $path ) {

            ?>
            <h4 class="rocksite-a-logo" itemprop="headline">
                <a href="<?php echo esc_url( home_url('/') ); ?>"
               title="<?php echo  esc_attr( get_bloginfo('name', 'display') ); ?>"
               rel="home"
               class="rocksite-a-logo__link">
                <?php
                if (strlen($path) > 0) {
                    ?>
                    <img src="<?php echo esc_url ( $path ); ?>"
                         alt="<?php echo esc_attr( bloginfo('name') ); ?>" class="rocksite-a-logo__link__image" />
                    <?php
                } else {
                    esc_attr( bloginfo('name')) ;
                }
                ?></a>
            </h4>
            <?php
        }

        /**
         * Generate site brand header
         */

        public static function site_title_logo() {

            ?>

            <div class="rocksite-m-site-description" itemprop="headline">
                <h4 class="rocksite-m-site-description__title"><a href="<?php echo esc_url( home_url('/') ); ?>"><?php echo get_bloginfo('name', 'display'); ?></a></h4>
                <p class="rocksite-m-site-description__description"><a href="<?php echo esc_url( home_url('/') ); ?>"><?php echo get_bloginfo('description', 'display'); ?></a></p>
            </div>
            <?php



        }

        public static function content_featured_image( $size ) {

            global $post;
            ?>
            <div class="rocksite-o-content__featured-image">
                <?php the_post_thumbnail('full') ?>
            </div>
            <?php

        }

        public static function content_page_title() {

            global $post;

            ?>

            <h2 class="rocksite-o-content__title"><?php the_title() ?></h2>

            <?php

        }

        /**
         * Displays article meta
         *
         * @param string $content
         */

        public static function article_meta( $content = '' ) {
            ?>
            <div class="rocksite-o-content__meta"><?php echo $content; ?></div>
            <?php
        }


    }



}