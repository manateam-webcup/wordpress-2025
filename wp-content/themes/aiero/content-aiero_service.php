<?php
    $listing_type   = !empty($args['listing_type']) ? $args['listing_type'] : 'grid';
    $icon_type      = !empty($args['icon_type']) ? $args['icon_type'] : 'svg';
    $excerpt_length = !empty($args['excerpt_length']) ? $args['excerpt_length'] : aiero_get_theme_mod('service_archive_excerpt_length');
    $show_media     = !empty($args['show_media']) ? $args['show_media'] : '';
    $show_read_more = !empty($args['show_read_more']) ? $args['show_read_more'] : '';
    $read_more_text = !empty($args['read_more_text']) ? $args['read_more_text'] : esc_html__('Read More', 'aiero');
    $item_counter   = !empty($args['item_counter']) ? $args['item_counter'] : 1;
    $columns_number = !empty($args['columns_number']) ? $args['columns_number'] : 4;
?>

<div <?php post_class('service-item-wrapper'); ?>>
    <div class="service-item">

        <?php
            if( $listing_type === 'grid' ) {
            	if( $show_media === 'yes' && !empty(get_post_thumbnail_id()) ) {
            		echo '<div class="service-item-media">';
            			echo get_the_post_thumbnail(null, 'full');
            		echo '</div>';
            	}
                if( !empty(aiero_get_post_option('service_main_icon')) || !empty(aiero_get_post_option('service_icon_svg')) ) {
                    echo '<div class="service-icon">';
                        if( $icon_type === 'default' && !empty(aiero_get_post_option('service_main_icon')) ) {
                            echo '<i class="icon ' . esc_attr(aiero_get_post_option('service_main_icon')) . '"' . (!empty(aiero_get_post_option('service_main_icon_color')) ? ' style="color: ' . esc_attr(aiero_get_post_option('service_main_icon_color')) . '"' : '') . '></i>';
                        } elseif( $icon_type === 'svg' && !empty(aiero_get_post_option('service_icon_svg')) ) {
                            echo '<span class="icon"' . (!empty(aiero_get_post_option('service_svg_icon_color')) ? ' style="color: ' . esc_attr(aiero_get_post_option('service_svg_icon_color')) . '"' : '') .'>' . aiero_output_code(aiero_get_post_option('service_icon_svg')) . '</span>';
                        }
                    echo '</div>';
                }
                $excerpt = get_the_excerpt();
                if( !empty(get_the_title()) || !empty($excerpt) || ($show_read_more == 'yes' && !empty($read_more_text)) ) {
                    echo '<div class="service-item-content">';
                        if( !empty(get_the_title()) ) {
                            echo '<h5 class="service-post-title"><a href="' . esc_url(get_the_permalink()) . '">' . get_the_title() . '</a></h5>';
                        }
                        if ( !empty($excerpt) ) {
                            echo '<div class="service-item-excerpt">';
                                if (!empty($excerpt_length)) {
                                    echo substr($excerpt, 0, $excerpt_length);
                                } else {
                                    the_excerpt();
                                }
                            echo '</div>';
                        }
                        if ( $show_read_more == 'yes' && !empty($read_more_text) ) {
                            echo '<div class="button-container">';
                                echo '<a class="aiero-button" href="' . esc_url(get_the_permalink()) . '">';                                	
                                    echo esc_html($read_more_text);
                                    echo '<span class="icon-button-arrow"></span>';
                                    echo '<span class="button-inner"></span>';
                                echo '</a>';
                            echo '</div>';
                        }
                    echo '</div>';
                }
            }
            elseif( $listing_type === 'list' ) {
                if( !empty(get_the_title()) ) {
                    echo '<h2 class="service-post-title">'; 
                        echo '<a href="' . esc_url(get_the_permalink()) . '">';
                            echo '<span class="service-post-inner">';
                                echo '<span class="service-post-title-counter">' . ($item_counter < 10 ? '0' . $item_counter : $item_counter) . '</span>';
                                echo '<span class="service-post-title-text">/' . get_the_title() . '/&nbsp;</span>';
                            echo '</span>';
                            echo '<span class="service-post-inner-alt">';
                                echo '<span class="service-post-title-counter">' . ($item_counter < 10 ? '0' . $item_counter : $item_counter) . '</span>';
                                echo '<span class="service-post-title-text">/' . get_the_title() . '/&nbsp;</span>';
                            echo '</span>';
                        echo '</a>';
                    echo '</h2>';
                }
            } else {
                if( !empty(aiero_portfolio_grid_media_output(null, $columns_number, $listing_type))) {
                    echo '<a class="service-item-link" href="' . esc_url(get_the_permalink()) . '">';
                        echo aiero_portfolio_grid_media_output(null, $columns_number, $listing_type);
                        if( !empty(aiero_get_post_option('service_subtitle')) ) {
                            echo '<span class="service-item-subtitle">';
                                echo esc_html(aiero_get_post_option('service_subtitle'));
                            echo '</span>';
                        }
                    echo '</a>';
                }
                if( !empty(aiero_services_tags_output()) || !empty(get_the_title()) ) {
                    echo '<div class="service-item-content">';
                        if( !empty(aiero_services_tags_output()) ) {
                            echo aiero_services_tags_output();
                        }                    
                        if( !empty(get_the_title()) ) {
                            echo '<h5 class="service-post-title"><a href="' . esc_url(get_the_permalink()) . '">' . get_the_title() . '</a></h5>';
                        }                        
                    echo '</div>';
                }
                echo '<div class="service-item-icon">';
                    echo '<div class="service-item-icon-wrapper">';
                        echo '<div class="service-item-icon-inner">';
                            echo '<a href="' . esc_url(get_the_permalink()) . '" class="service-item-icon-link">';
                            	echo '<span class="service-item-icon-link-inner">';
                                	echo '<i aria-hidden="true" class="fontello icon-button-arrow"></i>';
                                	echo '<i aria-hidden="true" class="fontello icon-button-arrow"></i>';
                                echo '</span>';
                            echo '</a>';
                        echo '</div>';
                    echo '</div>';
                echo '</div>';
            }
        ?>

    </div>
</div>