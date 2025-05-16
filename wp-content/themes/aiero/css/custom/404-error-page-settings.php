<?php

// ---------------------------- //
// ------ 404 Error Page ------ //
// ---------------------------- //

$error_text_color = !empty(aiero_get_theme_mod('error_text_color')) ? aiero_get_theme_mod('error_text_color') : aiero_get_theme_mod('standard_contrast_text_color');
$error_text_hover_color = !empty(aiero_get_theme_mod('error_text_hover_color')) ? aiero_get_theme_mod('error_text_hover_color') : aiero_get_theme_mod('contrast_accent_text_color');

if(!empty($error_text_color)) {
    $aiero_custom_css .= '
        .error-404-container .error-404-info-text,
        .error-404-container .error-404-title,
        .error-404-container .wrapper-socials a {
            color: ' . esc_attr($error_text_color) . ';
        }
        .error-404-container .error-404-text {
            -webkit-text-stroke: 1px ' . esc_attr($error_text_color) . ';
            text-stroke: 1px ' . esc_attr($error_text_color) . ';
        }
    ';
}
if(!empty($error_text_hover_color)) {
    $aiero_custom_css .= '
        .error-404-container .wrapper-socials a:hover {
            color: ' . esc_attr($error_text_hover_color) . ';
        }
    ';
}

$error_background_color     = aiero_get_prepared_option('error_background_color', 'standard_background_color', 'error_background_customize');
$error_background_position  = aiero_get_prepared_option('error_background_position', '', 'error_background_customize');
$error_background_repeat    = aiero_get_prepared_option('error_background_repeat', '', 'error_background_customize');
$error_background_size      = aiero_get_prepared_option('error_background_size', '', 'error_background_customize');
$error_background_image     = aiero_get_prepared_img_url('error_background_image');
if ( !empty($error_background_color) ) {
    $aiero_custom_css .= '
        .error-404-wrapper,
        .error-404-wrapper .error-decoration-bl .error-decoration-bl-inner,
        .error-404-wrapper .error-decoration-tl .error-decoration-tl-inner,
        .error-404-wrapper .error-decoration-br .error-decoration-br-inner {
            background-color: ' . esc_attr($error_background_color) . ';
        }
        .error-404-wrapper .error-decoration-bl:before,
        .error-404-wrapper .error-decoration-bl:after,
        .error-404-wrapper .error-decoration-br:before,
        .error-404-wrapper .error-decoration-br:after {
            box-shadow: 0 20px 0 0 ' . esc_attr($error_background_color) . ';
        }
        .error-404-wrapper .error-decoration-tl:before,
        .error-404-wrapper .error-decoration-tl:after {
            box-shadow: 0 -20px 0 0 ' . esc_attr($error_background_color) . '
        }
    ';
}
if ( !empty($error_background_position) || !empty($error_background_repeat) || !empty($error_background_size) || !empty($error_background_image) ) {
    $aiero_custom_css .= '
        .error-404-container {' .
            ( !empty($error_background_position) ? 'background-position: ' . esc_attr($error_background_position) . ';' : '' ) .
            ( !empty($error_background_repeat) ? 'background-repeat: ' . esc_attr($error_background_repeat) . ';' : '' ) .
            ( !empty($error_background_size) ? '-webkit-background-size: ' . esc_attr($error_background_size) . ';' : '' ) .
            ( !empty($error_background_size) ? 'background-size: ' . esc_attr($error_background_size) . ';' : '' ) .
            ( !empty($error_background_image) ? 'background-image: url("' . esc_attr($error_background_image) . '");' : '' ) .
        '}
    ';
}