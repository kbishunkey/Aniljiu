<?php
/**
 * The default template for displaying single content.
 */
?>

<article id="post-<?php the_ID(); ?>" <?php post_class('rocksite-o-content -single-simple'); ?>>

    <?php rocksite_action_article_header('single-simple'); ?>



    <?php rocksite_action_featured_image('single-simple'); ?>


    <?php //smartlib_meta_post('blog_single') ?>

    <div class="rocksite-o-content__entry entry-content">
        <?php the_content();


        rocksite_post_pager();

        rocksite_entry_tags();
        ?>
    </div>

    <?php rocksite_author_box(); ?>



</article>

