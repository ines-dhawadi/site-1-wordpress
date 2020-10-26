<?php

/**
* Personal customizer setup
* @package real estate salient
*/


#####---==========================--- #####
#####---=== Customizer setting ===--- #####
#####---==========================--- #####
function real_estate_salient_customize_register( $wp_customize ) {

	#####---=== create homepage setting panel ===--- #####
	$wp_customize->add_panel('real_estate_salient_customize', array(
		'title' => __('Theme settings', 'real-estate-salient'), 
		'description' => '', 
		'capability' => 'edit_theme_options', 
		'theme_supports' => '', 
		'priority' => 2
	));

	#####---=== create homepage setting panel ===--- #####
	$wp_customize->add_panel('real_estate_salient_home', array(
		'title' => __('Theme settings', 'real-estate-salient'), 
		'description' => '', 
		'capability' => 'edit_theme_options', 
		'priority' => 3
	));


	

	#####---=== Add customizer settings for general & homepage templates ===--- #####
	require get_template_directory() . '/inc/customizer/customizer-topbar.php';
	require get_template_directory() . '/inc/customizer/customizer-home.php';
	

	
	// Sanitize for checkbox
	function real_estate_salient_sanitize_checkbox( $input ) {
	// Boolean check 
	return ( ( isset( $input ) && true == $input ) ? true : false );
	}

	//Sanitize for Radio
	function real_estate_salient_sanitize_radio( $input, $setting ){          
        //input must be a slug: lowercase alphanumeric characters, dashes and underscores are allowed only
        $input = sanitize_key($input);
        //get the list of possible radio box options 
        $choices = $setting->manager->get_control( $setting->id )->choices;
        //return input if valid or return default option
        return ( array_key_exists( $input, $choices ) ? $input : $setting->default );                
          
    }
	
}
add_action( 'customize_register', 'real_estate_salient_customize_register' );