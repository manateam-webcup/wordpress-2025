<?php
$post_format    = get_post_format();

$listing_type   = ( !empty($args['listing_type']) ? $args['listing_type'] : 'classic' );
$view_type      = ( !empty($args['view_type']) ? $args['view_type'] : '' );
$show_cat       = ( isset($args['show_cat']) ? $args['show_cat'] : 'yes' );
$show_media     = ( isset($args['show_media']) ? $args['show_media'] : 'yes' );
$show_author    = ( isset($args['show_author']) ? $args['show_author'] : 'yes' );
$show_date      = ( isset($args['show_date']) ? $args['show_date'] : 'yes' );
$show_title     = ( isset($args['show_title']) ? $args['show_title'] : 'yes' );
$show_tags      = ( isset($args['show_tags']) ? $args['show_tags'] : 'yes' );
$show_excerpt   = ( isset($args['show_excerpt']) ? $args['show_excerpt'] : 'yes' );
$show_read_more = ( isset($args['show_read_more']) ? $args['show_read_more'] : 'yes' );
$read_more_text = ( isset($args['read_more_text']) ? $args['read_more_text'] : esc_html__('Read More', 'aiero') );
$item_class     = ( isset($args['item_class']) ? $args['item_class'] : '' );
$excerpt_length = ( isset($args['excerpt_length']) ? $args['excerpt_length'] : '' );
$columns_number = ( isset($args['columns_number']) ? $args['columns_number'] : 1 );

$post_classes   = 'standard-blog-item-wrapper' . ( $post_format == 'quote' && aiero_post_options() && !empty(aiero_get_post_option('post_media_quote_text')) ? ' aiero-format-quote' : '' ) . ( !empty($item_class) ? ' ' . esc_attr($item_class) : '' );
?>

<div <?php post_class($post_classes); ?>>
    <div class="blog-item">
        <?php
            if ( $listing_type !== 'list' && $show_media == 'yes' && !empty(aiero_post_media_output()) ) {
                echo '<div class="post-media-wrapper">';
                    if ( $listing_type === 'classic' && $view_type === 'row' ) {
                        echo aiero_post_media_output(true, 3, $listing_type);
                    } else {
                        echo aiero_post_media_output(true, $columns_number, $listing_type);
                    }                    
                echo '</div>';
            }

            if( $listing_type === 'list' ) {
                if( $show_date == 'yes' && !empty(aiero_post_date_output()) ) {
                    echo aiero_post_date_output(false, $listing_type);
                }
                if( ($show_cat == 'yes' && !empty(aiero_post_categories_output())) ||
                    ($show_author == 'yes' && !empty(aiero_post_author_output()))
                ) {
                    echo '<div class="post-list-meta-column">';
                        if ( $show_author == 'yes' && !empty(aiero_post_author_output()) ) {
                            echo aiero_post_author_output(true);
                        }
                        if ( $show_cat == 'yes' && !empty(aiero_post_categories_output()) && $post_format != 'quote' ) {
                            echo '<div class="post-labels">';
                                echo aiero_post_categories_output(true);
                            echo '</div>';
                        }                        
                    echo '</div>';
                }
                if( ($show_title == 'yes' && !empty(get_the_title())) ||
                    ($show_excerpt == 'yes' && !empty(get_the_excerpt()))
                ) {
                    echo '<div class="post-list-content-column">';
                        if ( $show_title == 'yes' && !empty(get_the_title()) ) {
                            echo '<h5 class="post-title"><a href="' . esc_url(get_the_permalink()) . '">' . get_the_title() . '</a></h5>';
                        }
                        if ( $show_excerpt == 'yes' && !empty(get_the_excerpt()) ) {
                            echo '<div class="post-content">';
                                if (!empty($excerpt_length)) {
                                    echo substr(get_the_excerpt(), 0, $excerpt_length);
                                } else {
                                    the_excerpt();
                                }
                            echo '</div>';
                        }
                    echo '</div>';
                }
                echo '<a class="post-list-icon" href="' . esc_url(get_the_permalink()) . '"></a>';
            } else {
                if ( !($post_format == 'quote' && aiero_post_options() && !empty(aiero_get_post_option('post_media_quote_text'))) ) {
                    if ( $listing_type === 'classic' && !empty($view_type) && $view_type === 'row' ) {
                        echo '<div class="post-content-column">';
                            if (
                                ( $show_date == 'yes' && !empty(aiero_post_date_output()) ) ||
                                ( $show_author == 'yes' && !empty(aiero_post_author_output()) ) ||
                                ( $show_cat == 'yes' && !empty(aiero_post_categories_output()) )
                            ) {
                                echo '<div class="post-meta-wrapper">';
                                    if (
                                        ( $show_date == 'yes' && !empty(aiero_post_date_output()) ) ||
                                        ( $show_author == 'yes' && !empty(aiero_post_author_output()) )
                                    ) {
                                        echo '<div class="post-meta-header">';
                                            echo '<div class="post-meta-items-wrapper">';
                                                echo '<div class="post-meta-items">';
                                                    if ( $show_date == 'yes' && !empty(aiero_post_date_output()) ) {
                                                        echo aiero_post_date_output(true);
                                                    }
                                                    if ( $show_author == 'yes' && !empty(aiero_post_author_output()) ) {
                                                        echo aiero_post_author_output(true);
                                                    }
                                                echo '</div>';
                                            echo '</div>';
                                        echo '</div>';
                                    }
                                    if ( $show_cat == 'yes' && !empty(aiero_post_categories_output()) ) {
                                        echo '<div class="post-labels">';
                                            echo aiero_post_categories_output(true);
                                        echo '</div>';
                                    }
                                echo '</div>';
                            }

                            if ( ( $show_title == 'yes' && !empty(get_the_title()) ) ||
                                 ( $show_excerpt == 'yes' && !empty(get_the_excerpt()) ) ||
                                 ( $show_tags == 'yes' && !empty(aiero_post_tags_output()) ) ||
                                 ( $show_read_more == 'yes' && !empty($read_more_text) )
                            ) {
                                echo '<div class="post-content-wrapper">';
                                    if ( $show_title == 'yes' && !empty(get_the_title()) ) {
                                        echo '<h4 class="post-title"><a href="' . esc_url(get_the_permalink()) . '">' . get_the_title() . '</a></h4>';
                                    }

                                    if ( $show_excerpt == 'yes' && !empty(get_the_excerpt()) ) {
                                        echo '<div class="post-content">';
                                            if (!empty($excerpt_length)) {
                                                echo substr(get_the_excerpt(), 0, $excerpt_length);
                                            } else {
                                                the_excerpt();
                                            }
                                        echo '</div>';
                                    }

                                    if ( $show_tags == 'yes' && !empty(aiero_post_tags_output()) ) {
                                        echo aiero_post_tags_output(', ');
                                    }

                                    if ( $show_read_more == 'yes' && !empty($read_more_text) ) {
                                        echo '<div class="post-more-button">';
                                            echo '<a href="' . esc_url(get_the_permalink()) . '">';
                                                echo '<span>' . esc_html($read_more_text) . '</span>';
                                                echo '<svg viewBox="0 0 13 20"><polyline points="0.5 19.5 3 19.5 12.5 10 3 0.5" /></svg>';
                                            echo '</a>';
                                        echo '</div>';
                                    }
                                echo '</div>';
                            }

                        echo '</div>';
                    } else {
                        if (
                            ( $show_date == 'yes' && !empty(aiero_post_date_output()) ) ||
                            ( $show_author == 'yes' && !empty(aiero_post_author_output()) )
                        ) {
                            echo '<div class="post-meta-header">';
                                echo '<div class="post-meta-items-wrapper">';
                                    echo '<div class="post-meta-items">';
                                        if ( $show_date == 'yes' && !empty(aiero_post_date_output()) ) {
                                            echo aiero_post_date_output(true);
                                        }
                                        if ( $show_author == 'yes' && !empty(aiero_post_author_output()) ) {
                                            echo aiero_post_author_output(true);
                                        }
                                    echo '</div>';
                                echo '</div>';
                            echo '</div>';
                        }

                        if ( $show_title == 'yes' && !empty(get_the_title()) ) {
                            $header_tag = ( $columns_number > 2 ? 'h4' : 'h3' );
                            echo '<' . esc_html($header_tag) . ' class="post-title"><a href="' . esc_url(get_the_permalink()) . '">' . get_the_title() . '</a></' . esc_html($header_tag) . '>';
                        }

                        if ( $show_excerpt == 'yes' && !empty(get_the_excerpt()) ) {
                            echo '<div class="post-content">';
                                if (!empty($excerpt_length)) {
                                    echo substr(get_the_excerpt(), 0, $excerpt_length);
                                } else {
                                    the_excerpt();
                                }
                            echo '</div>';
                        }

                        if ( $show_cat == 'yes' && !empty(aiero_post_categories_output()) && $post_format != 'quote' ) {
                            echo '<div class="post-labels">';
                                echo aiero_post_categories_output(true);
                            echo '</div>';
                        }

                        if ( $show_tags == 'yes' && !empty(aiero_post_tags_output()) ) {
                            echo aiero_post_tags_output(', ');
                        }

                        if ( $show_read_more == 'yes' && !empty($read_more_text) ) {
                            echo '<div class="post-more-button">';
                                echo '<a href="' . esc_url(get_the_permalink()) . '">';
                                    echo '<span>' . esc_html($read_more_text) . '</span>';
                                    echo '<svg viewBox="0 0 13 20"><polyline points="0.5 19.5 3 19.5 12.5 10 3 0.5" /></svg>';
                                echo '</a>';
                            echo '</div>';
                        }
                    }                    
                }
            }            
        ?>
    </div>
</div>