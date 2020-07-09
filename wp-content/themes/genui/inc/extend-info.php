<?php


use WPTRT\Customize\Section\Button;

/*
 * Register genui activation function
 */
add_action('admin_menu', 'genui_theme_activation_options', 999);

/*
 * Create the function that build menu
 */

function genui_theme_activation_options()
{
    add_theme_page(__('Genui Pro', 'genui'), __('Genui Pro', 'genui'), 'manage_options', 'bootframe_activation', 'genui_activation_display');

}

/*
 * Create a function that displays the contents of the options page
 */

function genui_activation_display()
{
    if (!current_user_can('manage_options')) {
        wp_die(__('You do not have sufficient permissions to access this page.', 'genui'));
    }


    ?>
    <div class="wrap">
        <h2><?php _e('Genui Premium', 'genui') ?></h2>


        <div class="welcome-panel">
            <h1 style="font-size: 36px; line-height: 1.2; max-width: 1200px"><?php _e('Need advanced layouts and theme support? Learn more about Genui Premium!', 'genui') ?></h1>

            <p class="about-description" style="padding-top: 20px"><a
                    href="https://rocksite.pro/genui/panel-redirect/" target="_blank">Genui
                    Premium</a> <?php _e('adds exciting new customization features to the Customizer and other powerful customization tools like shortcodes or layout options.', 'genui') ?>
            </p>

            <div id="col-container" style="padding-top: 50px;">
                <div id="col-left" style="float: left">
                    <div class="col-wrap">
                        <h2 style=""><?php _e('Listed below are only the extras that the paid version brings:', 'genui'); ?></h2>
                        <ul style="list-style-type:disc; padding: 10px 20px;margin-left: 20px">
                            <li><?php _e('Advanced Elementor Integration', 'genui'); ?></li>
                            <li><?php _e('One Click Demo Import', 'genui'); ?></li>
                            <li><?php _e('All UI components documented in the Style Kit', 'genui'); ?></li>
                            <li><?php _e('More Gutenberg componets: Sections, Sliders, Accordions', 'genui'); ?></li>
                            <li><?php _e('SCSS, gulp and living style kit', 'genui'); ?></li>
                            <li><?php _e('Source files included', 'genui'); ?></li>
                            <li><?php _e('Incredible Support', 'genui'); ?></li>
                            <li><?php _e('and much more...', 'genui'); ?></li>
                        </ul>
                    </div>
                </div>
                <div id="col-right">
                    <div class="col-wrap">
                        <img src="<?php echo esc_url(get_template_directory_uri()) ?>/assets/img/genui-screen-play.gif"
                             alt="Genui Pro" style="max-width: 100%;margin-top: 60px"/>
                    </div>
                </div>
            </div>
            <p><a href="https://rocksite.pro/genui/panel-redirect/"
                  class="button button-primary button-hero"
                  target="_blank"><?php _e('More Info', 'genui') ?> &raquo;</a></p></p>

        </div>

    </div>
<?php }





add_action( 'customize_register', function( $manager ) {

    require_once ROCKSITE_THEME_CLASSES . 'vendors/customize-section-button/src/Button.php';

    $manager->register_section_type( Button::class );

    $manager->add_section(
        new Button( $manager, 'genui_pro', [
            'title'       => __( 'Genui Pro version', 'genui' ),
            'button_text' => __( 'Upgrade',        'genui' ),
            'button_url'  => 'https://rocksite.pro/genui/customizer-redirect/',
            'priority' => 1
        ] )
    );

} );


add_action( 'customize_controls_enqueue_scripts', function() {

    $version = wp_get_theme()->get( 'Version' );

    wp_enqueue_script(
        'wptrt-customize-section-button',
        get_theme_file_uri( 'inc/classes/vendors/customize-section-button/public/js/customize-controls.js' ),
        [ 'customize-controls' ],
        $version,
        true
    );

    wp_enqueue_style(
        'wptrt-customize-section-button',
        get_theme_file_uri( 'inc/classes/vendors/customize-section-button/public/css/customize-controls.css' ),
        [ 'customize-controls' ],
        $version
    );

} );