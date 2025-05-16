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

class Aiero_Services_Listing_Widget extends Widget_Base {

    public function get_name() {
        return 'aiero_services_listing';
    }

    public function get_title() {
        return esc_html__('Services Listing', 'aiero_plugin');
    }

    public function get_icon() {
        return 'eicon-post-list';
    }

    public function get_categories() {
        return ['aiero_widgets'];
    }

    public function get_script_depends() {
        return ['elementor_widgets', 'wp-mediaelement'];
    }

    protected function register_controls() {

        // ----------------------------- //
        // ---------- Content ---------- //
        // ----------------------------- //
        $this->start_controls_section(
            'section_content',
            [
                'label' => esc_html__('Services Listing', 'aiero_plugin')
            ]
        );

        $this->add_control(
            'listing_type',
            [
                'label'         => esc_html__('Type', 'aiero_plugin'),
                'type'          => Controls_Manager::SELECT,
                'default'       => 'grid',
                'options'       => [
                    'grid'          => esc_html__('Grid', 'aiero_plugin'),
                    'list'          => esc_html__('List', 'aiero_plugin'),
                    'slider'        => esc_html__('Slider', 'aiero_plugin'),
                ]
            ]
        );

        $this->add_control(
            'style_type',
            [
                'label'         => esc_html__('Style Type', 'aiero_plugin'),
                'type'          => Controls_Manager::SELECT,
                'default'       => '',
                'options'       => [
                    ''          => esc_html__('Default', 'aiero_plugin'),
                    'type-2'    => esc_html__('Type 2', 'aiero_plugin'),
                ],
                'condition' => [
                	'listing_type' => 'grid'
                ]
            ]
        );

        $this->add_control(
            'title',
            [
                'label'         => esc_html__('Title', 'aiero_plugin'),
                'type'          => Controls_Manager::WYSIWYG,
                'condition' => [
                    'listing_type' => 'slider'
                ]
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
                'label_on'      => esc_html__('Yes', 'aiero_plugin'),
                'condition' => [
                    'listing_type' => 'slider'
                ]
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
                    'listing_type' => 'slider',
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
                'default'   => 'h2',
                'condition' => [
                    'listing_type' => 'slider'
                ]
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
                'prefix_class'  => 'title-alignment-',
                'condition' => [
                    'listing_type' => 'slider'
                ]
            ]
        );

        $this->add_control(
            'post_order_by',
            [
                'label'         => esc_html__('Order By', 'aiero_plugin'),
                'type'          => Controls_Manager::SELECT,
                'default'       => 'date',
                'options'       => [
                    'date'          => esc_html__('Post Date', 'aiero_plugin'),
                    'rand'          => esc_html__('Random', 'aiero_plugin'),
                    'ID'            => esc_html__('Post ID', 'aiero_plugin'),
                    'title'         => esc_html__('Post Title', 'aiero_plugin')
                ]
            ]
        );

        $this->add_control(
            'post_order',
            [
                'label'         => esc_html__('Order', 'aiero_plugin'),
                'type'          => Controls_Manager::SELECT,
                'default'       => 'desc',
                'options'       => [
                    'desc'          => esc_html__('Descending', 'aiero_plugin'),
                    'asc'           => esc_html__('Ascending', 'aiero_plugin')
                ]
            ]
        );

        $this->add_control(
            'filter_by',
            [
                'label'         => esc_html__('Filter by:', 'aiero_plugin'),
                'type'          => Controls_Manager::SELECT,
                'default'       => 'none',
                'options'       => [
                    'none'          => esc_html__('None', 'aiero_plugin'),
                    'cat'           => esc_html__('Category', 'aiero_plugin'),
                    'id'            => esc_html__('ID', 'aiero_plugin')
                ],
                'separator'     => 'before'
            ]
        );

        $this->add_control(
            'categories',
            [
                'label'         => esc_html__('Categories', 'aiero_plugin'),
                'label_block'   => true,
                'type'          => Controls_Manager::SELECT2,
                'multiple'      => true,
                'description'   => esc_html__('List of categories.', 'aiero_plugin'),
                'options'       => aiero_get_all_taxonomy_terms('aiero_service', 'aiero_services_category'),
                'condition'     => [
                    'filter_by'     => 'cat'
                ]
            ]
        );

        $this->add_control(
            'services',
            [
                'label'         => esc_html__('Choose Services', 'aiero_plugin'),
                'type'          => Controls_Manager::SELECT2,
                'options'       => aiero_get_all_post_list('aiero_service'),
                'label_block'   => true,
                'multiple'      => true,
                'condition'     => [
                    'filter_by'     => 'id'
                ]
            ]
        );

        $this->add_responsive_control(
            'services_align',
            [
                'label'         => esc_html__('Alignment', 'aiero_plugin'),
                'type'          => Controls_Manager::CHOOSE,
                'options'       => [
                    'left'          => [
                        'title'         => esc_html__('Left', 'aiero_plugin'),
                        'icon'          => 'eicon-text-align-left',
                    ],
                    'center'        => [
                        'title'         => esc_html__('Center', 'aiero_plugin'),
                        'icon'          => 'eicon-text-align-center',
                    ],
                    'right'         => [
                        'title'         => esc_html__('Right', 'aiero_plugin'),
                        'icon'          => 'eicon-text-align-right',
                    ]
                ],
                'default'       => 'left',
                'selectors'     => [
                    '{{WRAPPER}} .service-item' => 'text-align: {{VALUE}};',
                ],
                'separator'     => 'before'
            ]
        );

        $this->add_control(
            'excerpt_length',
            [
                'label'     => esc_html__('Excerpt Length, in symbols', 'aiero_plugin'),
                'type'      => Controls_Manager::NUMBER,
                'min'       => 0,
                'default'   => '',
                'condition' => [
                    'listing_type' => 'grid'
                ]
            ]
        );

        $this->add_control(
            'show_media',
            [
                'label'         => esc_html__("Show Media", 'aiero_plugin'),
                'type'          => Controls_Manager::SWITCHER,
                'label_off'     => esc_html__('Hide', 'aiero_plugin'),
                'label_on'      => esc_html__('Show', 'aiero_plugin'),
                'default'       => '',
                'return_value'  => 'yes',
                'condition' => [
                    'listing_type' => 'grid'
                ]
            ]
        );

        $this->add_control(
            'show_read_more',
            [
                'label'         => esc_html__("'Read More' Button", 'aiero_plugin'),
                'type'          => Controls_Manager::SWITCHER,
                'label_off'     => esc_html__('Hide', 'aiero_plugin'),
                'label_on'      => esc_html__('Show', 'aiero_plugin'),
                'default'       => '',
                'return_value'  => 'yes',
                'condition' => [
                    'listing_type' => 'grid'
                ]
            ]
        );

        $this->add_control(
            'read_more_text',
            [
                'label'         => esc_html__('Button Text', 'aiero_plugin'),
                'placeholder'   => esc_html__('Enter text', 'aiero_plugin'),
                'type'          => Controls_Manager::TEXT,
                'default'       => esc_html__('Read More', 'aiero_plugin'),
                'condition'     => [
                    'listing_type' => 'grid',
                    'show_read_more'    => 'yes'
                ]
            ]
        );

        $this->add_control(
            'show_pagination',
            [
                'label'         => esc_html__('Show Pagination', 'aiero_plugin'),
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
            'icon_type',
            [
                'label'         => esc_html__('Icon Type', 'aiero_plugin'),
                'type'          => Controls_Manager::SELECT,
                'default'       => 'default',
                'options'       => array(
                    'default'   => esc_html__('Default', 'aiero_plugin'),
                    'svg'       => esc_html__('SVG', 'aiero_plugin'),
                ),
                'condition' => [
                    'listing_type' => 'grid'
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
                ],
                'selectors_dictionary' => [
                    'left' => is_rtl() ? 'display: flex; justify-content: flex-end; align-items: flex-start; flex-direction: row-reverse;' : 'display: flex; justify-content: flex-start; align-items: flex-start; flex-direction: row;',
                    'right' => is_rtl() ? 'display: flex; justify-content: flex-start; align-items: flex-start; flex-direction: row;' : 'display: flex; justify-content: flex-end; align-items: flex-start; flex-direction: row-reverse;',
                    'top' => 'display: flex; justify-content: flex-start; align-items: flex-start; flex-direction: column;'
                ],
                'selectors' => [
                    '{{WRAPPER}} .service-listing-wrapper .service-item' => '{{VALUE}}',
                ],
                'default' => 'left',
                'toggle'            => true,
                'condition' => [
                    'listing_type' => 'grid'
                ]
            ]
        );

        $this->add_responsive_control(
            'icon_align',
            [
                'label'         => esc_html__('Icon Alignment', 'aiero_plugin'),
                'type'          => Controls_Manager::CHOOSE,
                'options'       => [
                    'left'          => [
                        'title'         => esc_html__('Left', 'aiero_plugin'),
                        'icon'          => 'eicon-text-align-left',
                    ],
                    'center'        => [
                        'title'         => esc_html__('Center', 'aiero_plugin'),
                        'icon'          => 'eicon-text-align-center',
                    ],
                    'right'         => [
                        'title'         => esc_html__('Right', 'aiero_plugin'),
                        'icon'          => 'eicon-text-align-right',
                    ]
                ],
                'default'       => 'left',
                'toggle'            => true,
                'selectors_dictionary' => [
                    'left' => is_rtl() ? 'align-items: flex-end;' : 'align-items: flex-start;',
                    'right' => is_rtl() ? 'align-items: flex-start;' : 'align-items: flex-end;',
                    'center' => 'align-items: center;'
                ],
                'selectors'     => [
                    '{{WRAPPER}} .service-listing-wrapper .service-item' => '{{VALUE}}',
                ],
                'separator'     => 'before',
                'condition'         => [
                    'listing_type'    => 'grid',
                    'icon_position'   => 'top'
                ]
            ]
        );

        $this->add_responsive_control(
            'icon_vertical_position',
            [
                'label'             => esc_html__('Icon Vertical Alignment', 'aiero_plugin'),
                'type'              => Controls_Manager::CHOOSE,
                'options'           => [
                    'flex-start'               => [
                        'title'             => esc_html__( 'Top', 'aiero_plugin' ),
                        'icon'              => 'eicon-v-align-top',
                    ],
                    'center'            => [
                        'title'             => esc_html__( 'Middle', 'aiero_plugin' ),
                        'icon'              => 'eicon-v-align-middle',
                    ],
                    'flex-end'            => [
                        'title'             => esc_html__( 'Bottom', 'aiero_plugin' ),
                        'icon'              => 'eicon-v-align-bottom',
                    ]
                ],
                'selectors' => [
                    '{{WRAPPER}} .service-listing-wrapper .service-item' => 'align-items: {{VALUE}}',
                ],
                'toggle'            => true,
                'condition'         => [
                    'listing_type'    => 'grid',
                    'icon_position'   => ['left', 'right']
                ]
            ]
        );

        $this->add_responsive_control(
            'icon_vertical_position_alt',
            [
                'label'         => esc_html__('Vertical Alignment', 'aiero_plugin'),
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
                        'icon'          => 'eicon-v-align-stretch'
                    ],
                    'space-around'        => [
                        'title'         => esc_html__( 'Space Around', 'aiero_plugin' ),
                        'icon'          => 'eicon-v-align-stretch'
                    ],
                    'space-evenly'        => [
                        'title'         => esc_html__( 'Space Evenly', 'aiero_plugin' ),
                        'icon'          => 'eicon-v-align-stretch'
                    ],
                ],
                'selectors' => [
                    '{{WRAPPER}} .service-listing-wrapper .service-item' => 'justify-content: {{VALUE}};'
                ],
                'toggle'            => true,
                'condition'         => [
                	'listing_type' => 'grid',
                    'icon_position'   => 'top',
                    'style_type'      => 'type-2'
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
        
        $this->add_responsive_control(
            'slider_padding',
            [
                'label'         => esc_html__('Slider Padding', 'aiero_plugin'),
                'type'          => Controls_Manager::DIMENSIONS,
                'size_units'    => ['px', 'em', '%', 'vw'],
                'selectors'     => [
                    '{{WRAPPER}} .service-listing-wrapper.service-slider-listing' => 'padding: {{TOP}}{{UNIT}} {{RIGHT}}{{UNIT}} {{BOTTOM}}{{UNIT}} {{LEFT}}{{UNIT}};',
                ]
            ]
        );

        $this->add_control(
            'overflow',
            [
                'label' => esc_html__( 'Slider Overflow', 'aiero_plugin' ),
                'type' => Controls_Manager::SELECT,
                'default' => '',
                'options' => [
                    '' => esc_html__( 'Default', 'aiero_plugin' ),
                    'visible' => esc_html__( 'Visible', 'aiero_plugin' ),
                ],
                'selectors' => [
                    '{{WRAPPER}} .owl-carousel .owl-stage-outer' => 'overflow: {{VALUE}}',
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
                'condition' => [
                    'listing_type' => 'grid'
                ]
            ]
        );

        $this->add_control(
            'grid_columns_number',
            [
                'label'         => esc_html__('Columns Number', 'aiero_plugin'),
                'type'          => Controls_Manager::NUMBER,
                'default'       => 4,
                'min'           => 1,
                'max'           => 6
            ]
        );

        $this->add_control(
            'grid_posts_per_page',
            [
                'label'         => esc_html__('Items Per Page', 'aiero_plugin'),
                'type'          => Controls_Manager::NUMBER,
                'default'       => 4,
                'min'           => -1
            ]
        );

        $this->end_controls_section();

        // ----------------------------------- //
        // ---------- List Settings ---------- //
        // ----------------------------------- //
        $this->start_controls_section(
            'section_list_settings',
            [
                'label'         => esc_html__('List Settings', 'aiero_plugin'),
                'condition' => [
                    'listing_type' => 'list'
                ]
            ]
        );

        $this->add_control(
            'list_posts_per_page',
            [
                'label'         => esc_html__('Items Per Page', 'aiero_plugin'),
                'type'          => Controls_Manager::NUMBER,
                'default'       => 4,
                'min'           => -1
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
                'tab'       => Controls_Manager::TAB_STYLE,
                'condition' => [
                    'listing_type' => 'slider'
                ]
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
            'item_settings_section',
            [
                'label'     => esc_html__('Item Settings', 'aiero_plugin'),
                'tab'       => Controls_Manager::TAB_STYLE
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
                        'max'       => 80
                    ]
                ],
                'default'   => [
                    'unit'      => 'px',
                    'size'      => 40
                ],
                'selectors' => [
                    '{{WRAPPER}} .service-listing-wrapper.service-grid-listing .service-item-wrapper, 
                     {{WRAPPER}} .service-listing-wrapper.service-list-listing .service-item-wrapper'    => 'padding: calc({{SIZE}}{{UNIT}}/2);',
                    '{{WRAPPER}} .service-listing-wrapper.service-grid-listing,
                     {{WRAPPER}} .service-listing-wrapper.service-list-listing'                          => 'margin: calc(-{{SIZE}}{{UNIT}}/2);',
                    '{{WRAPPER}} .service-listing-wrapper.service-slider-listing .service-item-wrapper'    => 'padding: 0 calc({{SIZE}}{{UNIT}}/2);',
                    '{{WRAPPER}} .service-listing-wrapper.service-slider-listing'                          => 'margin: 0 calc(-{{SIZE}}{{UNIT}}/2); width: calc(100% + {{SIZE}}{{UNIT}})', 
                ]
            ]
        );

        $this->add_responsive_control(
            'vertical_item_spacing',
            [
                'label'     => esc_html__('Vertical Space between items', 'aiero_plugin'),
                'type'      => Controls_Manager::SLIDER,
                'range'     => [
                    'px'        => [
                        'min'       => 0,
                        'max'       => 100
                    ]
                ],
                'default'   => [
                    'unit'      => 'px',
                    'size'      => 40
                ],
                'selectors' => [
                    '{{WRAPPER}} .service-listing-wrapper .service-item-wrapper'    => 'padding-top: calc({{SIZE}}{{UNIT}}/2); padding-bottom: calc({{SIZE}}{{UNIT}}/2);',
                    '{{WRAPPER}} .service-listing-wrapper'                          => 'margin-top: calc(-{{SIZE}}{{UNIT}}/2); margin-bottom: calc(-{{SIZE}}{{UNIT}}/2);'
                ],
                'condition' => [
                    'listing_type!' => 'slider'
                ]
            ]
        );

        $this->add_responsive_control(
            'item_height',
            [
                'label'     => esc_html__('Item Height', 'aiero_plugin'),
                'type'      => Controls_Manager::SLIDER,
                'range'     => [
                    'px'        => [
                        'min'       => 0,
                        'max'       => 1000
                    ]
                ],
                'selectors' => [
                    '{{WRAPPER}} .service-listing-wrapper .service-item' => 'min-height: {{SIZE}}{{UNIT}};',
                ],
                'condition' => [
                	'listing_type' => 'grid',
                	'style_type'   => 'type-2'
                ]
            ]
        );

        $this->add_responsive_control(
            'item_padding',
            [
                'label' => esc_html__( 'Item Padding', 'aiero_plugin' ),
                'type' => Controls_Manager::DIMENSIONS,
                'size_units' => [ 'px', '%', 'em', 'rem', 'custom' ],
                'selectors' => [
                    '{{WRAPPER}} .service-listing-wrapper .service-item' => 'padding: {{TOP}}{{UNIT}} {{RIGHT}}{{UNIT}} {{BOTTOM}}{{UNIT}} {{LEFT}}{{UNIT}};',
                ],
                'condition' => [
                	'listing_type' => 'grid'
                ]
            ]
        );

        $this->add_responsive_control(
            'item_media_padding',
            [
                'label' => esc_html__( 'Item Media Padding', 'aiero_plugin' ),
                'type' => Controls_Manager::DIMENSIONS,
                'size_units' => [ 'px', '%', 'em', 'rem', 'custom' ],
                'selectors' => [
                    '{{WRAPPER}} .service-listing-wrapper.service-slider-listing .service-item-link' => 'margin: {{TOP}}{{UNIT}} {{RIGHT}}{{UNIT}} {{BOTTOM}}{{UNIT}} {{LEFT}}{{UNIT}};',
                ],
                'condition' => [
                    'listing_type' => 'slider'
                ]
            ]
        );

        $this->add_responsive_control(
            'item_content_padding',
            [
                'label' => esc_html__( 'Item Content Padding', 'aiero_plugin' ),
                'type' => Controls_Manager::DIMENSIONS,
                'size_units' => [ 'px', '%', 'em', 'rem', 'custom' ],
                'selectors' => [
                    '{{WRAPPER}} .service-listing-wrapper.service-slider-listing .service-item .service-item-content' => 'padding: {{TOP}}{{UNIT}} {{RIGHT}}{{UNIT}} {{BOTTOM}}{{UNIT}} {{LEFT}}{{UNIT}};',
                ],
                'condition' => [
                    'listing_type' => 'slider'
                ]
            ]
        );

        $this->add_responsive_control(
            'border_width',
            [
                'label'     => esc_html__('Border Width', 'aiero_plugin'),
                'type'      => Controls_Manager::SLIDER,
                'selectors' => [
                    '{{WRAPPER}} .service-listing-wrapper .service-item .service-item-content' => 'border-bottom-width: {{SIZE}}{{UNIT}};',
                ],
                'condition' => [
                	'listing_type' => 'grid'
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
                    '{{WRAPPER}} .service-listing-wrapper .service-item .service-item-content' => 'padding-bottom: {{SIZE}}{{UNIT}};',
                ],
                'condition' => [
                	'listing_type' => 'grid'
                ]
            ]
        );

        $this->add_responsive_control(
            'border_radius',
            [
                'label' => esc_html__( 'Border Radius', 'aiero_plugin' ),
                'type' => Controls_Manager::DIMENSIONS,
                'size_units' => [ 'px', '%', 'em', 'rem', 'custom' ],
                'selectors' => [
                    '{{WRAPPER}} .service-listing-wrapper .service-item' => 'border-radius: {{TOP}}{{UNIT}} {{RIGHT}}{{UNIT}} {{BOTTOM}}{{UNIT}} {{LEFT}}{{UNIT}};',
                ],
                'condition' => [
                	'listing_type' => ['grid', 'slider']
                ]
            ]
        );

        $this->start_controls_tabs('item_colors_tabs', [
            'condition' => [
                'listing_type' => ['grid', 'slider']
            ]
        ]);
            // ------ Normal Tab ------ //
            $this->start_controls_tab(
                'tab_item_colors_normal',
                [
                    'label' => esc_html__('Normal', 'aiero_plugin')
                ]
            );

                $this->add_control(
                    'service_border_color',
                    [
                        'label'     => esc_html__('Border Color', 'aiero_plugin'),
                        'type'      => Controls_Manager::COLOR,
                        'selectors' => [
                            '{{WRAPPER}} .service-item .service-item-content' => 'border-color: {{VALUE}};'
                        ],
                        'condition' => [
                            'listing_type' => 'grid'
                        ]
                    ]
                );

                $this->add_control(
                    'service_background_color',
                    [
                        'label'     => esc_html__('Background Color', 'aiero_plugin'),
                        'type'      => Controls_Manager::COLOR,
                        'selectors' => [
                            '{{WRAPPER}} .service-item' => 'background-color: {{VALUE}};'
                        ]
                    ]
                );

                $this->add_group_control(
                    Group_Control_Box_Shadow::get_type(),
                    [
                        'name'      => 'service_shadow',
                        'label'     => esc_html__('Item Shadow', 'aiero_plugin'),
                        'selector'  => '{{WRAPPER}} .service-item'
                    ]
                );

            $this->end_controls_tab();

            // ------ Hover Tab ------ //
            $this->start_controls_tab(
                'tab_item_colors_hover',
                [
                    'label' => esc_html__('Hover', 'aiero_plugin')
                ]
            );

                $this->add_control(
                    'service_border_hover',
                    [
                        'label'     => esc_html__('Border Color', 'aiero_plugin'),
                        'type'      => Controls_Manager::COLOR,
                        'selectors' => [
                            '{{WRAPPER}} .service-item:hover .service-item-content' => 'border-color: {{VALUE}};'
                        ],
                        'condition' => [
                            'listing_type' => 'grid'
                        ]
                    ]
                );

                $this->add_control(
                    'service_background_hover',
                    [
                        'label'     => esc_html__('Background Color', 'aiero_plugin'),
                        'type'      => Controls_Manager::COLOR,
                        'selectors' => [
                            '{{WRAPPER}} .service-item:hover' => 'background-color: {{VALUE}};'
                        ]
                    ]
                );

                $this->add_group_control(
                    Group_Control_Box_Shadow::get_type(),
                    [
                        'name'      => 'service_hover_shadow',
                        'label'     => esc_html__('Item Shadow', 'aiero_plugin'),
                        'selector'  => '{{WRAPPER}} .service-item:hover'
                    ]
                );

            $this->end_controls_tab();

        $this->end_controls_tabs();

        $this->end_controls_section();


        // ----------------------------------- //
        // ---------- Icon Settings ---------- //
        // ----------------------------------- //
        $this->start_controls_section(
            'icon_settings_section',
            [
                'label'     => esc_html__('Icon Settings', 'aiero_plugin'),
                'tab'       => Controls_Manager::TAB_STYLE,
                'condition' => [
                    'listing_type' => 'grid'
                ]
            ]
        );

        $this->add_responsive_control(
            'service_icon_container_size',
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
                    '{{WRAPPER}} .service-item .service-icon' => 'font-size: {{SIZE}}{{UNIT}};'
                ],
                'separator' => 'before'
            ]
        );

        $this->add_responsive_control(
            'service_icon_size',
            [
                'label'     => esc_html__('Icon Size', 'aiero_plugin'),
                'type'      => Controls_Manager::SLIDER,
                'range'     => [
                    'px'        => [
                        'min'       => 10,
                        'max'       => 280
                    ]
                ],
                'selectors' => [
                    '{{WRAPPER}} .service-item .service-icon .icon' => 'font-size: {{SIZE}}{{UNIT}};'
                ],
                'separator' => 'before'
            ]
        );

        $this->add_responsive_control(
            'service_icon_margin',
            [
                'label'         => esc_html__('Icon Margins', 'aiero_plugin'),
                'type'          => Controls_Manager::DIMENSIONS,
                'size_units'    => ['px', '%', 'em', 'custom'],
                'selectors'     => [
                    '{{WRAPPER}} .service-item .service-icon' => 'margin: {{TOP}}{{UNIT}} {{RIGHT}}{{UNIT}} {{BOTTOM}}{{UNIT}} {{LEFT}}{{UNIT}};'
                ]
            ]
        );

        $this->add_control(
            'icon_opacity',
            [
                'label'     => esc_html__( 'Icon Opacity', 'aiero_plugin' ),
                'type'      => Controls_Manager::SLIDER,
                'range'     => [
                    'px'        => [
                        'max'       => 1,
                        'min'       => 0.10,
                        'step'      => 0.01,
                    ],
                ],
                'selectors' => [
                    '{{WRAPPER}} .service-item .service-icon' => 'opacity: {{SIZE}};',
                ],
            ]
        );

        $this->start_controls_tabs('icon_colors_tabs');

            // ------ Normal Tab ------ //
            $this->start_controls_tab(
                'tab_icon_colors_normal',
                [
                    'label' => esc_html__('Normal', 'aiero_plugin')
                ]
            );

                $this->add_control(
                    'service_icon_color',
                    [
                        'label'     => esc_html__('Icon Color', 'aiero_plugin'),
                        'type'      => Controls_Manager::COLOR,
                        'selectors' => [
                            '{{WRAPPER}} .service-item .service-icon' => 'color: {{VALUE}};',
                            '{{WRAPPER}} .service-item .service-icon svg' => 'fill: {{VALUE}};'
                        ]
                    ]
                );

            $this->end_controls_tab();

            // ------ Hover Tab ------ //
            $this->start_controls_tab(
                'tab_icon_colors_hover',
                [
                    'label' => esc_html__('Hover', 'aiero_plugin')
                ]
            );

                $this->add_control(
                    'service_icon_hover',
                    [
                        'label'     => esc_html__('Icon Color', 'aiero_plugin'),
                        'type'      => Controls_Manager::COLOR,
                        'selectors' => [
                            '{{WRAPPER}} .service-item:hover .service-icon' => 'color: {{VALUE}};',
                            '{{WRAPPER}} .service-item:hover .service-icon svg' => 'fill: {{VALUE}};'
                        ]
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
                'name'      => 'title_typography',
                'label'     => esc_html__('Title Typography', 'aiero_plugin'),
                'selector'  => '{{WRAPPER}} .service-item .service-post-title'
            ]
        );

        $this->add_group_control(
            Group_Control_Typography::get_type(),
            [
                'name'      => 'title_counter_typography',
                'label'     => esc_html__('Title Counter Typography', 'aiero_plugin'),
                'selector'  => '{{WRAPPER}} .service-item .service-post-title-counter',
                'condition' => [
                    'listing_type' => 'list'
                ]
            ]
        );

        $this->add_responsive_control(
            'excerpt_spacing',
            [
                'label'     => esc_html__('Space Between Title and Excerpt', 'aiero_plugin'),
                'type'      => Controls_Manager::SLIDER,
                'range'     => [
                    'px'        => [
                        'min'       => 0,
                        'max'       => 280
                    ]
                ],
                'selectors' => [
                    '{{WRAPPER}} .service-item .service-item-excerpt:not(:first-child)' => 'margin-top: {{SIZE}}{{UNIT}};'
                ],
                'condition' => [
                    'listing_type' => 'grid'
                ]
            ]
        );

        $this->add_group_control(
            Group_Control_Typography::get_type(),
            [
                'name'      => 'excerpt_typography',
                'label'     => esc_html__('Excerpt Typography', 'aiero_plugin'),
                'selector'  => '{{WRAPPER}} .service-item .service-item-excerpt',
                'condition' => [
                    'listing_type' => 'grid'
                ]
            ]
        );

        $this->add_control(
            'title_hover_color_style',
            [
                'label'     => esc_html__('Title Hover Color Style', 'aiero_plugin'),
                'type'      => Controls_Manager::SELECT,
                'default'   => '',
                'options'   => [
                    ''      => esc_html__('Solid', 'aiero_plugin'),
                    'gradient'  => esc_html__('Gradient', 'aiero_plugin')
                ],
                'condition' => [
                    'listing_type' => 'list'
                ]
            ]
        );

        $this->add_group_control(
            Group_Control_Typography::get_type(),
            [
                'name'      => 'slider_subtitle_typography',
                'label'     => esc_html__('Subtitle Typography', 'aiero_plugin'),
                'selector'  => '{{WRAPPER}} .service-item-link .service-item-subtitle',
                'condition' => [
                    'listing_type' => 'slider'
                ]
            ]
        );

        $this->add_group_control(
            Group_Control_Typography::get_type(),
            [
                'name'      => 'tags_typography',
                'label'     => esc_html__('Tags Typography', 'aiero_plugin'),
                'selector'  => '{{WRAPPER}} .service-item .post-meta-item-tags a',
                'condition' => [
                    'listing_type' => 'slider'
                ]
            ]
        );

        $this->start_controls_tabs('content_colors_tabs');
            // ------ Normal Tab ------ //
            $this->start_controls_tab(
                'tab_content_colors_normal',
                [
                    'label' => esc_html__('Normal', 'aiero_plugin')
                ]
            );

                $this->add_control(
                    'service_title_color',
                    [
                        'label'     => esc_html__('Title Color', 'aiero_plugin'),
                        'type'      => Controls_Manager::COLOR,
                        'selectors' => [
                            '{{WRAPPER}} .service-item .service-post-title a, {{WRAPPER}}.service-list-listing .service-item .service-post-title a:hover' => 'color: {{VALUE}};'
                        ]
                    ]
                );

                $this->add_control(
                    'service_excerpt_color',
                    [
                        'label'     => esc_html__('Excerpt Color', 'aiero_plugin'),
                        'type'      => Controls_Manager::COLOR,
                        'selectors' => [
                            '{{WRAPPER}} .service-item .service-item-excerpt' => 'color: {{VALUE}};'
                        ],
                        'condition' => [
                            'listing_type' => 'grid'
                        ]
                    ]
                );

                $this->add_control(
                    'tags_color',
                    [
                        'label'     => esc_html__('Tags Color', 'aiero_plugin'),
                        'type'      => Controls_Manager::COLOR,
                        'selectors' => [
                            '{{WRAPPER}} .service-item .post-meta-item-tags a' => 'color: {{VALUE}};'
                        ],
                        'condition' => [
                            'listing_type' => 'slider'
                        ]
                    ]
                );

                $this->add_control(
                    'tags_border_color',
                    [
                        'label'     => esc_html__('Tags Border Color', 'aiero_plugin'),
                        'type'      => Controls_Manager::COLOR,
                        'selectors' => [
                            '{{WRAPPER}} .service-item .post-meta-item-tags a' => 'border-color: {{VALUE}};'
                        ],
                        'condition' => [
                            'listing_type' => 'slider'
                        ]
                    ]
                );

                $this->add_control(
                    'slider_subtitle_color',
                    [
                        'label'     => esc_html__('Subtitle Color', 'aiero_plugin'),
                        'type'      => Controls_Manager::COLOR,
                        'selectors' => [
                            '{{WRAPPER}} .service-item-link .service-item-subtitle' => 'color: {{VALUE}};'
                        ],
                        'condition' => [
                            'listing_type' => 'slider'
                        ]
                    ]
                );

                $this->add_control(
                    'slider_icon_color',
                    [
                        'label'     => esc_html__('Slider Icon Color', 'aiero_plugin'),
                        'type'      => Controls_Manager::COLOR,
                        'selectors' => [
                            '{{WRAPPER}} .service-slider-listing .service-item-icon .service-item-icon-link' => 'color: {{VALUE}};'
                        ],
                        'condition' => [
                            'listing_type' => 'slider'
                        ]
                    ]
                );

                $this->add_control(
                    'slider_icon_bg_color',
                    [
                        'label'     => esc_html__('Slider Icon Background Color', 'aiero_plugin'),
                        'type'      => Controls_Manager::COLOR,
                        'selectors' => [
                            '{{WRAPPER}} .service-slider-listing .service-item-icon .service-item-icon-link' => 'background-color: {{VALUE}};'
                        ],
                        'condition' => [
                            'listing_type' => 'slider'
                        ]
                    ]
                );

                $this->add_control(
                    'slider_icon_wrapper_bg_color',
                    [
                        'label'     => esc_html__('Slider Icon Container Background Color', 'aiero_plugin'),
                        'type'      => Controls_Manager::COLOR,
                        'alpha'     => false,
                        'selectors' => [
                            '{{WRAPPER}} .service-slider-listing .service-item-icon .service-item-icon-inner' => 'background-color: {{VALUE}};',
                            '{{WRAPPER}} .service-slider-listing .service-item-icon .service-item-icon-wrapper:before,
                             {{WRAPPER}} .service-slider-listing .service-item-icon .service-item-icon-wrapper:after' => 'box-shadow: 0 20px 0 0 {{VALUE}};'
                        ],
                        'condition' => [
                            'listing_type' => 'slider'
                        ]
                    ]
                );


            $this->end_controls_tab();

            // ------ Hover Tab ------ //
            $this->start_controls_tab(
                'tab_content_colors_hover',
                [
                    'label' => esc_html__('Hover', 'aiero_plugin')
                ]
            );

                $this->add_control(
                    'service_title_hover',
                    [
                        'label'     => esc_html__('Title Color', 'aiero_plugin'),
                        'type'      => Controls_Manager::COLOR,
                        'selectors' => [
                            '{{WRAPPER}} .service-item .service-post-title a:hover,
                             {{WRAPPER}} .style-type-2 .service-item:hover .service-post-title a,
                             {{WRAPPER}}.service-list-listing .service-item .service-post-title .service-post-inner-alt' => 'color: {{VALUE}};'
                        ]
                    ]
                );

                $this->add_group_control(
                    Group_Control_Background::get_type(),
                    [
                        'name' => 'service_title_hover_gradient',
                        'fields_options' => [
                            'background' => [
                                'label' => esc_html__( 'Title Hover Color Gradient', 'aiero_plugin' )
                            ]                    
                        ],
                        'types' => [ 'gradient' ],
                        'selector' => '{{WRAPPER}} .service-list-listing .service-item .service-post-inner-alt',
                        'condition' => [
                            'listing_type' => 'list',
                            'title_hover_color_style' => 'gradient'
                        ]
                    ]
                );

                $this->add_control(
                    'service_excerpt_hover',
                    [
                        'label'     => esc_html__('Excerpt Color', 'aiero_plugin'),
                        'type'      => Controls_Manager::COLOR,
                        'selectors' => [
                            '{{WRAPPER}} .service-item:hover .service-item-excerpt' => 'color: {{VALUE}};'
                        ],
                        'condition' => [
                            'listing_type' => 'grid'
                        ]
                    ]
                );

                $this->add_control(
                    'tags_color_hover',
                    [
                        'label'     => esc_html__('Tags Color', 'aiero_plugin'),
                        'type'      => Controls_Manager::COLOR,
                        'selectors' => [
                            '{{WRAPPER}} .service-item .post-meta-item-tags a:hover' => 'color: {{VALUE}};'
                        ],
                        'condition' => [
                            'listing_type' => 'slider'
                        ]
                    ]
                );

                $this->add_control(
                    'tags_border_color_hover',
                    [
                        'label'     => esc_html__('Tags Border Color', 'aiero_plugin'),
                        'type'      => Controls_Manager::COLOR,
                        'selectors' => [
                            '{{WRAPPER}} .service-item .post-meta-item-tags a:hover' => 'border-color: {{VALUE}};'
                        ],
                        'condition' => [
                            'listing_type' => 'slider'
                        ]
                    ]
                );

                $this->add_control(
                    'slider_subtitle_color_hover',
                    [
                        'label'     => esc_html__('Subtitle Color', 'aiero_plugin'),
                        'type'      => Controls_Manager::COLOR,
                        'selectors' => [
                            '{{WRAPPER}} .service-item-link:hover .service-item-subtitle' => 'color: {{VALUE}};'
                        ],
                        'condition' => [
                            'listing_type' => 'slider'
                        ]
                    ]
                );

                $this->add_control(
                    'slider_icon_color_hover',
                    [
                        'label'     => esc_html__('Slider Icon Color', 'aiero_plugin'),
                        'type'      => Controls_Manager::COLOR,
                        'selectors' => [
                            '{{WRAPPER}} .service-slider-listing .service-item-icon .service-item-icon-link:hover' => 'color: {{VALUE}};'
                        ],
                        'condition' => [
                            'listing_type' => 'slider'
                        ]
                    ]
                );

                $this->add_control(
                    'slider_icon_bg_color_hover',
                    [
                        'label'     => esc_html__('Slider Icon Background Color', 'aiero_plugin'),
                        'type'      => Controls_Manager::COLOR,
                        'selectors' => [
                            '{{WRAPPER}} .service-slider-listing .service-item-icon .service-item-icon-link:hover' => 'background-color: {{VALUE}};'
                        ],
                        'condition' => [
                            'listing_type' => 'slider'
                        ]
                    ]
                );


            $this->end_controls_tab();

        $this->end_controls_tabs();        

        $this->end_controls_section();


        // ------------------------------------- //
        // ---------- Button Settings ---------- //
        // ------------------------------------- //
        $this->start_controls_section(
            'section_settings',
            [
                'label' => esc_html__('Button Settings', 'aiero_plugin'),
                'tab'   => Controls_Manager::TAB_STYLE,
                'condition' => [
                	'listing_type' => 'grid'
                ]
            ]
        );

        $this->add_group_control(
            Group_Control_Typography::get_type(),
            [
                'name'      => 'button_typography',
                'label'     => esc_html__('Button Typography', 'aiero_plugin'),
                'selector'  => '{{WRAPPER}} .aiero-button'
            ]
        );

        $this->add_control(
            'button_border_width',
            [
                'label' => esc_html__( 'Border Width', 'aiero_plugin' ),
                'type' => Controls_Manager::SLIDER,
                'size_units' => [ 'px', 'em', 'rem'],
                'selectors' => [
                    '{{WRAPPER}} .aiero-button' => 'border-width: {{SIZE}}{{UNIT}};',
                    '{{WRAPPER}} .aiero-button' => '--button-border-width: {{SIZE}}{{UNIT}};',                    
                ],
            ]
        );

        $this->add_control(
            'button_border_radius',
            [
                'label' => esc_html__( 'Border Radius', 'aiero_plugin' ),
                'type' => Controls_Manager::DIMENSIONS,
                'size_units' => [ 'px', '%', 'em', 'rem', 'custom' ],
                'selectors' => [
                    '{{WRAPPER}} .aiero-button' => 'border-radius: {{TOP}}{{UNIT}} {{RIGHT}}{{UNIT}} {{BOTTOM}}{{UNIT}} {{LEFT}}{{UNIT}};',
                ],
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
                            '{{WRAPPER}} .aiero-button' => 'color: {{VALUE}};'
                        ]
                    ]
                );

                $this->add_control(
                    'button_border_color',
                    [
                        'label'     => esc_html__('Button Border Color', 'aiero_plugin'),
                        'type'      => Controls_Manager::COLOR,
                        'selectors' => [
                            '{{WRAPPER}} .aiero-button' => 'border-color: {{VALUE}};'
                        ],
                        'condition' => [
                            'button_border_style' => 'solid'
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
                        'selector' => '{{WRAPPER}} .aiero-button:after',
                        'condition' => [
                            'button_border_style' => 'gradient'
                        ]
                    ]
                );

                $this->add_control(
                    'button_background_color',
                    [
                        'label'     => esc_html__('Button Background Color', 'aiero_plugin'),
                        'type'      => Controls_Manager::COLOR,
                        'selectors' => [
                            '{{WRAPPER}} .aiero-button' => 'background-color: {{VALUE}};'
                        ],
                        'condition' => [
                            'button_background_style' => 'solid'
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
                            'button_background_style' => 'gradient'
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
                        'condition' => [
                            'button_border_style' => 'solid'
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
                        'selector' => '{{WRAPPER}} .aiero-button:hover:after',
                        'condition' => [
                            'button_border_style' => 'gradient'
                        ]
                    ]
                );

                $this->add_control(
                    'button_background_color_hover',
                    [
                        'label'     => esc_html__('Button Background Color', 'aiero_plugin'),
                        'type'      => Controls_Manager::COLOR,
                        'selectors' => [
                            '{{WRAPPER}} .aiero-button:hover' => 'background-color: {{VALUE}};'
                        ],
                        'condition' => [
                            'button_background_style' => 'solid'
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
                            'button_background_style' => 'gradient'
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

        $this->add_responsive_control(
            'button_padding',
            [
                'label'         => esc_html__('Button Padding', 'aiero_plugin'),
                'type'          => Controls_Manager::DIMENSIONS,
                'size_units'    => ['px', '%'],
                'selectors'     => [
                    '{{WRAPPER}} .button-container .aiero-button' => 'padding: {{TOP}}{{UNIT}} {{RIGHT}}{{UNIT}} {{BOTTOM}}{{UNIT}} {{LEFT}}{{UNIT}};'
                ]
            ]
        );

        $this->end_controls_section();


        // ----------------------------------------- //
        // ---------- Pagination Settings ---------- //
        // ----------------------------------------- //
        $this->start_controls_section(
            'pagination_settings_section',
            [
                'label'     => esc_html__('Pagination Settings', 'aiero_plugin'),
                'tab'       => Controls_Manager::TAB_STYLE,
                'condition' => [
                    'show_pagination'   => 'yes',
                    'listing_type!'      => 'slider'
                ]
            ]
        );

        $this->add_group_control(
            Group_Control_Typography::get_type(),
            [
                'name'      => 'pagination_typography',
                'label'     => esc_html__('Pagination Typography', 'aiero_plugin'),
                'selector'  => '{{WRAPPER}} .content-pagination .page-numbers, {{WRAPPER}} .content-pagination .post-page-numbers'
            ]
        );

        $this->add_control(
            'pagination_bd_style',
            [
                'label' => esc_html__( 'Pagination Border Style', 'aiero_plugin' ),
                'type' => Controls_Manager::SELECT,
                'default' => 'gradient',
                'options' => [
                    'gradient' => esc_html__( 'Gradient', 'aiero_plugin' ),
                    'solid' => esc_html__( 'Solid', 'aiero_plugin' ),
                ],
                'prefix_class' => 'listing-pagination-border-style-',
            ]
        );

        $this->add_control(
            'pagination_bg_style',
            [
                'label' => esc_html__( 'Pagination Background Style', 'aiero_plugin' ),
                'type' => Controls_Manager::SELECT,
                'default' => 'gradient',
                'options' => [
                    'gradient' => esc_html__( 'Gradient', 'aiero_plugin' ),
                    'solid' => esc_html__( 'Solid', 'aiero_plugin' ),
                ],
                'prefix_class' => 'listing-pagination-background-style-',
            ]
        );

        $this->start_controls_tabs('pagination_settings_tabs', [
            'condition' => [
                'show_pagination' => 'yes'
            ]
        ]);
            // ------ Normal Tab ------ //
            $this->start_controls_tab(
                'tab_pagination_normal',
                [
                    'label'     => esc_html__('Normal', 'aiero_plugin')
                ]
            );

                $this->add_control(
                    'pagination_color',
                    [
                        'label'     => esc_html__('Pagination Text Color', 'aiero_plugin'),
                        'type'      => Controls_Manager::COLOR,
                        'selectors' => [
                            '{{WRAPPER}} .content-pagination .page-numbers:not(.current):not(:hover), {{WRAPPER}} .content-pagination .post-page-numbers:not(.current):not(:hover)' => 'color: {{VALUE}};'
                        ],
                    ]
                );

                $this->add_control(
                    'pagination_border_color',
                    [
                        'label'     => esc_html__('Pagination Border Color', 'aiero_plugin'),
                        'type'      => Controls_Manager::COLOR,
                        'selectors' => [
                            '{{WRAPPER}} .content-pagination .page-numbers:not(.current):not(:hover), {{WRAPPER}} .content-pagination .post-page-numbers:not(.current):not(:hover)' => 'border-color: {{VALUE}};'
                        ],
                        'condition' => [
                            'pagination_bd_style' => 'solid'
                        ]
                    ]
                );

                $this->add_group_control(
                    Group_Control_Background::get_type(),
                    [
                        'name' => 'pagination_border_color_gradient',
                        'fields_options' => [
                            'background' => [
                                'label' => esc_html__( 'Border Color Gradient', 'aiero_plugin' )
                            ]                    
                        ],
                        'types' => [ 'gradient' ],
                        'selector' => '{{WRAPPER}} .content-pagination .page-numbers:not(.current):not(:hover):after, {{WRAPPER}} .content-pagination .post-page-numbers:not(.current):not(:hover):after',
                        'condition' => [
                            'pagination_bd_style' => 'gradient'
                        ]
                    ]
                );

                $this->add_control(
                    'pagination_background_color',
                    [
                        'label'     => esc_html__('Pagination Background Color', 'aiero_plugin'),
                        'type'      => Controls_Manager::COLOR,
                        'selectors' => [
                            '{{WRAPPER}} .content-pagination .page-numbers:not(.current):not(:hover), {{WRAPPER}} .content-pagination .post-page-numbers:not(.current):not(:hover)' => 'background-color: {{VALUE}};'
                        ],
                        'condition' => [
                            'pagination_bg_style' => 'solid'
                        ]
                    ]
                );

                $this->add_group_control(
                    Group_Control_Background::get_type(),
                    [
                        'name' => 'pagination_bg_color_gradient',
                        'fields_options' => [
                            'background' => [
                                'label' => esc_html__( 'Background Color Gradient', 'aiero_plugin' )
                            ]                    
                        ],
                        'types' => [ 'gradient' ],
                        'selector' => '{{WRAPPER}} .content-pagination .page-numbers .button-inner:before, {{WRAPPER}} .content-pagination .post-page-numbers .button-inner:before',
                        'condition' => [
                            'pagination_bg_style' => 'gradient'
                        ]
                    ]
                );

                $this->add_group_control(
                    Group_Control_Box_Shadow::get_type(),
                    [
                        'name'      => 'pagination_shadow',
                        'label'     => esc_html__('Item Shadow', 'aiero_plugin'),
                        'selector'  => '{{WRAPPER}} .content-pagination .page-numbers:not(.current):not(:hover), {{WRAPPER}} .content-pagination .post-page-numbers:not(.current):not(:hover)'
                    ]
                );

            $this->end_controls_tab();

            // ------ Hover Tab ------ //
            $this->start_controls_tab(
                'tab_pagination_active',
                [
                    'label'     => esc_html__('Active', 'aiero_plugin')
                ]
            );

                $this->add_control(
                    'pagination_color_active',
                    [
                        'label'     => esc_html__('Pagination Text Color', 'aiero_plugin'),
                        'type'      => Controls_Manager::COLOR,
                        'selectors' => [
                            '{{WRAPPER}} .content-pagination .page-numbers.current, {{WRAPPER}} .content-pagination .post-page-numbers.current, {{WRAPPER}} .content-pagination .page-numbers:hover, {{WRAPPER}} .content-pagination .post-page-numbers:hover' => 'color: {{VALUE}};'
                        ],
                    ]
                );

                $this->add_control(
                    'pagination_border_color_active',
                    [
                        'label'     => esc_html__('Pagination Border Color', 'aiero_plugin'),
                        'type'      => Controls_Manager::COLOR,
                        'selectors' => [
                            '{{WRAPPER}} .content-pagination .page-numbers.current, {{WRAPPER}} .content-pagination .post-page-numbers.current, {{WRAPPER}} .content-pagination .page-numbers:hover, {{WRAPPER}} .content-pagination .post-page-numbers:hover' => 'border-color: {{VALUE}};'
                        ],
                        'condition' => [
                            'pagination_bd_style' => 'solid'
                        ]
                    ]
                );

                $this->add_group_control(
                    Group_Control_Background::get_type(),
                    [
                        'name' => 'pagination_border_color_gradient_active',
                        'fields_options' => [
                            'background' => [
                                'label' => esc_html__( 'Border Color Gradient', 'aiero_plugin' )
                            ]                    
                        ],
                        'types' => [ 'gradient' ],
                        'selector' => '{{WRAPPER}} .content-pagination .page-numbers.current:after, {{WRAPPER}} .content-pagination .page-numbers:hover:after, {{WRAPPER}} .content-pagination .post-page-numbers.current:after, {{WRAPPER}} .content-pagination .post-page-numbers:hover:after',
                        'condition' => [
                            'pagination_bd_style' => 'gradient'
                        ]
                    ]
                );

                $this->add_control(
                    'pagination_background_color_active',
                    [
                        'label'     => esc_html__('Pagination Background Color', 'aiero_plugin'),
                        'type'      => Controls_Manager::COLOR,
                        'selectors' => [
                            '{{WRAPPER}} .content-pagination .page-numbers.current, {{WRAPPER}} .content-pagination .post-page-numbers.current, {{WRAPPER}} .content-pagination .page-numbers:hover, {{WRAPPER}} .content-pagination .post-page-numbers:hover' => 'background-color: {{VALUE}};'
                        ],
                        'condition' => [
                            'pagination_bg_style' => 'solid'
                        ]
                    ]
                );

                $this->add_group_control(
                    Group_Control_Background::get_type(),
                    [
                        'name' => 'pagination_bg_color_gradient_active',
                        'fields_options' => [
                            'background' => [
                                'label' => esc_html__( 'Background Color Gradient', 'aiero_plugin' )
                            ]                    
                        ],
                        'types' => [ 'gradient' ],
                        'selector' => '{{WRAPPER}} .content-pagination .page-numbers .button-inner:after, {{WRAPPER}} .content-pagination .post-page-numbers .button-inner:after',
                        'condition' => [
                            'pagination_bg_style' => 'gradient'
                        ]
                    ]
                );

                $this->add_group_control(
                    Group_Control_Box_Shadow::get_type(),
                    [
                        'name'      => 'pagination_shadow_active',
                        'label'     => esc_html__('Item Shadow', 'aiero_plugin'),
                        'selector'  => '{{WRAPPER}} .content-pagination .page-numbers.current, {{WRAPPER}} .content-pagination .post-page-numbers.current, {{WRAPPER}} .content-pagination .page-numbers:hover, {{WRAPPER}} .content-pagination .post-page-numbers:hover'
                    ]
                );

            $this->end_controls_tab();
        $this->end_controls_tabs();

        $this->end_controls_section();

        // ----------------------------------------- //
        // ---------- Slider Nav Settings ---------- //
        // ----------------------------------------- //
        $this->start_controls_section(
            'slider_nav_settings_section',
            [
                'label'         => esc_html__('Slider Navigation Settings', 'aiero_plugin'),
                'tab'           => Controls_Manager::TAB_STYLE,
                'condition' => [
                    'listing_type'  => 'slider'
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
        $settings       = $this->get_settings();

        $listing_type           = $settings['listing_type'];
        $style_type             = $settings['style_type'];
        $post_order_by          = $settings['post_order_by'];
        $post_order             = $settings['post_order'];
        $filter_by              = $settings['filter_by'];
        $categories             = $settings['categories'];
        $services               = $settings['services'];
        $pagination             = $settings['show_pagination'];
        $paged                  = isset( $_GET[esc_attr($this->get_id()) . '-paged'] ) && $pagination == 'yes' ? (int)$_GET[esc_attr($this->get_id()) . '-paged'] : 1;

        $grid_columns_number    = $settings['grid_columns_number'];
        $grid_posts_per_page    = $settings['grid_posts_per_page'];
        $list_posts_per_page    = $settings['list_posts_per_page'];
        $excerpt_length         = $settings['excerpt_length'];
        $show_media             = $settings['show_media'];
        $show_read_more         = $settings['show_read_more'];
        $read_more_text         = $settings['read_more_text'];
        $icon_type              = $settings['icon_type'];
        $title_hover_color_style = $settings['title_hover_color_style'];

        $title          = $settings['title'];
        $title_tag      = $settings['title_tag'];
        $add_subtitle   = $settings['add_subtitle'];
        $subtitle       = $settings['subtitle'];

        $slider_columns_number = $settings['slider_columns_number'];
        $dots           = $settings['dots'];
        $nav            = $settings['nav'];

        $widget_class           = 'aiero-service-listing-widget';
        $wrapper_class          = 'archive-listing-wrapper service-listing-wrapper';

        global $wp;
        $base = home_url($wp->request);

        $query_options          = [
            'post_type'             => 'aiero_service',
            'ignore_sticky_posts'   => true,
            'orderby'               => sanitize_key($post_order_by),
            'order'                 => sanitize_key($post_order),
            'link_base'             => esc_url($base)            
        ];

        if ( $filter_by == 'cat' ) {
            $query_options = array_merge($query_options, [
                'aiero_services_category'  => $categories
            ]);
        } elseif ( $filter_by == 'id' ) {
            $query_options = array_merge($query_options, [
                'post__in'          => $services
            ]);
        };

        $widget_options     = array(
            'listing_type'          => $listing_type,
            'item_class'            => 'service-item-wrapper'            
        );

        $wrapper_attr = '';

        if( $listing_type == 'grid' ) {
            $wrapper_class .= ' service-grid-listing' . ( !empty($grid_columns_number) ? ' columns-' . esc_attr($grid_columns_number) : '' );
            $wrapper_class .= ( !empty($style_type) ? ' style-' . esc_attr($style_type) : '' );
            $widget_options = array_merge($widget_options, array(
                'columns_number'        => absint($grid_columns_number),
                'excerpt_length'        => $excerpt_length,
                'show_media'            => $show_media,
                'show_read_more'        => $show_read_more,
                'read_more_text'        => $read_more_text,
                'icon_type'             => $icon_type,
                'show_pagination'       => $pagination
            ));
            $query_options      = array_merge($query_options, [
                'posts_per_page'        => ( !empty($grid_posts_per_page) ? $grid_posts_per_page : -1 ),
                'paged'                 => $paged               
            ]);
        } elseif ($listing_type == 'list') {
            if($title_hover_color_style == 'gradient') {
                $widget_class .= ' aiero-title-hover-color-style-gradient';
            }
            $wrapper_class .= ' service-list-listing';
            $widget_options = array_merge($widget_options, array(
                'show_pagination'       => $pagination
            ));
            $query_options      = array_merge($query_options, [
                'posts_per_page'        => ( !empty($list_posts_per_page) ? $list_posts_per_page : -1 ),
                'paged'                 => $paged
            ]);
        } else {
            $widget_id      = $this->get_id();

            $items = !empty($slider_columns_number) ? (int)$slider_columns_number : 1;

            $slider_options = [
                'items'                 => $items,
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

            $widget_options     = array_merge($widget_options, array(
                'columns_number'       => absint($items)
            ));
            $query_options      = array_merge($query_options, [
                'posts_per_page'        => -1
            ]);
            $wrapper_attr       = ' data-slider-options=' . esc_attr(wp_json_encode($slider_options));
            $wrapper_class      .= ' service-slider-listing owl-carousel owl-theme';
        }  

        $query = new \WP_Query($query_options);
        $ajax_data = wp_json_encode($query_options);
        $widget_data = wp_json_encode($widget_options);

        // ------------------------------------ //
        // ---------- Widget Content ---------- //
        // ------------------------------------ //
        ?>

        <div class="<?php echo esc_attr($widget_class); ?>">
            <?php
                if ( $listing_type == 'slider' && !empty($title) ) {
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
                if( $listing_type == 'slider' && 'yes' === $nav && empty($title) ) {
                    echo '<div class="owl-nav owl-nav-' . esc_attr($widget_id) . '"></div>';
                }
            ?>

            <div class="archive-listing" data-ajax='<?php echo esc_attr($ajax_data); ?>' data-widget='<?php echo esc_attr($widget_data); ?>'>
                <div class="<?php echo esc_attr($wrapper_class); ?>"<?php echo esc_html($wrapper_attr); ?>>
                    <?php
                        if($listing_type == 'list') {
                            $counter = 0;
                        }
                        while( $query->have_posts() ){
                            $query->the_post();
                            if($listing_type == 'list') {
                                $counter++;
                                $widget_options['item_counter'] = $counter;
                            }
                            get_template_part('content', 'aiero_service', $widget_options);
                        };
                        wp_reset_postdata();
                    ?>
                </div>

                <?php
                    if ( $pagination == 'yes' && $listing_type != 'slider' && $query->max_num_pages > 1 ) {
                        echo '<div class="content-pagination">';
                            echo '<nav class="navigation pagination" role="navigation">';
                                echo '<h2 class="screen-reader-text">' . esc_html__('Pagination', 'aiero_plugin') . '</h2>';
                                echo '<div class="nav-links">';                        
                                    echo paginate_links( array(
                                        'format'    => '?' . esc_attr($this->get_id()) . '-paged=%#%',
                                        'current'   => max( 1, $paged ),
                                        'total'     => $query->max_num_pages,
                                        'end_size'  => 2,
                                        'before_page_number' => '<span class="button-inner"></span>',
                                        'prev_text' => esc_html__('Previous', 'aiero_plugin') . '<span class="button-inner"></span><span class="icon-button-arrow"></span></span>',
                                        'next_text' => esc_html__('Next', 'aiero_plugin') . '<span class="button-inner"></span><span class="icon-button-arrow"></span></span>'
                                    ) );
                                echo '</div>';
                            echo '</nav>';
                        echo '</div>';
                    }
                ?>
            </div>

        </div>
        <?php
    }

    protected function content_template() {}

    public function render_plain_content() {}
}