<?php
/*
 * Created by Artureanec
*/

if ( !class_exists('Aiero_Special_Text_Widget') ) {
    class Aiero_Special_Text_Widget extends WP_Widget {
        public function __construct() {
            parent::__construct(
                'Aiero_Special_Text_Widget',
                'Special Text (Aiero Theme)',
                array(
                    'description' => esc_html__('Special Text Widget by Aiero Theme', 'aiero_plugin')
                )
            );
        }

        public function update($new_instance, $old_instance) {
            $instance = $old_instance;
            $instance['text'] = wp_kses_post($new_instance['text']);
            return $instance;
        }

        public function widget($args, $instance) {

            echo $args['before_widget'];

            if (isset($instance['text']) && $instance['text'] !== '') {
                echo '
                    <div class="aiero-special-text-widget-text">
                        <p>
                            ' . wp_kses_post($instance['text']) . '
                        </p>
                    </div>
                ';
            }

            echo $args['after_widget'];
        }        

        public function form($instance) {
            $default_values = array(
                'text'      => '',
            );

            $instance = wp_parse_args((array)$instance, $default_values);
            ?>
                <div class="aiero_widget">
                    <p>
                        <label for="<?php echo esc_attr($this->get_field_id('text')); ?>">
                            <?php esc_html_e('Text', 'aiero_plugin'); ?>:
                        </label>
                        <textarea class="widefat"
                                  id="<?php echo esc_attr($this->get_field_id('text')); ?>"
                                  name="<?php echo esc_attr($this->get_field_name('text')); ?>"
                        ><?php echo wp_kses_post($instance['text']); ?></textarea>
                    </p>
                </div>
            <?php
        }
    }
}
