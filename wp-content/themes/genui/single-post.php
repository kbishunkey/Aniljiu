<?php
/**
 * The Template for displaying all single posts.
 */

get_header();

rocksite_action_content_header('single-simple');

?>


<section class="rocksite-s-content">
	<div class="container rocksite-s-content__content">
		<div <?php rocksite_filter_layout_class('rocksite-t-content-layout -narrow-width', 'single-simple') ?>>
			<?php while (have_posts()) : the_post(); ?>


				<div id="page" role="main"
					 class="rocksite-t-content-layout__content">

					<?php

					get_template_part('views/content/content', 'post-simple');

					?>
					<div class="rocksite-t-content-layout__content__posts-navigation">
						<?php

						rocksite_the_post_navigation();

						?>
					</div>
					<?php

					rocksite_action_related_posts( 6 )

					?>
					<?php

					if ( comments_open() || get_comments_number() ) {
						comments_template('', true);
					}

					?>
				</div><!-- END #page -->
			<?php endwhile; // end of the loop. ?>

		</div>
	</div>
</section>
<?php get_footer(); ?>
