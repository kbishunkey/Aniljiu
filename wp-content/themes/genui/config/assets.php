<?php
return array(

    // Section: Logo

    'styles' => array(
        'lineawesome-main'        => array(
            'path_full'=>'vendors/line-awesome/css/line-awesome.css',
            'path'=>'vendors/line-awesome/css/line-awesome.min.css',
            'media' => '',
            'deps' => array(), //deps same as option name
        ),


        'genui-root-variables'        => array(
            'path_full'=>'css/full/root-variables.css',
            'path'=>'css/root-variables.min.css',
            'media' => '',
        ),



        'genui-main'        => array(
            'path_full'=>'css/full/screen.css',
            'path'=>'css/screen.min.css',
            'deps' => array('genui-custom-fonts', 'lineawesome-main', 'genui-root-variables'), //deps same as option name
            'media' => '',
        ),

    ),

    'scripts' => array(

        'genui-main'        => array(
            'path_full'=>'js/full/main.js',
            'path'=>'js/main.min.js',
            'deps' => array('jquery'),
            'in_footer' => false
        ),
    )


);