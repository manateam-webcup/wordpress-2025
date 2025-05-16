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

class Aiero_Icon_Box_Widget extends Widget_Base {

    public function get_name() {
        return 'aiero_icon_box';
    }

    public function get_title() {
        return esc_html__('Icon Box', 'aiero_plugin');
    }

    public function get_icon() {
        return 'eicon-icon-box';
    }

    public function get_categories() {
        return ['aiero_widgets'];
    }

    protected function register_controls() {

        // ----------------------------- //
        // ---------- Content ---------- //
        // ----------------------------- //
        $this->start_controls_section(
            'section_content',
            [
                'label' => esc_html__('Icon Box', 'aiero_plugin')
            ]
        );

        $this->add_control(
            'icon_type',
            [
                'label'     => esc_html__('Type of Icon', 'aiero_plugin'),
                'type'      => Controls_Manager::SELECT,
                'default'   => 'default',
                'options'   => [
                    'default'   => esc_html__('Default Icon', 'aiero_plugin'),
                    'svg'       => esc_html__('SVG Icon', 'aiero_plugin')
                ]
            ]
        );

        $this->add_control(
            'default_icon',
            [
                'label'                     => esc_html__('Icon', 'aiero_plugin'),
                'type'                      => Controls_Manager::ICONS,
                'label_block'               => false,
                'default'                   => [
                    'value'     => 'fas fa-star',
                    'library'   => 'fa-solid'
                ],
                'skin'                      => 'inline',
                'exclude_inline_options'    => ['svg'],
                'condition'                 => [
                    'icon_type' => 'default'
                ]
            ]
        );

        $this->add_control(
            'svg_icon',
            [
                'label'         => esc_html__('SVG Icon', 'aiero_plugin'),
                'description'   => esc_html__('Enter svg code', 'aiero_plugin'),
                'type'          => Controls_Manager::TEXTAREA,
                'default'       => '',
                'condition'     => [
                    'icon_type'     => 'svg'
                ]
            ]
        );

        $this->add_responsive_control(
            'icon_position',
            [
                'label'             => esc_html__( 'Icon Position', 'aiero_plugin' ),
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
                'prefix_class'      => 'icon-position%s-',
                'toggle'            => true,
                'default'           => 'top'
            ]
        );

        $this->add_responsive_control(
            'icon_vertical_position',
            [
                'label'             => esc_html__('Icon Vertical Alignment', 'aiero_plugin'),
                'type'              => Controls_Manager::CHOOSE,
                'options'           => [
                    'top'               => [
                        'title'             => esc_html__( 'Top', 'aiero_plugin' ),
                        'icon'              => 'eicon-v-align-top',
                    ],
                    'middle'            => [
                        'title'             => esc_html__( 'Middle', 'aiero_plugin' ),
                        'icon'              => 'eicon-v-align-middle',
                    ],
                    'bottom'            => [
                        'title'             => esc_html__( 'Bottom', 'aiero_plugin' ),
                        'icon'              => 'eicon-v-align-bottom',
                    ]
                ],
                'prefix_class'      => 'v-alignment%s-',
                'toggle'            => true,
                'default'           => 'top',
                'condition'         => [
                    'icon_position'   => ['left', 'right']
                ]
            ]
        );

        $this->add_responsive_control(
            'icon_box_align',
            [
                'label'             => esc_html__('Icon Box Alignment', 'aiero_plugin'),
                'type'              => Controls_Manager::CHOOSE,
                'options'           => [
                    'left'              => [
                        'title'             => esc_html__('Left', 'aiero_plugin'),
                        'icon'              => 'eicon-text-align-left',
                    ],
                    'center'            => [
                        'title'             => esc_html__('Center', 'aiero_plugin'),
                        'icon'              => 'eicon-text-align-center',
                    ],
                    'right'             => [
                        'title'             => esc_html__('Right', 'aiero_plugin'),
                        'icon'              => 'eicon-text-align-right',
                    ],
                    'space-between'     => [
                        'title'             => esc_html__('Space Between', 'aiero_plugin'),
                        'icon'              => 'eicon-justify-space-between-h',
                    ],
                ],
                'prefix_class'      => 'alignment%s-',
                'toggle'            => true,
                'default'           => 'center'
            ]
        );

        $this->add_control(
            'background_type',
            [
                'label'     => esc_html__('Type of Background', 'aiero_plugin'),
                'type'      => Controls_Manager::SELECT,
                'default'   => 'none',
                'options'   => [
                    'none'              => esc_html__('None', 'aiero_plugin'),
                    'svg'               => esc_html__('SVG', 'aiero_plugin'),
                    'image'             => esc_html__('Image', 'aiero_plugin'),
                    'color'             => esc_html__('Color', 'aiero_plugin')
                ]
            ]
        );

        $this->add_control(
            'svg_background',
            [
                'label'         => esc_html__('SVG Background', 'aiero_plugin'),
                'description'   => esc_html__('Enter svg code', 'aiero_plugin'),
                'type'          => Controls_Manager::TEXTAREA,
                'default'       => '',
                'condition'     => [
                    'background_type' => 'svg'
                ]
            ]
        );

        $this->start_controls_tabs('background_settings_tabs');

            // ------------------------ //
            // ------ Normal Tab ------ //
            // ------------------------ //
            $this->start_controls_tab(
                'background_normal',
                [
                    'label'     => esc_html__('Normal', 'aiero_plugin'),
                    'condition' => [
                        'background_type' => 'image'
                    ]
                ]
            );

                $this->add_control(
                    'bg_image',
                    [
                        'label'     => esc_html__('Choose Background Image', 'aiero_plugin'),
                        'type'      => Controls_Manager::MEDIA,
                        'default'   => [],
                        'condition' => [
                            'background_type' => 'image'
                        ]
                    ]
                );

            $this->end_controls_tab();

            // ----------------------- //
            // ------ Hover Tab ------ //
            // ----------------------- //
            $this->start_controls_tab(
                'background_hover',
                [
                    'label'     => esc_html__('Hover', 'aiero_plugin'),
                    'condition' => [
                        'background_type' => 'image'
                    ]
                ]
            );

                $this->add_control(
                    'bg_image_hover',
                    [
                        'label'     => esc_html__('Choose Background Image', 'aiero_plugin'),
                        'type'      => Controls_Manager::MEDIA,
                        'default'   => [],
                        'condition' => [
                            'background_type' => 'image'
                        ]
                    ]
                );

            $this->end_controls_tab();

        $this->end_controls_tabs();

        $this->add_control(
            'title',
            [
                'label'         => esc_html__('Icon Box Title', 'aiero_plugin'),
                'type'          => Controls_Manager::TEXTAREA,
                'default'       => esc_html__('Title', 'aiero_plugin'),
                'placeholder'   => esc_html__('Enter Icon Box Title', 'aiero_plugin'),
                'separator'     => 'before'
            ]
        );

        $this->add_control(
            'info',
            [
                'label' => esc_html__('Icon Box Information', 'aiero_plugin'),
                'type' => Controls_Manager::WYSIWYG,
                'rows' => '10',
                'default' => '',
                'placeholder' => esc_html__('Enter Your Custom Information', 'aiero_plugin')
            ]
        );

        $this->add_control(
            'add_link',
            [
                'label'         => esc_html__('Add Title Link', 'aiero_plugin'),
                'type'          => Controls_Manager::SWITCHER,
                'default'       => '',
                'return_value'  => 'yes',
                'label_off'     => esc_html__('No', 'aiero_plugin'),
                'label_on'      => esc_html__('Yes', 'aiero_plugin')
            ]
        );

        $this->add_control(
            'link',
            [
                'label'         => esc_html__('Image Box Title Link', 'aiero_plugin'),
                'type'          => Controls_Manager::URL,
                'label_block'   => true,
                'default'       => [
                    'url'           => '',
                    'is_external'   => 'true',
                ],
                'placeholder'   => esc_html__( 'http://your-link.com', 'aiero_plugin' ),
                'condition' => [
                    'add_link' => 'yes'
                ]
            ]
        );

        $this->end_controls_section();

        // ----------------------------------- //
        // ---------- Icon Settings ---------- //
        // ----------------------------------- //
        $this->start_controls_section(
            'icon_settings',
            [
                'label' => esc_html__('Icon Settings', 'aiero_plugin'),
                'tab'   => Controls_Manager::TAB_STYLE
            ]
        );

        $this->add_responsive_control(
            'icon_container_size',
            [
                'label'     => esc_html__('Icon Container Size', 'aiero_plugin'),
                'type'      => Controls_Manager::SLIDER,
                'range'     => [
                    'px'        => [
                        'min'       => 10,
                        'max'       => 280
                    ]
                ],
                'selectors' => [
                    '{{WRAPPER}} .icon-container' => 'width: {{SIZE}}{{UNIT}}; height: {{SIZE}}{{UNIT}};'
                ]
            ]
        );

        $this->add_responsive_control(
            'icon_background_size',
            [
                'label'     => esc_html__('Icon Background Size', 'aiero_plugin'),
                'type'      => Controls_Manager::SLIDER,
                'range'     => [
                    'px'        => [
                        'min'       => 10,
                        'max'       => 280
                    ]
                ],
                'selectors' => [
                    '{{WRAPPER}} .icon-container .background' => 'width: {{SIZE}}{{UNIT}}; height: {{SIZE}}{{UNIT}};'
                ],
                'condition' => [
                    'background_type' => 'svg'
                ]
            ]
        );

        $this->add_responsive_control(
            'icon_size',
            [
                'label'     => esc_html__('Icon Size', 'aiero_plugin'),
                'type'      => Controls_Manager::SLIDER,
                'range'     => [
                    'px'        => [
                        'min'       => 5,
                        'max'       => 280
                    ]
                ],
                'selectors' => [
                    '{{WRAPPER}} .icon-container i' => 'font-size: {{SIZE}}{{UNIT}};'
                ],
                'condition' => [
                    'icon_type' => 'default'
                ]
            ]
        );

        $this->add_responsive_control(
            'icon_svg_size',
            [
                'label'     => esc_html__('Icon Size', 'aiero_plugin'),
                'type'      => Controls_Manager::SLIDER,
                'range'     => [
                    'px'        => [
                        'min'       => 5,
                        'max'       => 200
                    ]
                ],
                'selectors' => [
                    '{{WRAPPER}} .icon-container .icon' => 'width: {{SIZE}}{{UNIT}}; height: {{SIZE}}{{UNIT}};'
                ],
                'condition' => [
                    'icon_type' => 'svg'
                ]
            ]
        );

        $this->add_group_control(
            Group_Control_Box_Shadow::get_type(),
            [
                'name'      => 'icon_shadow',
                'label'     => esc_html__('Icon Shadow', 'aiero_plugin'),
                'selector'  => '{{WRAPPER}} .icon-container'
            ]
        );


        $this->start_controls_tabs('icon_settings_tabs');

            // ------------------------ //
            // ------ Normal Tab ------ //
            // ------------------------ //
            $this->start_controls_tab(
                'icon_normal',
                [
                    'label' => esc_html__('Normal', 'aiero_plugin')
                ]
            );

                $this->add_control(
                    'icon_color',
                    [
                        'label'     => esc_html__('Icon Color', 'aiero_plugin'),
                        'type'      => Controls_Manager::COLOR,
                        'selectors' => [
                            '{{WRAPPER}} .icon-container i' => 'color: {{VALUE}};'
                        ],
                        'condition' => [
                            'icon_type' => 'default'
                        ]
                    ]
                );

                $this->add_control(
                    'icon_svg_color',
                    [
                        'label'     => esc_html__('Icon Color', 'aiero_plugin'),
                        'type'      => Controls_Manager::COLOR,
                        'selectors' => [
                            '{{WRAPPER}} .icon-container .icon svg' => 'fill: {{VALUE}};'
                        ],
                        'condition' => [
                            'icon_type' => 'svg'
                        ]
                    ]
                );

                $this->add_control(
                    'background_svg_color',
                    [
                        'label'     => esc_html__('Background SVG Color', 'aiero_plugin'),
                        'type'      => Controls_Manager::COLOR,
                        'selectors' => [
                            '{{WRAPPER}} .icon-container .background svg' => 'fill: {{VALUE}};'
                        ],
                        'condition' => [
                            'background_type' => 'svg',
                        ]
                    ]
                );

                $this->add_control(
                    'background_color',
                    [
                        'label'     => esc_html__('Background Color', 'aiero_plugin'),
                        'type'      => Controls_Manager::COLOR,
                        'selectors' => [
                            '{{WRAPPER}} .icon-container' => 'background-color: {{VALUE}};'
                        ],
                        'condition' => [
                            'background_type' => 'color',
                        ]
                    ]
                );

            $this->end_controls_tab();

            // ----------------------- //
            // ------ Hover Tab ------ //
            // ----------------------- //
            $this->start_controls_tab(
                'icon_hover',
                [
                    'label' => esc_html__('Hover', 'aiero_plugin')
                ]
            );

                $this->add_control(
                    'icon_color_hover',
                    [
                        'label'     => esc_html__('Icon Color on Hover', 'aiero_plugin'),
                        'type'      => Controls_Manager::COLOR,
                        'selectors' => [
                            '{{WRAPPER}}:hover .icon-container i' => 'color: {{VALUE}};'
                        ],
                        'condition' => [
                            'icon_type' => 'default'
                        ]
                    ]
                );

                $this->add_control(
                    'icon_svg_color_hover',
                    [
                        'label'     => esc_html__('Icon Color on Hover', 'aiero_plugin'),
                        'type'      => Controls_Manager::COLOR,
                        'selectors' => [
                            '{{WRAPPER}}:hover .icon-container .icon svg' => 'fill: {{VALUE}};'
                        ],
                        'condition' => [
                            'icon_type' => 'svg'
                        ]
                    ]
                );

                $this->add_control(
                    'background_svg_color_hover',
                    [
                        'label'     => esc_html__('Background SVG on Hover', 'aiero_plugin'),
                        'type'      => Controls_Manager::COLOR,
                        'selectors' => [
                            '{{WRAPPER}}:hover .icon-container .background svg' => 'fill: {{VALUE}};'
                        ],
                        'condition' => [
                            'background_type' => 'svg'
                        ]
                    ]
                );

                $this->add_control(
                    'background_color_hover',
                    [
                        'label'     => esc_html__('Background Color on Hover', 'aiero_plugin'),
                        'type'      => Controls_Manager::COLOR,
                        'selectors' => [
                            '{{WRAPPER}}:hover .icon-container' => 'background-color: {{VALUE}};'
                        ],
                        'condition' => [
                            'background_type' => 'color'
                        ]
                    ]
                );

            $this->end_controls_tab();

        $this->end_controls_tabs();

        $this->add_responsive_control(
            'icon_margin',
            [
                'label'         => esc_html__('Icon Margins', 'aiero_plugin'),
                'type'          => Controls_Manager::DIMENSIONS,
                'size_units'    => ['px', '%', 'em'],
                'selectors'     => [
                    '{{WRAPPER}} .icon-box-item .icon-container' => 'margin: {{TOP}}{{UNIT}} {{RIGHT}}{{UNIT}} {{BOTTOM}}{{UNIT}} {{LEFT}}{{UNIT}};'
                ]
            ]
        );

        $this->add_responsive_control(
            'icon_radius',
            [
                'label'         => esc_html__('Icon Border Radius', 'aiero_plugin'),
                'type'          => Controls_Manager::DIMENSIONS,
                'size_units'    => ['px', '%', 'em'],
                'selectors'     => [
                    '{{WRAPPER}} .icon-box-item .icon-container.background-type-color' => 'border-radius: {{TOP}}{{UNIT}} {{RIGHT}}{{UNIT}} {{BOTTOM}}{{UNIT}} {{LEFT}}{{UNIT}};'
                ],
                'condition'     => [
                    'background_type' => 'color'
                ]
            ]
        );

        $this->end_controls_section();


        // ------------------------------------ //
        // ---------- Title Settings ---------- //
        // ------------------------------------ //
        $this->start_controls_section(
            'title_settings',
            [
                'label' => esc_html__('Title Settings', 'aiero_plugin'),
                'tab'   => Controls_Manager::TAB_STYLE
            ]
        );

        $this->add_group_control(
            Group_Control_Typography::get_type(),
            [
                'name'      => 'title_typography',
                'label'     => esc_html__('Title Typography', 'aiero_plugin'),
                'selector'  => '{{WRAPPER}} .icon-box-title'
            ]
        );

        $this->add_control(
            'title_color',
            [
                'label'     => esc_html__('Title Color', 'aiero_plugin'),
                'type'      => Controls_Manager::COLOR,
                'selectors' => [
                    '{{WRAPPER}} .icon-box-title' => 'color: {{VALUE}};'
                ]
            ]
        );

        $this->add_control(
            'title_color_hover',
            [
                'label'     => esc_html__('Title Color on Hover', 'aiero_plugin'),
                'type'      => Controls_Manager::COLOR,
                'selectors' => [
                    '{{WRAPPER}} .icon-box-item-link:hover' => 'color: {{VALUE}};'
                ],
                'condition' => [
                    'add_link' => 'yes'
                ]
            ]
        );

        $this->end_controls_section();


        // ---------------------------------------- //
        // ---------- Info Text Settings ---------- //
        // ---------------------------------------- //
        $this->start_controls_section(
            'text_settings',
            [
                'label' => esc_html__('Information Text Settings', 'aiero_plugin'),
                'tab'   => Controls_Manager::TAB_STYLE
            ]
        );

        $this->add_control(
            'info_color',
            [
                'label'     => esc_html__('Information Color', 'aiero_plugin'),
                'type'      => Controls_Manager::COLOR,
                'selectors' => [
                    '{{WRAPPER}} .icon-box-info' => 'color: {{VALUE}};'
                ],
                'separator' => 'before'
            ]
        );

        $this->add_group_control(
            Group_Control_Typography::get_type(),
            [
                'name'      => 'info_typography',
                'label'     => esc_html__('Information Typography', 'aiero_plugin'),
                'selector'  => '{{WRAPPER}} .icon-box-info, {{WRAPPER}} .icon-box-info p'
            ]
        );

        $this->add_responsive_control(
            'info_margin',
            [
                'label'     => esc_html__('Space Between Title and Text', 'aiero_plugin'),
                'type'      => Controls_Manager::SLIDER,
                'range'     => [
                    'px'        => [
                        'min'       => 0,
                        'max'       => 200
                    ]
                ],
                'selectors' => [
                    '{{WRAPPER}} .icon-box-info' => 'margin-top: {{SIZE}}{{UNIT}};'
                ]
            ]
        );

        $this->add_responsive_control(
            'border_width',
            [
                'label'     => esc_html__('Border Width', 'aiero_plugin'),
                'type'      => Controls_Manager::SLIDER,
                'selectors' => [
                    '{{WRAPPER}} .icon-box-item .content-container' => 'border-bottom-style: solid; border-bottom-width: {{SIZE}}{{UNIT}};',
                ]
            ]
        );

        $this->add_control(
            'border_color',
            [
                'label'     => esc_html__('Border Color', 'aiero_plugin'),
                'type'      => Controls_Manager::COLOR,
                'selectors' => [
                    '{{WRAPPER}} .icon-box-item .content-container' => 'border-color: {{VALUE}};'
                ]
            ]
        );

        $this->add_responsive_control(
            'border_spacing',
            [
                'label'     => esc_html__('Border Spacing', 'aiero_plugin'),
                'type'      => Controls_Manager::SLIDER,
                'range'     => [
                    'px'        => [
                        'min'       => 0,
                        'max'       => 100
                    ]
                ],
                'selectors' => [
                    '{{WRAPPER}} .icon-box-item .content-container' => 'padding-bottom: {{SIZE}}{{UNIT}};',
                ]
            ]
        );

        $this->end_controls_section();
    }

    protected function render() {
        $settings        = $this->get_settings();

        $icon_type       = $settings['icon_type'];
        $default_icon    = $settings['default_icon'];
        $svg_icon        = $settings['svg_icon'];

        $background_type = $settings['background_type'];

        if ( $background_type == 'svg' ) {
            $svg_background = $settings['svg_background'];
        }
        if ( $background_type == 'image' ) {
            $bg_image = !empty($settings['bg_image']['url']) ? $settings['bg_image'] : array();
        }

        $title              = $settings['title'];
        $info               = $settings['info'];
        $add_link           = $settings['add_link'];
        $link               = $settings['link'];

        // ------------------------------------ //
        // ---------- Widget Content ---------- //
        // ------------------------------------ //
        ?>

        <div class="aiero-icon-box-widget">
            <?php
                $is_link = ($add_link == 'yes' && !empty($link) && $link['url'] !== '');
            ?>
            <div class="icon-box-item">

                <div class="icon-container<?php echo ( !empty($background_type) ? ' background-type-' . esc_attr($background_type) : '' ); ?>">
                    <?php
                    if ($icon_type == 'default') {
                        echo '<i class="' . esc_attr($default_icon['value']) . '"></i>';
                    }
                    if ($icon_type == 'svg') {
                        echo '<span class="icon">' . aiero_output_code($svg_icon) . '</span>';
                    }

                    if ($background_type == 'image') {
                        if (!empty($bg_image['url'])) {
                            echo '<img class="icon-container-bg-image" src="' . esc_url($bg_image['url']) . '" alt="' . esc_html__('Background Image', 'aiero_plugin') . '" />';
                        }
                    }
                    if ($background_type == 'svg' && !empty($svg_background)) {
                        echo '<span class="background">' . aiero_output_code($svg_background) . '</span>';
                    }
                    ?>
                </div>

                <div class="content-container">
                    <?php
                        if ($title !== '') {
                            echo '<h5 class="icon-box-title">';
                            	if($is_link) {
				                    $this->add_link_attributes( 'link', $link );
				                    echo '<a class="icon-box-item-link" href="' . esc_url($link['url']) . '"';
				                        $this->print_render_attribute_string('link');
				                    echo '>';
				                }
                                echo wp_kses_post($title);
                                if($is_link) {
				                    echo '</a>';
				                }
                            echo '</h5>';
                        }
                        if ($info !== '') {
                            echo '<div class="icon-box-info">';
                                echo wp_kses_post($info);
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