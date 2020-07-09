<div <?php rocksite_content_header_class('rocksite-o-page-header')?>  <?php rocksite_content_header_styles() ?>>

    <div class="rocksite-o-page-header__breadcrumbs">
        <div class="container"><?php rocksite_breadcrumbs('-invert'); ?></div>
    </div>


        <div class="rocksite-m-cover-header rocksite-o-page-header__cover-header">
            <div class="rocksite-m-cover-header__image">
                <?php the_post_thumbnail('full') ?>
            </div>
            <div class="rocksite-m-cover-header__wrapper">

                <div class="rocksite-m-cover-header__wrapper__content">

                    <h1 class="rocksite-m-cover-header__wrapper__content__title">
                        <?php the_title() ?>
                    </h1>


                </div>
                <div class="rocksite-m-cover-header__wrapper__scroll">
                    <a href="#scroll-to-container-content" class="js-scroll-down rocksite-a-button-icon"><i class="la la-arrow-down"></i>
                    </a>
                </div>
            </div>
        </div>
        <div id="scroll-to-container-content"></div>
</div>
