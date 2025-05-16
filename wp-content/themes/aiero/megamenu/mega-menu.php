<?php
/*
 * Created by Artureanec
*/

function megamenu_add_theme_aiero_1745951436($themes) {
    $themes["aiero_1745951436"] = array(
        'title' => 'Aiero',
        'container_background_from' => 'rgba(0, 0, 0, 0)',
        'container_background_to' => 'rgba(0, 0, 0, 0)',
        'menu_item_align' => 'center',
        'menu_item_background_from' => 'rgba(0, 0, 0, 0)',
        'menu_item_background_hover_from' => 'rgb(240, 242, 244)',
        'menu_item_background_hover_to' => 'rgb(240, 242, 244)',
        'menu_item_spacing' => '2px',
        'menu_item_link_color' => 'rgb(51, 51, 51)',
        'menu_item_link_weight' => 'bold',
        'menu_item_link_text_transform' => 'uppercase',
        'menu_item_link_color_hover' => 'rgb(51, 51, 51)',
        'menu_item_link_weight_hover' => 'bold',
        'menu_item_link_padding_left' => '21px',
        'menu_item_link_padding_right' => '21px',
        'menu_item_link_border_radius_top_left' => '10px',
        'menu_item_link_border_radius_top_right' => '10px',
        'menu_item_link_border_radius_bottom_left' => '10px',
        'menu_item_link_border_radius_bottom_right' => '10px',
        'panel_background_from' => 'rgb(31, 31, 31)',
        'panel_background_to' => 'rgb(31, 31, 31)',
        'panel_width' => '965px',
        'panel_border_radius_top_left' => '20px',
        'panel_border_radius_top_right' => '20px',
        'panel_border_radius_bottom_left' => '20px',
        'panel_border_radius_bottom_right' => '20px',
        'panel_header_color' => 'rgb(245, 245, 245)',
        'panel_header_text_transform' => 'none',
        'panel_padding_left' => '50px',
        'panel_padding_right' => '45px',
        'panel_padding_top' => '40px',
        'panel_padding_bottom' => '40px',
        'panel_widget_padding_left' => '0px',
        'panel_widget_padding_right' => '0px',
        'panel_widget_padding_top' => '0px',
        'panel_widget_padding_bottom' => '0px',
        'panel_font_size' => '14px',
        'panel_font_color' => 'rgb(245, 245, 245)',
        'panel_font_family' => 'inherit',
        'panel_second_level_font_color' => 'rgb(245, 245, 245)',
        'panel_second_level_font_color_hover' => 'rgb(69, 208, 189)',
        'panel_second_level_text_transform' => 'none',
        'panel_second_level_font' => 'inherit',
        'panel_second_level_font_size' => '17px',
        'panel_second_level_font_weight' => 'normal',
        'panel_second_level_font_weight_hover' => 'normal',
        'panel_second_level_text_decoration' => 'none',
        'panel_second_level_text_decoration_hover' => 'none',
        'panel_second_level_padding_right' => '20px',
        'panel_second_level_padding_top' => '10px',
        'panel_second_level_padding_bottom' => '10px',
        'panel_third_level_font_color' => 'rgb(245, 245, 245)',
        'panel_third_level_font_color_hover' => 'rgb(69, 208, 189)',
        'panel_third_level_font' => 'inherit',
        'panel_third_level_font_size' => '14px',
        'panel_third_level_padding_right' => '20px',
        'panel_third_level_padding_top' => '10px',
        'panel_third_level_padding_bottom' => '10px',
        'flyout_width' => '286px',
        'flyout_menu_background_from' => 'rgb(31, 31, 31)',
        'flyout_menu_background_to' => 'rgb(31, 31, 31)',
        'flyout_border_radius_top_left' => '20px',
        'flyout_border_radius_top_right' => '20px',
        'flyout_border_radius_bottom_left' => '20px',
        'flyout_border_radius_bottom_right' => '20px',
        'flyout_padding_top' => '40px',
        'flyout_padding_right' => '45px',
        'flyout_padding_bottom' => '40px',
        'flyout_padding_left' => '50px',
        'flyout_link_padding_left' => '0px',
        'flyout_link_padding_right' => '15px',
        'flyout_link_padding_top' => '10px',
        'flyout_link_padding_bottom' => '10px',
        'flyout_link_height' => '25px',
        'flyout_background_from' => 'rgba(241, 241, 241, 0)',
        'flyout_background_to' => 'rgba(241, 241, 241, 0)',
        'flyout_background_hover_from' => 'rgba(241, 241, 241, 0)',
        'flyout_background_hover_to' => 'rgba(241, 241, 241, 0)',
        'flyout_link_size' => '17px',
        'flyout_link_color' => 'rgb(245, 245, 245)',
        'flyout_link_color_hover' => 'rgb(69, 208, 189)',
        'flyout_link_family' => 'inherit',
        'responsive_breakpoint' => '1364px',
        'line_height' => '1.5',
        'transitions' => 'on',
        'toggle_background_from' => '#222',
        'toggle_background_to' => '#222',
        'mobile_menu_padding_left' => '40px',
        'mobile_menu_padding_right' => '42px',
        'mobile_menu_padding_top' => '15px',
        'mobile_menu_item_height' => '34px',
        'mobile_background_from' => 'rgba(241, 241, 241, 0)',
        'mobile_background_to' => 'rgba(241, 241, 241, 0)',
        'mobile_menu_item_link_font_size' => '14px',
        'mobile_menu_item_link_color' => 'rgb(51, 51, 51)',
        'mobile_menu_item_link_text_align' => 'left',
        'mobile_menu_item_link_color_hover' => 'rgb(69, 208, 189)',
        'mobile_menu_item_background_hover_from' => 'rgba(241, 241, 241, 0)',
        'mobile_menu_item_background_hover_to' => 'rgba(241, 241, 241, 0)',
        'disable_mobile_toggle' => 'on',
        'custom_css' => '/** Push menu onto new line **/ 
            #{$wrap} { 
                clear: both;
                width: 100%;
                text-align: center;
            }
            #{$wrap} #{$menu} > li.mega-menu-item:last-child {
                margin: 0;
            }
            #{$wrap} #{$menu} > li.mega-menu-flyout ul.mega-sub-menu,
            #{$wrap} #{$menu} > li.mega-menu-megamenu > ul.mega-sub-menu {
                top: 100%;
            }
            #{$wrap} #{$menu} li.mega-align-bottom-left.mega-toggle-on > a.mega-menu-link {
                @include border-radius( $menu_item_link_border_radius_top_left, $menu_item_link_border_radius_top_right, $menu_item_link_border_radius_bottom_right, $menu_item_link_border_radius_bottom_left);
            }
            #{$wrap} #{$menu} li.mega-align-bottom-right.mega-toggle-on > a.mega-menu-link {
                @include border-radius( $menu_item_link_border_radius_top_left, $menu_item_link_border_radius_top_right, $menu_item_link_border_radius_bottom_right, $menu_item_link_border_radius_bottom_left);
            }
            /* Apply Hover Styling to active Mega Menu - Second Level Links */
            #{$wrap} #{$menu} > li.mega-menu-megamenu > ul.mega-sub-menu > li.mega-menu-item.mega-current-menu-item > a.mega-menu-link,
            #{$wrap} #{$menu} > li.mega-menu-megamenu > ul.mega-sub-menu li.mega-menu-column > ul.mega-sub-menu > li.mega-menu-item.mega-current-menu-item > a.mega-menu-link {
                color: $panel_second_level_font_color_hover;
                font-weight: $panel_second_level_font_weight_hover;
                text-decoration: $panel_second_level_text_decoration_hover;
                @include background($panel_second_level_background_hover_from, $panel_second_level_background_hover_to);
            }
             
            /* Apply Hover Styling to active Mega Menu - Third Level Links */
            #{$wrap} #{$menu} > li.mega-menu-megamenu > ul.mega-sub-menu > li.mega-menu-item li.mega-menu-item.mega-current-menu-item > a.mega-menu-link,
            #{$wrap} #{$menu} > li.mega-menu-megamenu > ul.mega-sub-menu li.mega-menu-column > ul.mega-sub-menu > li.mega-menu-item li.mega-menu-item.mega-current-menu-item > a.mega-menu-link {
                color: $panel_third_level_font_color_hover;
                font-weight: $panel_third_level_font_weight_hover;
                text-decoration: $panel_third_level_text_decoration_hover;
                @include background($panel_third_level_background_hover_from, $panel_third_level_background_hover_to);
            }
            /* Apply Hover Styling to active Flyout Links and ancestors */
            #{$wrap} #{$menu} li.mega-menu-flyout ul.mega-sub-menu li.mega-menu-item.mega-current-menu-item > a.mega-menu-link,
            #{$wrap} #{$menu} li.mega-menu-flyout ul.mega-sub-menu li.mega-menu-item.mega-current-menu-ancestor > a.mega-menu-link,
            #{$wrap} #{$menu} li.mega-menu-flyout ul.mega-sub-menu li.mega-menu-item.mega-current-page-ancestor > a.mega-menu-link {
                @include background($flyout_background_hover_from, $flyout_background_hover_to);
                font-weight: $flyout_link_weight_hover;
                text-decoration: $flyout_link_text_decoration_hover;
                color: $flyout_link_color_hover;
            }
            @include desktop {
                #{$wrap} #{$menu} > li.mega-menu-item {
                    padding: 13px 0;
                }
                #{$wrap} #{$menu} > li.mega-menu-item > a.mega-menu-link:after {
                    content: \'\';
                    display: block;
                    position: absolute;
                    left: 0;
                    top: 0;
                    width: 100%;
                    height: 100%;
                    border: 1px solid transparent;
                    border-radius: inherit;
                    box-sizing: border-box;
                }
                #{$wrap} #{$menu} > li.mega-menu-flyout ul.mega-sub-menu li.mega-menu-item ul.mega-sub-menu {
                    top: -40px;
                    margin: 0 0 0 46px;
                }
                .header #{$wrap} #{$menu} > li.mega-menu-item {
                    &.mega-current-menu-item,
                    &.mega-current-menu-ancestor,
                    &.mega-current-page-ancestor {
                         > a.mega-menu-link {
                             background: #1f1f1f;
                             color: #f5f5f5;                     
                        }
                    }
                }
                #{$wrap} #{$menu} > li.mega-menu-megamenu > ul.mega-sub-menu li.mega-menu-item > a.mega-menu-link,
                #{$wrap} #{$menu} > li.mega-menu-flyout ul.mega-sub-menu li.mega-menu-item a.mega-menu-link {
                    transition: all .3s;
                }
                #{$wrap} #{$menu} > li.mega-menu-megamenu > ul.mega-sub-menu li.mega-menu-item > a.mega-menu-link:before,
                #{$wrap} #{$menu} > li.mega-menu-flyout ul.mega-sub-menu li.mega-menu-item a.mega-menu-link:before {
                    content: \"\\\e841\";
                    font: 400 normal 10px / 10px \"fontello\";
                    line-height: 25.5px;
                    bottom: 8px;
                    position: absolute;
                    display: block;
                    left: 0;
                    right: initial;
                    width: 16px;
                    opacity: 0;
                    -webkit-transition: opacity 0.4s;
                    transition: opacity 0.4s;
                }
                #{$wrap} #{$menu} > li.mega-menu-megamenu > ul.mega-sub-menu li.mega-menu-item:hover > a.mega-menu-link,
                #{$wrap} #{$menu} > li.mega-menu-megamenu > ul.mega-sub-menu li.mega-menu-item.mega-current-menu-item > a.mega-menu-link {
                    padding: 10px 0px 10px 20px !important;
                    &:before {
                        opacity: 1;
                    }
                }
                #{$wrap} #{$menu} > li.mega-menu-flyout ul.mega-sub-menu li.mega-menu-item:hover > a.mega-menu-link,
                #{$wrap} #{$menu} > li.mega-menu-flyout ul.mega-sub-menu li.mega-menu-item.mega-current-menu-item a.mega-menu-link{
                    padding: 10px 15px 10px 20px !important;
                    &:before {
                        opacity: 1;
                    }
                }
                #{$wrap} #{$menu} > li.mega-menu-megamenu > ul.mega-sub-menu li.mega-menu-item-has-children > a.mega-menu-link > span.mega-indicator:after,
                #{$wrap} #{$menu} > li.mega-menu-flyout ul.mega-sub-menu li.mega-menu-item-has-children > a.mega-menu-link > span.mega-indicator:after {
                    position: relative;
                    bottom: 2px;
                    content: \"\\\e801\" !important;
                    font: 400 normal 5px / 5px \"fontello\";
                    width: auto;
                    height: 1em;
                    text-align: center;
                    -webkit-transition: transform 0.3s;
                    transition: transform 0.3s;
                }
                #{$wrap} #{$menu} > li.mega-menu-megamenu > ul.mega-sub-menu li.mega-menu-item-has-children:hover > a.mega-menu-link > span.mega-indicator:after,
                #{$wrap} #{$menu} > li.mega-menu-flyout ul.mega-sub-menu li.mega-menu-item-has-children:hover > a.mega-menu-link > span.mega-indicator:after {
                    -webkit-transform: rotate(-90deg);
                    -ms-transform: rotate(-90deg);
                    transform: rotate(-90deg);
                }
                
                /* Animated top menu items */
                #{$wrap} #{$menu} > li.mega-menu-item > a.mega-menu-link {
                    overflow: hidden;
                }
                #{$wrap} #{$menu} > li.mega-menu-item > a.mega-menu-link > span.text-active {
                    display: inline-block;
                    -webkit-transition: transform 0.3s, opacity 0.3s;
                    transition: transform 0.3s, opacity 0.3s;
                }
                #{$wrap} #{$menu} > li.mega-menu-item > a.mega-menu-link:hover > span.text-active {
                    opacity: 0;
                    -webkit-transform: translateY(-150%);
                    -ms-transform: translateY(-150%);
                    transform: translateY(-150%);
                }
                #{$wrap} #{$menu} > li.mega-menu-item > a.mega-menu-link > span:not(.text-active):not(.mega-indicator) {
                    position: absolute;
                    padding: inherit;
                    left: 0;
                    top: 0;
                    opacity: 0;
                    -webkit-transition: transform 0.3s, opacity 0.3s;
                    transition: transform 0.3s, opacity 0.3s;
                    -webkit-transform: translateY(150%);
                    -ms-transform: translateY(150%);
                    transform: translateY(150%);
                }
                #{$wrap} #{$menu} > li.mega-menu-item > a.mega-menu-link:hover > span:not(.text-active):not(.mega-indicator) {
                    opacity: 1;
                    -webkit-transform: translateY(0);
                    -ms-transform: translateY(0);
                    transform: translateY(0);
                }
            }

            @include mobile {
                #{$wrap} #{$menu} > li.mega-menu-megamenu > ul.mega-sub-menu > li.mega-menu-item > a.mega-menu-link, 
                #{$wrap} #{$menu} > li.mega-menu-megamenu > ul.mega-sub-menu li.mega-menu-column > ul.mega-sub-menu > li.mega-menu-item > a.mega-menu-link,
                #{$wrap} #{$menu} > li.mega-menu-flyout ul.mega-sub-menu li.mega-menu-item a.mega-menu-link,
                #{$wrap} #{$menu} > li.mega-menu-megamenu > ul.mega-sub-menu > li.mega-menu-item li.mega-menu-item > a.mega-menu-link,      
                #{$wrap} #{$menu} > li.mega-menu-megamenu > ul.mega-sub-menu li.mega-menu-column > ul.mega-sub-menu > li.mega-menu-item li.mega-menu-item > a.mega-menu-link {
                    font-size: 16px;
                    font-weight: 600;
                    padding: 8px 0;
                    color: $mobile_menu_item_link_color;
                }
                #{$wrap} #{$menu} > li.mega-menu-item a.mega-menu-link:hover,
                #{$wrap} #{$menu} > li.mega-menu-megamenu > ul.mega-sub-menu > li.mega-menu-item.mega-current-menu-item > a.mega-menu-link, 
                #{$wrap} #{$menu} > li.mega-menu-megamenu > ul.mega-sub-menu li.mega-menu-column > ul.mega-sub-menu > li.mega-menu-item.mega-current-menu-item > a.mega-menu-link,
                #{$wrap} #{$menu} li.mega-menu-flyout ul.mega-sub-menu li.mega-menu-item.mega-current-menu-item > a.mega-menu-link, 
                #{$wrap} #{$menu} li.mega-menu-flyout ul.mega-sub-menu li.mega-menu-item.mega-current-menu-ancestor > a.mega-menu-link, 
                #{$wrap} #{$menu} li.mega-menu-flyout ul.mega-sub-menu li.mega-menu-item.mega-current-page-ancestor > a.mega-menu-link,
                #{$wrap} #{$menu} > li.mega-menu-megamenu > ul.mega-sub-menu > li.mega-menu-item > a.mega-menu-link:hover, 
                #{$wrap} #{$menu} > li.mega-menu-megamenu > ul.mega-sub-menu > li.mega-menu-item > a.mega-menu-link:focus, 
                #{$wrap} #{$menu} > li.mega-menu-megamenu > ul.mega-sub-menu li.mega-menu-column > ul.mega-sub-menu > li.mega-menu-item > a.mega-menu-link:hover, 
                #{$wrap} #{$menu} > li.mega-menu-megamenu > ul.mega-sub-menu li.mega-menu-column > ul.mega-sub-menu > li.mega-menu-item > a.mega-menu-link:focus,
                #{$wrap} #{$menu} > li.mega-menu-flyout ul.mega-sub-menu li.mega-menu-item a.mega-menu-link:hover,
                #{$wrap} #{$menu} > li.mega-menu-flyout ul.mega-sub-menu li.mega-menu-item a.mega-menu-link:focus {
                    font-weight: 600;
                    color: $mobile_menu_item_link_color_hover;
            }
                #{$wrap} #{$menu} > li.mega-menu-item > a.mega-menu-link {
                    font-weight: 700;
                    padding: 0;
                }
                #{$wrap} #{$menu} > li.mega-menu-flyout ul.mega-sub-menu,
                #{$wrap} #{$menu} > li.mega-menu-megamenu > ul.mega-sub-menu {
                    background: transparent;
                }
                #{$wrap} #{$menu} > li.mega-menu-flyout ul.mega-sub-menu,
                #{$wrap} #{$menu} li.mega-menu-megamenu > ul.mega-sub-menu {
                    padding: 5px 0 0 20px;
                }
                #{$wrap} #{$menu} li.mega-menu-item-has-children > a.mega-menu-link > span.mega-indicator:after {
                    content: \"\\\e82b\" !important;
                    font: 400 normal 5px / 20px \"fontello\";
                    line-height: inherit;
                }
                #{$wrap} #{$menu} > li.mega-menu-flyout ul.mega-sub-menu > li.mega-menu-item h4.mega-block-title,
                #{$wrap} #{$menu} > li.mega-menu-megamenu ul.mega-sub-menu > li.mega-menu-item h4.mega-block-title, 
                #{$wrap} #{$menu} > li.mega-menu-megamenu ul.mega-sub-menu li.mega-menu-column > ul.mega-sub-menu > li.mega-menu-item h4.mega-block-title {
                    color: $mobile_menu_item_link_color;
                }
            }

        /* Theme icon styles */

        @include desktop {
            #{$wrap} #{$menu} li.mega-menu-item-has-children > a.mega-menu-link > span.mega-indicator {
                margin: 0 0 0 15px;
            }
            #{$wrap} #{$menu} li.mega-menu-item-has-children > a.mega-menu-link > span.mega-indicator:after {
                font: 400 normal 5px \"fontello\";
                line-height: inherit;
                content: \"\\\e82b\" !important;
                vertical-align: baseline;
                bottom: 1px;
            }
        }

        #{$wrap} #{$menu} .widget_media_image img {
			border-radius: 20px;
		}
        #{$wrap} #{$menu} .widget_media_image img.alignright {
            margin: 0 0 0 30px;
        }
        .mobile-header-menu-container #{$wrap} #{$menu} .widget_media_image img {
			display: none;
		}',
    );
    return $themes;
}
add_filter("megamenu_themes", "megamenu_add_theme_aiero_1745951436");

function megamenu_add_theme_aiero_dark_1745951988($themes) {
    $themes["aiero_dark_1745951988"] = array(
        'title' => 'Aiero Dark',
        'container_background_from' => 'rgba(0, 0, 0, 0)',
        'container_background_to' => 'rgba(0, 0, 0, 0)',
        'menu_item_align' => 'center',
        'menu_item_background_from' => 'rgba(0, 0, 0, 0)',
        'menu_item_background_hover_from' => 'rgba(241, 241, 241, 0)',
        'menu_item_background_hover_to' => 'rgba(241, 241, 241, 0)',
        'menu_item_spacing' => '2px',
        'menu_item_link_color' => 'rgb(255, 255, 255)',
        'menu_item_link_weight' => 'bold',
        'menu_item_link_text_transform' => 'uppercase',
        'menu_item_link_color_hover' => 'rgb(255, 255, 255)',
        'menu_item_link_weight_hover' => 'bold',
        'menu_item_link_padding_left' => '21px',
        'menu_item_link_padding_right' => '21px',
        'menu_item_link_border_radius_top_left' => '10px',
        'menu_item_link_border_radius_top_right' => '10px',
        'menu_item_link_border_radius_bottom_left' => '10px',
        'menu_item_link_border_radius_bottom_right' => '10px',
        'panel_background_from' => 'rgb(31, 31, 31)',
        'panel_background_to' => 'rgb(31, 31, 31)',
        'panel_width' => '965px',
        'panel_border_radius_top_left' => '20px',
        'panel_border_radius_top_right' => '20px',
        'panel_border_radius_bottom_left' => '20px',
        'panel_border_radius_bottom_right' => '20px',
        'panel_header_color' => 'rgb(245, 245, 245)',
        'panel_header_text_transform' => 'none',
        'panel_padding_left' => '50px',
        'panel_padding_right' => '45px',
        'panel_padding_top' => '40px',
        'panel_padding_bottom' => '40px',
        'panel_widget_padding_left' => '0px',
        'panel_widget_padding_right' => '0px',
        'panel_widget_padding_top' => '0px',
        'panel_widget_padding_bottom' => '0px',
        'panel_font_size' => '14px',
        'panel_font_color' => 'rgb(245, 245, 245)',
        'panel_font_family' => 'inherit',
        'panel_second_level_font_color' => 'rgb(245, 245, 245)',
        'panel_second_level_font_color_hover' => 'rgb(69, 208, 189)',
        'panel_second_level_text_transform' => 'none',
        'panel_second_level_font' => 'inherit',
        'panel_second_level_font_size' => '17px',
        'panel_second_level_font_weight' => 'normal',
        'panel_second_level_font_weight_hover' => 'normal',
        'panel_second_level_text_decoration' => 'none',
        'panel_second_level_text_decoration_hover' => 'none',
        'panel_second_level_padding_right' => '20px',
        'panel_second_level_padding_top' => '10px',
        'panel_second_level_padding_bottom' => '10px',
        'panel_third_level_font_color' => 'rgb(245, 245, 245)',
        'panel_third_level_font_color_hover' => 'rgb(69, 208, 189)',
        'panel_third_level_font' => 'inherit',
        'panel_third_level_font_size' => '14px',
        'panel_third_level_padding_right' => '20px',
        'panel_third_level_padding_top' => '10px',
        'panel_third_level_padding_bottom' => '10px',
        'flyout_width' => '286px',
        'flyout_menu_background_from' => 'rgb(31, 31, 31)',
        'flyout_menu_background_to' => 'rgb(31, 31, 31)',
        'flyout_border_radius_top_left' => '20px',
        'flyout_border_radius_top_right' => '20px',
        'flyout_border_radius_bottom_left' => '20px',
        'flyout_border_radius_bottom_right' => '20px',
        'flyout_padding_top' => '40px',
        'flyout_padding_right' => '45px',
        'flyout_padding_bottom' => '40px',
        'flyout_padding_left' => '50px',
        'flyout_link_padding_left' => '0px',
        'flyout_link_padding_right' => '15px',
        'flyout_link_padding_top' => '10px',
        'flyout_link_padding_bottom' => '10px',
        'flyout_link_height' => '25px',
        'flyout_background_from' => 'rgba(241, 241, 241, 0)',
        'flyout_background_to' => 'rgba(241, 241, 241, 0)',
        'flyout_background_hover_from' => 'rgba(241, 241, 241, 0)',
        'flyout_background_hover_to' => 'rgba(241, 241, 241, 0)',
        'flyout_link_size' => '17px',
        'flyout_link_color' => 'rgb(245, 245, 245)',
        'flyout_link_color_hover' => 'rgb(69, 208, 189)',
        'flyout_link_family' => 'inherit',
        'responsive_breakpoint' => '1364px',
        'line_height' => '1.5',
        'transitions' => 'on',
        'toggle_background_from' => '#222',
        'toggle_background_to' => '#222',
        'mobile_menu_padding_left' => '40px',
        'mobile_menu_padding_right' => '42px',
        'mobile_menu_padding_top' => '15px',
        'mobile_menu_item_height' => '34px',
        'mobile_background_from' => 'rgba(241, 241, 241, 0)',
        'mobile_background_to' => 'rgba(241, 241, 241, 0)',
        'mobile_menu_item_link_font_size' => '14px',
        'mobile_menu_item_link_color' => 'rgb(255, 255, 255)',
        'mobile_menu_item_link_text_align' => 'left',
        'mobile_menu_item_link_color_hover' => 'rgb(69, 208, 189)',
        'mobile_menu_item_background_hover_from' => 'rgba(241, 241, 241, 0)',
        'mobile_menu_item_background_hover_to' => 'rgba(241, 241, 241, 0)',
        'disable_mobile_toggle' => 'on',
        'custom_css' => '/** Push menu onto new line **/ 
            #{$wrap} { 
                clear: both;
                width: 100%;
                text-align: center;
            }
            #{$wrap} #{$menu} > li.mega-menu-item:last-child {
                margin: 0;
            }
            #{$wrap} #{$menu} > li.mega-menu-flyout ul.mega-sub-menu,
            #{$wrap} #{$menu} > li.mega-menu-megamenu > ul.mega-sub-menu {
                top: 100%;
            }
            #{$wrap} #{$menu} li.mega-align-bottom-left.mega-toggle-on > a.mega-menu-link {
                @include border-radius( $menu_item_link_border_radius_top_left, $menu_item_link_border_radius_top_right, $menu_item_link_border_radius_bottom_right, $menu_item_link_border_radius_bottom_left);
            }
            #{$wrap} #{$menu} li.mega-align-bottom-right.mega-toggle-on > a.mega-menu-link {
                @include border-radius( $menu_item_link_border_radius_top_left, $menu_item_link_border_radius_top_right, $menu_item_link_border_radius_bottom_right, $menu_item_link_border_radius_bottom_left);
            }
            /* Apply Hover Styling to active Mega Menu - Second Level Links */
            #{$wrap} #{$menu} > li.mega-menu-megamenu > ul.mega-sub-menu > li.mega-menu-item.mega-current-menu-item > a.mega-menu-link,
            #{$wrap} #{$menu} > li.mega-menu-megamenu > ul.mega-sub-menu li.mega-menu-column > ul.mega-sub-menu > li.mega-menu-item.mega-current-menu-item > a.mega-menu-link {
                color: $panel_second_level_font_color_hover;
                font-weight: $panel_second_level_font_weight_hover;
                text-decoration: $panel_second_level_text_decoration_hover;
                @include background($panel_second_level_background_hover_from, $panel_second_level_background_hover_to);
            }
             
            /* Apply Hover Styling to active Mega Menu - Third Level Links */
            #{$wrap} #{$menu} > li.mega-menu-megamenu > ul.mega-sub-menu > li.mega-menu-item li.mega-menu-item.mega-current-menu-item > a.mega-menu-link,
            #{$wrap} #{$menu} > li.mega-menu-megamenu > ul.mega-sub-menu li.mega-menu-column > ul.mega-sub-menu > li.mega-menu-item li.mega-menu-item.mega-current-menu-item > a.mega-menu-link {
                color: $panel_third_level_font_color_hover;
                font-weight: $panel_third_level_font_weight_hover;
                text-decoration: $panel_third_level_text_decoration_hover;
                @include background($panel_third_level_background_hover_from, $panel_third_level_background_hover_to);
            }
            /* Apply Hover Styling to active Flyout Links and ancestors */
            #{$wrap} #{$menu} li.mega-menu-flyout ul.mega-sub-menu li.mega-menu-item.mega-current-menu-item > a.mega-menu-link,
            #{$wrap} #{$menu} li.mega-menu-flyout ul.mega-sub-menu li.mega-menu-item.mega-current-menu-ancestor > a.mega-menu-link,
            #{$wrap} #{$menu} li.mega-menu-flyout ul.mega-sub-menu li.mega-menu-item.mega-current-page-ancestor > a.mega-menu-link {
                @include background($flyout_background_hover_from, $flyout_background_hover_to);
                font-weight: $flyout_link_weight_hover;
                text-decoration: $flyout_link_text_decoration_hover;
                color: $flyout_link_color_hover;
            }
            @include desktop {
                #{$wrap} #{$menu} > li.mega-menu-item {
                    padding: 13px 0;
                }
                #{$wrap} #{$menu} > li.mega-menu-item > a.mega-menu-link:after {
                    content: \'\';
                    display: block;
                    position: absolute;
                    left: 0;
                    top: 0;
                    width: 100%;
                    height: 100%;
                    border: 1px solid transparent;
                    border-radius: inherit;
                    box-sizing: border-box;
                }
                #{$wrap} #{$menu} > li.mega-menu-flyout ul.mega-sub-menu li.mega-menu-item ul.mega-sub-menu {
                    top: -40px;
                    margin: 0 0 0 46px;
                }
                .header #{$wrap} #{$menu} > li.mega-menu-item {
                    &.mega-current-menu-item,
                    &.mega-current-menu-ancestor,
                    &.mega-current-page-ancestor {
                         > a.mega-menu-link {
                             background: #ffffff;
                             color: #1f1f1f;                     
                        }
                    }
                }
                #{$wrap} #{$menu} > li.mega-menu-megamenu > ul.mega-sub-menu li.mega-menu-item > a.mega-menu-link,
                #{$wrap} #{$menu} > li.mega-menu-flyout ul.mega-sub-menu li.mega-menu-item a.mega-menu-link {
                    transition: all .3s;
                }
                #{$wrap} #{$menu} > li.mega-menu-megamenu > ul.mega-sub-menu li.mega-menu-item > a.mega-menu-link:before,
                #{$wrap} #{$menu} > li.mega-menu-flyout ul.mega-sub-menu li.mega-menu-item a.mega-menu-link:before {
                    content: \"\\\e841\";
                    font: 400 normal 10px / 10px \"fontello\";
                    line-height: 25.5px;
                    bottom: 8px;
                    position: absolute;
                    display: block;
                    left: 0;
                    right: initial;
                    width: 16px;
                    opacity: 0;
                    -webkit-transition: opacity 0.4s;
                    transition: opacity 0.4s;
                }
                #{$wrap} #{$menu} > li.mega-menu-megamenu > ul.mega-sub-menu li.mega-menu-item:hover > a.mega-menu-link,
                #{$wrap} #{$menu} > li.mega-menu-megamenu > ul.mega-sub-menu li.mega-menu-item.mega-current-menu-item > a.mega-menu-link {
                    padding: 10px 0px 10px 20px !important;
                    &:before {
                        opacity: 1;
                    }
                }
                #{$wrap} #{$menu} > li.mega-menu-flyout ul.mega-sub-menu li.mega-menu-item:hover > a.mega-menu-link,
                #{$wrap} #{$menu} > li.mega-menu-flyout ul.mega-sub-menu li.mega-menu-item.mega-current-menu-item a.mega-menu-link{
                    padding: 10px 15px 10px 20px !important;
                    &:before {
                        opacity: 1;
                    }
                }
                #{$wrap} #{$menu} > li.mega-menu-megamenu > ul.mega-sub-menu li.mega-menu-item-has-children > a.mega-menu-link > span.mega-indicator:after,
                #{$wrap} #{$menu} > li.mega-menu-flyout ul.mega-sub-menu li.mega-menu-item-has-children > a.mega-menu-link > span.mega-indicator:after {
                    position: relative;
                    bottom: 2px;
                    content: \"\\\e801\" !important;
                    font: 400 normal 5px / 5px \"fontello\";
                    width: auto;
                    height: 1em;
                    text-align: center;
                    -webkit-transition: transform 0.3s;
                    transition: transform 0.3s;
                }
                #{$wrap} #{$menu} > li.mega-menu-megamenu > ul.mega-sub-menu li.mega-menu-item-has-children:hover > a.mega-menu-link > span.mega-indicator:after,
                #{$wrap} #{$menu} > li.mega-menu-flyout ul.mega-sub-menu li.mega-menu-item-has-children:hover > a.mega-menu-link > span.mega-indicator:after {
                    -webkit-transform: rotate(-90deg);
                    -ms-transform: rotate(-90deg);
                    transform: rotate(-90deg);
                }
                
                /* Animated top menu items */
                #{$wrap} #{$menu} > li.mega-menu-item > a.mega-menu-link {
                    overflow: hidden;
                }
                #{$wrap} #{$menu} > li.mega-menu-item > a.mega-menu-link > span.text-active {
                    display: inline-block;
                    -webkit-transition: transform 0.3s, opacity 0.3s;
                    transition: transform 0.3s, opacity 0.3s;
                }
                #{$wrap} #{$menu} > li.mega-menu-item > a.mega-menu-link:hover > span.text-active {
                    opacity: 0;
                    -webkit-transform: translateY(-150%);
                    -ms-transform: translateY(-150%);
                    transform: translateY(-150%);
                }
                #{$wrap} #{$menu} > li.mega-menu-item > a.mega-menu-link > span:not(.text-active):not(.mega-indicator) {
                    position: absolute;
                    padding: inherit;
                    left: 0;
                    top: 0;
                    opacity: 0;
                    -webkit-transition: transform 0.3s, opacity 0.3s;
                    transition: transform 0.3s, opacity 0.3s;
                    -webkit-transform: translateY(150%);
                    -ms-transform: translateY(150%);
                    transform: translateY(150%);
                }
                #{$wrap} #{$menu} > li.mega-menu-item > a.mega-menu-link:hover > span:not(.text-active):not(.mega-indicator) {
                    opacity: 1;
                    -webkit-transform: translateY(0);
                    -ms-transform: translateY(0);
                    transform: translateY(0);
                }
            }

            @include mobile {
                #{$wrap} #{$menu} > li.mega-menu-megamenu > ul.mega-sub-menu > li.mega-menu-item > a.mega-menu-link, 
                #{$wrap} #{$menu} > li.mega-menu-megamenu > ul.mega-sub-menu li.mega-menu-column > ul.mega-sub-menu > li.mega-menu-item > a.mega-menu-link,
                #{$wrap} #{$menu} > li.mega-menu-flyout ul.mega-sub-menu li.mega-menu-item a.mega-menu-link,
                #{$wrap} #{$menu} > li.mega-menu-megamenu > ul.mega-sub-menu > li.mega-menu-item li.mega-menu-item > a.mega-menu-link,      
                #{$wrap} #{$menu} > li.mega-menu-megamenu > ul.mega-sub-menu li.mega-menu-column > ul.mega-sub-menu > li.mega-menu-item li.mega-menu-item > a.mega-menu-link {
                    font-size: 16px;
                    font-weight: 600;
                    padding: 8px 0;
                    color: $mobile_menu_item_link_color;
                }
                #{$wrap} #{$menu} > li.mega-menu-item a.mega-menu-link:hover,
                #{$wrap} #{$menu} > li.mega-menu-megamenu > ul.mega-sub-menu > li.mega-menu-item.mega-current-menu-item > a.mega-menu-link, 
                #{$wrap} #{$menu} > li.mega-menu-megamenu > ul.mega-sub-menu li.mega-menu-column > ul.mega-sub-menu > li.mega-menu-item.mega-current-menu-item > a.mega-menu-link,
                #{$wrap} #{$menu} li.mega-menu-flyout ul.mega-sub-menu li.mega-menu-item.mega-current-menu-item > a.mega-menu-link, 
                #{$wrap} #{$menu} li.mega-menu-flyout ul.mega-sub-menu li.mega-menu-item.mega-current-menu-ancestor > a.mega-menu-link, 
                #{$wrap} #{$menu} li.mega-menu-flyout ul.mega-sub-menu li.mega-menu-item.mega-current-page-ancestor > a.mega-menu-link,
                #{$wrap} #{$menu} > li.mega-menu-megamenu > ul.mega-sub-menu > li.mega-menu-item > a.mega-menu-link:hover, 
                #{$wrap} #{$menu} > li.mega-menu-megamenu > ul.mega-sub-menu > li.mega-menu-item > a.mega-menu-link:focus, 
                #{$wrap} #{$menu} > li.mega-menu-megamenu > ul.mega-sub-menu li.mega-menu-column > ul.mega-sub-menu > li.mega-menu-item > a.mega-menu-link:hover, 
                #{$wrap} #{$menu} > li.mega-menu-megamenu > ul.mega-sub-menu li.mega-menu-column > ul.mega-sub-menu > li.mega-menu-item > a.mega-menu-link:focus,
                #{$wrap} #{$menu} > li.mega-menu-flyout ul.mega-sub-menu li.mega-menu-item a.mega-menu-link:hover,
                #{$wrap} #{$menu} > li.mega-menu-flyout ul.mega-sub-menu li.mega-menu-item a.mega-menu-link:focus {
                    font-weight: 600;
                    color: $mobile_menu_item_link_color_hover;
            }
                #{$wrap} #{$menu} > li.mega-menu-item > a.mega-menu-link {
                    font-weight: 700;
                    padding: 0;
                }
                #{$wrap} #{$menu} > li.mega-menu-flyout ul.mega-sub-menu,
                #{$wrap} #{$menu} > li.mega-menu-megamenu > ul.mega-sub-menu {
                    background: transparent;
                }
                #{$wrap} #{$menu} > li.mega-menu-flyout ul.mega-sub-menu,
                #{$wrap} #{$menu} li.mega-menu-megamenu > ul.mega-sub-menu {
                    padding: 5px 0 0 20px;
                }
                #{$wrap} #{$menu} li.mega-menu-item-has-children > a.mega-menu-link > span.mega-indicator:after {
                    content: \"\\\e82b\" !important;
                    font: 400 normal 5px / 20px \"fontello\";
                    line-height: inherit;
                }
                #{$wrap} #{$menu} > li.mega-menu-flyout ul.mega-sub-menu > li.mega-menu-item h4.mega-block-title,
                #{$wrap} #{$menu} > li.mega-menu-megamenu ul.mega-sub-menu > li.mega-menu-item h4.mega-block-title, 
                #{$wrap} #{$menu} > li.mega-menu-megamenu ul.mega-sub-menu li.mega-menu-column > ul.mega-sub-menu > li.mega-menu-item h4.mega-block-title {
                    color: $mobile_menu_item_link_color;
                }
            }

        /* Theme icon styles */

        @include desktop {
            #{$wrap} #{$menu} li.mega-menu-item-has-children > a.mega-menu-link > span.mega-indicator {
                margin: 0 0 0 15px;
            }
            #{$wrap} #{$menu} li.mega-menu-item-has-children > a.mega-menu-link > span.mega-indicator:after {
                font: 400 normal 5px \"fontello\";
                line-height: inherit;
                content: \"\\\e82b\" !important;
                vertical-align: baseline;
                bottom: 1px;
            }
        }
        #{$wrap} #{$menu} .widget_media_image img {
			border-radius: 20px;
		}
        #{$wrap} #{$menu} .widget_media_image img.alignright {
            margin: 0 0 0 30px;
        }
        .mobile-header-menu-container #{$wrap} #{$menu} .widget_media_image img {
			display: none;
		}',
    );
    return $themes;
}
add_filter("megamenu_themes", "megamenu_add_theme_aiero_dark_1745951988");

function megamenu_override_default_theme($value) {
  // change 'primary' to your menu location ID
  if ( !empty($value) && !isset($value['main']['theme']) ) {
    $value['main']['theme'] = 'aiero_1745951436'; // change my_custom_theme_key to the ID of your exported theme
  }
 
  return $value;
}
add_filter('default_option_megamenu_settings', 'megamenu_override_default_theme');