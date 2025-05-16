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

class Aiero_Button_Widget extends Widget_Base {

    public function get_name() {
        return 'aiero_button';
    }

    public function get_title() {
        return esc_html__('Button', 'aiero_plugin');
    }

    public function get_icon() {
        return 'eicon-button';
    }

    public function get_categories() {
        return ['aiero_widgets'];
    }

    public function get_script_depends() {
        return ['gsap', 'elementor_widgets'];
    }

    protected function register_controls() {

        // ----------------------------- //
        // ---------- Content ---------- //
        // ----------------------------- //
        $this->start_controls_section(
            'section_content',
            [
                'label' => esc_html__('Button', 'aiero_plugin')
            ]
        );

        $this->add_control(
            'button_type',
            [
                'label'     => esc_html__('Button Type', 'aiero_plugin'),
                'type'      => Controls_Manager::SELECT,
                'default'   => '',
                'options'   => [
                    ''      => esc_html__('Default', 'aiero_plugin'),
                    'simple'    => esc_html__('Simple', 'aiero_plugin'),
                    'alt'       => esc_html__('Alternative', 'aiero_plugin'),
                    'parallax'  => esc_html__('Parallax', 'aiero_plugin'),
                ]
            ]
        );

        $this->add_control(
            'button_text',
            [
                'label'     => esc_html__('Button Text', 'aiero_plugin'),
                'type'      => Controls_Manager::TEXT,
                'default'   => esc_html__('Button', 'aiero_plugin')
            ]
        );

        $this->add_control(
            'button_link',
            [
                'label'         => esc_html__('Button Link', 'aiero_plugin'),
                'type'          => Controls_Manager::URL,
                'label_block'   => true,
                'default'       => [
                    'url'           => '',
                    'is_external'   => 'true',
                ],
                'placeholder'   => esc_html__( 'http://your-link.com', 'aiero_plugin' )
            ]
        );

        $this->add_responsive_control(
            'button_align',
            [
                'label'     => esc_html__('Button Alignment', 'aiero_plugin'),
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
                    '{{WRAPPER}} .button-widget' => 'text-align: {{VALUE}};',
                ]
            ]
        );

        $this->add_control(
            'add_decoration',
            [
                'label'         => esc_html__('Add Decoration', 'aiero_plugin'),
                'type'          => Controls_Manager::SWITCHER,
                'default'       => '',
                'return_value'  => 'on',
                'label_off'     => esc_html__('No', 'aiero_plugin'),
                'label_on'      => esc_html__('Yes', 'aiero_plugin')
            ]
        );

        $this->add_control(
            'button_position',
            [
                'label'             => esc_html__( 'Button Position', 'aiero_plugin' ),
                'type'              => Controls_Manager::CHOOSE,
                'options'           => [
                    'left'              => [
                        'title'             => esc_html__( 'Left', 'aiero_plugin' ),
                        'icon'              => 'eicon-h-align-left',
                    ],
                    'top'               => [
                        'title'             => esc_html__( 'Top', 'aiero_plugin' ),
                        'icon'              => 'eicon-v-align-top',
                    ],
                    'right'             => [
                        'title'             => esc_html__( 'Right', 'aiero_plugin' ),
                        'icon'              => 'eicon-h-align-right',
                    ],
                    'bottom'               => [
                        'title'             => esc_html__( 'Bottom', 'aiero_plugin' ),
                        'icon'              => 'eicon-v-align-bottom',
                    ],
                ],
                'prefix_class'      => 'decoration-position-',
                'toggle'            => false,
                'default'           => 'bottom',
                'condition' => [
                    'add_decoration' => 'on'
                ]
            ]
        );

        $this->end_controls_section();

        // ------------------------------------- //
        // ---------- Button Settings ---------- //
        // ------------------------------------- //
        $this->start_controls_section(
            'section_settings',
            [
                'label' => esc_html__('Button Settings', 'aiero_plugin'),
                'tab'   => Controls_Manager::TAB_STYLE
            ]
        );

        $this->add_group_control(
            Group_Control_Typography::get_type(),
            [
                'name'      => 'button_typography',
                'label'     => esc_html__('Button Typography', 'aiero_plugin'),
                'selector'  => '{{WRAPPER}} .aiero-button, {{WRAPPER}} .aiero_adv_button_wrapper'
            ]
        );

        $this->add_control(
            'border_width',
            [
                'label' => esc_html__( 'Border Width', 'aiero_plugin' ),
                'type' => Controls_Manager::SLIDER,
                'size_units' => [ 'px', 'em', 'rem'],
                'selectors' => [
                    '{{WRAPPER}} .aiero-button' => 'border-width: {{SIZE}}{{UNIT}};',
                    '{{WRAPPER}} .aiero-button' => '--button-border-width: {{SIZE}}{{UNIT}};',
                    '{{WRAPPER}} .aiero_adv_button_wrapper' => '--adv-button-border-width: {{SIZE}}{{UNIT}};',
                ],
            ]
        );

        $this->add_responsive_control(
            'button_radius',
            [
                'label'         => esc_html__('Border Radius', 'aiero_plugin'),
                'type'          => Controls_Manager::DIMENSIONS,
                'size_units'    => [ 'px', '%', 'em', 'rem', 'custom' ],
                'selectors'     => [
                    '{{WRAPPER}} .aiero-button' => 'border-radius: {{TOP}}{{UNIT}} {{RIGHT}}{{UNIT}} {{BOTTOM}}{{UNIT}} {{LEFT}}{{UNIT}};',
                    '{{WRAPPER}} .aiero_adv_button_wrapper .aiero_adv_button' => 'border-radius: {{TOP}}{{UNIT}} {{RIGHT}}{{UNIT}} {{BOTTOM}}{{UNIT}} {{LEFT}}{{UNIT}};',
                    '{{WRAPPER}} .aiero_adv_button_wrapper .aiero_adv_button_circle' => 'border-radius: {{TOP}}{{UNIT}} {{RIGHT}}{{UNIT}} {{BOTTOM}}{{UNIT}} {{LEFT}}{{UNIT}};'
                ]
            ]
        );

        $this->add_control(
            'button_border_style',
            [
                'label' => esc_html__( 'Button Border Style', 'aiero_plugin' ),
                'type' => Controls_Manager::SELECT,
                'default' => 'gradient',
                'options' => [
                    'gradient' => esc_html__( 'Gradient', 'aiero_plugin' ),
                    'solid' => esc_html__( 'Solid', 'aiero_plugin' ),
                ],
                'prefix_class' => 'aiero-button-border-style-',
                'condition' => [
                	'button_type!' => ['alt', 'parallax']
                ]
            ]
        );

        $this->add_control(
            'button_background_style',
            [
                'label' => esc_html__( 'Button Background Style', 'aiero_plugin' ),
                'type' => Controls_Manager::SELECT,
                'default' => 'gradient',
                'options' => [
                    'gradient' => esc_html__( 'Gradient', 'aiero_plugin' ),
                    'solid' => esc_html__( 'Solid', 'aiero_plugin' ),
                ],
                'prefix_class' => 'aiero-button-bakground-style-',
                'condition' => [
                	'button_type!' => ['alt', 'parallax']
                ]
            ]
        );

        $this->start_controls_tabs('button_settings_tabs');

            // ------------------------ //
            // ------ Normal Tab ------ //
            // ------------------------ //
            $this->start_controls_tab(
                'tab_button_normal',
                [
                    'label' => esc_html__('Normal', 'aiero_plugin')
                ]
            );

                $this->add_control(
                    'button_color',
                    [
                        'label'     => esc_html__('Button Color', 'aiero_plugin'),
                        'type'      => Controls_Manager::COLOR,
                        'selectors' => [
                            '{{WRAPPER}} .aiero-button' => 'color: {{VALUE}};',
                            '{{WRAPPER}} .aiero_adv_button_text' => 'color: {{VALUE}};'
                        ]
                    ]
                );

                $this->add_control(
                    'button_border_color',
                    [
                        'label'     => esc_html__('Button Border Color', 'aiero_plugin'),
                        'type'      => Controls_Manager::COLOR,
                        'selectors' => [
                            '{{WRAPPER}} .aiero-button' => 'border-color: {{VALUE}};',
                            '{{WRAPPER}} .aiero_adv_button, {{WRAPPER}} .aiero_adv_button_circle' => 'border-color: {{VALUE}};',
                        ],
                        'conditions' => [
							'relation' => 'or',
							'terms' => [
								[
									'name' => 'button_border_style',
									'operator' => '===',
									'value' => 'solid',
								],
								[
									'name' => 'button_type',
									'operator' => 'in',
									'value' => ['alt', 'parallax'],
								],
							],
						]
                    ]
                );

                $this->add_control(
                    'button_border_color_add',
                    [
                        'label'     => esc_html__('Button Border Color Additional', 'aiero_plugin'),
                        'type'      => Controls_Manager::COLOR,
                        'selectors' => [
                            '{{WRAPPER}} .aiero_adv_button_circle' => 'border-color: {{VALUE}};',
                        ],
                        'condition' => [
                        	'button_type' => 'parallax'
						]
                    ]
                );

                $this->add_group_control(
                    Group_Control_Background::get_type(),
                    [
                        'name' => 'button_border_color_gradient',
                        'fields_options' => [
                            'background' => [
                                'label' => esc_html__( 'Border Color Gradient', 'aiero_plugin' )
                            ]                    
                        ],
                        'types' => [ 'gradient' ],
                        'selector' => '{{WRAPPER}} .aiero-button:after, {{WRAPPER}}.aiero-button-type-alt .aiero-button',
                        'condition' => [
                            'button_border_style' => 'gradient',
                            'button_type!' => ['alt', 'parallax']
                        ]
                    ]
                );

                $this->add_control(
                    'button_background_color',
                    [
                        'label'     => esc_html__('Button Background Color', 'aiero_plugin'),
                        'type'      => Controls_Manager::COLOR,
                        'selectors' => [
                            '{{WRAPPER}} .aiero-button' => 'background-color: {{VALUE}};',
                            '{{WRAPPER}}.decoration-position-bottom .aiero-button-decoration:before, {{WRAPPER}}.decoration-position-bottom .aiero-button-decoration:after' => 'box-shadow: 0 20px 0 0 {{VALUE}};',
                            '{{WRAPPER}}.decoration-position-top .aiero-button-decoration:before, {{WRAPPER}}.decoration-position-top .aiero-button-decoration:after' => 'box-shadow: 0 -20px 0 0 {{VALUE}};',
                            '{{WRAPPER}}.decoration-position-left .aiero-button-decoration:before, {{WRAPPER}}.decoration-position-left .aiero-button-decoration:after' => 'box-shadow: 0 20px 0 0 {{VALUE}};',
                            '{{WRAPPER}}.decoration-position-right .aiero-button-decoration:before, {{WRAPPER}}.decoration-position-right .aiero-button-decoration:after' => 'box-shadow: 0 20px 0 0 {{VALUE}};'
                        ],
                        'condition' => [
                            'button_background_style' => 'solid',
                            'button_type!' => ['alt', 'parallax']
                        ]
                    ]
                );

                $this->add_group_control(
                    Group_Control_Background::get_type(),
                    [
                        'name' => 'button_bg_color_gradient',
                        'fields_options' => [
                            'background' => [
                                'label' => esc_html__( 'Background Color Gradient', 'aiero_plugin' )
                            ]                    
                        ],
                        'types' => [ 'gradient' ],
                        'selector' => '{{WRAPPER}} .aiero-button .button-inner:before',
                        'condition' => [
                            'button_background_style' => 'gradient',
                            'button_type!' => ['alt', 'parallax']
                        ]
                    ]
                );

                $this->add_group_control(
                    Group_Control_Box_Shadow::get_type(),
                    [
                        'name' => 'button_box_shadow',
                        'selector' => '{{WRAPPER}} .aiero-button',
                        'condition' => [
                            'remove_box_shadow!' => 'yes'
                        ]
                    ]
                );

            $this->end_controls_tab();

            // ----------------------- //
            // ------ Hover Tab ------ //
            // ----------------------- //
            $this->start_controls_tab(
                'tab_button_hover',
                [
                    'label' => esc_html__('Hover', 'aiero_plugin')
                ]
            );

                $this->add_control(
                    'button_color_hover',
                    [
                        'label'     => esc_html__('Button Color', 'aiero_plugin'),
                        'type'      => Controls_Manager::COLOR,
                        'selectors' => [
                            '{{WRAPPER}} .aiero-button:hover' => 'color: {{VALUE}};',
                            '{{WRAPPER}} .aiero_adv_button_wrapper:hover .aiero_adv_button_text' => 'color: {{VALUE}};',
                            '{{WRAPPER}}[class*=decoration-position] .aiero-button-decoration:hover .aiero-button' => 'color: {{VALUE}};'
                        ]
                    ]
                );

                $this->add_control(
                    'button_border_color_hover',
                    [
                        'label'     => esc_html__('Button Border Color', 'aiero_plugin'),
                        'type'      => Controls_Manager::COLOR,
                        'selectors' => [
                            '{{WRAPPER}} .aiero-button:hover' => 'border-color: {{VALUE}};'
                        ],
                        'conditions' => [
							'relation' => 'or',
							'terms' => [
								[
									'name' => 'button_border_style',
									'operator' => '===',
									'value' => 'solid',
								],
								[
									'name' => 'button_type',
									'operator' => 'in',
									'value' => ['alt', 'parallax'],
								],
							],
						]
                    ]
                );

                $this->add_group_control(
                    Group_Control_Background::get_type(),
                    [
                        'name' => 'button_border_color_gradient_hover',
                        'fields_options' => [
                            'background' => [
                                'label' => esc_html__( 'Border Color Gradient', 'aiero_plugin' )
                            ]                    
                        ],
                        'types' => [ 'gradient' ],
                        'selector' => '{{WRAPPER}} .aiero-button:hover:after, {{WRAPPER}}.aiero-button-type-alt .aiero-button:hover',
                        'condition' => [
                            'button_border_style' => 'gradient',
                            'button_type!' => ['alt', 'parallax']
                        ]
                    ]
                );

                $this->add_control(
                    'button_background_color_hover',
                    [
                        'label'     => esc_html__('Button Background Color', 'aiero_plugin'),
                        'type'      => Controls_Manager::COLOR,
                        'selectors' => [
                            '{{WRAPPER}} .aiero-button:hover' => 'background-color: {{VALUE}};',
                            '{{WRAPPER}}[class*=decoration-position] .aiero-button-decoration:hover .aiero-button' => 'background-color: {{VALUE}};',
                            '{{WRAPPER}}.decoration-position-bottom .aiero-button-decoration:hover:before, {{WRAPPER}}.decoration-position-bottom .aiero-button-decoration:hover:after' => 'box-shadow: 0 20px 0 0 {{VALUE}};',
                            '{{WRAPPER}}.decoration-position-top .aiero-button-decoration:hover:before, {{WRAPPER}}.decoration-position-top .aiero-button-decoration:hover:after' => 'box-shadow: 0 -20px 0 0 {{VALUE}};',
                            '{{WRAPPER}}.decoration-position-left .aiero-button-decoration:hover:before, {{WRAPPER}}.decoration-position-left .aiero-button-decoration:hover:after' => 'box-shadow: 0 20px 0 0 {{VALUE}};',
                            '{{WRAPPER}}.decoration-position-right .aiero-button-decoration:hover:before, {{WRAPPER}}.decoration-position-right .aiero-button-decoration:hover:after' => 'box-shadow: 0 20px 0 0 {{VALUE}};'
                        ],
                        'condition' => [
                            'button_background_style' => 'solid',
                            'button_type!' => ['alt', 'parallax']
                        ]
                    ]
                );

                $this->add_group_control(
                    Group_Control_Background::get_type(),
                    [
                        'name' => 'button_bg_color_gradient_hover',
                        'fields_options' => [
                            'background' => [
                                'label' => esc_html__( 'Background Color Gradient', 'aiero_plugin' )
                            ]                    
                        ],
                        'types' => [ 'gradient' ],
                        'selector' => '{{WRAPPER}} .aiero-button .button-inner:after',
                        'condition' => [
                            'button_background_style' => 'gradient',
                            'button_type!' => ['alt', 'parallax']
                        ]
                    ]
                );

                $this->add_group_control(
                    Group_Control_Box_Shadow::get_type(),
                    [
                        'name' => 'button_box_shadow_hover',
                        'selector' => '{{WRAPPER}} .aiero-button',
                        'condition' => [
                            'remove_box_shadow!' => 'yes'
                        ]
                    ]
                );

            $this->end_controls_tab();

        $this->end_controls_tabs();

        $this->add_control(
            'remove_box_shadow',
            [
                'label'         => esc_html__('Remove Box Shadow', 'aiero_plugin'),
                'type'          => Controls_Manager::SWITCHER,
                'default'       => 'no',
                'return_value'  => 'yes',
                'label_off'     => esc_html__('No', 'aiero_plugin'),
                'label_on'      => esc_html__('Yes', 'aiero_plugin'),
                'separator'     => 'before',
                'selectors_dictionary' => [
                    'yes' => 'box-shadow: none;',
                    'no' => ''
                ],
                'selectors' => [
                    '{{WRAPPER}} .aiero-button' => '{{VALUE}}',
                    '{{WRAPPER}} .aiero-button:hover' => '{{VALUE}}',
                ],
            ]
        );

        $this->add_control(
            'hr',
            [
                'type' => Controls_Manager::DIVIDER,
            ]
        );

        $this->add_responsive_control(
            'button_padding',
            [
                'label'         => esc_html__('Button Padding', 'aiero_plugin'),
                'type'          => Controls_Manager::DIMENSIONS,
                'size_units'    => ['px', '%'],
                'selectors'     => [
                    '{{WRAPPER}} .aiero-button' => 'padding: {{TOP}}{{UNIT}} {{RIGHT}}{{UNIT}} {{BOTTOM}}{{UNIT}} {{LEFT}}{{UNIT}};',
                    '{{WRAPPER}} .aiero_adv_button_wrapper .aiero_adv_button' => 'padding: {{TOP}}{{UNIT}} {{RIGHT}}{{UNIT}} {{BOTTOM}}{{UNIT}} {{LEFT}}{{UNIT}};'
                ],
                'condition' => [
                	'button_type!' => 'alt'
                ]
            ]
        );

        $this->add_control(
            'button_icon_indent',
            [
                'label' => esc_html__( 'Button Icon Indent', 'aiero_plugin' ),
                'type' => Controls_Manager::SLIDER,
                'size_units' => [ 'px', 'em', 'rem'],
                'selectors' => [
                    '{{WRAPPER}} .aiero-button span[class^="icon"]' => 'text-indent: {{SIZE}}{{UNIT}};',               
                ],
                'condition' => [
                	'button_type' => ''
                ]
            ]
        );

        $this->add_control(
            'button_width',
            [
                'label' => esc_html__( 'Button Width', 'aiero_plugin' ),
                'type' => Controls_Manager::SLIDER,
                'size_units' => [ 'px', '%', 'em', 'rem'],
                'range'     => [
                    'px'        => [
                        'min'       => 0,
                        'max'       => 500
                    ]
                ],
                'selectors' => [
                    '{{WRAPPER}} .aiero-button' => 'min-width: {{SIZE}}{{UNIT}};',                  
                ],
                'condition' => [
                    'button_type!' => 'parallax'
                ]
            ]
        );

        $this->end_controls_section();
    }

    protected function render() {
        $settings       = $this->get_settings();

        $button_type    = $settings['button_type'];
        $button_text    = $settings['button_text'];
        $button_link    = $settings['button_link'];

        $add_decoration = $settings['add_decoration'];

        if ($button_link['url'] === '') {
            $button_link['url'] = '#';
        }

        $this->add_link_attributes( 'link', $button_link );

        // ------------------------------------ //
        // ---------- Widget Content ---------- //
        // ------------------------------------ //
        ?>

        <div class="button-widget<?php echo (!empty($button_type) ? esc_attr(' aiero-button-type-' . $button_type) : '');?>">
            <div class="button-container">
                <?php
                    if ($add_decoration == 'on') {
                        echo '<span class="aiero-button-decoration">';
                    } ?>
                    <?php if ($button_type === '' || $button_type === 'simple') { ?>
                    	<a class="aiero-button" <?php $this->print_render_attribute_string('link'); ?>><?php echo esc_html($button_text); ?>
                    		<span class="icon-button-arrow"></span><span class="button-inner"></span>
                    	</a>
                	<?php } elseif ($button_type === 'alt') { ?>
                		<a class="aiero-button" <?php $this->print_render_attribute_string('link'); ?>><?php echo esc_html($button_text); ?>
                    		<span class="icon-button-arrow left"></span><span class="icon-button-arrow right"></span>
                    	</a>
                	<?php } elseif ($button_type === 'parallax') { ?>
                		<div class="aiero_adv_button_wrapper">
                			<a class="aiero_adv_button" <?php $this->print_render_attribute_string('link'); ?>><?php echo esc_html($button_text); ?></a>
                			<span class="aiero_adv_button_text"><?php echo esc_html($button_text); ?></span>
                			<span class="aiero_adv_button_circle"></span>
                		</div>
                	<?php }?>
                <?php
                    if ($add_decoration == 'on') {
                        echo '</span>';
                    }
                ?>
            </div>
        </div>
        <?php
    }

    protected function content_template() {}

    public function render_plain_content() {}
}
