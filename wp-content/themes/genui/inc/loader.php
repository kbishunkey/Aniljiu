<?php



// library vendor
require_once ROCKSITE_THEME_CLASSES . 'vendors/class-bem-menu-walker.php';
require_once ROCKSITE_THEME_CLASSES . 'vendors/class-social-menu-walker.php';

// library
require_once ROCKSITE_THEME_CLASSES . 'class-config.php';
require_once ROCKSITE_THEME_CLASSES . 'class-helper.php';
require_once ROCKSITE_THEME_CLASSES . 'class-queries.php';
require_once ROCKSITE_THEME_CLASSES . 'class-base.php';
require_once ROCKSITE_THEME_CLASSES . 'class-customizer.php';
require_once ROCKSITE_THEME_CLASSES . 'class-rocksite-admin.php';


// components

require_once ROCKSITE_THEME_CLASSES . 'components/class-nav.php';
require_once ROCKSITE_THEME_CLASSES . 'components/class-content.php';
require_once ROCKSITE_THEME_CLASSES . 'components/class-layout.php';



// core classes
require_once ROCKSITE_THEME_CLASSES . 'class-widgets.php';
require_once ROCKSITE_THEME_CLASSES . 'class-layout.php';
require_once ROCKSITE_THEME_CLASSES . 'class-setup.php';
require_once ROCKSITE_THEME_CLASSES . 'class-assets.php';
require_once ROCKSITE_THEME_CLASSES . 'class-content.php';
require_once ROCKSITE_THEME_CLASSES . 'class-navigation.php';
require_once ROCKSITE_THEME_CLASSES . 'class-rocksite.php';
require_once ROCKSITE_THEME_CLASSES . 'class-settings.php';

// Theme functions

require_once ROCKSITE_THEME_FUNCTIONS . 'theme-hooks.php';
require_once ROCKSITE_THEME_FUNCTIONS . 'theme-functions.php';


// Integrations

require_once ROCKSITE_THEME_INTEGRATIONS . 'shared-counts.php';
require_once ROCKSITE_THEME_INTEGRATIONS . 'woocommerce.php';
require_once ROCKSITE_THEME_INTEGRATIONS . 'visual-portfolio.php';
require_once ROCKSITE_THEME_INTEGRATIONS . 'lightbox-photoswipe.php';
require_once ROCKSITE_THEME_INTEGRATIONS . 'elementor.php';


// extend

if( file_exists (ROCKSITE_THEME_EXTEND. 'extend-loader.php')){

    require_once ROCKSITE_THEME_EXTEND. 'extend-loader.php';

} else {

    require_once ROCKSITE_THEME_INTEGRATIONS . 'tgm.php';

}

if( file_exists ( ROCKSITE_THEME_LIB .'/extend-info.php' )){

    require_once 'extend-info.php';

}
