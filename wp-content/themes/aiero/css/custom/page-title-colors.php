<?php

// -------------------------------- //
// ------ Page Title Colors ------- //
// -------------------------------- //
$page_title_default_text_color = aiero_get_prepared_option('page_title_default_text_color', 'contrast_default_text_color', 'page_title_customize');
if ( !empty($page_title_default_text_color) ) {
    $aiero_custom_css .= '
        .page-title-container .breadcrumbs,
        .page-title-container .breadcrumbs a {
            color: ' . esc_attr($page_title_default_text_color) . ';
        }
        .breadcrumbs a:before {
            background-color: ' . esc_attr($page_title_default_text_color) . ';
        }
    ';
}

$page_title_dark_text_color = aiero_get_prepared_option('page_title_dark_text_color', 'contrast_dark_text_color', 'page_title_customize');
if ( !empty($page_title_dark_text_color) ) {
    $aiero_custom_css .= '
        .page-title-wrapper,
        .body-container .page-title-wrapper a,
        .page-title-container .page-title-additional {
            color: ' . esc_attr($page_title_dark_text_color) . ';
        }
    ';
}

$page_title_light_text_color = aiero_get_prepared_option('page_title_light_text_color', 'contrast_light_text_color', 'page_title_customize');
if ( !empty($page_title_light_text_color) ) {
    $aiero_custom_css .= '        
        .breadcrumbs .delimiter {
            color: ' . esc_attr($page_title_light_text_color) . ';
        }
    ';
}

$page_title_accent_text_color = aiero_get_prepared_option('page_title_accent_text_color', 'contrast_accent_text_color', 'page_title_customize');
if ( !empty($top_bar_accent_text_color) ) {
    $aiero_custom_css .= '
        .page-title-container .breadcrumbs a:hover,
        .body-container .page-title-wrapper a:hover {
            color: ' . esc_attr($page_title_accent_text_color) . ';
        }
    ';
}

$page_title_border_color = aiero_get_prepared_option('page_title_border_color', 'contrast_border_color', 'page_title_customize');
if ( !empty($page_title_border_color) ) {
    $aiero_custom_css .= '';
}

$page_title_border_hover_color = aiero_get_prepared_option('page_title_border_hover_color', 'contrast_border_hover_color', 'page_title_customize');
if ( !empty($page_title_border_hover_color) ) {
    $aiero_custom_css .= '';
}

$page_title_background_color = aiero_get_prepared_option('page_title_background_color', 'contrast_background_color', 'page_title_customize');
if ( !empty($page_title_background_color) ) {
    $aiero_custom_css .= '
        .page-title-container {
            background-color: ' . esc_attr($page_title_background_color) . ';
        }
    ';
}

$page_title_background_alter_color = aiero_get_prepared_option('page_title_background_alter_color', 'standard_background_color', 'page_title_customize');
if ( !empty($page_title_background_alter_color) ) {
    $aiero_custom_css .= '
        .breadcrumbs,
        .page-title-container .page-title-decoration-bl .page-title-decoration-bl-inner,
        .page-title-container .page-title-decoration-tl .page-title-decoration-tl-inner,
        .page-title-container .page-title-decoration-br .page-title-decoration-br-inner {
            background-color: ' . esc_attr($page_title_background_alter_color) . ';
        }
        .breadcrumbs-wrapper:before, 
        .breadcrumbs-wrapper:after,
        .page-title-container .page-title-decoration-bl:before,
        .page-title-container .page-title-decoration-bl:after,
        .page-title-container .page-title-decoration-br:before,
        .page-title-container .page-title-decoration-br:after {
            box-shadow: 0 20px 0 0 ' . esc_attr($page_title_background_alter_color) . ';
        }
        .page-title-container .page-title-decoration-tl:before,
        .page-title-container .page-title-decoration-tl:after {
            box-shadow: 0 -20px 0 0 ' . esc_attr($page_title_background_alter_color) . ';
        }
    ';
}

$page_title_button_background_color = aiero_get_prepared_option('page_title_button_background_color', 'contrast_button_background_color', 'page_title_customize');
if ( !empty($page_title_button_background_color) ) {
    $aiero_custom_css .= '';
}

$page_title_overlay_color = aiero_get_prepared_option('page_title_overlay_color', '', 'page_title_overlay_status');
if ( !empty($page_title_overlay_color) ) {
    $aiero_custom_css .= '
        .page-title-bg {
            background-color: ' . esc_attr($page_title_overlay_color) . ';
        }
    ';
}