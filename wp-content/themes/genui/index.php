<?php

/**
 * The main template file
 *
 */

get_header();
?>

    <section class="rocksite-s-content -margin-top">
        <div class="container rocksite-s-content__content">
            <div <?php rocksite_filter_layout_class('rocksite-t-content-layout') ?>>

                    <!-- #main content area -->
                    <div role="main"
                         class="rocksite-t-content-layout__content">
                        <?php

                        if ( is_search() ) {

                            global $wp_query;

                            $archive_title = sprintf(
                                '%1$s %2$s',
                                '<span class="color-accent">' . __( 'Search:', 'genui' ) . '</span>',
                                '&ldquo;' . get_search_query() . '&rdquo;'
                            );

                            if ( $wp_query->found_posts ) {
                                $archive_subtitle = sprintf(
                                /* translators: %s: Number of search results. */
                                    _n(
                                        'We found %s result for your search.',
                                        'We found %s results for your search.',
                                        $wp_query->found_posts,
                                        'genui'
                                    ),
                                    number_format_i18n( $wp_query->found_posts )
                                );
                            } else {
                                $archive_subtitle = __( 'We could not find any results for your search. You can give it another try through the search form below.', 'genui' );
                            }

                            ?>
                            <h1 class="rocksite-a-heading -h3"><?php echo wp_kses_post( $archive_title ); ?></h1>
                            <div class="rocksite-a-text -xx-large u-margin-bottom-50"><?php echo wp_kses_post( wpautop( $archive_subtitle ) ); ?></div>
                            <?php
                        }

                        if (have_posts()) {

                        ?>
                        <div class="rocksite-o-grid-boxes -columns-2">
                            <div class="rocksite-o-grid-boxes__wrapper">
                                <?php
                                /* Start the Loop */
                                while ( have_posts() ) : the_post();

                                    ?><div class="rocksite-o-grid-boxes__wrapper__item">
                                    <?php
                                    get_template_part('views/content/content', 'loop');
                                    ?>
                                    </div>
                                    <?php
                                endwhile;

                                ?>
                            </div>
                        </div>
                        <?php

                        // displays pagination based on settings

                        rocksite_action_archives_pagination();


                } else {

                    // If no content, include the "No posts found" template.
                    get_template_part('template-parts/content/content', 'none');

                }
                ?>
                    </div><!-- END #main content area -->
                <?php

                rocksite_action_get_sidebar();

                ?>
            </div>
        </div>
    </section>

<?php
get_footer();

