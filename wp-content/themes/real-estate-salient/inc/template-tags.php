<?php
/**
* Template hooks
* @package real-estate-salient
*/


//Header wrap open
if ( ! function_exists( 'real_estate_salient_wrap_open' ) ) {
	function real_estate_salient_wrap_open() {
		?>
		<header id="site-head" class="site-head" role="banner">
		<a class="skip-link screen-reader-text" href="#content"><?php esc_html_e( 'Skip to content', 'real-estate-salient' ); ?></a>
		<?php 
	}
}

//Header wrap close
if ( ! function_exists( 'real_estate_salient_wrap_close' ) ) {
	function real_estate_salient_wrap_close() {
		?>
		</header>
		<?php 
	}
}

//Top Bar
if ( ! function_exists( 'real_estate_salient_topbar_settings' ) ) {
	function real_estate_salient_topbar_settings() {
		$real_estate_salient_topbar_enable = get_theme_mod('real_estate_salient_topbar_enable');
		if( $real_estate_salient_topbar_enable ){
		?>
		<div class="top-bar container-fluid">
			<div class="container clearfix">
				<div class="row">
					<div class="top-signin col-md-3">

					<?php if( is_user_logged_in() ) : ?>
						<?php 
							$myaccount_link = get_theme_mod('real_estate_salient_myaccount_page');
							if (empty($myaccount_link)){$myaccount_link = home_url();}
						?>
						<a href="<?php echo esc_url( get_permalink( $myaccount_link )); ?>" title="<?php echo esc_attr__( 'My Account', 'real-estate-salient' ); ?>"><i class="fas fa-sign-in-alt"></i> <?php _e( 'My Account |', 'real-estate-salient'); ?></a><a href="<?php echo esc_url(wp_logout_url( home_url() )); ?>" title="<?php echo esc_attr__( 'Logout', 'real-estate-salient' ); ?>"><?php _e( ' Log Out', 'real-estate-salient'); ?></a>
					<?php else : ?>
						<a href="<?php echo esc_url(wp_login_url( home_url() )); ?>" title="<?php echo esc_attr__( 'Login', 'real-estate-salient' ); ?>"><i class="fas fa-sign-in-alt"></i> <?php _e( 'Login |', 'real-estate-salient'); ?></a><a href="<?php echo esc_url(wp_registration_url()); ?>" title="<?php echo esc_attr__( 'Register', 'real-estate-salient' ); ?>"><?php _e( ' Register', 'real-estate-salient'); ?></a>
					<?php endif; ?>
					</div>
					<div class="top-bar-right col-md-9">
						<?php if(get_theme_mod('real_estate_salient_topbarsubmit_enable')) : ?>
						<div class="top-bar-submit">
							<a href="<?php echo esc_url( get_permalink( get_theme_mod('real_estate_salient_submit_page'))); ?>" title="<?php echo esc_attr__( 'Submit Property', 'real-estate-salient' );?>"><?php _e( 'Submit Property', 'real-estate-salient' ); ?></a>
						</div>
						<?php endif; ?>
						<?php if(get_theme_mod('real_estate_salient_topbarsocial_enable')) : ?>
						<div class="top-bar-social">
							<a href="<?php echo esc_url(get_theme_mod('real_estate_salient_topbar_facebook')); ?>" title="<?php echo esc_attr__( 'Facebook', 'real-estate-salient' );?>"><i class="fab fa-facebook-f"></i></a>
							<a href="<?php echo esc_url(get_theme_mod('real_estate_salient_topbar_twitter')); ?>" title="<?php echo esc_attr__( 'Twitter', 'real-estate-salient' );?>"><i class="fab fa-twitter"></i></a>
							<a href="<?php echo esc_url(get_theme_mod('real_estate_salient_topbar_linkedin')); ?>" title="<?php echo esc_attr__( 'Instagram', 'real-estate-salient' );?>"><i class="fab fa-linkedin"></i></a>
						</div>
						<?php endif; ?>
					</div>
				</div>
			</div>			
		</div>
		<?php 
	}}
}


if ( ! function_exists( 'real_estate_salient_custom_logo' ) ) :
/**
 * Displays the optional custom logo.
 * Does nothing if the custom logo is not available.
 */
function real_estate_salient_custom_logo() {
	if ( function_exists( 'the_custom_logo' ) ) {
		the_custom_logo();
	}
}
endif;


/* -- Logo */
if ( ! function_exists( 'real_estate_salient_logo_settings' ) ) {
	function real_estate_salient_logo_settings() {
		?>
		<div class="logo-area container-fluid">
			<div class="container clearfix">
				<div class="row">
					<div class="logo col-md-4">
						<?php real_estate_salient_custom_logo(); 
						if ( is_front_page() && is_home() ) : ?>		
							<h1 class="site-title"><a href="<?php echo esc_url( home_url( '/' ) ); ?>" rel="home"><?php bloginfo( 'name' ); ?></a></h1>
						<?php else : ?>
							<p class="site-title"><a href="<?php echo esc_url( home_url( '/' ) ); ?>" rel="home"><?php bloginfo( 'name' ); ?></a></p>
						<?php endif;

						$description = get_bloginfo( 'description', 'display' );
						if ( $description || is_customize_preview() ) : ?>
							<p class="site-description"><?php echo $description; ?></p>
						<?php endif; ?>
					</div>
					<div class="navigational-menu col-md-8">
						<?php wp_nav_menu( array('theme_location' => 'catnav','menu_id' => 'menu','menu_class' => 'navi','fallback_cb' => 'false','items_wrap' => '<ul id="menu" class="%2$s">%3$s</ul>') ); ?>			
					</div>
				</div>
			</div>
		</div>
		<?php
	}
}



/* -- Slider */
if ( ! function_exists( 'real_estate_salient_slider_content' ) ) {
	function real_estate_salient_slider_content() {
		?>
		<?php if(get_theme_mod('real_estate_salient_slide_enable')) : ?>
		<div class="home-slider container-fluid">
			<section class="slider row">
		        <div class="flexslider" style="width : 100%; max-height: 600px;">
		        	<ul class="slides">
					<?php 
						$slide_type = 'post';
						if (get_theme_mod('real_estate_salient_slide_type') == "property" and class_exists('Essential_Real_Estate')){
							$slide_type = 'property';
						}
						$args = array(
					    'post_type' => $slide_type,
					    'ignore_sticky_posts' => true,
					    'posts_per_page' => 3,
					    'orderby' => 'date',
					    'order' => 'DESC',
					    'post_status' => 'publish',
					);

						$latestloop = new WP_Query($args);
						if ($latestloop->have_posts()) :  while ($latestloop->have_posts()) : $latestloop->the_post();

						if (get_theme_mod('real_estate_salient_slide_type') == "property" and class_exists('Essential_Real_Estate')) :
						$property_id = get_the_ID();
						$price = get_post_meta($property_id, ERE_METABOX_PREFIX . 'property_price', true);
						$beds = get_post_meta($property_id, ERE_METABOX_PREFIX . 'property_bedrooms', true);
						$size = get_post_meta($property_id, ERE_METABOX_PREFIX . 'property_land', true);
						$property_address = get_post_meta($property_id, ERE_METABOX_PREFIX . 'property_address', true);
						$price_prefix = get_post_meta($property_id, ERE_METABOX_PREFIX . 'property_price_prefix', true);
						$price_unit = get_post_meta($property_id, ERE_METABOX_PREFIX . 'property_price_unit', true);
						$price_short = get_post_meta($property_id, ERE_METABOX_PREFIX . 'property_price_short', true);
						$price_postfix = get_post_meta($property_id, ERE_METABOX_PREFIX . 'property_price_postfix', true);
					?>          
		            <li>
		              <?php if ( has_post_thumbnail() ) the_post_thumbnail('real-estate-salient-slider');?>
		              <div class="slider-content">
						<div class="container">
							<div class="slider-text">
								<div class="slider-text-inner">
									<h3><?php echo the_title();?></h3>
									<div class="slider-hr"></div>
									<p class="slider-address"><i class="fas fa-map-marker-alt"></i>&nbsp;&nbsp;<?php echo esc_html($property_address);?></p>
									<p class="slider-price"><i class="fas fa-tag"></i>&nbsp;&nbsp;<?php echo esc_html($price_prefix).' '.esc_html(ere_get_format_money($price_short, $price_unit)).' '.esc_html($price_postfix); ?></p>
								</div>
								<div class="slider-text-meta clearfix">
									<div class="slider-meta-content">
										<div class="slider-meta-count clearfix">
											<i class="fas fa-bed"></i>
											<p>&nbsp;<?php echo esc_html($beds); ?></p>
										</div>
										<p><?php echo esc_html__('Bedroom', 'real-estate-salient'); ?> </p>
									</div>
									<div class="slider-meta-content">
										<div class="slider-meta-count clearfix">
											<i class="fas fa-bath"></i>
											<p>&nbsp;3</p>
										</div>
										<p><?php echo esc_html__('Bathroom', 'real-estate-salient'); ?> </p>
									</div>
									<div class="slider-meta-content">
										<div class="slider-meta-count clearfix">
											<i class="far fa-building"></i>
											<p>&nbsp;<?php echo esc_html($size); ?> <?php echo esc_html(ere_get_measurement_units_land_area()); ?></p>
										</div>
										<p><?php echo esc_html__('Land Area', 'real-estate-salient'); ?></p>
									</div>
								</div>
								<div class="slider-buy-button">
									<a href="<?php the_permalink(); ?>"><?php echo esc_html__('View Details', 'real-estate-salient'); ?></a>
								</div>
							</div>
						</div>
					</div>
		            </li>
		        	<?php endif; ?>

		        	<?php if (get_theme_mod('real_estate_salient_slide_type') == "post") : ?>
		        		<li>
			        		<?php if ( has_post_thumbnail() ) the_post_thumbnail('real-estate-salient-slider');?>
							<div class="slider-content post-slider">
								<div class="container">
									<div class="slider-text">
										<div class="slider-text-inner">
											<h3><a href="<?php the_permalink(); ?>"><?php echo the_title();?></a></h3>
											<div class="index-title-content">
												<aside class="index-meta clearfix">										
													<div class="index-date-meta clearfix">
														<span><i class="fa fa-calendar"></i><p><?php the_time( get_option( 'date_format' ) ); ?></p></span>
													</div>
												</aside>
											</div>


										</div>
									</div>
								</div>
							</div>
						</li>
		        	<?php endif; ?>
		        	<?php
					    endwhile;
					    wp_reset_postdata();
					    endif;
					?>
					</ul>
		        </div>
		        <div class="custom-navigation">
		          <a href="#" class="flex-prev"><?php esc_html_e('Prev', 'real-estate-salient');?></a>
		          <div class="custom-controls-container"></div>
		          <a href="#" class="flex-next"><?php esc_html_e('Next', 'real-estate-salient');?></a>
		        </div>
			</section>
		</div>
		<?php endif; ?>

		<?php
	}
}


/* -- Home Properties */
if ( ! function_exists( 'real_estate_salient_home_properties' ) ) {
	function real_estate_salient_home_properties() {
		?>
		<?php if (get_theme_mod('real_estate_salient_home_properties_enable') AND class_exists('Essential_Real_Estate')) : ?>
		<div class="home-recent-properties container" id="home-recent-properties">
			<div class="home-recent-title container" id="content">
				<?php if(get_theme_mod('real_estate_salient_home_properties_title')) : ?>
					<h2><?php echo esc_html(get_theme_mod('real_estate_salient_home_properties_title', __('Recent Properties','real-estate-salient'))); ?></h2>
				<?php endif; ?>
				<?php if(get_theme_mod('real_estate_salient_home_properties_desc')) : ?>
					<p><?php echo esc_html(get_theme_mod('real_estate_salient_home_properties_desc', __('You are seeing recently added properties','real-estate-salient'))); ?></p>
				<?php endif; ?>
			</div>
		<div class="home-recent-content clearfix">
			<div class="row">
				<?php 
				$args = array(
				    'post_type' => 'property',
				    'ignore_sticky_posts' => true,
				    'posts_per_page' => 3,
				    'orderby' => 'date',
				    'order' => 'DESC',
				    'post_status' => 'publish',
				);
				$latestloop = new WP_Query($args);
				if ($latestloop->have_posts()) :  while ($latestloop->have_posts()) : $latestloop->the_post();
				$property_id = get_the_ID();
				$price = get_post_meta($property_id, ERE_METABOX_PREFIX . 'property_price', true);
				$beds = get_post_meta($property_id, ERE_METABOX_PREFIX . 'property_bedrooms', true);
				$size = get_post_meta($property_id, ERE_METABOX_PREFIX . 'property_size', true);
				$property_address = get_post_meta($property_id, ERE_METABOX_PREFIX . 'property_address', true);
				$price_prefix = get_post_meta($property_id, ERE_METABOX_PREFIX . 'property_price_prefix', true);
				$price_unit = get_post_meta($property_id, ERE_METABOX_PREFIX . 'property_price_unit', true);
				$price_short = get_post_meta($property_id, ERE_METABOX_PREFIX . 'property_price_short', true);
				$price_postfix = get_post_meta($property_id, ERE_METABOX_PREFIX . 'property_price_postfix', true);
				?>
				<div class="home-recent-list col-md-4">
					<a href="<?php the_permalink(); ?>"><?php if ( has_post_thumbnail() ) the_post_thumbnail('real-estate-salient-index');?></a>
					<div class="home-recent-list-content">
						<h2><?php the_title(); ?></h2>
						<p class="home-recent-list-add"><?php echo esc_html($property_address) ; ?></p>
						<p class="home-recent-list-price"><?php echo esc_html($price_prefix).' '.esc_html(ere_get_format_money($price_short, $price_unit)).' '.esc_html($price_postfix); ?></p>
						<p class="home-recent-list-beds"><?php echo esc_html($beds); ?> <?php echo esc_html__('Bedroom', 'real-estate-salient'); ?> | <?php echo esc_html($size).' '.esc_html(ere_get_measurement_units()); ?> <?php esc_html_e('area', 'real-estate-salient');?></p>
						<a href="<?php the_permalink(); ?>">&#187; <?php esc_html_e('Read More', 'real-estate-salient');?></a>
					</div>
				</div>
			    <?php
			    endwhile;
			    wp_reset_postdata();
			    endif;
				?>
			</div>
		</div>
			<div class="home-recent-more container">
				<a href="<?php echo esc_url(get_theme_mod('real_estate_salient_latestproperties_link'));?>"><?php esc_html_e('Browse all properties', 'real-estate-salient');?></a>
			</div>
		</div>
		<?php endif; ?>
		<?php
	}
}

/* -- Home posts */
if ( ! function_exists( 'real_estate_salient_home_posts' ) ) {
	function real_estate_salient_home_posts() {
		?>
		<div class="frontpage-latestposts-fluid container-fluid">
			<div class="home-recent-title container">
				<h2><?php esc_html_e('Recent Posts', 'real-estate-salient'); ?></h2>
				<p><?php esc_html_e('You are seeing recently added posts', 'real-estate-salient'); ?></p>
			</div>
			<div class="frontpage-latestposts container">
				<div class="frontpage-offer-row row clearfix">
					<?php                 		             
					$args = array (
					  'post_type'	=> 'post',
					  'ignore_sticky_posts' => true,
					  'showposts'	=> 3
					);
					$latestloop = new WP_Query($args);
					if ($latestloop->have_posts()) :  while ($latestloop->have_posts()) : $latestloop->the_post();
					?>

		            <div class="col-md-4 col-sm-4">
		                <div class="frontpage-gridposts">
		                    <a href="<?php the_permalink(); ?>"><?php if ( has_post_thumbnail() ) the_post_thumbnail('real-estate-salient-index'); ?></a>
		                    <h3><a href="<?php the_permalink(); ?>"><?php the_title(); ?></a></h3>
		                    <div class="frontpage-gridposts-icons"><i class="fa fa-calendar"></i> <?php the_time(get_option('date_format')); ?></div>
		                    <p><?php echo wp_trim_words( strip_tags(get_the_content()), 19, '' ); ?></p>
		                    <a class="frontpage-gridposts-readmore" href="<?php the_permalink(); ?>"><?php esc_html__('Read more','real-estate-salient'); ?></a>
		                </div>
		            </div>
		    		<?php
		    		endwhile;
		    		wp_reset_postdata();
		    		endif;
		    		?>
				</div>
			</div>
		</div>
		<?php
	}
}

/* -- post meta for single post and single page */
if ( ! function_exists( 'real_estate_salient_post_meta' ) ) {
	function real_estate_salient_post_meta() {
		?>
		<div class="index-single-post-content clearfix">
			<div class="index-title-content">
				<aside class="index-meta clearfix">										
					<div class="index-date-meta clearfix">
						<span><i class="fas fa-pen"></i><p><?php the_author_posts_link(); ?></p><i class="fa fa-calendar"></i><p><?php the_time( get_option( 'date_format' ) ); ?></p><i class="far fa-comments"></i><p><?php comments_popup_link( __( 'post a comment', 'real-estate-salient' ), __( '1 Comment', 'real-estate-salient' ), __( '% Comments', 'real-estate-salient' ),'', __( 'Comments Off', 'real-estate-salient' ));?></p></span>
					</div>
				</aside>
			</div>
		</div>
	<?php 
	}
}

/* -- previous / next post navigation for single post and single page */
if ( ! function_exists( 'real_estate_salient_post_navigation' ) ) {
	function real_estate_salient_post_navigation() {
		?>
	<div class="single-postnav clearfix">
		<hr>
			<div class="row clearfix">	
				<div class="next-post col-md-6 col-sm-6 col-xs-6"><?php next_post_link( '<i class="fa fa-chevron-circle-left"></i> %link'); ?></div>
				<div class="previous-post col-md-6 col-sm-6 col-xs-6"><?php previous_post_link( '%link <i class="fa fa-chevron-circle-right"></i>'); ?></div>
			</div>
		<hr>
	</div>
	<?php 
	}
}

/* -- post meta for index and archive lists */
if ( ! function_exists( 'real_estate_salient_index_post_meta' ) ) {
	function real_estate_salient_index_post_meta() {
		?>
		<div class="index-single-post-content clearfix">
			<?php if ( has_post_thumbnail() ) the_post_thumbnail('real-estate-salient-index');?><!-- thumbnail picture -->
			<div class="index-title-content">
				<h2><a href="<?php the_permalink(); ?>"><?php the_title(); ?></a></h2>
				<aside class="index-meta clearfix">										
					<div class="index-date-meta clearfix">
						<span><i class="fas fa-pen"></i><p><?php the_author_posts_link(); ?></p><i class="fa fa-calendar"></i><p><?php the_time( get_option( 'date_format' ) ); ?></p><i class="far fa-comments"></i><p><?php comments_popup_link( __( 'post a comment', 'real-estate-salient' ), __( '1 Comment', 'real-estate-salient' ), __( '% Comments', 'real-estate-salient' ),'', __( 'Comments Off', 'real-estate-salient' ));?></p></span>
					</div>
				</aside>
				<?php the_excerpt(); ?>
			</div>
			<div class="index-content-readmore">
				<a href="<?php the_permalink(); ?>"><?php _e('Read More', 'real-estate-salient'); ?></a>
			</div>
		</div>
	<hr>
	<?php 
	}
}

/* -- pagination for index & archives */
if ( ! function_exists( 'real_estate_salient_index_pagination' ) ) {
	function real_estate_salient_index_pagination() {
		?>
		<div class="index-pagination">
			<?php echo the_posts_pagination(); ?>
		</div>
		<?php 
	}
}

/* -- content header title */
if( ! function_exists( 'real_estate_salient_content_head' ) ) {
	function real_estate_salient_content_head(){
		?>
			<div class="container-fluid content-head">
				<div class="container">
					<h1><?php the_title(); ?></h1>
					<div class="breadcrumb"><?php breadcrumb_trail(); ?></div>
				</div>
			</div>
		<?php
	}
}

add_action( 'real_estate_salient_wrapopen', 'real_estate_salient_wrap_open', 0 );
add_action( 'real_estate_salient_wrapclose', 'real_estate_salient_wrap_close', 0 );
add_action( 'real_estate_salient_topbar', 'real_estate_salient_topbar_settings', 0 );
add_action( 'real_estate_salient_header', 'real_estate_salient_logo_settings', 0 );
add_action( 'real_estate_salient_slider', 'real_estate_salient_slider_content', 0 );
add_action( 'real_estate_salient_recent_properties', 'real_estate_salient_home_properties', 0 );
add_action( 'real_estate_salient_recent_posts', 'real_estate_salient_home_posts', 0 );
add_action( 'real_estate_salient_postmeta', 'real_estate_salient_post_meta', 0 );
add_action( 'real_estate_salient_postnavigation', 'real_estate_salient_post_navigation', 0 );
add_action( 'real_estate_salient_index_postmeta', 'real_estate_salient_index_post_meta', 0 );
add_action( 'real_estate_salient_index_pagination', 'real_estate_salient_index_pagination', 0 );
add_action( 'real_estate_salient_content_head', 'real_estate_salient_content_head', 0 );