<?php
/**
 * The template for displaying Archive pages.
 */


get_header();

rocksite_action_content_header('archive');

?>
<section class="rocksite-s-content">
    <div class="container">
        <div <?php rocksite_filter_layout_class('rocksite-t-content-layout') ?>>
            <?php if (have_posts()) : ?>

                <!-- #main content area -->
                <div role="main"
                     class="rocksite-t-content-layout__content">
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
                    ?>
                </div><!-- END #main content area -->


            <?php else : ?>
                <?php get_template_part('views/content', 'none'); ?>
            <?php endif; ?>
            <?php rocksite_action_get_sidebar(); ?>

        </div>
    </div>
</section>

<?php get_footer(); ?>
