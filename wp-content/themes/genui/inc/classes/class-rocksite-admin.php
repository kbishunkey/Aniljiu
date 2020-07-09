<?php



if (!class_exists('Rocksite_Admin')) {

    /**
     * Class For admin actions
     */
    class Rocksite_Admin extends Rocksite_Base{



        public $actions;


        public function __construct( $config, $settings ) {

            parent::__construct($config, $settings);

            $this->hooks();

            $this->run_adds();

        }

        public function hooks() {

            // WordPress hooks




            $this->add_action('admin_head', $this, 'action_editor_full_width_gutenberg');

            $this->add_action('admin_enqueue_scripts', $this, 'action_enqueue_fonts');
        }


        /**
         * Extend area of WordPress editor
         */


        function action_editor_full_width_gutenberg() {

            $layout = $this->config->default_settings('layout_variables');

            echo '<style>
            body.gutenberg-editor-page .editor-post-title__block, body.gutenberg-editor-page .editor-default-block-appender, body.gutenberg-editor-page .editor-block-list__block {
		        max-width: '. $layout['width'].'!important;

	        }
            .block-editor__container .wp-block:not([data-align="full"]):not([data-align="wide"]) {
            max-width: '. $layout['width'].'!important;

            }

              /*code editor*/
            .edit-post-text-editor__body {
    	        max-width: none !important;
    	        margin-left: 2%;
    	        margin-right: 2%;
            }
            </style>';
        }

        /**
         * Add external font
         */

        public function action_enqueue_fonts() {

            $fonts = $this->config->get_fonts();


            if (is_array($fonts)) {

                foreach ($fonts as $handle => $font) {

                    if (!is_customize_preview()) {



                        //font handler same as option name

                        if (isset( $font[ 1 ] )) {

                            wp_enqueue_style($handle, $font[ 1 ], array(), $this->config->version(), 'all');

                        }


                    }

                }

            }

        }






    }
}