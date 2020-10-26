<?php 
/**
 * The main template file.
 *
 * This is the most generic template file in a WordPress theme
 * and one of the two required files for a theme (the other being style.css).
 * It is used to display a page when nothing more specific matches a query.
 * E.g., it puts together the home page when no home.php file exists.
 * Learn more: http://codex.wordpress.org/Template_Hierarchy
 *
 * @package real-estate-salient
 */


get_header(); ?>

<div class="content-area container" id="content">	
	<div class="row">
		<?php 
			//Content loop
			get_template_part( 'template-parts/content', 'loop' );
			
			//get sidebar
			get_sidebar();
		?>
	</div>
</div>
<?php get_footer(); ?>