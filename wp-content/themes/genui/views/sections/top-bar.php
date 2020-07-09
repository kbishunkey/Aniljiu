<section class="rocksite-s-top-bar">
    <div class="container">
        <div class="rocksite-o-top-bar">
            <div class="rocksite-o-top-bar__language_menu">
                <?php
                rocksite_action_language_selector();
                ?>
            </div>
            <div class="rocksite-o-top-bar__nav_menu">
                <?php
                rocksite_action_get_menu('top_pages', 'rocksite-m-nav-menu -horizontal -invert -small');
                ?>
            </div>
            <div class="rocksite-o-top-bar__info u-text-inverted u-small">
                <?php rocksite_get_settings_text(__('Top bar info', 'genui'), 'topbar_info'); ?>
            </div>
            <div class="rocksite-o-top-bar__social-menu">
                <?php rocksite_action_get_menu('social_menu', 'rocksite-m-nav-menu -horizontal -classic-item'); ?>
            </div>

        </div>

    </div>


</section>