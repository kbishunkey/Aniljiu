<?php


if (!class_exists('Rocksite_Component_Content')) {

    /**
     * Class generates content components
     */
    class Rocksite_Component_Content {

        protected static $instance;


        private function __construct() {

        }

        public static function page_header_title( $subtitle ) {

            global $post;
            ?>
            <h1 class="rocksite-o-content-header__title"><?php the_title() ?>
                <?php if (strlen($subtitle) > 0) { ?>
                    <small><?php echo $subtitle ?></small>
                    <?php
                }
                ?>
            </h1>
            <?php
        }

        /**
         * Archive header title & category description component
         *
         * @param $category_description
         */

        public static function archive_header_title( $title, $category_description ) {

            global $post;
            ?>
            <h1 class="rocksite-o-content-header__title"><?php echo $title ?>
                <?php if (strlen($category_description) > 0) { ?>
                    <small><?php echo $category_description ?></small>
                    <?php
                }
                ?>
            </h1>
            <?php
        }

        /**
         * Single header title
         *
         */

        public static function single_header_title() {
            ?>
            <h1 class="rocksite-o-content-header__title"><?php the_title() ?></h1>
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

        public static function content_featured_video( $video_url ) {

            global $post;

            $oembed = wp_oembed_get( $video_url );



            ?>
            <div class="rocksite-o-content__featured-video">
                <?php

                if ( $oembed ) {
                    echo $oembed;
                }

                ?>
            </div>
            <?php

        }

        public static function content_page_title() {

            global $post;

            ?>

            <h1 class="rocksite-o-content__title"><?php the_title() ?></h1>

            <?php

        }

        /**
         * Displays article meta
         *
         * @param string $content
         */

        public static function article_meta( $content = '' ) {
            ?>
            <div class="rocksite-o-content__header__meta"><?php echo $content; ?></div>
            <?php
        }

        /**
         * Displays article header
         */

        public static function article_header($meta_content, $category_content='') {

            ?>
            <header class="rocksite-o-content__header">

                <?php
                if(strlen($category_content)>0) {
                    ?>
                    <div class="rocksite-o-content__header__category">
                        <?php echo $category_content ?>
                    </div>
                    <?php
                }
                ?>

            <h1 class="rocksite-o-content__header__title"><?php the_title() ?></h1>
                <div class="rocksite-o-content__header__meta"><?php echo $meta_content ?></div>
            </header>
            <?php
        }


        /*
         * Displays published date
         */

        public static function article_meta_date() {

            $time_string = '<time class="entry-date published updated" datetime="%1$s">%2$s</time>';


            if (get_the_time('U') !== get_the_modified_time('U')) {
                $time_string = '<time class="entry-date published" datetime="%1$s">%2$s</time>';
            }

            $time_string = sprintf($time_string, esc_attr(get_the_date('c')), esc_html(get_the_date()), esc_attr(get_the_modified_date('c')), esc_html(get_the_modified_date()));

            $archive_year = esc_attr( get_the_time('Y') );
            $archive_month = esc_attr( get_the_time('m') );
            $archive_day = esc_attr( get_the_time('d') );
            $day_link = esc_url( get_day_link($archive_year, $archive_month, $archive_day) );


            return sprintf('<span class="rocksite-m-meta-label"><i class="la la-calendar"></i> <a href="%1$s" rel="bookmark">%2$s</a></span>',

                $day_link, $time_string);

        }

        /**
         * Displays update date
         * @return string
         */

        public static function article_meta_update() {

            $time_string = '<time class="last-updated" datetime="%1$s">%2$s</time>';


            $time_string = sprintf($time_string, esc_attr(get_the_modified_date('c')), esc_html(get_the_modified_date()));

            return '<span class="rocksite-m-meta-label"><em>'. __('Last updated on', 'genui').':</em> <strong>'.$time_string.'</strong></span>';

        }

        /**
         * Displays categories list
         * @return string
         */

        public static function category_line($container_class) {

            $categories = get_the_category();

            $category_content = '';

            if (count($categories) > 0) {

                $category_content .= '<div class="'.$container_class.'">';

                foreach ( $categories as $category ) {

                    $category_content .= '<a class="rocksite-a-chips-label" href="'. esc_url( get_category_link( $category->term_id ) ).'">'.$category->name.'</a>';

                }

                $category_content .= '</div>';
            }

            echo $category_content;
        }

        /**
         * Displays post format
         * @return string
         */

        public static function post_format() {

            global $post;

            $post_format = get_post_format($post->ID);

            return '<span class="rocksite-m-thumbnail__icon-label rocksite-a-label -color -info"><i class="fa-li fa fa-check-square">' . $post_format . '</i></span>';

        }

        /**
         * Displays Comments Counter & Link
         * @return string
         */

        public static function comments_count() {

            return '<a href="' . esc_url( get_comments_link() ) . '" class="rocksite-a-button -icon-link"><i class="la la-comments" data-toggle="tooltip"
                                                            data-placement="top" title=""
                                                            data-original-title="Comments"></i> ' . get_comments_number() . '
                                                            </a>';

        }

        /**
         * Displays Author Line
         * @return string/null
         */

        public static function author_line() {

            if( strlen(get_the_author_link())>0) {

                return '<span class="rocksite-m-meta-label">' . __('Published by: ', 'genui') . get_the_author_link() . '</span>';

            }

        }

        /**
         * Template for comments and pingbacks.
         */

        public static function comment_template( $comment, $args, $depth ) {

            switch ( $comment->comment_type ) :
                case 'pingback' :
                case 'trackback' :
                    // Display trackbacks differently than normal comments.
                    ?>
                    <li <?php comment_class(); ?> id="comment-<?php comment_ID(); ?>">
                    <p><?php _e('Pingback:', 'genui'); ?><?php comment_author_link(); ?><?php edit_comment_link(__('(Edit)', 'genui'), '<span class="edit-link">', '</span>'); ?></p>
                    <?php
                    break;
                default :
                    // Proceed with normal comments.
                    global $post;
                    ?>
                    <li <?php comment_class(); ?> id="li-comment-<?php comment_ID(); ?>">
                    <article id="comment-<?php comment_ID(); ?>" class="rocksite-o-comments__content">
                        <header class="rocksite-o-comments__content__header">
                            <?php
                            $user_photo = esc_url( get_user_meta($comment->user_id, 'smartlib_profile_image', true) );
                            if ( !empty( $user_photo ) ) {
                                ?>
                                <div class="rocksite-o-comments__content__header__avatar"><img
                                        src="<?php echo $user_photo ?>"
                                        alt="User" width="44" height="44"
                                        class="rocksite-a-avatar"/></div>
                                <?php

                            } else
                            ?>
                            <div class="rocksite-o-comments__content__header__avatar">
                                <?php echo get_avatar($comment, 44);
                                ?>
                            </div>
                            <?php
                            printf('<cite class="rocksite-o-comments__content__header__author">%1$s %2$s</cite>', get_comment_author_link(), // If current post author is also comment author, make it known visually.
                                ( $comment->user_id === $post->post_author ) ? '<span> ' . __('Post author', 'genui') . '</span>' : '');
                            printf('<div class="rocksite-o-comments__content__header__date"><a href="%1$s"><time datetime="%2$s">%3$s</time></a></div>', esc_url(get_comment_link($comment->comment_ID)), get_comment_time('c'), /* translators: 1: date, 2: time */
                                sprintf(__('%1$s at %2$s', 'genui'), get_comment_date(), get_comment_time()));
                            ?>
                            <?php edit_comment_link(__('Edit', 'genui'), '<div class="rocksite-o-comments__content__edit">', '</div>'); ?>
                        </header>
                        <!-- .comment-meta -->

                        <?php if ('0' == $comment->comment_approved) : ?>
                            <p class="comment-awaiting-moderation"><?php _e('Your comment is awaiting moderation.', 'genui'); ?></p>
                        <?php endif; ?>

                        <section class="comment-content comment">
                            <?php comment_text(); ?>
                        </section>
                        <!-- .comment-content -->

                        <div class="reply rocksite-o-comments__content__replay">
                            <?php
                            echo preg_replace('/comment-reply-link/', 'comment-reply-link ' . 'rocksite-a-button -primary -small',

                                get_comment_reply_link(array_merge($args, array( 'reply_text' => __('Reply', 'genui'), 'depth' => $depth, 'max_depth' => $args[ 'max_depth' ] ))), 1);

                            //comment_reply_link( array_merge( $args, array( , 'depth' => $depth, 'max_depth' => $args['max_depth'] ) ) );
                            ?>
                        </div>
                        <!-- .reply -->
                    </article>
                    <!-- #comment-## -->
                    <?php
                    break;
            endswitch; // end comment_type check
            //
        }

        /**
         * Prints tag line with HTML
         */
        public static function entry_tags() {
            ?>
            <div class="rocksite-o-content__footer">
                <div class="rocksite-m-chips-list">
                    <?php the_tags('<span class="rocksite-m-chips-list__label"><i class="la la-tags"></i> '.__('Tags: ', 'genui').'</span><span class="rocksite-m-chips-list__item">', ', ','</span>'); ?></div>
            </div>
            <?php

        }

        /**
         * Related posts box
         *
         * @param $query
         */

        public static function related_posts( $query  ) {

            ?>

             <h3 class="rocksite-a-heading -h3 u-margin-bottom-50"><?php _e('Related posts', 'genui') ?></h3>

                <div class="rocksite-o-grid-boxes -columns-3">

                    <div class="rocksite-o-grid-boxes__wrapper">

                        <?php

                        while ( $query->have_posts() ) {
                            $query->the_post();

                            $post_format = get_post_format();

                            ?>

                            <div class="rocksite-o-grid-boxes__wrapper__item">
                                <div class="rocksite-m-card -text-box">

                                    <div class="rocksite-m-card__content">

                                        <h5 class="rocksite-m-card__content__title"><a href="<?php the_permalink() ?>"><?php the_title() ?></a></h5>

                                        <?php rocksite_action_meta_post('list', true, true) ?>
                                        <div class="rocksite-m-card__content__button">
                                            <a href="<?php the_permalink() ?>" class="rocksite-a-button-icon"><i class="la la-arrow-right"></i>
                                            </a>


                                        </div>
                                    </div>

                                    <div class="rocksite-m-card__thumbnail">

                                        <?php the_post_thumbnail('rocksite_medium_wide'); ?>

                                    </div>

                                </div>
                            </div>

                            <?php


                        }// end while


                        ?>
                    </div>
                </div>



            <?php
        }

        /**
         * Portfolio gallery slider component
         *
         * @param $img_array
         */

        public static function portfolio_gallery_slider( $img_array ) {

            ?>
            <div class="rocksite-o-slider-box -large-arrows js-flexslider">
                <ul class="rocksite-o-slider-box__list slides">

                    <?php


                    foreach ($img_array as $row) {
                        $full_img = wp_get_attachment_image_src($row, 'full');
                        $thumb_img = wp_get_attachment_image_src($row, 'rocksite-medium-image-portfolio');
                        ?>
                        <li>
                            <div
                                class=" rocksite-m-thumbnail">


                                <a href="<?php echo $full_img[ 0 ] ?>"
                                   rel="rocksite-resize-photo[portfolio1]">


                                    <img
                                        src="<?php echo $thumb_img[ 0 ] ?>"
                                        alt="<?php echo esc_attr( get_post_meta($row, '_wp_attachment_image_alt', true) ); ?>"
                                        draggable="false"></a></div>
                        </li>
                        <?php
                    }
                    ?>

                </ul>
            </div>
            <?php


        }

        /**
         * Portfolio technologies list component
         *
         * @param $technologies
         */

        public static function portfolio_technologies_list( $technologies ) {
            ?>
            <h5><?php _e('Technologies:', 'genui') ?></h5>

            <ul class="rocksite-m-list -horizontal -primary">

                <?php
                foreach ($technologies as $term) {
                    ?>
                    <li class="rocksite-m-list__item u-small">
                        <i class="fa fa-check-circle"></i> <?php echo esc_attr( $term->name ) ?>
                    </li>
                    <?php
                }
                ?>

            </ul>

            <?php


        }

        /**
         * Single detail of portfolio work
         *
         * @param $header
         * @param $data
         */

        public static function portfolio_detail( $header, $data ) {

            ?>
            <h5><?php echo $header ?></h5>

            <p><?php echo $data ?></p>
            <?php

        }

        /**
         * Displays portfolio link
         *
         * @param $header
         * @param $anchor_text
         * @param $link
         */

        public static function portfolio_external_link( $header, $anchor_text, $link ) {

            ?>
            <h5><?php echo $header ?></h5>

            <p><a href="<?php echo $link ?>" target="_blank"><?php echo esc_html( $anchor_text ) ?></a></p>
            <?php

        }

        /**
         * Related portfolio box works
         * @param $query
         * @param $columns_per_slide
         * @param $limit
         */


        public static function related_portfolio( $query, $columns_per_slide, $limit ) {

            ?>


            <h3 class="rocksite-a-heading -h3 u-margin-bottom-50"><?php _e('Related posts', 'genui') ?></h3>

            <div class="rocksite-o-grid-boxes -columns-3">

            <div class="rocksite-o-grid-boxes__wrapper">
                        <?php

                        while ($query->have_posts()) {
                            $query->the_post();
                            ?>
                            <div class="rocksite-o-grid-boxes__wrapper__item">


                                <div class="rocksite-o-grid-boxes__wrapper__item">
                                    <div class="rocksite-m-card -text-box">

                                        <div class="rocksite-m-card__content">

                                            <h5 class="rocksite-m-card__content__title"><a href="<?php the_permalink() ?>"><?php the_title() ?></a></h5>

                                            <?php rocksite_action_meta_post('list', true, true) ?>
                                            <div class="rocksite-m-card__content__button">
                                                <a href="<?php the_permalink() ?>" class="rocksite-a-button-icon"><i class="la la-arrow-right"></i>
                                                </a>


                                            </div>
                                        </div>

                                        <div class="rocksite-m-card__thumbnail">

                                            <?php the_post_thumbnail('rocksite_thumbnail_square'); ?>

                                        </div>

                                    </div>
                                </div>

                            </div>

                          <?php

                        }// end while

                        wp_reset_postdata()

                        ?>
                    </ul>
                </div>



            <?php

        }

    }


}