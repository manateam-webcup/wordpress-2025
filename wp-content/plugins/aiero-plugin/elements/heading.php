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

class Aiero_Heading_Widget extends Widget_Base {

    public function get_name() {
        return 'aiero_heading';
    }

    public function get_title() {
        return esc_html__('Heading', 'aiero_plugin');
    }

    public function get_icon() {
        return 'eicon-heading';
    }

    public function get_categories() {
        return ['aiero_widgets'];
    }
    
    public function get_script_depends() {
        return ['elementor_widgets'];
    }
    
    public function is_reload_preview_required() {
        return true;
    }

    protected function register_controls() {

        // ----------------------------- //
        // ---------- Content ---------- //
        // ----------------------------- //
        $this->start_controls_section(
            'section_heading',
            [
                'label' => esc_html__('Heading', 'aiero_plugin')
            ]
        );

        $this->add_control(
            'heading',
            [
                'label'         => esc_html__('Heading', 'aiero_plugin'),
                'type'          => Controls_Manager::WYSIWYG,
                'rows'          => '10',
                'default'       => esc_html__( 'This is heading element', 'aiero_plugin' ),
                'placeholder'   => esc_html__( 'Enter Your Heading', 'aiero_plugin' )
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
                'default'       => esc_html__( 'Subheading', 'aiero_plugin' ),
                'placeholder'   => esc_html__( 'Enter Your Subheading', 'aiero_plugin'),
                'label_block'   => true,
                'condition'     => [
                    'add_subtitle'  => 'yes'
                ]
            ]
        );

        $this->add_control(
            'remove_subtitle_decoration',
            [
                'label'         => esc_html__('Remove Subheading Decoration', 'aiero_plugin'),
                'type'          => Controls_Manager::SWITCHER,
                'default'       => '',
                'return_value'  => 'off',
                'label_off'     => esc_html__('No', 'aiero_plugin'),
                'label_on'      => esc_html__('Yes', 'aiero_plugin'),
                'prefix_class' => 'aiero-heading-subheading-decoration-',
                'condition'     => [
                    'add_subtitle'  => 'yes',
                    'subtitle!'      => ''
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

        $this->add_responsive_control(
            'title_align',
            [
                'label'     => esc_html__('Alignment', 'aiero_plugin'),
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
                'default'   => 'left',
                'selectors' => [
                    '{{WRAPPER}} .aiero-heading' => 'text-align: {{VALUE}};',
                ],
                'separator' => 'before'
            ]
        );

        $this->add_control(
            'title_hover_decoration',
            [
                'label'     => esc_html__('Hover Decoration', 'aiero_plugin'),
                'type'      => Controls_Manager::SELECT,
                'options'   => [
                    ''          => esc_html__( 'Default', 'aiero_plugin' ),
                    'underline' => esc_html__( 'Underline', 'aiero_plugin' )
                ],
                'default'   => '',
                'prefix_class' => 'aiero-heading-decoration-'
            ]
        );

        $this->end_controls_section();

        // -------------------------------------- //
        // ---------- Heading Settings ---------- //
        // -------------------------------------- //
        $this->start_controls_section(
            'section_heading_settings',
            [
                'label' => esc_html__('Heading Settings', 'aiero_plugin'),
                'tab'   => Controls_Manager::TAB_STYLE
            ]
        );

        $this->add_responsive_control(
            'subheading_spacing',
            [
                'label'     => esc_html__('Space After Subheading', 'aiero_plugin'),
                'type'      => Controls_Manager::SLIDER,
                'size_units' => [ 'px', 'em' ],                
                'selectors' => [
                    '{{WRAPPER}} .aiero-subheading:not(:last-child)' =>
                        'margin-bottom: {{SIZE}}{{UNIT}};'
                ],
                'condition' => [
                    'add_subtitle' => 'yes'
                ]
            ]
        );

        $this->add_group_control(
            Group_Control_Typography::get_type(),
            [
                'name'      => 'title_typography',
                'label'     => esc_html__('Heading Typography', 'aiero_plugin'),
                'selector'  => '{{WRAPPER}} .aiero-heading'
            ]
        );

        $this->add_control(
            'title_color',
            [
                'label'     => esc_html__('Heading Color', 'aiero_plugin'),
                'type'      => Controls_Manager::COLOR,
                'selectors' => [
                    '{{WRAPPER}} .aiero-heading .aiero-heading-content' => 'color: {{VALUE}};',
                    '{{WRAPPER}} .aiero-subheading' => 'color: {{VALUE}};'
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

        $this->add_control(
            'add_gradient_color',
            [
                'label'         => esc_html__('Add Gradient Color', 'aiero_plugin'),
                'type'          => Controls_Manager::SWITCHER,
                'default'       => 'yes',
                'return_value'  => 'yes',
                'label_off'     => esc_html__('No', 'aiero_plugin'),
                'label_on'      => esc_html__('Yes', 'aiero_plugin')
            ]
        );

        $this->add_group_control(
            Group_Control_Background::get_type(),
            [
                'name'      => 'accent_bg_color',
                'label'     => esc_html__( 'Text Gradient Color', 'aiero_plugin' ),
                'fields_options' => [
                    'background' => [
                        'label'     => esc_html__( 'Text Gradient Color', 'aiero_plugin' ),
                    ]
                ],
                'types'     => [ 'gradient' ],
                'selector'  => '{{WRAPPER}} .aiero-heading .aiero-heading-content del',
                'condition' => [
                    'add_gradient_color' => 'yes'
                ]
            ]
        );

        $this->add_control(
            'gradient_style',
            [
                'label'     => esc_html__('Gradient Block Style', 'aiero_plugin'),
                'type'      => Controls_Manager::SELECT,
                'default'   => '',
                'options'   => [
                    ''             => esc_html__('Default', 'aiero_plugin'),
                    'inline'       => esc_html__('Inline', 'aiero_plugin'),
                    'inline-block' => esc_html__('Inline Block', 'aiero_plugin'),
                    'block'        => esc_html__('Block', 'aiero_plugin'),
                ],
                'selectors' => [
                	'{{WRAPPER}} .aiero-heading-content.has_gradient_color_text del' => 'display: {{VALUE}};'
                ],
                'condition' => [
                    'add_gradient_color' => 'yes'
                ]
            ]
        );

        $this->add_responsive_control(
            'gradient_padding',
            [
                'label'         => esc_html__('Gradient Text Padding', 'aiero_plugin'),
                'type'          => Controls_Manager::DIMENSIONS,
                'size_units'    => ['px', 'em', '%'],
                'selectors'     => [
                    '{{WRAPPER}} .aiero-heading-content.has_gradient_color_text del' => 'padding: {{TOP}}{{UNIT}} {{RIGHT}}{{UNIT}} {{BOTTOM}}{{UNIT}} {{LEFT}}{{UNIT}};',
                ],
                'condition' => [
                    'add_gradient_color' => 'yes'
                ]
            ]
        );

        $this->add_control(
            'text_color_stroke',
            [
                'label'     => esc_html__('Text Stroke Color', 'aiero_plugin'),
                'type'      => Controls_Manager::COLOR,
                'selectors' => [
                    '{{WRAPPER}} .aiero-heading-content' => '-webkit-text-stroke: 1px {{VALUE}}; text-stroke: 1px {{VALUE}};',
                    '{{WRAPPER}} .aiero-heading-content.has_gradient_color_text del' => 'color: inherit;',
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
                'selectors' => [
                    '{{WRAPPER}} .aiero-heading-content' => '-webkit-text-stroke-width: {{SIZE}}{{UNIT}};'
                ]
            ]
        );

        $this->add_group_control(
            Group_Control_Text_Shadow::get_type(),
            [
                'name'      => 'title_shadow',
                'label'     => esc_html__('Heading Text Shadow', 'aiero_plugin'),
                'selector'  => '{{WRAPPER}} .aiero-heading .aiero-heading-content'
            ]
        );

        $this->add_control(
            'heading_filter_blur',
            [
                'label' => esc_html__( 'Heading Backdrop Blur Filter, px', 'aiero_plugin' ),
                'type' => Controls_Manager::SLIDER,
                'range' => [
                    'px' => [
                        'min' => 0,
                        'max' => 25,
                        'step' => 0.1,
                    ],
                ],
                'selectors' => [
                    '{{WRAPPER}} .elementor-widget-container' => 'backdrop-filter: blur( {{SIZE}}px ); -webkit-backdrop-filter: blur( {{SIZE}}px );',
                ],
            ]            
        );

        $this->end_controls_section();

    }

    protected function render() {
        $settings           = $this->get_settings_for_display();
        $title_tag          = $settings['title_tag'];
        $heading            = $settings['heading'];
        $add_subtitle       = $settings['add_subtitle'];
        $subtitle           = $settings['subtitle'];
        $add_gradient_color = $settings['add_gradient_color'];


        $content_class = '';
        if ( $add_gradient_color === 'yes' ) {
        	$content_class .= ' has_gradient_color_text';
        }


        // ------------------------------------ //
        // ---------- Widget Content ---------- //
        // ------------------------------------ //
        if ( !empty($heading) || ($add_subtitle == 'yes' && !empty($subtitle)) ) {
            echo '<div class="aiero-heading-widget">';
                echo '<' . esc_html($title_tag) . ' class="aiero-heading">';
                    if ( $add_subtitle == 'yes' && !empty($subtitle) ) {
                        echo '<span class="aiero-subheading">';
                            echo '<span class="aiero-subheading-inner"><span>' . esc_html($subtitle) . '</span></span>';
                        echo '</span>';
                    }
                    if ( !empty($heading) ) {
                    	echo '<span class="aiero-heading-content' . esc_attr($content_class) . '">';
	                        echo wp_kses($heading, array(
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
	                                'title'     => true,
	                                'style'     => true
	                            ),
	                            'em'        => array(),
	                            'strong'    => array(),
	                            'del'       => array()
	                        ));
	                    echo '</span>';
                    }                    
                echo '</' . esc_html($title_tag) . '>';
            echo '</div>';
        }
    }

    protected function content_template() {}

    public function render_plain_content() {}
}