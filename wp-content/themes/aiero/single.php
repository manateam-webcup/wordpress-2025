<?php
/**
 * The template for displaying single gallery post
 *
 * @link https://developer.wordpress.org/themes/basics/template-hierarchy/#single-post
 *
 * @package WordPress
 * @subpackage Aiero
 * @since Aiero 1.0
 */

the_post();
get_header();

$sidebar_args = aiero_get_sidebar_args();
$sidebar_position = $sidebar_args['sidebar_position'];

$content_classes = 'content-wrapper';
$content_classes .= ' content-wrapper-sidebar-position-' . esc_attr($sidebar_position);
$content_classes .= ( aiero_get_prefered_option('content_top_margin') == 'on' ? ' content-wrapper-remove-top-margin' : '' );
$content_classes .= ( aiero_get_prefered_option('content_bottom_margin') == 'on' ? ' content-wrapper-remove-bottom-margin' : '' );

$post_format = get_post_format();
$post_classes = 'single-post' . ( $post_format == 'quote' && aiero_post_options() && !empty(aiero_get_post_option('post_media_quote_text')) ? '  aiero-format-quote' : '' );
?>

    <div class="<?php echo esc_attr($content_classes); ?>">

        <!-- Content Container -->
        <div class="content">

            <div id="post-<?php the_ID(); ?>" <?php post_class($post_classes); ?>>

                <?php
                    if (
                        aiero_get_prefered_option('post_media_image_status') == 'on' &&
                        !empty(aiero_post_media_output())
                    ) {
                        echo '<div class="post-media-wrapper">';
                            echo aiero_post_media_output();
                        echo '</div>';
                    }

                    if (
                        ( aiero_get_prefered_option('post_category_status') == 'on' &&
                        !empty(aiero_post_categories_output()) ) ||
                        ( aiero_get_prefered_option('post_date_status') == 'on' &&
                        !empty(aiero_post_date_output()) ) ||
                        ( aiero_get_prefered_option('post_author_status') == 'on' &&
                        !empty(aiero_post_author_output()) )
                    ) {
                        echo '<div class="post-meta-header">';                            
                            if (
                                ( aiero_get_prefered_option('post_date_status') == 'on' &&
                                !empty(aiero_post_date_output()) ) ||
                                ( aiero_get_prefered_option('post_author_status') == 'on' &&
                                !empty(aiero_post_author_output()) )
                            ) {
                                echo '<div class="post-meta-items-wrapper">';
                                    echo '<div class="post-meta-items">';
                                        if ( aiero_get_prefered_option('post_date_status') == 'on' && !empty(aiero_post_date_output()) ) {
                                            echo aiero_post_date_output(true);
                                        }
                                        if ( aiero_get_prefered_option('post_author_status') == 'on' && !empty(aiero_post_author_output()) ) {
                                            echo aiero_post_author_output(true);
                                        }
                                    echo '</div>';
                                echo '</div>';
                            }
                            if(aiero_get_prefered_option('post_category_status') == 'on' &&
                                !empty(aiero_post_categories_output())) {
                                echo aiero_post_categories_output(true);
                            }
                        echo '</div>';
                    }                    
                ?>

                <?php
                    if ( aiero_get_prefered_option('post_title_status') == 'on' && !empty(get_the_title()) ) {
                        echo '<h3 class="post-title">' . get_the_title() . '</h3>';
                    }
                ?>

                <div class="post-content">
                    <?php the_content(); ?>
                </div>

                <?php
                    wp_link_pages(
                        array(
                            'before' => '<div class="content-pagination"><nav class="pagination"><div class="nav-links">',
                            'after' => '</div></nav></div>',
                            'link_before' => '<span class="button-inner"></span>'
                        )
                    );
                ?>

                <?php
                    if (
                        ( aiero_get_prefered_option('post_tags_status') == 'on' && !empty(aiero_post_tags_output()) ) ||
                        ( aiero_get_prefered_option('post_socials_status') == 'on' && !empty(aiero_socials_output()) ) ||
                        ( aiero_get_prefered_option('post_author_status') == 'on' && !empty(aiero_post_author_output()) )
                    ) {
                        echo '<div class="post-meta-footer">';
                            if ( aiero_get_prefered_option('post_author_status') == 'on' && !empty(aiero_post_author_output()) ) {
                                echo aiero_post_author_output(true, esc_html__('By', 'aiero'));
                            }
                            if ( aiero_get_prefered_option('post_tags_status') == 'on' && !empty(aiero_post_tags_output()) ) {
                                echo aiero_post_tags_output();
                            }
                            if ( aiero_get_prefered_option('post_socials_status') == 'on' && !empty(aiero_socials_output()) ) {
                                echo '<div class="post-meta-item post-meta-item-socials">';
                                    echo aiero_socials_output('wrapper-socials');
                                echo '</div>';
                            }
                        echo '</div>';
                    }
                ?>

                <?php
                    if ( comments_open() || get_comments_number() || pings_open() ) {
                        comments_template(); 
                    }
                ?>

                <?php
                    if (aiero_get_prefered_option('recent_posts_status') == 'on') {
                        aiero_recent_posts_output(
                            array(
                                'orderby'               => aiero_get_prefered_option('recent_posts_order_by'),
                                'numberposts'           => aiero_get_prefered_option('recent_posts_number'),
                                'post_type'             => get_post_type(),
                                'order'                 => aiero_get_prefered_option('recent_posts_order'),
                                'show_media'            => aiero_get_prefered_option('recent_posts_image'),
                                'show_category'         => aiero_get_prefered_option('recent_posts_category'),
                                'show_title'            => aiero_get_prefered_option('recent_posts_title'),
                                'show_date'             => aiero_get_prefered_option('recent_posts_date'),
                                'show_author'           => aiero_get_prefered_option('recent_posts_author'),
                                'show_excerpt'          => aiero_get_prefered_option('recent_posts_excerpt'),
                                'excerpt_length'        => aiero_get_prefered_option('recent_posts_excerpt_length'),
                                'show_tags'             => aiero_get_prefered_option('recent_posts_tags'),
                                'show_more'             => aiero_get_prefered_option('recent_posts_more')
                            )
                        );
                    }
                ?>

            </div>

        </div>

        <!-- Sidebar Container -->
        <?php get_sidebar(); ?>

    </div>

<?php
get_footer();