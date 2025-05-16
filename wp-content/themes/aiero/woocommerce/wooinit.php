<?php
/*
 * Created by Artureanec
*/


add_theme_support( 'woocommerce' );
add_theme_support( 'wc-product-gallery-lightbox' );
add_theme_support( 'wc-product-gallery-slider' );

add_action( 'wp_enqueue_scripts', 'aiero_woo_enqueue_scripts' );
if ( !function_exists( 'aiero_woo_enqueue_scripts') ) {
    function aiero_woo_enqueue_scripts() {
        wp_enqueue_script('slick-slider', get_template_directory_uri() . '/js/slick.min.js', array('jquery'), false, true);
        wp_enqueue_script( 'aiero-woocommerce-scripts', get_template_directory_uri() . '/js/woo.js', array('jquery', 'jquery-cookie', 'slick-slider'), false, true );
    }
}

// Shop Classes
add_filter( 'body_class', 'aiero_shop_classes' );
if ( !function_exists('aiero_shop_classes') ) {
    function aiero_shop_classes($classes) {
        if ( is_shop() ) {
            $classes[] = 'aiero-shop-list-page';
        } elseif ( is_product() ) {
            $classes[] = 'aiero-single-product-page';
        }
        return $classes;
    }
}

// Mini Cart AJAX support
add_filter( 'woocommerce_add_to_cart_fragments', 'aiero_header_add_to_cart_fragment', 30, 1 );
if ( !function_exists( 'aiero_header_add_to_cart_fragment') ) {
    function aiero_header_add_to_cart_fragment($fragments) {
        ob_start();
        ?>
        <i class='mini-cart-count'><?php echo '<span>' . WC()->cart->cart_contents_count . '</span>' ?></i>
        <?php
        $fragments['.mini-cart-count'] = ob_get_clean();

        ob_start();
        echo '<div class="mini-cart-panel woocommerce">';
            echo '<h5 class="mini-cart-title">' . esc_html__('Cart items', 'aiero') . '</h5>';
            woocommerce_mini_cart();
        echo '</div>';
        $fragments['div.mini-cart-panel'] = ob_get_clean();
        return $fragments;
    }
}

add_filter( 'wc_add_to_cart_message_html', '__return_false' );

add_action( 'wp_ajax_aiero_ajax_add_to_cart', 'aiero_ajax_add_to_cart' );
add_action( 'wp_ajax_nopriv_aiero_ajax_add_to_cart', 'aiero_ajax_add_to_cart' );
if ( !function_exists( 'aiero_ajax_add_to_cart') ) {
    function aiero_ajax_add_to_cart() {
        WC_AJAX::get_refreshed_fragments();
        wp_die();
    }
}

// Remove catalog page title
remove_action('woocommerce_archive_description', 'woocommerce_taxonomy_archive_description', 10);
remove_action('woocommerce_archive_description', 'woocommerce_product_archive_description', 10);
add_filter( 'woocommerce_show_page_title', 'aiero_remove_catalog_page_title' );
if ( !function_exists( 'aiero_remove_catalog_page_title') ) {
    function aiero_remove_catalog_page_title() {
        return false;
    }
}

// Remove default WooCommerce Breadcrumbs
remove_action('woocommerce_before_main_content', 'woocommerce_breadcrumb', 20);

// Replace content wrapper
remove_action('woocommerce_before_main_content', 'woocommerce_output_content_wrapper', 10);
add_action('woocommerce_before_main_content', 'aiero_wc_output_content_wrapper', 10);
if ( !function_exists( 'aiero_wc_output_content_wrapper') ) {
    function aiero_wc_output_content_wrapper() {
        $sidebar_args = aiero_get_sidebar_args();
        $sidebar_position = $sidebar_args['sidebar_position'];

        $content_classes = 'content-wrapper';
        $content_classes .= ( aiero_get_post_option('content_top_margin') == 'on' ? ' content-wrapper-remove-top-margin' : '' );
        $content_classes .= ( aiero_get_post_option('content_bottom_margin') == 'on' ? ' content-wrapper-remove-bottom-margin' : '' );
        $content_classes .= ' content-wrapper-sidebar-position-' . esc_attr($sidebar_position);

        ?>
        <div class="<?php echo esc_attr($content_classes); ?>">
            <div class="content">
                <!-- Content Container -->
                <div class="content-inner">
        <?php
    }
}
remove_action('woocommerce_after_main_content', 'woocommerce_output_content_wrapper_end', 10);
add_action('woocommerce_after_main_content', 'aiero_wc_output_content_wrapper_end', 10);
if ( !function_exists( 'aiero_wc_output_content_wrapper_end') ) {
    function aiero_wc_output_content_wrapper_end() {
        ?>
                </div>
            </div>
        <?php
    }
}
add_action('woocommerce_sidebar', 'aiero_main_content_wrapper_end', 20);
if ( !function_exists( 'aiero_main_content_wrapper_end') ) {
    function aiero_main_content_wrapper_end() {
        ?>
        </div>
        <?php
    }
}

add_action( 'woocommerce_before_shop_loop', 'aiero_wc_add_catalog_filter_trigger', 30 );
if ( ! function_exists( 'aiero_wc_add_catalog_filter_trigger' ) ) {
    function aiero_wc_add_catalog_filter_trigger() {
        echo '<div class="product-filters-trigger-wrapper">';
        if ( is_active_sidebar('sidebar-woocommerce') ) {
            echo '<span class="product-filters-trigger">' . esc_html__('View filters', 'aiero') . '</span>';
        } else {
            echo '<span>&nbsp;</span>';
        }
        echo '</div>';
    }
}

// Show rating even if it is 0
add_filter('woocommerce_product_get_rating_html', 'aiero_wc_get_rating_html', 10, 3);
if ( ! function_exists( 'aiero_wc_get_rating_html' ) ) {
    function aiero_wc_get_rating_html($html, $rating, $count) {
        if (0 < $rating) {
            $label = sprintf(wp_kses_post(__('Rated %s out of 5', 'aiero')), $rating);
            $html = '<div class="product-rating-wrapper"><div class="star-rating" role="img" aria-label="' . esc_attr($label) . '">' . wc_get_star_rating_html($rating, $count) . '</div></div>';
        } else {
            $html = '';
        }
        return $html;
    }
}

// Rewrite WooCommerce function 'woocommerce_mini_cart'
if ( !function_exists( 'woocommerce_mini_cart') ) {
    function woocommerce_mini_cart($args = array()) {
        $defaults = array(
            'list_class' => '',
        );
        $args = wp_parse_args($args, $defaults);

        do_action('woocommerce_before_mini_cart');

        if (!WC()->cart->is_empty()) {
            echo '<ul class="woocommerce-mini-cart cart_list product_list_widget' . (!empty($args['list_class']) ? ' ' . esc_attr($args['list_class']) : '') . '">';
            do_action('woocommerce_before_mini_cart_contents');
            foreach (WC()->cart->get_cart() as $cart_item_key => $cart_item) {
                $_product = apply_filters('woocommerce_cart_item_product', $cart_item['data'], $cart_item, $cart_item_key);
                $product_id = apply_filters('woocommerce_cart_item_product_id', $cart_item['product_id'], $cart_item, $cart_item_key);
                if ($_product && $_product->exists() && $cart_item['quantity'] > 0 && apply_filters('woocommerce_widget_cart_item_visible', true, $cart_item, $cart_item_key)) {
                    $product_name       = apply_filters('woocommerce_cart_item_name', $_product->get_name(), $cart_item, $cart_item_key);
                    $thumbnail          = apply_filters('woocommerce_cart_item_thumbnail', $_product->get_image(), $cart_item, $cart_item_key);
                    $product_price      = apply_filters('woocommerce_cart_item_price', WC()->cart->get_product_price($_product), $cart_item, $cart_item_key);
                    $product_permalink  = apply_filters('woocommerce_cart_item_permalink', $_product->is_visible() ? $_product->get_permalink($cart_item) : '', $cart_item, $cart_item_key);
                    $rating  = $_product->get_average_rating();
                    $count   = $_product->get_rating_count();
                    echo '<li class="woocommerce-mini-cart-item ' . esc_attr(apply_filters('woocommerce_mini_cart_item_class', 'mini_cart_item', $cart_item, $cart_item_key)) . '">';
                        if (empty($product_permalink)) {
                            echo '<span class="thumbnail-woocommerce_wrapper">';
                                echo sprintf('%s', $thumbnail);
                            echo '</span>';
                        } else {
                            echo '<a href="' . esc_url($product_permalink) . '" class="thumbnail-woocommerce_wrapper">';
                                echo sprintf('%s', $thumbnail);
                            echo '</a>';
                        }
                        echo '<span class="content-woocommerce-wrapper">';
                            if (empty($product_permalink)) {
                                echo '<h6 class="woocommerce-mini-cart-item__title">' . esc_html($product_name) . '</h6>';
                            } else {
                                echo '<h6 class="woocommerce-mini-cart-item__title"><a href="' . esc_url($product_permalink) . '">' . esc_html($product_name) . '</a></h6>';
                            }
                            echo wc_get_formatted_cart_item_data($cart_item);
                            echo apply_filters('woocommerce_widget_cart_item_quantity', '<span class="quantity">' . sprintf('%s x %s', $cart_item['quantity'], $product_price) . '</span>', $cart_item, $cart_item_key);
                            echo wc_get_rating_html( $rating, $count );
                        echo '</span>';
                        echo '<span class="subtotal">' . WC()->cart->get_product_subtotal( $_product, $cart_item['quantity'] ) . '</span>';
                        echo apply_filters(
                            'woocommerce_cart_item_remove_link',
                            sprintf(
                                '<a href="%s" class="remove_from_cart_button" aria-label="%s" data-product_id="%s" data-cart_item_key="%s" data-product_sku="%s">⨯</a>',
                                esc_url(wc_get_cart_remove_url($cart_item_key)),
                                esc_attr__('Remove this item', 'aiero'),
                                esc_attr($product_id),
                                esc_attr($cart_item_key),
                                esc_attr($_product->get_sku())
                            ),
                            $cart_item_key
                        );
                    echo '</li>';
                }
            }

            do_action('woocommerce_mini_cart_contents');

            echo '</ul>';

            echo '<p class="woocommerce-mini-cart-total total">';
            do_action('woocommerce_widget_shopping_cart_total');
            echo '</p>';

            do_action('woocommerce_widget_shopping_cart_before_buttons');

            echo '<p class="woocommerce-mini-cart-buttons buttons">';
            do_action('woocommerce_widget_shopping_cart_buttons');
            echo '</p>';

            do_action('woocommerce_widget_shopping_cart_after_buttons');

        } else {
            echo '<p class="woocommerce-mini-cart__empty-message">' . esc_html__('No products in the cart.', 'aiero') . '</p>';
        }
        do_action('woocommerce_after_mini_cart');
    }
}

remove_action('woocommerce_widget_shopping_cart_buttons', 'woocommerce_widget_shopping_cart_button_view_cart', 10);
add_action('woocommerce_widget_shopping_cart_buttons', 'aiero_wc_widget_shopping_cart_button_view_cart', 10);
if ( ! function_exists( 'aiero_wc_widget_shopping_cart_button_view_cart' ) ) {
    function aiero_wc_widget_shopping_cart_button_view_cart() {
        $wp_button_class = wc_wp_theme_get_element_class_name( 'button' ) ? ' ' . wc_wp_theme_get_element_class_name( 'button' ) : '';
        echo '<a href="' . esc_url( wc_get_cart_url() ) . '" class="button wc-forward' . esc_attr( $wp_button_class ) . '">' . esc_html__( 'View cart', 'aiero' ) . '<span class="icon-button-arrow"></span><span class="button-inner"></span></a>';
    }
}

remove_action('woocommerce_widget_shopping_cart_buttons', 'woocommerce_widget_shopping_cart_proceed_to_checkout', 20);
add_action('woocommerce_widget_shopping_cart_buttons', 'aiero_wc_widget_shopping_cart_proceed_to_checkout', 20);
if ( ! function_exists( 'aiero_wc_widget_shopping_cart_proceed_to_checkout' ) ) {
    function aiero_wc_widget_shopping_cart_proceed_to_checkout() {
        $wp_button_class = wc_wp_theme_get_element_class_name( 'button' ) ? ' ' . wc_wp_theme_get_element_class_name( 'button' ) : '';
        echo '<a href="' . esc_url( wc_get_checkout_url() ) . '" class="button checkout wc-forward' . esc_attr( $wp_button_class ) . '">' . esc_html__( 'Checkout', 'aiero' ) . '<span class="icon-button-arrow"></span><span class="button-inner"></span></a>';
    }
}

// Override Price Layout
add_filter('woocommerce_get_price_html', 'aiero_wc_price_layout');
if ( !function_exists( 'aiero_wc_price_layout') ) {
    function aiero_wc_price_layout($price) {
        return '<span class="price_wrapper">' . $price . '</span>';
    }
}

// Product Catalog styling
add_action('woocommerce_before_shop_loop', 'aiero_wc_catalog_loop_wrapper_open', 2);
add_action('woocommerce_after_shop_loop', 'aiero_wc_catalog_loop_wrapper_close', 10);

add_action('woocommerce_before_shop_loop', 'aiero_wc_catalog_top_info_open', 15);
add_action('woocommerce_before_shop_loop', 'aiero_wc_catalog_top_info_close', 35);

remove_action('woocommerce_after_shop_loop_item', 'woocommerce_template_loop_add_to_cart', 10);
remove_action('woocommerce_before_shop_loop_item', 'woocommerce_template_loop_product_link_open', 10);
remove_action('woocommerce_after_shop_loop_item', 'woocommerce_template_loop_product_link_close', 5);
remove_action('woocommerce_after_shop_loop_item_title', 'woocommerce_template_loop_rating', 5);
add_action('woocommerce_after_shop_loop_item_title', 'aiero_wc_template_loop_rating', 11);
remove_action('woocommerce_shop_loop_item_title', 'woocommerce_template_loop_product_title', 10);
remove_action('woocommerce_before_shop_loop_item_title', 'woocommerce_show_product_loop_sale_flash', 10);
remove_action('woocommerce_before_shop_loop_item_title', 'woocommerce_template_loop_product_thumbnail', 10);

add_action('woocommerce_before_shop_loop_item', 'aiero_wc_product_wrapper_open', 10);
add_action('woocommerce_after_shop_loop_item', 'aiero_wc_product_wrapper_close', 5);

add_action('woocommerce_before_shop_loop_item_title', 'aiero_wc_product_thumbnail_wrapper_open', 5);
add_action('woocommerce_before_shop_loop_item_title', 'aiero_wp_template_loop_product_thumbnail', 10);
add_action('woocommerce_before_shop_loop_item_title', 'aiero_wc_product_sale_flash', 10);
add_action('woocommerce_before_shop_loop_item_title', 'aiero_wc_buttons_wrapper_open', 24);
add_action('woocommerce_before_shop_loop_item_title', 'woocommerce_template_loop_add_to_cart', 25);
add_action('woocommerce_before_shop_loop_item_title', 'aiero_wc_buttons_wrapper_close', 26);
add_action('woocommerce_before_shop_loop_item_title', 'aiero_wc_product_thumbnail_wrapper_close', 30);

add_filter('woocommerce_loop_add_to_cart_link', 'aiero_wc_loop_add_to_cart_link', 10, 3);

add_action('woocommerce_shop_loop_item_title', 'aiero_wc_product_content_wrapper_open', 5);

add_action('woocommerce_after_shop_loop_item_title', 'aiero_wc_product_content_wrapper_close', 25);

add_action('woocommerce_shop_loop_item_title', 'aiero_wc_product_title', 7);


// Catalog category styling
remove_action('woocommerce_before_subcategory', 'woocommerce_template_loop_category_link_open', 10);
remove_action('woocommerce_after_subcategory', 'woocommerce_template_loop_category_link_close', 10);
remove_action('woocommerce_shop_loop_subcategory_title', 'woocommerce_template_loop_category_title', 10);

add_action('woocommerce_before_subcategory', 'aiero_wc_product_wrapper_open', 10);
add_action('woocommerce_after_subcategory', 'aiero_wc_product_wrapper_close', 10);

add_action('woocommerce_before_subcategory_title', 'aiero_wc_product_thumbnail_wrapper_open', 5);
add_action('woocommerce_before_subcategory_title', 'aiero_wc_product_thumbnail_wrapper_close', 20);

add_action('woocommerce_shop_loop_subcategory_title', 'aiero_wc_product_content_wrapper_open', 5);
add_action('woocommerce_after_subcategory_title', 'aiero_wc_product_content_wrapper_close', 10);

add_action('woocommerce_before_subcategory_title', 'aiero_wc_subcategory_add_thumbnail_link', 15);

add_action('woocommerce_shop_loop_subcategory_title', 'aiero_wc_subcategory_title', 10);

// Single product styling
remove_action('woocommerce_single_product_summary', 'woocommerce_template_single_title', 5);
add_action('woocommerce_single_product_summary', 'aiero_wc_template_single_title', 5);

remove_action('woocommerce_single_product_summary', 'woocommerce_template_single_rating', 10);
add_action('woocommerce_single_product_summary', 'aiero_wc_single_rating', 16);

remove_action('woocommerce_single_product_summary', 'woocommerce_template_single_excerpt', 20);
add_action('woocommerce_single_product_summary', 'woocommerce_template_single_excerpt', 10);
remove_action('woocommerce_single_product_summary', 'woocommerce_template_single_price', 10);
add_action('woocommerce_single_product_summary', 'woocommerce_template_single_price', 15);

remove_action('woocommerce_single_product_summary', 'woocommerce_template_single_meta', 40);
add_action('woocommerce_single_product_summary', 'aiero_wc_single_meta', 35);

add_action('woocommerce_before_add_to_cart_quantity', 'aiero_wc_quantity_wrapper_open', 10);
add_action('woocommerce_after_add_to_cart_quantity', 'aiero_wc_quantity_wrapper_close', 10);
add_filter('woocommerce_cart_item_quantity', 'aiero_wc_cart_quantity_wrapper', 1);

remove_action('woocommerce_before_single_product_summary', 'woocommerce_show_product_sale_flash', 10);
add_action('aiero_wc_single_product_sail_flash', 'aiero_wc_product_sale_flash', 10);

add_filter( 'woocommerce_product_tabs', 'aiero_wc_remove_product_tabs', 98 );

add_filter( 'woocommerce_dropdown_variation_attribute_options_html', 'aiero_wc_dropdown_variation_attribute_options_html', 10, 2 );

// Review
remove_action('woocommerce_review_before', 'woocommerce_review_display_gravatar', 10);
remove_action('woocommerce_review_before_comment_meta', 'woocommerce_review_display_rating', 10);

add_action('woocommerce_review_before', 'aiero_wc_review_display_gravatar', 10);
add_action('woocommerce_review_before_comment_meta', 'aiero_wc_review_meta_wrapper_open', 5);
add_action('woocommerce_review_before_comment_meta', 'aiero_wc_review_meta_info_wrapper_open', 10);
remove_action('woocommerce_review_meta', 'woocommerce_review_display_meta', 10);
add_action('woocommerce_review_meta', 'aiero_wc_review_display_meta', 10);
add_action('woocommerce_review_meta', 'aiero_wc_review_display_date', 12);
add_action('woocommerce_review_meta', 'aiero_wc_review_meta_info_wrapper_close', 13);
add_action('woocommerce_review_meta', 'woocommerce_review_display_rating', 14);
add_action('woocommerce_review_meta', 'aiero_wc_review_meta_wrapper_close', 15);
add_filter('woocommerce_product_review_comment_form_args', 'aiero_wc_product_review_comment_form_args');

if ( !function_exists( 'aiero_wc_catalog_loop_wrapper_open') ) {
    function aiero_wc_catalog_loop_wrapper_open() {
        global $aiero_shop_mode;
        if (empty($aiero_shop_mode)) {
            $aiero_shop_mode = 'grid';
        }

        echo '<div class="aiero_shop_loop shop_mode_' . (isset($aiero_shop_mode) && !empty($aiero_shop_mode) ? esc_attr($aiero_shop_mode) : 'grid') . '">';
    }
}

if ( !function_exists( 'aiero_wc_catalog_loop_wrapper_close') ) {
    function aiero_wc_catalog_loop_wrapper_close() {
        echo '</div>';
    }
}

if ( !function_exists( 'aiero_wc_catalog_top_info_open') ) {
    function aiero_wc_catalog_top_info_open() {
        echo '<div class="catalog-top-info-wrapper">';
    }
}

if ( !function_exists( 'aiero_wc_catalog_top_info_close') ) {
    function aiero_wc_catalog_top_info_close() {
        echo '</div>';
    }
}

if ( !function_exists( 'aiero_wc_product_wrapper_open') ) {
    function aiero_wc_product_wrapper_open() {
        echo '<div class="woocommerce-loop-product__wrapper">';
    }
}

if ( !function_exists( 'aiero_wc_product_wrapper_close') ) {
    function aiero_wc_product_wrapper_close() {
        echo '</div>';
    }
}

if ( !function_exists( 'aiero_wc_product_thumbnail_wrapper_open') ) {
    function aiero_wc_product_thumbnail_wrapper_open() {
        echo '<div class="attachment-woocommerce_wrapper">';
    }
}

if ( !function_exists( 'aiero_wc_loop_add_to_cart_link') ) {
    function aiero_wc_loop_add_to_cart_link($html, $product, $args) {
        $aria_describedby = isset( $args['aria-describedby_text'] ) ? sprintf( 'aria-describedby="woocommerce_loop_add_to_cart_link_describedby_%s"', esc_attr( $product->get_id() ) ) : '';
        return sprintf(
            '<a href="%s" %s data-quantity="%s" class="%s" %s>%s<span class="button-inner"></span></a>',
            esc_url( $product->add_to_cart_url() ),
            $aria_describedby,
            esc_attr( isset( $args['quantity'] ) ? $args['quantity'] : 1 ),
            esc_attr( isset( $args['class'] ) ? $args['class'] : 'button' ),
            isset( $args['attributes'] ) ? wc_implode_html_attributes( $args['attributes'] ) : '',
            esc_html( $product->add_to_cart_text() )
        );
    }
}

if ( !function_exists( 'aiero_wc_buttons_wrapper_open') ) {
    function aiero_wc_buttons_wrapper_open() {
        echo '<div class="product-buttons-wrapper">';
            echo '<div class="product-buttons">';
    }
}

if ( !function_exists( 'aiero_wc_buttons_wrapper_close') ) {
    function aiero_wc_buttons_wrapper_close() {
            echo '</div>';
        echo '</div>';
    }
}

if ( !function_exists( 'aiero_wc_product_thumbnail_wrapper_close') ) {
    function aiero_wc_product_thumbnail_wrapper_close() {
        echo '</div>';
    }
}

if ( !function_exists( 'aiero_wc_product_content_wrapper_open') ) {
    function aiero_wc_product_content_wrapper_open() {
        echo '<div class="content-woocommerce-wrapper">';
    }
}

if ( !function_exists( 'aiero_wc_product_content_wrapper_close') ) {
    function aiero_wc_product_content_wrapper_close() {
        echo '</div>';
    }
}

if ( ! function_exists( 'aiero_wc_template_loop_rating' ) ) {
    function aiero_wc_template_loop_rating() {
        global $product;
        if ( wc_review_ratings_enabled() ) {
            $rating = $product->get_average_rating();
            $count = 0;
            $html  = '<div class="product-rating-wrapper"><div class="star-rating" role="img" aria-label="' . sprintf( esc_attr__( 'Rated %s out of 5', 'aiero' ), $rating ) . '">' . wc_get_star_rating_html( $rating, $count ) . '</div></div>';
            echo apply_filters( 'woocommerce_product_get_rating_html', $html, $rating, $count );
        }
    }
}

if ( ! function_exists( 'aiero_wc_product_title' ) ) {
    function aiero_wc_product_title() {
        global $product;
        $link = apply_filters( 'woocommerce_loop_product_link', get_the_permalink(), $product );

        echo '<h3 class="' . esc_attr( apply_filters( 'woocommerce_product_loop_title_classes', 'woocommerce-loop-product-title' ) ) . '">';
            echo '<a href="' . esc_url( $link ) . '">' . get_the_title() . '</a>';
        echo '</h3>';
    }
}

if ( ! function_exists( 'aiero_wc_product_sale_flash' ) ) {
    function aiero_wc_product_sale_flash() {
        global $post, $product;

        echo '<div class="attachment-woocommerce_flash">';
        if (is_product()) {
            echo '<div class="attachment-woocommerce_flash-inner">';
        }
        if ( $product->is_on_sale() ) {
            echo apply_filters('woocommerce_sale_flash', '<span class="flash-item sale">' . esc_html__('Sale', 'aiero') . '</span>', $post, $product);
        }

        $postdate      = get_the_time( 'Y-m-d' );
        $postdatestamp = strtotime( $postdate );
        $newness       = 14;
        if( ( time() - ( 60 * 60 * 24 * $newness ) ) < $postdatestamp ){
            echo '<span class="flash-item new">' . esc_html__( 'New', 'aiero' ) . '</span>';
        }
        if (is_product()) {
            echo '</div>';
        }
        echo '</div>';
    }
}

if ( ! function_exists( 'aiero_wc_subcategory_title' ) ) {
    function aiero_wc_subcategory_title($category) {
        $link = get_term_link( $category, 'product_cat' );

        echo '<h3 class="woocommerce-loop-category-title">';
            echo '<a href="' . esc_url( $link ) . '">';
                echo esc_html( $category->name );
                if ( $category->count > 0 ) {
                    echo apply_filters( 'woocommerce_subcategory_count_html', ' <mark class="count">(' . esc_html( $category->count ) . ')</mark>', $category );
                }
            echo '</a>';
		echo '</h2>';
    }
}

if ( !function_exists( 'aiero_wc_subcategory_add_thumbnail_link') ) {
    function aiero_wc_subcategory_add_thumbnail_link($category) {
        $link = get_term_link( $category, 'product_cat' );
        echo '<a href="' . esc_url( $link ) . '" class="attachment-woocommerce_link"></a>';
    }
}

if ( !function_exists('aiero_wc_single_rating') ) {
    function aiero_wc_single_rating() {
        global $product;

        if ( wc_review_ratings_enabled() ) {
            $rating_count = $product->get_rating_count();
            $average      = $product->get_average_rating();

            if ( $rating_count > 0 ) {
                echo '<div class="woocommerce-product-rating">';
                    echo wc_get_rating_html( $average, $rating_count );
                echo '</div>';
            }
        }
    }
}

if ( !function_exists('aiero_wc_template_single_title') ) {
    function aiero_wc_template_single_title() {
        if ( aiero_get_theme_mod('woo_single_product_show_name') ) {
            echo '<h2 class="product-title">';
                the_title();
            echo '</h2>';
        }
    }
}

if ( !function_exists('aiero_wc_single_meta') ) {
    function aiero_wc_single_meta() {
        global $product;

        echo '<div class="product_meta-wrapper">';
            echo '<div class="product_meta">';

                do_action( 'woocommerce_product_meta_start' );

                if ( wc_product_sku_enabled() && ( $product->get_sku() || $product->is_type( 'variable' ) ) ) {
                    echo '<div class="product_meta_item sku_wrapper">';
                        echo '<span class="product_meta_label">' . esc_html__( 'SKU: ', 'aiero' ) . '</span><span class="sku">' . (( $sku = $product->get_sku() ) ? $sku : esc_html__( 'N/A', 'aiero' )) . '</span>';
                    echo '</div>';
                }
                if( !empty(wc_get_product_category_list( $product->get_id())) ) {
                    echo '<div class="product_meta_item posted_in">';
                        echo '<span class="product_meta_label">' . _nx( 'Category:', 'Categories:', count( $product->get_category_ids() ), 'single-product', 'aiero' ) . ' </span>';
                        echo wc_get_product_category_list( $product->get_id(), '/ ', '<span class="product_meta_categories">', '</span>');
                    echo '</div>';
                }
                if( !empty(wc_get_product_tag_list( $product->get_id())) ) {
                    echo '<div class="product_meta_item tagged_as">';
                        echo '<span class="product_meta_label">' . _n( 'Tag:', 'Tags:', count( $product->get_tag_ids() ), 'aiero' ) . ' </span>';
                        echo wc_get_product_tag_list( $product->get_id(), '/', '<span class="product_meta_tags">', '</span>' );
                    echo '</div>';
                }

                do_action( 'woocommerce_product_meta_end' );

            echo '</div>';
        echo '</div>';
    }
}

if ( !function_exists('aiero_wc_quantity_wrapper_open') ) {
    function aiero_wc_quantity_wrapper_open() {
        echo '<div class="quantity-wrapper">';
    }
}

if ( !function_exists('aiero_wc_quantity_wrapper_close') ) {
    function aiero_wc_quantity_wrapper_close() {
        echo '</div>';
    }
}

if ( !function_exists('aiero_wc_cart_quantity_wrapper') ) {
    function aiero_wc_cart_quantity_wrapper($quantity) {
        echo sprintf('<div class="quantity-wrapper">%s</div>', $quantity);
    }
}

if ( !function_exists( 'aiero_wp_template_loop_product_thumbnail' ) ) {
    function aiero_wp_template_loop_product_thumbnail() {
        global $product;
        $link = apply_filters( 'woocommerce_loop_product_link', get_the_permalink(), $product );
        echo '<a href="' . esc_url( $link ) . '" class="attachment-woocommerce_link">';
            echo woocommerce_get_product_thumbnail('woocommerce_thumbnail');
        echo '</a>';
    }
}

// Rewrite WooCommerce function 'woocommerce_show_product_images'
function woocommerce_show_product_images() {
    if ( function_exists( 'wc_get_gallery_image_html' ) ) {
        global $product;

        $columns           = apply_filters( 'woocommerce_product_thumbnails_columns', 4 );
        $post_thumbnail_id = $product->get_image_id();
        $wrapper_classes   = apply_filters(
            'woocommerce_single_product_image_gallery_classes',
            array(
                'woocommerce-product-gallery',
                'woocommerce-product-gallery--' . ( $product->get_image_id() ? 'with-images' : 'without-images' ),
                'woocommerce-product-gallery--columns-' . absint( $columns ),
                'images',
            )
        );
        echo '<div class="' . esc_attr( implode( ' ', array_map( 'sanitize_html_class', $wrapper_classes ) ) ) . '" data-columns="' . esc_attr( $columns ) . '" style="opacity: 0; transition: opacity .25s ease-in-out;">';
        echo '<figure class="woocommerce-product-gallery__wrapper">';
        if ( $product->get_image_id() ) {
            $html = wc_get_gallery_image_html( $post_thumbnail_id, true );
        } else {
            $html  = '<div class="woocommerce-product-gallery__image--placeholder">';
            $html .= sprintf( '<img src="%s" alt="%s" class="wp-post-image" />', esc_url( wc_placeholder_img_src( 'woocommerce_single' ) ), esc_attr__( 'Awaiting product image', 'aiero' ) );
            $html .= '</div>';
        }
        echo apply_filters( 'woocommerce_single_product_image_thumbnail_html', $html, $post_thumbnail_id );

        do_action( 'woocommerce_product_thumbnails' );

        echo '</figure>';

        do_action( 'aiero_wc_single_product_sail_flash' );

        echo '</div>';
    }
}

// Rewrite WooCommerce function 'woocommerce_product_description_tab'
function woocommerce_product_description_tab() {
    global $product;
    the_content();
    do_action( 'woocommerce_product_additional_information', $product );
}

if ( !function_exists('aiero_wc_remove_product_tabs') ) {
    function aiero_wc_remove_product_tabs($tabs) {
        unset($tabs['additional_information']);
        return $tabs;
    }
}

if ( !function_exists('aiero_wc_dropdown_variation_attribute_options_html') ) {
    function aiero_wc_dropdown_variation_attribute_options_html($html, $args) {
        return $html = sprintf('<div class="select-wrap">%s</div>', $html);
    }
}

// Rewrite WooCommerce function 'woocommerce_related_products'
function woocommerce_related_products( $args = array() ) {
    global $product;

    if ( aiero_get_theme_mod('woo_single_product_show_related_section') == 'on' && $product ) {
        $defaults = array(
            'posts_per_page' => 2,
            'columns'        => 2,
            'orderby'        => 'rand',
            'order'          => 'desc',
        );
        $args = wp_parse_args( $args, $defaults );
        $args['related_products'] = array_filter( array_map( 'wc_get_product', wc_get_related_products( $product->get_id(), $args['posts_per_page'], $product->get_upsell_ids() ) ), 'wc_products_array_filter_visible' );
        $args['related_products'] = wc_products_array_orderby( $args['related_products'], $args['orderby'], $args['order'] );
        wc_set_loop_prop( 'name', 'related' );
        wc_set_loop_prop( 'columns', apply_filters( 'woocommerce_related_products_columns', $args['columns'] ) );
        $related_products = $args['related_products'];
        if ( $related_products ) {
            echo '<section class="related products">';
                echo '<h2 class="aiero-heading">';
                    echo '<span class="aiero-subheading"><span class="aiero-subheading-inner">' . esc_html__('products', 'aiero') . '</span></span>';
                    echo '<span class="aiero-heading-content">';
                        echo esc_html(aiero_get_theme_mod('woo_related_title'));
                    echo '</span>';
                echo '</h2>';
                echo '<div class="aiero_shop_loop shop_mode_grid">';
                woocommerce_product_loop_start();
                foreach ( $related_products as $related_product ) {
                    $post_object = get_post( $related_product->get_id() );
                    setup_postdata( $GLOBALS['post'] =& $post_object );
                    wc_get_template_part( 'content', 'product' );
                }
                woocommerce_product_loop_end();
                echo '</div>';
            echo '</section>';
        }
        wp_reset_postdata();
    }
}

// Rewrite WooCommerce function 'woocommerce_upsell_display'
function woocommerce_upsell_display( $limit = '-1', $columns = 4, $orderby = 'rand', $order = 'desc' ) {
    global $product;

    if ( $product ) {
        $args = apply_filters(
            'woocommerce_upsell_display_args',
            array(
                'posts_per_page' => $limit,
                'orderby'        => $orderby,
                'order'          => $order,
                'columns'        => $columns,
            )
        );
        wc_set_loop_prop( 'name', 'up-sells' );
        wc_set_loop_prop( 'columns', apply_filters( 'woocommerce_upsells_columns', isset( $args['columns'] ) ? $args['columns'] : $columns ) );
        $orderby = apply_filters( 'woocommerce_upsells_orderby', isset( $args['orderby'] ) ? $args['orderby'] : $orderby );
        $order   = apply_filters( 'woocommerce_upsells_order', isset( $args['order'] ) ? $args['order'] : $order );
        $limit   = apply_filters( 'woocommerce_upsells_total', isset( $args['posts_per_page'] ) ? $args['posts_per_page'] : $limit );
        $upsells = wc_products_array_orderby( array_filter( array_map( 'wc_get_product', $product->get_upsell_ids() ), 'wc_products_array_filter_visible' ), $orderby, $order );
        $upsells = $limit > 0 ? array_slice( $upsells, 0, $limit ) : $upsells;
        if ( $upsells ) {
            echo '<section class="up-sells upsells products">';
                echo '<h2 class="aiero-heading">';
                    echo '<span class="aiero-subheading"><span class="aiero-subheading-inner">' . esc_html__('products', 'aiero') . '</span></span>';
                    echo '<span class="aiero-heading-content">';
                        echo esc_html(aiero_get_theme_mod('woo_upsells_title'));
                    echo '</span>';
                echo '</h2>';
                echo '<div class="aiero_shop_loop shop_mode_grid">';
                    woocommerce_product_loop_start();
                    foreach ( $upsells as $upsell ) {
                        $post_object = get_post( $upsell->get_id() );
                        setup_postdata( $GLOBALS['post'] =& $post_object );
                        wc_get_template_part( 'content', 'product' );
                    }
                    woocommerce_product_loop_end();
                echo '</div>';
            echo '</section>';
        }
        wp_reset_postdata();
    }
}

if ( ! function_exists( 'aiero_wc_review_display_gravatar' ) ) {
    function aiero_wc_review_display_gravatar( $comment ) {
        echo '<div class="comment-avatar">';
            echo get_avatar( $comment, apply_filters( 'woocommerce_review_gravatar_size', '120' ), '' );
        echo '</div>';
    }
}

if ( ! function_exists( 'aiero_wc_review_meta_wrapper_open' ) ) {
    function aiero_wc_review_meta_wrapper_open() {
        echo '<div class="comment-meta">';
    }
}

if ( ! function_exists( 'aiero_wc_review_meta_wrapper_close' ) ) {
    function aiero_wc_review_meta_wrapper_close() {
        echo '</div>';
    }
}

if ( ! function_exists( 'aiero_wc_review_meta_info_wrapper_open' ) ) {
    function aiero_wc_review_meta_info_wrapper_open() {
        echo '<div class="comment-info">';
    }
}

if ( ! function_exists( 'aiero_wc_review_meta_info_wrapper_close' ) ) {
    function aiero_wc_review_meta_info_wrapper_close() {
        echo '</div>';
    }
}

if ( ! function_exists( 'aiero_wc_review_display_meta' ) ) {
    function aiero_wc_review_display_meta() {
        global $comment;
        $verified = wc_review_is_from_verified_owner( $comment->comment_ID );
        if ( '0' === $comment->comment_approved ) {
            echo '<div class="woocommerce-review__awaiting-approval">';
                esc_html_e( 'Your review is awaiting approval', 'aiero' );
            echo '</div>';
        } else {
            echo '<div class="woocommerce-review__author">';
                comment_author();
            echo '</div>';
            if ( 'yes' === get_option( 'woocommerce_review_rating_verification_label' ) && $verified ) {
                echo '<div class="woocommerce-review__verified verified">(' . esc_attr__( 'verified owner', 'aiero' ) . ')</div>';
            }
        }
    }
}

if ( ! function_exists( 'aiero_wc_review_display_date' ) ) {
    function aiero_wc_review_display_date() {
        global $comment;
        if ( '0' !== $comment->comment_approved ) {
            echo '<div class="comment-date">' . esc_html( get_comment_date( wc_date_format() ) ) . '</div>';
        }
    }
}

// Wrap Comment Form fields
add_action('comment_form_before_fields', 'aiero_add_review_rating_field');
add_action('comment_form_logged_in_after', 'aiero_add_review_rating_field');
if ( !function_exists('aiero_add_review_rating_field') ) {
    function aiero_add_review_rating_field($args) {
        if ( is_product() ) {
            if ( wc_review_ratings_enabled() ) {
                echo '<div class="comment-form-rating form-field form-rating">
                    <select name="rating" id="rating" required>
                        <option value="">' . esc_html_x( 'Rate&hellip;', 'frontend', 'aiero' ) . '</option>
                        <option value="5">' . esc_html_x( 'Perfect', 'frontend', 'aiero' ) . '</option>
                        <option value="4">' . esc_html_x( 'Good', 'frontend', 'aiero' ) . '</option>
                        <option value="3">' . esc_html_x( 'Average', 'frontend', 'aiero' ) . '</option>
                        <option value="2">' . esc_html_x( 'Not that bad', 'frontend', 'aiero' ) . '</option>
                        <option value="1">' . esc_html_x( 'Very poor', 'frontend', 'aiero' ) . '</option>
                    </select>
                </div>';
            }
        }
    }
}


if ( ! function_exists( 'aiero_wc_product_review_comment_form_args' ) ) {
    function aiero_wc_product_review_comment_form_args($args) {
        $args['title_reply_before'] = '<h4 id="reply-title" class="comment-reply-title">';
        $args['title_reply_after'] = '</h4>';
        $args['class_submit'] = 'submit';
        $args['submit_button'] = '<button name="%1$s" id="%2$s" class="%3$s">%4$s<span class="icon-button-arrow"></span><span class="button-inner"></button>';
        $args['submit_field'] = '%1$s %2$s';
        $args['comment_field'] = '<div class="form-field form-message">
                <textarea id="comment" name="comment" cols="45" rows="5" placeholder="' . esc_attr__( 'Review', 'aiero' ) . '" required></textarea>
            </div>';

        $commenter  = wp_get_current_commenter();
        $req        = get_option( 'require_name_email' );
        $html_req   = ( $req ? " required" : '' );
        $consent    = empty( $commenter['comment_author_email'] ) ? '' : ' checked="checked"';

        $args['fields']['author'] = '<div class="form-fields">
        <div class="form-field form-name"><input id="author" name="author" type="text" placeholder="' . esc_attr__('Full Name', 'aiero' ) . ( $req ? '*' : '' ) . '" value="' . esc_attr( $commenter['comment_author'] ) . '" size="30" maxlength="245"' . $html_req . ' /></div>';
        $args['fields']['email'] = '<div class="form-field form-email">
        <input id="email" name="email" type="email" placeholder="' . esc_attr__('Email', 'aiero') . ( $req ? '*' : '' ) . '" value="' . esc_attr($commenter['comment_author_email'] ) . '" size="30"' . $html_req . ' /></div>';
        $args['fields']['cookies'] = '<div class="form-field form-cookies comment-form-cookies-consent">'.
            sprintf( '<input id="wp-comment-cookies-consent" name="wp-comment-cookies-consent" type="checkbox" value="yes"%s />', $consent ) . '
                                 <label for="wp-comment-cookies-consent">' . esc_html__( 'Save my name, email, and website in this browser for the next time I comment.', 'aiero' ) . '</label>
                            </div></div>';
        return $args;
    }
}

add_filter('comment_form_fields', 'aiero_wc_review_comment_fields' );

if(!function_exists('aiero_wc_review_comment_fields')) {
    function aiero_wc_review_comment_fields( $fields ){
        if( function_exists('is_product') && is_product()  ) {
            $comment_field = $fields['comment'];
            unset( $fields['comment'] );
            $fields['comment'] = $comment_field;

            $comment_field = $fields['cookies'];
            unset( $fields['cookies'] );
            $fields['cookies'] = $comment_field;        
        }
        return $fields;
    }
}

// Cart Page
add_filter( 'woocommerce_cart_item_thumbnail', 'aiero_cart_table_product_thumbnail', 10, 2 );
if ( !function_exists( 'aiero_cart_table_product_thumbnail' ) ) {
    function aiero_cart_table_product_thumbnail( $product_image, $cart_item ) {
        $product = $cart_item['data'];
        $product_image = $product->get_image( 'thumbnail' );
        return $product_image;
    }
}

// Add Rating to cart item
add_action('woocommerce_after_cart_item_name', 'aiero_wc_add_rating_to_cart_item', 10, 2);
if ( !function_exists( 'aiero_wc_add_rating_to_cart_item' ) ) {
    function aiero_wc_add_rating_to_cart_item( $cart_item, $cart_item_key ) {
        $product = wc_get_product( $cart_item['product_id'] );
        echo wc_get_rating_html( $product->get_average_rating() );
    }
}


add_filter('woocommerce_form_field_args', 'aiero_wc_form_fields_args', 1);
if ( !function_exists( 'aiero_wc_form_fields_args' ) ) {
    function aiero_wc_form_fields_args($args) {
        $placeholder = $args['label'];
        $required = $args['required'] == true ? ' *' : '';
        $new_args = array(
            'placeholder' => esc_attr($placeholder) . esc_attr($required),
            'label'       => false,
            'default'     => '',
        );
        return array_merge($args, $new_args);
    }
}

// Checkout Page
//add_filter( 'woocommerce_shipping_package_name', '__return_false' );

add_action( 'woocommerce_checkout_before_customer_details', 'aiero_wc_billing_details_start_first_column', 10 );
if ( !function_exists( 'aiero_wc_billing_details_start_first_column' ) ) {
    function aiero_wc_billing_details_start_first_column() {
        echo '<div class="checkout-columns">';
            echo '<div class="checkout-column-main">';
    }
}

add_action( 'woocommerce_checkout_after_customer_details', 'aiero_wc_billing_details_end_first_column', 20 );
if ( !function_exists( 'aiero_wc_billing_details_end_first_column' ) ) {
    function aiero_wc_billing_details_end_first_column() {
        echo '</div>';
    }
}

add_action( 'woocommerce_checkout_before_order_review_heading', 'aiero_wc_billing_details_start_second_column', 10 );
if ( !function_exists( 'aiero_wc_billing_details_start_second_column' ) ) {
    function aiero_wc_billing_details_start_second_column() {
        echo '<div class="checkout-column-side">';
    }
}

add_action( 'woocommerce_checkout_after_order_review', 'aiero_wc_billing_details_end_second_column', 10 );
if ( !function_exists( 'aiero_wc_billing_details_end_second_column' ) ) {
    function aiero_wc_billing_details_end_second_column() {
            echo '</div>';
        echo '</div>';
    }
}

//remove_action( 'woocommerce_checkout_order_review', 'woocommerce_order_review', 10 );

add_action( 'woocommerce_checkout_order_review', 'aiero_wc_checkout_before_payment', 15 );
if ( !function_exists( 'aiero_wc_checkout_before_payment' ) ) {
    function aiero_wc_checkout_before_payment() {
        echo '<h3>' . esc_html__('Payment Method', 'aiero') . '</h3>';
    }
}

add_action( 'woocommerce_checkout_order_review', 'aiero_wc_order_review', 1 );
if ( !function_exists( 'aiero_wc_order_review' ) ) {
    function aiero_wc_order_review() {
        echo '<table class="checkout_cart_table shop_table shop_table_responsive">';
            echo '<tbody>';

            do_action( 'woocommerce_review_order_before_cart_contents' );

            foreach ( WC()->cart->get_cart() as $cart_item_key => $cart_item ) {
                $_product = apply_filters( 'woocommerce_cart_item_product', $cart_item['data'], $cart_item, $cart_item_key );
                $product_id = apply_filters( 'woocommerce_cart_item_product_id', $cart_item['product_id'], $cart_item, $cart_item_key );
                $rating  = $_product->get_average_rating();
                $count   = $_product->get_rating_count();
                if ( $_product && $_product->exists() && $cart_item['quantity'] > 0 && apply_filters( 'woocommerce_checkout_cart_item_visible', true, $cart_item, $cart_item_key ) ) {
                    echo '<tr class="' . esc_attr( apply_filters( 'woocommerce_cart_item_class', 'cart_item', $cart_item, $cart_item_key ) ) . '">';
                        echo '<td class="product-thumbnail">';
                            $url = get_permalink($_product->get_id());
                            $attachment_id = $_product->get_image_id();
                            echo '<a href="' . esc_url($url) . '">';
                                echo wp_get_attachment_image($attachment_id, 'woocommerce_gallery_thumbnail');
                            echo '</a>';
                        echo '</td>';
                        echo '<td class="product-name" data-title="' . esc_attr('Product', 'aiero') . '">';
                            echo '<div class="product-name-title">';
                                echo '<a href="' . esc_url($url) . '">';
                                    echo apply_filters( 'woocommerce_cart_item_name', $_product->get_name(), $cart_item, $cart_item_key );
                                echo '</a>';
                            echo '</div>';
                            echo wc_get_rating_html( $rating, $count );
                            echo '<div class="product-name-info">';
                                echo apply_filters( 'woocommerce_cart_item_price', WC()->cart->get_product_price( $_product ), $cart_item, $cart_item_key );
                                echo apply_filters( 'woocommerce_checkout_cart_item_quantity', sprintf( '&nbsp;&times;&nbsp;%s', $cart_item['quantity'] ), $cart_item, $cart_item_key );
                            echo '</div>';
                            echo wc_get_formatted_cart_item_data( $cart_item );
                        echo '</td>';
                        echo '<td class="product-total" data-title="' . esc_attr('Total', 'aiero') . '">';
                            echo apply_filters( 'woocommerce_cart_item_subtotal', WC()->cart->get_product_subtotal( $_product, $cart_item['quantity'] ), $cart_item, $cart_item_key );
                        echo '</td>';
                        echo '<td class="product-remove">';
							echo apply_filters(
								'woocommerce_cart_item_remove_link',
								sprintf(
								'<a href="%s" class="remove" aria-label="%s" data-product_id="%s" data-product_sku="%s">&times;</a>',
									esc_url( wc_get_cart_remove_url( $cart_item_key ) ),
									esc_html__( 'Remove this item', 'aiero' ),
									esc_attr( $product_id ),
									esc_attr( $_product->get_sku() )
								),
								$cart_item_key
							);
						echo '</td>';
                    echo '</tr>';
                }
            }

            do_action( 'woocommerce_review_order_after_cart_contents' );

            echo '</tbody>';
        echo '</table>';
    }
}

add_action( 'woocommerce_checkout_order_review', 'aiero_wc_order_totals', 5 );
if ( !function_exists( 'aiero_wc_order_totals' ) ) {
    function aiero_wc_order_totals() {
        echo '<div class="review-order-wrapper">';
            echo '<h3 id="order_total_heading">' . esc_html__('Cart totals', 'aiero') . '</h3>';
    }
}

add_action( 'woocommerce_checkout_order_review', 'aiero_wc_order_totals_wrapper_close', 11 );
if ( !function_exists( 'aiero_wc_order_totals_wrapper_close' ) ) {
    function aiero_wc_order_totals_wrapper_close() {
        echo '</div>';
    }
}

add_filter( 'woocommerce_order_button_html', 'aiero_wc_order_button_html', 20);
if ( !function_exists( 'aiero_wc_order_button_html' ) ) {
    function aiero_wc_order_button_html() {
        $order_button_text = apply_filters( 'woocommerce_order_button_text', esc_html__( 'Place order', 'aiero' ) );
        return '<button type="submit" class="button alt' . esc_attr( wc_wp_theme_get_element_class_name( 'button' ) ? ' ' . wc_wp_theme_get_element_class_name( 'button' ) : '' ) . '" name="woocommerce_checkout_place_order" id="place_order" value="' . esc_attr( $order_button_text ) . '" data-value="' . esc_attr( $order_button_text ) . '">' . esc_html( $order_button_text ) . '<span class="icon-button-arrow"></span><span class="button-inner"></span></button>';
    }
} 

// 'My account' Log In Form
add_action('woocommerce_after_checkout_validation', 'aiero_wc_confirm_password_matches', 10, 2);

if ( !function_exists( 'aiero_wc_confirm_password_matches' ) ) {
    function aiero_wc_confirm_password_matches($posted ) {
        $checkout = WC()->checkout;
        if ( ! is_user_logged_in() && ( $checkout->must_create_account || ! empty( $posted['createaccount'] ) ) ) {
            if ( strcmp( $posted['password'], $posted['password2'] ) !== 0 ) {
                wc_add_notice( esc_html__( 'Passwords do not match.', 'aiero' ), 'error' );
            }
        }
    }
}
add_filter('woocommerce_registration_errors', 'aiero_wc_registration_errors_validation', 10, 3 );
if ( !function_exists( 'aiero_wc_registration_errors_validation' ) ) {
    function aiero_wc_registration_errors_validation($reg_errors) {
        if (strcmp( $_POST['password'], $_POST['password2'] ) !== 0) {
            return new WP_Error('registration-error', esc_html__('Passwords do not match.', 'aiero'));
        }
        return $reg_errors;
    }
}


// Rewrite WooCommerce Quantity template
if ( ! function_exists( 'woocommerce_quantity_input' ) ) {
    function woocommerce_quantity_input( $args = array(), $product = null, $echo = true ) {
        if ( is_null( $product ) ) {
            $product = $GLOBALS['product'];
        }

        $defaults = array(
            'input_id'     => uniqid( 'quantity_' ),
            'input_name'   => 'quantity',
            'input_value'  => '1',
            'classes'      => apply_filters( 'woocommerce_quantity_input_classes', array( 'input-text', 'qty', 'text' ), $product ),
            'max_value'    => apply_filters( 'woocommerce_quantity_input_max', -1, $product ),
            'min_value'    => apply_filters( 'woocommerce_quantity_input_min', 0, $product ),
            'step'         => apply_filters( 'woocommerce_quantity_input_step', 1, $product ),
            'pattern'      => apply_filters( 'woocommerce_quantity_input_pattern', has_filter( 'woocommerce_stock_amount', 'intval' ) ? '[0-9]*' : '' ),
            'inputmode'    => apply_filters( 'woocommerce_quantity_input_inputmode', has_filter( 'woocommerce_stock_amount', 'intval' ) ? 'numeric' : '' ),
            'product_name' => $product ? $product->get_title() : '',
            'placeholder'  => apply_filters( 'woocommerce_quantity_input_placeholder', '', $product ),
        );

        $args = apply_filters( 'woocommerce_quantity_input_args', wp_parse_args( $args, $defaults ), $product );

        // Apply sanity to min/max args - min cannot be lower than 0.
        $args['min_value'] = max( $args['min_value'], 0 );
        $args['max_value'] = 0 < $args['max_value'] ? $args['max_value'] : '';

        // Max cannot be lower than min if defined.
        if ( '' !== $args['max_value'] && $args['max_value'] < $args['min_value'] ) {
            $args['max_value'] = $args['min_value'];
        }

        ob_start();

        if ( $args['max_value'] && $args['min_value'] === $args['max_value'] ) {
            ?>
            <div class="quantity hidden">
                <input type="hidden" id="<?php echo esc_attr( $args['input_id'] ); ?>" class="qty" name="<?php echo esc_attr( $args['input_name'] ); ?>" value="<?php echo esc_attr( $args['min_value'] ); ?>" />
            </div>
            <?php
        } else {
            $label = !empty( $args['product_name'] ) ? sprintf( esc_html__( '%s quantity', 'aiero' ), wp_strip_all_tags( $args['product_name'] ) ) : esc_html__( 'Quantity', 'aiero' );
            ?>
            <div class="quantity">
                <?php do_action( 'woocommerce_before_quantity_input_field' ); ?>
                <label class="screen-reader-text" for="<?php echo esc_attr( $args['input_id'] ); ?>"><?php echo esc_html( $label ); ?></label>
                <input
                        type="number"
                        id="<?php echo esc_attr( $args['input_id'] ); ?>"
                        class="<?php echo esc_attr( join( ' ', (array) $args['classes'] ) ); ?>"
                        step="<?php echo esc_attr( $args['step'] ); ?>"
                        min="<?php echo esc_attr( $args['min_value'] ); ?>"
                        <?php echo ( 0 < $args['max_value'] ? ' max=' . esc_attr($args['max_value']) : '' ); ?>
                        name="<?php echo esc_attr( $args['input_name'] ); ?>"
                        value="<?php echo esc_attr( $args['input_value'] ); ?>"
                        title="<?php esc_attr_e( 'Qty', 'aiero' ); ?>"
                        placeholder="<?php echo esc_attr( $args['placeholder'] ); ?>"
                        inputmode="<?php echo esc_attr( $args['inputmode'] ); ?>" />
                <?php do_action( 'woocommerce_after_quantity_input_field' ); ?>
            </div>
            <?php
        }

        if ( $echo ) {
            echo ob_get_clean();
        } else {
            return ob_get_clean();
        }
    }
}

// WooCommerce Pagination Args
add_filter( 'woocommerce_pagination_args', 'aiero_wc_pagination_args', 10, 1 );
if ( !function_exists( 'aiero_wc_pagination_args' ) ) {
    function aiero_wc_pagination_args( $array ) {
        $array['before_page_number'] = '<span class="button-inner"></span>';
        $array['prev_text'] = esc_html__('Previous', 'aiero') . '<span class="button-inner"></span><span class="icon-button-arrow"></span>';
        $array['next_text'] = esc_html__('Next', 'aiero') . '<span class="button-inner"></span><span class="icon-button-arrow"></span>';
        $array['type']      = 'plain';

        return $array;
    }
}

add_filter( 'woocommerce_checkout_fields' , 'aiero_wc_checkout_fields' );
if ( !function_exists( 'aiero_wc_checkout_fields' ) ) {
    function aiero_wc_checkout_fields($fields) {
        if(is_checkout()) {
            $billing_fields =& $fields['billing'];
            $shipping_fields =& $fields['shipping'];

            $billing_fields['billing_phone']['class']      = ['form-row-last'];
            $billing_fields['billing_phone']['priority']   = 90;
            $billing_fields['billing_email']['priority']   = 100;
            $billing_fields['billing_email']['class']      = ['form-row-first'];
            $billing_fields['billing_country']['class']    = array('form-row-first', 'address-field', 'update_totals_on_change');
            $billing_fields['billing_country']['required'] = 1;
            $billing_fields['billing_state']['priority']   = 45;
            $billing_fields['billing_state']['class']      = array('form-row-last', 'address-field');
            $shipping_fields['shipping_country']['class']  = array('form-row-first', 'address-field', 'update_totals_on_change');
            $fields['order']['order_comments']['label']    = __( 'Additional information', 'aiero' );
        }

        return $fields;
    }
}

// Shift Checkout Address Fields
add_filter( 'woocommerce_default_address_fields', 'aiero_shift_default_billing_fields' );
if ( !function_exists( 'aiero_shift_default_billing_fields' ) ) {
    function aiero_shift_default_billing_fields( $fields ) {
        if( is_checkout() ) {
            $fields['city']['priority']         = 50;
            $fields['state']['priority']        = 45;
            $fields['state']['class']           = array('form-row-last', 'address-field');
            $fields['city']['class']            = array('form-row-first', 'address-field');
            $fields['address_1']['class']       = array('form-row-last', 'address-field');
            $fields['address_1']['required']    = 0;
            $fields['address_2']['class']       = array('form-row-first', 'address-field');
            $fields['postcode']['class']        = array('form-row-last', 'address-field');
            $fields['postcode']['priority']     = 110;
            $fields['postcode']['required']     = 0;
        }        

        return $fields;
    }
}