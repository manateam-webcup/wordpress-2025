<?php
/*
 * Created by Artureanec
*/

# General
add_theme_support('title-tag');
add_theme_support('automatic-feed-links');
add_theme_support('post-formats', array('image', 'video', 'gallery', 'quote'));
add_theme_support('html5', array( 'comment-list', 'comment-form', 'search-form', 'gallery', 'caption' ) );

if( !isset( $content_width ) ) $content_width = 1340;

# ADD Localization Folder
add_action('init', 'aiero_pomo', 1);
if (!function_exists('aiero_pomo')) {
    function aiero_pomo() {
        load_theme_textdomain('aiero', get_template_directory() . '/languages');
    }
}

require_once(get_template_directory() . '/core/helper-functions.php');
require_once(get_template_directory() . '/core/layout-functions.php');
require_once(get_template_directory() . '/core/init.php');

# Register CSS/JS
add_action('wp_enqueue_scripts', 'aiero_css_js');
if (!function_exists('aiero_css_js')) {
    function aiero_css_js() {
        # CSS
        wp_enqueue_style('aiero-theme', get_template_directory_uri() . '/css/theme.css', array(), wp_get_theme()->get('Version'));
        wp_style_add_data('aiero-theme', 'rtl', 'replace'); 

        if (class_exists('WooCommerce')) {
            wp_enqueue_style('aiero-woocommerce', get_template_directory_uri() . '/css/woocommerce.css', array(), wp_get_theme()->get('Version'));
            wp_style_add_data('aiero-woocommerce', 'rtl', 'replace');
            wp_enqueue_style('aiero-style', get_template_directory_uri() . '/style.css', array('aiero-theme', 'aiero-woocommerce'), wp_get_theme()->get('Version') );
        } else {
            wp_enqueue_style('aiero-style', get_template_directory_uri() . '/style.css', array('aiero-theme'), wp_get_theme()->get('Version') );
        }

        # JS
        wp_enqueue_script('jquery-cookie', get_template_directory_uri() . '/js/jquery.cookie.min.js', array('jquery'), false, true);
        wp_enqueue_script('owl-carousel', get_template_directory_uri() . '/js/owl.carousel.min.js', array('jquery'), false, true);
        wp_enqueue_script('isotope', get_template_directory_uri() . '/js/isotope.min.js', array(), false, true );

        wp_register_script('aiero-theme', get_template_directory_uri() . '/js/theme.js', array('jquery', 'owl-carousel', 'isotope'), false, true);
        wp_localize_script( 'aiero-theme', 'ajax_params', array( 'ajax_url' => admin_url( 'admin-ajax.php' ) ) );
        wp_enqueue_script('aiero-theme');


        if (is_singular() && comments_open()) {
            wp_enqueue_script('comment-reply');
        }

        $localize_theme = array();
        $localize_theme['rtl'] = (bool)is_rtl();
        wp_localize_script('aiero-theme', 'theme',
            $localize_theme
        );

        # Colors
        require_once(get_template_directory() . "/css/custom/custom.php");

        global $aiero_custom_css;
        wp_add_inline_style('aiero-theme', $aiero_custom_css);
    }
}

# Register CSS/JS for Admin Settings
add_action('admin_enqueue_scripts', 'aiero_admin_css_js');
if (!function_exists('aiero_admin_css_js')) {
    function aiero_admin_css_js() {
        # CSS
        wp_enqueue_style('aiero-admin', get_template_directory_uri() . '/css/admin.css');
        # JS
        wp_enqueue_script('aiero-admin', get_template_directory_uri() . '/js/admin.js', array('jquery', 'jquery-ui-core', 'jquery-ui-sortable'), false, true);
    }
}

# Register Google Fonts
add_action('wp_enqueue_scripts', 'aiero_register_theme_fonts');
if (!function_exists('aiero_register_theme_fonts')) {
    function aiero_register_theme_fonts() {
        $fonts_list = array('header_menu_font', 'header_sub_menu_font', 'page_title_heading_font', 'page_title_breadcrumbs_font', 'page_title_additional_text_font', 'main_font', 'additional_font', 'headings_font', 'buttons_font');
        $font_control_list      = get_theme_mod('current_fonts', $fonts_list);
        $current_fonts_array    = array();
        $families               = array();
        $result                 = array();
        foreach ( $font_control_list as $control ) {
            $values = aiero_get_theme_mod($control);
            $values = json_decode($values, true);
            if ( isset($values['font_family']) && !empty($values['font_family']) ) {
                $current_font = array();
                $current_font['font_family'] = $values['font_family'];
                $current_font['font_styles'] = $values['font_styles'];
                $current_font['font_subset'] = $values['font_subset'];
                $current_fonts_array[$control] = $current_font;
            }
        }

        if ( !empty($current_fonts_array) && is_array($current_fonts_array) ) {
            foreach ( $current_fonts_array as $item ) {
                if ( !in_array($item['font_family'], $families) ) {
                    $families[] = $item['font_family'];
                }
            }
            foreach ( $families as $variant ) {
                foreach ( $current_fonts_array as $key => $item ) {
                    if ( $variant == $item['font_family'] ) {
                        $result[$variant]['font_styles'] = empty($result[$variant]['font_styles']) ? $item['font_styles'] : $result[$variant]['font_styles'] . ',' . $item['font_styles'];
                        $result[$variant]['font_subset'] = empty($result[$variant]['font_subset']) ? $item['font_subset'] : $result[$variant]['font_subset'] . ',' . $item['font_subset'];
                    }
                }
            }
            foreach ( $result as $key => $value ) {
                $styles = array_unique(explode(',', $result[$key]['font_styles']));
                asort($styles, SORT_NUMERIC );
                $subset = array_unique(explode(',', $result[$key]['font_subset']));
                asort($subset, SORT_NUMERIC );
                $result[$key]['font_styles'] = implode( ',', $styles );
                $result[$key]['font_subset'] = implode( ',', $subset );
            }
            if ( !empty($result) && is_array($result) ) {
                $fonts = array();
                foreach ( $result as $font_name => $font_params ) {
                    // exclude local fonts
                    if ( $font_name != 'Manrope Alt' ) {
                        $fonts[] = $font_name . ':' . $font_params['font_styles'] . '&subset=' . $font_params['font_subset'];
                    }
                }
                $fonts_url = '//fonts.googleapis.com/css?family=' . urlencode( implode('|', $fonts) );
                wp_enqueue_style('aiero-fonts', $fonts_url);
            }
        }
    }
}

add_action('pre_get_posts', 'aiero_archive_custom_query');
if (!function_exists('aiero_archive_custom_query')) {
    function aiero_archive_custom_query($query) {
        if ( ! is_admin() && $query->is_main_query() ) {
            if(is_post_type_archive('aiero_project')) {
                $posts_per_page = aiero_get_theme_mod('project_archive_posts_per_page');
            } elseif(is_post_type_archive('aiero_service')) {
                $posts_per_page = aiero_get_theme_mod('service_archive_posts_per_page');
            } elseif(is_post_type_archive('aiero_team_member')) {
                $posts_per_page = aiero_get_theme_mod('team_archive_posts_per_page');
            } elseif(is_post_type_archive('aiero_case_study')) {
                $posts_per_page = aiero_get_theme_mod('case_studies_archive_posts_per_page');
            }
            if(isset($posts_per_page)) {
                $query->set('posts_per_page', $posts_per_page);
            }            
        }
    }
}

# WP Footer
add_action('wp_footer', 'aiero_wp_footer');
if (!function_exists('aiero_wp_footer')) {
    function aiero_wp_footer() {
        Aiero_Helper::getInstance()->echoFooter();
    }
}

# Register Menu
add_action('init', 'aiero_register_menu');
if (!function_exists('aiero_register_menu')) {
    function aiero_register_menu() {
        register_nav_menus(
            [
                'main'              => esc_html__('Main Menu', 'aiero'),
                'footer_menu'       => esc_html__('Footer Menu', 'aiero'),
                'footer_add_menu'   => esc_html__('Footer Additional Menu', 'aiero')
            ]
        );
    }
}


# Register Sidebars
add_action('widgets_init', 'aiero_widgets_init');
if (!function_exists('aiero_widgets_init')) {
    function aiero_widgets_init() {
        register_sidebar(
            array(
                'name'          => esc_html__('Page Sidebar', 'aiero'),
                'id'            => 'sidebar',
                'description'   => esc_html__('Widgets in this area will be shown on all pages.', 'aiero'),
                'before_widget' => '<div id="%1$s" class="widget %2$s"><div class="widget-wrapper">',
                'after_widget'  => '</div></div>',
                'before_title'  => '<h4 class="widget-title"><span>',
                'after_title'   => '</span></h4>',
            )
        );

        register_sidebar(
            array(
                'name'          => esc_html__('Post Sidebar', 'aiero'),
                'id'            => 'sidebar-post',
                'description'   => esc_html__('Widgets in this area will be shown on all posts.', 'aiero'),
                'before_widget' => '<div id="%1$s" class="widget %2$s"><div class="widget-wrapper">',
                'after_widget'  => '</div></div>',
                'before_title'  => '<h4 class="widget-title"><span>',
                'after_title'   => '</span></h4>',
            )
        );

        register_sidebar(
            array(
                'name'          => esc_html__('Service Sidebar', 'aiero'),
                'id'            => 'sidebar-service',
                'description'   => esc_html__('Widgets in this area will be shown on all service pages.', 'aiero'),
                'before_widget' => '<div id="%1$s" class="widget %2$s"><div class="widget-wrapper">',
                'after_widget'  => '</div></div>',
                'before_title'  => '<h4 class="widget-title"><span>',
                'after_title'   => '</span></h4>',
            )
        );

        register_sidebar(
            array(
                'name'          => esc_html__('Case Study Sidebar', 'aiero'),
                'id'            => 'sidebar-case-study',
                'description'   => esc_html__('Widgets in this area will be shown on all case study pages.', 'aiero'),
                'before_widget' => '<div id="%1$s" class="widget %2$s"><div class="widget-wrapper">',
                'after_widget'  => '</div></div>',
                'before_title'  => '<h5 class="widget-title"><span>',
                'after_title'   => '</span></h5>',
            )
        );

        register_sidebar(
            array(
                'name'          => esc_html__('Archive Sidebar', 'aiero'),
                'id'            => 'sidebar-archive',
                'description'   => esc_html__('Widgets in this area will be shown on all posts and archive pages.', 'aiero'),
                'before_widget' => '<div id="%1$s" class="widget %2$s"><div class="widget-wrapper">',
                'after_widget'  => '</div></div>',
                'before_title'  => '<h4 class="widget-title"><span>',
                'after_title'   => '</span></h4>',
            )
        );

        register_sidebar(
            array(
                'name'          => esc_html__('FAQ Sidebar', 'aiero'),
                'id'            => 'sidebar-faq',
                'description'   => esc_html__('Widgets in this area will be shown on FAQ page.', 'aiero'),
                'before_widget' => '<div id="%1$s" class="widget %2$s"><div class="widget-wrapper">',
                'after_widget'  => '</div></div>',
                'before_title'  => '<h4 class="widget-title"><span>',
                'after_title'   => '</span></h4>',
            )
        );

        register_sidebar(
            array(
                'name'          => esc_html__('Side Panel Sidebar', 'aiero'),
                'id'            => 'sidebar-side',
                'description'   => esc_html__('Widgets in this area will be shown on side panel.', 'aiero'),
                'before_widget' => '<div id="%1$s" class="widget side-widget %2$s"><div class="widget-wrapper side-widget-wrapper">',
                'after_widget'  => '</div></div>',
                'before_title'  => '<h4 class="widget-title side-widget-title">',
                'after_title'   => '</h4>',
            )
        );

        register_sidebar(
            array(
                'name'          => esc_html__('Menu Sidebar', 'aiero'),
                'id'            => 'sidebar-menu',
                'description'   => esc_html__('Widgets in this area will be shown on compact menu panel.', 'aiero'),
                'before_widget' => '<div id="%1$s" class="widget %2$s"><div class="widget-wrapper">',
                'after_widget'  => '</div></div>',
                'before_title'  => '<h4 class="widget-title"><span>',
                'after_title'   => '</span></h4>',
            )
        );

        register_sidebar(
            array(
                'name'          => esc_html__('Pre Footer Sidebar', 'aiero'),
                'id'            => 'sidebar-pre-footer',
                'description'   => esc_html__('Widgets in this area will be shown on pre footer area.', 'aiero'),
                'before_widget' => '<div id="%1$s" class="widget footer-widget %2$s"><div class="widget-wrapper footer-widget-wrapper">',
                'after_widget'  => '</div></div>',
                'before_title'  => '<h4 class="widget-title footer-widget-title">',
                'after_title'   => '</h4>',
            )
        );

        register_sidebar(
            array(
                'name'          => esc_html__('Footer Sidebar (Style 1)', 'aiero'),
                'id'            => 'sidebar-footer-style1',
                'description'   => esc_html__('Widgets in this area will be shown on footer area.', 'aiero'),
                'before_widget' => '<div id="%1$s" class="widget footer-widget %2$s"><div class="widget-wrapper footer-widget-wrapper">',
                'after_widget'  => '</div></div>',
                'before_title'  => '<h5 class="widget-title footer-widget-title">',
                'after_title'   => '</h5>',
            )
        );

        register_sidebar(
            array(
                'name'          => esc_html__('Footer Sidebar (Style 2)', 'aiero'),
                'id'            => 'sidebar-footer-style2',
                'description'   => esc_html__('Widgets in this area will be shown on footer area.', 'aiero'),
                'before_widget' => '<div id="%1$s" class="widget footer-widget %2$s"><div class="widget-wrapper footer-widget-wrapper">',
                'after_widget'  => '</div></div>',
                'before_title'  => '<h5 class="widget-title footer-widget-title">',
                'after_title'   => '</h5>',
            )
        );

        register_sidebar(
            array(
                'name'          => esc_html__('Footer Sidebar (Style 3)', 'aiero'),
                'id'            => 'sidebar-footer-style3',
                'description'   => esc_html__('Widgets in this area will be shown on footer area.', 'aiero'),
                'before_widget' => '<div id="%1$s" class="widget footer-widget %2$s"><div class="widget-wrapper footer-widget-wrapper">',
                'after_widget'  => '</div></div>',
                'before_title'  => '<h5 class="widget-title footer-widget-title">',
                'after_title'   => '</h5>',
            )
        );

        register_sidebar(
            array(
                'name'          => esc_html__('Footer Sidebar (Style 4)', 'aiero'),
                'id'            => 'sidebar-footer-style4',
                'description'   => esc_html__('Widgets in this area will be shown on footer area.', 'aiero'),
                'before_widget' => '<div id="%1$s" class="widget footer-widget %2$s"><div class="widget-wrapper footer-widget-wrapper">',
                'after_widget'  => '</div></div>',
                'before_title'  => '<h5 class="widget-title footer-widget-title">',
                'after_title'   => '</h5>',
            )
        );

        register_sidebar(
            array(
                'name'          => esc_html__('Footer Sidebar (Style 5)', 'aiero'),
                'id'            => 'sidebar-footer-style5',
                'description'   => esc_html__('Widgets in this area will be shown on footer area.', 'aiero'),
                'before_widget' => '<div id="%1$s" class="widget footer-widget %2$s"><div class="widget-wrapper footer-widget-wrapper">',
                'after_widget'  => '</div></div>',
                'before_title'  => '<h5 class="widget-title footer-widget-title">',
                'after_title'   => '</h5>',
            )
        );

        register_sidebar(
            array(
                'name'          => esc_html__('Footer Sidebar (Style 6)', 'aiero'),
                'id'            => 'sidebar-footer-style6',
                'description'   => esc_html__('Widgets in this area will be shown on footer area.', 'aiero'),
                'before_widget' => '<div id="%1$s" class="widget footer-widget %2$s"><div class="widget-wrapper footer-widget-wrapper">',
                'after_widget'  => '</div></div>',
                'before_title'  => '<h5 class="widget-title footer-widget-title">',
                'after_title'   => '</h5>',
            )
        );

        if (class_exists('WooCommerce')) {
            register_sidebar(
                array(
                    'name'          => esc_html__('Sidebar WooCommerce', 'aiero'),
                    'id'            => 'sidebar-woocommerce',
                    'description'   => esc_html__('Widgets in this area will be shown on Woocommerce Pages.', 'aiero'),
                    'before_widget' => '<div id="%1$s" class="widget wooсommerce-widget %2$s"><div class="widget-wrapper">',
                    'after_widget'  => '</div></div>',
                    'before_title'  => '<h4 class="widget-title"><span>',
                    'after_title'   => '</span></h4>',
                )
            );
        }
    }
}

// Init Custom Widgets
if ( function_exists('aiero_add_custom_widget') ) {
    add_action('widgets_init', 'aiero_custom_widgets_init');
    function aiero_custom_widgets_init() {
        aiero_add_custom_widget('Aiero_Nav_Menu_Widget');
        aiero_add_custom_widget('Aiero_Special_Text_Widget');
    }    
}

// Init Elementor for Custom Post Types
if (!function_exists('aiero_init_elementor_for_team_post_type')) {
    function aiero_init_elementor_for_team_post_type() {
        add_post_type_support('aiero_team_member', 'elementor');
    }
}
add_action('init', 'aiero_init_elementor_for_team_post_type');

if (!function_exists('aiero_init_elementor_for_service_post_type')) {
    function aiero_init_elementor_for_service_post_type() {
        add_post_type_support('aiero_service', 'elementor');
    }
}
add_action('init', 'aiero_init_elementor_for_service_post_type');

if (!function_exists('aiero_init_elementor_for_project_post_type')) {
    function aiero_init_elementor_for_project_post_type() {
        add_post_type_support('aiero_project', 'elementor');
    }
}
add_action('init', 'aiero_init_elementor_for_project_post_type');

if (!function_exists('aiero_init_elementor_for_case_study_post_type')) {
    function aiero_init_elementor_for_case_study_post_type() {
        add_post_type_support('aiero_case_study', 'elementor');
    }
}
add_action('init', 'aiero_init_elementor_for_case_study_post_type');

//Custom Animation for Elementor
if (!function_exists('aiero_elementor_custom_animation')) {
    function aiero_elementor_custom_animation() {
        return array(
            'Aiero Animation' => [
                'aiero_heading_animation' => 'Heading Animation',
                'aiero_clip_down' => 'Clip Down',
                'aiero_clip_up' => 'Clip Up',
                'aiero_clip_right' => 'Clip Right',
                'aiero_clip_left' => 'Clip Left',
            ]
        );
    }
}
add_filter( 'elementor/controls/animations/additional_animations', 'aiero_elementor_custom_animation' );

# WooCommerce
if (class_exists('WooCommerce')) {
    require_once( get_template_directory() . '/woocommerce/wooinit.php');
}

# Max Mega Menu
if (class_exists('Mega_Menu')) {
    require_once( get_template_directory() . '/megamenu/mega-menu.php');
}

// Remove standard WP gallery styles
add_filter( 'use_default_gallery_style', '__return_false' );

// Register custom image sizes
if ( function_exists( 'add_theme_support' ) ) {
    add_theme_support( 'post-thumbnails' );
    set_post_thumbnail_size( 1340, 638, true );
}
if ( function_exists( 'add_image_size' ) ) {
    add_image_size( 'aiero_post_thumbnail_mobile', 575, 274, array('center', 'center') );
    add_image_size( 'aiero_post_thumbnail_tablet', 991, 472, array('center', 'center') );

    add_image_size( 'aiero_post_grid_2_columns', 960, 718, array('center', 'center') );
    add_image_size( 'aiero_post_grid_3_columns', 640, 478, array('center', 'center') );
    add_image_size( 'aiero_post_grid_4_columns', 500, 374, array('center', 'center') );
    add_image_size( 'aiero_post_grid_5_columns', 384, 287, array('center', 'center') );
    add_image_size( 'aiero_post_grid_6_columns', 320, 239, array('center', 'center') );

    add_image_size( 'aiero_portfolio_thumbnail', 835, 653, array('center', 'center') );
    add_image_size( 'aiero_portfolio_grid_1_columns', 1340, 1340, array('center', 'center') );
    add_image_size( 'aiero_portfolio_grid_2_columns', 960, 960, array('center', 'center') );
    add_image_size( 'aiero_portfolio_grid_3_columns', 640, 640, array('center', 'center') );
    add_image_size( 'aiero_portfolio_grid_4_columns', 500, 500, array('center', 'center') );
    add_image_size( 'aiero_portfolio_grid_5_columns', 384, 384, array('center', 'center') );
    add_image_size( 'aiero_portfolio_grid_6_columns', 320, 320, array('center', 'center') );

    add_image_size( 'aiero_project_modern_1_columns', 1340, 689, array('center', 'center') );

    add_image_size( 'aiero_portfolio_masonry_1_columns', 1920, 1920, array('center', 'center') );
    add_image_size( 'aiero_portfolio_masonry_2_columns', 960, 960, array('center', 'center') );
    add_image_size( 'aiero_portfolio_masonry_3_columns', 640, 640, array('center', 'center') );
    add_image_size( 'aiero_portfolio_masonry_4_columns', 500, 500, array('center', 'center') );
    add_image_size( 'aiero_portfolio_masonry_5_columns', 384, 384, array('center', 'center') );
    add_image_size( 'aiero_portfolio_masonry_6_columns', 320, 320, array('center', 'center') );

    add_image_size( 'aiero_team_thumbnail', 535, 551, array('right', 'center') );
}

//Remove 1536x1536 and 2048x2048 image sizes
if (!function_exists('aiero_remove_image_sizes')) {
    function aiero_remove_image_sizes() {
        remove_image_size('1536x1536');
        remove_image_size('2048x2048');
    }
}
add_action('init', 'aiero_remove_image_sizes');

// Media Upload
if (!function_exists('aiero_enqueue_media')) {
    function aiero_enqueue_media() {
        wp_enqueue_media();
    }
}
add_action( 'admin_enqueue_scripts', 'aiero_enqueue_media' );

// Responsive video
add_filter('embed_oembed_html', 'aiero_wrap_oembed_video', 99, 4);
if (!function_exists('aiero_wrap_oembed_video')) {
    function aiero_wrap_oembed_video($html, $url, $attr, $post_id) {
        return '<div class="video-embed">' . $html . '</div>';
    }
}

// Custom Search form
add_filter('get_search_form', 'aiero_get_search_form', 10, 2);
if ( !function_exists('aiero_get_search_form') ) {
    function aiero_get_search_form($form, $args) {
        $search_rand = mt_rand(0, 999);
        $search_js = 'javascript:document.getElementById("search-' . esc_js($search_rand) . '").submit();';
        $placeholder = ( $args['aria_label'] == 'global' ? esc_attr__('Type Your Search...', 'aiero') : esc_attr__('Search...', 'aiero') );

        $form = '<form name="search_form" method="get" action="' . esc_url(home_url('/')) . '" class="search-form" id="search-' . esc_attr($search_rand) . '">';
            $form .= '<span class="search-form-icon" onclick="' . esc_js($search_js) . '"></span>';
            $form .= '<input type="text" name="s" value="" placeholder="' . esc_attr($placeholder) . '" title="' . esc_attr__('Search', 'aiero') . '" class="search-form-field">';
        $form .= '</form>';

        return $form;
    }
}

// Customize WP Categories Widget
add_filter('wp_list_categories', 'aiero_customize_categories_widget', 10, 2);
if ( !function_exists('aiero_customize_categories_widget') ) {
    function aiero_customize_categories_widget($output, $args) {
        $args['use_desc_for_title'] = false;
        if ( $args['hierarchical'] ) {
            $output = str_replace('"cat-item', '"cat-item cat-item-hierarchical', $output);
        }

        return $output;
    }
}

// Add Buttons to Tiny MCE text editor
add_action( 'init', 'aiero_tiny_mce_background_color' );
if ( !function_exists('aiero_tiny_mce_background_color') ) {
    function aiero_tiny_mce_background_color() {
        add_filter('mce_buttons_2', 'aiero_tiny_mce_background_color_button', 999, 1);
    }
}
if ( !function_exists('aiero_tiny_mce_background_color_button') ) {
    function aiero_tiny_mce_background_color_button($buttons) {
        array_unshift($buttons, 'fontsizeselect');
        array_splice($buttons, 4, 0, 'backcolor');
        return $buttons;
    }
}
if ( !function_exists('aiero_tinymce_fontsize') ) {
    function aiero_tinymce_fontsize($sizes) {
        $sizes['fontsize_formats'] = "10px 14px 16px 20px 24px 28px 32px 36px 40px 46px 50px";
        return $sizes;
    }
}
add_filter('tiny_mce_before_init', 'aiero_tinymce_fontsize');

// Customize Comment fields
add_filter('comment_form_defaults', 'aiero_customize_comment_fields');
if ( !function_exists('aiero_customize_comment_fields') ) {
    function aiero_customize_comment_fields($args) {
        $format = current_theme_supports('html5', 'comment-form') ? 'html5' : 'xhtml';
        $commenter          = wp_get_current_commenter();
        $req                = get_option( 'require_name_email' );
        $html5              = 'html5' === $format;

        $html_req           = ( $html5 ? ' required' : ' required="required"' );
        $html_consent       = ( $html5 ? ' checked' : ' checked="checked"' );
        $consent            = empty( $commenter['comment_author_email'] ) ? '' : esc_attr($html_consent);
        $comment_form_args  = array(
            'title_reply'           => esc_html__('Leave a Comment', 'aiero'),
                'cancel_reply_link'     => esc_html__('(Cancel reply)', 'aiero'),
                'title_reply_to'        => esc_html__('Leave a Reply to %s', 'aiero'),
                'title_reply_before'    => '<h4 id="reply-title" class="comment-reply-title">',
                'title_reply_after'     => '</h4>',
                'fields'                => array(
                    'author'    => sprintf('<div class="form-fields"><div class="form-field form-name"><input placeholder="'. esc_attr__('Full name', 'aiero'). ( $req ? '*' : '' ) . '" name="author" type="text" value="' . esc_attr($commenter['comment_author']) . '" size="30"%s/></div>', ( $req ? $html_req : '' )),
                    'email'     => sprintf('<div class="form-field form-email"><input placeholder="' . esc_attr__('Email', 'aiero') . ( $req ? '*' : '' ) . '" name="email" type="text" value="' . esc_attr($commenter['comment_author_email']) . '" size="30"%s/></div>', ( $req ? $html_req : '' )),
                    'cookies'   => '<div class="form-field form-cookies comment-form-cookies-consent">'.
                                         sprintf( '<input id="wp-comment-cookies-consent" name="wp-comment-cookies-consent" type="checkbox" value="yes"%s />', $consent ) . '
                                         <label for="wp-comment-cookies-consent">' . esc_html__( 'Save my name, email, and website in this browser for the next time I comment.', 'aiero' ) . '</label>
                                    </div></div>',
                ),
                'comment_field'         => '<div class="form-field form-message"><textarea name="comment" cols="45" rows="6" placeholder="' . esc_attr__('Message', 'aiero') . '" id="comment-message"></textarea></div>',
                'label_submit'          => esc_html__('Send message', 'aiero'),
                'logged_in_as'          => '<p><a class="logged-in-as">' . esc_html__('Logged in as ', 'aiero') . '<a href="' . esc_url(admin_url( 'profile.php' )) . '">' . esc_html(wp_get_current_user()->display_name) . '</a>. ' . '<a href="' . wp_logout_url( apply_filters( 'the_permalink', get_permalink() ) ) . '">' . esc_html__('Log out?', 'aiero') . '</a>' . '</p>',
                'submit_button'         => '<button name="%1$s" id="%2$s" class="%3$s">%4$s<span class="icon-button-arrow"></span></span><span class="button-inner"></span></button>',
                'submit_field'          => '%1$s %2$s',
                'format' => $format
            );

        return $comment_form_args;
    }
}    

// Move Comment Message field in Comment form
add_filter( 'comment_form_fields', 'aiero_move_comment_fields' );
if ( !function_exists('aiero_move_comment_fields') ) {
    function aiero_move_comment_fields($fields) {
        if ( !function_exists('is_product') || !is_product() ) {
            $comment_field = $fields['comment'];
            $cookies_field = $fields['cookies'];
            unset($fields['comment']);
            unset($fields['cookies']);
            $fields['comment'] = $comment_field;
            $fields['cookies'] = $cookies_field;
        }
        return $fields;
    }
}

// WPForms Plugin Dropdown Menu Fix
if ( function_exists( 'wpforms') ) {
    add_action( 'wpforms_display_field_select', 'aiero_wpform_start_select_wrapper', 5, 1 );
    if ( !function_exists('aiero_wpform_start_select_wrapper') ) {
        function aiero_wpform_start_select_wrapper($field) {
            echo '<div class="select-wrap' . (isset($field['multiple']) && !empty($field['multiple']) ? ' multiple' : '') . (!empty($field['size']) && isset($field['size']) ? ' wpforms-field-' . esc_attr($field['size']) : '') . '">';
        }
    }
    add_action( 'wpforms_display_field_select', 'aiero_wpform_finish_select_wrapper', 15 );
    if ( !function_exists('aiero_wpform_finish_select_wrapper') ) {
        function aiero_wpform_finish_select_wrapper() {
            echo '</div>';
        }
    }
}

// Custom Password Form
add_filter( 'the_password_form', 'aiero_password_form' );
if ( !function_exists('aiero_password_form') ) {
    function aiero_password_form() {
        global $post;
        $out = '<form action="' . esc_url(site_url('wp-login.php?action=postpass', 'login_post')) . '" class="post-password-form" method="post"><p>' . esc_html__('This content is password protected. To view it please enter your password below:', 'aiero') . '</p><p><label for="password"><input name="post_password" id="password" type="password" placeholder="' . esc_attr__('Password', 'aiero') . '" size="20" required /></label><button name="Submit">' . esc_html__('Enter', 'aiero') . '</button></p></form>';
        return $out;
    }
}

// Set Elementor Features Default Values
add_action( 'elementor/experiments/feature-registered', 'aiero_elementor_features_set_default', 10, 2 );
if ( !function_exists('aiero_elementor_features_set_default') ) {
    function aiero_elementor_features_set_default( Elementor\Core\Experiments\Manager $experiments_manager ) {
        $experiments_manager->set_feature_default_state('e_dom_optimization', 'inactive');
    }
}

// Set custom palette in customizer colorpicker
add_action( 'customize_controls_enqueue_scripts', 'aiero_custom_color_palette' );
if ( !function_exists('aiero_custom_color_palette') ) {
    function aiero_custom_color_palette() {
        $color_palettes = json_encode(aiero_get_custom_color_palette());
        wp_add_inline_script('wp-color-picker', 'jQuery.wp.wpColorPicker.prototype.options.palettes = ' . sprintf('%s', $color_palettes) . ';');
    }
}

// Filter for widgets
add_filter( 'dynamic_sidebar_params', 'aiero_dynamic_sidebar_params' );
if (!function_exists('aiero_dynamic_sidebar_params')) {
    function aiero_dynamic_sidebar_params($sidebar_params) {
        if (is_admin()) {
            return $sidebar_params;
        }
        global $wp_registered_widgets;
        $widget_id = $sidebar_params[0]['widget_id'];
        $wp_registered_widgets[$widget_id]['original_callback'] = $wp_registered_widgets[$widget_id]['callback'];
        $wp_registered_widgets[$widget_id]['callback'] = 'aiero_widget_callback_function';

        return $sidebar_params;
    }
}
add_filter( 'widget_output', 'aiero_output_filter', 10, 3 );
if (!function_exists('aiero_output_filter')) {
    function aiero_output_filter($widget_output, $widget_id_base, $widget_id) {
        if ($widget_id_base != 'woocommerce_product_categories' && $widget_id_base != 'wpforms-widget' && $widget_id_base != 'block') {
            $widget_output = str_replace('<select', '<div class="select-wrap"><select', $widget_output);
            $widget_output = str_replace('</select>', '</select></div>', $widget_output);
        }

        return $widget_output;
    }
}

// Admin Footer
add_filter('admin_footer', 'aiero_admin_footer');
if (!function_exists('aiero_admin_footer')) {
    function aiero_admin_footer() {
        if (strlen(get_page_template_slug())>0) {
            echo "<input type='hidden' name='' value='" . (get_page_template_slug() ? get_page_template_slug() : '') . "' class='aiero_this_template_file'>";
        }
    }
}

// Remove post format parameter
add_filter('preview_post_link', 'aiero_remove_post_format_parameter', 9999);
if (!function_exists('aiero_remove_post_format_parameter')) {
    function aiero_remove_post_format_parameter($url) {
        $url = remove_query_arg('post_format', $url);
        return $url;
    }
}

// Post excerpt customize
add_filter( 'excerpt_length', function() {
    return 41;
} );
add_filter( 'excerpt_more', function(){
    return '...';
} );

// Wrap pagination links
add_filter( 'paginate_links_output', 'aiero_wrap_pagination_links', 10, 2 );
if ( !function_exists('aiero_wrap_pagination_links') ) {
    function aiero_wrap_pagination_links($template, $args) {
        if(class_exists('WooCommerce') && (is_shop() || is_product_category() || is_product_taxonomy() || is_product_tag() || wc_get_loop_prop('is_shortcode'))) {
            $template = '<nav class="navigation pagination" role="navigation">' .
                '<h2 class="screen-reader-text">' . esc_html__('Pagination', 'aiero') . '</h2>' .
                '<div class="nav-links">' . 
                    $template . 
                '</div>' .
            '</nav>';
        }
        return $template;
    }
}

//Add Ajax Actions
add_action('wp_ajax_pagination', 'ajax_pagination');
add_action('wp_ajax_nopriv_pagination', 'ajax_pagination');

//Construct Loop & Results
function ajax_pagination() {
    $query_data         = $_POST;

    $paged              = ( isset($query_data['paged']) ) ? intval($query_data['paged']) : 1;
    $filter_term        = ( isset($query_data['filter_term']) ) ? $query_data['filter_term'] : null;
    $filter_taxonomy    = ( isset($query_data['filter_taxonomy']) ) ? $query_data['filter_taxonomy'] : null;
    $args               = ( isset($query_data['args']) ) ? json_decode(stripslashes($query_data['args']), true) : array();
    $args               = array_merge($args, array( 'paged' => sanitize_key($paged) ));
    if ( !empty($filter_term) && !empty($filter_taxonomy) && $filter_term != 'all' ) {
        $args   = array_merge($args, array( sanitize_key($filter_taxonomy) => sanitize_key($filter_term) ));
    }
    $post_type          = isset($args['post_type']) ? $args['post_type'] : 'post';
    $widget             = ( isset($query_data['widget']) ) ? json_decode(stripslashes($query_data['widget']), true) : array();
    $listing_type       = isset($widget['listing_type']) ? $widget['listing_type'] : '';
    $query              = new WP_Query($args);

    $wrapper_class      = isset($query_data['classes']) ? $query_data['classes'] : '';
    $id                 = isset($query_data['id']) ? $query_data['id'] : '';
    $link_base          = isset($args['link_base']) ? $args['link_base'] : '';

    echo '<div class="' . esc_attr($wrapper_class) . '">';
        while ($query->have_posts()) {
            $query->the_post();
            get_template_part('content', $post_type, $widget);
        };
        if ( $listing_type == 'masonry') {
            echo '<div class="grid-sizer"></div>';
        }
        wp_reset_postdata();
    echo '</div>';

    if(isset($widget['show_pagination']) && $widget['show_pagination'] == 'yes' && $query->max_num_pages > 1) {
        echo '<div class="content-pagination">';
            echo '<nav class="navigation pagination" role="navigation">';
                echo '<h2 class="screen-reader-text">' . esc_html__('Pagination', 'aiero') . '</h2>';
                echo '<div class="nav-links">';
                    echo paginate_links( array(
                        'base'      => $link_base . '/?' . esc_attr($id) . '-paged=%#%',
                        'current'   => max( 1, $paged ),
                        'total'     => $query->max_num_pages,
                        'end_size'  => 2,
                        'before_page_number' => '<span class="button-inner"></span>',
                        'prev_text' => esc_html__('Previous', 'aiero') . '<span class="button-inner"></span><span class="icon-button-arrow"></span>',
                        'next_text' => esc_html__('Next', 'aiero') . '<span class="button-inner"></span><span class="icon-button-arrow"></span>',                        
                        'add_args'  => false
                    ) );
                echo '</div>';
            echo '</nav>';
        echo '</div>';
    }

    die();
}

// Customize WP-Blocks Output
if ( !function_exists('aiero_wpblock_widget_render') ) {
    function aiero_wpblock_widget_render($block_content, $block) {

        if ( $block['blockName'] == 'core/file' ) {
            $block_content = str_replace('</a></div>', '<span class="icon-button-arrow"></span></a></div>', $block_content);
        }

        if ( $block['blockName'] == 'core/list' ) {
            $classes = 'wp-block-list';
            if(!empty($block['attrs']['fontSize'])) {
                $classes .= ' has-' . $block['attrs']['fontSize'] . '-font-size';
            }
            if(!empty($block['attrs']['textColor'])) {
                $classes .= ' has-text-color has-' . $block['attrs']['textColor'] . '-color';
            }
            if(!empty($block['attrs']['backgroundColor'])) {
                $classes .= ' has-background has-' . $block['attrs']['backgroundColor'] . '-background-color';
            }
            if(!empty($block['attrs']['style']['color']['background'])) {
                $classes .= ' has-background';
            }
            
            $block_content = str_replace('<ul', '<ul class="' . esc_attr($classes) . '"', $block_content);
        }

        if (
            isset($block['attrs']['displayAsDropdown']) && $block['attrs']['displayAsDropdown'] === true
        ) {
            $block_content = str_replace('<select', '<div class="select-wrap"><select', $block_content);
            $block_content = str_replace('</select>', '</select></div>', $block_content);
        }

        if ( $block['blockName'] == 'core/button' ) {
            if(strpos($block['innerHTML'], 'is-style-outline') === false && strpos($block['innerHTML'], 'is-style-fill') === false) {
                $block_content = str_replace('</a>', '<span class="icon-button-arrow"></span><span class="button-inner"></span></a>', $block_content);
            }
        }

        if (
            ( $block['blockName'] == 'core/search') ||
            ( $block['blockName'] == 'woocommerce/product-search' )
        ) {
            $block_content = str_replace('</button>', '<span class="button-inner"></span></button>', $block_content);
        }

        if (
            ( $block['blockName'] == 'core/search' && isset($block['attrs']['buttonUseIcon']) && $block['attrs']['buttonUseIcon'] === true ) ||
            ( $block['blockName'] == 'woocommerce/product-search' )
        ) {
            $block_content = preg_replace('/<svg\s+.*(<\/svg>)/s', '', $block_content);
        }

        if ( $block['blockName'] == 'core/loginout' && isset($block['attrs']['displayLoginAsForm']) && $block['attrs']['displayLoginAsForm'] === true ) {
            $block_content = str_replace('id="user_login"', 'id="user_login" placeholder="' . esc_html__('Username or Email Address', 'aiero') . '"', $block_content);
            $block_content = str_replace('id="user_pass"', 'id="user_pass" placeholder="' . esc_html__('Password', 'aiero') . '"', $block_content);
            $block_content = preg_replace('/<label for.*<\/label>/', '', $block_content);
        }

        if (
            $block['blockName'] == 'core/latest-posts'
        ) {
            if ( isset($block['attrs']['displayFeaturedImage']) && $block['attrs']['displayFeaturedImage'] == true && isset($block['attrs']['featuredImageAlign']) && ($block['attrs']['featuredImageAlign'] == 'left' || $block['attrs']['featuredImageAlign'] == 'right') ) {
                $block_content = str_replace('<a class="wp-block-latest-posts__post-title', '<div class="wp-block-latest-posts__content"><a class="wp-block-latest-posts__post-title', $block_content);
                $block_content = str_replace('</li>', '</div></li>', $block_content);
            }
        }

        return $block_content;
    }
}

add_filter( 'render_block', 'aiero_wpblock_widget_render', 10, 2 );

// Adding New Style to WP Blocks
if ( !function_exists('filter_metadata_registration') ) {
    function filter_metadata_registration($metadata) {        
        if ( $metadata['name'] == 'core/button' ) {
            $styles_button = [
                [
                    'name'      => 'fill',
                    'label'     => esc_html__('Fill', 'aiero')
                ],
                [
                    'name'      => 'outline',
                    'label'     => esc_html__('Outline', 'aiero'),
                ],
                [
                    'name'      => 'mixed',
                    'label'     => esc_html__('Mixed', 'aiero'),
                    'isDefault' => true
                ],
            ];
            $metadata['styles'] = $styles_button;
        }
        return $metadata;
    }
}
add_filter( 'block_type_metadata', 'filter_metadata_registration', 10, 2 );