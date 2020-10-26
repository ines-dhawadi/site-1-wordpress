<?php 

/**
 * Template Name: Home page
 * @package real-estate-salient
 */

//Header
get_header(); 
//slider
do_action( 'real_estate_salient_slider' );
//recent properties
do_action( 'real_estate_salient_recent_properties' );
//recent posts
do_action( 'real_estate_salient_recent_posts' );
//footer
get_footer(); ?>