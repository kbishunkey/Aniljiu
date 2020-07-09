<a class="skip-link screen-reader-text" href="#content"><?php _e('Skip to content', 'genui') ?></a>
<?php rocksite_get_template_part( 'views/sections/top-bar', 'topbar_display' ) ?>

<!-- Main Header -->
<header class="rocksite-s-main-header -border-bottom<?php rocksite_main_navbar_features()?>">
    <div class="container">

        <nav class="rocksite-o-navbar-main u-fill-overlay js-menu-to-resize">

            <div class="rocksite-o-navbar-main__header">
                <?php rocksite_logo(false); ?>
            </div>




            <?php

            rocksite_action_get_menu ('main_menu', 'rocksite-o-navbar-main__main-menu -dropdown-menu --mobile-dropdown js-mobile-menu', 'rocksite-m-nav-menu', 3);

            ?>

            <div class="rocksite-o-navbar-main__toggle-menu">

                <?php rocksite_action_toggle_search_menu() ?>

            </div>

            <div class="rocksite-o-navbar-main__search-bar js-search-box-to-expand u-hidden u-fill-overlay__inner -right">
                <?php rocksite_search_navbar() ?>
            </div>
        </nav>



    </div>
</header>
<?php rocksite_action_header_page() ?>

<div id="content"></div>