<?php
/*
 * Created by Artureanec
*/

namespace Aiero\Widgets;

use Elementor\Widget_Base;
use Elementor\Controls_Manager;
use Elementor\Scheme_Color;
use Elementor\Scheme_Typography;
use Elementor\Group_Control_Typography;
use Elementor\Group_Control_Text_Shadow;
use Elementor\Group_Control_Background;
use Elementor\Group_Control_Border;
use Elementor\Group_Control_Box_Shadow;
use Elementor\REPEATER;
use Elementor\Utils;

if ( ! defined( 'ABSPATH' ) ) exit; // Exit if accessed directly

class Aiero_Testimonial_Carousel_Widget extends Widget_Base {

    public function get_name() {
        return 'aiero_testimonial_carousel';
    }

    public function get_title() {
        return esc_html__('Testimonial Carousel', 'aiero_plugin');
    }

    public function get_icon() {
        return 'eicon-testimonial-carousel';
    }

    public function get_categories() {
        return ['aiero_widgets'];
    }

    public function get_script_depends() {
        return ['elementor_widgets'];
    }

    protected function register_controls() {

        // ----------------------------- //
        // ---------- Content ---------- //
        // ----------------------------- //
        $this->start_controls_section(
            'section_content',
            [
                'label' => esc_html__('Testimonial Carousel', 'aiero_plugin')
            ]
        );

        $this->add_control(
            'view_type',
            [
                'label'     => esc_html__('View Type', 'aiero_plugin'),
                'type'      => Controls_Manager::SELECT,
                'default'   => 'type-1',
                'options'   => [
                    'type-1'    => esc_html__('Type 1', 'aiero_plugin'),
                    'type-2'    => esc_html__('Type 2', 'aiero_plugin')
                ]
            ]
        );

        $repeater = new Repeater();

        $repeater->add_control(
            'testimonial',
            [
                'label'         => esc_html__('Testimonial Text', 'aiero_plugin'),
                'type'          => Controls_Manager::WYSIWYG,
                'rows'          => '10',
                'default'       => '',
                'placeholder'   => esc_html__('Enter Testimonial Text', 'aiero_plugin'),
                'separator'     => 'before'
            ]
        );

        $repeater->add_control(
            'photo',
            [
                'label'     => esc_html__( 'Choose Author Photo', 'aiero_plugin' ),
                'type'      => Controls_Manager::MEDIA,
                'dynamic'   => [
                    'active'    => true,
                ],
            ]
        );

        $repeater->add_control(
            'name',
            [
                'label'         => esc_html__('Author Name', 'aiero_plugin'),
                'type'          => Controls_Manager::TEXT,
                'label_block'   => true,
                'default'       => ''
            ]
        );

        $repeater->add_control(
            'position',
            [
                'label'         => esc_html__('Author Position', 'aiero_plugin'),
                'type'          => Controls_Manager::TEXT,
                'label_block'   => true,
                'default'       => ''
            ]
        );

        $this->add_control(
            'testimonials_items',
            [
                'label'         => esc_html__('Testimonials', 'aiero_plugin'),
                'type'          => Controls_Manager::REPEATER,
                'fields'        => $repeater->get_controls(),
                'title_field'   => '{{{name}}}',
                'prevent_empty' => false,
                'separator'     => 'before'
            ]
        );

        $this->end_controls_section();

        // ---------------------------- //
        // ---------- Slider ---------- //
        // ---------------------------- //
        $this->start_controls_section(
            'section_slider',
            [
                'label' => esc_html__('Slider Settings', 'aiero_plugin')
            ]
        );

        $this->add_control(
            'columns_number',
            [
                'label'     => esc_html__('Columns Number', 'aiero_plugin'),
                'type'      => Controls_Manager::NUMBER,
                'default'   => 3,
                'min'       => 1,
                'max'       => 6
            ]
        );

        $this->add_control(
            'nav',
            [
                'label'         => esc_html__('Show navigation buttons', 'aiero_plugin'),
                'type'          => Controls_Manager::SWITCHER,
                'label_off'     => esc_html__('No', 'aiero_plugin'),
                'label_on'      => esc_html__('Yes', 'aiero_plugin'),
                'return_value'  => 'yes',
                'default'       => 'no',
            ]
        );

        $this->add_control(
            'dots',
            [
                'label'         => esc_html__('Show pagination dots', 'aiero_plugin'),
                'type'          => Controls_Manager::SWITCHER,
                'label_off'     => esc_html__('No', 'aiero_plugin'),
                'label_on'      => esc_html__('Yes', 'aiero_plugin'),
                'return_value'  => 'yes',
                'default'       => 'yes',
            ]
        );

        $this->add_responsive_control(
            'dots_align',
            [
                'label'     => esc_html__('Dots Alignment', 'aiero_plugin'),
                'type'      => Controls_Manager::CHOOSE,
                'options'   => [
                    'left'=> [
                        'title'     => esc_html__('Left', 'aiero_plugin'),
                        'icon'      => 'eicon-text-align-left',
                    ],
                    'center'    => [
                        'title'     => esc_html__('Center', 'aiero_plugin'),
                        'icon'      => 'eicon-text-align-center',
                    ],
                    'right'  => [
                        'title'     => esc_html__('Right', 'aiero_plugin'),
                        'icon'      => 'eicon-text-align-right',
                    ]
                ],
                'default'   => 'center',
                'selectors' => [
                    '{{WRAPPER}} .owl-dots' => 'text-align: {{VALUE}};',
                ],
                'condition' => [
                    'dots'      => 'yes'
                ]
            ]
        );

        $this->add_responsive_control(
            'nav_align',
            [
                'label'     => esc_html__('Buttons Alignment', 'aiero_plugin'),
                'type'      => Controls_Manager::CHOOSE,
                'options'   => [
                    'left'=> [
                        'title'     => esc_html__('Left', 'aiero_plugin'),
                        'icon'      => 'eicon-text-align-left',
                    ],
                    'center'    => [
                        'title'     => esc_html__('Center', 'aiero_plugin'),
                        'icon'      => 'eicon-text-align-center',
                    ],
                    'right'  => [
                        'title'     => esc_html__('Right', 'aiero_plugin'),
                        'icon'      => 'eicon-text-align-right',
                    ]
                ],
                'default'   => '',
                'selectors' => [
                    '{{WRAPPER}} .testimonial-carousel-wrapper' => 'text-align: {{VALUE}};',
                ],
                'condition' => [
                    'nav'      => 'yes'
                ]
            ]
        );

        $this->add_control(
            'speed',
            [
                'label'     => esc_html__('Animation Speed', 'aiero_plugin'),
                'type'      => Controls_Manager::NUMBER,
                'default'   => 500,
                'separator' => 'before'
            ]
        );

        $this->add_control(
            'infinite',
            [
                'label'     => esc_html__('Infinite Loop', 'aiero_plugin'),
                'type'      => Controls_Manager::SELECT,
                'default'   => 'yes',
                'options'   => [
                    'yes'       => esc_html__('Yes', 'aiero_plugin'),
                    'no'        => esc_html__('No', 'aiero_plugin'),
                ],
                'separator' => 'before'
            ]
        );

        $this->add_control(
            'autoplay',
            [
                'label'     => esc_html__('Autoplay', 'aiero_plugin'),
                'type'      => Controls_Manager::SELECT,
                'default'   => 'yes',
                'options'   => [
                    'yes'       => esc_html__('Yes', 'aiero_plugin'),
                    'no'        => esc_html__('No', 'aiero_plugin'),
                ],
                'separator' => 'before'
            ]
        );

        $this->add_control(
            'autoplay_speed',
            [
                'label'     => esc_html__('Autoplay Speed', 'aiero_plugin'),
                'type'      => Controls_Manager::NUMBER,
                'default'   => 300,
                'step'      => 100,
                'condition' => [
                    'autoplay'  => 'yes'
                ]
            ]
        );

        $this->add_control(
            'autoplay_timeout',
            [
                'label'     => esc_html__('Autoplay Timeout', 'aiero_plugin'),
                'type'      => Controls_Manager::NUMBER,
                'default'   => 5000,
                'step'      => 100,
                'condition' => [
                    'autoplay'  => 'yes'
                ]
            ]
        );

        $this->add_control(
            'pause_on_hover',
            [
                'label'     => esc_html__('Pause on Hover', 'aiero_plugin'),
                'type'      => Controls_Manager::SELECT,
                'default'   => 'yes',
                'options'   => [
                    'yes'       => esc_html__('Yes', 'aiero_plugin'),
                    'no'        => esc_html__('No', 'aiero_plugin'),
                ],
                'condition' => [
                    'autoplay'  => 'yes'
                ]
            ]
        );

        $this->end_controls_section();

        // -------------------------------------- //
        // ---------- Testimonial Settings ---------- //
        // -------------------------------------- //
        $this->start_controls_section(
            'section_testimonial_settings',
            [
                'label' => esc_html__('Testimonial Settings', 'aiero_plugin'),
                'tab'   => Controls_Manager::TAB_STYLE
            ]
        );

        $this->add_responsive_control(
            'text_align',
            [
                'label'     => esc_html__('Text Alignment', 'aiero_plugin'),
                'type'      => Controls_Manager::CHOOSE,
                'options'   => [
                    'left'=> [
                        'title'     => esc_html__('Left', 'aiero_plugin'),
                        'icon'      => 'eicon-text-align-left',
                    ],
                    'center'    => [
                        'title'     => esc_html__('Center', 'aiero_plugin'),
                        'icon'      => 'eicon-text-align-center',
                    ],
                    'right'  => [
                        'title'     => esc_html__('Right', 'aiero_plugin'),
                        'icon'      => 'eicon-text-align-right',
                    ]
                ],
                'default'   => '',
                'selectors' => [
                    '{{WRAPPER}} .testimonial-item' => 'text-align: {{VALUE}};',
                ]
            ]
        );

        $this->add_control(
            'testimonials_radius',
            [
                'label'         => esc_html__('Testimonials Border Radius', 'aiero_plugin'),
                'type'          => Controls_Manager::DIMENSIONS,
                'size_units'    => ['px', '%'],
                'selectors'     => [
                    '{{WRAPPER}} .testimonial-carousel-wrapper' => 'border-radius: {{TOP}}{{UNIT}} {{RIGHT}}{{UNIT}} {{BOTTOM}}{{UNIT}} {{LEFT}}{{UNIT}};'
                ]
            ]
        );

        $this->add_responsive_control(
            'testimonials_padding',
            [
                'label'         => esc_html__('Testimonials Padding', 'aiero_plugin'),
                'type'          => Controls_Manager::DIMENSIONS,
                'size_units'    => ['px', '%', 'vw'],
                'selectors'     => [
                    '{{WRAPPER}} .testimonials-slider-container' => 'padding: {{TOP}}{{UNIT}} {{RIGHT}}{{UNIT}} {{BOTTOM}}{{UNIT}} {{LEFT}}{{UNIT}};'
                ]
            ]
        );

        $this->add_group_control(
            Group_Control_Background::get_type(),
            [
                'name'      => 'testimonials_bg',
                'label'     => esc_html__( 'Testimonials Background', 'aiero_plugin' ),
                'types'     => [ 'classic', 'gradient' ],
                'selector'  => '{{WRAPPER}} .testimonial-carousel-wrapper'
            ]
        );

        $this->end_controls_section();

        // -------------------------------------- //
        // ---------- Content Settings ---------- //
        // -------------------------------------- //
        $this->start_controls_section(
            'section_content_settings',
            [
                'label' => esc_html__('Content Settings', 'aiero_plugin'),
                'tab'   => Controls_Manager::TAB_STYLE
            ]
        );

        $this->add_control(
            'author_style',
            [
                'label'     => esc_html__('Author Style', 'aiero_plugin'),
                'type'      => Controls_Manager::SELECT,
                'default'   => 'style-1',
                'options'   => [
                    'style-1'    => esc_html__('Style 1', 'aiero_plugin'),
                    'style-2'    => esc_html__('Style 2', 'aiero_plugin')
                ]
            ]
        );

        $this->add_responsive_control(
            'testimonial_icon_size',
            [
                'label'     => esc_html__('Testimonial Icon Size', 'aiero_plugin'),
                'type'      => Controls_Manager::SLIDER,
                'size_units' => [ 'px', 'em' ],
                'selectors' => [
                    '{{WRAPPER}} .testimonial-item .testimonial:before' =>
                        'font-size: {{SIZE}}{{UNIT}};'
                ]
            ]
        );

        $this->add_group_control(
            Group_Control_Typography::get_type(),
            [
                'name'      => 'text_typography',
                'label'     => esc_html__('Testimonial Text Typography', 'aiero_plugin'),
                'selector'  => '{{WRAPPER}} .testimonial-item .testimonial',
                'separator' => 'before',
            ]
        );

        $this->add_control(
            'text_color',
            [
                'label'     => esc_html__('Testimonial Text Color', 'aiero_plugin'),
                'type'      => Controls_Manager::COLOR,
                'selectors' => [
                    '{{WRAPPER}} .testimonial-item .testimonial' => 'color: {{VALUE}};'
                ]
            ]
        );

        $this->add_control(
            'info_color',
            [
                'label'     => esc_html__('Testimonial Info Color', 'aiero_plugin'),
                'type'      => Controls_Manager::COLOR,
                'separator' => 'after',
                'selectors' => [
                    '{{WRAPPER}} .testimonial-item .author-info, {{WRAPPER}} .testimonial-item .author-position:before' => 'color: {{VALUE}};'
                ]
            ]
        );

        $this->add_group_control(
            Group_Control_Typography::get_type(),
            [
                'name'      => 'author_typography',
                'label'     => esc_html__('Author Name Typography', 'aiero_plugin'),
                'selector'  => '{{WRAPPER}} .author-name',
                'separator' => 'before',
            ]
        );

        $this->add_control(
            'author_color',
            [
                'label'     => esc_html__('Author Name Color', 'aiero_plugin'),
                'type'      => Controls_Manager::COLOR,
                'separator' => 'after',
                'selectors' => [
                    '{{WRAPPER}} .author-name' => 'color: {{VALUE}};'
                ]
            ]
        );

        $this->add_group_control(
            Group_Control_Typography::get_type(),
            [
                'name'      => 'position_typography',
                'label'     => esc_html__('Author Position Typography', 'aiero_plugin'),
                'selector'  => '{{WRAPPER}} .author-position',
            ]
        );

        $this->add_control(
            'position_color',
            [
                'label'     => esc_html__('Author Position Color', 'aiero_plugin'),
                'type'      => Controls_Manager::COLOR,
                'selectors' => [
                    '{{WRAPPER}} .author-position' => 'color: {{VALUE}};'
                ]
            ]
        );

        $this->end_controls_section();

        // ----------------------------------------- //
        // ---------- Slider Nav Settings ---------- //
        // ----------------------------------------- //
        $this->start_controls_section(
            'slider_nav_settings_section',
            [
                'label'         => esc_html__('Slider Navigation Settings', 'aiero_plugin'),
                'tab'           => Controls_Manager::TAB_STYLE,
                'conditions'    => [
                    'relation'  => 'or',
                    'terms'     => [
                        [
                            'name'      => 'dots',
                            'operator'  => '==',
                            'value'     => 'yes'
                        ],
                        [
                            'name'      => 'nav',
                            'operator'  => '==',
                            'value'     => 'yes'
                        ],
                    ],
                ]
            ]
        );

        $this->start_controls_tabs(
            'slider_pagination_settings_tabs',
            [
                'condition' => [
                    'dots'      => 'yes'
                ]
            ]
        );

            // ------------------------ //
            // ------ Normal Tab ------ //
            // ------------------------ //
            $this->start_controls_tab(
                'slider_dots_normal',
                [
                    'label' => esc_html__('Normal', 'aiero_plugin')
                ]
            );

                $this->add_control(
                    'dot_color',
                    [
                        'label'     => esc_html__('Pagination Dot Color', 'aiero_plugin'),
                        'type'      => Controls_Manager::COLOR,
                        'selectors' => [
                            '{{WRAPPER}} .owl-dots .owl-dot span' => 'color: {{VALUE}};'
                        ]
                    ]
                );

            $this->end_controls_tab();

            // ------------------------ //
            // ------ Active Tab ------ //
            // ------------------------ //
            $this->start_controls_tab(
                'slider_dots_active',
                [
                    'label' => esc_html__('Active', 'aiero_plugin')
                ]
            );

                $this->add_control(
                    'dot_active',
                    [
                        'label'     => esc_html__('Pagination Active Dot Color', 'aiero_plugin'),
                        'type'      => Controls_Manager::COLOR,
                        'selectors' => [
                            '{{WRAPPER}} .owl-dots .owl-dot.active span' => 'color: {{VALUE}};'
                        ]
                    ]
                );

            $this->end_controls_tab();

        $this->end_controls_tabs();

        $this->add_control(
            'nav_bg',
            [
                'label'     => esc_html__('Slider Arrows Background Color', 'aiero_plugin'),
                'type'      => Controls_Manager::COLOR,
                'selectors' => [
                    '{{WRAPPER}} .owl-nav' => 'background-color: {{VALUE}};',
                    '{{WRAPPER}} .owl-nav-wrapper:before, {{WRAPPER}} .owl-nav-wrapper:after' => 'box-shadow: 0 20px 0 0 {{VALUE}};'
                ],
                'condition' => [
                    'nav'       => 'yes'
                ]
            ]
        );

        $this->start_controls_tabs(
            'slider_nav_settings_tabs',
            [
                'condition' => [
                    'nav'       => 'yes'
                ]
            ]
        );

            // ------------------------ //
            // ------ Normal Tab ------ //
            // ------------------------ //
            $this->start_controls_tab(
                'tab_arrows_normal',
                [
                    'label' => esc_html__('Normal', 'aiero_plugin')
                ]
            );

                $this->add_control(
                    'nav_color',
                    [
                        'label'     => esc_html__('Slider Arrows Color', 'aiero_plugin'),
                        'type'      => Controls_Manager::COLOR,
                        'selectors' => [
                            '{{WRAPPER}} .owl-nav [class*="owl-"], {{WRAPPER}} .owl-nav [class*="owl-"].disabled:hover' => 'color: {{VALUE}};'
                        ]
                    ]
                );                

            $this->end_controls_tab();

            // ----------------------- //
            // ------ Hover Tab ------ //
            // ----------------------- //
            $this->start_controls_tab(
                'tab_arrows_hover',
                [
                    'label' => esc_html__('Hover', 'aiero_plugin')
                ]
            );

                $this->add_control(
                    'nav_hover',
                    [
                        'label'     => esc_html__('Slider Arrows Color', 'aiero_plugin'),
                        'type'      => Controls_Manager::COLOR,
                        'selectors' => [
                            '{{WRAPPER}} .owl-nav [class*="owl-"]:not(.disabled):hover' => 'color: {{VALUE}};'
                        ]
                    ]
                );

            $this->end_controls_tab();

        $this->end_controls_tabs();

        $this->end_controls_section();
    }

    protected function render() {
        $settings           = $this->get_settings();

        $view_type          = $settings['view_type'];
        $author_style       = $settings['author_style'];
        $columns_number     = $settings['columns_number'];
        $testimonials_items = $settings['testimonials_items'];
        $widget_id          = $this->get_id();

        $slider_options = [
            'items'                 => !empty($columns_number) ? (int)$columns_number : 1,
            'nav'                   => ('yes' === $settings['nav']),
            'dots'                  => ('yes' === $settings['dots']),
            'autoplayHoverPause'    => ('yes' === $settings['autoplay'] ? 'yes' === $settings['pause_on_hover'] : false),
            'autoplay'              => ('yes' === $settings['autoplay']),
            'autoplaySpeed'         => absint($settings['autoplay_speed']),
            'autoplayTimeout'       => absint($settings['autoplay_timeout']),
            'loop'                  => ('yes' === $settings['infinite']),
            'dragEndSpeed'          => absint($settings['speed']),
            'navSpeed'              => absint($settings['speed']),
            'dotsSpeed'             => absint($settings['speed']),
            'dotsContainer'         => !empty($widget_id) ? '.owl-dots-' . esc_attr($widget_id) : false,
            'navContainer'          => !empty($widget_id) ? '.owl-nav-' . esc_attr($widget_id) : false
        ];

        $item_classes = 'testimonial-item slider-item' . ( !empty($view_type) ? ' slider-item-' . esc_attr($view_type) : ' slider-item-type-1' );
        $item_classes .= ( !empty($author_style) ? ' slider-item-author-' . esc_attr($author_style) : '' );

        // ------------------------------------ //
        // ---------- Widget Content ---------- //
        // ------------------------------------ //
        ?>

        <div class="aiero-testimonial-carousel-widget">
            <div class="testimonial-carousel-wrapper">

                <div class="testimonials-slider-container">
                    <div class="testimonials-slider owl-carousel owl-theme" data-slider-options="<?php echo esc_attr(wp_json_encode($slider_options)); ?>">
                        <?php

                            foreach ($testimonials_items as $item) {
                                $image_src = wp_get_attachment_image_url($item['photo']['id'], array(90, 90));
                                $image_alt_text = get_post_meta($item['photo']['id'], '_wp_attachment_image_alt', true);

                                $image = '<img src="' . esc_url($image_src) . '" alt="' . esc_attr($image_alt_text) . '" >';

                                echo '<div class="' . esc_attr($item_classes) . '">';
                                    echo ( !empty($item['testimonial']) ? '<div class="testimonial">' . aiero_output_code($item['testimonial']) . '</div>' : '' );
                                    if ( !empty($item['photo']['url']) || !empty($item['name']) || !empty($item['position']) ) {
                                        echo '<div class="author-container">';
                                            if ( !empty($item['photo']['url']) ) {
                                                echo '<div class="testimonial-photo">';
                                                    echo wp_kses($image, array(
                                                        'img' => array(
                                                            'src' => true,
                                                            'alt' => true
                                                        )
                                                    ));
                                                echo '</div>';
                                            }
                                            if ( !empty($item['name']) || !empty($item['position']) ) {
                                                echo '<div class="author-info">';
                                                    echo ( !empty($item['name']) ? '<span class="author-name">' . esc_html($item['name']) . '</span>' : '' );
                                                    echo ( !empty($item['position']) ? '<span class="author-position">' . esc_html($item['position']) . '</span>' : '' );
                                                echo '</div>';
                                            }                                            
                                        echo '</div>';
                                    }
                                echo '</div>';
                            }
                        ?>
                    </div>
                </div>
                <?php
                    if('yes' === $settings['nav']) {
                        echo '<div class="owl-nav-wrapper"><div class="owl-nav' . ( !empty($widget_id) ? ' owl-nav-' . esc_attr($widget_id) : '' ) . '"></div></div>';
                    }
                    if('yes' === $settings['dots']) { 
                        echo '<div class="owl-dots' . ( !empty($widget_id) ? ' owl-dots-' . esc_attr($widget_id) : '' ) . '"></div>';   
                    }                                  
                ?>
            </div>
        </div>

        <?php
    }

    protected function content_template() {}

    public function render_plain_content() {}
}