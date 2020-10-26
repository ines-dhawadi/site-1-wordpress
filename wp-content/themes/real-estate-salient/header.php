<?php
/**
 * Header template
 * Displays all of the head element
 * @package real-estate-salient
 */

?><!DOCTYPE html>
<html <?php language_attributes(); ?>>
<head>
<meta charset="<?php bloginfo( 'charset' ); ?>">
<meta name="viewport" content="width=device-width, initial-scale=1, maximum-scale=1">
<link rel="profile" href="http://gmpg.org/xfn/11">
<?php if ( is_singular() && pings_open() ): ?>
<link rel="pingback" href="<?php bloginfo( 'pingback_url' ); ?>">
<?php endif; ?>

<?php wp_head(); ?>
</head>
<body  <?php body_class(); 

		//wp_body_open hook from WordPress 5.2
		if ( function_exists( 'wp_body_open' ) ) {
		    wp_body_open();
		}
		
		//Wrap open
		//inc/template-tags.php
		//function real_estate_salient_wrap_open		
		do_action( 'real_estate_salient_wrapopen' );

		//topbar
		//inc/template-tags.php
		//function real_estate_salient_settings
		do_action( 'real_estate_salient_topbar' );

		//Logo & Navigational
		//inc/template-tags.php
		//function new_shop_logo_settings
		do_action( 'real_estate_salient_header' );

		//Wrap close
		//inc/template-tags.php
		//function real_estate_salient_wrap_close
		do_action( 'real_estate_salient_wrapclose' );