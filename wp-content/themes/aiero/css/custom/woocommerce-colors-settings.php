<?php

// --------------------------- //
// ------- WooCommerce ------- //
// --------------------------- //
if ( class_exists('WooCommerce') ) {

    # Header Colors
    $header_accent_text_color = aiero_get_prepared_option('header_accent_text_color', 'standard_accent_text_color', 'header_customize');
    if ( !empty($header_accent_text_color) ) {
        $aiero_custom_css .= '
            .header .mini-cart .mini-cart-count > span, 
            .mobile-header .mini-cart .mini-cart-count > span, 
            .mobile-header-menu-container .mini-cart .mini-cart-count > span {
                background-color: ' . esc_attr($header_accent_text_color) . ';
            }
        ';
    }

    $header_button_text_color = aiero_get_prepared_option('header_button_text_color', 'standard_button_text_color', 'header_customize');
    if ( !empty($header_button_text_color) ) {
        $aiero_custom_css .= '
        ';
    }

    $header_background_color = aiero_get_prepared_option('header_background_color', 'standard_background_color', 'header_customize');
    if ( !empty($header_background_color) ) {
        $aiero_custom_css .= '
            .mini-cart .mini-cart-count > span {
                color: ' . esc_attr($header_background_color) . ';
            }
            .mini-cart .mini-cart-count > span {
                border-color: ' . esc_attr($header_background_color) . ';
            }
        ';
    }

    $header_button_border_color = aiero_get_prepared_option('header_button_border_color', 'standard_button_border_color', 'header_customize');
    if ( !empty($header_button_border_color) ) {
        $aiero_custom_css .= '';
    }

    $header_button_background_color = aiero_get_prepared_option('header_button_background_color', 'standard_button_background_color', 'header_customize');
    if ( !empty($header_button_background_color) ) {
        $aiero_custom_css .= '';
    }

    $header_button_text_hover = aiero_get_prepared_option('header_button_text_hover', 'standard_button_text_hover', 'header_customize');
    if ( !empty($header_button_text_hover) ) {
        $aiero_custom_css .= '
        ';
    }

    $header_button_border_hover = aiero_get_prepared_option('header_button_border_hover', 'standard_button_border_hover', 'header_customize');
    if ( !empty($header_button_border_hover) ) {
        $aiero_custom_css .= '';
    }

    $header_button_background_hover = aiero_get_prepared_option('header_button_background_hover', 'standard_button_background_hover', 'header_customize');
    if ( !empty($header_button_background_hover) ) {
        $aiero_custom_css .= '';
    }


    # Footer Colors
    $footer_dark_text_color = aiero_get_prepared_option('footer_dark_text_color', 'contrast_dark_text_color', 'footer_customize');
    if ( !empty($footer_dark_text_color) ) {
        $aiero_custom_css .= '
            .footer .wc-block-product-categories-list > .wc-block-product-categories-list-item:hover,
            .footer .wc-block-product-categories-list .wc-block-product-categories-list-item:hover > a,
            .footer .wc-block-product-categories-list > .wc-block-product-categories-list-item:hover > .wc-block-product-categories-list-item-count,
            .footer .widget_product_search .woocommerce-product-search button,
            .footer .wp-block-woocommerce-product-search .wc-block-product-search__fields .wc-block-product-search__button,
            .footer .widget_product_categories .post-count,
            .footer ul.product_list_widget li .product-title {
                color: ' . esc_attr($footer_dark_text_color) . ';
            }
        ';
    }

    $footer_light_text_color = aiero_get_prepared_option('footer_light_text_color', 'contrast_light_text_color', 'footer_customize');
    if ( !empty($footer_light_text_color) ) {
        $aiero_custom_css .= '
            .footer .widget_product_categories li.cat-item-hierarchical,
            .footer .wc-block-product-categories-list > .wc-block-product-categories-list-item,
            .footer .wc-block-product-categories-list > .wc-block-product-categories-list-item a,
            .footer .widget ul.product_list_widget li .price_wrapper del,
            .footer-widgets .widget div[class*="wp-block-"] .wc-block-review-list-item__item .wc-block-review-list-item__published-date,
            .footer-widgets .wc-block-grid__product .wc-block-grid__product-price .price_wrapper {
                color: ' . esc_attr($footer_light_text_color) . ';
            }
        ';
    }

    $footer_accent_text_color = aiero_get_prepared_option('footer_accent_text_color', 'contrast_accent_text_color', 'footer_customize');
    if ( !empty($footer_accent_text_color) ) {
        $aiero_custom_css .= '
            .footer-widgets .wc-block-grid__product .wc-block-grid__product-price ins
            .footer .widget ul.product_list_widget li .price_wrapper ins {
                color: ' . esc_attr($footer_accent_text_color) . ';
            }
        ';
    }

    $footer_border_color = aiero_get_prepared_option('footer_border_color', 'contrast_border_color', 'footer_customize');
    if ( !empty($footer_border_color) ) {
        $aiero_custom_css .= '
            .footer .widget ul.product_list_widget li a imgl,
            .footer-widgets .widget div[class*="wp-block-"].has-content .wc-block-review-list-item__item:not(:first-child) {
                border-color: ' . esc_attr($footer_border_color) . ';
            }
        ';
    }

    $footer_border_hover_color = aiero_get_prepared_option('footer_border_hover_color', 'contrast_border_hover_color', 'footer_customize');
    if ( !empty($footer_border_hover_color) ) {
        $aiero_custom_css .= '
            .footer .widget ul.product_list_widget li a:hover img {
                border-color: ' . esc_attr($footer_border_hover_color) . ';
            }
        ';
    }

    $footer_background_color = aiero_get_prepared_option('footer_background_color', 'contrast_background_color', 'footer_customize');
    if ( !empty($footer_background_color) ) {
        $aiero_custom_css .= '';
    }

    $footer_background_alter_color = aiero_get_prepared_option('footer_background_alter_color', 'contrast_background_alter_color', 'footer_customize');
    if ( !empty($footer_background_alter_color) ) {
        $aiero_custom_css .= '
            .footer .wc-block-product-categories {
                background-color: ' . esc_attr($footer_background_alter_color) . ';
            }
        ';
    }

    $footer_button_text_color = aiero_get_prepared_option('footer_button_text_color', 'contrast_button_text_color', 'footer_customize');
    if ( !empty($footer_button_text_color) ) {
        $aiero_custom_css .= '
            .footer .woocommerce a.button,
            .woocommerce .footer a.button,
            .footer .woocommerce button.button,
            .woocommerce .footer button.button,
            .footer .woocommerce input.button,
            .woocommerce .footer input.button,
            .footer .woocommerce #respond input#submit,
            .woocommerce .footer #respond input#submit {
                color: ' . esc_attr($footer_button_text_color) . ';
            }
        ';
    }

    $footer_button_border_color = aiero_get_prepared_option('footer_button_border_color', 'contrast_button_border_color', 'footer_customize');
    if ( !empty($footer_button_border_color) ) {
        $aiero_custom_css .= '
            .footer .woocommerce a.button,
            .woocommerce .footer a.button,
            .footer .woocommerce button.button,
            .woocommerce .footer button.button,
            .footer .woocommerce input.button,
            .woocommerce .footer input.button,
            .footer .woocommerce #respond input#submit,
            .woocommerce .footer #respond input#submit {
                border-color: ' . esc_attr($footer_button_border_color) . ';
            }
        ';
    }

    $footer_button_background_color = aiero_get_prepared_option('footer_button_background_color', 'contrast_button_background_color', 'footer_customize');
    if ( !empty($footer_button_background_color) ) {
        $aiero_custom_css .= '
            .footer .woocommerce a.button,
            .woocommerce .footer a.button,
            .footer .woocommerce button.button,
            .woocommerce .footer button.button,
            .footer .woocommerce input.button,
            .woocommerce .footer input.button,
            .footer .woocommerce #respond input#submit,
            .woocommerce .footer #respond input#submit {
                background-color: ' . esc_attr($footer_button_background_color) . ';
            }
        ';
    }

    $footer_button_text_hover = aiero_get_prepared_option('footer_button_text_hover', 'contrast_button_text_hover', 'footer_customize');
    if ( !empty($footer_button_text_hover) ) {
        $aiero_custom_css .= '
            .footer .woocommerce a.button:hover,
            .woocommerce .footer a.button:hover,
            .footer .woocommerce button.button:hover,
            .woocommerce .footer button.button:hover,
            .footer .woocommerce input.button:hover,
            .woocommerce .footer input.button:hover,
            .footer .woocommerce #respond input#submit:hover,
            .woocommerce .footer #respond input#submit:hover {
                color: ' . esc_attr($footer_button_text_hover) . ';
            }
        ';
    }

    $footer_button_border_hover = aiero_get_prepared_option('footer_button_border_hover', 'contrast_button_border_hover', 'footer_customize');
    if ( !empty($footer_button_border_hover) ) {
        $aiero_custom_css .= '
            .footer .woocommerce a.button:hover,
            .woocommerce .footer a.button:hover,
            .footer .woocommerce button.button:hover,
            .woocommerce .footer button.button:hover,
            .footer .woocommerce input.button:hover,
            .woocommerce .footer input.button:hover,
            .footer .woocommerce #respond input#submit:hover,
            .woocommerce .footer #respond input#submit:hover {
                border-color: ' . esc_attr($footer_button_border_hover) . ';
            }
        ';
    }

    $footer_button_background_hover = aiero_get_prepared_option('footer_button_background_hover', 'contrast_button_background_hover', 'footer_customize');
    if ( !empty($footer_button_background_hover) ) {
        $aiero_custom_css .= '
            .footer .woocommerce a.button:hover,
            .woocommerce .footer a.button:hover,
            .footer .woocommerce button.button:hover,
            .woocommerce .footer button.button:hover,
            .footer .woocommerce input.button:hover,
            .woocommerce .footer input.button:hover,
            .footer .woocommerce #respond input#submit:hover,
            .woocommerce .footer #respond input#submit:hover {
                background-color: ' . esc_attr($footer_button_background_hover) . ';
            }
        ';
    }


    # Standard Colors
    $standard_default_text_color = aiero_get_prefered_option('standard_default_text_color');
    if ( !empty($standard_default_text_color) ) {
        $aiero_custom_css .= '
            .woocommerce form .form-row .input-text, 
            .woocommerce form .form-row select,
        	.header .mini-cart .mini-cart-panel,
            .content-wrapper .widget_layered_nav_filters ul .chosen a,
            .woocommerce-pagination .page-numbers.dots,
            .woocommerce-pagination .post-page-numbers.dots,        
            .woocommerce-pagination .page-numbers.dots:hover,
            .woocommerce-pagination .post-page-numbers.dots:hover,            
            .woocommerce div.product .woocommerce-tabs ul.tabs li a,
            .woocommerce div.product .woocommerce-tabs ul.tabs li a:hover,
            #add_payment_method #payment div.payment_box, 
            .woocommerce-cart #payment div.payment_box, 
            .woocommerce-checkout #payment div.payment_box,
            .woocommerce .woocommerce-terms-and-conditions-wrapper a, 
            .woocommerce-page .woocommerce-terms-and-conditions-wrapper a,
            .woocommerce .woocommerce-terms-and-conditions-wrapper .form-row .required, 
            .woocommerce-page .woocommerce-terms-and-conditions-wrapper .form-row .required,            
            .woocommerce .outer-form-wrapper form.login a, 
            .woocommerce .outer-form-wrapper form.register a,
            .woocommerce-account .form-attention span,
            .woocommerce-account .form-attention a {
                color: ' . esc_attr($standard_default_text_color) . ';
            }
            .woocommerce table.shop_table.checkout_cart_table,
            .woocommerce .woocommerce-checkout-review-order .checkout_cart_table tr:not(:first-child) td, 
            .woocommerce-page .woocommerce-checkout-review-order .checkout_cart_table tr:not(:first-child) td,
            .woocommerce table.shop_table.checkout_cart_table tbody tr td,
            .woocommerce table.shop_table.checkout_cart_table tbody tr:first-child td {
                border-color: ' . esc_attr($standard_default_text_color) . ';
            }
            .wp-block-woocommerce-price-filter .wc-block-components-price-slider__range-input::-webkit-slider-thumb {
                border-color: ' . esc_attr($standard_default_text_color) . ';
            }
            .wp-block-woocommerce-price-filter .wc-block-components-price-slider__range-input::-moz-range-thumb {
                border-color: ' . esc_attr($standard_default_text_color) . ';
            }
            .wp-block-woocommerce-price-filter .wc-block-components-price-slider__range-input::-ms-thumb {
                border-color: ' . esc_attr($standard_default_text_color) . ';
            }
            .wp-block-woocommerce-price-filter .wc-block-components-price-slider__range-input:focus::-ms-thumb {
                border-color: ' . esc_attr($standard_default_text_color) . ';
            }
            .wp-block-woocommerce-price-filter .wc-block-components-price-slider__range-input::-webkit-slider-thumb:hover {
                border-color: ' . esc_attr($standard_default_text_color) . ';
            }
            .wp-block-woocommerce-price-filter .wc-block-components-price-slider__range-input::-moz-range-thumb:hover {
                border-color: ' . esc_attr($standard_default_text_color) . ';
            }
            .wp-block-woocommerce-price-filter .wc-block-components-price-slider__range-input::-ms-thumb:hover {
                border-color: ' . esc_attr($standard_default_text_color) . ';
            }
            .wp-block-woocommerce-price-filter .wc-block-components-price-slider__range-input:focus::-ms-thumb:hover {
                border-color: ' . esc_attr($standard_default_text_color) . ';
            }
            .wp-block-woocommerce-price-filter .wc-block-components-price-slider__range-input:focus::-webkit-slider-thumb {
                border-color: ' . esc_attr($standard_default_text_color) . ';
            }
            .wp-block-woocommerce-price-filter .wc-block-components-price-slider__range-input:focus::-moz-range-thumb {
                border-color: ' . esc_attr($standard_default_text_color) . ';
            }
            .wp-block-woocommerce-price-filter .wc-block-components-price-slider__range-input:focus::-ms-thumb {
                border-color: ' . esc_attr($standard_default_text_color) . ';
            }
        ';
    }

    $standard_light_text_color = aiero_get_prefered_option('standard_light_text_color');
    if ( !empty($standard_light_text_color) ) {
        $aiero_custom_css .= '            
            .header .mini-cart .mini-cart-panel .cart_list li .content-woocommerce-wrapper .quantity,
            .woocommerce ul.products li.product .price,
            .content-wrapper .widget ul.product_list_widget li .price_wrapper del,
            .content-wrapper .widget ul.product_list_widget li .price_wrapper,
            .woocommerce ul.products li.product .woocommerce-loop-product__wrapper .content-woocommerce-wrapper .price del, 
            .woocommerce-page ul.products li.product .woocommerce-loop-product__wrapper .content-woocommerce-wrapper .price del,           
            .single-product.woocommerce div.product .price,
            .commentlist li.review .comment_container .comment-date,
            .woocommerce div.product form.cart .group_table .price_wrapper del,
            .woocommerce form .show-password-input:before, 
            .woocommerce-page form .show-password-input:before,           
            .content-wrapper .wc-block-grid__product .wc-block-grid__product-price .price_wrapper,
            .content-wrapper .widget_price_filter .price_slider_amount .price_label,
            .content-wrapper .product_list_widget li .reviewer,
            .content-wrapper .widget_layered_nav ul li,
            ul.products li.product .woocommerce-loop-product__wrapper .content-woocommerce-wrapper .woocommerce-loop-category-title mark,
            .widget div[class*="wp-block-"] .wc-block-review-list-item__item .wc-block-review-list-item__published-date,
            .content-wrapper .wc-block-product-categories-list > .wc-block-product-categories-list-item,
            .content-wrapper .wc-block-product-categories-list > .wc-block-product-categories-list-item a,             
            .woocommerce .woocommerce-cart-form table.shop_table .product-price .amount, 
            .woocommerce-page .woocommerce-cart-form table.shop_table .product-price .amount,
            .woocommerce-checkout-review-order .checkout_cart_table .product-name .product-name-info {
                color: ' . esc_attr($standard_light_text_color) . ';
            }
            .widget_product_categories ul > li:before,
            .widget div[class*="wp-block-"] .wc-block-review-list-item__item:before {
                background-color: rgba(' . esc_attr(aiero_hex2rgb($standard_light_text_color)) . ', 0.6);
            }
        ';
    }

    $standard_dark_text_color = aiero_get_prefered_option('standard_dark_text_color');
    if ( !empty($standard_dark_text_color) ) {
        $aiero_custom_css .= '
            .woocommerce-info,
            .woocommerce-error,
            .woocommerce-message,
            .content-wrapper .widget_product_search .woocommerce-product-search button,
            .content-wrapper .wp-block-woocommerce-product-search .wc-block-product-search__fields .wc-block-product-search__button,
            .content-wrapper .widget_product_categories .post-count, 
            .content-wrapper ul.product_list_widget li > a,
            .content-wrapper ul.product_list_widget li > a:hover,
            .content-wrapper .widget_shopping_cart .total,
            .header .mini-cart .mini-cart-panel .total,
            .catalog-top-info-wrapper .woocommerce-result-count,
            .woocommerce-ordering select,
            .checkout_cart_table .product-name .product-name-title,
            .woocommerce-checkout-review-total .checkout_total_table td,
            .woocommerce .woocommerce-form-login .woocommerce-form-login__rememberme, 
            .woocommerce-page .woocommerce-form-login .woocommerce-form-login__rememberme,
            .woocommerce-account .form-attention,
            .woocommerce .woocommerce-cart-form table.shop_table th, 
            .woocommerce-page .woocommerce-cart-form table.shop_table th,
            .woocommerce .quantity-wrapper .quantity,
            .woocommerce .cart-collaterals .cart_totals table.shop_table td, 
            .woocommerce .cart-collaterals .cart_totals table.shop_table th, 
            .woocommerce-page .cart-collaterals .cart_totals table.shop_table td, 
            .woocommerce-page .cart-collaterals .cart_totals table.shop_table th,
            .woocommerce div.product .product_meta,
            .single-product.woocommerce div.product .product_meta .tagged_as a,
            .single-product.woocommerce div.product .product_meta .tagged_as a:hover,
            .commentlist li.review .comment_container .woocommerce-review__author,
            .woocommerce #respond input#submit.alt.disabled, 
            .woocommerce #respond input#submit.alt.disabled:hover, 
            .woocommerce #respond input#submit.alt:disabled, 
            .woocommerce #respond input#submit.alt:disabled:hover, 
            .woocommerce #respond input#submit.alt:disabled[disabled], 
            .woocommerce #respond input#submit.alt:disabled[disabled]:hover,
            .woocommerce .comment-reply-title,
            .woocommerce .post-comments-title,
            .woocommerce form .show-password-input.display-password::before, 
            .woocommerce-page form .show-password-input.display-password::before,
            .woocommerce table.shop_table_responsive tr td::before, 
            .woocommerce-page table.shop_table_responsive tr td::before,
            .content-wrapper .widget_product_search .woocommerce-product-search button:before,
            .content-wrapper .wp-block-woocommerce-product-search .wc-block-product-search__fields .wc-block-product-search__button:before,
            .content-wrapper .widget_layered_nav ul li a,
            .mini-cart .mini-cart-panel .mini-cart-title,
            .widget_shopping_cart .cart_list li a,
            .header .mini-cart .mini-cart-panel .cart_list li a,
            .woocommerce .catalog-top-info-wrapper .woocommerce-ordering:after,
            ul.products li.product .woocommerce-loop-product__wrapper .content-woocommerce-wrapper h3 a,
            .woocommerce .woocommerce-cart-form table.shop_table .product-name a, 
            .woocommerce-page .woocommerce-cart-form table.shop_table .product-name a,
            .woocommerce-checkout-review-order .checkout_cart_table .product-name .product-name-title a,
            .woocommerce-checkout-review-order .shop_table.woocommerce-checkout-review-order-table th,
            .woocommerce-checkout-review-order .shop_table.woocommerce-checkout-review-order-table .amount,
            .woocommerce-account .woocommerce-MyAccount-navigation ul li a,
            .woocommerce .woocommerce-table--order-details .product-name a,
            .woocommerce .woocommerce-table--order-details tfoot th,
            .wc-block-grid__products .wc-block-grid__product .wc-block-grid__product-title,
            .widget div[class*="wp-block-"] .wc-block-review-list-item__item .wc-block-review-list-item__meta,
            .widget div[class*="wp-block-"] .wc-block-review-list-item__item .wc-block-review-list-item__meta a,            
            .content-wrapper .wc-block-product-categories-list > .wc-block-product-categories-list-item:hover,
            .content-wrapper .wc-block-product-categories-list .wc-block-product-categories-list-item:hover > a,
            .content-wrapper .wc-block-product-categories-list > .wc-block-product-categories-list-item:hover > .wc-block-product-categories-list-item-count,
            .mini-cart .mini-cart-panel .cart_list li a.remove_from_cart_button:hover,
            .content-wrapper .woocommerce-error a, 
            .content-wrapper .woocommerce-info a, 
            .content-wrapper .woocommerce-message a {
                color: ' . esc_attr($standard_dark_text_color) . ';
            }
            .woocommerce .checkout_cart_table .product-remove a.remove:hover,
            .woocommerce .woocommerce-cart-form table.shop_table .product-remove .remove:hover, 
            .woocommerce-page .woocommerce-cart-form table.shop_table .product-remove .remove:hover {
                color: ' . esc_attr($standard_dark_text_color) . ' !important;
            }
            .filter-control-wrapper .filter-control-list .filter-control-item:after {
                background-color: ' . esc_attr($standard_dark_text_color) . ';
            }
        ';
    }

    $standard_accent_text_color = aiero_get_prefered_option('standard_accent_text_color');
    if ( !empty($standard_accent_text_color) ) {
        $aiero_custom_css .= '
            .product-filters-trigger-wrapper,
            .woocommerce div.product form.cart .group_table .price_wrapper,
            .content-wrapper .widget_product_search .woocommerce-product-search button:hover:before,
            .content-wrapper .wp-block-woocommerce-product-search .wc-block-product-search__fields .wc-block-product-search__button:hover:before,
            .widget_product_categories ul > li:hover,
            .widget_product_categories ul li:hover > a,
            .content-wrapper .widget_layered_nav ul li:hover,
            .content-wrapper .widget_layered_nav ul li:hover a,
            .woocommerce .woocommerce-cart-form table.shop_table .product-name a:hover, 
            .woocommerce-page .woocommerce-cart-form table.shop_table .product-name a:hover,
            .woocommerce-checkout-review-order .checkout_cart_table .product-name .product-name-title a:hover,
            .woocommerce-account .woocommerce-MyAccount-navigation ul li:not(.is-active) a:hover,
            .woocommerce .woocommerce-table--order-details .product-name a:hover,
            .woocommerce .woocommerce-table--order-details .amount,
            .widget div[class*="wp-block-"] .wc-block-review-list-item__item .wc-block-review-list-item__meta a:hover,           
            .single-product.woocommerce div.product .product_meta .product_meta_item.tagged_as a:hover,
            .woocommerce .woocommerce-terms-and-conditions-wrapper a:hover, 
            .woocommerce-page .woocommerce-terms-and-conditions-wrapper a:hover,
            .woocommerce .outer-form-wrapper form.login a:hover, 
            .woocommerce .outer-form-wrapper form.register a:hover,
            .woocommerce-account .form-attention span:hover,
            .woocommerce-account .form-attention a:hover,
            .content-wrapper .woocommerce-error a:hover, 
            .content-wrapper .woocommerce-info a:hover, 
            .content-wrapper .woocommerce-message a:hover {
                color: ' . esc_attr($standard_accent_text_color) . ';
            }
            .woocommerce-checkout .content h3:before,
            .woocommerce-account .woocommerce-MyAccount-content h3:before,
            .content-wrapper .widget_price_filter .price_slider_wrapper .ui-slider .ui-slider-handle:before,
            .widget div[class*="wp-block-"] .wc-block-review-list-item__item:hover:before,            
            .woocommerce .quantity-wrapper.styled .btn-plus:hover .icon:before, 
            .woocommerce .quantity-wrapper.styled .btn-plus:hover .icon:after, 
            .woocommerce .quantity-wrapper.styled .btn-minus:hover .icon:before,
            .woocommerce .quantity-wrapper.styled .btn-minus:hover .icon:after {
                background-color: ' . esc_attr($standard_accent_text_color) . ';
            }
        ';
    }

    $standard_contrast_text_color = aiero_get_prefered_option('standard_contrast_text_color');
    if ( !empty($standard_contrast_text_color) ) {
        $aiero_custom_css .= '
            .woocommerce a.button,
            .woocommerce a.added_to_cart,
            .single-product.woocommerce div.product .cart .added_to_cart:hover,
            .woocommerce button.button,
            .woocommerce input.button,
            .woocommerce #respond input#submit,
            .woocommerce a.button.alt,
            .woocommerce button.button.alt,
            .woocommerce input.button.alt,
            .woocommerce #respond input#submit.alt,
            .woocommerce a.button.alt.disabled, 
            .woocommerce a.button.alt.disabled:hover, 
            .woocommerce a.button.alt:disabled, 
            .woocommerce a.button.alt:disabled:hover, 
            .woocommerce a.button.alt:disabled[disabled], 
            .woocommerce a.button.alt:disabled[disabled]:hover, 
            .woocommerce button.button.alt.disabled, 
            .woocommerce button.button.alt.disabled:hover, 
            .woocommerce button.button.alt:disabled, 
            .woocommerce button.button.alt:disabled:hover, 
            .woocommerce button.button.alt:disabled[disabled], 
            .woocommerce button.button.alt:disabled[disabled]:hover, 
            .woocommerce input.button.alt.disabled, 
            .woocommerce input.button.alt.disabled:hover, 
            .woocommerce input.button.alt:disabled, 
            .woocommerce input.button.alt:disabled:hover, 
            .woocommerce input.button.alt:disabled[disabled], 
            .woocommerce input.button.alt:disabled[disabled]:hover,
            .woocommerce #respond input#submit.alt.disabled, 
            .woocommerce #respond input#submit.alt.disabled:hover, 
            .woocommerce #respond input#submit.alt:disabled, 
            .woocommerce #respond input#submit.alt:disabled:hover, 
            .woocommerce #respond input#submit.alt:disabled[disabled], 
            .woocommerce #respond input#submit.alt:disabled[disabled]:hover,
            .woocommerce a.button.disabled, 
            .woocommerce a.button.disabled:hover, 
            .woocommerce a.button:disabled, 
            .woocommerce a.button:disabled:hover, 
            .woocommerce a.button:disabled[disabled], 
            .woocommerce a.button:disabled[disabled]:hover, 
            .woocommerce button.button.disabled, 
            .woocommerce button.button.disabled:hover, 
            .woocommerce button.button:disabled, 
            .woocommerce button.button:disabled:hover, 
            .woocommerce button.button:disabled[disabled], 
            .woocommerce button.button:disabled[disabled]:hover, 
            .woocommerce input.button.disabled, 
            .woocommerce input.button.disabled:hover, 
            .woocommerce input.button:disabled, 
            .woocommerce input.button:disabled:hover, 
            .woocommerce input.button:disabled[disabled], 
            .woocommerce input.button:disabled[disabled]:hover,
            .woocommerce #respond input#submit.disabled, 
            .woocommerce #respond input#submit.disabled:hover, 
            .woocommerce #respond input#submit:disabled, 
            .woocommerce #respond input#submit:disabled:hover, 
            .woocommerce #respond input#submit:disabled[disabled], 
            .woocommerce #respond input#submit:disabled[disabled]:hover,           
            .wc-block-grid__products .wc-block-grid__product .wp-block-button .wp-block-button__link,            
            .wc-block-price-slider .wc-block-price-filter__button.wc-block-components-price-slider__button,
            .wc-block-price-slider .wc-block-components-price-slider__actions .wc-block-components-filter-reset-button,
            .woocommerce div.product .woocommerce-tabs ul.tabs li.active a,
            .woocommerce div.product .woocommerce-tabs ul.tabs li.active a:hover,
            .woocommerce .woocommerce-MyAccount-content table.shop_table thead th,             
            .woocommerce-page .woocommerce-MyAccount-content table.shop_table thead th {
                color: ' . esc_attr($standard_contrast_text_color) . ';
            }
        ';
    }

    $standard_border_color = aiero_get_prefered_option('standard_border_color');
    if ( !empty($standard_border_color) ) {
        $aiero_custom_css .= '
            .woocommerce form .form-row .input-text, 
            .woocommerce form .form-row select,
            .mobile-header .mini-cart .mini-cart-panel .cart_list li,
            .mobile-header .mini-cart .mini-cart-panel .cart_list li .thumbnail-woocommerce_wrapper img,
            .mobile-header-menu-container .mini-cart .mini-cart-panel .cart_list li,
            .mobile-header-menu-container .mini-cart .mini-cart-panel .cart_list li .thumbnail-woocommerce_wrapper img,
            .content-wrapper .widget ul.product_list_widget li a img,
            .content-wrapper .widget_shopping_cart .total,
            .header .mini-cart .mini-cart-panel .total,
            .checkout_cart_table .product-thumbnail a img,
            .woocommerce form.checkout_coupon, 
            .woocommerce form.login, 
            .woocommerce form.register,
            .woocommerce .woocommerce-cart-form table.shop_table img, 
            .woocommerce-page .woocommerce-cart-form table.shop_table img,
            .woocommerce .woocommerce-cart-form table.shop_table td.actions .coupon .input-text, 
            .woocommerce-page .woocommerce-cart-form table.shop_table td.actions .coupon .input-text, 
            .single-product.woocommerce div.product .woocommerce-product-gallery .flex-viewport, 
            .single-product.woocommerce div.product .woocommerce-product-gallery .flex-control-nav.flex-control-thumbs li img,
            .widget_shopping_cart .cart_list li:not(:first-child),
            .header .mini-cart .mini-cart-panel .cart_list li:not(:first-child),
            .woocommerce #reviews #comments ol.commentlist li.review,
            .woocommerce .cart-collaterals .cart_totals, 
            .woocommerce-page .cart-collaterals .cart_totals,
            .woocommerce ul.order_details li:not(:first-child),
            .woocommerce .woocommerce-order table.shop_table td, 
            .woocommerce .woocommerce-order table.shop_table tbody th, 
            .woocommerce .woocommerce-order table.shop_table tfoot th, 
            .woocommerce .woocommerce-MyAccount-content table.shop_table td, 
            .woocommerce .woocommerce-MyAccount-content table.shop_table tbody th, 
            .woocommerce .woocommerce-MyAccount-content table.shop_table tfoot th, 
            .woocommerce-page .woocommerce-order table.shop_table td, 
            .woocommerce-page .woocommerce-order table.shop_table tbody th, 
            .woocommerce-page .woocommerce-order table.shop_table tfoot th, 
            .woocommerce-page .woocommerce-MyAccount-content table.shop_table td, 
            .woocommerce-page .woocommerce-MyAccount-content table.shop_table tbody th, 
            .woocommerce-page .woocommerce-MyAccount-content table.shop_table tfoot th,
            .woocommerce .woocommerce-order table.shop_table, 
            .woocommerce .woocommerce-MyAccount-content table.shop_table,
            .woocommerce-page .woocommerce-order table.shop_table, 
            .woocommerce-page .woocommerce-MyAccount-content table.shop_table,
            .woocommerce .woocommerce-order table.woocommerce-table--order-details tfoot tr:first-child th, 
            .woocommerce .woocommerce-order table.woocommerce-table--order-details tfoot tr:first-child td, 
            .woocommerce-page .woocommerce-order table.woocommerce-table--order-details tfoot tr:first-child th, 
            .woocommerce-page .woocommerce-order table.woocommerce-table--order-details tfoot tr:first-child td,
            .woocommerce-account .woocommerce-EditAccountForm fieldset,
            .widget div[class*="wp-block-"].has-content .wc-block-review-list-item__item:not(:first-child),
            .shop_mode_grid .woocommerce ul.products li.product .woocommerce-loop-product__wrapper:before, 
            .woocommerce .shop_mode_grid ul.products li.product .woocommerce-loop-product__wrapper:before, 
            .woocommerce-page .shop_mode_grid .woocommerce ul.products li.product .woocommerce-loop-product__wrapper:before, 
            .woocommerce-page .shop_mode_grid ul.products li.product .woocommerce-loop-product__wrapper:before,
            .woocommerce .catalog-top-info-wrapper .woocommerce-ordering select {
                border-color: ' . esc_attr($standard_border_color) . ';
            }
            .content-wrapper .widget_price_filter .price_slider_wrapper .ui-widget-content {
                background-color: ' . esc_attr($standard_border_color) . ';
            }
        ';
    }

    $standard_border_hover_color = aiero_get_prefered_option('standard_border_hover_color');
    if ( !empty($standard_border_hover_color) ) {
        $aiero_custom_css .= '
            .woocommerce form .form-row .input-text:focus, 
            .woocommerce form .form-row select:focus,
            .content-wrapper .widget ul.product_list_widget li a:hover img,
            .woocommerce .shop_mode_list .woocommerce-loop-product__wrapper:hover, 
            .woocommerce-page .shop_mode_list .woocommerce-loop-product__wrapper:hover,
            .checkout_cart_table .product-thumbnail a:hover img,
            .woocommerce .woocommerce-cart-form table.shop_table a:hover img, 
            .woocommerce-page .woocommerce-cart-form table.shop_table a:hover img,
            .woocommerce .quantity-wrapper .quantity,
            .woocommerce .quantity-wrapper.styled .btn-plus, 
            .woocommerce .quantity-wrapper.styled .btn-minus,
            .single-product.woocommerce div.product .product_meta .tagged_as a,
            .single-product.woocommerce div.product .woocommerce-product-gallery .flex-control-nav.flex-control-thumbs li img.flex-active,
            .products-widget ul.products li.product .woocommerce-loop-product__wrapper .attachment-woocommerce_wrapper .attachment-woocommerce_link,
            .woocommerce .shop_mode_grid ul.products li.product .woocommerce-loop-product__wrapper .attachment-woocommerce_wrapper .attachment-woocommerce_link,
            .woocommerce-page .shop_mode_grid ul.products li.product .woocommerce-loop-product__wrapper .attachment-woocommerce_wrapper .attachment-woocommerce_link,
            .wc-block-grid__product .wc-block-grid__product-image:before,
            .content-wrapper .widget_product_search .woocommerce-product-search .search-field,
            .content-wrapper .wp-block-woocommerce-product-search .wc-block-product-search__fields .wc-block-product-search__field,
            .content-wrapper .widget_rating_filter ul li a:before,
            .content-wrapper .widget_layered_nav ul li a:before,
            .woocommerce .woocommerce-cart-form table.shop_table td.actions .coupon .input-text:focus, 
            .woocommerce-page .woocommerce-cart-form table.shop_table td.actions .coupon .input-text:focus,
            .woocommerce .catalog-top-info-wrapper .woocommerce-ordering select:focus {
                border-color: ' . esc_attr($standard_border_hover_color) . ';
            }
            .content-wrapper .widget_product_search .woocommerce-product-search .search-field,
            .content-wrapper .wp-block-woocommerce-product-search .wc-block-product-search__fields .wc-block-product-search__field,
            .content-wrapper .widget_rating_filter ul li a:before,
            .content-wrapper .widget_layered_nav ul li a:before,
            .content-wrapper .widget_layered_nav_filters ul .chosen a,            
            .woocommerce .woocommerce-order table.shop_table thead th, 
            .woocommerce .woocommerce-MyAccount-content table.shop_table thead th, 
            .woocommerce-page .woocommerce-order table.shop_table thead th, 
            .woocommerce-page .woocommerce-MyAccount-content table.shop_table thead th,
            .woocommerce .woocommerce-customer-details address {
                background-color: ' . esc_attr($standard_border_hover_color) . ';
            }
        ';
    }

    $standard_background_color = aiero_get_prefered_option('standard_background_color');
    if ( !empty($standard_background_color) ) {
        $aiero_custom_css .= '
            .header .mini-cart .mini-cart-panel,
            .woocommerce .shop_mode_list .woocommerce-loop-product__wrapper, 
            .woocommerce-page .shop_mode_list .woocommerce-loop-product__wrapper,
            .content-wrapper .widget_price_filter .price_slider_wrapper .ui-slider .ui-slider-handle,
            .shop_mode_grid .woocommerce ul.products li.product .woocommerce-loop-product__wrapper, 
            .woocommerce .shop_mode_grid ul.products li.product .woocommerce-loop-product__wrapper, 
            .woocommerce-page .shop_mode_grid .woocommerce ul.products li.product .woocommerce-loop-product__wrapper, 
            .woocommerce-page .shop_mode_grid ul.products li.product .woocommerce-loop-product__wrapper,
            .shop_mode_grid .woocommerce ul.products li.product .woocommerce-loop-product__wrapper .product-buttons, 
            .woocommerce .shop_mode_grid ul.products li.product .woocommerce-loop-product__wrapper .product-buttons, 
            .woocommerce-page .shop_mode_grid .woocommerce ul.products li.product .woocommerce-loop-product__wrapper .product-buttons, 
            .woocommerce-page .shop_mode_grid ul.products li.product .woocommerce-loop-product__wrapper .product-buttons,
            .single-product.woocommerce div.product .woocommerce-product-gallery .attachment-woocommerce_flash-inner,
            .woocommerce form .form-row .input-text, 
            .woocommerce form .form-row select {
                background-color: ' . esc_attr($standard_background_color) . ';
            }
            .wp-block-woocommerce-price-filter .wc-block-components-price-slider__range-input::-webkit-slider-thumb {
                background-color: ' . esc_attr($standard_background_color) . ';
            }
            .wp-block-woocommerce-price-filter .wc-block-components-price-slider__range-input::-moz-range-thumb {
                background-color: ' . esc_attr($standard_background_color) . ';
            }
            .wp-block-woocommerce-price-filter .wc-block-components-price-slider__range-input::-ms-thumb {
                background-color: ' . esc_attr($standard_background_color) . ';
            }
            .wp-block-woocommerce-price-filter .wc-block-components-price-slider__range-input:focus::-ms-thumb {
                background-color: ' . esc_attr($standard_background_color) . ';
            }
            .wp-block-woocommerce-price-filter .wc-block-components-price-slider__range-input::-webkit-slider-thumb:hover {
                background-color: ' . esc_attr($standard_background_color) . ';
            }
            .wp-block-woocommerce-price-filter .wc-block-components-price-slider__range-input::-moz-range-thumb:hover {
                background-color: ' . esc_attr($standard_background_color) . ';
            }
            .wp-block-woocommerce-price-filter .wc-block-components-price-slider__range-input::-ms-thumb:hover {
                background-color: ' . esc_attr($standard_background_color) . ';
            }
            .wp-block-woocommerce-price-filter .wc-block-components-price-slider__range-input:focus::-ms-thumb:hover {
                background-color: ' . esc_attr($standard_background_color) . ';
            }
            .wp-block-woocommerce-price-filter .wc-block-components-price-slider__range-input:focus::-webkit-slider-thumb {
                background-color: ' . esc_attr($standard_background_color) . ';
            }
            .wp-block-woocommerce-price-filter .wc-block-components-price-slider__range-input:focus::-moz-range-thumb {
                background-color: ' . esc_attr($standard_background_color) . ';
            }
            .wp-block-woocommerce-price-filter .wc-block-components-price-slider__range-input:focus::-ms-thumb {
                background-color: ' . esc_attr($standard_background_color) . ';
            }
            .shop_mode_grid .woocommerce ul.products li.product .product-buttons-wrapper:before, 
            .woocommerce .shop_mode_grid ul.products li.product .product-buttons-wrapper:before, 
            .woocommerce-page .shop_mode_grid .woocommerce ul.products li.product .product-buttons-wrapper:before, 
            .woocommerce-page .shop_mode_grid ul.products li.product .product-buttons-wrapper:before,
            .shop_mode_grid .woocommerce ul.products li.product .product-buttons-wrapper:after, 
            .woocommerce .shop_mode_grid ul.products li.product .product-buttons-wrapper:after, 
            .woocommerce-page .shop_mode_grid .woocommerce ul.products li.product .product-buttons-wrapper:after, 
            .woocommerce-page .shop_mode_grid ul.products li.product .product-buttons-wrapper:after {
                box-shadow: 0 20px 0 0 ' . esc_attr($standard_background_color) . ';
            }
            .single-product.woocommerce div.product .woocommerce-product-gallery .attachment-woocommerce_flash:before,
            .single-product.woocommerce div.product .woocommerce-product-gallery .attachment-woocommerce_flash:after {
                box-shadow: 0 -20px 0 0 ' . esc_attr($standard_background_color) . ';
            }
        ';
    }

    $standard_background_alter_color = aiero_get_prefered_option('standard_background_alter_color');
    if ( !empty($standard_background_alter_color) ) {
        $aiero_custom_css .= '
            #add_payment_method #payment div.payment_box, 
            .woocommerce-cart #payment div.payment_box, 
            .woocommerce-checkout #payment div.payment_box,
            .content-wrapper .wc-block-product-categories,
            .woocommerce div.product .woocommerce-tabs ul.tabs,
            .woocommerce #review_form_wrapper,
            .woocommerce .cart-collaterals .cart_totals, 
            .woocommerce-page .cart-collaterals .cart_totals,
            .woocommerce-checkout-review-order .review-order-wrapper,
            .woocommerce-account .woocommerce-MyAccount-navigation ul,
            .woocommerce .cart-collaterals .cart_totals .shipping-calculator-form input, 
            .woocommerce-page .cart-collaterals .cart_totals .shipping-calculator-form input,
            .woocommerce .cart-collaterals .cart_totals .shipping-calculator-form .select2-container .select2-selection--single, 
            .woocommerce-page .cart-collaterals .cart_totals .shipping-calculator-form .select2-container .select2-selection--single,
            .woocommerce .cart-collaterals .cart_totals .shipping-calculator-form .floating-placeholder, 
            .woocommerce-page .cart-collaterals .cart_totals .shipping-calculator-form .floating-placeholder {
                background-color: ' . esc_attr($standard_background_alter_color) . ';
            }
            #add_payment_method #payment div.payment_box:before, 
            .woocommerce-cart #payment div.payment_box:before, 
            .woocommerce-checkout #payment div.payment_box:before {
                color: ' . esc_attr($standard_background_alter_color) . ';
            }
        ';
    }

    $standard_button_text_color = aiero_get_prefered_option('standard_button_text_color');
    if ( !empty($standard_button_text_color) ) {
        $aiero_custom_css .= '            
            .content-wrapper .widget_price_filter .price_slider_amount .button:hover,
            .content-wrapper .widget_rating_filter ul li a:after,
            .content-wrapper .widget_layered_nav ul li a:after,
            .mini-cart .mini-cart-panel .woocommerce-mini-cart-buttons a.button:not(.checkout),
            .woocommerce-account .woocommerce-MyAccount-navigation ul li.is-active a,
            .woocommerce-pagination .page-numbers,
            .woocommerce-pagination .post-page-numbers,
            .woocommerce .woocommerce-cart-form table.shop_table td.actions .button, 
            .woocommerce-page .woocommerce-cart-form table.shop_table td.actions .button,
            .woocommerce .outer-form-wrapper .button {
                color: ' . esc_attr($standard_button_text_color) . ';
            }
        ';
    }

    $standard_button_border_style = aiero_get_prefered_option('standard_button_border_style');
    if ( $standard_button_border_style == 'solid' ) {
        $aiero_custom_css .= '
            .woocommerce-pagination .page-numbers .button-inner, 
            .woocommerce-pagination .post-page-numbers .button-inner,
            .mini-cart .mini-cart-panel .woocommerce-mini-cart-buttons a.button:not(.checkout) .button-inner,
            .woocommerce .woocommerce-cart-form table.shop_table td.actions .button .button-inner, 
            .woocommerce-page .woocommerce-cart-form table.shop_table td.actions .button .button-inner,
            .woocommerce .outer-form-wrapper .button .button-inner {
                top: 0;
                left: 0;
                right: 0;
                bottom: 0;
            }
        ';
    }

    $standard_button_border_color = aiero_get_prefered_option('standard_button_border_color');
    $standard_button_border_color_add = aiero_get_prefered_option('standard_button_border_color_add');
    if( $standard_button_border_style == 'gradient' && ( !empty($standard_button_border_color) && !empty($standard_button_border_color_add) )) {
        $aiero_custom_css .= '
            .woocommerce-pagination .page-numbers:after, 
            .woocommerce-pagination .post-page-numbers:after,
            .mini-cart .mini-cart-panel .woocommerce-mini-cart-buttons a.button:not(.checkout):after,
            .single-product.woocommerce div.product .product_meta-wrapper:before,
            .woocommerce .woocommerce-cart-form table.shop_table td.actions .button:after, 
            .woocommerce-page .woocommerce-cart-form table.shop_table td.actions .button:after,
            .woocommerce .outer-form-wrapper .button:after {
                background: linear-gradient(var(--button-border-gradient-angle), ' . esc_attr($standard_button_border_color) . ' var(--button-gradient-colorstop-1), ' . esc_attr($standard_button_border_color_add) . ' var(--button-gradient-colorstop-2));
            }
        ';
    } elseif ( $standard_button_border_style == 'solid' && !empty($standard_button_border_color)) {
        $aiero_custom_css .= '     
            .woocommerce-pagination .page-numbers, 
            .woocommerce-pagination .post-page-numbers,
            .mini-cart .mini-cart-panel .woocommerce-mini-cart-buttons a.button:not(.checkout),
            .woocommerce .woocommerce-cart-form table.shop_table td.actions .button, 
            .woocommerce-page .woocommerce-cart-form table.shop_table td.actions .button,
            .woocommerce .outer-form-wrapper .button {
                border-color: ' . esc_attr($standard_button_border_color) . ';
            }
            .single-product.woocommerce div.product .product_meta-wrapper:before {
                background-color: ' . esc_attr($standard_button_border_color) . ';
            }
        ';
    }

    if( !empty($standard_button_border_color) && !empty($standard_button_border_color_add) ) {
        $aiero_custom_css .= '
            .single-product.woocommerce .content-wrapper .woocommerce-tabs .panel:before,
            .woocommerce .woocommerce-cart-form table.shop_table thead tr:after, 
            .woocommerce-page .woocommerce-cart-form table.shop_table thead tr:after,
            .woocommerce .woocommerce-checkout h3:before, 
            .woocommerce-page .woocommerce-checkout h3:before,            
            .woocommerce .outer-form-wrapper h5:before {
                background: linear-gradient(var(--button-border-gradient-angle), ' . esc_attr($standard_button_border_color) . ' var(--button-gradient-colorstop-1), ' . esc_attr($standard_button_border_color_add) . ' var(--button-gradient-colorstop-2));
            }
        ';
    }

    if ( !empty($standard_button_border_color) ) {
        $aiero_custom_css .= '
            .content-wrapper .widget_rating_filter ul li.chosen a:before,
            .content-wrapper .widget_layered_nav ul li.chosen a:before {
                border-color: ' . esc_attr($standard_button_border_color) . ';
            }
            .content-wrapper .widget_rating_filter ul li.chosen a:before,
            .content-wrapper .widget_layered_nav ul li.chosen a:before {
                background-color: ' . esc_attr($standard_button_border_color) . ';
            }
        ';
    }

    $standard_button_background_style = aiero_get_prefered_option('standard_button_background_style');
    $standard_button_background_color = aiero_get_prefered_option('standard_button_background_color');
    $standard_button_background_color_add = aiero_get_prefered_option('standard_button_background_color_add');
    if( $standard_button_background_style == 'gradient' && ( !empty($standard_button_background_color) && !empty($standard_button_background_color_add) )) {
        $aiero_custom_css .= '
            .woocommerce-pagination .page-numbers .button-inner:before, 
            .woocommerce-pagination .post-page-numbers .button-inner:before,
            .mini-cart .mini-cart-panel .woocommerce-mini-cart-buttons a.button:not(.checkout) .button-inner:before,
            .woocommerce .woocommerce-cart-form table.shop_table td.actions .button .button-inner:before, 
            .woocommerce-page .woocommerce-cart-form table.shop_table td.actions .button .button-inner:before,
            .woocommerce .outer-form-wrapper .button .button-inner:before {
                background: linear-gradient(var(--button-border-gradient-angle), ' . esc_attr($standard_button_background_color) . ' var(--button-gradient-colorstop-1), ' . esc_attr($standard_button_background_color_add) . ' var(--button-gradient-colorstop-2));
            }
            .mini-cart .mini-cart-panel .woocommerce-mini-cart-buttons a.button:not(.checkout),
            .woocommerce .woocommerce-cart-form table.shop_table td.actions .button, 
            .woocommerce-page .woocommerce-cart-form table.shop_table td.actions .button,
            .woocommerce .outer-form-wrapper .button {
            	background: none;
            }
        ';
    } elseif ( $standard_button_background_style == 'solid' && !empty($standard_button_background_color)) {
        $aiero_custom_css .= '
            .woocommerce-pagination .page-numbers, 
            .woocommerce-pagination .post-page-numbers,
            .mini-cart .mini-cart-panel .woocommerce-mini-cart-buttons a.button:not(.checkout),
            .woocommerce .woocommerce-cart-form table.shop_table td.actions .button, 
            .woocommerce-page .woocommerce-cart-form table.shop_table td.actions .button,
            .woocommerce .outer-form-wrapper .button {
                background-color: ' . esc_attr($standard_button_background_color) . ';
            }
        ';
    }

    if ( !empty($standard_button_background_color) ) {
        $aiero_custom_css .= '
            .content-wrapper .widget_price_filter .price_slider_wrapper .ui-slider .ui-slider-range,
            .woocommerce-account .woocommerce-MyAccount-navigation ul li.is-active a {
                background-color: ' . esc_attr($standard_button_background_color) . ';
            }
        ';
    }

    $standard_button_text_hover = aiero_get_prefered_option('standard_button_text_hover');
    if ( !empty($standard_button_text_hover) ) {
        $aiero_custom_css .= '
            .woocommerce a.button:hover,
            .woocommerce a.added_to_cart:hover,            
            .woocommerce button.button:hover,
            .woocommerce input.button:hover,
            .woocommerce #respond input#submit:hover,
            .woocommerce a.button.alt:hover,
            .woocommerce button.button.alt:hover,
            .woocommerce input.button.alt:hover,
            .woocommerce #respond input#submit.alt:hover,
            .single-product.woocommerce div.product .cart .added_to_cart,
            .content-wrapper .widget_price_filter .price_slider_amount .button,
            .mini-cart .mini-cart-panel .woocommerce-mini-cart-buttons a.button:not(.checkout):hover,
            .content-wrapper .widget_layered_nav_filters ul .chosen a:hover,
            .woocommerce-pagination .page-numbers.current,
            .woocommerce-pagination .page-numbers:hover,
            .woocommerce-pagination .post-page-numbers.current,
            .woocommerce-pagination .post-page-numbers:hover,            
            .wc-block-grid__products .wc-block-grid__product .wp-block-button .wp-block-button__link:hover,
            .wc-block-price-slider .wc-block-price-filter__button.wc-block-components-price-slider__button:hover,
            .wc-block-price-slider .wc-block-components-price-slider__actions .wc-block-components-filter-reset-button:hover,
            .woocommerce .woocommerce-cart-form table.shop_table td.actions .button:not(:disabled):hover, 
            .woocommerce-page .woocommerce-cart-form table.shop_table td.actions .button:not(:disabled):hover,
            .single-product.woocommerce div.product .cart .single_add_to_cart_button:hover,
            .woocommerce .cart-collaterals .cart_totals .wc-proceed-to-checkout .button:hover, 
            .woocommerce-page .cart-collaterals .cart_totals .wc-proceed-to-checkout .button:hover,
            .woocommerce .outer-form-wrapper .button:hover {
                color: ' . esc_attr($standard_button_text_hover) . ';
            }
        ';
    }

    $standard_button_border_hover = aiero_get_prefered_option('standard_button_border_hover');
    $standard_button_border_hover_add = aiero_get_prefered_option('standard_button_border_hover_add');
    if( $standard_button_border_style == 'gradient' && ( !empty($standard_button_border_hover) && !empty($standard_button_border_hover_add) )) {
        $aiero_custom_css .= '
            .woocommerce-pagination a.page-numbers:hover:after, 
            .woocommerce-pagination a.post-page-numbers:hover:after,
            .woocommerce-pagination .page-numbers.current:after, 
            .woocommerce-pagination .post-page-numbers.current:after,
            .mini-cart .mini-cart-panel .woocommerce-mini-cart-buttons a.button:not(.checkout):hover:after,
            .woocommerce .woocommerce-cart-form table.shop_table td.actions .button:hover:after, 
            .woocommerce-page .woocommerce-cart-form table.shop_table td.actions .button:hover:after,
            .woocommerce .outer-form-wrapper .button .button-inner:after {
                background: linear-gradient(var(--button-border-gradient-angle), ' . esc_attr($standard_button_border_hover) . ' var(--button-gradient-colorstop-1), ' . esc_attr($standard_button_border_hover_add) . ' var(--button-gradient-colorstop-2));
            }
        ';
    } elseif ( $standard_button_border_style == 'solid' && !empty($standard_button_border_hover)) {
        $aiero_custom_css .= '
            .woocommerce-pagination a.page-numbers:hover, 
            .woocommerce-pagination a.post-page-numbers:hover,
            .woocommerce-pagination .page-numbers.current, 
            .woocommerce-pagination .post-page-numbers.current,
            .mini-cart .mini-cart-panel .woocommerce-mini-cart-buttons a.button:not(.checkout):hover,
            .woocommerce .woocommerce-cart-form table.shop_table td.actions .button:not(:disabled):hover, 
            .woocommerce-page .woocommerce-cart-form table.shop_table td.actions .button:not(:disabled):hover,
            .woocommerce .outer-form-wrapper .button:hover {
                border-color: ' . esc_attr($standard_button_border_hover) . ';
            }
        ';
    }

    if ( !empty($standard_button_border_hover) ) {
        $aiero_custom_css .= '';
    }

    $standard_button_background_style = aiero_get_prefered_option('standard_button_background_style');
    $standard_button_background_hover = aiero_get_prefered_option('standard_button_background_hover');
    $standard_button_background_hover_add = aiero_get_prefered_option('standard_button_background_hover_add');
    if( $standard_button_background_style == 'gradient' && ( !empty($standard_button_background_hover) && !empty($standard_button_background_hover_add) )) {
        $aiero_custom_css .= '
            .woocommerce-pagination .page-numbers .button-inner:after, 
            .woocommerce-pagination .post-page-numbers .button-inner:after,
            .mini-cart .mini-cart-panel .woocommerce-mini-cart-buttons a.button:not(.checkout) .button-inner:after,
            .mini-cart .mini-cart-panel .woocommerce-mini-cart-buttons a.button.checkout .button-inner:after,
            .woocommerce .woocommerce-cart-form table.shop_table td.actions .button .button-inner:after, 
            .woocommerce-page .woocommerce-cart-form table.shop_table td.actions .button .button-inner:after,
            ul.products li.product .woocommerce-loop-product__wrapper .product-buttons-wrapper a.button .button-inner:after,
            .single-product.woocommerce div.product .cart .single_add_to_cart_button .button-inner:after,
            .single-product.woocommerce div.product .cart .added_to_cart,
            .wc-block-price-slider .wc-block-price-filter__button.wc-block-components-price-slider__button:before,
            .wc-block-price-slider .wc-block-components-price-slider__actions .wc-block-components-filter-reset-button:before,
            .woocommerce .cart-collaterals .cart_totals .wc-proceed-to-checkout .button .button-inner:after, 
            .woocommerce-page .cart-collaterals .cart_totals .wc-proceed-to-checkout .button .button-inner:after,
            .woocommerce #payment #place_order .button-inner:after, 
            .woocommerce-page #payment #place_order .button-inner:after,
            .woocommerce .outer-form-wrapper .button .button-inner:after {
                background: linear-gradient(var(--button-border-gradient-angle), ' . esc_attr($standard_button_background_hover) . ' var(--button-gradient-colorstop-1), ' . esc_attr($standard_button_background_hover_add) . ' var(--button-gradient-colorstop-2));
            }
            .single-product.woocommerce div.product .cart .single_add_to_cart_button:hover,
            .wc-block-price-slider .wc-block-price-filter__button.wc-block-components-price-slider__button:hover,
            .wc-block-price-slider .wc-block-components-price-slider__actions .wc-block-components-filter-reset-button:hover,
            .woocommerce #payment #place_order:hover, 
            .woocommerce-page #payment #place_order:hover {
            	background-image: none;
            }
            .woocommerce .outer-form-wrapper .button:hover {
            	background: none;
            }
        ';
    } elseif ( $standard_button_background_style == 'solid' && !empty($standard_button_background_hover)) {
        $aiero_custom_css .= '
            .woocommerce-pagination .page-numbers.current, 
            .woocommerce-pagination .post-page-numbers.current,
            .woocommerce-pagination .page-numbers:hover, 
            .woocommerce-pagination .post-page-numbers:hover,
            .mini-cart .mini-cart-panel .woocommerce-mini-cart-buttons a.button:not(.checkout):hover,
            .mini-cart .mini-cart-panel .woocommerce-mini-cart-buttons a.button.checkout:hover,
            .woocommerce .woocommerce-cart-form table.shop_table td.actions .button:not(:disabled):hover, 
            .woocommerce-page .woocommerce-cart-form table.shop_table td.actions .button:not(:disabled):hover,
            ul.products li.product .woocommerce-loop-product__wrapper .product-buttons-wrapper a.button:hover,
            .single-product.woocommerce div.product .cart .single_add_to_cart_button:hover,
            .wc-block-price-slider .wc-block-price-filter__button.wc-block-components-price-slider__button:hover,
            .wc-block-price-slider .wc-block-components-price-slider__actions .wc-block-components-filter-reset-button:hover,
            .woocommerce .cart-collaterals .cart_totals .wc-proceed-to-checkout .button:hover, 
            .woocommerce-page .cart-collaterals .cart_totals .wc-proceed-to-checkout .button:hover,
            .woocommerce #payment #place_order:hover, 
            .woocommerce-page #payment #place_order:hover,
            .woocommerce .outer-form-wrapper .button:hover {
                background-color: ' . esc_attr($standard_button_background_hover) . ';
            }
        ';
    }

    if ( !empty($standard_button_background_hover) ) {
        $aiero_custom_css .= '
            .woocommerce a.button:hover, 
            .woocommerce a.add_to_cart_button:hover,
            .single-product.woocommerce div.product .cart .added_to_cart,
            .woocommerce button.button:hover,
            .woocommerce input.button:hover,
            .woocommerce #respond input#submit:hover,
            .woocommerce a.button.alt:hover, 
            .woocommerce button.button.alt:hover,
            .woocommerce input.button.alt:hover,
            .woocommerce #respond input#submit.alt:hover,
            .content-wrapper .widget_layered_nav_filters ul .chosen a:hover,
            .wc-block-grid__products .wc-block-grid__product .wp-block-button .wp-block-button__link:hover,
            .wc-block-price-slider .wc-block-price-filter__button.wc-block-components-price-slider__button:hover,
            .wc-block-price-slider .wc-block-components-price-slider__actions .wc-block-components-filter-reset-button:hover {
                background-color: ' . esc_attr($standard_button_background_hover) . ';
            }                        
            .wp-block-woocommerce-price-filter .wc-block-components-price-slider__range-input-progress {
                --range-color:  ' . esc_attr($standard_button_background_hover) . ';
            }
        ';
    }

    # Contrast Colors
    $contrast_default_text_color = aiero_get_prefered_option('contrast_default_text_color');
    if ( !empty($contrast_default_text_color) ) {
        $aiero_custom_css .= '
            .woocommerce-store-notice,
            .woocommerce-store-notice.demo_store {
                color: ' . esc_attr($contrast_default_text_color) . ';
            }
        ';
    }

    $contrast_dark_text_color = aiero_get_prefered_option('contrast_dark_text_color');
    if ( !empty($contrast_dark_text_color) ) {
        $aiero_custom_css .= '
            .slide-sidebar-wrapper .widget_product_search .woocommerce-product-search button,
            .slide-sidebar-wrapper .wp-block-woocommerce-product-search .wc-block-product-search__fields .wc-block-product-search__button,
            .slide-sidebar-wrapper .widget_product_categories .post-count,
            .slide-sidebar-wrapper ul.product_list_widget li .product-title,
            .wc-block-grid__product .wc-block-grid__product-onsale,
	    	.woocommerce .woocommerce-order table.shop_table thead th,
	    	.woocommerce-page .woocommerce-order table.shop_table thead th,
            .woocommerce .woocommerce-customer-details address,
            .woocommerce-store-notice .woocommerce-store-notice__dismiss-link:before,            
            .slide-sidebar-wrapper .wc-block-product-categories-list > .wc-block-product-categories-list-item:hover,
            .slide-sidebar-wrapper .wc-block-product-categories-list .wc-block-product-categories-list-item:hover > a,
            .slide-sidebar-wrapper .wc-block-product-categories-list > .wc-block-product-categories-list-item:hover > .wc-block-product-categories-list-item-count {
                color: ' . esc_attr($contrast_dark_text_color) . ';
            }
        ';
    }

    $contrast_light_text_color = aiero_get_prefered_option('contrast_light_text_color');
    if ( !empty($contrast_light_text_color) ) {
        $aiero_custom_css .= '
            .slide-sidebar-wrapper .widget_product_categories li.cat-item-hierarchical,
            .slide-sidebar-wrapper .wc-block-product-categories-list > .wc-block-product-categories-list-item,
            .slide-sidebar-wrapper .wc-block-product-categories-list > .wc-block-product-categories-list-item a,
            .slide-sidebar-wrapper .widget ul.product_list_widget li .price_wrapper del,
            .slide-sidebar-wrapper .widget div[class*="wp-block-"] .wc-block-review-list-item__item .wc-block-review-list-item__published-date,
            .slide-sidebar-wrapper .wc-block-grid__product .wc-block-grid__product-price .price_wrapper {
                color: ' . esc_attr($contrast_light_text_color) . ';
            }
        ';
    }

    $contrast_accent_text_color = aiero_get_prefered_option('contrast_accent_text_color');
    if ( !empty($contrast_accent_text_color) ) {
        $aiero_custom_css .= '
            .slide-sidebar-wrapper .wc-block-grid__product .wc-block-grid__product-price ins,
            .slide-sidebar-wrapper .widget ul.product_list_widget li .price_wrapper {
                color: ' . esc_attr($contrast_accent_text_color) . ';
            }
        ';
    }

    $contrast_border_color = aiero_get_prefered_option('contrast_border_color');
    if ( !empty($contrast_border_color) ) {
        $aiero_custom_css .= '
            .slide-sidebar-wrapper .widget ul.product_list_widget li a img,
            .slide-sidebar-wrapper .widget div[class*="wp-block-"].has-content .wc-block-review-list-item__item:not(:first-child) {
                border-color: ' . esc_attr($contrast_border_color) . ';
            }
        ';
    }

    $contrast_border_hover_color = aiero_get_prefered_option('contrast_border_hover_color');
    if ( !empty($contrast_border_hover_color) ) {
        $aiero_custom_css .= '
            .slide-sidebar-wrapper .widget ul.product_list_widget li a:hover img {
                border-color: ' . esc_attr($contrast_border_hover_color) . ';
            }
        ';
    }

    $contrast_background_color = aiero_get_prefered_option('contrast_background_color');
    if ( !empty($contrast_background_color) ) {
        $aiero_custom_css .= '
        	.woocommerce a.button, 
            .woocommerce a.add_to_cart_button,
            .woocommerce button.button,
            .woocommerce input.button,
            .woocommerce #respond input#submit,
            .woocommerce a.button.alt, 
            .woocommerce button.button.alt,
            .woocommerce input.button.alt,
            .woocommerce #respond input#submit.alt,
            .woocommerce a.button.alt.disabled, 
            .woocommerce a.button.alt.disabled:hover, 
            .woocommerce a.button.alt:disabled, 
            .woocommerce a.button.alt:disabled:hover, 
            .woocommerce a.button.alt:disabled[disabled], 
            .woocommerce a.button.alt:disabled[disabled]:hover, 
            .woocommerce button.button.alt.disabled, 
            .woocommerce button.button.alt.disabled:hover, 
            .woocommerce button.button.alt:disabled, 
            .woocommerce button.button.alt:disabled:hover, 
            .woocommerce button.button.alt:disabled[disabled], 
            .woocommerce button.button.alt:disabled[disabled]:hover, 
            .woocommerce input.button.alt.disabled, 
            .woocommerce input.button.alt.disabled:hover, 
            .woocommerce input.button.alt:disabled, 
            .woocommerce input.button.alt:disabled:hover, 
            .woocommerce input.button.alt:disabled[disabled], 
            .woocommerce input.button.alt:disabled[disabled]:hover,
            .woocommerce #respond input#submit.alt.disabled, 
            .woocommerce #respond input#submit.alt.disabled:hover, 
            .woocommerce #respond input#submit.alt:disabled, 
            .woocommerce #respond input#submit.alt:disabled:hover, 
            .woocommerce #respond input#submit.alt:disabled[disabled], 
            .woocommerce #respond input#submit.alt:disabled[disabled]:hover,
            .woocommerce a.button.disabled, 
            .woocommerce a.button.disabled:hover, 
            .woocommerce a.button:disabled, 
            .woocommerce a.button:disabled:hover, 
            .woocommerce a.button:disabled[disabled], 
            .woocommerce a.button:disabled[disabled]:hover, 
            .woocommerce button.button.disabled, 
            .woocommerce button.button.disabled:hover, 
            .woocommerce button.button:disabled, 
            .woocommerce button.button:disabled:hover, 
            .woocommerce button.button:disabled[disabled], 
            .woocommerce button.button:disabled[disabled]:hover, 
            .woocommerce input.button.disabled, 
            .woocommerce input.button.disabled:hover, 
            .woocommerce input.button:disabled, 
            .woocommerce input.button:disabled:hover, 
            .woocommerce input.button:disabled[disabled], 
            .woocommerce input.button:disabled[disabled]:hover,
            .woocommerce #respond input#submit.disabled, 
            .woocommerce #respond input#submit.disabled:hover, 
            .woocommerce #respond input#submit:disabled, 
            .woocommerce #respond input#submit:disabled:hover, 
            .woocommerce #respond input#submit:disabled[disabled], 
            .woocommerce #respond input#submit:disabled[disabled]:hover,
            .wc-block-grid__products .wc-block-grid__product .wp-block-button .wp-block-button__link,            
            .wc-block-price-slider .wc-block-price-filter__button.wc-block-components-price-slider__button,
            .wc-block-price-slider .wc-block-price-filter__button.wc-block-components-price-slider__button:hover,
            .wc-block-price-slider .wc-block-components-price-slider__actions .wc-block-components-filter-reset-button,
            .wc-block-price-slider .wc-block-components-price-slider__actions .wc-block-components-filter-reset-button:hover,
            .woocommerce div.product .woocommerce-tabs ul.tabs li.active a,
            .woocommerce div.product .woocommerce-tabs ul.tabs li.active a:hover,
            .wc-block-grid__product .wc-block-grid__product-onsale,
            .woocommerce-store-notice,
            .woocommerce-store-notice.demo_store {
                background-color: ' . esc_attr($contrast_background_color) . ';
            }
        ';
    }

    $standard_button_background_style = aiero_get_prefered_option('standard_button_background_style');
    if( $standard_button_background_style == 'gradient' && ( !empty($contrast_background_color)) ) {
        $aiero_custom_css .= '
            ul.products li.product .woocommerce-loop-product__wrapper .product-buttons-wrapper a.button:hover,
            .single-product.woocommerce div.product .cart .single_add_to_cart_button:hover,
            .mini-cart .mini-cart-panel .woocommerce-mini-cart-buttons a.button.checkout:hover,
            .woocommerce .cart-collaterals .cart_totals .wc-proceed-to-checkout .button:hover, 
            .woocommerce-page .cart-collaterals .cart_totals .wc-proceed-to-checkout .button:hover,
            .woocommerce #payment #place_order:hover, 
            .woocommerce-page #payment #place_order:hover {
                background-color: ' . esc_attr($contrast_background_color) . ';
            }
        ';
    }

    $contrast_background_alter_color = aiero_get_prefered_option('contrast_background_alter_color');
    if ( !empty($contrast_background_alter_color) ) {
        $aiero_custom_css .= '            
            .slide-sidebar-wrapper .wc-block-product-categories {
                background-color: ' . esc_attr($contrast_background_alter_color) . ';
            }
            .single-product.woocommerce div.product .cart .buttons-wrapper .quantity-wrapper {
                border-color: ' . esc_attr($contrast_background_alter_color) . ';
            }
        ';
    }

    $contrast_button_text_color = aiero_get_prefered_option('contrast_button_text_color');
    if ( !empty($contrast_button_text_color) ) {
        $aiero_custom_css .= '
            .slide-sidebar-wrapper .woocommerce a.button,
            .woocommerce .slide-sidebar-wrapper a.button,
            .slide-sidebar-wrapper .woocommerce button.button,
            .woocommerce .slide-sidebar-wrapper button.button,
            .slide-sidebar-wrapper .woocommerce input.button,
            .woocommerce .slide-sidebar-wrapper input.button,
            .slide-sidebar-wrapper .woocommerce #respond input#submit,
            .woocommerce .slide-sidebar-wrapper #respond input#submit {
                color: ' . esc_attr($contrast_button_text_color) . ';
            }
        ';
    }

    $contrast_button_border_color = aiero_get_prefered_option('contrast_button_border_color');
    if ( !empty($contrast_button_border_color) ) {
        $aiero_custom_css .= '
            .slide-sidebar-wrapper .woocommerce a.button,
            .woocommerce .slide-sidebar-wrapper a.button,
            .slide-sidebar-wrapper .woocommerce button.button,
            .woocommerce .slide-sidebar-wrapper button.button,
            .slide-sidebar-wrapper .woocommerce input.button,
            .woocommerce .slide-sidebar-wrapper input.button,
            .slide-sidebar-wrapper .woocommerce #respond input#submit,
            .woocommerce .slide-sidebar-wrapper #respond input#submit {
                border-color: ' . esc_attr($contrast_button_border_color) . ';
            }
        ';
    }

    $contrast_button_background_color = aiero_get_prefered_option('contrast_button_background_color');
    if ( !empty($contrast_button_background_color) ) {
        $aiero_custom_css .= '
            .slide-sidebar-wrapper .woocommerce a.button,
            .woocommerce .slide-sidebar-wrapper a.button,
            .slide-sidebar-wrapper .woocommerce button.button,
            .woocommerce .slide-sidebar-wrapper button.button,
            .slide-sidebar-wrapper .woocommerce input.button,
            .woocommerce .slide-sidebar-wrapper input.button,
            .slide-sidebar-wrapper .woocommerce #respond input#submit,
            .woocommerce .slide-sidebar-wrapper #respond input#submit {
                background-color: ' . esc_attr($contrast_button_background_color) . ';
            }
        ';
    }

    $contrast_button_text_hover = aiero_get_prefered_option('contrast_button_text_hover');
    if ( !empty($contrast_button_text_hover) ) {
        $aiero_custom_css .= '
            .slide-sidebar-wrapper .woocommerce a.button:hover,
            .woocommerce .slide-sidebar-wrapper a.button:hover,
            .slide-sidebar-wrapper .woocommerce button.button:hover,
            .woocommerce .slide-sidebar-wrapper button.button:hover,
            .slide-sidebar-wrapper .woocommerce input.button:hover,
            .woocommerce .slide-sidebar-wrapper input.button:hover,
            .slide-sidebar-wrapper .woocommerce #respond input#submit:hover,
            .woocommerce .slide-sidebar-wrapper #respond input#submit:hover {
                color: ' . esc_attr($contrast_button_text_hover) . ';
            }
        ';
    }

    $contrast_button_border_hover = aiero_get_prefered_option('contrast_button_border_hover');
    if ( !empty($contrast_button_border_hover) ) {
        $aiero_custom_css .= '
            .slide-sidebar-wrapper .woocommerce a.button:hover,
            .woocommerce .slide-sidebar-wrapper a.button:hover,
            .slide-sidebar-wrapper .woocommerce button.button:hover,
            .woocommerce .slide-sidebar-wrapper button.button:hover,
            .slide-sidebar-wrapper .woocommerce input.button:hover,
            .woocommerce .slide-sidebar-wrapper input.button:hover,
            .slide-sidebar-wrapper .woocommerce #respond input#submit:hover,
            .woocommerce .slide-sidebar-wrapper #respond input#submit:hover {
                border-color: ' . esc_attr($contrast_button_border_hover) . ';
            }
        ';
    }

    $contrast_button_background_hover = aiero_get_prefered_option('contrast_button_background_hover');
    if ( !empty($contrast_button_background_hover) ) {
        $aiero_custom_css .= '
            .slide-sidebar-wrapper .woocommerce a.button:hover,
            .woocommerce .slide-sidebar-wrapper a.button:hover,
            .slide-sidebar-wrapper .woocommerce button.button:hover,
            .woocommerce .slide-sidebar-wrapper button.button:hover,
            .slide-sidebar-wrapper .woocommerce input.button:hover,
            .woocommerce .slide-sidebar-wrapper input.button:hover,
            .slide-sidebar-wrapper .woocommerce #respond input#submit:hover,
            .woocommerce .slide-sidebar-wrapper #respond input#submit:hover {
                background-color: ' . esc_attr($contrast_button_background_hover) . ';
            }
        ';
    }

    # Buttons
    $buttons_font       = aiero_get_prepared_option('buttons_font');
    $buttons_font_array = json_decode($buttons_font, true);
    if (
        !empty($buttons_font_array['font_family']) ||
        !empty($buttons_font_array['font_size']) ||
        !empty($buttons_font_array['text_transform']) ||
        !empty($buttons_font_array['letter_spacing']) ||
        !empty($buttons_font_array['word_spacing']) ||
        !empty($buttons_font_array['font_style']) ||
        !empty($buttons_font_array['font_weight'])
    ) {
        $aiero_custom_css .= '
            .woocommerce a.button,
            .woocommerce button.button,
            .woocommerce input.button,
            .woocommerce #respond input#submit,
            .woocommerce a.added_to_cart,
            #add_payment_method .wc-proceed-to-checkout a.checkout-button,
            .woocommerce-cart .wc-proceed-to-checkout a.checkout-button,
            .woocommerce-checkout .wc-proceed-to-checkout a.checkout-button {' .
                aiero_print_font_styles( $buttons_font, array('font_family', 'font_size', 'text_transform', 'letter_spacing', 'word_spacing', 'font_style', 'font_weight') ) .
            '}
        ';
    }

    # Main Font
    $main_font          = aiero_get_prepared_option('main_font');
    $main_font_array    = json_decode($main_font, true);
    if (
        !empty($main_font_array['font_family'])
    ) {
        $aiero_custom_css .= '
            h3#ship-to-different-address {' .
                aiero_print_font_styles( $main_font, array('font_family') ) .
            '}
        ';
    }

    # Typography Headings
    $headings_font          = aiero_get_prepared_option('headings_font');
    $headings_font_array    = json_decode($buttons_font, true);
    if (
        !empty($headings_font_array['font_family'])
    ) {
        $aiero_custom_css .= '
            .widget_product_categories ul li,
            ul.product_list_widget li .product-title,
            .filter-control-wrapper .filter-control-list .filter-control-item,
            .wc-block-grid__product .wc-block-grid__product-title,
            .wc-block-grid__product .wc-block-grid__product-onsale,
            .product-category-widget .product-category-header,
            .content-wrapper .widget_price_filter .price_slider_amount .price_label,
            .widget_rating_filter ul li,
            .widget_layered_nav ul li,
            .product_list_widget li .reviewer,
            .woocommerce-account .woocommerce-MyAccount-navigation ul li a,
            .woocommerce .woocommerce-order table.shop_table thead th, 
            .woocommerce .woocommerce-MyAccount-content table.shop_table thead th, 
            .woocommerce-page .woocommerce-order table.shop_table thead th, 
            .woocommerce-page .woocommerce-MyAccount-content table.shop_table thead th,
            .woocommerce .woocommerce-order table.shop_table .woocommerce-orders-table__cell-order-status, 
            .woocommerce .woocommerce-MyAccount-content table.shop_table .woocommerce-orders-table__cell-order-status, 
            .woocommerce-page .woocommerce-order table.shop_table .woocommerce-orders-table__cell-order-status, 
            .woocommerce-page .woocommerce-MyAccount-content table.shop_table .woocommerce-orders-table__cell-order-status,
            .woocommerce .woocommerce-table--order-details .product-name a,
            .woocommerce .woocommerce-table--order-details .amount,
            .woocommerce .woocommerce-table--order-details tfoot th,
            .widget div[class*="wp-block-"] .wc-block-review-list-item__item .wc-block-review-list-item__meta {' .
                aiero_print_font_styles( $headings_font, array('font_family') ) .
            '}
        ';
    }

}