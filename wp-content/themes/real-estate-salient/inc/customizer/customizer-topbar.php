<?php
#####--------------------------- #####
#####---=== Homepage section ===--- #####
#####--------------------------- #####
$wp_customize->add_section('real_estate_salient_topbar', array(
    'title' => __('Top bar','real-estate-salient'),
    'description' => '',
    'panel'  => 'real_estate_salient_customize',
    'priority' => 1
));

#####---=== Enable banner ===--- #####
$wp_customize->add_setting('real_estate_salient_topbar_enable', array(
    'capability'     => 'edit_theme_options',
    'sanitize_callback' => 'real_estate_salient_sanitize_checkbox',
));

$wp_customize->add_control('real_estate_salient_topbar_enable', array(
    'label'   => __('Enable Topbar section','real-estate-salient'),
    'section' => 'real_estate_salient_topbar',
    'type' => 'checkbox',
    'priority'   => 1
));

#####---=== My account/Login setting ===--- #####
$wp_customize->add_setting( 'real_estate_salient_myaccount_page', array(
    'capability'    => 'edit_theme_options',
    'default'       => 0,
    'sanitize_callback' => 'absint'
));

$wp_customize->add_control( 'real_estate_salient_myaccount_page', array(
    'label'     =>  __( 'My Account page link ', 'real-estate-salient' ),
    'section'   => 'real_estate_salient_topbar',
    'type'      => 'dropdown-pages',
    'priority'  => 2,
    'settings'  => 'real_estate_salient_myaccount_page',
    'description' => __( 'Desired page for My Account link, My Properties is preferred', 'real-estate-salient' ),
));

#####---=== Social links ===--- #####
$wp_customize->add_setting('real_estate_salient_topbarsocial_enable', array(
    'capability'     => 'edit_theme_options',
    'sanitize_callback' => 'real_estate_salient_sanitize_checkbox',
));

$wp_customize->add_control('real_estate_salient_topbarsocial_enable', array(
    'label'   => __('Enable Social section','real-estate-salient'),
    'section' => 'real_estate_salient_topbar',
    'type' => 'checkbox',
    'priority'   => 3
));

#####---=== Facebook ===--- #####
$wp_customize->add_setting('real_estate_salient_topbar_facebook', array(
    'sanitize_callback' => 'esc_url_raw'
));

$wp_customize->add_control('real_estate_salient_topbar_facebook', array(
    'label'   => __('Facebook url','real-estate-salient'),
    'section' => 'real_estate_salient_topbar',
    'type' => 'text',
    'priority'   => 4
));

#####---=== Twitter ===--- #####
$wp_customize->add_setting('real_estate_salient_topbar_twitter', array(
    'sanitize_callback' => 'esc_url_raw'
));

$wp_customize->add_control('real_estate_salient_topbar_twitter', array(
    'label'   => __('Twitter url','real-estate-salient'),
    'section' => 'real_estate_salient_topbar',
    'type' => 'text',
    'priority'   => 5
));

#####---=== Linkedin ===--- #####
$wp_customize->add_setting('real_estate_salient_topbar_linkedin', array(
    'sanitize_callback' => 'esc_url_raw'
));

$wp_customize->add_control('real_estate_salient_topbar_linkedin', array(
    'label'   => __('Linkedin url','real-estate-salient'),
    'section' => 'real_estate_salient_topbar',
    'type' => 'text',
    'priority'   => 6
));

#####---=== Submit property enable ===--- #####
$wp_customize->add_setting('real_estate_salient_topbarsubmit_enable', array(
    'capability'     => 'edit_theme_options',
    'sanitize_callback' => 'real_estate_salient_sanitize_checkbox',
));

$wp_customize->add_control('real_estate_salient_topbarsubmit_enable', array(
    'label'   => __('Enable front end submit button','real-estate-salient'),
    'section' => 'real_estate_salient_topbar',
    'type' => 'checkbox',
    'priority'   => 7
));

#####---=== Submit button link ===--- #####
$wp_customize->add_setting( 'real_estate_salient_submit_page', array(
    'capability'    => 'edit_theme_options',
    'default'       => 0,
    'sanitize_callback' => 'absint'
));

$wp_customize->add_control( 'real_estate_salient_submit_page', array(
    'label'     =>  __( 'Submit button link ', 'real-estate-salient' ),
    'section'   => 'real_estate_salient_topbar',
    'type'      => 'dropdown-pages',
    'priority'  => 8,
    'settings'  => 'real_estate_salient_submit_page',
    'description' => __( 'Select a page for Submit button link, page: New Property is preferred' , 'real-estate-salient' ),
));