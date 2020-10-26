<?php

$slider = sanitize_text_field($_POST['slider_activation']);
$slider .= "|";
$slider .= "|" . sanitize_text_field($_POST['effect_duration']);
$slider .= "|" . sanitize_text_field($_POST['prev_next_active']);
$slider .= "|" . sanitize_text_field($_POST['icon_style']);
$slider .= "|" . sanitize_text_field($_POST['prev_next_icon_size']);
/* 0 - 5 */

$slider .= "|" . sanitize_text_field($_POST['prev_next_icon_border_radius']);
$slider .= "|" . sanitize_text_field($_POST['prev_next_bgcolor']);
$slider .= "|" . sanitize_text_field($_POST['prev_next_color']);
$slider .= "|" . sanitize_text_field($_POST['prev_next_hover_bgcolor']);
$slider .= "|" . sanitize_text_field($_POST['prev_next_hover_color']);
/* 6 - 10 */

$slider .= "|" . sanitize_text_field($_POST['indicator_activation']);
$slider .= "|" . sanitize_text_field($_POST['indicator_width']);
$slider .= "|" . sanitize_text_field($_POST['indicator_height']);
$slider .= "|" . sanitize_text_field($_POST['indicator_active_color']);
$slider .= "|" . sanitize_text_field($_POST['indicator_color']);
/* 11 - 15 */

$slider .= "|" . sanitize_text_field($_POST['indicator_border_radius']);
$slider .= "|" . sanitize_text_field($_POST['indicator_margin']);

$memberorder = $_POST['custom_css'];

$wpdb->query($wpdb->prepare("UPDATE $style_table SET css = %s, slider = %s, memberorder=%s WHERE id = %d", $css, $slider, $memberorder, $styleId));
