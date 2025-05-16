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
use Elementor\Group_Control_Css_Filter;
use Elementor\REPEATER;
use Elementor\Utils;

if ( ! defined( 'ABSPATH' ) ) exit; // Exit if accessed directly

class Aiero_Projects_Listing_Widget extends Widget_Base {

    public function get_name() {
        return 'aiero_projects_listing';
    }

    public function get_title() {
        return esc_html__('Projects Listing', 'aiero_plugin');
    }

    public function get_icon() {
        return 'eicon-gallery-justified';
    }

    public function get_categories() {
        return ['aiero_widgets'];
    }

    public function get_script_depends() {
        return ['aat', 'elementor_widgets', 'wp-mediaelement'];
    }

    public function get_style_depends() {
        return ['wp-mediaelement'];
    }

    protected function register_controls() {

        // ----------------------------- //
        // ---------- Content ---------- //
        // ----------------------------- //
        $this->start_controls_section(
            'section_content_settings',
            [
                'label'         => esc_html__('Projects Listing', 'aiero_plugin')
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
                    'masonry'       => esc_html__('Masonry', 'aiero_plugin'),
                    'slider'        => esc_html__('Slider', 'aiero_plugin'),
                    'modern'        => esc_html__('Modern', 'aiero_plugin'),
                    'cards'         => esc_html__('Cards', 'aiero_plugin'),
                ]
            ]
        );

        $this->add_control(
            'content_type',
            [
                'label'         => esc_html__('Content Type', 'aiero_plugin'),
                'type'          => Controls_Manager::SELECT,
                'default'       => '',
                'options'       => [
                    ''              => esc_html__('Default', 'aiero_plugin'),
                    'audio'         => esc_html__('Audio', 'aiero_plugin'),
                ],
                'condition'     => [
                    'listing_type'  => 'slider'
                ]
            ]
        );

        $this->add_control(
            'text_position',
            [
                'label'         => esc_html__('Content Position', 'aiero_plugin'),
                'type'          => Controls_Manager::SELECT,
                'default'       => 'outside',
                'options'       => [
                    'inside'        => esc_html__('Inside', 'aiero_plugin'),
                    'outside'       => esc_html__('Outside', 'aiero_plugin')
                ],
                'condition'     => [
                    'listing_type'  => ['masonry', 'grid']
                ]
            ]
        );

        $this->add_control(
            'title',
            [
                'label'         => esc_html__('Title', 'aiero_plugin'),
                'type'          => Controls_Manager::WYSIWYG,
                'condition'     => [
                    'listing_type'  => 'slider'
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
                'condition'     => [
                    'listing_type'  => 'slider'
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
                    'add_subtitle'  => 'yes',
                    'listing_type'  => 'slider'
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
                    'listing_type'  => 'slider'
                ]
            ]
        );

        $this->add_responsive_control(
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
                'toggle'        => false,
                'condition'     => [
                    'listing_type'  => 'slider'
                ]
            ]
        );

        $this->add_control(
            'add_button',
            [
                'label'         => esc_html__('Add Button', 'aiero_plugin'),
                'type'          => Controls_Manager::SWITCHER,
                'default'       => '',
                'return_value'  => 'yes',
                'label_off'     => esc_html__('No', 'aiero_plugin'),
                'label_on'      => esc_html__('Yes', 'aiero_plugin'),
                'condition'     => [
                    'listing_type'  => 'slider'
                ]
            ]
        );

        $this->add_control(
            'button_text',
            [
                'label'     => esc_html__('Button Text', 'aiero_plugin'),
                'type'      => Controls_Manager::TEXT,
                'default'   => esc_html__('Button', 'aiero_plugin'),
                'condition'     => [
                    'listing_type'  => 'slider',
                    'add_button'    => 'yes'
                ]
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
                'placeholder'   => esc_html__( 'http://your-link.com', 'aiero_plugin' ),
                'condition'     => [
                    'listing_type'  => 'slider',
                    'add_button'    => 'yes'
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
                ],
                'separator'     => 'before'
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
                'options'       => aiero_get_all_taxonomy_terms('aiero_project', 'aiero_project_category'),
                'condition'     => [
                    'filter_by'     => 'cat'
                ]
            ]
        );

        $this->add_control(
            'projects',
            [
                'label'         => esc_html__('Choose Projects', 'aiero_plugin'),
                'type'          => Controls_Manager::SELECT2,
                'options'       => aiero_get_all_post_list('aiero_project'),
                'label_block'   => true,
                'multiple'      => true,
                'condition'     => [
                    'filter_by'     => 'id'
                ]
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
                    'filter_by'     => 'cat',
                    'listing_type!' => 'slider'
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
                'condition'     => [
                    'listing_type!'  => 'slider'
                ]
            ]
        );

        $this->add_control(
            'excerpt_length',
            [
                'label'     => esc_html__('Excerpt Length, in symbols', 'aiero_plugin'),
                'type'      => Controls_Manager::NUMBER,
                'min'       => 0,
                'default'   => 191,
                'condition' => [
                    'listing_type' => ['modern', 'slider', 'grid']
                ]
            ]
        );

        $this->add_control(
            'read_more_text',
            [
                'label'         => esc_html__('More Button Text', 'aiero_plugin'),
                'placeholder'   => esc_html__('Enter text', 'aiero_plugin'),
                'type'          => Controls_Manager::TEXT,
                'default'       => esc_html__('Explore more', 'aiero_plugin'),
                'condition' => [
                    'listing_type' => ['modern', 'slider', 'grid']
                ]
            ]
        );

        $this->add_control(
            'audio_text',
            [
                'label'         => esc_html__('Audio Button Text', 'aiero_plugin'),
                'placeholder'   => esc_html__('Enter text', 'aiero_plugin'),
                'type'          => Controls_Manager::TEXT,
                'default'       => esc_html__('Listen speech', 'aiero_plugin'),
                'condition' => [
                    'listing_type' => 'slider',
                    'content_type' => 'audio'
                ]
            ]
        );

        $this->end_controls_section();

        // ----------------------------------- //
        // ---------- Modern Settings ---------- //
        // ----------------------------------- //
        $this->start_controls_section(
            'section_modern_settings',
            [
                'label'         => esc_html__('Modern Settings', 'aiero_plugin'),
                'condition'     => [
                    'listing_type'  => 'modern'
                ]
            ]
        );

        $this->add_control(
            'modern_posts_per_page',
            [
                'label'         => esc_html__('Items Per Page', 'aiero_plugin'),
                'type'          => Controls_Manager::NUMBER,
                'default'       => 4,
                'min'           => -1
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

        $this->add_control(
            'grid_posts_per_page',
            [
                'label'         => esc_html__('Items Per Page', 'aiero_plugin'),
                'type'          => Controls_Manager::NUMBER,
                'default'       => 3,
                'min'           => -1
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
                'default'       => 3,
                'min'           => 1,
                'max'           => 6
            ]
        );

        $this->add_control(
            'masonry_posts_per_page',
            [
                'label'         => esc_html__('Items Per Page', 'aiero_plugin'),
                'type'          => Controls_Manager::NUMBER,
                'default'       => 3,
                'min'           => -1
            ]
        );

        $this->end_controls_section();

        // ----------------------------------- //
        // ---------- Cards Settings ---------- //
        // ----------------------------------- //
        $this->start_controls_section(
            'section_cards_settings',
            [
                'label'         => esc_html__('Cards Settings', 'aiero_plugin'),
                'condition'     => [
                    'listing_type'  => 'cards'
                ]
            ]
        );

        $this->add_control(
            'cards_posts_per_page',
            [
                'label'         => esc_html__('Items Per Page', 'aiero_plugin'),
                'type'          => Controls_Manager::NUMBER,
                'default'       => 3,
                'min'           => -1
            ]
        );

        $this->end_controls_section();


        // ---------------------------- //
        // ---------- Slider ---------- //
        // ---------------------------- //
        $this->start_controls_section(
            'section_slider',
            [
                'label'         => esc_html__('Slider Settings', 'aiero_plugin'),
                'condition'     => [
                    'listing_type'  => 'slider'
                ]
            ]
        );

        $this->add_control(
            'items',
            [
                'label'         => esc_html__('Visible Items', 'aiero_plugin'),
                'type'          => Controls_Manager::NUMBER,
                'default'       => 3,
                'min'           => 1,
                'max'           => 6
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
                'label'         => esc_html__('Animation Speed', 'aiero_plugin'),
                'type'          => Controls_Manager::NUMBER,
                'default'       => 500
            ]
        );

        $this->add_control(
            'infinite',
            [
                'label'         => esc_html__('Infinite Loop', 'aiero_plugin'),
                'type'          => Controls_Manager::SWITCHER,
                'label_off'     => esc_html__('No', 'aiero_plugin'),
                'label_on'      => esc_html__('Yes', 'aiero_plugin'),
                'return_value'  => 'yes',
                'default'       => 'yes',
            ]
        );

        $this->add_control(
            'autoplay',
            [
                'label'         => esc_html__('Autoplay', 'aiero_plugin'),
                'type'          => Controls_Manager::SWITCHER,
                'label_off'     => esc_html__('No', 'aiero_plugin'),
                'label_on'      => esc_html__('Yes', 'aiero_plugin'),
                'return_value'  => 'yes',
                'default'       => 'yes',
                'separator'     => 'before'
            ]
        );

        $this->add_control(
            'autoplay_speed',
            [
                'label'         => esc_html__('Autoplay Speed', 'aiero_plugin'),
                'type'          => Controls_Manager::NUMBER,
                'default'       => 300,
                'step'          => 100,
                'condition'     => [
                    'autoplay'      => 'yes'
                ]
            ]
        );

        $this->add_control(
            'autoplay_timeout',
            [
                'label'         => esc_html__('Autoplay Timeout', 'aiero_plugin'),
                'type'          => Controls_Manager::NUMBER,
                'default'       => 5000,
                'step'          => 100,
                'condition'     => [
                    'autoplay'      => 'yes'
                ]
            ]
        );

        $this->add_control(
            'pause_on_hover',
            [
                'label'         => esc_html__('Pause on Hover', 'aiero_plugin'),
                'type'          => Controls_Manager::SWITCHER,
                'label_off'     => esc_html__('No', 'aiero_plugin'),
                'label_on'      => esc_html__('Yes', 'aiero_plugin'),
                'return_value'  => 'yes',
                'default'       => 'yes',
                'condition'     => [
                    'autoplay'      => 'yes'
                ]
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
            'slider_offset',
            [
                'label'         => esc_html__('Slider Offset', 'aiero_plugin'),
                'type'          => Controls_Manager::DIMENSIONS,
                'size_units'    => ['px', '%', 'vw'],
                'selectors'     => [
                    '{{WRAPPER}} .archive-listing' => 'margin: {{TOP}}{{UNIT}} {{RIGHT}}{{UNIT}} {{BOTTOM}}{{UNIT}} {{LEFT}}{{UNIT}};',
                ],
                'condition' => [
                    'listing_type' => 'slider'
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
                    'filter_by'     => 'cat',
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
                'selector'  => '{{WRAPPER}} .filter-control-wrapper .filter-control-item'
            ]
        );

        $this->add_control(
            'filter_bd_style',
            [
                'label' => esc_html__( 'Filter Border Style', 'aiero_plugin' ),
                'type' => Controls_Manager::SELECT,
                'default' => 'gradient',
                'options' => [
                    'gradient' => esc_html__( 'Gradient', 'aiero_plugin' ),
                    'solid' => esc_html__( 'Solid', 'aiero_plugin' ),
                ],
                'prefix_class' => 'listing-filter-border-style-',
            ]
        );

        $this->add_control(
            'filter_bg_style',
            [
                'label' => esc_html__( 'Filter Background Style', 'aiero_plugin' ),
                'type' => Controls_Manager::SELECT,
                'default' => 'solid',
                'options' => [
                    'gradient' => esc_html__( 'Gradient', 'aiero_plugin' ),
                    'solid' => esc_html__( 'Solid', 'aiero_plugin' ),
                ],
                'prefix_class' => 'listing-filter-background-style-',
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
                            '{{WRAPPER}} .filter-control-wrapper .filter-control-list .dots .dot:not(:hover):not(.active)' => 'color: {{VALUE}};'
                        ],
                    ]
                );

                $this->add_control(
                    'filter_border_color',
                    [
                        'label'     => esc_html__('Filter Border Color', 'aiero_plugin'),
                        'type'      => Controls_Manager::COLOR,
                        'selectors' => [
                            '{{WRAPPER}} .filter-control-wrapper .filter-control-list .dots .dot:not(:hover):not(.active)' => 'border-color: {{VALUE}};'
                        ],
                        'condition' => [
                            'filter_bd_style' => 'solid'
                        ]
                    ]
                );

                $this->add_group_control(
                    Group_Control_Background::get_type(),
                    [
                        'name' => 'filter_border_color_gradient',
                        'fields_options' => [
                            'background' => [
                                'label' => esc_html__( 'Border Color Gradient', 'aiero_plugin' )
                            ]                    
                        ],
                        'types' => [ 'gradient' ],
                        'selector' => '{{WRAPPER}} .filter-control-wrapper .filter-control-list .dots .dot:not(:hover):not(.active):after',
                        'condition' => [
                            'filter_bd_style' => 'gradient'
                        ]
                    ]
                );

                $this->add_control(
                    'filter_background_color',
                    [
                        'label'     => esc_html__('Filter Background Color', 'aiero_plugin'),
                        'type'      => Controls_Manager::COLOR,
                        'selectors' => [
                            '{{WRAPPER}} .filter-control-wrapper .filter-control-list .dots .dot:not(:hover):not(.active)' => 'background-color: {{VALUE}};'
                        ],
                        'condition' => [
                            'filter_bg_style' => 'solid'
                        ]
                    ]
                );

                $this->add_group_control(
                    Group_Control_Background::get_type(),
                    [
                        'name' => 'filter_bg_color_gradient',
                        'fields_options' => [
                            'background' => [
                                'label' => esc_html__( 'Background Color Gradient', 'aiero_plugin' )
                            ]                    
                        ],
                        'types' => [ 'gradient' ],
                        'selector' => '{{WRAPPER}} .filter-control-wrapper .filter-control-list .dots .dot .button-inner:before',
                        'condition' => [
                            'filter_bg_style' => 'gradient'
                        ]
                    ]
                );

                $this->add_group_control(
                    Group_Control_Box_Shadow::get_type(),
                    [
                        'name'      => 'filter_shadow',
                        'label'     => esc_html__('Item Shadow', 'aiero_plugin'),
                        'selector'  => '{{WRAPPER}} .filter-control-wrapper .filter-control-list .dots .dot:not(:hover):not(.active)'
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
                            '{{WRAPPER}} .filter-control-wrapper .filter-control-list .dots .dot:hover, {{WRAPPER}} .filter-control-wrapper .filter-control-list .dots .dot.active' => 'color: {{VALUE}};'
                        ],
                    ]
                );

                $this->add_control(
                    'filter_border_color_active',
                    [
                        'label'     => esc_html__('Filter Border Color', 'aiero_plugin'),
                        'type'      => Controls_Manager::COLOR,
                        'selectors' => [
                            '{{WRAPPER}} .filter-control-wrapper .filter-control-list .dots .dot:hover, {{WRAPPER}} .filter-control-wrapper .filter-control-list .dots .dot.active' => 'border-color: {{VALUE}};'
                        ],
                        'condition' => [
                            'filter_bd_style' => 'solid'
                        ]
                    ]
                );

                $this->add_group_control(
                    Group_Control_Background::get_type(),
                    [
                        'name' => 'filter_border_color_gradient_active',
                        'fields_options' => [
                            'background' => [
                                'label' => esc_html__( 'Border Color Gradient', 'aiero_plugin' )
                            ]                    
                        ],
                        'types' => [ 'gradient' ],
                        'selector' => '{{WRAPPER}} .filter-control-wrapper .filter-control-list .dots .dot:hover:after, {{WRAPPER}} .filter-control-wrapper .filter-control-list .dots .dot.active:after',
                        'condition' => [
                            'filter_bd_style' => 'gradient'
                        ]
                    ]
                );

                $this->add_control(
                    'filter_background_color_active',
                    [
                        'label'     => esc_html__('Filter Background Color', 'aiero_plugin'),
                        'type'      => Controls_Manager::COLOR,
                        'selectors' => [
                            '{{WRAPPER}} .filter-control-wrapper .filter-control-list .dots .dot:hover, {{WRAPPER}} .filter-control-wrapper .filter-control-list .dots .dot.active' => 'background-color: {{VALUE}};'
                        ],
                        'condition' => [
                            'filter_bg_style' => 'solid'
                        ]
                    ]
                );

                $this->add_group_control(
                    Group_Control_Background::get_type(),
                    [
                        'name' => 'filter_bg_color_gradient_active',
                        'fields_options' => [
                            'background' => [
                                'label' => esc_html__( 'Background Color Gradient', 'aiero_plugin' )
                            ]                    
                        ],
                        'types' => [ 'gradient' ],
                        'selector' => '{{WRAPPER}} .filter-control-wrapper .filter-control-list .dots .dot .button-inner:after',
                        'condition' => [
                            'filter_bg_style' => 'gradient'
                        ]
                    ]
                );

                $this->add_group_control(
                    Group_Control_Box_Shadow::get_type(),
                    [
                        'name'      => 'filter_shadow_active',
                        'label'     => esc_html__('Item Shadow', 'aiero_plugin'),
                        'selector'  => '{{WRAPPER}} .filter-control-wrapper .filter-control-list .dots .dot:hover, {{WRAPPER}} .filter-control-wrapper .filter-control-list .dots .dot.active'
                    ]
                );

            $this->end_controls_tab();
        $this->end_controls_tabs();

        $this->end_controls_section();


        // ------------------------------------ //
        // ---------- Title Settings ---------- //
        // ------------------------------------ //
        $this->start_controls_section(
            'title_settings_section',
            [
                'label'     => esc_html__('Title Settings', 'aiero_plugin'),
                'tab'       => Controls_Manager::TAB_STYLE,
                'condition' => [
                    'listing_type'  => 'slider'
                ]
            ]
        );

        $this->add_group_control(
            Group_Control_Typography::get_type(),
            [
                'name'      => 'title_typography',
                'label'     => esc_html__('Heading Typography', 'aiero_plugin'),
                'selector'  => '{{WRAPPER}} .aiero-heading .aiero-heading-content'
            ]
        );

        $this->add_control(
            'title_color',
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

        $this->add_group_control(
            Group_Control_Text_Shadow::get_type(),
            [
                'name'      => 'title_shadow',
                'label'     => esc_html__('Heading Text Shadow', 'aiero_plugin'),
                'selector'  => '{{WRAPPER}} .aiero-heading .aiero-heading-content'
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
            'item_height',
            [
                'label'     => esc_html__('Slide Height', 'aiero_plugin'),
                'type'      => Controls_Manager::SLIDER,
                'range'     => [
                    'px'        => [
                        'min'       => 0,
                        'max'       => 1200
                    ]
                ],
                'default'   => [
                    'unit'      => 'px',
                    'size'      => 430
                ],
                'selectors' => [
                    '{{WRAPPER}} .project-listing-wrapper.owl-carousel .project-item' => 'height: {{SIZE}}{{UNIT}};'
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
                        'max'       => 80
                    ]
                ],
                'default'   => [
                    'unit'      => 'px',
                    'size'      => 40
                ],
                'selectors' => [
                    '{{WRAPPER}} .project-listing-wrapper.project-grid-listing.text-position-outside, {{WRAPPER}} .project-listing-wrapper.project-masonry-listing.text-position-outside' =>
                        'margin-left: calc(-{{SIZE}}{{UNIT}}/2); margin-right: calc(-{{SIZE}}{{UNIT}}/2);',
                    '{{WRAPPER}} .project-listing-wrapper.project-grid-listing.text-position-outside .project-item-wrapper, {{WRAPPER}} .project-listing-wrapper.project-masonry-listing.text-position-outside .project-item-wrapper' => 'padding-left: calc({{SIZE}}{{UNIT}}/2); padding-right: calc({{SIZE}}{{UNIT}}/2);',

                    '{{WRAPPER}} .project-listing-wrapper.owl-carousel' => 'margin-left: calc(-{{SIZE}}{{UNIT}}/2); margin-right: calc(-{{SIZE}}{{UNIT}}/2); width: calc(100% + {{SIZE}}{{UNIT}});',
                    '{{WRAPPER}} .project-listing-wrapper.owl-carousel .project-item-wrapper' => 'padding-left: calc({{SIZE}}{{UNIT}}/2); padding-right: calc({{SIZE}}{{UNIT}}/2);',

                    '{{WRAPPER}} .project-listing-wrapper.project-masonry-listing.text-position-inside, {{WRAPPER}} .project-listing-wrapper.project-grid-listing.text-position-inside' => 'margin: calc(-{{SIZE}}{{UNIT}}/2);',
                    '{{WRAPPER}} .project-listing-wrapper.project-grid-listing.text-position-inside .project-item-wrapper' => 'padding: calc({{SIZE}}{{UNIT}}/2);',
                    '{{WRAPPER}} .project-listing-wrapper.project-masonry-listing.text-position-inside .project-item-link' => 'top: calc({{SIZE}}{{UNIT}}/2); bottom: calc({{SIZE}}{{UNIT}}/2); left: calc({{SIZE}}{{UNIT}}/2); right: calc({{SIZE}}{{UNIT}}/2);',
                    '{{WRAPPER}} .project-listing-wrapper.project-cards-listing' => 'margin-bottom: -{{SIZE}}{{UNIT}};',
                    '{{WRAPPER}} .project-listing-wrapper.project-cards-listing .project-item-wrapper' => 'padding-bottom: {{SIZE}}{{UNIT}};',
                ],
                'condition' => [
                    'listing_type!' => 'modern'
                ]
            ]
        );

        $this->add_responsive_control(
            'slider_item_padding',
            [
                'label'         => esc_html__('Item Content Padding', 'aiero_plugin'),
                'type'          => Controls_Manager::DIMENSIONS,
                'size_units'    => ['px', '%'],
                'selectors'     => [
                    '{{WRAPPER}} .owl-carousel .project-item .project-item-content' => 'padding: {{TOP}}{{UNIT}} {{RIGHT}}{{UNIT}} {{BOTTOM}}{{UNIT}} {{LEFT}}{{UNIT}};',
                ],
                'condition' => [
                    'listing_type' => 'slider'
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
                    '{{WRAPPER}} .project-listing-wrapper .project-item-link .project-item-media' => 'border-radius: {{TOP}}{{UNIT}} {{RIGHT}}{{UNIT}} {{BOTTOM}}{{UNIT}} {{LEFT}}{{UNIT}};',
                    '{{WRAPPER}} .project-listing-wrapper.owl-carousel .project-item' => 'border-radius: {{TOP}}{{UNIT}} {{RIGHT}}{{UNIT}} {{BOTTOM}}{{UNIT}} {{LEFT}}{{UNIT}};',               
                ],
                'condition' => [
                    'listing_type!' => 'modern'
                ]
            ]
        );

        $this->add_responsive_control(
            'item_heading_padding',
            [
                'label' => esc_html__( 'Heading Padding', 'aiero_plugin' ),
                'type' => Controls_Manager::DIMENSIONS,
                'size_units' => [ 'px', '%', 'em', 'rem', 'custom' ],
                'selectors' => [
                    '{{WRAPPER}} .project-item-modern-header' => 'padding: {{TOP}}{{UNIT}} {{RIGHT}}{{UNIT}} {{BOTTOM}}{{UNIT}} {{LEFT}}{{UNIT}};',
                ],
                'condition' => [
                    'listing_type' => 'modern'
                ]
            ]
        );

        $this->add_responsive_control(
            'item_title_padding',
            [
                'label' => esc_html__( 'Title Padding', 'aiero_plugin' ),
                'type' => Controls_Manager::DIMENSIONS,
                'size_units' => [ 'px', '%', 'em', 'rem', 'custom' ],
                'selectors' => [
                    '{{WRAPPER}} .project-item-modern-title' => 'padding: {{TOP}}{{UNIT}} {{RIGHT}}{{UNIT}} {{BOTTOM}}{{UNIT}} {{LEFT}}{{UNIT}};',
                ],
                'condition' => [
                    'listing_type' => 'modern'
                ]
            ]
        );

        $this->add_responsive_control(
            'image_border_radius',
            [
                'label' => esc_html__( 'Image Border Radius', 'aiero_plugin' ),
                'type' => Controls_Manager::DIMENSIONS,
                'size_units' => [ 'px', '%', 'em', 'rem', 'custom' ],
                'selectors' => [
                    '{{WRAPPER}} .project-modern-listing .project-item-media img' => 'border-radius: {{TOP}}{{UNIT}} {{RIGHT}}{{UNIT}} {{BOTTOM}}{{UNIT}} {{LEFT}}{{UNIT}};',
                ],
                'condition' => [
                    'listing_type' => 'modern'
                ]
            ]
        );

        $this->add_group_control(
            Group_Control_Border::get_type(),
            [
                'name' => 'slider_item_bd',
                'fields_options' => [
                    'border' => [
                        'label' => esc_html__( 'Item Border', 'aiero_plugin' )
                    ]                    
                ],
                'selector' => '{{WRAPPER}} .owl-carousel.project-slider-listing .project-item',
                'condition' => [
                    'listing_type'  => 'slider'
                ]
            ]
        );

        $this->add_group_control(
            Group_Control_Background::get_type(),
            [
                'name' => 'slider_item_bg',
                'fields_options' => [
                    'background' => [
                        'label' => esc_html__( 'Item Background', 'aiero_plugin' )
                    ]                    
                ],
                'selector' => '{{WRAPPER}} .owl-carousel.project-slider-listing .project-item',
                'condition' => [
                    'listing_type'  => 'slider'
                ]
            ]
        );

        $this->start_controls_tabs('css_filters_tabs', [
            'condition' => [
                'listing_type'  => ['masonry', 'grid'],
                'text_position' => 'inside'
            ]
        ]);
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
                        'selector' => '{{WRAPPER}} .project-listing-wrapper.text-position-inside .project-item-link .project-item-media img',
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
                        'selector' => '{{WRAPPER}} .project-listing-wrapper.text-position-inside .project-item-link:hover .project-item-media img',
                    ]
                );
            $this->end_controls_tab();
        $this->end_controls_tabs();

        $this->add_control(
            'audio_type_overlay_color',
            [
                'label'     => esc_html__('Overlay Color', 'aiero_plugin'),
                'type'      => Controls_Manager::COLOR,
                'selectors' => [
                    '{{WRAPPER}} .project-slider-listing.content-type-audio .project-item:before' => 'background-color: {{VALUE}};'
                ],
                'condition' => [
                    'listing_type' => 'slider',
                    'content_type' => 'audio'
                ]
            ]
        );

        $this->add_responsive_control(
            'item_padding',
            [
                'label'         => esc_html__('Item Padding', 'aiero_plugin'),
                'type'          => Controls_Manager::DIMENSIONS,
                'size_units'    => ['px', '%', 'em', 'vw', 'custom'],
                'selectors'     => [
                    '{{WRAPPER}} .project-listing-wrapper.text-position-inside .project-item-wrapper .project-item-link' => 'padding: {{TOP}}{{UNIT}} {{RIGHT}}{{UNIT}} {{BOTTOM}}{{UNIT}} {{LEFT}}{{UNIT}};',
                ],
                'condition' => [
                    'listing_type' => ['grid', 'masonry'],
                    'text_position' => 'inside'
                ]
            ]
        );

        $this->add_responsive_control(
            'item_cards_padding',
            [
                'label'         => esc_html__('Item Padding', 'aiero_plugin'),
                'type'          => Controls_Manager::DIMENSIONS,
                'size_units'    => ['px', '%', 'em', 'vw', 'custom'],
                'selectors'     => [
                    '{{WRAPPER}} .project-listing-wrapper.project-cards-listing .project-item-wrapper .project-item-link' => 'padding: {{TOP}}{{UNIT}} {{RIGHT}}{{UNIT}} {{BOTTOM}}{{UNIT}} {{LEFT}}{{UNIT}};',
                ],
                'condition' => [
                    'listing_type' => 'cards'
                ]
            ]
        );

        $this->add_responsive_control(
            'item_cards_content_width',
            [
                'label' => esc_html__( 'Item Content Width', 'aiero_plugin' ),
                'type' => Controls_Manager::SLIDER,
                'size_units' => ['px', '%', 'vw'],
                'range' => [
                    'px' => [
                        'min' => 0,
                        'max' => 1000,
                        'step' => 1,
                    ],
                ],
                'selectors' => [
                    '{{WRAPPER}} .project-listing-wrapper.project-cards-listing .project-item-wrapper .project-item-content' => 'max-width: {{SIZE}}{{UNIT}};',
                ],
                'condition' => [
                    'listing_type' => 'cards'
                ]
            ]            
        );

        $this->add_responsive_control(
            'item_aspect_ratio',
            [
                'label' => esc_html__( 'Item Wrapper Height', 'aiero_plugin' ),
                'type' => Controls_Manager::SLIDER,
                'size_units' => ['px', '%', 'vw'],
                'range' => [
                    'px' => [
                        'min' => 0,
                        'max' => 1000,
                        'step' => 1,
                    ],
                    '%' => [
                        'min' => 0,
                        'max' => 200,
                        'step' => 1,
                    ],
                ],
                'selectors' => [
                    '{{WRAPPER}} .project-listing-wrapper.text-position-inside .project-item-wrapper .project-item' => 'padding-bottom: {{SIZE}}{{UNIT}};',
                ],
                'condition' => [
                    'listing_type' => ['grid', 'masonry'],
                    'text_position' => 'inside'
                ]
            ]            
        );

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
                'label'     => esc_html__('Project Name Typography', 'aiero_plugin'),
                'selector'  => '{{WRAPPER}} .project-item .post-title, 
                    {{WRAPPER}} .project-item .project-item-modern-title'
            ]
        );

        $this->add_control(
            'name_color_slide',
            [
                'label'     => esc_html__('Name Color Default', 'aiero_plugin'),
                'type'      => Controls_Manager::COLOR,
                'selectors' => [
                    '{{WRAPPER}} .project-item > .project-item-content .post-title' => 'color: {{VALUE}};'
                ],
                'condition' => [
                    'listing_type' => 'slider'
                ]
            ]
        );

        $this->start_controls_tabs('content_name_tabs');
            // ------ Normal Tab ------ //
            $this->start_controls_tab(
                'tab_content_name_normal',
                [
                    'label'     => esc_html__('Normal', 'aiero_plugin')
                ]
            );
                $this->add_control(
                    'name_color_normal',
                    [
                        'label'     => esc_html__('Name Color', 'aiero_plugin'),
                        'type'      => Controls_Manager::COLOR,
                        'selectors' => [
                            '{{WRAPPER}} .project-item .post-title, 
                             {{WRAPPER}} .project-item .post-title a, 
                             {{WRAPPER}} .project-item .project-item-modern-title,
                             {{WRAPPER}} .project-cards-listing .project-item .project-item-link' => 'color: {{VALUE}};'
                        ]
                    ]
                );

                $this->add_control(
                    'button_color',
                    [
                        'label'     => esc_html__('Button Color', 'aiero_plugin'),
                        'type'      => Controls_Manager::COLOR,
                        'selectors' => [
                            '{{WRAPPER}} .post-more-button a' => 'color: {{VALUE}};'
                        ],
                        'condition' => [
                            'listing_type' => ['modern', 'slider', 'grid', 'cards'],
                        ]
                    ]
                );
            $this->end_controls_tab();

            // ------ Hover Tab ------ //
            $this->start_controls_tab(
                'tab_content_name_hover',
                [
                    'label'     => esc_html__('Hover', 'aiero_plugin')
                ]
            );
                $this->add_control(
                    'name_color_hover',
                    [
                        'label'     => esc_html__('Name Color', 'aiero_plugin'),
                        'type'      => Controls_Manager::COLOR,
                        'selectors' => [
                            '{{WRAPPER}} .project-item .post-title a:hover, 
                             {{WRAPPER}} .project-item .project-item-modern-title:hover,
                             {{WRAPPER}} .project-cards-listing .project-item .project-item-link:hover' => 'color: {{VALUE}};'
                        ]
                    ]
                );
                $this->add_control(
                    'button_color_hover',
                    [
                        'label'     => esc_html__('Button Color', 'aiero_plugin'),
                        'type'      => Controls_Manager::COLOR,
                        'selectors' => [
                            '{{WRAPPER}} .post-more-button a:hover' => 'color: {{VALUE}};'
                        ],
                        'condition' => [
                            'listing_type' => ['modern', 'slider', 'grid', 'cards'],
                        ]
                    ]
                );
            $this->end_controls_tab();
        $this->end_controls_tabs();

        $this->add_responsive_control(
            'content_width',
            [
                'label' => esc_html__( 'Content Maximum Width', 'aiero_plugin' ),
                'type' => Controls_Manager::SLIDER,
                'size_units' => ['px', '%', 'vw'],
                'range' => [
                    'px' => [
                        'min' => 0,
                        'max' => 1000,
                        'step' => 1,
                    ],
                ],
                'selectors' => [
                    '{{WRAPPER}} .project-listing-wrapper.project-cards-listing .project-item-wrapper .project-item-content' => 'max-width: {{SIZE}}{{UNIT}};',
                ],
                'condition' => [
                    'listing_type' => 'cards'
                ]
            ]            
        );

        $this->add_control(
            'hr',
            [
                'type' => Controls_Manager::DIVIDER,
            ]
        );

        $this->add_group_control(
            Group_Control_Typography::get_type(),
            [
                'name'      => 'year_typography',
                'label'     => esc_html__('Year Typography', 'aiero_plugin'),
                'selector'  => '{{WRAPPER}} .project-item-modern-year',
                'condition' => [
                    'listing_type' => 'modern'
                ]
            ]
        );

        $this->add_control(
            'year_color',
            [
                'label'     => esc_html__('Year Color', 'aiero_plugin'),
                'type'      => Controls_Manager::COLOR,
                'selectors' => [
                    '{{WRAPPER}} .project-item-modern-year' => 'color: {{VALUE}};'
                ],
                'condition' => [
                    'listing_type' => 'modern'
                ]
            ]
        );

        $this->add_group_control(
            Group_Control_Typography::get_type(),
            [
                'name'      => 'excerpt_typography',
                'label'     => esc_html__('Excerpt Typography', 'aiero_plugin'),
                'selector'  => '{{WRAPPER}} .post-excerpt',
                'condition' => [
                    'listing_type' => ['modern', 'slider', 'grid']
                ]
            ]
        );

        $this->add_control(
            'excerpt_color',
            [
                'label'     => esc_html__('Excerpt Color', 'aiero_plugin'),
                'type'      => Controls_Manager::COLOR,
                'selectors' => [
                    '{{WRAPPER}} .post-excerpt' => 'color: {{VALUE}};'
                ],
                'condition' => [
                    'listing_type' => ['modern', 'slider', 'grid']
                ]
            ]
        );

        $this->add_group_control(
            Group_Control_Typography::get_type(),
            [
                'name'      => 'button_typography',
                'label'     => esc_html__('Button Typography', 'aiero_plugin'),
                'selector'  => '{{WRAPPER}} .post-more-button a',
                'condition' => [
                    'listing_type' => ['modern', 'slider', 'grid', 'cards']
                ]
            ]
        );

        $this->add_control(
            'audio_content_image_odd',
            [
                'label' => esc_html__( 'Audio Content Image Odd', 'aiero_plugin' ),
                'type' => \Elementor\Controls_Manager::MEDIA,
                'condition' => [
                    'listing_type' => 'slider',
                    'content_type' => 'audio'
                ]
            ]
        );

        $this->add_control(
            'audio_content_image_even',
            [
                'label' => esc_html__( 'Audio Content Image Even', 'aiero_plugin' ),
                'type' => \Elementor\Controls_Manager::MEDIA,
                'condition' => [
                    'listing_type' => 'slider',
                    'content_type' => 'audio'
                ]
            ]
        );


        $this->end_controls_section();

        // ---------------------------------------- //
        // ---------- Categories Settings ---------- //
        // -------------------------------------- //
        $this->start_controls_section(
            'cat_settings_section',
            [
                'label'     => esc_html__('Categories Settings', 'aiero_plugin'),
                'tab'       => Controls_Manager::TAB_STYLE,
                'condition' => [
                    'listing_type!' => ['modern']
                ]
            ]
        );

        $this->add_group_control(
            Group_Control_Typography::get_type(),
            [
                'name'      => 'cat_typography',
                'label'     => esc_html__('Categories Typography', 'aiero_plugin'),
                'selector'  => '{{WRAPPER}} .project-item-categories a'
            ]
        );

        $this->add_control(
            'cat_bd_style',
            [
                'label' => esc_html__( 'Categories Border Style', 'aiero_plugin' ),
                'type' => Controls_Manager::SELECT,
                'default' => 'gradient',
                'options' => [
                    'gradient' => esc_html__( 'Gradient', 'aiero_plugin' ),
                    'solid' => esc_html__( 'Solid', 'aiero_plugin' ),
                ],
                'prefix_class' => 'listing-categories-border-style-',
            ]
        );

        $this->add_control(
            'cat_bg_style',
            [
                'label' => esc_html__( 'Categories Background Style', 'aiero_plugin' ),
                'type' => Controls_Manager::SELECT,
                'default' => 'gradient',
                'options' => [
                    'gradient' => esc_html__( 'Gradient', 'aiero_plugin' ),
                    'solid' => esc_html__( 'Solid', 'aiero_plugin' ),
                ],
                'prefix_class' => 'listing-categories-background-style-',
            ]
        );

        $this->add_control(
            'cat_color_default',
            [
                'label'     => esc_html__('Categories Text Color Default', 'aiero_plugin'),
                'type'      => Controls_Manager::COLOR,
                'selectors' => [
                    '{{WRAPPER}} .project-item > .project-item-content .project-item-categories, {{WRAPPER}} .project-item > .project-item-content .project-item-categories a' => 'color: {{VALUE}};'
                ],
                'condition' => [
                    'listing_type' => 'slider'
                ]
            ]
        );

        $this->add_control(
            'cat_border_color_default',
            [
                'label'     => esc_html__('Categories Border Color Default', 'aiero_plugin'),
                'type'      => Controls_Manager::COLOR,
                'selectors' => [
                    '{{WRAPPER}} .project-item > .project-item-content .project-item-categories a' => 'border-color: {{VALUE}};'
                ],
                'condition' => [
                    'listing_type' => 'slider',
                    'cat_bd_style' => 'solid'
                ]
            ]
        );

        $this->add_group_control(
            Group_Control_Background::get_type(),
            [
                'name' => 'cat_border_color_gradient_default',
                'fields_options' => [
                    'background' => [
                        'label' => esc_html__( 'Border Color Gradient Default', 'aiero_plugin' )
                    ]                    
                ],
                'types' => [ 'gradient' ],
                'selector' => '{{WRAPPER}} .project-item > .project-item-content .project-item-categories a:after',
                'condition' => [
                    'listing_type' => 'slider',
                    'cat_bd_style' => 'gradient'
                ]
            ]
        );

        $this->add_control(
            'cat_background_color_default',
            [
                'label'     => esc_html__('Categories Background Color Default', 'aiero_plugin'),
                'type'      => Controls_Manager::COLOR,
                'selectors' => [
                    '{{WRAPPER}} .project-item > .project-item-content .project-item-categories a' => 'background-color: {{VALUE}};'
                ],
                'condition' => [
                    'listing_type' => 'slider',
                    'cat_bg_style' => 'solid'
                ]
            ]
        );

        $this->add_group_control(
            Group_Control_Background::get_type(),
            [
                'name' => 'cat_bg_color_gradient_default',
                'fields_options' => [
                    'background' => [
                        'label' => esc_html__( 'Background Color Gradient Default', 'aiero_plugin' )
                    ]                    
                ],
                'types' => [ 'gradient' ],
                'selector' => '{{WRAPPER}} .project-item > .project-item-content .project-item-categories a .button-inner:before',
                'condition' => [
                    'listing_type' => 'slider',
                    'cat_bg_style' => 'gradient'
                ]
            ]
        );

        $this->start_controls_tabs('cat_settings_tabs');
            // ------ Normal Tab ------ //
            $this->start_controls_tab(
                'tab_cat_normal',
                [
                    'label'     => esc_html__('Normal', 'aiero_plugin')
                ]
            );                

                $this->add_control(
                    'cat_color',
                    [
                        'label'     => esc_html__('Categories Text Color', 'aiero_plugin'),
                        'type'      => Controls_Manager::COLOR,
                        'selectors' => [
                            '{{WRAPPER}} .project-item-categories, {{WRAPPER}} .project-item-categories a' => 'color: {{VALUE}};'
                        ],
                    ]
                );              

                $this->add_control(
                    'cat_border_color',
                    [
                        'label'     => esc_html__('Categories Border Color', 'aiero_plugin'),
                        'type'      => Controls_Manager::COLOR,
                        'selectors' => [
                            '{{WRAPPER}} .project-item-categories a' => 'border-color: {{VALUE}};'
                        ],
                        'condition' => [
                            'cat_bd_style' => 'solid'
                        ]
                    ]
                );                

                $this->add_group_control(
                    Group_Control_Background::get_type(),
                    [
                        'name' => 'cat_border_color_gradient',
                        'fields_options' => [
                            'background' => [
                                'label' => esc_html__( 'Border Color Gradient', 'aiero_plugin' )
                            ]                    
                        ],
                        'types' => [ 'gradient' ],
                        'selector' => '{{WRAPPER}} .project-item-categories a:after',
                        'condition' => [
                            'cat_bd_style' => 'gradient'
                        ]
                    ]
                );                

                $this->add_control(
                    'cat_background_color',
                    [
                        'label'     => esc_html__('Categories Background Color', 'aiero_plugin'),
                        'type'      => Controls_Manager::COLOR,
                        'selectors' => [
                            '{{WRAPPER}} .project-item-categories a' => 'background-color: {{VALUE}};'
                        ],
                        'condition' => [
                            'cat_bg_style' => 'solid'
                        ]
                    ]
                );                

                $this->add_group_control(
                    Group_Control_Background::get_type(),
                    [
                        'name' => 'cat_bg_color_gradient',
                        'fields_options' => [
                            'background' => [
                                'label' => esc_html__( 'Background Color Gradient', 'aiero_plugin' )
                            ]                    
                        ],
                        'types' => [ 'gradient' ],
                        'selector' => '{{WRAPPER}} .project-item-categories a .button-inner:before',
                        'condition' => [
                            'cat_bg_style' => 'gradient'
                        ]
                    ]
                );

            $this->end_controls_tab();

            // ------ Hover Tab ------ //
            $this->start_controls_tab(
                'tab_cat_hover',
                [
                    'label'     => esc_html__('Hover', 'aiero_plugin')
                ]
            );

                $this->add_control(
                    'cat_color_hover',
                    [
                        'label'     => esc_html__('Categories Text Color', 'aiero_plugin'),
                        'type'      => Controls_Manager::COLOR,
                        'selectors' => [
                            '{{WRAPPER}} .project-item-categories a:hover' => 'color: {{VALUE}};'
                        ],
                    ]
                );

                $this->add_control(
                    'cat_border_color_hover',
                    [
                        'label'     => esc_html__('Categories Border Color', 'aiero_plugin'),
                        'type'      => Controls_Manager::COLOR,
                        'selectors' => [
                            '{{WRAPPER}} .project-item-categories a:hover' => 'border-color: {{VALUE}};'
                        ],
                        'condition' => [
                            'cat_bd_style' => 'solid'
                        ]
                    ]
                );

                $this->add_group_control(
                    Group_Control_Background::get_type(),
                    [
                        'name' => 'cat_border_color_gradient_hover',
                        'fields_options' => [
                            'background' => [
                                'label' => esc_html__( 'Border Color Gradient', 'aiero_plugin' )
                            ]                    
                        ],
                        'types' => [ 'gradient' ],
                        'selector' => '{{WRAPPER}} .project-item-categories a:hover:after',
                        'condition' => [
                            'cat_bd_style' => 'gradient'
                        ]
                    ]
                );

                $this->add_control(
                    'cat_background_color_active',
                    [
                        'label'     => esc_html__('Categories Background Color', 'aiero_plugin'),
                        'type'      => Controls_Manager::COLOR,
                        'selectors' => [
                            '{{WRAPPER}} .project-item-categories a:hover' => 'background-color: {{VALUE}};'
                        ],
                        'condition' => [
                            'cat_bg_style' => 'solid'
                        ]
                    ]
                );

                $this->add_group_control(
                    Group_Control_Background::get_type(),
                    [
                        'name' => 'cat_bg_color_gradient_active',
                        'fields_options' => [
                            'background' => [
                                'label' => esc_html__( 'Background Color Gradient', 'aiero_plugin' )
                            ]                    
                        ],
                        'types' => [ 'gradient' ],
                        'selector' => '{{WRAPPER}} .project-item-categories a .button-inner:after',
                        'condition' => [
                            'cat_bg_style' => 'gradient'
                        ]
                    ]
                );

            $this->end_controls_tab();
        $this->end_controls_tabs();

        $this->end_controls_section();

        // -------------------------------------- //
        // ---------- Audio Button Settings ---------- //
        // -------------------------------------- //
        $this->start_controls_section(
            'audio_button_settings_section',
            [
                'label'     => esc_html__('Audio Button Settings', 'aiero_plugin'),
                'tab'       => Controls_Manager::TAB_STYLE,
                'condition' => [
                    'listing_type' => 'slider',
                    'content_type' => 'audio'
                ]
            ]
        );

        $this->add_group_control(
            Group_Control_Typography::get_type(),
            [
                'name'      => 'audio_button_typography',
                'label'     => esc_html__('Audio Button Typography', 'aiero_plugin'),
                'selector'  => '{{WRAPPER}} .project-audio-wrapper .aiero-button'
            ]
        );

        $this->add_control(
            'audio_button_bd_style',
            [
                'label' => esc_html__( 'Audio Button Border Style', 'aiero_plugin' ),
                'type' => Controls_Manager::SELECT,
                'default' => 'gradient',
                'options' => [
                    'gradient' => esc_html__( 'Gradient', 'aiero_plugin' ),
                    'solid' => esc_html__( 'Solid', 'aiero_plugin' ),
                ],
                'prefix_class' => 'audio-button-border-style-',
            ]
        );

        $this->add_control(
            'audio_button_bg_style',
            [
                'label' => esc_html__( 'Audio Button Background Style', 'aiero_plugin' ),
                'type' => Controls_Manager::SELECT,
                'default' => 'gradient',
                'options' => [
                    'gradient' => esc_html__( 'Gradient', 'aiero_plugin' ),
                    'solid' => esc_html__( 'Solid', 'aiero_plugin' ),
                ],
                'prefix_class' => 'audio-button-background-style-',
            ]
        );

        $this->start_controls_tabs('audio_button_settings_tabs');
            // ------ Normal Tab ------ //
            $this->start_controls_tab(
                'audio_button_normal',
                [
                    'label'     => esc_html__('Normal', 'aiero_plugin')
                ]
            );

                $this->add_control(
                    'audio_button_color',
                    [
                        'label'     => esc_html__('Audio Button Text Color', 'aiero_plugin'),
                        'type'      => Controls_Manager::COLOR,
                        'selectors' => [
                            '{{WRAPPER}} .project-audio-wrapper .aiero-button' => 'color: {{VALUE}};'
                        ],
                    ]
                );

                $this->add_control(
                    'audio_button_border_color',
                    [
                        'label'     => esc_html__('Audio Button Border Color', 'aiero_plugin'),
                        'type'      => Controls_Manager::COLOR,
                        'selectors' => [
                            '{{WRAPPER}} .project-audio-wrapper .aiero-button' => 'border-color: {{VALUE}};'
                        ],
                        'condition' => [
                            'audio_button_bd_style' => 'solid'
                        ]
                    ]
                );

                $this->add_group_control(
                    Group_Control_Background::get_type(),
                    [
                        'name' => 'audio_button_border_color_gradient',
                        'fields_options' => [
                            'background' => [
                                'label' => esc_html__( 'Audio Button Border Color Gradient', 'aiero_plugin' )
                            ]                    
                        ],
                        'types' => [ 'gradient' ],
                        'selector' => '{{WRAPPER}} .project-audio-wrapper .aiero-button:after',
                        'condition' => [
                            'audio_button_bd_style' => 'gradient'
                        ]
                    ]
                );

                $this->add_control(
                    'audio_button_background_color',
                    [
                        'label'     => esc_html__('Audio Button Background Color', 'aiero_plugin'),
                        'type'      => Controls_Manager::COLOR,
                        'selectors' => [
                            '{{WRAPPER}} .project-audio-wrapper .aiero-button' => 'background-color: {{VALUE}};'
                        ],
                        'condition' => [
                            'audio_button_bg_style' => 'solid'
                        ]
                    ]
                );

                $this->add_group_control(
                    Group_Control_Background::get_type(),
                    [
                        'name' => 'audio_button_bg_color_gradient',
                        'fields_options' => [
                            'background' => [
                                'label' => esc_html__( 'Background Color Gradient', 'aiero_plugin' )
                            ]                    
                        ],
                        'types' => [ 'gradient' ],
                        'selector' => '{{WRAPPER}} .project-audio-wrapper .aiero-button .button-inner:before',
                        'condition' => [
                            'audio_button_bg_style' => 'gradient'
                        ]
                    ]
                );

                $this->add_group_control(
                    Group_Control_Box_Shadow::get_type(),
                    [
                        'name'      => 'audio_button_shadow',
                        'label'     => esc_html__('Audio Button Shadow', 'aiero_plugin'),
                        'selector'  => '{{WRAPPER}} .project-audio-wrapper .aiero-button'
                    ]
                );

            $this->end_controls_tab();

            // ------ Hover Tab ------ //
            $this->start_controls_tab(
                'audio_button_hover',
                [
                    'label'     => esc_html__('Hover', 'aiero_plugin')
                ]
            );

                $this->add_control(
                    'audio_button_color_hover',
                    [
                        'label'     => esc_html__('Audio Button Text Color', 'aiero_plugin'),
                        'type'      => Controls_Manager::COLOR,
                        'selectors' => [
                            '{{WRAPPER}} .project-audio-wrapper .aiero-button:hover' => 'color: {{VALUE}};',
                            '{{WRAPPER}} .project-audio-wrapper .aiero-button.active' => 'color: {{VALUE}};'
                        ],
                    ]
                );

                $this->add_control(
                    'audio_button_border_color_hover',
                    [
                        'label'     => esc_html__('Audio Button Border Color', 'aiero_plugin'),
                        'type'      => Controls_Manager::COLOR,
                        'selectors' => [
                            '{{WRAPPER}} .project-audio-wrapper .aiero-button:hover' => 'border-color: {{VALUE}};',
                            '{{WRAPPER}} .project-audio-wrapper .aiero-button.active' => 'border-color: {{VALUE}};'
                        ],
                        'condition' => [
                            'audio_button_bd_style' => 'solid'
                        ]
                    ]
                );

                $this->add_group_control(
                    Group_Control_Background::get_type(),
                    [
                        'name' => 'audio_button_border_color_gradient_hover',
                        'fields_options' => [
                            'background' => [
                                'label' => esc_html__( 'Audio Button Border Color Gradient', 'aiero_plugin' )
                            ]                    
                        ],
                        'types' => [ 'gradient' ],
                        'selector' => '{{WRAPPER}} .project-audio-wrapper .aiero-button:hover:after, {{WRAPPER}} .project-audio-wrapper .aiero-button.active:after',
                        'condition' => [
                            'audio_button_bd_style' => 'gradient'
                        ]
                    ]
                );

                $this->add_control(
                    'audio_button_background_color_hover',
                    [
                        'label'     => esc_html__('Audio Button Background Color', 'aiero_plugin'),
                        'type'      => Controls_Manager::COLOR,
                        'selectors' => [
                            '{{WRAPPER}} .project-audio-wrapper .aiero-button:hover' => 'background-color: {{VALUE}};',
                            '{{WRAPPER}} .project-audio-wrapper .aiero-button.active' => 'background-color: {{VALUE}};'
                        ],
                        'condition' => [
                            'audio_button_bg_style' => 'solid'
                        ]
                    ]
                );

                $this->add_group_control(
                    Group_Control_Background::get_type(),
                    [
                        'name' => 'audio_button_bg_color_gradient_hover',
                        'fields_options' => [
                            'background' => [
                                'label' => esc_html__( 'Background Color Gradient', 'aiero_plugin' )
                            ]                    
                        ],
                        'types' => [ 'gradient' ],
                        'selector' => '{{WRAPPER}} .project-audio-wrapper .aiero-button .button-inner:after, {{WRAPPER}} .project-audio-wrapper .aiero-button.active .button-inner:after',
                        'condition' => [
                            'audio_button_bg_style' => 'gradient'
                        ]
                    ]
                );

                $this->add_group_control(
                    Group_Control_Box_Shadow::get_type(),
                    [
                        'name'      => 'audio_button_shadow_hover',
                        'label'     => esc_html__('Audio Button Shadow', 'aiero_plugin'),
                        'selector'  => '{{WRAPPER}} .project-audio-wrapper .aiero-button:hover, {{WRAPPER}} .project-audio-wrapper .aiero-button.active'
                    ]
                );

            $this->end_controls_tab();
        $this->end_controls_tabs();

        $this->add_control(
            'audio_button_remove_box_shadow',
            [
                'label'         => esc_html__('Audio Button Remove Box Shadow', 'aiero_plugin'),
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
                    '{{WRAPPER}} .project-audio-wrapper .aiero-button' => '{{VALUE}}',
                    '{{WRAPPER}} .project-audio-wrapper .aiero-button:hover' => '{{VALUE}}',
                ],
            ]
        );

        $this->add_control(
            'audio_button_border_width',
            [
                'label' => esc_html__( 'Audio Button Border Width', 'aiero_plugin' ),
                'type' => Controls_Manager::SLIDER,
                'size_units' => [ 'px', 'em', 'rem'],
                'selectors' => [
                    '{{WRAPPER}} .project-audio-wrapper .aiero-button' => '--button-border-width: {{SIZE}}{{UNIT}}; border-width: {{SIZE}}{{UNIT}}; ',               
                ],
            ]
        );

        $this->add_control(
            'audio_button_radius',
            [
                'label'         => esc_html__('Audio Button Border Radius', 'aiero_plugin'),
                'type'          => Controls_Manager::DIMENSIONS,
                'size_units'    => ['px', '%'],
                'selectors'     => [
                    '{{WRAPPER}} .project-audio-wrapper .aiero-button' => 'border-radius: {{TOP}}{{UNIT}} {{RIGHT}}{{UNIT}} {{BOTTOM}}{{UNIT}} {{LEFT}}{{UNIT}};'
                ]
            ]
        );

        $this->add_responsive_control(
            'audio_button_padding',
            [
                'label'         => esc_html__('Audio Button Padding', 'aiero_plugin'),
                'type'          => Controls_Manager::DIMENSIONS,
                'size_units'    => ['px', '%'],
                'selectors'     => [
                    '{{WRAPPER}} .project-audio-wrapper .aiero-button' => 'padding: {{TOP}}{{UNIT}} {{RIGHT}}{{UNIT}} {{BOTTOM}}{{UNIT}} {{LEFT}}{{UNIT}};',
                    '{{WRAPPER}} .project-audio-wrapper .aiero-button:hover' => 'padding: {{TOP}}{{UNIT}} {{LEFT}}{{UNIT}} {{BOTTOM}}{{UNIT}} {{RIGHT}}{{UNIT}};'
                ]
            ]
        );

        $this->end_controls_section();

        // -------------------------------------- //
        // ---------- Slider Button Settings ---------- //
        // -------------------------------------- //
        $this->start_controls_section(
            'slider_button_settings_section',
            [
                'label'     => esc_html__('Slider Button Settings', 'aiero_plugin'),
                'tab'       => Controls_Manager::TAB_STYLE,
                'condition' => [
                    'listing_type' => 'slider',
                    'add_button'   => 'yes'
                ]
            ]
        );

        $this->add_group_control(
            Group_Control_Typography::get_type(),
            [
                'name'      => 'slider_button_typography',
                'label'     => esc_html__('Button Typography', 'aiero_plugin'),
                'selector'  => '{{WRAPPER}} .slider-navigation-wrapper .aiero-button'
            ]
        );

        $this->add_control(
            'slider_button_border_style',
            [
                'label' => esc_html__( 'Button Border Style', 'aiero_plugin' ),
                'type' => Controls_Manager::SELECT,
                'default' => 'gradient',
                'options' => [
                    'gradient' => esc_html__( 'Gradient', 'aiero_plugin' ),
                    'solid' => esc_html__( 'Solid', 'aiero_plugin' ),
                ],
                'prefix_class' => 'aiero-slider-button-border-style-'
            ]
        );

        $this->add_control(
            'slider_button_background_style',
            [
                'label' => esc_html__( 'Button Background Style', 'aiero_plugin' ),
                'type' => Controls_Manager::SELECT,
                'default' => 'gradient',
                'options' => [
                    'gradient' => esc_html__( 'Gradient', 'aiero_plugin' ),
                    'solid' => esc_html__( 'Solid', 'aiero_plugin' ),
                ],
                'prefix_class' => 'aiero-slider-button-bakground-style-'
            ]
        );

        $this->start_controls_tabs('slider_button_settings_tabs');

            // ------------------------ //
            // ------ Normal Tab ------ //
            // ------------------------ //
            $this->start_controls_tab(
                'slider_button_normal',
                [
                    'label' => esc_html__('Normal', 'aiero_plugin')
                ]
            );

            $this->add_control(
                'slider_button_color',
                [
                    'label'     => esc_html__('Button Color', 'aiero_plugin'),
                    'type'      => Controls_Manager::COLOR,
                    'selectors' => [
                        '{{WRAPPER}} .slider-navigation-wrapper .aiero-button' => 'color: {{VALUE}};'
                    ]
                ]
            );

            $this->add_control(
                'slider_button_bd_color',
                [
                    'label'     => esc_html__('Button Border Color', 'aiero_plugin'),
                    'type'      => Controls_Manager::COLOR,
                    'selectors' => [
                        '{{WRAPPER}} .slider-navigation-wrapper .aiero-button' => 'border-color: {{VALUE}};'
                    ],
                    'condition' => [
                    	'slider_button_border_style' => 'solid'
                    ]
                ]
            );

            $this->add_group_control(
                Group_Control_Background::get_type(),
                [
                    'name' => 'slider_button_bd_color_gradient',
                    'fields_options' => [
                        'background' => [
                            'label' => esc_html__( 'Border Color Gradient', 'aiero_plugin' )
                        ]                    
                    ],
                    'types' => [ 'gradient' ],
                    'selector' => '{{WRAPPER}} .slider-navigation-wrapper .aiero-button:after',
                    'condition' => [
                        'slider_button_border_style' => 'gradient'
                    ]
                ]
            );

            $this->add_control(
                'slider_button_bg_color',
                [
                    'label'     => esc_html__('Button Background Color', 'aiero_plugin'),
                    'type'      => Controls_Manager::COLOR,
                    'selectors' => [
                        '{{WRAPPER}} .slider-navigation-wrapper .aiero-button' => 'background-color: {{VALUE}};'
                    ],
                    'condition' => [
                        'slider_button_background_style' => 'solid'
                    ]
                ]
            );

            $this->add_group_control(
                Group_Control_Background::get_type(),
                [
                    'name' => 'slider_button_bg_color_gradient',
                    'fields_options' => [
                        'background' => [
                            'label' => esc_html__( 'Background Color Gradient', 'aiero_plugin' )
                        ]                    
                    ],
                    'types' => [ 'gradient' ],
                    'selector' => '{{WRAPPER}} .slider-navigation-wrapper .aiero-button .button-inner:before',
                    'condition' => [
                        'slider_button_background_style' => 'gradient'
                    ]
                ]
            );

            $this->add_group_control(
                Group_Control_Box_Shadow::get_type(),
                [
                    'name' => 'slider_button_box_shadow',
                    'selector' => '{{WRAPPER}} .slider-navigation-wrapper .aiero-button',
                    'condition' => [
                        'remove_box_shadow!' => 'yes'
                    ]
                ]
            );

            $this->end_controls_tab();


            // ------------------------ //
            // ------ Hover Tab ------ //
            // ------------------------ //
            $this->start_controls_tab(
                'slider_button_hover',
                [
                    'label' => esc_html__('Hover', 'aiero_plugin')
                ]
            );

            $this->add_control(
                'slider_button_color_hover',
                [
                    'label'     => esc_html__('Button Color', 'aiero_plugin'),
                    'type'      => Controls_Manager::COLOR,
                    'selectors' => [
                        '{{WRAPPER}} .slider-navigation-wrapper .aiero-button:hover' => 'color: {{VALUE}};'
                    ]
                ]
            );

            $this->add_control(
                'slider_button_bd_color_hover',
                [
                    'label'     => esc_html__('Button Border Color', 'aiero_plugin'),
                    'type'      => Controls_Manager::COLOR,
                    'selectors' => [
                        '{{WRAPPER}} .slider-navigation-wrapper .aiero-button:hover' => 'border-color: {{VALUE}};'
                    ],
                    'condition' => [
                    	'slider_button_border_style' => 'solid'
                    ]
                ]
            );

            $this->add_group_control(
                Group_Control_Background::get_type(),
                [
                    'name' => 'slider_button_bd_color_gradient_hover',
                    'fields_options' => [
                        'background' => [
                            'label' => esc_html__( 'Border Color Gradient', 'aiero_plugin' )
                        ]                    
                    ],
                    'types' => [ 'gradient' ],
                    'selector' => '{{WRAPPER}} .slider-navigation-wrapper .aiero-button:hover:after',
                    'condition' => [
                        'slider_button_border_style' => 'gradient'
                    ]
                ]
            );

            $this->add_control(
                'slider_button_bg_color_hover',
                [
                    'label'     => esc_html__('Button Background Color', 'aiero_plugin'),
                    'type'      => Controls_Manager::COLOR,
                    'selectors' => [
                        '{{WRAPPER}} .slider-navigation-wrapper .aiero-button:hover' => 'background-color: {{VALUE}};'
                    ],
                    'condition' => [
                        'slider_button_background_style' => 'solid'
                    ]
                ]
            );

            $this->add_group_control(
                Group_Control_Background::get_type(),
                [
                    'name' => 'slider_button_bg_color_gradient_hover',
                    'fields_options' => [
                        'background' => [
                            'label' => esc_html__( 'Background Color Gradient', 'aiero_plugin' )
                        ]                    
                    ],
                    'types' => [ 'gradient' ],
                    'selector' => '{{WRAPPER}} .slider-navigation-wrapper .aiero-button .button-inner:after',
                    'condition' => [
                        'slider_button_background_style' => 'gradient'
                    ]
                ]
            );

            $this->add_group_control(
                Group_Control_Box_Shadow::get_type(),
                [
                    'name' => 'slider_button_box_shadow_hover',
                    'selector' => '{{WRAPPER}} .slider-navigation-wrapper .aiero-button:hover',
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
                        '{{WRAPPER}} .slider-navigation-wrapper .aiero-button' => '{{VALUE}}',
                        '{{WRAPPER}} .slider-navigation-wrapper .aiero-button:hover' => '{{VALUE}}',
                    ],
                ]
            );

            $this->add_control(
                'slider_button_border_width',
                [
                    'label' => esc_html__( 'Border Width', 'aiero_plugin' ),
                    'type' => Controls_Manager::SLIDER,
                    'size_units' => [ 'px', 'em', 'rem'],
                    'selectors' => [
                        '{{WRAPPER}} .slider-navigation-wrapper .aiero-button' => '--button-border-width: {{SIZE}}{{UNIT}}; border-width: {{SIZE}}{{UNIT}};',        
                    ],
                ]
            );

            $this->add_control(
                'slider_button_radius',
                [
                    'label'         => esc_html__('Border Radius', 'aiero_plugin'),
                    'type'          => Controls_Manager::DIMENSIONS,
                    'size_units'    => ['px', '%'],
                    'selectors'     => [
                        '{{WRAPPER}} .slider-navigation-wrapper .aiero-button' => 'border-radius: {{TOP}}{{UNIT}} {{RIGHT}}{{UNIT}} {{BOTTOM}}{{UNIT}} {{LEFT}}{{UNIT}};'
                    ]
                ]
            );

            $this->add_responsive_control(
                'slider_button_padding',
                [
                    'label'         => esc_html__('Button Padding', 'aiero_plugin'),
                    'type'          => Controls_Manager::DIMENSIONS,
                    'size_units'    => ['px', '%'],
                    'selectors'     => [
                        '{{WRAPPER}} .slider-navigation-wrapper .aiero-button' => 'padding: {{TOP}}{{UNIT}} {{RIGHT}}{{UNIT}} {{BOTTOM}}{{UNIT}} {{LEFT}}{{UNIT}};'
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
                'label'     => esc_html__('Slider Navigation Settings', 'aiero_plugin'),
                'tab'       => Controls_Manager::TAB_STYLE,
                'condition' => [
                    'listing_type'  => 'slider'
                ]
            ]
        );

        $this->start_controls_tabs('slider_pagination_settings_tabs', [
            'condition' => [
                'dots'       => 'yes'
            ]
        ]);

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

        $this->start_controls_tabs('slider_nav_settings_tabs', [
            'condition' => [
                'nav'       => 'yes'
            ]
        ]);

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

        $this->add_control(
            'slider_nav_border_width',
            [
                'label' => esc_html__( 'Slider Arrows Border Width', 'aiero_plugin' ),
                'type' => Controls_Manager::SLIDER,
                'size_units' => [ 'px', 'em', 'rem'],
                'selectors' => [
                    '{{WRAPPER}} .owl-nav' => '--nav-border-width: {{SIZE}}{{UNIT}}; border-width: {{SIZE}}{{UNIT}};',     
                ],
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
                    'listing_type!'     => 'slider',
                    'show_pagination'   => 'yes'
                ]
            ]
        );

        $this->add_responsive_control(
            'pagination_align',
            [
                'label'         => esc_html__('Pagination Alignment', 'aiero_plugin'),
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
                'selectors'     => [
                    '{{WRAPPER}} .content-pagination .nav-links' => 'text-align: {{VALUE}};'
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

        $this->start_controls_tabs('pagination_settings_tabs');
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
    }

    protected function render() {
        $settings               = $this->get_settings();

        $listing_type           = $settings['listing_type'];
        $content_type           = $settings['content_type'];
        $title                  = $settings['title'];
        $title_tag              = $settings['title_tag'];
        $add_subtitle           = $settings['add_subtitle'];
        $subtitle               = $settings['subtitle'];
        $add_button             = $settings['add_button'];
        $text_position          = $settings['text_position'];
        $post_order_by          = $settings['post_order_by'];
        $post_order             = $settings['post_order'];
        $filter_by              = $settings['filter_by'];
        $categories             = $settings['categories'];
        $projects               = $settings['projects'];
        $show_filter            = $settings['show_filter'];
        $pagination             = $settings['show_pagination'];
        $paged                  = isset( $_GET[esc_attr($this->get_id()) . '-paged'] ) && $pagination == 'yes' ? (int)$_GET[esc_attr($this->get_id()) . '-paged'] : 1;

        $grid_columns_number    = $settings['grid_columns_number'];
        $grid_posts_per_page    = $settings['grid_posts_per_page'];

        $masonry_columns_number = $settings['masonry_columns_number'];
        $masonry_posts_per_page = $settings['masonry_posts_per_page'];

        $modern_posts_per_page  = $settings['modern_posts_per_page'];
        $cards_posts_per_page   = $settings['cards_posts_per_page'];

        $items                  = $settings['items'];
        $nav                    = $settings['nav'];
        $dots                   = $settings['dots'];
        $speed                  = $settings['speed'];
        $infinite               = $settings['infinite'];
        $autoplay               = $settings['autoplay'];
        $autoplay_speed         = $settings['autoplay_speed'];
        $autoplay_timeout       = $settings['autoplay_timeout'];
        $pause_on_hover         = $settings['pause_on_hover'];

        $widget_class           = 'aiero-projects-listing-widget';
        $wrapper_class          = 'archive-listing-wrapper project-listing-wrapper' . ( (!empty($text_position) && ($listing_type === 'masonry' || $listing_type === 'grid') ) ? ' text-position-' . esc_attr($text_position) : '' );
        $widget_attr            = '';
        $wrapper_attr           = '';

        global $wp;
        $base = home_url($wp->request);

        $query_options          = [
            'post_type'             => 'aiero_project',
            'ignore_sticky_posts'   => true,
            'suppress_filters'      => false,
            'orderby'               => sanitize_key($post_order_by),
            'order'                 => sanitize_key($post_order),
            'link_base'             => esc_url($base)
        ];

        if ( $filter_by == 'cat' ) {
            $query_options = array_merge($query_options, [
                'aiero_project_category'  => $categories
            ]);
        } elseif ( $filter_by == 'id' ) {
            $query_options = array_merge($query_options, [
                'post__in'          => $projects
            ]);
        };

        if ( $listing_type == 'masonry' ) {
            $widget_class       .= ' isotope' . ( $show_filter == 'yes' && $filter_by == 'cat' ? esc_attr(' isotope-filter') : '' );
            $wrapper_class      .= ' isotope-trigger project-masonry-listing' . ( !empty($masonry_columns_number) ? ' columns-' . esc_attr($masonry_columns_number) : '' );
            $widget_options     = array(
                'item_class'            => 'project-item-wrapper isotope-item',
                'columns_number'        => absint($masonry_columns_number),
                'listing_type'          => 'masonry',
                'text_position'         => $text_position,
                'show_pagination'       => $pagination
            );
            $widget_attr        .= ( $show_filter == 'yes' && $filter_by == 'cat' ? ' data-columns=' . esc_attr($masonry_columns_number) . ' data-spacings=true' : '');
            $query_options      = array_merge($query_options, [
                'posts_per_page'        => ( !empty($masonry_posts_per_page) ? $masonry_posts_per_page : -1 ),
                'paged'                 => $paged
            ]);
        } elseif ( $listing_type == 'slider' ) {
            $widget_id              = $this->get_id();
            $dots_container_desktop = ( !empty($title) && !empty($widget_id) ? '.owl-dots-desktop.owl-dots-' . esc_attr($widget_id) : '.owl-dots-' . esc_attr($widget_id) );
            $dots_container_mobile  = ( !empty($title) && !empty($widget_id) ? '.owl-dots-mobile.owl-dots-' . esc_attr($widget_id) : $dots_container_desktop );
            $slider_options         = [
                'items'                 => !empty($items) ? (int)$items : 1,
                'nav'                   => ('yes' === $nav),
                'dots'                  => ('yes' === $dots),
                'dotsContainer'         => $dots_container_desktop,
                'dotsContainerMobile'   => $dots_container_mobile,
                'autoplayHoverPause'    => ('yes' === $autoplay ? 'yes' === $pause_on_hover : false),
                'autoplay'              => ('yes' === $autoplay),
                'autoplaySpeed'         => absint($autoplay_speed),
                'autoplayTimeout'       => absint($autoplay_timeout),
                'loop'                  => ('yes' === $infinite),
                'dragEndSpeed'          => absint($speed),
                'navSpeed'              => absint($speed),
                'dotsSpeed'             => absint($speed)
            ];
            if( !empty($widget_id) ) {
                $slider_options['navContainer'] = '.owl-nav-' . esc_attr($widget_id);
            }
            $widget_options     = array(
                'content_type'          => $content_type,
                'item_class'            => 'project-item-wrapper slider-item',
                'columns_number'        => absint($items),
                'listing_type'          => 'slider',
                'text_position'         => $text_position,
                'excerpt_length'        => $settings['excerpt_length'],
                'read_more_text'        => $settings['read_more_text']
            );
            $query_options      = array_merge($query_options, [
                'posts_per_page'        => -1
            ]);
            $wrapper_attr       = ' data-slider-options=' . esc_attr(wp_json_encode($slider_options));
            $wrapper_class      .= ' project-slider-listing owl-carousel owl-theme';
            $wrapper_class      .= ( $content_type === 'audio' ? ' content-type-' . esc_attr($content_type) : '' );
            if( $content_type === 'audio' ) {
                $audio_content_image_odd = wp_get_attachment_image( $settings['audio_content_image_odd']['id'], 'full' );
                $audio_content_image_even = wp_get_attachment_image( $settings['audio_content_image_even']['id'], 'full' );
                $widget_options['audio_content_image_odd'] = $audio_content_image_odd;
                $widget_options['audio_content_image_even'] = $audio_content_image_even;
                $widget_options['audio_text'] = $settings['audio_text'];
            }
        } elseif ( $listing_type == 'grid' ) {
            $widget_class       .=  ( $show_filter == 'yes' && $filter_by == 'cat' ? esc_attr(' isotope-filter') : '' );
            $wrapper_class      .= ' project-grid-listing' . ( !empty($grid_columns_number) ? ' columns-' . esc_attr($grid_columns_number) : '' );
            $widget_options     = array(
                'item_class'            => 'project-item-wrapper',
                'columns_number'        => absint($grid_columns_number),
                'listing_type'          => 'grid',
                'text_position'         => $text_position,
                'show_pagination'       => $pagination,
                'excerpt_length'        => $settings['excerpt_length'],
                'read_more_text'        => $settings['read_more_text']
            );
            $widget_attr        .= ( $show_filter == 'yes' && $filter_by == 'cat' ? ' data-columns=' . esc_attr($grid_columns_number) . ' data-spacings=true' : '');
            $query_options      = array_merge($query_options, [
                'posts_per_page'        => ( !empty($grid_posts_per_page) ? $grid_posts_per_page : -1 ),
                'columns_number'        => $grid_columns_number,
                'paged'                 => $paged
            ]);
        } elseif ( $listing_type == 'modern' ) {
            $wrapper_class      .= ' project-modern-listing';
            $widget_options     = array(
                'item_class'            => 'project-item-wrapper',
                'columns_number'        => 1,
                'listing_type'          => 'modern',
                'show_pagination'       => $pagination,
                'excerpt_length'        => $settings['excerpt_length'],
                'read_more_text'        => $settings['read_more_text']
            );
            $query_options      = array_merge($query_options, [
                'posts_per_page'        => ( !empty($modern_posts_per_page) ? $modern_posts_per_page : -1 ),
                'columns_number'        => 1,
                'paged'                 => $paged
            ]);
        } else {
            $wrapper_class      .= ' project-cards-listing';
            $widget_options     = array(
                'item_class'            => 'project-item-wrapper',
                'columns_number'        => 1,
                'listing_type'          => 'cards',
                'show_pagination'       => $pagination
            );
            $query_options      = array_merge($query_options, [
                'posts_per_page'        => ( !empty($cards_posts_per_page) ? $cards_posts_per_page : -1 ),
                'columns_number'        => 1,
                'paged'                 => $paged
            ]);
        }

        $query = new \WP_Query($query_options);
        $ajax_data = wp_json_encode($query_options);
        $widget_data = wp_json_encode($widget_options);

        // ------------------------------------ //
        // ---------- Widget Content ---------- //
        // ------------------------------------ //
        ?>

        <div class="<?php echo esc_attr($widget_class); ?>"<?php echo esc_html($widget_attr); ?>>

            <?php
                if ( $show_filter == 'yes' && $filter_by == 'cat' && $listing_type != 'slider' ) {
                    $terms = array();
                    foreach ($categories as $category) {
                        $current_terms = get_term_by('slug', $category, 'aiero_project_category');
                        $terms[] = $current_terms;
                    }

                    if ( count( $terms ) > 1 ) {
                        echo "<div class='filter-control-wrapper'>";

                        foreach ( $terms as $term ) {
                            $term_name = $term->name;
                            $filter_vals[$term->slug] = $term_name;
                        }
                        if ( $filter_vals > 1 ){
                            echo "<nav class='nav filter-control-list' data-taxonomy='aiero_project_category'>";
                                echo "<div class='dots'>";
                                    echo "<span class='dot filter-control-item all active' data-value='all'>";
                                        esc_html_e( 'All', 'aiero_plugin' );
                                        echo '<span class="button-inner"></span>';
                                    echo "</span>";
                                    foreach ( $filter_vals as $term_slug => $term_name ){
                                        echo "<span class='dot filter-control-item' data-value='" . esc_html( $term_slug ) . "'>";
                                            echo esc_html( $term_name );
                                            echo '<span class="button-inner"></span>';
                                        echo "</span>";
                                    }
                                echo "</div>";
                            echo "</nav>";
                        }
                        echo "</div>";
                    }
                }
            ?>

            <?php
                if ( $listing_type == 'slider' && !empty($title) ) {
                    echo '<' . esc_html($title_tag) . ' class="aiero-heading heading-with-pagination">';
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
                        if ( $dots == 'yes' ) {
                            echo '<div class="owl-dots owl-dots-desktop' . (!empty($widget_id) ? ' owl-dots-' . esc_attr($widget_id) : '') . '"></div>';
                        }
                    echo '</' . esc_html($title_tag) . '>';
                }
            ?>

            <?php
                if ( $listing_type == 'slider' && ($nav === 'yes' || $add_button === 'yes') ) {
                    echo '<div class="slider-navigation-wrapper">';
                        if( $nav === 'yes' ) {
                            echo '<div class="owl-nav owl-nav-' . esc_attr($widget_id) . '"></div>';
                        }
                        if( $add_button === 'yes' ) {
                            $button_link = $settings['button_link'];
                            $button_text = $settings['button_text'];
                            if ($button_link['url'] !== '') {
                                $button_url = $button_link['url'];
                            } else {
                                $button_url = '#';
                            }
                            ?>
                            <a class="aiero-button" href="<?php echo esc_url($button_url); ?>" <?php echo (($button_link['is_external'] == true) ? 'target="_blank"' : ''); echo (($button_link['nofollow'] == 'on') ? 'rel="nofollow"' : ''); ?>><?php echo esc_html($button_text); ?>
                                    <span class="icon-button-arrow"></span><span class="button-inner"></span>
                            </a>
                        <?php }
                    echo '</div>';
                }                
            ?>

            <div class="archive-listing" data-ajax='<?php echo esc_attr($ajax_data); ?>' data-widget='<?php echo esc_attr($widget_data); ?>'>
                <div class="<?php echo esc_attr($wrapper_class); ?>"<?php echo esc_html($wrapper_attr); ?>>
                    <?php
                        $counter = 0;
                        while( $query->have_posts() ){
                            $query->the_post();
                            if( $listing_type === 'slider' && $content_type === 'audio' ) {
                                $counter++;
                                $widget_options['counter'] = $counter;
                            }
                            get_template_part('content', 'aiero_project', $widget_options);
                        };
                        wp_reset_postdata();
                        if ( $listing_type == 'masonry' ) {
                            echo '<div class="grid-sizer"></div>';
                        }
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
                                        'prev_text' => esc_html__('Previous', 'aiero_plugin') . '<span class="button-inner"></span><span class="icon-button-arrow"></span>',
                                        'next_text' => esc_html__('Next', 'aiero_plugin') . '<span class="button-inner"></span><span class="icon-button-arrow"></span>'
                                    ) );
                                echo '</div>';
                            echo '</nav>';
                        echo '</div>';
                    }
                ?>
            </div>

            <?php
                if ( $listing_type == 'slider' && $dots == 'yes' ) {
                    echo '<div class="owl-dots' . ( empty($title) ? '' : ' owl-dots-mobile' ) . ( !empty($widget_id) ? ' owl-dots-' . esc_attr($widget_id) : '' ) . '"></div>';
                }
            ?>

        </div>
        <?php
    }

    protected function content_template() {}

    public function render_plain_content() {}
}