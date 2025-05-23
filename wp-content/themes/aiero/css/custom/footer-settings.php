<?php

// ----------------------------- //
// ------ Footer Settings ------ //
// ----------------------------- //
$hide_footer_background_image = false;
$page_for_posts = get_option( 'page_for_posts' );
if( aiero_post_options() &&
    (is_singular() || 
    (class_exists('WooCommerce') && is_woocommerce()) ||
    (is_home() && $page_for_posts)) ) {
        if( aiero_get_post_option('footer_customize') == 'on') {
            $hide_footer_background_image = (bool)aiero_get_post_option('hide_footer_background_image');
        }        
}

$footer_background_position = aiero_get_prepared_option('footer_background_position', '', 'footer_customize');
$footer_background_repeat   = aiero_get_prepared_option('footer_background_repeat', '', 'footer_customize');
$footer_background_size     = aiero_get_prepared_option('footer_background_size', '', 'footer_customize');
$footer_background_image    = aiero_get_prepared_img_url('footer_background_image', 'footer_customize');
if ( !empty($footer_background_position) || !empty($footer_background_repeat) || !empty($footer_background_size) ) {
    $aiero_custom_css .= '
        .footer .footer-bg {' .
            ( !empty($footer_background_position) ? 'background-position: ' . esc_attr($footer_background_position) . ';' : '' ) .
            ( !empty($footer_background_repeat) ? 'background-repeat: ' . esc_attr($footer_background_repeat) . ';' : '' ) .
            ( !empty($footer_background_size) ? '-webkit-background-size: ' . esc_attr($footer_background_size) . ';' : '' ) .
            ( !empty($footer_background_size) ? 'background-size: ' . esc_attr($footer_background_size) . ';' : '' ) .
        '}
    ';
}
if ( !empty($footer_background_image) && !$hide_footer_background_image ) {
    $aiero_custom_css .= '
        @media only screen and (min-width: 768px) {
            .footer .footer-bg {' .
                ( !empty($footer_background_image) ? 'background-image: url("' . esc_attr($footer_background_image) . '");' : '' ) .
            '}
        }
    ';
}