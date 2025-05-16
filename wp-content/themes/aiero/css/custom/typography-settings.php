<?php
// -------------------------------- //
// ------- Additional Fonts ------- //
// -------------------------------- //
$aiero_custom_css .= "        
    @font-face {
        font-family: 'Manrope Alt';
        src: url('" . get_template_directory_uri() . "/fonts/Manrope-ExtraLight.ttf') format('truetype');             
        font-weight: 200;
        font-style: normal;
    }
    @font-face {
        font-family: 'Manrope Alt';
        src: url('" . get_template_directory_uri() . "/fonts/Manrope-Light.ttf') format('truetype');             
        font-weight: 300;
        font-style: normal;
    }    
    @font-face {
        font-family: 'Manrope Alt';
        src: url('" . get_template_directory_uri() . "/fonts/Manrope-Regular.ttf') format('truetype');             
        font-weight: normal;
        font-style: normal;
    }
    @font-face {
        font-family: 'Manrope Alt';
        src: url('" . get_template_directory_uri() . "/fonts/Manrope-Medium.ttf') format('truetype');             
        font-weight: 500;
        font-style: normal;
    }
    @font-face {
        font-family: 'Manrope Alt';
        src: url('" . get_template_directory_uri() . "/fonts/Manrope-SemiBold.ttf') format('truetype');             
        font-weight: 600;
        font-style: normal;
    }
    @font-face {
        font-family: 'Manrope Alt';
        src: url('" . get_template_directory_uri() . "/fonts/Manrope-Bold.ttf') format('truetype');             
        font-weight: bold;
        font-style: normal;
    }
    @font-face {
        font-family: 'Manrope Alt';
        src: url('" . get_template_directory_uri() . "/fonts/Manrope-ExtraBold.ttf') format('truetype');             
        font-weight: 800;
        font-style: normal;
    }
";

// --------------------------------- //
// ------ Typography Settings ------ //
// --------------------------------- //

$aiero_custom_css .= '
    body {
        --wp--preset--font-size--x-large: 40px;
    }
';

# Main Font
$main_font          = aiero_get_prepared_option('main_font');
$main_font_array    = json_decode($main_font, true);
if (
    !empty($main_font_array['font_family']) ||
    !empty($main_font_array['font_size']) ||
    !empty($main_font_array['line_height']) ||
    !empty($main_font_array['text_transform']) ||
    !empty($main_font_array['letter_spacing']) ||
    !empty($main_font_array['word_spacing']) ||
    !empty($main_font_array['font_style']) ||
    !empty($main_font_array['font_weight'])
) {
    $aiero_custom_css .= '
        body,
        .grid-listing .grid-item,
        .case-study-grid-listing .grid-item,
        .elementor-widget-image-box .elementor-image-box-wrapper .elementor-image-box-content .elementor-image-box-description,        
        .error-404-info-text,
        .elementor-widget-aiero_image_carousel .aiero-image-slider-widget .slider-item .elementor-image-carousel-caption,
        .aiero-image-slider-widget .slider-item-description,
        .footer .footer-menu li a {' .
            aiero_print_font_styles( $main_font, array('font_family', 'font_size', 'line_height', 'text_transform', 'letter_spacing', 'word_spacing', 'font_style', 'font_weight') ) .
        '}
    ';
}
if (
    !empty($main_font_array['font_family'])
) {
    $aiero_custom_css .= '
        .aiero-heading .aiero-subheading,
        .team-expirience .team-expirience-education h5,
        .team-expirience .team-expirience-professional h5,
        .team-contact-info-card .team-contact-info h5,
        .team-info-additional .team-achievements h6, 
        .team-info-additional .team-responsibilities h6,
        .elementor-widget-aiero_step_carousel .step-title {' .
            aiero_print_font_styles( $main_font, array('font_family') ) .
        '}
    ';
}
if (
    !empty($main_font_array['font_size'])
) {
    $aiero_custom_css .= '
        .post-more-button {' .
            aiero_print_font_styles( $main_font, array('font_size') ) .
        '}
    ';
}
if (
    !empty($main_font_array['line_height'])
) {
    $aiero_custom_css .= '
        p {' .
            aiero_print_font_styles( $main_font, array('line_height') ) .
        '}
    ';
}
if (
    !empty($main_font_array['font_size']) ||
    !empty($main_font_array['line_height']) ||
    !empty($main_font_array['font_weight'])
) {
    $aiero_custom_css .= '
        .post-excerpt,
        .woocommerce form label,
        .post-content,
        .service-item .service-item-excerpt {' .
            aiero_print_font_styles( $main_font, array('font_size', 'line_height', 'font_weight') ) .
        '}
        .woocommerce form .form-row input::-webkit-input-placeholder,
        .woocommerce form .form-row textarea::-webkit-input-placeholder {' .
            aiero_print_font_styles( $main_font, array('font_size', 'line_height', 'font_weight') ) .
        '}
        .woocommerce form .form-row input:-moz-placeholder,
        .woocommerce form .form-row textarea:-moz-placeholder {' .
            aiero_print_font_styles( $main_font, array('font_size', 'line_height', 'font_weight') ) .
        '}
        .woocommerce form .form-row input::-moz-placeholder,
        .woocommerce form .form-row textarea::-moz-placeholder {' .
            aiero_print_font_styles( $main_font, array('font_size', 'line_height', 'font_weight') ) .
        '}
        .woocommerce form .form-row input:-ms-input-placeholder,
        .woocommerce form .form-row textarea:-ms-input-placeholder {' .
            aiero_print_font_styles( $main_font, array('font_size', 'line_height', 'font_weight') ) .
        '}
    ';
}
if (
    !empty($main_font_array['font_family'])
) {
    $aiero_custom_css .= '
        body .content-wrapper .elementor-widget-text-editor,
        .elementor-icon-list-items .elementor-icon-list-item .elementor-icon-list-text,
        .footer .widget_nav_menu ul li,
        .footer .widget_archive ul li,
        .footer .widget_categories ul li,
        .widget_pages ul li,
        .footer-widgets > .widget .widget-title, 
        .footer-widgets > .widget .widget-wrapper h1, 
        .footer-widgets > .widget .widget-wrapper h2, 
        .footer-widgets > .widget .widget-wrapper h3, 
        .footer-widgets > .widget .widget-wrapper h4, 
        .footer-widgets > .widget .widget-wrapper h5, 
        .footer-widgets > .widget .widget-wrapper h6, 
        .footer-widgets > .widget .wp-block-search .wp-block-search__label {' .
            aiero_print_font_styles( $main_font, array('font_family') ) .
        '}
    ';
}

# Headings
$headings_font          = aiero_get_prepared_option('headings_font');
$headings_font_array    = json_decode($headings_font, true);
if (
    !empty($headings_font_array['font_family']) ||
    !empty($headings_font_array['text_transform']) ||
    !empty($headings_font_array['font_style'])
) {
    $aiero_custom_css .= '
        h1, h2, h3, h4, h5, h6,
        .page-title-container .page-title,
        body .elementor-widget-heading .elementor-heading-title,
        .woocommerce-Reviews-title,
        .woocommerce .comment-reply-title,
        .cart_totals h2,
        .woocommerce-account .woocommerce-EditAccountForm fieldset legend,
        .elementor-widget-image-box .elementor-image-box-wrapper .elementor-image-box-content .elementor-image-box-title,
        .wpforms-form .wpforms-title,
        .wp-block-search .wp-block-search__label {' .
            aiero_print_font_styles( $headings_font, array('font_family', 'text_transform', 'font_style') ) .
        '}
    ';
}
if (
    !empty($headings_font_array['font_family'])
) {
    $aiero_custom_css .= '
        .logo,
        .wrapper-info .additional-text-title,
        div.wpforms-container.wpforms-container-full .wpforms-form .wpforms-field-number-slider .wpforms-field-number-slider-hint,
        div.wpforms-container.wpforms-container-full .wpforms-form .wpforms-field-label,
        .widget_aiero_featured_posts_widget .featured-posts-item-link,
        .portfolio-item .post-title,
        .team-experience-item-period,
        .team-item .post-title,
        .project-item-wrapper .post-title,
        .project-post-meta .project-post-meta-label,
        .help-item .help-item-title,
        .aiero-step-widget .step-bg-number,
        .aiero-step-widget .step-number,
        .elementor-widget-accordion .elementor-accordion .elementor-tab-title,
        .widget_aiero_featured_posts_widget .featured-posts-item-link,
        .widget_recent_entries li,
        .wp-block-latest-posts li a,
        .widget_rss ul a.rsswidget,
        .wp-block-rss .wp-block-rss__item-title,
        .post-navigation-title,
        .aiero-price-item-widget .price-item .price-item-title,
        .aiero-price-item-widget .price-item .price-item-container,
        .aiero-person-widget .person-name,
        .banner-widget .banner-subtitle,
        .aiero_tabs_widget .aiero_tabs_titles_container .aiero_tab_title_item,
        .elementor-widget-aiero_countdown .countdown_separator,
        .elementor-widget-aiero_countdown .countdown_digits,
        .elementor-widget-aiero_countdown .countdown_digits_placeholder,
        .aiero_content_slider_widget .aiero_content_slider_title,
        .elementor-widget-image-box .elementor-image-box-wrapper .elementor-image-box-content .elementor-image-box-title,
        .aiero_content_slider_widget .slick-navigation .slick-arrow,
        .widget_rss ul a.rsswidget,
        .widget_rss .rss-date,
        .widget_rss cite,
        .widget_aiero_contacts_widget .aiero-contacts-widget-field,
        .result-box,
        .aiero-heading,
        .elementor-widget-aiero_vertical_text .vertical-text,
        .aiero-image-slider-widget .slider-item-title,
        .elementor-widget-progress .elementor-widget-container .elementor-title,
        .elementor-widget-progress .elementor-progress-bar,
        .aiero-content-slider-widget .bottom-area .content-slider-contacts,
        .elementor-widget-aiero_custom_menu ul li a,
        .widget_aiero_special_text_widget .aiero-special-text-widget-text,
        .team-item .team-item-tag,
        .team-contact-info-card .team-item-tag,
        .team-info-additional .team-achievements-box .team-achievements-box-value,
        .elementor-widget-counter .elementor-counter .elementor-counter-number-wrapper,
        .elementor-widget-aiero_special_text .special-text,
        .aiero-testimonial-carousel-widget .testimonial-item .testimonial,
        .gallery-wrapper .gallery-item-wrapper .post-title,
        .elementor-widget-aiero_step_carousel .step-item .step-number,
        .project-listing-wrapper.project-cards-listing .project-item-wrapper .project-item-title,
        .moving-list .moving-item .moving-item-title,
        .service-slider-listing .service-item-link .service-item-subtitle {' .
            aiero_print_font_styles( $headings_font, array('font_family') ) .
        '}
    ';
}
$h1_font        = aiero_get_prepared_option('h1_font');
$h1_font_array  = json_decode($h1_font, true);
if (
    !empty($h1_font_array['font_weight']) ||
    !empty($h1_font_array['letter_spacing']) ||
    !empty($h1_font_array['word_spacing'])
) {
    $aiero_custom_css .= '
        h1,
        body .elementor-widget-heading h1.elementor-heading-title {' .
            aiero_print_font_styles( $h1_font, array('font_weight','letter_spacing','word_spacing') ) .
        '}
    ';
}
if (
    !empty($h1_font_array['font_size']) ||
    !empty($h1_font_array['line_height'])
) {
    if ( $h1_font_array['font_size_unit'] == 'px' && (int)$h1_font_array['font_size'] > 60 ) {
        $aiero_custom_css .= '
            @media only screen and (min-width: 576px) {
                h1,
                body .elementor-widget-heading h1.elementor-heading-title {
                    font-size: 60px;' .
                    aiero_print_font_styles( $h1_font, array('line_height' ) ) .
                '}
            }
        ';
    }
    $aiero_custom_css .= '
        @media only screen and (min-width: 992px) {
            h1,
            body .elementor-widget-heading h1.elementor-heading-title {' .
            aiero_print_font_styles( $h1_font, array('font_size', 'line_height' ) ) .
            '}
        }
    ';
}
$h2_font        = aiero_get_prepared_option('h2_font');
$h2_font_array  = json_decode($h2_font, true);
if (
    !empty($h2_font_array['font_weight']) ||
    !empty($h2_font_array['letter_spacing']) ||
    !empty($h2_font_array['word_spacing'])
) {
    $aiero_custom_css .= '
        h2,
        .editor-styles-wrapper .block-editor-block-list__layout h2,
        body .elementor-widget-heading h2.elementor-heading-title {' .
            aiero_print_font_styles( $h2_font, array('font_weight','letter_spacing','word_spacing') ) .
        '}
    ';
}
if (
    !empty($h2_font_array['font_size']) ||
    !empty($h2_font_array['line_height'])
) {
    if ( $h2_font_array['font_size_unit'] == 'px' && (int)$h2_font_array['font_size'] > 35 ) {
        $aiero_custom_css .= '
        @media only screen and (min-width: 768px) {
            h2,
            .editor-styles-wrapper .block-editor-block-list__layout h2,
            body .elementor-widget-heading h2.elementor-heading-title {
                font-size: 35px;'.
                aiero_print_font_styles( $h2_font, array('line_height') ) .
            '}
        }
        @media only screen and (min-width: 992px) {
            h2,
            .editor-styles-wrapper .block-editor-block-list__layout h2,
            body .elementor-widget-heading h2.elementor-heading-title {' .
                aiero_print_font_styles( $h2_font, array('font_size', 'line_height') ) .
            '}
        }';
    } else {
        $aiero_custom_css .= '
        @media only screen and (min-width: 768px) {
            h2,
            .editor-styles-wrapper .block-editor-block-list__layout h2,
            body .elementor-widget-heading h2.elementor-heading-title {' .
                aiero_print_font_styles( $h2_font, array('font_size', 'line_height') ) .
            '}
        }';
    }
}
$h3_font        = aiero_get_prepared_option('h3_font');
$h3_font_array  = json_decode($h3_font, true);
if (
    !empty($h3_font_array['font_weight']) ||
    !empty($h3_font_array['letter_spacing']) ||
    !empty($h3_font_array['word_spacing'])
) {
    $aiero_custom_css .= '
        h3,
        .editor-styles-wrapper .block-editor-block-list__layout h3,
        body .elementor-widget-heading h3.elementor-heading-title {' .
            aiero_print_font_styles( $h3_font, array('font_weight','letter_spacing','word_spacing') ) .
        '}
    ';
}
if (
    !empty($h3_font_array['font_size']) ||
    !empty($h3_font_array['line_height'])
) {
    if ( $h3_font_array['font_size_unit'] == 'px' && (int)$h3_font_array['font_size'] > 30 ) {
        $aiero_custom_css .= '
        @media only screen and (min-width: 768px) {
            h3,
            .team-experience-title h3,
            .editor-styles-wrapper .block-editor-block-list__layout h3,
            body .elementor-widget-heading h3.elementor-heading-title {
                font-size: 30px;' .
                aiero_print_font_styles( $h3_font, array('line_height') ) .
            '}
        }
        @media only screen and (min-width: 992px) {
            h3,
            .team-experience-title h3,
            .editor-styles-wrapper .block-editor-block-list__layout h3,
            body .elementor-widget-heading h3.elementor-heading-title {' .
                aiero_print_font_styles( $h3_font, array('font_size', 'line_height') ) .
            '}
        }';
    } else {
        $aiero_custom_css .= '
            @media only screen and (min-width: 768px) {
                h3,
                .editor-styles-wrapper .block-editor-block-list__layout h3,
                body .elementor-widget-heading h3.elementor-heading-title {' .
                    aiero_print_font_styles( $h3_font, array('font_size', 'line_height') ) .
                '}
            }
        ';
    }
}
$h4_font        = aiero_get_prepared_option('h4_font');
$h4_font_array  = json_decode($h4_font, true);
if (
    !empty($h4_font_array['font_weight']) ||
    !empty($h4_font_array['letter_spacing']) ||
    !empty($h4_font_array['word_spacing'])
) {
    $aiero_custom_css .= '
        h4,
        .editor-styles-wrapper .block-editor-block-list__layout h4,
        body .elementor-widget-heading h4.elementor-heading-title,               
        .woocommerce .comment-reply-title,
        .woocommerce-Reviews-title,
        .woocommerce-account h3,
        .woocommerce-account .woocommerce-EditAccountForm fieldset legend,
        .outer-form-wrapper h2,
        .woocommerce-MyAccount-content h2,
        .woocommerce-order h2,
        .cart_totals h2,
        .woocommerce-checkout h3,
        .wp-block-search .wp-block-search__label,
        .widget_block .widget-wrapper h1,
        .widget_block .widget-wrapper h2,
        .widget_block .widget-wrapper h3 {' .
            aiero_print_font_styles( $h4_font, array('font_weight','letter_spacing','word_spacing') ) .
        '}
    ';
}
if (
    !empty($h4_font_array['font_size']) ||
    !empty($h4_font_array['line_height'])
) {
    if ( $h4_font_array['font_size_unit'] == 'px' && (int)$h4_font_array['font_size'] > 25 ) {
        $aiero_custom_css .= '
        @media only screen and (min-width: 768px) {
            h4,
            .editor-styles-wrapper .block-editor-block-list__layout h4,
            body .elementor-widget-heading h4.elementor-heading-title,
            .woocommerce .comment-reply-title,
            .woocommerce-Reviews-title,
            .woocommerce-account h3,
            .woocommerce-account .woocommerce-EditAccountForm fieldset legend,
            .outer-form-wrapper h2,
            .woocommerce-MyAccount-content h2,
            .woocommerce-order h2,
            .cart_totals h2,
            .woocommerce-checkout h3,
            .wp-block-search .wp-block-search__label,
            .widget_block .widget-wrapper h1,
            .widget_block .widget-wrapper h2,
            .widget_block .widget-wrapper h3 {
                font-size: 25px;' .
                aiero_print_font_styles( $h4_font, array('line_height') ) .
            '}
        }
        @media only screen and (min-width: 992px) {
            h4,
            .editor-styles-wrapper .block-editor-block-list__layout h4,
            body .elementor-widget-heading h4.elementor-heading-title,
            .woocommerce .comment-reply-title,
            .woocommerce-Reviews-title,
            .woocommerce-account h3,
            .woocommerce-account .woocommerce-EditAccountForm fieldset legend,
            .outer-form-wrapper h2,
            .woocommerce-MyAccount-content h2,
            .woocommerce-order h2,
            .cart_totals h2,
            .woocommerce-checkout h3,
            .wp-block-search .wp-block-search__label,
            .widget_block .widget-wrapper h1,
            .widget_block .widget-wrapper h2,
            .widget_block .widget-wrapper h3 {' .
                aiero_print_font_styles( $h4_font, array('font_size', 'line_height') ) .
            '}
        }';
    } else {
        $aiero_custom_css .= '
            @media only screen and (min-width: 768px) {
                h4,
                .editor-styles-wrapper .block-editor-block-list__layout h4,
                body .elementor-widget-heading h4.elementor-heading-title,
                .woocommerce .comment-reply-title,
                .woocommerce-Reviews-title,
                .woocommerce-account h3,
                .woocommerce-account .woocommerce-EditAccountForm fieldset legend,
                .outer-form-wrapper h2,
                .woocommerce-MyAccount-content h2,
                .woocommerce-order h2,
                .cart_totals h2,
                .woocommerce-checkout h3,
                .wp-block-search .wp-block-search__label,
                .widget_block .widget-wrapper h1,
                .widget_block .widget-wrapper h2,
                .widget_block .widget-wrapper h3 {' .
                    aiero_print_font_styles( $h4_font, array('font_size', 'line_height') ) .
                '}
            }
        ';
    }
}
$h5_font        = aiero_get_prepared_option('h5_font');
$h5_font_array  = json_decode($h5_font, true);
if (
    !empty($h5_font_array['font_weight']) ||
    !empty($h5_font_array['letter_spacing']) ||
    !empty($h5_font_array['word_spacing'])
) {
    $aiero_custom_css .= '
        h5,
        .editor-styles-wrapper .block-editor-block-list__layout h5,
        body div.wpforms-container-full .wpforms-form .wpforms-title,
        body .elementor-widget-heading h5.elementor-heading-title {' .
            aiero_print_font_styles( $h5_font, array('font_weight','letter_spacing','word_spacing') ) .
        '}
    ';
}
if (
    !empty($h5_font_array['font_size']) ||
    !empty($h5_font_array['line_height'])
) {
    if ( $h5_font_array['font_size_unit'] == 'px' && (int)$h5_font_array['font_size'] > 20 ) {
        $aiero_custom_css .= '
        @media only screen and (min-width: 768px) {
           h5,
            .editor-styles-wrapper .block-editor-block-list__layout h5,
            body div.wpforms-container-full .wpforms-form .wpforms-title,
            body .elementor-widget-heading h5.elementor-heading-title {
                font-size: 20px;' .
                aiero_print_font_styles( $h5_font, array('line_height') ) .
            '}
        }
        @media only screen and (min-width: 992px) {
            h5,
            .editor-styles-wrapper .block-editor-block-list__layout h5,
            body div.wpforms-container-full .wpforms-form .wpforms-title,
            body .elementor-widget-heading h5.elementor-heading-title {' .
                aiero_print_font_styles( $h5_font, array('font_size', 'line_height') ) .
            '}
        }';
    } else {
        $aiero_custom_css .= '
        @media only screen and (min-width: 768px) {
            h5,
            .editor-styles-wrapper .block-editor-block-list__layout h5,
            body div.wpforms-container-full .wpforms-form .wpforms-title,
            body .elementor-widget-heading h5.elementor-heading-title {' .
                aiero_print_font_styles( $h5_font, array('font_size', 'line_height') ) .
            '}
        }';
    }
}
$h6_font        = aiero_get_prepared_option('h6_font');
$h6_font_array  = json_decode($h6_font, true);
if (
    !empty($h6_font_array['font_weight']) ||
    !empty($h6_font_array['letter_spacing']) ||
    !empty($h6_font_array['word_spacing'])
) {
    $aiero_custom_css .= '
        h6,
        body .elementor-widget-heading h6.elementor-heading-title {' .
            aiero_print_font_styles( $h6_font, array('font_weight','letter_spacing','word_spacing') ) .
        '}
    ';
}
if (
    !empty($h6_font_array['font_size']) ||
    !empty($h6_font_array['line_height'])
) {
    if ( $h6_font_array['font_size_unit'] == 'px' && (int)$h6_font_array['font_size'] > 18 ) {
        $aiero_custom_css .= '
        @media only screen and (min-width: 768px) {
            h6,        
            .editor-styles-wrapper .block-editor-block-list__layout h6,
            body .elementor-widget-heading h6.elementor-heading-title,
            .footer-widgets .wp-block-search .wp-block-search__label {
                font-size: 18px;' .
                aiero_print_font_styles( $h6_font, array('line_height') ) .
            '}
        }
        @media only screen and (min-width: 992px) {
            h6,        
            .editor-styles-wrapper .block-editor-block-list__layout h6,
            body .elementor-widget-heading h6.elementor-heading-title,
            .footer-widgets .wp-block-search .wp-block-search__label {' .
                aiero_print_font_styles( $h6_font, array('font_size', 'line_height') ) .
            '}
        }';
    } else {
        $aiero_custom_css .= '
            @media only screen and (min-width: 768px) {
                h6,        
                .editor-styles-wrapper .block-editor-block-list__layout h6,
                body .elementor-widget-heading h6.elementor-heading-title,
                .footer-widgets .wp-block-search .wp-block-search__label {' .
                    aiero_print_font_styles( $h6_font, array('font_size', 'line_height') ) .
                '}
            }
        ';
    }
}

# Buttons
$buttons_font       = aiero_get_prepared_option('buttons_font');
$buttons_font_array = json_decode($buttons_font, true);
if (
    !empty($buttons_font_array['font_family']) ||
    !empty($buttons_font_array['font_size']) ||
    !empty($buttons_font_array['text_transform']) ||
    !empty($buttons_font_array['letter_spacing']) ||
    !empty($buttons_font_array['word_spacing']) ||
    !empty($buttons_font_array['font_style']) ||
    !empty($buttons_font_array['font_weight'])
) {
    $aiero_custom_css .= '
        .aiero-button,
        .wp-block-button,
        button,
        input[type="submit"],
        input[type="button"],
        input[type="reset"],
        div.wpforms-container.wpforms-container-full .wpforms-form input[type="submit"],
        div.wpforms-container.wpforms-container-full .wpforms-form button[type="submit"],
        div.wpforms-container.wpforms-container-full .wpforms-form .wpforms-page-button {' .
            aiero_print_font_styles( $buttons_font, array('font_family', 'font_size', 'text_transform', 'letter_spacing', 'word_spacing', 'font_style', 'font_weight') ) .
        '}
        .wp-block-button .wp-block-button__link {' .
            aiero_print_font_styles( $buttons_font, array('font_size') ) .
        '}
    ';
}