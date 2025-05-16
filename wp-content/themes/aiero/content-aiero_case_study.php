<?php
$show_media     = ( isset($args['show_media']) ? $args['show_media'] : 'yes' );
$show_date      = ( isset($args['show_date']) ? $args['show_date'] : 'yes' );
$show_name      = ( isset($args['show_name']) ? $args['show_name'] : 'yes' );
$show_tags      = ( isset($args['show_tags']) ? $args['show_tags'] : 'yes' );
$show_features  = ( isset($args['show_features']) ? $args['show_features'] : 'yes' );
$show_read_more = ( isset($args['show_read_more']) ? $args['show_read_more'] : 'yes' );
$read_more_text = ( isset($args['read_more_text']) ? $args['read_more_text'] : esc_html__('Explore more', 'aiero') );
$listing_type   = ( !empty($args['listing_type']) ? $args['listing_type'] : 'grid' );
$item_class     = ( !empty($args['item_class']) ? $args['item_class'] : 'grid-item grid-blog-item-wrapper' );
$columns_number = ( !empty($args['columns_number']) ? $args['columns_number'] : aiero_get_theme_mod('case_studies_archive_columns_number') );
?>

<div <?php post_class($item_class); ?>>
    <div class="case-study-item">
        <?php
            if ( $listing_type === 'grid' ) {
                if ( $show_media == 'yes' && !empty(aiero_post_media_output()) || 
                     $show_date == 'yes' && !empty(aiero_case_study_date_output()) ) {
                    echo '<div class="post-media-wrapper">';
                        if ( $show_media == 'yes' && !empty(aiero_post_media_output()) ) {
                            echo aiero_post_media_output(true, $columns_number, $listing_type, true);
                        }
                        if ( $show_date == 'yes' && !empty(aiero_case_study_date_output()) ) {
                            echo aiero_case_study_date_output(false);
                        }
                    echo '</div>';
                }
                if ( $show_tags == 'yes' && !empty(aiero_case_studies_tags_output()) ||
                    $show_name == 'yes' && !empty(get_the_title()) ) {
                    echo '<div class="case-study-item-content">';
                        if ( $show_tags == 'yes' && !empty(aiero_case_studies_tags_output()) ) {
                            echo aiero_case_studies_tags_output();
                        }
                        if ( $show_name == 'yes' && !empty(get_the_title()) ) {
                            echo '<h4 class="post-title"><a href="' . esc_url(get_the_permalink()) . '">' . get_the_title() . '</a></h4>';
                        }
                    echo '</div>';
                }                                
            } else {
                if ( 
                    ( $show_media == 'yes' && !empty(aiero_post_media_output()) ) ||
                    ( $show_date == 'yes' && !empty(aiero_case_study_date_output()) ) 
                ) {
                    echo '<div class="post-media-wrapper">';
                        if ( $show_media == 'yes' && !empty(aiero_post_media_output()) ) {
                            echo aiero_post_media_output(true, $columns_number, $listing_type, true);
                        }
                        if ( $show_date == 'yes' && !empty(aiero_case_study_date_output()) ) {
                            echo '<div class="post-meta-header">';
                                if ( $show_date == 'yes' && !empty(aiero_case_study_date_output()) ) {
                                    echo aiero_case_study_date_output(false, $listing_type);
                                }
                            echo '</div>';
                        }
                    echo '</div>';
                }

                if ( 
                    ( $show_tags == 'yes' && !empty(aiero_case_studies_tags_output()) ) ||
                    ( $show_name == 'yes' && !empty(get_the_title()) ) ||
                    ( $show_features == 'yes' && !empty(aiero_get_post_option('case_study_features')) ) ||
                    ( $show_read_more == 'yes' && !empty($read_more_text) )
                ) {
                    echo '<div class="case-study-item-content">';
                        if ( $show_tags == 'yes' && !empty(aiero_case_studies_tags_output()) ) {
                            echo aiero_case_studies_tags_output();
                        }
                        if ( $show_name == 'yes' && !empty(get_the_title()) ) {
                            echo '<h3 class="post-title"><a href="' . esc_url(get_the_permalink()) . '">' . get_the_title() . '</a></h3>';
                        }
                        if ( $show_features == 'yes' && !empty(aiero_get_post_option('case_study_features')) ) {
                            echo '<div class="case-study-features">';
                                echo wp_kses_post( do_shortcode(wpautop(aiero_get_post_option('case_study_features'))) );
                            echo '</div>';
                        }
                        if ( $show_read_more == 'yes' && !empty($read_more_text) ) {
                            echo '<div class="button-container">';
                                echo '<a href="' . esc_url(get_the_permalink()) . '" class="aiero-button">';
                                    echo esc_html($read_more_text);
                                    echo '<span class="icon-button-arrow"></span></span>                    
                                                <span class="button-inner">';
                                echo '</a>';
                            echo '</div>';
                        }
                    echo '</div>';
                }
            }            
        ?>
    </div>
</div>