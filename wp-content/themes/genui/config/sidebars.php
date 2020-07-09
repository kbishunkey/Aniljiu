<?php
return
    array(
        'main_sidebar' =>
        array(
            'name' =>  __('Main Sidebar', 'genui'),
            'id' => 'main_sidebar',
            'description' => __('Appears on  Front Page', 'genui'),
            'before_widget' => '<li><div id="%1$s" class="rocksite-o-widget rocksite-o-widget -%2$s">',
            'after_widget' => '</div></li>',
            'before_title' => '<header class="rocksite-o-widget__header"><h3 class="rocksite-o-widget__header__title">',
            'after_title' => '</h3></header>',
        ),

        'page_sidebar' =>
            array(
                'name' => __('Page Sidebar', 'genui'),
                'id' => 'page_sidebar',
                'description' => __('Appears on  Single Page', 'genui'),
                'before_widget' => '<li><div id="%1$s" class="rocksite-o-widget rocksite-o-widget -%2$s">',
                'after_widget' => '</div></li>',
                'before_title' => '<header class="rocksite-o-widget__header"><h3 class="rocksite-o-widget__header__title">',
                'after_title' => '</h3></header>',
            ),

        'footer_sidebar' =>
        array (
            'name' => __('Footer Sidebar', 'genui'),
            'id' => 'footer_sidebar',
            'description' => __('Appears in footer', 'genui'),
            'before_widget' => '<div class="col-lg-3 col-md-6"><div id="%1$s" class="rocksite-o-widget rocksite-o-widget -%2$s -dark -footer">',
            'after_widget' => '</div></div>',
            'before_title' => '<header class="rocksite-o-widget__header"><h3 class="rocksite-o-widget__header__title">',
            'after_title' => '</h3></header>'
        )

    );