<?php
//about theme info
add_action( 'admin_menu', 'real_estate_salient_gettingstarted' );
function real_estate_salient_gettingstarted() {    	
	add_theme_page( esc_html__('Real Estate Salient Theme Setup Guide', 'real-estate-salient'), esc_html__('Theme setup guide', 'real-estate-salient'), 'edit_theme_options', 'real_estate_salient_guide', 'real_estate_salient_mostrar_guide');   
}

// Add a Custom CSS file to WP Admin Area
function real_estate_salient_admin_theme_style() {
   wp_enqueue_style('custom-admin-style', get_template_directory_uri() . '/inc/getstart/getstart.css');
   wp_enqueue_script('tabs', get_template_directory_uri() . '/inc/getstart/js/tab.js');
}
add_action('admin_enqueue_scripts', 'real_estate_salient_admin_theme_style');


//guidline for about theme
function real_estate_salient_mostrar_guide() { 
	//custom function about theme customizer
	$return = add_query_arg( array()) ;
	$theme = wp_get_theme( 'real-estate-salient' );
?>

<div class="wrapper-info">
    <div class="col-left">
    	<h2><?php esc_html_e( 'Welcome to Real Estate Salient Theme', 'real-estate-salient' ); ?> <span class="version">Version: <?php echo esc_html($theme['Version']);?></span></h2>
    </div>
    <div class="col-right">
    	<div class="logo">
			<img src="https://www.ammuthemes.com/wp-content/uploads/2018/02/ammulogo.png" alt="" />
		</div>
		<div class="update-now">
			<h4><?php esc_html_e('Buy Real Estate Salient Pro at 10% Discount','real-estate-salient'); ?></h4>
			<h4><?php esc_html_e('Use Coupon','real-estate-salient'); ?> ( <span><?php esc_html_e('10PERCENTOFF','real-estate-salient'); ?></span> ) </h4> 
			<div class="info-link">
				<a href="https://www.ammuthemes.com/downloads/real-estate-salient-pro/" target="_blank"> <?php esc_html_e( 'Upgrade to Pro', 'real-estate-salient' ); ?></a>
			</div>
		</div>
    </div>

    <div class="tab-sec">
		<div class="tab">
		  <button class="tablinks" onclick="openCity(event, 'theme_lite')"><?php esc_html_e( 'Getting Started', 'real-estate-salient' ); ?></button>	  
		  <button class="tablinks" onclick="openCity(event, 'theme_pro')"><?php esc_html_e( 'Get Premium', 'real-estate-salient' ); ?></button>
		</div>

		<!-- Tab content -->
		<div id="theme_lite" class="tabcontent open">
			<h3><?php esc_html_e( 'Theme Information', 'real-estate-salient' ); ?></h3>
			<hr class="h3hr">
		  	<p><?php esc_html_e('Real estate salient is a free fully responsive WordPress theme for real estate agencies and brokers. It has built with Elegant inbuilt slider, customize options and a dedicated front page. Essential real estate plugin helps this theme to make it powerful to handle all property inclusion, agency maintaince, invoices and everything. One great feature is you user also can add properties if you want.','real-estate-salient'); ?></p>
		  	<div class="col-left-inner">
				<h4><?php esc_html_e('Theme Customizer', 'real-estate-salient'); ?></h4>
				<p> <?php esc_html_e('To begin customizing your website, start by clicking "Customize".', 'real-estate-salient'); ?></p>
				<div class="info-link">
					<a target="_blank" href="<?php echo esc_url( admin_url('customize.php') ); ?>"><?php esc_html_e('Customizing', 'real-estate-salient'); ?></a>
				</div>
				<hr>				
				<h4><?php esc_html_e('Having Trouble, Need Support?', 'real-estate-salient'); ?></h4>
				<p> <?php esc_html_e('Our dedicated team is well prepared to help you out in case of queries and doubts regarding our theme.', 'real-estate-salient'); ?></p>
				<div class="info-link">
					<a href="https://www.ammuthemes.com/forums/forum/free-theme-support/real-estate-salient/" target="_blank"><?php esc_html_e('Support Forum', 'real-estate-salient'); ?></a>
				</div>
				<hr>
				<h4><?php esc_html_e('Reviews & Testimonials', 'real-estate-salient'); ?></h4>
				<p> <?php esc_html_e('All the features and aspects of this WordPress Theme are phenomenal. I\'d recommend this theme to all.', 'real-estate-salient'); ?>  </p>
				<div class="info-link">
					<a href="https://wordpress.org/support/theme/real-estate-salient/reviews/#new-post" target="_blank"><?php esc_html_e('Reviews', 'real-estate-salient'); ?></a>
				</div>
		  	</div>
			<div class="col-right-inner">
				<h3 class="page-template"><?php esc_html_e('How to set up Home Page Template','real-estate-salient'); ?></h3>
			  	<hr class="h3hr">
				<p><?php esc_html_e('Follow these instructions to setup Home page.','real-estate-salient'); ?></p>
                <ul>
                	<li><?php esc_html_e('1. Create a Page to set template:  Go to ','real-estate-salient'); ?>
                  	<b><?php esc_html_e('Dashboard &gt;&gt; Pages &gt;&gt; Add New Page','real-estate-salient'); ?></b>.
                  	<p><?php esc_html_e('Label it "home" or anything as you wish. Then select template "home-page" from template dropdown.','real-estate-salient'); ?></p></li>
                  	<img src="https://www.ammuthemes.com/wp-content/uploads/2020/01/home-page-template.png" alt="" width="700" height="297" />
                  	<p></p><span class="strong"><?php esc_html_e('2. Set the front page:','real-estate-salient'); ?></span><?php esc_html_e(' Go to ','real-estate-salient'); ?>
				  	<b><?php esc_html_e(' Settings -&gt; Reading --&gt; Set the front page display static page to home page ','real-estate-salient'); ?></b></p>
                  	<img src="https://www.ammuthemes.com/wp-content/uploads/2020/01/set-front-page.png" alt="" width="700" height="297" />
                  	<p><?php esc_html_e(' Once you are done with this, you can see all the demo content on front page. ','real-estate-salient'); ?></p>
                </ul>
		  	</div>
		</div>	

		<div id="theme_pro" class="tabcontent">
		  	<h3><?php esc_html_e( 'Premium Theme Information', 'real-estate-salient' ); ?></h3>
			<hr class="h3hr">
		    <div class="col-left-pro">
		    	<p><?php esc_html_e('Real Estate Salient Pro is a premium WordPress theme with unique design and plethora of options to tweak every way a website needs. The powerful Essential Real Estate plugin brings maintaining a real estate site to a new level by adding necessary real estate features like adding property from front end and back end, managing invoices, dedicated property filter and more. Inbuilt three variable slider helps to make website home page as elegant, flexslider helps to make it possible. Adding and managing agents is very simple with just few clicks. We do offer very quick one to one support via dedicated premium support forum. ','real-estate-salient'); ?></p>
		    	<div class="pro-links">
			    	<a href="https://www.ammuthemes.com/demo/?demo=real-estate-salient-pro" target="_blank"><?php esc_html_e('Live Demo', 'real-estate-salient'); ?></a>
					<a href="https://www.ammuthemes.com/downloads/real-estate-salient-pro/"><?php esc_html_e('Buy Pro', 'real-estate-salient'); ?></a>
					<a href="https://www.ammuthemes.com/forums/forum/premium-theme-support/real-estate-salient-pro/" target="_blank"><?php esc_html_e('Pro Support Forum', 'real-estate-salient'); ?></a>
				</div>
		    </div>
		    <div class="col-right-pro">
		    	<img src="https://www.ammuthemes.com/wp-content/uploads/edd/2020/01/screenshot.png" alt="" height="428" width="621" />
		    </div>
		</div>
	</div>
</div>
<?php } ?>