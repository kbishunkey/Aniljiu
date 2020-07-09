<?php
/**
 * Template part for displaying a message that posts cannot be found
 */

?>

<div class="rocksite-o-content -no-results -not-found">
	<header class="page-header">
		<h1 class="page-title"><?php _e( 'Nothing Found', 'genui'); ?></h1>
	</header><!-- .page-header -->

	<div class="page-content">
		<?php
		if ( is_home() && current_user_can( 'publish_posts' ) ) :

			printf(
				'<p>' . wp_kses(
					/* translators: 1: link to WP admin new post page. */
					__( 'Ready to publish your first post? <a href="%1$s">Get started here</a>.', 'genui'),
					array(
						'a' => array(
							'href' => array(),
						),
					)
				) . '</p>',
				esc_url( admin_url( 'post-new.php' ) )
			);

		elseif ( is_search() ) :
			?>

			<p><?php _e( 'Sorry, but nothing matched your search terms. Please try again with some different keywords.', 'genui'); ?></p>
			<?php
			get_search_form();

		else :
			?>

			<p><?php _e( 'It seems we can&rsquo;t find what you&rsquo;re looking for. Perhaps searching can help.', 'genui'); ?></p>
			<?php
			get_search_form();

		endif;
		?>
	</div><!-- .page-content -->
</div><!-- .no-results -->
