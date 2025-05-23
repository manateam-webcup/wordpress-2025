<?php
/*
 * Created by Artureanec
*/

namespace Aiero\Widgets;

use Elementor\Widget_Base;
use Elementor\Controls_Manager;
use Elementor\Group_Control_Typography;
use Elementor\Group_Control_Text_Shadow;
use Elementor\Group_Control_Background;
use Elementor\Group_Control_Border;
use Elementor\Group_Control_Box_Shadow;
use Elementor\Group_Control_Image_Size;
use Elementor\REPEATER;
use Elementor\Utils;
use Elementor\Embed;
use Elementor\Modules\DynamicTags\Module as TagsModule;

if ( ! defined( 'ABSPATH' ) ) exit; // Exit if accessed directly

class Aiero_Content_Slider_Widget extends Widget_Base {

    public function get_name() {
        return 'aiero_content_slider';
    }

    public function get_title() {
        return esc_html__('Content Slider', 'aiero_plugin');
    }

    public function get_icon() {
        return 'eicon-post-slider';
    }

    public function get_categories() {
        return ['aiero_widgets'];
    }

    public function get_style_depends(): array {
		return [ 'widget-counter' ];
	}

    public function get_script_depends() {
        return ['elementor_widgets', 'jquery-numerator'];
    }

    public function is_reload_preview_required() {
        return true;
    }

    protected function register_controls() {

        // ----------------------------- //
        // ---------- Content ---------- //
        // ----------------------------- //
        $this->start_controls_section(
            'section_content',
            [
                'label' => esc_html__('Content Slider', 'aiero_plugin')
            ]
        );

        $this->add_responsive_control(
            'slider_height',
            [
                'label'     => esc_html__('Slider Height', 'aiero_plugin'),
                'type'      => Controls_Manager::SLIDER,
                'range'     => [
                    'px'        => [
                        'min'       => 10,
                        'max'       => 2000,
                    ]
                ],
                'selectors' => [
                    '{{WRAPPER}} .content-item' => 'height: {{SIZE}}{{UNIT}};'
                ]
            ]
        );

        $this->add_control(
            'add_video',
            [
                'label'         => esc_html__('Show video preview', 'aiero_plugin'),
                'type'          => Controls_Manager::SWITCHER,
                'label_off'     => esc_html__('No', 'aiero_plugin'),
                'label_on'      => esc_html__('Yes', 'aiero_plugin'),
                'return_value'  => 'yes',
                'default'       => 'no',
                'separator'     => 'before'
            ]
        );

        $this->add_control(
            'video_type',
            [
                'label'     => esc_html__( 'Source', 'aiero_plugin' ),
                'type'      => Controls_Manager::SELECT,
                'default'   => 'youtube',
                'options'   => [
                    'youtube'       => esc_html__( 'YouTube', 'aiero_plugin' ),
                    'vimeo'         => esc_html__( 'Vimeo', 'aiero_plugin' ),
                    'dailymotion'   => esc_html__( 'Dailymotion', 'aiero_plugin' ),
                    'hosted'        => esc_html__( 'Self Hosted', 'aiero_plugin' )
                ],
                'frontend_available' => true,
                'condition' => [
                    'add_video'     => 'yes'
                ]
            ]
        );

        $this->add_control(
            'youtube_url',
            [
                'label'         => esc_html__( 'Link', 'aiero_plugin' ),
                'type'          => Controls_Manager::TEXT,
                'dynamic'       => [
                    'active'        => true,
                    'categories'    => [
                        TagsModule::POST_META_CATEGORY,
                        TagsModule::URL_CATEGORY
                    ]
                ],
                'placeholder'   => esc_html__( 'Enter your URL', 'aiero_plugin' ) . ' (YouTube)',
                'default'       => 'https://www.youtube.com/watch?v=XHOmBV4js_E',
                'label_block'   => true,
                'condition'     => [
                    'add_video'     => 'yes',
                    'video_type'    => 'youtube'
                ],
                'frontend_available' => true
            ]
        );

        $this->add_control(
            'vimeo_url',
            [
                'label'         => esc_html__( 'Link', 'aiero_plugin' ),
                'type'          => Controls_Manager::TEXT,
                'dynamic'       => [
                    'active'        => true,
                    'categories'    => [
                        TagsModule::POST_META_CATEGORY,
                        TagsModule::URL_CATEGORY
                    ],
                ],
                'placeholder'   => esc_html__( 'Enter your URL', 'aiero_plugin' ) . ' (Vimeo)',
                'default'       => 'https://vimeo.com/235215203',
                'label_block'   => true,
                'condition'     => [
                    'add_video'     => 'yes',
                    'video_type'    => 'vimeo'
                ]
            ]
        );

        $this->add_control(
            'dailymotion_url',
            [
                'label'         => esc_html__( 'Link', 'aiero_plugin' ),
                'type'          => Controls_Manager::TEXT,
                'dynamic'       => [
                    'active'        => true,
                    'categories'    => [
                        TagsModule::POST_META_CATEGORY,
                        TagsModule::URL_CATEGORY
                    ],
                ],
                'placeholder'   => esc_html__( 'Enter your URL', 'aiero_plugin' ) . ' (Dailymotion)',
                'default'       => 'https://www.dailymotion.com/video/x6tqhqb',
                'label_block'   => true,
                'condition'     => [
                    'add_video'     => 'yes',
                    'video_type'    => 'dailymotion'
                ]
            ]
        );

        $this->add_control(
            'insert_url',
            [
                'label'     => esc_html__( 'External URL', 'aiero_plugin' ),
                'type'      => Controls_Manager::SWITCHER,
                'condition' => [
                    'add_video'     => 'yes',
                    'video_type'    => 'hosted'
                ]
            ]
        );

        $this->add_control(
            'hosted_url',
            [
                'label'         => esc_html__( 'Choose File', 'aiero_plugin' ),
                'type'          => Controls_Manager::MEDIA,
                'dynamic'       => [
                    'active'        => true,
                    'categories'    => [
                        TagsModule::MEDIA_CATEGORY
                    ],
                ],
                'media_type'    => 'video',
                'condition'     => [
                    'add_video'     => 'yes',
                    'video_type'    => 'hosted',
                    'insert_url'    => ''
                ]
            ]
        );

        $this->add_control(
            'external_url',
            [
                'label'         => esc_html__( 'URL', 'aiero_plugin' ),
                'type'          => Controls_Manager::URL,
                'autocomplete'  => false,
                'options'       => false,
                'label_block'   => true,
                'show_label'    => false,
                'dynamic'       => [
                    'active'        => true,
                    'categories'    => [
                        TagsModule::POST_META_CATEGORY,
                        TagsModule::URL_CATEGORY
                    ]
                ],
                'media_type'    => 'video',
                'placeholder'   => esc_html__( 'Enter your URL', 'aiero_plugin' ),
                'condition'     => [
                    'add_video'     => 'yes',
                    'video_type'    => 'hosted',
                    'insert_url'    => 'yes'
                ],
            ]
        );

        $this->add_control(
            'controls',
            [
                'label' => esc_html__( 'Player Controls', 'aiero_plugin' ),
                'type' => Controls_Manager::SWITCHER,
                'label_off' => esc_html__( 'Hide', 'aiero_plugin' ),
                'label_on' => esc_html__( 'Show', 'aiero_plugin' ),
                'default' => 'yes',
                'condition' => [
                    'add_video'     => 'yes',
                    'video_type!' => 'vimeo',
                ],
                'frontend_available' => true,
            ]
        );

        $this->add_control(
            'video_button_text',
            [
                'label' => esc_html__('Play Button Text', 'aiero_plugin'),
                'type' => Controls_Manager::TEXT,
                'placeholder' => esc_html__('Enter Play Button Text', 'aiero_plugin'),
                'default' => esc_html__('Watch video', 'aiero_plugin'),
                'condition' => [
                    'add_video'     => 'yes'
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

        $repeater = new Repeater();

        $repeater->add_control(
            'slide_name',
            [
                'label'     => esc_html__('Slide Name', 'aiero_plugin'),
                'type'      => Controls_Manager::TEXT,
                'default'   => '',
                'separator' => 'after'
            ]
        );

        $repeater->add_control(
            'text_content_width',
            [
                'label' => esc_html__( 'Text Section Content Width', 'aiero_plugin' ),
                'type' => Controls_Manager::SELECT,
                'default' => 'boxed',
                'options' => [
                    'boxed' => esc_html__( 'Boxed', 'aiero_plugin' ),
                    'full_width' => esc_html__( 'Full Width', 'aiero_plugin' ),
                ]
            ]
        );

        $repeater->add_control(
            'bottom_content_width',
            [
                'label' => esc_html__( 'Bottom Section Content Width', 'aiero_plugin' ),
                'type' => Controls_Manager::SELECT,
                'default' => 'full_width',
                'options' => [
                    'boxed' => esc_html__( 'Boxed', 'aiero_plugin' ),
                    'full_width' => esc_html__( 'Full Width', 'aiero_plugin' ),
                ]
            ]
        );

        $repeater->add_responsive_control(
            'content_max_width',
            [
                'label'         => esc_html__('Text Column Width, %', 'aiero_plugin'),
                'type'          => Controls_Manager::SLIDER,
                'size_units'    => ['%'],
                'range'         => [
                    '%'             => [
                        'min' => 1,
                        'max' => 100
                    ]
                ],
                'selectors'     => [
                    '{{WRAPPER}} {{CURRENT_ITEM}} .slide-content-column'    => 'width: {{SIZE}}%;'
                ]
            ]
        );

        $repeater->add_responsive_control(
            'text_content_padding',
            [
                'label'         => esc_html__('Text Column Padding', 'aiero_plugin'),
                'type'          => Controls_Manager::DIMENSIONS,
                'size_units'    => ['px', '%', 'vw', 'custom'],
                'selectors'     => [
                    '{{WRAPPER}} {{CURRENT_ITEM}} .slide-content-column' => 'padding: {{TOP}}{{UNIT}} {{RIGHT}}{{UNIT}} {{BOTTOM}}{{UNIT}} {{LEFT}}{{UNIT}};'
                ]
            ]
        );

        $repeater->add_control(
            'reverse_columns',
            [
                'label' => esc_html__( 'Reverse Columns Position', 'aiero_plugin' ),
                'type' => Controls_Manager::SWITCHER,
                'label_on' => esc_html__( 'Yes', 'aiero_plugin' ),
                'label_off' => esc_html__( 'No', 'aiero_plugin' ),
                'return_value' => 'yes',
                'default' => ''
            ]
        );

        $repeater->add_control(
            'show_title_separately',
            [
                'label' => esc_html__( 'Show Title In Separate Column', 'aiero_plugin' ),
                'type' => Controls_Manager::SWITCHER,
                'label_on' => esc_html__( 'Yes', 'aiero_plugin' ),
                'label_off' => esc_html__( 'No', 'aiero_plugin' ),
                'return_value' => 'yes',
                'default' => '',
            ]
        );

        $repeater->add_responsive_control(
            'content_position',
            [
                'label'         => esc_html__('Text Column Position', 'aiero_plugin'),
                'type'          => Controls_Manager::CHOOSE,
                'options'       => [
                    'start'         => [
                        'title'         => esc_html__( 'Left', 'aiero_plugin' ),
                        'icon'          => 'eicon-h-align-left'
                    ],
                    'center'        => [
                        'title'         => esc_html__( 'Center', 'aiero_plugin' ),
                        'icon'          => 'eicon-h-align-center'
                    ],
                    'end'           => [
                        'title'         => esc_html__( 'Right', 'aiero_plugin' ),
                        'icon'          => 'eicon-h-align-right'
                    ],
                    'space-between'           => [
                        'title'         => esc_html__( 'Space Between', 'aiero_plugin' ),
                        'icon'          => 'eicon-justify-space-between-h'
                    ]
                ],
                'selectors' => [
                    '{{WRAPPER}} {{CURRENT_ITEM}} .elementor-text-column .elementor-container > .elementor-row' => '-webkit-justify-content: {{VALUE}}; -moz-justify-content: {{VALUE}}; -ms-justify-content: {{VALUE}}; justify-content: {{VALUE}};'
                ]
            ]
        );

        $repeater->add_responsive_control(
            'content_text_align',
            [
                'label'     => esc_html__('Text Alignment', 'aiero_plugin'),
                'type'      => Controls_Manager::CHOOSE,
                'default'   => 'left',
                'options'   => [
                    'left'      => [
                        'title'     => esc_html__( 'Left', 'aiero_plugin' ),
                        'icon'      => 'eicon-text-align-left'
                    ],
                    'center'    => [
                        'title'     => esc_html__( 'Center', 'aiero_plugin' ),
                        'icon'      => 'eicon-text-align-center'
                    ],
                    'right'     => [
                        'title'     => esc_html__( 'Right', 'aiero_plugin' ),
                        'icon'      => 'eicon-text-align-right'
                    ]
                ],
                'selectors' => [
                    '{{WRAPPER}} {{CURRENT_ITEM}} .slide-content-column' => 'text-align: {{VALUE}};',
                    '{{WRAPPER}} {{CURRENT_ITEM}} .title-column' => 'text-align: {{VALUE}};'
                ]
            ]
        );

        $repeater->add_responsive_control(
            'bottom_section_text_align',
            [
                'label'     => esc_html__('Bottom Section Alignment', 'aiero_plugin'),
                'type'      => Controls_Manager::CHOOSE,
                'default'   => 'left',
                'options'   => [
                    'left'      => [
                        'title'     => esc_html__( 'Left', 'aiero_plugin' ),
                        'icon'      => 'eicon-text-align-left'
                    ],
                    'center'    => [
                        'title'     => esc_html__( 'Center', 'aiero_plugin' ),
                        'icon'      => 'eicon-text-align-center'
                    ],
                    'right'     => [
                        'title'     => esc_html__( 'Right', 'aiero_plugin' ),
                        'icon'      => 'eicon-text-align-right'
                    ]
                ],
                'selectors' => [
                    '{{WRAPPER}} {{CURRENT_ITEM}} .elementor-bottom-column' => 'text-align: {{VALUE}};'
                ],
                'condition' => [
                    'add_bottom_section' => 'yes'
                ]
            ]
        );

        $repeater->add_responsive_control(
            'sections_vertical_position',
            [
                'label'         => esc_html__('Sections Vertical Position', 'aiero_plugin'),
                'type'          => Controls_Manager::CHOOSE,
                'options'       => [
                    'flex-start'         => [
                        'title'         => esc_html__( 'Top', 'aiero_plugin' ),
                        'icon'          => 'eicon-v-align-top'
                    ],
                    'center'        => [
                        'title'         => esc_html__( 'Center', 'aiero_plugin' ),
                        'icon'          => 'eicon-v-align-middle'
                    ],
                    'flex-end'           => [
                        'title'         => esc_html__( 'Bottom', 'aiero_plugin' ),
                        'icon'          => 'eicon-v-align-bottom'
                    ],
                    'space-between'        => [
                        'title'         => esc_html__( 'Space Between', 'aiero_plugin' ),
                        'icon'          => 'eicon-justify-space-between-v'
                    ],
                    'space-around'        => [
                        'title'         => esc_html__( 'Space Around', 'aiero_plugin' ),
                        'icon'          => 'eicon-justify-space-around-v'
                    ],
                    'space-evenly'        => [
                        'title'         => esc_html__( 'Space Evenly', 'aiero_plugin' ),
                        'icon'          => 'eicon-justify-space-evenly-v'
                    ],
                ],
                'selectors' => [
                    '{{WRAPPER}} {{CURRENT_ITEM}} .elementor-top-section > .elementor-container > .elementor-row' => 'justify-content: {{VALUE}};'
                ],
            ]
        );

        $repeater->add_responsive_control(
            'text_section_vertical_align',
            [
                'label'         => esc_html__('Text Section Vertical Alignment', 'aiero_plugin'),
                'type'          => Controls_Manager::CHOOSE,
                'options'       => [
                    'flex-start'         => [
                        'title'         => esc_html__( 'Top', 'aiero_plugin' ),
                        'icon'          => 'eicon-v-align-top'
                    ],
                    'center'        => [
                        'title'         => esc_html__( 'Center', 'aiero_plugin' ),
                        'icon'          => 'eicon-v-align-middle'
                    ],
                    'flex-end'           => [
                        'title'         => esc_html__( 'Bottom', 'aiero_plugin' ),
                        'icon'          => 'eicon-v-align-bottom'
                    ]
                ],
                'selectors' => [
                    '{{WRAPPER}} {{CURRENT_ITEM}} .elementor-text-column .elementor-inner-section > .elementor-container > .elementor-row' => 'align-items: {{VALUE}}; align-content: {{VALUE}};'
                ]
            ]
        );

        $repeater->add_responsive_control(
            'bottom_section_vertical_align',
            [
                'label'         => esc_html__('Bottom Section Vertical Alignment', 'aiero_plugin'),
                'type'          => Controls_Manager::CHOOSE,
                'options'       => [
                    'flex-start'         => [
                        'title'         => esc_html__( 'Top', 'aiero_plugin' ),
                        'icon'          => 'eicon-v-align-top'
                    ],
                    'center'        => [
                        'title'         => esc_html__( 'Center', 'aiero_plugin' ),
                        'icon'          => 'eicon-v-align-middle'
                    ],
                    'flex-end'           => [
                        'title'         => esc_html__( 'Bottom', 'aiero_plugin' ),
                        'icon'          => 'eicon-v-align-bottom'
                    ]
                ],
                'selectors' => [
                    '{{WRAPPER}} {{CURRENT_ITEM}} .elementor-bottom-column .elementor-inner-section > .elementor-container > .elementor-row' => 'align-items: {{VALUE}}; align-content: {{VALUE}};'
                ],
                'condition' => [
                    'add_bottom_section' => 'yes'
                ]
            ]
        );        

        $repeater->add_responsive_control(
            'text_column_padding',
            [
                'label'         => esc_html__('Text Section Padding', 'aiero_plugin'),
                'type'          => Controls_Manager::DIMENSIONS,
                'size_units'    => ['px', '%', 'vw', 'custom'],
                'selectors'     => [
                    '{{WRAPPER}} {{CURRENT_ITEM}} .elementor-text-column .elementor-section' => 'padding: {{TOP}}{{UNIT}} {{RIGHT}}{{UNIT}} {{BOTTOM}}{{UNIT}} {{LEFT}}{{UNIT}};'
                ]
            ]
        );

        $repeater->add_control(
            'text_column_stretch',
            [
                'label'         => esc_html__('Stretch Text Section', 'aiero_plugin'),
                'type'          => Controls_Manager::SWITCHER,
                'default'       => '',
                'return_value'  => 'yes',
                'label_off'     => esc_html__('No', 'aiero_plugin'),
                'label_on'      => esc_html__('Yes', 'aiero_plugin')
            ]
        );

        $repeater->add_responsive_control(
            'text_column_vertical_align',
            [
                'label'         => esc_html__('Text Column Vertical Alignment', 'aiero_plugin'),
                'type'          => Controls_Manager::CHOOSE,
                'options'       => [
                    'flex-start'         => [
                        'title'         => esc_html__( 'Top', 'aiero_plugin' ),
                        'icon'          => 'eicon-v-align-top'
                    ],
                    'center'        => [
                        'title'         => esc_html__( 'Center', 'aiero_plugin' ),
                        'icon'          => 'eicon-v-align-middle'
                    ],
                    'flex-end'           => [
                        'title'         => esc_html__( 'Bottom', 'aiero_plugin' ),
                        'icon'          => 'eicon-v-align-bottom'
                    ]
                ],
                'selectors' => [
                    '{{WRAPPER}} {{CURRENT_ITEM}}.stretch-text-column .elementor-top-section > .elementor-container > .elementor-row .elementor-text-column .elementor-section > .elementor-container > .elementor-row .slide-content-column' => 'justify-content: {{VALUE}};'
                ],
                'condition' => [                    
                    'text_column_stretch' => 'yes'
                ]
            ]
        );

        $repeater->add_responsive_control(
            'bottom_column_padding',
            [
                'label'         => esc_html__('Bottom Section Padding', 'aiero_plugin'),
                'type'          => Controls_Manager::DIMENSIONS,
                'size_units'    => ['px', '%', 'vw'],
                'selectors'     => [
                    '{{WRAPPER}} {{CURRENT_ITEM}} .elementor-bottom-column .elementor-section' => 'padding: {{TOP}}{{UNIT}} {{RIGHT}}{{UNIT}} {{BOTTOM}}{{UNIT}} {{LEFT}}{{UNIT}};'
                ],
                'condition' => [
                    'add_bottom_section' => 'yes'
                ]
            ]
        ); 

        $repeater->add_control(
            'divider_1',
            [
                'type' => Controls_Manager::DIVIDER
            ]
        );

        $repeater->start_controls_tabs('text_section_settings_tabs');

        // -------------------- //
        // ------ BG Tab ------ //
        // -------------------- //
        $repeater->start_controls_tab(
            'tab_bg',
            [
                'label' => esc_html__('BG', 'aiero_plugin')
            ]
        );

            $repeater->add_group_control(
                Group_Control_Background::get_type(),
                [
                    'name'      => 'background',
                    'label'     => esc_html__( 'Slide Background', 'aiero_plugin' ),
                    'fields_options' => [
                        'background' => [
                            'label' => esc_html__( 'Slide Background', 'aiero_plugin' )
                        ],
                        'video_fallback' => [
                            'active' => false
                        ]
                    ],
                    'types'     => [ 'classic', 'gradient', 'video' ],
                    'selector'  => '{{WRAPPER}} {{CURRENT_ITEM}}'
                ]
            );

            $repeater->add_group_control(
                Group_Control_Background::get_type(),
                [
                    'name'      => 'text_column_background',
                    'label'     => esc_html__( 'Text Column Background', 'aiero_plugin' ),
                    'fields_options' => [
                        'background' => [
                            'label' => esc_html__( 'Text Column Background', 'aiero_plugin' )
                        ]
                    ],
                    'types'     => [ 'classic', 'gradient' ],
                    'selector'  => '{{WRAPPER}} {{CURRENT_ITEM}} .slide-content-column'
                ]
            );

            $repeater->add_control(
                'add_bg_overlay',
                [
                    'label'         => esc_html__('Add Overlay', 'aiero_plugin'),
                    'type'          => Controls_Manager::SWITCHER,
                    'default'       => 'no',
                    'return_value'  => 'yes',
                    'label_off'     => esc_html__('No', 'aiero_plugin'),
                    'label_on'      => esc_html__('Yes', 'aiero_plugin')
                ]
            );

            $repeater->add_control(
                'bg_overlay_color',
                [
                    'label'     => esc_html__('Overlay Color', 'aiero_plugin'),
                    'type'      => Controls_Manager::COLOR,
                    'default'   => '',
                    'selectors' => [
                        '{{WRAPPER}} {{CURRENT_ITEM}}' => 'background-blend-mode: overlay; background-color: {{VALUE}};',
                        '{{WRAPPER}} {{CURRENT_ITEM}} .elementor-background-video-container:after' => 'background-color: {{VALUE}};'
                    ],
                    'condition' => [
                        'add_bg_overlay'    => 'yes'
                    ]
                ]
            );

            $repeater->add_responsive_control(
                'text_column_border_radius',
                [
                    'label' => esc_html__( 'Text Column Border Radius', 'aiero_plugin' ),
                    'type' => Controls_Manager::DIMENSIONS,
                    'size_units' => [ 'px', '%', 'em', 'rem', 'custom' ],
                    'selectors' => [
                        '{{WRAPPER}} {{CURRENT_ITEM}} .slide-content-column' => 'border-radius: {{TOP}}{{UNIT}} {{RIGHT}}{{UNIT}} {{BOTTOM}}{{UNIT}} {{LEFT}}{{UNIT}};',
                    ],
                ]
            );

            $repeater->add_responsive_control(
                'text_section_border_radius',
                [
                    'label' => esc_html__( 'Section Border Radius', 'aiero_plugin' ),
                    'type' => Controls_Manager::DIMENSIONS,
                    'size_units' => [ 'px', '%', 'em', 'rem', 'custom' ],
                    'selectors' => [
                        '{{WRAPPER}} {{CURRENT_ITEM}}' => 'border-radius: {{TOP}}{{UNIT}} {{RIGHT}}{{UNIT}} {{BOTTOM}}{{UNIT}} {{LEFT}}{{UNIT}};',
                    ],
                ]
            );

        $repeater->end_controls_tab();

        // ----------------------- //
        // ------ Title Tab ------ //
        // ----------------------- //
        $repeater->start_controls_tab(
            'tab_title',
            [
                'label' => esc_html__('Title', 'aiero_plugin')
            ]
        );

            $repeater->add_control(
                'heading',
                [
                    'label'         => esc_html__('Title', 'aiero_plugin'),
                    'type'          => Controls_Manager::WYSIWYG,
                    'label_block'   => true,
                    'placeholder'   => esc_html__('Enter Title', 'aiero_plugin'),
                    'default'       => esc_html__('Title', 'aiero_plugin')
                ]
            );

            $repeater->add_control(
                'heading_tag',
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

            $repeater->add_group_control(
                Group_Control_Typography::get_type(),
                [
                    'name'      => 'heading_typography',
                    'label'     => esc_html__('Heading Typography', 'aiero_plugin'),
                    'selector'  => '{{WRAPPER}} {{CURRENT_ITEM}} .aiero-heading .aiero-heading-content'
                ]
            );

            $repeater->add_control(
                'heading_color',
                [
                    'label'     => esc_html__('Heading Color', 'aiero_plugin'),
                    'type'      => Controls_Manager::COLOR,
                    'default'   => '',
                    'selectors' => [
                        '{{WRAPPER}} {{CURRENT_ITEM}} .aiero-heading .aiero-heading-content' => 'color: {{VALUE}};'
                    ]
                ]
            );

            $repeater->add_control(
                'accent_text_color',
                [
                    'label'     => esc_html__('Text Underline Color', 'aiero_plugin'),
                    'type'      => Controls_Manager::COLOR,
                    'default'   => '',
                    'selectors' => [
                        '{{WRAPPER}} {{CURRENT_ITEM}} .aiero-heading .aiero-heading-content span[style *= "text-decoration: underline"]:before' => 'background-color: {{VALUE}} !important;'
                    ]
                ]
            );

            $repeater->add_group_control(
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
                    'selector'  => '{{WRAPPER}} {{CURRENT_ITEM}} .aiero-heading .aiero-heading-content del'
                ]
            );

            $repeater->add_group_control(
                Group_Control_Text_Shadow::get_type(),
                [
                    'name'      => 'title_shadow',
                    'label'     => esc_html__('Heading Text Shadow', 'aiero_plugin'),
                    'selector'  => '{{WRAPPER}} {{CURRENT_ITEM}} .aiero-heading .aiero-heading-content'
                ]
            );

            $repeater->add_control(
                'add_subtitle',
                [
                    'label'         => esc_html__('Add Subtitle', 'aiero_plugin'),
                    'type'          => Controls_Manager::SWITCHER,
                    'default'       => 'no',
                    'return_value'  => 'yes',
                    'label_off'     => esc_html__('No', 'aiero_plugin'),
                    'label_on'      => esc_html__('Yes', 'aiero_plugin'),
                    'separator'     => 'before'
                ]
            );

            $repeater->add_control(
                'subtitle',
                [
                    'label'         => esc_html__('Subtitle', 'aiero_plugin'),
                    'type'          => Controls_Manager::TEXT,
                    'default'       => '',
                    'placeholder'   => esc_html__( 'Enter Your Subtitle', 'aiero_plugin'),
                    'label_block'   => true,
                    'condition'     => [
                        'add_subtitle'  => 'yes'
                    ]
                ]
            );

            $repeater->add_group_control(
                Group_Control_Typography::get_type(),
                [
                    'name'      => 'subtitle_typography',
                    'label'     => esc_html__('Subheading Typography', 'aiero_plugin'),
                    'selector'  => '{{WRAPPER}} {{CURRENT_ITEM}} .aiero-subheading',
                    'condition' => [
                        'add_subtitle'  => 'yes'
                    ]
                ]
            );

            $repeater->add_control(
                'subtitle_color',
                [
                    'label'     => esc_html__('Subheading Color', 'aiero_plugin'),
                    'type'      => Controls_Manager::COLOR,
                    'default'   => '',
                    'selectors' => [
                        '{{WRAPPER}} {{CURRENT_ITEM}} .aiero-subheading' => '-webkit-text-stroke: 1px {{VALUE}};'
                    ],
                    'condition' => [
                        'add_subtitle'  => 'yes'
                    ]
                ]
            );

            $repeater->add_responsive_control(
                'title_margin',
                [
                    'label' => esc_html__( 'Title Margin', 'aiero_plugin' ),
                    'type' => Controls_Manager::DIMENSIONS,
                    'size_units' => [ 'px', '%', 'em' ],
                    'selectors' => [
                        '{{WRAPPER}} {{CURRENT_ITEM}} .aiero-heading' => 'margin: {{TOP}}{{UNIT}} {{RIGHT}}{{UNIT}} {{BOTTOM}}{{UNIT}} {{LEFT}}{{UNIT}};',
                    ],
                ]
            );

            $repeater->add_control(
                'title_image',
                [
                    'label' => esc_html__('Title Image', 'aiero_plugin'),
                    'type' => Controls_Manager::MEDIA
                ]
            );

            $repeater->add_responsive_control(
                'title_image_max_width',
                [
                    'label'         => esc_html__('Title Image Max Width', 'aiero_plugin'),
                    'type'          => Controls_Manager::SLIDER,
                    'size_units'    => ['px', '%', 'em', 'vw'],
                    'range' => [
                        'px' => [
                            'min' => 0,
                            'max' => 1500,
                            'step' => 1,
                        ],
                        '%' => [
                            'min' => 0,
                            'max' => 100,
                        ],
                    ],
                    'selectors'     => [
                        '{{WRAPPER}} {{CURRENT_ITEM}} .elementor-text-column img'    => 'max-width: {{SIZE}}{{UNIT}};'
                    ]
                ]
            );

            $repeater->add_responsive_control(
                'title_image_margin',
                [
                    'label' => esc_html__('Title Image Margin', 'aiero_plugin'),
                    'type' => Controls_Manager::DIMENSIONS,
                    'size_units' => ['%', 'px'],
                    'selectors' => [
                        '{{WRAPPER}} {{CURRENT_ITEM}} .elementor-text-column img' => 'margin: {{TOP}}{{UNIT}} {{RIGHT}}{{UNIT}} {{BOTTOM}}{{UNIT}} {{LEFT}}{{UNIT}};'
                    ]
                ]
            );

        $repeater->end_controls_tab();

        // ---------------------- //
        // ------ Text Tab ------ //
        // ---------------------- //
        $repeater->start_controls_tab(
            'tab_text',
            [
                'label' => esc_html__('Text', 'aiero_plugin')
            ]
        );

            $repeater->add_control(
                'text',
                [
                    'label'         => esc_html__('Promo Text', 'aiero_plugin'),
                    'type'          => Controls_Manager::WYSIWYG,
                    'default'       => '',
                    'placeholder'   => esc_html__('Enter Promo Text', 'aiero_plugin'),
                    'separator'     => 'before'
                ]
            );

            $repeater->add_group_control(
                Group_Control_Typography::get_type(),
                [
                    'name'      => 'text_typography',
                    'label'     => esc_html__('Text Typography', 'aiero_plugin'),
                    'selector'  => '{{WRAPPER}} {{CURRENT_ITEM}} .content-slider-item-text'
                ]
            );

            $repeater->add_control(
                'text_color',
                [
                    'label'     => esc_html__('Text Color', 'aiero_plugin'),
                    'type'      => Controls_Manager::COLOR,
                    'default'   => '',
                    'selectors' => [
                        '{{WRAPPER}} {{CURRENT_ITEM}} .content-slider-item-text' => 'color: {{VALUE}};'
                    ]
                ]
            );

            $repeater->add_responsive_control(
                'text_padding',
                [
                    'label'         => esc_html__('Text Padding', 'aiero_plugin'),
                    'type'          => Controls_Manager::DIMENSIONS,
                    'size_units'    => ['px', 'em', '%', 'vw'],
                    'selectors'     => [
                        '{{WRAPPER}} {{CURRENT_ITEM}} .content-slider-item-text' => 'padding: {{TOP}}{{UNIT}} {{RIGHT}}{{UNIT}} {{BOTTOM}}{{UNIT}} {{LEFT}}{{UNIT}};'
                    ]
                ]
            );

            $repeater->add_responsive_control(
                'text_margin',
                [
                    'label'         => esc_html__('Text Margin', 'aiero_plugin'),
                    'type'          => Controls_Manager::DIMENSIONS,
                    'size_units'    => ['px', 'em', '%', 'vw'],
                    'selectors'     => [
                        '{{WRAPPER}} {{CURRENT_ITEM}} .aiero-content-wrapper-2' => 'margin: {{TOP}}{{UNIT}} {{RIGHT}}{{UNIT}} {{BOTTOM}}{{UNIT}} {{LEFT}}{{UNIT}};'
                    ]
                ]
            ); 

        $repeater->end_controls_tab();

            // ------------------------- //
            // ------ Buttons Tab ------ //
            // ------------------------- //
            $repeater->start_controls_tab(
                'tab_buttons',
                [
                    'label' => esc_html__('Buttons', 'aiero_plugin')
                ]
            );

                $repeater->add_control(
                    'button_text',
                    [
                        'label'     => esc_html__('Button Text', 'aiero_plugin'),
                        'type'      => Controls_Manager::TEXT,
                        'default'   => esc_html__('Button', 'aiero_plugin'),
                        'separator' => 'before'
                    ]
                );

                $repeater->add_control(
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

                $repeater->add_group_control(
                    Group_Control_Typography::get_type(),
                    [
                        'name'      => 'button_typography',
                        'label'     => esc_html__('Button Typography', 'aiero_plugin'),
                        'selector'  => '{{WRAPPER}} {{CURRENT_ITEM}} .aiero-button'
                    ]
                );

                $repeater->add_control(
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
                    ]
                );

                $repeater->add_control(
                    'button_background_style',
                    [
                        'label' => esc_html__( 'Button Background Style', 'aiero_plugin' ),
                        'type' => Controls_Manager::SELECT,
                        'default' => 'solid',
                        'options' => [
                            'gradient' => esc_html__( 'Gradient', 'aiero_plugin' ),
                            'solid' => esc_html__( 'Solid', 'aiero_plugin' ),
                        ],
                        'prefix_class' => 'aiero-button-bakground-style-',
                    ]
                );
                
                $repeater->add_control(
                    'button_color',
                    [
                        'label'     => esc_html__('Button Color', 'aiero_plugin'),
                        'type'      => Controls_Manager::COLOR,
                        'selectors' => [
                            '{{WRAPPER}} {{CURRENT_ITEM}} .aiero-button' => 'color: {{VALUE}};'
                        ]
                    ]
                );

                $repeater->add_control(
                    'button_border_color',
                    [
                        'label'     => esc_html__('Button Border Color', 'aiero_plugin'),
                        'type'      => Controls_Manager::COLOR,
                        'selectors' => [
                            '{{WRAPPER}} {{CURRENT_ITEM}} .aiero-button' => 'border-color: {{VALUE}};'
                        ],
                        'condition' => [
                            'button_border_style' => 'solid'
                        ]
                    ]
                );

                $repeater->add_group_control(
                    Group_Control_Background::get_type(),
                    [
                        'name' => 'button_border_color_gradient',
                        'fields_options' => [
                            'background' => [
                                'label' => esc_html__( 'Border Color Gradient', 'aiero_plugin' )
                            ]                    
                        ],
                        'types' => [ 'gradient' ],
                        'selector' => '{{WRAPPER}} {{CURRENT_ITEM}} .aiero-button:after',
                        'condition' => [
                            'button_border_style' => 'gradient'
                        ]
                    ]
                );

                $repeater->add_control(
                    'button_background_color',
                    [
                        'label'     => esc_html__('Button Background Color', 'aiero_plugin'),
                        'type'      => Controls_Manager::COLOR,
                        'selectors' => [
                            '{{WRAPPER}} {{CURRENT_ITEM}} .aiero-button' => 'background-color: {{VALUE}};'
                        ],
                        'condition' => [
                            'button_background_style' => 'solid'
                        ]
                    ]
                );

                $repeater->add_group_control(
                    Group_Control_Background::get_type(),
                    [
                        'name' => 'button_bg_color_gradient',
                        'fields_options' => [
                            'background' => [
                                'label' => esc_html__( 'Background Color Gradient', 'aiero_plugin' )
                            ]                    
                        ],
                        'types' => [ 'gradient' ],
                        'selector' => '{{WRAPPER}} {{CURRENT_ITEM}} .aiero-button .button-inner:before',
                        'condition' => [
                            'button_background_style' => 'gradient'
                        ]
                    ]
                );

                $repeater->add_group_control(
                    Group_Control_Box_Shadow::get_type(),
                    [
                        'name' => 'button_box_shadow',
                        'selector' => '{{WRAPPER}} {{CURRENT_ITEM}} .aiero-button',
                        'condition' => [
                            'remove_box_shadow!' => 'yes'
                        ]
                    ]
                );

                $repeater->add_control(
                    'button_color_hover',
                    [
                        'label'     => esc_html__('Button Hover Color', 'aiero_plugin'),
                        'type'      => Controls_Manager::COLOR,
                        'selectors' => [
                            '{{WRAPPER}} {{CURRENT_ITEM}} .aiero-button:hover' => 'color: {{VALUE}};'
                        ]
                    ]
                );

                $repeater->add_control(
                    'button_border_color_hover',
                    [
                        'label'     => esc_html__('Button Hover Border Color', 'aiero_plugin'),
                        'type'      => Controls_Manager::COLOR,
                        'selectors' => [
                            '{{WRAPPER}} {{CURRENT_ITEM}} .aiero-button:hover' => 'border-color: {{VALUE}};'
                        ],
                        'condition' => [
                            'button_border_style' => 'solid'
                        ]
                    ]
                );

                $repeater->add_group_control(
                    Group_Control_Background::get_type(),
                    [
                        'name' => 'button_border_color_gradient_hover',
                        'fields_options' => [
                            'background' => [
                                'label' => esc_html__( 'Button Hover Border Gradient', 'aiero_plugin' )
                            ]                    
                        ],
                        'types' => [ 'gradient' ],
                        'selector' => '{{WRAPPER}} {{CURRENT_ITEM}} .aiero-button:hover:after',
                        'condition' => [
                            'button_border_style' => 'gradient'
                        ]
                    ]
                );

                $repeater->add_control(
                    'button_background_color_hover',
                    [
                        'label'     => esc_html__('Button Hover Background Color', 'aiero_plugin'),
                        'type'      => Controls_Manager::COLOR,
                        'selectors' => [
                            '{{WRAPPER}} {{CURRENT_ITEM}} .aiero-button:hover' => 'background-color: {{VALUE}};'
                        ],
                        'condition' => [
                            'button_background_style' => 'solid'
                        ]
                    ]
                );

                $repeater->add_group_control(
                    Group_Control_Background::get_type(),
                    [
                        'name' => 'button_bg_color_gradient_hover',
                        'fields_options' => [
                            'background' => [
                                'label' => esc_html__( 'Button Hover Background Gradient', 'aiero_plugin' )
                            ]                    
                        ],
                        'types' => [ 'gradient' ],
                        'selector' => '{{WRAPPER}} {{CURRENT_ITEM}} .aiero-button .button-inner:after',
                        'condition' => [
                            'button_background_style' => 'gradient'
                        ]
                    ]
                );

                $repeater->add_group_control(
                    Group_Control_Box_Shadow::get_type(),
                    [
                        'name' => 'button_box_shadow_hover',
                        'selector' => '{{WRAPPER}} {{CURRENT_ITEM}} .aiero-button',
                        'condition' => [
                            'remove_box_shadow!' => 'yes'
                        ]
                    ]
                );

                $repeater->add_control(
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
                            '{{WRAPPER}} {{CURRENT_ITEM}} .aiero-button' => '{{VALUE}}',
                            '{{WRAPPER}} {{CURRENT_ITEM}} .aiero-button:hover' => '{{VALUE}}',
                        ],
                    ]
                );

                $repeater->add_control(
                    'button_border_width',
                    [
                        'label' => esc_html__( 'Border Width', 'aiero_plugin' ),
                        'type' => \Elementor\Controls_Manager::SLIDER,
                        'size_units' => [ 'px', 'em', 'rem'],
                        'selectors' => [
                            '{{WRAPPER}} {{CURRENT_ITEM}} .aiero-button' => 'border-width: {{SIZE}}{{UNIT}};',
                            '{{WRAPPER}} {{CURRENT_ITEM}} .aiero-button' => '--button-border-width: {{SIZE}}{{UNIT}};',                    
                        ],
                    ]
                );

                $repeater->add_control(
                    'button_border_radius',
                    [
                        'label' => esc_html__( 'Border Radius', 'aiero_plugin' ),
                        'type' => \Elementor\Controls_Manager::DIMENSIONS,
                        'size_units' => [ 'px', '%', 'em', 'rem', 'custom' ],
                        'selectors' => [
                            '{{WRAPPER}} {{CURRENT_ITEM}} .aiero-button' => 'border-radius: {{TOP}}{{UNIT}} {{RIGHT}}{{UNIT}} {{BOTTOM}}{{UNIT}} {{LEFT}}{{UNIT}};',
                        ],
                    ]
                );

                $repeater->add_responsive_control(
                    'button_padding',
                    [
                        'label'         => esc_html__('Button Padding', 'aiero_plugin'),
                        'type'          => Controls_Manager::DIMENSIONS,
                        'size_units'    => ['px', '%'],
                        'selectors'     => [
                            '{{WRAPPER}} {{CURRENT_ITEM}} .aiero-button' => 'padding: {{TOP}}{{UNIT}} {{RIGHT}}{{UNIT}} {{BOTTOM}}{{UNIT}} {{LEFT}}{{UNIT}};'
                        ]
                    ]
                );

                $repeater->add_responsive_control(
                    'button_margin',
                    [
                        'label'         => esc_html__('Button Margin', 'aiero_plugin'),
                        'type'          => Controls_Manager::DIMENSIONS,
                        'size_units'    => ['px', '%'],
                        'selectors'     => [
                            '{{WRAPPER}} {{CURRENT_ITEM}} .aiero-button' => 'margin: {{TOP}}{{UNIT}} {{RIGHT}}{{UNIT}} {{BOTTOM}}{{UNIT}} {{LEFT}}{{UNIT}};'
                        ]
                    ]
                );

                $repeater->add_control(
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
		                    '{{WRAPPER}} {{CURRENT_ITEM}} .aiero-button' => 'min-width: {{SIZE}}{{UNIT}};',                  
		                ]
		            ]
		        );

                $repeater->add_responsive_control(
                    'buttons_margin',
                    [
                        'label'         => esc_html__('Buttons Margin', 'aiero_plugin'),
                        'type'          => Controls_Manager::DIMENSIONS,
                        'size_units'    => ['px', '%'],
                        'selectors'     => [
                            '{{WRAPPER}} {{CURRENT_ITEM}} .aiero-content-wrapper-3' => 'margin: {{TOP}}{{UNIT}} {{RIGHT}}{{UNIT}} {{BOTTOM}}{{UNIT}} {{LEFT}}{{UNIT}};'
                        ]
                    ]
                );

                $repeater->add_control(
                    'add_video_button',
                    [
                        'label'         => esc_html__('Add Video Button', 'aiero_plugin'),
                        'type'          => Controls_Manager::SWITCHER,
                        'default'       => 'no',
                        'return_value'  => 'yes',
                        'label_off'     => esc_html__('No', 'aiero_plugin'),
                        'label_on'      => esc_html__('Yes', 'aiero_plugin'),
                        'separator'     => 'before'
                    ]
                );

                $repeater->add_control(
                    'video_button_position',
                    [
                        'label'     => esc_html__( 'Video Button Position', 'aiero_plugin' ),
                        'type'      => Controls_Manager::SELECT,
                        'default'   => 'default',
                        'options'   => [
                            'default'       => esc_html__( 'Default', 'aiero_plugin' ),
                            'separate'      => esc_html__( 'Separate', 'aiero_plugin' ),
                        ],
                        'condition' => [
                            'add_video_button'  => 'yes'
                        ]
                    ]
                );

                $repeater->add_control(
                    'slide_video_button_text',
                    [
                        'label'     => esc_html__('Button Text', 'aiero_plugin'),
                        'type'      => Controls_Manager::TEXT,
                        'default'   => esc_html__('Watch video', 'aiero_plugin'),
                        'separator' => 'before',
                        'condition' => [
                            'add_video_button'  => 'yes'
                        ]
                    ]
                );

                $repeater->add_control(
                    'slide_video_type',
                    [
                        'label'     => esc_html__( 'Source', 'aiero_plugin' ),
                        'type'      => Controls_Manager::SELECT,
                        'default'   => 'youtube',
                        'options'   => [
                            'youtube'       => esc_html__( 'YouTube', 'aiero_plugin' ),
                            'vimeo'         => esc_html__( 'Vimeo', 'aiero_plugin' ),
                            'dailymotion'   => esc_html__( 'Dailymotion', 'aiero_plugin' ),
                            'hosted'        => esc_html__( 'Self Hosted', 'aiero_plugin' )
                        ],
                        'frontend_available' => true,
                        'condition' => [
                            'add_video_button'  => 'yes'
                        ]
                    ]
                );

                $repeater->add_control(
                    'slide_youtube_url',
                    [
                        'label'         => esc_html__( 'Link', 'aiero_plugin' ),
                        'type'          => Controls_Manager::TEXT,
                        'dynamic'       => [
                            'active'        => true,
                            'categories'    => [
                                TagsModule::POST_META_CATEGORY,
                                TagsModule::URL_CATEGORY
                            ]
                        ],
                        'placeholder'   => esc_html__( 'Enter your URL', 'aiero_plugin' ) . ' (YouTube)',
                        'default'       => 'https://www.youtube.com/watch?v=XHOmBV4js_E',
                        'label_block'   => true,
                        'condition'     => [
                            'add_video_button'  => 'yes',
                            'slide_video_type'  => 'youtube'
                        ],
                        'frontend_available' => true
                    ]
                );

                $repeater->add_control(
                    'slide_vimeo_url',
                    [
                        'label'         => esc_html__( 'Link', 'aiero_plugin' ),
                        'type'          => Controls_Manager::TEXT,
                        'dynamic'       => [
                            'active'        => true,
                            'categories'    => [
                                TagsModule::POST_META_CATEGORY,
                                TagsModule::URL_CATEGORY
                            ],
                        ],
                        'placeholder'   => esc_html__( 'Enter your URL', 'aiero_plugin' ) . ' (Vimeo)',
                        'default'       => 'https://vimeo.com/235215203',
                        'label_block'   => true,
                        'condition'     => [
                            'add_video_button'  => 'yes',
                            'slide_video_type'  => 'vimeo'
                        ]
                    ]
                );

                $repeater->add_control(
                    'slide_dailymotion_url',
                    [
                        'label'         => esc_html__( 'Link', 'aiero_plugin' ),
                        'type'          => Controls_Manager::TEXT,
                        'dynamic'       => [
                            'active'        => true,
                            'categories'    => [
                                TagsModule::POST_META_CATEGORY,
                                TagsModule::URL_CATEGORY
                            ],
                        ],
                        'placeholder'   => esc_html__( 'Enter your URL', 'aiero_plugin' ) . ' (Dailymotion)',
                        'default'       => 'https://www.dailymotion.com/video/x6tqhqb',
                        'label_block'   => true,
                        'condition'     => [
                            'add_video_button'  => 'yes',
                            'slide_video_type'  => 'dailymotion'
                        ]
                    ]
                );

                $repeater->add_control(
                    'slide_insert_url',
                    [
                        'label'     => esc_html__( 'External URL', 'aiero_plugin' ),
                        'type'      => Controls_Manager::SWITCHER,
                        'condition' => [
                            'add_video_button'  => 'yes',
                            'slide_video_type'  => 'hosted'
                        ]
                    ]
                );

                $repeater->add_control(
                    'slide_hosted_url',
                    [
                        'label'         => esc_html__( 'Choose File', 'aiero_plugin' ),
                        'type'          => Controls_Manager::MEDIA,
                        'dynamic'       => [
                            'active'        => true,
                            'categories'    => [
                                TagsModule::MEDIA_CATEGORY
                            ],
                        ],
                        'media_type'    => 'video',
                        'condition'     => [
                            'add_video_button'  => 'yes',
                            'slide_video_type'  => 'hosted',
                            'slide_insert_url'  => ''
                        ]
                    ]
                );

                $repeater->add_control(
                    'slide_external_url',
                    [
                        'label'         => esc_html__( 'URL', 'aiero_plugin' ),
                        'type'          => Controls_Manager::URL,
                        'autocomplete'  => false,
                        'options'       => false,
                        'label_block'   => true,
                        'show_label'    => false,
                        'dynamic'       => [
                            'active'        => true,
                            'categories'    => [
                                TagsModule::POST_META_CATEGORY,
                                TagsModule::URL_CATEGORY
                            ]
                        ],
                        'media_type'    => 'video',
                        'placeholder'   => esc_html__( 'Enter your URL', 'aiero_plugin' ),
                        'condition'     => [
                            'add_video_button'  => 'yes',
                            'slide_video_type'  => 'hosted',
                            'slide_insert_url'  => 'yes'
                        ]
                    ]
                );

                $repeater->add_control(
                    'controls',
                    [
                        'label' => esc_html__( 'Player Controls', 'aiero_plugin' ),
                        'type' => Controls_Manager::SWITCHER,
                        'label_off' => esc_html__( 'Hide', 'aiero_plugin' ),
                        'label_on' => esc_html__( 'Show', 'aiero_plugin' ),
                        'default' => 'yes',
                        'condition' => [
                            'add_video_button'  => 'yes',
                            'slide_video_type!' => 'vimeo',
                        ],
                        'frontend_available' => true,
                    ]
                );

                $repeater->add_responsive_control(
                    'video_button_radius',
                    [
                        'label'         => esc_html__('Video Button Border Radius', 'aiero_plugin'),
                        'type'          => Controls_Manager::DIMENSIONS,
                        'size_units'    => ['px', '%'],
                        'selectors'     => [
                            '{{WRAPPER}} {{CURRENT_ITEM}} .aiero-video-button .elementor-custom-embed-play' => 'border-radius: {{TOP}}{{UNIT}} {{RIGHT}}{{UNIT}} {{BOTTOM}}{{UNIT}} {{LEFT}}{{UNIT}};'
                        ],
                        'condition' => [
                            'add_video_button'  => 'yes'
                        ]
                    ]
                );

                $repeater->add_group_control(
                    Group_Control_Typography::get_type(),
                    [
                        'name' => 'video_button_typography',
                        'label' => esc_html__('Video Button Typography', 'aiero_plugin'),
                        'selector' => '{{WRAPPER}} {{CURRENT_ITEM}} .aiero-video-button .aiero_button_text',
                        'condition' => [
                            'add_video_button'  => 'yes'
                        ]
                    ]
                );

                $repeater->add_control(
                    'video_button_color',
                    [
                        'label'     => esc_html__('Video Button Color', 'aiero_plugin'),
                        'type'      => Controls_Manager::COLOR,
                        'default'   => '',
                        'selectors' => [
                            '{{WRAPPER}} {{CURRENT_ITEM}} .aiero-video-button .elementor-custom-embed-play' => 'color: {{VALUE}};'
                        ],
                        'separator' => 'before',
                        'condition' => [
                            'add_video_button'  => 'yes'
                        ]
                    ]
                );

                $repeater->add_group_control(
                    Group_Control_Background::get_type(),
                    [
                        'name'      => 'video_button_bg_color',
                        'label'     => esc_html__('Video Button Background Color', 'aiero_plugin'),
                        'fields_options' => [
                            'background' => [
                                'label' => esc_html__( 'Video Button Background Color', 'aiero_plugin' )
                            ]                    
                        ],
                        'types'     => [ 'classic', 'gradient' ],
                        'selector'  => '{{WRAPPER}} {{CURRENT_ITEM}} .aiero-video-button .elementor-custom-embed-play',
                        'condition' => [
                            'add_video_button'  => 'yes'
                        ]
                    ]
                );

                $repeater->add_control(
                    'video_icon_border_color',
                    [
                        'label' => esc_html__('Video Icon Border Color', 'aiero_plugin'),
                        'type' => Controls_Manager::COLOR,
                        'selectors' => [
                            '{{WRAPPER}} {{CURRENT_ITEM}} .aiero-video-button .icon-play-wrapper:before' => 'border-color: {{VALUE}};'
                        ],
                        'condition' => [
                            'add_video_button'  => 'yes'
                        ]
                    ]
                );

                $repeater->add_control(
                    'slide_video_icon_bg_color',
                    [
                        'label' => esc_html__('Video Icon Background Color', 'aiero_plugin'),
                        'type' => Controls_Manager::COLOR,
                        'selectors' => [
                            '{{WRAPPER}} {{CURRENT_ITEM}} .aiero-video-button .icon-play-wrapper' => 'background-color: {{VALUE}};'
                        ],
                        'condition' => [
                            'add_video_button'  => 'yes'
                        ]
                    ]
                );

                $repeater->add_control(
                    'video_button_hover',
                    [
                        'label'     => esc_html__('Video Button Hover', 'aiero_plugin'),
                        'type'      => Controls_Manager::COLOR,
                        'selectors' => [
                            '{{WRAPPER}} {{CURRENT_ITEM}} .aiero-video-button .elementor-custom-embed-play:hover' => 'color: {{VALUE}};'
                        ],
                        'separator' => 'before',
                        'condition' => [
                            'add_video_button'  => 'yes'
                        ]
                    ]
                );

                $repeater->add_control(
                    'video_button_icon_hover',
                    [
                        'label'     => esc_html__('Video Button Icon Hover', 'aiero_plugin'),
                        'type'      => Controls_Manager::COLOR,
                        'selectors' => [
                            '{{WRAPPER}} {{CURRENT_ITEM}} .aiero-video-button .elementor-custom-embed-play:hover .eicon-play' => 'color: {{VALUE}};'
                        ],
                        'condition' => [
                            'add_video_button'  => 'yes'
                        ]
                    ]
                );

                $repeater->add_group_control(
                    Group_Control_Background::get_type(),
                    [
                        'name'      => 'video_button_bg_hover',
                        'label'     => esc_html__('Video Button Background Hover', 'aiero_plugin'),
                        'fields_options' => [
                            'background' => [
                                'label' => esc_html__( 'Video Button Background Hover', 'aiero_plugin' )
                            ]                    
                        ],
                        'types'     => [ 'classic', 'gradient' ],
                        'selector'  => '{{WRAPPER}} {{CURRENT_ITEM}} .aiero-video-button .elementor-custom-embed-play:hover',
                        'condition' => [
                            'add_video_button'  => 'yes'
                        ]
                    ]
                );

                $repeater->add_control(
                    'video_icon_border_hover',
                    [
                        'label' => esc_html__('Video Icon Border Hover', 'aiero_plugin'),
                        'type' => Controls_Manager::COLOR,
                        'selectors' => [
                            '{{WRAPPER}} {{CURRENT_ITEM}} .aiero-video-button .elementor-custom-embed-play:hover .icon-play-wrapper:before' => 'border-color: {{VALUE}};'
                        ],
                        'condition' => [
                            'add_video_button'  => 'yes'
                        ]
                    ]
                );

                $repeater->add_control(
                    'slide_video_icon_bg_hover',
                    [
                        'label' => esc_html__('Video Icon Background Hover', 'aiero_plugin'),
                        'type' => Controls_Manager::COLOR,
                        'selectors' => [
                            '{{WRAPPER}} {{CURRENT_ITEM}} .aiero-video-button .elementor-custom-embed-play:hover .icon-play-wrapper' => 'background-color: {{VALUE}};'
                        ],
                        'condition' => [
                            'add_video_button'  => 'yes'
                        ]
                    ]
                );

                $repeater->add_responsive_control(
                    'video_button_padding',
                    [
                        'label'         => esc_html__('Video Button Padding', 'aiero_plugin'),
                        'type'          => Controls_Manager::DIMENSIONS,
                        'size_units'    => ['px', '%'],
                        'selectors'     => [
                            '{{WRAPPER}} {{CURRENT_ITEM}} .aiero-video-button .elementor-custom-embed-play' => 'padding: {{LEFT}}{{UNIT}}; padding: {{TOP}}{{UNIT}} {{RIGHT}}{{UNIT}} {{BOTTOM}}{{UNIT}} {{LEFT}}{{UNIT}};',
                        ],
                        'condition' => [
                            'add_video_button'  => 'yes'
                        ]
                    ]
                );

                $repeater->add_responsive_control(
                    'video_button_margin',
                    [
                        'label'         => esc_html__('Video Button Margin', 'aiero_plugin'),
                        'type'          => Controls_Manager::DIMENSIONS,
                        'size_units'    => ['px', '%', 'vw'],
                        'selectors'     => [
                            '{{WRAPPER}} {{CURRENT_ITEM}} .aiero-video-button' => 'margin: {{TOP}}{{UNIT}} {{RIGHT}}{{UNIT}} {{BOTTOM}}{{UNIT}} {{LEFT}}{{UNIT}};'
                        ],
                        'condition' => [
                            'add_video_button'  => 'yes'
                        ]
                    ]
                );

            $repeater->end_controls_tab();

            // ------------------------- //
            // ------ Counter Tab ------ //
            // ------------------------- //
            $repeater->start_controls_tab(
                'tab_counters',
                [
                    'label' => esc_html__('Counter/Video', 'aiero_plugin')
                ]
            );            

            $repeater->add_responsive_control(
                'counter_column_width',
                [
                    'label'         => esc_html__('Counter/Video Column Width', 'aiero_plugin'),
                    'type'          => Controls_Manager::SLIDER,
                    'size_units'    => ['px', '%', 'em', 'vw'],
                    'range' => [
                        'px' => [
                            'min' => 0,
                            'max' => 1500,
                            'step' => 1,
                        ],
                        '%' => [
                            'min' => 0,
                            'max' => 100,
                        ],
                    ],
                    'selectors'     => [
                        '{{WRAPPER}} {{CURRENT_ITEM}} .counter-column'    => 'width: {{SIZE}}{{UNIT}};'
                    ]
                ]
            );

            $repeater->add_responsive_control(
                'counter_column_vertical_align',
                [
                    'label'         => esc_html__('Counter/Video Column Vertical Alignment', 'aiero_plugin'),
                    'type'          => Controls_Manager::CHOOSE,
                    'options'       => [
                        'flex-start'         => [
                            'title'         => esc_html__( 'Top', 'aiero_plugin' ),
                            'icon'          => 'eicon-v-align-top'
                        ],
                        'center'        => [
                            'title'         => esc_html__( 'Center', 'aiero_plugin' ),
                            'icon'          => 'eicon-v-align-middle'
                        ],
                        'flex-end'           => [
                            'title'         => esc_html__( 'Bottom', 'aiero_plugin' ),
                            'icon'          => 'eicon-v-align-bottom'
                        ]
                    ],
                    'selectors' => [
                        '{{WRAPPER}} {{CURRENT_ITEM}} .counter-column' => '-webkit-align-self: {{VALUE}}; -moz-align-self: {{VALUE}}; -ms-align-self: {{VALUE}}; align-self:{{VALUE}};'
                    ]
                ]
            );

            $repeater->add_control(
                'counter_bg_color',
                [
                    'label' => esc_html__( 'Counter/Video Background Color', 'aiero_plugin' ),
                    'type' => Controls_Manager::COLOR,
                    'selectors' => [
                        '{{WRAPPER}} {{CURRENT_ITEM}} .counter-column' => 'background-color: {{VALUE}};',
                    ]
                ]
            );

            $repeater->add_control(
                'counter_filter_blur',
                [
                    'label' => esc_html__( 'Counter/Video Backdrop Blur Filter, px', 'aiero_plugin' ),
                    'type' => Controls_Manager::SLIDER,
                    'range' => [
                        'px' => [
                            'min' => 0,
                            'max' => 25,
                            'step' => 0.1,
                        ],
                    ],
                    'selectors' => [
                        '{{WRAPPER}} {{CURRENT_ITEM}} .counter-column' => 'backdrop-filter: blur( {{SIZE}}px ); -webkit-backdrop-filter: blur( {{SIZE}}px );',
                    ],
                ]            
            );

            $repeater->add_responsive_control(
                'counter_radius',
                [
                    'label'         => esc_html__('Counter/Video Border Radius', 'aiero_plugin'),
                    'type'          => Controls_Manager::DIMENSIONS,
                    'size_units'    => ['px', '%'],
                    'selectors'     => [
                        '{{WRAPPER}} {{CURRENT_ITEM}} .counter-column' => 'border-radius: {{TOP}}{{UNIT}} {{RIGHT}}{{UNIT}} {{BOTTOM}}{{UNIT}} {{LEFT}}{{UNIT}};'
                    ]
                ]
            );

            $repeater->add_responsive_control(
                'counter_padding',
                [
                    'label'         => esc_html__('Counter/Video Padding', 'aiero_plugin'),
                    'type'          => Controls_Manager::DIMENSIONS,
                    'size_units'    => ['px', '%', 'em', 'vw'],
                    'selectors'     => [
                        '{{WRAPPER}} {{CURRENT_ITEM}} .counter-column' => 'padding: {{TOP}}{{UNIT}} {{RIGHT}}{{UNIT}} {{BOTTOM}}{{UNIT}} {{LEFT}}{{UNIT}};'
                    ]
                ]
            );

            $repeater->add_control(
                'show_counter',
                [
                    'label'         => esc_html__('Show counter', 'aiero_plugin'),
                    'type'          => Controls_Manager::SWITCHER,
                    'label_off'     => esc_html__('No', 'aiero_plugin'),
                    'label_on'      => esc_html__('Yes', 'aiero_plugin'),
                    'return_value'  => 'yes',
                    'default'       => ''
                ]
            );

            $repeater->add_responsive_control(
                'counter_align',
                [
                    'label'     => esc_html__('Text Alignment', 'aiero_plugin'),
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
                    'selectors_dictionary' => [
                        'left' => is_rtl() ? 'text-align:left; justify-content: flex-end;' : 'text-align:left; justify-content: flex-start;',
                        'center' => 'text-align:center; justify-content: center;',
                        'right' => is_rtl() ? 'text-align:right; justify-content: flex-start;' : 'text-align:right; justify-content: flex-end;',
                    ],
                    'selectors' => [
                        '{{WRAPPER}} {{CURRENT_ITEM}} .elementor-counter .elementor-counter-title' => '{{VALUE}}',
                        '{{WRAPPER}} {{CURRENT_ITEM}} .elementor-counter .elementor-counter-number-wrapper' => '{{VALUE}}',
                    ],
                    'condition' => [
                        'show_counter' => 'yes'
                    ]
                ]
            );

            $repeater->add_responsive_control(
                'space_between_counters',
                [
                    'label'         => esc_html__('Space Between Title and Number', 'aiero_plugin'),
                    'type'          => Controls_Manager::SLIDER,
                    'size_units'    => ['px', 'em'],
                    'selectors'     => [
                        '{{WRAPPER}} {{CURRENT_ITEM}} .elementor-counter .elementor-counter-title' => 'margin-top: {{SIZE}}{{UNIT}};'
                    ],
                    'condition' => [
                        'show_counter' => 'yes'
                    ]
                ]
            );

            $repeater->add_control(
                'starting_number',
                [
                    'label' => esc_html__( 'Starting Number', 'aiero_plugin' ),
                    'type' => Controls_Manager::NUMBER,
                    'default' => 0,
                    'dynamic' => [
                        'active' => true,
                    ],
                    'condition' => [
                        'show_counter' => 'yes'
                    ]
                ]
            );

            $repeater->add_control(
                'ending_number',
                [
                    'label' => esc_html__( 'Ending Number', 'aiero_plugin' ),
                    'type' => Controls_Manager::NUMBER,
                    'default' => 100,
                    'dynamic' => [
                        'active' => true,
                    ],
                    'condition' => [
                        'show_counter' => 'yes'
                    ]
                ]
            );

            $repeater->add_control(
                'prefix',
                [
                    'label' => esc_html__( 'Number Prefix', 'aiero_plugin' ),
                    'type' => Controls_Manager::TEXT,
                    'dynamic' => [
                        'active' => true,
                    ],
                    'default' => '',
                    'placeholder' => 1,
                    'condition' => [
                        'show_counter' => 'yes'
                    ]
                ]
            );

            $repeater->add_control(
                'suffix',
                [
                    'label' => esc_html__( 'Number Suffix', 'aiero_plugin' ),
                    'type' => Controls_Manager::TEXT,
                    'dynamic' => [
                        'active' => true,
                    ],
                    'default' => '',
                    'placeholder' => esc_html__( 'Plus', 'aiero_plugin' ),
                    'condition' => [
                        'show_counter' => 'yes'
                    ]
                ]
            );

            $repeater->add_control(
                'counter_title',
                [
                    'label' => esc_html__( 'Counter Title', 'aiero_plugin' ),
                    'type' => Controls_Manager::TEXT,
                    'label_block' => true,
                    'dynamic' => [
                        'active' => true,
                    ],
                    'default' => esc_html__( 'Cool Number', 'aiero_plugin' ),
                    'placeholder' => esc_html__( 'Cool Number', 'aiero_plugin' ),
                    'condition' => [
                        'show_counter' => 'yes'
                    ]
                ]
            ); 

            $repeater->add_control(
                'counter_duration',
                [
                    'label' => esc_html__( 'Animation Duration', 'aiero_plugin' ),
                    'type' => Controls_Manager::NUMBER,
                    'default' => 2000,
                    'min' => 100,
                    'step' => 100,
                    'separator' => 'before',
                    'condition' => [
                        'show_counter' => 'yes'
                    ]
                ]
            );

            $repeater->add_control(
                'thousand_separator',
                [
                    'label' => esc_html__( 'Thousand Separator', 'aiero_plugin' ),
                    'type' => Controls_Manager::SWITCHER,
                    'default' => 'yes',
                    'label_on' => esc_html__( 'Show', 'aiero_plugin' ),
                    'label_off' => esc_html__( 'Hide', 'aiero_plugin' ),
                    'condition' => [
                        'show_counter' => 'yes'
                    ]
                ]
            );

            $repeater->add_control(
                'thousand_separator_char',
                [
                    'label' => esc_html__( 'Separator', 'aiero_plugin' ),
                    'type' => Controls_Manager::SELECT,
                    'condition' => [
                        'thousand_separator' => 'yes',
                    ],
                    'options' => [
                        '' => 'Default',
                        '.' => 'Dot',
                        ' ' => 'Space',
                        '_' => 'Underline',
                        "'" => 'Apostrophe',
                    ],
                    'condition' => [
                        'show_counter' => 'yes'
                    ]
                ]
            );            

            $repeater->add_control(
                'number_color',
                [
                    'label' => esc_html__( 'Number Text Color', 'aiero_plugin' ),
                    'type' => Controls_Manager::COLOR,
                    'selectors' => [
                        '{{WRAPPER}} {{CURRENT_ITEM}} .elementor-counter-number-wrapper' => 'color: {{VALUE}};',
                    ],
                    'separator' => 'before',
                    'condition' => [
                        'show_counter' => 'yes'
                    ]
                ]
            );

            $repeater->add_group_control(
                Group_Control_Background::get_type(),
                [
                    'name' => 'number_color_gradient',
                    'fields_options' => [
                        'background' => [
                            'label' => esc_html__( 'Number Text Color Gradient', 'aiero_plugin' )
                        ]                    
                    ],
                    'types' => [ 'gradient' ],
                    'selector' => '{{WRAPPER}} {{CURRENT_ITEM}} .elementor-counter-number-wrapper',
                    'condition' => [
                        'show_counter' => 'yes'
                    ]
                ]
            );

            $repeater->add_group_control(
                Group_Control_Typography::get_type(),
                [
                    'name' => 'typography_number',
                    'label' => esc_html__( 'Counter Number Typography', 'aiero_plugin' ),
                    'selector' => '{{WRAPPER}} {{CURRENT_ITEM}} .elementor-counter .elementor-counter-number-wrapper',
                    'condition' => [
                        'show_counter' => 'yes'
                    ]
                ]
            );

            $repeater->add_control(
                'counter_title_color',
                [
                    'label' => esc_html__( 'Number Title Color', 'aiero_plugin' ),
                    'type' => Controls_Manager::COLOR,
                    'selectors' => [
                        '{{WRAPPER}} {{CURRENT_ITEM}} .elementor-counter-title' => 'color: {{VALUE}};',
                    ],
                    'condition' => [
                        'show_counter' => 'yes'
                    ]
                ]
            );

            $repeater->add_group_control(
                Group_Control_Typography::get_type(),
                [
                    'name' => 'typography_counter_title',
                    'label' => esc_html__( 'Counter Title Typography', 'aiero_plugin' ),
                    'selector' => '{{WRAPPER}} {{CURRENT_ITEM}} .elementor-counter .elementor-counter-title',
                    'condition' => [
                        'show_counter' => 'yes'
                    ]
                ]
            );

            $repeater->end_controls_tab();

        $repeater->end_controls_tabs();

        $repeater->add_control(
            'divider_2',
            [
                'type' => Controls_Manager::DIVIDER
            ]
        );

        $repeater->add_control(
            'add_bottom_section',
            [
                'label'         => esc_html__('Add Bottom Section', 'aiero_plugin'),
                'type'          => Controls_Manager::SWITCHER,
                'default'       => 'no',
                'return_value'  => 'yes',
                'label_off'     => esc_html__('No', 'aiero_plugin'),
                'label_on'      => esc_html__('Yes', 'aiero_plugin')
            ]
        );

        $repeater->start_controls_tabs('bottom_section_settings_tabs');

        // -------------------- //
        // ------ BG Tab ------ //
        // -------------------- //
        $repeater->start_controls_tab(
            'tab_bg_bottom',
            [
                'label' => esc_html__('BG', 'aiero_plugin')
            ]
        );

        $repeater->add_group_control(
            Group_Control_Background::get_type(),
            [
                'name'      => 'bottom_background',
                'label'     => esc_html__( 'Bottom Section Background', 'aiero_plugin' ),
                'fields_options' => [
                    'background' => [
                        'label' => esc_html__( 'Bottom Section Background', 'aiero_plugin' )
                    ]
                ],
                'types'     => [ 'classic', 'gradient' ],
                'selector'  => '{{WRAPPER}} {{CURRENT_ITEM}} .elementor-bottom-column .elementor-inner-section'
            ]
        );

        $repeater->add_responsive_control(
            'bottom_section_border_radius',
            [
                'label' => esc_html__( 'Bottom Section Border Radius', 'aiero_plugin' ),
                'type' => \Elementor\Controls_Manager::DIMENSIONS,
                'size_units' => [ 'px', '%', 'em', 'rem', 'custom' ],
                'selectors' => [
                    '{{WRAPPER}} .elementor-bottom-column .elementor-inner-section' => 'border-radius: {{TOP}}{{UNIT}} {{RIGHT}}{{UNIT}} {{BOTTOM}}{{UNIT}} {{LEFT}}{{UNIT}};',
                ]
            ]
        );

        $repeater->end_controls_tab();

        // ----------------------- //
        // ------ Image Tab ------ //
        // ----------------------- //
        $repeater->start_controls_tab(
            'tab_image_bottom',
            [
                'label' => esc_html__('Image', 'aiero_plugin')
            ]
        );

            $repeater->add_control(
                'bottom_image',
                [
                    'label' => esc_html__('Bottom Image', 'aiero_plugin'),
                    'type' => Controls_Manager::MEDIA
                ]
            );

            $repeater->add_responsive_control(
                'bottom_image_max_width',
                [
                    'label'         => esc_html__('Bottom Image Max Width', 'aiero_plugin'),
                    'type'          => Controls_Manager::SLIDER,
                    'size_units'    => ['px', '%', 'em', 'vw'],
                    'range' => [
                        'px' => [
                            'min' => 0,
                            'max' => 1500,
                            'step' => 1,
                        ],
                        '%' => [
                            'min' => 0,
                            'max' => 100,
                        ],
                    ],
                    'selectors'     => [
                        '{{WRAPPER}} {{CURRENT_ITEM}} .elementor-bottom-column img'    => 'max-width: {{SIZE}}{{UNIT}};'
                    ]
                ]
            );

            $repeater->add_responsive_control(
                'bottom_image_margin',
                [
                    'label' => esc_html__('Bottom Image Margin', 'aiero_plugin'),
                    'type' => Controls_Manager::DIMENSIONS,
                    'size_units' => ['%', 'px'],
                    'selectors' => [
                        '{{WRAPPER}} {{CURRENT_ITEM}} .elementor-bottom-column img' => 'margin: {{TOP}}{{UNIT}} {{RIGHT}}{{UNIT}} {{BOTTOM}}{{UNIT}} {{LEFT}}{{UNIT}};'
                    ]
                ]
            );

        $repeater->end_controls_tab();

        $repeater->end_controls_tabs();

        $this->add_control(
            'content_items',
            [
                'label'         => esc_html__('Slides', 'aiero_plugin'),
                'type'          => Controls_Manager::REPEATER,
                'fields'        => $repeater->get_controls(),
                'title_field'   => '{{{slide_name}}}',
                'prevent_empty' => true,
                'separator'     => 'before'
            ]
        );

        $this->add_control(
            'nav',
            [
                'label'         => esc_html__('Show Navigation Buttons', 'aiero_plugin'),
                'type'          => Controls_Manager::SWITCHER,
                'label_off'     => esc_html__('No', 'aiero_plugin'),
                'label_on'      => esc_html__('Yes', 'aiero_plugin'),
                'return_value'  => 'yes',
                'default'       => 'no',
                'separator'     => 'before'
            ]
        );

        $this->add_control(
            'nav_position',
            [
                'label'     => esc_html__('Navigation Buttons Position', 'aiero_plugin'),
                'type'      => Controls_Manager::SELECT,
                'default'   => '',
                'options'   => [
                    ''          => esc_html__('Split', 'aiero_plugin'),
                    'group'        => esc_html__('Group', 'aiero_plugin'),
                ],
                'separator' => 'before',
                'prefix_class' => 'content-slider-navigation-position-',
                'condition' => [
                    'nav' => 'yes'
                ]
            ]
        );

        $this->add_control(
            'nav_h_position',
            [
                'label'     => esc_html__('Navigation Buttons Alignment', 'aiero_plugin'),
                'type'      => Controls_Manager::SELECT,
                'default'   => 'left',
                'options'   => [
                    'left'          => esc_html__('Left', 'aiero_plugin'),
                    'right'        => esc_html__('Right', 'aiero_plugin'),
                ],
                'prefix_class' => 'content-slider-navigation-alignment-',
                'condition' => [
                    'nav'          => 'yes',
                    'nav_position' => 'group'
                ]
            ]
        );

        $this->add_control(
            'nav_v_position',
            [
                'label'         => esc_html__('Navigation Buttons Vertical Alignment', 'aiero_plugin'),
                'type'          => Controls_Manager::CHOOSE,
                'options'       => [
                    'top'         => [
                        'title'         => esc_html__( 'Top', 'aiero_plugin' ),
                        'icon'          => 'eicon-v-align-top'
                    ],
                    'center'        => [
                        'title'         => esc_html__( 'Center', 'aiero_plugin' ),
                        'icon'          => 'eicon-v-align-middle'
                    ],
                    'bottom'           => [
                        'title'         => esc_html__( 'Bottom', 'aiero_plugin' ),
                        'icon'          => 'eicon-v-align-bottom'
                    ]
                ],
                'selectors_dictionary' => [
                    'top'    => 'top: 60px; bottom: initial;',
                    'center' => 'top: 60px; bottom: 60px;',
                    'bottom' => 'bottom: 60px; top: initial;'
                ],
                'selectors' => [
                    '{{WRAPPER}}.content-slider-navigation-position-group .owl-carousel.owl-theme .owl-nav' => '{{VALUE}}'
                ],
                'condition' => [
                    'nav'          => 'yes',
                    'nav_position' => 'group'
                ]
            ]
        );    

        $this->add_control(
            'dots',
            [
                'label'         => esc_html__('Show Pagination Dots', 'aiero_plugin'),
                'type'          => Controls_Manager::SWITCHER,
                'label_off'     => esc_html__('No', 'aiero_plugin'),
                'label_on'      => esc_html__('Yes', 'aiero_plugin'),
                'return_value'  => 'yes',
                'default'       => 'yes',
                'separator'     => 'before'
            ]
        );

        $this->add_control(
            'speed',
            [
                'label'     => esc_html__('Animation Speed', 'aiero_plugin'),
                'type'      => Controls_Manager::NUMBER,
                'default'   => 600,
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
                'default'   => 5000,
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
                'label' => esc_html__('Pause on Hover', 'aiero_plugin'),
                'type' => Controls_Manager::SELECT,
                'default' => 'yes',
                'options' => [
                    'yes' => esc_html__('Yes', 'aiero_plugin'),
                    'no' => esc_html__('No', 'aiero_plugin'),
                ],
                'condition' => [
                    'autoplay' => 'yes'
                ]
            ]
        );

        $this->end_controls_section();


        // -------------------------------------------- //
        // ---------- Video Preview Settings ---------- //
        // -------------------------------------------- //
        $this->start_controls_section(
            'section_video_settings',
            [
                'label'         => esc_html__('Video Preview Settings', 'aiero_plugin'),
                'tab'           => Controls_Manager::TAB_STYLE,
                'condition'     => [
                    'add_video'     => 'yes'
                ]
            ]
        );

        $this->add_control(
            'video_icon_color',
            [
                'label' => esc_html__('Icon Color', 'aiero_plugin'),
                'type' => Controls_Manager::COLOR,
                'selectors' => [
                    '{{WRAPPER}} .content-slider-video .eicon-play' => 'color: {{VALUE}};'
                ]
            ]
        );

        $this->add_control(
            'video_icon_hover',
            [
                'label' => esc_html__('Icon Hover', 'aiero_plugin'),
                'type' => Controls_Manager::COLOR,
                'selectors' => [
                    '{{WRAPPER}} .content-slider-video .elementor-custom-embed-play:hover .eicon-play' => 'color: {{VALUE}};'
                ]
            ]
        );

        $this->add_control(
            'video_icon_border_color',
            [
                'label' => esc_html__('Icon Border Color', 'aiero_plugin'),
                'type' => Controls_Manager::COLOR,
                'selectors' => [
                    '{{WRAPPER}} .content-slider-video .icon-play-wrapper:before' => 'border-color: {{VALUE}};'
                ]
            ]
        );

        $this->add_control(
            'video_icon_border_hover',
            [
                'label' => esc_html__('Icon Border Hover Color', 'aiero_plugin'),
                'type' => Controls_Manager::COLOR,
                'selectors' => [
                    '{{WRAPPER}} .content-slider-video .elementor-custom-embed-play:hover .icon-play-wrapper:before' => 'border-color: {{VALUE}};'
                ]
            ]
        );

        $this->add_control(
            'video_icon_bg_color',
            [
                'label' => esc_html__('Icon Background Color', 'aiero_plugin'),
                'type' => Controls_Manager::COLOR,
                'selectors' => [
                    '{{WRAPPER}} .content-slider-video .icon-play-wrapper' => 'background-color: {{VALUE}};'
                ]
            ]
        );

        $this->add_control(
            'video_icon_bg_hover',
            [
                'label' => esc_html__('Icon Background Hover Color', 'aiero_plugin'),
                'type' => Controls_Manager::COLOR,
                'selectors' => [
                    '{{WRAPPER}} .content-slider-video .elementor-custom-embed-play:hover .icon-play-wrapper' => 'background-color: {{VALUE}};'
                ]
            ]
        );

        $this->add_control(
            'video_button_bg_color',
            [   
                'label' => esc_html__('Button Background Color', 'aiero_plugin'),
                'type' => Controls_Manager::COLOR,
                'selectors' => [
                    '{{WRAPPER}} .content-slider-video .elementor-custom-embed-play' => 'background-color: {{VALUE}};',
                    '{{WRAPPER}} .content-slider-video .elementor-custom-embed-image-overlay:before, {{WRAPPER}} .content-slider-video .elementor-custom-embed-image-overlay:after' => 'box-shadow: 0 20px 0 0 {{VALUE}};'
                ]
            ]
        );

        $this->add_group_control(
            Group_Control_Typography::get_type(),
            [
                'name' => 'button_typography',
                'label' => esc_html__('Button Text Typography', 'aiero_plugin'),
                'selector' => '{{WRAPPER}} .content-slider-video .aiero_button_text'
            ]
        );        

        $this->add_control(
            'button_text_color',
            [
                'label' => esc_html__('Button Text Color', 'aiero_plugin'),
                'type' => Controls_Manager::COLOR,
                'selectors' => [
                    '{{WRAPPER}} .content-slider-video .aiero_button_text' => 'color: {{VALUE}};'
                ]
            ]
        );

        $this->add_control(
            'button_text_hover',
            [
                'label' => esc_html__('Button Text Hover', 'aiero_plugin'),
                'type' => Controls_Manager::COLOR,
                'selectors' => [
                    '{{WRAPPER}} .content-slider-video .elementor-custom-embed-play:hover .aiero_button_text' => 'color: {{VALUE}};'
                ]
            ]
        );

        $this->add_responsive_control(
            'button_text_margin',
            [
                'label'         => esc_html__('Button Text Margin', 'aiero_plugin'),
                'type'          => Controls_Manager::DIMENSIONS,
                'size_units'    => ['px', '%'],
                'selectors'     => [
                    '{{WRAPPER}} .content-slider-video .aiero_button_text' => 'margin: {{TOP}}{{UNIT}} {{RIGHT}}{{UNIT}} {{BOTTOM}}{{UNIT}} {{LEFT}}{{UNIT}};'
                ]
            ]
        );

        $this->add_responsive_control(
            'video_button_padding',
            [
                'label'         => esc_html__('Button Padding', 'aiero_plugin'),
                'type'          => Controls_Manager::DIMENSIONS,
                'size_units'    => ['px', '%'],
                'selectors'     => [
                    '{{WRAPPER}} .content-slider-video .elementor-custom-embed-play' => 'padding: {{TOP}}{{UNIT}} {{RIGHT}}{{UNIT}} {{BOTTOM}}{{UNIT}} {{LEFT}}{{UNIT}};'
                ]
            ]
        );

        $this->end_controls_section();        

        // ----------------------------------------- //
        // ---------- Slider Nav Settings ---------- //
        // ----------------------------------------- //
        $this->start_controls_section(
            'section_slider_settings',
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
                        ]
                    ]
                ]
            ]
        );

        $this->add_control(
            'pagination_title',
            [
                'label' => esc_html__( 'Slider Pagination', 'aiero_plugin' ),
                'type'  => Controls_Manager::HEADING,
                'condition' => [
                    'dots'      => 'yes'
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
                        'default'   => '',
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
                        'default'   => '',
                        'selectors' => [
                            '{{WRAPPER}} .owl-dots .owl-dot.active span' => 'color: {{VALUE}};'
                        ]
                    ]
                );

            $this->end_controls_tab();

        $this->end_controls_tabs();

        $this->add_control(
            'separator_arrows',
            [
                'type' => Controls_Manager::DIVIDER,
            ]
        );

        $this->add_control(
            'arrows_title',
            [
                'label' => esc_html__( 'Slider Navigation', 'aiero_plugin' ),
                'type'  => Controls_Manager::HEADING,
                'condition' => [
                    'nav'       => 'yes'
                ]
            ]
        );

        $this->add_control(
            'nav_bg',
            [
                'label'     => esc_html__('Navigation Buttons Background', 'aiero_plugin'),
                'type'      => Controls_Manager::COLOR,
                'default'   => '',
                'alpha'     => false,
                'selectors' => [
                    '{{WRAPPER}} .owl-theme .owl-nav [class*="owl-"]' => 'background-color: {{VALUE}};',
                    '{{WRAPPER}} .bottom-area .owl-nav' => 'background-color: {{VALUE}};',
                    '{{WRAPPER}} .owl-theme .owl-nav [class*="owl-"]:before' => 'box-shadow: 0 20px 0 0 {{VALUE}};',
                    '{{WRAPPER}} .owl-theme .owl-nav [class*="owl-"]:after' => 'box-shadow: 0 -20px 0 0 {{VALUE}};'
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
                        'label'     => esc_html__('Navigation Buttons Color', 'aiero_plugin'),
                        'type'      => Controls_Manager::COLOR,
                        'default'   => '',
                        'selectors' => [
                            '{{WRAPPER}} .owl-theme .owl-nav [class*="owl-"], {{WRAPPER}} .owl-theme .owl-nav [class*="owl-"].disabled:hover' => 'color: {{VALUE}};'
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
                        'label'     => esc_html__('Navigation Buttons Color', 'aiero_plugin'),
                        'type'      => Controls_Manager::COLOR,
                        'default'   => '',
                        'selectors' => [
                            '{{WRAPPER}} .owl-theme .owl-nav [class*="owl-"]:not(.disabled):hover' => 'color: {{VALUE}};'
                        ]
                    ]
                );

            $this->end_controls_tab();

        $this->end_controls_tabs();

        $this->end_controls_section();
    }

    protected function render() {
        $settings               = $this->get_settings();

        $add_video              = $settings['add_video'];
        $video_type             = $settings['video_type'];
        $youtube_url            = $settings['youtube_url'];
        $vimeo_url              = $settings['vimeo_url'];
        $dailymotion_url        = $settings['dailymotion_url'];
        $insert_url             = $settings['insert_url'];
        $hosted_url             = $settings['hosted_url'];
        $external_url           = $settings['external_url'];
        $video_button_text      = $settings['video_button_text'];
        $nav_position           = $settings['nav_position'];

        $content_items          = $settings['content_items'];
        $widget_id              = $this->get_id();

        $nav_container_desktop = false;
        $nav_container_mobile  = ( !empty($widget_id) && $nav_position === 'group' ? '.owl-nav-mobile.owl-nav-' . esc_attr($widget_id) : $nav_container_desktop );

        $slider_options         = [
            'items'                 => 1,
            'nav'                   => ('yes' === $settings['nav']),
            'navText'               => ['<span class="nav-button-inner"></span>', '<span class="nav-button-inner"></span>'],
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
            'navContainer'          => $nav_container_desktop,
            'navContainerMobile'    => $nav_container_mobile,
            'animateOut'            => 'fadeOut'
        ];

        // ------------------------------------ //
        // ---------- Widget Content ---------- //
        // ------------------------------------ //
        ?>

        <div class="aiero-content-slider-widget">
            <div class="content-slider-wrapper">

                <div class="content-slider-container">
                    <div class="content-slider owl-carousel owl-theme" data-slider-options="<?php echo esc_attr(wp_json_encode($slider_options)); ?>">
                        <?php

                        foreach ($content_items as $slide) {
                        	$add_video_button           = $slide['add_video_button'];
                            $video_button_position      = $slide['video_button_position'];
                            $slide_video_button_text    = $slide['slide_video_button_text'];
                            $slide_video_type           = $slide['slide_video_type'];
                            $slide_youtube_url          = $slide['slide_youtube_url'];
                            $slide_vimeo_url            = $slide['slide_vimeo_url'];
                            $slide_dailymotion_url      = $slide['slide_dailymotion_url'];
                            $slide_insert_url           = $slide['slide_insert_url'];
                            $slide_hosted_url           = $slide['slide_hosted_url'];
                            $slide_external_url         = $slide['slide_external_url'];
                            $show_counter               = $slide['show_counter'];

                            $slide_settings = [
                                'video_type' => $slide_video_type,
                                'youtube_url' => $slide_youtube_url,
                                'vimeo_url' => $slide_vimeo_url,
                                'dailymotion_url' => $slide_dailymotion_url,
                                'insert_url' => $slide_insert_url,
                                'hosted_url' => $slide_hosted_url,
                                'external_url' => $slide_external_url,
                                'controls' => $slide['controls']
                            ];  

                        	$show_video_button = ( $add_video_button == 'yes' && (
                                ( $slide_video_type == 'youtube' && !empty($slide_youtube_url) ) ||
                                ( $slide_video_type == 'vimeo' && !empty($slide_vimeo_url) ) ||
                                ( $slide_video_type == 'dailymotion' && !empty($slide_dailymotion_url) ) ||
                                ( $slide_video_type == 'hosted' && (
                                    !empty($slide_insert_url) ||
                                    !empty($slide_hosted_url) ||
                                    !empty($slide_external_url)
                                ) )
                            ) );

                            $item_classes = 'content-item slider-item';
                            $item_classes .= ' elementor-repeater-item-' . esc_attr($slide['_id']);
                            $item_classes .= ($slide['reverse_columns'] == 'yes' ? ' reverse-columns' : '');
                            $item_classes .= ($slide['text_column_stretch'] == 'yes' ? ' stretch-text-column' : '');
                            $item_classes .= ' aiero-button-border-style-' . esc_attr($slide['button_border_style']);
                            $item_classes .= ' aiero-button-bakground-style-' . esc_attr($slide['button_background_style']);
                            $item_classes .= (($show_video_button && $video_button_position == 'separate') || $show_counter === 'yes' ? ' with-counter-column' : '');

                            $container_class = ($slide['text_column_stretch'] == 'yes' ? 'elementor-column-gap-no' : 'elementor-column-gap-wide');                   

                            echo '<div class="' . esc_attr($item_classes) . '">';

                            	if ( isset($slide['background_background']) && 'video' === $slide['background_background'] ) :
                                    if ( $slide['background_video_link'] ) :
                                        $video_properties = Embed::get_video_properties( $slide['background_video_link'] );

                                        $this->add_render_attribute( 'background-video-container', 'class', 'elementor-background-video-container' );

                                        if ( ! $slide['background_play_on_mobile'] ) {
                                            $this->add_render_attribute( 'background-video-container', 'class', 'elementor-hidden-phone' );
                                        }
                                        ?>
                                        <div <?php $this->print_render_attribute_string( 'background-video-container' ); ?>>
                                            <?php if ( $video_properties ) : ?>
                                                    <?php
                                                        $slide_video_settings = [
                                                            'autoplay' => true,
                                                            'play_on_mobile' => $slide['background_play_on_mobile'],
                                                            'play_once' => ('yes' === $slide['background_play_once']),
                                                            'video_url' => $slide['background_video_link'],
                                                            'start' => $slide['background_video_start'],
                                                            'end' => $slide['background_video_end']
                                                        ];
                                                        $embed_params = $this->get_bg_video_embed_params($slide_video_settings);
                                                        $embed_options = $this->get_bg_video_embed_options([
                                                            'yt_privacy' => $slide['background_privacy_mode']
                                                        ]);
                                                        $video_html = Embed::get_embed_html( $slide['background_video_link'], $embed_params, $embed_options);
                                                        Utils::print_unescaped_internal_string( $video_html );
                                                    ?>
                                                <?php

                                            else :
                                                $video_tag_attributes = 'autoplay muted playsinline';
                                                if ( 'yes' !== $slide['background_play_once'] ) :
                                                    $video_tag_attributes .= ' loop';
                                                endif;
                                                ?>
                                                <video class="elementor-background-video-hosted elementor-html5-video" <?php
                                                    echo $video_tag_attributes; // phpcs:ignore WordPress.Security.EscapeOutput.OutputNotEscaped
                                                ?>>
                                                	<source src="<?php esc_attr_e($slide['background_video_link'])?>">
                                                </video>
                                            <?php endif; ?>
                                        </div>
                                        <?php
                                    endif;
                                endif;

                                echo '<div class="elementor-section elementor-top-section elementor-section-full_width">';
                                    echo '<div class="elementor-container elementor-column-gap-no">';
                                        echo '<div class="elementor-row">';
                                            echo '<div class="elementor-column elementor-col-100 elementor-text-column">';
                                                echo '<div class="elementor-widget-wrap elementor-element-populated">';
                                                    echo '<section class="elementor-section elementor-inner-section elementor-section-' . esc_attr($slide['text_content_width']) . ' elementor-element">';
                                                        echo '<div class="elementor-container ' . esc_attr($container_class) . '">';
                                                            echo '<div class="elementor-row">';
                                                                echo '<div class="slide-content-column">';

                                                                    if ( !empty($slide['heading']) && 'yes' !== $slide['show_title_separately'] ||
                                                                		(!empty($slide['title_image']['id']) && 'yes' !== $slide['show_title_separately'])
                                                                		) {
                                                                        $accent_bg_color_color = $slide['accent_bg_color_color'];
                                                                        $accent_bg_color_color_b = $slide['accent_bg_color_color_b'];

                                                                        $content_class = ( !empty($slide['accent_bg_color_background']) && !empty($accent_bg_color_color)&& !empty($accent_bg_color_color_b) ? ' has_gradient_color_text' : '');
                                                                        echo '<div class="aiero-content-wrapper-1">';
                                                                        	if ( !empty($slide['title_image']['id']) ) {
	                                                                            echo '<div class="title-image">' .
	                                                                            	wp_get_attachment_image( $slide['title_image']['id'], 'full' ) . '</div>';
		                                                                    }
                                                                            echo '<' . esc_html($slide['heading_tag']) . ' class="aiero-heading content-slider-item-heading">';
                                                                                if ( $slide['add_subtitle'] == 'yes' && !empty($slide['subtitle']) ) {
                                                                                    echo '<span class="aiero-subheading"><span class="aiero-subheading-inner">' . esc_html($slide['subtitle']) . '</span></span>';
                                                                                }
                                                                                echo '<span class="aiero-heading-content' . esc_attr($content_class) . '">';
                                                                                    echo wp_kses($slide['heading'], array(
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
                                                                            echo '</' . esc_html($slide['heading_tag']) . '>';
                                                                        echo '</div>';
                                                                    }

                                                                    if ( !empty($slide['text']) ) {
                                                                        echo '<div class="aiero-content-wrapper-2">';
                                                                            echo '<div class="content-slider-item-text">' . wp_kses_post($slide['text']) . '</div>';
                                                                        echo '</div>';
                                                                    }

                                                                    if (
                                                                        !empty($slide['button_text']) ||
                                                                        (
                                                                            $show_video_button && 
                                                                            $video_button_position == 'default'
                                                                        )
                                                                    ) {
                                                                        echo '<div class="aiero-content-wrapper-3">';
                                                                            echo '<div class="content-slider-item-buttons">';

                                                                                if ( !empty($slide['button_text']) ) {
                                                                                    if ( !empty($slide['button_link']['url']) ) {
                                                                                        $button_url = $slide['button_link']['url'];
                                                                                    } else {
                                                                                        $button_url = '#';
                                                                                    }
                                                                                    echo '<a class="aiero-button" href="' . esc_url($button_url) . '"' . (($slide['button_link']['is_external'] == true) ? ' target="_blank"' : '') . (($slide['button_link']['nofollow'] == 'on') ? ' rel="nofollow"' : '') . '>';
                                                                                        echo esc_html($slide['button_text']);
                                                                                        echo '<span class="icon-button-arrow"></span></span><span class="button-inner"></span>';
                                                                                    echo '</a>';
                                                                                } 

                                                                                if ( 
                                                                                    $show_video_button && 
                                                                            		$video_button_position == 'default'
                                                                                ) {
                                                                                	$this->render_slide_video_button($slide, $slide_settings);
                                                                                }
                                                                            echo '</div>';
                                                                        echo '</div>';
                                                                    }
                                                                echo '</div>';
                                                                if ( (!empty($slide['heading']) && 'yes' === $slide['show_title_separately']) ||
                                                                	(!empty($slide['title_image']['id']) && 'yes' === $slide['show_title_separately'])
                                                            		) {
                                                                    $accent_bg_color_color = $slide['accent_bg_color_color'];
                                                                    $accent_bg_color_color_b = $slide['accent_bg_color_color_b'];

                                                                    $content_class = ( !empty($slide['accent_bg_color_background']) && !empty($accent_bg_color_color) && !empty($accent_bg_color_color_b) ? ' has_gradient_color_text' : '');
                                                                    echo '<div class="title-column">';
                                                                        echo '<div class="aiero-content-wrapper-1">';
                                                                        	if ( !empty($slide['title_image']['id']) ) {
	                                                                            echo '<div class="title-image">' .
	                                                                            wp_get_attachment_image( $slide['title_image']['id'], 'full' ) . '</div>';
		                                                                    }
                                                                            echo '<' . esc_html($slide['heading_tag']) . ' class="aiero-heading content-slider-item-heading">';
                                                                                if ( $slide['add_subtitle'] == 'yes' && !empty($slide['subtitle']) ) {
                                                                                    echo '<span class="aiero-subheading"><span class="aiero-subheading-inner">' . esc_html($slide['subtitle']) . '</span></span>';
                                                                                }
                                                                                echo '<span class="aiero-heading-content' . esc_attr($content_class) . '">';
                                                                                    echo wp_kses($slide['heading'], array(
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
                                                                            echo '</' . esc_html($slide['heading_tag']) . '>';
                                                                        echo '</div>';
                                                                    echo '</div>';
                                                                }

                                                                if( $show_counter === 'yes' || 
                                                                (
                                                                	$show_video_button && 
                                                                    $video_button_position == 'separate'
                                                                ) ) {
                                                                    echo '<div class="counter-column aiero-content-wrapper-5">';

                                                                    	if( $show_video_button && 
                                                                			$video_button_position == 'separate'
                                                                		) {
                                                                    		$this->render_slide_video_button($slide, $slide_settings);
		                                                                }
                                                                    	if( $show_counter === 'yes' ) {
                                                                    		$this->add_render_attribute( "counter_{$slide['_id']}", [
                                                                                'class' => 'elementor-counter-number',
                                                                                'data-duration' => $slide['counter_duration'],
                                                                                'data-to-value' => $slide["ending_number"],
                                                                                'data-from-value' => $slide["starting_number"],
                                                                            ] );

                                                                            if ( ! empty( $slide['thousand_separator'] ) ) {
                                                                                $delimiter = empty( $slide['thousand_separator_char'] ) ? ',' : $slide['thousand_separator_char'];
                                                                                $this->add_render_attribute( "counter_{$slide['_id']}", 'data-delimiter', $delimiter );
                                                                            }

                                                                            $this->add_render_attribute( 'counter-title', 'class', 'elementor-counter-title' );

                                                                            $this->add_inline_editing_attributes( 'counter-title' );
                                                                            ?>
                                                                            <div id="<?php esc_attr_e('elementor-counter-' . $slide['_id'])?>" class="elementor-counter">
                                                                                <div class="elementor-counter-number-wrapper">
                                                                                    <span class="elementor-counter-number-prefix"><?php echo esc_html($slide["prefix"]);?></span>
                                                                                    <span <?php $this->print_render_attribute_string("counter_{$slide['_id']}"); ?>><?php echo esc_html($slide["starting_number"]);?></span>
                                                                                    <span class="elementor-counter-number-suffix"><?php echo esc_html($slide["suffix"]);?></span>
                                                                                </div>
                                                                                <?php if ( $slide["counter_title"] ) : ?>
                                                                                    <div <?php $this->print_render_attribute_string( 'counter-title' ); ?>><?php echo wp_kses($slide["counter_title"], array('br' => array()) );?></div>
                                                                                <?php endif; ?>
                                                                            </div>
                                                                        <?php }
                                                                    echo '</div>';
                                                                }
                                                            echo '</div>';
                                                        echo '</div>';
                                                    echo '</section>';
                                                echo '</div>';
                                            echo '</div>';
                                            if ( $slide['add_bottom_section'] === 'yes' ) {
                                                echo '<div class="elementor-column elementor-col-100 elementor-bottom-column">';
                                                    echo '<div class="elementor-widget-wrap elementor-element-populated">';
                                                        echo '<section class="elementor-section elementor-inner-section elementor-section-' . esc_attr($slide['bottom_content_width']) . ' elementor-element">';
                                                            echo '<div class="elementor-container elementor-column-gap-wide">';
                                                                echo '<div class="elementor-row">';
                                                                    if ( !empty($slide['bottom_image']) ) {
                                                                        echo '<div class="slide-image-column">';
                                                                            echo '<div class="bottom-image aiero-content-wrapper-4">' .
                                                                            wp_get_attachment_image( $slide['bottom_image']['id'], 'full' ) . '</div>';
                                                                        echo '</div>';
                                                                    }
                                                                echo '</div>';
                                                            echo '</div>';
                                                        echo '</section>';
                                                    echo '</div>';
                                                echo '</div>';
                                            }
                                        echo '</div>';
                                    echo '</div>';
                                echo '</div>';
                            echo '</div>';
                        }
                        ?>
                    </div>
                    <?php
                        if (                            
                            $settings['dots'] == 'yes' ||
                            ( $settings['nav'] == 'yes' && $nav_position === 'group' ) ||
                            (
                                $add_video == 'yes' && (
                                    ( $video_type == 'youtube' && !empty($youtube_url) ) ||
                                    ( $video_type == 'vimeo' && !empty($vimeo_url) ) ||
                                    ( $video_type == 'dailymotion' && !empty($dailymotion_url) ) ||
                                    ( $video_type == 'hosted' && (
                                            !empty($insert_url) ||
                                            !empty($hosted_url) ||
                                            !empty($external_url)
                                        ) )
                                )
                            )
                        ) {
                            echo '<div class="bottom-area">';
                            if ( $settings['nav'] == 'yes' && $nav_position === 'group' ) {
                                echo '<div class="owl-nav owl-nav-mobile' . (!empty($widget_id) ? ' owl-nav-' . esc_attr($widget_id) : '') . '"></div>';
                            }
                            if ( $add_video == 'yes' && (
                                    ( $video_type == 'youtube' && !empty($youtube_url) ) ||
                                    ( $video_type == 'vimeo' && !empty($vimeo_url) ) ||
                                    ( $video_type == 'dailymotion' && !empty($dailymotion_url) ) ||
                                    ( $video_type == 'hosted' && (
                                            !empty($insert_url) ||
                                            !empty($hosted_url) ||
                                            !empty($external_url)
                                        ) )
                                ) ) {
                                $video_url = $settings[ $settings['video_type'] . '_url' ];

                                if ( 'hosted' === $settings['video_type'] ) {
                                    $video_url = $this->get_hosted_video_url();
                                } else {
                                    $embed_params = $this->get_embed_params();
                                    $embed_options = $this->get_embed_options();
                                }

                                $this->add_render_attribute( 'video-wrapper', 'class', 'elementor-wrapper' );
                                $this->add_render_attribute( 'video-wrapper', 'class', 'elementor-open-lightbox' );
                                ?>
                                <div class="content-slider-video">
                                    <div <?php $this->print_render_attribute_string( 'video-wrapper' ); ?>>
                                    <?php
                                        $this->add_render_attribute( 'image-overlay', 'class', 'elementor-custom-embed-image-overlay' );

                                        if ( 'hosted' === $settings['video_type'] ) {
                                            $lightbox_url = $video_url;
                                        } else {
                                            $lightbox_url = \Elementor\Embed::get_embed_url( $video_url, $embed_params, $embed_options );
                                        }

                                        $lightbox_options = [
                                            'type'          => 'video',
                                            'videoType'     => $settings['video_type'],
                                            'url'           => $lightbox_url,
                                            'modalOptions'  => [
                                                'id'                        => 'elementor-lightbox-' . $this->get_id(),
                                                'videoAspectRatio'          => '169'
                                            ],
                                        ];

                                        if('hosted' === $settings['video_type']) {
                                            $lightbox_options['videoParams'] = $this->get_hosted_params();
                                        }

                                        $this->add_render_attribute( 'image-overlay', [
                                            'data-elementor-open-lightbox'  => 'yes',
                                            'data-elementor-lightbox'       => wp_json_encode( $lightbox_options ),
                                        ] );

                                            $this->add_render_attribute( 'image-overlay', [
                                                'class' => 'elementor-clickable',
                                            ] );

                                        ?>
                                        <div <?php $this->print_render_attribute_string( 'image-overlay' ); ?>>
                                            <div class="elementor-custom-embed-play" role="button">
                                                <div class="icon-play-wrapper">
                                                    <i class="eicon-play" aria-hidden="true"></i>
                                                </div>
                                                <?php
                                                    if ($video_button_text !== '') {
                                                        ?>
                                                        <span class="aiero_button_text"><?php echo esc_html($video_button_text); ?></span>
                                                        <?php
                                                    }                                        
                                                ?>
                                                <span class="elementor-screen-only"><?php echo ($video_button_text !== '' ? esc_html($video_button_text) : esc_html__('Watch video', 'aiero_plugin')); ?></span>
                                            </div>
                                        </div>
                                    </div>
                                </div>

                                <?php
                            }
                            if ( $settings['dots'] == 'yes' ) {
                                echo '<div class="owl-dots' . (!empty($widget_id) ? ' owl-dots-' . esc_attr($widget_id) : '') . '"></div>';
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

    public function render_plain_content() {
        $settings = $this->get_settings_for_display();
        if ( 'hosted' !== $settings['video_type'] ) {
            $url = $settings[ $settings['video_type'] . '_url' ];
        } else {
            $url = $this->get_hosted_video_url();
        }
        echo esc_url( $url );
    }

    private function get_embed_video_type($url) {
        if (strpos($url, 'youtube') > 0) {
            return 'youtube';
        } elseif (strpos($url, 'vimeo') > 0) {
            return 'vimeo';
        } else {
            return '';
        }
    }

    public function render_slide_video_button($slide, $slide_settings) {

        $slide_video_type = $slide['slide_video_type'];
        $slide_video_button_text = $slide['slide_video_button_text'];
	    $slide_video_url = $slide[ 'slide_' . $slide_video_type . '_url' ];

	    if ( 'hosted' === $slide_video_type ) {
	        $slide_video_url = $this->get_hosted_video_url($slide_settings);
	    } else {
	        $slide_embed_params = $this->get_embed_params($slide_settings);
	        $slide_embed_options = $this->get_embed_options($slide_settings);
	    }
	    $this->add_render_attribute( 'video-wrapper', 'class', 'elementor-wrapper' );
	    $this->add_render_attribute( 'video-wrapper', 'class', 'elementor-open-lightbox' );

	    echo '<div class="aiero-video-button">';
	    ?>
	        <span <?php $this->print_render_attribute_string( 'video-wrapper' ); ?>>
	            <?php
                    if ( 'hosted' === $slide_video_type ) {
                        $slide_lightbox_url = $slide_video_url;
                    } else {
                        $slide_lightbox_url = \Elementor\Embed::get_embed_url( $slide_video_url, $slide_embed_params, $slide_embed_options );
                    }

                    $slide_lightbox_options = [
                        'type'          => 'video',
                        'videoType'     => $slide_video_type,
                        'url'           => $slide_lightbox_url,
                        'modalOptions'  => [
                            'id'                        => 'elementor-lightbox-' . esc_attr($slide['_id'] . '-column'),
                            'videoAspectRatio'          => '169'
                        ],
                    ];
                    if('hosted' === $slide_video_type) {
                        $slide_lightbox_options['videoParams'] = $this->get_hosted_params($slide_settings);
                    }
                    $overlay_attr = 'image-overlay' . esc_attr($slide['_id'] . '-column');
                    $this->add_render_attribute( $overlay_attr, [
                        'data-elementor-open-lightbox'  => 'yes',
                        'data-elementor-lightbox'       => wp_json_encode( $slide_lightbox_options ),
                    ] );

                    if ( \Elementor\Plugin::$instance->editor->is_edit_mode() ) {
                        $this->add_render_attribute( $overlay_attr, [
                            'class' => 'elementor-clickable',
                        ] );
                    }

                    ?> <span <?php $this->print_render_attribute_string( $overlay_attr ); ?>>
                    <span class="elementor-custom-embed-play" role="button">      
                        <span class="icon-play-wrapper">
                            <i class="eicon-play" aria-hidden="true"></i>
                        </span>
                        <?php
                            if ($slide_video_button_text !== '') {
                                ?>
                                <span class="aiero_button_text"><?php echo esc_html($slide_video_button_text); ?></span>
                                <?php
                            }                                        
                        ?>
                        <span class="elementor-screen-only"><?php echo ($slide_video_button_text !== '' ? esc_html($slide_video_button_text) : esc_html__('Watch video', 'aiero_plugin')); ?></span>
                    </span>
                 </span><?php
	            ?>
	        </span>
	    <?php
	    echo '</div>';
    }

    public function get_embed_params($slide_settings = null) {
        $settings = $this->get_settings_for_display();
        if($slide_settings) {
            $settings = array_merge($settings, $slide_settings);
        }
        $params = [];
        $params_dictionary = [];
        if ( 'youtube' === $settings['video_type'] ) {
            $params_dictionary = [];
            $params['wmode'] = 'opaque';
        } elseif ( 'vimeo' === $settings['video_type'] ) {
            $params['autopause'] = '0';
            $params['mute'] = '0';
            $params['title'] = '1';
            $params['portrait'] = '1';
            $params['byline'] = '1';
        } elseif ( 'dailymotion' === $settings['video_type'] ) {           
            $params['endscreen-enable'] = '0';
            $params['ui-start-screen-info'] = '1';
            $params['ui-logo'] = '1';
        }
        foreach ( $params_dictionary as $key => $param_name ) {
            $setting_name = $param_name;
            if ( is_string( $key ) ) {
                $setting_name = $key;
            }
            $setting_value = $settings[ $setting_name ] ? '1' : '0';
            $params[ $param_name ] = $setting_value;
        }

        return $params;
    }

    private function get_embed_options($slide_settings = null) {
        $settings = $this->get_settings_for_display();
        if($slide_settings) {
            $settings = array_merge($settings, $slide_settings);
        }
        $embed_options = [];
        if ( 'youtube' === $settings['video_type'] ) {
            $embed_options['privacy'] = 'no';
        }

        return $embed_options;
    }

    private function get_hosted_video_url($slide_settings = null) {
        $settings = $this->get_settings_for_display();
        if($slide_settings) {
            $settings = array_merge($settings, $slide_settings);
        }
        if ( ! empty( $settings['insert_url'] ) ) {
            $video_url = $settings['external_url']['url'];
        } else {
            $video_url = $settings['hosted_url']['url'];
        }
        if ( empty( $video_url ) ) {
            return '';
        }

        return $video_url;
    }

    private function get_hosted_params($slide_settings = null) {
        $settings = $this->get_settings_for_display();

        $video_params = ['autoplay' => true, 'loop' => false];

        if($slide_settings && !empty($slide_settings['controls'])) {
        	$video_params['controls'] = true;
        } elseif(!$slide_settings && !empty($settings['controls'])) {
        	$video_params['controls'] = true;
        }

        return $video_params;
    }

    private function get_bg_video_embed_params($slide_settings = []) {
        $settings = $slide_settings;

        $params = [];

        if ( $settings['autoplay'] ) {
            $params['autoplay'] = '1';

            if ( $settings['play_on_mobile'] ) {
                $params['playsinline'] = '1';
            }
        }
        if(!$settings['play_once']) {
            $params['loop'] = '1';
            $video_properties = Embed::get_video_properties( $settings['video_url'] );

            $params['playlist'] = $video_properties['video_id'];
        }
        $params['controls'] = '0';
        
        $embed_video_type = $this->get_embed_video_type($slide_settings['video_url']);
        if($embed_video_type === 'youtube') {
            $params['mute'] = '1';
        } elseif($embed_video_type === 'vimeo') {
            $params['muted'] = '1';
        } else {
            $params['mute'] = '1';
        }

        $params['start'] = $settings['start'];

        $params['end'] = $settings['end'];

        $params['wmode'] = 'opaque';

        return $params;
    }

    private function get_bg_video_embed_options($slide_settings = []) {
        $settings = $slide_settings;

        $embed_options = [];

        $embed_options['privacy'] = $settings['yt_privacy'];

        $embed_options['lazy_load'] = false;

        return $embed_options;
    }
}
