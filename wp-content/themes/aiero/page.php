<?php
/**
 * The template for displaying all single posts
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
$content_classes .= ( aiero_get_prefered_option('content_top_margin') == 'on' ? ' content-wrapper-remove-top-margin' : '' );
$content_classes .= ( aiero_get_prefered_option('content_bottom_margin') == 'on' ? ' content-wrapper-remove-bottom-margin' : '' );
$content_classes .= ' content-wrapper-sidebar-position-' . esc_attr($sidebar_position);
?>

    <div class="<?php echo esc_attr($content_classes); ?>">

        <!-- Content Container -->
        <div class="content">

            <div class="content-inner">
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
            	if ( comments_open() || get_comments_number() ) {
            		comments_template(); 
            	}            	
            ?>
        </div>

        <!-- Sidebar Container -->
        <?php get_sidebar(); ?>

    </div>

<?php
get_footer();