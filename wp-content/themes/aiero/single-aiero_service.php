<?php
/**
 * The template for displaying single project item page
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
$content = apply_filters('the_content', get_the_content());

?>

    <div class="<?php echo esc_attr($content_classes); ?>">

        <!-- Content Container -->
        <div class="content">

            <div id="service-<?php the_ID(); ?>" class="single-service">
                <div class="service-post-content">

                    <?php
                        if ( aiero_get_prefered_option('service_media_status') == 'on' && !empty(aiero_post_media_output()) ) {
                            echo '<div class="post-media-wrapper">';
                                echo aiero_post_media_output();
                            echo '</div>';
                        }
                        if ( aiero_get_prefered_option('service_title_status') == 'on' && !empty(get_the_title()) ) {
                            echo '<h2 class="post-title">' . get_the_title() . '</h2>';
                        }

                        if ( !empty($content) ) {
                            echo '<div class="service-main-content">';                        
                        }
                            the_content();
                        if ( !empty($content) ) {
                            echo '</div>';
                        }
                    ?>

                </div>
            </div>          

        </div>

        <!-- Sidebar Container -->
        <?php get_sidebar(); ?>

    </div>   

<?php
get_footer();