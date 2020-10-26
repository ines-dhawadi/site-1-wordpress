<?php
/**
 * Footer template
 *
 * @package real-estate-salient
 */
?>

<div class="footer container-fluid">
	<div class="container footer-content">
			<div class="row">
				<div class="col-md-4 footer-one">
					<?php dynamic_sidebar( 'footleft-sidebar'); ?>
				</div>
				<div class="col-md-4 footer-two">
					<?php dynamic_sidebar( 'footmiddle-sidebar'); ?>
				</div>
				<div class="col-md-4 footer-three">
					<?php dynamic_sidebar( 'footright-sidebar'); ?>
				</div>
				<div class="col-md-12">
					<div class="footer-copyright">
						<p><?php echo esc_html__( 'Copyright  &copy; ', 'real-estate-salient' ). date_i18n(__('Y','real-estate-salient')); ?><a href="<?php echo esc_url( home_url() ); ?>">  <?php echo esc_html( get_bloginfo( 'name' ) ); ?></a><?php echo esc_html__( 'powered by  ', 'real-estate-salient' )?><a href="https://www.wordpress.org" target="_blank" rel="nofollow"><?php echo esc_html__( 'WordPress', 'real-estate-salient' )?></a></p> 
					</div>
					
				</div>
			</div>
		</div>
</div>
<?php wp_footer(); ?>
</body><!-- body -->
</html><!-- html -->