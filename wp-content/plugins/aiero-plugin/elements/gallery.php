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
use Elementor\Group_Control_Image_Size;
use Elementor\Group_Control_Css_Filter;
use Elementor\REPEATER;
use Elementor\Utils;

if ( ! defined( 'ABSPATH' ) ) exit; // Exit if accessed directly

class Aiero_Gallery_Widget extends Widget_Base {

    public function get_name() {
        return 'aiero_gallery';
    }

    public function get_title() {
        return esc_html__('Gallery', 'aiero_plugin');
    }

    public function get_icon() {
        return 'eicon-gallery-masonry';
    }

    public function get_categories() {
        return ['aiero_widgets'];
    }

    public function get_script_depends() {
        return ['elementor_widgets', 'wp-mediaelement'];
    }

    public function get_style_depends() {
        return ['wp-mediaelement', 'e-swiper'];
    }

    protected function register_controls() {

        // ----------------------------- //
        // ---------- Content ---------- //
        // ----------------------------- //
        $this->start_controls_section(
            'section_content',
            [
                'label' => esc_html__('Gallery', 'aiero_plugin')
            ]
        );

        $this->add_control(
            'listing_type',
            [
                'label'     => esc_html__('Type', 'aiero_plugin'),
                'type'      => Controls_Manager::SELECT,
                'default'   => 'grid',
                'options'   => [
                    'grid'      => esc_html__('Grid', 'aiero_plugin'),
                    'masonry'   => esc_html__('Masonry', 'aiero_plugin'),
                    'slider'    => esc_html__('Slider', 'aiero_plugin')
                ]
            ]
        );

        $this->add_control(
            'title_style',
            [
                'label'     => esc_html__('Title Style', 'aiero_plugin'),
                'type'      => Controls_Manager::SELECT,
                'default'   => '',
                'options'   => [
                    ''      => esc_html__('Decorated', 'aiero_plugin'),
                    'simple'   => esc_html__('Simple', 'aiero_plugin')
                ],
                'prefix_class' => 'aiero-gallery-title-style-'
            ]
        );

        $repeater = new Repeater();

        $repeater->add_control(
            'item_title',
            [
                'label'         => esc_html__('Title', 'aiero_plugin'),
                'type'          => Controls_Manager::TEXT,
                'default'       => '',
                'label_block'   => true,
                'placeholder'   => esc_html__('Enter Title', 'aiero_plugin')
            ]
        );

        $repeater->add_control(
            'item_name_color',
            [
                'label'     => esc_html__('Title Color', 'aiero_plugin'),
                'type'      => Controls_Manager::COLOR,
                'selectors' => [
                    '{{WRAPPER}} {{CURRENT_ITEM}} .post-title, {{WRAPPER}} {{CURRENT_ITEM}} .post-title a' => 'color: {{VALUE}};'
                ]
            ]
        );

        $repeater->add_control(
            'image',
            [
                'label'     => esc_html__('Image', 'aiero_plugin'),
                'type'      => Controls_Manager::MEDIA,
                'default'   => [
                    'url'   => Utils::get_placeholder_image_src(),
                ]
            ]
        );

        $repeater->add_group_control(
            Group_Control_Image_Size::get_type(),
            [
                'name'      => 'image_thumbnail',
                'default'   => 'full'
            ]
        );

        $repeater->add_control(
            'categories',
            [
                'label'         => esc_html__('Filter Categories', 'aiero_plugin'),
                'label_block'   => true,
                'description'   => esc_html__('Comma-separated list of Categories for a filter', 'aiero_plugin'),
                'type'          => Controls_Manager::TEXTAREA,
                'placeholder'   => esc_html__( 'Enter Categories list', 'aiero_plugin' )
            ]
        );

        $this->add_control(
            'gallery_items',
            [
                'label'         => esc_html__('Gallery Items', 'aiero_plugin'),
                'type'          => Controls_Manager::REPEATER,
                'fields'        => $repeater->get_controls(),
                'title_field'   => '{{{item_title}}}',
                'prevent_empty' => false,
                'separator'     => 'before'
            ]
        );

        $this->add_control(
            'show_filter',
            [
                'label'         => esc_html__('Show Filter', 'aiero_plugin'),
                'type'          => Controls_Manager::SWITCHER,
                'label_off'     => esc_html__('Hide', 'aiero_plugin'),
                'label_on'      => esc_html__('Show', 'aiero_plugin'),
                'return_value'  => 'yes',
                'default'       => 'yes',
                'separator'     => 'before',
                'condition'     => [
                    'listing_type!' => 'slider'
                ]
            ]
        );

        $this->add_control(
            'link_to',
            [
                'label' => esc_html__( 'Link', 'aiero_plugin' ),
                'type' => Controls_Manager::SELECT,
                'default' => 'none',
                'options' => [
                    'none' => esc_html__( 'None', 'aiero_plugin' ),
                    'file' => esc_html__( 'Media File', 'aiero_plugin' ),
                ],
            ]
        );

        $this->add_control(
            'open_lightbox',
            [
                'label' => esc_html__( 'Lightbox', 'aiero_plugin' ),
                'type' => Controls_Manager::SELECT,
                'description' => sprintf(
                    esc_html__( 'Manage your site’s lightbox settings in the %1$sLightbox panel%2$s.', 'aiero_plugin' ),
                    '<a href="javascript: $e.run( \'panel/global/open\' ).then( () => $e.route( \'panel/global/settings-lightbox\' ) )">',
                    '</a>'
                ),
                'default' => 'default',
                'options' => [
                    'default' => esc_html__( 'Default', 'aiero_plugin' ),
                    'yes' => esc_html__( 'Yes', 'aiero_plugin' ),
                    'no' => esc_html__( 'No', 'aiero_plugin' ),
                ],
                'condition' => [
                    'link_to' => 'file',
                ],
            ]
        );

        $this->end_controls_section();


        // ----------------------------------- //
        // ---------- Grid Settings ---------- //
        // ----------------------------------- //
        $this->start_controls_section(
            'section_grid_settings',
            [
                'label'         => esc_html__('Grid Settings', 'aiero_plugin'),
                'condition'     => [
                    'listing_type'  => 'grid'
                ]
            ]
        );

        $this->add_control(
            'grid_columns_number',
            [
                'label'         => esc_html__('Columns Number', 'aiero_plugin'),
                'type'          => Controls_Manager::NUMBER,
                'default'       => 3,
                'min'           => 1,
                'max'           => 6
            ]
        );

        $this->end_controls_section();


        // -------------------------------------- //
        // ---------- Masonry Settings ---------- //
        // -------------------------------------- //
        $this->start_controls_section(
            'section_masonry_settings',
            [
                'label'         => esc_html__('Masonry Settings', 'aiero_plugin'),
                'condition'     => [
                    'listing_type'  => 'masonry'
                ]
            ]
        );

        $this->add_control(
            'masonry_columns_number',
            [
                'label'         => esc_html__('Columns Number', 'aiero_plugin'),
                'type'          => Controls_Manager::NUMBER,
                'default'       => 4,
                'min'           => 1,
                'max'           => 6
            ]
        );

        $this->end_controls_section();


        // ---------------------------- //
        // ---------- Slider ---------- //
        // ---------------------------- //
        $this->start_controls_section(
            'section_slider',
            [
                'label' => esc_html__('Slider Settings', 'aiero_plugin'),
                'condition' => [
                    'listing_type' => 'slider'
                ]
            ]
        );

        $this->add_control(
            'slider_columns_number',
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

        $this->add_control(
            'show_custom_cursor',
            [
                'label'         => esc_html__('Show Custom Cursor', 'aiero_plugin'),
                'type'          => Controls_Manager::SWITCHER,
                'label_off'     => esc_html__('Hide', 'aiero_plugin'),
                'label_on'      => esc_html__('Show', 'aiero_plugin'),
                'return_value'  => 'yes',
                'default'       => '',
                'separator'     => 'before',
                'condition'     => [
                	'listing_type' => 'slider'	
                ]
            ]
        );

        $this->add_control(
            'cursor_text',
            [
                'label'         => esc_html__('Cursor Text', 'aiero_plugin'),
                'type'          => Controls_Manager::TEXT,
                'default'       => esc_html__('Drag', 'aiero_plugin'),
                'label_block'   => true,
                'condition'     => [
                	'listing_type' => 'slider',
                    'show_custom_cursor' => 'yes'
                ]
            ]
        );

        $this->add_group_control(
            Group_Control_Typography::get_type(),
            [
                'name'      => 'cursor_typography',
                'label'     => esc_html__('Cursor Typography', 'aiero_plugin'),
                'selector'  => '{{WRAPPER}} .cursor_drag.active',
                'condition' => [
                	'listing_type' => 'slider',
                    'show_custom_cursor' => 'yes'
                ]
            ]
        );

        $this->add_control(
            'cursor_color',
            [
                'label'     => esc_html__('Cursor Color', 'aiero_plugin'),
                'type'      => Controls_Manager::COLOR,
                'selectors' => [
                    '{{WRAPPER}} .cursor_drag' => 'color: {{VALUE}};'
                ],
                'condition' => [
                	'listing_type' => 'slider',
                    'show_custom_cursor' => 'yes'
                ]
            ]
        );

        $this->add_control(
            'cursor_bg_color',
            [
                'label'     => esc_html__('Cursor Background Color', 'aiero_plugin'),
                'type'      => Controls_Manager::COLOR,
                'selectors' => [
                    '{{WRAPPER}} .cursor_drag .cursor-bg' => 'background-color: {{VALUE}};',
                ],
                'condition' => [
                	'listing_type' => 'slider',
                    'show_custom_cursor' => 'yes'
                ]
            ]
        );

        $this->end_controls_section();


        // -------------------------------------- //
        // ---------- Filter Settings ---------- //
        // -------------------------------------- //
        $this->start_controls_section(
            'filter_settings_section',
            [
                'label'     => esc_html__('Filter Settings', 'aiero_plugin'),
                'tab'       => Controls_Manager::TAB_STYLE,
                'condition' => [
                    'listing_type!' => 'slider',
                    'show_filter'   => 'yes'
                ]
            ]
        );

        $this->add_group_control(
            Group_Control_Typography::get_type(),
            [
                'name'      => 'filter_typography',
                'label'     => esc_html__('Filter Typography', 'aiero_plugin'),
                'selector'  => '{{WRAPPER}} .filter-control-wrapper .gallery-filter-control-item, {{WRAPPER}} .filter-control-wrapper .separator'
            ]
        );

        $this->start_controls_tabs('filter_settings_tabs');
            // ------ Normal Tab ------ //
            $this->start_controls_tab(
                'tab_filter_normal',
                [
                    'label'     => esc_html__('Normal', 'aiero_plugin')
                ]
            );

                $this->add_control(
                    'filter_color',
                    [
                        'label'     => esc_html__('Filter Text Color', 'aiero_plugin'),
                        'type'      => Controls_Manager::COLOR,
                        'selectors' => [
                            '{{WRAPPER}} .filter-control-wrapper .gallery-filter-control-list .dots .dot:not(:hover):not(.active), {{WRAPPER}} .filter-control-wrapper .separator' => 'color: {{VALUE}};'
                        ],
                    ]
                );

            $this->end_controls_tab();

            // ------ Hover Tab ------ //
            $this->start_controls_tab(
                'tab_filter_active',
                [
                    'label'     => esc_html__('Active', 'aiero_plugin')
                ]
            );

                $this->add_control(
                    'filter_color_active',
                    [
                        'label'     => esc_html__('Filter Text Color', 'aiero_plugin'),
                        'type'      => Controls_Manager::COLOR,
                        'selectors' => [
                            '{{WRAPPER}} .filter-control-wrapper .gallery-filter-control-list .dots .dot:hover, {{WRAPPER}} .filter-control-wrapper .gallery-filter-control-list .dots .dot.active' => 'color: {{VALUE}};'
                        ],
                    ]
                );

            $this->end_controls_tab();
        $this->end_controls_tabs();

        $this->end_controls_section();       


        // ----------------------------------- //
        // ---------- Item Settings ---------- //
        // ----------------------------------- //
        $this->start_controls_section(
            'item_settings_section',
            [
                'label'     => esc_html__('Item Settings', 'aiero_plugin'),
                'tab'       => Controls_Manager::TAB_STYLE
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
                    '{{WRAPPER}} .owl-carousel .gallery-item-wrapper .gallery-item' => 'height: {{SIZE}}{{UNIT}};'
                ],
                'condition' => [
                    'listing_type' => 'slider'
                ]
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
                        'max'       => 60
                    ]
                ],
                'default'   => [
                    'unit'      => 'px',
                    'size'      => 30
                ],
                'selectors' => [
                    '{{WRAPPER}} .gallery-wrapper' =>
                        'margin: calc(-{{SIZE}}{{UNIT}}/2);',
                    '{{WRAPPER}} .gallery-wrapper.owl-carousel' =>
                        'width: calc(100% + {{SIZE}}{{UNIT}});',
                    '{{WRAPPER}} .gallery-wrapper.gallery-grid .gallery-item .gallery-item-link, 
                     {{WRAPPER}} .gallery-wrapper.gallery-masonry .gallery-item .gallery-item-link,
                     {{WRAPPER}} .gallery-wrapper.gallery-grid .gallery-item .gallery-item-inner,
                     {{WRAPPER}} .gallery-wrapper.gallery-masonry .gallery-item .gallery-item-inner' => 'top: calc({{SIZE}}{{UNIT}}/2); right: calc({{SIZE}}{{UNIT}}/2); bottom: calc({{SIZE}}{{UNIT}}/2); left: calc({{SIZE}}{{UNIT}}/2);',
                    '{{WRAPPER}} .gallery-wrapper.owl-carousel .gallery-item-wrapper' =>
                        'padding: calc({{SIZE}}{{UNIT}}/2);',
                ]
            ]
        );

        $this->add_responsive_control(
            'border_radius',
            [
                'label' => esc_html__( 'Border Radius', 'aiero_plugin' ),
                'type' => \Elementor\Controls_Manager::DIMENSIONS,
                'size_units' => [ 'px', '%', 'em', 'rem', 'custom' ],
                'selectors' => [
                    '{{WRAPPER}} .gallery-item-wrapper .gallery-item-media' => 'border-radius: {{TOP}}{{UNIT}} {{RIGHT}}{{UNIT}} {{BOTTOM}}{{UNIT}} {{LEFT}}{{UNIT}};',
                ]
            ]
        );

        $this->start_controls_tabs('css_filters_tabs');
            // ------ Normal Tab ------ //
            $this->start_controls_tab(
                'tab_css_filters_normal',
                [
                    'label'     => esc_html__('Normal', 'aiero_plugin')
                ]
            );
                $this->add_group_control(
                    Group_Control_Css_Filter::get_type(),
                    [
                        'name' => 'item_css_filters',
                        'selector' => '{{WRAPPER}} .gallery-wrapper .gallery-item-link .gallery-item-media img',
                    ]
                );
            $this->end_controls_tab();

            // ------ Hover Tab ------ //
            $this->start_controls_tab(
                'tab_css_filters_hover',
                [
                    'label'     => esc_html__('Hover', 'aiero_plugin')
                ]
            );
                $this->add_group_control(
                    Group_Control_Css_Filter::get_type(),
                    [
                        'name' => 'item_css_filters_hover',
                        'selector' => '{{WRAPPER}} .gallery-wrapper .gallery-item-link:hover .gallery-item-media img',
                    ]
                );
            $this->end_controls_tab();
        $this->end_controls_tabs();

        $this->end_controls_section();


        // -------------------------------------- //
        // ---------- Content Settings ---------- //
        // -------------------------------------- //
        $this->start_controls_section(
            'content_settings_section',
            [
                'label'     => esc_html__('Content Settings', 'aiero_plugin'),
                'tab'       => Controls_Manager::TAB_STYLE
            ]
        );

        $this->add_group_control(
            Group_Control_Typography::get_type(),
            [
                'name'      => 'name_typography',
                'label'     => esc_html__('Title Typography', 'aiero_plugin'),
                'selector'  => '{{WRAPPER}} .gallery-item .post-title'
            ]
        );

        $this->add_control(
            'name_color',
            [
                'label'     => esc_html__('Title Color', 'aiero_plugin'),
                'type'      => Controls_Manager::COLOR,
                'selectors' => [
                    '{{WRAPPER}} .gallery-item .post-title, {{WRAPPER}} .gallery-item .post-title a' => 'color: {{VALUE}};'
                ]
            ]
        );

        $this->add_control(
            'content_bg_color',
            [
                'label'     => esc_html__('Title Background Color', 'aiero_plugin'),
                'type'      => Controls_Manager::COLOR,
                'alpha'     => false,
                'selectors' => [
                    '{{WRAPPER}} .gallery-item-wrapper .gallery-item-content' => 'background-color: {{VALUE}};',
                    '{{WRAPPER}} .gallery-item-wrapper .gallery-item-content-wrapper:before, {{WRAPPER}} .gallery-item-content-wrapper:after' => 'box-shadow: 0 20px 0 0 {{VALUE}};'
                ],
                'condition' => [
                    'title_style!' => 'simple'
                ]
            ]
        );

        $this->add_responsive_control(
            'title_padding',
            [
                'label'         => esc_html__('Title Padding', 'aiero_plugin'),
                'type'          => Controls_Manager::DIMENSIONS,
                'size_units'    => ['px', 'em', '%'],
                'selectors'     => [
                    '{{WRAPPER}} .gallery-item-wrapper .gallery-item-content-wrapper .gallery-item-content' => 'padding: {{TOP}}{{UNIT}} {{RIGHT}}{{UNIT}} {{BOTTOM}}{{UNIT}} {{LEFT}}{{UNIT}};'
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

                $this->add_control(
                    'nav_bg',
                    [
                        'label'     => esc_html__('Slider Arrows Background Color', 'aiero_plugin'),
                        'type'      => Controls_Manager::COLOR,
                        'selectors' => [
                            '{{WRAPPER}} .owl-nav [class*="owl-"], {{WRAPPER}} .owl-nav [class*="owl-"].disabled:hover' => 'background-color: {{VALUE}};'
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

                $this->add_control(
                    'nav_bg_hover',
                    [
                        'label'     => esc_html__('Slider Arrows Background Color', 'aiero_plugin'),
                        'type'      => Controls_Manager::COLOR,
                        'selectors' => [
                            '{{WRAPPER}} .owl-nav [class*="owl-"]:not(.disabled):hover' => 'background-color: {{VALUE}};'
                        ]
                    ]
                );

            $this->end_controls_tab();

        $this->end_controls_tabs();

        $this->end_controls_section();
    }

    protected function render() {
        $settings = $this->get_settings();

        $listing_type           = $settings['listing_type'];
        $gallery_items          = $settings['gallery_items'];
        $show_filter            = $settings['show_filter'];
        $show_custom_cursor     = $settings['show_custom_cursor'];

        $grid_columns_number    = $settings['grid_columns_number'];
        $masonry_columns_number = $settings['masonry_columns_number'];
        $slider_columns_number  = $settings['slider_columns_number'];

        $widget_class           = 'aiero-gallery-widget';
        $wrapper_class          = 'gallery-wrapper';
        $widget_attr            = '';
        $wrapper_attr           = '';
        $item_class             = 'gallery-item-wrapper';

        if ( $listing_type == 'masonry' ) {
            $widget_class       .= ' isotope' . ( $show_filter == 'yes' ? esc_attr(' isotope-filter') : '' );
            $wrapper_class      .= ' isotope-trigger gallery-masonry' . ( !empty($masonry_columns_number) ? ' columns-' . esc_attr($masonry_columns_number) : '' );
            $item_class .= ' isotope-item';
            $widget_attr .= ( $show_filter == 'yes' ? ' data-columns=' . esc_attr($masonry_columns_number) . ' data-spacings=true' : '');
        } elseif ( $listing_type == 'grid' ) {
            $widget_class       .= ' isotope' . ( $show_filter == 'yes' ? esc_attr(' isotope-filter') : '' );
            $wrapper_class      .= ' isotope-trigger gallery-grid' . ( !empty($grid_columns_number) ? ' columns-' . esc_attr($grid_columns_number) : '' );
            $item_class .= ' isotope-item';
            $widget_attr .= ( $show_filter == 'yes' ? ' data-columns=' . esc_attr($grid_columns_number) . ' data-spacings=true' : '');
        } else {
            $widget_id = $this->get_id();

            $slider_options = [
                'items'                 => !empty($slider_columns_number) ? (int)$slider_columns_number : 1,
                'nav'                   => ('yes' === $settings['nav']),
                'dots'                  => ('yes' === $settings['dots']),
                'autoplayHoverPause'    => ('yes' === $settings['pause_on_hover']),
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
            $wrapper_class      .= ' owl-carousel owl-theme';
            $wrapper_attr       = ' data-slider-options=' . esc_attr(wp_json_encode($slider_options));
            $item_class .= ' slider-item';
        }

        // ------------------------------------ //
        // ---------- Widget Content ---------- //
        // ------------------------------------ //
        ?>

        <div class="<?php echo esc_attr($widget_class); ?>"<?php echo esc_html($widget_attr); ?>>

            <?php
                if ( $listing_type !== 'slider' && $show_filter == 'yes' ) {                    
                    $terms = array();
                    foreach ($gallery_items as $item) {
                        $categories = explode(',', str_replace(', ', ',', $item['categories']));
                        foreach ($categories as $category) {
                            if(!empty($category)) {
                                $terms[] = trim($category);
                            }                            
                        }                        
                    }
                    $terms = array_unique($terms);
                    if ( count( $terms ) > 1 ) {
                        echo "<div class='filter-control-wrapper'>";
                        foreach ( $terms as $term ) {
                            $term_slug = sanitize_title($term);
                            $filter_vals[$term_slug] = $term;
                        }
                        if ( !empty($filter_vals) ){
                            echo "<nav class='nav gallery-filter-control-list'>";
                                echo "<div class='dots'>";
                                    echo "<span class='dot gallery-filter-control-item all active' data-filter='*'>";
                                        esc_html_e( 'All', 'aiero_plugin' );
                                    echo "</span>";
                                    echo "<span class='separator'>/</span>";
                                    $counter = 0;
                                    $filter_vals_count = count($filter_vals);
                                    foreach ( $filter_vals as $term_slug => $term_name ){
                                        echo "<span class='dot gallery-filter-control-item' data-filter='.gallery-cat-" . esc_html( $term_slug ) . "'>";
                                            echo esc_html( $term_name );
                                        echo "</span>";
                                        $counter++;
                                        if( $counter < $filter_vals_count ) {
                                            echo "<span class='separator'>/</span>";
                                        }
                                    }
                                echo "</div>";
                            echo "</nav>";
                        }
                        echo "</div>";
                    }
                }
                if ( $listing_type === 'slider' && $show_custom_cursor === 'yes' ) {
                    echo '<div class="cursor_drag">';
                        echo '<div class="cursor-bg"></div>';
                        echo '<span>' . esc_html($settings['cursor_text']) . '</span>';
                    echo '</div>';
                }
            ?>

            <div class="archive-listing">
                <div class="<?php echo esc_attr($wrapper_class); ?>"<?php echo esc_html($wrapper_attr); ?>>
                    <?php
                        foreach ( $gallery_items as $item ) {
                            $item_cat_class = '';
                            if( $listing_type !== 'slider' && $show_filter == 'yes' ) {
                                $categories = [];
                                $categories_arr = explode(',', str_replace(', ', ',', $item['categories']));
                                foreach ($categories_arr as $category) {
                                    $categories[] = sanitize_title(trim($category));                              
                                }
                                $categories = array_unique($categories);
                                foreach ($categories as $category) {
                                    if(!empty($category)) {
                                        $item_cat_class .= ' gallery-cat-' . $category;
                                    }                                    
                                }
                            }
                            $item_classes = $item_class . $item_cat_class . ' elementor-repeater-item-' . $item['_id'];
                            ?>                            
                            <div class="<?php echo esc_attr($item_classes); ?>">
                                <div class="gallery-item">
                                    <?php
                                        $link = $this->get_link_url( $settings, $item );
                                        if ( $link ) {
                                            $this->add_link_attributes( 'link' . $item['_id'] , $link );
                                            $this->add_lightbox_data_attributes( 'link' . $item['_id'], $item['image']['id'], $settings['open_lightbox'], $this->get_id() );
                                        }
                                        if ( $link ) {
                                            echo '<a class="gallery-item-link" ' . $this->get_render_attribute_string( 'link' . $item['_id'] ) . '>';
                                        } else {
                                            echo '<div class="gallery-item-inner">';
                                        }
                                        echo '<span class="gallery-item-media">';
                                            Group_Control_Image_Size::print_attachment_image_html( $item, 'image_thumbnail', 'image' );
                                        echo '</span>';
                                        if ( $item['item_title'] !== '' ) {
                                            echo '<span class="gallery-item-content-wrapper">';
                                                echo '<span class="gallery-item-content">';
                                                    echo '<span class="post-title">' . esc_html($item['item_title']) . '</span>';
                                                echo '</span>';
                                            echo '</span>';
                                        }
                                        if ( $link ) {
                                            echo '</a>';
                                        } else {
                                            echo '</div>';
                                        }
                                    ?>
                                </div>
                            </div>
                        <?php }
                        if ( $listing_type !== 'slider' ) {
                            echo '<div class="grid-sizer"></div>';
                        }                        
                    ?>
                </div>
                <?php
                    if( $listing_type === 'slider' && 'yes' === $settings['nav'] ) {
                        echo '<div class="owl-nav' . ( !empty($widget_id) ? ' owl-nav-' . esc_attr($widget_id) : '' ) . '"></div>';
                    }
                    if( $listing_type === 'slider' && 'yes' === $settings['dots'] ) { 
                        echo '<div class="owl-dots' . ( !empty($widget_id) ? ' owl-dots-' . esc_attr($widget_id) : '' ) . '"></div>';   
                    }                                  
                ?>
            </div>
        </div>
        <?php
    }

    protected function get_link_url( $settings, $item ) {
        if ( 'none' === $settings['link_to'] ) {
            return false;
        }
        return [
            'url' => $item['image']['url'],
        ];
    }

    protected function content_template() {}

    public function render_plain_content() {}
}