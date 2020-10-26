<?php
/**
 * Template part for displaying pages.
 *
 * @link https://codex.wordpress.org/Template_Hierarchy
 *
 * @package real-estate-salient
 */

?>

<div class="single-entry">
	
	<div class="single-content">
		<?php 
			//Display the post content.
			the_content();

			//Displays page-links for paginated posts i.e. includes the <!--nextpage-->
			wp_link_pages();
		?>
	</div>
	<?php
		//Load the comment template
		comments_template();
	?>
</div>