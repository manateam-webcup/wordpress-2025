<?php

// ---------------------------- //
// ------ Footer Colors ------- //
// ---------------------------- //
$footer_default_text_color = aiero_get_prepared_option('footer_default_text_color', 'contrast_default_text_color', 'footer_customize');
if ( !empty($footer_default_text_color) ) {
    $aiero_custom_css .= '
        .footer,
        .footer .widget_tag_cloud .tagcloud .tag-cloud-link,
        .footer .wp-block-tag-cloud .tag-cloud-link,
        .footer .input-floating-wrap input:focus ~ .floating-placeholder, 
        .footer .input-floating-wrap input:not(:placeholder-shown) ~ .floating-placeholder, 
        .footer .input-floating-wrap textarea:focus ~ .floating-placeholder, 
        .footer .input-floating-wrap textarea:not(:placeholder-shown) ~ .floating-placeholder,
        .footer input[type="checkbox"]:checked:before,
        .footer div.wpforms-container.wpforms-container-full .wpforms-form input[type="checkbox"]:checked:before,
        .footer input,
        .footer textarea,
        .footer select,
        .footer-widgets input[type="text"],
        .footer-widgets input[type="email"],
        .footer-widgets input[type="url"],
        .footer-widgets input[type="password"],
        .footer-widgets input[type="search"],
        .footer-widgets input[type="number"],
        .footer-widgets input[type="tel"],
        .footer-widgets input[type="range"],
        .footer-widgets input[type="date"],
        .footer-widgets input[type="month"],
        .footer-widgets input[type="week"],
        .footer-widgets input[type="time"],
        .footer-widgets input[type="datetime"],
        .footer-widgets input[type="datetime-local"],
        .footer-widgets input[type="color"],
        .footer-widgets select,    
        .footer-widgets .select2-container--default .select2-selection--single .select2-selection__rendered,
        .footer-widgets textarea,
        .footer-widgets div.wpforms-container.wpforms-container-full .wpforms-form input[type="text"],
        .footer-widgets div.wpforms-container.wpforms-container-full .wpforms-form input[type="email"],
        .footer-widgets div.wpforms-container.wpforms-container-full .wpforms-form input[type="url"],
        .footer-widgets div.wpforms-container.wpforms-container-full .wpforms-form input[type="password"],
        .footer-widgets div.wpforms-container.wpforms-container-full .wpforms-form input[type="search"],
        .footer-widgets div.wpforms-container.wpforms-container-full .wpforms-form input[type="number"],
        .footer-widgets div.wpforms-container.wpforms-container-full .wpforms-form input[type="tel"],
        .footer-widgets div.wpforms-container.wpforms-container-full .wpforms-form input[type="date"],
        .footer-widgets div.wpforms-container.wpforms-container-full .wpforms-form input[type="month"],
        .footer-widgets div.wpforms-container.wpforms-container-full .wpforms-form input[type="week"],
        .footer-widgets div.wpforms-container.wpforms-container-full .wpforms-form input[type="time"],
        .footer-widgets div.wpforms-container.wpforms-container-full .wpforms-form input[type="datetime"],
        .footer-widgets div.wpforms-container.wpforms-container-full .wpforms-form input[type="datetime-local"],
        .footer-widgets div.wpforms-container.wpforms-container-full .wpforms-form input[type="color"],
        .footer-widgets div.wpforms-container.wpforms-container-full .wpforms-form select,
        .footer-widgets div.wpforms-container.wpforms-container-full .wpforms-form textarea,
        .footer-widgets .select2-container--default .select2-results__option.select2-results__option--highlighted[aria-selected], 
        .footer-widgets .select2-container--default .select2-results__option.select2-results__option--highlighted[data-selected] {
            color: ' . esc_attr($footer_default_text_color) . ';
        }
        .footer input[type="radio"]:checked:before,
        .footer div.wpforms-container.wpforms-container-full .wpforms-form input[type="radio"]:checked:before {
            background-color: ' . esc_attr($footer_default_text_color) . ';
        }
        .footer div.wpforms-container.wpforms-container-full .wpforms-form .wpforms-field-number-slider input[type="range"]::-webkit-slider-thumb {
            border-color: ' . esc_attr($footer_default_text_color) . ';
        }
        .footer div.wpforms-container.wpforms-container-full .wpforms-form .wpforms-field-number-slider input[type="range"]::-moz-range-thumb {
            border-color: ' . esc_attr($footer_default_text_color) . ';
        }
        .footer div.wpforms-container.wpforms-container-full .wpforms-form .wpforms-field-number-slider input[type="range"]::-ms-thumb {
            border-color: ' . esc_attr($footer_default_text_color) . ';
        }
        .footer div.wpforms-container.wpforms-container-full .wpforms-form .wpforms-field-number-slider input[type="range"]:focus::-ms-thumb {
            border-color: ' . esc_attr($footer_default_text_color) . ';
        }
        .footer input[type="text"]:focus::-webkit-input-placeholder,
        .footer input[type="email"]:focus::-webkit-input-placeholder,
        .footer input[type="url"]:focus::-webkit-input-placeholder,
        .footer input[type="password"]:focus::-webkit-input-placeholder,
        .footer input[type="search"]:focus::-webkit-input-placeholder,
        .footer input[type="tel"]:focus::-webkit-input-placeholder,
        .footer input[type="number"]:focus::-webkit-input-placeholder, 
        .footer input[type="date"]:focus::-webkit-input-placeholder, 
        .footer input[type="month"]:focus::-webkit-input-placeholder, 
        .footer input[type="week"]:focus::-webkit-input-placeholder, 
        .footer input[type="time"]:focus::-webkit-input-placeholder, 
        .footer input[type="datetime"]:focus::-webkit-input-placeholder, 
        .footer input[type="datetime-local"]:focus::-webkit-input-placeholder, 
        .footer textarea:focus::-webkit-input-placeholder,
        .footer div.wpforms-container.wpforms-container-full .wpforms-form input[type="text"]:focus::-webkit-input-placeholder, 
        .footer div.wpforms-container.wpforms-container-full .wpforms-form input[type="email"]:focus::-webkit-input-placeholder, 
        .footer div.wpforms-container.wpforms-container-full .wpforms-form input[type="url"]:focus::-webkit-input-placeholder, 
        .footer div.wpforms-container.wpforms-container-full .wpforms-form input[type="password"]:focus::-webkit-input-placeholder, 
        .footer div.wpforms-container.wpforms-container-full .wpforms-form input[type="search"]:focus::-webkit-input-placeholder, 
        .footer div.wpforms-container.wpforms-container-full .wpforms-form input[type="number"]:focus::-webkit-input-placeholder, 
        .footer div.wpforms-container.wpforms-container-full .wpforms-form input[type="tel"]:focus::-webkit-input-placeholder,
        .footer div.wpforms-container.wpforms-container-full .wpforms-form input[type="date"]:focus::-webkit-input-placeholder,
        .footer div.wpforms-container.wpforms-container-full .wpforms-form input[type="month"]:focus::-webkit-input-placeholder, 
        .footer div.wpforms-container.wpforms-container-full .wpforms-form input[type="week"]:focus::-webkit-input-placeholder, 
        .footer div.wpforms-container.wpforms-container-full .wpforms-form input[type="time"]:focus::-webkit-input-placeholder, 
        .footer div.wpforms-container.wpforms-container-full .wpforms-form input[type="datetime"]:focus::-webkit-input-placeholder, 
        .footer div.wpforms-container.wpforms-container-full .wpforms-form input[type="datetime-local"]:focus::-webkit-input-placeholder, 
        .footer div.wpforms-container.wpforms-container-full .wpforms-form textarea:focus::-webkit-input-placeholder {
             color: ' . esc_attr($footer_default_text_color) . ';
        }
        
        .footer input[type="text"]:-moz-placeholder,
        .footer input[type="url"]:-moz-placeholder,
        .footer input[type="email"]:-moz-placeholder,
        .footer input[type="password"]:-moz-placeholder,
        .footer input[type="search"]:-moz-placeholder,
        .footer input[type="tel"]:-moz-placeholder,
        .footer input[type="number"]:-moz-placeholder, 
        .footer input[type="date"]:-moz-placeholder, 
        .footer input[type="month"]:-moz-placeholder, 
        .footer input[type="week"]:-moz-placeholder, 
        .footer input[type="time"]:-moz-placeholder, 
        .footer input[type="datetime"]:-moz-placeholder, 
        .footer input[type="datetime-local"]:-moz-placeholder, 
        .footer textarea:-moz-placeholder,
        .footer div.wpforms-container.wpforms-container-full .wpforms-form input[type="text"]:-moz-placeholder, 
        .footer div.wpforms-container.wpforms-container-full .wpforms-form input[type="email"]:-moz-placeholder, 
        .footer div.wpforms-container.wpforms-container-full .wpforms-form input[type="url"]:-moz-placeholder, 
        .footer div.wpforms-container.wpforms-container-full .wpforms-form input[type="password"]:-moz-placeholder, 
        .footer div.wpforms-container.wpforms-container-full .wpforms-form input[type="search"]:-moz-placeholder, 
        .footer div.wpforms-container.wpforms-container-full .wpforms-form input[type="number"]:-moz-placeholder, 
        .footer div.wpforms-container.wpforms-container-full .wpforms-form input[type="tel"]:-moz-placeholder,
        .footer div.wpforms-container.wpforms-container-full .wpforms-form input[type="date"]:-moz-placeholder,
        .footer div.wpforms-container.wpforms-container-full .wpforms-form input[type="month"]:-moz-placeholder, 
        .footer div.wpforms-container.wpforms-container-full .wpforms-form input[type="week"]:-moz-placeholder, 
        .footer div.wpforms-container.wpforms-container-full .wpforms-form input[type="time"]:-moz-placeholder, 
        .footer div.wpforms-container.wpforms-container-full .wpforms-form input[type="datetime"]:-moz-placeholder, 
        .footer div.wpforms-container.wpforms-container-full .wpforms-form input[type="datetime-local"]:-moz-placeholder, 
        .footer div.wpforms-container.wpforms-container-full .wpforms-form textarea:-moz-placeholder {
             color: ' . esc_attr($footer_default_text_color) . ';
        }
        
        .footer input[type="text"]:focus::-moz-placeholder,
        .footer input[type="url"]:focus::-moz-placeholder,
        .footer input[type="email"]:focus::-moz-placeholder,
        .footer input[type="password"]:focus::-moz-placeholder,
        .footer input[type="search"]:focus::-moz-placeholder,
        .footer input[type="tel"]:focus::-moz-placeholder,
        .footer input[type="number"]:focus::-moz-placeholder, 
        .footer input[type="date"]:focus::-moz-placeholder, 
        .footer input[type="month"]:focus::-moz-placeholder, 
        .footer input[type="week"]:focus::-moz-placeholder, 
        .footer input[type="time"]:focus::-moz-placeholder, 
        .footer input[type="datetime"]:focus::-moz-placeholder, 
        .footer input[type="datetime-local"]:focus::-moz-placeholder, 
        .footer textarea:focus::-moz-placeholder,
        .footer div.wpforms-container.wpforms-container-full .wpforms-form input[type="text"]:focus::-moz-placeholder, 
        .footer div.wpforms-container.wpforms-container-full .wpforms-form input[type="email"]:focus::-moz-placeholder, 
        .footer div.wpforms-container.wpforms-container-full .wpforms-form input[type="url"]:focus::-moz-placeholder, 
        .footer div.wpforms-container.wpforms-container-full .wpforms-form input[type="password"]:focus::-moz-placeholder, 
        .footer div.wpforms-container.wpforms-container-full .wpforms-form input[type="search"]:focus::-moz-placeholder, 
        .footer div.wpforms-container.wpforms-container-full .wpforms-form input[type="number"]:focus::-moz-placeholder, 
        .footer div.wpforms-container.wpforms-container-full .wpforms-form input[type="tel"]:focus::-moz-placeholder,
        .footer div.wpforms-container.wpforms-container-full .wpforms-form input[type="date"]:focus::-moz-placeholder,
        .footer div.wpforms-container.wpforms-container-full .wpforms-form input[type="month"]:focus::-moz-placeholder, 
        .footer div.wpforms-container.wpforms-container-full .wpforms-form input[type="week"]:focus::-moz-placeholder, 
        .footer div.wpforms-container.wpforms-container-full .wpforms-form input[type="time"]:focus::-moz-placeholder, 
        .footer div.wpforms-container.wpforms-container-full .wpforms-form input[type="datetime"]:focus::-moz-placeholder, 
        .footer div.wpforms-container.wpforms-container-full .wpforms-form input[type="datetime-local"]:focus::-moz-placeholder, 
        .footer div.wpforms-container.wpforms-container-full .wpforms-form textarea:focus::-moz-placeholder {
             color: ' . esc_attr($footer_default_text_color) . ';
        }
        
        .footer input[type="text"]:focus:-ms-input-placeholder,
        .footer input[type="email"]:focus:-ms-input-placeholder,
        .footer input[type="url"]:focus:-ms-input-placeholder,
        .footer input[type="password"]:focus:-ms-input-placeholder,
        .footer input[type="search"]:focus:-ms-input-placeholder,
        .footer input[type="tel"]:focus:-ms-input-placeholder,
        .footer input[type="number"]:focus:-ms-input-placeholder, 
        .footer input[type="date"]:focus:-ms-input-placeholder, 
        .footer input[type="month"]:focus:-ms-input-placeholder, 
        .footer input[type="week"]:focus:-ms-input-placeholder, 
        .footer input[type="time"]:focus:-ms-input-placeholder, 
        .footer input[type="datetime"]:focus:-ms-input-placeholder, 
        .footer input[type="datetime-local"]:focus:-ms-input-placeholder, 
        .footer textarea:focus:-ms-input-placeholder,
        .footer div.wpforms-container.wpforms-container-full .wpforms-form input[type="text"]:focus:-ms-input-placeholder, 
        .footer div.wpforms-container.wpforms-container-full .wpforms-form input[type="email"]:focus:-ms-input-placeholder, 
        .footer div.wpforms-container.wpforms-container-full .wpforms-form input[type="url"]:focus:-ms-input-placeholder, 
        .footer div.wpforms-container.wpforms-container-full .wpforms-form input[type="password"]:focus:-ms-input-placeholder, 
        .footer div.wpforms-container.wpforms-container-full .wpforms-form input[type="search"]:focus:-ms-input-placeholder, 
        .footer div.wpforms-container.wpforms-container-full .wpforms-form input[type="number"]:focus:-ms-input-placeholder, 
        .footer div.wpforms-container.wpforms-container-full .wpforms-form input[type="tel"]:focus:-ms-input-placeholder,
        .footer div.wpforms-container.wpforms-container-full .wpforms-form input[type="date"]:focus:-ms-input-placeholder,
        .footer div.wpforms-container.wpforms-container-full .wpforms-form input[type="month"]:focus:-ms-input-placeholder, 
        .footer div.wpforms-container.wpforms-container-full .wpforms-form input[type="week"]:focus:-ms-input-placeholder, 
        .footer div.wpforms-container.wpforms-container-full .wpforms-form input[type="time"]:focus:-ms-input-placeholder, 
        .footer div.wpforms-container.wpforms-container-full .wpforms-form input[type="datetime"]:focus:-ms-input-placeholder, 
        .footer div.wpforms-container.wpforms-container-full .wpforms-form input[type="datetime-local"]:focus:-ms-input-placeholder, 
        .footer div.wpforms-container.wpforms-container-full .wpforms-form textarea:focus:-ms-input-placeholder {
            color: ' . esc_attr($footer_default_text_color) . ';
        }
    ';
}

$footer_dark_text_color = aiero_get_prepared_option('footer_dark_text_color', 'contrast_dark_text_color', 'footer_customize');
if ( !empty($footer_dark_text_color) ) {
    $aiero_custom_css .= '
        .footer {
            --wpforms-field-text-color: ' . esc_attr($footer_dark_text_color) . ';
        }        
        .footer a,
        .footer .widget-title,
        .footer .wrapper-socials a,
        .footer .wrapper-socials a:hover,
        .footer .widget_text,
        .footer .widget_search .search-form .search-form-icon,
        .footer-widgets .widget_categories ul li:hover li,
        .footer .widget_archive .post-count,
        .footer .wp-block-archives .post-count,
        .footer .widget_categories .post-count, 
        .footer .wp-block-categories .post-count,
        .footer .widget_rss cite,
        .footer .wp-block-rss .wp-block-rss__item-author,
        .footer .widget_media_gallery .gallery .gallery-icon a:after,
        .footer .widget_media_audio .mejs-container .mejs-button > button,
        .footer .widget_media_audio .mejs-container .mejs-time,
        .footer .widget_media_audio .mejs-container .mejs-duration,
        .footer .wp-video .mejs-container .mejs-button > button,
        .footer .wp-video .mejs-container .mejs-time,
        .footer .wp-video .mejs-container .mejs-duration,
        .footer-widgets .widget_search .search-form .search-form-icon,
        .footer-widgets .widget_recent_entries ul li a,
        .footer-widgets .wp-block-latest-posts li a,
        .footer-widgets .widget_recent_comments ul .recentcomments,
        .footer-widgets .widget_recent_comments ul .recentcomments a,
        .footer-widgets .wp-block-latest-comments li a,
        .footer-widgets .widget_calendar .wp-calendar-table:not(.has-text-color) caption, 
        .footer-widgets .wp-block-calendar .wp-calendar-table:not(.has-text-color) caption,
        .footer-widgets .widget_calendar .wp-calendar-table:not(.has-text-color) ~ .wp-calendar-nav a,
        .footer-widgets .wp-block-calendar .wp-calendar-table:not(.has-text-color) ~ .wp-calendar-nav a,
        .footer-widgets .widget_calendar .wp-calendar-table:not(.has-text-color) tbody td, 
        .footer-widgets .wp-block-calendar .wp-calendar-table:not(.has-text-color) tbody td,
        .footer-widgets .widget_calendar .wp-calendar-table:not(.has-text-color) tbody td a:hover, 
        .footer-widgets .wp-block-calendar .wp-calendar-table:not(.has-text-color) tbody td a:hover,
        .footer-widgets .widget_calendar .wp-calendar-table:not(.has-text-color) tbody td#today a, 
        .footer-widgets .wp-block-calendar .wp-calendar-table:not(.has-text-color) tbody td#today a,
        .footer-widgets .widget_rss cite,
        .footer-widgets .widget_rss ul a.rsswidget,
        .footer-widgets .wp-block-rss .wp-block-rss__item-title a,
        .footer-widgets .wp-block-rss .wp-block-rss__item-author,
        .footer-widgets .widget .widget-title a,
        .footer-widgets .widget_nav_menu ul li a, 
        .footer-widgets .widget_aiero_nav_menu_widget ul li a,        
        .footer-widgets .widget_nav_menu ul li a:hover, 
        .footer-widgets .widget_nav_menu ul li.current-menu-item > a, 
        .footer-widgets .widget_nav_menu ul li.current-menu-ancestor > a, 
        .footer-widgets .widget_nav_menu ul li.current-menu-parent > a, 
        .footer-widgets .widget_nav_menu ul li.current_page_item > a, 
        .footer-widgets .widget_aiero_nav_menu_widget ul li a:hover, 
        .footer-widgets .widget_aiero_nav_menu_widget ul li.current-menu-item > a,
        .footer-widgets .widget_aiero_nav_menu_widget ul li.current-menu-ancestor > a,
        .footer-widgets .widget_aiero_nav_menu_widget ul li.current-menu-parent > a, 
        .footer-widgets .widget_aiero_nav_menu_widget ul li.current_page_item > a,
        .footer .footer-menu li a:hover,
        .footer .footer-menu li.current-menu-item a,
        .footer .footer-menu li.current-menu-ancestor a,
        .footer .footer-menu li.current-menu-parent a,
        .footer .footer-menu li.current_page_item a,
        .footer-widgets .widget_pages .widget-wrapper > ul li > a,
        .footer-widgets .wp-block-page-list li a,
        .footer-widgets .widget_meta ul li > a,
        .footer-widgets .widget_categories ul li > a,
        .footer-widgets ul.wp-block-categories li > a,
        .footer-widgets .widget_categories ul li .widget-archive-trigger, 
        .footer-widgets .widget_archive ul li > a,
        .footer-widgets .wp-block-archives li > a,
        .footer-widgets .wp-block-search .wp-block-search__label,
        .footer-widgets .wp-block-search.wp-block-search__button-inside .wp-block-search__inside-wrapper .wp-block-search__button.has-icon,
        .footer .footer-menu li a,
        .footer-widgets .wp-block-loginout,
        .footer-widgets .wp-block-loginout a,
        .footer-widgets .widget_nav_menu ul li .widget-menu-trigger, 
        .footer-widgets .widget_aiero_nav_menu_widget ul li .widget-menu-trigger,
        .footer-widgets .widget .wp-block-list li:before,
        .footer-widgets .widget .wp-block-list li:hover a,
        .footer-widgets .wp-block-file a.wp-block-file__button,
        .footer-widgets .wp-block-social-links.is-style-logos-only:not(.has-icon-color) .wp-block-social-link svg {
            color: ' . esc_attr($footer_dark_text_color) . ';
        }
        .footer .widget_media_audio .mejs-controls .mejs-horizontal-volume-slider .mejs-horizontal-volume-current, 
        .footer .widget_media_audio .mejs-controls .mejs-time-rail .mejs-time-loaded,
        .footer .wp-video .mejs-volume-current,
        .footer .wp-video .mejs-volume-handle {
            background-color: ' . esc_attr($footer_dark_text_color) . ';
        }
        .footer .content-inner ul:not([class*="elementor"]) > li:not([class*="elementor"]):before,
        .footer .content-single-post ul:not([class*="elementor"]) > li:not([class*="elementor"]):before,
        .footer .single_portfolio_content ul:not([class*="elementor"]) > li:not([class*="elementor"]):before,
        .footer .aiero_comments__item-text ul:not([class*="elementor"]) > li:not([class*="elementor"]):before,
        .footer .single_recipe_content ul:not([class*="elementor"]) > li:not([class*="elementor"]):before {
            border-color: ' . esc_attr($footer_dark_text_color) . ';
        }
        .footer .widget_media_audio .mejs-controls .mejs-horizontal-volume-slider .mejs-horizontal-volume-total, 
        .footer .widget_media_audio .mejs-controls .mejs-time-rail .mejs-time-total,
        .footer .mejs-controls .mejs-horizontal-volume-slider .mejs-horizontal-volume-total, 
        .footer .mejs-controls .mejs-time-rail .mejs-time-total,
        .footer .mejs-volume-total {
            background-color: rgba(' . esc_attr(aiero_hex2rgb($footer_dark_text_color)) . ', 0.4);
        }
    ';
}

$footer_light_text_color = aiero_get_prepared_option('footer_light_text_color', 'contrast_light_text_color', 'footer_customize');
if ( !empty($footer_light_text_color) ) {
    $aiero_custom_css .= '
        .footer .input-floating-wrap .floating-placeholder,
        .footer .widget_categories li.cat-item-hierarchical, 
        .footer .wp-block-categories li.cat-item-hierarchical,
        .footer .widget_pages .widget-archive-trigger,
        .footer .widget_nav_menu .widget-menu-trigger,
        .footer-widgets .widget_recent_entries ul li .post-date,
        .footer-widgets .wp-block-latest-posts li .wp-block-latest-posts__post-date,
        .footer-widgets .widget_rss .rss-date,
        .footer-widgets .wp-block-rss .wp-block-rss__item-publish-date,
        .footer-widgets .wp-block-latest-comments li .wp-block-latest-comments__comment-meta,        
        .footer-widgets .widget .wp-block-list li a,        
        .footer .footer-columns-row,
        .footer .footer-columns-row a,
        .footer .footer-additional-menu li a {
            color: ' . esc_attr($footer_light_text_color) . ';
        }
        .footer input[type="text"]::-webkit-input-placeholder,
        .footer input[type="email"]::-webkit-input-placeholder,
        .footer input[type="url"]::-webkit-input-placeholder,
        .footer input[type="password"]::-webkit-input-placeholder,
        .footer input[type="search"]::-webkit-input-placeholder,
        .footer input[type="tel"]::-webkit-input-placeholder, 
        .footer input[type="number"]::-webkit-input-placeholder, 
        .footer input[type="date"]::-webkit-input-placeholder, 
        .footer input[type="month"]::-webkit-input-placeholder, 
        .footer input[type="week"]::-webkit-input-placeholder, 
        .footer input[type="time"]::-webkit-input-placeholder, 
        .footer input[type="datetime"]::-webkit-input-placeholder, 
        .footer input[type="datetime-local"]::-webkit-input-placeholder, 
        .footer textarea::-webkit-input-placeholder,
        .footer div.wpforms-container.wpforms-container-full .wpforms-form input[type="text"]::-webkit-input-placeholder, 
        .footer div.wpforms-container.wpforms-container-full .wpforms-form input[type="email"]::-webkit-input-placeholder, 
        .footer div.wpforms-container.wpforms-container-full .wpforms-form input[type="url"]::-webkit-input-placeholder, 
        .footer div.wpforms-container.wpforms-container-full .wpforms-form input[type="password"]::-webkit-input-placeholder, 
        .footer div.wpforms-container.wpforms-container-full .wpforms-form input[type="search"]::-webkit-input-placeholder, 
        .footer div.wpforms-container.wpforms-container-full .wpforms-form input[type="number"]::-webkit-input-placeholder, 
        .footer div.wpforms-container.wpforms-container-full .wpforms-form input[type="tel"]::-webkit-input-placeholder,
        .footer div.wpforms-container.wpforms-container-full .wpforms-form input[type="date"]::-webkit-input-placeholder,
        .footer div.wpforms-container.wpforms-container-full .wpforms-form input[type="month"]::-webkit-input-placeholder, 
        .footer div.wpforms-container.wpforms-container-full .wpforms-form input[type="week"]::-webkit-input-placeholder, 
        .footer div.wpforms-container.wpforms-container-full .wpforms-form input[type="time"]::-webkit-input-placeholder, 
        .footer div.wpforms-container.wpforms-container-full .wpforms-form input[type="datetime"]::-webkit-input-placeholder, 
        .footer div.wpforms-container.wpforms-container-full .wpforms-form input[type="datetime-local"]::-webkit-input-placeholder, 
        .footer div.wpforms-container.wpforms-container-full .wpforms-form textarea::-webkit-input-placeholder {
             color: ' . esc_attr($footer_light_text_color) . ';
        }
        .footer input[type="text"]:-moz-placeholder,
        .footer input[type="url"]:-moz-placeholder,
        .footer input[type="email"]:-moz-placeholder,
        .footer input[type="password"]:-moz-placeholder,
        .footer input[type="search"]:-moz-placeholder,
        .footer input[type="tel"]:-moz-placeholder, 
        .footer input[type="number"]:-moz-placeholder, 
        .footer input[type="date"]:-moz-placeholder, 
        .footer input[type="month"]:-moz-placeholder, 
        .footer input[type="week"]:-moz-placeholder, 
        .footer input[type="time"]:-moz-placeholder, 
        .footer input[type="datetime"]:-moz-placeholder, 
        .footer input[type="datetime-local"]:-moz-placeholder, 
        .footer textarea:-moz-placeholder,
        .footer div.wpforms-container.wpforms-container-full .wpforms-form input[type="text"]:-moz-placeholder, 
        .footer div.wpforms-container.wpforms-container-full .wpforms-form input[type="email"]:-moz-placeholder, 
        .footer div.wpforms-container.wpforms-container-full .wpforms-form input[type="url"]:-moz-placeholder, 
        .footer div.wpforms-container.wpforms-container-full .wpforms-form input[type="password"]:-moz-placeholder, 
        .footer div.wpforms-container.wpforms-container-full .wpforms-form input[type="search"]:-moz-placeholder, 
        .footer div.wpforms-container.wpforms-container-full .wpforms-form input[type="number"]:-moz-placeholder, 
        .footer div.wpforms-container.wpforms-container-full .wpforms-form input[type="tel"]:-moz-placeholder,
        .footer div.wpforms-container.wpforms-container-full .wpforms-form input[type="date"]:-moz-placeholder,
        .footer div.wpforms-container.wpforms-container-full .wpforms-form input[type="month"]:-moz-placeholder, 
        .footer div.wpforms-container.wpforms-container-full .wpforms-form input[type="week"]:-moz-placeholder, 
        .footer div.wpforms-container.wpforms-container-full .wpforms-form input[type="time"]:-moz-placeholder, 
        .footer div.wpforms-container.wpforms-container-full .wpforms-form input[type="datetime"]:-moz-placeholder, 
        .footer div.wpforms-container.wpforms-container-full .wpforms-form input[type="datetime-local"]:-moz-placeholder, 
        .footer div.wpforms-container.wpforms-container-full .wpforms-form textarea:-moz-placeholder {
             color: ' . esc_attr($footer_light_text_color) . ';
        }
        .footer input[type="text"]::-moz-placeholder,
        .footer input[type="url"]::-moz-placeholder,
        .footer input[type="email"]::-moz-placeholder,
        .footer input[type="password"]::-moz-placeholder,
        .footer input[type="search"]::-moz-placeholder,
        .footer input[type="tel"]::-moz-placeholder, 
        .footer input[type="number"]::-moz-placeholder, 
        .footer input[type="date"]::-moz-placeholder, 
        .footer input[type="month"]::-moz-placeholder, 
        .footer input[type="week"]::-moz-placeholder, 
        .footer input[type="time"]::-moz-placeholder, 
        .footer input[type="datetime"]::-moz-placeholder, 
        .footer input[type="datetime-local"]::-moz-placeholder, 
        .footer textarea::-moz-placeholder,
        .footer div.wpforms-container.wpforms-container-full .wpforms-form input[type="text"]::-moz-placeholder, 
        .footer div.wpforms-container.wpforms-container-full .wpforms-form input[type="email"]::-moz-placeholder, 
        .footer div.wpforms-container.wpforms-container-full .wpforms-form input[type="url"]::-moz-placeholder, 
        .footer div.wpforms-container.wpforms-container-full .wpforms-form input[type="password"]::-moz-placeholder, 
        .footer div.wpforms-container.wpforms-container-full .wpforms-form input[type="search"]::-moz-placeholder, 
        .footer div.wpforms-container.wpforms-container-full .wpforms-form input[type="number"]::-moz-placeholder, 
        .footer div.wpforms-container.wpforms-container-full .wpforms-form input[type="tel"]::-moz-placeholder,
        .footer div.wpforms-container.wpforms-container-full .wpforms-form input[type="date"]::-moz-placeholder,
        .footer div.wpforms-container.wpforms-container-full .wpforms-form input[type="month"]::-moz-placeholder, 
        .footer div.wpforms-container.wpforms-container-full .wpforms-form input[type="week"]::-moz-placeholder, 
        .footer div.wpforms-container.wpforms-container-full .wpforms-form input[type="time"]::-moz-placeholder, 
        .footer div.wpforms-container.wpforms-container-full .wpforms-form input[type="datetime"]::-moz-placeholder, 
        .footer div.wpforms-container.wpforms-container-full .wpforms-form input[type="datetime-local"]::-moz-placeholder, 
        .footer div.wpforms-container.wpforms-container-full .wpforms-form textarea::-moz-placeholder {
             color: ' . esc_attr($footer_light_text_color) . ';
        }
        .footer input[type="text"]:-ms-input-placeholder,
        .footer input[type="email"]:-ms-input-placeholder,
        .footer input[type="url"]:-ms-input-placeholder,
        .footer input[type="password"]:-ms-input-placeholder,
        .footer input[type="search"]:-ms-input-placeholder,
        .footer input[type="tel"]:-ms-input-placeholder, 
        .footer input[type="number"]:-ms-input-placeholder, 
        .footer input[type="date"]:-ms-input-placeholder, 
        .footer input[type="month"]:-ms-input-placeholder, 
        .footer input[type="week"]:-ms-input-placeholder, 
        .footer input[type="time"]:-ms-input-placeholder, 
        .footer input[type="datetime"]:-ms-input-placeholder, 
        .footer input[type="datetime-local"]:-ms-input-placeholder, 
        .footer textarea:-ms-input-placeholder,
        .footer div.wpforms-container.wpforms-container-full .wpforms-form input[type="text"]:-ms-input-placeholder, 
        .footer div.wpforms-container.wpforms-container-full .wpforms-form input[type="email"]:-ms-input-placeholder, 
        .footer div.wpforms-container.wpforms-container-full .wpforms-form input[type="url"]:-ms-input-placeholder, 
        .footer div.wpforms-container.wpforms-container-full .wpforms-form input[type="password"]:-ms-input-placeholder, 
        .footer div.wpforms-container.wpforms-container-full .wpforms-form input[type="search"]:-ms-input-placeholder, 
        .footer div.wpforms-container.wpforms-container-full .wpforms-form input[type="number"]:-ms-input-placeholder, 
        .footer div.wpforms-container.wpforms-container-full .wpforms-form input[type="tel"]:-ms-input-placeholder,
        .footer div.wpforms-container.wpforms-container-full .wpforms-form input[type="date"]:-ms-input-placeholder,
        .footer div.wpforms-container.wpforms-container-full .wpforms-form input[type="month"]:-ms-input-placeholder, 
        .footer div.wpforms-container.wpforms-container-full .wpforms-form input[type="week"]:-ms-input-placeholder, 
        .footer div.wpforms-container.wpforms-container-full .wpforms-form input[type="time"]:-ms-input-placeholder, 
        .footer div.wpforms-container.wpforms-container-full .wpforms-form input[type="datetime"]:-ms-input-placeholder, 
        .footer div.wpforms-container.wpforms-container-full .wpforms-form input[type="datetime-local"]:-ms-input-placeholder, 
        .footer div.wpforms-container.wpforms-container-full .wpforms-form textarea:-ms-input-placeholder {
            color: ' . esc_attr($footer_light_text_color) . ';
        }
    ';
}

$footer_accent_text_color = aiero_get_prepared_option('footer_accent_text_color', 'contrast_accent_text_color', 'footer_customize');
if ( !empty($footer_accent_text_color) ) {
    $aiero_custom_css .= '
        .footer a:hover,
        .footer .footer-additional-menu li a:hover,
        .footer .widget_recent_comments ul .recentcomments .comment-author-link a:hover,
        .footer .widget_media_audio .mejs-container .mejs-button > button:hover,
        .footer .wp-video .mejs-container .mejs-button > button:hover,
        .error-404-footer .wrapper-socials a:hover,
        .footer-widgets .widget_search .search-form .search-form-icon:hover,
        .footer-widgets .widget_rss ul a.rsswidget:hover,
        .footer-widgets .wp-block-rss .wp-block-rss__item-title a:hover,
        .footer-widgets .widget .widget-title a:hover,
        .footer-widgets .wp-block-search.wp-block-search__button-inside .wp-block-search__inside-wrapper .wp-block-search__button.has-icon:hover,
        .footer-widgets .wp-block-loginout a:hover,
        .footer-widgets .widget_calendar .wp-calendar-table:not(.has-text-color) thead th, 
        .footer-widgets .wp-block-calendar .wp-calendar-table:not(.has-text-color) thead th,
        .footer-widgets .widget_calendar .wp-calendar-table:not(.has-text-color) ~ .wp-calendar-nav a:hover,
        .footer-widgets .wp-block-calendar .wp-calendar-table:not(.has-text-color) ~ .wp-calendar-nav a:hover,
        .footer-widgets .widget_calendar .wp-calendar-table:not(.has-text-color) tbody td a, 
        .footer-widgets .wp-block-calendar .wp-calendar-table:not(.has-text-color) tbody td a,
        .footer-widgets .wp-block-search.wp-block-search__icon-button .wp-block-search__button.has-icon:hover,
        .footer-widgets .wp-block-social-links.is-style-logos-only:not(.has-icon-color) .wp-block-social-link a:hover svg {
            color: ' . esc_attr($footer_accent_text_color) . ';
        }
        .footer blockquote:before {
            color: rgba(' . esc_attr(aiero_hex2rgb($footer_accent_text_color)) . ', .3);
        }
        .footer .widget_media_audio .mejs-controls .mejs-time-rail .mejs-time-current,
        .footer .wp-video .mejs-controls .mejs-time-rail .mejs-time-current,
        .footer .widget_media_audio .mejs-controls .mejs-time-rail .mejs-time-handle-content,
        .footer .wp-video .mejs-controls .mejs-time-rail .mejs-time-handle-content,
        .footer-widgets .widget_calendar .wp-calendar-table:not(.has-text-color) tbody td#today:before, 
        .footer-widgets .wp-block-calendar .wp-calendar-table:not(.has-text-color) tbody td#today:before {
            background-color: ' . esc_attr($footer_accent_text_color) . ';
        }
        .footer .widget_media_audio .mejs-controls .mejs-time-rail .mejs-time-handle-content,
        .footer .wp-video .mejs-controls .mejs-time-rail .mejs-time-handle-content {
            border-color: ' . esc_attr($footer_accent_text_color) . ';
        }
    ';
}

$footer_input_dark_color = aiero_get_prepared_option('footer_input_dark_color', 'contrast_input_dark_color', 'footer_customize');
if ( !empty($footer_input_dark_color) ) {
    $aiero_custom_css .= '
        .footer-widgets input[type="radio"],
        .footer-widgets div.wpforms-container.wpforms-container-full .wpforms-form input[type="radio"],
        .footer-widgets input[type="checkbox"],
        .footer-widgets div.wpforms-container.wpforms-container-full .wpforms-form input[type="checkbox"],
        .footer-widgets div.wpforms-container.wpforms-container-full .wpforms-form .wpforms-field-number-slider input[type="range"] {
            background-color: ' . esc_attr($footer_input_dark_color) . ';
        }
    ';
}

$footer_border_color = aiero_get_prepared_option('footer_border_color', 'contrast_border_color', 'footer_customize');
if ( !empty($footer_border_color) ) {
    $aiero_custom_css .= '
        .footer-widgets {
            --wpforms-field-border-color: ' . esc_attr($footer_border_color) . ';
        }
        .footer-widgets input[type="text"],
        .footer-widgets input[type="email"],
        .footer-widgets input[type="url"],
        .footer-widgets input[type="password"],
        .footer-widgets input[type="search"],
        .footer-widgets input[type="number"],
        .footer-widgets input[type="tel"],
        .footer-widgets input[type="range"],
        .footer-widgets input[type="date"],
        .footer-widgets input[type="month"],
        .footer-widgets input[type="week"],
        .footer-widgets input[type="time"],
        .footer-widgets input[type="datetime"],
        .footer-widgets input[type="datetime-local"],
        .footer-widgets input[type="color"],
        .footer-widgets textarea,
        .footer-widgets input[type="checkbox"],
        .footer-widgets input[type="radio"],
        .footer-widgets div.wpforms-container.wpforms-container-full .wpforms-form input[type="checkbox"],
        .footer-widgets div.wpforms-container.wpforms-container-full .wpforms-form input[type="radio"],
        .footer-widgets .select2-container .select2-selection--single,
        .footer-widgets div.wpforms-container.wpforms-container-full .wpforms-form input[type="text"],
        .footer-widgets div.wpforms-container.wpforms-container-full .wpforms-form input[type="email"],
        .footer-widgets div.wpforms-container.wpforms-container-full .wpforms-form input[type="url"],
        .footer-widgets div.wpforms-container.wpforms-container-full .wpforms-form input[type="password"],
        .footer-widgets div.wpforms-container.wpforms-container-full .wpforms-form input[type="search"],
        .footer-widgets div.wpforms-container.wpforms-container-full .wpforms-form input[type="number"],
        .footer-widgets div.wpforms-container.wpforms-container-full .wpforms-form input[type="tel"],
        .footer-widgets div.wpforms-container.wpforms-container-full .wpforms-form input[type="date"],
        .footer-widgets div.wpforms-container.wpforms-container-full .wpforms-form input[type="month"],
        .footer-widgets div.wpforms-container.wpforms-container-full .wpforms-form input[type="week"],
        .footer-widgets div.wpforms-container.wpforms-container-full .wpforms-form input[type="time"],
        .footer-widgets div.wpforms-container.wpforms-container-full .wpforms-form input[type="datetime"],
        .footer-widgets div.wpforms-container.wpforms-container-full .wpforms-form input[type="datetime-local"],
        .footer-widgets div.wpforms-container.wpforms-container-full .wpforms-form input[type="color"],
        .footer-widgets div.wpforms-container.wpforms-container-full .wpforms-form select,
        .footer-widgets div.wpforms-container.wpforms-container-full .wpforms-form textarea,
        .footer-widgets .wp-block-search.wp-block-search__button-inside .wp-block-search__inside-wrapper,
        .footer-widgets .select-wrap,
        .footer-widgets .mc4wp-form .mc4wp-form-fields .form-field {
            border-color: ' . esc_attr($footer_border_color) . ';
        }
    ';
}

$footer_border_hover_color = aiero_get_prepared_option('footer_border_hover_color', 'contrast_border_hover_color', 'footer_customize');
if ( !empty($footer_border_hover_color) ) {
    $aiero_custom_css .= '
        .footer-widgets input[type="text"]:focus,
        .footer-widgets input[type="email"]:focus,
        .footer-widgets input[type="url"]:focus,
        .footer-widgets input[type="password"]:focus,
        .footer-widgets input[type="search"]:focus,
        .footer-widgets input[type="number"]:focus,
        .footer-widgets input[type="tel"]:focus,
        .footer-widgets input[type="range"]:focus,
        .footer-widgets input[type="date"]:focus,
        .footer-widgets input[type="month"]:focus,
        .footer-widgets input[type="week"]:focus,
        .footer-widgets input[type="time"]:focus,
        .footer-widgets input[type="datetime"]:focus,
        .footer-widgets input[type="datetime-local"]:focus,
        .footer-widgets input[type="color"]:focus,
        .footer-widgets textarea:focus,
        .footer-widgets div.wpforms-container.wpforms-container-full .wpforms-form input[type="text"]:focus,
        .footer-widgets div.wpforms-container.wpforms-container-full .wpforms-form input[type="email"]:focus,
        .footer-widgets div.wpforms-container.wpforms-container-full .wpforms-form input[type="url"]:focus,
        .footer-widgets div.wpforms-container.wpforms-container-full .wpforms-form input[type="password"]:focus,
        .footer-widgets div.wpforms-container.wpforms-container-full .wpforms-form input[type="search"]:focus,
        .footer-widgets div.wpforms-container.wpforms-container-full .wpforms-form input[type="number"]:focus,
        .footer-widgets div.wpforms-container.wpforms-container-full .wpforms-form input[type="tel"]:focus,
        .footer-widgets div.wpforms-container.wpforms-container-full .wpforms-form input[type="date"]:focus,
        .footer-widgets div.wpforms-container.wpforms-container-full .wpforms-form input[type="month"]:focus,
        .footer-widgets div.wpforms-container.wpforms-container-full .wpforms-form input[type="week"]:focus,
        .footer-widgets div.wpforms-container.wpforms-container-full .wpforms-form input[type="time"]:focus,
        .footer-widgets div.wpforms-container.wpforms-container-full .wpforms-form input[type="datetime"]:focus,
        .footer-widgets div.wpforms-container.wpforms-container-full .wpforms-form input[type="datetime-local"]:focus,
        .footer-widgets div.wpforms-container.wpforms-container-full .wpforms-form input[type="color"]:focus,
        .footer-widgets div.wpforms-container.wpforms-container-full .wpforms-form select:focus,
        .footer-widgets div.wpforms-container.wpforms-container-full .wpforms-form textarea:focus,
        .footer-widgets .wp-block-search.wp-block-search__button-inside .wp-block-search__inside-wrapper:focus-within,
        .footer-widgets .select-wrap:focus-within,
        .footer-widgets .mc4wp-form .mc4wp-form-fields .form-field:focus-within,
        .footer .footer-menu-container {
            border-color: ' . esc_attr($footer_border_hover_color) . ';
        }
        .footer .widget_media_audio .mejs-container, 
        .footer .widget_media_audio .mejs-container .mejs-controls, 
        .footer .widget_media_audio .mejs-embed, 
        .footer .widget_media_audio .mejs-embed body,
        .footer .wp-video .mejs-container, 
        .footer .wp-video .mejs-container .mejs-controls, 
        .footer .wp-video .mejs-embed, 
        .footer .wp-video .mejs-embed body,
        .footer .mejs-volume-button > .mejs-volume-slider,
        .prefooter-section:not(:last-child) .footer-row:before,
        .footer.footer-type-3 .footer-section-bottom:not(:first-of-type) .footer-columns-row:before,
        .footer.footer-type-4 .footer-section-bottom:not(:first-of-type) .footer-columns-row:before {
            background-color: ' . esc_attr($footer_border_hover_color) . ';
        }
        .footer .select2-container .select2-selection--single {
            color: ' . esc_attr($footer_border_hover_color) . ';
        }
    ';
}

$footer_background_color = aiero_get_prepared_option('footer_background_color', 'contrast_background_color', 'footer_customize');
if ( !empty($footer_background_color) ) {
    $aiero_custom_css .= '
        .footer,
        .footer .input-floating-wrap .floating-placeholder,
        .footer input[type="text"],
        .footer input[type="email"],
        .footer input[type="url"],
        .footer input[type="password"],
        .footer input[type="search"],
        .footer input[type="number"],
        .footer input[type="tel"],
        .footer input[type="range"],
        .footer input[type="date"],
        .footer input[type="month"],
        .footer input[type="week"],
        .footer input[type="time"],
        .footer input[type="datetime"],
        .footer input[type="datetime-local"],
        .footer input[type="color"],
        .footer .select-wrap,
        .footer .select2-container .select2-selection--single,
        .footer textarea,
        .footer div.wpforms-container.wpforms-container-full .wpforms-form input[type="text"],
        .footer div.wpforms-container.wpforms-container-full .wpforms-form input[type="email"],
        .footer div.wpforms-container.wpforms-container-full .wpforms-form input[type="url"],
        .footer div.wpforms-container.wpforms-container-full .wpforms-form input[type="password"],
        .footer div.wpforms-container.wpforms-container-full .wpforms-form input[type="search"],
        .footer div.wpforms-container.wpforms-container-full .wpforms-form input[type="number"],
        .footer div.wpforms-container.wpforms-container-full .wpforms-form input[type="tel"],
        .footer div.wpforms-container.wpforms-container-full .wpforms-form input[type="date"],
        .footer div.wpforms-container.wpforms-container-full .wpforms-form input[type="month"],
        .footer div.wpforms-container.wpforms-container-full .wpforms-form input[type="week"],
        .footer div.wpforms-container.wpforms-container-full .wpforms-form input[type="time"],
        .footer div.wpforms-container.wpforms-container-full .wpforms-form input[type="datetime"],
        .footer div.wpforms-container.wpforms-container-full .wpforms-form input[type="datetime-local"],
        .footer div.wpforms-container.wpforms-container-full .wpforms-form input[type="color"],
        .footer div.wpforms-container.wpforms-container-full .wpforms-form select,
        .footer div.wpforms-container.wpforms-container-full .wpforms-form textarea {
            background-color: ' . esc_attr($footer_background_color) . ';
        }        
        .footer div.wpforms-container.wpforms-container-full .wpforms-form .wpforms-field-number-slider input[type="range"]::-webkit-slider-thumb {
            background-color: ' . esc_attr($footer_background_color) . ';
        }
        .footer div.wpforms-container.wpforms-container-full .wpforms-form .wpforms-field-number-slider input[type="range"]::-moz-range-thumb {
             background-color: ' . esc_attr($footer_background_color) . ';
        }
        .footer div.wpforms-container.wpforms-container-full .wpforms-form .wpforms-field-number-slider input[type="range"]::-ms-thumb {
             background-color: ' . esc_attr($footer_background_color) . ';
        }
        .footer div.wpforms-container.wpforms-container-full .wpforms-form .wpforms-field-number-slider input[type="range"]:focus::-ms-thumb {
             background-color: ' . esc_attr($footer_background_color) . ';
        }        
    ';
}

$footer_background_alter_color = aiero_get_prepared_option('footer_background_alter_color', 'contrast_background_alter_color', 'footer_customize');
if ( !empty($footer_background_alter_color) ) {
    $aiero_custom_css .= '
        .footer-widgets .widget_tag_cloud .tagcloud .tag-cloud-link,
        .footer-widgets .wp-block-tag-cloud .tag-cloud-link,
        .footer-widgets .calendar_wrap, 
        .footer-widgets .wp-block-calendar {
            background-color: ' . esc_attr($footer_background_alter_color) . ';
        }
    ';
}

$footer_button_text_color = aiero_get_prepared_option('footer_button_text_color', 'contrast_button_text_color', 'footer_customize');
if ( !empty($footer_button_text_color) ) {
    $aiero_custom_css .= '
        .footer-widgets {
            --wpforms-button-text-color: ' . esc_attr($footer_button_text_color) . '
        }
        .footer-widgets .wrapper-socials a,
        .footer-widgets .wrapper-socials a:hover,
        .footer-widgets .aiero-button,
        .footer-widgets .button,
        .footer-widgets input[type="submit"],
        .footer-widgets input[type="reset"],
        .footer-widgets input[type="button"],
        .footer-widgets button,
        .footer-widgets .wp-block-gallery .blocks-gallery-grid .blocks-gallery-item a:after, 
        .footer-widgets .media_gallery .blocks-gallery-grid .blocks-gallery-item a:after,
        .footer-widgets .gallery .gallery-item .gallery-icon a:after,
        .footer-widgets .wp-block-button:not(.is-style-outline):not(.is-style-fill) .wp-block-button__link:not(.has-text-color),
        .footer-widgets .mc4wp-form .mc4wp-form-fields button {
            color: ' . esc_attr($footer_button_text_color) . ';
        }
        .footer-widgets .wp-block-social-links.is-style-default:not(.has-icon-color) .wp-social-link a.wp-block-social-link-anchor svg,
        .footer-widgets .wp-block-social-links.is-style-default:not(.has-icon-color) .wp-social-link:hover a.wp-block-social-link-anchor svg {
            color: ' . esc_attr($footer_button_text_color) . ';
        }
    ';
}
$footer_button_border_style = aiero_get_prepared_option('footer_button_border_style', 'contrast_button_border_style', 'footer_customize');
if ( $footer_button_border_style == 'solid' ) {
    $aiero_custom_css .= '
        .footer .aiero-button .button-inner,
        .footer button:not(.customize-partial-edit-shortcut-button) .button-inner,
        .footer div.wpforms-container-full .wpforms-form button[type=submit] .button-inner, 
        .footer div.wpforms-container-full .wpforms-form .wpforms-page-button .button-inner,
        .footer-widgets .wp-block-button:not(.is-style-outline):not(.is-style-fill) .wp-block-button__link .button-inner,
        .footer-widgets .mc4wp-form .mc4wp-form-fields button .button-inner {
            top: 0;
            left: 0;
            right: 0;
            bottom: 0;
        }
    ';
}
$footer_button_border_color = aiero_get_prepared_option('footer_button_border_color', 'contrast_button_border_color', 'footer_customize');
$footer_button_border_color_add = aiero_get_prepared_option('footer_button_border_color_add', 'contrast_button_border_color_add', 'footer_customize');
if( $footer_button_border_style == 'gradient' && ( !empty($footer_button_border_color) && !empty($footer_button_border_color_add) )) {
    $aiero_custom_css .= '
        .footer .aiero-button:after,
        .footer button:not(.customize-partial-edit-shortcut-button):after,
        .footer div.wpforms-container-full .wpforms-form button[type=submit]:after, 
        .footer div.wpforms-container-full .wpforms-form .wpforms-page-button:after,
        .footer-widgets .wp-block-button:not(.is-style-outline):not(.is-style-fill) .wp-block-button__link:after,
        .footer-widgets .mc4wp-form .mc4wp-form-fields button:after {
            background: linear-gradient(var(--button-border-gradient-angle), ' . esc_attr($footer_button_border_color) . ' var(--button-gradient-colorstop-1), ' . esc_attr($footer_button_border_color_add) . ' var(--button-gradient-colorstop-2));
        }
    ';
} elseif ( $footer_button_border_style == 'solid' && !empty($footer_button_border_color)) {
    $aiero_custom_css .= '
        .footer .aiero-button,
        .footer button:not(.customize-partial-edit-shortcut-button),
        .footer div.wpforms-container-full .wpforms-form button[type=submit], 
        .footer div.wpforms-container-full .wpforms-form .wpforms-page-button,
        .footer-widgets .wp-block-button:not(.is-style-outline):not(.is-style-fill) .wp-block-button__link,
        .footer-widgets .mc4wp-form .mc4wp-form-fields button {
            border-color: ' . esc_attr($footer_button_border_color) . ';
        }
    ';
}

if( !empty($footer_accent_text_color) && !empty($footer_button_border_color_add) ) {
    $aiero_custom_css .= '
        .footer .widget_aiero_special_text_widget .aiero-special-text-widget-text {
            background: linear-gradient(var(--special-text-gradient-angle), ' . esc_attr($footer_accent_text_color) . ' var(--special-text-gradient-colorstop-1), ' . esc_attr($footer_button_border_color_add) . ' var(--special-text-gradient-colorstop-2));
        }
    ';
}

if ( !empty($footer_button_border_color) ) {
    $aiero_custom_css .= '
        .footer-widgets .wrapper-socials a,
        .footer-widgets .wp-block-social-links.is-style-default:not(.has-icon-background-color) .wp-social-link a.wp-block-social-link-anchor {
            background-color: ' . esc_attr($footer_button_border_color) . ';
        }
        .footer input[type="submit"],
        .footer input[type="button"],
        .footer input[type="reset"],
        .footer div.wpforms-container-full .wpforms-form input[type=submit],
        .footer-widgets .wrapper-socials a {
            border-color: ' . esc_attr($footer_button_border_color) . ';
        }
        .footer-widgets .wp-block-gallery .blocks-gallery-grid .blocks-gallery-item a:before, 
        .footer-widgets .media_gallery .blocks-gallery-grid .blocks-gallery-item a:before,
        .footer-widgets .gallery .gallery-item .gallery-icon a:before {
             background-color: rgba(' . esc_attr(aiero_hex2rgb($footer_button_border_color)) . ', 0.5);
        }
    ';
}

$footer_button_background_style = aiero_get_prepared_option('footer_button_background_style', 'contrast_button_background_style', 'footer_customize');
$footer_button_background_color = aiero_get_prepared_option('footer_button_background_color', 'contrast_button_background_color', 'footer_customize');
$footer_button_background_color_add = aiero_get_prepared_option('footer_button_background_color_add', 'contrast_button_background_color_add', 'footer_customize');
if( $footer_button_background_style == 'gradient' && ( !empty($footer_button_background_color) && !empty($footer_button_background_color_add) )) {
    $aiero_custom_css .= '
        .footer button:not(.customize-partial-edit-shortcut-button),
        .footer input[type="submit"],
        .footer input[type="button"],
        .footer input[type="reset"],
        .footer div.wpforms-container-full .wpforms-form input[type=submit],
        .footer div.wpforms-container-full .wpforms-form button[type=submit] .button-inner:before, 
        .footer div.wpforms-container-full .wpforms-form .wpforms-page-button .button-inner:before,
        .footer .wp-block-search .wp-block-search__button .button-inner:before,
        .footer-widgets .wp-block-button:not(.is-style-outline):not(.is-style-fill) .wp-block-button__link:not(.has-background) .button-inner:before,
        .footer-widgets .mc4wp-form .mc4wp-form-fields button .button-inner:before {
            background: linear-gradient(var(--button-border-gradient-angle), ' . esc_attr($footer_button_background_color) . ' var(--button-gradient-colorstop-1), ' . esc_attr($footer_button_background_color_add) . ' var(--button-gradient-colorstop-2));
        }
        .footer div.wpforms-container-full .wpforms-form button[type=submit],
        .footer div.wpforms-container-full .wpforms-form .wpforms-page-button,
        .footer .wp-block-search .wp-block-search__button,
        .footer-widgets .mc4wp-form .mc4wp-form-fields button {
            background: none;
        }
    ';
} elseif ( $footer_button_background_style == 'solid' && !empty($footer_button_background_color)) {
    $aiero_custom_css .= '
        .footer button:not(.customize-partial-edit-shortcut-button),
        .footer input[type="submit"],
        .footer input[type="button"],
        .footer input[type="reset"],
        .footer div.wpforms-container-full .wpforms-form input[type=submit]:not(:hover):not(:active),
        .footer div.wpforms-container-full .wpforms-form button[type=submit]:not(:hover):not(:active), 
        .footer div.wpforms-container-full .wpforms-form .wpforms-page-button:not(:hover):not(:active),
        .footer .wp-block-search .wp-block-search__button,
        .footer-widgets .wp-block-button:not(.is-style-outline):not(.is-style-fill) .wp-block-button__link:not(.has-background),
        .footer-widgets .mc4wp-form .mc4wp-form-fields button {
            background-color: ' . esc_attr($footer_button_background_color) . ';
        }
    ';
}

if ( !empty($footer_button_background_color) ) {
    $aiero_custom_css .= '
        .footer-widgets {
            --wpforms-button-background-color: ' . esc_attr($footer_button_background_color) . '
        }
    ';
}

$footer_button_text_hover = aiero_get_prepared_option('footer_button_text_hover', 'contrast_button_text_hover', 'footer_customize');
if ( !empty($footer_button_text_hover) ) {
    $aiero_custom_css .= '
        .footer-widgets .aiero-button:hover,
        .footer-widgets .button:hover,
        .footer-widgets input[type="submit"]:hover,
        .footer-widgets input[type="reset"]:hover,
        .footer-widgets input[type="button"]:hover,
        .footer-widgets button:hover,
        .footer-widgets .wp-block-button:not(.is-style-outline):not(.is-style-fill) .wp-block-button__link:not(.has-text-color):hover,
        .footer-widgets .mc4wp-form .mc4wp-form-fields button:hover {
            color: ' . esc_attr($footer_button_text_hover) . ';
        }
    ';
}

$footer_button_border_hover = aiero_get_prepared_option('footer_button_border_hover', 'contrast_button_border_hover', 'footer_customize');
$footer_button_border_hover_add = aiero_get_prepared_option('footer_button_border_hover_add', 'contrast_button_border_hover_add', 'footer_customize');
if( $footer_button_border_style == 'gradient' && ( !empty($footer_button_border_hover) && !empty($footer_button_border_hover_add) )) {
    $aiero_custom_css .= '
        .footer .aiero-button:hover:after,
        .footer button:not(.customize-partial-edit-shortcut-button):hover:after,
        .footer div.wpforms-container-full .wpforms-form button[type=submit]:hover:after, 
        .footer div.wpforms-container-full .wpforms-form .wpforms-page-button:hover:after,
        .footer-widgets .wp-block-button:not(.is-style-outline):not(.is-style-fill) .wp-block-button__link:hover:after,
        .footer-widgets .mc4wp-form .mc4wp-form-fields button:after {
            background: linear-gradient(var(--button-border-gradient-angle), ' . esc_attr($footer_button_border_hover) . ' var(--button-gradient-colorstop-1), ' . esc_attr($footer_button_border_hover_add) . ' var(--button-gradient-colorstop-2));
        }
    ';
} elseif ( $footer_button_border_style == 'solid' && !empty($footer_button_border_hover)) {
    $aiero_custom_css .= '
        .footer .aiero-button:hover,
        .footer button:not(.customize-partial-edit-shortcut-button):hover,
        .footer div.wpforms-container-full .wpforms-form button[type=submit]:hover, 
        .footer div.wpforms-container-full .wpforms-form .wpforms-page-button:hover,
        .footer-widgets .wp-block-button:not(.is-style-outline):not(.is-style-fill) .wp-block-button__link:hover,
        .footer-widgets .mc4wp-form .mc4wp-form-fields button:hover {
            border-color: ' . esc_attr($footer_button_border_hover) . ';
        }
    ';
}

if ( !empty($footer_button_border_hover) ) {
    $aiero_custom_css .= '
        .footer input[type="submit"]:hover,
        .footer input[type="button"]:hover,
        .footer input[type="reset"]:hover,
        .footer div.wpforms-container-full .wpforms-form input[type=submit]:hover,
        .footer-widgets .wp-block-file a.wp-block-file__button:hover {
            border-color: ' . esc_attr($footer_button_border_hover) . ';
        }
    ';
}

if ( !empty($footer_button_background_hover) ) {
    $aiero_custom_css .= '
        .footer {
            --wpforms-button-background-color-alt: ' . esc_attr($footer_button_background_hover) . ';
        }
        .footer-widgets .wp-block-file a.wp-block-file__button:hover {
            background-color: ' . esc_attr($footer_button_background_hover) . ';
        }
    ';
}

$footer_button_background_style = aiero_get_prepared_option('footer_button_background_style', 'contrast_button_background_style', 'footer_customize');
$footer_button_background_hover = aiero_get_prepared_option('footer_button_background_hover', 'contrast_button_background_hover', 'footer_customize');
$footer_button_background_hover_add = aiero_get_prepared_option('footer_button_background_hover_add', 'contrast_button_background_hover_add', 'footer_customize');
if( $footer_button_background_style == 'gradient' && ( !empty($footer_button_background_hover) && !empty($footer_button_background_hover_add) )) {
    $aiero_custom_css .= '
        .footer button:not(.customize-partial-edit-shortcut-button):hover,
        .footer input[type="submit"]:hover,
        .footer input[type="button"]:hover,
        .footer input[type="reset"]:hover,
        .footer div.wpforms-container-full .wpforms-form input[type=submit]:hover,
        .footer div.wpforms-container-full .wpforms-form button[type=submit] .button-inner:after, 
        .footer div.wpforms-container-full .wpforms-form .wpforms-page-button .button-inner:after,
        .footer .wp-block-search .wp-block-search__button .button-inner:after,
        .footer-widgets .wp-block-button:not(.is-style-outline):not(.is-style-fill) .wp-block-button__link:not(.has-background) .button-inner:after,
        .footer-widgets .mc4wp-form .mc4wp-form-fields button .button-inner:after {
            background: linear-gradient(var(--button-border-gradient-angle), ' . esc_attr($footer_button_background_hover) . ' var(--button-gradient-colorstop-1), ' . esc_attr($footer_button_background_hover_add) . ' var(--button-gradient-colorstop-2));
        }
        .footer div.wpforms-container-full .wpforms-form button[type=submit]:hover,
        .footer div.wpforms-container-full .wpforms-form .wpforms-page-button:hover,
        .footer .wp-block-search .wp-block-search__button:hover,
        .footer-widgets .mc4wp-form .mc4wp-form-fields button:hover {
            background: none;
        }
    ';
} elseif ( $footer_button_background_style == 'solid' && !empty($footer_button_background_hover)) {
    $aiero_custom_css .= '
        .footer button:not(.customize-partial-edit-shortcut-button):hover,
        .footer input[type="submit"]:hover,
        .footer input[type="button"]:hover,
        .footer input[type="reset"]:hover,
        .footer div.wpforms-container-full .wpforms-form input[type=submit],
        .footer div.wpforms-container-full .wpforms-form button[type=submit]:hover, 
        .footer div.wpforms-container-full .wpforms-form .wpforms-page-button:hover,
        .footer .wp-block-search .wp-block-search__button:hover,
        .footer .wp-block-button:not(.is-style-outline):not(.is-style-fill) .wp-block-button__link:not(.has-background):hover,
        .footer-widgets .mc4wp-form .mc4wp-form-fields button:hover {
            background-color: ' . esc_attr($footer_button_background_hover) . ';
        }
    ';
}
