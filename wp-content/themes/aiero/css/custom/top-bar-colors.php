<?php

// ----------------------------- //
// ------ Top Bar Colors ------- //
// ----------------------------- //
$top_bar_default_text_color = aiero_get_prepared_option('top_bar_default_text_color', 'contrast_default_text_color', 'top_bar_customize');
if ( !empty($top_bar_default_text_color) ) {
    $aiero_custom_css .= '
        .top-bar {
            color: ' . esc_attr($top_bar_default_text_color) . ';
        }
    ';
}

$top_bar_dark_text_color = aiero_get_prepared_option('top_bar_dark_text_color', 'contrast_dark_text_color', 'top_bar_customize');
if ( !empty($top_bar_dark_text_color) ) {
    $aiero_custom_css .= '
        .wrapper-info .top-bar-additional-text,
        .wrapper-contacts .contact-item a,
        .wrapper-socials.top-bar-socials a {
            color: ' . esc_attr($top_bar_dark_text_color) . ';
        }
    ';
}

$top_bar_light_text_color = aiero_get_prepared_option('top_bar_light_text_color', 'contrast_light_text_color', 'top_bar_customize');
if ( !empty($top_bar_light_text_color) ) {
    $aiero_custom_css .= '
        .wrapper-socials.top-bar-socials a:hover {
            color: ' . esc_attr($top_bar_light_text_color) . ';
        }
    ';
}

$top_bar_accent_text_color = aiero_get_prepared_option('top_bar_accent_text_color', 'contrast_accent_text_color', 'top_bar_customize');
if ( !empty($top_bar_accent_text_color) ) {
    $aiero_custom_css .= '
        .wrapper-contacts .contact-item a:hover {
            color: ' . esc_attr($top_bar_accent_text_color) . ';
        }
    ';
}

$top_bar_border_color = aiero_get_prepared_option('top_bar_border_color', 'contrast_border_color', 'top_bar_customize');
if ( !empty($top_bar_border_color) ) {
    $aiero_custom_css .= '
        .top-bar {
            border-color: ' . esc_attr($top_bar_border_color) . ';
        }
    ';
}

$top_bar_border_hover_color = aiero_get_prepared_option('top_bar_border_hover_color', 'contrast_border_hover_color', 'top_bar_customize');
if ( !empty($top_bar_border_hover_color) ) {
    $aiero_custom_css .= '';
}

$top_bar_background_color = aiero_get_prepared_option('top_bar_background_color', 'contrast_background_color', 'top_bar_customize');
if ( !empty($top_bar_background_color) ) {
    $aiero_custom_css .= '
        .top-bar {
            background-color: ' . esc_attr($top_bar_background_color) . ';
        }
    ';
}

$top_bar_background_alter_color = aiero_get_prepared_option('top_bar_background_alter_color', 'contrast_background_alter_color', 'top_bar_customize');
if ( !empty($top_bar_background_alter_color) ) {
    $aiero_custom_css .= '';
}

$top_bar_button_text_color = aiero_get_prepared_option('top_bar_button_text_color', 'contrast_button_text_color', 'top_bar_customize');
if ( !empty($top_bar_button_text_color) ) {
    $aiero_custom_css .= '';
}

$top_bar_button_border_color = aiero_get_prepared_option('top_bar_button_border_color', 'contrast_button_border_color', 'top_bar_customize');
if ( !empty($top_bar_button_border_color) ) {
    $aiero_custom_css .= '';
}

$top_bar_button_background_color = aiero_get_prepared_option('top_bar_button_background_color', 'contrast_button_background_color', 'top_bar_customize');
if ( !empty($top_bar_button_background_color) ) {
    $aiero_custom_css .= '';
}

$top_bar_button_text_hover = aiero_get_prepared_option('top_bar_button_text_hover', 'contrast_button_text_hover', 'top_bar_customize');
if ( !empty($top_bar_button_text_hover) ) {
    $aiero_custom_css .= '';
}

$top_bar_button_border_hover = aiero_get_prepared_option('top_bar_button_border_hover', 'contrast_button_border_hover', 'top_bar_customize');
if ( !empty($top_bar_button_border_hover) ) {
    $aiero_custom_css .= '';
}

$top_bar_button_background_hover = aiero_get_prepared_option('top_bar_button_background_hover', 'contrast_button_background_hover', 'top_bar_customize');
if ( !empty($top_bar_button_background_hover) ) {
    $aiero_custom_css .= '';
}