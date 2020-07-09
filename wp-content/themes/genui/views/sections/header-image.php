<div class="rocksite-s-header-image">
<div class="rocksite-m-cover-header">
    <div class="rocksite-m-cover-header__image">
        <img src="<?php header_image(); ?>" width="<?php echo absint( get_custom_header()->width ); ?>" height="<?php echo absint( get_custom_header()->height ); ?>" alt="<?php echo esc_attr( get_bloginfo( 'name', 'display' ) ); ?>">
    </div>
    <div class="rocksite-m-cover-header__wrapper">

        <div class="rocksite-m-cover-header__wrapper__content">

            <h1 class="rocksite-m-cover-header__wrapper__content__title">
                <?php rocksite_get_settings_text(__('Default Website Title', 'genui'), 'header_image_title'); ?>
            </h1>
            <p class="rocksite-m-cover-header__wrapper__content__text"><?php rocksite_get_settings_text(__('Short description below the title. You can change it in the customizer', 'genui'), 'header_image_description'); ?></p>

        </div>
        <div class="rocksite-m-cover-header__wrapper__scroll">
            <a href="#scroll-to-container-content" class="js-scroll-down rocksite-a-button-icon"><i class="la la-arrow-down"></i>
            </a>
        </div>
    </div>
</div>
<div id="scroll-to-container-content"></div>
</div>