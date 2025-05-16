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

class Aiero_Nav_Menu_Widget extends Widget_Base {

    public function get_name() {
        return 'aiero_nav_menu';
    }

    public function get_title() {
        return esc_html__('Navigation Menu', 'aiero_plugin');
    }

    public function get_icon() {
        return 'eicon-nav-menu';
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
                'label' => esc_html__('Navigation Menu', 'aiero_plugin')
            ]
        );

        $menu_list = aiero_get_all_menu_list();
        $menu_list['default'] = esc_html__('Select your menu', 'aiero_plugin');
        if ( empty( $menu_list ) ) {
            $menu_list['default'] = esc_html__('No menus', 'aiero_plugin');
        }

        $this->add_control(
            'menu',
            [
                'label'   => esc_html__('Menu', 'aiero_plugin'),
                'type'    => Controls_Manager::SELECT,
                'default' => 'default',
                'options' => $menu_list
            ]
        );

        $this->add_control(
            'columns_count',
            [
                'label'   => esc_html__('Menu Columns', 'aiero_plugin'),
                'type'    => Controls_Manager::SELECT,
                'default' => '1',
                'options' => [
                    '1' => esc_html__('One', 'aiero_plugin'),
                    '2' => esc_html__('Two', 'aiero_plugin'),
                    '3' => esc_html__('Three', 'aiero_plugin'),
                ]
            ]
        );

        $this->end_controls_section();

        // ----------------------------------- //
        // ---------- Items Settings ---------- //
        // ----------------------------------- //
        $this->start_controls_section(
            'section_items_settings',
            [
                'label' => esc_html__('Menu Items Settings', 'aiero_plugin'),
                'tab'   => Controls_Manager::TAB_STYLE
            ]
        );

        $this->add_group_control(
            Group_Control_Typography::get_type(),
            [
                'name'      => 'items_typography',
                'label'     => esc_html__('Labels Typography', 'aiero_plugin'),
                'selector'  => '{{WRAPPER}} ul li a'
            ]
        );

        $this->start_controls_tabs('controls_settings_tabs');

            // ------------------------ //
            // ------ Normal Tab ------ //
            // ------------------------ //
            $this->start_controls_tab(
                'tab_control_normal',
                [
                    'label' => esc_html__('Normal', 'aiero_plugin')
                ]
            );

                $this->add_control(
                    'labels_color',
                    [
                        'label'     => esc_html__('Labels Color', 'aiero_plugin'),
                        'type'      => Controls_Manager::COLOR,
                        'selectors' => [
                            '{{WRAPPER}} ul li a:not(:hover)' => 'color: {{VALUE}};'
                        ]
                    ]
                );

            $this->end_controls_tab();

            // ----------------------- //
            // ------ Hover Tab ------ //
            // ----------------------- //
            $this->start_controls_tab(
                'tab_control_hover',
                [
                    'label' => esc_html__('Hover', 'aiero_plugin')
                ]
            );

                $this->add_control(
                    'labels_color_hover',
                    [
                        'label' => esc_html__('Labels Color', 'aiero_plugin'),
                        'type' => Controls_Manager::COLOR,
                        'selectors' => [
                            '{{WRAPPER}} ul li a:hover, {{WRAPPER}} ul li.active a' => 'color: {{VALUE}};',
                            '{{WRAPPER}} ul li.active a:before'                     => 'color: {{VALUE}};'
                        ]
                    ]
                );

            $this->end_controls_tab();

        $this->end_controls_tabs();

        $this->add_control(
            'items_margin',
            [
                'label'         => esc_html__('Items Margin', 'aiero_plugin'),
                'type'          => Controls_Manager::SLIDER,
                'size_units'    => ['px', 'em', '%'],
                'selectors'     => [
                    '{{WRAPPER}} ul li:not(:last-child)' => 'margin-bottom: {{SIZE}}{{UNIT}};'
                ]
            ]
        );

        $this->end_controls_section();
    }

    protected function render() {
        $settings   = $this->get_settings();
        $menu = $settings['menu'];
        $columns_count = $settings['columns_count'];
        $additional_class = !empty($columns_count) ? ' columns-' . $columns_count : '';

        // ------------------------------------ //
        // ---------- Widget Content ---------- //
        // ------------------------------------ //
        ?>

        <?php
            if($menu !== 'default') {
                $menu_args = array(
                    'fallback_cb'           => '',
                    'menu'                  => $menu,
                    'depth'                 => 1,
                    'container'             => 'div',
                    'container_aria_label'  => esc_html__('Menu', 'aiero_plugin'),
                    'items_wrap'            => '<ul id="%1$s" class="%2$s' . esc_attr($additional_class) . '">%3$s</ul>'
                );
                wp_nav_menu($menu_args);
            }
        ?>
        <?php
    }

    protected function content_template() {}

    public function render_plain_content() {}
}