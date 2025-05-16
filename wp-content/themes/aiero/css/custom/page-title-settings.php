<?php

// --------------------------------- //
// ------ Page Title Settings ------ //
// --------------------------------- //

# General
$page_title_height              = aiero_get_prepared_option('page_title_height', '', 'page_title_customize');
$page_title_background_position = aiero_get_prepared_option('page_title_background_position', '', 'page_title_customize');
$page_title_background_repeat   = aiero_get_prepared_option('page_title_background_repeat', '', 'page_title_customize');
$page_title_background_size     = aiero_get_prepared_option('page_title_background_size', '', 'page_title_customize');

$hide_page_title_background_mobile = (bool)aiero_get_prepared_option('hide_page_title_background_mobile', '', 'page_title_customize');
$hide_page_title_background_tablet = (bool)aiero_get_prepared_option('hide_page_title_background_tablet', '', 'page_title_customize');

$page_title_background_image = aiero_get_prepared_img_url('page_title_background_image', 'page_title_customize');
if ( !empty($page_title_height) ) {
    $aiero_custom_css .= '
        @media only screen and (min-width: 992px) {
            .page-title-container {' .
                ( !empty($page_title_height) ? 'min-height: ' . esc_attr($page_title_height) . 'px;' : '' ) .
            '}
        }
    ';
}
if ( !empty($page_title_background_position) || !empty($page_title_background_repeat) || !empty($page_title_background_size) ) {
    $aiero_custom_css .= '
        .page-title-container .page-title-bg {' .
            ( !empty($page_title_background_position) ? 'background-position: ' . esc_attr($page_title_background_position) . ';' : '' ) .
            ( !empty($page_title_background_repeat) ? 'background-repeat: ' . esc_attr($page_title_background_repeat) . ';' : '' ) .
            ( !empty($page_title_background_size) ? '-webkit-background-size: ' . esc_attr($page_title_background_size) . ';' : '' ) .
            ( !empty($page_title_background_size) ? 'background-size: ' . esc_attr($page_title_background_size) . ';' : '' ) .
        '}
    ';
}
if ( !empty($page_title_background_image) ) {
    $aiero_custom_css .= '
        .page-title-container .page-title-bg {' .
            ( !empty($page_title_background_image) ? 'background-image: url("' . esc_attr($page_title_background_image) . '");' : '' ) .
        '}';
}
if ( $hide_page_title_background_mobile ) {
    $aiero_custom_css .= '
        @media only screen and (max-width: 767px) {
            .page-title-container .page-title-bg {
                background-image: none;
            }
        }
    ';
}
if ( $hide_page_title_background_tablet ) {
    $aiero_custom_css .= '
        @media only screen and (min-width: 768px) and (max-width: 991px) {
            .page-title-container .page-title-bg {
                background-image: none;
            }
        }
    ';
}

$page_for_posts = get_option( 'page_for_posts' );
if( aiero_post_options() && 
	(is_singular() || 
    (class_exists('WooCommerce') && is_woocommerce()) ||
    (is_home() && $page_for_posts)) ) {
        $page_title_additional_text_bottom_position = rwmb_meta('page_title_additional_text_bottom_position');
        if( aiero_get_post_option('page_title_additional_customize') == 'on' && $page_title_additional_text_bottom_position !== '' ) {
            $aiero_custom_css .= '
                @media screen and (min-width: 768px) {
                    .page-title-container .page-title-additional {
                        bottom: ' . esc_attr($page_title_additional_text_bottom_position) . '%;
                    }
                }
            ';
        } elseif ( aiero_get_post_option('page_title_additional_customize') == 'default' ) {
            $page_title_additional_text_bottom_position = aiero_get_theme_mod('page_title_additional_text_bottom_position');
            if ( aiero_get_theme_mod('page_title_additional_customize') == 'on' && $page_title_additional_text_bottom_position !== '' ) {
                $aiero_custom_css .= '
                    @media screen and (min-width: 768px) {
                        .page-title-container .page-title-additional {
                            bottom: ' . esc_attr($page_title_additional_text_bottom_position) . '%;
                        }
                    }
                ';
            }
        }
} else {
    $page_title_additional_text_bottom_position = aiero_get_theme_mod('page_title_additional_text_bottom_position');
    if ( aiero_get_theme_mod('page_title_additional_customize') == 'on' && $page_title_additional_text_bottom_position !== '' ) {
        $aiero_custom_css .= '
            @media screen and (min-width: 768px) {
                .page-title-container .page-title-additional {
                    bottom: ' . esc_attr($page_title_additional_text_bottom_position) . '%;
                }
            }
        ';
    }
}

# Heading
$page_title_heading_font        = aiero_get_prepared_option('page_title_heading_font', '', 'page_title_heading_customize');
$page_title_heading_font_array  = json_decode($page_title_heading_font, true);
if (
    !empty($page_title_heading_font_array['font_family']) ||
    !empty($page_title_heading_font_array['text_transform']) ||
    !empty($page_title_heading_font_array['letter_spacing']) ||
    !empty($page_title_heading_font_array['word_spacing']) ||
    !empty($page_title_heading_font_array['font_style']) ||
    !empty($page_title_heading_font_array['font_weight'])
) {
    $aiero_custom_css .= '
        .page-title-container h1.page-title,
        .page-title-container .page-title-box .page-title {' .
            aiero_print_font_styles( $page_title_heading_font, array('font_family', 'text_transform', 'letter_spacing', 'word_spacing', 'font_style', 'font_weight') ) .
        '}
    ';
}

if (
    !empty($page_title_heading_font_array['font_size']) ||
    !empty($page_title_heading_font_array['line_height'])
) {
    if ( $page_title_heading_font_array['font_size_unit'] == 'px' && (int)$page_title_heading_font_array['font_size'] > 50 ) {
        $aiero_custom_css .= '
            @media only screen and (min-width: 768px) {
                .page-title-container .page-title {' .
                    aiero_print_font_styles( $page_title_heading_font, array('line_height') ) .
                '}
                .body-container .page-title-container,
                .edit-post-visual-editor__post-title-wrapper .editor-post-title {
                    font-size: 50px;' .
                    aiero_print_font_styles( $page_title_heading_font, array('line_height') ) .
                ' }
            }';
        if ( $page_title_heading_font_array['font_size_unit'] == 'px' && (int)$page_title_heading_font_array['font_size'] > 60 ) {
            $aiero_custom_css .= '
            @media only screen and (min-width: 992px) {
                .body-container .page-title-container,
                .edit-post-visual-editor__post-title-wrapper .editor-post-title {
                    font-size: 60px;' .
                    aiero_print_font_styles( $page_title_heading_font, array('line_height') ) .
                ' }
            }
            @media only screen and (min-width: 1440px) {
                .body-container .page-title-container,
                .edit-post-visual-editor__post-title-wrapper .editor-post-title {' .
                    aiero_print_font_styles( $page_title_heading_font, array('font_size', 'line_height' ) ) .
                ' }
            }';
        } else {
            $aiero_custom_css .= '@media only screen and (min-width: 992px) {
                .body-container .page-title-container,
                .edit-post-visual-editor__post-title-wrapper .editor-post-title {' .
                    aiero_print_font_styles( $page_title_heading_font, array('font_size', 'line_height' ) ) .
                '}
            }';
        }        
    } else {
        $aiero_custom_css .= '
            @media only screen and (min-width: 768px) {
                .page-title-container .page-title {' .
                    aiero_print_font_styles( $page_title_heading_font, array('line_height') ) .
                '}
                .body-container .page-title-container,
                .edit-post-visual-editor__post-title-wrapper .editor-post-title {' .
                    aiero_print_font_styles( $page_title_heading_font, array('font_size', 'line_height' ) ) .
                '}
            }
        ';
    }
}

# Breadcrumbs
$page_title_breadcrumbs_font        = aiero_get_prepared_option('page_title_breadcrumbs_font', '', 'page_title_breadcrumbs_customize');
$page_title_breadcrumbs_font_array  = json_decode($page_title_breadcrumbs_font, true);
if (
    !empty($page_title_breadcrumbs_font_array['font_family']) ||
    !empty($page_title_breadcrumbs_font_array['text_transform']) ||
    !empty($page_title_breadcrumbs_font_array['letter_spacing']) ||
    !empty($page_title_breadcrumbs_font_array['word_spacing']) ||
    !empty($page_title_breadcrumbs_font_array['font_style']) ||
    !empty($page_title_breadcrumbs_font_array['font_weight'])
) {
    $aiero_custom_css .= '
        .page-title-container .breadcrumbs {' .
            aiero_print_font_styles( $page_title_breadcrumbs_font, array('font_family', 'font_size', 'line_height', 'text_transform', 'letter_spacing', 'word_spacing', 'font_style', 'font_weight') ) .
        '}
    ';
}

# Additional
$page_title_additional_text_color = aiero_get_prepared_option('page_title_additional_text_color', '', 'page_title_additional_customize');
if ( !empty($page_title_additional_text_color) ) {
    $aiero_custom_css .= '
        .page-title-container .page-title-additional {
            color: ' . esc_attr($page_title_additional_text_color) . ';
        }
    ';
}

$page_title_additional_text_font        = aiero_get_prepared_option('page_title_additional_text_font', '', 'page_title_additional_customize');
$page_title_additional_text_font_array  = json_decode($page_title_additional_text_font, true);
if (
    !empty($page_title_additional_text_font_array['font_family']) ||
    !empty($page_title_additional_text_font_array['text_transform']) ||
    !empty($page_title_additional_text_font_array['letter_spacing']) ||
    !empty($page_title_additional_text_font_array['word_spacing']) ||
    !empty($page_title_additional_text_font_array['font_style']) ||
    !empty($page_title_additional_text_font_array['font_weight'])
) {
    $aiero_custom_css .= '
        .page-title-container .page-title-additional {' .
            aiero_print_font_styles( $page_title_additional_text_font, array('font_family', 'text_transform', 'letter_spacing', 'word_spacing', 'font_style', 'font_weight') ) .
        '}
    ';
}