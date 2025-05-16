<?php
    defined( 'ABSPATH' ) or die();

    if ( is_home() ) {
        $page_title = esc_html__('Home', 'aiero');
    } elseif ( class_exists('WooCommerce') && is_product() ) {
        $page_title = sprintf(stripslashes(aiero_get_theme_mod('woo_single_product_title')), get_the_title());
    } elseif ( class_exists('WooCommerce') && is_product_category()  ) {
        $page_title = sprintf(stripslashes(aiero_get_theme_mod('woo_product_categories_title')), single_term_title('', false));
    } elseif ( class_exists('WooCommerce') && is_product_tag() ) {
        $page_title = sprintf(stripslashes(aiero_get_theme_mod('woo_product_tags_title')), single_term_title('', false));
    } elseif ( class_exists('WooCommerce') && is_search() ) {
        $page_title = sprintf(esc_html__('Search Results By "%s"', 'aiero'), get_search_query());
    } elseif (is_archive()) {
        if ( class_exists('WooCommerce') && is_woocommerce() ) {
            $page_title = get_the_title();
        } elseif ( !empty(get_queried_object()) && get_queried_object()->name == 'aiero_portfolio') {
            $page_title = sprintf(esc_html(aiero_get_theme_mod('portfolio_archive_page_title')), post_type_archive_title('', false));
        } elseif ( !empty(get_queried_object()) && get_queried_object()->name == 'aiero_project') {
            $page_title = sprintf(esc_html(aiero_get_theme_mod('project_archive_page_title')), post_type_archive_title('', false));
        } elseif ( !empty(get_queried_object()) && get_queried_object()->name == 'aiero_case_study') {
            $page_title = sprintf(esc_html(aiero_get_theme_mod('case_studies_archive_page_title')), post_type_archive_title('', false));
        } elseif ( !empty(get_queried_object()) && get_queried_object()->name == 'aiero_team_member') {
            $page_title = sprintf(esc_html(aiero_get_theme_mod('team_archive_page_title')), post_type_archive_title('', false));
        } elseif ( !empty(get_queried_object()) && get_queried_object()->name == 'aiero_vacancy') {
            $page_title = sprintf(esc_html(aiero_get_theme_mod('vacancy_archive_page_title')), post_type_archive_title('', false));
        } elseif ( !empty(get_queried_object()) && get_queried_object()->name == 'aiero_service') {
            $page_title = sprintf(esc_html(aiero_get_theme_mod('service_archive_page_title')), post_type_archive_title('', false));
        } else {
            $page_title = get_the_archive_title();
        }
    } elseif (is_search()) {
        $page_title = sprintf(esc_html__('Search Results By "%s"', 'aiero'), get_search_query());
    } elseif (is_singular('aiero_portfolio')) {
        $page_title = sprintf(stripslashes(aiero_get_theme_mod('portfolio_single_page_title')), get_the_title());
    } elseif (is_singular('aiero_project')) {
        $page_title = sprintf(stripslashes(aiero_get_theme_mod('project_single_page_title')), get_the_title());
    } elseif (is_singular('aiero_case_study')) {
        $page_title = sprintf(stripslashes(aiero_get_theme_mod('case_studies_single_page_title')), get_the_title());
    } elseif (is_singular('aiero_team_member')) {
        $page_title = sprintf(stripslashes(aiero_get_theme_mod('team_single_page_title')), get_the_title());
    } elseif (is_singular('aiero_vacancy')) {
        $page_title = sprintf(stripslashes(aiero_get_theme_mod('vacancy_single_page_title')), get_the_title());
    } elseif (is_singular('aiero_service')) {
        $page_title = sprintf(stripslashes(aiero_get_theme_mod('service_single_page_title')), get_the_title());
    } elseif (is_single()) {
        $page_title = sprintf(stripslashes(aiero_get_theme_mod('post_page_title')), get_the_title());
    } else {
        $page_title = get_the_title();
    }
    $breadcrumbs_status = aiero_get_prefered_option('page_title_breadcrumbs_status');
    $page_title_classes = '';
    $page_title_classes .= !empty(aiero_get_prefered_option('page_title_additional_text')) ? ' has-additional-text' : '';
    $page_title_classes .= !empty(aiero_get_prefered_option('page_title_decoration_status')) && aiero_get_prefered_option('page_title_decoration_status') == 'on' ? ' has-decoration' : '';
?>

<!-- Page Title -->
<div class="page-title-container<?php echo esc_attr($page_title_classes); ?>">
    <div class="page-title-bg"></div>
    <?php
        if( aiero_get_prefered_option('page_title_decoration_status') == 'on' ) { ?>
            <div class="page-title-decoration-tl">
                <div class="page-title-decoration-tl-inner">
                </div>
            </div>
            <div class="page-title-decoration-br">
                <div class="page-title-decoration-br-inner">
                </div>
            </div>
        <?php }
    ?>    
    <div class="page-title-row">
        <div class="page-title-wrapper">
            <div class="page-title-box">                
                <?php
                    if ( aiero_get_prefered_option('page_title_heading_customize') == 'on' && aiero_get_prepared_option('page_title_heading_icon_status', '', 'page_title_heading_customize') == 'on') {
                        echo aiero_get_page_title_image_output();
                    }
                ?>
                <h1 class="page-title"><?php echo sprintf('%s', $page_title); ?></h1>
            </div>            
        </div>
    </div>
    <?php
        if ( !empty(aiero_get_prefered_option('page_title_additional_text')) ) {
            echo '<div class="page-title-additional">' . esc_html(aiero_get_prefered_option('page_title_additional_text')) . '</div>';
        }
        if ( $breadcrumbs_status == 'on' ) {
            echo '<div class="breadcrumbs-wrapper">';
                aiero_breadcrumbs();
            echo '</div>';
        } elseif ( aiero_get_prefered_option('page_title_decoration_status') == 'on' ) {
            echo '<div class="page-title-decoration-bl">';
                echo '<div class="page-title-decoration-bl-inner">';
                echo '</div>';
            echo '</div>';
        }
    ?>
</div>