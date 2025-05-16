/*
 * Created by Artureanec
*/
( function( jQuery ) {
    "use strict";

    function product_filters_open() {
        jQuery('.product-filters-trigger').on('click', function() {
            if (jQuery(window).width()< 992) {
                jQuery('.shop-hidden-sidebar, .body-overlay').addClass('active');
            }
        });
        jQuery('.shop-hidden-sidebar-close, .body-overlay').on('click', function() {
            jQuery('.shop-hidden-sidebar, .body-overlay').removeClass('active');
        });
    }

    function custom_quantity() {
        jQuery('.quantity-wrapper').each(function() {
            if ( !jQuery(this).hasClass('styled') ) {
                if (!jQuery('.quantity', this).hasClass('hidden')) {
                    jQuery(this).addClass('styled').prepend('<div class="btn-minus"><i class="icon"></i></div>').append('<div class="btn-plus"><i class="icon"></i></div>');
                } else {
                    jQuery(this).addClass('hidden')
                }
                var spinner = jQuery(this),
                    input = spinner.find('input[type="number"]'),
                    btnUp = spinner.find('.btn-plus'),
                    btnDown = spinner.find('.btn-minus'),
                    min = input.attr('min'),
                    max = input.attr('max');
                if (typeof min !== typeof undefined && min !== false && min !== '' && min >= 1) {
                    min = parseInt(min);
                } else {
                    min = 0;
                }
                if (typeof max !== typeof undefined && max !== false && max !== '' && max > min) {
                    max = parseInt(max);
                } else {
                    max = 0;
                }

                btnUp.on('click', function () {
                    if (input.val() == '') {
                        var oldValue = 0;
                    } else {
                        var oldValue = parseInt(input.val());
                    }
                    if (oldValue >= max && max !== 0) {
                        var newVal = oldValue;
                    } else {
                        var newVal = oldValue + 1;
                    }
                    input.val(newVal);
                    input.trigger('change');
                });

                btnDown.on('click', function () {
                    if (input.val() == '') {
                        var oldValue = 0;
                    } else {
                        var oldValue = parseInt(input.val());
                    }
                    if (oldValue <= min) {
                        var newVal = oldValue;
                    } else {
                        var newVal = oldValue - 1;
                    }
                    input.val(newVal);
                    input.trigger('change');
                });
            }
        });
    } 

    // Product Gallery thumbnails slider
    function single_product_thumb_slider() {
        jQuery('.woocommerce-product-gallery--with-images').find('.flex-control-nav').slick({
            mobileFirst:    true,
            prevArrow:      '<div class="slick-button slick-prev"></div>',
            nextArrow:      '<div class="slick-button slick-next"></div>',
            infinite:       false,
            responsive:     [
                {
                    breakpoint: 120,
                    settings: {
                        slidesToShow:    3,
                        vertical:        false,
                        verticalSwiping: false
                    }
                },
                {
                    breakpoint: 400,
                    settings: {
                        slidesToShow:    4,
                        vertical:        false,
                        verticalSwiping: false
                    }
                },
                {
                    breakpoint: 576,
                    settings: {
                        slidesToShow:    5,
                        vertical:        false,
                        verticalSwiping: false
                    }
                },
                {
                    breakpoint: 768,
                    settings: {
                        slidesToShow:    4,
                        vertical:        false,
                        verticalSwiping: false
                    }
                },
                {
                    breakpoint: 992,
                    settings: {
                        slidesToShow:    4,
                        vertical:        true,
                        verticalSwiping: true
                    }
                }
            ]
        });
    }

    function initWoocommerceAieroButton() {
        if(jQuery('#payment #place_order').find('.icon-button-arrow').length < 1) {
            jQuery('#payment #place_order').append('<span class="icon-button-arrow"></span>');
        }
        if(jQuery('#payment #place_order').find('.button-inner').length < 1) {
            jQuery('#payment #place_order').append('<span class="button-inner"></span>');
        }
    }
    
    jQuery(document).ready(function() {
        product_filters_open();  
        custom_quantity();
        setTimeout(single_product_thumb_slider, 500);

        if(jQuery(document.body).hasClass('woocommerce-account')) {
            setTimeout(function() {                
                initFloatPlaceholderInput('.woocommerce form .woocommerce-Input[type="password"][placeholder]:not([placeholder=""])');
                jQuery( '.input-floating-wrap ~ .show-password-input' ).on( 'click',
                    function() {
                        if ( jQuery( this ).hasClass( 'display-password' ) ) {
                            jQuery( this ).siblings('.input-floating-wrap').find( 'input[type="password"]' ).prop( 'type', 'text' );
                        } else {
                            jQuery( this ).siblings('.input-floating-wrap').find( 'input[type="text"]' ).prop( 'type', 'password' );
                        }
                    }
                );
            }, 300);
        }        
        jQuery('.sidebar .wc-block-grid__product-add-to-cart .add_to_cart_button, .slide-sidebar-wrapper .wc-block-grid__product-add-to-cart .add_to_cart_button, .footer .wc-block-grid__product-add-to-cart .add_to_cart_button').append('<span class="button-inner"></span>');
        jQuery('.woocommerce-cart-form .actions .button').append('<span class="icon-button-arrow"></span><span class="button-inner"></span>');
        jQuery(document.body).on( 'updated_shipping_method', function() {
            initFloatPlaceholderInput();
            initWoocommerceAieroButton();
        } );
        jQuery(document.body).on('updated_wc_div', function() {
            initFloatPlaceholderInput();
            initWoocommerceAieroButton();
            if(jQuery('.woocommerce-cart-form .actions .button').find('.icon-button-arrow').length < 1) {
                jQuery('.woocommerce-cart-form .actions .button').append('<span class="icon-button-arrow"></span>');
            }
            if(jQuery('.woocommerce-cart-form .actions .button').find('.button-inner').length < 1) {
                jQuery('.woocommerce-cart-form .actions .button').append('<span class="button-inner"></span>');
            }
        }); 
        jQuery(document.body).on( 'country_to_state_changed', function() {
            initFloatPlaceholderInput();
            initWoocommerceAieroButton();
        } );
        jQuery(document.body).on('init_checkout', function(){
            initWoocommerceAieroButton();
        });
        jQuery(document.body).on('updated_checkout', function(){
            initFloatPlaceholderInput();
            initWoocommerceAieroButton();
        });
        jQuery(document.body).on('payment_method_selected', function() {
            initWoocommerceAieroButton();
        });
        jQuery('.single-product .single_add_to_cart_button').append('<span class="button-inner"></span>');
        jQuery('.single-product .added_to_cart').append('<span class="button-inner"></span>');
        jQuery(document.body).on('wc_cart_button_updated', function() {
            if(jQuery('.single-product .added_to_cart').find('.button-inner').length < 1) {
                jQuery('.single-product .added_to_cart').append('<span class="button-inner"></span>');
            }
        });
    });
    function is_mobile () {
        if ( window.innerWidth < 768 ){
            return true;
        } else {
            return false;
        }
    }
    function is_mobile_device(){
        if ( navigator.userAgent.match( /(Android|iPhone|iPod|iPad|Phone|DROID|webOS|BlackBerry|Windows Phone|ZuneWP7|IEMobile|Tablet|Kindle|Playbook|Nexus|Xoom|SM-N900T|GT-N7100|SAMSUNG-SGH-I717|SM-T330NU)/ ) ) {
            return true;
        } else {
            return false;
        }
    }
    function not_desktop(){
        if( (window.innerWidth < 1367 && is_mobile_device()) || window.innerWidth < 1200 ){
            return true;
        } else {
            return false;
        }
    }   
    
    jQuery( document.body ).on( 'updated_cart_totals', function(){
        custom_quantity();
    });

// Change display mode
    jQuery('.woocommerce,.woocommerce-page').on('click', '.shop-mode-buttons a', function(e) {
        var mode = jQuery(this).hasClass('woocommerce-grid') ? 'grid' : 'list';
        var mode_old = jQuery(this).siblings('input').val();
        if ( mode != mode_old ) {
            jQuery.cookie('shop_mode', mode, {expires: 365, path: '/'});
            jQuery(this).siblings('input').val(mode).parents('form').get(0).submit();
        }
        e.preventDefault();
        return false;
    });

    /* ===========> Scripts Init <=========== */
    window.addEventListener( "load", function() {
        aiero_ajax_add_to_cart();
        aiero_trigger_mini_cart();
    });

    function aiero_trigger_mini_cart(){
        var cart = jQuery('.mini-cart-panel');
        cart.off();

        if( window.innerWidth >= 992 ){
            jQuery('.header .mini-cart-trigger').on('click', function(e){
                e.preventDefault();
                cart.addClass('active');

                jQuery('.close-mini-cart').off();
                aiero_close_mini_cart();
            });
        }
    }
    function aiero_close_mini_cart(){
        jQuery('.close-mini-cart').on('click', function(){
            jQuery('.mini-cart').removeClass('active');
        });
    }

    /* ===========> Ajax Add-To-Cart Declaration <=========== */
    function aiero_ajax_add_to_cart(){
        if ( typeof wc_add_to_cart_params !== 'undefined' ) {
            if(jQuery('.single_add_to_cart_button').closest('.product').hasClass('product-type-external')) {
                return;
            }
            jQuery('.single_add_to_cart_button').off().on('click', function (e) {
                if ( !(jQuery(this).hasClass('single_add_to_cart_button') && wc_add_to_cart_params.cart_redirect_after_add === 'yes') ) {
                    e.preventDefault();

                    var button = jQuery(this);
                    var form = button.closest('form.cart');
                    var product_id = form.find('input[name=add-to-cart]').val() || button.val() || form.find('.variation_id').val();

                    if (!product_id)
                        return;
                    if (button.is('.disabled'))
                        return;

                    var data = {
                        action: 'aiero_ajax_add_to_cart',
                        'add-to-cart': product_id,
                    };

                    form.serializeArray().forEach(function (element) {
                        data[element.name] = element.value;
                    });

                    jQuery(document.body).trigger('adding_to_cart', [button, data]);

                    jQuery.ajax({
                        type: 'POST',
                        'url': wc_add_to_cart_params.ajax_url,
                        data: data,
                        beforeSend: function (response) {
                            button.removeClass('added').addClass('loading');
                        },
                        complete: function (response) {
                            button.addClass('added').removeClass('loading');
                        },
                        success: function (response) {
                            if (response.error & response.product_url) {
                                window.location = response.product_url;
                                return;
                            } else {
                                jQuery(document.body).trigger('added_to_cart', [response.fragments, response.cart_hash, button]);
                            }
                        }
                    });

                    return false;
                }
            });
        }
    }

} ).call( this, jQuery );