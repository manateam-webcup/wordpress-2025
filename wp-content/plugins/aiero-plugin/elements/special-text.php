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
use Elementor\Utils;

if ( ! defined( 'ABSPATH' ) ) exit; // Exit if accessed directly

class Aiero_Special_Text_Widget extends Widget_Base {

    public function get_name() {
        return 'aiero_special_text';
    }

    public function get_title() {
        return esc_html__('Special Text', 'aiero_plugin');
    }

    public function get_icon() {
        return 'eicon-t-letter';
    }

    public function get_categories() {
        return ['aiero_widgets'];
    }

    protected function register_controls() {

        // ----------------------------- //
        // ---------- Content ---------- //
        // ----------------------------- //
        $this->start_controls_section(
            'section_special_text',
            [
                'label' => esc_html__('Special Text', 'aiero_plugin')
            ]
        );

        $this->add_control(
            'effect',
            [
                'label'     => esc_html__( 'Select Effect', 'aiero_plugin' ),
                'type'      => Controls_Manager::SELECT,
                'default'   => '',
                'options'   => [
                    ''   => esc_html__( 'Default', 'aiero_plugin' ),
                    'stroke'    => esc_html__( 'Stroke', 'aiero_plugin' ),
                    'fill'      => esc_html__( 'Fill', 'aiero_plugin' )
                ],
            ]
        );

        $this->add_control(
            'text',
            [
                'label'         => esc_html__( 'Text', 'aiero_plugin' ),
                'type'          => Controls_Manager::WYSIWYG,
                'default'       => esc_html__( 'Special Text', 'aiero_plugin' ),
            ]
        );

        $this->add_control(
            'text_tag',
            [
                'label'     => esc_html__('HTML Tag', 'aiero_plugin'),
                'type'      => Controls_Manager::SELECT,
                'options'   => [
                    'h1'        => esc_html__( 'H1', 'aiero_plugin' ),
                    'h2'        => esc_html__( 'H2', 'aiero_plugin' ),
                    'h3'        => esc_html__( 'H3', 'aiero_plugin' ),
                    'h4'        => esc_html__( 'H4', 'aiero_plugin' ),
                    'h5'        => esc_html__( 'H5', 'aiero_plugin' ),
                    'h6'        => esc_html__( 'H6', 'aiero_plugin' ),
                    'div'       => esc_html__( 'div', 'aiero_plugin' ),
                    'span'      => esc_html__( 'span', 'aiero_plugin' ),
                    'p'         => esc_html__( 'p', 'aiero_plugin' )
                ],
                'default'   => 'div'
            ]
        );

        $this->add_responsive_control(
            'text_align',
            [
                'label'     => esc_html__('Alignment', 'aiero_plugin'),
                'type'      => Controls_Manager::CHOOSE,
                'options'   => [
                    'left'      => [
                        'title'     => esc_html__('Left', 'aiero_plugin'),
                        'icon'      => 'eicon-text-align-left',
                    ],
                    'center'    => [
                        'title'     => esc_html__('Center', 'aiero_plugin'),
                        'icon'      => 'eicon-text-align-center',
                    ],
                    'right'     => [
                        'title'     => esc_html__('Right', 'aiero_plugin'),
                        'icon'      => 'eicon-text-align-right',
                    ]
                ],
                'default'   => 'left',
                'selectors' => [
                    '{{WRAPPER}} .special-text-wrapper' => 'text-align: {{VALUE}};',
                ],
                'separator' => 'before'
            ]
        );

        $this->add_responsive_control(
            'text_padding',
            [
                'label'         => esc_html__('Text Padding', 'aiero_plugin'),
                'type'          => Controls_Manager::DIMENSIONS,
                'size_units'    => ['px', 'em', '%'],
                'selectors'     => [
                    '{{WRAPPER}} .special-text' => 'padding: {{TOP}}{{UNIT}} {{RIGHT}}{{UNIT}} {{BOTTOM}}{{UNIT}} {{LEFT}}{{UNIT}};',
                ]
            ]
        );

        $this->end_controls_section();

        // ----------------------------------- //
        // ---------- Text Settings ---------- //
        // ----------------------------------- //
        $this->start_controls_section(
            'section_text_settings',
            [
                'label' => esc_html__('Text Settings', 'aiero_plugin'),
                'tab'   => Controls_Manager::TAB_STYLE
            ]
        );

        $this->add_group_control(
            Group_Control_Typography::get_type(),
            [
                'name'      => 'text_typography',
                'label'     => esc_html__('Text Typography', 'aiero_plugin'),
                'selector'  => '{{WRAPPER}} .special-text'
            ]
        );

        $this->add_control(
            'text_color',
            [
                'label'     => esc_html__('Text Color', 'aiero_plugin'),
                'type'      => Controls_Manager::COLOR,
                'selectors' => [
                    '{{WRAPPER}} .special-text' => 'color: {{VALUE}};'
                ]
            ]
        );

        $this->add_control(
            'text_color_stroke',
            [
                'label'     => esc_html__('Text Stroke Color', 'aiero_plugin'),
                'type'      => Controls_Manager::COLOR,
                'selectors' => [
                    '{{WRAPPER}} .special-text' => '-webkit-text-stroke: 1px {{VALUE}}; text-stroke: 1px {{VALUE}};'
                ],
                'condition' => [
                    'effect'    => [ 'stroke', 'fill' ]
                ]
            ]
        );

        $this->add_control(
            'text_stroke_width',
            [
                'label'     => esc_html__('Text Stroke Width', 'aiero_plugin'),
                'type'      => Controls_Manager::SLIDER,
                'range'     => [
                    'px'         => [
                        'min'       => 0,
                        'max'       => 20,
                        'step'      => 1
                    ]
                ],
                'default'   => [
                    'unit'      => 'px',
                    'size'      => 1,
                ],
                'selectors' => [
                    '{{WRAPPER}} .special-text' => '-webkit-text-stroke-width: {{SIZE}}{{UNIT}};'
                ],
                'condition' => [
                    'effect'    => [ 'stroke', 'fill' ]
                ]
            ]
        );

        $this->add_group_control(
            Group_Control_Background::get_type(),
            [
                'name'      => 'text_background',
                'label'     => esc_html__( 'Text Gradient', 'aiero_plugin' ),
                'fields'    => [
                    'label' => esc_html__( 'Text Gradient', 'aiero_plugin' ),
                ],
                'types'     => [ 'classic', 'gradient' ],
                'selector'  => '{{WRAPPER}} .special-text',
                'condition' => [
                    'effect'    => 'fill'
                ]
            ]
        );

        $this->add_control(
            'text_opacity',
            [
                'label'     => esc_html__('Opacity', 'aiero_plugin'),
                'type'      => Controls_Manager::SLIDER,
                'range'     => [
                    '%'         => [
                        'min'       => 0,
                        'max'       => 1,
                        'step'      => .01
                    ]
                ],
                'default'   => [
                    'unit'      => '%',
                    'size'      => 1,
                ],
                'selectors' => [
                    '{{WRAPPER}} .special-text' => 'opacity: {{SIZE}};'
                ]
            ]
        );

        $this->add_control(
            'animate',
            [
                'label' => esc_html__( 'Add Text Animation', 'aiero_plugin' ),
                'type' => Controls_Manager::SWITCHER,
                'label_on' => esc_html__( 'Yes', 'aiero_plugin' ),
                'label_off' => esc_html__( 'No', 'aiero_plugin' ),
                'return_value' => 'yes',
                'default' => ''
            ]
        );

        $this->add_control(
            'text_count',
            [
                'label' => esc_html__( 'Duplicate Text, times', 'aiero_plugin' ),
                'type' => Controls_Manager::NUMBER,
                'min' => 1,
                'max' => 10,
                'step' => 1,
                'default' => 2,
                'condition' => [
                    'animate' => 'yes'
                ]
            ]
        );

        $this->add_control(
            'animation_direction',
            [
                'label'     => esc_html__('Text Animation Direction', 'aiero_plugin'),
                'type'      => Controls_Manager::SELECT,
                'options'   => [
                    'left'      => esc_html__( 'Left', 'aiero_plugin' ),
                    'right'     => esc_html__( 'Right', 'aiero_plugin' )
                ],
                'default'   => 'left',
                'condition' => [
                    'animate' => 'yes'
                ]
            ]
        );

        $this->add_control(
            'text_animation_duration',
            [
                'label'     => esc_html__( 'Animation Duration, s', 'aiero_plugin' ),
                'type'      => Controls_Manager::SLIDER,
                'size_units' => ['px'],
                'range'     => [
                    'px'        => [
                        'min' => 0.1,
                        'max'       => 30,
                        'step'      => 0.1,
                    ],
                ],
                'default' => [
                    'unit' => 'px',
                    'size' => 10,
                ],
                'selectors' => [
                    '{{WRAPPER}} .special-text-wrapper.animated .special-text' => 'animation-duration: {{SIZE}}s',
                ],
                'condition' => [
                    'animate' => 'yes'
                ]
            ]
        );

        $this->end_controls_section();

    }

    protected function render() {
        $settings       = $this->get_settings();
        $effect         = $settings['effect'];
        $text           = $settings['text'];
        $text_tag       = $settings['text_tag'];
        $animate             = $settings['animate'];
        $animation_direction = $settings['animation_direction'];
        $text_count          = (!empty($settings['text_count'] && $animate === 'yes') ? $settings['text_count'] : 1);

        $wrapper_classes = 'special-text-wrapper' . ($animate === 'yes' ? ' animate animated animation-direction-' . $animation_direction : '');
        $block_classes  = 'special-text' . ( !empty($effect) ? ' special-text-effect-' . esc_attr($effect) : '' );

        // ------------------------------------ //
        // ---------- Widget Content ---------- //
        // ------------------------------------ //
        echo '<div class="' . esc_attr($wrapper_classes) . '">';
            if ( !empty($text) ) {
                for ($i = 0; $i < $text_count; $i++) { 
                    echo '<' . esc_html($text_tag) . ' class="' . esc_attr($block_classes) . '">';
                        echo wp_kses($text, array(
                            'br'        => array(),
                            'span'      => array(
                                'style'     => true
                            ),
                            'a'         => array(
                                'href'      => true,
                                'target'    => true
                            ),
                            'img'       => array(
                                'src'       => true,
                                'srcset'    => true,
                                'sizes'     => true,
                                'class'     => true,
                                'alt'       => true,
                                'title'     => true
                            ),
                            'em'        => array(),
                            'strong'    => array(),
                            'del'       => array()
                        ));
                        if( $animate === 'yes' ) {
                        	echo '&nbsp;';
                        }                        
                    echo '</' . esc_html($text_tag) . '>';
                }
            echo '</div>';
        }
    }

    protected function content_template() {}

    public function render_plain_content() {}
}
