<?php
    defined( 'ABSPATH' ) or die();

    $slide_sidebar_classes = 'slide-sidebar-wrapper slide-sidebar-position-left';

    $header_classes = 'header';
    $mobile_classes = 'mobile-header';
    if ( !empty(aiero_get_prefered_option('header_style')) ) {
        $header_classes .= ' header-' . esc_attr(aiero_get_prefered_option('header_style'));
    }
    if ( !empty(aiero_get_prefered_option('header_position')) ) {
        $header_classes .= ' header-position-' . esc_attr(aiero_get_prefered_option('header_position'));
    }
    
    $page_for_posts = get_option( 'page_for_posts' );
    if( aiero_post_options() &&
        (is_singular() || 
        (class_exists('WooCommerce') && is_woocommerce()) ||
        (is_home() && $page_for_posts)) ) {
            if( !empty(aiero_get_post_option('header_transparent')) ) {
                $header_classes .= ' header-transparent';
                $mobile_classes .= ' mobile-header-transparent';
            }
    } else {
        if ( !empty(aiero_get_prefered_option('header_transparent')) ) {
            $header_classes .= ' header-transparent';
            $mobile_classes .= ' mobile-header-transparent';
        }
    }
    
    if ( !empty(aiero_get_prefered_option('sticky_header_status')) ) {
        $header_classes .= ' sticky-header-' . esc_attr(aiero_get_prefered_option('sticky_header_status'));
    }

    if ( !empty(aiero_get_prefered_option('header_menu_style')) ) {
        $header_classes .= ' header-menu-style-' . esc_attr(aiero_get_prefered_option('header_menu_style'));
    }
    
    if ( !empty(aiero_get_prefered_option('header_position')) ) {
        $mobile_classes .= ' mobile-header-position-' . esc_attr(aiero_get_prefered_option('header_position'));
    }
    if ( !empty(aiero_get_prefered_option('sticky_header_status')) ) {
        $mobile_classes .= ' sticky-header-' . esc_attr(aiero_get_prefered_option('sticky_header_status'));
    }
    if ( !empty(aiero_get_prefered_option('header_style')) ) {
        $mobile_classes .= ' mobile-header-' . esc_attr(aiero_get_prefered_option('header_style'));
    }

    $sticky_header_classes = 'header sticky-header';
    if ( !empty(aiero_get_prefered_option('header_style')) ) {
        $sticky_header_classes .= ' header-' . esc_attr(aiero_get_prefered_option('header_style'));
    }
    if ( !empty(aiero_get_prefered_option('header_menu_style')) ) {
        $sticky_header_classes .= ' header-menu-style-' . esc_attr(aiero_get_prefered_option('header_menu_style'));
    }
    if ( aiero_get_prepared_option('sticky_header_blur', '', 'sticky_header_status') === 'on' ) {
        $sticky_header_classes .= ' sticky-header-blur-on';
    }

    $mobile_sticky_header_classes = 'mobile-header sticky-header';
    if ( !empty(aiero_get_prefered_option('header_style')) ) {
        $mobile_sticky_header_classes .= ' mobile-header-' . esc_attr(aiero_get_prefered_option('header_style'));
    }
?>

<!DOCTYPE html>
<html <?php language_attributes(); ?>>
    <head>
        <meta http-equiv="Content-Type" content="<?php bloginfo('html_type'); ?>; charset=<?php bloginfo('charset'); ?>">
        <meta name="viewport" content="width=device-width, initial-scale=1, maximum-scale=1">
        <meta http-equiv="X-UA-Compatible" content="IE=Edge">
        <link rel="pingback" href="<?php bloginfo('pingback_url'); ?>">
        <?php wp_head(); ?>
    </head>

    <!-- Body -->
    <body <?php body_class(); ?>>
        <?php if ( function_exists( 'wp_body_open' ) ) {
                wp_body_open();
        } ?>
        <div class="body-overlay"></div>

        <?php if ( aiero_get_prefered_option('page_loader_status') == 'on' ) { ?>
            <!-- Page Pre Loader -->
            <div class="page-loader-container">
                <div class="page-loader">
                    <div class="page-loader-inner">
                        <?php
                            if ( !empty(aiero_get_prefered_option('page_loader_image')) ) {
                                $loader_image_metadata = wp_get_attachment_metadata(attachment_url_to_postid(aiero_get_prefered_option('page_loader_image')));
                                $loader_image_width = (isset($loader_image_metadata['width']) ? $loader_image_metadata['width'] : 0);
                                $loader_image_height = (isset($loader_image_metadata['height']) ? $loader_image_metadata['height'] : 0);
                                $loader_image_url = aiero_get_theme_mod('page_loader_image');

                                echo '<img width="' . esc_attr($loader_image_width) . '" height="' . esc_attr($loader_image_height) . '" src="' . esc_url($loader_image_url) . '" alt="' . esc_attr__('Page Loader Image', 'aiero') . '"  class="page-loader-logo" />';
                            } else {
                                echo '<img width="100" height="100" src="' . get_template_directory_uri() . '/img/page-loader.png' . '" alt="' . esc_attr__('Page Loader Image', 'aiero') . '"  class="page-loader-logo" />';
                            }
                        ?>
                    </div>
                </div>
            </div>
        <?php } ?>

        <?php if ( aiero_get_prefered_option('header_search_status') == 'on' ) { ?>
            <!-- Search Panel -->
            <div class="site-search">
                <div class="site-search-close"></div>
                <?php
                    $search_args = array(
                        'echo'          => true,
                        'aria_label'    => 'global'
                    );
                    get_search_form($search_args);
                ?>
            </div>
        <?php } ?>

        <!-- Mobile Menu Panel -->
        <?php
            get_template_part( 'templates/header/header-mobile-aside' );
        ?>

        <!-- Compact Menu Block -->
        <?php
            if ( aiero_get_prefered_option('header_status') == 'on' && aiero_get_prefered_option('header_menu_style') === 'compact' && aiero_get_prefered_option('header_menu_status') == 'on' ) {
                get_template_part('templates/header/header-alter-menu');
            }
        ?>

        <div class="body-container">

            <?php
            if ( aiero_get_prefered_option('side_panel_status') == 'on' && 
                (is_active_sidebar('sidebar-side') || aiero_get_prefered_option('sidebar_logo_status') == 'on' || aiero_get_prefered_option('side_panel_socials_status') == 'on') ) { ?>
                <!-- Side Panel -->
                <div class="<?php echo esc_attr($slide_sidebar_classes); ?>">
                    <div class="slide-sidebar-close"><?php echo esc_html__('Close', 'aiero'); ?></div>
                    <div class="slide-sidebar">
                        <?php 
                            if ( aiero_get_prefered_option('sidebar_logo_status') == 'on' ) {
                                // Side Panel Logo
                                echo '<div class="sidebar-logo-container">' . aiero_get_sidebar_logo_output() . '</div>';
                            }
                        ?>
                        <div class="slide-sidebar-content">
                            <?php dynamic_sidebar('sidebar-side'); ?>
                        </div>
                        <?php
                            if( aiero_get_prefered_option('side_panel_socials_status') == 'on' ) {
                                echo aiero_socials_output('wrapper-socials');
                            }
                        ?>
                    </div>
                    <span class="slide-sidebar-gradient"></span>
                </div>
            <?php
            } ?>

            <?php
                if ( aiero_get_prefered_option('top_bar_status') == 'on' ||
                     aiero_get_prefered_option('header_status') == 'on' || 
                     aiero_get_prefered_option('page_title_status') == 'on' ) {
                    $top_page_wrapper_classes = 'top-page-wrapper';                	
                    if ( !empty(aiero_get_prefered_option('header_style')) ) {
                        $top_page_wrapper_classes .= ' header-' . esc_attr(aiero_get_prefered_option('header_style'));
                    }
                    if ( !empty(aiero_get_prefered_option('header_position')) ) {
                        $top_page_wrapper_classes .= ' header-position-' . esc_attr(aiero_get_prefered_option('header_position'));
                    }
                    echo '<div class="' . esc_attr($top_page_wrapper_classes) . '">';
                }
            ?>

            <?php
                if ( aiero_get_prefered_option('top_bar_status') == 'on' ||
                     aiero_get_prefered_option('header_status') == 'on' ) {
                    $header_wrapper_classes = 'header-wrapper';
                	if ( aiero_get_prefered_option('top_bar_status') != 'on' ) {
                		$header_wrapper_classes .= ' no-top-bar';
                	}
                    if ( !empty(aiero_get_prefered_option('header_position')) ) {
                        $header_wrapper_classes .= ' header-position-' . esc_attr(aiero_get_prefered_option('header_position'));
                    }
                    if ( aiero_get_prefered_option('header_status') != 'on' ) {
                        $header_wrapper_classes .= ' no-header';
                    }
                    echo '<div class="' . esc_attr($header_wrapper_classes) . '">';
                }
            ?>

            <!-- Top Bar -->
            <?php
                if ( aiero_get_prefered_option('top_bar_status') == 'on' ) {
                    get_template_part( 'templates/top-bar/top-bar' );
                }
            ?>

            <!-- Mobile Sticky Header -->
            <?php
            if( aiero_get_prefered_option('header_status') == 'on' && aiero_get_prefered_option('sticky_header_status') == 'on' ) {
                echo '<div class="' . esc_attr($mobile_sticky_header_classes) . '">';
                    get_template_part( 'templates/header/header-mobile' );
                echo '</div>';
            } ?>

            <!-- Mobile Header -->
            <?php
            if( aiero_get_prefered_option('header_status') == 'on' ) {
                echo '<div class="' . esc_attr($mobile_classes) . '">';
                    get_template_part( 'templates/header/header-mobile' );
                echo '</div>';
            } ?>

            <?php
            if ( aiero_get_prefered_option('header_status') == 'on' ) {                
                if(aiero_get_prefered_option('sticky_header_status') == 'on') { ?>
                    <!-- Sticky Header -->
                    <?php echo '<header class="' . esc_attr($sticky_header_classes) . '">';
                        if(aiero_get_prefered_option('header_menu_style') !== 'compact') {
                            switch (aiero_get_prefered_option('header_style')) {                            
                                case 'type-2' :
                                    get_template_part('templates/header/header-2');
                                    break;
                                case 'type-3' :
                                    get_template_part('templates/header/header-3');
                                    break;
                                case 'type-4' :
                                    get_template_part('templates/header/header-4');
                                    break;
                                default :
                                    get_template_part('templates/header/header-1');
                                    break;
                            }
                        } else {
                            get_template_part('templates/header/header-alter');
                        }
                    ?>
                    <?php echo '</header>'; 
                } ?>
                <!-- Header -->
                <?php
                echo '<header class="' . esc_attr($header_classes) . '">';
                    if(aiero_get_prefered_option('header_menu_style') !== 'compact') {
                        switch (aiero_get_prefered_option('header_style')) {
                            case 'type-2' :
                                get_template_part('templates/header/header-2');
                                break;
                            case 'type-3' :
                                get_template_part('templates/header/header-3');
                                break;
                            case 'type-4' :
                                get_template_part('templates/header/header-4');
                                break;
                            default :
                                get_template_part('templates/header/header-1');
                                break;
                        }
                    } else {
                        get_template_part('templates/header/header-alter');
                    }
                echo '</header>';
            }
            ?>

            <?php
                if ( aiero_get_prefered_option('top_bar_status') == 'on' ||
                     aiero_get_prefered_option('header_status') == 'on' ) {
                    echo '</div>';
                }
            ?>

            <?php
            // Page Title
            if (aiero_get_prefered_option('page_title_status') == 'on') {
                get_template_part( 'templates/page-title/page-title' );
            }
            ?>

            <?php
                if ( aiero_get_prefered_option('top_bar_status') == 'on' ||
                     aiero_get_prefered_option('header_status') == 'on' || 
                     aiero_get_prefered_option('page_title_status') == 'on' ) {
                    echo '</div>';
                }
            ?>