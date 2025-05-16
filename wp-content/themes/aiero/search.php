<?php
/**
 * The template for displaying search results pages
 *
 * @link https://developer.wordpress.org/themes/basics/template-hierarchy/#search-result
 *
 * @package WordPress
 * @subpackage Aiero
 * @since Aiero 1.0
 */

get_header();

$content_classes = 'content-wrapper content-wrapper-sidebar-position-none';
$content_classes .= ( aiero_get_theme_mod('content_top_margin') == 'on' ? ' content-wrapper-remove-top-margin' : '' );
$content_classes .= ( aiero_get_theme_mod('content_bottom_margin') == 'on' ? ' content-wrapper-remove-bottom-margin' : '' );
?>

    <div class="<?php echo esc_attr($content_classes); ?>">
        <div class="content">
            <!-- Content Container -->
            <div class="content-inner">

                <div class="archive-listing">
                    <div class="archive-listing-wrapper classic-listing">
                        <?php
                        if (have_posts()) {
                            while (have_posts()) : the_post();
                                get_template_part('content', 'search');
                            endwhile;
                        } else {
                            ?>
                            <h2 class="aiero-no-results-title"><?php esc_html_e('Oops! Nothing Found!', 'aiero'); ?></h2>

                            <div class="aiero-no-result-search-form">
                                <?php
                                    $search_args = array(
                                        'echo'          => true,
                                        'aria_label'    => 'page'
                                    );
                                    get_search_form($search_args);
                                ?>
                            </div>
                            <?php
                        }
                        ?>
                    </div>

                    <?php
                        global $wp_query;
                        if($wp_query->max_num_pages > 1) { ?>
                            <div class="content-pagination">
                                <?php
                                    echo get_the_posts_pagination(array(
                                        'end_size'  => 2,
                                        'before_page_number' => '<span class="button-inner"></span>',
                                        'prev_text' => esc_html__('Previous', 'aiero') . '<span class="button-inner"></span><span class="icon-button-arrow"></span>',
                                        'next_text' => esc_html__('Next', 'aiero') . '<span class="button-inner"></span><span class="icon-button-arrow"></span>'
                                    ));
                                ?>
                            </div>
                        <?php }
                    ?>
                </div>

            </div>
        </div>



    </div>

<?php
get_footer();