<?php
/**
 * Template part for displaying single pages.
 *
 * @link https://codex.wordpress.org/Template_Hierarchy
 *
 * @package real-estate-salient
 */

?>

<div class="single-entry single-index-content col-md-9">
	<?php
		//Post meta
		//template-tags.php
		do_action( 'real_estate_salient_postmeta' ); 
	?>				
	<div class="single-content">
		<?php 
			//Display the post content.
			the_content();

			//Displays page-links for paginated posts i.e. includes the <!--nextpage-->
			wp_link_pages();
		?>
	</div>
	<div class="single-tags clearfix">
		<?php 
			//Show Tags
			the_tags('<span>'.__( 'Tags : ', 'real-estate-salient' ).'</span>','');
		?>
	</div>
	<?php
		//Post navigation
		//template-tags.php
		do_action( 'real_estate_salient_postnavigation' );

		//Load the comment template
		comments_template();
	?>
</div>