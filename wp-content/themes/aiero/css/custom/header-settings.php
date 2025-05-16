<?php

// ----------------------------- //
// ------ Header Settings ------ //
// ----------------------------- //

# Header Menu
$header_menu_font       = aiero_get_prepared_option('header_menu_font', 'main_font', 'header_menu_customize');
$header_menu_font_array = json_decode($header_menu_font, true);
if (
    !empty($header_menu_font_array['font_family']) ||
    !empty($header_menu_font_array['font_size']) ||
    !empty($header_menu_font_array['line_height']) ||
    !empty($header_menu_font_array['text_transform']) ||
    !empty($header_menu_font_array['letter_spacing']) ||
    !empty($header_menu_font_array['word_spacing']) ||
    !empty($header_menu_font_array['font_style']) ||
    !empty($header_menu_font_array['font_weight'])
) {
    $aiero_custom_css .= '
        .header .main-menu > li > a {' .
            aiero_print_font_styles( $header_menu_font, array('font_family', 'font_size', 'line_height', 'text_transform', 'letter_spacing', 'word_spacing', 'font_style', 'font_weight') ) .
        '}
        .mobile-header-menu-container .main-menu > li > a,
        .slide-extra .extra-menu > li > a {' .
            aiero_print_font_styles( $header_menu_font, array('font_family', 'text_transform', 'letter_spacing', 'word_spacing', 'font_style', 'font_weight') ) .
        '}
    ';
}

# Header Sub Menu
$header_sub_menu_font       = aiero_get_prepared_option('header_sub_menu_font', 'main_font', 'header_menu_customize');
$header_sub_menu_font_array = json_decode($header_sub_menu_font, true);
if (
    !empty($header_sub_menu_font_array['font_family']) ||
    !empty($header_sub_menu_font_array['font_size']) ||
    !empty($header_sub_menu_font_array['line_height']) ||
    !empty($header_sub_menu_font_array['text_transform']) ||
    !empty($header_sub_menu_font_array['letter_spacing']) ||
    !empty($header_sub_menu_font_array['word_spacing']) ||
    !empty($header_sub_menu_font_array['font_style']) ||
    !empty($header_sub_menu_font_array['font_weight'])
) {
    $aiero_custom_css .= '
        .header .main-menu > li ul.sub-menu > li > a {' .
            aiero_print_font_styles( $header_sub_menu_font, array('font_family', 'font_size', 'line_height', 'text_transform', 'letter_spacing', 'word_spacing', 'font_style', 'font_weight') ) .
        '}
        .mobile-header-menu-container .main-menu > li ul.sub-menu > li > a,
        .alter-menu-menu .main-menu > li > a,
        .slide-extra .extra-menu > li ul.sub-menu > li > a {' .
            aiero_print_font_styles( $header_sub_menu_font, array('font_family', 'text_transform', 'letter_spacing', 'word_spacing', 'font_style') ) .
        '}
    ';
}

# Mobile Header Breakpoint
$mobile_header_breakpoint = aiero_get_prepared_option('mobile_header_breakpoint');
if (
    !empty($mobile_header_breakpoint)
) {
    $aiero_custom_css .= '
        @media only screen and (min-width: ' . esc_attr($mobile_header_breakpoint) . 'px) {
            .top-bar {
                display: block;
            }
            .header {
                display: block !important;
            }
            .mobile-header {
                display: none !important;
            }
            .header-wrapper {
                padding: 8px 0 0;
            }
            .header-wrapper.no-top-bar {
                padding: 18px 0 0;
            }
        }
    ';
} else {
    $aiero_custom_css .= '
        @media only screen and (min-width: 992px) {
            .header-wrapper {
                padding: 8px 0 0;
            }
            .header-wrapper.no-top-bar {
                padding: 18px 0 0;
            }
        }
    ';
}

$header_menu_bg_image = aiero_get_prepared_img_url('header_menu_bg_image', 'header_menu_bg_image_status');

if(aiero_get_prefered_option('header_menu_bg_image_status') == 'on' && !empty($header_menu_bg_image)) {
    $aiero_custom_css .= '
        .alter-menu-wrapper:before {
            background-image: url("' . esc_attr($header_menu_bg_image) . '");
        }
    ';
}

# Side Panel Settings
$side_panel_bg_image = aiero_get_prepared_img_url('side_panel_bg_image', 'side_panel_bg_image_status');

if(aiero_get_prefered_option('side_panel_bg_image_status') == 'on' && !empty($side_panel_bg_image)) {
    $aiero_custom_css .= '
        .slide-sidebar-wrapper {
            background-image: url("' . esc_attr($side_panel_bg_image) . '");
        }
    ';
}

$side_panel_close_bg_image = aiero_get_prepared_img_url('side_panel_close_bg_image', 'side_panel_close_bg_image_status');

if(aiero_get_prefered_option('side_panel_close_bg_image_status') == 'on' && !empty($side_panel_close_bg_image)) {
    $aiero_custom_css .= '
        .slide-sidebar-wrapper:before {
            background-image: url("' . esc_attr($side_panel_close_bg_image) . '");
        }
    ';
}

$page_for_posts = get_option( 'page_for_posts' );
$header_offset_top = false;
if( aiero_post_options() && 
	(is_singular() || 
    (class_exists('WooCommerce') && is_woocommerce()) ||
    (is_home() && $page_for_posts)) ) {	
	if( aiero_get_post_option('header_customize') == 'on' ) {
		$header_offset_top = rwmb_meta('header_offset_top');		
	} elseif ( aiero_get_post_option('header_customize') == 'default' && aiero_get_theme_mod('header_customize') == 'on' ) {
        $header_offset_top = aiero_get_theme_mod('header_offset_top');
    }
    if ( (isset($header_offset_top) && is_numeric($header_offset_top)) ) {
        if( empty($mobile_header_breakpoint)) {
		    $aiero_custom_css .= '
		        @media only screen and (min-width: 992px) {
		            .top-page-wrapper .header-wrapper {
		                padding-top: ' . esc_attr($header_offset_top) . 'px;
		            }
		        }        
		    ';
		} else {
		    $aiero_custom_css .= '
		        @media only screen and (min-width: ' . esc_attr($mobile_header_breakpoint) . 'px) {
		            .top-page-wrapper .header-wrapper {
		                padding-top: ' . esc_attr($header_offset_top) . 'px;
		            }
		        }
		    ';
		}
    }
} else {
	$header_offset_top = aiero_get_theme_mod('header_offset_top');
    if ( aiero_get_theme_mod('header_customize') == 'on' && (isset($header_offset_top) && is_numeric($header_offset_top)) ) {
    	if( empty($mobile_header_breakpoint)) {
		    $aiero_custom_css .= '
		        @media only screen and (min-width: 992px) {
		            .top-page-wrapper .header-wrapper {
		                padding-top: ' . esc_attr($header_offset_top) . 'px;
		            }
		        }
		    ';
		} else {
		    $aiero_custom_css .= '
		        @media only screen and (min-width: ' . esc_attr($mobile_header_breakpoint) . 'px) {
		            .top-page-wrapper .header-wrapper {
		                padding-top: ' . esc_attr($header_offset_top) . 'px;
		            }
		        }        
		    ';
		}
    }
}

// --------------------------- //
// ------ Page Settings ------ //
// --------------------------- //

$page_background_image_top = aiero_get_prepared_img_url('page_background_image_top', 'page_background_image_top_status');
$page_background_image_top_repeat = aiero_get_prepared_option('page_background_image_top_repeat', '', 'page_background_image_top_status');
$page_background_image_top_size = aiero_get_prepared_option('page_background_image_top_size', '', 'page_background_image_top_status');

if(aiero_get_prefered_option('page_background_image_top_status') == 'on' && !empty($page_background_image_top)) {
    $aiero_custom_css .= '
        .body-container:before {
            background: url("' . esc_attr($page_background_image_top) . '") top center;' .
            'background-size: ' . ( !empty($page_background_image_top_size) ? esc_attr($page_background_image_top_size) : '100% auto' ) . ';
            background-repeat: ' . ( !empty($page_background_image_top_repeat) ? esc_attr($page_background_image_top_repeat) : 'no-repeat' ) . ';' .
    '}'; 
}