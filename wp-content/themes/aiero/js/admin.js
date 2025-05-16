/*
 * Created by Artureanec
*/

"use strict";

function aiero_reactivate_sortable() {
    jQuery('.aiero_text_table_rows').sortable(
        {
            handle: '.aiero_text_table_row_move',
        }
    );
}

function aiero_rwmb_and_customizer_condition() {
    jQuery("[data-dependency-id]").each(function (index) {
        var aiero_target = jQuery(this).attr('data-dependency-id');
        var aiero_needed_val = jQuery(this).attr('data-dependency-val');
        var aiero_needed_val_array = new Array();
        var aiero_array_just_ok = false;

        if(aiero_needed_val.indexOf(',') + 1) {
            // Work with array value
            aiero_needed_val = aiero_needed_val.replace(/\s+/g,'');
            aiero_needed_val_array = aiero_needed_val.split(",");

            var aiero_this = jQuery(this);
            var aiero_target_array = aiero_target.replace(/\s+/g,'').split(",");
            var isOkArray = [];

            aiero_needed_val_array.forEach(function(item, i, aiero_arr) {
                if (aiero_this.hasClass('aiero_dependency_customizer')) {
                    if (aiero_array_just_ok !== true) {
                        if (jQuery('#customize-control-' + aiero_target).find('select').val() == item) {
                            aiero_array_just_ok = true;
                        }
                    }
                }
                else {
                    if (jQuery('#' + aiero_target_array[i]).val() == item) {
                        isOkArray.push(true);                        
                    } else {
                        isOkArray.push(false);
                    }
                }
            });
            if (!aiero_this.hasClass('aiero_dependency_customizer')) {
                aiero_array_just_ok = true;
                for(let i = 0; i < isOkArray.length; i++) {
                    if(isOkArray[i] == false) {
                        aiero_array_just_ok = false;
                        break;
                    }
                }
            }

            if (jQuery(this).hasClass('aiero_dependency_customizer')) {
                var aiero_target_status = jQuery('#customize-control-' + aiero_target).find('select').val();
                var aiero_dependency_elem_cont = jQuery(this).parents('.customize-control');
            } else {
                var aiero_target_status = jQuery('#' + aiero_target).val();
                var aiero_dependency_elem_cont = jQuery(this).parents('.rwmb-field');
            }

            if (aiero_array_just_ok == true) {
                aiero_dependency_elem_cont.show('fast');
            } else {
                aiero_dependency_elem_cont.hide('fast');
            }
        } else {
            // Just one value
            if (jQuery(this).hasClass('aiero_dependency_customizer')) {
                var aiero_target_status = jQuery('#customize-control-' + aiero_target).find('select').val();
                var aiero_dependency_elem_cont = jQuery(this).parents('.customize-control');
            } else {
                var aiero_target_status = jQuery('#' + aiero_target).val();
                var aiero_dependency_elem_cont = jQuery(this).parents('.rwmb-field');
            }

            if (aiero_needed_val == aiero_target_status) {
                aiero_dependency_elem_cont.show('fast');
            } else {
                aiero_dependency_elem_cont.hide('fast');
            }
        }
    });
}

function aiero_hide_unnecessary_options() {
    if (jQuery('.aiero_this_template_file').size() < 1) {
        var aiero_this_template_file = 'aiero_temp_333';
    }
    if (jQuery('.aiero_this_template_file').size() > 0) {
        aiero_this_template_file = jQuery('.aiero_this_template_file').val();
    }
    jQuery("[data-show-on-template-file]").each(function (index) {
        var aiero_unnecessary_target = jQuery(this).attr('data-show-on-template-file');
        if (aiero_unnecessary_target.indexOf(',') > -1) {
            var aiero_unnecessary_target_array = aiero_unnecessary_target.split(',');
            var aiero_rwmb_del_status = 'not find';
            jQuery.each(aiero_unnecessary_target_array, function (i, val) {
                if (aiero_this_template_file == val.trim()) {
                    aiero_rwmb_del_status = 'find';
                }
            });
            if (aiero_rwmb_del_status == 'not find') {
                jQuery(this).parents('.rwmb-field').remove();
            }
        } else {
            if (aiero_this_template_file !== aiero_unnecessary_target) {
                jQuery(this).parents('.rwmb-field').remove();
            }
        }
    });

    jQuery("[data-hide-on-template-file]").each(function (index) {
        var aiero_unnecessary_target = jQuery(this).attr('data-hide-on-template-file');
        if (aiero_unnecessary_target.indexOf(',') > -1) {
            var aiero_unnecessary_target_array = aiero_unnecessary_target.split(',');
            var aiero_rwmb_del_status = 'not find';
            jQuery.each(aiero_unnecessary_target_array, function (i, val) {
                if (aiero_this_template_file == val.trim()) {
                    aiero_rwmb_del_status = 'find';
                }
            });
            if (aiero_rwmb_del_status == 'find') {
                jQuery(this).parents('.rwmb-field').remove();
            }
        } else {
            if (aiero_this_template_file == aiero_unnecessary_target) {
                jQuery(this).parents('.rwmb-field').remove();
            }
        }
    });
}

function aiero_onchange_post_formats2(val) {
    if(val == '') {
        return;
    }
    jQuery('#video-post-format-settings, #audio-past-format-settings, #quote-post-format-settings, #link-post-format-settings, #gallery-post-format-settings').hide('fast');

    if (val == 'gallery') {
        jQuery('#gallery-post-format-settings').show('fast');
    }
    if (val == 'link') {
        jQuery('#link-post-format-settings').show('fast');
    }
    if (val == 'quote') {
        jQuery('#quote-post-format-settings').show('fast');
    }
    if (val == 'standard' || val == 'undefined') {
        jQuery('#video-post-format-settings, #audio-past-format-settings, #quote-post-format-settings, #link-post-format-settings, #gallery-post-format-settings').hide('fast');
    }
    if (val == 'video') {
        jQuery('#video-post-format-settings').show('fast');
    }
    if (val == 'audio') {
        jQuery('#audio-past-format-settings').show('fast');
    }
}

window.onload = function() {
    if( wp.data && wp.data.dispatch('core/edit-post')) {
        aiero_onchange_post_formats2(wp.data.select('core/editor').getEditedPostAttribute('format'));
    }
};

jQuery(document).on('change', '#post-format-selector-0', function(){
    aiero_onchange_post_formats2(jQuery(this).val());
});

jQuery(document).on('change', '[id^="post-format-selector"]', function(){
    aiero_onchange_post_formats2(jQuery(this).val());
});

function aiero_onchange_post_formats() {
    var aiero_post_format = jQuery('#post-formats-select input:checked').val();

    jQuery('#video-post-format-settings, #audio-past-format-settings, #quote-post-format-settings, #link-post-format-settings, #gallery-post-format-settings').hide('fast');
    if (aiero_post_format == 'standard' || aiero_post_format == 'undefined') {
        jQuery('#video-post-format-settings, #audio-past-format-settings, #quote-post-format-settings, #link-post-format-settings, #gallery-post-format-settings').hide('fast');
    }
    if (aiero_post_format == 'gallery') {
        jQuery('#gallery-post-format-settings').show('fast');
    }
    if (aiero_post_format == 'video') {
        jQuery('#video-post-format-settings').show('fast');
    }
    if (aiero_post_format == 'audio') {
        jQuery('#audio-past-format-settings').show('fast');
    }
    if (aiero_post_format == 'quote') {
        jQuery('#quote-post-format-settings').show('fast');
    }
    if (aiero_post_format == 'link') {
        jQuery('#link-post-format-settings').show('fast');
    }
    if (jQuery('#post-formats-select').length < 1) {
        // Body Class
        if (jQuery('body').hasClass('post-type-gallery')) {
            jQuery('#gallery-post-format-settings').show('fast');
            setTimeout("jQuery('#gallery-post-format-settings').show('fast')",100);
        } else if (jQuery('body').hasClass('post-type-video')) {
            jQuery('#video-post-format-settings').show('fast');
            setTimeout("jQuery('#video-post-format-settings').show('fast')",100);
        } else if (jQuery('body').hasClass('post-type-audio')) {
            jQuery('#audio-past-format-settings').show('fast');
            setTimeout("jQuery('#audio-post-format-settings').show('fast')",100);
        } else if (jQuery('body').hasClass('post-type-quote')) {
            jQuery('#quote-post-format-settings').show('fast');
            setTimeout("jQuery('#quote-post-format-settings').show('fast')",100);
        } else if (jQuery('body').hasClass('post-type-link')) {
            jQuery('#link-post-format-settings').show('fast');
            setTimeout("jQuery('#link-post-format-settings').show('fast')",100);
        } else {
            jQuery('#video-post-format-settings, #audio-past-format-settings, #quote-post-format-settings, #link-post-format-settings, #gallery-post-format-settings').hide('fast');
        }
    }
}

jQuery(document).ready(function () {
    if (jQuery('#centered_content_hide').length) {
        console.log('i found it');
        console.log(jQuery('#centered_content_hide').val());
        if (jQuery('#centered_content_hide').val() == 'yes') {
            console.log('this is yes');
            jQuery('body').addClass('aiero_hide_content');
        } else {
            console.log('this is no');
            jQuery('body').removeClass('aiero_hide_content');
        }
    }
    jQuery('#centered_content_hide').on('change', function(){
        if (jQuery(this).val() == 'yes') {
            jQuery('body').addClass('aiero_hide_content');
        } else {
            jQuery('body').removeClass('aiero_hide_content');
        }
    });
    if (jQuery('#page_template').size() > 0 && jQuery('#page_template').val() !== 'default') {
        jQuery('body').addClass(jQuery('#page_template').val().split('.')[0]);
    }

    jQuery("[data-dependency-id]").parents('.rwmb-field').hide();

    aiero_onchange_post_formats();
    aiero_rwmb_and_customizer_condition();
    aiero_hide_unnecessary_options();

    jQuery('.rwmb-select, .customize-control-select select').change(function () {
        aiero_rwmb_and_customizer_condition();
    });

    jQuery('#post-formats-select input').on("click", function () {
        aiero_onchange_post_formats();
    });

    jQuery('.aiero_reset_all_settings').on("click", function () {
        if (confirm("Are you sure? All settings will be reset to default state.")) {
            jQuery.post(ajaxurl, {
                action: 'aiero_reset_all_settings'
            }, function (response) {
                alert(response);
            });
        }
    });

    jQuery(document).on("click", '.aiero_text_table_add_row', function () {
        var aiero_text_table_data_storage_name = jQuery(this).parents('.widget-content').find('.aiero_text_table_data_storage_name').val();
        var aiero_text_table_name_text = jQuery(this).parents('.widget-content').find('.aiero_text_table_name_text').val();
        var aiero_text_table_value_text = jQuery(this).parents('.widget-content').find('.aiero_text_table_value_text').val();

        jQuery(this).parents('.widget-content').find('.aiero_text_table_rows').append('<div class="aiero_text_table_row aiero_dn"><div class="aiero_50_dib"><label>' + aiero_text_table_name_text + ':</label><input class="widefat" type="text" name="' + aiero_text_table_data_storage_name + '[][name]" value=""></div><div class="aiero_50_dib"><label>' + aiero_text_table_value_text + ':</label><textarea class="widefat" type="text" name="' + aiero_text_table_data_storage_name + '[][value]"></textarea></div><div class="aiero_text_table_row_remove"><i class="fa fa-trash"></i></div><div class="aiero_text_table_row_move"><i class="fa fa-arrows"></i></div></div>');
        jQuery('.aiero_dn').slideDown("fast").removeClass('aiero_dn');
    });

    jQuery(document).on("click", '.aiero_text_table_row_remove', function () {
        jQuery(this).parents('.aiero_text_table_row').slideUp("normal", function () {
            jQuery(this).remove();
        });
    });

    jQuery(document).on("click", '.widget-control-save', function () {
        setTimeout(function () {
            aiero_reactivate_sortable()
        }, 1000);
        setTimeout(function () {
            aiero_reactivate_sortable()
        }, 2000);
        setTimeout(function () {
            aiero_reactivate_sortable()
        }, 3000);
    });

    aiero_reactivate_sortable();

    function media_upload() {
        var _custom_media = true,
            _orig_send_attachment = wp.media.editor.send.attachment;
        jQuery('body').on('click', '.js_custom_upload_media', function () {
            var button_id   = jQuery(this).attr('id'),
                preview_url = '';
            wp.media.editor.send.attachment = function (props, attachment) {
                if ( typeof attachment !== 'undefined' ) {
                    if (_custom_media) {
                        if (typeof attachment.sizes.medium !== 'undefined') {
                            preview_url = attachment.sizes.medium.url;
                        } else {
                            preview_url = attachment.sizes.full.url;
                        }
                        jQuery('.' + button_id + '_img').attr('src', preview_url).removeClass('hidden');
                        jQuery('.' + button_id + '_url').val(attachment.url).change();
                        jQuery('.' + button_id + '_id').val(attachment.id).change();
                    } else {
                        return _orig_send_attachment.apply(jQuery('#' + button_id), [props, attachment]);
                    }
                    jQuery('#' + button_id).removeClass('empty').addClass('hidden');
                    jQuery('.media-widget-buttons', jQuery(this).parents('.media-widget-control')).find('.js_custom_remove_media').removeClass('hidden');
                }
            };
            if ( typeof wp !== 'undefined' && wp.media && wp.media.editor ) {
                wp.media.editor.open(jQuery('#' + button_id));
            }

            return false;
        });
    }
    media_upload();

    function media_remove() {
        jQuery('body').on('click', '.js_custom_remove_media', function() {
            jQuery('.media_image', jQuery(this).parents('.media-widget-control')).find('input.widefat').val('').change();
            jQuery('.media_image', jQuery(this).parents('.media-widget-control')).find('input.widefat2').val('').change();
            jQuery('.media_image', jQuery(this).parents('.media-widget-control')).find('img').attr('src', '').addClass('hidden');
            jQuery('.media_image', jQuery(this).parents('.media-widget-control')).find('.js_custom_upload_media').addClass('empty').removeClass('hidden');
            jQuery(this).addClass('hidden');
        });
    }
    media_remove();
});

jQuery('.aiero_color_picker .rwmb-color').each(function(){
    var color = jQuery(this).attr('placeholder');

    if (jQuery(this).val() === '') {
        jQuery(this).val(color);
    }
});







function iconSearch(i) {
    var t = i.parent().next().find('.iconpicker-items'),
        c = i.val().toLowerCase();

    if ( c.length > 0 ) {
        t.children().each( function() {
            if ( jQuery(this).filter("[title*=".concat(c)).length > 0 || c.length < 1 ) {
                jQuery(this).show();
            } else {
                jQuery(this).hide();
            }
        })
    } else {
        t.children().show();
    }
}

jQuery('.rwmb-benefits-wrapper, .rwmb-iconpicker-wrapper').on('click', '.icp-auto', function(){
    jQuery(this).parent().next().addClass('iconpicker-visible').find('.iconpicker-search').focus().val('').keyup();
    jQuery(document).on('mouseup', function(i) {
        var t = jQuery('.iconpicker-popover');
        t.is(i.target) || 0 !== t.has(i.target).length || t.removeClass('iconpicker-visible');
    });
    jQuery('.iconpicker-items > i').on('click', function(){
        var i = jQuery(this).attr('class');
        (n = jQuery(this).parents('.iconpicker-popover').prev().find('.icp')).val(i);
        n.attr('value', i);
        var t = n.next('.input-group-addon'),
            c = '<i class="' . concat(i, '"></i>');
        t.empty();
        t.append(c);
        var n, r = jQuery(this).parent().parent().parent();
        (n = jQuery('.iconpicker-popover')).removeClass('iconpicker-visible');
        n.trigger('change');
    });
    jQuery('.iconpicker-search').on('keyup', function() {
        iconSearch(jQuery(this));
    });
});
