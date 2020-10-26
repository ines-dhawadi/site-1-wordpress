<?php
/**
 * The template for displaying all single posts.
 *
 * @link https://developer.wordpress.org/themes/basics/template-hierarchy/#single-post
 *
 * @package real-estate-salient
 */

get_header(); ?>
	
<?php do_action( 'real_estate_salient_content_head' ); ?>
<div class="content-area container">
	<div class="single-index clearfix">
		<?php 
			if(have_posts()):
				while(have_posts()): the_post(); 
						get_template_part( 'template-parts/content', 'page' );
				endwhile;
					
			 endif; 
			?>		
	</div>		
</div>

<?php get_footer(); ?>