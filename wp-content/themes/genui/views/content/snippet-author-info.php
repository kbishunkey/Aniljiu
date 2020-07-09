<div class="rocksite-o-content__author">
<div class="rocksite-m-media" itemprop="author" itemscope="itemscope" itemtype="http://schema.org/Person">
    <div class="rocksite-m-media__thumbnail"><?php echo get_avatar(get_the_author_meta('user_email'), apply_filters('smartlib_author_bio_avatar_size', 68)); ?></div>

    <div class="rocksite-m-media__content">

        <!-- .author-avatar -->

            <h5 class="rocksite-m-media__content__title"><?php printf(__('About %s', 'genui'), get_the_author()); ?></h5>

            <div class="rocksite-m-media__content__description"><?php the_author_meta('description'); ?></div>

        <!-- .author-description	-->
        <div class="rocksite-m-media__content__button">
            <a href="<?php echo esc_url(get_author_posts_url(get_the_author_meta('ID'))); ?>" rel="author" class="rocksite-a-button -primary -small">
                <?php printf(__('View all posts by %s <span class="icon-chevron-sign-right"></span>', 'genui'), get_the_author()); ?>
            </a>
        </div>
    </div>
</div><!-- .rocksite-author-description -->
    </div>
