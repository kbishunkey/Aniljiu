<?php
/**
 * The template for displaying 404 page.
 *
 */

get_header();

?>

	<section class="rocksite-s-content">
		<div class="container rocksite-s-content__content">
			<div class="rocksite-t-content-layout">

				<div id="page" role="main"
					 class="rocksite-t-content-layout__content">
					<h1 class="rocksite-a-heading -hero u-margin-bottom-50"><?php esc_html_e( 'Page Not Found', 'genui'); ?></h1>

					<p class="rocksite-a-text -xx-large u-margin-bottom-50"><?php esc_html_e( 'The page you were looking for could not be found. It might have been removed, renamed, or did not exist in the first place.', 'genui'); ?></p>

					<?php get_search_form(); ?>


				</div>
			</div>

		</div>
    </section>

<?php get_footer(); ?>