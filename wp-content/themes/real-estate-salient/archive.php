<?php 
/**
 * The archive template
 *
 * @package real-estate-salient
 */


get_header(); ?>

<div class="content-area container">
	<div class="single-index-content col-md-9">
		<div class="archive-head">
			<h1><?php the_archive_title(); ?></h1>
		</div>
	</div>	
	<?php 
		//content loop	
		get_template_part( 'template-parts/content', 'loop' );
		//get sidebar
		get_sidebar();
	?>
</div>
<?php get_footer(); ?>