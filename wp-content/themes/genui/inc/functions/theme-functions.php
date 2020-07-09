<?php

/**
 * Functions which wrapps other WordPress functions
 */

/**
 * Functions wrapper - template for comments and pingbacks.
 */
function rocksite_comments_template($comment, $args, $depth) {

    Rocksite_Component_Content::comment_template($comment, $args, $depth);
}

/**
 * Displays pager when post is divided into pages
 */

function rocksite_post_pager() {

    $defaults = array(
        'before'           => '<div class="post-nav-links rocksite-m-post-nav-links"><span class="post-nav-links__label">' . __( 'Pages:', 'genui').'</span>',
        'after'            => '</div>',
        'link_before'      => '',
        'link_after'       => '',
        'next_or_number'   => 'number',
        'separator'        => ' ',
        'pagelink'         => '%',
        'echo'             => 1
    );

    wp_link_pages($defaults);

}




