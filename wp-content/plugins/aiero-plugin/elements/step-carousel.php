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
use Elementor\REPEATER;
use Elementor\Utils;

if ( ! defined( 'ABSPATH' ) ) exit; // Exit if accessed directly

class Aiero_Step_Carousel_Widget extends Widget_Base {

    public function get_name() {
        return 'aiero_step_carousel';
    }

    public function get_title() {
        return esc_html__('Step Carousel', 'aiero_plugin');
    }

    public function get_icon() {
        return 'eicon-slider-album';
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
                'label' => esc_html__('Step Carousel', 'aiero_plugin')
            ]
        );

        $this->add_control(
            'view_type',
            [
                'label'         => esc_html__('View Type', 'aiero_plugin'),
                'type'          => Controls_Manager::SELECT,
                'default'       => 'type-1',
                'options'       => [
                    'type-1'          => esc_html__('Type 1', 'aiero_plugin'),
                    'type-2'          => esc_html__('Type 2', 'aiero_plugin')
                ],
                'prefix_class'  => 'view_'
            ]
        );

        $this->add_control(
            'style_type',
            [
                'label'         => esc_html__('Style Type', 'aiero_plugin'),
                'type'          => Controls_Manager::SELECT,
                'default'       => 'type-1',
                'options'       => [
                    'type-1'    => esc_html__('Type 1', 'aiero_plugin'),
                    'type-2'    => esc_html__('Type 2', 'aiero_plugin')
                ]
            ]
        );

        $this->add_control(
            'title',
            [
                'label'         => esc_html__('Title', 'aiero_plugin'),
                'type'          => Controls_Manager::WYSIWYG
            ]
        );

        $this->add_control(
            'add_subtitle',
            [
                'label'         => esc_html__('Add Subheading', 'aiero_plugin'),
                'type'          => Controls_Manager::SWITCHER,
                'default'       => 'no',
                'return_value'  => 'yes',
                'label_off'     => esc_html__('No', 'aiero_plugin'),
                'label_on'      => esc_html__('Yes', 'aiero_plugin')
            ]
        );

        $this->add_control(
            'subtitle',
            [
                'label'         => esc_html__('Subheading', 'aiero_plugin'),
                'type'          => Controls_Manager::TEXT,
                'default'       => esc_html__( 'This is subheading element', 'aiero_plugin' ),
                'placeholder'   => esc_html__( 'Enter Your Subheading', 'aiero_plugin'),
                'label_block'   => true,
                'condition'     => [
                    'add_subtitle'  => 'yes'
                ]
            ]
        );

        $this->add_control(
            'title_tag',
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
                'default'   => 'h2'
            ]
        );

        $this->add_control(
            'title_align',
            [
                'label'         => esc_html__('Title Alignment', 'aiero_plugin'),
                'type'          => Controls_Manager::CHOOSE,
                'options'       => [
                    'left'           => [
                        'title'         => esc_html__('Left', 'aiero_plugin'),
                        'icon'          => 'eicon-text-align-left',
                    ],
                    'center'        => [
                        'title'         => esc_html__('Center', 'aiero_plugin'),
                        'icon'          => 'eicon-text-align-center',
                    ],
                    'right'   => [
                        'title'         => esc_html__('Right', 'aiero_plugin'),
                        'icon'          => 'eicon-text-align-right',
                    ]
                ],
                'default'       => is_rtl() ? 'right' : 'left',
                'prefix_class'  => 'title-alignment-'
            ]
        );
        
        $repeater = new Repeater();
        
        $repeater->add_control(
            'step_number',
            [
                'label'     => esc_html__('Step Number', 'aiero_plugin'),
                'type'      => Controls_Manager::TEXT,
                'default'   => esc_html__('01', 'aiero_plugin'),
                'separator' => 'before'
            ]
        );

        $repeater->add_control(
            'step_label',
            [
                'label'     => esc_html__('Step Label', 'aiero_plugin'),
                'type'      => Controls_Manager::TEXT,
                'default'   => esc_html__('step', 'aiero_plugin'),
                'description' => esc_html__('This label is only available for Style Type 2 view', 'aiero_plugin'),
                'separator' => 'before'
            ]
        );

        $repeater->add_control(
            'step_title',
            [
                'label'         => esc_html__('Title', 'aiero_plugin'),
                'type'          => Controls_Manager::TEXT,
                'label_block'   => true,
                'default'       => ''
            ]
        );

        $repeater->add_control(
            'step_description',
            [
                'label'         => esc_html__('Description', 'aiero_plugin'),
                'description'   => esc_html__('Enter description', 'aiero_plugin'),
                'type'          => Controls_Manager::TEXTAREA,
                'default'       => ''
            ]
        );

        $this->add_control(
            'step_items',
            [
                'label'         => esc_html__('Steps', 'aiero_plugin'),
                'type'          => Controls_Manager::REPEATER,
                'fields'        => $repeater->get_controls(),
                'title_field'   => '{{{name}}}',
                'prevent_empty' => false,
                'separator'     => 'before'
            ]
        );

        $this->add_responsive_control(
            'step_align',
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
                    '{{WRAPPER}} .step-item' => 'text-align: {{VALUE}};',
                ],
                'separator' => 'before'
            ]
        );

        $this->add_responsive_control(
            'item_spacing',
            [
                'label'     => esc_html__('Space between items', 'aiero_plugin'),
                'type'      => Controls_Manager::SLIDER,
                'range'     => [
                    'px'        => [
                        'min'       => 0,
                        'max'       => 100
                    ]
                ],
                'default'   => [
                    'unit'      => 'px',
                    'size'      => 0
                ],
                'selectors' => [
                    '{{WRAPPER}} .steps-slider-container' => 'margin: 0 calc(-{{SIZE}}{{UNIT}}/2);',
                    '{{WRAPPER}} .step-item.slider-item' => 'margin: 0 calc({{SIZE}}{{UNIT}}/2);'
                ]
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

        // -------------------------------------------- //
        // ---------- Widget Title Settings ---------- //
        // -------------------------------------------- //
        $this->start_controls_section(
            'title_settings_section',
            [
                'label'     => esc_html__('Heading Settings', 'aiero_plugin'),
                'tab'       => Controls_Manager::TAB_STYLE
            ]
        );

        $this->add_group_control(
            Group_Control_Typography::get_type(),
            [
                'name'      => 'heading_typography',
                'label'     => esc_html__('Heading Typography', 'aiero_plugin'),
                'selector'  => '{{WRAPPER}} .aiero-heading'
            ]
        );

        $this->add_control(
            'heading_color',
            [
                'label'     => esc_html__('Heading Color', 'aiero_plugin'),
                'type'      => Controls_Manager::COLOR,
                'selectors' => [
                    '{{WRAPPER}} .aiero-heading .aiero-heading-content' => 'color: {{VALUE}};'
                ]
            ]
        );

        $this->add_group_control(
            Group_Control_Typography::get_type(),
            [
                'name'      => 'subtitle_typography',
                'label'     => esc_html__('Subheading Typography', 'aiero_plugin'),
                'selector'  => '{{WRAPPER}} .aiero-subheading',
                'condition' => [
                    'add_subtitle'  => 'yes'
                ]
            ]
        );

        $this->add_control(
            'subtitle_color',
            [
                'label'     => esc_html__('Subheading Color', 'aiero_plugin'),
                'type'      => Controls_Manager::COLOR,
                'selectors' => [
                    '{{WRAPPER}} .aiero-subheading' => 'color: {{VALUE}};'
                ],
                'condition' => [
                    'add_subtitle'  => 'yes'
                ]
            ]
        );

        $this->add_control(
            'accent_text_color',
            [
                'label'     => esc_html__('Text Underline Color', 'aiero_plugin'),
                'type'      => Controls_Manager::COLOR,
                'selectors' => [
                    '{{WRAPPER}} .aiero-heading .aiero-heading-content span[style *= "text-decoration: underline"]:before' => 'background-color: {{VALUE}} !important;'
                ]
            ]
        );
        
        $this->add_responsive_control(
            'space_subheading',
            [
                'label' => esc_html__( 'Space between Heading and Subheading', 'aiero_plugin' ),
                'type' => Controls_Manager::SLIDER,
                'size_units' => [ 'px', 'em' ],
                'range' => [
                    'px' => [
                        'min' => 0,
                        'max' => 100,
                        'step' => 1,
                    ],
                    'em' => [
                        'min' => 0,
                        'max' => 5,
                        'step' => 0.1,
                    ],
                ],
                'selectors' => [
                    '{{WRAPPER}} .aiero-heading .aiero-subheading:not(:last-child)' => 'margin-bottom: {{SIZE}}{{UNIT}};',
                ],
                'condition' => [
                    'add_subtitle' => 'yes'
                ]
            ]
        );

        $this->add_responsive_control(
            'heading_spacing',
            [
                'label'         => esc_html__('Heading Padding', 'aiero_plugin'),
                'type'          => Controls_Manager::DIMENSIONS,
                'size_units'    => ['px', 'em', '%', 'vw'],
                'selectors'     => [
                    '{{WRAPPER}} .aiero-heading .aiero-heading-inner' => 'padding: {{TOP}}{{UNIT}} {{RIGHT}}{{UNIT}} {{BOTTOM}}{{UNIT}} {{LEFT}}{{UNIT}};',
                ]
            ]
        );

        $this->end_controls_section();

        // ----------------------------------- //
        // ---------- Item Settings ---------- //
        // ----------------------------------- //
        $this->start_controls_section(
            'section_item_settings',
            [
                'label'         => esc_html__('Step Item Settings', 'aiero_plugin'),
                'tab'           => Controls_Manager::TAB_STYLE
            ]
        );

        $this->add_control(
            'item_background_color',
            [
                'label'         => esc_html__('Background Color', 'aiero_plugin'),
                'type'          => Controls_Manager::COLOR,
                'default'       => '',
                'selectors'     => [
                    '{{WRAPPER}} .step-item' => 'background-color: {{VALUE}};'
                ]
            ]
        );

        $this->add_responsive_control(
            'item_padding',
            [
                'label'         => esc_html__('Item Padding', 'aiero_plugin'),
                'type'          => Controls_Manager::DIMENSIONS,
                'size_units'    => ['px', 'em'],
                'selectors'     => [
                    '{{WRAPPER}} .step-item' => 'padding: {{TOP}}{{UNIT}} {{RIGHT}}{{UNIT}} {{BOTTOM}}{{UNIT}} {{LEFT}}{{UNIT}};',
                ]
            ]
        );

        $this->add_control(
            'border_width',
            [
                'label'     => esc_html__('Border Width', 'aiero_plugin'),
                'type'      => Controls_Manager::SLIDER,
                'range'     => [
                    'px'         => [
                        'min'       => 0,
                        'max'       => 20,
                        'step'      => 1
                    ]
                ],
                'selectors' => [
                    '{{WRAPPER}} .style_type-2 .owl-item.active + .active' => is_rtl() ? 'border-right-width: {{SIZE}}{{UNIT}};' : 'border-left-width: {{SIZE}}{{UNIT}};',
                ],
                'condition' => [
                    'style_type' => 'type-2'
                ]
            ]
        );

        $this->add_control(
            'border_color',
            [
                'label'         => esc_html__('Border Color', 'aiero_plugin'),
                'type'          => Controls_Manager::COLOR,
                'selectors'     => [
                    '{{WRAPPER}} .style_type-2 .owl-item.active + .active' => 'border-color: {{VALUE}};'
                ],
                'condition' => [
                    'style_type' => 'type-2'
                ]
            ]
        );
        
        $this->add_responsive_control(
            'border_spacing',
            [
                'label'     => esc_html__('Space after border', 'aiero_plugin'),
                'type'      => Controls_Manager::SLIDER,
                'range'     => [
                    'px'        => [
                        'min'       => 0,
                        'max'       => 100
                    ]
                ],
                'selectors' => [
                    '{{WRAPPER}} .style_type-2 .owl-item.active + .active .step-item' => is_rtl() ? 'padding-right: {{SIZE}}{{UNIT}};' : 'padding-left: {{SIZE}}{{UNIT}};',
                ],
                'condition' => [
                    'style_type' => 'type-2'
                ]
            ]
        );

        $this->end_controls_section();

        // ------------------------------------- //
        // ---------- Number Settings ---------- //
        // ------------------------------------- //
        $this->start_controls_section(
            'section_number_settings',
            [
                'label'         => esc_html__('Number Settings', 'aiero_plugin'),
                'tab'           => Controls_Manager::TAB_STYLE
            ]
        );

        $this->add_group_control(
            Group_Control_Typography::get_type(),
            [
                'name'          => 'number_typography',
                'label'         => esc_html__('Number Typography', 'aiero_plugin'),
                'selector'      => '{{WRAPPER}} .step-item .step-number'
            ]
        );

        $this->add_control(
            'number_color',
            [
                'label'         => esc_html__('Number Color', 'aiero_plugin'),
                'type'          => Controls_Manager::COLOR,
                'default'       => '',
                'selectors'     => [
                    '{{WRAPPER}} .step-item .step-number' => 'color: {{VALUE}}; -webkit-text-fill-color: {{VALUE}};'
                ]
            ]
        );

        $this->add_control(
            'number_color_stroke',
            [
                'label'     => esc_html__('Text Stroke Color', 'aiero_plugin'),
                'type'      => Controls_Manager::COLOR,
                'selectors' => [
                    '{{WRAPPER}} .step-item .step-number' => '-webkit-text-stroke: 1px {{VALUE}}; text-stroke: 1px {{VALUE}};'
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
                    '{{WRAPPER}} .step-item .step-number' => '-webkit-text-stroke-width: {{SIZE}}{{UNIT}};'
                ]
            ]
        );

        $this->add_group_control(
            Group_Control_Background::get_type(),
            [
                'name'      => 'text_background',
                'label'     => esc_html__( 'Text Background', 'aiero_plugin' ),
                'types'     => [ 'classic', 'gradient' ],
                'selector'  => '{{WRAPPER}} .step-item .step-number'
            ]
        );

        $this->add_responsive_control(
            'number_spacing',
            [
                'label'         => esc_html__('Space after number', 'aiero_plugin'),
                'type'          => Controls_Manager::SLIDER,
                'range'         => [
                    'px'            => [
                        'min' => 0,
                        'max' => 200
                    ]
                ],
                'selectors' => [
                    '{{WRAPPER}} .step-number:not(:last-child)' => 'margin-right: {{SIZE}}{{UNIT}};',
                    'body.rtl {{WRAPPER}} .step-number:not(:last-child)' => 'margin-left: {{SIZE}}{{UNIT}}; margin-right: auto;',
                    '{{WRAPPER}} .style_type-2 .step-number:not(:last-child)' => 'margin-bottom: {{SIZE}}{{UNIT}}; margin-right: 0; margin-left: 0;',
                ]
            ]
        );

        $this->end_controls_section();

        // ------------------------------------ //
        // ---------- Title Settings ---------- //
        // ------------------------------------ //
        $this->start_controls_section(
            'section_title_settings',
            [
                'label'         => esc_html__('Title Settings', 'aiero_plugin'),
                'tab'           => Controls_Manager::TAB_STYLE
            ]
        );

        $this->add_group_control(
            Group_Control_Typography::get_type(),
            [
                'name'          => 'title_typography',
                'label'         => esc_html__('Title Typography', 'aiero_plugin'),
                'selector'      => '{{WRAPPER}} .step-title'
            ]
        );

        $this->add_control(
            'title_color',
            [
                'label'         => esc_html__('Title Color', 'aiero_plugin'),
                'type'          => Controls_Manager::COLOR,
                'default'       => '',
                'selectors'     => [
                    '{{WRAPPER}} .step-title' => 'color: {{VALUE}};'
                ]
            ]
        );

        $this->add_control(
            'title_hover',
            [
                'label'         => esc_html__('Title Hover', 'aiero_plugin'),
                'type'          => Controls_Manager::COLOR,
                'default'       => '',
                'selectors'     => [
                    '{{WRAPPER}} .step-item:hover .step-title' => 'color: {{VALUE}};'
                ]
            ]
        );

        $this->add_responsive_control(
            'title_spacing',
            [
                'label'         => esc_html__('Space between title and description', 'aiero_plugin'),
                'type'          => Controls_Manager::SLIDER,
                'range'         => [
                    'px'            => [
                        'min' => 0,
                        'max' => 200
                    ]
                ],
                'selectors' => [
                    '{{WRAPPER}} .step-title:not(:last-child)' => 'margin-bottom: {{SIZE}}{{UNIT}};'
                ]
            ]
        );

        $this->add_responsive_control(
            'step_content_padding',
            [
                'label'         => esc_html__('Step Content Padding', 'aiero_plugin'),
                'type'          => Controls_Manager::DIMENSIONS,
                'size_units'    => ['px', '%', 'em'],
                'selectors'     => [
                    '{{WRAPPER}} .step-item .step-content' => 'padding: {{TOP}}{{UNIT}} {{RIGHT}}{{UNIT}} {{BOTTOM}}{{UNIT}} {{LEFT}}{{UNIT}};'
                ]
            ]
        );

        $this->end_controls_section();

        // ------------------------------------ //
        // ---------- Label Settings ---------- //
        // ------------------------------------ //
        $this->start_controls_section(
            'section_label_settings',
            [
                'label'         => esc_html__('Label Settings', 'aiero_plugin'),
                'tab'           => Controls_Manager::TAB_STYLE,
                'condition'     => [
                    'style_type' => 'type-2'
                ]
            ]
        );

        $this->add_group_control(
            Group_Control_Typography::get_type(),
            [
                'name'          => 'label_typography',
                'label'         => esc_html__('Label Typography', 'aiero_plugin'),
                'selector'      => '{{WRAPPER}} .aiero-step-carousel-widget.style_type-2 .step-item .step-label'
            ]
        );

        $this->add_control(
            'label_color',
            [
                'label'         => esc_html__('Label Color', 'aiero_plugin'),
                'type'          => Controls_Manager::COLOR,
                'default'       => '',
                'selectors'     => [
                    '{{WRAPPER}} .step-label' => 'color: {{VALUE}};'
                ]
            ]
        );

        $this->end_controls_section();

        // ------------------------------------------ //
        // ---------- Description Settings ---------- //
        // ------------------------------------------ //
        $this->start_controls_section(
            'section_description_settings',
            [
                'label' => esc_html__('Description Settings', 'aiero_plugin'),
                'tab'   => Controls_Manager::TAB_STYLE
            ]
        );

        $this->add_group_control(
            Group_Control_Typography::get_type(),
            [
                'name'      => 'description_typography',
                'label'     => esc_html__('Description Typography', 'aiero_plugin'),
                'selector'  => '{{WRAPPER}} .step-description'
            ]
        );

        $this->add_control(
            'description_color',
            [
                'label'     => esc_html__('Description Color', 'aiero_plugin'),
                'type'      => Controls_Manager::COLOR,
                'default'   => '',
                'selectors' => [
                    '{{WRAPPER}} .step-description' => 'color: {{VALUE}};'
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
                'label'     => esc_html__('Slider Arrows Background', 'aiero_plugin'),
                'type'      => Controls_Manager::COLOR,
                'selectors' => [
                    '{{WRAPPER}} .owl-nav' => 'background-color: {{VALUE}};'
                ],
                'condition' => [
                    'nav'      => 'yes'
                ]
            ]
        );

        $this->add_control(
            'nav_border_style',
            [
                'label' => esc_html__( 'Slider Arrows Border Style', 'aiero_plugin' ),
                'type' => Controls_Manager::SELECT,
                'default' => 'gradient',
                'options' => [
                    'gradient' => esc_html__( 'Gradient', 'aiero_plugin' ),
                    'solid' => esc_html__( 'Solid', 'aiero_plugin' ),
                ],
                'condition' => [
                    'nav'      => 'yes'
                ],
                'prefix_class' => 'aiero-navigation-border-style-',
            ]
        );

        $this->add_control(
            'nav_bd',
            [
                'label'     => esc_html__('Slider Arrows Border', 'aiero_plugin'),
                'type'      => Controls_Manager::COLOR,
                'selectors' => [
                    '{{WRAPPER}} .owl-nav' => 'border-color: {{VALUE}};'
                ],
                'condition' => [
                    'nav' => 'yes',
                    'nav_border_style' => 'solid'
                ]
            ]
        );

        $this->add_group_control(
            Group_Control_Background::get_type(),
            [
                'name' => 'nav_bd_gradient',
                'fields_options' => [
                    'background' => [
                        'label' => esc_html__( 'Slider Arrows Border Gradient', 'aiero_plugin' )
                    ]                    
                ],
                'types' => [ 'gradient' ],
                'selector' => '{{WRAPPER}} .owl-nav:after',
                'condition' => [
                    'nav' => 'yes',
                    'nav_border_style' => 'gradient'
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

        $style_type     = $settings['style_type'];
        $title          = $settings['title'];
        $title_tag      = $settings['title_tag'];
        $add_subtitle   = $settings['add_subtitle'];
        $subtitle       = $settings['subtitle'];

        $columns_number = $settings['columns_number'];
        $step_items     = $settings['step_items'];
        $dots           = $settings['dots'];
        $nav            = $settings['nav'];

        $widget_id      = $this->get_id();

        $slider_options = [
            'items'                 => !empty($columns_number) ? (int)$columns_number : 1,
            'nav'                   => ('yes' === $nav),
            'dots'                  => ('yes' === $dots),
            'autoplayHoverPause'    => ('yes' === $settings['autoplay'] ? 'yes' === $settings['pause_on_hover'] : false),
            'autoplay'              => ('yes' === $settings['autoplay']),
            'autoplaySpeed'         => absint($settings['autoplay_speed']),
            'autoplayTimeout'       => absint($settings['autoplay_timeout']),
            'loop'                  => ('yes' === $settings['infinite']),
            'dragEndSpeed'          => absint($settings['speed']),
            'navSpeed'              => absint($settings['speed']),
            'dotsSpeed'             => absint($settings['speed'])
        ];

        if( !empty($widget_id) ) {
            $slider_options['navContainer'] = '.owl-nav-' . esc_attr($widget_id);
        }

        $item_classes = 'step-item slider-item';

        // ------------------------------------ //
        // ---------- Widget Content ---------- //
        // ------------------------------------ //
        ?>

        <div class="aiero-step-carousel-widget<?php echo !empty($style_type) ? ' style_' . esc_attr($style_type) : ''; ?>">
            <?php
                if ( !empty($title) ) {
                    echo '<' . esc_html($title_tag) . ' class="aiero-heading' . ( $nav == 'yes' ? ' heading-with-pagination' : '' ) . '">';
                        echo '<span class="aiero-heading-inner">';
                            if ( $add_subtitle == 'yes' && !empty($subtitle) ) {
                                echo '<span class="aiero-subheading">';
                                    echo '<span class="aiero-subheading-inner"><span>' . esc_html($subtitle) . '</span></span>';
                                echo '</span>';
                            }
                            echo '<span class="aiero-heading-content">';
                                echo wp_kses($title, array(
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
                            echo '</span>';
                        echo '</span>';
                        if ( 'yes' === $nav ) {
                            echo '<div class="owl-nav owl-nav-' . esc_attr($widget_id) . '"></div>';
                        }
                    echo '</' . esc_html($title_tag) . '>';
                }
            ?>            
            <?php
                if( 'yes' === $nav && empty($title) ) {
                    echo '<div class="owl-nav owl-nav-' . esc_attr($widget_id) . '"></div>';
                }
            ?>
            <div class="steps-slider-container">
                <div class="steps-slider owl-carousel owl-theme" data-slider-options="<?php echo esc_attr(wp_json_encode($slider_options)); ?>">
                    <?php

                        foreach ($step_items as $item) {
                            $step_number        = $item['step_number'];
                            $step_title         = $item['step_title'];
                            $step_label         = $item['step_label'];
                            $step_description   = $item['step_description'];

                            echo '<div class="' . esc_attr($item_classes) . '">';
                                if( $style_type === 'type-2' && (!empty($step_number) || !empty($step_label)) ) {
                                    echo '<div class="step-number-wrapper">';
                                        if ( !empty($step_number)) {
                                            echo '<div class="step-number">' . esc_html($step_number) . '</div>';
                                        }
                                        if ( !empty($step_label)) {
                                            echo '<div class="step-label">' . esc_html($step_label) . '</div>';
                                        }                                        
                                    echo '</div>';
                                }
                                elseif ( $style_type !== 'type-2' && !empty($step_number)) {
                                    echo '<div class="step-number">' . esc_html($step_number) . '</div>';
                                }
                                if ( !empty($step_title) || !empty($step_description) ) {
                                    echo '<div class="step-content">';
                                        if ( !empty($step_title) ) {
                                            echo '<h6 class="step-title">' . wp_kses($step_title, array('br' => array())) . '</h6>';
                                        }
                                        if ( !empty($step_description) ) {
                                            echo '<div class="step-description">' . esc_html($step_description) . '</div>';
                                        }
                                    echo '</div>';
                                }                                 
                            echo '</div>';
                        }
                    ?>
                </div>                    
            </div>            
        </div>

        <?php
    }

    protected function content_template() {}

    public function render_plain_content() {}
}