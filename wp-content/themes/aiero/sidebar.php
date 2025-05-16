<?php
/*
 * Created by Artureanec
*/

$sidebar_args             = aiero_get_sidebar_args();
$aiero_sidebar_name      = $sidebar_args['sidebar_name'];
$aiero_sidebar_position  = $sidebar_args['sidebar_position'];
$additional_class         = $sidebar_args['additional_class'];

if ($aiero_sidebar_position !== 'none' && is_active_sidebar($aiero_sidebar_name) ) {
    echo '<div class="sidebar sidebar-position-' . esc_attr($aiero_sidebar_position) . esc_attr($additional_class) . '">';
        dynamic_sidebar($aiero_sidebar_name);
        echo '<div class="shop-hidden-sidebar-close"></div>';
    echo "</div>";
    if ( $additional_class == ' simple-sidebar' ) {
        echo '<div class="simple-sidebar-trigger"></div>';
    }
}