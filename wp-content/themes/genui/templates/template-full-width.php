<?php

/**
 * Template Name: Full Width Blank Page
 *
 */

get_header();

?>

<section class="rocksite-s-content">
    <article id="post-<?php the_ID(); ?>" <?php post_class('rocksite-o-content'); ?>>
    <?php

    while ( have_posts() ) : the_post();

        ?>
        <div role="main"
             class="rocksite-t-content-layout__boxed-content">
            <?php the_content(); ?>
        </div>

    <?php endwhile; // end of the loop.

    ?>
    </article>
</section>

<?php get_footer(); ?>
