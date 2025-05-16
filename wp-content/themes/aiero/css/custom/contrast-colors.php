<?php

// ----------------------------- //
// ------ Contrast Colors ------ //
// ----------------------------- //

$contrast_default_text_color = aiero_get_prefered_option('contrast_default_text_color');
if ( !empty($contrast_default_text_color) ) {
    $aiero_custom_css .= '       
        .slide-sidebar-wrapper .slide-sidebar-content,
        .slide-sidebar-wrapper .widget_tag_cloud .tagcloud .tag-cloud-link,
        .slide-sidebar-wrapper .wp-block-tag-cloud .tag-cloud-link,
        .slide-sidebar-wrapper .input-floating-wrap input:focus ~ .floating-placeholder, 
        .slide-sidebar-wrapper .input-floating-wrap input:not(:placeholder-shown) ~ .floating-placeholder, 
        .slide-sidebar-wrapper .input-floating-wrap textarea:focus ~ .floating-placeholder, 
        .slide-sidebar-wrapper .input-floating-wrap textarea:not(:placeholder-shown) ~ .floating-placeholder,       
        .slide-sidebar-wrapper input[type="checkbox"]:checked:before,
        .slide-sidebar-wrapper div.wpforms-container.wpforms-container-full .wpforms-form input[type="checkbox"]:checked:before,        
        .slide-sidebar-wrapper input[type="text"],
        .slide-sidebar-wrapper input[type="email"],
        .slide-sidebar-wrapper input[type="url"],
        .slide-sidebar-wrapper input[type="password"],
        .slide-sidebar-wrapper input[type="search"],
        .slide-sidebar-wrapper input[type="number"],
        .slide-sidebar-wrapper input[type="tel"],
        .slide-sidebar-wrapper input[type="range"],
        .slide-sidebar-wrapper input[type="date"],
        .slide-sidebar-wrapper input[type="month"],
        .slide-sidebar-wrapper input[type="week"],
        .slide-sidebar-wrapper input[type="time"],
        .slide-sidebar-wrapper input[type="datetime"],
        .slide-sidebar-wrapper input[type="datetime-local"],
        .slide-sidebar-wrapper input[type="color"],
        .slide-sidebar-wrapper select,
        .slide-sidebar-wrapper .select2-container--default .select2-selection--single .select2-selection__rendered,
        .slide-sidebar-wrapper textarea,
        .slide-sidebar-wrapper div.wpforms-container.wpforms-container-full .wpforms-form input[type="text"],
        .slide-sidebar-wrapper div.wpforms-container.wpforms-container-full .wpforms-form input[type="email"],
        .slide-sidebar-wrapper div.wpforms-container.wpforms-container-full .wpforms-form input[type="url"],
        .slide-sidebar-wrapper div.wpforms-container.wpforms-container-full .wpforms-form input[type="password"],
        .slide-sidebar-wrapper div.wpforms-container.wpforms-container-full .wpforms-form input[type="search"],
        .slide-sidebar-wrapper div.wpforms-container.wpforms-container-full .wpforms-form input[type="number"],
        .slide-sidebar-wrapper div.wpforms-container.wpforms-container-full .wpforms-form input[type="tel"],
        .slide-sidebar-wrapper div.wpforms-container.wpforms-container-full .wpforms-form input[type="date"],
        .slide-sidebar-wrapper div.wpforms-container.wpforms-container-full .wpforms-form input[type="month"],
        .slide-sidebar-wrapper div.wpforms-container.wpforms-container-full .wpforms-form input[type="week"],
        .slide-sidebar-wrapper div.wpforms-container.wpforms-container-full .wpforms-form input[type="time"],
        .slide-sidebar-wrapper div.wpforms-container.wpforms-container-full .wpforms-form input[type="datetime"],
        .slide-sidebar-wrapper div.wpforms-container.wpforms-container-full .wpforms-form input[type="datetime-local"],
        .slide-sidebar-wrapper div.wpforms-container.wpforms-container-full .wpforms-form input[type="color"],
        .slide-sidebar-wrapper div.wpforms-container.wpforms-container-full .wpforms-form select,
        .slide-sidebar-wrapper div.wpforms-container.wpforms-container-full .wpforms-form textarea,
        .slide-sidebar-wrapper .select2-container--default .select2-results__option.select2-results__option--highlighted[aria-selected], 
        .slide-sidebar-wrapper .select2-container--default .select2-results__option.select2-results__option--highlighted[data-selected] {
            color: ' . esc_attr($contrast_default_text_color) . ';
        }
        .slide-sidebar-wrapper input[type="radio"]:checked:before,
        .slide-sidebar-wrapper div.wpforms-container.wpforms-container-full .wpforms-form input[type="radio"]:checked:before {
            background-color: ' . esc_attr($contrast_default_text_color) . ';
        }
        .slide-sidebar-wrapper div.wpforms-container.wpforms-container-full .wpforms-form .wpforms-field-number-slider input[type="range"]::-webkit-slider-thumb {
            border-color: ' . esc_attr($contrast_default_text_color) . ';
        }
        .slide-sidebar-wrapper div.wpforms-container.wpforms-container-full .wpforms-form .wpforms-field-number-slider input[type="range"]::-moz-range-thumb {
            border-color: ' . esc_attr($contrast_default_text_color) . ';
        }
        .slide-sidebar-wrapper div.wpforms-container.wpforms-container-full .wpforms-form .wpforms-field-number-slider input[type="range"]::-ms-thumb {
            border-color: ' . esc_attr($contrast_default_text_color) . ';
        }
        .slide-sidebar-wrapper div.wpforms-container.wpforms-container-full .wpforms-form .wpforms-field-number-slider input[type="range"]:focus::-ms-thumb {
            border-color: ' . esc_attr($contrast_default_text_color) . ';
        }
        .slider-sidebar-wrapper input[type="text"]:focus::-webkit-input-placeholder,
        .slider-sidebar-wrapper input[type="email"]:focus::-webkit-input-placeholder,
        .slider-sidebar-wrapper input[type="url"]:focus::-webkit-input-placeholder,
        .slider-sidebar-wrapper input[type="password"]:focus::-webkit-input-placeholder,
        .slider-sidebar-wrapper input[type="search"]:focus::-webkit-input-placeholder,
        .slider-sidebar-wrapper input[type="tel"]:focus::-webkit-input-placeholder,
        .slider-sidebar-wrapper input[type="number"]:focus::-webkit-input-placeholder, 
        .slider-sidebar-wrapper input[type="date"]:focus::-webkit-input-placeholder, 
        .slider-sidebar-wrapper input[type="month"]:focus::-webkit-input-placeholder, 
        .slider-sidebar-wrapper input[type="week"]:focus::-webkit-input-placeholder, 
        .slider-sidebar-wrapper input[type="time"]:focus::-webkit-input-placeholder, 
        .slider-sidebar-wrapper input[type="datetime"]:focus::-webkit-input-placeholder, 
        .slider-sidebar-wrapper input[type="datetime-local"]:focus::-webkit-input-placeholder, 
        .slider-sidebar-wrapper textarea:focus::-webkit-input-placeholder,
        .slider-sidebar-wrapper div.wpforms-container.wpforms-container-full .wpforms-form input[type="text"]:focus::-webkit-input-placeholder, 
        .slider-sidebar-wrapper div.wpforms-container.wpforms-container-full .wpforms-form input[type="email"]:focus::-webkit-input-placeholder, 
        .slider-sidebar-wrapper div.wpforms-container.wpforms-container-full .wpforms-form input[type="url"]:focus::-webkit-input-placeholder, 
        .slider-sidebar-wrapper div.wpforms-container.wpforms-container-full .wpforms-form input[type="password"]:focus::-webkit-input-placeholder, 
        .slider-sidebar-wrapper div.wpforms-container.wpforms-container-full .wpforms-form input[type="search"]:focus::-webkit-input-placeholder, 
        .slider-sidebar-wrapper div.wpforms-container.wpforms-container-full .wpforms-form input[type="number"]:focus::-webkit-input-placeholder, 
        .slider-sidebar-wrapper div.wpforms-container.wpforms-container-full .wpforms-form input[type="tel"]:focus::-webkit-input-placeholder,
        .slider-sidebar-wrapper div.wpforms-container.wpforms-container-full .wpforms-form input[type="date"]:focus::-webkit-input-placeholder,
        .slider-sidebar-wrapper div.wpforms-container.wpforms-container-full .wpforms-form input[type="month"]:focus::-webkit-input-placeholder, 
        .slider-sidebar-wrapper div.wpforms-container.wpforms-container-full .wpforms-form input[type="week"]:focus::-webkit-input-placeholder, 
        .slider-sidebar-wrapper div.wpforms-container.wpforms-container-full .wpforms-form input[type="time"]:focus::-webkit-input-placeholder, 
        .slider-sidebar-wrapper div.wpforms-container.wpforms-container-full .wpforms-form input[type="datetime"]:focus::-webkit-input-placeholder, 
        .slider-sidebar-wrapper div.wpforms-container.wpforms-container-full .wpforms-form input[type="datetime-local"]:focus::-webkit-input-placeholder, 
        .slider-sidebar-wrapper div.wpforms-container.wpforms-container-full .wpforms-form textarea:focus::-webkit-input-placeholder {
             color: ' . esc_attr($contrast_default_text_color) . ';
        }
        
        .slider-sidebar-wrapper input[type="text"]:-moz-placeholder,
        .slider-sidebar-wrapper input[type="url"]:-moz-placeholder,
        .slider-sidebar-wrapper input[type="email"]:-moz-placeholder,
        .slider-sidebar-wrapper input[type="password"]:-moz-placeholder,
        .slider-sidebar-wrapper input[type="search"]:-moz-placeholder,
        .slider-sidebar-wrapper input[type="tel"]:-moz-placeholder,
        .slider-sidebar-wrapper input[type="number"]:-moz-placeholder, 
        .slider-sidebar-wrapper input[type="date"]:-moz-placeholder, 
        .slider-sidebar-wrapper input[type="month"]:-moz-placeholder, 
        .slider-sidebar-wrapper input[type="week"]:-moz-placeholder, 
        .slider-sidebar-wrapper input[type="time"]:-moz-placeholder, 
        .slider-sidebar-wrapper input[type="datetime"]:-moz-placeholder, 
        .slider-sidebar-wrapper input[type="datetime-local"]:-moz-placeholder, 
        .slider-sidebar-wrapper textarea:-moz-placeholder,
        .slider-sidebar-wrapper div.wpforms-container.wpforms-container-full .wpforms-form input[type="text"]:-moz-placeholder, 
        .slider-sidebar-wrapper div.wpforms-container.wpforms-container-full .wpforms-form input[type="email"]:-moz-placeholder, 
        .slider-sidebar-wrapper div.wpforms-container.wpforms-container-full .wpforms-form input[type="url"]:-moz-placeholder, 
        .slider-sidebar-wrapper div.wpforms-container.wpforms-container-full .wpforms-form input[type="password"]:-moz-placeholder, 
        .slider-sidebar-wrapper div.wpforms-container.wpforms-container-full .wpforms-form input[type="search"]:-moz-placeholder, 
        .slider-sidebar-wrapper div.wpforms-container.wpforms-container-full .wpforms-form input[type="number"]:-moz-placeholder, 
        .slider-sidebar-wrapper div.wpforms-container.wpforms-container-full .wpforms-form input[type="tel"]:-moz-placeholder,
        .slider-sidebar-wrapper div.wpforms-container.wpforms-container-full .wpforms-form input[type="date"]:-moz-placeholder,
        .slider-sidebar-wrapper div.wpforms-container.wpforms-container-full .wpforms-form input[type="month"]:-moz-placeholder, 
        .slider-sidebar-wrapper div.wpforms-container.wpforms-container-full .wpforms-form input[type="week"]:-moz-placeholder, 
        .slider-sidebar-wrapper div.wpforms-container.wpforms-container-full .wpforms-form input[type="time"]:-moz-placeholder, 
        .slider-sidebar-wrapper div.wpforms-container.wpforms-container-full .wpforms-form input[type="datetime"]:-moz-placeholder, 
        .slider-sidebar-wrapper div.wpforms-container.wpforms-container-full .wpforms-form input[type="datetime-local"]:-moz-placeholder, 
        .slider-sidebar-wrapper div.wpforms-container.wpforms-container-full .wpforms-form textarea:-moz-placeholder {
             color: ' . esc_attr($contrast_default_text_color) . ';
        }
        
        .slider-sidebar-wrapper input[type="text"]:focus::-moz-placeholder,
        .slider-sidebar-wrapper input[type="url"]:focus::-moz-placeholder,
        .slider-sidebar-wrapper input[type="email"]:focus::-moz-placeholder,
        .slider-sidebar-wrapper input[type="password"]:focus::-moz-placeholder,
        .slider-sidebar-wrapper input[type="search"]:focus::-moz-placeholder,
        .slider-sidebar-wrapper input[type="tel"]:focus::-moz-placeholder,
        .slider-sidebar-wrapper input[type="number"]:focus::-moz-placeholder, 
        .slider-sidebar-wrapper input[type="date"]:focus::-moz-placeholder, 
        .slider-sidebar-wrapper input[type="month"]:focus::-moz-placeholder, 
        .slider-sidebar-wrapper input[type="week"]:focus::-moz-placeholder, 
        .slider-sidebar-wrapper input[type="time"]:focus::-moz-placeholder, 
        .slider-sidebar-wrapper input[type="datetime"]:focus::-moz-placeholder, 
        .slider-sidebar-wrapper input[type="datetime-local"]:focus::-moz-placeholder, 
        .slider-sidebar-wrapper textarea:focus::-moz-placeholder,
        .slider-sidebar-wrapper div.wpforms-container.wpforms-container-full .wpforms-form input[type="text"]:focus::-moz-placeholder, 
        .slider-sidebar-wrapper div.wpforms-container.wpforms-container-full .wpforms-form input[type="email"]:focus::-moz-placeholder, 
        .slider-sidebar-wrapper div.wpforms-container.wpforms-container-full .wpforms-form input[type="url"]:focus::-moz-placeholder, 
        .slider-sidebar-wrapper div.wpforms-container.wpforms-container-full .wpforms-form input[type="password"]:focus::-moz-placeholder, 
        .slider-sidebar-wrapper div.wpforms-container.wpforms-container-full .wpforms-form input[type="search"]:focus::-moz-placeholder, 
        .slider-sidebar-wrapper div.wpforms-container.wpforms-container-full .wpforms-form input[type="number"]:focus::-moz-placeholder, 
        .slider-sidebar-wrapper div.wpforms-container.wpforms-container-full .wpforms-form input[type="tel"]:focus::-moz-placeholder,
        .slider-sidebar-wrapper div.wpforms-container.wpforms-container-full .wpforms-form input[type="date"]:focus::-moz-placeholder,
        .slider-sidebar-wrapper div.wpforms-container.wpforms-container-full .wpforms-form input[type="month"]:focus::-moz-placeholder, 
        .slider-sidebar-wrapper div.wpforms-container.wpforms-container-full .wpforms-form input[type="week"]:focus::-moz-placeholder, 
        .slider-sidebar-wrapper div.wpforms-container.wpforms-container-full .wpforms-form input[type="time"]:focus::-moz-placeholder, 
        .slider-sidebar-wrapper div.wpforms-container.wpforms-container-full .wpforms-form input[type="datetime"]:focus::-moz-placeholder, 
        .slider-sidebar-wrapper div.wpforms-container.wpforms-container-full .wpforms-form input[type="datetime-local"]:focus::-moz-placeholder, 
        .slider-sidebar-wrapper div.wpforms-container.wpforms-container-full .wpforms-form textarea:focus::-moz-placeholder {
             color: ' . esc_attr($contrast_default_text_color) . ';
        }
        
        .slider-sidebar-wrapper input[type="text"]:focus:-ms-input-placeholder,
        .slider-sidebar-wrapper input[type="email"]:focus:-ms-input-placeholder,
        .slider-sidebar-wrapper input[type="url"]:focus:-ms-input-placeholder,
        .slider-sidebar-wrapper input[type="password"]:focus:-ms-input-placeholder,
        .slider-sidebar-wrapper input[type="search"]:focus:-ms-input-placeholder,
        .slider-sidebar-wrapper input[type="tel"]:focus:-ms-input-placeholder,
        .slider-sidebar-wrapper input[type="number"]:focus:-ms-input-placeholder, 
        .slider-sidebar-wrapper input[type="date"]:focus:-ms-input-placeholder, 
        .slider-sidebar-wrapper input[type="month"]:focus:-ms-input-placeholder, 
        .slider-sidebar-wrapper input[type="week"]:focus:-ms-input-placeholder, 
        .slider-sidebar-wrapper input[type="time"]:focus:-ms-input-placeholder, 
        .slider-sidebar-wrapper input[type="datetime"]:focus:-ms-input-placeholder, 
        .slider-sidebar-wrapper input[type="datetime-local"]:focus:-ms-input-placeholder, 
        .slider-sidebar-wrapper textarea:focus:-ms-input-placeholder,
        .slider-sidebar-wrapper div.wpforms-container.wpforms-container-full .wpforms-form input[type="text"]:focus:-ms-input-placeholder, 
        .slider-sidebar-wrapper div.wpforms-container.wpforms-container-full .wpforms-form input[type="email"]:focus:-ms-input-placeholder, 
        .slider-sidebar-wrapper div.wpforms-container.wpforms-container-full .wpforms-form input[type="url"]:focus:-ms-input-placeholder, 
        .slider-sidebar-wrapper div.wpforms-container.wpforms-container-full .wpforms-form input[type="password"]:focus:-ms-input-placeholder, 
        .slider-sidebar-wrapper div.wpforms-container.wpforms-container-full .wpforms-form input[type="search"]:focus:-ms-input-placeholder, 
        .slider-sidebar-wrapper div.wpforms-container.wpforms-container-full .wpforms-form input[type="number"]:focus:-ms-input-placeholder, 
        .slider-sidebar-wrapper div.wpforms-container.wpforms-container-full .wpforms-form input[type="tel"]:focus:-ms-input-placeholder,
        .slider-sidebar-wrapper div.wpforms-container.wpforms-container-full .wpforms-form input[type="date"]:focus:-ms-input-placeholder,
        .slider-sidebar-wrapper div.wpforms-container.wpforms-container-full .wpforms-form input[type="month"]:focus:-ms-input-placeholder, 
        .slider-sidebar-wrapper div.wpforms-container.wpforms-container-full .wpforms-form input[type="week"]:focus:-ms-input-placeholder, 
        .slider-sidebar-wrapper div.wpforms-container.wpforms-container-full .wpforms-form input[type="time"]:focus:-ms-input-placeholder, 
        .slider-sidebar-wrapper div.wpforms-container.wpforms-container-full .wpforms-form input[type="datetime"]:focus:-ms-input-placeholder, 
        .slider-sidebar-wrapper div.wpforms-container.wpforms-container-full .wpforms-form input[type="datetime-local"]:focus:-ms-input-placeholder, 
        .slider-sidebar-wrapper div.wpforms-container.wpforms-container-full .wpforms-form textarea:focus:-ms-input-placeholder {
            color: ' . esc_attr($contrast_default_text_color) . ';
        }
    ';
}

$contrast_dark_text_color = aiero_get_prefered_option('contrast_dark_text_color');
if ( !empty($contrast_dark_text_color) ) {
    $aiero_custom_css .= '
        .slide-sidebar-wrapper {
            --wpforms-field-text-color: ' . esc_attr($contrast_dark_text_color) . ';
        }
        .slide-sidebar-wrapper a,
        .portfolio-item .post-title,        
        .aiero-price-item-widget .price-item.active .price-item-title,
        .aiero-price-item-widget .price-item.active .price-item-container,
        .aiero-price-item-widget .price-item.active .price-item-custom-fields,
        .aiero-price-item-widget .price-item.active .price-item-description,
        .aiero-price-item-widget .price-item.price-item-type-wide.active .price-item-title,
        .aiero-price-item-widget .price-item.price-item-type-wide.active .price-item-description,
        .header .main-menu ul.sub-menu > li > a,
        .widget_media_audio .mejs-container .mejs-button > button,
        .widget_media_audio .mejs-container .mejs-time,
        .widget_media_audio .mejs-container .mejs-duration,
        .mejs-audio.mejs-container .mejs-button > button,
        .mejs-audio.mejs-container .mejs-time,
        .mejs-audio.mejs-container .mejs-duration,
        .wp-video .mejs-container .mejs-button > button,
        .wp-video .mejs-container .mejs-time,
        .wp-video .mejs-container .mejs-duration,
        .slide-sidebar-wrapper .slide-sidebar-content h1, 
        .slide-sidebar-wrapper .slide-sidebar-content h2, 
        .slide-sidebar-wrapper .slide-sidebar-content h3, 
        .slide-sidebar-wrapper .slide-sidebar-content h4, 
        .slide-sidebar-wrapper .slide-sidebar-content h5, 
        .slide-sidebar-wrapper .slide-sidebar-content h6,
        .slide-sidebar-wrapper .widget_search .search-form .search-form-icon,
        .slide-sidebar-wrapper .widget_recent_entries ul li a,
        .slide-sidebar-wrapper .wp-block-latest-posts li a,
        .slide-sidebar-wrapper .widget_recent_comments ul .recentcomments,
        .slide-sidebar-wrapper .widget_recent_comments ul .recentcomments a,
        .slide-sidebar-wrapper .wp-block-latest-comments li a,
        .slide-sidebar-wrapper .widget_categories ul li:hover li,
        .slide-sidebar-wrapper .widget_calendar .wp-calendar-table:not(.has-text-color) caption, 
        .slide-sidebar-wrapper .wp-block-calendar .wp-calendar-table:not(.has-text-color) caption,
        .slide-sidebar-wrapper .widget_calendar .wp-calendar-table:not(.has-text-color) ~ .wp-calendar-nav a,
        .slide-sidebar-wrapper .wp-block-calendar .wp-calendar-table:not(.has-text-color) ~ .wp-calendar-nav a,
        .slide-sidebar-wrapper .widget_calendar .wp-calendar-table:not(.has-text-color) tbody td, 
        .slide-sidebar-wrapper .wp-block-calendar .wp-calendar-table:not(.has-text-color) tbody td,
        .slide-sidebar-wrapper .widget_calendar .wp-calendar-table:not(.has-text-color) tbody td a:hover, 
        .slide-sidebar-wrapper .wp-block-calendar .wp-calendar-table:not(.has-text-color) tbody td a:hover,
        .slide-sidebar-wrapper .widget_calendar .wp-calendar-table:not(.has-text-color) tbody td#today a, 
        .slide-sidebar-wrapper .wp-block-calendar .wp-calendar-table:not(.has-text-color) tbody td#today a,
        .slide-sidebar-wrapper .widget_rss cite,
        .slide-sidebar-wrapper .widget_rss ul a.rsswidget,
        .slide-sidebar-wrapper .wp-block-rss .wp-block-rss__item-title a,
        .slide-sidebar-wrapper .wp-block-rss .wp-block-rss__item-author,
        .slide-sidebar-wrapper .widget .widget-title a,
        .slide-sidebar-wrapper .widget_nav_menu ul li a, 
        .slide-sidebar-wrapper .widget_aiero_nav_menu_widget ul li a,        
        .slide-sidebar-wrapper .widget_pages .widget-wrapper > ul li > a,
        .slide-sidebar-wrapper .wp-block-page-list li a,
        .slide-sidebar-wrapper .widget_meta ul li > a,
        .slide-sidebar-wrapper .widget_categories ul li > a, 
        .slide-sidebar-wrapper ul.wp-block-categories li > a,
        .slide-sidebar-wrapper .widget_categories ul li .widget-archive-trigger,
        .slide-sidebar-wrapper .widget_archive ul li > a,
        .slide-sidebar-wrapper .wp-block-archives li > a,
        .slide-sidebar-wrapper .wp-block-search .wp-block-search__label,
        .slide-sidebar-wrapper .wp-block-search.wp-block-search__button-inside .wp-block-search__inside-wrapper .wp-block-search__button.has-icon,
        .slide-sidebar-wrapper .wp-block-loginout,
        .slide-sidebar-wrapper .wp-block-loginout a,
        .slide-sidebar-wrapper .sidebar-logo-container .logo-link,
        .slide-sidebar-wrapper .widget_nav_menu ul li .widget-menu-trigger, 
        .slide-sidebar-wrapper .widget_aiero_nav_menu_widget ul li .widget-menu-trigger,
        .slide-sidebar-wrapper .widget .wp-block-list li:before,
        .slide-sidebar-wrapper .widget .wp-block-list li:hover a,
        .slide-sidebar-wrapper .wp-block-file a.wp-block-file__button,
        .aiero-price-item-widget .price-item .price-item-label,
        .slide-sidebar-wrapper .wp-block-social-links.is-style-logos-only:not(.has-icon-color) .wp-block-social-link svg,
        .moving-list .moving-item .moving-item-title,
        .service-slider-listing .service-item-icon .service-item-icon-link,
        .service-slider-listing .service-item-link .service-item-subtitle,
        .case-study-listing-wrapper .case-study-item .post-title a,
        .case-study-classic-listing .classic-blog-item-wrapper .case-study-features,
        .alter-menu-wrapper .alter-menu-menu .main-menu li a,
        .alter-menu-wrapper .alter-menu-menu .main-menu > li .sub-menu-trigger,
        .project-listing-wrapper.text-position-inside .project-item-wrapper .post-title a,
        .project-listing-wrapper.text-position-inside .project-item-wrapper .project-item-content,
        .project-listing-wrapper.text-position-inside .project-item-wrapper .post-more-button a,
        .error-404-wrapper .error-404-button .aiero-button {
            color: ' . esc_attr($contrast_dark_text_color) . ';
        }
        
        .widget_media_audio .mejs-controls .mejs-horizontal-volume-slider .mejs-horizontal-volume-current, 
        .widget_media_audio .mejs-controls .mejs-time-rail .mejs-time-loaded,
        .mejs-audio .mejs-controls .mejs-horizontal-volume-slider .mejs-horizontal-volume-current, 
        .mejs-audio .mejs-controls .mejs-time-rail .mejs-time-loaded,
        .wp-video .mejs-overlay-play .mejs-overlay-button:before,
        .wp-video .mejs-controls .mejs-horizontal-volume-slider .mejs-horizontal-volume-current, 
        .wp-video .mejs-controls .mejs-time-rail .mejs-time-loaded,
        .wp-video .mejs-volume-current,
        .wp-video .mejs-volume-handle,
        .error-404-wrapper .error-404-button .aiero-button:hover {
            background-color: ' . esc_attr($contrast_dark_text_color) . ';
        }
        .widget_media_audio .mejs-controls .mejs-horizontal-volume-slider .mejs-horizontal-volume-total, 
        .widget_media_audio .mejs-controls .mejs-time-rail .mejs-time-total,
        .mejs-audio .mejs-controls .mejs-horizontal-volume-slider .mejs-horizontal-volume-total, 
        .mejs-audio .mejs-controls .mejs-time-rail .mejs-time-total,
        .wp-video .mejs-controls .mejs-horizontal-volume-slider .mejs-horizontal-volume-total, 
        .wp-video .mejs-controls .mejs-time-rail .mejs-time-total,
        .wp-video .mejs-volume-total {
            background-color: rgba(' . esc_attr(aiero_hex2rgb($contrast_dark_text_color)) . ', 0.4);
        }
        .wp-video .mejs-overlay-play .mejs-overlay-button .progress__circle,
        .wp-video .mejs-overlay-play .mejs-overlay-button .progress__path {
            stroke: ' . esc_attr($contrast_dark_text_color) . ';
        }
        .error-404-wrapper .error-404-button .aiero-button:hover {
            border-color: ' . esc_attr($contrast_dark_text_color) . ';
        }
    ';
}

$contrast_light_text_color = aiero_get_prefered_option('contrast_light_text_color');
if ( !empty($contrast_light_text_color) ) {
    $aiero_custom_css .= '
        .slide-sidebar-wrapper .input-floating-wrap .floating-placeholder,
        .slide-sidebar-wrapper .widget_recent_entries ul li .post-date,
        .slide-sidebar-wrapper .wp-block-latest-posts li .wp-block-latest-posts__post-date,
        .slide-sidebar-wrapper .widget_rss .rss-date,
        .slide-sidebar-wrapper .wp-block-rss .wp-block-rss__item-publish-date,
        .slide-sidebar-wrapper .wp-block-latest-comments li .wp-block-latest-comments__comment-meta,
        .slide-sidebar-wrapper .widget_nav_menu ul li a:hover, 
        .slide-sidebar-wrapper .widget_nav_menu ul li.current-menu-item > a, 
        .slide-sidebar-wrapper .widget_nav_menu ul li.current-menu-ancestor > a, 
        .slide-sidebar-wrapper .widget_nav_menu ul li.current-menu-parent > a, 
        .slide-sidebar-wrapper .widget_nav_menu ul li.current_page_item > a, 
        .slide-sidebar-wrapper .widget_aiero_nav_menu_widget ul li a:hover, 
        .slide-sidebar-wrapper .widget_aiero_nav_menu_widget ul li.current-menu-item > a,
        .slide-sidebar-wrapper .widget_aiero_nav_menu_widget ul li.current-menu-ancestor > a,
        .slide-sidebar-wrapper .widget_aiero_nav_menu_widget ul li.current-menu-parent > a, 
        .slide-sidebar-wrapper .widget_aiero_nav_menu_widget ul li.current_page_item > a,
        .slide-sidebar-wrapper .widget .wp-block-list li a {
             color: ' . esc_attr($contrast_light_text_color) . ';
        }

        .slide-sidebar-wrapper input[type="text"]::-webkit-input-placeholder,
        .slide-sidebar-wrapper input[type="email"]::-webkit-input-placeholder,
        .slide-sidebar-wrapper input[type="url"]::-webkit-input-placeholder,
        .slide-sidebar-wrapper input[type="password"]::-webkit-input-placeholder,
        .slide-sidebar-wrapper input[type="search"]::-webkit-input-placeholder,
        .slide-sidebar-wrapper input[type="tel"]::-webkit-input-placeholder,
        .slide-sidebar-wrapper input[type="number"]::-webkit-input-placeholder, 
        .slide-sidebar-wrapper input[type="date"]::-webkit-input-placeholder, 
        .slide-sidebar-wrapper input[type="month"]::-webkit-input-placeholder, 
        .slide-sidebar-wrapper input[type="week"]::-webkit-input-placeholder, 
        .slide-sidebar-wrapper input[type="time"]::-webkit-input-placeholder, 
        .slide-sidebar-wrapper input[type="datetime"]::-webkit-input-placeholder, 
        .slide-sidebar-wrapper input[type="datetime-local"]::-webkit-input-placeholder, 
        .slide-sidebar-wrapper textarea::-webkit-input-placeholder,
        .slide-sidebar-wrapper div.wpforms-container.wpforms-container-full .wpforms-form input[type="text"]::-webkit-input-placeholder,
        .slide-sidebar-wrapper div.wpforms-container.wpforms-container-full .wpforms-form input[type="email"]::-webkit-input-placeholder,
        .slide-sidebar-wrapper div.wpforms-container.wpforms-container-full .wpforms-form input[type="url"]::-webkit-input-placeholder,
        .slide-sidebar-wrapper div.wpforms-container.wpforms-container-full .wpforms-form input[type="password"]::-webkit-input-placeholder,
        .slide-sidebar-wrapper div.wpforms-container.wpforms-container-full .wpforms-form input[type="search"]::-webkit-input-placeholder,
        .slide-sidebar-wrapper div.wpforms-container.wpforms-container-full .wpforms-form input[type="number"]::-webkit-input-placeholder,
        .slide-sidebar-wrapper div.wpforms-container.wpforms-container-full .wpforms-form input[type="tel"]::-webkit-input-placeholder,
        .slide-sidebar-wrapper div.wpforms-container.wpforms-container-full .wpforms-form input[type="date"]::-webkit-input-placeholder,
        .slide-sidebar-wrapper div.wpforms-container.wpforms-container-full .wpforms-form input[type="month"]::-webkit-input-placeholder,
        .slide-sidebar-wrapper div.wpforms-container.wpforms-container-full .wpforms-form input[type="week"]::-webkit-input-placeholder,
        .slide-sidebar-wrapper div.wpforms-container.wpforms-container-full .wpforms-form input[type="time"]::-webkit-input-placeholder,
        .slide-sidebar-wrapper div.wpforms-container.wpforms-container-full .wpforms-form input[type="datetime"]::-webkit-input-placeholder,
        .slide-sidebar-wrapper div.wpforms-container.wpforms-container-full .wpforms-form input[type="datetime-local"]::-webkit-input-placeholder,
        .slide-sidebar-wrapper div.wpforms-container.wpforms-container-full .wpforms-form textarea::-webkit-input-placeholder {
            color: ' . esc_attr($contrast_light_text_color) . ';
        }
        
        .slide-sidebar-wrapper input[type="text"]:-moz-placeholder,
        .slide-sidebar-wrapper input[type="url"]:-moz-placeholder,
        .slide-sidebar-wrapper input[type="email"]:-moz-placeholder,
        .slide-sidebar-wrapper input[type="password"]:-moz-placeholder,
        .slide-sidebar-wrapper input[type="search"]:-moz-placeholder,
        .slide-sidebar-wrapper input[type="tel"]:-moz-placeholder, 
        .slide-sidebar-wrapper input[type="number"]:-moz-placeholder, 
        .slide-sidebar-wrapper input[type="date"]:-moz-placeholder, 
        .slide-sidebar-wrapper input[type="month"]:-moz-placeholder, 
        .slide-sidebar-wrapper input[type="week"]:-moz-placeholder, 
        .slide-sidebar-wrapper input[type="time"]:-moz-placeholder, 
        .slide-sidebar-wrapper input[type="datetime"]:-moz-placeholder, 
        .slide-sidebar-wrapper input[type="datetime-local"]:-moz-placeholder, 
        .slide-sidebar-wrapper textarea:-moz-placeholder,
        .slide-sidebar-wrapper div.wpforms-container.wpforms-container-full .wpforms-form input[type="text"]:-moz-placeholder,
        .slide-sidebar-wrapper div.wpforms-container.wpforms-container-full .wpforms-form input[type="email"]:-moz-placeholder,
        .slide-sidebar-wrapper div.wpforms-container.wpforms-container-full .wpforms-form input[type="url"]:-moz-placeholder,
        .slide-sidebar-wrapper div.wpforms-container.wpforms-container-full .wpforms-form input[type="password"]:-moz-placeholder,
        .slide-sidebar-wrapper div.wpforms-container.wpforms-container-full .wpforms-form input[type="search"]:-moz-placeholder,
        .slide-sidebar-wrapper div.wpforms-container.wpforms-container-full .wpforms-form input[type="number"]:-moz-placeholder,
        .slide-sidebar-wrapper div.wpforms-container.wpforms-container-full .wpforms-form input[type="tel"]:-moz-placeholder,
        .slide-sidebar-wrapper div.wpforms-container.wpforms-container-full .wpforms-form input[type="date"]:-moz-placeholder,
        .slide-sidebar-wrapper div.wpforms-container.wpforms-container-full .wpforms-form input[type="month"]:-moz-placeholder,
        .slide-sidebar-wrapper div.wpforms-container.wpforms-container-full .wpforms-form input[type="week"]:-moz-placeholder,
        .slide-sidebar-wrapper div.wpforms-container.wpforms-container-full .wpforms-form input[type="time"]:-moz-placeholder,
        .slide-sidebar-wrapper div.wpforms-container.wpforms-container-full .wpforms-form input[type="datetime"]:-moz-placeholder,
        .slide-sidebar-wrapper div.wpforms-container.wpforms-container-full .wpforms-form input[type="datetime-local"]:-moz-placeholder,
        .slide-sidebar-wrapper div.wpforms-container.wpforms-container-full .wpforms-form textarea:-moz-placeholder {
             color: ' . esc_attr($contrast_light_text_color) . ';
        }
        
        .slide-sidebar-wrapper input[type="text"]::-moz-placeholder,
        .slide-sidebar-wrapper input[type="url"]::-moz-placeholder,
        .slide-sidebar-wrapper input[type="email"]::-moz-placeholder,
        .slide-sidebar-wrapper input[type="password"]::-moz-placeholder,
        .slide-sidebar-wrapper input[type="search"]::-moz-placeholder,
        .slide-sidebar-wrapper input[type="tel"]::-moz-placeholder, 
        .slide-sidebar-wrapper input[type="number"]::-moz-placeholder, 
        .slide-sidebar-wrapper input[type="date"]::-moz-placeholder, 
        .slide-sidebar-wrapper input[type="month"]::-moz-placeholder, 
        .slide-sidebar-wrapper input[type="week"]::-moz-placeholder, 
        .slide-sidebar-wrapper input[type="time"]::-moz-placeholder, 
        .slide-sidebar-wrapper input[type="datetime"]::-moz-placeholder, 
        .slide-sidebar-wrapper input[type="datetime-local"]::-moz-placeholder, 
        .slide-sidebar-wrapper textarea::-moz-placeholder,
        .slide-sidebar-wrapper div.wpforms-container.wpforms-container-full .wpforms-form input[type="text"]::-moz-placeholder,
        .slide-sidebar-wrapper div.wpforms-container.wpforms-container-full .wpforms-form input[type="email"]::-moz-placeholder,
        .slide-sidebar-wrapper div.wpforms-container.wpforms-container-full .wpforms-form input[type="url"]::-moz-placeholder,
        .slide-sidebar-wrapper div.wpforms-container.wpforms-container-full .wpforms-form input[type="password"]::-moz-placeholder,
        .slide-sidebar-wrapper div.wpforms-container.wpforms-container-full .wpforms-form input[type="search"]::-moz-placeholder,
        .slide-sidebar-wrapper div.wpforms-container.wpforms-container-full .wpforms-form input[type="number"]::-moz-placeholder,
        .slide-sidebar-wrapper div.wpforms-container.wpforms-container-full .wpforms-form input[type="tel"]::-moz-placeholder,
        .slide-sidebar-wrapper div.wpforms-container.wpforms-container-full .wpforms-form input[type="date"]::-moz-placeholder,
        .slide-sidebar-wrapper div.wpforms-container.wpforms-container-full .wpforms-form input[type="month"]::-moz-placeholder,
        .slide-sidebar-wrapper div.wpforms-container.wpforms-container-full .wpforms-form input[type="week"]::-moz-placeholder,
        .slide-sidebar-wrapper div.wpforms-container.wpforms-container-full .wpforms-form input[type="time"]::-moz-placeholder,
        .slide-sidebar-wrapper div.wpforms-container.wpforms-container-full .wpforms-form input[type="datetime"]::-moz-placeholder,
        .slide-sidebar-wrapper div.wpforms-container.wpforms-container-full .wpforms-form input[type="datetime-local"]::-moz-placeholder,
        .slide-sidebar-wrapper div.wpforms-container.wpforms-container-full .wpforms-form textarea::-moz-placeholder {
             color: ' . esc_attr($contrast_light_text_color) . ';
        }
        
        .slide-sidebar-wrapper input[type="text"]:-ms-input-placeholder,
        .slide-sidebar-wrapper input[type="email"]:-ms-input-placeholder,
        .slide-sidebar-wrapper input[type="url"]:-ms-input-placeholder,
        .slide-sidebar-wrapper input[type="password"]:-ms-input-placeholder,
        .slide-sidebar-wrapper input[type="search"]:-ms-input-placeholder,
        .slide-sidebar-wrapper input[type="tel"]:-ms-input-placeholder, 
        .slide-sidebar-wrapper input[type="number"]:-ms-input-placeholder, 
        .slide-sidebar-wrapper input[type="date"]:-ms-input-placeholder, 
        .slide-sidebar-wrapper input[type="month"]:-ms-input-placeholder, 
        .slide-sidebar-wrapper input[type="week"]:-ms-input-placeholder, 
        .slide-sidebar-wrapper input[type="time"]:-ms-input-placeholder, 
        .slide-sidebar-wrapper input[type="datetime"]:-ms-input-placeholder, 
        .slide-sidebar-wrapper input[type="datetime-local"]:-ms-input-placeholder, 
        .slide-sidebar-wrapper textarea:-ms-input-placeholder,
        .slide-sidebar-wrapper div.wpforms-container.wpforms-container-full .wpforms-form input[type="text"]:-ms-input-placeholder,
        .slide-sidebar-wrapper div.wpforms-container.wpforms-container-full .wpforms-form input[type="email"]:-ms-input-placeholder,
        .slide-sidebar-wrapper div.wpforms-container.wpforms-container-full .wpforms-form input[type="url"]:-ms-input-placeholder,
        .slide-sidebar-wrapper div.wpforms-container.wpforms-container-full .wpforms-form input[type="password"]:-ms-input-placeholder,
        .slide-sidebar-wrapper div.wpforms-container.wpforms-container-full .wpforms-form input[type="search"]:-ms-input-placeholder,
        .slide-sidebar-wrapper div.wpforms-container.wpforms-container-full .wpforms-form input[type="number"]:-ms-input-placeholder,
        .slide-sidebar-wrapper div.wpforms-container.wpforms-container-full .wpforms-form input[type="tel"]:-ms-input-placeholder,
        .slide-sidebar-wrapper div.wpforms-container.wpforms-container-full .wpforms-form input[type="date"]:-ms-input-placeholder,
        .slide-sidebar-wrapper div.wpforms-container.wpforms-container-full .wpforms-form input[type="month"]:-ms-input-placeholder,
        .slide-sidebar-wrapper div.wpforms-container.wpforms-container-full .wpforms-form input[type="week"]:-ms-input-placeholder,
        .slide-sidebar-wrapper div.wpforms-container.wpforms-container-full .wpforms-form input[type="time"]:-ms-input-placeholder,
        .slide-sidebar-wrapper div.wpforms-container.wpforms-container-full .wpforms-form input[type="datetime"]:-ms-input-placeholder,
        .slide-sidebar-wrapper div.wpforms-container.wpforms-container-full .wpforms-form input[type="datetime-local"]:-ms-input-placeholder,
        .slide-sidebar-wrapper div.wpforms-container.wpforms-container-full .wpforms-form textarea:-ms-input-placeholder {
            color: ' . esc_attr($contrast_light_text_color) . ';
        }
    ';
}

$contrast_accent_text_color = aiero_get_prefered_option('contrast_accent_text_color');
if ( !empty($contrast_accent_text_color) ) {
    $aiero_custom_css .= '
        .slide-sidebar-wrapper a:hover,
        .header .main-menu ul.sub-menu > li > a:hover,
        .header .main-menu ul.sub-menu > li.current-menu-ancestor > a,
        .header .main-menu ul.sub-menu > li.current-menu-parent > a,
        .header .main-menu ul.sub-menu > li.current-menu-item > a,
        .widget_media_audio .mejs-container .mejs-button > button:hover,
        .mejs-audio.mejs-container .mejs-button > button:hover,
        .wp-video .mejs-container .mejs-button > button:hover,
        .slide-sidebar-wrapper .widget_search .search-form .search-form-icon:hover,
        .slide-sidebar-wrapper .widget_calendar .wp-calendar-table:not(.has-text-color) thead th, 
        .slide-sidebar-wrapper .wp-block-calendar .wp-calendar-table:not(.has-text-color) thead th,
        .slide-sidebar-wrapper .widget_calendar .wp-calendar-table:not(.has-text-color) ~ .wp-calendar-nav a:hover,
        .slide-sidebar-wrapper .wp-block-calendar .wp-calendar-table:not(.has-text-color) ~ .wp-calendar-nav a:hover,
        .slide-sidebar-wrapper .widget_calendar .wp-calendar-table:not(.has-text-color) tbody td a, 
        .slide-sidebar-wrapper .wp-block-calendar .wp-calendar-table:not(.has-text-color) tbody td a,
        .slide-sidebar-wrapper .widget_rss ul a.rsswidget:hover,
        .slide-sidebar-wrapper .wp-block-rss .wp-block-rss__item-title a:hover,
        .slide-sidebar-wrapper .widget .widget-title a:hover,
        .aiero-content-slider-widget .bottom-area .contacts .contact-item a:hover,
        .aiero-content-slider-widget .bottom-area .contacts .contact-item:before,
        .slide-sidebar-wrapper .wp-block-search.wp-block-search__button-inside .wp-block-search__inside-wrapper .wp-block-search__button.has-icon:hover,
        .slide-sidebar-wrapper .wp-block-loginout a:hover,        
        .slide-sidebar-wrapper .wrapper-socials a:hover,
        .slide-sidebar-wrapper .wp-block-search.wp-block-search__icon-button .wp-block-search__button.has-icon:hover,
        .team-item .team-item-socials .wrapper-socials a:hover,
        .single-team .team-socials.wrapper-socials a:hover,
        .slide-sidebar-wrapper .wp-block-social-links.is-style-logos-only:not(.has-icon-color) .wp-block-social-link a:hover svg,
        .case-study-listing-wrapper .case-study-item .post-meta-item-tags a:hover,
        .alter-menu-wrapper .alter-menu-menu .main-menu li > a:hover,
        .alter-menu-wrapper .alter-menu-menu .main-menu li.current-menu-ancestor > a,
        .alter-menu-wrapper .alter-menu-menu .main-menu li.current-menu-parent > a,
        .alter-menu-wrapper .alter-menu-menu .main-menu li.current-menu-item > a {
            color: ' . esc_attr($contrast_accent_text_color) . ';
        }
        .slide-sidebar-wrapper .slide-sidebar-gradient:after,
        .widget_media_audio .mejs-controls .mejs-time-rail .mejs-time-current,
        .mejs-audio .mejs-controls .mejs-time-rail .mejs-time-current,
        .wp-video .mejs-controls .mejs-time-rail .mejs-time-current,
        .widget_media_audio .mejs-controls .mejs-time-rail .mejs-time-handle-content,
        .mejs-audio .mejs-controls .mejs-time-rail .mejs-time-handle-content,
        .wp-video .mejs-controls .mejs-time-rail .mejs-time-handle-content,
        .slide-sidebar-wrapper .widget_calendar .wp-calendar-table:not(.has-text-color) tbody td#today:before, 
        .slide-sidebar-wrapper .wp-block-calendar .wp-calendar-table:not(.has-text-color) tbody td#today:before,
        .service-slider-listing .service-item-icon .service-item-icon-link:hover,
        .alter-menu-wrapper .alter-menu-decorate:before {
            background-color: ' . esc_attr($contrast_accent_text_color) . ';
        }
        .widget_media_audio .mejs-controls .mejs-time-rail .mejs-time-handle-content,
        .mejs-audio .mejs-controls .mejs-time-rail .mejs-time-handle-content,
        .wp-video .mejs-controls .mejs-time-rail .mejs-time-handle-content {
            border-color: ' . esc_attr($contrast_accent_text_color) . ';
        }
        .widget_media_audio .mejs-controls .mejs-time-rail .mejs-time-hovered,
        .mejs-audio .mejs-controls .mejs-time-rail .mejs-time-hovered,
        .wp-video .mejs-controls .mejs-time-rail .mejs-time-hovered {
             background-color: rgba(' . esc_attr(aiero_hex2rgb($contrast_accent_text_color)) . ', 0.4);
        }        
    ';
}

$contrast_input_dark_color = aiero_get_prefered_option('contrast_input_dark_color');
if ( !empty($contrast_input_dark_color) ) {
    $aiero_custom_css .= '
        .slider-sidebar-wrapper input[type="radio"],
        .slider-sidebar-wrapper div.wpforms-container.wpforms-container-full .wpforms-form input[type="radio"],
        .slider-sidebar-wrapper input[type="checkbox"],
        .slider-sidebar-wrapper div.wpforms-container.wpforms-container-full .wpforms-form input[type="checkbox"],
        .slider-sidebar-wrapper div.wpforms-container.wpforms-container-full .wpforms-form .wpforms-field-number-slider input[type="range"] {
            background-color: ' . esc_attr($contrast_input_dark_color) . ';
        }
    ';
}

$contrast_border_color = aiero_get_prefered_option('contrast_border_color');
if ( !empty($contrast_border_color) ) {
    $aiero_custom_css .= '
        .slide-sidebar-wrapper {
            --wpforms-field-border-color: ' . esc_attr($contrast_border_color) . ';
        }
        .slide-sidebar-wrapper input[type="text"],
        .slide-sidebar-wrapper input[type="email"],
        .slide-sidebar-wrapper input[type="url"],
        .slide-sidebar-wrapper input[type="password"],
        .slide-sidebar-wrapper input[type="search"],
        .slide-sidebar-wrapper input[type="number"],
        .slide-sidebar-wrapper input[type="tel"],
        .slide-sidebar-wrapper input[type="range"],
        .slide-sidebar-wrapper input[type="date"],
        .slide-sidebar-wrapper input[type="month"],
        .slide-sidebar-wrapper input[type="week"],
        .slide-sidebar-wrapper input[type="time"],
        .slide-sidebar-wrapper input[type="datetime"],
        .slide-sidebar-wrapper input[type="datetime-local"],
        .slide-sidebar-wrapper input[type="color"],
        .slide-sidebar-wrapper textarea,        
        .slide-sidebar-wrapper .select2-container .select2-selection--single,
        .slide-sidebar-wrapper div.wpforms-container.wpforms-container-full .wpforms-form input[type="text"],
        .slide-sidebar-wrapper div.wpforms-container.wpforms-container-full .wpforms-form input[type="email"],
        .slide-sidebar-wrapper div.wpforms-container.wpforms-container-full .wpforms-form input[type="url"],
        .slide-sidebar-wrapper div.wpforms-container.wpforms-container-full .wpforms-form input[type="password"],
        .slide-sidebar-wrapper div.wpforms-container.wpforms-container-full .wpforms-form input[type="search"],
        .slide-sidebar-wrapper div.wpforms-container.wpforms-container-full .wpforms-form input[type="number"],
        .slide-sidebar-wrapper div.wpforms-container.wpforms-container-full .wpforms-form input[type="tel"],
        .slide-sidebar-wrapper div.wpforms-container.wpforms-container-full .wpforms-form input[type="date"],
        .slide-sidebar-wrapper div.wpforms-container.wpforms-container-full .wpforms-form input[type="month"],
        .slide-sidebar-wrapper div.wpforms-container.wpforms-container-full .wpforms-form input[type="week"],
        .slide-sidebar-wrapper div.wpforms-container.wpforms-container-full .wpforms-form input[type="time"],
        .slide-sidebar-wrapper div.wpforms-container.wpforms-container-full .wpforms-form input[type="datetime"],
        .slide-sidebar-wrapper div.wpforms-container.wpforms-container-full .wpforms-form input[type="datetime-local"],
        .slide-sidebar-wrapper div.wpforms-container.wpforms-container-full .wpforms-form input[type="color"],
        .slide-sidebar-wrapper div.wpforms-container.wpforms-container-full .wpforms-form select,
        .slide-sidebar-wrapper div.wpforms-container.wpforms-container-full .wpforms-form textarea,
        .slide-sidebar-wrapper .wp-block-search.wp-block-search__button-inside .wp-block-search__inside-wrapper,
        .slide-sidebar-wrapper .select-wrap,
        .project-listing-wrapper.owl-carousel.project-slider-listing .project-item,
        .slide-sidebar-wrapper .mc4wp-form .mc4wp-form-fields .form-field {
            border-color: ' . esc_attr($contrast_border_color) . ';
        }
        .slider-sidebar-wrapper div.wpforms-container-full .wpforms-form ul.wpforms-image-choices-classic label:not(.wpforms-error) {
            border-color: ' . esc_attr($contrast_border_color) . ' !important;
        }
    ';
}

$contrast_border_hover_color = aiero_get_prefered_option('contrast_border_hover_color');
if ( !empty($contrast_border_hover_color) ) {
    $aiero_custom_css .= '
        .slide-sidebar-wrapper input[type="text"]:focus,
        .slide-sidebar-wrapper input[type="email"]:focus,
        .slide-sidebar-wrapper input[type="url"]:focus,
        .slide-sidebar-wrapper input[type="password"]:focus,
        .slide-sidebar-wrapper input[type="search"]:focus,
        .slide-sidebar-wrapper input[type="number"]:focus,
        .slide-sidebar-wrapper input[type="tel"]:focus,
        .slide-sidebar-wrapper input[type="range"]:focus,
        .slide-sidebar-wrapper input[type="date"]:focus,
        .slide-sidebar-wrapper input[type="month"]:focus,
        .slide-sidebar-wrapper input[type="week"]:focus,
        .slide-sidebar-wrapper input[type="time"]:focus,
        .slide-sidebar-wrapper input[type="datetime"]:focus,
        .slide-sidebar-wrapper input[type="datetime-local"]:focus,
        .slide-sidebar-wrapper input[type="color"]:focus,
        .slide-sidebar-wrapper textarea:focus,
        .slide-sidebar-wrapper div.wpforms-container.wpforms-container-full .wpforms-form input[type="text"]:focus,
        .slide-sidebar-wrapper div.wpforms-container.wpforms-container-full .wpforms-form input[type="email"]:focus,
        .slide-sidebar-wrapper div.wpforms-container.wpforms-container-full .wpforms-form input[type="url"]:focus,
        .slide-sidebar-wrapper div.wpforms-container.wpforms-container-full .wpforms-form input[type="password"]:focus,
        .slide-sidebar-wrapper div.wpforms-container.wpforms-container-full .wpforms-form input[type="search"]:focus,
        .slide-sidebar-wrapper div.wpforms-container.wpforms-container-full .wpforms-form input[type="number"]:focus,
        .slide-sidebar-wrapper div.wpforms-container.wpforms-container-full .wpforms-form input[type="tel"]:focus,
        .slide-sidebar-wrapper div.wpforms-container.wpforms-container-full .wpforms-form input[type="date"]:focus,
        .slide-sidebar-wrapper div.wpforms-container.wpforms-container-full .wpforms-form input[type="month"]:focus,
        .slide-sidebar-wrapper div.wpforms-container.wpforms-container-full .wpforms-form input[type="week"]:focus,
        .slide-sidebar-wrapper div.wpforms-container.wpforms-container-full .wpforms-form input[type="time"]:focus,
        .slide-sidebar-wrapper div.wpforms-container.wpforms-container-full .wpforms-form input[type="datetime"]:focus,
        .slide-sidebar-wrapper div.wpforms-container.wpforms-container-full .wpforms-form input[type="datetime-local"]:focus,
        .slide-sidebar-wrapper div.wpforms-container.wpforms-container-full .wpforms-form input[type="color"]:focus,
        .slide-sidebar-wrapper div.wpforms-container.wpforms-container-full .wpforms-form select:focus,
        .slide-sidebar-wrapper div.wpforms-container.wpforms-container-full .wpforms-form textarea:focus,
        .slide-sidebar-wrapper .wp-block-search.wp-block-search__button-inside .wp-block-search__inside-wrapper:focus-within,
        .slide-sidebar-wrapper .select-wrap:focus-within,
        .slide-sidebar-wrapper .mc4wp-form .mc4wp-form-fields .form-field:focus-within {
            border-color: ' . esc_attr($contrast_border_hover_color) . ';
        }
        .slide-sidebar-wrapper .widget_media_audio .mejs-container, 
        .slide-sidebar-wrapper .widget_media_audio .mejs-container .mejs-controls, 
        .slide-sidebar-wrapper .widget_media_audio .mejs-embed, 
        .slide-sidebar-wrapper .widget_media_audio .mejs-embed body,
        .slide-sidebar-wrapper .wp-video .mejs-container, 
        .slide-sidebar-wrapper .wp-video .mejs-container .mejs-controls, 
        .slide-sidebar-wrapper .wp-video .mejs-embed, 
        .slide-sidebar-wrapper .wp-video .mejs-embed body,
        .slide-sidebar-wrapper .mejs-volume-button > .mejs-volume-slider {
            background-color: ' . esc_attr($contrast_border_hover_color) . ';
        }
        .slide-sidebar-wrapper .select2-container .select2-selection--single {
            color: ' . esc_attr($contrast_border_hover_color) . ';
        }
    ';
}

$contrast_background_color = aiero_get_prefered_option('contrast_background_color');
if ( !empty($contrast_background_color) ) {
    $aiero_custom_css .= '
        .header .main-menu > li ul.sub-menu,
        .content-wrapper .widget_media_audio .mejs-container, 
        .content-wrapper .widget_media_audio .mejs-container .mejs-controls, 
        .content-wrapper .widget_media_audio .mejs-embed, 
        .content-wrapper .widget_media_audio .mejs-embed body,
        .content-wrapper .mejs-audio.mejs-container, 
        .content-wrapper .mejs-audio.mejs-container .mejs-controls, 
        .content-wrapper .mejs-audio .mejs-embed, 
        .content-wrapper .mejs-audio .mejs-embed body,
        .content-wrapper .wp-video .mejs-container, 
        .content-wrapper .wp-video .mejs-container .mejs-controls, 
        .content-wrapper .wp-video .mejs-embed, 
        .content-wrapper .wp-video .mejs-embed body,
        .content-wrapper .mejs-volume-button > .mejs-volume-slider,
        .slide-sidebar-wrapper,
        .body-overlay,        
        .aiero-price-item-widget .price-item.active,
        .aiero-price-item-widget .price-item .price-item-label,
        .aiero-price-item-widget.aiero-price-item-style-alt .price-item-image-block,
        .moving-list .moving-item .moving-item-inner,
        .service-slider-listing .service-item-icon .service-item-icon-link,
        .case-study-side-info,
        .case-study-listing-wrapper .case-study-item,
        .cursor_drag .cursor-bg,
        .alter-menu-wrapper .alter-menu-bg,
        .alter-menu-wrapper:before,
        .slide-sidebar-wrapper .input-floating-wrap .floating-placeholder,
        .slide-sidebar-wrapper input[type="text"],
        .slide-sidebar-wrapper input[type="email"],
        .slide-sidebar-wrapper input[type="url"],
        .slide-sidebar-wrapper input[type="password"],
        .slide-sidebar-wrapper input[type="search"],
        .slide-sidebar-wrapper input[type="number"],
        .slide-sidebar-wrapper input[type="tel"],
        .slide-sidebar-wrapper input[type="range"],
        .slide-sidebar-wrapper input[type="date"],
        .slide-sidebar-wrapper input[type="month"],
        .slide-sidebar-wrapper input[type="week"],
        .slide-sidebar-wrapper input[type="time"],
        .slide-sidebar-wrapper input[type="datetime"],
        .slide-sidebar-wrapper input[type="datetime-local"],
        .slide-sidebar-wrapper input[type="color"],
        .slide-sidebar-wrapper .select-wrap,
        .slide-sidebar-wrapper .select2-container .select2-selection--single,
        .slide-sidebar-wrapper textarea,
        .slide-sidebar-wrapper div.wpforms-container.wpforms-container-full .wpforms-form input[type="text"],
        .slide-sidebar-wrapper div.wpforms-container.wpforms-container-full .wpforms-form input[type="email"],
        .slide-sidebar-wrapper div.wpforms-container.wpforms-container-full .wpforms-form input[type="url"],
        .slide-sidebar-wrapper div.wpforms-container.wpforms-container-full .wpforms-form input[type="password"],
        .slide-sidebar-wrapper div.wpforms-container.wpforms-container-full .wpforms-form input[type="search"],
        .slide-sidebar-wrapper div.wpforms-container.wpforms-container-full .wpforms-form input[type="number"],
        .slide-sidebar-wrapper div.wpforms-container.wpforms-container-full .wpforms-form input[type="tel"],
        .slide-sidebar-wrapper div.wpforms-container.wpforms-container-full .wpforms-form input[type="date"],
        .slide-sidebar-wrapper div.wpforms-container.wpforms-container-full .wpforms-form input[type="month"],
        .slide-sidebar-wrapper div.wpforms-container.wpforms-container-full .wpforms-form input[type="week"],
        .slide-sidebar-wrapper div.wpforms-container.wpforms-container-full .wpforms-form input[type="time"],
        .slide-sidebar-wrapper div.wpforms-container.wpforms-container-full .wpforms-form input[type="datetime"],
        .slide-sidebar-wrapper div.wpforms-container.wpforms-container-full .wpforms-form input[type="datetime-local"],
        .slide-sidebar-wrapper div.wpforms-container.wpforms-container-full .wpforms-form input[type="color"],
        .slide-sidebar-wrapper div.wpforms-container.wpforms-container-full .wpforms-form select,
        .slide-sidebar-wrapper div.wpforms-container.wpforms-container-full .wpforms-form textarea {
            background-color: ' . esc_attr($contrast_background_color) . ';
        }
        .slide-sidebar-wrapper div.wpforms-container.wpforms-container-full .wpforms-form .wpforms-field-number-slider input[type="range"]::-webkit-slider-thumb {
            background-color: ' . esc_attr($contrast_background_color) . ';
        }
        .slide-sidebar-wrapper div.wpforms-container.wpforms-container-full .wpforms-form .wpforms-field-number-slider input[type="range"]::-moz-range-thumb {
             background-color: ' . esc_attr($contrast_background_color) . ';
        }
        .slide-sidebar-wrapper div.wpforms-container.wpforms-container-full .wpforms-form .wpforms-field-number-slider input[type="range"]::-ms-thumb {
             background-color: ' . esc_attr($contrast_background_color) . ';
        }
        .slide-sidebar-wrapper div.wpforms-container.wpforms-container-full .wpforms-form .wpforms-field-number-slider input[type="range"]:focus::-ms-thumb {
             background-color: ' . esc_attr($contrast_background_color) . ';
        }        
        .aiero-content-slider-widget .bottom-area .content-slider-contacts {
            background-color: rgba(' . esc_attr(aiero_hex2rgb($contrast_background_color)) . ', 0.75);
        }
        .aiero-price-item-widget .price-item .price-item-label-wrapper:before, 
        .aiero-price-item-widget .price-item .price-item-label-wrapper:after {
            box-shadow: 0 -20px 0 0 ' . esc_attr($contrast_background_color) . '
        }
    ';
}

$contrast_background_alter_color = aiero_get_prefered_option('contrast_background_alter_color');
if ( !empty($contrast_background_alter_color) ) {
    $aiero_custom_css .= '        
        .slide-sidebar-wrapper .wp-block-calendar,
        .slide-sidebar-wrapper .calendar_wrap,
        .post-categories a.post-category-item:hover,        
        .single-post .post-meta-footer .post-meta-item.post-meta-item-tags a:hover,
        .post-comment-buttons a.comment-reply-link,
        .post-comment-buttons a.comment-edit-link:hover,        
        .widget_tag_cloud .tagcloud .tag-cloud-link:hover,
        .wp-block-tag-cloud .tag-cloud-link:hover,
        .slide-sidebar-wrapper .widget_tag_cloud .tagcloud .tag-cloud-link,
        .slide-sidebar-wrapper .wp-block-tag-cloud .tag-cloud-link,
        .content-wrapper .calendar_wrap, 
        .content-wrapper .wp-block-calendar,
        .team-item .socials-trigger-wrapper .socials-trigger,        
        .team-item .team-item-socials .wrapper-socials,
        .single-team .team-socials.wrapper-socials,
        .case-study-side-info .case-study-info-logo,
        .case-study-side-info .post-meta-item-tags a:hover {
            background-color: ' . esc_attr($contrast_background_alter_color) . ';
        }        
    ';
}

$contrast_button_text_color = aiero_get_prefered_option('contrast_button_text_color');
if ( !empty($contrast_button_text_color) ) {
    $aiero_custom_css .= '
        .slide-sidebar-wrapper {
            --wpforms-button-text-color: ' . esc_attr($contrast_button_text_color) . '
        }
        .slide-sidebar-wrapper .wrapper-socials a,
        .slide-sidebar-wrapper .aiero-button,
        .slide-sidebar-wrapper .button,
        .slide-sidebar-wrapper input[type="submit"],
        .slide-sidebar-wrapper input[type="reset"],
        .slide-sidebar-wrapper input[type="button"],
        .slide-sidebar-wrapper button,
        .aiero-price-item-widget .price-item.active .price-item-button-container .aiero-button,
        .slide-sidebar-wrapper .slide-sidebar-close,
        .slide-sidebar-wrapper .slide-sidebar-close:hover,
        .alter-menu-wrapper .alter-menu-close,
        .alter-menu-wrapper .alter-menu-close:hover,
        .slide-sidebar-wrapper .wp-block-gallery .blocks-gallery-grid .blocks-gallery-item a:after, 
        .slide-sidebar-wrapper .media_gallery .blocks-gallery-grid .blocks-gallery-item a:after,
        .slide-sidebar-wrapper .gallery .gallery-item .gallery-icon a:after,
        .slide-sidebar-wrapper .wp-block-button:not(.is-style-outline):not(.is-style-fill) .wp-block-button__link:not(.has-text-color),
        .wp-block-cover .wp-block-button:not(.is-style-outline) .wp-block-button__link:not(.has-text-color),
        .project-listing-wrapper.owl-carousel.project-slider-listing .post-more-button a,
        .slide-sidebar-wrapper .mc4wp-form .mc4wp-form-fields button,
        .project-listing-wrapper.text-position-inside .project-item-wrapper .project-item-categories a {
            color: ' . esc_attr($contrast_button_text_color) . ';
        }
        .slide-sidebar-wrapper .wp-block-social-links.is-style-default:not(.has-icon-color) .wp-social-link a.wp-block-social-link-anchor svg,
        .slide-sidebar-wrapper .wp-block-social-links.is-style-default:not(.has-icon-color) .wp-social-link:hover a.wp-block-social-link-anchor svg {
            fill: ' . esc_attr($contrast_button_text_color) . ';
        }
    ';
}

$contrast_button_border_style = aiero_get_prefered_option('contrast_button_border_style');
if ( $contrast_button_border_style == 'solid' ) {
    $aiero_custom_css .= '
        .slide-sidebar-wrapper .aiero-button .button-inner,
        .slide-sidebar-wrapper button:not(.customize-partial-edit-shortcut-button) .button-inner,
        .slide-sidebar-wrapper div.wpforms-container-full .wpforms-form button[type=submit] .button-inner, 
        .slide-sidebar-wrapper div.wpforms-container-full .wpforms-form .wpforms-page-button .button-inner,
        .slide-sidebar-wrapper .wp-block-button:not(.is-style-outline):not(.is-style-fill) .wp-block-button__link .button-inner,
        .slide-sidebar-wrapper .mc4wp-form .mc4wp-form-fields button .button-inner {
            top: 0;
            left: 0;
            right: 0;
            bottom: 0;
        }
    ';
}
$contrast_button_border_color = aiero_get_prefered_option('contrast_button_border_color');
$contrast_button_border_color_add = aiero_get_prefered_option('contrast_button_border_color_add');
if( $contrast_button_border_style == 'gradient' && ( !empty($contrast_button_border_color) && !empty($contrast_button_border_color_add) )) {
    $aiero_custom_css .= '
        .slide-sidebar-wrapper .aiero-button:after,
        .slide-sidebar-wrapper button:not(.customize-partial-edit-shortcut-button):after,
        .slide-sidebar-wrapper div.wpforms-container-full .wpforms-form button[type=submit]:after, 
        .slide-sidebar-wrapper div.wpforms-container-full .wpforms-form .wpforms-page-button:after,
        .slide-sidebar-wrapper .wp-block-button:not(.is-style-outline):not(.is-style-fill) .wp-block-button__link:after,
        .slide-sidebar-wrapper .mc4wp-form .mc4wp-form-fields button:after {
            background: linear-gradient(var(--button-border-gradient-angle), ' . esc_attr($contrast_button_border_color) . ' var(--button-gradient-colorstop-1), ' . esc_attr($contrast_button_border_color_add) . ' var(--button-gradient-colorstop-2));
        }
    ';
} elseif ( $contrast_button_border_style == 'solid' && !empty($contrast_button_border_color)) {
    $aiero_custom_css .= '
        .slide-sidebar-wrapper .aiero-button,
        .slide-sidebar-wrapper button:not(.customize-partial-edit-shortcut-button),
        .slide-sidebar-wrapper div.wpforms-container-full .wpforms-form button[type=submit], 
        .slide-sidebar-wrapper div.wpforms-container-full .wpforms-form .wpforms-page-button,
        .slide-sidebar-wrapper .wp-block-button:not(.is-style-outline):not(.is-style-fill) .wp-block-button__link,
        .slide-sidebar-wrapper .mc4wp-form .mc4wp-form-fields button {
            border-color: ' . esc_attr($contrast_button_border_color) . ';
        }
    ';
}

$contrast_button_border_color = aiero_get_prefered_option('contrast_button_border_color');
if ( !empty($contrast_button_border_color) ) {
    $aiero_custom_css .= '
        .wp-video .mejs-overlay-play .mejs-overlay-button:before {
            color: ' . esc_attr($contrast_button_border_color) . ';
        }
        .slide-sidebar-wrapper .wp-block-social-links.is-style-default:not(.has-icon-background-color) .wp-social-link a.wp-block-social-link-anchor {
            background-color: ' . esc_attr($contrast_button_border_color) . ';
        }
        .slide-sidebar-wrapper input[type="submit"],
        .slide-sidebar-wrapper input[type="button"],
        .slide-sidebar-wrapper input[type="reset"],
        .slide-sidebar-wrapper div.wpforms-container-full .wpforms-form input[type=submit] {
            border-color: ' . esc_attr($contrast_button_border_color) . ';
        }
        .slide-sidebar-wrapper .wp-block-gallery .blocks-gallery-grid .blocks-gallery-item a:before, 
        .slide-sidebar-wrapper .media_gallery .blocks-gallery-grid .blocks-gallery-item a:before,
        .slide-sidebar-wrapper .gallery .gallery-item .gallery-icon a:before,
        .widget_instagram-feed-widget #sb_instagram #sbi_images .sbi_photo:before, 
        .widget_instagram-feed-widget#sb_instagram #sbi_images .sbi_photo:before, 
        .widget #sb_instagram #sbi_images .sbi_photo:before, 
        .widget#sb_instagram #sbi_images .sbi_photo:before {
             background-color: rgba(' . esc_attr(aiero_hex2rgb($contrast_button_border_color)) . ', 0.5);
        }
    ';
}

if( !empty($contrast_button_border_color) && !empty($contrast_button_border_color_add) ) {
    $aiero_custom_css .= '
        .slide-sidebar-wrapper .widget_aiero_special_text_widget .aiero-special-text-widget-text {
            background: linear-gradient(var(--special-text-gradient-angle), ' . esc_attr($contrast_button_border_color) . ' var(--special-text-gradient-colorstop-1), ' . esc_attr($contrast_button_border_color_add) . ' var(--special-text-gradient-colorstop-2));
        }
    ';
}

$contrast_button_background_style = aiero_get_prefered_option('contrast_button_background_style');
$contrast_button_background_color = aiero_get_prefered_option('contrast_button_background_color');
$contrast_button_background_color_add = aiero_get_prefered_option('contrast_button_background_color_add');
if( $contrast_button_background_style == 'gradient' && ( !empty($contrast_button_background_color) && !empty($contrast_button_background_color_add) )) {
    $aiero_custom_css .= '
        .slide-sidebar-wrapper button:not(.customize-partial-edit-shortcut-button),
        .slide-sidebar-wrapper input[type="submit"],
        .slide-sidebar-wrapper input[type="button"],
        .slide-sidebar-wrapper input[type="reset"],
        .slide-sidebar-wrapper div.wpforms-container-full .wpforms-form input[type=submit]:not(:hover):not(:active),
        .slide-sidebar-wrapper .aiero-button .button-inner:before,
        .slide-sidebar-wrapper div.wpforms-container-full .wpforms-form button[type=submit] .button-inner:before, 
        .slide-sidebar-wrapper div.wpforms-container-full .wpforms-form .wpforms-page-button .button-inner:before,
        .slide-sidebar-wrapper .wp-block-search .wp-block-search__button .button-inner:before,
        .slide-sidebar-wrapper .wp-block-button:not(.is-style-outline):not(.is-style-fill) .wp-block-button__link:not(.has-background) .button-inner:before,
        .slide-sidebar-wrapper .mc4wp-form .mc4wp-form-fields button .button-inner:before {
            background: linear-gradient(var(--button-border-gradient-angle), ' . esc_attr($contrast_button_background_color) . ' var(--button-gradient-colorstop-1), ' . esc_attr($contrast_button_background_color_add) . ' var(--button-gradient-colorstop-2));
        }
        .slide-sidebar-wrapper div.wpforms-container-full .wpforms-form button[type=submit], 
        .slide-sidebar-wrapper div.wpforms-container-full .wpforms-form .wpforms-page-button,
        .slide-sidebar-wrapper .wp-block-search .wp-block-search__button,
        .slide-sidebar-wrapper .mc4wp-form .mc4wp-form-fields button {
            background: none;
        }
    ';
} elseif ( $contrast_button_background_style == 'solid' && !empty($contrast_button_background_color)) {
    $aiero_custom_css .= '
        .slide-sidebar-wrapper .aiero-button,
        .slide-sidebar-wrapper button:not(.customize-partial-edit-shortcut-button),
        .slide-sidebar-wrapper input[type="submit"],
        .slide-sidebar-wrapper input[type="button"],
        .slide-sidebar-wrapper input[type="reset"],
        .slide-sidebar-wrapper div.wpforms-container-full .wpforms-form input[type=submit]:not(:hover):not(:active),   
        .slide-sidebar-wrapper div.wpforms-container-full .wpforms-form button[type=submit]:not(:hover):not(:active), 
        .slide-sidebar-wrapper div.wpforms-container-full .wpforms-form .wpforms-page-button:not(:hover):not(:active),
        .slide-sidebar-wrapper .wp-block-button:not(.is-style-outline):not(.is-style-fill) .wp-block-button__link:not(.has-background),
        .slide-sidebar-wrapper .mc4wp-form .mc4wp-form-fields button {
            background-color: ' . esc_attr($contrast_button_background_color) . ';
        }
    ';
}

if ( !empty($contrast_button_background_color) ) {
    $aiero_custom_css .= '       
        .slide-sidebar-wrapper {
            --wpforms-button-background-color: ' . esc_attr($contrast_button_background_color) . '
        }
    ';
}

$contrast_button_text_hover = aiero_get_prefered_option('contrast_button_text_hover');
if ( !empty($contrast_button_text_hover) ) {
    $aiero_custom_css .= '
        .slide-sidebar-wrapper .aiero-button:hover,
        .slide-sidebar-wrapper .button:hover,
        .slide-sidebar-wrapper .wp-block-button:not(.is-style-outline):not(.is-style-fill) .wp-block-button__link:not(.has-text-color):hover,
        .wp-block-cover .wp-block-button:not(.is-style-outline) .wp-block-button__link:not(.has-text-color):hover,
        .slide-sidebar-wrapper input[type="submit"]:hover,
        .slide-sidebar-wrapper input[type="reset"]:hover,
        .slide-sidebar-wrapper input[type="button"]:hover,
        .slide-sidebar-wrapper button:hover,
        .aiero-price-item-widget .price-item.active .price-item-button-container .aiero-button:hover,
        .slide-sidebar-wrapper .mc4wp-form .mc4wp-form-fields button:hover,
        .project-listing-wrapper.text-position-inside .project-item-wrapper .project-item-categories a:hover {        
            color: ' . esc_attr($contrast_button_text_hover) . ';
        }
    ';
}

$contrast_button_border_hover = aiero_get_prefered_option('contrast_button_border_hover');
$contrast_button_border_hover_add = aiero_get_prefered_option('contrast_button_border_hover_add');
if( $contrast_button_border_style == 'gradient' && ( !empty($contrast_button_border_hover) && !empty($contrast_button_border_hover_add) )) {
    $aiero_custom_css .= '
        .slide-sidebar-wrapper .aiero-button:hover:after,
        .slide-sidebar-wrapper button:not(.customize-partial-edit-shortcut-button):hover:after,
        .slide-sidebar-wrapper div.wpforms-container-full .wpforms-form button[type=submit]:hover:after, 
        .slide-sidebar-wrapper div.wpforms-container-full .wpforms-form .wpforms-page-button:hover:after,
        .slide-sidebar-wrapper .wp-block-button:not(.is-style-outline):not(.is-style-fill) .wp-block-button__link:hover:after,
        .slide-sidebar-wrapper .mc4wp-form .mc4wp-form-fields button:after {
            background: linear-gradient(var(--button-border-gradient-angle), ' . esc_attr($contrast_button_border_hover) . ' var(--button-gradient-colorstop-1), ' . esc_attr($contrast_button_border_hover_add) . ' var(--button-gradient-colorstop-2));
        }
    ';
} elseif ( $contrast_button_border_style == 'solid' && !empty($contrast_button_border_hover)) {
    $aiero_custom_css .= '
        .slide-sidebar-wrapper .aiero-button:hover,
        .slide-sidebar-wrapper button:not(.customize-partial-edit-shortcut-button):hover,
        .slide-sidebar-wrapper div.wpforms-container-full .wpforms-form button[type=submit]:hover, 
        .slide-sidebar-wrapper div.wpforms-container-full .wpforms-form .wpforms-page-button:hover,
        .slide-sidebar-wrapper .wp-block-button:not(.is-style-outline):not(.is-style-fill) .wp-block-button__link:hover,
        .slide-sidebar-wrapper .mc4wp-form .mc4wp-form-fields button:hover {
            border-color: ' . esc_attr($contrast_button_border_hover) . ';
        }
    ';
}

if ( !empty($contrast_button_border_hover) ) {
    $aiero_custom_css .= '
        .slide-sidebar-wrapper input[type="submit"]:hover,
        .slide-sidebar-wrapper input[type="button"]:hover,
        .slide-sidebar-wrapper input[type="reset"]:hover,
        .slide-sidebar-wrapper div.wpforms-container-full .wpforms-form input[type=submit]:hover,
        .slide-sidebar-wrapper .wp-block-file a.wp-block-file__button:hover {
            border-color: ' . esc_attr($contrast_button_border_hover) . ';
        }
    ';
}

$contrast_button_background_hover = aiero_get_prefered_option('contrast_button_background_hover');
if ( !empty($contrast_button_background_hover) ) {
    $aiero_custom_css .= '
        .slide-sidebar-wrapper {
            --wpforms-button-background-color-alt: ' . esc_attr($contrast_button_background_hover) . ';
        }
        .slide-sidebar-wrapper .wp-block-file a.wp-block-file__button:hover {
            background-color: ' . esc_attr($contrast_button_background_hover) . ';
        }
    ';
}

$contrast_button_background_style = aiero_get_prefered_option('contrast_button_background_style');
$contrast_button_background_hover = aiero_get_prefered_option('contrast_button_background_hover');
$contrast_button_background_hover_add = aiero_get_prefered_option('contrast_button_background_hover_add');
if( $contrast_button_background_style == 'gradient' && ( !empty($contrast_button_background_hover) && !empty($contrast_button_background_hover_add) )) {
    $aiero_custom_css .= '
        .slide-sidebar-wrapper button:not(.customize-partial-edit-shortcut-button):hover,
        .slide-sidebar-wrapper input[type="submit"]:hover,
        .slide-sidebar-wrapper input[type="button"]:hover,
        .slide-sidebar-wrapper input[type="reset"]:hover,
        .slide-sidebar-wrapper div.wpforms-container-full .wpforms-form input[type=submit]:hover,
        .slide-sidebar-wrapper .aiero-button .button-inner:after,
        .slide-sidebar-wrapper div.wpforms-container-full .wpforms-form button[type=submit] .button-inner:after, 
        .slide-sidebar-wrapper div.wpforms-container-full .wpforms-form .wpforms-page-button .button-inner:after,
        .slide-sidebar-wrapper .wp-block-search .wp-block-search__button .button-inner:after,
        .slide-sidebar-wrapper .wp-block-button:not(.is-style-outline):not(.is-style-fill) .wp-block-button__link:not(.has-background) .button-inner:after,
        .slide-sidebar-wrapper .mc4wp-form .mc4wp-form-fields button .button-inner:after {
            background: linear-gradient(var(--button-border-gradient-angle), ' . esc_attr($contrast_button_background_hover) . ' var(--button-gradient-colorstop-1), ' . esc_attr($contrast_button_background_hover_add) . ' var(--button-gradient-colorstop-2));
        }
        .slide-sidebar-wrapper div.wpforms-container-full .wpforms-form button[type=submit]:hover, 
        .slide-sidebar-wrapper div.wpforms-container-full .wpforms-form .wpforms-page-button:hover,
        .slide-sidebar-wrapper .wp-block-search .wp-block-search__button:hover,
        .slide-sidebar-wrapper .mc4wp-form .mc4wp-form-fields button:hover {
            background: none;
        }
    ';
} elseif ( $contrast_button_background_style == 'solid' && !empty($contrast_button_background_hover)) {
    $aiero_custom_css .= '
        .slide-sidebar-wrapper .aiero-button:hover,
        .slide-sidebar-wrapper button:not(.customize-partial-edit-shortcut-button):hover,
        .slide-sidebar-wrapper input[type="submit"]:hover,
        .slide-sidebar-wrapper input[type="button"]:hover,
        .slide-sidebar-wrapper input[type="reset"]:hover,
        .slide-sidebar-wrapper div.wpforms-container-full .wpforms-form input[type=submit]:hover,
        .slide-sidebar-wrapper div.wpforms-container-full .wpforms-form button[type=submit]:hover, 
        .slide-sidebar-wrapper div.wpforms-container-full .wpforms-form .wpforms-page-button:hover,
        .slide-sidebar-wrapper .wp-block-search .wp-block-search__button:hover,
        .slide-sidebar-wrapper .wp-block-button:not(.is-style-outline):not(.is-style-fill) .wp-block-button__link:not(.has-background):hover,
        .slide-sidebar-wrapper .mc4wp-form .mc4wp-form-fields button:hover {
            background-color: ' . esc_attr($contrast_button_background_hover) . ';
        }
    ';
}