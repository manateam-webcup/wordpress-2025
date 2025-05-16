<?php
/*
 * Created by Artureanec
*/

# Custom Fields
if ( class_exists( 'RWMB_Field' ) ) {
    class RWMB_Help_Field extends RWMB_Key_Value_Field {
        public static function html( $meta, $field ) {
            // Question.
            $key                            = isset( $meta[0] ) ? $meta[0] : '';
            $attributes                     = self::get_attributes( $field, $key );
            $attributes['placeholder']      = esc_attr__('Title', 'aiero');
            $html                           = sprintf( '<input %s>', self::render_attributes( $attributes ) );

            // Answer.
            $val                            = isset( $meta[1] ) ? $meta[1] : '';
            $attributes                     = self::get_attributes( $field, $val );
            $attributes['placeholder']      = esc_attr__('Text', 'aiero');
            $attributes['id']               = $attributes['id'] . esc_attr('_text');
            $attributes['value']            = false;
            $html                           .= sprintf( '<textarea %s>%s</textarea>', self::render_attributes( $attributes ), $val );

            return $html;
        }
    }

    class RWMB_Benefits_Field extends RWMB_Input_Field {
        public static function admin_enqueue_scripts() {
            wp_enqueue_style( 'rwmb-color', RWMB_CSS_URL . 'color.css', array( 'wp-color-picker' ), RWMB_VER );

            $dependencies = array( 'wp-color-picker' );
            $args         = func_get_args();
            $field        = reset( $args );
            if ( ! empty( $field['alpha_channel'] ) ) {
                wp_enqueue_script( 'wp-color-picker-alpha', RWMB_JS_URL . 'wp-color-picker-alpha/wp-color-picker-alpha.min.js', array( 'wp-color-picker' ), RWMB_VER, true );
                $dependencies = array( 'wp-color-picker-alpha' );
            }
            wp_enqueue_script( 'rwmb-color', RWMB_JS_URL . 'color.js', $dependencies, RWMB_VER, true );
        }

        public static function html( $meta, $field ) {

            $icon_container = aiero_icon_picker_popover(true, true, true, true);

            // Icon.
            $key                                    = isset( $meta[0] ) ? $meta[0] : '';
            $attributes                             = self::get_attributes( $field, $key );
            $attributes['placeholder']              = esc_attr__('Icon', 'aiero');
            $attributes['class']                    = esc_attr('icp icp-auto');
            $attributes['type']                     = esc_attr('text');
            $attributes['readonly']                 = true;
            $attributes['id']                       = $attributes['id'] . esc_attr('_icon');
            $attributes['data-options']             = false;
            $attributes['data-alpha-enabled']       = false;
            $attributes['data-alpha-color-type']    = false;
            $html                                   = '<div class="rwmb-benefits-icon-picker">';
            $html                                   .= '<div class="input-group icp-container">';
            $html                                   .= sprintf('<input data-placement="bottomRight" %s">', self::render_attributes($attributes) );

            if ( !empty($key) ) {
                $html .= '<span class="input-group-addon"><i class="' . esc_attr($key) . '"></i></span></div>' . sprintf('%s', $icon_container);
            } else {
                $html .= '<span class="input-group-addon"></span></div>' . sprintf('%s', $icon_container);
            };
            $html                                   .= '</div>';

            // Title.
            if ( $field['field_title'] ) {
                $val                                    = isset( $meta[1] ) ? $meta[1] : '';
                $attributes                             = self::get_attributes( $field, $val );
                $attributes['placeholder']              = esc_attr__('Title', 'aiero');
                $attributes['id']                       = $attributes['id'] . esc_attr('_title');
                $attributes['data-options']             = false;
                $attributes['data-alpha-enabled']       = false;
                $attributes['data-alpha-color-type']    = false;
                $html                                   .= '<div class="rwmb-benefits-title">';
                $html                                   .= sprintf( '<input %s>', self::render_attributes($attributes) );
                $html                                   .= '</div>';
            }

            // Color.
            if ( $field['field_color'] ) {
                $key                                    = isset( $meta[2] ) ? $meta[2] : '';
                $attributes                             = self::get_attributes( $field, $key );
                $attributes['placeholder']              = false;
                $attributes['class']                    = 'rwmb-color wp-color-picker';
                $attributes['id']                       = $attributes['id'] . esc_attr('_color');
                $html                                   .= '<div class="rwmb-benefits-color">';
                $html                                   .= sprintf( '<input %s>', self::render_attributes($attributes) );
                $html                                   .= '</div>';
            }

            return $html;
        }

        protected static function begin_html( array $field ) : string {
            $desc = $field['desc'] ? "<p id='{$field['id']}_description' class='description'>{$field['desc']}</p>" : '';
            if ( empty( $field['name'] ) ) {
                return '<div class="rwmb-input">' . $desc;
            }
            return sprintf(
                '<div class="rwmb-label">
				<label for="%s">%s</label>
			</div>
			<div class="rwmb-input">
			%s',
                $field['id'],
                $field['name'],
                $desc
            );
        }

        protected static function input_description( array $field ) : string {
            return '';
        }

        protected static function label_description( array $field ) : string {
            return '';
        }

        public static function esc_meta( $meta ) {
            foreach ( (array) $meta as $k => $pairs ) {
                $meta[ $k ] = array_map( 'esc_attr', (array) $pairs );
            }
            return $meta;
        }

        public static function value( $new, $old, $post_id, $field ) {
            foreach ( $new as &$arr ) {
                if ( empty( $arr[0] ) && empty( $arr[1] ) ) {
                    $arr = false;
                }
            }
            $new = array_filter( $new );
            return $new;
        }

        public static function normalize( $field ) {
            $field['clone']         = true;
            $field['multiple']      = true;
            $field                  = wp_parse_args(
                $field,
                array(
                    'alpha_channel' => false,
                    'js_options'    => array(),
                )
            );
            $field                  = wp_parse_args(
                $field,
                array(
                    'field_title'   => false,
                    'field_color'   => false,
                    'size'          => 30,
                    'maxlength'     => false,
                    'pattern'       => false,
                )
            );
            $field['js_options']    = wp_parse_args(
                $field['js_options'],
                array(
                    'defaultColor' => false,
                    'hide'         => true,
                    'palettes'     => true,
                )
            );
            $field             = parent::normalize( $field );

            $field['attributes']['type'] = 'text';
            $field['placeholder']        = wp_parse_args(
                (array) $field['placeholder'],
                array(
                    'key'   => esc_html__( 'Icon', 'aiero' ),
                    'value' => esc_html__( 'Title', 'aiero' ),
                )
            );
            return $field;
        }

        public static function format_clone_value( $field, $value, $args, $post_id ) {
            return sprintf( '<label>%s:</label> %s', $value[0], $value[1] );
        }

        public static function get_attributes( $field, $value = null ) {
            $attributes         = parent::get_attributes( $field, $value );
            $attributes         = wp_parse_args(
                $attributes,
                array(
                    'size'          => $field['size'],
                    'maxlength'     => $field['maxlength'],
                    'pattern'       => $field['pattern'],
                    'placeholder'   => $field['placeholder'],
                    'data-options'  => wp_json_encode( $field['js_options'] ),
                )
            );
            $attributes['type'] = 'text';

            if ( $field['alpha_channel'] ) {
                $attributes['data-alpha-enabled']    = 'true';
                $attributes['data-alpha-color-type'] = 'hex';
            }

            return $attributes;
        }

        public static function format_single_value( $field, $value, $args, $post_id ) {
            return sprintf( "<span style='display:inline-block;width:20px;height:20px;border-radius:50%%;background:%s;'></span>", $value );
        }
    }

    class RWMB_Iconpicker_Field extends RWMB_Input_Field {

        public static function html( $meta, $field ) {
            $icon_container = aiero_icon_picker_popover(true, true, true, true);

            // Icon.
            $attributes                              = self::call( 'get_attributes', $field, $meta );
            $attributes['placeholder']              = '';
            $attributes['class']                    = esc_attr('icp icp-auto');
            $attributes['type']                     = esc_attr('text');
            $attributes['readonly']                 = true;
            $html                                   = '<div class="rwmb-iconpicker-icon-picker">';
            $html                                   .= '<div class="input-group icp-container">';
            $html                                   .= sprintf('<input data-placement="bottomRight" %s">', self::render_attributes($attributes) );

            if ( !empty($meta) ) {
                $html .= '<span class="input-group-addon"><i class="' . esc_attr($meta) . '"></i></span></div>' . sprintf('%s', $icon_container);
            } else {
                $html .= '<span class="input-group-addon"></span></div>' . sprintf('%s', $icon_container);
            };
            $html                                   .= '</div>';

            return $html;
        }

        public static function normalize( $field ) {
            $field = parent::normalize( $field );

            $field = wp_parse_args(
                $field,
                array(
                    'size'      => 30,
                    'maxlength' => false,
                    'pattern'   => false,
                )
            );

            return $field;
        }

        public static function get_attributes( $field, $value = null ) {
            $attributes = parent::get_attributes( $field, $value );
            $attributes = wp_parse_args(
                $attributes,
                array(
                    'size'        => $field['size'],
                    'maxlength'   => $field['maxlength'],
                    'pattern'     => $field['pattern'],
                    'placeholder' => $field['placeholder'],
                )
            );

            return $attributes;
        }
    }
}

# RWMB check
if (!function_exists('aiero_post_options')) {
    function aiero_post_options()
    {
        if (class_exists('RWMB_Loader')) {
            return true;
        } else {
            return false;
        }
    }
}

# RWMB get option
if (!function_exists('aiero_get_post_option')) {
    function aiero_get_post_option($name, $default = false) {
        if (class_exists('RWMB_Loader')) {
            if (rwmb_meta($name)) {
                return rwmb_meta($name);
            } else {
                return $default;
            }
        } else {
            return $default;
        }
    }
}

# RWMB get value
if (!function_exists('aiero_get_post_value')) {
    function aiero_get_post_value($name, $default = false) {
        if (class_exists('RWMB_Loader')) {
            if (rwmb_the_value($name, null, null, false)) {
                return rwmb_the_value($name, null, null, false);
            } else {
                return $default;
            }
        } else {
            return $default;
        }
    }
}

# RWMB get image
if (!function_exists('aiero_get_post_image')) {
    function aiero_get_post_image($name, $size = 'large', $default = false) {
        if (class_exists('RWMB_Loader')) {
            if (rwmb_meta($name)) {
                $out = '';
                $images = rwmb_meta( $name, array( 'size' => $size ) );
                foreach ( $images as $image ) {
                    $out .= '<div class="image_wrapper"><img src="'. $image['url']. '" alt="'. $image['alt']. '"></div>';
                }
                return $out;
            } else {
                return $default;
            }
        } else {
            return $default;
        }
    }
}

# RWMB get time
if (!function_exists('aiero_get_post_time')) {
    function aiero_get_post_time($time, $default = false) {
        if (class_exists('RWMB_Loader')) {
            if (rwmb_meta($time)) {
                $time = ' ' . rwmb_meta($time);
                $time = str_replace(esc_html__(' 0 Hours', 'aiero'), '', $time);
                $time = str_replace(esc_html__(' 0 Minutes', 'aiero'), '', $time);
                $time = str_replace(esc_html__(' 1 Hours', 'aiero'), esc_html__(' 1 Hour', 'aiero'), $time);
                $time = str_replace(esc_html__(' 1 Minutes', 'aiero'), esc_html__('1 Minute', 'aiero'), $time);
                return trim($time);
            } else {
                return $default;
            }
        } else {
            return $default;
        }
    }
}

if (class_exists('RWMB_Loader')) {
    if (!function_exists('aiero_custom_meta_boxes')) {
        add_filter('rwmb_meta_boxes', 'aiero_custom_meta_boxes');

        function aiero_custom_meta_boxes($meta_boxes) {
            $sidebar_list_default = array(
                'default' => esc_html__('Default', 'aiero')
            );
            $sidebar_list = aiero_get_all_sidebar_list();
            $sidebar_list = $sidebar_list_default + $sidebar_list;

            # Quote Post Format
            $meta_boxes[] = array(
                'title'         => esc_html__('Quote Post Format Settings', 'aiero'),
                'post_types'    => array('post'),
                'context'       => 'advanced',
                'fields'        => array(
                    array(
                        'id'            => 'post_media_quote_text',
                        'name'          => esc_html__('Quote Text', 'aiero'),
                        'placeholder'   => esc_html__('Enter Quote Text', 'aiero'),
                        'type'          => 'textarea',
                    ),
                    array(
                        'id'            => 'post_media_quote_author',
                        'name'          => esc_html__('Quote Author Name', 'aiero'),
                        'placeholder'   => esc_html__('Quote Author Name', 'aiero'),
                        'type'          => 'text',
                    ),
                ),
            );

            # Gallery Post Format
            $meta_boxes[] = array(
                'title'         => esc_html__('Gallery Post Format Settings', 'aiero'),
                'post_types'    => array('post'),
                'context'       => 'advanced',
                'fields'        => array(
                    array(
                        'id'        => 'post_media_gallery_select',
                        'name'      => esc_html__('Select Images', 'aiero'),
                        'type'      => 'image_advanced',
                    ),
                ),
            );

            # Video Post Format
            $meta_boxes[] = array(
                'title'         => esc_html__('Video Post Format Settings', 'aiero'),
                'post_types'    => array('post'),
                'context'       => 'advanced',
                'fields'        => array(
                    array(
                        'id'        => 'post_media_video_type',
                        'name'      => esc_html__('Video Source', 'aiero'),
                        'type'      => 'select',
                        'std'       => 'link',
                        'options'   => array(
                            'link'      => esc_html__('Outer Link', 'aiero'),
                            'self'      => esc_html__('Self Hosted', 'aiero')
                        )
                    ),
                    array(
                        'id'            => 'post_media_video_url',
                        'name'          => esc_html__('Enter Video Link', 'aiero'),
                        'type'          => 'oembed',
                        'desc'          => esc_html__('Copy link to the video from YouTube or other video-sharing website.', 'aiero'),
                        'attributes'    => array(
                            'data-dependency-id'    => 'post_media_video_type',
                            'data-dependency-val'   => 'link'
                        )
                    ),
                    array(
                        'id'                => 'post_media_video_select',
                        'name'              => esc_html__('Select Video From Media Library', 'aiero'),
                        'type'              => 'video',
                        'max_file_uploads'  => 1,
                        'max_status'        => false,
                        'attributes'        => array(
                            'data-dependency-id'    => 'post_media_video_type',
                            'data-dependency-val'   => 'self'
                        )
                    ),
                ),
            );

            # Content Output Settings
            $meta_boxes[] = array(
                'title'         => esc_html__('Single Post Settings', 'aiero'),
                'post_types'    => array('post'),
                'context'       => 'advanced',
                'fields'        => array(

                    //-- Single Post Settings
                    array(
                        'type'  => 'heading',
                        'name'  => esc_html__('Post Output Settings', 'aiero'),
                    ),

                    array(
                        'id'        => 'post_media_image_status',
                        'name'      => esc_html__('Show Media Block', 'aiero'),
                        'type'      => 'select',
                        'std'       => 'default',
                        'options'   => array(
                            'default'   => esc_html__('Default', 'aiero'),
                            'on'        => esc_html__('Yes', 'aiero'),
                            'off'       => esc_html__('No', 'aiero')
                        )
                    ),

                    array(
                        'id'        => 'post_category_status',
                        'name'      => esc_html__('Show Post Categories', 'aiero'),
                        'type'      => 'select',
                        'std'       => 'default',
                        'options'   => array(
                            'default'   => esc_html__('Default', 'aiero'),
                            'on'        => esc_html__('Yes', 'aiero'),
                            'off'       => esc_html__('No', 'aiero')
                        )
                    ),

                    array(
                        'id'        => 'post_date_status',
                        'name'      => esc_html__('Show Post Date', 'aiero'),
                        'type'      => 'select',
                        'std'       => 'default',
                        'options'   => array(
                            'default'   => esc_html__('Default', 'aiero'),
                            'on'        => esc_html__('Yes', 'aiero'),
                            'off'       => esc_html__('No', 'aiero')
                        )
                    ),

                    array(
                        'id'        => 'post_author_status',
                        'name'      => esc_html__('Show Post Author', 'aiero'),
                        'type'      => 'select',
                        'std'       => 'default',
                        'options'   => array(
                            'default'   => esc_html__('Default', 'aiero'),
                            'on'        => esc_html__('Yes', 'aiero'),
                            'off'       => esc_html__('No', 'aiero')
                        )
                    ),

                    array(
                        'id'        => 'post_comment_counter_status',
                        'name'      => esc_html__('Show Number of Post Comments', 'aiero'),
                        'type'      => 'select',
                        'std'       => 'default',
                        'options'   => array(
                            'default'   => esc_html__('Default', 'aiero'),
                            'on'        => esc_html__('Yes', 'aiero'),
                            'off'       => esc_html__('No', 'aiero')
                        )
                    ),

                    array(
                        'id'        => 'post_title_status',
                        'name'      => esc_html__('Show Post Title', 'aiero'),
                        'type'      => 'select',
                        'std'       => 'default',
                        'options'   => array(
                            'default'   => esc_html__('Default', 'aiero'),
                            'on'        => esc_html__('Yes', 'aiero'),
                            'off'       => esc_html__('No', 'aiero')
                        )
                    ),

                    array(
                        'id'        => 'post_tags_status',
                        'name'      => esc_html__('Show Post Tags', 'aiero'),
                        'type'      => 'select',
                        'std'       => 'default',
                        'options'   => array(
                            'default'   => esc_html__('Default', 'aiero'),
                            'on'        => esc_html__('Yes', 'aiero'),
                            'off'       => esc_html__('No', 'aiero')
                        )
                    ),

                    array(
                        'id'        => 'post_socials_status',
                        'name'      => esc_html__('Show Post Social Buttons', 'aiero'),
                        'type'      => 'select',
                        'std'       => 'default',
                        'options'   => array(
                            'default'   => esc_html__('Default', 'aiero'),
                            'on'        => esc_html__('Yes', 'aiero'),
                            'off'       => esc_html__('No', 'aiero')
                        )
                    ),

                    array(
                        'type' => 'divider',
                    ),

                    //-- Sticky Header
                    array(
                        'type'  => 'heading',
                        'name'  => esc_html__('Recent Posts', 'aiero'),
                    ),

                    array(
                        'id'        => 'recent_posts_status',
                        'name'      => esc_html__('Show Recent Posts', 'aiero'),
                        'type'      => 'select',
                        'std'       => 'default',
                        'options'   => array(
                            'default'   => esc_html__('Default', 'aiero'),
                            'on'        => esc_html__('Yes', 'aiero'),
                            'off'       => esc_html__('No', 'aiero')
                        )
                    ),

                    array(
                        'id'        => 'recent_posts_customize',
                        'name'      => esc_html__('Customize', 'aiero'),
                        'type'      => 'select',
                        'std'       => 'default',
                        'options'   => array(
                            'default'   => esc_html__('Default', 'aiero'),
                            'off'       => esc_html__('No', 'aiero'),
                            'on'        => esc_html__('Yes', 'aiero')
                        )
                    ),

                    array(
                        'id'            => 'recent_posts_section_heading',
                        'name'          => esc_html__('Recent Posts Section Title', 'aiero'),
                        'type'          => 'text',
                        'std'           => '',
                        'placeholder'   => aiero_get_theme_mod('recent_posts_section_heading'),
                        'attributes'    => array(
                            'data-dependency-id'    => 'recent_posts_customize',
                            'data-dependency-val'   => 'on'
                        )
                    ),

                    array(
                        'id'            => 'recent_posts_number',
                        'name'          => esc_html__('Number of Posts', 'aiero'),
                        'type'          => 'select',
                        'options'       => array(
                            'default'       => esc_html__('Default', 'aiero'),
                            '2'             => esc_html__('2 Items', 'aiero'),
                            '3'             => esc_html__('3 Items', 'aiero'),
                            '4'             => esc_html__('4 Items', 'aiero')
                        ),
                        'attributes'    => array(
                            'data-dependency-id'    => 'recent_posts_customize',
                            'data-dependency-val'   => 'on'
                        )
                    ),

                    array(
                        'id'            => 'recent_posts_order_by',
                        'name'          => esc_html__('Order By', 'aiero'),
                        'type'          => 'select',
                        'options'       => array(
                            'default'       => esc_html__('Default', 'aiero'),
                            'random'        => esc_html__('Random', 'aiero'),
                            'date'          => esc_html__('Date', 'aiero'),
                            'name'          => esc_html__('Name', 'aiero')
                        ),
                        'attributes'    => array(
                            'data-dependency-id'    => 'recent_posts_customize',
                            'data-dependency-val'   => 'on'
                        )
                    ),

                    array(
                        'id'            => 'recent_posts_order',
                        'name'          => esc_html__('Sort Order', 'aiero'),
                        'type'          => 'select',
                        'options'       => array(
                            'default'       => esc_html__('Default', 'aiero'),
                            'desc'          => esc_html__('Descending', 'aiero'),
                            'asc'           => esc_html__('Ascending', 'aiero')
                        ),
                        'attributes'    => array(
                            'data-dependency-id'    => 'recent_posts_customize',
                            'data-dependency-val'   => 'on'
                        )
                    ),

                    array(
                        'id'            => 'recent_posts_image',
                        'name'          => esc_html__('Show Recent Post Image', 'aiero'),
                        'type'          => 'select',
                        'std'           => 'default',
                        'options'       => array(
                            'default'       => esc_html__('Default', 'aiero'),
                            'on'            => esc_html__('Yes', 'aiero'),
                            'off'           => esc_html__('No', 'aiero')
                        ),
                        'attributes'    => array(
                            'data-dependency-id'    => 'recent_posts_customize',
                            'data-dependency-val'   => 'on'
                        )
                    ),

                    array(
                        'id'            => 'recent_posts_category',
                        'name'          => esc_html__('Show Recent Post Categories', 'aiero'),
                        'type'          => 'select',
                        'std'           => 'default',
                        'options'       => array(
                            'default'       => esc_html__('Default', 'aiero'),
                            'on'            => esc_html__('Yes', 'aiero'),
                            'off'           => esc_html__('No', 'aiero')
                        ),
                        'attributes'    => array(
                            'data-dependency-id'    => 'recent_posts_customize',
                            'data-dependency-val'   => 'on'
                        )
                    ),

                    array(
                        'id'            => 'recent_posts_date',
                        'name'          => esc_html__('Show Recent Post Date', 'aiero'),
                        'type'          => 'select',
                        'std'           => 'default',
                        'options'       => array(
                            'default'       => esc_html__('Default', 'aiero'),
                            'on'            => esc_html__('Yes', 'aiero'),
                            'off'           => esc_html__('No', 'aiero')
                        ),
                        'attributes'    => array(
                            'data-dependency-id'    => 'recent_posts_customize',
                            'data-dependency-val'   => 'on'
                        )
                    ),

                    array(
                        'id'            => 'recent_posts_author',
                        'name'          => esc_html__('Show Recent Post Author', 'aiero'),
                        'type'          => 'select',
                        'std'           => 'default',
                        'options'       => array(
                            'default'       => esc_html__('Default', 'aiero'),
                            'on'            => esc_html__('Yes', 'aiero'),
                            'off'           => esc_html__('No', 'aiero')
                        ),
                        'attributes'    => array(
                            'data-dependency-id'    => 'recent_posts_customize',
                            'data-dependency-val'   => 'on'
                        )
                    ),

                    array(
                        'id'            => 'recent_posts_title',
                        'name'          => esc_html__('Show Recent Post Title', 'aiero'),
                        'type'          => 'select',
                        'std'           => 'default',
                        'options'       => array(
                            'default'       => esc_html__('Default', 'aiero'),
                            'on'            => esc_html__('Yes', 'aiero'),
                            'off'           => esc_html__('No', 'aiero')
                        ),
                        'attributes'    => array(
                            'data-dependency-id'    => 'recent_posts_customize',
                            'data-dependency-val'   => 'on'
                        )
                    ),

                    array(
                        'id'            => 'recent_posts_excerpt',
                        'name'          => esc_html__('Show Recent Post Excerpt', 'aiero'),
                        'type'          => 'select',
                        'std'           => 'default',
                        'options'       => array(
                            'default'       => esc_html__('Default', 'aiero'),
                            'on'            => esc_html__('Yes', 'aiero'),
                            'off'           => esc_html__('No', 'aiero')
                        ),
                        'attributes'    => array(
                            'data-dependency-id'    => 'recent_posts_customize',
                            'data-dependency-val'   => 'on'
                        )
                    ),

                    array(
                        'id'            => 'recent_posts_excerpt_length',
                        'name'          => esc_html__('Recent Post Excerpt Length', 'aiero'),
                        'type'          => 'number',
                        'placeholder'   => aiero_get_theme_mod('recent_posts_excerpt_length'),
                        'std'           => '',
                        'attributes'    => array(
                            'data-dependency-id'    => 'recent_posts_customize',
                            'data-dependency-val'   => 'on'
                        )
                    ),

                    array(
                        'id'            => 'recent_posts_tags',
                        'name'          => esc_html__('Show Recent Post Tags', 'aiero'),
                        'type'          => 'select',
                        'std'           => 'default',
                        'options'       => array(
                            'default'       => esc_html__('Default', 'aiero'),
                            'on'            => esc_html__('Yes', 'aiero'),
                            'off'           => esc_html__('No', 'aiero')
                        ),
                        'attributes'    => array(
                            'data-dependency-id'    => 'recent_posts_customize',
                            'data-dependency-val'   => 'on'
                        )
                    ),

                    array(
                        'id'            => 'recent_posts_more',
                        'name'          => esc_html__('Show Recent Post \'Read More\' Button', 'aiero'),
                        'type'          => 'select',
                        'std'           => 'default',
                        'options'       => array(
                            'default'       => esc_html__('Default', 'aiero'),
                            'on'            => esc_html__('Yes', 'aiero'),
                            'off'           => esc_html__('No', 'aiero')
                        ),
                        'attributes'    => array(
                            'data-dependency-id'    => 'recent_posts_customize',
                            'data-dependency-val'   => 'on'
                        )
                    )
                )
            );

            # Projects Custom Fields
            $meta_boxes[] = array(
                'title'         => esc_html__('Project Fields', 'aiero'),
                'post_types'    => array('aiero_project'),
                'context'       => 'advanced',
                'fields'        => array(
                    array(
                        'id'            => 'project_description',
                        'name'          => esc_html__('Project Description', 'aiero'),
                        'type'          => 'wysiwyg',
                        'options'       => array(
                            'textarea_rows' => 6
                        )
                    ),
                    array(
                        'id'                => 'project_logo_image',
                        'name'              => esc_html__('Project Logo Image', 'aiero'),
                        'type'              => 'image_advanced',
                        'max_file_uploads'  => 1,
                        'max_status'        => false,
                        'size'              => 'full'
                    ),
                    array(
                        'id'            => 'project_year',
                        'name'          => esc_html__('Year', 'aiero'),
                        'type'          => 'text'
                    ),
                    array(
                        'id'            => 'project_strategy',
                        'name'          => esc_html__('Strategy', 'aiero'),
                        'type'          => 'text',
                        'add_button'    => esc_html__('+ Add More', 'aiero'),
                        'clone'         => true
                    ),
                    array(
                        'id'            => 'project_design',
                        'name'          => esc_html__('Design', 'aiero'),
                        'type'          => 'text',
                        'add_button'    => esc_html__('+ Add More', 'aiero'),
                        'clone'         => true
                    ),
                    array(
                        'id'            => 'project_client',
                        'name'          => esc_html__('Client', 'aiero'),
                        'type'          => 'text'
                    ),
                    array(
                        'id'            => 'project_button',
                        'name'          => esc_html__('Link Button', 'aiero'),
                        'type'          => 'text_list',
                        'options'       => array(
                            esc_attr__('Link', 'aiero')   => esc_html__('Link', 'aiero'),
                            esc_attr__('Label', 'aiero')  => esc_html__('Label', 'aiero')
                        ),
                        'clone'         => false
                    ),
                    array(
                        'type' => 'divider',
                    ),
                    array(
                        'id'                => 'project_audio_image',
                        'name'              => esc_html__('Audio Content Type Slider Image', 'aiero'),
                        'type'              => 'image_advanced',
                        'max_file_uploads'  => 1,
                        'max_status'        => false,
                        'size'              => 'thumbnail'
                    ),
                    array(
                        'id'                => 'project_audio_file',
                        'name'              => esc_html__('Slider Audio File', 'aiero'),
                        'type'              => 'file_advanced',
                        'max_file_uploads'  => 1,
                        'mime_type'        => 'audio',
                    ),
                    array(
                        'id'                => 'project_cards_image',
                        'name'              => esc_html__('Cards Listing Image', 'aiero'),
                        'type'              => 'image_advanced',
                        'max_file_uploads'  => 1,
                        'max_status'        => false,
                        'size'              => 'full'
                    ),
                )
            );

            # Team Member Custom Fields
            $meta_boxes[] = array(
                'title'         => esc_html__('Team Member Fields', 'aiero'),
                'post_types'    => array('aiero_team_member'),
                'context'       => 'advanced',
                'fields'        => array(
                    array(
                        'id'            => 'team_member_position',
                        'name'          => esc_html__('Position', 'aiero'),
                        'type'          => 'text'
                    ),
                    array(
                        'id'            => 'team_member_tag',
                        'name'          => esc_html__('Team Member Tag', 'aiero'),
                        'type'          => 'text'
                    ),
                    array(
                        'type' => 'divider',
                    ),
                    array(
                        'id'            => 'team_member_short_text',
                        'name'          => esc_html__('Member Short Info', 'aiero'),
                        'type'          => 'wysiwyg',
                        'options'       => array(
                            'textarea_rows' => 6,
                            'teeny'         => true
                        ),
                    ),
                    array(
                        'type' => 'divider',
                    ),
                    array(
                        'id'            => 'team_member_experience_title',
                        'name'          => esc_html__('Experience & Education Section Title', 'aiero'),
                        'type'          => 'text',
                        'std'           => wp_kses_post(__('My experience<br> & years of education', 'aiero'))
                    ),
                    array(
                        'id'            => 'team_member_education_list',
                        'name'          => esc_html__('Education List', 'aiero'),
                        'type'          => 'text_list',
                        'clone'         => true,
                        'options'       => array(                            
                            esc_attr__('Period', 'aiero')         => esc_html__('Period', 'aiero'),
                            esc_attr__('Title', 'aiero')          => esc_html__('Title', 'aiero'),
                            esc_attr__('Description', 'aiero')    => esc_html__('Description', 'aiero'),
                        ),
                        'add_button'    => esc_html__('+ Add More', 'aiero')
                    ),
                    array(
                        'id'            => 'team_member_experience_list',
                        'name'          => esc_html__('Experience List', 'aiero'),
                        'type'          => 'text_list',
                        'clone'         => true,
                        'options'       => array(
                            esc_attr__('Period', 'aiero')         => esc_html__('Period', 'aiero'),
                            esc_attr__('Title', 'aiero')          => esc_html__('Title', 'aiero'),                            
                            esc_attr__('Description', 'aiero')    => esc_html__('Description', 'aiero'),
                        ),
                        'add_button'    => esc_html__('+ Add More', 'aiero')
                    ),
                    array(
                        'type' => 'divider',
                    ),
                    array(
                        'id'            => 'team_member_socials',
                        'name'          => esc_html__('Social Links', 'aiero'),
                        'type'          => 'key_value',
                        'placeholder'   => array(
                            'key'           => esc_attr__('Icon', 'aiero'),
                            'value'         => esc_attr__('Link', 'aiero')
                        ),
                        'add_button'    => esc_html__('+ Add More', 'aiero'),
                        'class'         => 'icon-picker',
                        'clone'         => true,
                        'sort_clone'    => true,
                        'max_clone'     => 7
                    ),
                    array(
                        'type' => 'divider',
                    ),
                    array(
                        'id'            => 'team_member_contact_info_title',
                        'name'          => esc_html__('Contact Information Title', 'aiero'),
                        'type'          => 'text',
                        'std'           => esc_html__('Contact Information', 'aiero')
                    ),
                    array(
                        'id'            => 'team_member_contact_info_item',
                        'name'          => esc_html__('Contact Information Item', 'aiero'),
                        'type'          => 'text',
                        'clone'         => true,
                        'add_button'    => esc_html__('+ Add More', 'aiero')
                    ),
                    array(
                        'id'            => 'team_member_email',
                        'name'          => esc_html__('Contact Information E-mail', 'aiero'),
                        'type'          => 'text'
                    ),
                    array(
                        'type' => 'divider',
                    ),
                    array(
                        'id'                => 'team_member_logo_image',
                        'name'              => esc_html__('Achievement Logo Image', 'aiero'),
                        'type'              => 'image_advanced',
                        'max_file_uploads'  => 1,
                        'max_status'        => false,
                        'size'              => 'full'
                    ),
                    array(
                        'type' => 'divider',
                    ),
                    array(
                        'id'            => 'team_member_responsibilities_title',
                        'name'          => esc_html__('Responsibilities Title', 'aiero'),
                        'type'          => 'text',
                        'std'           => esc_html__('Responsibilities', 'aiero')
                    ),
                    array(
                        'id'            => 'team_member_responsibilities_list',
                        'name'          => esc_html__('Responsibilities List', 'aiero'),
                        'type'          => 'text',
                        'clone'         => true,
                        'add_button'    => esc_html__('+ Add More', 'aiero')
                    ),                   
                )
            );

            # Service Post Icon Settings
            $meta_boxes[] = array(
                'title'         => esc_html__('Service Icons', 'aiero'),
                'post_types'    => array('aiero_service'),
                'context'       => 'advanced',
                'fields'        => array(
                    array(
                        'id'            => 'service_main_icon',
                        'type'          => 'iconpicker',
                        'name'          => esc_html__('Font Icon', 'aiero'),
                    ),
                    array(
                        'id'            => 'service_main_icon_color',
                        'name'          => esc_html__('Font Icon Color', 'aiero'),
                        'type'          => 'color',
                        'std'           => '',
                        'alpha_channel' => true
                    ),
                    array(
                        'type' => 'textarea',
                        'name' => esc_html__( 'SVG Icon Code', 'aiero' ),
                        'id'   => 'service_icon_svg',
                        'rows' => 10,
                        'sanitize_callback' => 'none'
                    ),
                    array(
                        'id'            => 'service_svg_icon_color',
                        'name'          => esc_html__('SVG Icon Color', 'aiero'),
                        'type'          => 'color',
                        'std'           => '',
                        'alpha_channel' => true
                    ),
                )
            );

            $meta_boxes[] = array(
                'title'         => esc_html__('Service Subtitle', 'aiero'),
                'post_types'    => array('aiero_service'),
                'context'       => 'advanced',
                'fields'        => array(
                    array(
                        'id'        => 'service_subtitle',
                        'name'      => esc_html__('Service Subtitle', 'aiero'),
                        'type'      => 'text',
                    ),
                )
            );

            # Service Content Output Settings
            $meta_boxes[] = array(
                'title'         => esc_html__('Single Service Settings', 'aiero'),
                'post_types'    => array('aiero_service'),
                'context'       => 'advanced',
                'fields'        => array(
                    array(
                        'id'        => 'service_title_status',
                        'name'      => esc_html__('Show Service Title', 'aiero'),
                        'type'      => 'select',
                        'std'       => 'default',
                        'options'   => array(
                            'default'   => esc_html__('Default', 'aiero'),
                            'on'        => esc_html__('Yes', 'aiero'),
                            'off'       => esc_html__('No', 'aiero')
                        )
                    ),
                    array(
                        'id'        => 'service_media_status',
                        'name'      => esc_html__('Show Service Featured Image', 'aiero'),
                        'type'      => 'select',
                        'std'       => 'default',
                        'options'   => array(
                            'default'   => esc_html__('Default', 'aiero'),
                            'on'        => esc_html__('Yes', 'aiero'),
                            'off'       => esc_html__('No', 'aiero')
                        )
                    ),
                )
            );

            # Project Content Output Settings
            $meta_boxes[] = array(
                'title'         => esc_html__('Single Post Settings', 'aiero'),
                'post_types'    => array('aiero_project'),
                'context'       => 'advanced',
                'fields'        => array(
                    array(
                        'id'        => 'project_title_status',
                        'name'      => esc_html__('Show Project Title', 'aiero'),
                        'type'      => 'select',
                        'std'       => 'default',
                        'options'   => array(
                            'default'   => esc_html__('Default', 'aiero'),
                            'on'        => esc_html__('Yes', 'aiero'),
                            'off'       => esc_html__('No', 'aiero')
                        )
                    ),
                )
            );

            # Case Study Custom Fields
            $meta_boxes[] = array(
                'title'         => esc_html__('Case Study Fields', 'aiero'),
                'post_types'    => array('aiero_case_study'),
                'context'       => 'advanced',
                'fields'        => array(
                    array(
                        'id'                => 'case_study_logo',
                        'name'              => esc_html__('Logo Image', 'aiero'),
                        'type'              => 'image_advanced',
                        'max_file_uploads'  => 1,
                        'max_status'        => false,
                        'size'              => 'full'
                    ),
                    array(
                        'id'        => 'case_study_client',
                        'name'      => esc_html__('Client', 'aiero'),
                        'type'      => 'text'
                    ),
                    array(
                        'id'            => 'case_study_sector',
                        'name'          => esc_html__('Sector', 'aiero'),
                        'type'          => 'text',
                        'add_button'    => esc_html__('+ Add More', 'aiero'),
                        'clone'         => true
                    ),

                    array(
                        'id'        => 'case_study_offering',
                        'name'      => esc_html__('Offering', 'aiero'),
                        'type'      => 'text'
                    ),                    
                    array(
                        'id'        => 'case_study_features',
                        'name'      => 'Features',
                        'type'      => 'wysiwyg',
                        'raw'       => false,
                        'options'   => array(
                            'textarea_rows' => 8,
                            'teeny'         => true,
                        ),
                    ),
                )
            );

            # Content Output Settings
            $meta_boxes[] = array(
                'title'         => esc_html__('Case Study Settings', 'aiero'),
                'post_types'    => array('aiero_case_study'),
                'context'       => 'advanced',
                'fields'        => array(

                    array(
                        'id'        => 'post_media_image_status',
                        'name'      => esc_html__('Show Media Block', 'aiero'),
                        'type'      => 'select',
                        'std'       => 'default',
                        'options'   => array(
                            'default'   => esc_html__('Default', 'aiero'),
                            'on'        => esc_html__('Yes', 'aiero'),
                            'off'       => esc_html__('No', 'aiero')
                        )
                    ),

                    array(
                        'id'        => 'post_category_status',
                        'name'      => esc_html__('Show Post Categories', 'aiero'),
                        'type'      => 'select',
                        'std'       => 'default',
                        'options'   => array(
                            'default'   => esc_html__('Default', 'aiero'),
                            'on'        => esc_html__('Yes', 'aiero'),
                            'off'       => esc_html__('No', 'aiero')
                        )
                    ),

                    array(
                        'id'        => 'post_date_status',
                        'name'      => esc_html__('Show Post Date', 'aiero'),
                        'type'      => 'select',
                        'std'       => 'default',
                        'options'   => array(
                            'default'   => esc_html__('Default', 'aiero'),
                            'on'        => esc_html__('Yes', 'aiero'),
                            'off'       => esc_html__('No', 'aiero')
                        )
                    ),

                    array(
                        'id'        => 'post_author_status',
                        'name'      => esc_html__('Show Post Author', 'aiero'),
                        'type'      => 'select',
                        'std'       => 'default',
                        'options'   => array(
                            'default'   => esc_html__('Default', 'aiero'),
                            'on'        => esc_html__('Yes', 'aiero'),
                            'off'       => esc_html__('No', 'aiero')
                        )
                    ),

                    array(
                        'id'        => 'post_title_status',
                        'name'      => esc_html__('Show Post Title', 'aiero'),
                        'type'      => 'select',
                        'std'       => 'default',
                        'options'   => array(
                            'default'   => esc_html__('Default', 'aiero'),
                            'on'        => esc_html__('Yes', 'aiero'),
                            'off'       => esc_html__('No', 'aiero')
                        )
                    ),

                    array(
                        'id'        => 'post_tags_status',
                        'name'      => esc_html__('Show Post Tags', 'aiero'),
                        'type'      => 'select',
                        'std'       => 'default',
                        'options'   => array(
                            'default'   => esc_html__('Default', 'aiero'),
                            'on'        => esc_html__('Yes', 'aiero'),
                            'off'       => esc_html__('No', 'aiero')
                        )
                    ),
                )
            );

            # Post and Page Settings
            $meta_boxes[] = array(
                'title'         => esc_html__('Color Settings', 'aiero'),
                'post_types'    => array('post', 'page', 'aiero_project', 'aiero_team_member', 'aiero_service', 'aiero_case_study', 'product'),
                'closed'        => true,
                'context'       => 'advanced',
                'fields'        => array(

                    # Color Options

                    //-- Standard colors
                    array(
                        'type'  => 'heading',
                        'name'  => esc_html__('Standard Colors', 'aiero'),
                    ),

                    array(
                        'id'            => 'standard_default_text_color',
                        'name'          => esc_html__('Default Text Color', 'aiero'),
                        'type'          => 'color',
                        'std'           => '',
                        'alpha_channel' => true
                    ),

                    array(
                        'id'            => 'standard_dark_text_color',
                        'name'          => esc_html__('Dark Text Color', 'aiero'),
                        'type'          => 'color',
                        'std'           => '',
                        'alpha_channel' => true
                    ),

                    array(
                        'id'            => 'standard_light_text_color',
                        'name'          => esc_html__('Light Text Color', 'aiero'),
                        'type'          => 'color',
                        'std'           => '',
                        'alpha_channel' => true
                    ),

                    array(
                        'id'            => 'standard_accent_text_color',
                        'name'          => esc_html__('Accent Text Color', 'aiero'),
                        'type'          => 'color',
                        'std'           => '',
                        'alpha_channel' => true
                    ),
                    array(
                        'id'            => 'standard_contrast_text_color',
                        'name'          => esc_html__('Contrast Text Color', 'aiero'),
                        'type'          => 'color',
                        'std'           => '',
                        'alpha_channel' => true
                    ),  
                    array(
                        'id'            => 'standard_input_dark_color',
                        'name'          => esc_html__('Input Dark Color', 'aiero'),
                        'type'          => 'color',
                        'std'           => '',
                        'alpha_channel' => true
                    ),              

                    array(
                        'type' => 'divider',
                    ),

                    array(
                        'id'            => 'standard_border_color',
                        'name'          => esc_html__('Border Color', 'aiero'),
                        'type'          => 'color',
                        'std'           => '',
                        'alpha_channel' => true
                    ),

                    array(
                        'id'            => 'standard_border_hover_color',
                        'name'          => esc_html__('Hovered Border Color', 'aiero'),
                        'type'          => 'color',
                        'std'           => '',
                        'alpha_channel' => true
                    ),

                    array(
                        'type' => 'divider',
                    ),

                    array(
                        'id'            => 'standard_background_color',
                        'name'          => esc_html__('Background Color', 'aiero'),
                        'type'          => 'color',
                        'std'           => '',
                        'alpha_channel' => true
                    ),

                    array(
                        'id'            => 'standard_background_alter_color',
                        'name'          => esc_html__('Alternative Background Color', 'aiero'),
                        'type'          => 'color',
                        'std'           => '',
                        'alpha_channel' => true
                    ),

                    array(
                        'type' => 'divider',
                    ),

                    array(
                        'id'            => 'standard_button_text_color',
                        'name'          => esc_html__('Button Text Color', 'aiero'),
                        'type'          => 'color',
                        'std'           => '',
                        'alpha_channel' => true
                    ),

                    array(
                        'id'            => 'standard_button_border_color',
                        'name'          => esc_html__('Button Border Color', 'aiero'),
                        'type'          => 'color',
                        'std'           => '',
                        'alpha_channel' => true
                    ),

                    array(
                        'id'            => 'standard_button_border_color_add',
                        'name'          => esc_html__('Button Border Color Additional', 'aiero'),
                        'type'          => 'color',
                        'std'           => '',
                        'alpha_channel' => true
                    ),

                    array(
                        'id'            => 'standard_button_background_color',
                        'name'          => esc_html__('Button Background Color', 'aiero'),
                        'type'          => 'color',
                        'std'           => '',
                        'alpha_channel' => true
                    ),

                    array(
                        'id'            => 'standard_button_background_color_add',
                        'name'          => esc_html__('Button Background Color Additional', 'aiero'),
                        'type'          => 'color',
                        'std'           => '',
                        'alpha_channel' => true
                    ),

                    array(
                        'id'            => 'standard_button_text_hover',
                        'name'          => esc_html__('Button Text Hover', 'aiero'),
                        'type'          => 'color',
                        'std'           => '',
                        'alpha_channel' => true
                    ),

                    array(
                        'id'            => 'standard_button_border_hover',
                        'name'          => esc_html__('Button Border Hover', 'aiero'),
                        'type'          => 'color',
                        'std'           => '',
                        'alpha_channel' => true
                    ),

                    array(
                        'id'            => 'standard_button_border_hover_add',
                        'name'          => esc_html__('Button Border Hover Additional', 'aiero'),
                        'type'          => 'color',
                        'std'           => '',
                        'alpha_channel' => true
                    ),

                    array(
                        'id'            => 'standard_button_background_hover',
                        'name'          => esc_html__('Button Background Hover', 'aiero'),
                        'type'          => 'color',
                        'std'           => '',
                        'alpha_channel' => true
                    ),

                    array(
                        'id'            => 'standard_button_background_hover_add',
                        'name'          => esc_html__('Button Background Hover Additional', 'aiero'),
                        'type'          => 'color',
                        'std'           => '',
                        'alpha_channel' => true
                    ),

                    array(
                        'id'        => 'standard_button_border_style',
                        'name'      => esc_html__('Button Border Style', 'aiero'),
                        'type'      => 'select',
                        'std'       => 'default',
                        'options'   => array(
                            'default'     => esc_html__('Default', 'aiero'),
                            'gradient'    => esc_html__('Gradient', 'aiero'),
                            'solid'       => esc_html__('Solid', 'aiero')
                        )
                    ),

                    array(
                        'id'        => 'standard_background_border_style',
                        'name'      => esc_html__('Button Background Style', 'aiero'),
                        'type'      => 'select',
                        'std'       => 'default',
                        'options'   => array(
                            'default'     => esc_html__('Default', 'aiero'),
                            'gradient'    => esc_html__('Gradient', 'aiero'),
                            'solid'       => esc_html__('Solid', 'aiero')
                        )
                    ),

                    array(
                        'type' => 'divider',
                    ),

                    //-- Contrast Colors
                    array(
                        'type'  => 'heading',
                        'name'  => esc_html__('Contrast Colors', 'aiero'),
                    ),

                    array(
                        'id'            => 'contrast_default_text_color',
                        'name'          => esc_html__('Default Text Color', 'aiero'),
                        'type'          => 'color',
                        'std'           => '',
                        'alpha_channel' => true
                    ),

                    array(
                        'id'            => 'contrast_dark_text_color',
                        'name'          => esc_html__('Dark Text Color', 'aiero'),
                        'type'          => 'color',
                        'std'           => '',
                        'alpha_channel' => true
                    ),

                    array(
                        'id'            => 'contrast_light_text_color',
                        'name'          => esc_html__('Light Text Color', 'aiero'),
                        'type'          => 'color',
                        'std'           => '',
                        'alpha_channel' => true
                    ),

                    array(
                        'id'            => 'contrast_accent_text_color',
                        'name'          => esc_html__('Accent Text Color', 'aiero'),
                        'type'          => 'color',
                        'std'           => '',
                        'alpha_channel' => true
                    ),

                    array(
                        'id'            => 'contrast_input_dark_color',
                        'name'          => esc_html__('Input Dark Color', 'aiero'),
                        'type'          => 'color',
                        'std'           => '',
                        'alpha_channel' => true
                    ),    

                    array(
                        'type' => 'divider',
                    ),

                    array(
                        'id'            => 'contrast_border_color',
                        'name'          => esc_html__('Border Color', 'aiero'),
                        'type'          => 'color',
                        'std'           => '',
                        'alpha_channel' => true
                    ),

                    array(
                        'id'            => 'contrast_border_hover_color',
                        'name'          => esc_html__('Hovered Border Color', 'aiero'),
                        'type'          => 'color',
                        'std'           => '',
                        'alpha_channel' => true
                    ),

                    array(
                        'type' => 'divider',
                    ),

                    array(
                        'id'            => 'contrast_background_color',
                        'name'          => esc_html__('Background Color', 'aiero'),
                        'type'          => 'color',
                        'std'           => '',
                        'alpha_channel' => true
                    ),

                    array(
                        'id'            => 'contrast_background_alter_color',
                        'name'          => esc_html__('Alternative Background Color', 'aiero'),
                        'type'          => 'color',
                        'std'           => '',
                        'alpha_channel' => true
                    ),

                    array(
                        'type' => 'divider',
                    ),

                    array(
                        'id'            => 'contrast_button_text_color',
                        'name'          => esc_html__('Button Text Color', 'aiero'),
                        'type'          => 'color',
                        'std'           => '',
                        'alpha_channel' => true
                    ),

                    array(
                        'id'            => 'contrast_button_border_color',
                        'name'          => esc_html__('Button Border Color', 'aiero'),
                        'type'          => 'color',
                        'std'           => '',
                        'alpha_channel' => true
                    ),

                    array(
                        'id'            => 'contrast_button_border_color_add',
                        'name'          => esc_html__('Button Border Color Additional', 'aiero'),
                        'type'          => 'color',
                        'std'           => '',
                        'alpha_channel' => true
                    ),

                    array(
                        'id'            => 'contrast_button_background_color',
                        'name'          => esc_html__('Button Background Color', 'aiero'),
                        'type'          => 'color',
                        'std'           => '',
                        'alpha_channel' => true
                    ),

                    array(
                        'id'            => 'contrast_button_background_color_add',
                        'name'          => esc_html__('Button Background Color Additional', 'aiero'),
                        'type'          => 'color',
                        'std'           => '',
                        'alpha_channel' => true
                    ),

                    array(
                        'id'            => 'contrast_button_text_hover',
                        'name'          => esc_html__('Button Text Hover', 'aiero'),
                        'type'          => 'color',
                        'std'           => '',
                        'alpha_channel' => true
                    ),

                    array(
                        'id'            => 'contrast_button_border_hover',
                        'name'          => esc_html__('Button Border Hover', 'aiero'),
                        'type'          => 'color',
                        'std'           => '',
                        'alpha_channel' => true
                    ),

                    array(
                        'id'            => 'contrast_button_border_hover_add',
                        'name'          => esc_html__('Button Border Hover Additional', 'aiero'),
                        'type'          => 'color',
                        'std'           => '',
                        'alpha_channel' => true
                    ),

                    array(
                        'id'            => 'contrast_button_background_hover',
                        'name'          => esc_html__('Button Background Hover', 'aiero'),
                        'type'          => 'color',
                        'std'           => '',
                        'alpha_channel' => true
                    ),

                    array(
                        'id'            => 'contrast_button_background_hover_add',
                        'name'          => esc_html__('Button Background Hover Additional', 'aiero'),
                        'type'          => 'color',
                        'std'           => '',
                        'alpha_channel' => true
                    ),

                    array(
                        'id'        => 'contrast_button_border_style',
                        'name'      => esc_html__('Button Border Style', 'aiero'),
                        'type'      => 'select',
                        'std'       => 'default',
                        'options'   => array(
                            'default'     => esc_html__('Default', 'aiero'),
                            'gradient'    => esc_html__('Gradient', 'aiero'),
                            'solid'       => esc_html__('Solid', 'aiero')
                        )
                    ),

                    array(
                        'id'        => 'contrast_button_background_style',
                        'name'      => esc_html__('Button Background Style', 'aiero'),
                        'type'      => 'select',
                        'std'       => 'default',
                        'options'   => array(
                            'default'     => esc_html__('Default', 'aiero'),
                            'gradient'    => esc_html__('Gradient', 'aiero'),
                            'solid'       => esc_html__('Solid', 'aiero')
                        )
                    ),
                )
            );

             $meta_boxes[] = array(
                'title'         => esc_html__('Page Settings', 'aiero'),
                'post_types'    => array('post', 'page', 'aiero_project', 'aiero_team_member', 'aiero_service', 'aiero_case_study', 'product'),
                'closed'        => true,
                'context'       => 'advanced',
                'fields'        => array(
                    array(
                        'id'        => 'page_background_image_top_status',
                        'name'      => esc_html__('Show Top Background Image', 'aiero'),
                        'type'      => 'select',
                        'std'       => 'default',
                        'class'             => 'divider-before',
                        'options'   => array(
                            'default'   => esc_html__('Default', 'aiero'),
                            'on'        => esc_html__('Show', 'aiero'),
                            'off'       => esc_html__('Hide', 'aiero')
                        )
                    ),

                    array(
                        'id'                => 'page_background_image_top',
                        'name'              => esc_html__('Top Background Image', 'aiero'),
                        'type'              => 'image_advanced',
                        'max_file_uploads'  => 1,
                        'max_status'        => false,
                        'size'              => 'full',                        
                        'attributes'        => array(
                            'data-dependency-id'    => 'page_background_image_top_status',
                            'data-dependency-val'   => 'on'
                        )
                    ),

                    array(
                        'id'            => 'page_background_image_top_repeat',
                        'name'          => esc_html__('Top Background Image Background Repeat', 'aiero'),
                        'type'          => 'select',
                        'std'           => 'default',
                        'options'       => array(
                            'default'       => esc_html__('Default', 'aiero'),
                            'no-repeat'     => esc_html__('No-repeat', 'aiero'),
                            'repeat'        => esc_html__('Repeat', 'aiero'),
                            'repeat-x'      => esc_html__('Repeat-x', 'aiero'),
                            'repeat-y'      => esc_html__('Repeat-y', 'aiero')
                        ),
                        'attributes'    => array(
                            'data-dependency-id'    => 'page_background_image_top_status',
                            'data-dependency-val'   => 'on'
                        )
                    ),

                    array(
                        'id'            => 'page_background_image_top_size',
                        'name'          => esc_html__('Top Background Image Background Size', 'aiero'),
                        'type'          => 'select',
                        'std'           => 'default',
                        'options'       => array(
                            'default'       => esc_html__('Default', 'aiero'),
                            'auto'          => esc_html__('Auto', 'aiero'),
                            'cover'         => esc_html__('Cover', 'aiero'),
                            'contain'       => esc_html__('Contain', 'aiero'),
                            '100% auto'     => esc_html__('Full Width', 'aiero')
                        ),
                        'attributes'    => array(
                            'data-dependency-id'    => 'page_background_image_top_status',
                            'data-dependency-val'   => 'on'
                        )
                    ),
                ),
            );

            $meta_boxes[] = array(
                'title'         => esc_html__('Top Bar Settings', 'aiero'),
                'post_types'    => array('post', 'page', 'aiero_project', 'aiero_team_member', 'aiero_service', 'aiero_case_study',  'product'),
                'closed'        => true,
                'context'       => 'advanced',
                'fields'        => array(

                # Top Bar Options

                    //-- Top Bar General
                    array(
                        'type'  => 'heading',
                        'name'  => esc_html__('General', 'aiero'),
                    ),

                    array(
                        'id'        => 'top_bar_status',
                        'name'      => esc_html__('Show Top Bar', 'aiero'),
                        'type'      => 'select',
                        'std'       => 'default',
                        'options'   => array(
                            'default'   => esc_html__('Default', 'aiero'),
                            'on'        => esc_html__('Yes', 'aiero'),
                            'off'       => esc_html__('No', 'aiero')
                        )
                    ),

                    array(
                        'id'        => 'top_bar_customize',
                        'name'      => esc_html__('Customize', 'aiero'),
                        'type'      => 'select',
                        'std'       => 'default',
                        'options'   => array(
                            'default'   => esc_html__('Default', 'aiero'),
                            'off'       => esc_html__('No', 'aiero'),
                            'on'        => esc_html__('Yes', 'aiero')
                        )
                    ),

                    array(
                        'id'            => 'top_bar_default_text_color',
                        'name'          => esc_html__('Default Text Color', 'aiero'),
                        'type'          => 'color',
                        'alpha_channel' => true,
                        'class'         => 'divider-before',
                        'attributes'    => array(
                            'data-dependency-id'    => 'top_bar_customize',
                            'data-dependency-val'   => 'on'
                        )
                    ),

                    array(
                        'id'            => 'top_bar_dark_text_color',
                        'name'          => esc_html__('Dark Text Color', 'aiero'),
                        'type'          => 'color',
                        'alpha_channel' => true,
                        'attributes'    => array(
                            'data-dependency-id'    => 'top_bar_customize',
                            'data-dependency-val'   => 'on'
                        )
                    ),

                    array(
                        'id'            => 'top_bar_light_text_color',
                        'name'          => esc_html__('Light Text Color', 'aiero'),
                        'type'          => 'color',
                        'alpha_channel' => true,
                        'attributes'    => array(
                            'data-dependency-id'    => 'top_bar_customize',
                            'data-dependency-val'   => 'on'
                        )
                    ),

                    array(
                        'id'            => 'top_bar_accent_text_color',
                        'name'          => esc_html__('Accent Text Color', 'aiero'),
                        'type'          => 'color',
                        'alpha_channel' => true,
                        'attributes'    => array(
                            'data-dependency-id'    => 'top_bar_customize',
                            'data-dependency-val'   => 'on'
                        )
                    ),

                    array(
                        'id'            => 'top_bar_border_color',
                        'name'          => esc_html__('Border Color', 'aiero'),
                        'type'          => 'color',
                        'alpha_channel' => true,
                        'class'         => 'divider-before',
                        'attributes'    => array(
                            'data-dependency-id'    => 'top_bar_customize',
                            'data-dependency-val'   => 'on'
                        )
                    ),

                    array(
                        'id'            => 'top_bar_border_hover_color',
                        'name'          => esc_html__('Hovered Border Color', 'aiero'),
                        'type'          => 'color',
                        'alpha_channel' => true,
                        'attributes'    => array(
                            'data-dependency-id'    => 'top_bar_customize',
                            'data-dependency-val'   => 'on'
                        )
                    ),

                    array(
                        'id'            => 'top_bar_background_color',
                        'name'          => esc_html__('Background Color', 'aiero'),
                        'type'          => 'color',
                        'alpha_channel' => true,
                        'class'         => 'divider-before',
                        'attributes'    => array(
                            'data-dependency-id'    => 'top_bar_customize',
                            'data-dependency-val'   => 'on'
                        )
                    ),

                    array(
                        'id'            => 'top_bar_background_alter_color',
                        'name'          => esc_html__('Alternative Background Color', 'aiero'),
                        'type'          => 'color',
                        'alpha_channel' => true,
                        'attributes'    => array(
                            'data-dependency-id'    => 'top_bar_customize',
                            'data-dependency-val'   => 'on'
                        )
                    ),

                    array(
                        'id'            => 'top_bar_button_text_color',
                        'name'          => esc_html__('Button Text Color', 'aiero'),
                        'type'          => 'color',
                        'alpha_channel' => true,
                        'class'         => 'divider-before',
                        'attributes'    => array(
                            'data-dependency-id'    => 'top_bar_customize',
                            'data-dependency-val'   => 'on'
                        )
                    ),

                    array(
                        'id'            => 'top_bar_button_border_color',
                        'name'          => esc_html__('Button Border Color', 'aiero'),
                        'type'          => 'color',
                        'alpha_channel' => true,
                        'attributes'    => array(
                            'data-dependency-id'    => 'top_bar_customize',
                            'data-dependency-val'   => 'on'
                        )
                    ),

                    array(
                        'id'            => 'top_bar_button_background_color',
                        'name'          => esc_html__('Button Background Color', 'aiero'),
                        'type'          => 'color',
                        'alpha_channel' => true,
                        'attributes'    => array(
                            'data-dependency-id'    => 'top_bar_customize',
                            'data-dependency-val'   => 'on'
                        )
                    ),

                    array(
                        'id'            => 'top_bar_button_text_hover',
                        'name'          => esc_html__('Button Text Hover', 'aiero'),
                        'type'          => 'color',
                        'alpha_channel' => true,
                        'attributes'    => array(
                            'data-dependency-id'    => 'top_bar_customize',
                            'data-dependency-val'   => 'on'
                        )
                    ),

                    array(
                        'id'            => 'top_bar_button_border_hover',
                        'name'          => esc_html__('Button Border Hover', 'aiero'),
                        'type'          => 'color',
                        'alpha_channel' => true,
                        'attributes'    => array(
                            'data-dependency-id'    => 'top_bar_customize',
                            'data-dependency-val'   => 'on'
                        )
                    ),

                    array(
                        'id'            => 'top_bar_button_background_hover',
                        'name'          => esc_html__('Button Background Hover', 'aiero'),
                        'type'          => 'color',
                        'alpha_channel' => true,
                        'attributes'    => array(
                            'data-dependency-id'    => 'top_bar_customize',
                            'data-dependency-val'   => 'on'
                        )
                    ),

                    array(
                        'type' => 'divider',
                    ),

                    //-- Top Bar Social Buttons
                    array(
                        'type'  => 'heading',
                        'name'  => esc_html__('Social Buttons', 'aiero'),
                    ),

                    array(
                        'id'        => 'top_bar_socials_status',
                        'name'      => esc_html__('Show Social Buttons', 'aiero'),
                        'type'      => 'select',
                        'std'       => 'default',
                        'options'   => array(
                            'default'   => esc_html__('Default', 'aiero'),
                            'on'        => esc_html__('Yes', 'aiero'),
                            'off'       => esc_html__('No', 'aiero')
                        )
                    ),
                    array(
                        'id'            => 'top_bar_socials_title',
                        'name'          => esc_html__('Social Buttons Title', 'aiero'),
                        'type'          => 'text',
                        'placeholder'   => aiero_get_theme_mod('top_bar_socials_title'),
                        'std'           => '',
                        'attributes'    => array(
                            'data-dependency-id'    => 'top_bar_socials_status',
                            'data-dependency-val'   => 'on'
                        )
                    ),

                    array(
                        'type' => 'divider',
                    ),

                    //-- Top Bar Additional Text
                    array(
                        'type'  => 'heading',
                        'name'  => esc_html__('Additional Text', 'aiero'),
                    ),

                    array(
                        'id'        => 'top_bar_additional_text_status',
                        'name'      => esc_html__('Show Additional Text', 'aiero'),
                        'type'      => 'select',
                        'std'       => 'default',
                        'options'   => array(
                            'default'   => esc_html__('Default', 'aiero'),
                            'on'        => esc_html__('Yes', 'aiero'),
                            'off'       => esc_html__('No', 'aiero')
                        )
                    ),

                    array(
                        'id'            => 'top_bar_additional_text_title',
                        'name'          => esc_html__('Additional Text Title', 'aiero'),
                        'type'          => 'textarea',
                        'placeholder'   => aiero_get_theme_mod('top_bar_additional_text_title'),
                        'std'           => '',
                        'attributes'    => array(
                            'data-dependency-id'    => 'top_bar_additional_text_status',
                            'data-dependency-val'   => 'on'
                        )
                    ),

                    array(
                        'id'            => 'top_bar_additional_text',
                        'name'          => esc_html__('Additional Text', 'aiero'),
                        'type'          => 'textarea',
                        'placeholder'   => aiero_get_theme_mod('top_bar_additional_text'),
                        'std'           => '',
                        'attributes'    => array(
                            'data-dependency-id'    => 'top_bar_additional_text_status',
                            'data-dependency-val'   => 'on'
                        )
                    ),

                    array(
                        'type' => 'divider',
                    ),

                    //-- Top Bar Contacts
                    array(
                        'type'  => 'heading',
                        'name'  => esc_html__('Contacts', 'aiero'),
                    ),

                    array(
                        'id'            => 'top_bar_contacts_title',
                        'name'          => esc_html__('Mobile Menu Contacts Title', 'aiero'),
                        'type'          => 'text',
                        'placeholder'   => aiero_get_theme_mod('top_bar_contacts_title'),
                        'std'           => ''
                    ),

                    array(
                        'id'        => 'top_bar_contacts_phone_status',
                        'name'      => esc_html__('Show Phone Number', 'aiero'),
                        'type'      => 'select',
                        'std'       => 'default',
                        'options'   => array(
                            'default'   => esc_html__('Default', 'aiero'),
                            'on'        => esc_html__('Yes', 'aiero'),
                            'off'       => esc_html__('No', 'aiero')
                        )
                    ),

                    array(
                        'id'            => 'top_bar_contacts_phone_title',
                        'name'          => esc_html__('Phone Title', 'aiero'),
                        'type'          => 'text',
                        'placeholder'   => aiero_get_theme_mod('top_bar_contacts_phone_title'),
                        'std'           => '',
                        'attributes'    => array(
                            'data-dependency-id'    => 'top_bar_contacts_phone_status',
                            'data-dependency-val'   => 'on'
                        )
                    ),

                    array(
                        'id'            => 'top_bar_contacts_phone',
                        'name'          => esc_html__('Phone Number', 'aiero'),
                        'type'          => 'text',
                        'placeholder'   => aiero_get_theme_mod('top_bar_contacts_phone'),
                        'std'           => '',
                        'attributes'    => array(
                            'data-dependency-id'    => 'top_bar_contacts_phone_status',
                            'data-dependency-val'   => 'on'
                        )
                    ),

                    array(
                        'id'        => 'top_bar_contacts_email_status',
                        'name'      => esc_html__('Show Email Address', 'aiero'),
                        'type'      => 'select',
                        'std'       => 'default',
                        'options'   => array(
                            'default'   => esc_html__('Default', 'aiero'),
                            'on'        => esc_html__('Yes', 'aiero'),
                            'off'       => esc_html__('No', 'aiero')
                        )
                    ),

                     array(
                        'id'            => 'top_bar_contacts_email_title',
                        'name'          => esc_html__('Email Title', 'aiero'),
                        'type'          => 'text',
                        'placeholder'   => aiero_get_theme_mod('top_bar_contacts_email_title'),
                        'std'           => '',
                        'attributes'    => array(
                            'data-dependency-id'    => 'top_bar_contacts_email_status',
                            'data-dependency-val'   => 'on'
                        )
                    ),

                    array(
                        'id'            => 'top_bar_contacts_email',
                        'name'          => esc_html__('Email Address', 'aiero'),
                        'type'          => 'text',
                        'placeholder'   => aiero_get_theme_mod('top_bar_contacts_email'),
                        'std'           => '',
                        'attributes'    => array(
                            'data-dependency-id'    => 'top_bar_contacts_email_status',
                            'data-dependency-val'   => 'on'
                        )
                    ),                    

                    array(
                        'id'        => 'top_bar_contacts_address_status',
                        'name'      => esc_html__('Show Address', 'aiero'),
                        'type'      => 'select',
                        'std'       => 'default',
                        'options'   => array(
                            'default'   => esc_html__('Default', 'aiero'),
                            'on'        => esc_html__('Yes', 'aiero'),
                            'off'       => esc_html__('No', 'aiero')
                        )
                    ),

                    array(
                        'id'            => 'top_bar_contacts_address_title',
                        'name'          => esc_html__('Address Title', 'aiero'),
                        'type'          => 'text',
                        'placeholder'   => aiero_get_theme_mod('top_bar_contacts_address_title'),
                        'std'           => '',
                        'attributes'    => array(
                            'data-dependency-id'    => 'top_bar_contacts_address_status',
                            'data-dependency-val'   => 'on'
                        )
                    ),

                    array(
                        'id'            => 'top_bar_contacts_address',
                        'name'          => esc_html__('Address', 'aiero'),
                        'type'          => 'text',
                        'placeholder'   => aiero_get_theme_mod('top_bar_contacts_address'),
                        'std'           => '',
                        'attributes'    => array(
                            'data-dependency-id'    => 'top_bar_contacts_address_status',
                            'data-dependency-val'   => 'on'
                        )
                    )

                )
            );

            $meta_boxes[] = array(
                'title'         => esc_html__('Header Settings', 'aiero'),
                'post_types'    => array('post', 'page', 'aiero_project', 'aiero_team_member', 'aiero_service', 'aiero_case_study', 'product'),
                'closed'        => true,
                'context'       => 'advanced',
                'fields'        => array(

                # Header Options

                    //-- Header General
                    array(
                        'type'  => 'heading',
                        'name'  => esc_html__('General', 'aiero'),
                    ),

                    array(
                        'id'        => 'header_status',
                        'name'      => esc_html__('Show Header', 'aiero'),
                        'type'      => 'select',
                        'std'       => 'default',
                        'options'   => array(
                            'default'   => esc_html__('Default', 'aiero'),
                            'on'        => esc_html__('Yes', 'aiero'),
                            'off'       => esc_html__('No', 'aiero')
                        )
                    ),

                    array(
                        'id'        => 'header_style',
                        'name'      => esc_html__('Header Style', 'aiero'),
                        'type'      => 'select',
                        'options'   => array(
                            'default'   => esc_html__('Default', 'aiero'),
                            'type-1'    => esc_html__('Style 1', 'aiero'),
                            'type-2'    => esc_html__('Style 2', 'aiero'),
                            'type-3'    => esc_html__('Style 3', 'aiero'),
                            'type-4'    => esc_html__('Style 4', 'aiero')
                        )
                    ),

                    array(
                        'id'        => 'header_position',
                        'name'      => esc_html__('Header Position', 'aiero'),
                        'type'      => 'select',
                        'std'       => 'default',
                        'options'   => array(
                            'default'   => esc_html__('Default', 'aiero'),
                            'above'     => esc_html__('Above', 'aiero'),
                            'over'      => esc_html__('Over', 'aiero')
                        )
                    ),

                    array(
                        'id'            => 'header_transparent',
                        'name'          => esc_html__('Transparent Header', 'aiero'),
                        'type'          => 'checkbox',
                        'std'           => aiero_get_theme_mod('header_transparent')
                    ),

                    array(
                        'id'        => 'header_border',
                        'name'      => esc_html__('Border Style', 'aiero'),
                        'type'      => 'select',
                        'options'   => array(
                            'default' => esc_html__('Default', 'aiero'),
                            'none'    => esc_html__('No Border', 'aiero'),
                            'border'  => esc_html__('Border', 'aiero')
                        )
                    ),

                    array(
                        'id'        => 'header_customize',
                        'name'      => esc_html__('Customize', 'aiero'),
                        'type'      => 'select',
                        'std'       => 'default',
                        'options'   => array(
                            'default'   => esc_html__('Default', 'aiero'),
                            'off'       => esc_html__('No', 'aiero'),
                            'on'        => esc_html__('Yes', 'aiero')
                        )
                    ),

                    array(
                        'id'        => 'header_offset_top',
                        'name'      => esc_html__('Header Offset Top, in px', 'aiero'),
                        'type'      => 'slider',
                        'attributes'    => array(
                            'data-dependency-id'    => 'header_customize',
                            'data-dependency-val'   => 'on'
                        )
                    ),

                    array(
                        'id'            => 'header_default_text_color',
                        'name'          => esc_html__('Default Text Color', 'aiero'),
                        'type'          => 'color',
                        'alpha_channel' => true,
                        'class'         => 'divider-before',
                        'attributes'    => array(
                            'data-dependency-id'    => 'header_customize',
                            'data-dependency-val'   => 'on'
                        )
                    ),

                    array(
                        'id'            => 'header_dark_text_color',
                        'name'          => esc_html__('Dark Text Color', 'aiero'),
                        'type'          => 'color',
                        'alpha_channel' => true,
                        'attributes'    => array(
                            'data-dependency-id'    => 'header_customize',
                            'data-dependency-val'   => 'on'
                        )
                    ),

                    array(
                        'id'            => 'header_light_text_color',
                        'name'          => esc_html__('Light Text Color', 'aiero'),
                        'type'          => 'color',
                        'alpha_channel' => true,
                        'attributes'    => array(
                            'data-dependency-id'    => 'header_customize',
                            'data-dependency-val'   => 'on'
                        )
                    ),

                    array(
                        'id'            => 'header_accent_text_color',
                        'name'          => esc_html__('Accent Text Color', 'aiero'),
                        'type'          => 'color',
                        'alpha_channel' => true,
                        'attributes'    => array(
                            'data-dependency-id'    => 'header_customize',
                            'data-dependency-val'   => 'on'
                        )
                    ),

                    array(
                        'id'            => 'header_current_text_color',
                        'name'          => esc_html__('Current Page/Post Text Color', 'aiero'),
                        'type'          => 'color',
                        'alpha_channel' => true,
                        'attributes'    => array(
                            'data-dependency-id'    => 'header_customize',
                            'data-dependency-val'   => 'on'
                        )
                    ),

                    array(
                        'id'            => 'header_current_background_color',
                        'name'          => esc_html__('Current Page/Post Background Color', 'aiero'),
                        'type'          => 'color',
                        'alpha_channel' => true,
                        'attributes'    => array(
                            'data-dependency-id'    => 'header_customize',
                            'data-dependency-val'   => 'on'
                        )
                    ),

                    array(
                        'id'            => 'header_current_border_color',
                        'name'          => esc_html__('Current Page/Post Border Color', 'aiero'),
                        'type'          => 'color',
                        'alpha_channel' => true,
                        'attributes'    => array(
                            'data-dependency-id'    => 'header_customize',
                            'data-dependency-val'   => 'on'
                        )
                    ),

                    array(
                        'id'            => 'header_border_color',
                        'name'          => esc_html__('Border Color', 'aiero'),
                        'type'          => 'color',
                        'alpha_channel' => true,
                        'class'         => 'divider-before',
                        'attributes'    => array(
                            'data-dependency-id'    => 'header_customize',
                            'data-dependency-val'   => 'on'
                        )
                    ),

                    array(
                        'id'            => 'header_border_hover_color',
                        'name'          => esc_html__('Hovered Border Color', 'aiero'),
                        'type'          => 'color',
                        'alpha_channel' => true,
                        'attributes'    => array(
                            'data-dependency-id'    => 'header_customize',
                            'data-dependency-val'   => 'on'
                        )
                    ),

                    array(
                        'id'            => 'header_background_color',
                        'name'          => esc_html__('Background Color', 'aiero'),
                        'type'          => 'color',
                        'alpha_channel' => true,
                        'class'         => 'divider-before',
                        'attributes'    => array(
                            'data-dependency-id'    => 'header_customize',
                            'data-dependency-val'   => 'on'
                        )
                    ),

                    array(
                        'id'            => 'header_background_alter_color',
                        'name'          => esc_html__('Alternative Background Color', 'aiero'),
                        'type'          => 'color',
                        'alpha_channel' => true,
                        'attributes'    => array(
                            'data-dependency-id'    => 'header_customize',
                            'data-dependency-val'   => 'on'
                        )
                    ),

                    array(
                        'id'            => 'header_button_text_color',
                        'name'          => esc_html__('Button Text Color', 'aiero'),
                        'type'          => 'color',
                        'alpha_channel' => true,
                        'class'         => 'divider-before',
                        'attributes'    => array(
                            'data-dependency-id'    => 'header_customize',
                            'data-dependency-val'   => 'on'
                        )
                    ),

                    array(
                        'id'            => 'header_button_border_color',
                        'name'          => esc_html__('Button Border Color', 'aiero'),
                        'type'          => 'color',
                        'alpha_channel' => true,
                        'attributes'    => array(
                            'data-dependency-id'    => 'header_customize',
                            'data-dependency-val'   => 'on'
                        )
                    ),

                    array(
                        'id'            => 'header_button_border_color_add',
                        'name'          => esc_html__('Button Border Color Additional', 'aiero'),
                        'type'          => 'color',
                        'alpha_channel' => true,
                        'attributes'    => array(
                            'data-dependency-id'    => 'header_customize',
                            'data-dependency-val'   => 'on'
                        )
                    ),

                    array(
                        'id'            => 'header_button_background_color',
                        'name'          => esc_html__('Button Background Color', 'aiero'),
                        'type'          => 'color',
                        'alpha_channel' => true,
                        'attributes'    => array(
                            'data-dependency-id'    => 'header_customize',
                            'data-dependency-val'   => 'on'
                        )
                    ),

                    array(
                        'id'            => 'header_button_background_color_add',
                        'name'          => esc_html__('Button Background Color Additional', 'aiero'),
                        'type'          => 'color',
                        'alpha_channel' => true,
                        'attributes'    => array(
                            'data-dependency-id'    => 'header_customize',
                            'data-dependency-val'   => 'on'
                        )
                    ),

                    array(
                        'id'            => 'header_button_text_hover',
                        'name'          => esc_html__('Button Text Hover', 'aiero'),
                        'type'          => 'color',
                        'alpha_channel' => true,
                        'attributes'    => array(
                            'data-dependency-id'    => 'header_customize',
                            'data-dependency-val'   => 'on'
                        )
                    ),

                    array(
                        'id'            => 'header_button_border_hover',
                        'name'          => esc_html__('Button Border Hover', 'aiero'),
                        'type'          => 'color',
                        'alpha_channel' => true,
                        'attributes'    => array(
                            'data-dependency-id'    => 'header_customize',
                            'data-dependency-val'   => 'on'
                        )
                    ),

                    array(
                        'id'            => 'header_button_border_hover_add',
                        'name'          => esc_html__('Button Border Hover Additional', 'aiero'),
                        'type'          => 'color',
                        'alpha_channel' => true,
                        'attributes'    => array(
                            'data-dependency-id'    => 'header_customize',
                            'data-dependency-val'   => 'on'
                        )
                    ),

                    array(
                        'id'            => 'header_button_background_hover',
                        'name'          => esc_html__('Button Background Hover', 'aiero'),
                        'type'          => 'color',
                        'alpha_channel' => true,
                        'attributes'    => array(
                            'data-dependency-id'    => 'header_customize',
                            'data-dependency-val'   => 'on'
                        )
                    ),

                    array(
                        'id'            => 'header_button_background_hover_add',
                        'name'          => esc_html__('Button Background Hover Additional', 'aiero'),
                        'type'          => 'color',
                        'alpha_channel' => true,
                        'attributes'    => array(
                            'data-dependency-id'    => 'header_customize',
                            'data-dependency-val'   => 'on'
                        )
                    ),

                    array(
                        'id'        => 'header_button_border_style',
                        'name'      => esc_html__('Button Border Style', 'aiero'),
                        'type'      => 'select',
                        'std'       => 'default',
                        'options'   => array(
                            'default'     => esc_html__('Default', 'aiero'),
                            'gradient'    => esc_html__('Gradient', 'aiero'),
                            'solid'       => esc_html__('Solid', 'aiero')
                        ),
                        'attributes'    => array(
                            'data-dependency-id'    => 'header_customize',
                            'data-dependency-val'   => 'on'
                        )
                    ),

                    array(
                        'id'        => 'header_button_background_style',
                        'name'      => esc_html__('Button Background Style', 'aiero'),
                        'type'      => 'select',
                        'std'       => 'default',
                        'options'   => array(
                            'default'     => esc_html__('Default', 'aiero'),
                            'gradient'    => esc_html__('Gradient', 'aiero'),
                            'solid'       => esc_html__('Solid', 'aiero')
                        ),
                        'attributes'    => array(
                            'data-dependency-id'    => 'header_customize',
                            'data-dependency-val'   => 'on'
                        )
                    ),

                    array(
                        'id'            => 'header_menu_text_color',
                        'name'          => esc_html__('Header Menu Text Color', 'aiero'),
                        'type'          => 'color',
                        'alpha_channel' => true,
                        'attributes'    => array(
                            'data-dependency-id'    => 'header_customize',
                            'data-dependency-val'   => 'on'
                        )
                    ),

                    array(
                        'id'            => 'header_menu_text_color_hover',
                        'name'          => esc_html__('Header Menu Text Hover Color', 'aiero'),
                        'type'          => 'color',
                        'alpha_channel' => true,
                        'attributes'    => array(
                            'data-dependency-id'    => 'header_customize',
                            'data-dependency-val'   => 'on'
                        )
                    ),

                    array(
                        'id'            => 'header_menu_text_background_color_hover',
                        'name'          => esc_html__('Header Menu Text Background Hover Color', 'aiero'),
                        'type'          => 'color',
                        'alpha_channel' => true,
                        'attributes'    => array(
                            'data-dependency-id'    => 'header_customize',
                            'data-dependency-val'   => 'on'
                        )
                    ),

                    array(
                        'id'            => 'header_menu_background_color',
                        'name'          => esc_html__('Header Menu Background Color', 'aiero'),
                        'type'          => 'color',
                        'alpha_channel' => true,
                        'attributes'    => array(
                            'data-dependency-id'    => 'header_customize',
                            'data-dependency-val'   => 'on'
                        )
                    ),

                    array(
                        'type' => 'divider',
                    ),

                    //-- Sticky Header
                    array(
                        'type'  => 'heading',
                        'name'  => esc_html__('Sticky Header', 'aiero'),
                    ),

                    array(
                        'id'        => 'sticky_header_status',
                        'name'      => esc_html__('Show Sticky Header', 'aiero'),
                        'type'      => 'select',
                        'std'       => 'default',
                        'options'   => array(
                            'default'   => esc_html__('Default', 'aiero'),
                            'on'        => esc_html__('Yes', 'aiero'),
                            'off'       => esc_html__('No', 'aiero')
                        )
                    ),

                    array(
                        'id'        => 'sticky_header_blur',
                        'name'      => esc_html__('Sticky Header Blur', 'aiero'),
                        'type'      => 'select',
                        'std'       => 'default',
                        'options'   => array(
                            'default'     => esc_html__('Default', 'aiero'),
                            'on'    => esc_html__('On', 'aiero'),
                            'off'   => esc_html__('Off', 'aiero')
                        ),
                        'attributes'        => array(
                            'data-dependency-id'    => 'sticky_header_status',
                            'data-dependency-val'   => 'on'
                        )
                    ),

                    array(
                        'type' => 'divider',
                    ),

                    //-- Mobile Header
                    array(
                        'type'  => 'heading',
                        'name'  => esc_html__('Mobile Header', 'aiero'),
                    ),

                    array(
                        'id'            => 'mobile_header_breakpoint',
                        'name'          => esc_html__('Mobile Header Breakpoint, in px', 'aiero'),
                        'type'          => 'text',
                        'placeholder'   => aiero_get_theme_mod('mobile_header_breakpoint'),
                        'std'           => ''
                    ),

                    array(
                        'id'        => 'mobile_header_menu_style',
                        'name'      => esc_html__('Mobile Header Menu Trigger Style', 'aiero'),
                        'type'      => 'select',
                        'std'       => 'default',
                        'options'   => array(
                            'default'      => esc_html__('Default', 'aiero'),
                            'fullwidth'    => esc_html__('Fullwidth', 'aiero'),
                            'inline'       => esc_html__('Inline', 'aiero')
                        )
                    ),

                    array(
                        'type' => 'divider',
                    ),

                    //-- Header Logo
                    array(
                        'type'  => 'heading',
                        'name'  => esc_html__('Logo', 'aiero'),
                    ),

                    array(
                        'id'        => 'header_logo_status',
                        'name'      => esc_html__('Show Header Logo', 'aiero'),
                        'type'      => 'select',
                        'std'       => 'default',
                        'options'   => array(
                            'default'   => esc_html__('Default', 'aiero'),
                            'on'        => esc_html__('Yes', 'aiero'),
                            'off'       => esc_html__('No', 'aiero')
                        )
                    ),

                    array(
                        'id'        => 'header_logo_customize',
                        'name'      => esc_html__('Customize', 'aiero'),
                        'type'      => 'select',
                        'std'       => 'default',
                        'options'   => array(
                            'default'   => esc_html__('Default', 'aiero'),
                            'off'       => esc_html__('No', 'aiero'),
                            'on'        => esc_html__('Yes', 'aiero')
                        )
                    ),

                    array(
                        'id'                => 'header_logo_image',
                        'name'              => esc_html__('Logo Image', 'aiero'),
                        'type'              => 'image_advanced',
                        'max_file_uploads'  => 1,
                        'max_status'        => false,
                        'size'              => 'full',
                        'attributes'        => array(
                            'data-dependency-id'    => 'header_logo_customize',
                            'data-dependency-val'   => 'on'
                        )
                    ),

                    array(
                        'id'            => 'header_logo_retina',
                        'name'          => esc_html__('Logo Retina', 'aiero'),
                        'type'          => 'checkbox',
                        'std'           => 1,
                        'attributes'    => array(
                            'data-dependency-id'    => 'header_logo_customize',
                            'data-dependency-val'   => 'on'
                        )
                    ),

                    array(
                        'id'                => 'header_logo_mobile_image',
                        'name'              => esc_html__('Mobile Logo Image', 'aiero'),
                        'type'              => 'image_advanced',
                        'max_file_uploads'  => 1,
                        'max_status'        => false,
                        'size'              => 'full',
                        'attributes'        => array(
                            'data-dependency-id'    => 'header_logo_customize',
                            'data-dependency-val'   => 'on'
                        )
                    ),

                    array(
                        'id'            => 'header_logo_mobile_retina',
                        'name'          => esc_html__('Mobile Logo Retina', 'aiero'),
                        'type'          => 'checkbox',
                        'std'           => 1,
                        'attributes'    => array(
                            'data-dependency-id'    => 'header_logo_customize',
                            'data-dependency-val'   => 'on'
                        )
                    ),

                    array(
                        'type' => 'divider',
                    ),

                    //-- Header Callback
                    array(
                        'type'          => 'heading',
                        'name'          => esc_html__('Header Callback', 'aiero'),
                        'attributes'    => array(
                            'data-dependency-id'    => 'header_style',
                            'data-dependency-val'   => 'type-2'
                        )
                    ),

                    array(
                        'id'            => 'header_callback_status',
                        'name'          => esc_html__('Show Header Callback Block', 'aiero'),
                        'type'          => 'select',
                        'std'           => 'default',
                        'options'       => array(
                            'default'               => esc_html__('Default', 'aiero'),
                            'on'                    => esc_html__('Yes', 'aiero'),
                            'off'                   => esc_html__('No', 'aiero')
                        )
                    ),

                    array(
                        'id'            => 'header_callback_title',
                        'name'          => esc_html__('Header Callback Title', 'aiero'),
                        'type'          => 'text',
                        'placeholder'   => aiero_get_theme_mod('header_callback_title'),
                        'std'           => '',
                        'attributes'    => array(
                            'data-dependency-id'    => 'header_callback_status',
                            'data-dependency-val'   => 'on'
                        )
                    ),

                    array(
                        'id'            => 'header_callback_text',
                        'name'          => esc_html__('Header Callback Text', 'aiero'),
                        'type'          => 'text',
                        'placeholder'   => aiero_get_theme_mod('header_callback_text'),
                        'std'           => '',
                        'attributes'    => array(
                            'data-dependency-id'    => 'header_callback_status',
                            'data-dependency-val'   => 'on'
                        )
                    ),

                    array(
                        'type' => 'divider',
                    ),

                    //-- Header Button
                    array(
                        'type'  => 'heading',
                        'name'  => esc_html__('Header Button', 'aiero'),
                    ),

                    array(
                        'id'        => 'header_button_status',
                        'name'      => esc_html__('Show Header Button', 'aiero'),
                        'type'      => 'select',
                        'std'       => 'default',
                        'options'   => array(
                            'default'   => esc_html__('Default', 'aiero'),
                            'on'        => esc_html__('Yes', 'aiero'),
                            'off'       => esc_html__('No', 'aiero')
                        )
                    ),

                    array(
                        'id'            => 'header_button_text',
                        'name'          => esc_html__('Header Button Text', 'aiero'),
                        'type'          => 'text',
                        'placeholder'   => aiero_get_theme_mod('header_button_text'),
                        'std'           => ''
                    ),

                    array(
                        'id'            => 'header_button_url',
                        'name'          => esc_html__('Header Button Link', 'aiero'),
                        'type'          => 'text',
                        'placeholder'   => aiero_get_theme_mod('header_button_url'),
                        'std'           => ''
                    ),

                    array(
                        'type' => 'divider',
                    ),

                    //-- Header Menu
                    array(
                        'type'  => 'heading',
                        'name'  => esc_html__('Header Menu', 'aiero'),
                    ),

                    array(
                        'id'        => 'header_menu_status',
                        'name'      => esc_html__('Show Main Menu', 'aiero'),
                        'type'      => 'select',
                        'std'       => 'default',
                        'options'   => array(
                            'default'   => esc_html__('Default', 'aiero'),
                            'on'        => esc_html__('Yes', 'aiero'),
                            'off'       => esc_html__('No', 'aiero')
                        )
                    ),

                    array(
                        'id'        => 'header_menu_style',
                        'name'      => esc_html__('Menu Style', 'aiero'),
                        'type'      => 'select',
                        'options'   => array(
                            'default'   => esc_html__('Default', 'aiero'),
                            'standard'  => esc_html__('Standard', 'aiero'),
                            'compact'   => esc_html__('Compact', 'aiero')
                        )
                    ),

                    array(
                        'id'        => 'header_menu_bg_image_status',
                        'name'      => esc_html__('Show Header Menu Close Background Image', 'aiero'),
                        'type'      => 'select',
                        'std'       => 'default',
                        'options'   => array(
                            'default'   => esc_html__('Default', 'aiero'),
                            'on'        => esc_html__('Yes', 'aiero'),
                            'off'       => esc_html__('No', 'aiero')
                        ),
                        'attributes'        => array(
                            'data-dependency-id'    => 'header_menu_style',
                            'data-dependency-val'   => 'compact'
                        )
                    ),

                    array(
                        'id'                => 'header_menu_bg_image',
                        'name'              => esc_html__('Header Menu Close Background Image', 'aiero'),
                        'type'              => 'image_advanced',
                        'max_file_uploads'  => 1,
                        'max_status'        => false,
                        'size'              => 'full',
                        'attributes'        => array(
                            'data-dependency-id'    => 'header_menu_style, header_menu_bg_image_status',
                            'data-dependency-val'   => 'compact, on'
                        )
                    ),

                    array(
                        'id'        => 'header_menu_select',
                        'name'      => esc_html__('Select Menu', 'aiero'),
                        'type'      => 'select',
                        'std'       => 'default',
                        'options'   => aiero_get_all_menu_list()
                    ),

                    array(
                        'id'            => 'header_menu_label',
                        'name'          => esc_html__('Menu label', 'aiero'),
                        'type'          => 'text',
                        'placeholder'   => aiero_get_theme_mod('header_menu_label'),
                        'std'           => '',
                        'attributes'    => array(
                            'data-dependency-id'    => 'header_menu_style',
                            'data-dependency-val'   => 'compact'
                        )
                    ),

                    array(
                        'type' => 'divider',
                    ),

                    //-- Header Side Panel
                    array(
                        'type'  => 'heading',
                        'name'  => esc_html__('Header Icons', 'aiero'),
                    ),

                    array(
                        'id'        => 'side_panel_status',
                        'name'      => esc_html__('Show side panel trigger', 'aiero'),
                        'type'      => 'select',
                        'std'       => 'default',
                        'options'   => array(
                            'default'   => esc_html__('Default', 'aiero'),
                            'on'        => esc_html__('Yes', 'aiero'),
                            'off'       => esc_html__('No', 'aiero')
                        )
                    ),

                    array(
                        'id'        => 'header_search_status',
                        'name'      => esc_html__('Show search icon', 'aiero'),
                        'type'      => 'select',
                        'std'       => 'default',
                        'options'   => array(
                            'default'   => esc_html__('Default', 'aiero'),
                            'on'        => esc_html__('Yes', 'aiero'),
                            'off'       => esc_html__('No', 'aiero')
                        )
                    ),

                    array(
                        'id'        => 'header_login_status',
                        'name'      => esc_html__('Show header login', 'aiero'),
                        'type'      => 'select',
                        'std'       => 'default',
                        'options'   => array(
                            'default'   => esc_html__('Default', 'aiero'),
                            'on'        => esc_html__('Yes', 'aiero'),
                            'off'       => esc_html__('No', 'aiero')
                        )
                    ),

                    array(
                        'id'            => 'header_minicart_status',
                        'name'          => esc_html__('Show product cart', 'aiero'),
                        'type'          => 'select',
                        'std'           => 'default',
                        'options'       => array(
                            'default'       => esc_html__('Default', 'aiero'),
                            'on'            => esc_html__('Yes', 'aiero'),
                            'off'           => esc_html__('No', 'aiero')
                        ),
                    ),
                ),
            );

            $meta_boxes[] = array(
                'title'         => esc_html__('Page Title Settings', 'aiero'),
                'post_types'    => array('post', 'page', 'aiero_project', 'aiero_team_member', 'aiero_service', 'aiero_case_study', 'product'),
                'closed'        => true,
                'context'       => 'advanced',
                'fields'        => array(

                    # Page Title Options

                    //-- Page Title General
                    array(
                        'type'  => 'heading',
                        'name'  => esc_html__('General', 'aiero'),
                    ),

                    array(
                        'id'        => 'page_title_status',
                        'name'      => esc_html__('Show Page Title', 'aiero'),
                        'type'      => 'select',
                        'std'       => 'default',
                        'options'   => array(
                            'default'   => esc_html__('Default', 'aiero'),
                            'on'        => esc_html__('Yes', 'aiero'),
                            'off'       => esc_html__('No', 'aiero')
                        )
                    ),

                    array(
                        'id'        => 'page_title_overlay_status',
                        'name'      => esc_html__('Show overlay', 'aiero'),
                        'type'      => 'select',
                        'std'       => 'default',
                        'options'   => array(
                            'default'   => esc_html__('Default', 'aiero'),
                            'off'       => esc_html__('No', 'aiero'),
                            'on'        => esc_html__('Yes', 'aiero')
                        )
                    ),

                    array(
                        'id'            => 'page_title_overlay_color',
                        'name'          => esc_html__('Overlay Color', 'aiero'),
                        'type'          => 'color',
                        'alpha_channel' => true,
                        'attributes'    => array(
                            'data-dependency-id'    => 'page_title_overlay_status',
                            'data-dependency-val'   => 'on'
                        )
                    ),

                    array(
                        'id'        => 'page_title_decoration_status',
                        'name'      => esc_html__('Show decoration', 'aiero'),
                        'type'      => 'select',
                        'std'       => 'default',
                        'options'   => array(
                            'default'   => esc_html__('Default', 'aiero'),
                            'off'       => esc_html__('No', 'aiero'),
                            'on'        => esc_html__('Yes', 'aiero')
                        )
                    ),

                    array(
                        'id'        => 'page_title_customize',
                        'name'      => esc_html__('Customize', 'aiero'),
                        'type'      => 'select',
                        'std'       => 'default',
                        'class'     => 'divider-before',
                        'options'   => array(
                            'default'   => esc_html__('Default', 'aiero'),
                            'off'       => esc_html__('No', 'aiero'),
                            'on'        => esc_html__('Yes', 'aiero')
                        )
                    ),

                    array(
                        'id'            => 'page_title_height',
                        'name'          => esc_html__('Page Title Height', 'aiero'),
                        'type'          => 'number',
                        'placeholder'   => aiero_get_theme_mod('page_title_height'),
                        'std'           => '540',
                        'attributes'    => array(
                            'data-dependency-id'    => 'page_title_customize',
                            'data-dependency-val'   => 'on'
                        )
                    ),

                    array(
                        'id'            => 'page_title_default_text_color',
                        'name'          => esc_html__('Default Text Color', 'aiero'),
                        'type'          => 'color',
                        'alpha_channel' => true,
                        'class'         => 'divider-before',
                        'attributes'    => array(
                            'data-dependency-id'    => 'page_title_customize',
                            'data-dependency-val'   => 'on'
                        )
                    ),

                    array(
                        'id'            => 'page_title_dark_text_color',
                        'name'          => esc_html__('Dark Text Color', 'aiero'),
                        'type'          => 'color',
                        'alpha_channel' => true,
                        'attributes'    => array(
                            'data-dependency-id'    => 'page_title_customize',
                            'data-dependency-val'   => 'on'
                        )
                    ),

                    array(
                        'id'            => 'page_title_light_text_color',
                        'name'          => esc_html__('Light Text Color', 'aiero'),
                        'type'          => 'color',
                        'alpha_channel' => true,
                        'attributes'    => array(
                            'data-dependency-id'    => 'page_title_customize',
                            'data-dependency-val'   => 'on'
                        )
                    ),

                    array(
                        'id'            => 'page_title_accent_text_color',
                        'name'          => esc_html__('Accent Text Color', 'aiero'),
                        'type'          => 'color',
                        'alpha_channel' => true,
                        'attributes'    => array(
                            'data-dependency-id'    => 'page_title_customize',
                            'data-dependency-val'   => 'on'
                        )
                    ),

                    array(
                        'id'            => 'page_title_border_color',
                        'name'          => esc_html__('Border Color', 'aiero'),
                        'type'          => 'color',
                        'alpha_channel' => true,
                        'class'         => 'divider-before',
                        'attributes'    => array(
                            'data-dependency-id'    => 'page_title_customize',
                            'data-dependency-val'   => 'on'
                        )
                    ),

                    array(
                        'id'            => 'page_title_border_hover_color',
                        'name'          => esc_html__('Hovered Border Color', 'aiero'),
                        'type'          => 'color',
                        'alpha_channel' => true,
                        'attributes'    => array(
                            'data-dependency-id'    => 'page_title_customize',
                            'data-dependency-val'   => 'on'
                        )
                    ),

                    array(
                        'id'            => 'page_title_background_color',
                        'name'          => esc_html__('Background Color', 'aiero'),
                        'type'          => 'color',
                        'alpha_channel' => true,
                        'class'         => 'divider-before',
                        'attributes'    => array(
                            'data-dependency-id'    => 'page_title_customize',
                            'data-dependency-val'   => 'on'
                        )
                    ),

                    array(
                        'id'            => 'page_title_background_alter_color',
                        'name'          => esc_html__('Alternative Background Color', 'aiero'),
                        'type'          => 'color',
                        'alpha_channel' => true,
                        'attributes'    => array(
                            'data-dependency-id'    => 'page_title_customize',
                            'data-dependency-val'   => 'on'
                        )
                    ),

                    array(
                        'id'            => 'page_title_button_text_color',
                        'name'          => esc_html__('Button Text Color', 'aiero'),
                        'type'          => 'color',
                        'alpha_channel' => true,
                        'class'         => 'divider-before',
                        'attributes'    => array(
                            'data-dependency-id'    => 'page_title_customize',
                            'data-dependency-val'   => 'on'
                        )
                    ),

                    array(
                        'id'            => 'page_title_button_border_color',
                        'name'          => esc_html__('Button Border Color', 'aiero'),
                        'type'          => 'color',
                        'alpha_channel' => true,
                        'attributes'    => array(
                            'data-dependency-id'    => 'page_title_customize',
                            'data-dependency-val'   => 'on'
                        )
                    ),

                    array(
                        'id'            => 'page_title_button_border_color_add',
                        'name'          => esc_html__('Button Border Color Additional', 'aiero'),
                        'type'          => 'color',
                        'alpha_channel' => true,
                        'attributes'    => array(
                            'data-dependency-id'    => 'page_title_customize',
                            'data-dependency-val'   => 'on'
                        )
                    ),

                    array(
                        'id'            => 'page_title_button_background_color',
                        'name'          => esc_html__('Button Background Color', 'aiero'),
                        'type'          => 'color',
                        'alpha_channel' => true,
                        'attributes'    => array(
                            'data-dependency-id'    => 'page_title_customize',
                            'data-dependency-val'   => 'on'
                        )
                    ),

                    array(
                        'id'            => 'page_title_button_text_hover',
                        'name'          => esc_html__('Button Text Hover', 'aiero'),
                        'type'          => 'color',
                        'alpha_channel' => true,
                        'attributes'    => array(
                            'data-dependency-id'    => 'page_title_customize',
                            'data-dependency-val'   => 'on'
                        )
                    ),

                    array(
                        'id'            => 'page_title_button_border_hover',
                        'name'          => esc_html__('Button Border Hover', 'aiero'),
                        'type'          => 'color',
                        'alpha_channel' => true,
                        'attributes'    => array(
                            'data-dependency-id'    => 'page_title_customize',
                            'data-dependency-val'   => 'on'
                        )
                    ),

                    array(
                        'id'            => 'page_title_button_background_hover',
                        'name'          => esc_html__('Button Background Hover', 'aiero'),
                        'type'          => 'color',
                        'alpha_channel' => true,
                        'attributes'    => array(
                            'data-dependency-id'    => 'page_title_customize',
                            'data-dependency-val'   => 'on'
                        )
                    ),

                    array(
                        'id'                => 'page_title_background_image',
                        'name'              => esc_html__('Background Image', 'aiero'),
                        'type'              => 'image_advanced',
                        'max_file_uploads'  => 1,
                        'max_status'        => false,
                        'size'              => 'full',
                        'class'             => 'divider-before',
                        'attributes'        => array(
                            'data-dependency-id'    => 'page_title_customize',
                            'data-dependency-val'   => 'on'
                        )
                    ),

                    array(
                        'id'            => 'page_title_background_position',
                        'name'          => esc_html__('Background Position', 'aiero'),
                        'type'          => 'select',
                        'std'           => 'default',
                        'options'       => array(
                            'default'       => esc_html__('Default', 'aiero'),
                            'center center' => esc_html__('Center Center', 'aiero'),
                            'center left'   => esc_html__('Center Left', 'aiero'),
                            'center right'  => esc_html__('Center Right', 'aiero'),
                            'top center'    => esc_html__('Top Center', 'aiero'),
                            'top left'      => esc_html__('Top Left', 'aiero'),
                            'top right'     => esc_html__('Top Right', 'aiero'),
                            'bottom center' => esc_html__('Bottom Center', 'aiero'),
                            'bottom left'   => esc_html__('Bottom Left', 'aiero'),
                            'bottom right'  => esc_html__('Bottom Right', 'aiero')
                        ),
                        'attributes'    => array(
                            'data-dependency-id'    => 'page_title_customize',
                            'data-dependency-val'   => 'on'
                        )
                    ),

                    array(
                        'id'            => 'page_title_background_repeat',
                        'name'          => esc_html__('Background Repeat', 'aiero'),
                        'type'          => 'select',
                        'std'           => 'default',
                        'options'       => array(
                            'default'       => esc_html__('Default', 'aiero'),
                            'no-repeat'     => esc_html__('No-repeat', 'aiero'),
                            'repeat'        => esc_html__('Repeat', 'aiero'),
                            'repeat-x'      => esc_html__('Repeat-x', 'aiero'),
                            'repeat-y'      => esc_html__('Repeat-y', 'aiero')
                        ),
                        'attributes'    => array(
                            'data-dependency-id'    => 'page_title_customize',
                            'data-dependency-val'   => 'on'
                        )
                    ),

                    array(
                        'id'            => 'page_title_background_size',
                        'name'          => esc_html__('Background Size', 'aiero'),
                        'type'          => 'select',
                        'std'           => 'default',
                        'options'       => array(
                            'default'       => esc_html__('Default', 'aiero'),
                            'initial'       => esc_html__('Initial', 'aiero'),
                            'auto'          => esc_html__('Auto', 'aiero'),
                            'cover'         => esc_html__('Cover', 'aiero'),
                            'contain'       => esc_html__('Contain', 'aiero'),
                        ),
                        'attributes'    => array(
                            'data-dependency-id'    => 'page_title_customize',
                            'data-dependency-val'   => 'on'
                        )
                    ),

                    array(
                        'type'          => 'divider',
                        'attributes'    => array(
                            'data-dependency-id'    => 'page_title_customize',
                            'data-dependency-val'   => 'on'
                        )
                    ),

                    array(
                        'id'            => 'hide_page_title_background_mobile',
                        'name'          => esc_html__('Hide Background Image on Mobile Devices', 'aiero'),
                        'type'          => 'checkbox',
                        'std'           => 0,
                        'attributes'    => array(
                            'data-dependency-id'    => 'page_title_customize',
                            'data-dependency-val'   => 'on'
                        )
                    ),

                    array(
                        'id'            => 'hide_page_title_background_tablet',
                        'name'          => esc_html__('Hide Background Image on Tablet Devices', 'aiero'),
                        'type'          => 'checkbox',
                        'std'           => 0,
                        'attributes'    => array(
                            'data-dependency-id'    => 'page_title_customize',
                            'data-dependency-val'   => 'on'
                        )
                    ),

                    //-- Page Title Heading
                    array(
                        'type'  => 'heading',
                        'name'  => esc_html__('Heading', 'aiero'),
                    ),

                    array(
                        'id'        => 'page_title_heading_customize',
                        'name'      => esc_html__('Customize', 'aiero'),
                        'type'      => 'select',
                        'std'       => 'default',
                        'options'   => array(
                            'default'   => esc_html__('Default', 'aiero'),
                            'off'       => esc_html__('No', 'aiero'),
                            'on'        => esc_html__('Yes', 'aiero')
                        )
                    ),

                    array(
                        'id'        => 'page_title_heading_icon_status',
                        'name'      => esc_html__('Add Image Icon before Title', 'aiero'),
                        'type'      => 'select',
                        'std'       => aiero_get_theme_mod('page_title_heading_icon_status'),
                        'options'   => array(
                            'off'       => esc_html__('No', 'aiero'),
                            'on'        => esc_html__('Yes', 'aiero')
                        ),
                        'attributes'    => array(
                            'data-dependency-id'    => 'page_title_heading_customize',
                            'data-dependency-val'   => 'on'
                        )
                    ),

                    array(
                        'id'                => 'page_title_heading_icon_image',
                        'name'              => esc_html__('Icon Image', 'aiero'),
                        'type'              => 'image_advanced',
                        'max_file_uploads'  => 1,
                        'max_status'        => false,
                        'size'              => 'full',
                        'attributes'        => array(
                            'data-dependency-id'    => 'page_title_heading_customize',
                            'data-dependency-val'   => 'on'
                        )
                    ),

                     array(
                        'id'            => 'page_title_heading_icon_retina',
                        'name'          => esc_html__('Icon Image Retina', 'aiero'),
                        'type'          => 'checkbox',
                        'std'           => 1,
                        'attributes'    => array(
                            'data-dependency-id'    => 'page_title_heading_customize',
                            'data-dependency-val'   => 'on'
                        )
                    ),

                    array(
                        'type' => 'divider',
                    ),

                    //-- Page Title Breadcrumbs
                    array(
                        'type'  => 'heading',
                        'name'  => esc_html__('Page Title Breadcrumbs', 'aiero'),
                    ),

                    array(
                        'id'        => 'page_title_breadcrumbs_status',
                        'name'      => esc_html__('Show Page Title Breadcrumbs', 'aiero'),
                        'type'      => 'select',
                        'std'       => 'default',
                        'options'   => array(
                            'default'   => esc_html__('Default', 'aiero'),
                            'on'        => esc_html__('Show', 'aiero'),
                            'off'       => esc_html__('Hide', 'aiero')
                        )
                    ),



                    //-- Page Title Additional Text
                    array(
                        'type'  => 'heading',
                        'name'  => esc_html__('Page Title Additional Text', 'aiero'),
                    ),

                    array(
                        'id'            => 'page_title_additional_text',
                        'name'          => esc_html__('Additional Text', 'aiero'),
                        'type'          => 'text',
                        'placeholder'   => aiero_get_theme_mod('page_title_additional_text'),
                        'std'           => ''
                    ),

                    array(
                        'id'        => 'page_title_additional_customize',
                        'name'      => esc_html__('Customize', 'aiero'),
                        'type'      => 'select',
                        'std'       => 'default',
                        'options'   => array(
                            'default'   => esc_html__('Default', 'aiero'),
                            'off'       => esc_html__('No', 'aiero'),
                            'on'        => esc_html__('Yes', 'aiero')
                        )
                    ),

                    array(
                        'id'            => 'page_title_additional_text_color',
                        'name'          => esc_html__('Text Color', 'aiero'),
                        'type'          => 'color',
                        'alpha_channel' => true,
                        'attributes'    => array(
                            'data-dependency-id'    => 'page_title_additional_customize',
                            'data-dependency-val'   => 'on'
                        )
                    ),

                    array(
                        'id'            => 'page_title_additional_text_bottom_position',
                        'name'          => esc_html__('Text Bottom Offset, %', 'aiero'),
                        'type'          => 'number',
                        'min'           => 0,
                        'max'           => 50,
                        'step'          => 1,
                        'std'           => aiero_get_theme_mod('page_title_additional_text_bottom_position'),
                        'size'          => 20,
                        'attributes'    => array(
                            'data-dependency-id'    => 'page_title_additional_customize',
                            'data-dependency-val'   => 'on'
                        )
                    )
                )
            );

            // Layout Settings
            $meta_boxes[] = array(
                'title'         => esc_html__('Layout Settings', 'aiero'),
                'post_types'    => array('page'),
                'context'       => 'advanced',
                'closed'        => true,
                'fields'        => array(

                    //-- Content Margin
                    array(
                        'type'  => 'heading',
                        'name'  => esc_html__('Content Margin', 'aiero'),
                    ),
                    array(
                        'id'        => 'content_top_margin',
                        'name'      => esc_html__('Remove Top Margin', 'aiero'),
                        'type'      => 'select',
                        'std'       => 'default',
                        'options'   => array(
                            'default'   => esc_html__('Default', 'aiero'),
                            'on'        => esc_html__('Yes', 'aiero'),
                            'off'       => esc_html__('No', 'aiero')
                        )
                    ),

                    array(
                        'id'        => 'content_bottom_margin',
                        'name'      => esc_html__('Remove Bottom Margin', 'aiero'),
                        'type'      => 'select',
                        'std'       => 'default',
                        'options'   => array(
                            'default'   => esc_html__('Default', 'aiero'),
                            'on'        => esc_html__('Yes', 'aiero'),
                            'off'       => esc_html__('No', 'aiero')
                        )
                    ),

                    array(
                        'type' => 'divider',
                    ),

                    //-- Sidebar Options
                    array(
                        'type'  => 'heading',
                        'name'  => esc_html__('Sidebar', 'aiero'),
                    ),

                    array(
                        'id'        => 'sidebar_position',
                        'name'      => esc_html__('Sidebar Position', 'aiero'),
                        'type'      => 'select',
                        'options'   => array(
                            'default'   => esc_html__('Default', 'aiero'),
                            'left'      => esc_html__('Left', 'aiero'),
                            'right'     => esc_html__('Right', 'aiero'),
                            'none'      => esc_html__('None', 'aiero')
                        )
                    ),

                    array(
                        'id'            => 'page_sidebar_select',
                        'name'          => esc_html__('Select Sidebar', 'aiero'),
                        'type'          => 'select',
                        'std'           => 'default',
                        'options'       => $sidebar_list
                    ),
                )
            );

            // Layout Settings
            $meta_boxes[] = array(
                'title'         => esc_html__('Layout Settings', 'aiero'),
                'post_types'    => array('aiero_service'),
                'context'       => 'advanced',
                'closed'        => true,
                'fields'        => array(

                    //-- Content Margin
                    array(
                        'type'  => 'heading',
                        'name'  => esc_html__('Content Margin', 'aiero'),
                    ),
                    array(
                        'id'        => 'content_top_margin',
                        'name'      => esc_html__('Remove Top Margin', 'aiero'),
                        'type'      => 'select',
                        'std'       => 'default',
                        'options'   => array(
                            'default'   => esc_html__('Default', 'aiero'),
                            'on'        => esc_html__('Yes', 'aiero'),
                            'off'       => esc_html__('No', 'aiero')
                        )
                    ),

                    array(
                        'id'        => 'content_bottom_margin',
                        'name'      => esc_html__('Remove Bottom Margin', 'aiero'),
                        'type'      => 'select',
                        'std'       => 'default',
                        'options'   => array(
                            'default'   => esc_html__('Default', 'aiero'),
                            'off'       => esc_html__('No', 'aiero'),
                            'on'        => esc_html__('Yes', 'aiero')
                        )
                    ),

                    array(
                        'type' => 'divider',
                    ),

                    //-- Sidebar Options
                    array(
                        'type'  => 'heading',
                        'name'  => esc_html__('Sidebar', 'aiero'),
                    ),

                    array(
                        'id'        => 'service_sidebar_position',
                        'name'      => esc_html__('Sidebar Position', 'aiero'),
                        'type'      => 'select',
                        'options'   => array(
                            'default'   => esc_html__('Default', 'aiero'),
                            'left'      => esc_html__('Left', 'aiero'),
                            'right'     => esc_html__('Right', 'aiero'),
                            'none'      => esc_html__('None', 'aiero')
                        )
                    ),

                    array(
                        'id'            => 'service_sidebar_select',
                        'name'          => esc_html__('Select Sidebar', 'aiero'),
                        'type'          => 'select',
                        'std'           => 'default',
                        'options'       => $sidebar_list
                    ),
                )
            );

            // Layout Settings
            $meta_boxes[] = array(
                'title'         => esc_html__('Layout Settings', 'aiero'),
                'post_types'    => array('aiero_case_study'),
                'context'       => 'advanced',
                'closed'        => true,
                'fields'        => array(

                    //-- Content Margin
                    array(
                        'type'  => 'heading',
                        'name'  => esc_html__('Content Margin', 'aiero'),
                    ),
                    array(
                        'id'        => 'content_top_margin',
                        'name'      => esc_html__('Remove Top Margin', 'aiero'),
                        'type'      => 'select',
                        'std'       => 'default',
                        'options'   => array(
                            'default'   => esc_html__('Default', 'aiero'),
                            'on'        => esc_html__('Yes', 'aiero'),
                            'off'       => esc_html__('No', 'aiero')
                        )
                    ),

                    array(
                        'id'        => 'content_bottom_margin',
                        'name'      => esc_html__('Remove Bottom Margin', 'aiero'),
                        'type'      => 'select',
                        'std'       => 'default',
                        'options'   => array(
                            'default'   => esc_html__('Default', 'aiero'),
                            'off'       => esc_html__('No', 'aiero'),
                            'on'        => esc_html__('Yes', 'aiero')
                        )
                    ),

                    array(
                        'type' => 'divider',
                    ),

                    //-- Sidebar Options
                    array(
                        'type'  => 'heading',
                        'name'  => esc_html__('Sidebar', 'aiero'),
                    ),

                    array(
                        'id'        => 'case_study_sidebar_position',
                        'name'      => esc_html__('Sidebar Position', 'aiero'),
                        'type'      => 'select',
                        'options'   => array(
                            'default'   => esc_html__('Default', 'aiero'),
                            'left'      => esc_html__('Left', 'aiero'),
                            'right'     => esc_html__('Right', 'aiero'),
                            'none'      => esc_html__('None', 'aiero')
                        )
                    ),

                    array(
                        'id'            => 'case_study_sidebar_select',
                        'name'          => esc_html__('Select Sidebar', 'aiero'),
                        'type'          => 'select',
                        'std'           => 'default',
                        'options'       => $sidebar_list
                    ),
                )
            );

            // Layout Settings
            $meta_boxes[] = array(
                'title'         => esc_html__('Layout Settings', 'aiero'),
                'post_types'    => array('aiero_team_member', 'aiero_project'),
                'context'       => 'advanced',
                'closed'        => true,
                'fields'        => array(

                    //-- Content Margin
                    array(
                        'type'  => 'heading',
                        'name'  => esc_html__('Content Margin', 'aiero'),
                    ),
                    array(
                        'id'        => 'content_top_margin',
                        'name'      => esc_html__('Remove Top Margin', 'aiero'),
                        'type'      => 'select',
                        'std'       => 'default',
                        'options'   => array(
                            'default'   => esc_html__('Default', 'aiero'),
                            'on'        => esc_html__('Yes', 'aiero'),
                            'off'       => esc_html__('No', 'aiero')
                        )
                    ),

                    array(
                        'id'        => 'content_bottom_margin',
                        'name'      => esc_html__('Remove Bottom Margin', 'aiero'),
                        'type'      => 'select',
                        'std'       => 'default',
                        'options'   => array(
                            'default'   => esc_html__('Default', 'aiero'),
                            'off'       => esc_html__('No', 'aiero'),
                            'on'        => esc_html__('Yes', 'aiero')
                        )
                    ),
                )
            );

            // Layout Settings
            $meta_boxes[] = array(
                'title'         => esc_html__('Layout Settings', 'aiero'),
                'post_types'    => array('post'),
                'context'       => 'advanced',
                'closed'        => true,
                'fields'        => array(

                    //-- Content Margin
                    array(
                        'type'  => 'heading',
                        'name'  => esc_html__('Content Margin', 'aiero'),
                    ),
                    array(
                        'id'        => 'content_top_margin',
                        'name'      => esc_html__('Remove Top Margin', 'aiero'),
                        'type'      => 'select',
                        'std'       => 'default',
                        'options'   => array(
                            'default'   => esc_html__('Default', 'aiero'),
                            'on'        => esc_html__('Yes', 'aiero'),
                            'off'       => esc_html__('No', 'aiero')
                        )
                    ),

                    array(
                        'id'        => 'content_bottom_margin',
                        'name'      => esc_html__('Remove Bottom Margin', 'aiero'),
                        'type'      => 'select',
                        'std'       => 'default',
                        'options'   => array(
                            'default'   => esc_html__('Default', 'aiero'),
                            'off'       => esc_html__('No', 'aiero'),
                            'on'        => esc_html__('Yes', 'aiero')
                        )
                    ),

                    //-- Sidebar Options
                    array(
                        'type'  => 'heading',
                        'name'  => esc_html__('Sidebar', 'aiero'),
                    ),

                    array(
                        'id'        => 'post_sidebar_position',
                        'name'      => esc_html__('Sidebar Position', 'aiero'),
                        'type'      => 'select',
                        'options'   => array(
                            'default'   => esc_html__('Default', 'aiero'),
                            'left'      => esc_html__('Left', 'aiero'),
                            'right'     => esc_html__('Right', 'aiero'),
                            'none'      => esc_html__('None', 'aiero')
                        )
                    ),

                    array(
                        'id'            => 'post_sidebar_select',
                        'name'          => esc_html__('Select Sidebar', 'aiero'),
                        'type'          => 'select',
                        'std'           => 'default',
                        'options'       => $sidebar_list
                    ),
                )
            );

            $meta_boxes[] = array(
                'title'         => esc_html__('Side Panel Settings', 'aiero'),
                'post_types'    => array('post', 'page', 'aiero_project', 'aiero_team_member', 'aiero_service', 'aiero_case_study', 'product'),
                'closed'        => true,
                'context'       => 'advanced',
                'fields'        => array(
                    //-- Side Panel Logo
                    array(
                        'id'        => 'sidebar_logo_status',
                        'name'      => esc_html__('Show Logo', 'aiero'),
                        'type'      => 'select',
                        'std'       => 'default',
                        'options'   => array(
                            'default'   => esc_html__('Default', 'aiero'),
                            'on'        => esc_html__('Yes', 'aiero'),
                            'off'       => esc_html__('No', 'aiero')
                        )
                    ),

                    array(
                        'id'                => 'sidebar_logo_image',
                        'name'              => esc_html__('Logo Image', 'aiero'),
                        'type'              => 'image_advanced',
                        'max_file_uploads'  => 1,
                        'max_status'        => false,
                        'size'              => 'full',
                        'attributes'        => array(
                            'data-dependency-id'    => 'sidebar_logo_status',
                            'data-dependency-val'   => 'on'
                        )
                    ),

                    array(
                        'id'            => 'sidebar_logo_retina',
                        'name'          => esc_html__('Logo Retina', 'aiero'),
                        'type'          => 'checkbox',
                        'std'           => 1,
                        'attributes'        => array(
                            'data-dependency-id'    => 'sidebar_logo_status',
                            'data-dependency-val'   => 'on'
                        )
                    ),
                    
                    array(
                        'id'        => 'side_panel_bg_image_status',
                        'name'      => esc_html__('Show Side Panel Background Image', 'aiero'),
                        'type'      => 'select',
                        'std'       => 'default',
                        'options'   => array(
                            'default'   => esc_html__('Default', 'aiero'),
                            'on'        => esc_html__('Yes', 'aiero'),
                            'off'       => esc_html__('No', 'aiero')
                        )
                    ),

                    array(
                        'id'                => 'side_panel_bg_image',
                        'name'              => esc_html__('Side Panel Background Image', 'aiero'),
                        'type'              => 'image_advanced',
                        'max_file_uploads'  => 1,
                        'max_status'        => false,
                        'size'              => 'full',
                        'attributes'        => array(
                            'data-dependency-id'    => 'side_panel_bg_image_status',
                            'data-dependency-val'   => 'on'
                        )
                    ),

                     array(
                        'id'        => 'side_panel_close_bg_image_status',
                        'name'      => esc_html__('Show Side Panel Close Background Image', 'aiero'),
                        'type'      => 'select',
                        'std'       => 'default',
                        'options'   => array(
                            'default'   => esc_html__('Default', 'aiero'),
                            'on'        => esc_html__('Yes', 'aiero'),
                            'off'       => esc_html__('No', 'aiero')
                        )
                    ),

                    array(
                        'id'                => 'side_panel_close_bg_image',
                        'name'              => esc_html__('Side Panel Close Background Image', 'aiero'),
                        'type'              => 'image_advanced',
                        'max_file_uploads'  => 1,
                        'max_status'        => false,
                        'size'              => 'full',
                        'attributes'        => array(
                            'data-dependency-id'    => 'side_panel_close_bg_image_status',
                            'data-dependency-val'   => 'on'
                        )
                    ),

                    array(
                        'id'        => 'side_panel_socials_status',
                        'name'      => esc_html__('Show Social Buttons', 'aiero'),
                        'type'      => 'select',
                        'std'       => 'default',
                        'options'   => array(
                            'default'   => esc_html__('Default', 'aiero'),
                            'on'        => esc_html__('Yes', 'aiero'),
                            'off'       => esc_html__('No', 'aiero')
                        )
                    ),
                )
            );

            $meta_boxes[] = array(
                'title'         => esc_html__('Footer Settings', 'aiero'),
                'post_types'    => array('post', 'page', 'aiero_project', 'aiero_team_member', 'aiero_service', 'aiero_case_study', 'product'),
                'closed'        => true,
                'context'       => 'advanced',
                'fields'        => array(

                    # Footer Options

                    //-- Footer General
                    array(
                        'type'  => 'heading',
                        'name'  => esc_html__('General', 'aiero'),
                    ),

                    array(
                        'id'        => 'footer_status',
                        'name'      => esc_html__('Show Footer', 'aiero'),
                        'type'      => 'select',
                        'std'       => 'default',
                        'options'   => array(
                            'default'   => esc_html__('Default', 'aiero'),
                            'on'        => esc_html__('Yes', 'aiero'),
                            'off'       => esc_html__('No', 'aiero')
                        )
                    ),

                    array(
                        'id'        => 'footer_position',
                        'name'      => esc_html__('Footer Position', 'aiero'),
                        'type'      => 'select',
                        'options'   => array(
                            'default'     => esc_html__('Default', 'aiero'),
                            'indented'    => esc_html__('Indented', 'aiero'),
                            'no-indent'   => esc_html__('No Indent', 'aiero')
                        )
                    ),

                    array(
                        'id'        => 'footer_style',
                        'name'      => esc_html__('Footer Style', 'aiero'),
                        'type'      => 'select',
                        'options'   => array(
                            'default'   => esc_html__('Default', 'aiero'),
                            'type-1'    => esc_html__('Style 1', 'aiero'),
                            'type-2'    => esc_html__('Style 2', 'aiero'),
                            'type-3'    => esc_html__('Style 3', 'aiero'),
                            'type-4'    => esc_html__('Style 4', 'aiero'),
                            'type-5'    => esc_html__('Style 5', 'aiero'),
                            'type-6'    => esc_html__('Style 6', 'aiero')
                        )
                    ),

                    array(
                        'id'        => 'footer_border_radius',
                        'name'      => esc_html__('Footer Border Radius', 'aiero'),
                        'type'      => 'select',
                        'options'   => array(
                            'default'   => esc_html__('Default', 'aiero'),
                            'on'        => esc_html__('On', 'aiero'),
                            'off'       => esc_html__('Off', 'aiero'),
                            'no-top-border-radius'       => esc_html__('No Top Border Radius', 'aiero'),
                            'no-bottom-border-radius'    => esc_html__('No Bottom Border Radius', 'aiero'),
                        )
                    ),

                    array(
                        'id'        => 'footer_customize',
                        'name'      => esc_html__('Customize', 'aiero'),
                        'type'      => 'select',
                        'std'       => 'default',
                        'options'   => array(
                            'default'   => esc_html__('Default', 'aiero'),
                            'off'       => esc_html__('No', 'aiero'),
                            'on'        => esc_html__('Yes', 'aiero')
                        )
                    ),

                    array(
                        'id'            => 'footer_default_text_color',
                        'name'          => esc_html__('Default Text Color', 'aiero'),
                        'type'          => 'color',
                        'alpha_channel' => true,
                        'class'         => 'divider-before',
                        'attributes'    => array(
                            'data-dependency-id'    => 'footer_customize',
                            'data-dependency-val'   => 'on'
                        )
                    ),

                    array(
                        'id'            => 'footer_dark_text_color',
                        'name'          => esc_html__('Dark Text Color', 'aiero'),
                        'type'          => 'color',
                        'alpha_channel' => true,
                        'attributes'    => array(
                            'data-dependency-id'    => 'footer_customize',
                            'data-dependency-val'   => 'on'
                        )
                    ),

                    array(
                        'id'            => 'footer_light_text_color',
                        'name'          => esc_html__('Light Text Color', 'aiero'),
                        'type'          => 'color',
                        'alpha_channel' => true,
                        'attributes'    => array(
                            'data-dependency-id'    => 'footer_customize',
                            'data-dependency-val'   => 'on'
                        )
                    ),

                    array(
                        'id'            => 'footer_accent_text_color',
                        'name'          => esc_html__('Accent Text Color', 'aiero'),
                        'type'          => 'color',
                        'alpha_channel' => true,
                        'attributes'    => array(
                            'data-dependency-id'    => 'footer_customize',
                            'data-dependency-val'   => 'on'
                        )
                    ),

                    array(
                        'id'            => 'footer_input_dark_color',
                        'name'          => esc_html__('Input Dark Color', 'aiero'),
                        'type'          => 'color',
                        'alpha_channel' => true,
                        'attributes'    => array(
                            'data-dependency-id'    => 'footer_customize',
                            'data-dependency-val'   => 'on'
                        )
                    ),    

                    array(
                        'id'            => 'footer_border_color',
                        'name'          => esc_html__('Border Color', 'aiero'),
                        'type'          => 'color',
                        'alpha_channel' => true,
                        'class'         => 'divider-before',
                        'attributes'    => array(
                            'data-dependency-id'    => 'footer_customize',
                            'data-dependency-val'   => 'on'
                        )
                    ),

                    array(
                        'id'            => 'footer_border_hover_color',
                        'name'          => esc_html__('Hovered Border Color', 'aiero'),
                        'type'          => 'color',
                        'alpha_channel' => true,
                        'attributes'    => array(
                            'data-dependency-id'    => 'footer_customize',
                            'data-dependency-val'   => 'on'
                        )
                    ),

                    array(
                        'id'            => 'footer_background_color',
                        'name'          => esc_html__('Background Color', 'aiero'),
                        'type'          => 'color',
                        'alpha_channel' => true,
                        'class'         => 'divider-before',
                        'attributes'    => array(
                            'data-dependency-id'    => 'footer_customize',
                            'data-dependency-val'   => 'on'
                        )
                    ),

                    array(
                        'id'            => 'footer_background_alter_color',
                        'name'          => esc_html__('Alternative Background Color', 'aiero'),
                        'type'          => 'color',
                        'alpha_channel' => true,
                        'attributes'    => array(
                            'data-dependency-id'    => 'footer_customize',
                            'data-dependency-val'   => 'on'
                        )
                    ),

                    array(
                        'id'            => 'footer_button_text_color',
                        'name'          => esc_html__('Button Text Color', 'aiero'),
                        'type'          => 'color',
                        'alpha_channel' => true,
                        'class'         => 'divider-before',
                        'attributes'    => array(
                            'data-dependency-id'    => 'footer_customize',
                            'data-dependency-val'   => 'on'
                        )
                    ),

                    array(
                        'id'            => 'footer_button_border_color',
                        'name'          => esc_html__('Button Border Color', 'aiero'),
                        'type'          => 'color',
                        'alpha_channel' => true,
                        'attributes'    => array(
                            'data-dependency-id'    => 'footer_customize',
                            'data-dependency-val'   => 'on'
                        )
                    ),

                    array(
                        'id'            => 'footer_button_border_color_add',
                        'name'          => esc_html__('Button Border Color Additional', 'aiero'),
                        'type'          => 'color',
                        'alpha_channel' => true,
                        'attributes'    => array(
                            'data-dependency-id'    => 'footer_customize',
                            'data-dependency-val'   => 'on'
                        )
                    ),

                    array(
                        'id'            => 'footer_button_background_color',
                        'name'          => esc_html__('Button Background Color', 'aiero'),
                        'type'          => 'color',
                        'alpha_channel' => true,
                        'attributes'    => array(
                            'data-dependency-id'    => 'footer_customize',
                            'data-dependency-val'   => 'on'
                        )
                    ),

                    array(
                        'id'            => 'footer_button_background_color_add',
                        'name'          => esc_html__('Button Background Color Additional', 'aiero'),
                        'type'          => 'color',
                        'alpha_channel' => true,
                        'attributes'    => array(
                            'data-dependency-id'    => 'footer_customize',
                            'data-dependency-val'   => 'on'
                        )
                    ),

                    array(
                        'id'            => 'footer_button_text_hover',
                        'name'          => esc_html__('Button Text Hover', 'aiero'),
                        'type'          => 'color',
                        'alpha_channel' => true,
                        'attributes'    => array(
                            'data-dependency-id'    => 'footer_customize',
                            'data-dependency-val'   => 'on'
                        )
                    ),

                    array(
                        'id'            => 'footer_button_border_hover',
                        'name'          => esc_html__('Button Border Hover', 'aiero'),
                        'type'          => 'color',
                        'alpha_channel' => true,
                        'attributes'    => array(
                            'data-dependency-id'    => 'footer_customize',
                            'data-dependency-val'   => 'on'
                        )
                    ),

                    array(
                        'id'            => 'footer_button_border_hover_add',
                        'name'          => esc_html__('Button Border Hover Additional', 'aiero'),
                        'type'          => 'color',
                        'alpha_channel' => true,
                        'attributes'    => array(
                            'data-dependency-id'    => 'footer_customize',
                            'data-dependency-val'   => 'on'
                        )
                    ),

                    array(
                        'id'            => 'footer_button_background_hover',
                        'name'          => esc_html__('Button Background Hover', 'aiero'),
                        'type'          => 'color',
                        'alpha_channel' => true,
                        'attributes'    => array(
                            'data-dependency-id'    => 'footer_customize',
                            'data-dependency-val'   => 'on'
                        )
                    ),

                    array(
                        'id'            => 'footer_button_background_hover_add',
                        'name'          => esc_html__('Button Background Hover Additional', 'aiero'),
                        'type'          => 'color',
                        'alpha_channel' => true,
                        'attributes'    => array(
                            'data-dependency-id'    => 'footer_customize',
                            'data-dependency-val'   => 'on'
                        )
                    ),

                    array(
                        'id'        => 'footer_button_border_style',
                        'name'      => esc_html__('Button Border Style', 'aiero'),
                        'type'      => 'select',
                        'std'       => 'default',
                        'options'   => array(
                            'default'     => esc_html__('Default', 'aiero'),
                            'gradient'    => esc_html__('Gradient', 'aiero'),
                            'solid'       => esc_html__('Solid', 'aiero')
                        ),
                        'attributes'    => array(
                            'data-dependency-id'    => 'footer_customize',
                            'data-dependency-val'   => 'on'
                        )
                    ),

                    array(
                        'id'        => 'footer_button_background_style',
                        'name'      => esc_html__('Button Background Style', 'aiero'),
                        'type'      => 'select',
                        'std'       => 'default',
                        'options'   => array(
                            'default'     => esc_html__('Default', 'aiero'),
                            'gradient'    => esc_html__('Gradient', 'aiero'),
                            'solid'       => esc_html__('Solid', 'aiero')
                        ),
                        'attributes'    => array(
                            'data-dependency-id'    => 'footer_customize',
                            'data-dependency-val'   => 'on'
                        )
                    ),

                    array(
                        'id'            => 'hide_footer_background_image',
                        'name'          => esc_html__('Hide Background Image', 'aiero'),
                        'type'          => 'checkbox',
                        'std'           => 0,
                        'attributes'    => array(
                            'data-dependency-id'    => 'footer_customize',
                            'data-dependency-val'   => 'on'
                        )
                    ),

                    array(
                        'id'                => 'footer_background_image',
                        'name'              => esc_html__('Background Image', 'aiero'),
                        'type'              => 'image_advanced',
                        'max_file_uploads'  => 1,
                        'max_status'        => false,
                        'attributes'        => array(
                            'data-dependency-id'    => 'footer_customize',
                            'data-dependency-val'   => 'on'
                        )
                    ),

                    array(
                        'id'            => 'footer_background_position',
                        'name'          => esc_html__('Background Position', 'aiero'),
                        'type'          => 'select',
                        'std'           => 'default',
                        'options'       => array(
                            'default'       => esc_html__('Default', 'aiero'),
                            'center center' => esc_html__('Center Center', 'aiero'),
                            'center left'   => esc_html__('Center Left', 'aiero'),
                            'center right'  => esc_html__('Center Right', 'aiero'),
                            'top center'    => esc_html__('Top Center', 'aiero'),
                            'top left'      => esc_html__('Top Left', 'aiero'),
                            'top right'     => esc_html__('Top Right', 'aiero'),
                            'bottom center' => esc_html__('Bottom Center', 'aiero'),
                            'bottom left'   => esc_html__('Bottom Left', 'aiero'),
                            'bottom right'  => esc_html__('Bottom Right', 'aiero')
                        ),
                        'attributes'    => array(
                            'data-dependency-id'    => 'footer_customize',
                            'data-dependency-val'   => 'on'
                        )
                    ),

                    array(
                        'id'            => 'footer_background_repeat',
                        'name'          => esc_html__('Background Repeat', 'aiero'),
                        'type'          => 'select',
                        'std'           => 'default',
                        'options'       => array(
                            'default'       => esc_html__('Default', 'aiero'),
                            'no-repeat'     => esc_html__('No-repeat', 'aiero'),
                            'repeat'        => esc_html__('Repeat', 'aiero'),
                            'repeat-x'      => esc_html__('Repeat-x', 'aiero'),
                            'repeat-y'      => esc_html__('Repeat-y', 'aiero')
                        ),
                        'attributes'    => array(
                            'data-dependency-id'    => 'footer_customize',
                            'data-dependency-val'   => 'on'
                        )
                    ),

                    array(
                        'id'            => 'footer_background_size',
                        'name'          => esc_html__('Background Size', 'aiero'),
                        'type'          => 'select',
                        'std'           => 'default',
                        'options'       => array(
                            'default'       => esc_html__('Default', 'aiero'),
                            'initial'       => esc_html__('Initial', 'aiero'),
                            'auto'          => esc_html__('Auto', 'aiero'),
                            'cover'         => esc_html__('Cover', 'aiero'),
                            'contain'       => esc_html__('Contain', 'aiero'),
                        ),
                        'attributes'    => array(
                            'data-dependency-id'    => 'footer_customize',
                            'data-dependency-val'   => 'on'
                        )
                    ),

                    array(
                        'type' => 'divider',
                    ),

                    //-- Pre Footer Widgets
                    array(
                        'type'  => 'heading',
                        'name'  => esc_html__('Pre Footer Widgets', 'aiero'),
                    ),

                    array(
                        'id'        => 'prefooter_sidebar_status',
                        'name'      => esc_html__('Show Pre Footer Widgets', 'aiero'),
                        'type'      => 'select',
                        'std'       => 'default',
                        'options'   => array(
                            'default'   => esc_html__('Default', 'aiero'),
                            'on'        => esc_html__('Yes', 'aiero'),
                            'off'       => esc_html__('No', 'aiero')
                        )
                    ),

                    array(
                        'id'            => 'prefooter_sidebar_select',
                        'name'          => esc_html__('Select Sidebar', 'aiero'),
                        'type'          => 'select',
                        'std'           => 'default',
                        'options'       => $sidebar_list,
                        'attributes'    => array(
                            'data-dependency-id'    => 'prefooter_sidebar_status',
                            'data-dependency-val'   => 'on'
                        )
                    ),

                    array(
                        'type' => 'divider',
                    ),

                    //-- Footer Widgets
                    array(
                        'type'  => 'heading',
                        'name'  => esc_html__('Footer Widgets', 'aiero'),
                    ),

                    array(
                        'id'        => 'footer_sidebar_status',
                        'name'      => esc_html__('Show Footer Widgets', 'aiero'),
                        'type'      => 'select',
                        'std'       => 'default',
                        'options'   => array(
                            'default'   => esc_html__('Default', 'aiero'),
                            'on'        => esc_html__('Yes', 'aiero'),
                            'off'       => esc_html__('No', 'aiero')
                        )
                    ),

                    array(
                        'id'            => 'footer_sidebar_select',
                        'name'          => esc_html__('Select Sidebar', 'aiero'),
                        'type'          => 'select',
                        'std'           => 'default',
                        'options'       => $sidebar_list,
                        'attributes'    => array(
                            'data-dependency-id'    => 'footer_sidebar_status',
                            'data-dependency-val'   => 'on'
                        )
                    ),

                    array(
                        'type' => 'divider',
                    ),

                    //-- Copyright
                    array(
                        'type'  => 'heading',
                        'name'  => esc_html__('Copyright', 'aiero'),
                    ),

                    array(
                        'id'        => 'footer_copyright_status',
                        'name'      => esc_html__('Show Copyright', 'aiero'),
                        'type'      => 'select',
                        'std'       => 'default',
                        'options'   => array(
                            'default'   => esc_html__('Default', 'aiero'),
                            'on'        => esc_html__('Yes', 'aiero'),
                            'off'       => esc_html__('No', 'aiero')
                        )
                    ),

                    array(
                        'id'            => 'footer_copyright_text',
                        'name'          => esc_html__('Copyright Text', 'aiero'),
                        'type'          => 'text',
                        'placeholder'   => aiero_get_theme_mod('footer_copyright_text'),
                        'std'           => '',
                        'sanitize_callback' => 'wp_kses_post'
                    ),

                    array(
                        'type' => 'divider',
                    ),

                    //-- Footer Menu
                    array(
                        'type'  => 'heading',
                        'name'  => esc_html__('Footer Menu', 'aiero'),
                    ),

                    array(
                        'id'        => 'footer_menu_status',
                        'name'      => esc_html__('Show Footer Menu', 'aiero'),
                        'type'      => 'select',
                        'std'       => 'default',
                        'options'   => array(
                            'default'   => esc_html__('Default', 'aiero'),
                            'on'        => esc_html__('Yes', 'aiero'),
                            'off'       => esc_html__('No', 'aiero')
                        )
                    ),

                    array(
                        'id'        => 'footer_menu_select',
                        'name'      => esc_html__('Select Menu', 'aiero'),
                        'type'      => 'select',
                        'std'       => 'default',
                        'options'   => aiero_get_all_menu_list()
                    ),

                    array(
                        'type' => 'divider',
                    ),

                    //-- Footer Additional Menu
                    array(
                        'type'  => 'heading',
                        'name'  => esc_html__('Footer Additional Menu', 'aiero'),
                    ),

                    array(
                        'id'        => 'footer_additional_menu_status',
                        'name'      => esc_html__('Show Footer Additional Menu', 'aiero'),
                        'type'      => 'select',
                        'std'       => 'default',
                        'options'   => array(
                            'default'   => esc_html__('Default', 'aiero'),
                            'on'        => esc_html__('Yes', 'aiero'),
                            'off'       => esc_html__('No', 'aiero')
                        )
                    ),

                    array(
                        'id'        => 'footer_additional_menu_select',
                        'name'      => esc_html__('Select Menu', 'aiero'),
                        'type'      => 'select',
                        'std'       => 'default',
                        'options'   => aiero_get_all_menu_list()
                    )
                )
            );

            $meta_boxes[] = array(
                'title'         => esc_html__('Additional Settings', 'aiero'),
                'post_types'    => array('post', 'page', 'aiero_project', 'aiero_team_member', 'aiero_service', 'aiero_case_study', 'product'),
                'closed'        => true,
                'context'       => 'advanced',
                'fields'        => array(                    

                    //-- Footer Scroll To Top
                    array(
                        'type'  => 'heading',
                        'name'  => esc_html__('Scroll To Top Button', 'aiero'),
                    ),

                    array(
                        'id'        => 'footer_scrolltop_status',
                        'name'      => esc_html__('Show Scroll To Top Button', 'aiero'),
                        'type'      => 'select',
                        'std'       => 'default',
                        'options'   => array(
                            'default'   => esc_html__('Default', 'aiero'),
                            'on'        => esc_html__('Yes', 'aiero'),
                            'off'       => esc_html__('No', 'aiero')
                        )
                    ),
                    array(
                        'id'            => 'footer_scrolltop_bg_color',
                        'name'          => esc_html__('Scroll To Top Button Background Color', 'aiero'),
                        'type'          => 'color',
                        'alpha_channel' => true,
                        'attributes'    => array(
                            'data-dependency-id'    => 'footer_scrolltop_status',
                            'data-dependency-val'   => 'on'
                        )
                    ),
                    array(
                        'id'            => 'footer_scrolltop_bg_color_hover',
                        'name'          => esc_html__('Scroll To Top Button Hover Background Color', 'aiero'),
                        'type'          => 'color',
                        'alpha_channel' => true,
                        'attributes'    => array(
                            'data-dependency-id'    => 'footer_scrolltop_status',
                            'data-dependency-val'   => 'on'
                        )
                    ),
                    array(
                        'id'            => 'footer_scrolltop_color',
                        'name'          => esc_html__('Scroll To Top Button Color', 'aiero'),
                        'type'          => 'color',
                        'alpha_channel' => true,
                        'attributes'    => array(
                            'data-dependency-id'    => 'footer_scrolltop_status',
                            'data-dependency-val'   => 'on'
                        )
                    ),
                    array(
                        'id'            => 'footer_scrolltop_color_hover',
                        'name'          => esc_html__('Scroll To Top Button Hover Color', 'aiero'),
                        'type'          => 'color',
                        'alpha_channel' => true,
                        'attributes'    => array(
                            'data-dependency-id'    => 'footer_scrolltop_status',
                            'data-dependency-val'   => 'on'
                        )
                    ),
                )
            );

            return $meta_boxes;
        }
    }
}