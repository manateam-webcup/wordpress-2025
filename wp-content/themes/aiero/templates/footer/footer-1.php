<?php
    defined( 'ABSPATH' ) or die();
?>

<?php if (
        aiero_get_prefered_option('prefooter_sidebar_status') == 'on' &&
        !empty(aiero_get_prepared_option('prefooter_sidebar_select', '', 'prefooter_sidebar_status')) &&
        is_active_sidebar(aiero_get_prepared_option('prefooter_sidebar_select', '', 'prefooter_sidebar_status'))
    ) { ?>

        <!-- Footer Widgets -->
        <div class="footer-section prefooter-section">
            <div class="footer-row">
                <div class="footer-widgets">
                    <?php dynamic_sidebar(aiero_get_prepared_option('prefooter_sidebar_select', '', 'prefooter_sidebar_status')); ?>
                </div>
            </div>
        </div>

<?php } ?>

<?php if (
        aiero_get_prefered_option('footer_sidebar_status') == 'on' &&
        !empty(aiero_get_prepared_option('footer_sidebar_select', '', 'footer_sidebar_status')) &&
        is_active_sidebar(aiero_get_prepared_option('footer_sidebar_select', '', 'footer_sidebar_status'))
    ) { ?>

        <!-- Footer Widgets -->
        <div class="footer-section">
            <div class="footer-row">
                <div class="footer-widgets">
                    <?php dynamic_sidebar(aiero_get_prepared_option('footer_sidebar_select', '', 'footer_sidebar_status')); ?>
                </div>
            </div>
        </div>

<?php } ?>

<?php if ( aiero_get_prefered_option('footer_menu_status') == 'on' ) { ?>

    <!-- Footer Menu -->
    <?php
        if ( !empty(aiero_get_prefered_option('footer_menu_select')) && aiero_get_prefered_option('footer_menu_select') != 'default' ) {
            wp_nav_menu(
                array(
                    'menu'              => aiero_get_prefered_option('footer_menu_select'),
                    'menu_class'        => 'footer-menu',
                    'depth'             => 1,
                    'container'         => 'div',
                    'container_class'   => 'footer-section',
                    'fallback_cb'       => '',
                    'items_wrap'        => '<div class="footer-row"><div class="footer-menu-container"><nav><ul id="%1$s" class="%2$s">%3$s</ul></nav></div></div>'
                )
            );
        } else {
            wp_nav_menu(
                array(
                    'theme_location'    => 'footer_menu',
                    'menu_class'        => 'footer-menu',
                    'depth'             => 1,
                    'container'         => 'div',
                    'container_class'   => 'footer-section',
                    'fallback_cb'       => '',
                    'items_wrap'        => '<div class="footer-row"><div class="footer-menu-container"><nav><ul id="%1$s" class="%2$s">%3$s</ul></nav></div></div>'
                )
            );
        }
    ?>

<?php } ?>

<?php if (
        aiero_get_prefered_option('footer_copyright_status') == 'on' ||
        aiero_get_prefered_option('footer_additional_menu_status') == 'on'
) { ?>
    <!-- Footer Info -->
        <div class="footer-section footer-section-bottom">
            <div class="footer-columns-row">
                <?php

                    // Copyrights
                    if (
                        aiero_get_prefered_option('footer_copyright_status') == 'on' &&
                        !empty(aiero_get_prefered_option('footer_copyright_text'))
                    ) {
                        echo '<div class="footer-column footer-copyrights-container">';
                            echo wp_kses(aiero_get_prefered_option('footer_copyright_text'), array('a' => array('href' => array(), 'target' => array())));
                        echo '</div>';
                    }

                    // Footer Additional Menu
                    if ( aiero_get_prefered_option('footer_additional_menu_status') == 'on' ) {
                        if ( !empty(aiero_get_prefered_option('footer_additional_menu_select')) && aiero_get_prefered_option('footer_additional_menu_select') != 'default' ) {
                            wp_nav_menu(
                                array(
                                    'menu'              => aiero_get_prefered_option('footer_additional_menu_select'),
                                    'menu_class'        => 'footer-additional-menu',
                                    'depth'             => 1,
                                    'container'         => 'div',
                                    'container_class'   => 'footer-column footer-additional-menu-container',
                                    'fallback_cb'       => '',
                                    'items_wrap'        => '<nav><ul id="%1$s" class="%2$s">%3$s</ul></nav>'
                                )
                            );
                        } else {
                            wp_nav_menu(
                                array(
                                    'theme_location'    => 'footer_add_menu',
                                    'menu_class'        => 'footer-additional-menu',
                                    'depth'             => 1,
                                    'container'         => 'div',
                                    'container_class'   => 'footer-column footer-additional-menu-container',
                                    'fallback_cb'       => '',
                                    'items_wrap'        => '<nav><ul id="%1$s" class="%2$s">%3$s</ul></nav>'
                                )
                            );
                        }
                    }
                ?>
            </div>
        </div>
<?php } ?>