<?php


if (!class_exists('Rocksite_Component_Nav')) {

    /**
     * Class generates navigation components
     */
    class Rocksite_Component_Nav
    {

        protected static $instance;


        private function __construct()
        {

        }

        public static function breadcrumbs($display, $home, $separator, $modifier='')
        {

            global $post;


            //Get bredcrumb separator option
            $sep = '<span class="rocksite-m-breadcrumbs__item__separator" >' . $separator . '</span>';

            $display = (bool) $display;




            echo '<ol class="rocksite-m-breadcrumbs '.$modifier.'">';
            if (!is_front_page() && $display === true) {
                echo '<li class="rocksite-m-breadcrumbs__item"><a href="';
                echo esc_url( home_url() );
                echo '" >';
                echo $home;
                echo '</a>' . $sep . '</li>';

                if (is_category() || is_single()) {
                    $args = array('fields' => 'all');
                    $categories = wp_get_post_categories($post->ID, $args);

                    if (count($categories)) {

                        if (isset($categories[0])) {
                            ?>
                            <li class="rocksite-m-breadcrumbs__item"><a
                                    href="<?php echo esc_url(get_category_link($categories[0]->term_id)) ?>"><?php echo $categories[0]->name ?></a><?php echo $sep ?>
                            </li>
                            <?php
                        }

                    }


                } elseif (is_archive() || is_single()) {

                    ?>
                    <li class="rocksite-m-breadcrumbs__item"><?php
                        if (is_day()) {
                            printf('%s', get_the_date());
                        } elseif (is_month()) {
                            printf('%s', get_the_date(_x('F Y', 'monthly archives date format', 'genui')));
                        } elseif (is_year()) {
                            printf('%s',  get_the_date(_x('Y', 'yearly archives date format', 'genui')));
                        } else {
                            _e('Blog Archives', 'genui');
                        }

                        ?></li>
                    <?php

                }

                // If the current page is a single post, show its title with the separator
                if (is_single()) {
                    ?>
                    <li class="rocksite-m-breadcrumbs__item">
                        <?php

                        the_title();
                        ?>
                    </li>
                    <?php

                }


            }
            echo '</ol>';
        }

        /**
         * WPML language menu
         */

        public static function wpml_selector()
        {

            ?>
            <nav class="nav nav-pills nav-top rocksite-language-menu">
                <p><span class="rocksite-label-inside-menu"><?php _e('Languages', 'genui') ?>: </span></p>
                <?php do_action('icl_language_selector'); ?>
            </nav>
            <?php
        }

        /**
         * Polylang Selector
         */

        public static function polylang_selector()
        {

            ?>
            <nav class="nav nav-pills nav-top rocksite-language-menu">
                <p><span class="rocksite-label-inside-menu"><?php _e('Languages', 'genui') ?>: </span></p>
                <ul class="rocksite-polylang-languages-list"><?php pll_the_languages(); ?></ul>
            </nav>
            <?php

        }


        /**
         * Search Menu Item
         * @return string
         */

        public static function search_menu_item()
        {

            return '<li  class="rocksite-m-nav-menu__item -icon-item"> <a href="#" class="rocksite-m-nav-menu__link js-expand-search">
        <i class="la la-search"></i></a></li>';

        }


        /**
         * Mobile toggle button
         * @return string
         */

        public static function hamburger_menu_item()
        {

          return '<li class="rocksite-m-nav-menu__item -icon-item u-hide-on-desktop">
            <a tabindex="0" href="#" class="rocksite-m-nav-menu__link js-toggle-mobile">
            <span class="rocksite-m-bars">
	            <span class="rocksite-m-bars__bar"></span>
	            <span class="rocksite-m-bars__bar"></span>
	            <span class="rocksite-m-bars__bar"></span>
            </span>
            </a>
        </li>';

        }

        public static function cart_menu_item()
        {

            $items = '<li tabindex="0" class="rocksite-m-nav-menu__item -cart-item -icon-item"><a class="rocksite-m-nav-menu__link"   href="' . wc_get_cart_url() . '"></span><i class="las la-shopping-cart" aria-hidden="true"></i>';
            $items .=  '<span class="rocksite-a-label -tiny">' . WC()->cart->get_cart_contents_count() . '</span></a></li>';

            return $items;


        }

        /**
         * Mobile hamburger & search
         */

        public static function toggle_search_menu($menu_items)
        {

            ?>
            <ul class="-toggle-menu rocksite-m-nav-menu">

                <?php echo $menu_items ?>

            </ul>
            <?php

        }


        /**
         * Displays pager navigation based on paginate links
         *
         * @param $paginate_links
         */

        public static function pager_navigation($paginate_links)
        {

            ?>
            <nav class="rocksite-s-pagination">
                <ul class="rocksite-m-pagination rocksite-m-pagination--number">
                    <?php
                    foreach ($paginate_links as $row) {

                        ?>
                        <li class="rocksite-m-pagination__item"><?php echo $row ?></li>
                        <?php
                    }
                    ?>
                </ul><!--// end .pagination -->
            </nav>
            <?php
        }



    }

}