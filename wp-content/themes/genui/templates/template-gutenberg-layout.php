<?php

/**
 * Template Name: Narrow Width Layout
 *
 */

get_header();

?>

<section class="rocksite-s-content">
    <div class="container">
        <div <?php rocksite_filter_layout_class('rocksite-t-content-layout', 'page') ?>>
            <article id="post-<?php the_ID(); ?>" <?php post_class('rocksite-o-content'); ?>>
                <div class="rocksite-o-content__gutenberg-layout">
                    <?php

                    while ( have_posts() ) : the_post();

                        ?>
                        <div role="main"
                             class="rocksite-t-content-layout__boxed-content">
                            <?php the_content(); ?>
                        </div>

                    <?php endwhile; // end of the loop.

                    ?>
                </div>
            </article>
        </div>
    </div>
</section>

<?php get_footer(); ?>
