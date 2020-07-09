<?php

if (!class_exists('Rocksite_Content')) {

    /**
     * Root Class for initialize
     */
    class Rocksite_Content extends Rocksite_Base
    {


        public function __construct($config, $settings)
        {

            parent::__construct($config, $settings);


            $this->hooks();

            $this->run_adds();

        }

        public function hooks()
        {

            // WordPress & plugins hooks

            $this->add_filter('post_class', $this, 'filter_post_class', 10, 3);
            $this->add_filter('the_content_more_link', $this, 'filter_read_more');


            // Theme hooks


            $this->add_action('rocksite_title_header', $this, 'action_title_header');
            $this->add_action('rocksite_featured_image', $this, 'action_featured_image');
            $this->add_action('rocksite_featured_video', $this, 'action_featured_video');

            $this->add_action('rocksite_action_page_title', $this, 'action_page_header');
            $this->add_action('rocksite_action_article_header', $this, 'action_article_header');
            $this->add_action('rocksite_action_related_posts', $this, 'action_related_posts');
            $this->add_action('rocksite_action_author_box', $this, 'action_author_box');
            $this->add_action('rocksite_entry_tags', $this, 'action_entry_tags');


            $this->add_action('rocksite_action_meta_post', $this, 'action_meta_post', 1, 3);
            $this->add_action('rocksite_category_post', $this, 'action_category_post', 1, 1);


        }

        /**
         * Change post class based on location and configuration
         *
         * @param $classes
         * @param $class
         * @param $post_id
         *
         * @return array
         */

        public function filter_post_class($classes, $class, $post_id)
        {

            if (is_sticky() && is_home() && !is_paged()) {

                $classes[] = '-sticky-article';

            }

            // Return the array
            return $classes;
        }

        /**
         * Changes Read More Class
         *
         * @param $default
         *
         * @return mixed
         */

        public function filter_read_more($default)
        {

            return str_replace('more-link', 'rocksite-a-button -more-link', $default);

        }

        /**
         * Register sidebars from the config
         */

        public function register_simple_block_action()
        {


        }

        public function action_title_header()
        {

            global $post;


            $type = Rocksite_Helper::get_content_type();

            if ($type == 'page_') {


                $show_title = esc_attr(Rocksite_Settings::get('show_title_header', true));
                $subtitle = get_post_meta($post->ID, 'rocksite_page_subtitle', true);

                if ($show_title) {
                    Rocksite_Component_Content::page_header_title($subtitle);
                }

            } elseif ($type == 'archive_') {

                $show_title = esc_attr(Rocksite_Settings::get('archive_show_category_name', true));
                $category_prefix = esc_attr(Rocksite_Settings::get('archive_category_prefix', ''));
                $title = '';

                if ($show_title) {

                    if (is_day()) :
                        $title = sprintf(__('Daily Archives: %s', 'genui'), '<span>' . get_the_date() . '</span>');
                    elseif (is_month()) :
                        $title = sprintf(__('Monthly Archives: %s', 'genui'), '<span>' . get_the_date(_x('F Y', 'monthly archives date format', 'genui')) . '</span>');
                    elseif (is_year()) :
                        $title = sprintf(__('Yearly Archives: %s', 'genui'), '<span>' . get_the_date(_x('Y', 'yearly archives date format', 'genui')) . '</span>');
                    else :
                        $category = get_category(get_query_var('cat'));

                        if (isset($category->name)) {

                            $title = $category_prefix . ' ' . $category->name;

                        }


                    endif;

                }

                Rocksite_Component_Content::archive_header_title($title, category_description());

            } else {

                Rocksite_Component_Content::single_header_title();
                $this->action_meta_post('header');

            }


        }

        /**
         * Featured image component
         */

        public function action_featured_image($type = 'page')
        {

            $type_header_layout = esc_attr(Rocksite_Settings::get($type . '_header_layout', '1'));


            if ($type_header_layout != '1' || $type == 'singular' || $type == 'single-simple') {

                Rocksite_Component_Content::content_featured_image('full');

            }

        }

        /**
         * Featured video component (Visual Portfolio Plugin)
         */

        public function action_featured_video($type = 'page')
        {
            global $post;

            $video_url = get_post_meta($post->ID, 'video_url', true);

            if ($video_url) {

                Rocksite_Component_Content::content_featured_video($video_url);
            }

        }

        /**
         * Displays title in the page content
         */

        public function action_page_header($type = '')
        {

            $page_header_layout = esc_attr(Rocksite_Settings::get($type . '_header_layout', '1'));

            if ($page_header_layout == '0') {

                Rocksite_Component_Content::content_page_title();;
            } elseif ($page_header_layout == '1' && !has_post_thumbnail()) {

                Rocksite_Component_Content::content_page_title();


            } elseif ($type == 'singular') {

                Rocksite_Component_Content::content_page_title();

            }


        }

        public function action_article_header($type = 'page')
        {

            $page_header_layout = esc_attr(Rocksite_Settings::get($type . '_header_layout', '1'));


            if ($page_header_layout == '0' || !has_post_thumbnail() || $type=='single-simple') {


                Rocksite_Component_Content::article_header($this->action_meta_post('content', false));

            }

        }

        /**
         * Displays category container
         * @param $container_class
         *
         * @return string
         */

        public function action_category_post($container_class)
        {


            $meta_options = esc_attr(Rocksite_Settings::get('article_meta', 1));


            if (is_array($meta_options) && in_array('show_category_line', $meta_options)) {

                return Rocksite_Component_Content::category_line($container_class);

            } elseif ($meta_options == 1) {

                return Rocksite_Component_Content::category_line($container_class);

            }


        }


        /**
         * Action for displaying meta line based on coditions
         *
         * @param string $context : place, whe meta should be displayed
         * @param bool $html : display with html structure
         * @param bool $echo : if true echo plain meta witohout outer html
         *
         * @return string
         */

        public function action_meta_post($context = 'list', $html = true, $echo = false)
        {

            $meta_options = apply_filters('rocksite_meta_info', Rocksite_Settings::get('article_meta', 1)); // returns date


            $meta_content = '';

            if (is_array($meta_options) && in_array('show_date', $meta_options)) {

                $meta_content .= Rocksite_Component_Content::article_meta_date();
            }

            if (is_array($meta_options) && in_array('show_update_date', $meta_options)) {

                $meta_content .= Rocksite_Component_Content::article_meta_update();
            }

            if (is_array($meta_options) && in_array('show_author', $meta_options)) {

                $meta_content .= Rocksite_Component_Content::author_line();
            }

            if (is_array($meta_options) && in_array('show_comments_count', $meta_options)) {

                $meta_content .= Rocksite_Component_Content::comments_count();
            }


            if ($meta_options == 1) {

                $meta_content .= Rocksite_Component_Content::article_meta_date();
                $meta_content .= Rocksite_Component_Content::article_meta_update();
                $meta_content .= Rocksite_Component_Content::author_line();
                $meta_content .= Rocksite_Component_Content::comments_count();

            }


            // show only in the content or only in the header

            $single_header_layout = esc_attr(Rocksite_Settings::get('single_header_layout'));

            if ($html === true) {
                if ($context == 'list' || ($single_header_layout != '1' && $context == 'content') || ($single_header_layout == 1 && $context == 'header')) {


                    Rocksite_Component_Content::article_meta($meta_content);

                }
            } else {


                if ($echo == false) {

                    return $meta_content;

                } else {

                    echo $meta_content;

                }


            }


        }

        /**
         * Displays related posts component
         *
         * @param int $display_post_limit
         */

        public function action_related_posts($display_post_limit = 6)
        {

            global $post;

            $category = get_the_category();

            // To DO: check if there should be option panel


            $limit = 6;


            $display_post_limit = $limit ? $limit : $display_post_limit;

            if (isset($category[0]->cat_ID)) {


                $query = Rocksite_Queries::related_post($category[0]->cat_ID, $post->ID, $display_post_limit);

                if ($query->found_posts > 0) {

                    $show_related_posts = esc_attr(Rocksite_Settings::get('show_related_posts', true));

                    if ($show_related_posts) {

                        Rocksite_Component_Content::related_posts($query);

                    }


                }

                wp_reset_postdata();
            }

        }


        /**
         * Displays single author info below the content
         */

        public function action_author_box()
        {


            if (is_singular() && get_the_author_meta('description') && is_multi_author()) {

                get_template_part('views/content/snippet-author-info');

            }


        }

        /**
         * Displays entry tags below the content
         */

        public function action_entry_tags()
        {

            $type = Rocksite_Helper::get_content_type();
            $show_tags = esc_attr(Rocksite_Settings::get($type . 'show_entry_tags', true));

            if ($show_tags && has_tag()) {

                Rocksite_Component_Content::entry_tags();

            }

        }


    }
}



