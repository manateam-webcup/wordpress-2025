<?php
defined( 'ABSPATH' ) or die();
?>
<!-- Top Bar -->
<div class="top-bar">
    <div class="top-bar-row">
        <?php

            if ( aiero_get_prefered_option('top_bar_contacts_email_status') == 'on' || aiero_get_prefered_option('top_bar_contacts_phone_status') == 'on' || aiero_get_prefered_option('top_bar_contacts_address_status') == 'on' ) {
                echo '<div class="top-bar-column">';

                    // Contacts
                    if ( aiero_get_prefered_option('top_bar_contacts_email_status') == 'on' || aiero_get_prefered_option('top_bar_contacts_phone_status') == 'on' || aiero_get_prefered_option('top_bar_contacts_address_status') == 'on' ) {
                        $email = aiero_get_prepared_option('top_bar_contacts_email', '', 'top_bar_contacts_email_status');
                        $phone = aiero_get_prepared_option('top_bar_contacts_phone', '', 'top_bar_contacts_phone_status');
                        $address = aiero_get_prepared_option('top_bar_contacts_address', '', 'top_bar_contacts_address_status');
                        $email_title = aiero_get_prepared_option('top_bar_contacts_email_title', '', 'top_bar_contacts_email_status');
                        $phone_title = aiero_get_prepared_option('top_bar_contacts_phone_title', '', 'top_bar_contacts_phone_status');
                        $address_title = aiero_get_prepared_option('top_bar_contacts_address_title', '', 'top_bar_contacts_address_status');
                        echo '<div class="top-bar-contacts wrapper-contacts">';
                            if ( !empty($phone) && aiero_get_prefered_option('top_bar_contacts_phone_status') == 'on' ) {
                                echo '<div class="contact-item contact-item-phone">';
                                    if(!empty($phone_title)) {
                                        echo '<span class="contact-item-title">' . esc_html($phone_title) . '&nbsp;</span>';
                                    }
                                    echo '<a href="tel:' . aiero_clear_phone($phone) . '">';
                                        echo esc_html($phone);
                                    echo '</a>';
                                echo '</div>';
                            }
                            if ( !empty($email) && aiero_get_prefered_option('top_bar_contacts_email_status') == 'on' ) {
                                echo '<div class="contact-item contact-item-email">';
                                    if(!empty($email_title)) {
                                        echo '<span class="contact-item-title">' . esc_html($email_title) . '&nbsp;</span>';
                                    }
                                    echo '<a href="mailto:' . esc_attr($email) . '">';
                                        echo esc_html($email);
                                    echo '</a>';
                                echo '</div>';
                            }                            
                            if ( !empty($address) && aiero_get_prefered_option('top_bar_contacts_address_status') == 'on' ) {
                                echo '<div class="contact-item contact-item-address">';
                                    if(!empty($address_title)) {
                                        echo '<span class="contact-item-title">' . esc_html($address_title) . '&nbsp;</span>';
                                    }
                                    echo '<span class="contact-item-address-text">' . esc_html($address) . '</span>';
                                echo '</div>';
                            }
                        echo '</div>';
                    }

                echo '</div>';
            }

            $additional_text_title = aiero_get_prepared_option('top_bar_additional_text_title', '', 'top_bar_additional_text_status');
            $additional_text = aiero_get_prepared_option('top_bar_additional_text', '', 'top_bar_additional_text_status');
            if (
                (
                    aiero_get_prefered_option('top_bar_additional_text_status') == 'on' &&
                    (
                        !empty($additional_text_title) ||
                        !empty($additional_text)
                    )
                ) ||
                aiero_get_prefered_option('top_bar_socials_status') == 'on'
            ) {
                echo '<div class="top-bar-column">';
                    echo '<div class="top-bar-info wrapper-info">';
                    // Additional text
                    if (
                        aiero_get_prefered_option('top_bar_additional_text_status') == 'on' &&
                        (
                            !empty($additional_text_title) ||
                            !empty($additional_text)
                        )
                    ) {
                        echo '<div class="top-bar-additional-text">';
                        if ( !empty($additional_text_title) ) {
                            echo '<span class="additional-text-title">';
                                echo wp_kses($additional_text_title, array(
                                    'mark' => array(),
                                    'span' => array(
                                        'class' => true
                                    )
                                ));
                            echo '</span> ';
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

                    // Social Icons
                    if ( aiero_get_prefered_option('top_bar_socials_status') == 'on' ) {
                        $socials_title = aiero_get_prepared_option('top_bar_socials_title', '', 'top_bar_socials_status');
                        if ( !empty($socials_title) ) {
                            echo '<span class="socials-title">' . esc_html($socials_title) . '</span>';
                        }
                        echo aiero_socials_output('top-bar-socials wrapper-socials');
                    }

                    echo '</div>';
                echo '</div>';
            }

        ?>
    </div>
</div>