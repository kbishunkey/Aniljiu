<?php
/**
 * The default template for displaying content in loop - template with sidebar.
 */
?>
<article id="post-<?php the_ID(); ?>" <?php post_class('rocksite-o-content -article-short'); ?>>

    <?php //smartlib_post_thumbnail_block('rocksite-content-wide', 'blog_loop') ?>


    <header class="rocksite-o-content__header">

        <?php
        rocksite_category_post('rocksite-o-content__header__categories');
        ?>

        <h3 class="rocksite-o-content__header__title rocksite-a-heading -h3">
            <a href="<?php the_permalink(); ?>"
               title="<?php echo esc_attr(sprintf(__('Permalink to %s', 'genui'), the_title_attribute('echo=0'))); ?>"
               rel="bookmark"><?php the_title(); ?></a>
        </h3>
        <?php rocksite_action_meta_post('list', true, true) ?>


    </header>
    <?php
    if (has_post_thumbnail()) {
        ?>
        <div class="rocksite-o-content__featured-image">
            <?php the_post_thumbnail('rocksite_large_square'); ?>
        </div>
        <?php
    }


        ?>
        <div class="rocksite-o-content__entry entry-content">
            <?php
            if (!is_search()) {

                the_content(__('Read More', 'genui') . '<i class="la la-long-arrow-right"></i>');

            }else {

                the_excerpt();

            }


            ?>
        </div>
    <?php

    ?>



</article>

