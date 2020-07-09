<?php


// Registering Elementor core locations


function genui_register_elementor_locations($elementor_theme_manager)
{

    $elementor_theme_manager->register_location('header');
    $elementor_theme_manager->register_location('footer');

}


add_action('elementor/theme/register_locations', 'genui_register_elementor_locations');


add_action('wp_enqueue_scripts', 'add_required_stylesheets', 20);

function add_required_stylesheets()
{

    global $post;


    if (function_exists('elementor_theme_do_location')) {


        // deregister main styles when page is editiong in elementor and elementor_canvas is selected

        if (\Elementor\Plugin::$instance->db->is_built_with_elementor($post->ID) && get_page_template_slug()=='elementor_canvas') {

            wp_dequeue_style('genui-main');

        }


    }


}


