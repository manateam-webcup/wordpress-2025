<?php
    defined( 'ABSPATH' ) or die();
?>

<?php

$menu_locations = get_nav_menu_locations();

echo '<div class="alter-menu-wrapper">';    
    echo '<div class="alter-menu-close">';
    	echo esc_html__('Close', 'aiero');
    echo '</div>';
    echo '<div class="alter-menu-bg"></div>';
    echo '<div class="alter-menu">';
        echo '<div class="alter-menu-menu">';
            if ( !empty(aiero_get_prefered_option('header_menu_select')) && aiero_get_prefered_option('header_menu_select') != 'default' ) {
                wp_nav_menu(
                    array(
                        'menu'          => aiero_get_prefered_option('header_menu_select'),
                        'menu_class'    => 'main-menu',
                        'depth'         => 0,
                        'container'     => '',
                        'fallback_cb'   => '',
                        'items_wrap'    => '<nav><ul id="%1$s" class="%2$s">%3$s</ul></nav>'
                    )
                );
            } else {
                if ( isset($menu_locations['main']) && $menu_locations['main'] !== 0 ) {
                    wp_nav_menu(
                        array(
                            'theme_location'    => 'main',
                            'menu_class'        => 'main-menu',
                            'depth'             => 0,
                            'container'         => '',
                            'fallback_cb'       => '',
                            'items_wrap'        => '<nav><ul id="%1$s" class="%2$s">%3$s</ul></nav>'
                        )
                    );
                }
            }
        echo '</div>';
        if ( is_active_sidebar('sidebar-menu') ) {
        	echo '<div class="slide-sidebar-wrapper alter-menu-sidebar-wrapper">';
                echo '<div class="slide-sidebar-content">';
                    dynamic_sidebar('sidebar-menu');
                echo '</div>';
            echo '</div>';
        }        
    echo '</div>';
    echo '<div class="alter-menu-decorate"></div>';
echo '</div>';