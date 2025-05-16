<?php

// ----------------------------- //
// ------ Standard Colors ------ //
// ----------------------------- //

$standard_default_text_color = aiero_get_prefered_option('standard_default_text_color');
if ( !empty($standard_default_text_color) ) {
    $aiero_custom_css .= '
        body {
            --wpforms-label-color: ' . esc_attr($standard_default_text_color) . ';
        }
        .content-wrapper,        
        .content-wrapper .wrapper-socials a,        
        .single-post .post-meta-footer .post-meta-item.post-meta-item-tags a,        
        .project-item-wrapper .project-item-categories,
        .project-item-wrapper .project-item-categories a,
        .error-404-info-text,        
        .body-container .post-meta-item-tags a,
        .widget_categories ul li:hover li,
        .woocommerce-product-gallery .flex-control-nav .slick-button,
        .single-product.woocommerce div.product .product_meta .product_meta_item.tagged_as a,        
        .post-categories a.post-category-item,        
        .single-post .post-meta-footer .post-meta-item-author,
        .single-post .post-meta-footer .post-meta-item-author a,        
        .widget_tag_cloud .tagcloud .tag-cloud-link,
        .wp-block-tag-cloud .tag-cloud-link,
        .slide-sidebar-wrapper .widget_tag_cloud .tagcloud .tag-cloud-link:hover,
        .slide-sidebar-wrapper .wp-block-tag-cloud .tag-cloud-link:hover,
        .footer .widget_tag_cloud .tagcloud .tag-cloud-link:hover,
        .footer .wp-block-tag-cloud .tag-cloud-link:hover,        
        .aiero-format-quote .post-quote,
        .aiero-format-quote .post-quote:hover,
        .team-contact-info-card .team-contact-info-item.team-contact-info-item-email a,
        .aiero-price-item-widget .price-item.active .price-item-label,
        .post-navigation .post-navigation-link a,
        .content-wrapper .wp-block-file a.wp-block-file__button,
        .content-wrapper input[type="checkbox"]:checked:before,
        .content-wrapper div.wpforms-container.wpforms-container-full .wpforms-form input[type="checkbox"]:checked:before,
        .woocommerce form .form-row input[type="checkbox"].input-checkbox:checked:before,
        .content-pagination .page-numbers.dots,
        .content-pagination .post-page-numbers.dots,
        .content-pagination .page-numbers.dots:hover,
        .content-pagination .post-page-numbers.dots:hover,
        .content-wrapper input[type="text"],
        .content-wrapper input[type="email"],
        .content-wrapper input[type="url"],
        .content-wrapper input[type="password"],
        .content-wrapper input[type="search"],
        .content-wrapper input[type="number"],
        .content-wrapper input[type="tel"],
        .content-wrapper input[type="range"],
        .content-wrapper input[type="date"],
        .content-wrapper input[type="month"],
        .content-wrapper input[type="week"],
        .content-wrapper input[type="time"],
        .content-wrapper input[type="datetime"],
        .content-wrapper input[type="datetime-local"],
        .content-wrapper input[type="color"],
        .content-wrapper select,
        .content-wrapper textarea,
        .select2-container--default .select2-search--dropdown .select2-search__field,
        body .select2-container--default .select2-search--dropdown .select2-search__field,        
        .content-wrapper .select2-container--default .select2-selection--single .select2-selection__rendered,
        .content-wrapper div.wpforms-container.wpforms-container-full .wpforms-form input[type="text"],
        .content-wrapper div.wpforms-container.wpforms-container-full .wpforms-form input[type="email"],
        .content-wrapper div.wpforms-container.wpforms-container-full .wpforms-form input[type="url"],
        .content-wrapper div.wpforms-container.wpforms-container-full .wpforms-form input[type="password"],
        .content-wrapper div.wpforms-container.wpforms-container-full .wpforms-form input[type="search"],
        .content-wrapper div.wpforms-container.wpforms-container-full .wpforms-form input[type="number"],
        .content-wrapper div.wpforms-container.wpforms-container-full .wpforms-form input[type="tel"],
        .content-wrapper div.wpforms-container.wpforms-container-full .wpforms-form input[type="date"],
        .content-wrapper div.wpforms-container.wpforms-container-full .wpforms-form input[type="month"],
        .content-wrapper div.wpforms-container.wpforms-container-full .wpforms-form input[type="week"],
        .content-wrapper div.wpforms-container.wpforms-container-full .wpforms-form input[type="time"],
        .content-wrapper div.wpforms-container.wpforms-container-full .wpforms-form input[type="datetime"],
        .content-wrapper div.wpforms-container.wpforms-container-full .wpforms-form input[type="datetime-local"],
        .content-wrapper div.wpforms-container.wpforms-container-full .wpforms-form input[type="color"],
        .content-wrapper div.wpforms-container.wpforms-container-full .wpforms-form select,
        .content-wrapper div.wpforms-container.wpforms-container-full .wpforms-form textarea,
        .content-wrapper .select2-container--default .select2-results__option.select2-results__option--highlighted[aria-selected], 
        .content-wrapper .select2-container--default .select2-results__option.select2-results__option--highlighted[data-selected],
        #form-preview .mc4wp-form .mc4wp-form-fields input[type="email"],
        .case-study-side-info .post-meta-item-tags a,        
        .filter-control-wrapper .filter-control-list .dot, 
        .filter-control-wrapper .gallery-filter-control-list .dot {
            color: ' . esc_attr($standard_default_text_color) . ';
        }
        .aiero-audio-listing .audio-item-wrapper .audio-item:hover,
        .aiero-audio-listing .audio-item-wrapper .audio-item.active,
        .elementor-widget-aiero_button .aiero_adv_button_wrapper .aiero_adv_button_circle,
        .elementor-widget-aiero_button .aiero_adv_button_wrapper .aiero_adv_button {
            border-color: ' . esc_attr($standard_default_text_color) . ';
        }
        .content-wrapper input[type="radio"]:checked:before,
        .content-wrapper div.wpforms-container.wpforms-container-full .wpforms-form input[type="radio"]:checked:before,
        .aiero-audio-listing .audio-item-wrapper .audio-item:hover,
        .aiero-audio-listing .audio-item-wrapper .audio-item.active {
            background-color: ' . esc_attr($standard_default_text_color) . ';
        }
        .content-wrapper div.wpforms-container.wpforms-container-full .wpforms-form .wpforms-field-number-slider input[type="range"]::-webkit-slider-thumb {
            border-color: ' . esc_attr($standard_default_text_color) . ';
        }
        .content-wrapper div.wpforms-container.wpforms-container-full .wpforms-form .wpforms-field-number-slider input[type="range"]::-moz-range-thumb {
            border-color: ' . esc_attr($standard_default_text_color) . ';
        }
        .content-wrapper div.wpforms-container.wpforms-container-full .wpforms-form .wpforms-field-number-slider input[type="range"]::-ms-thumb {
            border-color: ' . esc_attr($standard_default_text_color) . ';
        }
        .content-wrapper div.wpforms-container.wpforms-container-full .wpforms-form .wpforms-field-number-slider input[type="range"]:focus::-ms-thumb {
            border-color: ' . esc_attr($standard_default_text_color) . ';
        }
        .content-wrapper input[type="text"]:focus::-webkit-input-placeholder,
        .content-wrapper input[type="email"]:focus::-webkit-input-placeholder,
        .content-wrapper input[type="url"]:focus::-webkit-input-placeholder,
        .content-wrapper input[type="password"]:focus::-webkit-input-placeholder,
        .content-wrapper input[type="search"]:focus::-webkit-input-placeholder,
        .content-wrapper input[type="tel"]:focus::-webkit-input-placeholder,
        .content-wrapper input[type="number"]:focus::-webkit-input-placeholder, 
        .content-wrapper input[type="date"]:focus::-webkit-input-placeholder, 
        .content-wrapper input[type="month"]:focus::-webkit-input-placeholder, 
        .content-wrapper input[type="week"]:focus::-webkit-input-placeholder, 
        .content-wrapper input[type="time"]:focus::-webkit-input-placeholder, 
        .content-wrapper input[type="datetime"]:focus::-webkit-input-placeholder, 
        .content-wrapper input[type="datetime-local"]:focus::-webkit-input-placeholder, 
        .content-wrapper textarea:focus::-webkit-input-placeholder,
        .content-wrapper div.wpforms-container.wpforms-container-full .wpforms-form input[type="text"]:focus::-webkit-input-placeholder, 
        .content-wrapper div.wpforms-container.wpforms-container-full .wpforms-form input[type="email"]:focus::-webkit-input-placeholder, 
        .content-wrapper div.wpforms-container.wpforms-container-full .wpforms-form input[type="url"]:focus::-webkit-input-placeholder, 
        .content-wrapper div.wpforms-container.wpforms-container-full .wpforms-form input[type="password"]:focus::-webkit-input-placeholder, 
        .content-wrapper div.wpforms-container.wpforms-container-full .wpforms-form input[type="search"]:focus::-webkit-input-placeholder, 
        .content-wrapper div.wpforms-container.wpforms-container-full .wpforms-form input[type="number"]:focus::-webkit-input-placeholder, 
        .content-wrapper div.wpforms-container.wpforms-container-full .wpforms-form input[type="tel"]:focus::-webkit-input-placeholder,
        .content-wrapper div.wpforms-container.wpforms-container-full .wpforms-form input[type="date"]:focus::-webkit-input-placeholder,
        .content-wrapper div.wpforms-container.wpforms-container-full .wpforms-form input[type="month"]:focus::-webkit-input-placeholder, 
        .content-wrapper div.wpforms-container.wpforms-container-full .wpforms-form input[type="week"]:focus::-webkit-input-placeholder, 
        .content-wrapper div.wpforms-container.wpforms-container-full .wpforms-form input[type="time"]:focus::-webkit-input-placeholder, 
        .content-wrapper div.wpforms-container.wpforms-container-full .wpforms-form input[type="datetime"]:focus::-webkit-input-placeholder, 
        .content-wrapper div.wpforms-container.wpforms-container-full .wpforms-form input[type="datetime-local"]:focus::-webkit-input-placeholder, 
        .content-wrapper div.wpforms-container.wpforms-container-full .wpforms-form textarea:focus::-webkit-input-placeholder,
        #form-preview .mc4wp-form .mc4wp-form-fields input[type="email"]:focus::-webkit-input-placeholder {
             color: ' . esc_attr($standard_default_text_color) . ';
        }
        
        .content-wrapper input[type="text"]:-moz-placeholder,
        .content-wrapper input[type="url"]:-moz-placeholder,
        .content-wrapper input[type="email"]:-moz-placeholder,
        .content-wrapper input[type="password"]:-moz-placeholder,
        .content-wrapper input[type="search"]:-moz-placeholder,
        .content-wrapper input[type="tel"]:-moz-placeholder,
        .content-wrapper input[type="number"]:-moz-placeholder, 
        .content-wrapper input[type="date"]:-moz-placeholder, 
        .content-wrapper input[type="month"]:-moz-placeholder, 
        .content-wrapper input[type="week"]:-moz-placeholder, 
        .content-wrapper input[type="time"]:-moz-placeholder, 
        .content-wrapper input[type="datetime"]:-moz-placeholder, 
        .content-wrapper input[type="datetime-local"]:-moz-placeholder, 
        .content-wrapper textarea:-moz-placeholder,
        .content-wrapper div.wpforms-container.wpforms-container-full .wpforms-form input[type="text"]:-moz-placeholder, 
        .content-wrapper div.wpforms-container.wpforms-container-full .wpforms-form input[type="email"]:-moz-placeholder, 
        .content-wrapper div.wpforms-container.wpforms-container-full .wpforms-form input[type="url"]:-moz-placeholder, 
        .content-wrapper div.wpforms-container.wpforms-container-full .wpforms-form input[type="password"]:-moz-placeholder, 
        .content-wrapper div.wpforms-container.wpforms-container-full .wpforms-form input[type="search"]:-moz-placeholder, 
        .content-wrapper div.wpforms-container.wpforms-container-full .wpforms-form input[type="number"]:-moz-placeholder, 
        .content-wrapper div.wpforms-container.wpforms-container-full .wpforms-form input[type="tel"]:-moz-placeholder,
        .content-wrapper div.wpforms-container.wpforms-container-full .wpforms-form input[type="date"]:-moz-placeholder,
        .content-wrapper div.wpforms-container.wpforms-container-full .wpforms-form input[type="month"]:-moz-placeholder, 
        .content-wrapper div.wpforms-container.wpforms-container-full .wpforms-form input[type="week"]:-moz-placeholder, 
        .content-wrapper div.wpforms-container.wpforms-container-full .wpforms-form input[type="time"]:-moz-placeholder, 
        .content-wrapper div.wpforms-container.wpforms-container-full .wpforms-form input[type="datetime"]:-moz-placeholder, 
        .content-wrapper div.wpforms-container.wpforms-container-full .wpforms-form input[type="datetime-local"]:-moz-placeholder, 
        .content-wrapper div.wpforms-container.wpforms-container-full .wpforms-form textarea:-moz-placeholder,
        #form-preview .mc4wp-form .mc4wp-form-fields input[type="email"]:-moz-placeholder {
             color: ' . esc_attr($standard_default_text_color) . ';
        }
        
        .content-wrapper input[type="text"]:focus::-moz-placeholder,
        .content-wrapper input[type="url"]:focus::-moz-placeholder,
        .content-wrapper input[type="email"]:focus::-moz-placeholder,
        .content-wrapper input[type="password"]:focus::-moz-placeholder,
        .content-wrapper input[type="search"]:focus::-moz-placeholder,
        .content-wrapper input[type="tel"]:focus::-moz-placeholder,
        .content-wrapper input[type="number"]:focus::-moz-placeholder, 
        .content-wrapper input[type="date"]:focus::-moz-placeholder, 
        .content-wrapper input[type="month"]:focus::-moz-placeholder, 
        .content-wrapper input[type="week"]:focus::-moz-placeholder, 
        .content-wrapper input[type="time"]:focus::-moz-placeholder, 
        .content-wrapper input[type="datetime"]:focus::-moz-placeholder, 
        .content-wrapper input[type="datetime-local"]:focus::-moz-placeholder, 
        .content-wrapper textarea:focus::-moz-placeholder,
        .content-wrapper div.wpforms-container.wpforms-container-full .wpforms-form input[type="text"]:focus::-moz-placeholder, 
        .content-wrapper div.wpforms-container.wpforms-container-full .wpforms-form input[type="email"]:focus::-moz-placeholder, 
        .content-wrapper div.wpforms-container.wpforms-container-full .wpforms-form input[type="url"]:focus::-moz-placeholder, 
        .content-wrapper div.wpforms-container.wpforms-container-full .wpforms-form input[type="password"]:focus::-moz-placeholder, 
        .content-wrapper div.wpforms-container.wpforms-container-full .wpforms-form input[type="search"]:focus::-moz-placeholder, 
        .content-wrapper div.wpforms-container.wpforms-container-full .wpforms-form input[type="number"]:focus::-moz-placeholder, 
        .content-wrapper div.wpforms-container.wpforms-container-full .wpforms-form input[type="tel"]:focus::-moz-placeholder,
        .content-wrapper div.wpforms-container.wpforms-container-full .wpforms-form input[type="date"]:focus::-moz-placeholder,
        .content-wrapper div.wpforms-container.wpforms-container-full .wpforms-form input[type="month"]:focus::-moz-placeholder, 
        .content-wrapper div.wpforms-container.wpforms-container-full .wpforms-form input[type="week"]:focus::-moz-placeholder, 
        .content-wrapper div.wpforms-container.wpforms-container-full .wpforms-form input[type="time"]:focus::-moz-placeholder, 
        .content-wrapper div.wpforms-container.wpforms-container-full .wpforms-form input[type="datetime"]:focus::-moz-placeholder, 
        .content-wrapper div.wpforms-container.wpforms-container-full .wpforms-form input[type="datetime-local"]:focus::-moz-placeholder, 
        .content-wrapper div.wpforms-container.wpforms-container-full .wpforms-form textarea:focus::-moz-placeholder,
        #form-preview .mc4wp-form .mc4wp-form-fields input[type="email"]:focus::-moz-placeholder {
             color: ' . esc_attr($standard_default_text_color) . ';
        }
        
        .content-wrapper input[type="text"]:focus:-ms-input-placeholder,
        .content-wrapper input[type="email"]:focus:-ms-input-placeholder,
        .content-wrapper input[type="url"]:focus:-ms-input-placeholder,
        .content-wrapper input[type="password"]:focus:-ms-input-placeholder,
        .content-wrapper input[type="search"]:focus:-ms-input-placeholder,
        .content-wrapper input[type="tel"]:focus:-ms-input-placeholder,
        .content-wrapper input[type="number"]:focus:-ms-input-placeholder, 
        .content-wrapper input[type="date"]:focus:-ms-input-placeholder, 
        .content-wrapper input[type="month"]:focus:-ms-input-placeholder, 
        .content-wrapper input[type="week"]:focus:-ms-input-placeholder, 
        .content-wrapper input[type="time"]:focus:-ms-input-placeholder, 
        .content-wrapper input[type="datetime"]:focus:-ms-input-placeholder, 
        .content-wrapper input[type="datetime-local"]:focus:-ms-input-placeholder, 
        .content-wrapper textarea:focus:-ms-input-placeholder,
        .content-wrapper div.wpforms-container.wpforms-container-full .wpforms-form input[type="text"]:focus:-ms-input-placeholder, 
        .content-wrapper div.wpforms-container.wpforms-container-full .wpforms-form input[type="email"]:focus:-ms-input-placeholder, 
        .content-wrapper div.wpforms-container.wpforms-container-full .wpforms-form input[type="url"]:focus:-ms-input-placeholder, 
        .content-wrapper div.wpforms-container.wpforms-container-full .wpforms-form input[type="password"]:focus:-ms-input-placeholder, 
        .content-wrapper div.wpforms-container.wpforms-container-full .wpforms-form input[type="search"]:focus:-ms-input-placeholder, 
        .content-wrapper div.wpforms-container.wpforms-container-full .wpforms-form input[type="number"]:focus:-ms-input-placeholder, 
        .content-wrapper div.wpforms-container.wpforms-container-full .wpforms-form input[type="tel"]:focus:-ms-input-placeholder,
        .content-wrapper div.wpforms-container.wpforms-container-full .wpforms-form input[type="date"]:focus:-ms-input-placeholder,
        .content-wrapper div.wpforms-container.wpforms-container-full .wpforms-form input[type="month"]:focus:-ms-input-placeholder, 
        .content-wrapper div.wpforms-container.wpforms-container-full .wpforms-form input[type="week"]:focus:-ms-input-placeholder, 
        .content-wrapper div.wpforms-container.wpforms-container-full .wpforms-form input[type="time"]:focus:-ms-input-placeholder, 
        .content-wrapper div.wpforms-container.wpforms-container-full .wpforms-form input[type="datetime"]:focus:-ms-input-placeholder, 
        .content-wrapper div.wpforms-container.wpforms-container-full .wpforms-form input[type="datetime-local"]:focus:-ms-input-placeholder, 
        .content-wrapper div.wpforms-container.wpforms-container-full .wpforms-form textarea:focus:-ms-input-placeholder,
        #form-preview .mc4wp-form .mc4wp-form-fields input[type="email"]:focus:-ms-input-placeholder {
            color: ' . esc_attr($standard_default_text_color) . ';
        }
    ';
}

$standard_dark_text_color = aiero_get_prefered_option('standard_dark_text_color');
if ( !empty($standard_dark_text_color) ) {
    $aiero_custom_css .= '        
        body {
            --wpforms-field-text-color: ' . esc_attr($standard_dark_text_color) . ';
        }
        .content-wrapper h1,
        .content-wrapper h2,
        .content-wrapper h3,
        .content-wrapper h4,
        .content-wrapper h5,
        .wpforms-form .wpforms-title,
        .content-wrapper h6,
        .content-wrapper a:hover,
        body .content-wrapper blockquote,
        body .aiero_comments__item-text blockquote,
        .content-wrapper .post-title,
        .content-wrapper .post-title a,
        .post-comment-author,
        .select2-container--default .select2-results__option.select2-results__option--highlighted[aria-selected],
        .select2-container--default .select2-results__option.select2-results__option--highlighted[data-selected],
        .content-wrapper .select2-container--default .select2-results__option.select2-results__option--highlighted[aria-selected],
        .content-wrapper .select2-container--default .select2-results__option.select2-results__option--highlighted[data-selected],        
        .widget_search .search-form .search-form-icon,
        .widget_categories ul li > a, 
        body .content-wrapper ul.wp-block-categories li > a,
        .widget_categories ul li .widget-archive-trigger, 
        .widget_categories ul li .block-archive-trigger, 
        body .content-wrapper ul.wp-block-categories li .widget-archive-trigger, 
        body .content-wrapper ul.wp-block-categories li .block-archive-trigger,
        .widget_archive ul li > a,
        .wp-block-archives li > a,
        body .content-wrapper .wp-block-archives li > a,
        .widget_recent_entries ul li a,
        .content-wrapper .wp-block-latest-posts li a,
        .widget_recent_comments ul .recentcomments a,
        .content-wrapper .wp-block-latest-comments li a,
        .widget_pages .widget-wrapper > ul li > a,
        .widget_meta ul li > a,
        .wp-block-page-list li a,
        .sidebar .widget .widget-title a,
        .widget_rss cite,
        .widget_rss ul a.rsswidget,
        .wp-block-rss .wp-block-rss__item-title a,
        .wp-block-rss .wp-block-rss__item-author,
        .widget_nav_menu ul li .widget-menu-trigger, 
        .widget_aiero_nav_menu_widget ul li .widget-menu-trigger,
        .widget_nav_menu ul li a, 
        .widget_aiero_nav_menu_widget ul li a,
        .result-box .result-box-title,
        .results-wrapper ul li,
        .portfolio-post-meta .portfolio-post-meta-label,
        .post-navigation .post-navigation-title a,
        .post-navigation .archive-icon-link .archive-icon,
        .team-experience-item-title,
        .team-item .post-title,
        .project-item-wrapper .post-title,
        .project-post-meta .project-post-meta-label,
        .vacancy-salary .vacancy-salary-value,        
        .help-item .help-item-title,
        .service-item .service-post-title a,
        .aiero-price-item-widget .price-item .price-item-container,
        .aiero-price-item-widget .price-item .price-item-title,
        .elementor-counter .elementor-counter-title,
        .aiero-testimonial-carousel-widget .testimonial-carousel-wrapper .author-info,
        .error-404-title,        
        .post-quote .post-quote-author,
        .team-experience-item-period,
        .single-product.woocommerce div.product .product_meta .product_meta_item a,
        .elementor-widget-image-box .elementor-image-box-wrapper .elementor-image-box-content .elementor-image-box-title,
        .elementor-widget-aiero_vertical_text .vertical-text,
        .aiero-image-slider-widget .slider-item-title,
        .elementor-widget-progress .elementor-widget-container .elementor-title,
        .elementor-widget-progress .elementor-progress-bar,
        .swiper-container .elementor-swiper-button i,
        .wp-block-search .wp-block-search__label,
        .wp-block-search.wp-block-search__button-inside .wp-block-search__inside-wrapper .wp-block-search__button.has-icon,
        .elementor-widget-aiero_custom_menu ul li a,
        .content-wrapper .wp-block-loginout,
        .content-wrapper .wp-block-loginout a,
        .sidebar .shop-hidden-sidebar-close,
        .widget .wp-block-list li:before,
        .widget .wp-block-list li:hover a,
        .standard-blog-item-wrapper .blog-item .post-categories .post-category-item:hover,
        .grid-blog-item-wrapper .blog-item .post-categories .post-category-item:hover,
        .team-info-additional .team-achievements-box .team-achievements-box-title,
        .aiero-heading .aiero-subheading,
        .owl-nav button:not(.customize-partial-edit-shortcut-button)[class*="owl-"],
        .owl-nav button:not(.customize-partial-edit-shortcut-button)[class*="owl-"].disabled:hover,
        .project-listing-wrapper.text-position-inside .project-item-wrapper .post-title,
        .content-wrapper .wp-block-social-links.is-style-logos-only:not(.has-icon-color) .wp-block-social-link svg,
        .block-editor-block-list__layout .wp-block-social-links.is-style-logos-only:not(.has-icon-color) .wp-block-social-link svg,
        .archive-listing-wrapper.list-listing .list-item-wrapper .post-meta-item-author a:hover,
        .elementor-widget-image .hovered-text .hovered-text-subtitle,
        .elementor-widget-image .hovered-text .hovered-text-title,
        .aiero_tabs_widget .aiero_tabs_titles_container .aiero_tab_title_item a,
        .error-404-wrapper .error-404-button .aiero-button:hover,
        .elementor-widget-aiero_nav_menu ul li > a,
        .owl-dots .owl-dot span,
        .archive-listing-wrapper.list-listing .list-item-wrapper .post-meta-item-author,
        .archive-listing-wrapper.list-listing .list-item-wrapper .post-meta-item-author a,
        .archive-listing-wrapper.list-listing .list-item-wrapper .post-meta-item-month-year,
        .archive-listing-wrapper.list-listing .list-item-wrapper .post-list-icon {
            color: ' . esc_attr($standard_dark_text_color) . ';
        }
        .single-team .team-personal-info-item,
        .single-team .team-skills ul li,
        .single-team .team-values ul li {
            color: rgba(' . esc_attr(aiero_hex2rgb($standard_dark_text_color)) . ', 0.85);
        }
        .swiper-container .swiper-pagination-bullets .swiper-pagination-bullet.swiper-pagination-bullet-active,
        .swiper-container .swiper-pagination-bullets .swiper-pagination-bullet:after,
        .swiper-container-horizontal > .swiper-pagination-bullets .swiper-pagination-bullet.swiper-pagination-bullet-active, 
        .swiper-container-horizontal > .swiper-pagination-bullets .swiper-pagination-bullet:after {
            border-color: ' . esc_attr($standard_dark_text_color) . ';
        }
    ';
}

$standard_light_text_color = aiero_get_prefered_option('standard_light_text_color');
if ( !empty($standard_light_text_color) ) {
    $aiero_custom_css .= '
        .input-floating-wrap .floating-placeholder,
        .post-meta-header .post-meta-item,
        .post-meta-header .post-meta-item a,
        .post-meta-item-tags,
        .post-comment-date,
        div.wpforms-container.wpforms-container-full .wpforms-form .wpforms-field-number-slider .wpforms-field-number-slider-hint,
        .content-wrapper .wp-block-latest-posts li .wp-block-latest-posts__post-date,
        .widget_recent_entries ul li .post-date,
        .widget_recent_comments ul .recentcomments,
        .content-wrapper .wp-block-latest-comments li .wp-block-latest-comments__comment-meta,
        .widget_rss .rss-date,
        .wp-block-rss .wp-block-rss__item-publish-date,
        body .content-wrapper .gallery .gallery-item .gallery-caption,
        .post-navigation .post-navigation-categories,
        .post-navigation .post-navigation-categories a,
        .widget_nav_menu ul li a:hover, 
        .widget_nav_menu ul li.current-menu-item > a, 
        .widget_nav_menu ul li.current-menu-ancestor > a, 
        .widget_nav_menu ul li.current-menu-parent > a, 
        .widget_nav_menu ul li.current_page_item > a, 
        .widget_aiero_nav_menu_widget ul li a:hover, 
        .widget_aiero_nav_menu_widget ul li.current-menu-item > a,
        .widget_aiero_nav_menu_widget ul li.current-menu-ancestor > a,
        .widget_aiero_nav_menu_widget ul li.current-menu-parent > a, 
        .widget_aiero_nav_menu_widget ul li.current_page_item > a,
        .content-wrapper .wp-block-pullquote blockquote:not(.has-text-color) cite,
        body .content-wrapper blockquote:not(.has-text-color) cite,
        .widget .wp-block-list li a,
        .standard-blog-item-wrapper .blog-item .post-categories .post-category-item,
        .grid-blog-item-wrapper .blog-item .post-categories .post-category-item,        
        .team-item .team-item-position,
        .aiero-awards-widget .awards-list .award-year, 
        .aiero-awards-widget .awards-list .award-subtitle,
        .single-project .project-post-meta .project-post-meta-item,
        .project-modern-listing .project-item-wrapper .project-item-modern-year,
        .service-listing-wrapper.service-list-listing .service-item .service-post-title a,
        .vacancy-post-meta,        
        .case-study-side-info .case-study-info-text-item .case-study-info-text-item-label {
            color: ' . esc_attr($standard_light_text_color) . ';
        }
        .elementor-widget-aiero_special_text .special-text.special-text-effect-stroke {
            -webkit-text-stroke: 1px ' . esc_attr($standard_light_text_color) . ';
        }
        .content-wrapper input[type="text"]::-webkit-input-placeholder,
        .content-wrapper input[type="email"]::-webkit-input-placeholder,
        .content-wrapper input[type="url"]::-webkit-input-placeholder,
        .content-wrapper input[type="password"]::-webkit-input-placeholder,
        .content-wrapper input[type="search"]::-webkit-input-placeholder,
        .content-wrapper input[type="tel"]::-webkit-input-placeholder,
        .content-wrapper input[type="number"]::-webkit-input-placeholder, 
        .content-wrapper input[type="date"]::-webkit-input-placeholder, 
        .content-wrapper input[type="month"]::-webkit-input-placeholder, 
        .content-wrapper input[type="week"]::-webkit-input-placeholder, 
        .content-wrapper input[type="time"]::-webkit-input-placeholder, 
        .content-wrapper input[type="datetime"]::-webkit-input-placeholder, 
        .content-wrapper input[type="datetime-local"]::-webkit-input-placeholder, 
        .content-wrapper textarea::-webkit-input-placeholder,
        .content-wrapper div.wpforms-container.wpforms-container-full .wpforms-form input[type="text"]::-webkit-input-placeholder, 
        .content-wrapper div.wpforms-container.wpforms-container-full .wpforms-form input[type="email"]::-webkit-input-placeholder, 
        .content-wrapper div.wpforms-container.wpforms-container-full .wpforms-form input[type="url"]::-webkit-input-placeholder, 
        .content-wrapper div.wpforms-container.wpforms-container-full .wpforms-form input[type="password"]::-webkit-input-placeholder, 
        .content-wrapper div.wpforms-container.wpforms-container-full .wpforms-form input[type="search"]::-webkit-input-placeholder, 
        .content-wrapper div.wpforms-container.wpforms-container-full .wpforms-form input[type="number"]::-webkit-input-placeholder, 
        .content-wrapper div.wpforms-container.wpforms-container-full .wpforms-form input[type="tel"]::-webkit-input-placeholder,
        .content-wrapper div.wpforms-container.wpforms-container-full .wpforms-form input[type="date"]::-webkit-input-placeholder,
        .content-wrapper div.wpforms-container.wpforms-container-full .wpforms-form input[type="month"]::-webkit-input-placeholder, 
        .content-wrapper div.wpforms-container.wpforms-container-full .wpforms-form input[type="week"]::-webkit-input-placeholder, 
        .content-wrapper div.wpforms-container.wpforms-container-full .wpforms-form input[type="time"]::-webkit-input-placeholder, 
        .content-wrapper div.wpforms-container.wpforms-container-full .wpforms-form input[type="datetime"]::-webkit-input-placeholder, 
        .content-wrapper div.wpforms-container.wpforms-container-full .wpforms-form input[type="datetime-local"]::-webkit-input-placeholder, 
        .content-wrapper div.wpforms-container.wpforms-container-full .wpforms-form textarea::-webkit-input-placeholder,
        #form-preview .mc4wp-form .mc4wp-form-fields input[type="email"]::-webkit-input-placeholder {
             color: ' . esc_attr($standard_light_text_color) . ';
        }
        
        .content-wrapper input[type="text"]:-moz-placeholder,
        .content-wrapper input[type="url"]:-moz-placeholder,
        .content-wrapper input[type="email"]:-moz-placeholder,
        .content-wrapper input[type="password"]:-moz-placeholder,
        .content-wrapper input[type="search"]:-moz-placeholder,
        .content-wrapper input[type="tel"]:-moz-placeholder,
        .content-wrapper input[type="number"]:-moz-placeholder, 
        .content-wrapper input[type="date"]:-moz-placeholder, 
        .content-wrapper input[type="month"]:-moz-placeholder, 
        .content-wrapper input[type="week"]:-moz-placeholder, 
        .content-wrapper input[type="time"]:-moz-placeholder, 
        .content-wrapper input[type="datetime"]:-moz-placeholder, 
        .content-wrapper input[type="datetime-local"]:-moz-placeholder, 
        .content-wrapper textarea:-moz-placeholder,
        .content-wrapper div.wpforms-container.wpforms-container-full .wpforms-form input[type="text"]:-moz-placeholder, 
        .content-wrapper div.wpforms-container.wpforms-container-full .wpforms-form input[type="email"]:-moz-placeholder, 
        .content-wrapper div.wpforms-container.wpforms-container-full .wpforms-form input[type="url"]:-moz-placeholder, 
        .content-wrapper div.wpforms-container.wpforms-container-full .wpforms-form input[type="password"]:-moz-placeholder, 
        .content-wrapper div.wpforms-container.wpforms-container-full .wpforms-form input[type="search"]:-moz-placeholder, 
        .content-wrapper div.wpforms-container.wpforms-container-full .wpforms-form input[type="number"]:-moz-placeholder, 
        .content-wrapper div.wpforms-container.wpforms-container-full .wpforms-form input[type="tel"]:-moz-placeholder,
        .content-wrapper div.wpforms-container.wpforms-container-full .wpforms-form input[type="date"]:-moz-placeholder,
        .content-wrapper div.wpforms-container.wpforms-container-full .wpforms-form input[type="month"]:-moz-placeholder, 
        .content-wrapper div.wpforms-container.wpforms-container-full .wpforms-form input[type="week"]:-moz-placeholder, 
        .content-wrapper div.wpforms-container.wpforms-container-full .wpforms-form input[type="time"]:-moz-placeholder, 
        .content-wrapper div.wpforms-container.wpforms-container-full .wpforms-form input[type="datetime"]:-moz-placeholder, 
        .content-wrapper div.wpforms-container.wpforms-container-full .wpforms-form input[type="datetime-local"]:-moz-placeholder, 
        .content-wrapper div.wpforms-container.wpforms-container-full .wpforms-form textarea:-moz-placeholder,
        #form-preview .mc4wp-form .mc4wp-form-fields input[type="email"]:-moz-placeholder {
             color: ' . esc_attr($standard_light_text_color) . ';
        }
        
        .content-wrapper input[type="text"]::-moz-placeholder,
        .content-wrapper input[type="url"]::-moz-placeholder,
        .content-wrapper input[type="email"]::-moz-placeholder,
        .content-wrapper input[type="password"]::-moz-placeholder,
        .content-wrapper input[type="search"]::-moz-placeholder,
        .content-wrapper input[type="tel"]::-moz-placeholder,
        .content-wrapper input[type="number"]::-moz-placeholder, 
        .content-wrapper input[type="date"]::-moz-placeholder, 
        .content-wrapper input[type="month"]::-moz-placeholder, 
        .content-wrapper input[type="week"]::-moz-placeholder, 
        .content-wrapper input[type="time"]::-moz-placeholder, 
        .content-wrapper input[type="datetime"]::-moz-placeholder, 
        .content-wrapper input[type="datetime-local"]::-moz-placeholder, 
        .content-wrapper textarea::-moz-placeholder,
        .content-wrapper div.wpforms-container.wpforms-container-full .wpforms-form input[type="text"]::-moz-placeholder, 
        .content-wrapper div.wpforms-container.wpforms-container-full .wpforms-form input[type="email"]::-moz-placeholder, 
        .content-wrapper div.wpforms-container.wpforms-container-full .wpforms-form input[type="url"]::-moz-placeholder, 
        .content-wrapper div.wpforms-container.wpforms-container-full .wpforms-form input[type="password"]::-moz-placeholder, 
        .content-wrapper div.wpforms-container.wpforms-container-full .wpforms-form input[type="search"]::-moz-placeholder, 
        .content-wrapper div.wpforms-container.wpforms-container-full .wpforms-form input[type="number"]::-moz-placeholder, 
        .content-wrapper div.wpforms-container.wpforms-container-full .wpforms-form input[type="tel"]::-moz-placeholder,
        .content-wrapper div.wpforms-container.wpforms-container-full .wpforms-form input[type="date"]::-moz-placeholder,
        .content-wrapper div.wpforms-container.wpforms-container-full .wpforms-form input[type="month"]::-moz-placeholder, 
        .content-wrapper div.wpforms-container.wpforms-container-full .wpforms-form input[type="week"]::-moz-placeholder, 
        .content-wrapper div.wpforms-container.wpforms-container-full .wpforms-form input[type="time"]::-moz-placeholder, 
        .content-wrapper div.wpforms-container.wpforms-container-full .wpforms-form input[type="datetime"]::-moz-placeholder, 
        .content-wrapper div.wpforms-container.wpforms-container-full .wpforms-form input[type="datetime-local"]::-moz-placeholder, 
        .content-wrapper div.wpforms-container.wpforms-container-full .wpforms-form textarea::-moz-placeholder,
        #form-preview .mc4wp-form .mc4wp-form-fields input[type="email"]::-moz-placeholder {
             color: ' . esc_attr($standard_light_text_color) . ';
        }
        
        .content-wrapper input[type="text"]:-ms-input-placeholder,
        .content-wrapper input[type="email"]:-ms-input-placeholder,
        .content-wrapper input[type="url"]:-ms-input-placeholder,
        .content-wrapper input[type="password"]:-ms-input-placeholder,
        .content-wrapper input[type="search"]:-ms-input-placeholder,
        .content-wrapper input[type="tel"]:-ms-input-placeholder,
        .content-wrapper input[type="number"]:-ms-input-placeholder, 
        .content-wrapper input[type="date"]:-ms-input-placeholder, 
        .content-wrapper input[type="month"]:-ms-input-placeholder, 
        .content-wrapper input[type="week"]:-ms-input-placeholder, 
        .content-wrapper input[type="time"]:-ms-input-placeholder, 
        .content-wrapper input[type="datetime"]:-ms-input-placeholder, 
        .content-wrapper input[type="datetime-local"]:-ms-input-placeholder, 
        .content-wrapper textarea:-ms-input-placeholder,
        .content-wrapper div.wpforms-container.wpforms-container-full .wpforms-form input[type="text"]:-ms-input-placeholder, 
        .content-wrapper div.wpforms-container.wpforms-container-full .wpforms-form input[type="email"]:-ms-input-placeholder, 
        .content-wrapper div.wpforms-container.wpforms-container-full .wpforms-form input[type="url"]:-ms-input-placeholder, 
        .content-wrapper div.wpforms-container.wpforms-container-full .wpforms-form input[type="password"]:-ms-input-placeholder, 
        .content-wrapper div.wpforms-container.wpforms-container-full .wpforms-form input[type="search"]:-ms-input-placeholder, 
        .content-wrapper div.wpforms-container.wpforms-container-full .wpforms-form input[type="number"]:-ms-input-placeholder, 
        .content-wrapper div.wpforms-container.wpforms-container-full .wpforms-form input[type="tel"]:-ms-input-placeholder,
        .content-wrapper div.wpforms-container.wpforms-container-full .wpforms-form input[type="date"]:-ms-input-placeholder,
        .content-wrapper div.wpforms-container.wpforms-container-full .wpforms-form input[type="month"]:-ms-input-placeholder, 
        .content-wrapper div.wpforms-container.wpforms-container-full .wpforms-form input[type="week"]:-ms-input-placeholder, 
        .content-wrapper div.wpforms-container.wpforms-container-full .wpforms-form input[type="time"]:-ms-input-placeholder, 
        .content-wrapper div.wpforms-container.wpforms-container-full .wpforms-form input[type="datetime"]:-ms-input-placeholder, 
        .content-wrapper div.wpforms-container.wpforms-container-full .wpforms-form input[type="datetime-local"]:-ms-input-placeholder, 
        .content-wrapper div.wpforms-container.wpforms-container-full .wpforms-form textarea:-ms-input-placeholder,
        #form-preview .mc4wp-form .mc4wp-form-fields input[type="email"]:-ms-input-placeholder {
            color: ' . esc_attr($standard_light_text_color) . ';
        }
    ';
}

$standard_accent_text_color = aiero_get_prefered_option('standard_accent_text_color');
if ( !empty($standard_accent_text_color) ) {
    $aiero_custom_css .= '
        .content-wrapper a,
        .content-wrapper .wrapper-socials a:hover,
        body .content-wrapper blockquote:before, 
        body .aiero_comments__item-text blockquote:before,
        .post-meta-header .post-meta-item a:hover,
        .post-more-button a,
        .post-more-button a:hover,
        .body-container .post-meta-item-tags a:hover,        
        .single-post .post-meta-footer .post-meta-item-author a:hover,
        .widget_search .search-form .search-form-icon:hover,      
        .content-wrapper .widget_calendar .wp-calendar-table:not(.has-text-color) thead th, 
        .content-wrapper .wp-block-calendar .wp-calendar-table:not(.has-text-color) thead th,
        .content-wrapper .widget_calendar .wp-calendar-table:not(.has-text-color) ~ .wp-calendar-nav a:hover,
        .content-wrapper .wp-block-calendar .wp-calendar-table:not(.has-text-color) ~ .wp-calendar-nav a:hover,
        .content-wrapper .widget_calendar .wp-calendar-table:not(.has-text-color) tbody td a, 
        .content-wrapper .wp-block-calendar .wp-calendar-table:not(.has-text-color) tbody td a,
        .sidebar .widget .widget-title a:hover,
        .widget_rss ul a.rsswidget:hover,
        .wp-block-rss .wp-block-rss__item-title a:hover,
        .results-wrapper ul li:before,
        .post-navigation .post-navigation-title a:hover,
        .post-navigation .post-navigation-categories a:hover,
        .post-navigation .archive-icon-link .archive-icon:hover,
        .service-item .service-post-title a:hover,
        .aiero-price-item-widget .price-item.price-item-type-standard .price-item-custom-field.active,
        .aiero-step-widget .step-item.step-item-type-standard .step-number,
        .single-product.woocommerce div.product .product_meta .product_meta_item a:hover,
        .wp-block-search.wp-block-search__button-inside .wp-block-search__inside-wrapper .wp-block-search__button.has-icon:hover,
        .elementor-widget-aiero_custom_menu ul li a:hover,
        .elementor-widget-aiero_custom_menu ul li.active a,
        .content-wrapper .wp-block-loginout a:hover,        
        .content-wrapper .wp-block-pullquote blockquote:before,
        .wp-block-search.wp-block-search__icon-button .wp-block-search__button.has-icon:hover,
        .team-experience-list .team-experience-item:before,
        .team-contact-info-card .team-contact-info-item.team-contact-info-item-email a:hover,
        .owl-nav button:not(.customize-partial-edit-shortcut-button)[class*="owl-"]:not(.disabled):hover,
        .post-navigation .post-navigation-link a:hover,
        .owl-theme .owl-nav [class*="owl-"]:not(.disabled):hover,
        .aiero-content-slider-widget .owl-theme .owl-nav [class*="owl-"]:not(.disabled):hover,
        content-wrapper .wp-block-social-links.is-style-logos-only:not(.has-icon-color) .wp-block-social-link a:hover svg,
        .block-editor-block-list__layout .wp-block-social-links.is-style-logos-only:not(.has-icon-color) .wp-block-social-link a:hover svg,
        .filter-control-wrapper .filter-control-list .dot:hover, 
        .filter-control-wrapper .gallery-filter-control-list .dot:hover,
        .filter-control-wrapper .filter-control-list .dot.active, 
        .filter-control-wrapper .gallery-filter-control-list .dot.active {
            color: ' . esc_attr($standard_accent_text_color) . ';
        }
        .post-more-button a svg {
            stroke: ' . esc_attr($standard_accent_text_color) . ';
        }
        .post-more-button a span {
            background-image: linear-gradient(0deg, ' . esc_attr($standard_accent_text_color) . ' 0%, ' . esc_attr($standard_accent_text_color) . ' 100%);
        }
        .sticky .post-meta-items-wrapper:before, 
        .status-sticky .post-meta-items-wrapper:before,
        .elementor-widget-aiero_special_text .special-text.special-text-effect-fill,
        .elementor-widget-progress .elementor-progress-wrapper .elementor-progress-bar,
        .post-comment-buttons a.comment-reply-link:hover,
        .post-comment-buttons a.comment-edit-link,        
        .content-wrapper .widget_calendar .wp-calendar-table:not(.has-text-color) tbody td#today:before, 
        .content-wrapper .wp-block-calendar .wp-calendar-table:not(.has-text-color) tbody td#today:before,
        .team-item .team-item-media:before,
        .aiero-heading .aiero-heading-content span[style*="text-decoration: underline"]:before, 
        .aiero-heading .aiero-heading-content u:before,
        .project-listing-wrapper.project-slider-listing.content-type-audio .project-item:before,
        .elementor-widget-image .hovered-text .hovered-text-subtitle,
        .elementor-widget-image .hovered-text .hovered-text-title,
        .case-study-listing-wrapper .case-study-item .post-meta-item-date {
            background-color: ' . esc_attr($standard_accent_text_color) . ';
        }        
        .result-box .result-box-value {
            -webkit-text-stroke: 1px ' . esc_attr($standard_accent_text_color) . ';
        }
        .elementor-widget-image .hovered-text .hovered-text-subtitle-wrapper:after {
            box-shadow: 0 20px 0 0 ' . esc_attr($standard_accent_text_color) . ';
        }
    ';
}

$standard_contrast_text_color = aiero_get_prefered_option('standard_contrast_text_color');
if ( !empty($standard_contrast_text_color) ) {
    $aiero_custom_css .= '                
        .sticky .post-meta-items-wrapper:before, 
        .status-sticky .post-meta-items-wrapper:before,
        .post-categories a.post-category-item:hover,        
        .single-post .post-meta-footer .post-meta-item.post-meta-item-tags a:hover,
        .post-comment-buttons a.comment-reply-link,
        .post-comment-buttons a.comment-edit-link,
        .post-comment-buttons a.comment-edit-link:hover,        
        .widget_tag_cloud .tagcloud .tag-cloud-link:hover,
        .wp-block-tag-cloud .tag-cloud-link:hover,        
        .content-wrapper .widget_calendar .wp-calendar-table:not(.has-text-color) caption, 
        .content-wrapper .wp-block-calendar .wp-calendar-table:not(.has-text-color) caption,
        .content-wrapper .widget_calendar .wp-calendar-table:not(.has-text-color) ~ .wp-calendar-nav a,
        .content-wrapper .wp-block-calendar .wp-calendar-table:not(.has-text-color) ~ .wp-calendar-nav a,
        .content-wrapper .widget_calendar .wp-calendar-table:not(.has-text-color) tbody td, 
        .content-wrapper .wp-block-calendar .wp-calendar-table:not(.has-text-color) tbody td,
        .content-wrapper .widget_calendar .wp-calendar-table:not(.has-text-color) tbody td a:hover, 
        .content-wrapper .wp-block-calendar .wp-calendar-table:not(.has-text-color) tbody td a:hover,
        .content-wrapper .widget_calendar .wp-calendar-table:not(.has-text-color) tbody td#today a, 
        .content-wrapper .wp-block-calendar .wp-calendar-table:not(.has-text-color) tbody td#today a,
        .team-item .socials-trigger-wrapper .socials-trigger,        
        .team-item .team-item-socials .wrapper-socials a,
        .team-item .team-item-tag,
        .team-contact-info-card .team-item-tag,
        .single-team .team-socials.wrapper-socials a,
        .content-wrapper .wp-block-cover .wp-block-file a.wp-block-file__button,        
        .aiero-gallery-title-style-simple .gallery-wrapper .gallery-item-wrapper .post-title,
        .project-listing-wrapper.owl-carousel.project-slider-listing .post-excerpt,
        .project-listing-wrapper.owl-carousel.project-slider-listing .post-title a,
        .aiero-audio-listing .audio-item-wrapper .audio-item:hover,
        .aiero-audio-listing .audio-item-wrapper .audio-item.active,
        .case-study-side-info .case-study-info-text-item .case-study-info-text-item-value,
        .case-study-side-info .post-meta-item-tags a:hover,
        .case-study-listing-wrapper .case-study-item .post-meta-item-date,
        .case-study-listing-wrapper .case-study-item .post-meta-item-tags a,
        .cursor_drag {
            color: ' . esc_attr($standard_contrast_text_color) . ';
        }
    ';
}

$standard_input_dark_color = aiero_get_prefered_option('standard_input_dark_color');
if ( !empty($standard_input_dark_color) ) {
    $aiero_custom_css .= '
        .content-wrapper input[type="radio"],
        .content-wrapper div.wpforms-container.wpforms-container-full .wpforms-form input[type="radio"],
        .content-wrapper input[type="checkbox"],
        .content-wrapper div.wpforms-container.wpforms-container-full .wpforms-form input[type="checkbox"],
        .woocommerce form .form-row input[type="checkbox"].input-checkbox,
        div.wpforms-container.wpforms-container-full .wpforms-form .wpforms-field-number-slider input[type="range"] {
            background-color: ' . esc_attr($standard_input_dark_color) . ';
        }
    ';
}

$standard_border_color = aiero_get_prefered_option('standard_border_color');
if ( !empty($standard_border_color) ) {
    $aiero_custom_css .= '
        body {
            --wpforms-field-border-color: ' . esc_attr($standard_border_color) . ';
        }
        .simple-sidebar-trigger,
        .header-extra-socials.wrapper-socials a,
        .wp-block-search.wp-block-search__button-inside .wp-block-search__inside-wrapper,
        body .content-wrapper table tr td, 
        body .content-wrapper table tr th, 
        body .aiero_comments__item-text table tr td, 
        body .aiero_comments__item-text table tr th,
        .project-post-meta .project-post-meta-item,
        .single-service .benefits-wrapper .benefit-item,
        .post-comments-list .post-comment-wrapper.depth-1,
        .standard-blog-item-wrapper:not(.aiero-format-quote) .blog-item:before, 
        .grid-blog-item-wrapper:not(.aiero-format-quote) .blog-item:before,
        .content-slider-video .icon-play-wrapper:before, 
        .aiero_video_button_widget .icon-play-wrapper:before,
        .aiero-audio-listing .audio-item-wrapper .audio-item {
            border-color: ' . esc_attr($standard_border_color) . ';
        }
        .team-contact-info-card:before {
            border-color: rgba(' . esc_attr(aiero_hex2rgb($standard_border_color)) . ', 0.5);
        }
        .aiero-step-widget .step-item.step-item-type-extended .step-image:before {
            border-color: rgba(' . esc_attr(aiero_hex2rgb($standard_border_color)) . ', 0.3);
        }       
        
        .content-slider-video .elementor-custom-embed-play:hover .icon-play-wrapper,
        .aiero_video_button_widget .elementor-custom-embed-play:hover .icon-play-wrapper {
            background-color: ' . esc_attr($standard_border_color) . ';
        }
        .content-wrapper input[type="text"],
        .content-wrapper input[type="email"],
        .content-wrapper input[type="url"],
        .content-wrapper input[type="password"],
        .content-wrapper input[type="search"],
        .content-wrapper input[type="number"],
        .content-wrapper input[type="tel"],
        .content-wrapper input[type="range"],
        .content-wrapper input[type="date"],
        .content-wrapper input[type="month"],
        .content-wrapper input[type="week"],
        .content-wrapper input[type="time"],
        .content-wrapper input[type="datetime"],
        .content-wrapper input[type="datetime-local"],
        .content-wrapper input[type="color"],
        .content-wrapper .select-wrap,
        .content-wrapper .select2-container .select2-selection--single,
        .content-wrapper textarea,        
        .select2-dropdown,
        body .select2-dropdown,
        .select2-container--default .select2-search--dropdown .select2-search__field,
        body .select2-container--default .select2-search--dropdown .select2-search__field,
        .content-wrapper div.wpforms-container.wpforms-container-full .wpforms-form input[type="text"],
        .content-wrapper div.wpforms-container.wpforms-container-full .wpforms-form input[type="email"],
        .content-wrapper div.wpforms-container.wpforms-container-full .wpforms-form input[type="url"],
        .content-wrapper div.wpforms-container.wpforms-container-full .wpforms-form input[type="password"],
        .content-wrapper div.wpforms-container.wpforms-container-full .wpforms-form input[type="search"],
        .content-wrapper div.wpforms-container.wpforms-container-full .wpforms-form input[type="number"],
        .content-wrapper div.wpforms-container.wpforms-container-full .wpforms-form input[type="tel"],
        .content-wrapper div.wpforms-container.wpforms-container-full .wpforms-form input[type="date"],
        .content-wrapper div.wpforms-container.wpforms-container-full .wpforms-form input[type="month"],
        .content-wrapper div.wpforms-container.wpforms-container-full .wpforms-form input[type="week"],
        .content-wrapper div.wpforms-container.wpforms-container-full .wpforms-form input[type="time"],
        .content-wrapper div.wpforms-container.wpforms-container-full .wpforms-form input[type="datetime"],
        .content-wrapper div.wpforms-container.wpforms-container-full .wpforms-form input[type="datetime-local"],
        .content-wrapper div.wpforms-container.wpforms-container-full .wpforms-form input[type="color"],
        .content-wrapper div.wpforms-container.wpforms-container-full .wpforms-form select,
        .content-wrapper div.wpforms-container.wpforms-container-full .wpforms-form textarea,
        #form-preview .mc4wp-form .mc4wp-form-fields input[type="email"],
        .wp-block-search.wp-block-search__button-inside .wp-block-search__inside-wrapper,
        .team-item:before,
        .content-wrapper .mc4wp-form .mc4wp-form-fields .form-field,
        .mini-cart .mini-cart-panel,
        .archive-listing-wrapper.list-listing .list-item-wrapper .blog-item {
            border-color: ' . esc_attr($standard_border_color) . ';
        }
        .content-wrapper div.wpforms-container-full .wpforms-form ul.wpforms-image-choices-classic label:not(.wpforms-error) {
            border-color: ' . esc_attr($standard_border_color) . ' !important;
        }
    ';
}

$standard_border_hover_color = aiero_get_prefered_option('standard_border_hover_color');
if ( !empty($standard_border_hover_color) ) {
    $aiero_custom_css .= '    	        
        .content-wrapper input[type="text"]:focus,
        .content-wrapper input[type="email"]:focus,
        .content-wrapper input[type="url"]:focus,
        .content-wrapper input[type="password"]:focus,
        .content-wrapper input[type="search"]:focus,
        .content-wrapper input[type="number"]:focus,
        .content-wrapper input[type="tel"]:focus,
        .content-wrapper input[type="range"]:focus,
        .content-wrapper input[type="date"]:focus,
        .content-wrapper input[type="month"]:focus,
        .content-wrapper input[type="week"]:focus,
        .content-wrapper input[type="time"]:focus,
        .content-wrapper input[type="datetime"]:focus,
        .content-wrapper input[type="datetime-local"]:focus,
        .content-wrapper input[type="color"]:focus,
        .content-wrapper .select-wrap:focus-within,
        .content-wrapper textarea:focus,
        .select2-dropdown,
        body .select2-dropdown,
        .select2-container--default .select2-search--dropdown .select2-search__field,
        body .select2-container--default .select2-search--dropdown .select2-search__field,
        .content-wrapper div.wpforms-container.wpforms-container-full .wpforms-form input[type="text"]:focus,
        .content-wrapper div.wpforms-container.wpforms-container-full .wpforms-form input[type="email"]:focus,
        .content-wrapper div.wpforms-container.wpforms-container-full .wpforms-form input[type="url"]:focus,
        .content-wrapper div.wpforms-container.wpforms-container-full .wpforms-form input[type="password"]:focus,
        .content-wrapper div.wpforms-container.wpforms-container-full .wpforms-form input[type="search"]:focus,
        .content-wrapper div.wpforms-container.wpforms-container-full .wpforms-form input[type="number"]:focus,
        .content-wrapper div.wpforms-container.wpforms-container-full .wpforms-form input[type="tel"]:focus,
        .content-wrapper div.wpforms-container.wpforms-container-full .wpforms-form input[type="date"]:focus,
        .content-wrapper div.wpforms-container.wpforms-container-full .wpforms-form input[type="month"]:focus,
        .content-wrapper div.wpforms-container.wpforms-container-full .wpforms-form input[type="week"]:focus,
        .content-wrapper div.wpforms-container.wpforms-container-full .wpforms-form input[type="time"]:focus,
        .content-wrapper div.wpforms-container.wpforms-container-full .wpforms-form input[type="datetime"]:focus,
        .content-wrapper div.wpforms-container.wpforms-container-full .wpforms-form input[type="datetime-local"]:focus,
        .content-wrapper div.wpforms-container.wpforms-container-full .wpforms-form input[type="color"]:focus,
        .content-wrapper div.wpforms-container.wpforms-container-full .wpforms-form select:focus,
        .content-wrapper div.wpforms-container.wpforms-container-full .wpforms-form textarea:focus,
        #form-preview .mc4wp-form .mc4wp-form-fields input[type="email"]:focus,
        .wp-block-search.wp-block-search__button-inside .wp-block-search__inside-wrapper:focus-within,
        .content-wrapper .mc4wp-form .mc4wp-form-fields .form-field:focus-within {
            border-color: ' . esc_attr($standard_border_hover_color) . ';
        }
        .content-wrapper div.wpforms-container-full .wpforms-form ul.wpforms-image-choices-classic label:not(.wpforms-error):focus {
            border-color: ' . esc_attr($standard_border_hover_color) . ' !important;
        }
        .input-floating-wrap input:focus ~ .floating-placeholder, 
        .input-floating-wrap input:not(:placeholder-shown) ~ .floating-placeholder, 
        .input-floating-wrap textarea:focus ~ .floating-placeholder, 
        .input-floating-wrap textarea:not(:placeholder-shown) ~ .floating-placeholder,
        .content-wrapper .select2-container .select2-selection--single {
            color: ' . esc_attr($standard_border_hover_color) . ';
        }
    ';
}

$standard_background_color = aiero_get_prefered_option('standard_background_color');
if ( !empty($standard_background_color) ) {
    $aiero_custom_css .= '
        body,
        .simple-sidebar-trigger,
        .single-service .benefits-wrapper .benefit-item,
        .aiero-price-item-widget.aiero-price-item-style-alt .price-item.price-item-type-standard,
        .swiper-container .elementor-swiper-button i,
        .post-meta-items,
        .team-item,
        .team-item .socials-trigger-wrapper,
        .team-contact-info-card,
        .owl-nav-wrapper .owl-nav,
        .elementor-widget-aiero_video_button.aiero-video-button-decoration-on .elementor-custom-embed-play,
        .content-slider-video .elementor-custom-embed-play,
        .aiero-price-item-widget .price-item.active .price-item-label,
        .gallery-wrapper .gallery-item-wrapper .gallery-item-content,
        .aiero-content-slider-widget .owl-carousel.owl-theme .owl-nav button[class*="owl-"],
        .post-gallery-carousel.owl-carousel.owl-theme .owl-nav button[class*="owl-"],
        .service-slider-listing .service-item-icon .service-item-icon-inner,
        .aiero-gallery-widget .owl-nav button:not(.customize-partial-edit-shortcut-button)[class*="owl-"],
        .aiero-gallery-widget .owl-nav button:not(.customize-partial-edit-shortcut-button)[class*="owl-"]:hover,
        .input-floating-wrap .floating-placeholder,
        .content-wrapper input[type="text"],
        .content-wrapper input[type="email"],
        .content-wrapper input[type="url"],
        .content-wrapper input[type="password"],
        .content-wrapper input[type="search"],
        .content-wrapper input[type="number"],
        .content-wrapper input[type="tel"],
        .content-wrapper input[type="range"],
        .content-wrapper input[type="date"],
        .content-wrapper input[type="month"],
        .content-wrapper input[type="week"],
        .content-wrapper input[type="time"],
        .content-wrapper input[type="datetime"],
        .content-wrapper input[type="datetime-local"],
        .content-wrapper input[type="color"],
        .content-wrapper .select-wrap,
        .content-wrapper .select2-container .select2-selection--single,
        .content-wrapper textarea,        
        .select2-dropdown,
        body .select2-dropdown,
        .select2-container--default .select2-search--dropdown .select2-search__field,
        body .select2-container--default .select2-search--dropdown .select2-search__field,
        .content-wrapper div.wpforms-container.wpforms-container-full .wpforms-form input[type="text"],
        .content-wrapper div.wpforms-container.wpforms-container-full .wpforms-form input[type="email"],
        .content-wrapper div.wpforms-container.wpforms-container-full .wpforms-form input[type="url"],
        .content-wrapper div.wpforms-container.wpforms-container-full .wpforms-form input[type="password"],
        .content-wrapper div.wpforms-container.wpforms-container-full .wpforms-form input[type="search"],
        .content-wrapper div.wpforms-container.wpforms-container-full .wpforms-form input[type="number"],
        .content-wrapper div.wpforms-container.wpforms-container-full .wpforms-form input[type="tel"],
        .content-wrapper div.wpforms-container.wpforms-container-full .wpforms-form input[type="date"],
        .content-wrapper div.wpforms-container.wpforms-container-full .wpforms-form input[type="month"],
        .content-wrapper div.wpforms-container.wpforms-container-full .wpforms-form input[type="week"],
        .content-wrapper div.wpforms-container.wpforms-container-full .wpforms-form input[type="time"],
        .content-wrapper div.wpforms-container.wpforms-container-full .wpforms-form input[type="datetime"],
        .content-wrapper div.wpforms-container.wpforms-container-full .wpforms-form input[type="datetime-local"],
        .content-wrapper div.wpforms-container.wpforms-container-full .wpforms-form input[type="color"],
        .content-wrapper div.wpforms-container.wpforms-container-full .wpforms-form select,
        .content-wrapper div.wpforms-container.wpforms-container-full .wpforms-form textarea,
        #form-preview .mc4wp-form .mc4wp-form-fields input[type="email"] {
            background-color: ' . esc_attr($standard_background_color) . ';
        }
        .team-info-additional .team-achievements-boxes .team-achievements-box .team-achievements-box-value {
            color: ' . esc_attr($standard_background_color) . ';
        }
        .swiper-container .elementor-swiper-button i {
            border-color: ' . esc_attr($standard_background_color) . ';
        }        
        .content-wrapper div.wpforms-container.wpforms-container-full .wpforms-form .wpforms-field-number-slider input[type="range"]::-webkit-slider-thumb {
            background-color: ' . esc_attr($standard_background_color) . ';
        }
        .content-wrapper div.wpforms-container.wpforms-container-full .wpforms-form .wpforms-field-number-slider input[type="range"]::-moz-range-thumb {
             background-color: ' . esc_attr($standard_background_color) . ';
        }
        .content-wrapper div.wpforms-container.wpforms-container-full .wpforms-form .wpforms-field-number-slider input[type="range"]::-ms-thumb {
             background-color: ' . esc_attr($standard_background_color) . ';
        }
        .content-wrapper div.wpforms-container.wpforms-container-full .wpforms-form .wpforms-field-number-slider input[type="range"]:focus::-ms-thumb {
             background-color: ' . esc_attr($standard_background_color) . ';
        }
        .post-meta-items-wrapper:after,
        .post-meta-items-wrapper:before,
        .team-item .socials-trigger-wrapper:before,
        .team-item .socials-trigger-wrapper:after,
        .owl-nav-wrapper:before,
        .owl-nav-wrapper:after,
        .elementor-widget-aiero_video_button.aiero-video-button-decoration-on .elementor-custom-embed-image-overlay:before,
        .elementor-widget-aiero_video_button.aiero-video-button-decoration-on .elementor-custom-embed-image-overlay:after,
        .content-slider-video .elementor-custom-embed-image-overlay:before,
        .content-slider-video .elementor-custom-embed-image-overlay:after,
        .gallery-wrapper .gallery-item-wrapper .gallery-item-content-wrapper:before, 
        .gallery-wrapper .gallery-item-wrapper .gallery-item-content-wrapper:after,
        .aiero-content-slider-widget .owl-carousel.owl-theme .owl-nav button[class*="owl-"]:before,
        .post-gallery-carousel.owl-carousel.owl-theme .owl-nav button[class*="owl-"]:before,
        .service-slider-listing .service-item-icon .service-item-icon-wrapper:before, 
        .service-slider-listing .service-item-icon .service-item-icon-wrapper:after {
            box-shadow: 0 20px 0 0 ' . esc_attr($standard_background_color) . ';
        }
        .aiero-price-item-widget .price-item.active .price-item-label-wrapper:before, 
        .aiero-price-item-widget .price-item.active .price-item-label-wrapper:after,
        .aiero-content-slider-widget .owl-carousel.owl-theme .owl-nav button[class*="owl-"]:after,
        .post-gallery-carousel.owl-carousel.owl-theme .owl-nav button[class*="owl-"]:after {
            box-shadow: 0 -20px 0 0 ' . esc_attr($standard_background_color) . '
        }
        @media (max-width: 575px) {
            .elementor-lightbox .swiper-container .elementor-swiper-button i {
                background-color: ' . esc_attr($standard_background_color) . ';
            }
        }
    ';
}

$standard_background_alter_color = aiero_get_prefered_option('standard_background_alter_color');
if ( !empty($standard_background_alter_color) ) {
    $aiero_custom_css .= '
        .post-categories a.post-category-item,        
        .single-post .post-meta-footer .post-meta-item.post-meta-item-tags a,
        .section-accent-bg,
        .help-item .help-item-title,
        .elementor-widget-progress .elementor-progress-wrapper,
        .post-comments-wrapper .comment-respond,
        .widget_tag_cloud .tagcloud .tag-cloud-link,
        .wp-block-tag-cloud .tag-cloud-link,
        .slide-sidebar-wrapper .widget_tag_cloud .tagcloud .tag-cloud-link:hover,
        .slide-sidebar-wrapper .wp-block-tag-cloud .tag-cloud-link:hover,
        .footer .widget_tag_cloud .tagcloud .tag-cloud-link:hover,
        .footer .wp-block-tag-cloud .tag-cloud-link:hover,
        .vacancy-info,
        .case-study-side-info .post-meta-item-tags a,
        .comment-form .form-field input:not([type="checkbox"]),
        .comment-form .form-field textarea,
        .comment-form .form-field .floating-placeholder {
            background-color: ' . esc_attr($standard_background_alter_color) . ';
        }
    ';
}

$standard_button_text_color = aiero_get_prefered_option('standard_button_text_color');
if ( !empty($standard_button_text_color) ) {
    $aiero_custom_css .= '
    	body {
            --wpforms-button-text-color: ' . esc_attr($standard_button_text_color) . '
        }
        .content-wrapper .comment-form button.submit,
        .content-wrapper input[type="submit"],
        .content-wrapper input[type="button"],
        .content-wrapper input[type="reset"],
        .content-wrapper div.wpforms-container-full .wpforms-form input[type=submit], 
        .content-wrapper div.wpforms-container-full .wpforms-form button[type=submit], 
        .content-wrapper div.wpforms-container-full .wpforms-form .wpforms-page-button,
        .content-wrapper .mc4wp-form .mc4wp-form-fields button,     
        #form-preview button,        
        .aiero-button,
        .sidebar .wp-block-button:not(.is-style-outline):not(.is-style-fill) .wp-block-button__link:not(.has-text-color),
        .content-wrapper .aiero-button,
        .content-wrapper button:not(.customize-partial-edit-shortcut-button),        
        .content-pagination .page-numbers,
        .content-pagination .post-page-numbers,
        .widget_media_gallery .gallery .gallery-icon a:after,
        #sb_instagram .sbi_item .sbi_photo:after,
        .swiper-container .elementor-swiper-button:hover i,
        .wp-block-gallery .blocks-gallery-grid .blocks-gallery-item a:after, 
        .media_gallery .blocks-gallery-grid .blocks-gallery-item a:after,
        body .content-wrapper .gallery .gallery-item .gallery-icon a:after,
        .project-modern-listing .project-item-wrapper .post-more-button a,
        .content-wrapper .aiero-button-type-alt .aiero-button:hover,
        .project-listing-wrapper .project-item-wrapper .project-item-categories a {
            color: ' . esc_attr($standard_button_text_color) . ';
        }
        .content-wrapper .wp-block-social-links.is-style-default:not(.has-icon-color) .wp-social-link a.wp-block-social-link-anchor svg {
            fill: ' . esc_attr($standard_button_text_color) . ';
        }
    ';
}

$standard_button_border_style = aiero_get_prefered_option('standard_button_border_style');
if ( $standard_button_border_style == 'solid' ) {
    $aiero_custom_css .= '
        #form-preview button .button-inner,
        .content-wrapper .aiero-button .button-inner,
        .elementor .aiero-button .button-inner,
        .content-wrapper button:not(.customize-partial-edit-shortcut-button) .button-inner,
        .content-wrapper div.wpforms-container-full .wpforms-form button[type=submit] .button-inner, 
        .content-wrapper div.wpforms-container-full .wpforms-form .wpforms-page-button .button-inner,
        .sidebar .wp-block-button:not(.is-style-outline):not(.is-style-fill) .wp-block-button__link .button-inner,
        .content-pagination .page-numbers .button-inner, 
        .content-pagination .post-page-numbers .button-inner {
            top: 0;
            left: 0;
            right: 0;
            bottom: 0;
        }
    ';
}

$standard_button_border_color = aiero_get_prefered_option('standard_button_border_color');
$standard_button_border_color_add = aiero_get_prefered_option('standard_button_border_color_add');
if( $standard_button_border_style == 'gradient' && ( !empty($standard_button_border_color) && !empty($standard_button_border_color_add) )) {
    $aiero_custom_css .= '
        #form-preview button:after,
        .content-wrapper .aiero-button:after,
        .elementor .aiero-button:after,
        .content-wrapper button:not(.customize-partial-edit-shortcut-button):after,
        .sidebar .wp-block-button:not(.is-style-outline):not(.is-style-fill) .wp-block-button__link:after,
        .content-pagination .page-numbers:after, 
        .content-pagination .post-page-numbers:after,
        .project-listing-wrapper.text-position-inside .project-item-wrapper .project-item-categories a:after,
        .project-listing-wrapper .project-item-wrapper .project-item-categories a:after {
            background: linear-gradient(var(--button-border-gradient-angle), ' . esc_attr($standard_button_border_color) . ' var(--button-gradient-colorstop-1), ' . esc_attr($standard_button_border_color_add) . ' var(--button-gradient-colorstop-2));
        }
    ';
} elseif ( $standard_button_border_style == 'solid' && !empty($standard_button_border_color)) {
    $aiero_custom_css .= '
        #form-preview button,
        .content-wrapper .aiero-button,
        .elementor .aiero-button,
        .content-wrapper button:not(.customize-partial-edit-shortcut-button),
        .sidebar .wp-block-button:not(.is-style-outline):not(.is-style-fill) .wp-block-button__link,        
        .content-pagination .page-numbers, 
        .content-pagination .post-page-numbers,
        .comment-form button.submit,
        .content-wrapper div.wpforms-container-full .wpforms-form input[type=submit], 
        .content-wrapper div.wpforms-container-full .wpforms-form button[type=submit], 
        .content-wrapper div.wpforms-container-full .wpforms-form .wpforms-page-button,
        .content-wrapper .mc4wp-form .mc4wp-form-fields button,
        .project-listing-wrapper.text-position-inside .project-item-wrapper .project-item-categories a,
        .project-listing-wrapper .project-item-wrapper .project-item-categories a {
            border-color: ' . esc_attr($standard_button_border_color) . ';
        }
    ';
}

if( !empty($standard_button_border_color) && !empty($standard_button_border_color_add) ) {
    $aiero_custom_css .= '        
        .single-post .post-meta-footer:not(:first-child):before {
            background: linear-gradient(var(--button-border-gradient-angle), ' . esc_attr($standard_button_border_color) . ' var(--button-gradient-colorstop-1), ' . esc_attr($standard_button_border_color_add) . ' var(--button-gradient-colorstop-2));
        }        
        .elementor-widget-aiero_step_carousel .owl-nav:after,
        .elementor-widget-aiero_services_listing .owl-nav:after,
        .aiero-projects-listing-widget .owl-nav:after {
            background: linear-gradient(var(--nav-border-gradient-angle), ' . esc_attr($standard_button_border_color) . ' var(--nav-gradient-colorstop-1), ' . esc_attr($standard_button_border_color_add) . ' var(--nav-gradient-colorstop-2));
        }
        .sidebar .widget .widget-title:first-child, 
        .sidebar .widget .wp-block-heading:first-child, 
        .sidebar .widget .wp-block-search__label:first-child {
            border-image: linear-gradient(var(--button-border-gradient-angle), ' . esc_attr($standard_button_border_color) . ' var(--button-gradient-colorstop-1), ' . esc_attr($standard_button_border_color_add) . ' var(--button-gradient-colorstop-2)) 30;
        }
        .team-info-additional .team-achievements-boxes .team-achievements-box .team-achievements-box-value {
            background: linear-gradient(var(--box-gradient-angle), ' . esc_attr($standard_button_border_color) . ' var(--box-gradient-colorstop-1), ' . esc_attr($standard_button_border_color_add) . ' var(--box-gradient-colorstop-2));
        }
        .project-modern-listing .project-item-wrapper .post-more-button a,
        .aiero-button-border-style-gradient.aiero-button-type-alt .aiero-button {
            background-image: linear-gradient(var(--button-border-gradient-angle), ' . esc_attr($standard_button_border_color) . ' var(--button-gradient-colorstop-1), ' . esc_attr($standard_button_border_color_add) . ' var(--button-gradient-colorstop-2));
        }
        .content-wrapper .widget_aiero_special_text_widget .aiero-special-text-widget-text {
            background: linear-gradient(var(--special-text-gradient-angle), ' . esc_attr($standard_button_border_color) . ' var(--special-text-gradient-colorstop-1), ' . esc_attr($standard_button_border_color_add) . ' var(--special-text-gradient-colorstop-2));
        }
    ';
} elseif( !empty($standard_button_border_color) ) {
    $aiero_custom_css .= '
        .single-post .post-meta-footer:not(:first-child):before {
            background-color: ' . esc_attr($standard_button_border_color) . ';
        }
        .sidebar .widget .widget-title:first-child, 
        .sidebar .widget .wp-block-heading:first-child, 
        .sidebar .widget .wp-block-search__label:first-child {
            border-color: ' . esc_attr($standard_button_border_color) . ';
        }
    ';
}

if ( !empty($standard_button_border_color) ) {
    $aiero_custom_css .= '    	
        .content-wrapper input[type="submit"],
        .content-wrapper input[type="button"],
        .content-wrapper input[type="reset"],
        .content-wrapper div.wpforms-container-full .wpforms-form input[type=submit] {
            border-color: ' . esc_attr($standard_button_border_color) . ';
        }
        .swiper-container .elementor-swiper-button:hover i {
            border-color: ' . esc_attr($standard_button_border_color) . ';
        }
        .widget_media_gallery .gallery .gallery-icon a:before,
        #sb_instagram .sbi_item .sbi_photo:before,
        .swiper-container .elementor-swiper-button:hover i,
        .content-wrapper .wp-block-social-links.is-style-default:not(.has-icon-background-color) .wp-social-link a.wp-block-social-link-anchor {
            background-color: ' . esc_attr($standard_button_border_color) . ';
        }
        .content-wrapper div.wpforms-container-full .wpforms-form ul.wpforms-image-choices-classic .wpforms-selected label {
            border-color: ' . esc_attr($standard_button_border_color) . ' !important;
        }
        .aiero-content-slider-widget .owl-carousel.owl-theme .slider-item:before,
        .wp-block-gallery .blocks-gallery-grid .blocks-gallery-item a:before, 
        .media_gallery .blocks-gallery-grid .blocks-gallery-item a:before,
        body .content-wrapper .gallery .gallery-item .gallery-icon a:before {
             background-color: rgba(' . esc_attr(aiero_hex2rgb($standard_button_border_color)) . ', 0.5);
        }
    ';
}

$standard_button_background_style = aiero_get_prefered_option('standard_button_background_style');
$standard_button_background_color = aiero_get_prefered_option('standard_button_background_color');
$standard_button_background_color_add = aiero_get_prefered_option('standard_button_background_color_add');
if( $standard_button_background_style == 'gradient' && ( !empty($standard_button_background_color) && !empty($standard_button_background_color_add) )) {
    $aiero_custom_css .= '
        #form-preview button,
        .content-wrapper button:not(.customize-partial-edit-shortcut-button),
        .content-wrapper .aiero-button .button-inner:before,
        .elementor .aiero-button .button-inner:before,
        .content-wrapper .wp-block-search .wp-block-search__button .button-inner:before,
        .sidebar .wp-block-button:not(.is-style-outline):not(.is-style-fill) .wp-block-button__link:not(.has-background) .button-inner:before,
        .content-pagination .page-numbers .button-inner:before, 
        .content-pagination .post-page-numbers .button-inner:before,
        .comment-form button.submit .button-inner:before,
        .content-wrapper input[type="submit"],
        .content-wrapper input[type="button"],
        .content-wrapper input[type="reset"],
        .content-wrapper div.wpforms-container-full .wpforms-form input[type=submit]:not(:hover):not(:active),
        .content-wrapper div.wpforms-container-full .wpforms-form button[type=submit] .button-inner:before, 
        .content-wrapper div.wpforms-container-full .wpforms-form .wpforms-page-button .button-inner:before,
        .content-wrapper .mc4wp-form .mc4wp-form-fields button .button-inner:before,
        .project-listing-wrapper.text-position-inside .project-item-wrapper .project-item-categories a .button-inner:before,
        .project-listing-wrapper .project-item-wrapper .project-item-categories a .button-inner:before {
            background: linear-gradient(var(--button-border-gradient-angle), ' . esc_attr($standard_button_background_color) . ' var(--button-gradient-colorstop-1), ' . esc_attr($standard_button_background_color_add) . ' var(--button-gradient-colorstop-2));
        }
		.comment-form button.submit,
		.content-wrapper div.wpforms-container-full .wpforms-form button[type=submit], 
        .content-wrapper div.wpforms-container-full .wpforms-form .wpforms-page-button,
        .content-wrapper .mc4wp-form .mc4wp-form-fields button,
        .content-wrapper .wp-block-search .wp-block-search__button {
            background: none;
        }
    ';
} elseif ( $standard_button_background_style == 'solid' && !empty($standard_button_background_color)) {
    $aiero_custom_css .= '
        #form-preview button,
        .content-wrapper .aiero-button,
        .elementor .aiero-button,
        .content-wrapper button:not(.customize-partial-edit-shortcut-button),        
        .sidebar .wp-block-button:not(.is-style-outline):not(.is-style-fill) .wp-block-button__link:not(.has-background),
        .content-pagination .page-numbers, 
        .content-pagination .post-page-numbers,
        .comment-form button.submit,
        .content-wrapper input[type="submit"],
        .content-wrapper input[type="button"],
        .content-wrapper input[type="reset"],
        .content-wrapper div.wpforms-container-full .wpforms-form input[type=submit]:not(:hover):not(:active),
        .content-wrapper div.wpforms-container-full .wpforms-form button[type=submit]:not(:hover):not(:active), 
        .content-wrapper div.wpforms-container-full .wpforms-form .wpforms-page-button:not(:hover):not(:active),
        .content-wrapper .mc4wp-form .mc4wp-form-fields button,
        .project-listing-wrapper.text-position-inside .project-item-wrapper .project-item-categories a,
        .project-listing-wrapper .project-item-wrapper .project-item-categories a {
            background-color: ' . esc_attr($standard_button_background_color) . ';
        }
    ';
}

if ( !empty($standard_button_background_color) ) {
    $aiero_custom_css .= '
    	.content-wrapper {
            --wpforms-button-background-color: ' . esc_attr($standard_button_background_color) . '
        }
        .error-404-wrapper .error-404-button .aiero-button {
        	background-color: ' . esc_attr($standard_button_background_color) . '
        }
    ';
}

$standard_button_text_hover = aiero_get_prefered_option('standard_button_text_hover');
if ( !empty($standard_button_text_hover) ) {
    $aiero_custom_css .= '
        .content-pagination .page-numbers.current,
        .content-pagination .page-numbers:hover,
        .content-pagination .post-page-numbers.current,
        .content-pagination .post-page-numbers:hover,        
        .aiero-button:hover,
        .sidebar .wp-block-button:not(.is-style-outline):not(.is-style-fill) .wp-block-button__link:not(.has-text-color):hover,
        .content-wrapper .aiero-button:hover,
        .content-wrapper button:not(.customize-partial-edit-shortcut-button):hover,
        .content-wrapper input[type="submit"]:hover,
        .content-wrapper input[type="button"]:hover,
        .content-wrapper input[type="reset"]:hover,
        .content-wrapper div.wpforms-container-full .wpforms-form input[type=submit]:hover, 
        .content-wrapper div.wpforms-container-full .wpforms-form button[type=submit]:hover, 
        .content-wrapper div.wpforms-container-full .wpforms-form .wpforms-page-button:hover,
        .content-wrapper .comment-form button.submit:hover,
        .select2-container--default .select2-results__option[aria-selected=true], 
        .select2-container--default .select2-results__option[data-selected=true],
        .content-wrapper .select2-container--default .select2-results__option[aria-selected=true], 
        .content-wrapper .select2-container--default .select2-results__option[data-selected=true],
        .team-short-contact-button .aiero-button,
        .help-item.active .help-item-title,
        .aiero-step-widget .step-item.step-item-type-standard .step-bg-number,
        .woocommerce-product-gallery .flex-control-nav .slick-button:not(.slick-disabled):hover,
        .aiero-step-widget .step-item.step-item-type-extended .step-image .step-number,
        .content-wrapper .mc4wp-form .mc4wp-form-fields button:hover,
        .content-wrapper .wp-block-cover .wp-block-file a.wp-block-file__button:hover,
        .content-wrapper .wp-block-file a.wp-block-file__button:hover,
        .project-slider-listing.content-type-audio .project-audio-wrapper .aiero-button.active,
        .project-listing-wrapper .project-item-wrapper .project-item-categories a:hover {
            color: ' . esc_attr($standard_button_text_hover) . ';
        }
        .content-wrapper .wp-block-social-links.is-style-default:not(.has-icon-color) .wp-social-link:hover a.wp-block-social-link-anchor svg {
            fill: ' . esc_attr($standard_button_text_hover) . ';
        }
    ';
}

$standard_button_border_hover = aiero_get_prefered_option('standard_button_border_hover');
$standard_button_border_hover_add = aiero_get_prefered_option('standard_button_border_hover_add');
if( $standard_button_border_style == 'gradient' && ( !empty($standard_button_border_hover) && !empty($standard_button_border_hover_add) )) {
    $aiero_custom_css .= '
        #form-preview button:hover:after,
        .content-wrapper .aiero-button:hover:after,
        .elementor .aiero-button:hover:after,
        .content-wrapper button:not(.customize-partial-edit-shortcut-button):hover:after,
        .sidebar .wp-block-button:not(.is-style-outline):not(.is-style-fill) .wp-block-button__link:hover:after,
        .content-pagination a.page-numbers:hover:after, 
        .content-pagination a.post-page-numbers:hover:after,
        .content-pagination .page-numbers.current:after, 
        .content-pagination .post-page-numbers.current:after,
        .project-slider-listing.content-type-audio .project-audio-wrapper .aiero-button.active:after,
        .comment-form button.submit:hover:after,
        .content-wrapper div.wpforms-container-full .wpforms-form input[type=submit]:hover:after, 
        .content-wrapper div.wpforms-container-full .wpforms-form button[type=submit]:hover:after, 
        .content-wrapper div.wpforms-container-full .wpforms-form .wpforms-page-button:hover:after,
        .content-wrapper .mc4wp-form .mc4wp-form-fields button:hover:after,
        .project-listing-wrapper.text-position-inside .project-item-wrapper .project-item-categories a:hover:after,
        .project-listing-wrapper .project-item-wrapper .project-item-categories a:hover:after {
            background: linear-gradient(var(--button-border-gradient-angle), ' . esc_attr($standard_button_border_hover) . ' var(--button-gradient-colorstop-1), ' . esc_attr($standard_button_border_hover_add) . ' var(--button-gradient-colorstop-2));
        }
    ';
} elseif ( $standard_button_border_style == 'solid' && !empty($standard_button_border_hover)) {
    $aiero_custom_css .= '
        #form-preview button:hover,
        .content-wrapper .aiero-button:hover,
        .elementor .aiero-button:hover,
        .content-wrapper button:not(.customize-partial-edit-shortcut-button):hover,
        .sidebar .wp-block-button:not(.is-style-outline):not(.is-style-fill) .wp-block-button__link:hover,
        .content-pagination a.page-numbers:hover, 
        .content-pagination a.post-page-numbers:hover,
        .content-pagination .page-numbers.current, 
        .content-pagination .post-page-numbers.current,
        .project-slider-listing.content-type-audio .project-audio-wrapper .aiero-button.active,
        .comment-form button.submit:hover,
        .content-wrapper div.wpforms-container-full .wpforms-form input[type=submit]:hover, 
        .content-wrapper div.wpforms-container-full .wpforms-form button[type=submit]:hover, 
        .content-wrapper div.wpforms-container-full .wpforms-form .wpforms-page-button:hover,
        .content-wrapper .mc4wp-form .mc4wp-form-fields button:hover,
        .project-listing-wrapper.text-position-inside .project-item-wrapper .project-item-categories a:hover,
        .project-listing-wrapper .project-item-wrapper .project-item-categories a:hover {
            border-color: ' . esc_attr($standard_button_border_hover) . ';
        }
    ';
}

if ( !empty($standard_button_border_hover) ) {
    $aiero_custom_css .= '       
        .content-wrapper input[type="submit"]:hover,
        .content-wrapper input[type="button"]:hover,
        .content-wrapper input[type="reset"]:hover,        
        .content-wrapper .wp-block-file a.wp-block-file__button:hover {
            border-color:  ' . esc_attr($standard_button_border_hover) . ';
        }
    ';
}

$standard_button_background_style = aiero_get_prefered_option('standard_button_background_style');
$standard_button_background_hover = aiero_get_prefered_option('standard_button_background_hover');
$standard_button_background_hover_add = aiero_get_prefered_option('standard_button_background_hover_add');
if( $standard_button_background_style == 'gradient' && ( !empty($standard_button_background_hover) && !empty($standard_button_background_hover_add) )) {
    $aiero_custom_css .= '
        #form-preview button:hover,
        .content-wrapper button:not(.customize-partial-edit-shortcut-button):hover,
        .content-wrapper .aiero-button .button-inner:after,
        .elementor .aiero-button .button-inner:after,
        .content-wrapper .wp-block-search .wp-block-search__button .button-inner:after,
        .sidebar .wp-block-button:not(.is-style-outline):not(.is-style-fill) .wp-block-button__link:not(.has-background) .button-inner:after,
        .content-pagination .page-numbers .button-inner:after, 
        .content-pagination .post-page-numbers .button-inner:after,
        .project-slider-listing.content-type-audio .project-audio-wrapper .aiero-button.active:after,
        .content-wrapper .comment-form button.submit .button-inner:after,
        .content-wrapper input[type="submit"]:hover,
        .content-wrapper input[type="button"]:hover,
        .content-wrapper input[type="reset"]:hover,
        .content-wrapper div.wpforms-container-full .wpforms-form input[type=submit]:hover,
        .content-wrapper div.wpforms-container-full .wpforms-form button[type=submit] .button-inner:after,
        .content-wrapper div.wpforms-container-full .wpforms-form .wpforms-page-button .button-inner:after,
        .content-wrapper .mc4wp-form .mc4wp-form-fields button .button-inner:after,
        .project-listing-wrapper.text-position-inside .project-item-wrapper .project-item-categories a .button-inner:after,
        .project-listing-wrapper .project-item-wrapper .project-item-categories a .button-inner:after {
            background: linear-gradient(var(--button-border-gradient-angle), ' . esc_attr($standard_button_background_hover) . ' var(--button-gradient-colorstop-1), ' . esc_attr($standard_button_background_hover_add) . ' var(--button-gradient-colorstop-2));
        }
		.comment-form button.submit:hover,
		.content-wrapper div.wpforms-container-full .wpforms-form button[type=submit]:hover,
        .content-wrapper div.wpforms-container-full .wpforms-form .wpforms-page-button:hover,
        .content-wrapper .mc4wp-form .mc4wp-form-fields button:hover,
        .content-wrapper .wp-block-search .wp-block-search__button:hover,
        .project-slider-listing.content-type-audio .project-item .project-audio-wrapper .aiero-button:hover {
            background: none;
        }
    ';
} elseif ( $standard_button_background_style == 'solid' && !empty($standard_button_background_hover)) {
    $aiero_custom_css .= '
        #form-preview button:hover,
        .content-wrapper .aiero-button:hover,
        .elementor .aiero-button:hover,
        .content-wrapper button:not(.customize-partial-edit-shortcut-button):hover,
        .sidebar .wp-block-button:not(.is-style-outline):not(.is-style-fill) .wp-block-button__link:not(.has-background):hover,
        .content-pagination .page-numbers.current, 
        .content-pagination .post-page-numbers.current,
        .content-pagination .page-numbers:hover, 
        .content-pagination .post-page-numbers:hover,
        .project-slider-listing.content-type-audio .project-audio-wrapper .aiero-button.active,
        .content-wrapper .comment-form button.submit:hover,
        .content-wrapper input[type="submit"]:hover,
        .content-wrapper input[type="button"]:hover,
        .content-wrapper input[type="reset"]:hover,
        .content-wrapper div.wpforms-container-full .wpforms-form input[type=submit]:hover,
        .content-wrapper div.wpforms-container-full .wpforms-form button[type=submit]:hover,
        .content-wrapper div.wpforms-container-full .wpforms-form .wpforms-page-button:hover,
        .content-wrapper .mc4wp-form .mc4wp-form-fields button:hover,
        .project-listing-wrapper.text-position-inside .project-item-wrapper .project-item-categories a:hover,
        .project-listing-wrapper .project-item-wrapper .project-item-categories a:hover {
            background-color: ' . esc_attr($standard_button_background_hover) . ';
        }
    ';
}

if ( !empty($standard_button_background_hover) ) {
    $aiero_custom_css .= '
        .content-wrapper {
            --wpforms-button-background-color-alt: ' . esc_attr($standard_button_background_hover) . ';
        }
        
        .select2-container--default .select2-results__option[aria-selected=true], 
        .select2-container--default .select2-results__option[data-selected=true],
        .content-wrapper .select2-container--default .select2-results__option[aria-selected=true], 
        .content-wrapper .select2-container--default .select2-results__option[data-selected=true],
        .help-item.active .help-item-title,
        .woocommerce-product-gallery .flex-control-nav .slick-button:not(.slick-disabled):hover,
        .content-wrapper .wp-block-file a.wp-block-file__button:hover {
            background-color: ' . esc_attr($standard_button_background_hover) . ';
        }
        .aiero-step-widget .step-item.step-item-type-standard {
            background-color: rgba(' . esc_attr(aiero_hex2rgb($standard_button_background_hover)) . ', 0.07);
        }
        .aiero-step-widget .step-item.step-item-type-extended .step-image .step-image-box:after {
            background-image: linear-gradient(0deg, ' . esc_attr($standard_button_background_hover) . ' 0%, ' . esc_attr($standard_button_background_hover) . ' 10%, transparent 68%);
        }
    ';
}

if ( !empty($standard_accent_text_color) && !empty($standard_button_background_hover_add) ) {
    $aiero_custom_css .= '
        .aiero-format-quote .post-quote {
            background-image: linear-gradient(107deg, ' . esc_attr($standard_accent_text_color) . ' 0%, ' . esc_attr($standard_button_background_hover_add) . ' 100%);
        }
    ';
} elseif (!empty($standard_accent_text_color)) {
	$aiero_custom_css .= '
        .aiero-format-quote .post-quote {
            background-color: ' . esc_attr($standard_accent_text_color) . ';
        }
    ';
}

$footer_scrolltop_bg_color = aiero_get_prepared_option('footer_scrolltop_bg_color', 'standard_accent_text_color', 'footer_scrolltop_status');
if ( !empty($footer_scrolltop_bg_color) ) {
    $aiero_custom_css .= '
        .body-container .footer-scroll-top button {
           background-color: ' . esc_attr($footer_scrolltop_bg_color) . ';
        }
    ';
}

$footer_scrolltop_bg_color_hover = aiero_get_prepared_option('footer_scrolltop_bg_color_hover', 'standard_accent_text_color', 'footer_scrolltop_status');
if ( !empty($footer_scrolltop_bg_color_hover) ) {
    $aiero_custom_css .= '
        .body-container .footer-scroll-top button:hover {
            background-color: ' . esc_attr($footer_scrolltop_bg_color_hover) . ';
        }
    ';
}

$footer_scrolltop_color = aiero_get_prepared_option('footer_scrolltop_color', 'standard_dark_text_color', 'footer_scrolltop_status');
if ( !empty($footer_scrolltop_color) ) {
    $aiero_custom_css .= '
        .body-container .footer-scroll-top button {
           color: ' . esc_attr($footer_scrolltop_color) . ';
        }
    ';
}

$footer_scrolltop_color_hover = aiero_get_prepared_option('footer_scrolltop_color_hover', 'standard_dark_text_color', 'footer_scrolltop_status');
if ( !empty($footer_scrolltop_color_hover) ) {
    $aiero_custom_css .= '
        .body-container .footer-scroll-top button:hover {
            color: ' . esc_attr($footer_scrolltop_color_hover) . ';
        }
    ';
}