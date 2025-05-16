<?php
/*
 * Created by Artureanec
*/

add_action('init', 'init_aiero_customizer_default_values', 1);

if (!function_exists('init_aiero_customizer_default_values')) {
    function init_aiero_customizer_default_values() {
        global $aiero_customizer_default_values;
        $aiero_customizer_default_values = array(
        # General
            # Page Loader
            'page_loader_status'                        => 'on',
            'page_loader_image'                         => '',

        # Top Bar
            # Top Bar General
            'top_bar_status'                            => 'off',
            'top_bar_customize'                         => 'off',
            'top_bar_default_text_color'                => '#7e7e7e',
            'top_bar_dark_text_color'                   => '#ffffff',
            'top_bar_light_text_color'                  => '#9c9c9c',
            'top_bar_accent_text_color'                 => '',
            'top_bar_border_color'                      => '#1f1f1f',
            'top_bar_border_hover_color'                => '',
            'top_bar_background_color'                  => '#1f1f1f',
            'top_bar_background_alter_color'            => '',
            'top_bar_button_text_color'                 => '',
            'top_bar_button_border_color'               => '',
            'top_bar_button_background_color'           => '',
            'top_bar_button_text_hover'                 => '',
            'top_bar_button_border_hover'               => '',
            'top_bar_button_background_hover'           => '',

            # Top Bar Social Buttons
            'top_bar_socials_status'                    => 'off',
            'top_bar_socials_title'                     => '',

            # Top Bar Additional Text
            'top_bar_additional_text_status'            => 'off',
            'top_bar_additional_text'                   => '',
            'top_bar_additional_text_title'             => '',

            # Top Bar Contacts
            'top_bar_contacts_title'                    => '',
            'top_bar_contacts_email_status'             => 'off',
            'top_bar_contacts_email_title'              => '',
            'top_bar_contacts_email'                    => '',
            'top_bar_contacts_phone_status'             => 'off',
            'top_bar_contacts_phone_title'              => '',
            'top_bar_contacts_phone'                    => '',
            'top_bar_contacts_address_status'           => 'off',
            'top_bar_contacts_address_title'            => '',
            'top_bar_contacts_address'                  => '',

        # Header Settings
            #General
            'header_status'                             => 'on',
            'header_style'                              => 'type-1',
            'header_position'                           => 'above',
            'header_transparent'                        => true,
            'header_border'                             => 'border',        
            'header_customize'                          => 'on',
            'header_offset_top'                         => '',
            'header_default_text_color'                 => '',
            'header_dark_text_color'                    => '#333333',
            'header_light_text_color'                   => '#958c8c',
            'header_accent_text_color'                  => '',
            'header_current_text_color'                 => '',
            'header_current_background_color'           => '#1f1f1f',
            'header_current_border_color'               => '',
            'header_border_color'                       => '#cacaca',
            'header_border_hover_color'                 => '',
            'header_background_color'                   => '',
            'header_background_alter_color'             => '',
            'header_button_text_color'                  => '#333333',
            'header_button_border_color'                => '#45d0bd',
            'header_button_border_color_add'            => '#44b6e9',
            'header_button_background_color'            => '',
            'header_button_background_color_add'        => '',
            'header_button_text_hover'                  => '#333333',
            'header_button_border_hover'                => '#45d0bd',
            'header_button_border_hover_add'            => '#44b6e9',
            'header_button_background_hover'            => '#45d0bd',
            'header_button_background_hover_add'        => '#44b6e9',
            'header_button_border_style'                => 'gradient',
            'header_button_background_style'            => 'gradient',        
            'header_menu_text_color'                    => '',
            'header_menu_text_color_hover'              => '',
            'header_menu_text_background_color_hover'   => '',
            'header_menu_background_color'              => '',

            # Sticky Header
            'sticky_header_status'                      => 'off',
            'sticky_header_blur'                        => 'off',

            # Mobile Header
            'mobile_header_breakpoint'                  => '1365',
            'mobile_header_menu_style'                  => 'fullwidth',

            # Header Logo
            'header_logo_status'                        => 'on',
            'header_logo_customize'                     => 'off',
            'header_logo_image'                         => '',
            'header_logo_retina'                        => false,
            'header_logo_mobile_image'                  => '',
            'header_logo_mobile_retina'                 => false,

            # Header Button
            'header_button_status'                      => 'off',
            'header_button_text'                        => esc_html__('Get in Touch', 'aiero'),
            'header_button_url'                         => '#',

            # Header Menu
            'header_menu_status'                        => 'on',
            'header_menu_style'                         => 'standard',
            'header_menu_bg_image_status'               => 'off',
            'header_menu_bg_image'                      => '',
            'header_menu_select'                        => 'default',
            'header_menu_label'                         => esc_html__('Menu', 'aiero'),
            'header_menu_customize'                     => 'on',
            'header_menu_font'                          => '{"font_family":"Manrope","font_backup":"Arial, Helvetica, sans-serif","font_styles":"700","font_subset":"latin","font_size":"14","font_size_unit":"px","line_height":"1.5","line_height_unit":"em","text_transform":"uppercase","letter_spacing":"0","letter_spacing_unit":"em","word_spacing":"0","word_spacing_unit":"px","font_style":"normal","font_weight":"700"}',
            'header_sub_menu_font'                      => '{"font_family":"Manrope","font_backup":"Arial, Helvetica, sans-serif","font_styles":"400","font_subset":"latin","font_size":"17","font_size_unit":"px","line_height":"1.5","line_height_unit":"em","text_transform":"none","letter_spacing":"0","letter_spacing_unit":"em","word_spacing":"0","word_spacing_unit":"px","font_style":"normal","font_weight":"400"}',

            # Header Callback
            'header_callback_status'                    => 'off',
            'header_callback_title'                     => '',
            'header_callback_text'                      => '',

            # Header Side Panel
            'side_panel_status'                         => 'off',

            # Header Search
            'header_search_status'                      => 'on',

            # Header Login/Logout
            'header_login_status'                       => 'off',

            # Header Minicart
            'header_minicart_status'                    => 'off',

            # Header Login/Logout
            'header_login_status'                       => 'off',

        # Page Title
            # General
            'page_title_status'                         => 'on',
            'page_title_overlay_status'                 => 'off',
            'page_title_overlay_color'                  => '',
            'page_title_decoration_status'              => 'off',
            'page_title_customize'                      => 'on',
            'page_title_height'                         => '540',
            'page_title_default_text_color'             => '#333333',
            'page_title_dark_text_color'                => '#ffffff',
            'page_title_light_text_color'               => '#c5c5c5',
            'page_title_accent_text_color'              => '',
            'page_title_border_color'                   => '',
            'page_title_border_hover_color'             => '',
            'page_title_background_color'               => '',
            'page_title_background_alter_color'         => '',
            'page_title_button_text_color'              => '',
            'page_title_button_border_color'            => '',
            'page_title_button_border_color_add'        => '',
            'page_title_button_background_color'        => '',
            'page_title_button_text_hover'              => '',
            'page_title_button_border_hover'            => '',
            'page_title_button_background_hover'        => '',
            'page_title_background_image'               => '',
            'page_title_background_position'            => 'center center',
            'page_title_background_repeat'              => 'no-repeat',
            'page_title_background_size'                => 'cover',
            'hide_page_title_background_mobile'         => false,
            'hide_page_title_background_tablet'         => false,

            # Heading
            'page_title_heading_customize'              => 'off',
            'page_title_heading_icon_status'            => 'off',
            'page_title_heading_icon_image'             => '',
            'page_title_heading_icon_retina'            => true,
            'page_title_heading_font'                   => '{"font_family":"Sora","font_backup":"Arial, Helvetica, sans-serif","font_styles":"400","font_subset":"latin","font_size":"80","font_size_unit":"px","line_height":"1.125","line_height_unit":"em","text_transform":"none","letter_spacing":"-0.03","letter_spacing_unit":"em","word_spacing":"0","word_spacing_unit":"px","font_style":"normal","font_weight":"400"}',

            # Breadcrumbs
            'page_title_breadcrumbs_status'             => 'on',
            'page_title_breadcrumbs_customize'          => 'on',
            'page_title_breadcrumbs_font'               => '{"font_family":"Manrope","font_backup":"Arial, Helvetica, sans-serif","font_styles":"600","font_subset":"latin","font_size":"14","font_size_unit":"px","line_height":"27","line_height_unit":"px","text_transform":"none","letter_spacing":"0","letter_spacing_unit":"em","word_spacing":"0","word_spacing_unit":"px","font_style":"normal","font_weight":"600"}',

            # Additional
            'page_title_additional_text'                => '',
            'page_title_additional_customize'           => 'off',
            'page_title_additional_text_color'          => '',
            'page_title_additional_text_font'           => '{"font_family":"Manrope Alt","font_backup":"Arial, Helvetica, sans-serif","font_styles":"700","font_subset":"latin","text_transform":"none","letter_spacing":"-0.03","letter_spacing_unit":"em","word_spacing":"0","word_spacing_unit":"px","font_style":"normal","font_weight":"700"}',
            'page_title_additional_text_bottom_position'=> '',

        # Typography
            # Main Font
            'main_font'                                 => '{"font_family":"Manrope","font_backup":"Arial, Helvetica, sans-serif","font_styles":"400,500,700","font_subset":"latin","font_size":"16","font_size_unit":"px","line_height":"1.875","line_height_unit":"em","text_transform":"none","letter_spacing":"0","letter_spacing_unit":"em","word_spacing":"0","word_spacing_unit":"px","font_style":"normal","font_weight":"500"}',

            # Additional Font
            'additional_font'                           => '{"font_family":"Manrope","font_backup":"Arial, Helvetica, sans-serif","font_styles":"400","font_subset":"latin","font_size":"14","font_size_unit":"px","line_height":"1.92857","line_height_unit":"em","font_style":"normal","font_weight":"400"}',

            # Headings
            'headings_font'                             => '{"font_family":"Sora","font_backup":"Arial, Helvetica, sans-serif","font_styles":"400,500,600,700","font_subset":"latin","text_transform":"none","font_style":"normal"}',
            'h1_font'                                   => '{"font_size":"80","font_size_unit":"px","line_height":"1.125","line_height_unit":"em","letter_spacing":"-0.05","letter_spacing_unit":"em","word_spacing":"0","word_spacing_unit":"px","font_weight":"400"}',
            'h2_font'                                   => '{"font_size":"60","font_size_unit":"px","line_height":"1.16666","line_height_unit":"em","letter_spacing":"-0.05","letter_spacing_unit":"em","word_spacing":"0","word_spacing_unit":"px","font_weight":"400"}',
            'h3_font'                                   => '{"font_size":"40","font_size_unit":"px","line_height":"1.25","line_height_unit":"em","letter_spacing":"-0.05","letter_spacing_unit":"em","word_spacing":"0","word_spacing_unit":"px","font_weight":"400"}',
            'h4_font'                                   => '{"font_size":"25","font_size_unit":"px","line_height":"1.4","line_height_unit":"em","letter_spacing":"-0.05","letter_spacing_unit":"em","word_spacing":"0","word_spacing_unit":"px","font_weight":"400"}',
            'h5_font'                                   => '{"font_size":"20","font_size_unit":"px","line_height":"1.4","line_height_unit":"em","letter_spacing":"0","letter_spacing_unit":"em","word_spacing":"0","word_spacing_unit":"px","font_weight":"400"}',
            'h6_font'                                   => '{"font_size":"18","font_size_unit":"px","line_height":"1.5","line_height_unit":"em","letter_spacing":"-0.05","letter_spacing_unit":"em","word_spacing":"0","word_spacing_unit":"px","font_weight":"400"}',

            # Buttons
            'buttons_font'                              => '{"font_family":"Manrope","font_backup":"Arial, Helvetica, sans-serif","font_styles":"500,600","font_subset":"latin","font_size":"14","font_size_unit":"px","text_transform":"none","letter_spacing":"0.01","letter_spacing_unit":"em","word_spacing":"0","word_spacing_unit":"px","font_style":"normal","font_weight":"500"}',

        # Social Links
            'socials_target'                            => true,
            'social_buttons'                            => '',

        # Color Options
            # Standard colors
            'standard_default_text_color'               => '#333333',
            'standard_dark_text_color'                  => '#111111',
            'standard_light_text_color'                 => '#9b9b9b',
            'standard_accent_text_color'                => '#45d0bd',
            'standard_contrast_text_color'              => '#ffffff',
            'standard_input_dark_color'                 => '#d9d9d9',
            'standard_border_color'                     => '#adadad',
            'standard_border_hover_color'               => '#454545',
            'standard_background_color'                 => '#ffffff',
            'standard_background_alter_color'           => '#f0f2f4',
            'standard_button_text_color'                => '#333333',
            'standard_button_border_color'              => '#8258c8',
            'standard_button_border_color_add'          => '#2c84c8',
            'standard_button_background_color'          => 'rgba(255,255,255,0)',
            'standard_button_background_color_add'      => 'rgba(255,255,255,0)',
            'standard_button_text_hover'                => '#ffffff',
            'standard_button_border_hover'              => '#8258c8',
            'standard_button_border_hover_add'          => '#2c84c8',
            'standard_button_background_hover'          => '#8258c8',
            'standard_button_background_hover_add'      => '#2c84c8',
            'standard_button_border_style'              => 'gradient',
            'standard_button_background_style'          => 'gradient',

            # Contrast colors
            'contrast_default_text_color'               => '#f5f5f5',
            'contrast_dark_text_color'                  => '#f5f5f5',
            'contrast_light_text_color'                 => '#aeb3bd',
            'contrast_accent_text_color'                => '#45d0bd',
            'contrast_input_dark_color'                 => '#d9d9d9',
            'contrast_border_color'                     => '#adadad',
            'contrast_border_hover_color'               => '#cbcbcb',
            'contrast_background_color'                 => '#1f1f1f',
            'contrast_background_alter_color'           => '#333333',
            'contrast_button_text_color'                => '#ffffff',
            'contrast_button_border_color'              => '#45d0bd',
            'contrast_button_border_color_add'          => '#44b6e9',
            'contrast_button_background_color'          => 'rgba(255,255,255,0)',
            'contrast_button_background_color_add'      => 'rgba(255,255,255,0)',
            'contrast_button_text_hover'                => '#ffffff',
            'contrast_button_border_hover'              => '#45d0bd',
            'contrast_button_border_hover_add'          => '#44b6e9',
            'contrast_button_background_hover'          => '#45d0bd',
            'contrast_button_background_hover_add'      => '#44b6e9',
            'contrast_button_border_style'              => 'gradient',
            'contrast_button_background_style'          => 'gradient',

        # Footer
            # General
            'footer_status'                             => 'on',
            'footer_position'                           => 'indented',
            'footer_style'                              => 'type-1',
            'footer_border_radius'                      => 'on',
            'footer_customize'                          => 'on',
            'footer_default_text_color'                 => '',
            'footer_dark_text_color'                    => '#ffffff',
            'footer_light_text_color'                   => '#bebebe',
            'footer_accent_text_color'                  => '',
            'footer_input_dark_color'                   => '',
            'footer_border_color'                       => '',
            'footer_border_hover_color'                 => '',
            'footer_background_color'                   => '',
            'footer_background_alter_color'             => '',
            'footer_button_text_color'                  => '',
            'footer_button_border_color'                => '#8258c8',
            'footer_button_border_color_add'            => '#2c84c8',
            'footer_button_background_color'            => '',
            'footer_button_background_color_add'        => '',
            'footer_button_text_hover'                  => '',
            'footer_button_border_hover'                => '#8258c8',
            'footer_button_border_hover_add'            => '#2c84c8',
            'footer_button_background_hover'            => '#8258c8',
            'footer_button_background_hover_add'        => '#2c84c8',
            'footer_button_border_style'                => 'gradient',
            'footer_button_background_style'            => 'gradient',
            'footer_background_image'                   => '',
            'footer_background_position'                => 'center center',
            'footer_background_repeat'                  => 'no-repeat',
            'footer_background_size'                    => 'cover',

            # Pre Footer Widgets
            'prefooter_sidebar_status'                  => 'off',
            'prefooter_sidebar_select'                  => 'sidebar-pre-footer',

            # Footer Widgets
            'footer_sidebar_status'                     => 'on',
            'footer_sidebar_select'                     => 'sidebar-footer-style1',

            # Copyright
            'footer_copyright_status'                   => 'on',
            'footer_copyright_text'                     => esc_html__('©Aiero 2025. All rights reserved.', 'aiero'),

            # Footer Menu
            'footer_menu_status'                        => 'on',
            'footer_menu_select'                        => 'default',

            # Footer Additional Menu
            'footer_additional_menu_status'             => 'on',
            'footer_additional_menu_select'             => 'default',

        # Footer Scroll To Top
            'footer_scrolltop_status'                   => 'off',
            'footer_scrolltop_bg_color'                 => '',
            'footer_scrolltop_color'                    => '',
            'footer_scrolltop_bg_color_hover'           => '',
            'footer_scrolltop_color_hover'              => '',

        # Layout Settings

            'content_top_margin'                        => 'off',
            'content_bottom_margin'                     => 'off',

        # Sidebars
            'sidebar_position'                          => 'right',
            'archive_sidebar_position'                  => 'none',
            'post_sidebar_position'                     => 'right',
            'vacancy_sidebar_position'                  => 'left',
            'service_sidebar_position'                  => 'left',
            'case_study_sidebar_position'               => 'left',
            'catalog_sidebar_position'                  => 'right',

        #Side Panel Settings
            'sidebar_logo_status'                       => 'off',
            'sidebar_logo_image'                        => '',
            'sidebar_logo_retina'                       => false,
            'side_panel_bg_image_status'                => 'off',
            'side_panel_bg_image'                       => '',
            'side_panel_close_bg_image_status'          => 'off',
            'side_panel_close_bg_image'                 => '',
            'side_panel_socials_status'                 => 'off',

        # Single Post
            # Post Settings
            'post_page_title'                           => esc_html__('%\s', 'aiero'),
            'post_media_image_status'                   => 'on',
            'post_category_status'                      => 'on',
            'post_date_status'                          => 'on',
            'post_author_status'                        => 'on',
            'post_comment_counter_status'               => 'off',
            'post_title_status'                         => 'on',
            'post_tags_status'                          => 'on',
            'post_socials_status'                       => 'off',

            # Recent Posts Settings
            'recent_posts_status'                       => 'off',
            'recent_posts_customize'                    => 'off',
            'recent_posts_section_heading'              => esc_html__('Recent Posts', 'aiero'),
            'recent_posts_number'                       => '2',
            'recent_posts_order_by'                     => 'random',
            'recent_posts_order'                        => 'desc',
            'recent_posts_image'                        => 'on',
            'recent_posts_category'                     => 'on',
            'recent_posts_date'                         => 'on',
            'recent_posts_author'                       => 'on',
            'recent_posts_title'                        => 'on',
            'recent_posts_excerpt'                      => 'off',
            'recent_posts_excerpt_length'               => '120',
            'recent_posts_tags'                         => 'off',
            'recent_posts_more'                         => 'on',

        # Portfolio
            # Archive
            'portfolio_archive_page_title'              => esc_html__('Portfolios', 'aiero'),
            'portfolio_archive_columns_number'          => 3,
            'portfolio_archive_posts_per_page'          => 9,

            # Single
            'portfolio_single_page_title'               => esc_html__('Portfolio', 'aiero'),

        # Projects
            # Archive
            'project_archive_page_title'                => esc_html__('Projects', 'aiero'),
            'project_archive_columns_number'            => 3,
            'project_archive_posts_per_page'            => 9,

            # Single
            'project_single_page_title'                 => esc_html__('%\s', 'aiero'),
            'project_title_status'                      => 'on',
            'project_single_navigation_max_length'      => 5,
            'project_cards_image'                       => '',

        # Case Studies
            # Archive
            'case_studies_archive_page_title'           => esc_html__('Case Studies', 'aiero'),
            'case_studies_archive_excerpt_length'       => 83,
            'case_studies_archive_columns_number'       => 2,
            'case_studies_archive_posts_per_page'       => 6,

            #Single
            'case_studies_single_page_title'            => esc_html__('Case Study', 'aiero'),

        # Team
            # Archive
            'team_archive_page_title'                   => esc_html__('Team', 'aiero'),
            'team_archive_columns_number'               => 4,
            'team_archive_posts_per_page'               => 12,

            # Single
            'team_single_page_title'                    => esc_html__('Team single', 'aiero'),

        # Vacancies
            # Archive
            'vacancy_archive_page_title'                => esc_html__('Careers', 'aiero'),
            'vacancy_archive_excerpt_length'            => 118,
            'vacancy_archive_posts_per_page'            => 5,

            # Single
            'vacancy_single_page_title'                 => esc_html__('Career Details', 'aiero'),
            'recent_vacancies_status'                   => 'on',
            'recent_vacancies_customize'                => 'off',
            'recent_vacancies_section_heading'          => esc_html__('Recent Careers', 'aiero'),
            'recent_vacancies_number'                   => 3,
            'recent_vacancies_order_by'                 => 'date',
            'recent_vacancies_order'                    => 'desc',

        # Services
            # Archive
            'service_archive_page_title'                => esc_html__('Services', 'aiero'),
            'service_archive_excerpt_length'            => 151,
            'service_archive_columns_number'            => 2,
            'service_archive_posts_per_page'            => 4,

            # Single
            'service_single_page_title'                 => esc_html__('%\s', 'aiero'),
            'service_title_status'                      => 'on',
            'service_media_status'                      => 'on',

        # 404 Error Page
            'error_logo_image'                          => get_template_directory_uri() . '/img/404.png',
            'error_title'                               => esc_html__("Oooop! Page not found", 'aiero'),
            'error_text'                                => esc_html__("You are here because you entered the address of a page that no longer exists or has been moved to a different address", 'aiero'),
            'error_logo_status'                         => 'on',
            'error_socials_status'                      => 'on',
            'error_button_status'                       => 'on',
            'error_button_text'                         => esc_html__('Home page', 'aiero'),
            'error_text_color'                          => '',
            'error_text_hover_color'                    => '',
            'error_background_customize'                => 'on',
            'error_background_color'                    => '',
            'error_background_image'                    => get_template_directory_uri() . '/img/404-bg.jpg',
            'error_background_position'                 => 'center center',
            'error_background_repeat'                   => 'no-repeat',
            'error_background_size'                     => 'cover',

        # Page Settings
            'page_background_image_top_status'          => 'off',
            'page_background_image_top'                 => '',
            'page_background_image_top_repeat'          => 'no-repeat',
            'page_background_image_top_size'            => '100% auto',

        # WooCommerce
            'woo_single_product_show_related_section'   => 'on',
            'woo_related_title'                         => esc_html__('Similar products', 'aiero'),
            'woo_single_product_title'                  => esc_html__('%\s', 'aiero'),
            'woo_single_product_show_name'              => false,
            'woo_upsells_title'                         => esc_html__('Up-Sells Products', 'aiero'),
            'woo_product_categories_title'              => esc_html__('Shop Category: %\s', 'aiero'),
            'woo_product_tags_title'                    => esc_html__('Product Tag: %\s', 'aiero')
    );
    }
}