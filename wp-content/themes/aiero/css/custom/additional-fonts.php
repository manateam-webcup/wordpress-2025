<?php

// -------------------------------- //
// ------- Additional Fonts ------- //
// -------------------------------- //

$additional_font = aiero_get_prepared_option('additional_font');
$additional_font_array = json_decode($additional_font, true);
if (
    !empty($additional_font_array['font_family'])
) {
    $aiero_custom_css .= '
        .error-404-wrapper .error-404-text-column .error-404-text {' .
            aiero_print_font_styles( $additional_font, array('font_family') ) .
        '}
    ';
}
if (
    !empty($additional_font_array['font_family']) ||
    !empty($additional_font_array['font_size']) ||
    !empty($additional_font_array['line_height']) ||
    !empty($additional_font_array['font_style']) ||
    !empty($additional_font_array['font_weight'])
) {
    $aiero_custom_css .= '
    	.input-floating-wrap,
        body input,
        body textarea,
        body select,
        div.wpforms-container.wpforms-container-full .wpforms-form input[type="date"],
        div.wpforms-container.wpforms-container-full .wpforms-form input[type="datetime"],
        div.wpforms-container.wpforms-container-full .wpforms-form input[type="datetime-local"],
        div.wpforms-container.wpforms-container-full .wpforms-form input[type="email"],
        div.wpforms-container.wpforms-container-full .wpforms-form input[type="month"],
        div.wpforms-container.wpforms-container-full .wpforms-form input[type="number"],
        div.wpforms-container.wpforms-container-full .wpforms-form input[type="password"],
        div.wpforms-container.wpforms-container-full .wpforms-form input[type="range"],
        div.wpforms-container.wpforms-container-full .wpforms-form input[type="search"],
        div.wpforms-container.wpforms-container-full .wpforms-form input[type="tel"],
        div.wpforms-container.wpforms-container-full .wpforms-form input[type="text"],
        div.wpforms-container.wpforms-container-full .wpforms-form input[type="time"],
        div.wpforms-container.wpforms-container-full .wpforms-form input[type="url"],
        div.wpforms-container.wpforms-container-full .wpforms-form input[type="week"],
        div.wpforms-container.wpforms-container-full .wpforms-form .select-wrap,
        div.wpforms-container.wpforms-container-full .wpforms-form textarea,
        div.wpforms-container.wpforms-container-full .wpforms-form .input-floating-wrap,
        .wp-block-search .wp-block-search__input, 
        .select2-container.select2-container--default .select2-selection--single {' .
            '--additional-line-height: ' . esc_attr($additional_font_array['line_height']) . esc_attr($additional_font_array['line_height_unit']) . ';' .
            aiero_print_font_styles( $additional_font, array('font_family', 'font_size', 'line_height', 'font_style', 'font_weight') ) . 
        '}
    ';
}

if (
    !empty($additional_font_array['font_size'])
) {
    $aiero_custom_css .= '
        body {' .
            '--wpforms-field-size-font-size: ' . esc_attr($additional_font_array['font_size']) . esc_attr($additional_font_array['font_size_unit']) . ';' .
        '}
    ';
}