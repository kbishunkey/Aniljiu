<?php
/*
 * Template Name: Without Sidebar
 */


get_header();

rocksite_action_content_header();

?>

	<section class="rocksite-s-content">
		<div class="container rocksite-s-content__content">
			<div class="rocksite-t-content-layout">

            <?php

            while (have_posts()) : the_post();

				?>
				<div id="page" role="main"
					 class="rocksite-t-content-layout__content">
				<?php
                get_template_part('views/content/content', 'page');
                ?>


				</div>

            <?php endwhile; // end of the loop.


			?>




			</div>

		</div>
    </section>

<?php get_footer(); ?>
