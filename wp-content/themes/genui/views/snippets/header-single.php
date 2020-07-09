<section class="rocksite-s-default -invert -small-top-padding -border-top">
    <div class="container">
        <div class="rocksite-o-content-header">
            <div class="rocksite-o-content-header__breadcrumbs">
            <?php rocksite_breadcrumbs(); ?>
            </div>
        </div>
    </div>
</section>
<section <?php rocksite_content_header_class('rocksite-s-default -light-background -no-padding -border-top'); ?> <?php rocksite_content_header_styles() ?>>

    <div class="container">

        <div <?php rocksite_header_lead_class('rocksite-o-content-header  -article-lead', 'main');?>>


            <div class="rocksite-o-content-header__lead">
                <div class="rocksite-o-content-header__lead__header">

                    <?php
                    rocksite_category_post('rocksite-o-content-header__lead__header__categories');
                    ?>
                    <h2 class="rocksite-o-content-header__lead__header__title"> <?php the_title() ?></h2>
                    <div class="rocksite-o-content-header__lead__header__meta">
                        <?php rocksite_action_meta_post('header', false, true) ?>
                    </div>
                </div>

                <?php
                if (has_post_thumbnail()) {
                    ?>
                    <div class="rocksite-o-content-header__lead__thumbnail">
                        <?php the_post_thumbnail('rocksite_large_square') ?>
                    </div>
                <?php
                }
                ?>

            </div>
        </div>
    </div>

</section>
