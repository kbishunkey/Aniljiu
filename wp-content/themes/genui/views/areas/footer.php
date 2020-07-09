<?php

if( is_active_sidebar('footer_sidebar')) {
    ?>
    <section class="rocksite-s-footer">
        <!--Footer sidebar-->
        <?php rocksite_action_footer_section_sidebar(); ?>
        <div class="container">
            <?php rocksite_action_get_menu('social_menu', 'rocksite-m-nav-menu -horizontal -classic-item'); ?>
        </div>
    </section>
    <?php
}
?>


<section class="rocksite-s-footer -invert">
    <div class="container">
        <div class="row">

            <div class="col-sm-6">
                <p class="rocksite-a-footer-info"><?php rocksite_get_settings_text(__('Footer Text', 'genui'), 'footer_copyright_text'); ?></p>

            </div>
            <div class="col-lg-6">
                <?php
                rocksite_action_get_menu('footer_pages', 'rocksite-m-nav-menu -horizontal -small u-flex-right');
                ?>
            </div>
        </div>

    </div>
</section>