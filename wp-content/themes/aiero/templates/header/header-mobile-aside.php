<?php
    defined( 'ABSPATH' ) or die();
?>
    <div class="mobile-header-menu-container">
        <div class="mobile-header-row">

            <!-- Icons Block -->
            <div class="header-icons-container">
                <?php

                // Mini Cart Link
                if ( class_exists('WooCommerce') && aiero_get_prefered_option('header_minicart_status') == 'on' ) {
                    echo '<div class="header-icon mini-cart">';
                        echo '<a href="' . esc_url(wc_get_cart_url()) . '" class="mini-cart-trigger">';
                            echo '<i class="mini-cart-count">';
                                echo '<span>' . WC()->cart->cart_contents_count . '</span>';
                            echo '</i>';
                        echo '</a>';
                    echo '</div>';
                }

                // Search Icon Trigger
                if ( aiero_get_prefered_option('header_search_status') == 'on' ) {
                    echo '<div class="header-icon search-trigger">';
                        echo '<span class="search-trigger-icon"></span>';
                    echo '</div>';
                }

                // Login/Logout
                if ( aiero_get_prefered_option('header_login_status') == 'on' ) {
                    if ( class_exists('WooCommerce') ) {
                        echo '<div class="header-icon login-logout">';
                        if (is_user_logged_in()) {
                            echo '<a href="' . wp_logout_url(home_url()) . '" title="' . esc_attr__('Logout', 'aiero') . '" class="link-logout"></a>';
                        } else {
                            echo '<a href="' . get_permalink(get_option('woocommerce_myaccount_page_id')) . '" title="' . esc_attr__('Login/Register', 'aiero') . '" class="link-login"></a>';
                        };
                        echo '</div>';
                    } else {
                        echo '<div class="header-icon login-logout">';
                        if (is_user_logged_in()) {
                            echo '<a href="' . wp_logout_url(home_url()) . '" title="' . esc_attr__('Logout', 'aiero') . '" class="link-logout"></a>';
                        } else {
                            echo '<a href="' . wp_login_url(get_permalink()) . '" title="' . esc_attr__('Login/Register', 'aiero') . '" class="link-login"></a>';
                        };
                        echo '</div>';
                    }
                }
                    
                // Close Button
                echo '<div class="header-icon menu-close">';
                    echo '<span class="menu-close-icon"></span>';
                echo '</div>';

                ?>
            </div>

        </div>
        <!-- Menu Block -->
        <?php
            if ( aiero_get_prefered_option('header_menu_status') == 'on' ) {
                $header_menu_trigger_style = aiero_get_prefered_option('mobile_header_menu_style');
                $menu_class = 'main-menu';
                if ( !empty($header_menu_trigger_style) ) {
                    $menu_class .= ' ' . $header_menu_trigger_style . '-trigger-menu';
                }
                if ( !empty(aiero_get_prefered_option('header_menu_select')) && aiero_get_prefered_option('header_menu_select') != 'default' ) {
                    wp_nav_menu(
                        array(
                            'menu'          => aiero_get_prefered_option('header_menu_select'),
                            'menu_class'    => $menu_class,
                            'depth'         => 0,
                            'container'     => '',
                            'fallback_cb'   => '',
                            'items_wrap'    => '<nav><ul id="%1$s" class="%2$s">%3$s</ul></nav>'
                        )
                    );
                } else {
                    $menu_locations = get_nav_menu_locations();
                    if ( isset($menu_locations['main']) && $menu_locations['main'] !== 0 ) {
                        wp_nav_menu(
                            array(
                                'theme_location'    => 'main',
                                'menu_class'        => $menu_class,
                                'depth'             => 0,
                                'container'         => '',
                                'fallback_cb'       => '',
                                'items_wrap'        => '<nav><ul id="%1$s" class="%2$s">%3$s</ul></nav>'
                            )
                        );
                    }
                }
            }
        ?>

        <?php
        if (
            aiero_get_prefered_option('top_bar_status') == 'on' &&
            (
                aiero_get_prefered_option('top_bar_contacts_email_status') == 'on' ||
                aiero_get_prefered_option('top_bar_contacts_phone_status') == 'on' ||
                aiero_get_prefered_option('top_bar_contacts_address_status') == 'on'
            )
        ) {
            echo '<div class="header-mobile-contacts">';
                if ( !empty(aiero_get_prefered_option('top_bar_contacts_title')) ) {
                    echo '<div class="contact-items-title">';
                        echo esc_html(aiero_get_prefered_option('top_bar_contacts_title'));
                    echo '</div>';
                }                
                $phone = aiero_get_prepared_option('top_bar_contacts_phone', '', 'top_bar_contacts_phone_status');
                $email = aiero_get_prepared_option('top_bar_contacts_email', '', 'top_bar_contacts_email_status');
                $address = aiero_get_prepared_option('top_bar_contacts_address', '', 'top_bar_contacts_address_status');
                
                if ( !empty($address) && aiero_get_prefered_option('top_bar_contacts_address_status') == 'on' ) {
                    echo '<div class="contact-item contact-item-address">';
                        echo esc_html($address);
                    echo '</div>';
                }
                if ( !empty($phone) && aiero_get_prefered_option('top_bar_contacts_phone_status') == 'on' ) {
                    echo '<div class="contact-item contact-item-phone">';
                        echo '<a href="tel:' . aiero_clear_phone($phone) . '">';
                            echo esc_html($phone);
                        echo '</a>';
                    echo '</div>';
                }
                if ( !empty($email) && aiero_get_prefered_option('top_bar_contacts_email_status') == 'on' ) {
                    echo '<div class="contact-item contact-item-email">';
                        echo '<a href="mailto:' . esc_attr($email) . '">';
                            echo esc_html($email);
                        echo '</a>';
                    echo '</div>';
                }                
            echo '</div>';
        }
        ?>

        <?php
        $additional_text_title = aiero_get_prepared_option('top_bar_additional_text_title', '', 'top_bar_additional_text_status');
        $additional_text = aiero_get_prepared_option('top_bar_additional_text', '', 'top_bar_additional_text_status');
        if (
            aiero_get_prefered_option('top_bar_status') == 'on' &&
            aiero_get_prefered_option('top_bar_additional_text_status') == 'on' &&
            (
                !empty($additional_text_title) ||
                !empty($additional_text)
            )
        ) {
            echo '<div class="header-mobile-additional-text">';
                if ( !empty($additional_text_title) ) {
                    echo '<span class="additional-text-title">';
                        echo wp_kses($additional_text_title, array(
                            'mark' => array(),
                            'span' => array(
                                'class' => true
                            )
                        ));
                    echo '</span>';
                }
                if ( !empty($additional_text) ) {
                    echo wp_kses($additional_text, array(
                        'mark' => array(),
                        'span' => array(
                            'class' => true
                        )
                    ));
                }
            echo '</div>';
        }
        ?>

        <?php
        if (
            aiero_get_prefered_option('top_bar_status') == 'on' &&
            aiero_get_prefered_option('top_bar_socials_status') == 'on'
        ) {
            echo '<div class="header-mobile-socials">';
                $socials_title = aiero_get_prepared_option('top_bar_socials_title', '', 'top_bar_socials_status');
                if ( !empty($socials_title) ) {
                    echo '<span class="socials-title">' . esc_html($socials_title) . '</span>';
                }
                echo aiero_socials_output('mobile-menu-socials wrapper-socials');
            echo '</div>';
        }
        ?>

        <?php
        if (
            aiero_get_prefered_option('header_callback_status') == 'on' &&
            ( aiero_get_prefered_option('header_style') == 'type-1' || 
              aiero_get_prefered_option('header_style') == 'type-2' ||
        	 aiero_get_prefered_option('header_menu_style') === 'compact' ) &&
            (
                !empty(aiero_get_prepared_option('header_callback_text', '', 'header_callback_status')) ||
                !empty(aiero_get_prepared_option('header_callback_title', '', 'header_callback_status'))
            )
        ) {
            echo '<div class="callback">';
                if ( !empty(aiero_get_prepared_option('header_callback_title', '', 'header_callback_status')) ) {
                    echo '<span class="callback-title">';
                        echo esc_html(aiero_get_prepared_option('header_callback_title', '', 'header_callback_status'));
                    echo '</span>';
                }
                if ( !empty(aiero_get_prepared_option('header_callback_text', '', 'header_callback_status')) ) {
                    echo '&nbsp;';
                    echo '<a href="tel:' . aiero_clear_phone(aiero_get_prepared_option('header_callback_text', '', 'header_callback_status')) . '" class="callback-text">';
                        echo esc_html(aiero_get_prepared_option('header_callback_text', '', 'header_callback_status'));
                    echo '</a>';
                }
            echo '</div>';
        }
        ?>

        <?php
        if (
            aiero_get_prefered_option('header_button_status') == 'on' &&
            !empty(aiero_get_prefered_option('header_button_text'))
        ) {
            echo '<div class="header-mobile-button">';
                echo '<a class="aiero-button" href="' . ( !empty(aiero_get_prefered_option('header_button_url')) ? esc_url(aiero_get_prefered_option('header_button_url')) : esc_js('javascript:void(0);')) . '">';
                    echo esc_html(aiero_get_prefered_option('header_button_text'));
                    echo '<span class="button-inner"></span>';
                echo '</a>';
            echo '</div>';
        }
        ?>

    </div>