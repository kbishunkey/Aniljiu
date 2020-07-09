<?php


if (!class_exists('Rocksite_Setup')) {

    /**
     * Root Class for initialize
     */
    class Rocksite_Setup extends Rocksite_Base {

        public $sidebars;


        public function __construct( $config, $settings ) {

            parent::__construct($config, $settings);



            $this->hooks();

            $this->run_adds();



        }

        public function hooks() {

            $this->add_action('widgets_init', $this, 'register_simple_block_action');

            $this->add_filter('body_class', $this, 'body_class_modyficator', 2, 2);

        }

        public function theme_setup() {


            load_theme_textdomain('genui', ROCKSITE_THEME_DIR . '/languages');

            // Gutenberg wide images
            add_theme_support('align-wide');

            // Add default posts and comments RSS
            add_theme_support('automatic-feed-links');

            // Document title.
            add_theme_support('title-tag');

            //Adding Custom Logo support


            add_theme_support( 'custom-logo', $this->config->get_logo_attributes() );

            // Support for Post Thumbnails
            add_theme_support('post-thumbnails');

            // Add support for editor styles.

            add_theme_support( 'editor-styles' );

            add_editor_style( 'assets/css/editor.min.css' );

            // register all thumbnails sizes

            $this->add_image_sizes();

            $GLOBALS['content_width'] = apply_filters( 'rocksite_content_width', 1200 );

            // Register all nav menu locations

            register_nav_menus($this->config->get_menus_locations());

            // Add support for responsive embedded content.
            add_theme_support( 'responsive-embeds' );


            // Custom background color

            add_theme_support( 'custom-background', array(
                'default-color'	=> 'FFFFFF'
            ) );


            add_theme_support( 'editor-color-palette', array(
                array(
                    'name' => __( 'Primary', 'genui' ),
                    'slug' => 'color-primary',
                    'color' => get_theme_mod('color-primary', $this->config->get_project_variables('color-primary')),
                ),
                array(
                    'name' => __( 'Secondary', 'genui' ),
                    'slug' => 'color-secondary',
                    'color' => get_theme_mod('color-secondary', $this->config->get_project_variables('color-secondary')),
                ),
                array(
                    'name' => __( 'Warning', 'genui' ),
                    'slug' => 'color-warning',
                    'color' => get_theme_mod('color-warning', $this->config->get_project_variables('color-warning')),
                ),

                array(
                    'name' => __( 'Success', 'genui' ),
                    'slug' => 'color-success',
                    'color' => get_theme_mod('color-success', $this->config->get_project_variables('color-success')),
                ),
                array(
                    'name' => __( 'Gray 1', 'genui' ),
                    'slug' => 'color-gray-1',
                    'color' => get_theme_mod('color-gray-1', $this->config->get_project_variables('color-gray-1')),
                ),
                array(
                    'name' => __( 'Gray 2', 'genui' ),
                    'slug' => 'color-gray-2',
                    'color' => get_theme_mod('color-gray-2', $this->config->get_project_variables('color-gray-2')),
                ),
                array(
                    'name' => __( 'Gray 3', 'genui' ),
                    'slug' => 'color-gray-3',
                    'color' => get_theme_mod('color-gray-3', $this->config->get_project_variables('color-gray-3')),
                ),
                array(
                    'name' => __( 'Gray 4', 'genui' ),
                    'slug' => 'color-gray-4',
                    'color' => get_theme_mod('color-gray-4', $this->config->get_project_variables('color-gray-4')),
                ),

                array(
                    'name' => __( 'Dark Gray 1', 'genui' ),
                    'slug' => 'color-dark-gray-1',
                    'color' => get_theme_mod('color-dark-gray-1', $this->config->get_project_variables('color-dark-gray-1')),
                ),

                array(
                    'name' => __( 'Dark Gray 2', 'genui' ),
                    'slug' => 'color-dark-gray-2',
                    'color' => get_theme_mod('color-dark-gray-2', $this->config->get_project_variables('color-dark-gray-2')),
                ),
                array(
                    'name' => __( 'Text', 'genui' ),
                    'slug' => 'color-text',
                    'color' => get_theme_mod('color-text', $this->config->get_project_variables('color-text')),
                ),
                array(
                    'name' => __( 'Text Color Ligten', 'genui' ),
                    'slug' => 'color-text-lighten',
                    'color' => get_theme_mod('color-text-lighten', $this->config->get_project_variables('color-text-lighten')),
                ),



                array(
                    'name' => __( 'Invert Color', 'genui' ),
                    'slug' => 'color-invert',
                    'color' => get_theme_mod('color-invert', $this->config->get_project_variables('color-invert')),
                ),
            ) );

            // Adds support for editor font sizes.

            add_theme_support( 'editor-font-sizes', array(
                array(
                    'name'      => __( 'XX - small', 'genui' ),
                    'shortName' => __( 'S', 'genui' ),
                    'size'      => 10,
                    'slug'      => 'xx-small'
                ),
                array(
                    'name'      => __( 'X - small', 'genui' ),
                    'shortName' => __( 'M', 'genui' ),
                    'size'      => 13,
                    'slug'      => 'small'
                ),
                array(
                    'name'      => __( 'Small', 'genui' ),
                    'shortName' => __( 'L', 'genui' ),
                    'size'      => 15,
                    'slug'      => 'small'
                ),
                array(
                    'name'      => __( 'Large', 'genui' ),
                    'shortName' => __( 'XL', 'genui' ),
                    'size'      => 20,
                    'slug'      => 'large'
                ),
                array(
                    'name'      => __( 'X - Large', 'genui' ),
                    'shortName' => __( 'XR', 'genui' ),
                    'size'      => 25,
                    'slug'      => 'x-large'
                ),
                array(
                    'name'      => __( 'XX - Large', 'genui' ),
                    'shortName' => __( 'XRL', 'genui' ),
                    'size'      => 30,
                    'slug'      => 'xx-large'
                )
            ) );


        }

        /**
         * Ads images sizes based on default settings
         */

        public function add_image_sizes() {

            $sizes = $this->config->get_image_sizes();

            foreach ($sizes as $size => $attributes) {

                add_image_size( $size, $attributes[ 0 ], $attributes[ 1 ], $attributes[ 2 ] );

            }

        }


        /**
         * Register sidebars from the config
         */

        public function register_simple_block_action() {

            $this->sidebars = $this->config->get_sidebars();

            if (is_array($this->sidebars)) {

                foreach ($this->sidebars as $sidebar) {

                    register_sidebar($sidebar);

                }

            }

        }

        function body_class_modyficator($classes, $type='default'){

            global $post;

            $meta_option = '';



            /*check local page settings*/

            if(isset($post->ID)){



                $page_template = get_post_meta($post->ID, '_wp_page_template', true);


                if($page_template == 'templates/portfolio-list.php'){
                    $classes[] = 'page-portfolio-isotope';
                }

            }



            return $classes;
        }


    }

}