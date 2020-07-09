<?php
/**
 * The Template for displaying all single posts.
 */

get_header();

rocksite_action_content_header( 'single' );

?>


<section class="rocksite-s-content">
	<div class="container rocksite-s-content__content">
		<div class="rocksite-t-content-layout">
			<?php while (have_posts()) : the_post(); ?>


				<div id="page" role="main"
					 class="rocksite-t-content-layout__content">

					<figure class="wp-block-image">
						<?php

						echo wp_get_attachment_image( get_the_ID(), 'full' );

						?>

						<figcaption class="wp-caption-text"><?php the_excerpt(); ?></figcaption>

					</figure><!-- .entry-attachment -->

					<?php
					the_content();
					?>
				</div><!-- END #page -->
			<?php endwhile; // end of the loop. ?>

		</div>
	</div>
</section>
<?php get_footer(); ?>
