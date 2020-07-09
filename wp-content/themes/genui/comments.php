<?php
/**
 * The template for displaying Comments.
 *
 */
if (post_password_required())
    return;

/*
 * Display Comments list and form only if comments are open
 */

	if(comments_open()):
?>
		<div id="comments" class="rocksite-o-comments">

    <?php // You can start editing here -- including this comment! ?>




	<?php if ( have_comments() ) : ?>

	<h3 class="rocksite-o-comments__header">
					<?php
                    $comments_number = get_comments_number();
                    if ( '1' === $comments_number ) {
                        /* translators: %s: post title */
                        printf( _x( 'One Reply to &ldquo;%s&rdquo;', 'comments title', 'genui' ), get_the_title() );
                    } else {
                        printf(
                        /* translators: 1: number of comments, 2: post title */
                            _nx(
                                '%1$s Reply to &ldquo;%2$s&rdquo;',
                                '%1$s Replies to &ldquo;%2$s&rdquo;',
                                $comments_number,
                                'comments title',
                                'genui'
                            ),
                            number_format_i18n( $comments_number ),
                            get_the_title()
                        );
                    }
					?>
	</h3>

		<?php if ( get_comment_pages_count() > 1 && get_option( 'page_comments' ) ) : ?>
			<nav id="comment-nav-above" class="navigation comment-navigation" role="navigation">
				<h1 class="screen-reader-text"><?php _e( 'Comment navigation', 'genui'); ?></h1>
				<div class="nav-previous"><?php previous_comments_link( __( '&larr; Older Comments', 'genui') ); ?></div>
				<div class="nav-next"><?php next_comments_link( __( 'Newer Comments &rarr;', 'genui') ); ?></div>
			</nav><!-- #comment-nav-above -->
			<?php endif; // Check for comment navigation. ?>

		<ol class="comment-list rocksite-o-comments__list">
			<?php
			wp_list_comments( array(
				'style'      => 'ol',
				'callback' => 'rocksite_comments_template',
				'short_ping' => true,

			) );
			?>
		</ol><!-- .comment-list -->

		<?php if ( get_comment_pages_count() > 1 && get_option( 'page_comments' ) ) : ?>
			<nav id="comment-nav-below" class="rocksite-o-comments__navigation comment-navigation" role="navigation">
				<h1 class="screen-reader-text"><?php _e( 'Comment navigation', 'genui'); ?></h1>
				<div class="nav-previous"><?php previous_comments_link( __( '&larr; Older Comments', 'genui') ); ?></div>
				<div class="nav-next"><?php next_comments_link( __( 'Newer Comments &rarr;', 'genui') ); ?></div>
			</nav><!-- #comment-nav-below -->
			<?php endif; // Check for comment navigation. ?>

		<?php if ( ! comments_open() ) : ?>
			<p class="rocksite-o-comments__closed"><?php _e( 'Comments are closed.', 'genui'); ?></p>
			<?php endif; ?>

		<?php endif; // have_comments() ?>

	<?php comment_form(array('class_submit' => 'btn btn-primary', 'class_form'=> 'rocksite-o-comment-respond')); ?>


</div><!-- #comments .comments-area -->
<?php
	endif; // end if comments open
?>
