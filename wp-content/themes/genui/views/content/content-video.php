<?php
/**
 * The template used for displaying page content in page.php
 */
?>

<article id="post-<?php the_ID(); ?>" <?php post_class( 'rocksite-o-content' ); ?> >

	<?php rocksite_action_page_title('singular') ?>


	<div class="rocksite-o-content__entry">
        <?php rocksite_action_featured_video() ?>
		<?php the_content();

		rocksite_post_pager();


		?>



	</div>

</article>


