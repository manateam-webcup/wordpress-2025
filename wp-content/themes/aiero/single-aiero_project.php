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

$content_classes = $additional_classes = 'content-wrapper content-wrapper-sidebar-position-none';
$content_classes .= ( aiero_get_prefered_option('content_top_margin') == 'on' ? ' content-wrapper-remove-top-margin' : '' );

$args = array(
    'prev_label'            => esc_html__('Prev project', 'aiero'),
    'next_label'            => esc_html__('Next project', 'aiero'),
    'taxonomy_name'         => 'aiero_project_category',
    'taxonomy_separator'    => ' / '
);
$aiero_post_navigation = aiero_post_navigation($args);

$content = apply_filters('the_content', get_the_content());
if ( !empty($content) || !empty($aiero_post_navigation) ) {
    $additional_classes .= ( aiero_get_prefered_option('content_bottom_margin') == 'on' ? ' content-wrapper-remove-bottom-margin' : '' );    
} else {
    $content_classes .= ( aiero_get_prefered_option('content_bottom_margin') == 'on' ? ' content-wrapper-remove-bottom-margin' : '' );
};

?>
    <div id="project-<?php the_ID(); ?>" class="single-project-wrapper">

        <section>
            <div class="<?php echo esc_attr($content_classes); ?>">

                <!-- Content Container -->
                <div class="content">

                    <div class="single-project">

                        <?php 
                            if ( !empty(aiero_project_logo_output()) ) {
                                echo '<div class="project-post-gallery">';
                                    echo aiero_project_logo_output();
                                echo '</div>';
                            }
                        ?>

                        <div class="project-post-content">
                            <?php
                                if ( aiero_get_prefered_option('project_title_status') == 'on' && !empty(get_the_title()) ) {
                                    echo '<h2 class="project-post-title">' . get_the_title() . '</h2>';
                                }
                            ?>

                            <?php 
                                if ( !empty(aiero_get_post_option('project_description')) ) {
                                    echo '<div class="project-description">' . do_shortcode( wpautop( aiero_get_post_option('project_description') ) ) . '</div>';
                                }
                            ?>

                            <?php
                                if( !empty(aiero_get_post_option('project_strategy')) ||
                                    !empty(aiero_get_post_option('project_design')) ||
                                    !empty(aiero_get_post_option('project_client')) ) { ?>
                                        <div class="project-post-meta-wrapper">
                                            <div class="project-post-meta">
                                                <?php
                                                    if ( !empty(aiero_get_post_option('project_strategy')) ) {
                                                        echo '<div class="project-post-meta-item">';
                                                            echo '<div class="project-post-meta-label">' . esc_html__('Strategy', 'aiero') . '</div>';
                                                            $strategy_list = aiero_get_post_option('project_strategy');
                                                            echo wp_kses( implode('<br>', $strategy_list ), array('br' => array()) );
                                                        echo '</div>';
                                                    }
                                                    if ( !empty(aiero_get_post_option('project_design')) ) {
                                                        echo '<div class="project-post-meta-item">';
                                                            echo '<div class="project-post-meta-label">' . esc_html__('Design', 'aiero') . '</div>';
                                                            $design_list = aiero_get_post_option('project_design');
                                                            echo wp_kses( implode('<br>', $design_list ), array('br' => array()) );
                                                        echo '</div>';
                                                    }
                                                    if ( !empty(aiero_get_post_option('project_client')) ) {
                                                        echo '<div class="project-post-meta-item">';
                                                            echo '<div class="project-post-meta-label">' . esc_html__('Client', 'aiero') . '</div>';
                                                            echo esc_html(aiero_get_post_option('project_client'));
                                                        echo '</div>';
                                                    }
                                                ?>
                                            </div>
                                        </div>
                                <?php } ?>
                            <?php
                                if ( !empty(aiero_get_post_option('project_button')) ) {
                                    $button = aiero_get_post_option('project_button');
                                    echo '<div class="project-post-button">';
                                        echo '<a href="' . esc_url( $button[0] ) . '" class="aiero-button">' . esc_html( $button[1] ) . '<span class="icon-button-arrow"></span></span>                    
                                        <span class="button-inner"></a>';
                                    echo '</div>';
                                }
                            ?>

                        </div>
                    </div>
                </div>
            </div>
        </section>

        <?php            
            if ( !empty($content) || !empty($aiero_post_navigation) ) {  
                echo '<section>';
                    echo '<div class="' . esc_attr($additional_classes) . '">';
                        echo '<div class="content">';
                            if ( !empty($content) ) { 
                                echo '<div class="single-project-advanced">';
                            }
                            the_content();
                            if ( !empty($content) ) {      
                                echo '</div>';
                            }                           
                            echo aiero_post_navigation($args);                            
                        echo '</div>';
                    echo '</div>';
                echo '</section>';
            }
        ?>
    </div>

<?php
get_footer();