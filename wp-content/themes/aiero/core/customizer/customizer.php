<?php
/*
 * Created by Artureanec
*/

require_once(get_template_directory() . "/core/customizer/customizer-sanitize-functions.php");
require_once(get_template_directory() . "/core/customizer/customizer-defaults.php");
require_once(get_template_directory() . "/core/customizer/customizer-controls.php");

# Register Customizer
add_action('customize_register', 'aiero_customizer_register');
if (!function_exists('aiero_customizer_register')) {
    function aiero_customizer_register($wp_customize) {
        global $aiero_customizer_default_values;

        // ----------------------------------------------- //
        // ---------- Page Settings Panel ---------- //
        // ----------------------------------------------- //
        $wp_customize->add_panel('aiero_page_settings',
            array(
                'title'     => esc_html__('Page Settings', 'aiero'),
                'priority'  => 125
            )
        );

        // ---###################--- //
        // ---### Page Top Background ###--- //
        // ---###################--- //
        $wp_customize->add_section('aiero_page_top_bg',
            array(
                'title' => esc_html__('Page Top Background', 'aiero'),
                'panel' => 'aiero_page_settings'
            )
        );

        // ----------------------------------------- //
        // --- Page Background Image Top Status --- //
        // ----------------------------------------- //
        $wp_setting_name = 'page_background_image_top_status';
        $wp_customize->add_setting(
            $wp_setting_name,
            array(
                'default'           => $aiero_customizer_default_values[$wp_setting_name],
                'sanitize_callback' => 'aiero_sanitize_choice'
            )
        );
        $wp_customize->add_control(new Aiero_Customize_Control(
            $wp_customize,
            $wp_setting_name,
            array(
                'label'     => esc_html__('Show Top Background Image', 'aiero'),
                'section'   => 'aiero_page_top_bg',
                'type'      => 'select',
                'settings'  => $wp_setting_name,
                'choices'   => array(
                    'on'        => esc_html__('Yes', 'aiero'),
                    'off'       => esc_html__('No', 'aiero')
                ),
            )
        ));

        // ----------------------------------- //
        // --- Page Background Image Top --- //
        // ----------------------------------- //

        $wp_setting_name = 'page_background_image_top';
        $wp_customize->add_setting(
            $wp_setting_name,
            array(
                'default'           => $aiero_customizer_default_values[$wp_setting_name],
                'sanitize_callback' => 'esc_url_raw'
            )
        );
        $wp_customize->add_control(new Aiero_Image_Custom_Control(
            $wp_customize,
            $wp_setting_name,
            array(
                'label'         => esc_html__('Top Background Image', 'aiero'),
                'section'       => 'aiero_page_top_bg',
                'settings'      => $wp_setting_name,
                'dependency'    => [
                    [
                        'control'   => 'page_background_image_top_status',
                        'operator'  => '==',
                        'value'     => 'on'
                    ]
                ],
                'separator'     => 'before'
            )
        ));

        // ------------------------------------ //
        // --- Page Background Image Top Background Repeat --- //
        // ------------------------------------ //
        $wp_setting_name = 'page_background_image_top_repeat';
        $wp_customize->add_setting(
            $wp_setting_name,
            array(
                'default'           => $aiero_customizer_default_values[$wp_setting_name],
                'sanitize_callback' => 'aiero_sanitize_choice'
            )
        );
        $wp_customize->add_control(new Aiero_Customize_Control(
            $wp_customize,
            $wp_setting_name,
            array(
                'label'         => esc_html__('Top Background Image Background Repeat', 'aiero'),
                'section'       => 'aiero_page_top_bg',
                'type'          => 'select',
                'settings'      => $wp_setting_name,
                'choices'       => aiero_get_background_repeat_options(),
                'dependency'    => [
                    [
                        'control'   => 'page_background_image_top_status',
                        'operator'  => '==',
                        'value'     => 'on'
                    ]
                ]
            )
        ));

        // ---------------------------------- //
        // --- Page Background Image Top Background Size --- //
        // ---------------------------------- //
        $wp_setting_name = 'page_background_image_top_size';
        $wp_customize->add_setting(
            $wp_setting_name,
            array(
                'default'           => $aiero_customizer_default_values[$wp_setting_name],
                'sanitize_callback' => 'aiero_sanitize_choice'
            )
        );
        $wp_customize->add_control(new Aiero_Customize_Control(
            $wp_customize,
            $wp_setting_name,
            array(
                'label'         => esc_html__('Top Background Image Background Size', 'aiero'),
                'section'       => 'aiero_page_top_bg',
                'type'          => 'select',
                'settings'      => $wp_setting_name,
                'choices'       => aiero_get_background_size_options(),
                'dependency'    => [
                    [
                        'control'   => 'page_background_image_top_status',
                        'operator'  => '==',
                        'value'     => 'on'
                    ]
                ]
            )
        ));
        

        // -------------------------------------------- //
        // ---------- Top Bar Settings Panel ---------- //
        // -------------------------------------------- //
        $wp_customize->add_panel('aiero_top_bar_settings',
            array(
                'title'     => esc_html__('Top Bar Settings', 'aiero'),
                'priority'  => 130
            )
        );

        // ---#######################--- //
        // ---### Top Bar General ###--- //
        // ---#######################--- //
        $wp_customize->add_section('aiero_top_bar_general',
            array(
                'title' => esc_html__('General', 'aiero'),
                'panel' => 'aiero_top_bar_settings'
            )
        );

        // ---------------------- //
        // --- Top Bar Status --- //
        // ---------------------- //
        $wp_setting_name = 'top_bar_status';
        $wp_customize->add_setting(
            $wp_setting_name,
            array(
                'default'           => $aiero_customizer_default_values[$wp_setting_name],
                'sanitize_callback'	=> 'aiero_sanitize_choice'
            )
        );
        $wp_customize->add_control(new Aiero_Customize_Control(
            $wp_customize,
            $wp_setting_name,
            array(
                'label'     => esc_html__('Show Top Bar', 'aiero'),
                'section'   => 'aiero_top_bar_general',
                'type'      => 'select',
                'settings'  => $wp_setting_name,
                'choices'   => array(
                    'on'        => esc_html__('Yes', 'aiero'),
                    'off'       => esc_html__('No', 'aiero')
                )
            )
        ));

        // ------------------------- //
        // --- Top Bar Customize --- //
        // ------------------------- //
        $wp_setting_name = 'top_bar_customize';
        $wp_customize->add_setting(
            $wp_setting_name,
            array(
                'default'           => $aiero_customizer_default_values[$wp_setting_name],
                'sanitize_callback'	=> 'aiero_sanitize_choice'
            )
        );
        $wp_customize->add_control(new Aiero_Customize_Control(
            $wp_customize,
            $wp_setting_name,
            array(
                'label'     => esc_html__('Customize', 'aiero'),
                'section'   => 'aiero_top_bar_general',
                'type'      => 'select',
                'settings'  => $wp_setting_name,
                'choices'   => array(
                    'on'        => esc_html__('Yes', 'aiero'),
                    'off'       => esc_html__('No', 'aiero')
                )
            )
        ));

        // ---------------------------------- //
        // --- Top Bar Default Text Color --- //
        // ---------------------------------- //
        $wp_setting_name = 'top_bar_default_text_color';
        $wp_customize->add_setting(
            $wp_setting_name,
            array(
                'default'           => $aiero_customizer_default_values[$wp_setting_name],
                'sanitize_callback'	=> 'aiero_sanitize_color'
            )
        );
        $wp_customize->add_control(new Aiero_Color_Custom_Control(
            $wp_customize,
            $wp_setting_name,
            array(
                'label'         => esc_html__('Default Text Color', 'aiero'),
                'section'       => 'aiero_top_bar_general',
                'settings'      => $wp_setting_name,
                'dependency'    => [
                    [
                        'control'   => 'top_bar_customize',
                        'operator'  => '==',
                        'value'     => 'on'
                    ]
                ],
                'separator'     => 'before'
            )
        ));

        // ------------------------------- //
        // --- Top Bar Dark Text Color --- //
        // ------------------------------- //
        $wp_setting_name = 'top_bar_dark_text_color';
        $wp_customize->add_setting(
            $wp_setting_name,
            array(
                'default'           => $aiero_customizer_default_values[$wp_setting_name],
                'sanitize_callback'	=> 'aiero_sanitize_color'
            )
        );
        $wp_customize->add_control(new Aiero_Color_Custom_Control(
            $wp_customize,
            $wp_setting_name,
            array(
                'label'         => esc_html__('Dark Text Color', 'aiero'),
                'section'       => 'aiero_top_bar_general',
                'settings'      => $wp_setting_name,
                'dependency'    => [
                    [
                        'control'   => 'top_bar_customize',
                        'operator'  => '==',
                        'value'     => 'on'
                    ]
                ]
            )
        ));

        // -------------------------------- //
        // --- Top Bar Light Text Color --- //
        // -------------------------------- //
        $wp_setting_name = 'top_bar_light_text_color';
        $wp_customize->add_setting(
            $wp_setting_name,
            array(
                'default'           => $aiero_customizer_default_values[$wp_setting_name],
                'sanitize_callback'	=> 'aiero_sanitize_color'
            )
        );
        $wp_customize->add_control(new Aiero_Color_Custom_Control(
            $wp_customize,
            $wp_setting_name,
            array(
                'label'         => esc_html__('Light Text Color', 'aiero'),
                'section'       => 'aiero_top_bar_general',
                'settings'      => $wp_setting_name,
                'dependency'    => [
                    [
                        'control'   => 'top_bar_customize',
                        'operator'  => '==',
                        'value'     => 'on'
                    ]
                ]
            )
        ));

        // --------------------------------- //
        // --- Top Bar Accent Text Color --- //
        // --------------------------------- //
        $wp_setting_name = 'top_bar_accent_text_color';
        $wp_customize->add_setting(
            $wp_setting_name,
            array(
                'default'           => $aiero_customizer_default_values[$wp_setting_name],
                'sanitize_callback'	=> 'aiero_sanitize_color'
            )
        );
        $wp_customize->add_control(new Aiero_Color_Custom_Control(
            $wp_customize,
            $wp_setting_name,
            array(
                'label'         => esc_html__('Accent Text Color', 'aiero'),
                'section'       => 'aiero_top_bar_general',
                'settings'      => $wp_setting_name,
                'dependency'    => [
                    [
                        'control'   => 'top_bar_customize',
                        'operator'  => '==',
                        'value'     => 'on'
                    ]
                ]
            )
        ));

        // ---------------------------- //
        // --- Top Bar Border Color --- //
        // ---------------------------- //
        $wp_setting_name = 'top_bar_border_color';
        $wp_customize->add_setting(
            $wp_setting_name,
            array(
                'default'           => $aiero_customizer_default_values[$wp_setting_name],
                'sanitize_callback'	=> 'aiero_sanitize_color'
            )
        );
        $wp_customize->add_control(new Aiero_Color_Custom_Control(
            $wp_customize,
            $wp_setting_name,
            array(
                'label'         => esc_html__('Border Color', 'aiero'),
                'section'       => 'aiero_top_bar_general',
                'settings'      => $wp_setting_name,
                'dependency'    => [
                    [
                        'control'   => 'top_bar_customize',
                        'operator'  => '==',
                        'value'     => 'on'
                    ]
                ],
                'separator'     => 'before'
            )
        ));

        // ------------------------------------ //
        // --- Top Bar Hovered Border Color --- //
        // ------------------------------------ //
        $wp_setting_name = 'top_bar_border_hover_color';
        $wp_customize->add_setting(
            $wp_setting_name,
            array(
                'default'           => $aiero_customizer_default_values[$wp_setting_name],
                'sanitize_callback'	=> 'aiero_sanitize_color'
            )
        );
        $wp_customize->add_control(new Aiero_Color_Custom_Control(
            $wp_customize,
            $wp_setting_name,
            array(
                'label'         => esc_html__('Hovered Border Color', 'aiero'),
                'section'       => 'aiero_top_bar_general',
                'settings'      => $wp_setting_name,
                'dependency'    => [
                    [
                        'control'   => 'top_bar_customize',
                        'operator'  => '==',
                        'value'     => 'on'
                    ]
                ]
            )
        ));

        // -------------------------------- //
        // --- Top Bar Background Color --- //
        // -------------------------------- //
        $wp_setting_name = 'top_bar_background_color';
        $wp_customize->add_setting(
            $wp_setting_name,
            array(
                'default'           => $aiero_customizer_default_values[$wp_setting_name],
                'sanitize_callback'	=> 'aiero_sanitize_color'
            )
        );
        $wp_customize->add_control(new Aiero_Color_Custom_Control(
            $wp_customize,
            $wp_setting_name,
            array(
                'label'         => esc_html__('Background Color', 'aiero'),
                'section'       => 'aiero_top_bar_general',
                'settings'      => $wp_setting_name,
                'dependency'    => [
                    [
                        'control'   => 'top_bar_customize',
                        'operator'  => '==',
                        'value'     => 'on'
                    ]
                ],
                'separator'     => 'before'
            )
        ));

        // -------------------------------------------- //
        // --- Top Bar Alternative Background Color --- //
        // -------------------------------------------- //
        $wp_setting_name = 'top_bar_background_alter_color';
        $wp_customize->add_setting(
            $wp_setting_name,
            array(
                'default'           => $aiero_customizer_default_values[$wp_setting_name],
                'sanitize_callback'	=> 'aiero_sanitize_color'
            )
        );
        $wp_customize->add_control(new Aiero_Color_Custom_Control(
            $wp_customize,
            $wp_setting_name,
            array(
                'label'         => esc_html__('Alternative Background Color', 'aiero'),
                'section'       => 'aiero_top_bar_general',
                'settings'      => $wp_setting_name,
                'dependency'    => [
                    [
                        'control'   => 'top_bar_customize',
                        'operator'  => '==',
                        'value'     => 'on'
                    ]
                ]
            )
        ));

        // --------------------------------- //
        // --- Top Bar Button Text Color --- //
        // --------------------------------- //
        $wp_setting_name = 'top_bar_button_text_color';
        $wp_customize->add_setting(
            $wp_setting_name,
            array(
                'default'           => $aiero_customizer_default_values[$wp_setting_name],
                'sanitize_callback'	=> 'aiero_sanitize_color'
            )
        );
        $wp_customize->add_control(new Aiero_Color_Custom_Control(
            $wp_customize,
            $wp_setting_name,
            array(
                'label'         => esc_html__('Button Text Color', 'aiero'),
                'section'       => 'aiero_top_bar_general',
                'settings'      => $wp_setting_name,
                'dependency'    => [
                    [
                        'control'   => 'top_bar_customize',
                        'operator'  => '==',
                        'value'     => 'on'
                    ]
                ],
                'separator'     => 'before'
            )
        ));

        // ----------------------------------- //
        // --- Top Bar Button Border Color --- //
        // ----------------------------------- //
        $wp_setting_name = 'top_bar_button_border_color';
        $wp_customize->add_setting(
            $wp_setting_name,
            array(
                'default'           => $aiero_customizer_default_values[$wp_setting_name],
                'sanitize_callback'	=> 'aiero_sanitize_color'
            )
        );
        $wp_customize->add_control(new Aiero_Color_Custom_Control(
            $wp_customize,
            $wp_setting_name,
            array(
                'label'         => esc_html__('Button Border Color', 'aiero'),
                'section'       => 'aiero_top_bar_general',
                'settings'      => $wp_setting_name,
                'dependency'    => [
                    [
                        'control'   => 'top_bar_customize',
                        'operator'  => '==',
                        'value'     => 'on'
                    ]
                ]
            )
        ));

        // --------------------------------------- //
        // --- Top Bar Button Background Color --- //
        // --------------------------------------- //
        $wp_setting_name = 'top_bar_button_background_color';
        $wp_customize->add_setting(
            $wp_setting_name,
            array(
                'default'           => $aiero_customizer_default_values[$wp_setting_name],
                'sanitize_callback'	=> 'aiero_sanitize_color'
            )
        );
        $wp_customize->add_control(new Aiero_Color_Custom_Control(
            $wp_customize,
            $wp_setting_name,
            array(
                'label'         => esc_html__('Button Background Color', 'aiero'),
                'section'       => 'aiero_top_bar_general',
                'settings'      => $wp_setting_name,
                'dependency'    => [
                    [
                        'control'   => 'top_bar_customize',
                        'operator'  => '==',
                        'value'     => 'on'
                    ]
                ]
            )
        ));

        // --------------------------------- //
        // --- Top Bar Button Text Hover --- //
        // --------------------------------- //
        $wp_setting_name = 'top_bar_button_text_hover';
        $wp_customize->add_setting(
            $wp_setting_name,
            array(
                'default'           => $aiero_customizer_default_values[$wp_setting_name],
                'sanitize_callback'	=> 'aiero_sanitize_color'
            )
        );
        $wp_customize->add_control(new Aiero_Color_Custom_Control(
            $wp_customize,
            $wp_setting_name,
            array(
                'label'         => esc_html__('Button Text Hover', 'aiero'),
                'section'       => 'aiero_top_bar_general',
                'settings'      => $wp_setting_name,
                'dependency'    => [
                    [
                        'control'   => 'top_bar_customize',
                        'operator'  => '==',
                        'value'     => 'on'
                    ]
                ]
            )
        ));

        // ----------------------------------- //
        // --- Top Bar Button Border Hover --- //
        // ----------------------------------- //
        $wp_setting_name = 'top_bar_button_border_hover';
        $wp_customize->add_setting(
            $wp_setting_name,
            array(
                'default'           => $aiero_customizer_default_values[$wp_setting_name],
                'sanitize_callback'	=> 'aiero_sanitize_color'
            )
        );
        $wp_customize->add_control(new Aiero_Color_Custom_Control(
            $wp_customize,
            $wp_setting_name,
            array(
                'label'         => esc_html__('Button Border Hover', 'aiero'),
                'section'       => 'aiero_top_bar_general',
                'settings'      => $wp_setting_name,
                'dependency'    => [
                    [
                        'control'   => 'top_bar_customize',
                        'operator'  => '==',
                        'value'     => 'on'
                    ]
                ]
            )
        ));

        // --------------------------------------- //
        // --- Top Bar Button Background Hover --- //
        // --------------------------------------- //
        $wp_setting_name = 'top_bar_button_background_hover';
        $wp_customize->add_setting(
            $wp_setting_name,
            array(
                'default'           => $aiero_customizer_default_values[$wp_setting_name],
                'sanitize_callback'	=> 'aiero_sanitize_color'
            )
        );
        $wp_customize->add_control(new Aiero_Color_Custom_Control(
            $wp_customize,
            $wp_setting_name,
            array(
                'label'         => esc_html__('Button Background Hover', 'aiero'),
                'section'       => 'aiero_top_bar_general',
                'settings'      => $wp_setting_name,
                'dependency'    => [
                    [
                        'control'   => 'top_bar_customize',
                        'operator'  => '==',
                        'value'     => 'on'
                    ]
                ]
            )
        ));


        // ---##############################--- //
        // ---### Top Bar Social Buttons ###--- //
        // ---##############################--- //
        $wp_customize->add_section('aiero_top_bar_socials',
            array(
                'title' => esc_html__('Social Buttons', 'aiero'),
                'panel' => 'aiero_top_bar_settings'
            )
        );

        // ------------------------------ //
        // --- Top Bar Socials Status --- //
        // ------------------------------ //
        $wp_setting_name = 'top_bar_socials_status';
        $wp_customize->add_setting(
            $wp_setting_name,
            array(
                'default'           => $aiero_customizer_default_values[$wp_setting_name],
                'sanitize_callback'	=> 'aiero_sanitize_choice'
            )
        );
        $wp_customize->add_control(new Aiero_Customize_Control(
            $wp_customize,
            $wp_setting_name,
            array(
                'label'     => esc_html__('Show Social Buttons', 'aiero'),
                'section'   => 'aiero_top_bar_socials',
                'type'      => 'select',
                'settings'  => $wp_setting_name,
                'choices'   => array(
                    'on'        => esc_html__('Yes', 'aiero'),
                    'off'       => esc_html__('No', 'aiero')
                )
            )
        ));

        // ---------------------------- //
        // --- Top Bar Contacts Title --- //
        // ---------------------------- //
        $wp_setting_name = 'top_bar_socials_title';
        $wp_customize->add_setting(
            $wp_setting_name,
            array(
                'default'           => $aiero_customizer_default_values[$wp_setting_name],
                'sanitize_callback' => 'sanitize_text_field'
            )
        );
        $wp_customize->add_control(new Aiero_Customize_Control(
            $wp_customize,
            $wp_setting_name,
            array(
                'label'         => esc_html__('Social Buttons Title', 'aiero'),
                'section'       => 'aiero_top_bar_socials',
                'type'          => 'text',
                'settings'      => $wp_setting_name,
                'dependency'    => [
                    [
                        'control'   => 'top_bar_socials_status',
                        'operator'  => '==',
                        'value'     => 'on'
                    ]
                ]
            )
        ));


        // ---###############################--- //
        // ---### Top Bar Additional Text ###--- //
        // ---###############################--- //
        $wp_customize->add_section('aiero_top_bar_additional_text',
            array(
                'title' => esc_html__('Additional Text', 'aiero'),
                'panel' => 'aiero_top_bar_settings'
            )
        );

        // -------------------------------------- //
        // --- Top Bar Additional Text Status --- //
        // -------------------------------------- //
        $wp_setting_name = 'top_bar_additional_text_status';
        $wp_customize->add_setting(
            $wp_setting_name,
            array(
                'default'           => $aiero_customizer_default_values[$wp_setting_name],
                'sanitize_callback'	=> 'aiero_sanitize_choice'
            )
        );
        $wp_customize->add_control(new Aiero_Customize_Control(
            $wp_customize,
            $wp_setting_name,
            array(
                'label'     => esc_html__('Show Additional Text', 'aiero'),
                'section'   => 'aiero_top_bar_additional_text',
                'type'      => 'select',
                'settings'  => $wp_setting_name,
                'choices'   => array(
                    'on'        => esc_html__('Yes', 'aiero'),
                    'off'       => esc_html__('No', 'aiero')
                )
            )
        ));

        // ------------------------------------- //
        // --- Top Bar Additional Text Title --- //
        // ------------------------------------- //
        $wp_setting_name = 'top_bar_additional_text_title';
        $wp_customize->add_setting(
            $wp_setting_name,
            array(
                'default'           => $aiero_customizer_default_values[$wp_setting_name],
                'sanitize_callback'	=> 'wp_kses_post'
            )
        );
        $wp_customize->add_control(new Aiero_Customize_Control(
            $wp_customize,
            $wp_setting_name,
            array(
                'label'         => esc_html__('Additional Text Title', 'aiero'),
                'section'       => 'aiero_top_bar_additional_text',
                'type'          => 'text',
                'settings'      => $wp_setting_name,
                'dependency'    => [
                    [
                        'control'   => 'top_bar_additional_text_status',
                        'operator'  => '==',
                        'value'     => 'on'
                    ]
                ]
            )
        ));

        // ------------------------------- //
        // --- Top Bar Additional Text --- //
        // ------------------------------- //
        $wp_setting_name = 'top_bar_additional_text';
        $wp_customize->add_setting(
            $wp_setting_name,
            array(
                'default'           => $aiero_customizer_default_values[$wp_setting_name],
                'sanitize_callback'	=> 'wp_kses_post'
            )
        );
        $wp_customize->add_control(new Aiero_Customize_Control(
            $wp_customize,
            $wp_setting_name,
            array(
                'label'         => esc_html__('Additional Text', 'aiero'),
                'section'       => 'aiero_top_bar_additional_text',
                'type'          => 'text',
                'settings'      => $wp_setting_name,
                'dependency'    => [
                    [
                        'control'   => 'top_bar_additional_text_status',
                        'operator'  => '==',
                        'value'     => 'on'
                    ]
                ]
            )
        ));


        // ---########################--- //
        // ---### Top Bar Contacts ###--- //
        // ---########################--- //
        $wp_customize->add_section('aiero_top_bar_contacts',
            array(
                'title' => esc_html__('Contacts', 'aiero'),
                'panel' => 'aiero_top_bar_settings'
            )
        );

        // ---------------------------- //
        // --- Top Bar Contacts Title --- //
        // ---------------------------- //
        $wp_setting_name = 'top_bar_contacts_title';
        $wp_customize->add_setting(
            $wp_setting_name,
            array(
                'default'           => $aiero_customizer_default_values[$wp_setting_name],
                'sanitize_callback' => 'sanitize_text_field'
            )
        );
        $wp_customize->add_control(new Aiero_Customize_Control(
            $wp_customize,
            $wp_setting_name,
            array(
                'label'         => esc_html__('Mobile Menu Contacts Title', 'aiero'),
                'section'       => 'aiero_top_bar_contacts',
                'type'          => 'text',
                'settings'      => $wp_setting_name
            )
        ));

        // ----------------------------------- //
        // --- Top Bar Phone Number Status --- //
        // ----------------------------------- //
        $wp_setting_name = 'top_bar_contacts_phone_status';
        $wp_customize->add_setting(
            $wp_setting_name,
            array(
                'default'           => $aiero_customizer_default_values[$wp_setting_name],
                'sanitize_callback' => 'aiero_sanitize_choice'
            )
        );
        $wp_customize->add_control(new Aiero_Customize_Control(
            $wp_customize,
            $wp_setting_name,
            array(
                'label'     => esc_html__('Show Phone Number', 'aiero'),
                'section'   => 'aiero_top_bar_contacts',
                'type'      => 'select',
                'settings'  => $wp_setting_name,
                'choices'   => array(
                    'on'        => esc_html__('Yes', 'aiero'),
                    'off'       => esc_html__('No', 'aiero')
                )
            )
        ));

        // ---------------------------- //
        // --- Top Bar Phone Title --- //
        // ---------------------------- //
        $wp_setting_name = 'top_bar_contacts_phone_title';
        $wp_customize->add_setting(
            $wp_setting_name,
            array(
                'default'           => $aiero_customizer_default_values[$wp_setting_name],
                'sanitize_callback' => 'sanitize_text_field'
            )
        );
        $wp_customize->add_control(new Aiero_Customize_Control(
            $wp_customize,
            $wp_setting_name,
            array(
                'label'         => esc_html__('Phone Title', 'aiero'),
                'section'       => 'aiero_top_bar_contacts',
                'type'          => 'text',
                'settings'      => $wp_setting_name,
                'dependency'    => [
                    [
                        'control'   => 'top_bar_contacts_phone_status',
                        'operator'  => '==',
                        'value'     => 'on'
                    ]
                ]
            )
        ));

        // ---------------------------- //
        // --- Top Bar Phone Number --- //
        // ---------------------------- //
        $wp_setting_name = 'top_bar_contacts_phone';
        $wp_customize->add_setting(
            $wp_setting_name,
            array(
                'default'           => $aiero_customizer_default_values[$wp_setting_name],
                'sanitize_callback' => 'sanitize_text_field'
            )
        );
        $wp_customize->add_control(new Aiero_Customize_Control(
            $wp_customize,
            $wp_setting_name,
            array(
                'label'         => esc_html__('Phone Number', 'aiero'),
                'section'       => 'aiero_top_bar_contacts',
                'type'          => 'text',
                'settings'      => $wp_setting_name,
                'dependency'    => [
                    [
                        'control'   => 'top_bar_contacts_phone_status',
                        'operator'  => '==',
                        'value'     => 'on'
                    ]
                ]
            )
        ));

        // ------------------------------------ //
        // --- Top Bar Email Address Status --- //
        // ------------------------------------ //
        $wp_setting_name = 'top_bar_contacts_email_status';
        $wp_customize->add_setting(
            $wp_setting_name,
            array(
                'default'           => $aiero_customizer_default_values[$wp_setting_name],
                'sanitize_callback'	=> 'aiero_sanitize_choice'
            )
        );
        $wp_customize->add_control(new Aiero_Customize_Control(
            $wp_customize,
            $wp_setting_name,
            array(
                'label'     => esc_html__('Show Email Address', 'aiero'),
                'section'   => 'aiero_top_bar_contacts',
                'type'      => 'select',
                'settings'  => $wp_setting_name,
                'choices'   => array(
                    'on'        => esc_html__('Yes', 'aiero'),
                    'off'       => esc_html__('No', 'aiero')
                )
            )
        ));

        // ---------------------------- //
        // --- Top Bar Email Title --- //
        // ---------------------------- //
        $wp_setting_name = 'top_bar_contacts_email_title';
        $wp_customize->add_setting(
            $wp_setting_name,
            array(
                'default'           => $aiero_customizer_default_values[$wp_setting_name],
                'sanitize_callback' => 'sanitize_text_field'
            )
        );
        $wp_customize->add_control(new Aiero_Customize_Control(
            $wp_customize,
            $wp_setting_name,
            array(
                'label'         => esc_html__('Email Title', 'aiero'),
                'section'       => 'aiero_top_bar_contacts',
                'type'          => 'text',
                'settings'      => $wp_setting_name,
                'dependency'    => [
                    [
                        'control'   => 'top_bar_contacts_email_status',
                        'operator'  => '==',
                        'value'     => 'on'
                    ]
                ]
            )
        ));

        // ----------------------------- //
        // --- Top Bar Email Address --- //
        // ----------------------------- //
        $wp_setting_name = 'top_bar_contacts_email';
        $wp_customize->add_setting(
            $wp_setting_name,
            array(
                'default'           => $aiero_customizer_default_values[$wp_setting_name],
                'sanitize_callback'	=> 'aiero_sanitize_email'
            )
        );
        $wp_customize->add_control(new Aiero_Customize_Control(
            $wp_customize,
            $wp_setting_name,
            array(
                'label'         => esc_html__('Email Address', 'aiero'),
                'section'       => 'aiero_top_bar_contacts',
                'type'          => 'email',
                'settings'      => $wp_setting_name,
                'dependency'    => [
                    [
                        'control'   => 'top_bar_contacts_email_status',
                        'operator'  => '==',
                        'value'     => 'on'
                    ]
                ]
            )
        ));        

        // ------------------------------ //
        // --- Top Bar Address Status --- //
        // ------------------------------ //
        $wp_setting_name = 'top_bar_contacts_address_status';
        $wp_customize->add_setting(
            $wp_setting_name,
            array(
                'default'           => $aiero_customizer_default_values[$wp_setting_name],
                'sanitize_callback'	=> 'aiero_sanitize_choice'
            )
        );
        $wp_customize->add_control(new Aiero_Customize_Control(
            $wp_customize,
            $wp_setting_name,
            array(
                'label'     => esc_html__('Show Address', 'aiero'),
                'section'   => 'aiero_top_bar_contacts',
                'type'      => 'select',
                'settings'  => $wp_setting_name,
                'choices'   => array(
                    'on'        => esc_html__('Yes', 'aiero'),
                    'off'       => esc_html__('No', 'aiero')
                )
            )
        ));

         // ------------------------- //
        // --- Top Address Title --- //
        // ------------------------- //
        $wp_setting_name = 'top_bar_contacts_address_title';
        $wp_customize->add_setting(
            $wp_setting_name,
            array(
                'default'           => $aiero_customizer_default_values[$wp_setting_name],
                'sanitize_callback' => 'sanitize_text_field'
            )
        );
        $wp_customize->add_control(new Aiero_Customize_Control(
            $wp_customize,
            $wp_setting_name,
            array(
                'label'         => esc_html__('Address Title', 'aiero'),
                'section'       => 'aiero_top_bar_contacts',
                'type'          => 'text',
                'settings'      => $wp_setting_name,
                'dependency'    => [
                    [
                        'control'   => 'top_bar_contacts_address_status',
                        'operator'  => '==',
                        'value'     => 'on'
                    ]
                ]
            )
        ));

        // ----------------------- //
        // --- Top Bar Address --- //
        // ----------------------- //
        $wp_setting_name = 'top_bar_contacts_address';
        $wp_customize->add_setting(
            $wp_setting_name,
            array(
                'default'           => $aiero_customizer_default_values[$wp_setting_name],
                'sanitize_callback'	=> 'sanitize_text_field'
            )
        );
        $wp_customize->add_control(new Aiero_Customize_Control(
            $wp_customize,
            $wp_setting_name,
            array(
                'label'         => esc_html__('Address', 'aiero'),
                'section'       => 'aiero_top_bar_contacts',
                'type'          => 'text',
                'settings'      => $wp_setting_name,
                'dependency'    => [
                    [
                        'control'   => 'top_bar_contacts_address_status',
                        'operator'  => '==',
                        'value'     => 'on'
                    ]
                ]
            )
        ));


        // ------------------------------------------- //
        // ---------- Header Settings Panel ---------- //
        // ------------------------------------------- //
        $wp_customize->add_panel('aiero_header_settings',
            array(
                'title'     => esc_html__('Header Settings', 'aiero'),
                'priority'  => 130
            )
        );

        // ---######################--- //
        // ---### Header General ###--- //
        // ---######################--- //
        $wp_customize->add_section('aiero_header_general',
            array(
                'title' => esc_html__('General', 'aiero'),
                'panel' => 'aiero_header_settings'
            )
        );

        // --------------------- //
        // --- Header Status --- //
        // --------------------- //
        $wp_setting_name = 'header_status';
        $wp_customize->add_setting(
            $wp_setting_name,
            array(
                'default'           => $aiero_customizer_default_values[$wp_setting_name],
                'sanitize_callback'	=> 'aiero_sanitize_choice'
            )
        );
        $wp_customize->add_control(new Aiero_Customize_Control(
            $wp_customize,
            $wp_setting_name,
            array(
                'label'     => esc_html__('Show Header', 'aiero'),
                'section'   => 'aiero_header_general',
                'type'      => 'select',
                'settings'  => $wp_setting_name,
                'choices'   => array(
                    'on'        => esc_html__('Yes', 'aiero'),
                    'off'       => esc_html__('No', 'aiero')
                )
            )
        ));

        // ------------------- //
        // --- Header Type --- //
        // ------------------- //
        $wp_setting_name = 'header_style';
        $wp_customize->add_setting(
            $wp_setting_name,
            array(
                'default'           => $aiero_customizer_default_values[$wp_setting_name],
                'sanitize_callback'	=> 'aiero_sanitize_choice'
            )
        );
        $wp_customize->add_control(new Aiero_Customize_Control(
            $wp_customize,
            $wp_setting_name,
            array(
                'label'     => esc_html__('Header Style', 'aiero'),
                'section'   => 'aiero_header_general',
                'type'      => 'select',
                'settings'  => $wp_setting_name,
                'choices'   => array(
                    'type-1'    => esc_html__('Style Type 1', 'aiero'),
                    'type-2'    => esc_html__('Style Type 2', 'aiero'),
                    'type-3'    => esc_html__('Style Type 3', 'aiero'),
                    'type-4'    => esc_html__('Style Type 4', 'aiero')
                )
            )
        ));

        // ----------------------- //
        // --- Header Position --- //
        // ----------------------- //
        $wp_setting_name = 'header_position';
        $wp_customize->add_setting(
            $wp_setting_name,
            array(
                'default'           => $aiero_customizer_default_values[$wp_setting_name],
                'sanitize_callback'	=> 'aiero_sanitize_choice'
            )
        );
        $wp_customize->add_control(new Aiero_Customize_Control(
            $wp_customize,
            $wp_setting_name,
            array(
                'label'     => esc_html__('Header Position', 'aiero'),
                'section'   => 'aiero_header_general',
                'type'      => 'select',
                'settings'  => $wp_setting_name,
                'choices'   => array(
                    'above'     => esc_html__('Above', 'aiero'),
                    'over'      => esc_html__('Over', 'aiero')
                )
            )
        ));


        // ------------------------- //
        // --- Header Transparent --- //
        // ------------------------- //
        $wp_setting_name = 'header_transparent';
        $wp_customize->add_setting(
            $wp_setting_name,
            array(
                'default'           => $aiero_customizer_default_values[$wp_setting_name],
                'sanitize_callback' => 'aiero_sanitize_checkbox'
            )
        );
        $wp_customize->add_control(new Aiero_Customize_Control(
            $wp_customize,
            $wp_setting_name,
            array(
                'label'         => esc_html__('Transparent Header', 'aiero'),
                'section'       => 'aiero_header_general',
                'type'          => 'checkbox',
                'settings'      => $wp_setting_name
            )
        ));        

        // ------------------------- //
        // --- Header Border --- //
        // ------------------------- //
        $wp_setting_name = 'header_border';
        $wp_customize->add_setting(
            $wp_setting_name,
            array(
                'default'           => $aiero_customizer_default_values[$wp_setting_name],
                'sanitize_callback' => 'aiero_sanitize_choice'
            )
        );
        $wp_customize->add_control(new Aiero_Customize_Control(
            $wp_customize,
            $wp_setting_name,
            array(
                'label'     => esc_html__('Border Style', 'aiero'),
                'section'   => 'aiero_header_general',
                'type'      => 'select',
                'settings'  => $wp_setting_name,
                'choices'   => array(
                    'none'    => esc_html__('No Border', 'aiero'),
                    'border'  => esc_html__('Border', 'aiero')
                )
            )
        ));

        // ------------------------ //
        // --- Header Customize --- //
        // ------------------------ //
        $wp_setting_name = 'header_customize';
        $wp_customize->add_setting(
            $wp_setting_name,
            array(
                'default'           => $aiero_customizer_default_values[$wp_setting_name],
                'sanitize_callback'	=> 'aiero_sanitize_choice'
            )
        );
        $wp_customize->add_control(new Aiero_Customize_Control(
            $wp_customize,
            $wp_setting_name,
            array(
                'label'     => esc_html__('Customize', 'aiero'),
                'section'   => 'aiero_header_general',
                'type'      => 'select',
                'settings'  => $wp_setting_name,
                'choices'   => array(
                    'on'        => esc_html__('Yes', 'aiero'),
                    'off'       => esc_html__('No', 'aiero')
                )
            )
        ));

        // ------------------------- //
        // --- Header Top Offset --- //
        // ------------------------- //
        $wp_setting_name = 'header_offset_top';
        $wp_customize->add_setting(
            $wp_setting_name,
            array(
                'default'           => $aiero_customizer_default_values[$wp_setting_name],
                'sanitize_callback' => 'sanitize_text_field'
            )
        );
        $wp_customize->add_control(new Aiero_Customize_Control(
            $wp_customize,
            $wp_setting_name,
            array(
                'label'         => esc_html__('Header Offset Top, in px', 'aiero'),
                'section'       => 'aiero_header_general',
                'type'          => 'number',
                'settings'      => $wp_setting_name,
                'dependency'    => [
                    [
                        'control'           => 'header_customize',
                        'operator'          => '==',
                        'value'             => 'on'
                    ]
                ]
            )
        ));

        // --------------------------------- //
        // --- Header Default Text Color --- //
        // --------------------------------- //
        $wp_setting_name = 'header_default_text_color';
        $wp_customize->add_setting(
            $wp_setting_name,
            array(
                'default'           => $aiero_customizer_default_values[$wp_setting_name],
                'sanitize_callback'	=> 'aiero_sanitize_color'
            )
        );
        $wp_customize->add_control(new Aiero_Color_Custom_Control(
            $wp_customize,
            $wp_setting_name,
            array(
                'label'         => esc_html__('Default text color', 'aiero'),
                'section'       => 'aiero_header_general',
                'settings'      => $wp_setting_name,
                'dependency'    => [
                    [
                        'control'   => 'header_customize',
                        'operator'  => '==',
                        'value'     => 'on'
                    ]
                ],
                'separator'     => 'before'
            )
        ));

        // ------------------------------ //
        // --- Header Dark Text Color --- //
        // ------------------------------ //
        $wp_setting_name = 'header_dark_text_color';
        $wp_customize->add_setting(
            $wp_setting_name,
            array(
                'default'           => $aiero_customizer_default_values[$wp_setting_name],
                'sanitize_callback'	=> 'aiero_sanitize_color'
            )
        );
        $wp_customize->add_control(new Aiero_Color_Custom_Control(
            $wp_customize,
            $wp_setting_name,
            array(
                'label'         => esc_html__('Dark text color', 'aiero'),
                'section'       => 'aiero_header_general',
                'settings'      => $wp_setting_name,
                'dependency'    => [
                    [
                        'control'   => 'header_customize',
                        'operator'  => '==',
                        'value'     => 'on'
                    ]
                ]
            )
        ));

        // ------------------------------- //
        // --- Header Light Text Color --- //
        // ------------------------------- //
        $wp_setting_name = 'header_light_text_color';
        $wp_customize->add_setting(
            $wp_setting_name,
            array(
                'default'           => $aiero_customizer_default_values[$wp_setting_name],
                'sanitize_callback'	=> 'aiero_sanitize_color'
            )
        );
        $wp_customize->add_control(new Aiero_Color_Custom_Control(
            $wp_customize,
            $wp_setting_name,
            array(
                'label'         => esc_html__('Light text color', 'aiero'),
                'section'       => 'aiero_header_general',
                'settings'      => $wp_setting_name,
                'dependency'    => [
                    [
                        'control'   => 'header_customize',
                        'operator'  => '==',
                        'value'     => 'on'
                    ]
                ]
            )
        ));

        // -------------------------------- //
        // --- Header Accent Text Color --- //
        // -------------------------------- //
        $wp_setting_name = 'header_accent_text_color';
        $wp_customize->add_setting(
            $wp_setting_name,
            array(
                'default'           => $aiero_customizer_default_values[$wp_setting_name],
                'sanitize_callback'	=> 'aiero_sanitize_color'
            )
        );
        $wp_customize->add_control(new Aiero_Color_Custom_Control(
            $wp_customize,
            $wp_setting_name,
            array(
                'label'         => esc_html__('Accent text color', 'aiero'),
                'section'       => 'aiero_header_general',
                'settings'      => $wp_setting_name,
                'dependency'    => [
                    [
                        'control'   => 'header_customize',
                        'operator'  => '==',
                        'value'     => 'on'
                    ]
                ]
            )
        ));

        // -------------------------------- //
        // --- Header Current Text Color --- //
        // -------------------------------- //
        $wp_setting_name = 'header_current_text_color';
        $wp_customize->add_setting(
            $wp_setting_name,
            array(
                'default'           => $aiero_customizer_default_values[$wp_setting_name],
                'sanitize_callback' => 'aiero_sanitize_color'
            )
        );
        $wp_customize->add_control(new Aiero_Color_Custom_Control(
            $wp_customize,
            $wp_setting_name,
            array(
                'label'         => esc_html__('Current Page/Post Text Color', 'aiero'),
                'section'       => 'aiero_header_general',
                'settings'      => $wp_setting_name,
                'dependency'    => [
                    [
                        'control'   => 'header_customize',
                        'operator'  => '==',
                        'value'     => 'on'
                    ]
                ]
            )
        ));

        // -------------------------------- //
        // --- Header Current Text Color --- //
        // -------------------------------- //
        $wp_setting_name = 'header_current_background_color';
        $wp_customize->add_setting(
            $wp_setting_name,
            array(
                'default'           => $aiero_customizer_default_values[$wp_setting_name],
                'sanitize_callback' => 'aiero_sanitize_color'
            )
        );
        $wp_customize->add_control(new Aiero_Color_Custom_Control(
            $wp_customize,
            $wp_setting_name,
            array(
                'label'         => esc_html__('Current Page/Post Background Color', 'aiero'),
                'section'       => 'aiero_header_general',
                'settings'      => $wp_setting_name,
                'dependency'    => [
                    [
                        'control'   => 'header_customize',
                        'operator'  => '==',
                        'value'     => 'on'
                    ]
                ]
            )
        ));

        // -------------------------------- //
        // --- Header Current Border Color --- //
        // -------------------------------- //
        $wp_setting_name = 'header_current_border_color';
        $wp_customize->add_setting(
            $wp_setting_name,
            array(
                'default'           => $aiero_customizer_default_values[$wp_setting_name],
                'sanitize_callback' => 'aiero_sanitize_color'
            )
        );
        $wp_customize->add_control(new Aiero_Color_Custom_Control(
            $wp_customize,
            $wp_setting_name,
            array(
                'label'         => esc_html__('Current Page/Post Border Color', 'aiero'),
                'section'       => 'aiero_header_general',
                'settings'      => $wp_setting_name,
                'dependency'    => [
                    [
                        'control'   => 'header_customize',
                        'operator'  => '==',
                        'value'     => 'on'
                    ]
                ]
            )
        ));

        // --------------------------- //
        // --- Header Border Color --- //
        // --------------------------- //
        $wp_setting_name = 'header_border_color';
        $wp_customize->add_setting(
            $wp_setting_name,
            array(
                'default'           => $aiero_customizer_default_values[$wp_setting_name],
                'sanitize_callback'	=> 'aiero_sanitize_color'
            )
        );
        $wp_customize->add_control(new Aiero_Color_Custom_Control(
            $wp_customize,
            $wp_setting_name,
            array(
                'label'         => esc_html__('Border color', 'aiero'),
                'section'       => 'aiero_header_general',
                'settings'      => $wp_setting_name,
                'dependency'    => [
                    [
                        'control'   => 'header_customize',
                        'operator'  => '==',
                        'value'     => 'on'
                    ]
                ],
                'separator'     => 'before'
            )
        ));

        // ----------------------------------- //
        // --- Header Hovered Border Color --- //
        // ----------------------------------- //
        $wp_setting_name = 'header_border_hover_color';
        $wp_customize->add_setting(
            $wp_setting_name,
            array(
                'default'           => $aiero_customizer_default_values[$wp_setting_name],
                'sanitize_callback'	=> 'aiero_sanitize_color'
            )
        );
        $wp_customize->add_control(new Aiero_Color_Custom_Control(
            $wp_customize,
            $wp_setting_name,
            array(
                'label'         => esc_html__('Hovered Border color', 'aiero'),
                'section'       => 'aiero_header_general',
                'settings'      => $wp_setting_name,
                'dependency'    => [
                    [
                        'control'   => 'header_customize',
                        'operator'  => '==',
                        'value'     => 'on'
                    ]
                ]
            )
        ));

        // ------------------------------- //
        // --- Header Background Color --- //
        // ------------------------------- //
        $wp_setting_name = 'header_background_color';
        $wp_customize->add_setting(
            $wp_setting_name,
            array(
                'default'           => $aiero_customizer_default_values[$wp_setting_name],
                'sanitize_callback'	=> 'aiero_sanitize_color'
            )
        );
        $wp_customize->add_control(new Aiero_Color_Custom_Control(
            $wp_customize,
            $wp_setting_name,
            array(
                'label'         => esc_html__('Background color', 'aiero'),
                'section'       => 'aiero_header_general',
                'settings'      => $wp_setting_name,
                'dependency'    => [
                    [
                        'control'   => 'header_customize',
                        'operator'  => '==',
                        'value'     => 'on'
                    ]
                ],
                'separator'     => 'before'
            )
        ));

        // ------------------------------------------- //
        // --- Header Background Alternative Color --- //
        // ------------------------------------------- //
        $wp_setting_name = 'header_background_alter_color';
        $wp_customize->add_setting(
            $wp_setting_name,
            array(
                'default'           => $aiero_customizer_default_values[$wp_setting_name],
                'sanitize_callback'	=> 'aiero_sanitize_color'
            )
        );
        $wp_customize->add_control(new Aiero_Color_Custom_Control(
            $wp_customize,
            $wp_setting_name,
            array(
                'label'         => esc_html__('Alternative background color', 'aiero'),
                'section'       => 'aiero_header_general',
                'settings'      => $wp_setting_name,
                'dependency'    => [
                    [
                        'control'   => 'header_customize',
                        'operator'  => '==',
                        'value'     => 'on'
                    ]
                ]
            )
        ));

        // -------------------------------- //
        // --- Header Button Text Color --- //
        // -------------------------------- //
        $wp_setting_name = 'header_button_text_color';
        $wp_customize->add_setting(
            $wp_setting_name,
            array(
                'default'           => $aiero_customizer_default_values[$wp_setting_name],
                'sanitize_callback'	=> 'aiero_sanitize_color'
            )
        );
        $wp_customize->add_control(new Aiero_Color_Custom_Control(
            $wp_customize,
            $wp_setting_name,
            array(
                'label'         => esc_html__('Button Text color', 'aiero'),
                'section'       => 'aiero_header_general',
                'settings'      => $wp_setting_name,
                'dependency'    => [
                    [
                        'control'   => 'header_customize',
                        'operator'  => '==',
                        'value'     => 'on'
                    ]
                ],
                'separator'     => 'before'
            )
        ));

        // ---------------------------------- //
        // --- Header Button Border Color --- //
        // ---------------------------------- //
        $wp_setting_name = 'header_button_border_color';
        $wp_customize->add_setting(
            $wp_setting_name,
            array(
                'default'           => $aiero_customizer_default_values[$wp_setting_name],
                'sanitize_callback'	=> 'aiero_sanitize_color'
            )
        );
        $wp_customize->add_control(new Aiero_Color_Custom_Control(
            $wp_customize,
            $wp_setting_name,
            array(
                'label'         => esc_html__('Button Border color', 'aiero'),
                'section'       => 'aiero_header_general',
                'settings'      => $wp_setting_name,
                'dependency'    => [
                    [
                        'control'   => 'header_customize',
                        'operator'  => '==',
                        'value'     => 'on'
                    ]
                ]
            )
        ));

        // ---------------------------------- //
        // --- Header Button Border Color 2 --- //
        // ---------------------------------- //
        $wp_setting_name = 'header_button_border_color_add';
        $wp_customize->add_setting(
            $wp_setting_name,
            array(
                'default'           => $aiero_customizer_default_values[$wp_setting_name],
                'sanitize_callback' => 'aiero_sanitize_color'
            )
        );
        $wp_customize->add_control(new Aiero_Color_Custom_Control(
            $wp_customize,
            $wp_setting_name,
            array(
                'label'         => esc_html__('Button Border color Additional', 'aiero'),
                'section'       => 'aiero_header_general',
                'settings'      => $wp_setting_name,
                'dependency'    => [
                    [
                        'control'   => 'header_customize',
                        'operator'  => '==',
                        'value'     => 'on'
                    ]
                ]
            )
        ));

        // -------------------------------------- //
        // --- Header Button Background Color --- //
        // -------------------------------------- //
        $wp_setting_name = 'header_button_background_color';
        $wp_customize->add_setting(
            $wp_setting_name,
            array(
                'default'           => $aiero_customizer_default_values[$wp_setting_name],
                'sanitize_callback'	=> 'aiero_sanitize_color'
            )
        );
        $wp_customize->add_control(new Aiero_Color_Custom_Control(
            $wp_customize,
            $wp_setting_name,
            array(
                'label'         => esc_html__('Button Background Color', 'aiero'),
                'section'       => 'aiero_header_general',
                'settings'      => $wp_setting_name,
                'dependency'    => [
                    [
                        'control'   => 'header_customize',
                        'operator'  => '==',
                        'value'     => 'on'
                    ]
                ]
            )
        ));

        // -------------------------------------- //
        // --- Header Button Background Color 2 --- //
        // -------------------------------------- //
        $wp_setting_name = 'header_button_background_color_add';
        $wp_customize->add_setting(
            $wp_setting_name,
            array(
                'default'           => $aiero_customizer_default_values[$wp_setting_name],
                'sanitize_callback' => 'aiero_sanitize_color'
            )
        );
        $wp_customize->add_control(new Aiero_Color_Custom_Control(
            $wp_customize,
            $wp_setting_name,
            array(
                'label'         => esc_html__('Button Background Color Additional', 'aiero'),
                'section'       => 'aiero_header_general',
                'settings'      => $wp_setting_name,
                'dependency'    => [
                    [
                        'control'   => 'header_customize',
                        'operator'  => '==',
                        'value'     => 'on'
                    ]
                ]
            )
        ));

        // -------------------------------- //
        // --- Header Button Text Hover --- //
        // -------------------------------- //
        $wp_setting_name = 'header_button_text_hover';
        $wp_customize->add_setting(
            $wp_setting_name,
            array(
                'default'           => $aiero_customizer_default_values[$wp_setting_name],
                'sanitize_callback'	=> 'aiero_sanitize_color'
            )
        );
        $wp_customize->add_control(new Aiero_Color_Custom_Control(
            $wp_customize,
            $wp_setting_name,
            array(
                'label'         => esc_html__('Button Text Hover', 'aiero'),
                'section'       => 'aiero_header_general',
                'settings'      => $wp_setting_name,
                'dependency'    => [
                    [
                        'control'   => 'header_customize',
                        'operator'  => '==',
                        'value'     => 'on'
                    ]
                ]
            )
        ));

        // ---------------------------------- //
        // --- Header Button Border Hover --- //
        // ---------------------------------- //
        $wp_setting_name = 'header_button_border_hover';
        $wp_customize->add_setting(
            $wp_setting_name,
            array(
                'default'           => $aiero_customizer_default_values[$wp_setting_name],
                'sanitize_callback'	=> 'aiero_sanitize_color'
            )
        );
        $wp_customize->add_control(new Aiero_Color_Custom_Control(
            $wp_customize,
            $wp_setting_name,
            array(
                'label'         => esc_html__('Button Border Hover', 'aiero'),
                'section'       => 'aiero_header_general',
                'settings'      => $wp_setting_name,
                'dependency'    => [
                    [
                        'control'   => 'header_customize',
                        'operator'  => '==',
                        'value'     => 'on'
                    ]
                ]
            )
        ));

        // ---------------------------------- //
        // --- Header Button Border Hover 2 --- //
        // ---------------------------------- //
        $wp_setting_name = 'header_button_border_hover_add';
        $wp_customize->add_setting(
            $wp_setting_name,
            array(
                'default'           => $aiero_customizer_default_values[$wp_setting_name],
                'sanitize_callback' => 'aiero_sanitize_color'
            )
        );
        $wp_customize->add_control(new Aiero_Color_Custom_Control(
            $wp_customize,
            $wp_setting_name,
            array(
                'label'         => esc_html__('Button Border Hover Additional', 'aiero'),
                'section'       => 'aiero_header_general',
                'settings'      => $wp_setting_name,
                'dependency'    => [
                    [
                        'control'   => 'header_customize',
                        'operator'  => '==',
                        'value'     => 'on'
                    ]
                ]
            )
        ));

        // -------------------------------------- //
        // --- Header Button Background Hover --- //
        // -------------------------------------- //
        $wp_setting_name = 'header_button_background_hover';
        $wp_customize->add_setting(
            $wp_setting_name,
            array(
                'default'           => $aiero_customizer_default_values[$wp_setting_name],
                'sanitize_callback'	=> 'aiero_sanitize_color'
            )
        );
        $wp_customize->add_control(new Aiero_Color_Custom_Control(
            $wp_customize,
            $wp_setting_name,
            array(
                'label'         => esc_html__('Button Background Hover', 'aiero'),
                'section'       => 'aiero_header_general',
                'settings'      => $wp_setting_name,
                'dependency'    => [
                    [
                        'control'   => 'header_customize',
                        'operator'  => '==',
                        'value'     => 'on'
                    ]
                ]
            )
        ));

        // -------------------------------------- //
        // --- Header Button Background Hover 2 --- //
        // -------------------------------------- //
        $wp_setting_name = 'header_button_background_hover_add';
        $wp_customize->add_setting(
            $wp_setting_name,
            array(
                'default'           => $aiero_customizer_default_values[$wp_setting_name],
                'sanitize_callback' => 'aiero_sanitize_color'
            )
        );
        $wp_customize->add_control(new Aiero_Color_Custom_Control(
            $wp_customize,
            $wp_setting_name,
            array(
                'label'         => esc_html__('Button Background Hover Additional', 'aiero'),
                'section'       => 'aiero_header_general',
                'settings'      => $wp_setting_name,
                'dependency'    => [
                    [
                        'control'   => 'header_customize',
                        'operator'  => '==',
                        'value'     => 'on'
                    ]
                ]
            )
        ));

        // ---------------------------------------- //
        // --- Header Button Border Style --- //
        // ---------------------------------------- //
        $wp_setting_name = 'header_button_border_style';
        $wp_customize->add_setting(
            $wp_setting_name,
            array(
                'default'           => $aiero_customizer_default_values[$wp_setting_name],
                'sanitize_callback' => 'aiero_sanitize_choice'
            )
        );
        $wp_customize->add_control(new Aiero_Customize_Control(
            $wp_customize,
            $wp_setting_name,
            array(
                'label'     => esc_html__('Button Border Style', 'aiero'),
                'section'   => 'aiero_header_general',
                'type'      => 'select',
                'settings'  => $wp_setting_name,
                'choices'   => array(
                    'gradient'    => esc_html__('Gradient', 'aiero'),
                    'solid'       => esc_html__('Solid', 'aiero')
                ),
                'dependency'    => [
                    [
                        'control'   => 'header_customize',
                        'operator'  => '==',
                        'value'     => 'on'
                    ]
                ]
            )
        ));

        // ---------------------------------------- //
        // --- Header Button Background Style --- //
        // ---------------------------------------- //
        $wp_setting_name = 'header_button_background_style';
        $wp_customize->add_setting(
            $wp_setting_name,
            array(
                'default'           => $aiero_customizer_default_values[$wp_setting_name],
                'sanitize_callback' => 'aiero_sanitize_choice'
            )
        );
        $wp_customize->add_control(new Aiero_Customize_Control(
            $wp_customize,
            $wp_setting_name,
            array(
                'label'     => esc_html__('Button Background Style', 'aiero'),
                'section'   => 'aiero_header_general',
                'type'      => 'select',
                'settings'  => $wp_setting_name,
                'choices'   => array(
                    'gradient'    => esc_html__('Gradient', 'aiero'),
                    'solid'       => esc_html__('Solid', 'aiero')
                ),
                'dependency'    => [
                    [
                        'control'   => 'header_customize',
                        'operator'  => '==',
                        'value'     => 'on'
                    ]
                ]
            )
        ));

        // ---------------------------------- //
        // --- Header Menu Text Color --- //
        // ---------------------------------- //
        $wp_setting_name = 'header_menu_text_color';
        $wp_customize->add_setting(
            $wp_setting_name,
            array(
                'default'           => $aiero_customizer_default_values[$wp_setting_name],
                'sanitize_callback' => 'aiero_sanitize_color'
            )
        );
        $wp_customize->add_control(new Aiero_Color_Custom_Control(
            $wp_customize,
            $wp_setting_name,
            array(
                'label'         => esc_html__('Header Menu Text Color', 'aiero'),
                'section'       => 'aiero_header_general',
                'settings'      => $wp_setting_name,
                'dependency'    => [
                    [
                        'control'   => 'header_customize',
                        'operator'  => '==',
                        'value'     => 'on'
                    ]
                ]
            )
        ));

        // ---------------------------------- //
        // --- Header Menu Text Color --- //
        // ---------------------------------- //
        $wp_setting_name = 'header_menu_text_color_hover';
        $wp_customize->add_setting(
            $wp_setting_name,
            array(
                'default'           => $aiero_customizer_default_values[$wp_setting_name],
                'sanitize_callback' => 'aiero_sanitize_color'
            )
        );
        $wp_customize->add_control(new Aiero_Color_Custom_Control(
            $wp_customize,
            $wp_setting_name,
            array(
                'label'         => esc_html__('Header Menu Text Hover Color', 'aiero'),
                'section'       => 'aiero_header_general',
                'settings'      => $wp_setting_name,
                'dependency'    => [
                    [
                        'control'   => 'header_customize',
                        'operator'  => '==',
                        'value'     => 'on'
                    ]
                ]
            )
        ));

        // ------------------------------------------------ //
        // --- Header Menu Text Background Color Hover --- //
        // ----------------------------------------------- //
        $wp_setting_name = 'header_menu_text_background_color_hover';
        $wp_customize->add_setting(
            $wp_setting_name,
            array(
                'default'           => $aiero_customizer_default_values[$wp_setting_name],
                'sanitize_callback' => 'aiero_sanitize_color'
            )
        );
        $wp_customize->add_control(new Aiero_Color_Custom_Control(
            $wp_customize,
            $wp_setting_name,
            array(
                'label'         => esc_html__('Header Menu Text Background Hover Color', 'aiero'),
                'section'       => 'aiero_header_general',
                'settings'      => $wp_setting_name,
                'dependency'    => [
                    [
                        'control'   => 'header_customize',
                        'operator'  => '==',
                        'value'     => 'on'
                    ]
                ]
            )
        ));

        // ---------------------------------- //
        // --- Header Menu Background Color --- //
        // ---------------------------------- //
        $wp_setting_name = 'header_menu_background_color';
        $wp_customize->add_setting(
            $wp_setting_name,
            array(
                'default'           => $aiero_customizer_default_values[$wp_setting_name],
                'sanitize_callback' => 'aiero_sanitize_color'
            )
        );
        $wp_customize->add_control(new Aiero_Color_Custom_Control(
            $wp_customize,
            $wp_setting_name,
            array(
                'label'         => esc_html__('Header Menu Background Color', 'aiero'),
                'section'       => 'aiero_header_general',
                'settings'      => $wp_setting_name,
                'dependency'    => [
                    [
                        'control'   => 'header_customize',
                        'operator'  => '==',
                        'value'     => 'on'
                    ]
                ]
            )
        ));


        // ---#######################--- //
        // ---### Header Callback ###--- //
        // ---#######################--- //
        $wp_customize->add_section('aiero_header_callback',
            array(
                'title' => esc_html__('Header Callback', 'aiero'),
                'panel' => 'aiero_header_settings'
            )
        );

        // ----------------------- //
        // --- Header Callback --- //
        // ----------------------- //
        $wp_setting_name = 'header_callback_status';
        $wp_customize->add_setting(
            $wp_setting_name,
            array(
                'default'           => $aiero_customizer_default_values[$wp_setting_name],
                'sanitize_callback'	=> 'aiero_sanitize_choice'
            )
        );
        $wp_customize->add_control(new Aiero_Customize_Control(
            $wp_customize,
            $wp_setting_name,
            array(
                'label'         => esc_html__('Show header callback block', 'aiero'),
                'section'       => 'aiero_header_callback',
                'type'          => 'select',
                'settings'      => $wp_setting_name,
                'choices'       => array(
                    'on'            => esc_html__('Yes', 'aiero'),
                    'off'           => esc_html__('No', 'aiero')
                )
            )
        ));

        // ----------------------------- //
        // --- Header Callback Title --- //
        // ----------------------------- //
        $wp_setting_name = 'header_callback_title';
        $wp_customize->add_setting(
            $wp_setting_name,
            array(
                'default'           => $aiero_customizer_default_values[$wp_setting_name],
                'sanitize_callback'	=> 'sanitize_text_field'
            )
        );
        $wp_customize->add_control(new Aiero_Customize_Control(
            $wp_customize,
            $wp_setting_name,
            array(
                'label'         => esc_html__('Header callback title', 'aiero'),
                'section'       => 'aiero_header_callback',
                'type'          => 'text',
                'settings'      => $wp_setting_name,
                'dependency'    => [
                    [
                        'control'   => 'header_callback_status',
                        'operator'  => '==',
                        'value'     => 'on'
                    ]
                ]
            )
        ));

        // ---------------------------- //
        // --- Header Callback Text --- //
        // ---------------------------- //
        $wp_setting_name = 'header_callback_text';
        $wp_customize->add_setting(
            $wp_setting_name,
            array(
                'default'           => $aiero_customizer_default_values[$wp_setting_name],
                'sanitize_callback'	=> 'sanitize_text_field'
            )
        );
        $wp_customize->add_control(new Aiero_Customize_Control(
            $wp_customize,
            $wp_setting_name,
            array(
                'label'         => esc_html__('Header callback text', 'aiero'),
                'section'       => 'aiero_header_callback',
                'type'          => 'text',
                'settings'      => $wp_setting_name,
                'dependency'    => [
                    [
                        'control'   => 'header_callback_status',
                        'operator'  => '==',
                        'value'     => 'on'
                    ]
                ]
            )
        ));


        // ---#####################--- //
        // ---### Sticky Header ###--- //
        // ---#####################--- //
        $wp_customize->add_section('aiero_header_sticky',
            array(
                'title' => esc_html__('Sticky Header', 'aiero'),
                'panel' => 'aiero_header_settings'
            )
        );


        // --------------------- //
        // --- Sticky Header --- //
        // --------------------- //
        $wp_setting_name = 'sticky_header_status';
        $wp_customize->add_setting(
            $wp_setting_name,
            array(
                'default'           => $aiero_customizer_default_values[$wp_setting_name],
                'sanitize_callback'	=> 'aiero_sanitize_choice'
            )
        );
        $wp_customize->add_control(new Aiero_Customize_Control(
            $wp_customize,
            $wp_setting_name,
            array(
                'label'     => esc_html__('Show Sticky Header', 'aiero'),
                'section'   => 'aiero_header_sticky',
                'type'      => 'select',
                'settings'  => $wp_setting_name,
                'choices'   => array(
                    'on'        => esc_html__('Yes', 'aiero'),
                    'off'       => esc_html__('No', 'aiero')
                )
            )
        ));

        // ------------------------ //
        // --- Sticky Header Blur --- //
        // ------------------------- //
        $wp_setting_name = 'sticky_header_blur';
        $wp_customize->add_setting(
            $wp_setting_name,
            array(
                'default'           => $aiero_customizer_default_values[$wp_setting_name],
                'sanitize_callback' => 'aiero_sanitize_choice'
            )
        );
        $wp_customize->add_control(new Aiero_Customize_Control(
            $wp_customize,
            $wp_setting_name,
            array(
                'label'     => esc_html__('Sticky Header Blur', 'aiero'),
                'section'   => 'aiero_header_sticky',
                'type'      => 'select',
                'settings'  => $wp_setting_name,
                'choices'   => array(
                    'on'    => esc_html__('On', 'aiero'),
                    'off'   => esc_html__('Off', 'aiero'),
                ),
                'dependency'    => [
                    [
                        'control'   => 'sticky_header_status',
                        'operator'  => '==',
                        'value'     => 'on'
                    ]
                ]
            )
        ));



        // ---#####################--- //
        // ---### Mobile Header ###--- //
        // ---#####################--- //
        $wp_customize->add_section('aiero_header_mobile',
            array(
                'title' => esc_html__('Mobile Header', 'aiero'),
                'panel' => 'aiero_header_settings'
            )
        );

        // -------------------------------- //
        // --- Mobile Header Breakpoint --- //
        // -------------------------------- //
        $wp_setting_name = 'mobile_header_breakpoint';
        $wp_customize->add_setting(
            $wp_setting_name,
            array(
                'default'           => $aiero_customizer_default_values[$wp_setting_name],
                'sanitize_callback'	=> 'absint'
            )
        );
        $wp_customize->add_control(new Aiero_Customize_Control(
            $wp_customize,
            $wp_setting_name,
            array(
                'label'         => esc_html__('Mobile Header Breakpoint, in px', 'aiero'),
                'section'       => 'aiero_header_mobile',
                'type'          => 'number',
                'settings'      => $wp_setting_name
            )
        ));        

        // -------------------------- //
        // --- Mobile Header Menu Style --- //
        // -------------------------- //
        $wp_setting_name = 'mobile_header_menu_style';
        $wp_customize->add_setting(
            $wp_setting_name,
            array(
                'default'           => $aiero_customizer_default_values[$wp_setting_name],
                'sanitize_callback' => 'aiero_sanitize_choice'
            )
        );
        $wp_customize->add_control(new Aiero_Customize_Control(
            $wp_customize,
            $wp_setting_name,
            array(
                'label'     => esc_html__('Mobile Header Menu Trigger Style', 'aiero'),
                'section'   => 'aiero_header_mobile',
                'type'      => 'select',
                'settings'  => $wp_setting_name,
                'choices'   => array(
                    'fullwidth'    => esc_html__('Fullwidth', 'aiero'),
                    'inline'       => esc_html__('Inline', 'aiero')
                )
            )
        ));


        // ---#####################--- //
        // ---### Logo Settings ###--- //
        // ---#####################--- //
        $wp_customize->add_section('aiero_header_logo',
            array(
                'title' => esc_html__('Logo', 'aiero'),
                'panel' => 'aiero_header_settings'
            )
        );

        // -------------------------- //
        // --- Header Logo Status --- //
        // -------------------------- //
        $wp_setting_name = 'header_logo_status';
        $wp_customize->add_setting(
            $wp_setting_name,
            array(
                'default'           => $aiero_customizer_default_values[$wp_setting_name],
                'sanitize_callback'	=> 'aiero_sanitize_choice'
            )
        );
        $wp_customize->add_control(new Aiero_Customize_Control(
            $wp_customize,
            $wp_setting_name,
            array(
                'label'     => esc_html__('Show Logo', 'aiero'),
                'section'   => 'aiero_header_logo',
                'type'      => 'select',
                'settings'  => $wp_setting_name,
                'choices'   => array(
                    'on'        => esc_html__('Yes', 'aiero'),
                    'off'       => esc_html__('No', 'aiero')
                )
            )
        ));

        // ----------------------------- //
        // --- Header Logo Customize --- //
        // ----------------------------- //
        $wp_setting_name = 'header_logo_customize';
        $wp_customize->add_setting(
            $wp_setting_name,
            array(
                'default'           => $aiero_customizer_default_values[$wp_setting_name],
                'sanitize_callback'	=> 'aiero_sanitize_choice'
            )
        );
        $wp_customize->add_control(new Aiero_Customize_Control(
            $wp_customize,
            $wp_setting_name,
            array(
                'label'     => esc_html__('Customize', 'aiero'),
                'section'   => 'aiero_header_logo',
                'type'      => 'select',
                'settings'  => $wp_setting_name,
                'choices'   => array(
                    'on'        => esc_html__('Yes', 'aiero'),
                    'off'       => esc_html__('No', 'aiero')
                )
            )
        ));

        // ------------------- //
        // --- Header Logo --- //
        // ------------------- //
        $wp_setting_name = 'header_logo_image';
        $wp_customize->add_setting(
            $wp_setting_name,
            array(
                'default'           => $aiero_customizer_default_values[$wp_setting_name],
                'sanitize_callback'	=> 'esc_url_raw'
            )
        );
        $wp_customize->add_control(new Aiero_Image_Custom_Control(
            $wp_customize,
            $wp_setting_name,
            array(
                'label'         => esc_html__('Logo Image', 'aiero'),
                'section'       => 'aiero_header_logo',
                'settings'      => $wp_setting_name,
                'dependency'    => [
                    [
                        'control'   => 'header_logo_customize',
                        'operator'  => '==',
                        'value'     => 'on'
                    ]
                ]
            )
        ));

        // ------------------- //
        // --- Logo Retina --- //
        // ------------------- //
        $wp_setting_name = 'header_logo_retina';
        $wp_customize->add_setting(
            $wp_setting_name,
            array(
                'default'           => $aiero_customizer_default_values[$wp_setting_name],
                'sanitize_callback'	=> 'aiero_sanitize_checkbox'
            )
        );
        $wp_customize->add_control(new Aiero_Customize_Control(
            $wp_customize,
            $wp_setting_name,
            array(
                'label'         => esc_html__('Logo Retina', 'aiero'),
                'section'       => 'aiero_header_logo',
                'type'          => 'checkbox',
                'settings'      => $wp_setting_name,
                'dependency'    => [
                    [
                        'control'   => 'header_logo_customize',
                        'operator'  => '==',
                        'value'     => 'on'
                    ]
                ]
            )
        ));

        // -------------------------- //
        // --- Mobile Header Logo --- //
        // -------------------------- //
        $wp_setting_name = 'header_logo_mobile_image';
        $wp_customize->add_setting(
            $wp_setting_name,
            array(
                'default'           => $aiero_customizer_default_values[$wp_setting_name],
                'sanitize_callback'	=> 'esc_url_raw'
            )
        );
        $wp_customize->add_control(new Aiero_Image_Custom_Control(
            $wp_customize,
            $wp_setting_name,
            array(
                'label'         => esc_html__('Mobile Logo Image', 'aiero'),
                'section'       => 'aiero_header_logo',
                'settings'      => $wp_setting_name,
                'dependency'    => [
                    [
                        'control'   => 'header_logo_customize',
                        'operator'  => '==',
                        'value'     => 'on'
                    ]
                ],
                'separator'     => 'before'
            )
        ));

        // -------------------------- //
        // --- Mobile Logo Retina --- //
        // -------------------------- //
        $wp_setting_name = 'header_logo_mobile_retina';
        $wp_customize->add_setting(
            $wp_setting_name,
            array(
                'default'           => $aiero_customizer_default_values[$wp_setting_name],
                'sanitize_callback'	=> 'aiero_sanitize_checkbox'
            )
        );
        $wp_customize->add_control(new Aiero_Customize_Control(
            $wp_customize,
            $wp_setting_name,
            array(
                'label'         => esc_html__('Mobile Logo Retina', 'aiero'),
                'section'       => 'aiero_header_logo',
                'type'          => 'checkbox',
                'settings'      => $wp_setting_name,
                'dependency'    => [
                    [
                        'control'   => 'header_logo_customize',
                        'operator'  => '==',
                        'value'     => 'on'
                    ]
                ]
            )
        ));


        // ---#####################--- //
        // ---### Header Button ###--- //
        // ---#####################--- //
        $wp_customize->add_section('aiero_header_button',
            array(
                'title' => esc_html__('Header Button', 'aiero'),
                'panel' => 'aiero_header_settings'
            )
        );

        // --------------------- //
        // --- Header Button --- //
        // --------------------- //
        $wp_setting_name = 'header_button_status';
        $wp_customize->add_setting(
            $wp_setting_name,
            array(
                'default'           => $aiero_customizer_default_values[$wp_setting_name],
                'sanitize_callback'	=> 'aiero_sanitize_choice'
            )
        );
        $wp_customize->add_control(new Aiero_Customize_Control(
            $wp_customize,
            $wp_setting_name,
            array(
                'label'     => esc_html__('Show header button', 'aiero'),
                'section'   => 'aiero_header_button',
                'type'      => 'select',
                'settings'  => $wp_setting_name,
                'choices'   => array(
                    'on'        => esc_html__('Yes', 'aiero'),
                    'off'       => esc_html__('No', 'aiero')
                )
            )
        ));

        // -------------------------- //
        // --- Header Button Text --- //
        // -------------------------- //
        $wp_setting_name = 'header_button_text';
        $wp_customize->add_setting(
            $wp_setting_name,
            array(
                'default'           => $aiero_customizer_default_values[$wp_setting_name],
                'sanitize_callback'	=> 'sanitize_text_field'
            )
        );
        $wp_customize->add_control(new Aiero_Customize_Control(
            $wp_customize,
            $wp_setting_name,
            array(
                'label'         => esc_html__('Header button text', 'aiero'),
                'section'       => 'aiero_header_button',
                'type'          => 'text',
                'settings'      => $wp_setting_name,
                'dependency'    => [
                    [
                        'control'   => 'header_button_status',
                        'operator'  => '==',
                        'value'     => 'on'
                    ]
                ]
            )
        ));

        // -------------------------- //
        // --- Header Button URL ---- //
        // -------------------------- //
        $wp_setting_name = 'header_button_url';
        $wp_customize->add_setting(
            $wp_setting_name,
            array(
                'default'           => $aiero_customizer_default_values[$wp_setting_name],
                'sanitize_callback'	=> 'esc_url_raw'
            )
        );
        $wp_customize->add_control(new Aiero_Customize_Control(
            $wp_customize,
            $wp_setting_name,
            array(
                'label'         => esc_html__('Header button link', 'aiero'),
                'section'       => 'aiero_header_button',
                'type'          => 'text',
                'settings'      => $wp_setting_name,
                'dependency'    => [
                    [
                        'control'   => 'header_button_status',
                        'operator'  => '==',
                        'value'     => 'on'
                    ]
                ]
            )
        ));


        // ---############################--- //
        // ---### Header Menu Settings ###--- //
        // ---############################--- //
        $wp_customize->add_section('aiero_header_menu',
            array(
                'title' => esc_html__('Header Menu', 'aiero'),
                'panel' => 'aiero_header_settings'
            )
        );

        // -------------------------- //
        // --- Header Menu Status --- //
        // -------------------------- //
        $wp_setting_name = 'header_menu_status';
        $wp_customize->add_setting(
            $wp_setting_name,
            array(
                'default'           => $aiero_customizer_default_values[$wp_setting_name],
                'sanitize_callback'	=> 'aiero_sanitize_choice'
            )
        );
        $wp_customize->add_control(new Aiero_Customize_Control(
            $wp_customize,
            $wp_setting_name,
            array(
                'label'     => esc_html__('Show header menu', 'aiero'),
                'section'   => 'aiero_header_menu',
                'type'      => 'select',
                'settings'  => $wp_setting_name,
                'choices'   => array(
                    'on'        => esc_html__('Yes', 'aiero'),
                    'off'       => esc_html__('No', 'aiero')
                )
            )
        ));

        // ------------------------- //
        // --- Header Menu Style --- //
        // ------------------------- //
        $wp_setting_name = 'header_menu_style';
        $wp_customize->add_setting(
            $wp_setting_name,
            array(
                'default'           => $aiero_customizer_default_values[$wp_setting_name],
                'sanitize_callback' => 'aiero_sanitize_choice'
            )
        );
        $wp_customize->add_control(new Aiero_Customize_Control(
            $wp_customize,
            $wp_setting_name,
            array(
                'label'         => esc_html__('Menu Style', 'aiero'),
                'section'       => 'aiero_header_menu',
                'type'          => 'select',
                'settings'      => $wp_setting_name,
                'choices'       => array(
                    'standard'      => esc_html__('Standard', 'aiero'),
                    'compact'       => esc_html__('Compact', 'aiero')
                )
            )
        ));

        // ------------------------------- //
        // --- Header Menu Image Status --- //
        // ------------------------------ //
        $wp_setting_name = 'header_menu_bg_image_status';
        $wp_customize->add_setting(
            $wp_setting_name,
            array(
                'default'           => $aiero_customizer_default_values[$wp_setting_name],
                'sanitize_callback' => 'aiero_sanitize_choice'
            )
        );
        $wp_customize->add_control(new Aiero_Customize_Control(
            $wp_customize,
            $wp_setting_name,
            array(
                'label'     => esc_html__('Show Header Menu Background Image', 'aiero'),
                'section'   => 'aiero_header_menu',
                'type'      => 'select',
                'settings'  => $wp_setting_name,
                'choices'   => array(
                    'on'        => esc_html__('Yes', 'aiero'),
                    'off'       => esc_html__('No', 'aiero')
                ),
                'dependency'    => [
                    [
                        'control'   => 'header_menu_style',
                        'operator'  => '==',
                        'value'     => 'compact'
                    ]
                ]
            )
        ));

        // ------------------------------------- //
        // --- Header Menu Background Image --- //
        // ------------------------------------ //
        $wp_setting_name = 'header_menu_bg_image';
        $wp_customize->add_setting(
            $wp_setting_name,
            array(
                'default'           => $aiero_customizer_default_values[$wp_setting_name],
                'sanitize_callback' => 'esc_url_raw'
            )
        );
        $wp_customize->add_control(new Aiero_Image_Custom_Control(
            $wp_customize,
            $wp_setting_name,
            array(
                'label'         => esc_html__('Header Menu Background Image', 'aiero'),
                'section'       => 'aiero_header_menu',
                'settings'      => $wp_setting_name,
                'dependency'    => [
                    [
                        'control'   => 'header_menu_bg_image_status',
                        'operator'  => '==',
                        'value'     => 'on'
                    ],
                    [
                        'control'   => 'header_menu_style',
                        'operator'  => '==',
                        'value'     => 'compact'
                    ]
                ]
            )
        ));

        // -------------------------- //
        // --- Header Menu Select --- //
        // -------------------------- //
        $wp_setting_name = 'header_menu_select';
        $wp_customize->add_setting(
            $wp_setting_name,
            array(
                'default'           => $aiero_customizer_default_values[$wp_setting_name],
                'sanitize_callback'	=> 'aiero_sanitize_choice'
            )
        );
        $wp_customize->add_control(new Aiero_Customize_Control(
            $wp_customize,
            $wp_setting_name,
            array(
                'label'         => esc_html__('Select Menu', 'aiero'),
                'section'       => 'aiero_header_menu',
                'type'          => 'select',
                'settings'      => $wp_setting_name,
                'choices'       => aiero_get_all_menu_list()
            )
        ));

        // ------------------------- //
        // --- Header Menu Label --- //
        // ------------------------- //
        $wp_setting_name = 'header_menu_label';
        $wp_customize->add_setting(
            $wp_setting_name,
            array(
                'default'           => $aiero_customizer_default_values[$wp_setting_name],
                'sanitize_callback' => 'sanitize_text_field'
            )
        );
        $wp_customize->add_control(new Aiero_Customize_Control(
            $wp_customize,
            $wp_setting_name,
            array(
                'label'         => esc_html__('Menu label', 'aiero'),
                'section'       => 'aiero_header_menu',
                'type'          => 'text',
                'settings'      => $wp_setting_name,
                'dependency'    => [
                    [
                        'control'   => 'header_menu_style',
                        'operator'  => '==',
                        'value'     => 'compact'
                    ]
                ]
            )
        ));

        // ----------------------------- //
        // --- Header Menu Customize --- //
        // ----------------------------- //
        $wp_setting_name = 'header_menu_customize';
        $wp_customize->add_setting(
            $wp_setting_name,
            array(
                'default'           => $aiero_customizer_default_values[$wp_setting_name],
                'sanitize_callback'	=> 'aiero_sanitize_choice'
            )
        );
        $wp_customize->add_control(new Aiero_Customize_Control(
            $wp_customize,
            $wp_setting_name,
            array(
                'label'     => esc_html__('Customize', 'aiero'),
                'section'   => 'aiero_header_menu',
                'type'      => 'select',
                'settings'  => $wp_setting_name,
                'choices'   => array(
                    'on'        => esc_html__('Yes', 'aiero'),
                    'off'       => esc_html__('No', 'aiero')
                )
            )
        ));

        // ------------------- //
        // --- Header Font --- //
        // ------------------- //
        $wp_setting_name = 'header_menu_font';
        $wp_customize->add_setting(
            $wp_setting_name,
            array(
                'default'           => $aiero_customizer_default_values[$wp_setting_name],
                'sanitize_callback'	=> 'sanitize_text_field'
            )
        );
        $wp_customize->add_control(new Aiero_Customize_Google_Font_Control(
            $wp_customize,
            $wp_setting_name,
            array(
                'label'         => esc_html__('Menu Font', 'aiero'),
                'section'       => 'aiero_header_menu',
                'settings'      => $wp_setting_name,
                'show_field'    => [
                    'font_family'       => true,
                    'font_backup'       => true,
                    'font_styles'       => true,
                    'font_subset'       => true,
                    'font_size'         => true,
                    'line_height'       => true,
                    'text_transform'    => true,
                    'letter_spacing'    => true,
                    'word_spacing'      => true,
                    'font_style'        => true,
                    'font_weight'       => true
                ],
                'dependency'            => [
                    [
                        'control'           => 'header_menu_customize',
                        'operator'          => '==',
                        'value'             => 'on'
                    ]
                ]
            )
        ));

        // --------------------- //
        // --- Sub Menu Font --- //
        // --------------------- //
        $wp_setting_name = 'header_sub_menu_font';
        $wp_customize->add_setting(
            $wp_setting_name,
            array(
                'default'           => $aiero_customizer_default_values[$wp_setting_name],
                'sanitize_callback'	=> 'sanitize_text_field'
            )
        );
        $wp_customize->add_control(new Aiero_Customize_Google_Font_Control(
            $wp_customize,
            $wp_setting_name,
            array(
                'label'         => esc_html__('Sub Menu Font', 'aiero'),
                'section'       => 'aiero_header_menu',
                'settings'      => $wp_setting_name,
                'show_field'    => [
                    'font_family'       => true,
                    'font_backup'       => true,
                    'font_styles'       => true,
                    'font_subset'       => true,
                    'font_size'         => true,
                    'line_height'       => true,
                    'text_transform'    => true,
                    'letter_spacing'    => true,
                    'word_spacing'      => true,
                    'font_style'        => true,
                    'font_weight'       => true
                ],
                'separator'     => 'before',
                'dependency'    => [
                    [
                        'control'           => 'header_menu_customize',
                        'operator'          => '==',
                        'value'             => 'on'
                    ]
                ]
            )
        ));


        // ---####################--- //
        // ---### Header Icons ###--- //
        // ---####################--- //
        $wp_customize->add_section('header_icons',
            array(
                'title' => esc_html__('Header Icons', 'aiero'),
                'panel' => 'aiero_header_settings'
            )
        );

        // ------------------------- //
        // --- Header Side Panel --- //
        // ------------------------- //
        $wp_setting_name = 'side_panel_status';
        $wp_customize->add_setting(
            $wp_setting_name,
            array(
                'default'           => $aiero_customizer_default_values[$wp_setting_name],
                'sanitize_callback'	=> 'aiero_sanitize_choice'
            )
        );
        $wp_customize->add_control(new Aiero_Customize_Control(
            $wp_customize,
            $wp_setting_name,
            array(
                'label'     => esc_html__('Show side panel trigger', 'aiero'),
                'section'   => 'header_icons',
                'type'      => 'select',
                'settings'  => $wp_setting_name,
                'choices'   => array(
                    'on'        => esc_html__('Yes', 'aiero'),
                    'off'       => esc_html__('No', 'aiero')
                )
            )
        ));

        // --------------------- //
        // --- Header Search --- //
        // --------------------- //
        $wp_setting_name = 'header_search_status';
        $wp_customize->add_setting(
            $wp_setting_name,
            array(
                'default'           => $aiero_customizer_default_values[$wp_setting_name],
                'sanitize_callback'	=> 'aiero_sanitize_choice'
            )
        );
        $wp_customize->add_control(new Aiero_Customize_Control(
            $wp_customize,
            $wp_setting_name,
            array(
                'label'     => esc_html__('Show header search', 'aiero'),
                'section'   => 'header_icons',
                'type'      => 'select',
                'settings'  => $wp_setting_name,
                'choices'   => array(
                    'on'        => esc_html__('Yes', 'aiero'),
                    'off'       => esc_html__('No', 'aiero')
                )
            )
        ));

        // --------------------- //
        // --- Header Login --- //
        // --------------------- //
        $wp_setting_name = 'header_login_status';
        $wp_customize->add_setting(
            $wp_setting_name,
            array(
                'default'           => $aiero_customizer_default_values[$wp_setting_name],
                'sanitize_callback' => 'aiero_sanitize_choice'
            )
        );
        $wp_customize->add_control(new Aiero_Customize_Control(
            $wp_customize,
            $wp_setting_name,
            array(
                'label'     => esc_html__('Show Header Login', 'aiero'),
                'section'   => 'header_icons',
                'type'      => 'select',
                'settings'  => $wp_setting_name,
                'choices'   => array(
                    'on'        => esc_html__('Yes', 'aiero'),
                    'off'       => esc_html__('No', 'aiero')
                )
            )
        ));

        if ( class_exists('WooCommerce') ) {
            // ------------------------ //
            // --- Header Mini Cart --- //
            // ------------------------ //
            $wp_setting_name = 'header_minicart_status';
            $wp_customize->add_setting(
                $wp_setting_name,
                array(
                    'default'           => $aiero_customizer_default_values[$wp_setting_name],
                    'sanitize_callback'	=> 'aiero_sanitize_choice'
                )
            );
            $wp_customize->add_control(new Aiero_Customize_Control(
                $wp_customize,
                $wp_setting_name,
                array(
                    'label'     => esc_html__('Show product cart', 'aiero'),
                    'section'   => 'header_icons',
                    'type'      => 'select',
                    'settings'  => $wp_setting_name,
                    'choices'   => array(
                        'on'        => esc_html__('Yes', 'aiero'),
                        'off'       => esc_html__('No', 'aiero')
                    )
                )
            ));
        }


        // ------------------------------- //
        // ---------- Page Tile ---------- //
        // ------------------------------- //
        $wp_customize->add_panel('aiero_page_title_settings',
            array(
                'title'     => esc_html__('Page Title Settings', 'aiero'),
                'priority'  => 140
            )
        );

        // ---########################--- //
        // ---### General Settings ###--- //
        // ---########################--- //
        $wp_customize->add_section('aiero_page_title_general',
            array(
                'title' => esc_html__('General', 'aiero'),
                'panel' => 'aiero_page_title_settings'
            )
        );

        // ------------------------- //
        // --- Page Title Status --- //
        // ------------------------- //
        $wp_setting_name = 'page_title_status';
        $wp_customize->add_setting(
            $wp_setting_name,
            array(
                'default'           => $aiero_customizer_default_values[$wp_setting_name],
                'sanitize_callback'	=> 'aiero_sanitize_choice'
            )
        );
        $wp_customize->add_control(new Aiero_Customize_Control(
            $wp_customize,
            $wp_setting_name,
            array(
                'label'     => esc_html__('Show page title', 'aiero'),
                'section'   => 'aiero_page_title_general',
                'type'      => 'select',
                'settings'  => $wp_setting_name,
                'choices'   => array(
                    'on'        => esc_html__('Yes', 'aiero'),
                    'off'       => esc_html__('No', 'aiero')
                )
            )
        ));

        // -------------------------- //
        // --- Page Title Overlay --- //
        // -------------------------- //
        $wp_setting_name = 'page_title_overlay_status';
        $wp_customize->add_setting(
            $wp_setting_name,
            array(
                'default'           => $aiero_customizer_default_values[$wp_setting_name],
                'sanitize_callback'	=> 'aiero_sanitize_choice'
            )
        );
        $wp_customize->add_control(new Aiero_Customize_Control(
            $wp_customize,
            $wp_setting_name,
            array(
                'label'     => esc_html__('Show overlay', 'aiero'),
                'section'   => 'aiero_page_title_general',
                'type'      => 'select',
                'settings'  => $wp_setting_name,
                'choices'   => array(
                    'on'        => esc_html__('Yes', 'aiero'),
                    'off'       => esc_html__('No', 'aiero')
                )
            )
        ));

        // -------------------------------- //
        // --- Page Title Overlay Color --- //
        // -------------------------------- //
        $wp_setting_name = 'page_title_overlay_color';
        $wp_customize->add_setting(
            $wp_setting_name,
            array(
                'default'           => $aiero_customizer_default_values[$wp_setting_name],
                'sanitize_callback'	=> 'aiero_sanitize_alpha_color'
            )
        );
        $wp_customize->add_control(new Aiero_Alpha_Color_Custom_Control(
            $wp_customize,
            $wp_setting_name,
            array(
                'label'         => esc_html__('Overlay color', 'aiero'),
                'section'       => 'aiero_page_title_general',
                'settings'      => $wp_setting_name,
                'dependency'    => [
                    [
                        'control'   => 'page_title_overlay_status',
                        'operator'  => '==',
                        'value'     => 'on'
                    ]
                ]
            )
        ));

        // -------------------------- //
        // --- Page Title Decoration --- //
        // -------------------------- //
        $wp_setting_name = 'page_title_decoration_status';
        $wp_customize->add_setting(
            $wp_setting_name,
            array(
                'default'           => $aiero_customizer_default_values[$wp_setting_name],
                'sanitize_callback' => 'aiero_sanitize_choice'
            )
        );
        $wp_customize->add_control(new Aiero_Customize_Control(
            $wp_customize,
            $wp_setting_name,
            array(
                'label'     => esc_html__('Show decoration', 'aiero'),
                'section'   => 'aiero_page_title_general',
                'type'      => 'select',
                'settings'  => $wp_setting_name,
                'choices'   => array(
                    'on'        => esc_html__('Yes', 'aiero'),
                    'off'       => esc_html__('No', 'aiero')
                )
            )
        ));        

        // ---------------------------- //
        // --- Page Title Customize --- //
        // ---------------------------- //
        $wp_setting_name = 'page_title_customize';
        $wp_customize->add_setting(
            $wp_setting_name,
            array(
                'default'           => $aiero_customizer_default_values[$wp_setting_name],
                'sanitize_callback'	=> 'aiero_sanitize_choice'
            )
        );
        $wp_customize->add_control(new Aiero_Customize_Control(
            $wp_customize,
            $wp_setting_name,
            array(
                'label'     => esc_html__('Customize', 'aiero'),
                'section'   => 'aiero_page_title_general',
                'type'      => 'select',
                'settings'  => $wp_setting_name,
                'choices'   => array(
                    'on'        => esc_html__('Yes', 'aiero'),
                    'off'       => esc_html__('No', 'aiero')
                ),
                'separator' => 'before'
            )
        ));

        // ------------------------------- //
        // --- Page Title Block Height --- //
        // ------------------------------- //
        $wp_setting_name = 'page_title_height';
        $wp_customize->add_setting(
            $wp_setting_name,
            array(
                'default'           => $aiero_customizer_default_values[$wp_setting_name],
                'sanitize_callback'	=> 'sanitize_text_field'
            )
        );
        $wp_customize->add_control(new Aiero_Customize_Control(
            $wp_customize,
            $wp_setting_name,
            array(
                'label'         => esc_html__('Page title height, in px', 'aiero'),
                'section'       => 'aiero_page_title_general',
                'type'          => 'number',
                'settings'      => $wp_setting_name,
                'dependency'    => [
                    [
                        'control'   => 'page_title_customize',
                        'operator'  => '==',
                        'value'     => 'on'
                    ]
                ]
            )
        ));

        // ------------------------------------- //
        // --- Page Title Default Text Color --- //
        // ------------------------------------- //
        $wp_setting_name = 'page_title_default_text_color';
        $wp_customize->add_setting(
            $wp_setting_name,
            array(
                'default'           => $aiero_customizer_default_values[$wp_setting_name],
                'sanitize_callback'	=> 'aiero_sanitize_color'
            )
        );
        $wp_customize->add_control(new Aiero_Color_Custom_Control(
            $wp_customize,
            $wp_setting_name,
            array(
                'label'         => esc_html__('Default text color', 'aiero'),
                'section'       => 'aiero_page_title_general',
                'settings'      => $wp_setting_name,
                'dependency'    => [
                    [
                        'control'   => 'page_title_customize',
                        'operator'  => '==',
                        'value'     => 'on'
                    ]
                ],
                'separator'     => 'before'
            )
        ));

        // ---------------------------------- //
        // --- Page Title Dark Text Color --- //
        // ---------------------------------- //
        $wp_setting_name = 'page_title_dark_text_color';
        $wp_customize->add_setting(
            $wp_setting_name,
            array(
                'default'           => $aiero_customizer_default_values[$wp_setting_name],
                'sanitize_callback'	=> 'aiero_sanitize_color'
            )
        );
        $wp_customize->add_control(new Aiero_Color_Custom_Control(
            $wp_customize,
            $wp_setting_name,
            array(
                'label'         => esc_html__('Dark text color', 'aiero'),
                'section'       => 'aiero_page_title_general',
                'settings'      => $wp_setting_name,
                'dependency'    => [
                    [
                        'control'   => 'page_title_customize',
                        'operator'  => '==',
                        'value'     => 'on'
                    ]
                ]
            )
        ));

        // ----------------------------------- //
        // --- Page Title Light Text Color --- //
        // ----------------------------------- //
        $wp_setting_name = 'page_title_light_text_color';
        $wp_customize->add_setting(
            $wp_setting_name,
            array(
                'default'           => $aiero_customizer_default_values[$wp_setting_name],
                'sanitize_callback'	=> 'aiero_sanitize_color'
            )
        );
        $wp_customize->add_control(new Aiero_Color_Custom_Control(
            $wp_customize,
            $wp_setting_name,
            array(
                'label'         => esc_html__('Light text color', 'aiero'),
                'section'       => 'aiero_page_title_general',
                'settings'      => $wp_setting_name,
                'dependency'    => [
                    [
                        'control'   => 'page_title_customize',
                        'operator'  => '==',
                        'value'     => 'on'
                    ]
                ]
            )
        ));

        // ------------------------------------ //
        // --- Page Title Accent Text Color --- //
        // ------------------------------------ //
        $wp_setting_name = 'page_title_accent_text_color';
        $wp_customize->add_setting(
            $wp_setting_name,
            array(
                'default'           => $aiero_customizer_default_values[$wp_setting_name],
                'sanitize_callback'	=> 'aiero_sanitize_color'
            )
        );
        $wp_customize->add_control(new Aiero_Color_Custom_Control(
            $wp_customize,
            $wp_setting_name,
            array(
                'label'         => esc_html__('Accent text color', 'aiero'),
                'section'       => 'aiero_page_title_general',
                'settings'      => $wp_setting_name,
                'dependency'    => [
                    [
                        'control'   => 'page_title_customize',
                        'operator'  => '==',
                        'value'     => 'on'
                    ]
                ]
            )
        ));

        // ------------------------------- //
        // --- Page Title Border Color --- //
        // ------------------------------- //
        $wp_setting_name = 'page_title_border_color';
        $wp_customize->add_setting(
            $wp_setting_name,
            array(
                'default'           => $aiero_customizer_default_values[$wp_setting_name],
                'sanitize_callback'	=> 'aiero_sanitize_color'
            )
        );
        $wp_customize->add_control(new Aiero_Color_Custom_Control(
            $wp_customize,
            $wp_setting_name,
            array(
                'label'         => esc_html__('Border color', 'aiero'),
                'section'       => 'aiero_page_title_general',
                'settings'      => $wp_setting_name,
                'dependency'    => [
                    [
                        'control'   => 'page_title_customize',
                        'operator'  => '==',
                        'value'     => 'on'
                    ]
                ],
                'separator'     => 'before'
            )
        ));

        // --------------------------------------- //
        // --- Page Title Hovered Border Color --- //
        // --------------------------------------- //
        $wp_setting_name = 'page_title_border_hover_color';
        $wp_customize->add_setting(
            $wp_setting_name,
            array(
                'default'           => $aiero_customizer_default_values[$wp_setting_name],
                'sanitize_callback'	=> 'aiero_sanitize_color'
            )
        );
        $wp_customize->add_control(new Aiero_Color_Custom_Control(
            $wp_customize,
            $wp_setting_name,
            array(
                'label'         => esc_html__('Hovered border color', 'aiero'),
                'section'       => 'aiero_page_title_general',
                'settings'      => $wp_setting_name,
                'dependency'    => [
                    [
                        'control'   => 'page_title_customize',
                        'operator'  => '==',
                        'value'     => 'on'
                    ]
                ]
            )
        ));

        // ----------------------------------- //
        // --- Page Title Background Color --- //
        // ----------------------------------- //
        $wp_setting_name = 'page_title_background_color';
        $wp_customize->add_setting(
            $wp_setting_name,
            array(
                'default'           => $aiero_customizer_default_values[$wp_setting_name],
                'sanitize_callback'	=> 'aiero_sanitize_color'
            )
        );
        $wp_customize->add_control(new Aiero_Color_Custom_Control(
            $wp_customize,
            $wp_setting_name,
            array(
                'label'         => esc_html__('Background color', 'aiero'),
                'section'       => 'aiero_page_title_general',
                'settings'      => $wp_setting_name,
                'dependency'    => [
                    [
                        'control'   => 'page_title_customize',
                        'operator'  => '==',
                        'value'     => 'on'
                    ]
                ],
                'separator'     => 'before'
            )
        ));

        // ----------------------------------------------- //
        // --- Page Title Alternative Background Color --- //
        // ----------------------------------------------- //
        $wp_setting_name = 'page_title_background_alter_color';
        $wp_customize->add_setting(
            $wp_setting_name,
            array(
                'default'           => $aiero_customizer_default_values[$wp_setting_name],
                'sanitize_callback'	=> 'aiero_sanitize_color'
            )
        );
        $wp_customize->add_control(new Aiero_Color_Custom_Control(
            $wp_customize,
            $wp_setting_name,
            array(
                'label'         => esc_html__('Alternative background color', 'aiero'),
                'section'       => 'aiero_page_title_general',
                'settings'      => $wp_setting_name,
                'dependency'    => [
                    [
                        'control'   => 'page_title_customize',
                        'operator'  => '==',
                        'value'     => 'on'
                    ]
                ]
            )
        ));

        // ------------------------------------ //
        // --- Page Title Button Text Color --- //
        // ------------------------------------ //
        $wp_setting_name = 'page_title_button_text_color';
        $wp_customize->add_setting(
            $wp_setting_name,
            array(
                'default'           => $aiero_customizer_default_values[$wp_setting_name],
                'sanitize_callback'	=> 'aiero_sanitize_color'
            )
        );
        $wp_customize->add_control(new Aiero_Color_Custom_Control(
            $wp_customize,
            $wp_setting_name,
            array(
                'label'         => esc_html__('Button Text Color', 'aiero'),
                'section'       => 'aiero_page_title_general',
                'settings'      => $wp_setting_name,
                'dependency'    => [
                    [
                        'control'   => 'page_title_customize',
                        'operator'  => '==',
                        'value'     => 'on'
                    ]
                ],
                'separator'     => 'before'
            )
        ));

        // -------------------------------------- //
        // --- Page Title Button Border Color --- //
        // -------------------------------------- //
        $wp_setting_name = 'page_title_button_border_color';
        $wp_customize->add_setting(
            $wp_setting_name,
            array(
                'default'           => $aiero_customizer_default_values[$wp_setting_name],
                'sanitize_callback'	=> 'aiero_sanitize_color'
            )
        );
        $wp_customize->add_control(new Aiero_Color_Custom_Control(
            $wp_customize,
            $wp_setting_name,
            array(
                'label'         => esc_html__('Button Border Color', 'aiero'),
                'section'       => 'aiero_page_title_general',
                'settings'      => $wp_setting_name,
                'dependency'    => [
                    [
                        'control'   => 'page_title_customize',
                        'operator'  => '==',
                        'value'     => 'on'
                    ]
                ]
            )
        ));

        // -------------------------------------- //
        // --- Page Title Button Border Color 2 --- //
        // -------------------------------------- //
        $wp_setting_name = 'page_title_button_border_color_add';
        $wp_customize->add_setting(
            $wp_setting_name,
            array(
                'default'           => $aiero_customizer_default_values[$wp_setting_name],
                'sanitize_callback' => 'aiero_sanitize_color'
            )
        );
        $wp_customize->add_control(new Aiero_Color_Custom_Control(
            $wp_customize,
            $wp_setting_name,
            array(
                'label'         => esc_html__('Button Border Color Additional', 'aiero'),
                'section'       => 'aiero_page_title_general',
                'settings'      => $wp_setting_name,
                'dependency'    => [
                    [
                        'control'   => 'page_title_customize',
                        'operator'  => '==',
                        'value'     => 'on'
                    ]
                ]
            )
        ));

        // ------------------------------------------ //
        // --- Page Title Button Background Color --- //
        // ------------------------------------------ //
        $wp_setting_name = 'page_title_button_background_color';
        $wp_customize->add_setting(
            $wp_setting_name,
            array(
                'default'           => $aiero_customizer_default_values[$wp_setting_name],
                'sanitize_callback'	=> 'aiero_sanitize_color'
            )
        );
        $wp_customize->add_control(new Aiero_Color_Custom_Control(
            $wp_customize,
            $wp_setting_name,
            array(
                'label'         => esc_html__('Button Background Color', 'aiero'),
                'section'       => 'aiero_page_title_general',
                'settings'      => $wp_setting_name,
                'dependency'    => [
                    [
                        'control'   => 'page_title_customize',
                        'operator'  => '==',
                        'value'     => 'on'
                    ]
                ]
            )
        ));

        // ------------------------------------ //
        // --- Page Title Button Text Hover --- //
        // ------------------------------------ //
        $wp_setting_name = 'page_title_button_text_hover';
        $wp_customize->add_setting(
            $wp_setting_name,
            array(
                'default'           => $aiero_customizer_default_values[$wp_setting_name],
                'sanitize_callback'	=> 'aiero_sanitize_color'
            )
        );
        $wp_customize->add_control(new Aiero_Color_Custom_Control(
            $wp_customize,
            $wp_setting_name,
            array(
                'label'         => esc_html__('Button Text Hover', 'aiero'),
                'section'       => 'aiero_page_title_general',
                'settings'      => $wp_setting_name,
                'dependency'    => [
                    [
                        'control'   => 'page_title_customize',
                        'operator'  => '==',
                        'value'     => 'on'
                    ]
                ]
            )
        ));

        // -------------------------------------- //
        // --- Page Title Button Border Hover --- //
        // -------------------------------------- //
        $wp_setting_name = 'page_title_button_border_hover';
        $wp_customize->add_setting(
            $wp_setting_name,
            array(
                'default'           => $aiero_customizer_default_values[$wp_setting_name],
                'sanitize_callback'	=> 'aiero_sanitize_color'
            )
        );
        $wp_customize->add_control(new Aiero_Color_Custom_Control(
            $wp_customize,
            $wp_setting_name,
            array(
                'label'         => esc_html__('Button Border Hover', 'aiero'),
                'section'       => 'aiero_page_title_general',
                'settings'      => $wp_setting_name,
                'dependency'    => [
                    [
                        'control'   => 'page_title_customize',
                        'operator'  => '==',
                        'value'     => 'on'
                    ]
                ]
            )
        ));

        // ------------------------------------------ //
        // --- Page Title Button Background Hover --- //
        // ------------------------------------------ //
        $wp_setting_name = 'page_title_button_background_hover';
        $wp_customize->add_setting(
            $wp_setting_name,
            array(
                'default'           => $aiero_customizer_default_values[$wp_setting_name],
                'sanitize_callback'	=> 'aiero_sanitize_color'
            )
        );
        $wp_customize->add_control(new Aiero_Color_Custom_Control(
            $wp_customize,
            $wp_setting_name,
            array(
                'label'         => esc_html__('Button Background Hover', 'aiero'),
                'section'       => 'aiero_page_title_general',
                'settings'      => $wp_setting_name,
                'dependency'    => [
                    [
                        'control'   => 'page_title_customize',
                        'operator'  => '==',
                        'value'     => 'on'
                    ]
                ]
            )
        ));

        // ----------------------------------- //
        // --- Page Title Background Image --- //
        // ----------------------------------- //
        $wp_setting_name = 'page_title_background_image';
        $wp_customize->add_setting(
            $wp_setting_name,
            array(
                'default'           => $aiero_customizer_default_values[$wp_setting_name],
                'sanitize_callback'	=> 'esc_url_raw'
            )
        );
        $wp_customize->add_control(new Aiero_Image_Custom_Control(
            $wp_customize,
            $wp_setting_name,
            array(
                'label'         => esc_html__('Background Image', 'aiero'),
                'section'       => 'aiero_page_title_general',
                'settings'      => $wp_setting_name,
                'dependency'    => [
                    [
                        'control'   => 'page_title_customize',
                        'operator'  => '==',
                        'value'     => 'on'
                    ]
                ],
                'separator'     => 'before'
            )
        ));

        // -------------------------------------- //
        // --- Page Title Background Position --- //
        // -------------------------------------- //
        $wp_setting_name = 'page_title_background_position';
        $wp_customize->add_setting(
            $wp_setting_name,
            array(
                'default'           => $aiero_customizer_default_values[$wp_setting_name],
                'sanitize_callback'	=> 'aiero_sanitize_choice'
            )
        );
        $wp_customize->add_control(new Aiero_Customize_Control(
            $wp_customize,
            $wp_setting_name,
            array(
                'label'         => esc_html__('Background Position', 'aiero'),
                'section'       => 'aiero_page_title_general',
                'type'          => 'select',
                'settings'      => $wp_setting_name,
                'choices'       => aiero_get_background_position_options(),
                'dependency'    => [
                    [
                        'control'   => 'page_title_customize',
                        'operator'  => '==',
                        'value'     => 'on'
                    ]
                ]
            )
        ));

        // ------------------------------------ //
        // --- Page Title Background Repeat --- //
        // ------------------------------------ //
        $wp_setting_name = 'page_title_background_repeat';
        $wp_customize->add_setting(
            $wp_setting_name,
            array(
                'default'           => $aiero_customizer_default_values[$wp_setting_name],
                'sanitize_callback'	=> 'aiero_sanitize_choice'
            )
        );
        $wp_customize->add_control(new Aiero_Customize_Control(
            $wp_customize,
            $wp_setting_name,
            array(
                'label'         => esc_html__('Background Repeat', 'aiero'),
                'section'       => 'aiero_page_title_general',
                'type'          => 'select',
                'settings'      => $wp_setting_name,
                'choices'       => aiero_get_background_repeat_options(),
                'dependency'    => [
                    [
                        'control'   => 'page_title_customize',
                        'operator'  => '==',
                        'value'     => 'on'
                    ]
                ]
            )
        ));

        // ---------------------------------- //
        // --- Page Title Background Size --- //
        // ---------------------------------- //
        $wp_setting_name = 'page_title_background_size';
        $wp_customize->add_setting(
            $wp_setting_name,
            array(
                'default'           => $aiero_customizer_default_values[$wp_setting_name],
                'sanitize_callback'	=> 'aiero_sanitize_choice'
            )
        );
        $wp_customize->add_control(new Aiero_Customize_Control(
            $wp_customize,
            $wp_setting_name,
            array(
                'label'         => esc_html__('Background Size', 'aiero'),
                'section'       => 'aiero_page_title_general',
                'type'          => 'select',
                'settings'      => $wp_setting_name,
                'choices'       => aiero_get_background_size_options(),
                'dependency'    => [
                    [
                        'control'   => 'page_title_customize',
                        'operator'  => '==',
                        'value'     => 'on'
                    ]
                ]
            )
        ));

        // ---------------------------------------------------- //
        // --- Hide Page Title Background on Mobile Devices --- //
        // ---------------------------------------------------- //
        $wp_setting_name = 'hide_page_title_background_mobile';
        $wp_customize->add_setting(
            $wp_setting_name,
            array(
                'default'           => $aiero_customizer_default_values[$wp_setting_name],
                'sanitize_callback'	=> 'aiero_sanitize_checkbox'
            )
        );
        $wp_customize->add_control(new Aiero_Customize_Control(
            $wp_customize,
            $wp_setting_name,
            array(
                'label'         => esc_html__('Hide Background Image on Mobile Devices', 'aiero'),
                'section'       => 'aiero_page_title_general',
                'type'          => 'checkbox',
                'settings'      => $wp_setting_name,
                'dependency'    => [
                    [
                        'control'   => 'page_title_customize',
                        'operator'  => '==',
                        'value'     => 'on'
                    ]
                ]
            )
        ));

        // ---------------------------------------------------- //
        // --- Hide Page Title Background on Tablet Devices --- //
        // ---------------------------------------------------- //
        $wp_setting_name = 'hide_page_title_background_tablet';
        $wp_customize->add_setting(
            $wp_setting_name,
            array(
                'default'           => $aiero_customizer_default_values[$wp_setting_name],
                'sanitize_callback'	=> 'aiero_sanitize_checkbox'
            )
        );
        $wp_customize->add_control(new Aiero_Customize_Control(
            $wp_customize,
            $wp_setting_name,
            array(
                'label'         => esc_html__('Hide Background Image on Tablet Devices', 'aiero'),
                'section'       => 'aiero_page_title_general',
                'type'          => 'checkbox',
                'settings'      => $wp_setting_name,
                'dependency'    => [
                    [
                        'control'   => 'page_title_customize',
                        'operator'  => '==',
                        'value'     => 'on'
                    ]
                ]
            )
        ));


        // ---########################--- //
        // ---### Heading Settings ###--- //
        // ---########################--- //
        $wp_customize->add_section('aiero_page_title_heading',
            array(
                'title' => esc_html__('Heading', 'aiero'),
                'panel' => 'aiero_page_title_settings'
            )
        );

        // ------------------------------------ //
        // --- Page Title Heading Customize --- //
        // ------------------------------------ //
        $wp_setting_name = 'page_title_heading_customize';
        $wp_customize->add_setting(
            $wp_setting_name,
            array(
                'default'           => $aiero_customizer_default_values[$wp_setting_name],
                'sanitize_callback'	=> 'aiero_sanitize_choice'
            )
        );
        $wp_customize->add_control(new Aiero_Customize_Control(
            $wp_customize,
            $wp_setting_name,
            array(
                'label'         => esc_html__('Customize', 'aiero'),
                'section'       => 'aiero_page_title_heading',
                'type'          => 'select',
                'settings'      => $wp_setting_name,
                'choices'       => array(
                    'on'        => esc_html__('Yes', 'aiero'),
                    'off'       => esc_html__('No', 'aiero')
                )
            )
        ));

         // ------------------------------- //
        // --- Page Title Heading Icon --- //
        // ------------------------------- //
        $wp_setting_name = 'page_title_heading_icon_status';
        $wp_customize->add_setting(
            $wp_setting_name,
            array(
                'default'           => $aiero_customizer_default_values[$wp_setting_name],
                'sanitize_callback' => 'aiero_sanitize_choice'
            )
        );
        $wp_customize->add_control(new Aiero_Customize_Control(
            $wp_customize,
            $wp_setting_name,
            array(
                'label'         => esc_html__('Add Image Icon before Title', 'aiero'),
                'section'       => 'aiero_page_title_heading',
                'type'          => 'select',
                'settings'      => $wp_setting_name,
                'choices'       => array(
                    'on'        => esc_html__('Yes', 'aiero'),
                    'off'       => esc_html__('No', 'aiero')
                ),
                'dependency'    => [
                    [
                        'control'   => 'page_title_heading_customize',
                        'operator'  => '==',
                        'value'     => 'on'
                    ]
                ]
            )
        ));

        // ------------------------------------- //
        // --- Page Title Heading Icon Image --- //
        // ------------------------------------- //
        $wp_setting_name = 'page_title_heading_icon_image';
        $wp_customize->add_setting(
            $wp_setting_name,
            array(
                'default'           => $aiero_customizer_default_values[$wp_setting_name],
                'sanitize_callback' => 'esc_url_raw'
            )
        );
        $wp_customize->add_control(new Aiero_Image_Custom_Control(
            $wp_customize,
            $wp_setting_name,
            array(
                'label'         => esc_html__('Icon Image', 'aiero'),
                'section'       => 'aiero_page_title_heading',
                'settings'      => $wp_setting_name,
                'dependency'    => [
                    [
                        'control'   => 'page_title_heading_customize',
                        'operator'  => '==',
                        'value'     => 'on'
                    ],
                    [
                        'control'   => 'page_title_heading_icon_status',
                        'operator'  => '==',
                        'value'     => 'on'
                    ]
                ],
                'separator'     => 'before'
            )
        ));

        // --------------------------------- //
        // --- Heading Icon Image Retina --- //
        // --------------------------------- //
        $wp_setting_name = 'page_title_heading_icon_retina';
        $wp_customize->add_setting(
            $wp_setting_name,
            array(
                'default'           => $aiero_customizer_default_values[$wp_setting_name],
                'sanitize_callback' => 'aiero_sanitize_checkbox'
            )
        );
        $wp_customize->add_control(new Aiero_Customize_Control(
            $wp_customize,
            $wp_setting_name,
            array(
                'label'         => esc_html__('Icon Image Retina', 'aiero'),
                'section'       => 'aiero_page_title_heading',
                'type'          => 'checkbox',
                'settings'      => $wp_setting_name,
                'dependency'    => [
                    [
                        'control'   => 'page_title_heading_customize',
                        'operator'  => '==',
                        'value'     => 'on'
                    ],
                    [
                        'control'   => 'page_title_heading_icon_status',
                        'operator'  => '==',
                        'value'     => 'on'
                    ]
                ]
            )
        ));

        // ------------------------------- //
        // --- Page Title Heading Font --- //
        // ------------------------------- //
        $wp_setting_name = 'page_title_heading_font';
        $wp_customize->add_setting(
            $wp_setting_name,
            array(
                'default'           => $aiero_customizer_default_values[$wp_setting_name],
                'sanitize_callback'	=> 'sanitize_text_field'
            )
        );
        $wp_customize->add_control(new Aiero_Customize_Google_Font_Control(
            $wp_customize,
            $wp_setting_name,
            array(
                'label'         => esc_html__('Heading Font', 'aiero'),
                'section'       => 'aiero_page_title_heading',
                'settings'      => $wp_setting_name,
                'show_field'    => [
                    'font_family'       => true,
                    'font_backup'       => true,
                    'font_styles'       => true,
                    'font_subset'       => true,
                    'font_size'         => true,
                    'line_height'       => true,
                    'text_transform'    => true,
                    'letter_spacing'    => true,
                    'word_spacing'      => true,
                    'font_style'        => true,
                    'font_weight'       => true
                ],
                'dependency'            => [
                    [
                        'control'           => 'page_title_heading_customize',
                        'operator'          => '==',
                        'value'             => 'on'
                    ]
                ]
            )
        ));


        // ---###########################--- //
        // ---### Subheading Settings ###--- //
        // ---###########################--- //
        $wp_customize->add_section('aiero_page_title_breadcrumbs',
            array(
                'title' => esc_html__('Breadcrumbs', 'aiero'),
                'panel' => 'aiero_page_title_settings'
            )
        );

        // ------------------------------------- //
        // --- Page Title Breadcrumbs Status --- //
        // ------------------------------------- //
        $wp_setting_name = 'page_title_breadcrumbs_status';
        $wp_customize->add_setting(
            $wp_setting_name,
            array(
                'default'           => $aiero_customizer_default_values[$wp_setting_name],
                'sanitize_callback'	=> 'aiero_sanitize_choice'
            )
        );
        $wp_customize->add_control(new Aiero_Customize_Control(
            $wp_customize,
            $wp_setting_name,
            array(
                'label'     => esc_html__('Show page title breadcrumbs', 'aiero'),
                'section'   => 'aiero_page_title_breadcrumbs',
                'type'      => 'select',
                'settings'  => $wp_setting_name,
                'choices'   => array(
                    'on'        => esc_html__('Yes', 'aiero'),
                    'off'       => esc_html__('No', 'aiero')
                )
            )
        ));

        // ---------------------------------------- //
        // --- Page Title Breadcrumbs Customize --- //
        // ---------------------------------------- //
        $wp_setting_name = 'page_title_breadcrumbs_customize';
        $wp_customize->add_setting(
            $wp_setting_name,
            array(
                'default'           => $aiero_customizer_default_values[$wp_setting_name],
                'sanitize_callback'	=> 'aiero_sanitize_choice'
            )
        );
        $wp_customize->add_control(new Aiero_Customize_Control(
            $wp_customize,
            $wp_setting_name,
            array(
                'label'     => esc_html__('Customize', 'aiero'),
                'section'   => 'aiero_page_title_breadcrumbs',
                'type'      => 'select',
                'settings'  => $wp_setting_name,
                'choices'   => array(
                    'on'        => esc_html__('Yes', 'aiero'),
                    'off'       => esc_html__('No', 'aiero')
                )
            )
        ));

        // ----------------------------------- //
        // --- Page Title Breadcrumbs Font --- //
        // ----------------------------------- //
        $wp_setting_name = 'page_title_breadcrumbs_font';
        $wp_customize->add_setting(
            $wp_setting_name,
            array(
                'default'           => $aiero_customizer_default_values[$wp_setting_name],
                'sanitize_callback'	=> 'sanitize_text_field'
            )
        );
        $wp_customize->add_control(new Aiero_Customize_Google_Font_Control(
            $wp_customize,
            $wp_setting_name,
            array(
                'label'         => esc_html__('Breadcrumbs Font', 'aiero'),
                'section'       => 'aiero_page_title_breadcrumbs',
                'settings'      => $wp_setting_name,
                'show_field'    => [
                    'font_family'       => true,
                    'font_backup'       => true,
                    'font_styles'       => true,
                    'font_subset'       => true,
                    'font_size'         => true,
                    'line_height'       => true,
                    'text_transform'    => true,
                    'letter_spacing'    => true,
                    'word_spacing'      => true,
                    'font_style'        => true,
                    'font_weight'       => true
                ],
                'dependency'            => [
                    [
                        'control'           => 'page_title_breadcrumbs_customize',
                        'operator'          => '==',
                        'value'             => 'on'
                    ]
                ]
            )
        ));


        // ---################################--- //
        // ---### Additional Text Settings ###--- //
        // ---################################--- //
        $wp_customize->add_section('aiero_page_title_additional',
            array(
                'title' => esc_html__('Heading Additional Text', 'aiero'),
                'panel' => 'aiero_page_title_settings'
            )
        );

        // ----------------------- //
        // --- Additional Text --- //
        // ----------------------- //
        $wp_setting_name = 'page_title_additional_text';
        $wp_customize->add_setting(
            $wp_setting_name,
            array(
                'default'           => $aiero_customizer_default_values[$wp_setting_name],
                'sanitize_callback'	=> 'sanitize_text_field'
            )
        );
        $wp_customize->add_control(new Aiero_Customize_Control(
            $wp_customize,
            $wp_setting_name,
            array(
                'label'         => esc_html__('Additional Text', 'aiero'),
                'section'       => 'aiero_page_title_additional',
                'type'          => 'text',
                'settings'      => $wp_setting_name
            )
        ));

        // --------------------------------- //
        // --- Additional Text Customize --- //
        // --------------------------------- //
        $wp_setting_name = 'page_title_additional_customize';
        $wp_customize->add_setting(
            $wp_setting_name,
            array(
                'default'           => $aiero_customizer_default_values[$wp_setting_name],
                'sanitize_callback'	=> 'aiero_sanitize_choice'
            )
        );
        $wp_customize->add_control(new Aiero_Customize_Control(
            $wp_customize,
            $wp_setting_name,
            array(
                'label'     => esc_html__('Customize', 'aiero'),
                'section'   => 'aiero_page_title_additional',
                'type'      => 'select',
                'settings'  => $wp_setting_name,
                'choices'   => array(
                    'on'        => esc_html__('Yes', 'aiero'),
                    'off'       => esc_html__('No', 'aiero')
                )
            )
        ));

        // ----------------------------- //
        // --- Additional Text Color --- //
        // ----------------------------- //
        $wp_setting_name = 'page_title_additional_text_color';
        $wp_customize->add_setting(
            $wp_setting_name,
            array(
                'default'           => $aiero_customizer_default_values[$wp_setting_name],
                'sanitize_callback'	=> 'aiero_sanitize_color'
            )
        );
        $wp_customize->add_control(new Aiero_Color_Custom_Control(
            $wp_customize,
            $wp_setting_name,
            array(
                'label'         => esc_html__('Additional text color', 'aiero'),
                'section'       => 'aiero_page_title_additional',
                'settings'      => $wp_setting_name,
                'dependency'    => [
                    [
                        'control'   => 'page_title_additional_customize',
                        'operator'  => '==',
                        'value'     => 'on'
                    ]
                ]
            )
        ));

        // ------------------------------------- //
        // --- Page Title Additional Text Font --- //
        // ------------------------------------- //
        $wp_setting_name = 'page_title_additional_text_font';
        $wp_customize->add_setting(
            $wp_setting_name,
            array(
                'default'           => $aiero_customizer_default_values[$wp_setting_name],
                'sanitize_callback' => 'sanitize_text_field'
            )
        );
        $wp_customize->add_control(new Aiero_Customize_Google_Font_Control(
            $wp_customize,
            $wp_setting_name,
            array(
                'label'         => esc_html__('Additional Text Font', 'aiero'),
                'section'       => 'aiero_page_title_additional',
                'settings'      => $wp_setting_name,
                'show_field'    => [
                    'font_family'       => true,
                    'font_backup'       => true,
                    'font_styles'       => true,
                    'font_subset'       => true,
                    'text_transform'    => true,
                    'letter_spacing'    => true,
                    'word_spacing'      => true,
                    'font_style'        => true,
                    'font_weight'       => true
                ],
                'dependency'            => [
                    [
                        'control'           => 'page_title_additional_customize',
                        'operator'          => '==',
                        'value'             => 'on'
                    ]
                ]
            )
        ));

        // ------------------------------------- //
        // --- Page Title Additional Text Position --- //
        // ------------------------------------- //
        $wp_setting_name = 'page_title_additional_text_bottom_position';
        $wp_customize->add_setting(
            $wp_setting_name,
            array(
                'default'           => $aiero_customizer_default_values[$wp_setting_name],
                'sanitize_callback' => 'sanitize_text_field'
            )
        );
        $wp_customize->add_control(new Aiero_Customize_Control(
            $wp_customize,
            $wp_setting_name,
            array(
                'label'         => esc_html__('Additional Text Offset Bottom, in %', 'aiero'),
                'section'       => 'aiero_page_title_additional',
                'type'          => 'number',
                'settings'      => $wp_setting_name,
                'dependency'    => [
                    [
                        'control'           => 'page_title_additional_customize',
                        'operator'          => '==',
                        'value'             => 'on'
                    ]
                ]
            )
        ));


        // -------------------------------- //
        // ---------- Typography ---------- //
        // -------------------------------- //
        $wp_customize->add_panel('aiero_typography_settings',
            array(
                'title'     => esc_html__('Typography Settings', 'aiero'),
                'priority'  => 140
            )
        );

        // ---#################--- //
        // ---### Main Font ###--- //
        // ---#################--- //
        $wp_customize->add_section('aiero_typography_main_font',
            array(
                'title' => esc_html__('Main Font', 'aiero'),
                'panel' => 'aiero_typography_settings'
            )
        );

        // ----------------- //
        // --- Main Font --- //
        // ----------------- //
        $wp_setting_name = 'main_font';
        $wp_customize->add_setting(
            $wp_setting_name,
            array(
                'default'           => $aiero_customizer_default_values[$wp_setting_name],
                'sanitize_callback'	=> 'sanitize_text_field'
            )
        );
        $wp_customize->add_control(new Aiero_Customize_Google_Font_Control(
            $wp_customize,
            $wp_setting_name,
            array(
                'label'         => esc_html__('Main Font', 'aiero'),
                'section'       => 'aiero_typography_main_font',
                'settings'      => $wp_setting_name,
                'show_field'    => [
                    'font_family'       => true,
                    'font_backup'       => true,
                    'font_styles'       => true,
                    'font_subset'       => true,
                    'font_size'         => true,
                    'line_height'       => true,
                    'text_transform'    => true,
                    'letter_spacing'    => true,
                    'word_spacing'      => true,
                    'font_style'        => true,
                    'font_weight'       => true
                ]
            )
        ));

        // ---#######################--- //
        // ---### Additional Font ###--- //
        // ---#######################--- //
        $wp_customize->add_section('aiero_typography_additional_font',
            array(
                'title' => esc_html__('Additional Font', 'aiero'),
                'panel' => 'aiero_typography_settings'
            )
        );

        // ----------------------- //
        // --- Additional Font --- //
        // ----------------------- //
        $wp_setting_name = 'additional_font';
        $wp_customize->add_setting(
            $wp_setting_name,
            array(
                'default'           => $aiero_customizer_default_values[$wp_setting_name],
                'sanitize_callback'	=> 'sanitize_text_field'
            )
        );
        $wp_customize->add_control(new Aiero_Customize_Google_Font_Control(
            $wp_customize,
            $wp_setting_name,
            array(
                'label'         => esc_html__('Additional Font', 'aiero'),
                'section'       => 'aiero_typography_additional_font',
                'settings'      => $wp_setting_name,
                'show_field'    => [
                    'font_family'       => true,
                    'font_backup'       => true,
                    'font_styles'       => true,
                    'font_subset'       => true,
                    'font_size'         => true,
                    'line_height'       => true,
                    'font_style'        => true,
                    'font_weight'       => true
                ]
            )
        ));

        // ---################--- //
        // ---### Headings ###--- //
        // ---################--- //
        $wp_customize->add_section('aiero_typography_headings',
            array(
                'title' => esc_html__('Headings', 'aiero'),
                'panel' => 'aiero_typography_settings'
            )
        );

        // --------------------- //
        // --- Headings Font --- //
        // --------------------- //
        $wp_setting_name = 'headings_font';
        $wp_customize->add_setting(
            $wp_setting_name,
            array(
                'default'           => $aiero_customizer_default_values[$wp_setting_name],
                'sanitize_callback'	=> 'sanitize_text_field'
            )
        );
        $wp_customize->add_control(new Aiero_Customize_Google_Font_Control(
            $wp_customize,
            $wp_setting_name,
            array(
                'label'         => esc_html__('Headings Font', 'aiero'),
                'section'       => 'aiero_typography_headings',
                'settings'      => $wp_setting_name,
                'show_field'    => [
                    'font_family'       => true,
                    'font_backup'       => true,
                    'font_styles'       => true,
                    'font_subset'       => true,
                    'text_transform'    => true,
                    'font_style'        => true
                ]
            )
        ));

        // --------------- //
        // --- H1 Font --- //
        // --------------- //
        $wp_setting_name = 'h1_font';
        $wp_customize->add_setting(
            $wp_setting_name,
            array(
                'default'           => $aiero_customizer_default_values[$wp_setting_name],
                'sanitize_callback'	=> 'sanitize_text_field'
            )
        );
        $wp_customize->add_control(new Aiero_Customize_Google_Font_Control(
            $wp_customize,
            $wp_setting_name,
            array(
                'label'         => esc_html__('H1 Font', 'aiero'),
                'section'       => 'aiero_typography_headings',
                'settings'      => $wp_setting_name,
                'show_field'    => [
                    'font_size'         => true,
                    'line_height'       => true,
                    'letter_spacing'    => true,
                    'word_spacing'      => true,
                    'font_weight'       => true
                ],
                'separator'             => 'before'
            )
        ));

        // --------------- //
        // --- H2 Font --- //
        // --------------- //
        $wp_setting_name = 'h2_font';
        $wp_customize->add_setting(
            $wp_setting_name,
            array(
                'default'           => $aiero_customizer_default_values[$wp_setting_name],
                'sanitize_callback'	=> 'sanitize_text_field'
            )
        );
        $wp_customize->add_control(new Aiero_Customize_Google_Font_Control(
            $wp_customize,
            $wp_setting_name,
            array(
                'label'         => esc_html__('H2 Font', 'aiero'),
                'section'       => 'aiero_typography_headings',
                'settings'      => $wp_setting_name,
                'show_field'    => [
                    'font_size'         => true,
                    'line_height'       => true,
                    'letter_spacing'    => true,
                    'word_spacing'      => true,
                    'font_weight'       => true
                ],
                'separator'             => 'before'
            )
        ));

        // --------------- //
        // --- H3 Font --- //
        // --------------- //
        $wp_setting_name = 'h3_font';
        $wp_customize->add_setting(
            $wp_setting_name,
            array(
                'default'           => $aiero_customizer_default_values[$wp_setting_name],
                'sanitize_callback'	=> 'sanitize_text_field'
            )
        );
        $wp_customize->add_control(new Aiero_Customize_Google_Font_Control(
            $wp_customize,
            $wp_setting_name,
            array(
                'label'         => esc_html__('H3 Font', 'aiero'),
                'section'       => 'aiero_typography_headings',
                'settings'      => $wp_setting_name,
                'show_field'    => [
                    'font_size'         => true,
                    'line_height'       => true,
                    'letter_spacing'    => true,
                    'word_spacing'      => true,
                    'font_weight'       => true
                ],
                'separator'             => 'before'
            )
        ));

        // --------------- //
        // --- H4 Font --- //
        // --------------- //
        $wp_setting_name = 'h4_font';
        $wp_customize->add_setting(
            $wp_setting_name,
            array(
                'default'           => $aiero_customizer_default_values[$wp_setting_name],
                'sanitize_callback'	=> 'sanitize_text_field'
            )
        );
        $wp_customize->add_control(new Aiero_Customize_Google_Font_Control(
            $wp_customize,
            $wp_setting_name,
            array(
                'label'         => esc_html__('H4 Font', 'aiero'),
                'section'       => 'aiero_typography_headings',
                'settings'      => $wp_setting_name,
                'show_field'    => [
                    'font_size'         => true,
                    'line_height'       => true,
                    'letter_spacing'    => true,
                    'word_spacing'      => true,
                    'font_weight'       => true
                ],
                'separator'             => 'before'
            )
        ));

        // --------------- //
        // --- H5 Font --- //
        // --------------- //
        $wp_setting_name = 'h5_font';
        $wp_customize->add_setting(
            $wp_setting_name,
            array(
                'default'           => $aiero_customizer_default_values[$wp_setting_name],
                'sanitize_callback'	=> 'sanitize_text_field'
            )
        );
        $wp_customize->add_control(new Aiero_Customize_Google_Font_Control(
            $wp_customize,
            $wp_setting_name,
            array(
                'label'         => esc_html__('H5 Font', 'aiero'),
                'section'       => 'aiero_typography_headings',
                'settings'      => $wp_setting_name,
                'show_field'    => [
                    'font_size'         => true,
                    'line_height'       => true,
                    'letter_spacing'    => true,
                    'word_spacing'      => true,
                    'font_weight'       => true
                ],
                'separator'             => 'before'
            )
        ));

        // --------------- //
        // --- H6 Font --- //
        // --------------- //
        $wp_setting_name = 'h6_font';
        $wp_customize->add_setting(
            $wp_setting_name,
            array(
                'default'           => $aiero_customizer_default_values[$wp_setting_name],
                'sanitize_callback'	=> 'sanitize_text_field'
            )
        );
        $wp_customize->add_control(new Aiero_Customize_Google_Font_Control(
            $wp_customize,
            $wp_setting_name,
            array(
                'label'         => esc_html__('H6 Font', 'aiero'),
                'section'       => 'aiero_typography_headings',
                'settings'      => $wp_setting_name,
                'show_field'    => [
                    'font_size'         => true,
                    'line_height'       => true,
                    'letter_spacing'    => true,
                    'word_spacing'      => true,
                    'font_weight'       => true
                ],
                'separator'             => 'before'
            )
        ));

        // ---###############--- //
        // ---### Buttons ###--- //
        // ---###############--- //
        $wp_customize->add_section('aiero_typography_buttons',
            array(
                'title' => esc_html__('Buttons', 'aiero'),
                'panel' => 'aiero_typography_settings'
            )
        );

        // --------------------------- //
        // --- Buttons Font Family --- //
        // --------------------------- //
        $wp_setting_name = 'buttons_font';
        $wp_customize->add_setting(
            $wp_setting_name,
            array(
                'default'           => $aiero_customizer_default_values[$wp_setting_name],
                'sanitize_callback'	=> 'sanitize_text_field'
            )
        );
        $wp_customize->add_control(new Aiero_Customize_Google_Font_Control(
            $wp_customize,
            $wp_setting_name,
            array(
                'label'         => esc_html__('Buttons Font', 'aiero'),
                'section'       => 'aiero_typography_buttons',
                'settings'      => $wp_setting_name,
                'show_field'    => [
                    'font_family'       => true,
                    'font_backup'       => true,
                    'font_styles'       => true,
                    'font_subset'       => true,
                    'font_size'         => true,
                    'text_transform'    => true,
                    'letter_spacing'    => true,
                    'word_spacing'      => true,
                    'font_style'        => true,
                    'font_weight'       => true
                ]
            )
        ));


        // ---------------------------------- //
        // ---------- Social Links ---------- //
        // ---------------------------------- //
        $wp_customize->add_section('aiero_socials_settings',
            array(
                'title'     => esc_html__('Social Links', 'aiero'),
                'priority'  => 145
            )
        );

        // ---------------------- //
        // --- Socials Target --- //
        // ---------------------- //
        $wp_setting_name = 'socials_target';
        $wp_customize->add_setting(
            $wp_setting_name,
            array(
                'default'           => $aiero_customizer_default_values[$wp_setting_name],
                'sanitize_callback'	=> 'aiero_sanitize_checkbox'
            )
        );
        $wp_customize->add_control(new Aiero_Customize_Control(
            $wp_customize,
            $wp_setting_name,
            array(
                'label'         => esc_html__('Open Socials in New Tab', 'aiero'),
                'section'       => 'aiero_socials_settings',
                'type'          => 'checkbox',
                'settings'      => $wp_setting_name
            )
        ));

        // ---------------------- //
        // --- Social Buttons --- //
        // ---------------------- //
        $wp_setting_name = 'social_buttons';
        $wp_customize->add_setting(
            $wp_setting_name,
            array(
                'sanitize_callback' => 'aiero_sanitize_repeater'
            )
        );
        $wp_customize->add_control( new Aiero_Customize_Socials_Control(
            $wp_customize,
            $wp_setting_name,
            array(
                'label'                 => esc_html__('Social Buttons', 'aiero'),
                'section'               => 'aiero_socials_settings',
                'separator'             => 'before'
            )
        ));


        // ------------------------------------ //
        // ---------- Color Settings ---------- //
        // ------------------------------------ //
        $wp_customize->add_panel('aiero_color_settings',
            array(
                'title'     => esc_html__('Color Settings', 'aiero'),
                'priority'  => 150
            )
        );

        // ---################--- //
        // ---### STANDARD ###--- //
        // ---################--- //
        $wp_customize->add_section('aiero_standard_colors',
            array(
                'title' => esc_html__('Standard Colors', 'aiero'),
                'panel' => 'aiero_color_settings'
            )
        );

        // ----------------------------------- //
        // --- Standard Default Text Color --- //
        // ----------------------------------- //
        $wp_setting_name = 'standard_default_text_color';
        $wp_customize->add_setting(
            $wp_setting_name,
            array(
                'default'           => $aiero_customizer_default_values[$wp_setting_name],
                'sanitize_callback'	=> 'aiero_sanitize_alpha_color'
            )
        );
        $wp_customize->add_control(new Aiero_Alpha_Color_Custom_Control(
            $wp_customize,
            $wp_setting_name,
            array(
                'label'         => esc_html__('Default Text Color', 'aiero'),
                'section'       => 'aiero_standard_colors',
                'settings'      => $wp_setting_name,
                'show_opacity'  => true,
                'palette'       => aiero_get_custom_color_palette()
            )
        ));

        // -------------------------------- //
        // --- Standard Dark Text Color --- //
        // -------------------------------- //
        $wp_setting_name = 'standard_dark_text_color';
        $wp_customize->add_setting(
            $wp_setting_name,
            array(
                'default'           => $aiero_customizer_default_values[$wp_setting_name],
                'sanitize_callback'	=> 'aiero_sanitize_alpha_color'
            )
        );
        $wp_customize->add_control(new Aiero_Alpha_Color_Custom_Control(
            $wp_customize,
            $wp_setting_name,
            array(
                'label'         => esc_html__('Dark Text Color', 'aiero'),
                'section'       => 'aiero_standard_colors',
                'settings'      => $wp_setting_name,
                'show_opacity'  => true,
                'palette'       => aiero_get_custom_color_palette()
            )
        ));

        // --------------------------------- //
        // --- Standard Light Text Color --- //
        // --------------------------------- //
        $wp_setting_name = 'standard_light_text_color';
        $wp_customize->add_setting(
            $wp_setting_name,
            array(
                'default'           => $aiero_customizer_default_values[$wp_setting_name],
                'sanitize_callback'	=> 'aiero_sanitize_alpha_color'
            )
        );
        $wp_customize->add_control(new Aiero_Alpha_Color_Custom_Control(
            $wp_customize,
            $wp_setting_name,
            array(
                'label'         => esc_html__('Light Text Color', 'aiero'),
                'section'       => 'aiero_standard_colors',
                'settings'      => $wp_setting_name,
                'show_opacity'  => true,
                'palette'       => aiero_get_custom_color_palette()
            )
        ));

        // ---------------------------------- //
        // --- Standard Accent Text Color --- //
        // ---------------------------------- //
        $wp_setting_name = 'standard_accent_text_color';
        $wp_customize->add_setting(
            $wp_setting_name,
            array(
                'default'           => $aiero_customizer_default_values[$wp_setting_name],
                'sanitize_callback'	=> 'aiero_sanitize_alpha_color'
            )
        );
        $wp_customize->add_control(new Aiero_Alpha_Color_Custom_Control(
            $wp_customize,
            $wp_setting_name,
            array(
                'label'         => esc_html__('Accent Text Color', 'aiero'),
                'section'       => 'aiero_standard_colors',
                'settings'      => $wp_setting_name,
                'show_opacity'  => true,
                'palette'       => aiero_get_custom_color_palette()
            )
        ));

        // ---------------------------------- //
        // --- Standard Contrast Text Color --- //
        // ---------------------------------- //
        $wp_setting_name = 'standard_contrast_text_color';
        $wp_customize->add_setting(
            $wp_setting_name,
            array(
                'default'           => $aiero_customizer_default_values[$wp_setting_name],
                'sanitize_callback' => 'aiero_sanitize_alpha_color'
            )
        );
        $wp_customize->add_control(new Aiero_Alpha_Color_Custom_Control(
            $wp_customize,
            $wp_setting_name,
            array(
                'label'         => esc_html__('Contrast Text Color', 'aiero'),
                'section'       => 'aiero_standard_colors',
                'settings'      => $wp_setting_name,
                'show_opacity'  => true,
                'palette'       => aiero_get_custom_color_palette()
            )
        ));

        // ---------------------------------- //
        // --- Standard Input Dark Color --- //
        // ---------------------------------- //
        $wp_setting_name = 'standard_input_dark_color';
        $wp_customize->add_setting(
            $wp_setting_name,
            array(
                'default'           => $aiero_customizer_default_values[$wp_setting_name],
                'sanitize_callback' => 'aiero_sanitize_alpha_color'
            )
        );
        $wp_customize->add_control(new Aiero_Alpha_Color_Custom_Control(
            $wp_customize,
            $wp_setting_name,
            array(
                'label'         => esc_html__('Input Dark Color', 'aiero'),
                'section'       => 'aiero_standard_colors',
                'settings'      => $wp_setting_name,
                'show_opacity'  => true,
                'palette'       => aiero_get_custom_color_palette()
            )
        ));
        

        // ----------------------------- //
        // --- Standard Border Color --- //
        // ----------------------------- //
        $wp_setting_name = 'standard_border_color';
        $wp_customize->add_setting(
            $wp_setting_name,
            array(
                'default'           => $aiero_customizer_default_values[$wp_setting_name],
                'sanitize_callback'	=> 'aiero_sanitize_alpha_color'
            )
        );
        $wp_customize->add_control(new Aiero_Alpha_Color_Custom_Control(
            $wp_customize,
            $wp_setting_name,
            array(
                'label'         => esc_html__('Border Color', 'aiero'),
                'section'       => 'aiero_standard_colors',
                'settings'      => $wp_setting_name,
                'show_opacity'  => true,
                'palette'       => aiero_get_custom_color_palette(),
                'separator'     => 'before'
            )
        ));

        // ----------------------------------- //
        // --- Standard Border Hover Color --- //
        // ----------------------------------- //
        $wp_setting_name = 'standard_border_hover_color';
        $wp_customize->add_setting(
            $wp_setting_name,
            array(
                'default'           => $aiero_customizer_default_values[$wp_setting_name],
                'sanitize_callback'	=> 'aiero_sanitize_alpha_color'
            )
        );
        $wp_customize->add_control(new Aiero_Alpha_Color_Custom_Control(
            $wp_customize,
            $wp_setting_name,
            array(
                'label'         => esc_html__('Border Hover Color', 'aiero'),
                'section'       => 'aiero_standard_colors',
                'settings'      => $wp_setting_name,
                'show_opacity'  => true,
                'palette'       => aiero_get_custom_color_palette()
            )
        ));

        // --------------------------------- //
        // --- Standard Background Color --- //
        // --------------------------------- //
        $wp_setting_name = 'standard_background_color';
        $wp_customize->add_setting(
            $wp_setting_name,
            array(
                'default'           => $aiero_customizer_default_values[$wp_setting_name],
                'sanitize_callback'	=> 'aiero_sanitize_alpha_color'
            )
        );
        $wp_customize->add_control(new Aiero_Alpha_Color_Custom_Control(
            $wp_customize,
            $wp_setting_name,
            array(
                'label'         => esc_html__('Background Color', 'aiero'),
                'section'       => 'aiero_standard_colors',
                'settings'      => $wp_setting_name,
                'show_opacity'  => true,
                'palette'       => aiero_get_custom_color_palette(),
                'separator'     => 'before'
            )
        ));

        // --------------------------------------- //
        // --- Standard Background Alter Color --- //
        // --------------------------------------- //
        $wp_setting_name = 'standard_background_alter_color';
        $wp_customize->add_setting(
            $wp_setting_name,
            array(
                'default'           => $aiero_customizer_default_values[$wp_setting_name],
                'sanitize_callback'	=> 'aiero_sanitize_alpha_color'
            )
        );
        $wp_customize->add_control(new Aiero_Alpha_Color_Custom_Control(
            $wp_customize,
            $wp_setting_name,
            array(
                'label'         => esc_html__('Alternative Background Color', 'aiero'),
                'section'       => 'aiero_standard_colors',
                'settings'      => $wp_setting_name,
                'show_opacity'  => true,
                'palette'       => aiero_get_custom_color_palette()
            )
        ));

        // ---------------------------------- //
        // --- Standard Button Text Color --- //
        // ---------------------------------- //
        $wp_setting_name = 'standard_button_text_color';
        $wp_customize->add_setting(
            $wp_setting_name,
            array(
                'default'           => $aiero_customizer_default_values[$wp_setting_name],
                'sanitize_callback'	=> 'aiero_sanitize_alpha_color'
            )
        );
        $wp_customize->add_control(new Aiero_Alpha_Color_Custom_Control(
            $wp_customize,
            $wp_setting_name,
            array(
                'label'         => esc_html__('Button Text Color', 'aiero'),
                'section'       => 'aiero_standard_colors',
                'settings'      => $wp_setting_name,
                'show_opacity'  => true,
                'palette'       => aiero_get_custom_color_palette(),
                'separator'     => 'before'
            )
        ));

        // ------------------------------------ //
        // --- Standard Button Border Color --- //
        // ------------------------------------ //
        $wp_setting_name = 'standard_button_border_color';
        $wp_customize->add_setting(
            $wp_setting_name,
            array(
                'default'           => $aiero_customizer_default_values[$wp_setting_name],
                'sanitize_callback'	=> 'aiero_sanitize_alpha_color'
            )
        );
        $wp_customize->add_control(new Aiero_Alpha_Color_Custom_Control(
            $wp_customize,
            $wp_setting_name,
            array(
                'label'         => esc_html__('Button Border Color', 'aiero'),
                'section'       => 'aiero_standard_colors',
                'settings'      => $wp_setting_name,
                'show_opacity'  => true,
                'palette'       => aiero_get_custom_color_palette()
            )
        ));

        // ------------------------------------ //
        // --- Standard Button Border Color 2 --- //
        // ------------------------------------ //
        $wp_setting_name = 'standard_button_border_color_add';
        $wp_customize->add_setting(
            $wp_setting_name,
            array(
                'default'           => $aiero_customizer_default_values[$wp_setting_name],
                'sanitize_callback' => 'aiero_sanitize_alpha_color'
            )
        );
        $wp_customize->add_control(new Aiero_Alpha_Color_Custom_Control(
            $wp_customize,
            $wp_setting_name,
            array(
                'label'         => esc_html__('Button Border Color Additional', 'aiero'),
                'section'       => 'aiero_standard_colors',
                'settings'      => $wp_setting_name,
                'show_opacity'  => true,
                'palette'       => aiero_get_custom_color_palette()
            )
        ));

        // ---------------------------------------- //
        // --- Standard Button Background Color --- //
        // ---------------------------------------- //
        $wp_setting_name = 'standard_button_background_color';
        $wp_customize->add_setting(
            $wp_setting_name,
            array(
                'default'           => $aiero_customizer_default_values[$wp_setting_name],
                'sanitize_callback'	=> 'aiero_sanitize_alpha_color'
            )
        );
        $wp_customize->add_control(new Aiero_Alpha_Color_Custom_Control(
            $wp_customize,
            $wp_setting_name,
            array(
                'label'         => esc_html__('Button Background Color', 'aiero'),
                'section'       => 'aiero_standard_colors',
                'settings'      => $wp_setting_name,
                'show_opacity'  => true,
                'palette'       => aiero_get_custom_color_palette()
            )
        ));

        // ---------------------------------------- //
        // --- Standard Button Background Color 2 --- //
        // ---------------------------------------- //
        $wp_setting_name = 'standard_button_background_color_add';
        $wp_customize->add_setting(
            $wp_setting_name,
            array(
                'default'           => $aiero_customizer_default_values[$wp_setting_name],
                'sanitize_callback' => 'aiero_sanitize_alpha_color'
            )
        );
        $wp_customize->add_control(new Aiero_Alpha_Color_Custom_Control(
            $wp_customize,
            $wp_setting_name,
            array(
                'label'         => esc_html__('Button Background Color Additional', 'aiero'),
                'section'       => 'aiero_standard_colors',
                'settings'      => $wp_setting_name,
                'show_opacity'  => true,
                'palette'       => aiero_get_custom_color_palette()
            )
        ));

        // ---------------------------------- //
        // --- Standard Button Text Hover --- //
        // ---------------------------------- //
        $wp_setting_name = 'standard_button_text_hover';
        $wp_customize->add_setting(
            $wp_setting_name,
            array(
                'default'           => $aiero_customizer_default_values[$wp_setting_name],
                'sanitize_callback'	=> 'aiero_sanitize_alpha_color'
            )
        );
        $wp_customize->add_control(new Aiero_Alpha_Color_Custom_Control(
            $wp_customize,
            $wp_setting_name,
            array(
                'label'         => esc_html__('Button Text Hover', 'aiero'),
                'section'       => 'aiero_standard_colors',
                'settings'      => $wp_setting_name,
                'show_opacity'  => true,
                'palette'       => aiero_get_custom_color_palette()
            )
        ));

        // ------------------------------------ //
        // --- Standard Button Border Hover --- //
        // ------------------------------------ //
        $wp_setting_name = 'standard_button_border_hover';
        $wp_customize->add_setting(
            $wp_setting_name,
            array(
                'default'           => $aiero_customizer_default_values[$wp_setting_name],
                'sanitize_callback'	=> 'aiero_sanitize_alpha_color'
            )
        );
        $wp_customize->add_control(new Aiero_Alpha_Color_Custom_Control(
            $wp_customize,
            $wp_setting_name,
            array(
                'label'         => esc_html__('Button Border Hover', 'aiero'),
                'section'       => 'aiero_standard_colors',
                'settings'      => $wp_setting_name,
                'show_opacity'  => true,
                'palette'       => aiero_get_custom_color_palette()
            )
        ));

        // ------------------------------------ //
        // --- Standard Button Border Hover 2 --- //
        // ------------------------------------ //
        $wp_setting_name = 'standard_button_border_hover_add';
        $wp_customize->add_setting(
            $wp_setting_name,
            array(
                'default'           => $aiero_customizer_default_values[$wp_setting_name],
                'sanitize_callback' => 'aiero_sanitize_alpha_color'
            )
        );
        $wp_customize->add_control(new Aiero_Alpha_Color_Custom_Control(
            $wp_customize,
            $wp_setting_name,
            array(
                'label'         => esc_html__('Button Border Hover Additional', 'aiero'),
                'section'       => 'aiero_standard_colors',
                'settings'      => $wp_setting_name,
                'show_opacity'  => true,
                'palette'       => aiero_get_custom_color_palette()
            )
        ));

        // ---------------------------------------- //
        // --- Standard Button Background Hover --- //
        // ---------------------------------------- //
        $wp_setting_name = 'standard_button_background_hover';
        $wp_customize->add_setting(
            $wp_setting_name,
            array(
                'default'           => $aiero_customizer_default_values[$wp_setting_name],
                'sanitize_callback'	=> 'aiero_sanitize_alpha_color'
            )
        );
        $wp_customize->add_control(new Aiero_Alpha_Color_Custom_Control(
            $wp_customize,
            $wp_setting_name,
            array(
                'label'         => esc_html__('Button Background Hover', 'aiero'),
                'section'       => 'aiero_standard_colors',
                'settings'      => $wp_setting_name,
                'show_opacity'  => true,
                'palette'       => aiero_get_custom_color_palette()
            )
        ));

        // ---------------------------------------- //
        // --- Standard Button Background Hover 2 --- //
        // ---------------------------------------- //
        $wp_setting_name = 'standard_button_background_hover_add';
        $wp_customize->add_setting(
            $wp_setting_name,
            array(
                'default'           => $aiero_customizer_default_values[$wp_setting_name],
                'sanitize_callback' => 'aiero_sanitize_alpha_color'
            )
        );
        $wp_customize->add_control(new Aiero_Alpha_Color_Custom_Control(
            $wp_customize,
            $wp_setting_name,
            array(
                'label'         => esc_html__('Button Background Hover Additional', 'aiero'),
                'section'       => 'aiero_standard_colors',
                'settings'      => $wp_setting_name,
                'show_opacity'  => true,
                'palette'       => aiero_get_custom_color_palette()
            )
        ));


        // ---------------------------------------- //
        // --- Standard Button Border Style --- //
        // ---------------------------------------- //
        $wp_setting_name = 'standard_button_border_style';
        $wp_customize->add_setting(
            $wp_setting_name,
            array(
                'default'           => $aiero_customizer_default_values[$wp_setting_name],
                'sanitize_callback' => 'aiero_sanitize_choice'
            )
        );
        $wp_customize->add_control(new Aiero_Customize_Control(
            $wp_customize,
            $wp_setting_name,
            array(
                'label'     => esc_html__('Button Border Style', 'aiero'),
                'section'   => 'aiero_standard_colors',
                'type'      => 'select',
                'settings'  => $wp_setting_name,
                'choices'   => array(
                    'gradient'    => esc_html__('Gradient', 'aiero'),
                    'solid'       => esc_html__('Solid', 'aiero')
                )
            )
        ));

        // ---------------------------------------- //
        // --- Standard Button Background Style --- //
        // ---------------------------------------- //
        $wp_setting_name = 'standard_button_background_style';
        $wp_customize->add_setting(
            $wp_setting_name,
            array(
                'default'           => $aiero_customizer_default_values[$wp_setting_name],
                'sanitize_callback' => 'aiero_sanitize_choice'
            )
        );
        $wp_customize->add_control(new Aiero_Customize_Control(
            $wp_customize,
            $wp_setting_name,
            array(
                'label'     => esc_html__('Button Background Style', 'aiero'),
                'section'   => 'aiero_standard_colors',
                'type'      => 'select',
                'settings'  => $wp_setting_name,
                'choices'   => array(
                    'gradient'    => esc_html__('Gradient', 'aiero'),
                    'solid'       => esc_html__('Solid', 'aiero')
                )
            )
        ));

        // ---################--- //
        // ---### CONTRAST ###--- //
        // ---################--- //
        $wp_customize->add_section('aiero_contrast_colors',
            array(
                'title' => esc_html__('Contrast Colors', 'aiero'),
                'panel' => 'aiero_color_settings'
            )
        );

        // ----------------------------------- //
        // --- Contrast Default Text Color --- //
        // ----------------------------------- //
        $wp_setting_name = 'contrast_default_text_color';
        $wp_customize->add_setting(
            $wp_setting_name,
            array(
                'default'           => $aiero_customizer_default_values[$wp_setting_name],
                'sanitize_callback'	=> 'aiero_sanitize_alpha_color'
            )
        );
        $wp_customize->add_control(new Aiero_Alpha_Color_Custom_Control(
            $wp_customize,
            $wp_setting_name,
            array(
                'label'         => esc_html__('Default Text Color', 'aiero'),
                'section'       => 'aiero_contrast_colors',
                'settings'      => $wp_setting_name,
                'show_opacity'  => true,
                'palette'       => aiero_get_custom_color_palette()
            )
        ));

        // -------------------------------- //
        // --- Contrast Dark Text Color --- //
        // -------------------------------- //
        $wp_setting_name = 'contrast_dark_text_color';
        $wp_customize->add_setting(
            $wp_setting_name,
            array(
                'default'           => $aiero_customizer_default_values[$wp_setting_name],
                'sanitize_callback'	=> 'aiero_sanitize_alpha_color'
            )
        );
        $wp_customize->add_control(new Aiero_Alpha_Color_Custom_Control(
            $wp_customize,
            $wp_setting_name,
            array(
                'label'         => esc_html__('Dark Text Color', 'aiero'),
                'section'       => 'aiero_contrast_colors',
                'settings'      => $wp_setting_name,
                'show_opacity'  => true,
                'palette'       => aiero_get_custom_color_palette()
            )
        ));

        // --------------------------------- //
        // --- Contrast Light Text Color --- //
        // --------------------------------- //
        $wp_setting_name = 'contrast_light_text_color';
        $wp_customize->add_setting(
            $wp_setting_name,
            array(
                'default'           => $aiero_customizer_default_values[$wp_setting_name],
                'sanitize_callback'	=> 'aiero_sanitize_alpha_color'
            )
        );
        $wp_customize->add_control(new Aiero_Alpha_Color_Custom_Control(
            $wp_customize,
            $wp_setting_name,
            array(
                'label'         => esc_html__('Light Text Color', 'aiero'),
                'section'       => 'aiero_contrast_colors',
                'settings'      => $wp_setting_name,
                'show_opacity'  => true,
                'palette'       => aiero_get_custom_color_palette()
            )
        ));

        // ---------------------------------- //
        // --- Contrast Accent Text Color --- //
        // ---------------------------------- //
        $wp_setting_name = 'contrast_accent_text_color';
        $wp_customize->add_setting(
            $wp_setting_name,
            array(
                'default'           => $aiero_customizer_default_values[$wp_setting_name],
                'sanitize_callback'	=> 'aiero_sanitize_alpha_color'
            )
        );
        $wp_customize->add_control(new Aiero_Alpha_Color_Custom_Control(
            $wp_customize,
            $wp_setting_name,
            array(
                'label'         => esc_html__('Accent Text Color', 'aiero'),
                'section'       => 'aiero_contrast_colors',
                'settings'      => $wp_setting_name,
                'show_opacity'  => true,
                'palette'       => aiero_get_custom_color_palette()
            )
        ));

        // ---------------------------------- //
        // --- Contrast Input Dark Color --- //
        // ---------------------------------- //
        $wp_setting_name = 'contrast_input_dark_color';
        $wp_customize->add_setting(
            $wp_setting_name,
            array(
                'default'           => $aiero_customizer_default_values[$wp_setting_name],
                'sanitize_callback' => 'aiero_sanitize_alpha_color'
            )
        );
        $wp_customize->add_control(new Aiero_Alpha_Color_Custom_Control(
            $wp_customize,
            $wp_setting_name,
            array(
                'label'         => esc_html__('Input Dark Color', 'aiero'),
                'section'       => 'aiero_contrast_colors',
                'settings'      => $wp_setting_name,
                'show_opacity'  => true,
                'palette'       => aiero_get_custom_color_palette()
            )
        ));

        // ----------------------------- //
        // --- Contrast Border Color --- //
        // ----------------------------- //
        $wp_setting_name = 'contrast_border_color';
        $wp_customize->add_setting(
            $wp_setting_name,
            array(
                'default'           => $aiero_customizer_default_values[$wp_setting_name],
                'sanitize_callback'	=> 'aiero_sanitize_alpha_color'
            )
        );
        $wp_customize->add_control(new Aiero_Alpha_Color_Custom_Control(
            $wp_customize,
            $wp_setting_name,
            array(
                'label'         => esc_html__('Border Color', 'aiero'),
                'section'       => 'aiero_contrast_colors',
                'settings'      => $wp_setting_name,
                'show_opacity'  => true,
                'palette'       => aiero_get_custom_color_palette(),
                'separator'     => 'before'
            )
        ));

        // ----------------------------------- //
        // --- Contrast Border Hover Color --- //
        // ----------------------------------- //
        $wp_setting_name = 'contrast_border_hover_color';
        $wp_customize->add_setting(
            $wp_setting_name,
            array(
                'default'           => $aiero_customizer_default_values[$wp_setting_name],
                'sanitize_callback'	=> 'aiero_sanitize_alpha_color'
            )
        );
        $wp_customize->add_control(new Aiero_Alpha_Color_Custom_Control(
            $wp_customize,
            $wp_setting_name,
            array(
                'label'         => esc_html__('Border Hover Color', 'aiero'),
                'section'       => 'aiero_contrast_colors',
                'settings'      => $wp_setting_name,
                'show_opacity'  => true,
                'palette'       => aiero_get_custom_color_palette()
            )
        ));

        // --------------------------------- //
        // --- Contrast Background Color --- //
        // --------------------------------- //
        $wp_setting_name = 'contrast_background_color';
        $wp_customize->add_setting(
            $wp_setting_name,
            array(
                'default'           => $aiero_customizer_default_values[$wp_setting_name],
                'sanitize_callback'	=> 'aiero_sanitize_alpha_color'
            )
        );
        $wp_customize->add_control(new Aiero_Alpha_Color_Custom_Control(
            $wp_customize,
            $wp_setting_name,
            array(
                'label'         => esc_html__('Background Color', 'aiero'),
                'section'       => 'aiero_contrast_colors',
                'settings'      => $wp_setting_name,
                'show_opacity'  => true,
                'palette'       => aiero_get_custom_color_palette(),
                'separator'     => 'before'
            )
        ));

        // --------------------------------------- //
        // --- Contrast Background Alter Color --- //
        // --------------------------------------- //
        $wp_setting_name = 'contrast_background_alter_color';
        $wp_customize->add_setting(
            $wp_setting_name,
            array(
                'default'           => $aiero_customizer_default_values[$wp_setting_name],
                'sanitize_callback'	=> 'aiero_sanitize_alpha_color'
            )
        );
        $wp_customize->add_control(new Aiero_Alpha_Color_Custom_Control(
            $wp_customize,
            $wp_setting_name,
            array(
                'label'         => esc_html__('Alternative Background Color', 'aiero'),
                'section'       => 'aiero_contrast_colors',
                'settings'      => $wp_setting_name,
                'show_opacity'  => true,
                'palette'       => aiero_get_custom_color_palette()
            )
        ));

        // ---------------------------------- //
        // --- Contrast Button Text Color --- //
        // ---------------------------------- //
        $wp_setting_name = 'contrast_button_text_color';
        $wp_customize->add_setting(
            $wp_setting_name,
            array(
                'default'           => $aiero_customizer_default_values[$wp_setting_name],
                'sanitize_callback'	=> 'aiero_sanitize_alpha_color'
            )
        );
        $wp_customize->add_control(new Aiero_Alpha_Color_Custom_Control(
            $wp_customize,
            $wp_setting_name,
            array(
                'label'         => esc_html__('Button Text Color', 'aiero'),
                'section'       => 'aiero_contrast_colors',
                'settings'      => $wp_setting_name,
                'show_opacity'  => true,
                'palette'       => aiero_get_custom_color_palette(),
                'separator'     => 'before'
            )
        ));

        // ------------------------------------ //
        // --- Contrast Button Border Color --- //
        // ------------------------------------ //
        $wp_setting_name = 'contrast_button_border_color';
        $wp_customize->add_setting(
            $wp_setting_name,
            array(
                'default'           => $aiero_customizer_default_values[$wp_setting_name],
                'sanitize_callback'	=> 'aiero_sanitize_alpha_color'
            )
        );
        $wp_customize->add_control(new Aiero_Alpha_Color_Custom_Control(
            $wp_customize,
            $wp_setting_name,
            array(
                'label'         => esc_html__('Button Border Color', 'aiero'),
                'section'       => 'aiero_contrast_colors',
                'settings'      => $wp_setting_name,
                'show_opacity'  => true,
                'palette'       => aiero_get_custom_color_palette()
            )
        ));

        // ------------------------------------ //
        // --- Contrast Button Border Color 2 --- //
        // ------------------------------------ //
        $wp_setting_name = 'contrast_button_border_color_add';
        $wp_customize->add_setting(
            $wp_setting_name,
            array(
                'default'           => $aiero_customizer_default_values[$wp_setting_name],
                'sanitize_callback' => 'aiero_sanitize_alpha_color'
            )
        );
        $wp_customize->add_control(new Aiero_Alpha_Color_Custom_Control(
            $wp_customize,
            $wp_setting_name,
            array(
                'label'         => esc_html__('Button Border Color Additional', 'aiero'),
                'section'       => 'aiero_contrast_colors',
                'settings'      => $wp_setting_name,
                'show_opacity'  => true,
                'palette'       => aiero_get_custom_color_palette()
            )
        ));

        // ---------------------------------------- //
        // --- Contrast Button Background Color --- //
        // ---------------------------------------- //
        $wp_setting_name = 'contrast_button_background_color';
        $wp_customize->add_setting(
            $wp_setting_name,
            array(
                'default'           => $aiero_customizer_default_values[$wp_setting_name],
                'sanitize_callback'	=> 'aiero_sanitize_alpha_color'
            )
        );
        $wp_customize->add_control(new Aiero_Alpha_Color_Custom_Control(
            $wp_customize,
            $wp_setting_name,
            array(
                'label'         => esc_html__('Button Background Color', 'aiero'),
                'section'       => 'aiero_contrast_colors',
                'settings'      => $wp_setting_name,
                'show_opacity'  => true,
                'palette'       => aiero_get_custom_color_palette()
            )
        ));

        // ---------------------------------------- //
        // --- Contrast Button Background Color 2 --- //
        // ---------------------------------------- //
        $wp_setting_name = 'contrast_button_background_color_add';
        $wp_customize->add_setting(
            $wp_setting_name,
            array(
                'default'           => $aiero_customizer_default_values[$wp_setting_name],
                'sanitize_callback' => 'aiero_sanitize_alpha_color'
            )
        );
        $wp_customize->add_control(new Aiero_Alpha_Color_Custom_Control(
            $wp_customize,
            $wp_setting_name,
            array(
                'label'         => esc_html__('Button Background Color Additional', 'aiero'),
                'section'       => 'aiero_contrast_colors',
                'settings'      => $wp_setting_name,
                'show_opacity'  => true,
                'palette'       => aiero_get_custom_color_palette()
            )
        ));

        // ---------------------------------- //
        // --- Contrast Button Text Hover --- //
        // ---------------------------------- //
        $wp_setting_name = 'contrast_button_text_hover';
        $wp_customize->add_setting(
            $wp_setting_name,
            array(
                'default'           => $aiero_customizer_default_values[$wp_setting_name],
                'sanitize_callback'	=> 'aiero_sanitize_alpha_color'
            )
        );
        $wp_customize->add_control(new Aiero_Alpha_Color_Custom_Control(
            $wp_customize,
            $wp_setting_name,
            array(
                'label'         => esc_html__('Button Text Hover', 'aiero'),
                'section'       => 'aiero_contrast_colors',
                'settings'      => $wp_setting_name,
                'show_opacity'  => true,
                'palette'       => aiero_get_custom_color_palette()
            )
        ));

        // ------------------------------------ //
        // --- Contrast Button Border Hover --- //
        // ------------------------------------ //
        $wp_setting_name = 'contrast_button_border_hover';
        $wp_customize->add_setting(
            $wp_setting_name,
            array(
                'default'           => $aiero_customizer_default_values[$wp_setting_name],
                'sanitize_callback'	=> 'aiero_sanitize_alpha_color'
            )
        );
        $wp_customize->add_control(new Aiero_Alpha_Color_Custom_Control(
            $wp_customize,
            $wp_setting_name,
            array(
                'label'         => esc_html__('Button Border Hover', 'aiero'),
                'section'       => 'aiero_contrast_colors',
                'settings'      => $wp_setting_name,
                'show_opacity'  => true,
                'palette'       => aiero_get_custom_color_palette()
            )
        ));

        // ------------------------------------ //
        // --- Contrast Button Border Hover 2 --- //
        // ------------------------------------ //
        $wp_setting_name = 'contrast_button_border_hover_add';
        $wp_customize->add_setting(
            $wp_setting_name,
            array(
                'default'           => $aiero_customizer_default_values[$wp_setting_name],
                'sanitize_callback' => 'aiero_sanitize_alpha_color'
            )
        );
        $wp_customize->add_control(new Aiero_Alpha_Color_Custom_Control(
            $wp_customize,
            $wp_setting_name,
            array(
                'label'         => esc_html__('Button Border Hover Additional', 'aiero'),
                'section'       => 'aiero_contrast_colors',
                'settings'      => $wp_setting_name,
                'show_opacity'  => true,
                'palette'       => aiero_get_custom_color_palette()
            )
        ));

        // ---------------------------------------- //
        // --- Contrast Button Background Hover --- //
        // ---------------------------------------- //
        $wp_setting_name = 'contrast_button_background_hover';
        $wp_customize->add_setting(
            $wp_setting_name,
            array(
                'default'           => $aiero_customizer_default_values[$wp_setting_name],
                'sanitize_callback'	=> 'aiero_sanitize_alpha_color'
            )
        );
        $wp_customize->add_control(new Aiero_Alpha_Color_Custom_Control(
            $wp_customize,
            $wp_setting_name,
            array(
                'label'         => esc_html__('Button Background Hover', 'aiero'),
                'section'       => 'aiero_contrast_colors',
                'settings'      => $wp_setting_name,
                'show_opacity'  => true,
                'palette'       => aiero_get_custom_color_palette()
            )
        ));

        // ---------------------------------------- //
        // --- Contrast Button Background Hover 2 --- //
        // ---------------------------------------- //
        $wp_setting_name = 'contrast_button_background_hover_add';
        $wp_customize->add_setting(
            $wp_setting_name,
            array(
                'default'           => $aiero_customizer_default_values[$wp_setting_name],
                'sanitize_callback' => 'aiero_sanitize_alpha_color'
            )
        );
        $wp_customize->add_control(new Aiero_Alpha_Color_Custom_Control(
            $wp_customize,
            $wp_setting_name,
            array(
                'label'         => esc_html__('Button Background Hover Additional', 'aiero'),
                'section'       => 'aiero_contrast_colors',
                'settings'      => $wp_setting_name,
                'show_opacity'  => true,
                'palette'       => aiero_get_custom_color_palette()
            )
        ));

        // ---------------------------------------- //
        // --- Contrast Button Border Style --- //
        // ---------------------------------------- //
        $wp_setting_name = 'contrast_button_border_style';
        $wp_customize->add_setting(
            $wp_setting_name,
            array(
                'default'           => $aiero_customizer_default_values[$wp_setting_name],
                'sanitize_callback' => 'aiero_sanitize_choice'
            )
        );
        $wp_customize->add_control(new Aiero_Customize_Control(
            $wp_customize,
            $wp_setting_name,
            array(
                'label'     => esc_html__('Button Border Style', 'aiero'),
                'section'   => 'aiero_contrast_colors',
                'type'      => 'select',
                'settings'  => $wp_setting_name,
                'choices'   => array(
                    'gradient'    => esc_html__('Gradient', 'aiero'),
                    'solid'       => esc_html__('Solid', 'aiero')
                )
            )
        ));

        // ---------------------------------------- //
        // --- Contrast Button Background Style --- //
        // ---------------------------------------- //
        $wp_setting_name = 'contrast_button_background_style';
        $wp_customize->add_setting(
            $wp_setting_name,
            array(
                'default'           => $aiero_customizer_default_values[$wp_setting_name],
                'sanitize_callback' => 'aiero_sanitize_choice'
            )
        );
        $wp_customize->add_control(new Aiero_Customize_Control(
            $wp_customize,
            $wp_setting_name,
            array(
                'label'     => esc_html__('Button Background Style', 'aiero'),
                'section'   => 'aiero_contrast_colors',
                'type'      => 'select',
                'settings'  => $wp_setting_name,
                'choices'   => array(
                    'gradient'    => esc_html__('Gradient', 'aiero'),
                    'solid'       => esc_html__('Solid', 'aiero')
                )
            )
        ));


        // ------------------------------------------- //
        // ---------- Footer Settings Panel ---------- //
        // ------------------------------------------- //
        $wp_customize->add_panel('aiero_footer_settings',
            array(
                'title'     => esc_html__('Footer Settings', 'aiero'),
                'priority'  => 160
            )
        );

        // ---###############--- //
        // ---### General ###--- //
        // ---###############--- //
        $wp_customize->add_section('aiero_footer_general',
            array(
                'title' => esc_html__('General', 'aiero'),
                'panel' => 'aiero_footer_settings'
            )
        );

        // --------------------- //
        // --- Footer Status --- //
        // --------------------- //
        $wp_setting_name = 'footer_status';
        $wp_customize->add_setting(
            $wp_setting_name,
            array(
                'default'           => $aiero_customizer_default_values[$wp_setting_name],
                'sanitize_callback'	=> 'aiero_sanitize_choice'
            )
        );
        $wp_customize->add_control(new Aiero_Customize_Control(
            $wp_customize,
            $wp_setting_name,
            array(
                'label'     => esc_html__('Show Footer', 'aiero'),
                'section'   => 'aiero_footer_general',
                'type'      => 'select',
                'settings'  => $wp_setting_name,
                'choices'   => array(
                    'on'        => esc_html__('Yes', 'aiero'),
                    'off'       => esc_html__('No', 'aiero')
                )
            )
        ));

        // -------------------- //
        // --- Footer Position --- //
        // -------------------- //
        $wp_setting_name = 'footer_position';
        $wp_customize->add_setting(
            $wp_setting_name,
            array(
                'default'           => $aiero_customizer_default_values[$wp_setting_name],
                'sanitize_callback' => 'aiero_sanitize_choice'
            )
        );
        $wp_customize->add_control(new Aiero_Customize_Control(
            $wp_customize,
            $wp_setting_name,
            array(
                'label'         => esc_html__('Footer Position', 'aiero'),
                'section'       => 'aiero_footer_general',
                'type'          => 'select',
                'settings'      => $wp_setting_name,
                'choices'       => array(
                    'indented'        => esc_html__('Indented', 'aiero'),
                    'no-indent'       => esc_html__('No Indent', 'aiero')
                ),
                'dependency'    => [
                    [
                        'control'   => 'footer_status',
                        'operator'  => '==',
                        'value'     => 'on'
                    ]
                ]
            )
        ));

        // -------------------- //
        // --- Footer Style --- //
        // -------------------- //
        $wp_setting_name = 'footer_style';
        $wp_customize->add_setting(
            $wp_setting_name,
            array(
                'default'           => $aiero_customizer_default_values[$wp_setting_name],
                'sanitize_callback'	=> 'aiero_sanitize_choice'
            )
        );
        $wp_customize->add_control(new Aiero_Customize_Control(
            $wp_customize,
            $wp_setting_name,
            array(
                'label'         => esc_html__('Footer Style', 'aiero'),
                'section'       => 'aiero_footer_general',
                'type'          => 'select',
                'settings'      => $wp_setting_name,
                'choices'       => array(
                    'type-1'        => esc_html__('Style 1', 'aiero'),
                    'type-2'        => esc_html__('Style 2', 'aiero'),
                    'type-3'        => esc_html__('Style 3', 'aiero'),
                    'type-4'        => esc_html__('Style 4', 'aiero'),
                    'type-5'        => esc_html__('Style 5', 'aiero'),
                    'type-6'        => esc_html__('Style 6', 'aiero')
                ),
                'dependency'    => [
                    [
                        'control'   => 'footer_status',
                        'operator'  => '==',
                        'value'     => 'on'
                    ]
                ]
            )
        ));

        // ----------------------------- //
        // --- Footer Border Radius --- //
        // ---------------------------- //
        $wp_setting_name = 'footer_border_radius';
        $wp_customize->add_setting(
            $wp_setting_name,
            array(
                'default'           => $aiero_customizer_default_values[$wp_setting_name],
                'sanitize_callback' => 'aiero_sanitize_choice'
            )
        );
        $wp_customize->add_control(new Aiero_Customize_Control(
            $wp_customize,
            $wp_setting_name,
            array(
                'label'         => esc_html__('Footer Border Radius', 'aiero'),
                'section'       => 'aiero_footer_general',
                'type'          => 'select',
                'settings'      => $wp_setting_name,
                'choices'       => array(
                    'on'        => esc_html__('On', 'aiero'),
                    'off'       => esc_html__('Off', 'aiero'),
                    'no-top-border-radius'       => esc_html__('No Top Border Radius', 'aiero'),
                    'no-bottom-border-radius'    => esc_html__('No Bottom Border Radius', 'aiero'),
                ),
                'dependency'    => [
                    [
                        'control'   => 'footer_status',
                        'operator'  => '==',
                        'value'     => 'on'
                    ]
                ]
            )
        ));

        // ------------------------ //
        // --- Footer Customize --- //
        // ------------------------ //
        $wp_setting_name = 'footer_customize';
        $wp_customize->add_setting(
            $wp_setting_name,
            array(
                'default'           => $aiero_customizer_default_values[$wp_setting_name],
                'sanitize_callback'	=> 'aiero_sanitize_choice'
            )
        );
        $wp_customize->add_control(new Aiero_Customize_Control(
            $wp_customize,
            $wp_setting_name,
            array(
                'label'     => esc_html__('Customize', 'aiero'),
                'section'   => 'aiero_footer_general',
                'type'      => 'select',
                'settings'  => $wp_setting_name,
                'choices'   => array(
                    'on'        => esc_html__('Yes', 'aiero'),
                    'off'       => esc_html__('No', 'aiero')
                )
            )
        ));

        // --------------------------------- //
        // --- Footer Default Text Color --- //
        // --------------------------------- //
        $wp_setting_name = 'footer_default_text_color';
        $wp_customize->add_setting(
            $wp_setting_name,
            array(
                'default'           => $aiero_customizer_default_values[$wp_setting_name],
                'sanitize_callback'	=> 'aiero_sanitize_alpha_color'
            )
        );
        $wp_customize->add_control(new Aiero_Alpha_Color_Custom_Control(
            $wp_customize,
            $wp_setting_name,
            array(
                'label'         => esc_html__('Default Text Color', 'aiero'),
                'section'       => 'aiero_footer_general',
                'settings'      => $wp_setting_name,
                'show_opacity'  => true,
                'palette'       => aiero_get_custom_color_palette(),
                'dependency'    => [
                    [
                        'control'   => 'footer_customize',
                        'operator'  => '==',
                        'value'     => 'on'
                    ]
                ],
                'separator'     => 'before'
            )
        ));

        // ------------------------------ //
        // --- Footer Dark Text Color --- //
        // ------------------------------ //
        $wp_setting_name = 'footer_dark_text_color';
        $wp_customize->add_setting(
            $wp_setting_name,
            array(
                'default'           => $aiero_customizer_default_values[$wp_setting_name],
                'sanitize_callback'	=> 'aiero_sanitize_alpha_color'
            )
        );
        $wp_customize->add_control(new Aiero_Alpha_Color_Custom_Control(
            $wp_customize,
            $wp_setting_name,
            array(
                'label'         => esc_html__('Dark Text Color', 'aiero'),
                'section'       => 'aiero_footer_general',
                'settings'      => $wp_setting_name,
                'show_opacity'  => true,
                'palette'       => aiero_get_custom_color_palette(),
                'dependency'    => [
                    [
                        'control'   => 'footer_customize',
                        'operator'  => '==',
                        'value'     => 'on'
                    ]
                ]
            )
        ));

        // ------------------------------- //
        // --- Footer Light Text Color --- //
        // ------------------------------- //
        $wp_setting_name = 'footer_light_text_color';
        $wp_customize->add_setting(
            $wp_setting_name,
            array(
                'default'           => $aiero_customizer_default_values[$wp_setting_name],
                'sanitize_callback'	=> 'aiero_sanitize_alpha_color'
            )
        );
        $wp_customize->add_control(new Aiero_Alpha_Color_Custom_Control(
            $wp_customize,
            $wp_setting_name,
            array(
                'label'         => esc_html__('Light Text Color', 'aiero'),
                'section'       => 'aiero_footer_general',
                'settings'      => $wp_setting_name,
                'show_opacity'  => true,
                'palette'       => aiero_get_custom_color_palette(),
                'dependency'    => [
                    [
                        'control'   => 'footer_customize',
                        'operator'  => '==',
                        'value'     => 'on'
                    ]
                ]
            )
        ));

        // -------------------------------- //
        // --- Footer Accent Text Color --- //
        // -------------------------------- //
        $wp_setting_name = 'footer_accent_text_color';
        $wp_customize->add_setting(
            $wp_setting_name,
            array(
                'default'           => $aiero_customizer_default_values[$wp_setting_name],
                'sanitize_callback'	=> 'aiero_sanitize_alpha_color'
            )
        );
        $wp_customize->add_control(new Aiero_Alpha_Color_Custom_Control(
            $wp_customize,
            $wp_setting_name,
            array(
                'label'         => esc_html__('Accent Text Color', 'aiero'),
                'section'       => 'aiero_footer_general',
                'settings'      => $wp_setting_name,
                'show_opacity'  => true,
                'palette'       => aiero_get_custom_color_palette(),
                'dependency'    => [
                    [
                        'control'   => 'footer_customize',
                        'operator'  => '==',
                        'value'     => 'on'
                    ]
                ]
            )
        ));

        // -------------------------------- //
        // --- Footer Input Dark Color --- //
        // -------------------------------- //
        $wp_setting_name = 'footer_input_dark_color';
        $wp_customize->add_setting(
            $wp_setting_name,
            array(
                'default'           => $aiero_customizer_default_values[$wp_setting_name],
                'sanitize_callback' => 'aiero_sanitize_alpha_color'
            )
        );
        $wp_customize->add_control(new Aiero_Alpha_Color_Custom_Control(
            $wp_customize,
            $wp_setting_name,
            array(
                'label'         => esc_html__('Input Dark Color', 'aiero'),
                'section'       => 'aiero_footer_general',
                'settings'      => $wp_setting_name,
                'show_opacity'  => true,
                'palette'       => aiero_get_custom_color_palette(),
                'dependency'    => [
                    [
                        'control'   => 'footer_customize',
                        'operator'  => '==',
                        'value'     => 'on'
                    ]
                ]
            )
        ));

        // -------------------------------- //
        // --- Footer Border Text Color --- //
        // -------------------------------- //
        $wp_setting_name = 'footer_border_color';
        $wp_customize->add_setting(
            $wp_setting_name,
            array(
                'default'           => $aiero_customizer_default_values[$wp_setting_name],
                'sanitize_callback'	=> 'aiero_sanitize_alpha_color'
            )
        );
        $wp_customize->add_control(new Aiero_Alpha_Color_Custom_Control(
            $wp_customize,
            $wp_setting_name,
            array(
                'label'         => esc_html__('Border Color', 'aiero'),
                'section'       => 'aiero_footer_general',
                'settings'      => $wp_setting_name,
                'show_opacity'  => true,
                'palette'       => aiero_get_custom_color_palette(),
                'dependency'    => [
                    [
                        'control'   => 'footer_customize',
                        'operator'  => '==',
                        'value'     => 'on'
                    ]
                ],
                'separator'     => 'before'
            )
        ));

        // ---------------------------------------- //
        // --- Footer Hovered Border Text Color --- //
        // ---------------------------------------- //
        $wp_setting_name = 'footer_border_hover_color';
        $wp_customize->add_setting(
            $wp_setting_name,
            array(
                'default'           => $aiero_customizer_default_values[$wp_setting_name],
                'sanitize_callback'	=> 'aiero_sanitize_alpha_color'
            )
        );
        $wp_customize->add_control(new Aiero_Alpha_Color_Custom_Control(
            $wp_customize,
            $wp_setting_name,
            array(
                'label'         => esc_html__('Hovered Border Color', 'aiero'),
                'section'       => 'aiero_footer_general',
                'settings'      => $wp_setting_name,
                'show_opacity'  => true,
                'palette'       => aiero_get_custom_color_palette(),
                'dependency'    => [
                    [
                        'control'   => 'footer_customize',
                        'operator'  => '==',
                        'value'     => 'on'
                    ]
                ]
            )
        ));

        // ------------------------------- //
        // --- Footer Background Color --- //
        // ------------------------------- //
        $wp_setting_name = 'footer_background_color';
        $wp_customize->add_setting(
            $wp_setting_name,
            array(
                'default'           => $aiero_customizer_default_values[$wp_setting_name],
                'sanitize_callback'	=> 'aiero_sanitize_alpha_color'
            )
        );
        $wp_customize->add_control(new Aiero_Alpha_Color_Custom_Control(
            $wp_customize,
            $wp_setting_name,
            array(
                'label'         => esc_html__('Background Color', 'aiero'),
                'section'       => 'aiero_footer_general',
                'settings'      => $wp_setting_name,
                'show_opacity'  => true,
                'palette'       => aiero_get_custom_color_palette(),
                'dependency'    => [
                    [
                        'control'   => 'footer_customize',
                        'operator'  => '==',
                        'value'     => 'on'
                    ]
                ],
                'separator'     => 'before'
            )
        ));

        // ------------------------------------------- //
        // --- Footer Alternative Background Color --- //
        // ------------------------------------------- //
        $wp_setting_name = 'footer_background_alter_color';
        $wp_customize->add_setting(
            $wp_setting_name,
            array(
                'default'           => $aiero_customizer_default_values[$wp_setting_name],
                'sanitize_callback'	=> 'aiero_sanitize_alpha_color'
            )
        );
        $wp_customize->add_control(new Aiero_Alpha_Color_Custom_Control(
            $wp_customize,
            $wp_setting_name,
            array(
                'label'         => esc_html__('Alternative Background Color', 'aiero'),
                'section'       => 'aiero_footer_general',
                'settings'      => $wp_setting_name,
                'show_opacity'  => true,
                'palette'       => aiero_get_custom_color_palette(),
                'dependency'    => [
                    [
                        'control'   => 'footer_customize',
                        'operator'  => '==',
                        'value'     => 'on'
                    ]
                ]
            )
        ));

        // ------------------------------------ //
        // --- Page Title Button Text Color --- //
        // ------------------------------------ //
        $wp_setting_name = 'page_title_button_text_color';
        $wp_customize->add_setting(
            $wp_setting_name,
            array(
                'default'           => $aiero_customizer_default_values[$wp_setting_name],
                'sanitize_callback'	=> 'aiero_sanitize_alpha_color'
            )
        );
        $wp_customize->add_control(new Aiero_Alpha_Color_Custom_Control(
            $wp_customize,
            $wp_setting_name,
            array(
                'label'         => esc_html__('Button Text Color', 'aiero'),
                'section'       => 'aiero_footer_general',
                'settings'      => $wp_setting_name,
                'show_opacity'  => true,
                'palette'       => aiero_get_custom_color_palette(),
                'dependency'    => [
                    [
                        'control'   => 'footer_customize',
                        'operator'  => '==',
                        'value'     => 'on'
                    ]
                ],
                'separator'     => 'before'
            )
        ));

        // ---------------------------------- //
        // --- Footer Button Border Color --- //
        // ---------------------------------- //
        $wp_setting_name = 'footer_button_border_color';
        $wp_customize->add_setting(
            $wp_setting_name,
            array(
                'default'           => $aiero_customizer_default_values[$wp_setting_name],
                'sanitize_callback'	=> 'aiero_sanitize_alpha_color'
            )
        );
        $wp_customize->add_control(new Aiero_Alpha_Color_Custom_Control(
            $wp_customize,
            $wp_setting_name,
            array(
                'label'         => esc_html__('Button Border Color', 'aiero'),
                'section'       => 'aiero_footer_general',
                'settings'      => $wp_setting_name,
                'show_opacity'  => true,
                'palette'       => aiero_get_custom_color_palette(),
                'dependency'    => [
                    [
                        'control'   => 'footer_customize',
                        'operator'  => '==',
                        'value'     => 'on'
                    ]
                ]
            )
        ));

        // ---------------------------------- //
        // --- Footer Button Border Color 2 --- //
        // ---------------------------------- //
        $wp_setting_name = 'footer_button_border_color_add';
        $wp_customize->add_setting(
            $wp_setting_name,
            array(
                'default'           => $aiero_customizer_default_values[$wp_setting_name],
                'sanitize_callback' => 'aiero_sanitize_alpha_color'
            )
        );
        $wp_customize->add_control(new Aiero_Alpha_Color_Custom_Control(
            $wp_customize,
            $wp_setting_name,
            array(
                'label'         => esc_html__('Button Border Color Additional', 'aiero'),
                'section'       => 'aiero_footer_general',
                'settings'      => $wp_setting_name,
                'show_opacity'  => true,
                'palette'       => aiero_get_custom_color_palette(),
                'dependency'    => [
                    [
                        'control'   => 'footer_customize',
                        'operator'  => '==',
                        'value'     => 'on'
                    ]
                ]
            )
        ));

        // -------------------------------------- //
        // --- Footer Button Background Color --- //
        // -------------------------------------- //
        $wp_setting_name = 'footer_button_background_color';
        $wp_customize->add_setting(
            $wp_setting_name,
            array(
                'default'           => $aiero_customizer_default_values[$wp_setting_name],
                'sanitize_callback'	=> 'aiero_sanitize_alpha_color'
            )
        );
        $wp_customize->add_control(new Aiero_Alpha_Color_Custom_Control(
            $wp_customize,
            $wp_setting_name,
            array(
                'label'         => esc_html__('Button Background Color', 'aiero'),
                'section'       => 'aiero_footer_general',
                'settings'      => $wp_setting_name,
                'show_opacity'  => true,
                'palette'       => aiero_get_custom_color_palette(),
                'dependency'    => [
                    [
                        'control'   => 'footer_customize',
                        'operator'  => '==',
                        'value'     => 'on'
                    ]
                ]
            )
        ));

        // -------------------------------------- //
        // --- Footer Button Background Color 2 --- //
        // -------------------------------------- //
        $wp_setting_name = 'footer_button_background_color_add';
        $wp_customize->add_setting(
            $wp_setting_name,
            array(
                'default'           => $aiero_customizer_default_values[$wp_setting_name],
                'sanitize_callback' => 'aiero_sanitize_alpha_color'
            )
        );
        $wp_customize->add_control(new Aiero_Alpha_Color_Custom_Control(
            $wp_customize,
            $wp_setting_name,
            array(
                'label'         => esc_html__('Button Background Color Additional', 'aiero'),
                'section'       => 'aiero_footer_general',
                'settings'      => $wp_setting_name,
                'show_opacity'  => true,
                'palette'       => aiero_get_custom_color_palette(),
                'dependency'    => [
                    [
                        'control'   => 'footer_customize',
                        'operator'  => '==',
                        'value'     => 'on'
                    ]
                ]
            )
        ));

        // -------------------------------- //
        // --- Footer Button Text Hover --- //
        // -------------------------------- //
        $wp_setting_name = 'footer_button_text_hover';
        $wp_customize->add_setting(
            $wp_setting_name,
            array(
                'default'           => $aiero_customizer_default_values[$wp_setting_name],
                'sanitize_callback'	=> 'aiero_sanitize_alpha_color'
            )
        );
        $wp_customize->add_control(new Aiero_Alpha_Color_Custom_Control(
            $wp_customize,
            $wp_setting_name,
            array(
                'label'         => esc_html__('Button Text Hover', 'aiero'),
                'section'       => 'aiero_footer_general',
                'settings'      => $wp_setting_name,
                'show_opacity'  => true,
                'palette'       => aiero_get_custom_color_palette(),
                'dependency'    => [
                    [
                        'control'   => 'footer_customize',
                        'operator'  => '==',
                        'value'     => 'on'
                    ]
                ]
            )
        ));

        // ---------------------------------- //
        // --- Footer Button Border Hover --- //
        // ---------------------------------- //
        $wp_setting_name = 'footer_button_border_hover';
        $wp_customize->add_setting(
            $wp_setting_name,
            array(
                'default'           => $aiero_customizer_default_values[$wp_setting_name],
                'sanitize_callback'	=> 'aiero_sanitize_alpha_color'
            )
        );
        $wp_customize->add_control(new Aiero_Alpha_Color_Custom_Control(
            $wp_customize,
            $wp_setting_name,
            array(
                'label'         => esc_html__('Button Border Hover', 'aiero'),
                'section'       => 'aiero_footer_general',
                'settings'      => $wp_setting_name,
                'show_opacity'  => true,
                'palette'       => aiero_get_custom_color_palette(),
                'dependency'    => [
                    [
                        'control'   => 'footer_customize',
                        'operator'  => '==',
                        'value'     => 'on'
                    ]
                ]
            )
        ));

        // ---------------------------------- //
        // --- Footer Button Border Hover 2 --- //
        // ---------------------------------- //
        $wp_setting_name = 'footer_button_border_hover_add';
        $wp_customize->add_setting(
            $wp_setting_name,
            array(
                'default'           => $aiero_customizer_default_values[$wp_setting_name],
                'sanitize_callback' => 'aiero_sanitize_alpha_color'
            )
        );
        $wp_customize->add_control(new Aiero_Alpha_Color_Custom_Control(
            $wp_customize,
            $wp_setting_name,
            array(
                'label'         => esc_html__('Button Border Hover Additional', 'aiero'),
                'section'       => 'aiero_footer_general',
                'settings'      => $wp_setting_name,
                'show_opacity'  => true,
                'palette'       => aiero_get_custom_color_palette(),
                'dependency'    => [
                    [
                        'control'   => 'footer_customize',
                        'operator'  => '==',
                        'value'     => 'on'
                    ]
                ]
            )
        ));

        // -------------------------------------- //
        // --- Footer Button Background Hover --- //
        // -------------------------------------- //
        $wp_setting_name = 'footer_button_background_hover';
        $wp_customize->add_setting(
            $wp_setting_name,
            array(
                'default'           => $aiero_customizer_default_values[$wp_setting_name],
                'sanitize_callback'	=> 'aiero_sanitize_alpha_color'
            )
        );
        $wp_customize->add_control(new Aiero_Alpha_Color_Custom_Control(
            $wp_customize,
            $wp_setting_name,
            array(
                'label'         => esc_html__('Button Background Hover', 'aiero'),
                'section'       => 'aiero_footer_general',
                'settings'      => $wp_setting_name,
                'show_opacity'  => true,
                'palette'       => aiero_get_custom_color_palette(),
                'dependency'    => [
                    [
                        'control'   => 'footer_customize',
                        'operator'  => '==',
                        'value'     => 'on'
                    ]
                ]
            )
        ));

        // -------------------------------------- //
        // --- Footer Button Background Hover 2 --- //
        // -------------------------------------- //
        $wp_setting_name = 'footer_button_background_hover_add';
        $wp_customize->add_setting(
            $wp_setting_name,
            array(
                'default'           => $aiero_customizer_default_values[$wp_setting_name],
                'sanitize_callback' => 'aiero_sanitize_alpha_color'
            )
        );
        $wp_customize->add_control(new Aiero_Alpha_Color_Custom_Control(
            $wp_customize,
            $wp_setting_name,
            array(
                'label'         => esc_html__('Button Background Hover Additional', 'aiero'),
                'section'       => 'aiero_footer_general',
                'settings'      => $wp_setting_name,
                'show_opacity'  => true,
                'palette'       => aiero_get_custom_color_palette(),
                'dependency'    => [
                    [
                        'control'   => 'footer_customize',
                        'operator'  => '==',
                        'value'     => 'on'
                    ]
                ]
            )
        ));

        // ---------------------------------------- //
        // --- Footer Button Border Style --- //
        // ---------------------------------------- //
        $wp_setting_name = 'footer_button_border_style';
        $wp_customize->add_setting(
            $wp_setting_name,
            array(
                'default'           => $aiero_customizer_default_values[$wp_setting_name],
                'sanitize_callback' => 'aiero_sanitize_choice'
            )
        );
        $wp_customize->add_control(new Aiero_Customize_Control(
            $wp_customize,
            $wp_setting_name,
            array(
                'label'     => esc_html__('Button Border Style', 'aiero'),
                'section'   => 'aiero_footer_general',
                'type'      => 'select',
                'settings'  => $wp_setting_name,
                'choices'   => array(
                    'gradient'    => esc_html__('Gradient', 'aiero'),
                    'solid'       => esc_html__('Solid', 'aiero')
                ),
                'dependency'    => [
                    [
                        'control'   => 'footer_customize',
                        'operator'  => '==',
                        'value'     => 'on'
                    ]
                ]
            )
        ));

        // ---------------------------------------- //
        // --- Footer Background Border Style --- //
        // ---------------------------------------- //
        $wp_setting_name = 'footer_button_background_style';
        $wp_customize->add_setting(
            $wp_setting_name,
            array(
                'default'           => $aiero_customizer_default_values[$wp_setting_name],
                'sanitize_callback' => 'aiero_sanitize_choice'
            )
        );
        $wp_customize->add_control(new Aiero_Customize_Control(
            $wp_customize,
            $wp_setting_name,
            array(
                'label'     => esc_html__('Button Background Style', 'aiero'),
                'section'   => 'aiero_footer_general',
                'type'      => 'select',
                'settings'  => $wp_setting_name,
                'choices'   => array(
                    'gradient'    => esc_html__('Gradient', 'aiero'),
                    'solid'       => esc_html__('Solid', 'aiero')
                ),
                'dependency'    => [
                    [
                        'control'   => 'footer_customize',
                        'operator'  => '==',
                        'value'     => 'on'
                    ]
                ]
            )
        ));

        // ------------------------------- //
        // --- Footer Background Image --- //
        // ------------------------------- //
        $wp_setting_name = 'footer_background_image';
        $wp_customize->add_setting(
            $wp_setting_name,
            array(
                'default'           => $aiero_customizer_default_values[$wp_setting_name],
                'sanitize_callback'	=> 'esc_url_raw'
            )
        );
        $wp_customize->add_control(new Aiero_Image_Custom_Control(
            $wp_customize,
            $wp_setting_name,
            array(
                'label'         => esc_html__('Bottom Image', 'aiero'),
                'section'       => 'aiero_footer_general',
                'settings'      => $wp_setting_name,
                'dependency'    => [
                    [
                        'control'   => 'footer_customize',
                        'operator'  => '==',
                        'value'     => 'on'
                    ]
                ],
                'separator'     => 'before'
            )
        ));

        // ---------------------------------- //
        // --- Footer Background Position --- //
        // ---------------------------------- //
        $wp_setting_name = 'footer_background_position';
        $wp_customize->add_setting(
            $wp_setting_name,
            array(
                'default'           => $aiero_customizer_default_values[$wp_setting_name],
                'sanitize_callback'	=> 'aiero_sanitize_choice'
            )
        );
        $wp_customize->add_control(new Aiero_Customize_Control(
            $wp_customize,
            $wp_setting_name,
            array(
                'label'         => esc_html__('Background Position', 'aiero'),
                'section'       => 'aiero_footer_general',
                'type'          => 'select',
                'settings'      => $wp_setting_name,
                'choices'       => aiero_get_background_position_options(),
                'dependency'    => [
                    [
                        'control'   => 'footer_customize',
                        'operator'  => '==',
                        'value'     => 'on'
                    ]
                ]
            )
        ));

        // -------------------------------- //
        // --- Footer Background Repeat --- //
        // -------------------------------- //
        $wp_setting_name = 'footer_background_repeat';
        $wp_customize->add_setting(
            $wp_setting_name,
            array(
                'default'           => $aiero_customizer_default_values[$wp_setting_name],
                'sanitize_callback'	=> 'aiero_sanitize_choice'
            )
        );
        $wp_customize->add_control(new Aiero_Customize_Control(
            $wp_customize,
            $wp_setting_name,
            array(
                'label'         => esc_html__('Background Repeat', 'aiero'),
                'section'       => 'aiero_footer_general',
                'type'          => 'select',
                'settings'      => $wp_setting_name,
                'choices'       => aiero_get_background_repeat_options(),
                'dependency'    => [
                    [
                        'control'   => 'footer_customize',
                        'operator'  => '==',
                        'value'     => 'on'
                    ]
                ]
            )
        ));

        // ------------------------------ //
        // --- Footer Background Size --- //
        // ------------------------------ //
        $wp_setting_name = 'footer_background_size';
        $wp_customize->add_setting(
            $wp_setting_name,
            array(
                'default'           => $aiero_customizer_default_values[$wp_setting_name],
                'sanitize_callback'	=> 'aiero_sanitize_choice'
            )
        );
        $wp_customize->add_control(new Aiero_Customize_Control(
            $wp_customize,
            $wp_setting_name,
            array(
                'label'         => esc_html__('Background Size', 'aiero'),
                'section'       => 'aiero_footer_general',
                'type'          => 'select',
                'settings'      => $wp_setting_name,
                'choices'       => aiero_get_background_size_options(),
                'dependency'    => [
                    [
                        'control'   => 'footer_customize',
                        'operator'  => '==',
                        'value'     => 'on'
                    ]
                ]
            )
        ));

        // ---##########################--- //
        // ---### Pre Footer Widgets ###--- //
        // ---##########################--- //
        $wp_customize->add_section('aiero_prefooter_sidebar',
            array(
                'title' => esc_html__('Pre Footer Sidebar', 'aiero'),
                'panel' => 'aiero_footer_settings'
            )
        );

        // ----------------------------- //
        // --- Footer Widgets Status --- //
        // ----------------------------- //
        $wp_setting_name = 'prefooter_sidebar_status';
        $wp_customize->add_setting(
            $wp_setting_name,
            array(
                'default'           => $aiero_customizer_default_values[$wp_setting_name],
                'sanitize_callback' => 'aiero_sanitize_choice'
            )
        );
        $wp_customize->add_control(new Aiero_Customize_Control(
            $wp_customize,
            $wp_setting_name,
            array(
                'label'     => esc_html__('Show Pre Footer Widgets', 'aiero'),
                'section'   => 'aiero_prefooter_sidebar',
                'type'      => 'select',
                'settings'  => $wp_setting_name,
                'choices'   => array(
                    'on'        => esc_html__('Yes', 'aiero'),
                    'off'       => esc_html__('No', 'aiero')
                )
            )
        ));

        // ----------------------------- //
        // --- Footer Sidebar Select --- //
        // ----------------------------- //
        $wp_setting_name = 'prefooter_sidebar_select';
        $wp_customize->add_setting(
            $wp_setting_name,
            array(
                'default'           => $aiero_customizer_default_values[$wp_setting_name],
                'sanitize_callback' => 'aiero_sanitize_choice'
            )
        );
        $wp_customize->add_control(new Aiero_Customize_Control(
            $wp_customize,
            $wp_setting_name,
            array(
                'label'         => esc_html__('Select Sidebar', 'aiero'),
                'section'       => 'aiero_prefooter_sidebar',
                'type'          => 'select',
                'settings'      => $wp_setting_name,
                'choices'       => aiero_get_all_sidebar_list(),
                'dependency'    => [
                    [
                        'control'   => 'prefooter_sidebar_status',
                        'operator'  => '==',
                        'value'     => 'on'
                    ]
                ]
            )
        ));


        // ---######################--- //
        // ---### Footer Widgets ###--- //
        // ---######################--- //
        $wp_customize->add_section('aiero_footer_sidebar',
            array(
                'title' => esc_html__('Footer Sidebar', 'aiero'),
                'panel' => 'aiero_footer_settings'
            )
        );

        // ----------------------------- //
        // --- Footer Widgets Status --- //
        // ----------------------------- //
        $wp_setting_name = 'footer_sidebar_status';
        $wp_customize->add_setting(
            $wp_setting_name,
            array(
                'default'           => $aiero_customizer_default_values[$wp_setting_name],
                'sanitize_callback'	=> 'aiero_sanitize_choice'
            )
        );
        $wp_customize->add_control(new Aiero_Customize_Control(
            $wp_customize,
            $wp_setting_name,
            array(
                'label'     => esc_html__('Show Footer Widgets', 'aiero'),
                'section'   => 'aiero_footer_sidebar',
                'type'      => 'select',
                'settings'  => $wp_setting_name,
                'choices'   => array(
                    'on'        => esc_html__('Yes', 'aiero'),
                    'off'       => esc_html__('No', 'aiero')
                )
            )
        ));

        // ----------------------------- //
        // --- Footer Sidebar Select --- //
        // ----------------------------- //
        $wp_setting_name = 'footer_sidebar_select';
        $wp_customize->add_setting(
            $wp_setting_name,
            array(
                'default'           => $aiero_customizer_default_values[$wp_setting_name],
                'sanitize_callback'	=> 'aiero_sanitize_choice'
            )
        );
        $wp_customize->add_control(new Aiero_Customize_Control(
            $wp_customize,
            $wp_setting_name,
            array(
                'label'         => esc_html__('Select Sidebar', 'aiero'),
                'section'       => 'aiero_footer_sidebar',
                'type'          => 'select',
                'settings'      => $wp_setting_name,
                'choices'       => aiero_get_all_sidebar_list(),
                'dependency'    => [
                    [
                        'control'   => 'footer_sidebar_status',
                        'operator'  => '==',
                        'value'     => 'on'
                    ]
                ]
            )
        ));


        // ---#################--- //
        // ---### Copyright ###--- //
        // ---#################--- //
        $wp_customize->add_section('aiero_footer_copyright',
            array(
                'title' => esc_html__('Copyright', 'aiero'),
                'panel' => 'aiero_footer_settings'
            )
        );

        // ------------------------ //
        // --- Copyright Status --- //
        // ------------------------ //
        $wp_setting_name = 'footer_copyright_status';
        $wp_customize->add_setting(
            $wp_setting_name,
            array(
                'default'           => $aiero_customizer_default_values[$wp_setting_name],
                'sanitize_callback'	=> 'aiero_sanitize_choice'
            )
        );
        $wp_customize->add_control(new Aiero_Customize_Control(
            $wp_customize,
            $wp_setting_name,
            array(
                'label'     => esc_html__('Show Copyright', 'aiero'),
                'section'   => 'aiero_footer_copyright',
                'type'      => 'select',
                'settings'  => $wp_setting_name,
                'choices'   => array(
                    'on'        => esc_html__('Yes', 'aiero'),
                    'off'       => esc_html__('No', 'aiero')
                )
            )
        ));

        // ---------------------- //
        // --- Copyright Text --- //
        // ---------------------- //
        $wp_setting_name = 'footer_copyright_text';
        $wp_customize->add_setting(
            $wp_setting_name,
            array(
                'default'           => $aiero_customizer_default_values[$wp_setting_name],
                'sanitize_callback'	=> 'wp_kses_post'
            )
        );
        $wp_customize->add_control(new Aiero_Customize_Control(
            $wp_customize,
            $wp_setting_name,
            array(
                'label'         => esc_html__('Copyright Text', 'aiero'),
                'section'       => 'aiero_footer_copyright',
                'type'          => 'text',
                'settings'      => $wp_setting_name
            )
        ));

        // ---###################--- //
        // ---### Footer Menu ###--- //
        // ---###################--- //
        $wp_customize->add_section('aiero_footer_menu',
            array(
                'title' => esc_html__('Footer Menu', 'aiero'),
                'panel' => 'aiero_footer_settings'
            )
        );

        // -------------------------- //
        // --- Footer Menu Status --- //
        // -------------------------- //
        $wp_setting_name = 'footer_menu_status';
        $wp_customize->add_setting(
            $wp_setting_name,
            array(
                'default'           => $aiero_customizer_default_values[$wp_setting_name],
                'sanitize_callback'	=> 'aiero_sanitize_choice'
            )
        );
        $wp_customize->add_control(new Aiero_Customize_Control(
            $wp_customize,
            $wp_setting_name,
            array(
                'label'     => esc_html__('Show Footer Menu', 'aiero'),
                'section'   => 'aiero_footer_menu',
                'type'      => 'select',
                'settings'  => $wp_setting_name,
                'choices'   => array(
                    'on'        => esc_html__('Yes', 'aiero'),
                    'off'       => esc_html__('No', 'aiero')
                )
            )
        ));

        // -------------------------- //
        // --- Footer Menu Select --- //
        // -------------------------- //
        $wp_setting_name = 'footer_menu_select';
        $wp_customize->add_setting(
            $wp_setting_name,
            array(
                'default'           => $aiero_customizer_default_values[$wp_setting_name],
                'sanitize_callback'	=> 'aiero_sanitize_choice'
            )
        );
        $wp_customize->add_control(new Aiero_Customize_Control(
            $wp_customize,
            $wp_setting_name,
            array(
                'label'     => esc_html__('Select Menu', 'aiero'),
                'section'   => 'aiero_footer_menu',
                'type'      => 'select',
                'settings'  => $wp_setting_name,
                'choices'   => aiero_get_all_menu_list()
            )
        ));

        // ---##############################--- //
        // ---### Footer Additional Menu ###--- //
        // ---##############################--- //
        $wp_customize->add_section('aiero_footer_additional_menu',
            array(
                'title' => esc_html__('Footer Additional Menu', 'aiero'),
                'panel' => 'aiero_footer_settings'
            )
        );

        // ------------------------------------- //
        // --- Footer Additional Menu Status --- //
        // ------------------------------------- //
        $wp_setting_name = 'footer_additional_menu_status';
        $wp_customize->add_setting(
            $wp_setting_name,
            array(
                'default'           => $aiero_customizer_default_values[$wp_setting_name],
                'sanitize_callback'	=> 'aiero_sanitize_choice'
            )
        );
        $wp_customize->add_control(new Aiero_Customize_Control(
            $wp_customize,
            $wp_setting_name,
            array(
                'label'     => esc_html__('Show Additional Footer Menu', 'aiero'),
                'section'   => 'aiero_footer_additional_menu',
                'type'      => 'select',
                'settings'  => $wp_setting_name,
                'choices'   => array(
                    'on'        => esc_html__('Yes', 'aiero'),
                    'off'       => esc_html__('No', 'aiero')
                )
            )
        ));

        // ------------------------------------- //
        // --- Footer Additional Menu Select --- //
        // ------------------------------------- //
        $wp_setting_name = 'footer_additional_menu_select';
        $wp_customize->add_setting(
            $wp_setting_name,
            array(
                'default'           => $aiero_customizer_default_values[$wp_setting_name],
                'sanitize_callback'	=> 'aiero_sanitize_choice'
            )
        );
        $wp_customize->add_control(new Aiero_Customize_Control(
            $wp_customize,
            $wp_setting_name,
            array(
                'label'     => esc_html__('Select Menu', 'aiero'),
                'section'   => 'aiero_footer_additional_menu',
                'type'      => 'select',
                'settings'  => $wp_setting_name,
                'choices'   => aiero_get_all_menu_list()
            )
        ));

        // ------------------------------ //
        // ---------- Layout Settings ---------- //
        // ------------------------------ //
        $wp_customize->add_section('aiero_layout_settings',
            array(
                'title'     => esc_html__('Layout Settings', 'aiero'),
                'priority'  => 170
            )
        );

        // ----------------------------- //
        // --- Remove Top Margin --- //
        // ----------------------------- //
        $wp_setting_name = 'content_top_margin';
        $wp_customize->add_setting(
            $wp_setting_name,
            array(
                'default'           => $aiero_customizer_default_values[$wp_setting_name],
                'sanitize_callback' => 'aiero_sanitize_choice'
            )
        );
        $wp_customize->add_control(new Aiero_Customize_Control(
            $wp_customize,
            $wp_setting_name,
            array(
                'label'     => esc_html__('Remove Content Top Margin', 'aiero'),
                'section'   => 'aiero_layout_settings',
                'type'      => 'select',
                'settings'  => $wp_setting_name,
                'choices'   => array(
                    'on'      => esc_html__('Yes', 'aiero'),
                    'off'     => esc_html__('No', 'aiero')
                )
            )
        ));

        // ----------------------------- //
        // --- Remove Bottom Margin --- //
        // ----------------------------- //
        $wp_setting_name = 'content_bottom_margin';
        $wp_customize->add_setting(
            $wp_setting_name,
            array(
                'default'           => $aiero_customizer_default_values[$wp_setting_name],
                'sanitize_callback' => 'aiero_sanitize_choice'
            )
        );
        $wp_customize->add_control(new Aiero_Customize_Control(
            $wp_customize,
            $wp_setting_name,
            array(
                'label'     => esc_html__('Remove Content Bottom Margin', 'aiero'),
                'section'   => 'aiero_layout_settings',
                'type'      => 'select',
                'settings'  => $wp_setting_name,
                'choices'   => array(
                    'on'      => esc_html__('Yes', 'aiero'),
                    'off'     => esc_html__('No', 'aiero')
                )
            )
        ));

        // ------------------------------ //
        // ---------- Sidebars ---------- //
        // ------------------------------ //
        $wp_customize->add_section('aiero_sidebar_settings',
            array(
                'title'     => esc_html__('Sidebars', 'aiero'),
                'priority'  => 190
            )
        );

        // ----------------------------- //
        // --- Page Sidebar Position --- //
        // ----------------------------- //
        $wp_setting_name = 'sidebar_position';
        $wp_customize->add_setting(
            $wp_setting_name,
            array(
                'default'           => $aiero_customizer_default_values[$wp_setting_name],
                'sanitize_callback'	=> 'aiero_sanitize_choice'
            )
        );
        $wp_customize->add_control(new Aiero_Customize_Control(
            $wp_customize,
            $wp_setting_name,
            array(
                'label'     => esc_html__('Page Sidebar Position', 'aiero'),
                'section'   => 'aiero_sidebar_settings',
                'type'      => 'select',
                'settings'  => $wp_setting_name,
                'choices'   => array(
                    'left'      => esc_html__('Left', 'aiero'),
                    'right'     => esc_html__('Right', 'aiero'),
                    'none'      => esc_html__('None', 'aiero')
                )
            )
        ));

        // -------------------------------- //
        // --- Archive Sidebar Position --- //
        // -------------------------------- //
        $wp_setting_name = 'archive_sidebar_position';
        $wp_customize->add_setting(
            $wp_setting_name,
            array(
                'default'           => $aiero_customizer_default_values[$wp_setting_name],
                'sanitize_callback'	=> 'aiero_sanitize_choice'
            )
        );
        $wp_customize->add_control(new Aiero_Customize_Control(
            $wp_customize,
            $wp_setting_name,
            array(
                'label'     => esc_html__('Archive Sidebar Position', 'aiero'),
                'section'   => 'aiero_sidebar_settings',
                'type'      => 'select',
                'settings'  => $wp_setting_name,
                'choices'   => array(
                    'left'      => esc_html__('Left', 'aiero'),
                    'right'     => esc_html__('Right', 'aiero'),
                    'none'      => esc_html__('None', 'aiero')
                )
            )
        ));

        // ------------------------------------ //
        // --- Single Post Sidebar Position --- //
        // ------------------------------------ //
        $wp_setting_name = 'post_sidebar_position';
        $wp_customize->add_setting(
            $wp_setting_name,
            array(
                'default'           => $aiero_customizer_default_values[$wp_setting_name],
                'sanitize_callback'	=> 'aiero_sanitize_choice'
            )
        );
        $wp_customize->add_control(new Aiero_Customize_Control(
            $wp_customize,
            $wp_setting_name,
            array(
                'label'     => esc_html__('Single Post Sidebar Position', 'aiero'),
                'section'   => 'aiero_sidebar_settings',
                'type'      => 'select',
                'settings'  => $wp_setting_name,
                'choices'   => array(
                    'left'      => esc_html__('Left', 'aiero'),
                    'right'     => esc_html__('Right', 'aiero'),
                    'none'      => esc_html__('None', 'aiero')
                )
            )
        ));

        // -------------------------------- //
        // --- Service Sidebar Position --- //
        // -------------------------------- //
        $wp_setting_name = 'service_sidebar_position';
        $wp_customize->add_setting(
            $wp_setting_name,
            array(
                'default'           => $aiero_customizer_default_values[$wp_setting_name],
                'sanitize_callback'	=> 'aiero_sanitize_choice'
            )
        );
        $wp_customize->add_control(new Aiero_Customize_Control(
            $wp_customize,
            $wp_setting_name,
            array(
                'label'     => esc_html__('Service Sidebar Position', 'aiero'),
                'section'   => 'aiero_sidebar_settings',
                'type'      => 'select',
                'settings'  => $wp_setting_name,
                'choices'   => array(
                    'left'      => esc_html__('Left', 'aiero'),
                    'right'     => esc_html__('Right', 'aiero'),
                    'none'      => esc_html__('None', 'aiero')
                )
            )
        ));

        // -------------------------------- //
        // --- Case Study Sidebar Position --- //
        // -------------------------------- //
        $wp_setting_name = 'case_study_sidebar_position';
        $wp_customize->add_setting(
            $wp_setting_name,
            array(
                'default'           => $aiero_customizer_default_values[$wp_setting_name],
                'sanitize_callback' => 'aiero_sanitize_choice'
            )
        );
        $wp_customize->add_control(new Aiero_Customize_Control(
            $wp_customize,
            $wp_setting_name,
            array(
                'label'     => esc_html__('Case Study Sidebar Position', 'aiero'),
                'section'   => 'aiero_sidebar_settings',
                'type'      => 'select',
                'settings'  => $wp_setting_name,
                'choices'   => array(
                    'left'      => esc_html__('Left', 'aiero'),
                    'right'     => esc_html__('Right', 'aiero'),
                    'none'      => esc_html__('None', 'aiero')
                )
            )
        ));

        if ( class_exists('WooCommerce')) {
            // -------------------------------------------- //
            // --- WooCommerce Catalog Sidebar Position --- //
            // -------------------------------------------- //
            $wp_setting_name = 'catalog_sidebar_position';
            $wp_customize->add_setting(
                $wp_setting_name,
                array(
                    'default'           => $aiero_customizer_default_values[$wp_setting_name],
                    'sanitize_callback'	=> 'aiero_sanitize_choice'
                )
            );
            $wp_customize->add_control(new Aiero_Customize_Control(
                $wp_customize,
                $wp_setting_name,
                array(
                    'label'     => esc_html__('Catalog Sidebar Position', 'aiero'),
                    'section'   => 'aiero_sidebar_settings',
                    'type'      => 'select',
                    'settings'  => $wp_setting_name,
                    'choices'   => array(
                        'left'      => esc_html__('Left', 'aiero'),
                        'right'     => esc_html__('Right', 'aiero'),
                        'none'      => esc_html__('None', 'aiero')
                    )
                )
            ));
        }

        // ---------------------------------------- //
        // ---------- Side Panel Sidebar ---------- //
        // ---------------------------------------- //
        $wp_customize->add_section('aiero_side_panel_settings', array(
                'title'     => esc_html__('Side Panel Settings', 'aiero'),
                'priority'  => 195
            )
        );

        // ------------------------------- //
        // --- Side Panel Logo Status --- //
        // ------------------------------ //
        $wp_setting_name = 'sidebar_logo_status';
        $wp_customize->add_setting(
            $wp_setting_name,
            array(
                'default'           => $aiero_customizer_default_values[$wp_setting_name],
                'sanitize_callback' => 'aiero_sanitize_choice'
            )
        );
        $wp_customize->add_control(new Aiero_Customize_Control(
            $wp_customize,
            $wp_setting_name,
            array(
                'label'     => esc_html__('Show Logo', 'aiero'),
                'section'   => 'aiero_side_panel_settings',
                'type'      => 'select',
                'settings'  => $wp_setting_name,
                'choices'   => array(
                    'on'        => esc_html__('Yes', 'aiero'),
                    'off'       => esc_html__('No', 'aiero')
                )
            )
        ));

        // ------------------------ //
        // --- Side Panel Logo --- //
        // ----------------------- //
        $wp_setting_name = 'sidebar_logo_image';
        $wp_customize->add_setting(
            $wp_setting_name,
            array(
                'default'           => $aiero_customizer_default_values[$wp_setting_name],
                'sanitize_callback' => 'esc_url_raw'
            )
        );
        $wp_customize->add_control(new Aiero_Image_Custom_Control(
            $wp_customize,
            $wp_setting_name,
            array(
                'label'         => esc_html__('Logo Image', 'aiero'),
                'section'       => 'aiero_side_panel_settings',
                'settings'      => $wp_setting_name,
                'dependency'    => [
                    [
                        'control'   => 'sidebar_logo_status',
                        'operator'  => '==',
                        'value'     => 'on'
                    ]
                ]
            )
        ));

        // ------------------- //
        // --- Logo Retina --- //
        // ------------------- //
        $wp_setting_name = 'sidebar_logo_retina';
        $wp_customize->add_setting(
            $wp_setting_name,
            array(
                'default'           => $aiero_customizer_default_values[$wp_setting_name],
                'sanitize_callback' => 'aiero_sanitize_checkbox'
            )
        );
        $wp_customize->add_control(new Aiero_Customize_Control(
            $wp_customize,
            $wp_setting_name,
            array(
                'label'         => esc_html__('Logo Retina', 'aiero'),
                'section'       => 'aiero_side_panel_settings',
                'type'          => 'checkbox',
                'settings'      => $wp_setting_name,
                'dependency'    => [
                    [
                        'control'   => 'sidebar_logo_status',
                        'operator'  => '==',
                        'value'     => 'on'
                    ]
                ]
            )
        ));
        
        // ------------------------------- //
        // --- Side Panel Image Status --- //
        // ------------------------------ //
        $wp_setting_name = 'side_panel_bg_image_status';
        $wp_customize->add_setting(
            $wp_setting_name,
            array(
                'default'           => $aiero_customizer_default_values[$wp_setting_name],
                'sanitize_callback' => 'aiero_sanitize_choice'
            )
        );
        $wp_customize->add_control(new Aiero_Customize_Control(
            $wp_customize,
            $wp_setting_name,
            array(
                'label'     => esc_html__('Show Side Panel Background Image', 'aiero'),
                'section'   => 'aiero_side_panel_settings',
                'type'      => 'select',
                'settings'  => $wp_setting_name,
                'choices'   => array(
                    'on'        => esc_html__('Yes', 'aiero'),
                    'off'       => esc_html__('No', 'aiero')
                )
            )
        ));

        // ------------------------ //
        // --- Side Panel Background Image --- //
        // ----------------------- //
        $wp_setting_name = 'side_panel_bg_image';
        $wp_customize->add_setting(
            $wp_setting_name,
            array(
                'default'           => $aiero_customizer_default_values[$wp_setting_name],
                'sanitize_callback' => 'esc_url_raw'
            )
        );
        $wp_customize->add_control(new Aiero_Image_Custom_Control(
            $wp_customize,
            $wp_setting_name,
            array(
                'label'         => esc_html__('Side Panel Background Image', 'aiero'),
                'section'       => 'aiero_side_panel_settings',
                'settings'      => $wp_setting_name,
                'dependency'    => [
                    [
                        'control'   => 'side_panel_bg_image_status',
                        'operator'  => '==',
                        'value'     => 'on'
                    ]
                ]
            )
        ));

        // ------------------------------- //
        // --- Side Panel Close Image Status --- //
        // ------------------------------ //
        $wp_setting_name = 'side_panel_close_bg_image_status';
        $wp_customize->add_setting(
            $wp_setting_name,
            array(
                'default'           => $aiero_customizer_default_values[$wp_setting_name],
                'sanitize_callback' => 'aiero_sanitize_choice'
            )
        );
        $wp_customize->add_control(new Aiero_Customize_Control(
            $wp_customize,
            $wp_setting_name,
            array(
                'label'     => esc_html__('Show Side Panel Close Background Image', 'aiero'),
                'section'   => 'aiero_side_panel_settings',
                'type'      => 'select',
                'settings'  => $wp_setting_name,
                'choices'   => array(
                    'on'        => esc_html__('Yes', 'aiero'),
                    'off'       => esc_html__('No', 'aiero')
                )
            )
        ));

        // ------------------------ //
        // --- Side Panel Background Image --- //
        // ----------------------- //
        $wp_setting_name = 'side_panel_close_bg_image';
        $wp_customize->add_setting(
            $wp_setting_name,
            array(
                'default'           => $aiero_customizer_default_values[$wp_setting_name],
                'sanitize_callback' => 'esc_url_raw'
            )
        );
        $wp_customize->add_control(new Aiero_Image_Custom_Control(
            $wp_customize,
            $wp_setting_name,
            array(
                'label'         => esc_html__('Side Panel Close Background Image', 'aiero'),
                'section'       => 'aiero_side_panel_settings',
                'settings'      => $wp_setting_name,
                'dependency'    => [
                    [
                        'control'   => 'side_panel_close_bg_image_status',
                        'operator'  => '==',
                        'value'     => 'on'
                    ]
                ]
            )
        ));

        // ------------------------------ //
        // --- Side Panel Socials Status --- //
        // ------------------------------ //
        $wp_setting_name = 'side_panel_socials_status';
        $wp_customize->add_setting(
            $wp_setting_name,
            array(
                'default'           => $aiero_customizer_default_values[$wp_setting_name],
                'sanitize_callback' => 'aiero_sanitize_choice'
            )
        );
        $wp_customize->add_control(new Aiero_Customize_Control(
            $wp_customize,
            $wp_setting_name,
            array(
                'label'     => esc_html__('Show Social Buttons', 'aiero'),
                'section'   => 'aiero_side_panel_settings',
                'type'      => 'select',
                'settings'  => $wp_setting_name,
                'choices'   => array(
                    'on'        => esc_html__('Yes', 'aiero'),
                    'off'       => esc_html__('No', 'aiero')
                )
            )
        ));

        // --------------------------------- //
        // ---------- Single Post ---------- //
        // --------------------------------- //
        $wp_customize->add_section('aiero_single_post_settings',
            array(
                'title'     => esc_html__('Single Post', 'aiero'),
                'priority'  => 200
            )
        );

        // ------------------------------ //
        // --- Single Post Page Title --- //
        // ------------------------------ //
        $wp_setting_name = 'post_page_title';
        $wp_customize->add_setting(
            $wp_setting_name,
            array(
                'default'           => stripslashes($aiero_customizer_default_values[$wp_setting_name]),
                'sanitize_callback'	=> 'sanitize_text_field'
            )
        );
        $wp_customize->add_control(new Aiero_Customize_Control(
            $wp_customize,
            $wp_setting_name,
            array(
                'label'         => esc_html__('Single Post Page Title', 'aiero'),
                'section'       => 'aiero_single_post_settings',
                'type'          => 'text',
                'settings'      => $wp_setting_name,
                'description'   => esc_html__('Use variable \'%s\' for display Post name', 'aiero')
            )
        ));

        // ------------------------------- //
        // --- Post Media Image Status --- //
        // ------------------------------- //
        $wp_setting_name = 'post_media_image_status';
        $wp_customize->add_setting(
            $wp_setting_name,
            array(
                'default'           => $aiero_customizer_default_values[$wp_setting_name],
                'sanitize_callback'	=> 'aiero_sanitize_choice'
            )
        );
        $wp_customize->add_control(new Aiero_Customize_Control(
            $wp_customize,
            $wp_setting_name,
            array(
                'label'     => esc_html__('Show Media Image', 'aiero'),
                'section'   => 'aiero_single_post_settings',
                'type'      => 'select',
                'settings'  => $wp_setting_name,
                'choices'   => array(
                    'on'        => esc_html__('Yes', 'aiero'),
                    'off'       => esc_html__('No', 'aiero')
                )
            )
        ));

        // ---------------------------- //
        // --- Post Category Status --- //
        // ---------------------------- //
        $wp_setting_name = 'post_category_status';
        $wp_customize->add_setting(
            $wp_setting_name,
            array(
                'default'           => $aiero_customizer_default_values[$wp_setting_name],
                'sanitize_callback'	=> 'aiero_sanitize_choice'
            )
        );
        $wp_customize->add_control(new Aiero_Customize_Control(
            $wp_customize,
            $wp_setting_name,
            array(
                'label'     => esc_html__('Show Post Categories', 'aiero'),
                'section'   => 'aiero_single_post_settings',
                'type'      => 'select',
                'settings'  => $wp_setting_name,
                'choices'   => array(
                    'on'        => esc_html__('Yes', 'aiero'),
                    'off'       => esc_html__('No', 'aiero')
                )
            )
        ));

        // ------------------------ //
        // --- Post Date Status --- //
        // ------------------------ //
        $wp_setting_name = 'post_date_status';
        $wp_customize->add_setting(
            $wp_setting_name,
            array(
                'default'           => $aiero_customizer_default_values[$wp_setting_name],
                'sanitize_callback'	=> 'aiero_sanitize_choice'
            )
        );
        $wp_customize->add_control(new Aiero_Customize_Control(
            $wp_customize,
            $wp_setting_name,
            array(
                'label'     => esc_html__('Show Post Date', 'aiero'),
                'section'   => 'aiero_single_post_settings',
                'type'      => 'select',
                'settings'  => $wp_setting_name,
                'choices'   => array(
                    'on'        => esc_html__('Yes', 'aiero'),
                    'off'       => esc_html__('No', 'aiero')
                )
            )
        ));

        // -------------------------- //
        // --- Post Author Status --- //
        // -------------------------- //
        $wp_setting_name = 'post_author_status';
        $wp_customize->add_setting(
            $wp_setting_name,
            array(
                'default'           => $aiero_customizer_default_values[$wp_setting_name],
                'sanitize_callback'	=> 'aiero_sanitize_choice'
            )
        );
        $wp_customize->add_control(new Aiero_Customize_Control(
            $wp_customize,
            $wp_setting_name,
            array(
                'label'     => esc_html__('Show Post Author', 'aiero'),
                'section'   => 'aiero_single_post_settings',
                'type'      => 'select',
                'settings'  => $wp_setting_name,
                'choices'   => array(
                    'on'        => esc_html__('Yes', 'aiero'),
                    'off'       => esc_html__('No', 'aiero')
                )
            )
        ));

        // -------------------------- //
        // --- Post Author Status --- //
        // -------------------------- //
        $wp_setting_name = 'post_comment_counter_status';
        $wp_customize->add_setting(
            $wp_setting_name,
            array(
                'default'           => $aiero_customizer_default_values[$wp_setting_name],
                'sanitize_callback' => 'aiero_sanitize_choice'
            )
        );
        $wp_customize->add_control(new Aiero_Customize_Control(
            $wp_customize,
            $wp_setting_name,
            array(
                'label'     => esc_html__('Show Number of Post Comments', 'aiero'),
                'section'   => 'aiero_single_post_settings',
                'type'      => 'select',
                'settings'  => $wp_setting_name,
                'choices'   => array(
                    'on'        => esc_html__('Yes', 'aiero'),
                    'off'       => esc_html__('No', 'aiero')
                )
            )
        ));

        // ------------------------- //
        // --- Post Title Status --- //
        // ------------------------- //
        $wp_setting_name = 'post_title_status';
        $wp_customize->add_setting(
            $wp_setting_name,
            array(
                'default'           => $aiero_customizer_default_values[$wp_setting_name],
                'sanitize_callback'	=> 'aiero_sanitize_choice'
            )
        );
        $wp_customize->add_control(new Aiero_Customize_Control(
            $wp_customize,
            $wp_setting_name,
            array(
                'label'     => esc_html__('Show Post Title', 'aiero'),
                'section'   => 'aiero_single_post_settings',
                'type'      => 'select',
                'settings'  => $wp_setting_name,
                'choices'   => array(
                    'on'        => esc_html__('Yes', 'aiero'),
                    'off'       => esc_html__('No', 'aiero')
                )
            )
        ));

        // ------------------------ //
        // --- Post Tags Status --- //
        // ------------------------ //
        $wp_setting_name = 'post_tags_status';
        $wp_customize->add_setting(
            $wp_setting_name,
            array(
                'default'           => $aiero_customizer_default_values[$wp_setting_name],
                'sanitize_callback'	=> 'aiero_sanitize_choice'
            )
        );
        $wp_customize->add_control(new Aiero_Customize_Control(
            $wp_customize,
            $wp_setting_name,
            array(
                'label'     => esc_html__('Show Post Tags', 'aiero'),
                'section'   => 'aiero_single_post_settings',
                'type'      => 'select',
                'settings'  => $wp_setting_name,
                'choices'   => array(
                    'on'        => esc_html__('Yes', 'aiero'),
                    'off'       => esc_html__('No', 'aiero')
                )
            )
        ));

        // --------------------------- //
        // --- Post Socials Status --- //
        // --------------------------- //
        $wp_setting_name = 'post_socials_status';
        $wp_customize->add_setting(
            $wp_setting_name,
            array(
                'default'           => $aiero_customizer_default_values[$wp_setting_name],
                'sanitize_callback'	=> 'aiero_sanitize_choice'
            )
        );
        $wp_customize->add_control(new Aiero_Customize_Control(
            $wp_customize,
            $wp_setting_name,
            array(
                'label'     => esc_html__('Show Post Social Buttons', 'aiero'),
                'section'   => 'aiero_single_post_settings',
                'type'      => 'select',
                'settings'  => $wp_setting_name,
                'choices'   => array(
                    'on'        => esc_html__('Yes', 'aiero'),
                    'off'       => esc_html__('No', 'aiero')
                )
            )
        ));

        // --------------------------- //
        // --- Recent Posts Status --- //
        // --------------------------- //
        $wp_setting_name = 'recent_posts_status';
        $wp_customize->add_setting(
            $wp_setting_name,
            array(
                'default'           => $aiero_customizer_default_values[$wp_setting_name],
                'sanitize_callback'	=> 'aiero_sanitize_choice'
            )
        );
        $wp_customize->add_control(new Aiero_Customize_Control(
            $wp_customize,
            $wp_setting_name,
            array(
                'label'     => esc_html__('Show Recent Posts', 'aiero'),
                'section'   => 'aiero_single_post_settings',
                'type'      => 'select',
                'settings'  => $wp_setting_name,
                'choices'   => array(
                    'on'        => esc_html__('Yes', 'aiero'),
                    'off'       => esc_html__('No', 'aiero')
                )
            )
        ));

        // ------------------------------ //
        // --- Recent Posts Customize --- //
        // ------------------------------ //
        $wp_setting_name = 'recent_posts_customize';
        $wp_customize->add_setting(
            $wp_setting_name,
            array(
                'default'           => $aiero_customizer_default_values[$wp_setting_name],
                'sanitize_callback'	=> 'aiero_sanitize_choice'
            )
        );
        $wp_customize->add_control(new Aiero_Customize_Control(
            $wp_customize,
            $wp_setting_name,
            array(
                'label'     => esc_html__('Customize', 'aiero'),
                'section'   => 'aiero_single_post_settings',
                'type'      => 'select',
                'settings'  => $wp_setting_name,
                'choices'   => array(
                    'on'        => esc_html__('Yes', 'aiero'),
                    'off'       => esc_html__('No', 'aiero')
                ),
                'separator' => 'before'
            )
        ));

        // ---------------------------- //
        // --- Recent Posts Heading --- //
        // ---------------------------- //
        $wp_setting_name = 'recent_posts_section_heading';
        $wp_customize->add_setting(
            $wp_setting_name,
            array(
                'default'           => $aiero_customizer_default_values[$wp_setting_name],
                'sanitize_callback'	=> 'sanitize_text_field'
            )
        );
        $wp_customize->add_control(new Aiero_Customize_Control(
            $wp_customize,
            $wp_setting_name,
            array(
                'label'         => esc_html__('Recent Posts Section Title', 'aiero'),
                'section'       => 'aiero_single_post_settings',
                'type'          => 'text',
                'settings'      => $wp_setting_name,
                'dependency'    => [
                    [
                        'control'   => 'recent_posts_customize',
                        'operator'  => '==',
                        'value'     => 'on'
                    ]
                ]
            )
        ));

        // ----------------------- //
        // --- Number of Posts --- //
        // ----------------------- //
        $wp_setting_name = 'recent_posts_number';
        $wp_customize->add_setting(
            $wp_setting_name,
            array(
                'default'           => $aiero_customizer_default_values[$wp_setting_name],
                'sanitize_callback'	=> 'aiero_sanitize_choice'
            )
        );
        $wp_customize->add_control(new Aiero_Customize_Control(
            $wp_customize,
            $wp_setting_name,
            array(
                'label'         => esc_html__('Number of Posts', 'aiero'),
                'section'       => 'aiero_single_post_settings',
                'type'          => 'select',
                'settings'      => $wp_setting_name,
                'choices'       => array(
                    '2'         => esc_html__('2 Items', 'aiero'),
                    '3'         => esc_html__('3 Items', 'aiero'),
                    '4'         => esc_html__('4 Items', 'aiero')
                ),
                'dependency'    => [
                    [
                        'control'   => 'recent_posts_customize',
                        'operator'  => '==',
                        'value'     => 'on'
                    ]
                ]
            )
        ));

        // ---------------- //
        // --- Order By --- //
        // ---------------- //
        $wp_setting_name = 'recent_posts_order_by';
        $wp_customize->add_setting(
            $wp_setting_name,
            array(
                'default'           => $aiero_customizer_default_values[$wp_setting_name],
                'sanitize_callback'	=> 'aiero_sanitize_choice'
            )
        );
        $wp_customize->add_control(new Aiero_Customize_Control(
            $wp_customize,
            $wp_setting_name,
            array(
                'label'         => esc_html__('Order By', 'aiero'),
                'section'       => 'aiero_single_post_settings',
                'type'          => 'select',
                'settings'      => $wp_setting_name,
                'choices'       => array(
                    'random'        => esc_html__('Random', 'aiero'),
                    'date'          => esc_html__('Date', 'aiero'),
                    'name'          => esc_html__('Name', 'aiero')
                ),
                'dependency'    => [
                    [
                        'control'   => 'recent_posts_customize',
                        'operator'  => '==',
                        'value'     => 'on'
                    ]
                ]
            )
        ));

        // ------------------ //
        // --- Sort Order --- //
        // ------------------ //
        $wp_setting_name = 'recent_posts_order';
        $wp_customize->add_setting(
            $wp_setting_name,
            array(
                'default'           => $aiero_customizer_default_values[$wp_setting_name],
                'sanitize_callback'	=> 'aiero_sanitize_choice'
            )
        );
        $wp_customize->add_control(new Aiero_Customize_Control(
            $wp_customize,
            $wp_setting_name,
            array(
                'label'         => esc_html__('Sort Order', 'aiero'),
                'section'       => 'aiero_single_post_settings',
                'type'          => 'select',
                'settings'      => $wp_setting_name,
                'choices'       => array(
                    'desc'  => esc_html__('Descending', 'aiero'),
                    'asc'   => esc_html__('Ascending', 'aiero')
                ),
                'dependency'    => [
                    [
                        'control'   => 'recent_posts_customize',
                        'operator'  => '==',
                        'value'     => 'on'
                    ]
                ]
            )
        ));

        // ------------------------------ //
        // --- Show Recent Post Image --- //
        // ------------------------------ //
        $wp_setting_name = 'recent_posts_image';
        $wp_customize->add_setting(
            $wp_setting_name,
            array(
                'default'           => $aiero_customizer_default_values[$wp_setting_name],
                'sanitize_callback'	=> 'aiero_sanitize_choice'
            )
        );
        $wp_customize->add_control(new Aiero_Customize_Control(
            $wp_customize,
            $wp_setting_name,
            array(
                'label'         => esc_html__('Recent Posts Featured Image', 'aiero'),
                'section'       => 'aiero_single_post_settings',
                'type'          => 'select',
                'settings'      => $wp_setting_name,
                'choices'       => array(
                    'on'    => esc_html__('Show', 'aiero'),
                    'off'   => esc_html__('Hide', 'aiero')
                ),
                'dependency'    => [
                    [
                        'control'   => 'recent_posts_customize',
                        'operator'  => '==',
                        'value'     => 'on'
                    ]
                ]
            )
        ));

        // --------------------------------- //
        // --- Show Recent Post Category --- //
        // --------------------------------- //
        $wp_setting_name = 'recent_posts_category';
        $wp_customize->add_setting(
            $wp_setting_name,
            array(
                'default'           => $aiero_customizer_default_values[$wp_setting_name],
                'sanitize_callback'	=> 'aiero_sanitize_choice'
            )
        );
        $wp_customize->add_control(new Aiero_Customize_Control(
            $wp_customize,
            $wp_setting_name,
            array(
                'label'         => esc_html__('Recent Posts Categories', 'aiero'),
                'section'       => 'aiero_single_post_settings',
                'type'          => 'select',
                'settings'      => $wp_setting_name,
                'choices'       => array(
                    'on'    => esc_html__('Show', 'aiero'),
                    'off'   => esc_html__('Hide', 'aiero')
                ),
                'dependency'    => [
                    [
                        'control'   => 'recent_posts_customize',
                        'operator'  => '==',
                        'value'     => 'on'
                    ]
                ]
            )
        ));

        // ----------------------------- //
        // --- Show Recent Post Date --- //
        // ----------------------------- //
        $wp_setting_name = 'recent_posts_date';
        $wp_customize->add_setting(
            $wp_setting_name,
            array(
                'default'           => $aiero_customizer_default_values[$wp_setting_name],
                'sanitize_callback'	=> 'aiero_sanitize_choice'
            )
        );
        $wp_customize->add_control(new Aiero_Customize_Control(
            $wp_customize,
            $wp_setting_name,
            array(
                'label'         => esc_html__('Recent Posts Date', 'aiero'),
                'section'       => 'aiero_single_post_settings',
                'type'          => 'select',
                'settings'      => $wp_setting_name,
                'choices'       => array(
                    'on'    => esc_html__('Show', 'aiero'),
                    'off'   => esc_html__('Hide', 'aiero')
                ),
                'dependency'    => [
                    [
                        'control'   => 'recent_posts_customize',
                        'operator'  => '==',
                        'value'     => 'on'
                    ]
                ]
            )
        ));

        // ------------------------------- //
        // --- Show Recent Post Author --- //
        // ------------------------------- //
        $wp_setting_name = 'recent_posts_author';
        $wp_customize->add_setting(
            $wp_setting_name,
            array(
                'default'           => $aiero_customizer_default_values[$wp_setting_name],
                'sanitize_callback'	=> 'aiero_sanitize_choice'
            )
        );
        $wp_customize->add_control(new Aiero_Customize_Control(
            $wp_customize,
            $wp_setting_name,
            array(
                'label'         => esc_html__('Recent Posts Author', 'aiero'),
                'section'       => 'aiero_single_post_settings',
                'type'          => 'select',
                'settings'      => $wp_setting_name,
                'choices'       => array(
                    'on'    => esc_html__('Show', 'aiero'),
                    'off'   => esc_html__('Hide', 'aiero')
                ),
                'dependency'    => [
                    [
                        'control'   => 'recent_posts_customize',
                        'operator'  => '==',
                        'value'     => 'on'
                    ]
                ]
            )
        ));

        // ------------------------------ //
        // --- Show Recent Post Title --- //
        // ------------------------------ //
        $wp_setting_name = 'recent_posts_title';
        $wp_customize->add_setting(
            $wp_setting_name,
            array(
                'default'           => $aiero_customizer_default_values[$wp_setting_name],
                'sanitize_callback'	=> 'aiero_sanitize_choice'
            )
        );
        $wp_customize->add_control(new Aiero_Customize_Control(
            $wp_customize,
            $wp_setting_name,
            array(
                'label'         => esc_html__('Recent Posts Title', 'aiero'),
                'section'       => 'aiero_single_post_settings',
                'type'          => 'select',
                'settings'      => $wp_setting_name,
                'choices'       => array(
                    'on'    => esc_html__('Show', 'aiero'),
                    'off'   => esc_html__('Hide', 'aiero')
                ),
                'dependency'    => [
                    [
                        'control'   => 'recent_posts_customize',
                        'operator'  => '==',
                        'value'     => 'on'
                    ]
                ]
            )
        ));

        // -------------------------------- //
        // --- Show Recent Post Excerpt --- //
        // -------------------------------- //
        $wp_setting_name = 'recent_posts_excerpt';
        $wp_customize->add_setting(
            $wp_setting_name,
            array(
                'default'           => $aiero_customizer_default_values[$wp_setting_name],
                'sanitize_callback'	=> 'aiero_sanitize_choice'
            )
        );
        $wp_customize->add_control(new Aiero_Customize_Control(
            $wp_customize,
            $wp_setting_name,
            array(
                'label'         => esc_html__('Recent Posts Excerpt', 'aiero'),
                'section'       => 'aiero_single_post_settings',
                'type'          => 'select',
                'settings'      => $wp_setting_name,
                'choices'       => array(
                    'on'    => esc_html__('Show', 'aiero'),
                    'off'   => esc_html__('Hide', 'aiero')
                ),
                'dependency'    => [
                    [
                        'control'   => 'recent_posts_customize',
                        'operator'  => '==',
                        'value'     => 'on'
                    ]
                ]
            )
        ));

        // --------------------------------------- //
        // --- Show Recent Post Excerpt Length --- //
        // --------------------------------------- //
        $wp_setting_name = 'recent_posts_excerpt_length';
        $wp_customize->add_setting(
            $wp_setting_name,
            array(
                'default'           => $aiero_customizer_default_values[$wp_setting_name],
                'sanitize_callback'	=> 'absint'
            )
        );
        $wp_customize->add_control(new Aiero_Customize_Control(
            $wp_customize,
            $wp_setting_name,
            array(
                'label'         => esc_html__('Recent Posts Excerpt Length', 'aiero'),
                'section'       => 'aiero_single_post_settings',
                'type'          => 'number',
                'settings'      => $wp_setting_name,
                'dependency'    => [
                    [
                        'control'   => 'recent_posts_customize',
                        'operator'  => '==',
                        'value'     => 'on'
                    ]
                ],
                'input_attrs' => [
                    'min'   => 0,
                    'step'  => 1
                ]
            )
        ));

        // ----------------------------- //
        // --- Show Recent Post Tags --- //
        // ----------------------------- //
        $wp_setting_name = 'recent_posts_tags';
        $wp_customize->add_setting(
            $wp_setting_name,
            array(
                'default'           => $aiero_customizer_default_values[$wp_setting_name],
                'sanitize_callback'	=> 'aiero_sanitize_choice'
            )
        );
        $wp_customize->add_control(new Aiero_Customize_Control(
            $wp_customize,
            $wp_setting_name,
            array(
                'label'         => esc_html__('Recent Posts Tags', 'aiero'),
                'section'       => 'aiero_single_post_settings',
                'type'          => 'select',
                'settings'      => $wp_setting_name,
                'choices'       => array(
                    'on'    => esc_html__('Show', 'aiero'),
                    'off'   => esc_html__('Hide', 'aiero')
                ),
                'dependency'    => [
                    [
                        'control'   => 'recent_posts_customize',
                        'operator'  => '==',
                        'value'     => 'on'
                    ]
                ]
            )
        ));

        // ----------------------------------------- //
        // --- Show Recent Post Read More Button --- //
        // ----------------------------------------- //
        $wp_setting_name = 'recent_posts_more';
        $wp_customize->add_setting(
            $wp_setting_name,
            array(
                'default'           => $aiero_customizer_default_values[$wp_setting_name],
                'sanitize_callback'	=> 'aiero_sanitize_choice'
            )
        );
        $wp_customize->add_control(new Aiero_Customize_Control(
            $wp_customize,
            $wp_setting_name,
            array(
                'label'         => esc_html__('Recent Posts \'Read More\' Button', 'aiero'),
                'section'       => 'aiero_single_post_settings',
                'type'          => 'select',
                'settings'      => $wp_setting_name,
                'choices'       => array(
                    'on'    => esc_html__('Show', 'aiero'),
                    'off'   => esc_html__('Hide', 'aiero')
                ),
                'dependency'    => [
                    [
                        'control'   => 'recent_posts_customize',
                        'operator'  => '==',
                        'value'     => 'on'
                    ]
                ]
            )
        ));

        // ------------------------------------ //
        // ---------- Projects Panel ---------- //
        // ------------------------------------ //
        $wp_customize->add_panel('aiero_projects_settings',
            array(
                'title'     => esc_html__('Projects', 'aiero'),
                'priority'  => 206
            )
        );

        // ---########################--- //
        // ---### Projects Archive ###--- //
        // ---########################--- //
        $wp_customize->add_section('aiero_project_archive',
            array(
                'title' => esc_html__('Archive Settings', 'aiero'),
                'panel' => 'aiero_projects_settings'
            )
        );

        // ---------------------------------- //
        // --- Project Archive Page Title --- //
        // ---------------------------------- //
        $wp_setting_name = 'project_archive_page_title';
        $wp_customize->add_setting(
            $wp_setting_name,
            array(
                'default'           => stripslashes($aiero_customizer_default_values[$wp_setting_name]),
                'sanitize_callback'	=> 'sanitize_text_field'
            )
        );
        $wp_customize->add_control(new Aiero_Customize_Control(
            $wp_customize,
            $wp_setting_name,
            array(
                'label'         => esc_html__('Project Archive Page Title', 'aiero'),
                'section'       => 'aiero_project_archive',
                'type'          => 'text',
                'settings'      => $wp_setting_name,
                'description'   => esc_html__('Use variable \'%s\' for display Post type name', 'aiero')
            )
        ));

        // -------------------------------------- //
        // --- Project Archive Columns Number --- //
        // -------------------------------------- //
        $wp_setting_name = 'project_archive_columns_number';
        $wp_customize->add_setting(
            $wp_setting_name,
            array(
                'default'           => $aiero_customizer_default_values[$wp_setting_name],
                'sanitize_callback'	=> 'absint'
            )
        );
        $wp_customize->add_control(new Aiero_Customize_Control(
            $wp_customize,
            $wp_setting_name,
            array(
                'label'         => esc_html__('Project Archive Columns Number', 'aiero'),
                'section'       => 'aiero_project_archive',
                'type'          => 'number',
                'settings'      => $wp_setting_name,
                'input_attrs' => [
                    'min'   => 1,
                    'max'   => 4,
                    'step'  => 1
                ]
            )
        ));

        // -------------------------------------- //
        // --- Project Archive Posts per Page --- //
        // -------------------------------------- //
        $wp_setting_name = 'project_archive_posts_per_page';
        $wp_customize->add_setting(
            $wp_setting_name,
            array(
                'default'           => $aiero_customizer_default_values[$wp_setting_name],
                'sanitize_callback'	=> 'absint'
            )
        );
        $wp_customize->add_control(new Aiero_Customize_Control(
            $wp_customize,
            $wp_setting_name,
            array(
                'label'         => esc_html__('Project Posts Per Page', 'aiero'),
                'section'       => 'aiero_project_archive',
                'type'          => 'number',
                'settings'      => $wp_setting_name,
                'input_attrs' => [
                    'min'   => 1,
                    'step'  => 1
                ]
            )
        ));

        // ---######################--- //
        // ---### Project Single ###--- //
        // ---######################--- //
        $wp_customize->add_section('aiero_project_single',
            array(
                'title' => esc_html__('Single Page Settings', 'aiero'),
                'panel' => 'aiero_projects_settings'
            )
        );

        // --------------------------------- //
        // --- Project Single Page Title --- //
        // --------------------------------- //
        $wp_setting_name = 'project_single_page_title';
        $wp_customize->add_setting(
            $wp_setting_name,
            array(
                'default'           => stripslashes($aiero_customizer_default_values[$wp_setting_name]),
                'sanitize_callback'	=> 'sanitize_text_field'
            )
        );
        $wp_customize->add_control(new Aiero_Customize_Control(
            $wp_customize,
            $wp_setting_name,
            array(
                'label'         => esc_html__('Project Single Page Title', 'aiero'),
                'section'       => 'aiero_project_single',
                'type'          => 'text',
                'settings'      => $wp_setting_name,
                'description'   => esc_html__('Use variable \'%s\' for display Post name', 'aiero')
            )
        ));

        // ------------------------- //
        // --- Project Title Status --- //
        // ------------------------- //
        $wp_setting_name = 'project_title_status';
        $wp_customize->add_setting(
            $wp_setting_name,
            array(
                'default'           => $aiero_customizer_default_values[$wp_setting_name],
                'sanitize_callback' => 'aiero_sanitize_choice'
            )
        );
        $wp_customize->add_control(new Aiero_Customize_Control(
            $wp_customize,
            $wp_setting_name,
            array(
                'label'     => esc_html__('Show Project Title', 'aiero'),
                'section'   => 'aiero_project_single',
                'type'      => 'select',
                'settings'  => $wp_setting_name,
                'choices'   => array(
                    'on'        => esc_html__('Yes', 'aiero'),
                    'off'       => esc_html__('No', 'aiero')
                )
            )
        ));

        // ------------------------------------------------------ //
        // --- Project Single Navigation Max Word Count --------- //
        // ------------------------------------------------------ //
        $wp_setting_name = 'project_single_navigation_max_length';
        $wp_customize->add_setting(
            $wp_setting_name,
            array(
                'default'           => $aiero_customizer_default_values[$wp_setting_name],
                'sanitize_callback' => 'absint'
            )
        );
        $wp_customize->add_control(new Aiero_Customize_Control(
            $wp_customize,
            $wp_setting_name,
            array(
                'label'         => esc_html__('Project Navigation Max Words Count', 'aiero'),
                'section'       => 'aiero_project_single',
                'type'          => 'number',
                'settings'      => $wp_setting_name,
                'input_attrs' => [
                    'min'   => 1,
                    'max'   => 20,
                    'step'  => 1
                ]
            )
        ));

        // ---------------------------------------- //
        // ---------- Case Studies Panel ---------- //
        // ---------------------------------------- //
        $wp_customize->add_panel('aiero_case_studies_settings',
            array(
                'title'     => esc_html__('Case Studies', 'aiero'),
                'priority'  => 207
            )
        );

        // ---############################--- //
        // ---### Case Studies Archive ###--- //
        // ---############################--- //
        $wp_customize->add_section('aiero_case_studies_archive',
            array(
                'title' => esc_html__('Archive Settings', 'aiero'),
                'panel' => 'aiero_case_studies_settings'
            )
        );

        // --------------------------------------- //
        // --- Case Studies Archive Page Title --- //
        // --------------------------------------- //
        $wp_setting_name = 'case_studies_archive_page_title';
        $wp_customize->add_setting(
            $wp_setting_name,
            array(
                'default'           => stripslashes($aiero_customizer_default_values[$wp_setting_name]),
                'sanitize_callback' => 'sanitize_text_field'
            )
        );
        $wp_customize->add_control(new Aiero_Customize_Control(
            $wp_customize,
            $wp_setting_name,
            array(
                'label'         => esc_html__('Case Studies Archive Page Title', 'aiero'),
                'section'       => 'aiero_case_studies_archive',
                'type'          => 'text',
                'settings'      => $wp_setting_name,
                'description'   => esc_html__('Use variable \'%s\' for display Post type name', 'aiero')
            )
        ));

        // ------------------------------------------- //
        // --- Case Studies Archive Excerpt Length --- //
        // ------------------------------------------- //
        $wp_setting_name = 'case_studies_archive_excerpt_length';
        $wp_customize->add_setting(
            $wp_setting_name,
            array(
                'default'           => $aiero_customizer_default_values[$wp_setting_name],
                'sanitize_callback' => 'absint'
            )
        );
        $wp_customize->add_control(new Aiero_Customize_Control(
            $wp_customize,
            $wp_setting_name,
            array(
                'label'         => esc_html__('Case Studies Excerpt Length', 'aiero'),
                'section'       => 'aiero_case_studies_archive',
                'type'          => 'number',
                'settings'      => $wp_setting_name,
                'input_attrs' => [
                    'min'   => 0,
                    'step'  => 1
                ]
            )
        ));

        // ------------------------------------------- //
        // --- Case Studies Archive Columns Number --- //
        // ------------------------------------------- //
        $wp_setting_name = 'case_studies_archive_columns_number';
        $wp_customize->add_setting(
            $wp_setting_name,
            array(
                'default'           => $aiero_customizer_default_values[$wp_setting_name],
                'sanitize_callback' => 'absint'
            )
        );
        $wp_customize->add_control(new Aiero_Customize_Control(
            $wp_customize,
            $wp_setting_name,
            array(
                'label'         => esc_html__('Case Studies Columns Number', 'aiero'),
                'section'       => 'aiero_case_studies_archive',
                'type'          => 'number',
                'settings'      => $wp_setting_name,
                'input_attrs' => [
                    'min'   => 1,
                    'max'   => 4,
                    'step'  => 1
                ]
            )
        ));

        // ------------------------------------------- //
        // --- Case Studies Archive Posts per Page --- //
        // ------------------------------------------- //
        $wp_setting_name = 'case_studies_archive_posts_per_page';
        $wp_customize->add_setting(
            $wp_setting_name,
            array(
                'default'           => $aiero_customizer_default_values[$wp_setting_name],
                'sanitize_callback' => 'absint'
            )
        );
        $wp_customize->add_control(new Aiero_Customize_Control(
            $wp_customize,
            $wp_setting_name,
            array(
                'label'         => esc_html__('Case Studies Posts Per Page', 'aiero'),
                'section'       => 'aiero_case_studies_archive',
                'type'          => 'number',
                'settings'      => $wp_setting_name,
                'input_attrs' => [
                    'min'   => 1,
                    'step'  => 1
                ]
            )
        ));

        // ---###########################--- //
        // ---### Case Studies Single ###--- //
        // ---###########################--- //
        $wp_customize->add_section('aiero_case_studies_single',
            array(
                'title' => esc_html__('Single Page Settings', 'aiero'),
                'panel' => 'aiero_case_studies_settings'
            )
        );

        // ------------------------------------ //
        // --- Portfolio Single Page Title --- //
        // ------------------------------------ //
        $wp_setting_name = 'case_studies_single_page_title';
        $wp_customize->add_setting(
            $wp_setting_name,
            array(
                'default'           => stripslashes($aiero_customizer_default_values[$wp_setting_name]),
                'sanitize_callback' => 'sanitize_text_field'
            )
        );
        $wp_customize->add_control(new Aiero_Customize_Control(
            $wp_customize,
            $wp_setting_name,
            array(
                'label'         => esc_html__('Case Study Single Page Title', 'aiero'),
                'section'       => 'aiero_case_studies_single',
                'type'          => 'text',
                'settings'      => $wp_setting_name,
                'description'   => esc_html__('Use variable \'%s\' for display Post name', 'aiero')
            )
        ));


        // ---------------------------------------- //
        // ---------- Team Members Panel ---------- //
        // ---------------------------------------- //
        $wp_customize->add_panel('aiero_team_settings',
            array(
                'title'     => esc_html__('Team Members', 'aiero'),
                'priority'  => 208
            )
        );

        // ---############################--- //
        // ---### Team Members Archive ###--- //
        // ---############################--- //
        $wp_customize->add_section('aiero_team_archive',
            array(
                'title' => esc_html__('Archive Settings', 'aiero'),
                'panel' => 'aiero_team_settings'
            )
        );

        // --------------------------------------- //
        // --- Team Members Archive Page Title --- //
        // --------------------------------------- //
        $wp_setting_name = 'team_archive_page_title';
        $wp_customize->add_setting(
            $wp_setting_name,
            array(
                'default'           => stripslashes($aiero_customizer_default_values[$wp_setting_name]),
                'sanitize_callback'	=> 'sanitize_text_field'
            )
        );
        $wp_customize->add_control(new Aiero_Customize_Control(
            $wp_customize,
            $wp_setting_name,
            array(
                'label'         => esc_html__('Team Members Archive Page Title', 'aiero'),
                'section'       => 'aiero_team_archive',
                'type'          => 'text',
                'settings'      => $wp_setting_name,
                'description'   => esc_html__('Use variable \'%s\' for display Post type name', 'aiero')
            )
        ));

        // ------------------------------------------- //
        // --- Team Members Archive Columns Number --- //
        // ------------------------------------------- //
        $wp_setting_name = 'team_archive_columns_number';
        $wp_customize->add_setting(
            $wp_setting_name,
            array(
                'default'           => $aiero_customizer_default_values[$wp_setting_name],
                'sanitize_callback'	=> 'absint'
            )
        );
        $wp_customize->add_control(new Aiero_Customize_Control(
            $wp_customize,
            $wp_setting_name,
            array(
                'label'         => esc_html__('Team Members Archive Columns Number', 'aiero'),
                'section'       => 'aiero_team_archive',
                'type'          => 'number',
                'settings'      => $wp_setting_name,
                'input_attrs' => [
                    'min'   => 1,
                    'max'   => 4,
                    'step'  => 1
                ]
            )
        ));

        // ------------------------------------------- //
        // --- Team Members Archive Posts per Page --- //
        // ------------------------------------------- //
        $wp_setting_name = 'team_archive_posts_per_page';
        $wp_customize->add_setting(
            $wp_setting_name,
            array(
                'default'           => $aiero_customizer_default_values[$wp_setting_name],
                'sanitize_callback'	=> 'absint'
            )
        );
        $wp_customize->add_control(new Aiero_Customize_Control(
            $wp_customize,
            $wp_setting_name,
            array(
                'label'         => esc_html__('Team Members Posts Per Page', 'aiero'),
                'section'       => 'aiero_team_archive',
                'type'          => 'number',
                'settings'      => $wp_setting_name,
                'input_attrs' => [
                    'min'   => 1,
                    'step'  => 1
                ]
            )
        ));

        // ---##########################--- //
        // ---### Team Member Single ###--- //
        // ---##########################--- //
        $wp_customize->add_section('aiero_team_single',
            array(
                'title' => esc_html__('Single Page Settings', 'aiero'),
                'panel' => 'aiero_team_settings'
            )
        );

        // ------------------------------------- //
        // --- Team Member Single Page Title --- //
        // ------------------------------------- //
        $wp_setting_name = 'team_single_page_title';
        $wp_customize->add_setting(
            $wp_setting_name,
            array(
                'default'           => stripslashes($aiero_customizer_default_values[$wp_setting_name]),
                'sanitize_callback'	=> 'sanitize_text_field'
            )
        );
        $wp_customize->add_control(new Aiero_Customize_Control(
            $wp_customize,
            $wp_setting_name,
            array(
                'label'         => esc_html__('Team Member Single Page Title', 'aiero'),
                'section'       => 'aiero_team_single',
                'type'          => 'text',
                'settings'      => $wp_setting_name,
                'description'   => esc_html__('Use variable \'%s\' for display Post name', 'aiero')
            )
        ));


        // ------------------------------------ //
        // ---------- Services Panel ---------- //
        // ------------------------------------ //
        $wp_customize->add_panel('aiero_services_settings',
            array(
                'title'     => esc_html__('Services', 'aiero'),
                'priority'  => 210
            )
        );

        // ---########################--- //
        // ---### Services Archive ###--- //
        // ---########################--- //
        $wp_customize->add_section('aiero_service_archive',
            array(
                'title' => esc_html__('Archive Settings', 'aiero'),
                'panel' => 'aiero_services_settings'
            )
        );

        // ----------------------------------- //
        // --- Services Archive Page Title --- //
        // ----------------------------------- //
        $wp_setting_name = 'service_archive_page_title';
        $wp_customize->add_setting(
            $wp_setting_name,
            array(
                'default'           => stripslashes($aiero_customizer_default_values[$wp_setting_name]),
                'sanitize_callback'	=> 'sanitize_text_field'
            )
        );
        $wp_customize->add_control(new Aiero_Customize_Control(
            $wp_customize,
            $wp_setting_name,
            array(
                'label'         => esc_html__('Services Archive Page Title', 'aiero'),
                'section'       => 'aiero_service_archive',
                'type'          => 'text',
                'settings'      => $wp_setting_name,
                'description'   => esc_html__('Use variable \'%s\' for display Post type name', 'aiero')
            )
        ));

        // --------------------------------------- //
        // --- Services Archive Excerpt Length --- //
        // --------------------------------------- //
        $wp_setting_name = 'service_archive_excerpt_length';
        $wp_customize->add_setting(
            $wp_setting_name,
            array(
                'default'           => $aiero_customizer_default_values[$wp_setting_name],
                'sanitize_callback'	=> 'absint'
            )
        );
        $wp_customize->add_control(new Aiero_Customize_Control(
            $wp_customize,
            $wp_setting_name,
            array(
                'label'         => esc_html__('Services Excerpt Length', 'aiero'),
                'section'       => 'aiero_service_archive',
                'type'          => 'number',
                'settings'      => $wp_setting_name,
                'input_attrs' => [
                    'min'   => 0,
                    'step'  => 1
                ]
            )
        ));

        // -------------------------------------- //
        // --- Service Archive Columns Number --- //
        // -------------------------------------- //
        $wp_setting_name = 'service_archive_columns_number';
        $wp_customize->add_setting(
            $wp_setting_name,
            array(
                'default'           => $aiero_customizer_default_values[$wp_setting_name],
                'sanitize_callback'	=> 'absint'
            )
        );
        $wp_customize->add_control(new Aiero_Customize_Control(
            $wp_customize,
            $wp_setting_name,
            array(
                'label'         => esc_html__('Service Archive Columns Number', 'aiero'),
                'section'       => 'aiero_service_archive',
                'type'          => 'number',
                'settings'      => $wp_setting_name,
                'input_attrs' => [
                    'min'   => 1,
                    'max'   => 4,
                    'step'  => 1
                ]
            )
        ));

        // --------------------------------------- //
        // --- Services Archive Posts per Page --- //
        // --------------------------------------- //
        $wp_setting_name = 'service_archive_posts_per_page';
        $wp_customize->add_setting(
            $wp_setting_name,
            array(
                'default'           => $aiero_customizer_default_values[$wp_setting_name],
                'sanitize_callback'	=> 'absint'
            )
        );
        $wp_customize->add_control(new Aiero_Customize_Control(
            $wp_customize,
            $wp_setting_name,
            array(
                'label'         => esc_html__('Service Posts Per Page', 'aiero'),
                'section'       => 'aiero_service_archive',
                'type'          => 'number',
                'settings'      => $wp_setting_name,
                'input_attrs' => [
                    'min'   => 1,
                    'step'  => 1
                ]
            )
        ));

        // ---######################--- //
        // ---### Service Single ###--- //
        // ---######################--- //
        $wp_customize->add_section('aiero_service_single',
            array(
                'title' => esc_html__('Single Page Settings', 'aiero'),
                'panel' => 'aiero_services_settings'
            )
        );

        // ---------------------------------- //
        // --- Services Single Page Title --- //
        // ---------------------------------- //
        $wp_setting_name = 'service_single_page_title';
        $wp_customize->add_setting(
            $wp_setting_name,
            array(
                'default'           => stripslashes($aiero_customizer_default_values[$wp_setting_name]),
                'sanitize_callback'	=> 'sanitize_text_field'
            )
        );
        $wp_customize->add_control(new Aiero_Customize_Control(
            $wp_customize,
            $wp_setting_name,
            array(
                'label'         => esc_html__('Service Single Page Title', 'aiero'),
                'section'       => 'aiero_service_single',
                'type'          => 'text',
                'settings'      => $wp_setting_name,
                'description'   => esc_html__('Use variable \'%s\' for display Post name', 'aiero')
            )
        ));

        // ------------------------- //
        // --- Service Title Status --- //
        // ------------------------- //
        $wp_setting_name = 'service_title_status';
        $wp_customize->add_setting(
            $wp_setting_name,
            array(
                'default'           => $aiero_customizer_default_values[$wp_setting_name],
                'sanitize_callback' => 'aiero_sanitize_choice'
            )
        );
        $wp_customize->add_control(new Aiero_Customize_Control(
            $wp_customize,
            $wp_setting_name,
            array(
                'label'     => esc_html__('Show Service Title', 'aiero'),
                'section'   => 'aiero_service_single',
                'type'      => 'select',
                'settings'  => $wp_setting_name,
                'choices'   => array(
                    'on'        => esc_html__('Yes', 'aiero'),
                    'off'       => esc_html__('No', 'aiero')
                )
            )
        ));

        // ------------------------- //
        // --- Service Title Status --- //
        // ------------------------- //
        $wp_setting_name = 'service_media_status';
        $wp_customize->add_setting(
            $wp_setting_name,
            array(
                'default'           => $aiero_customizer_default_values[$wp_setting_name],
                'sanitize_callback' => 'aiero_sanitize_choice'
            )
        );
        $wp_customize->add_control(new Aiero_Customize_Control(
            $wp_customize,
            $wp_setting_name,
            array(
                'label'     => esc_html__('Show Service Featured Image', 'aiero'),
                'section'   => 'aiero_service_single',
                'type'      => 'select',
                'settings'  => $wp_setting_name,
                'choices'   => array(
                    'on'        => esc_html__('Yes', 'aiero'),
                    'off'       => esc_html__('No', 'aiero')
                )
            )
        ));


        // ------------------------------ //
        // ------- 404 Error Page ------- //
        // ------------------------------ //
        $wp_customize->add_section('aiero_error_page_settings',
            array(
                'title'     => esc_html__('Error 404 Page', 'aiero'),
                'priority'  => 210
            )
        );

        // ----------------------- //
        // --- 404 Error Title --- //
        // ----------------------- //
        $wp_setting_name = 'error_title';
        $wp_customize->add_setting(
            $wp_setting_name,
            array(
                'default'           => $aiero_customizer_default_values[$wp_setting_name],
                'sanitize_callback'	=> 'wp_kses_post'
            )
        );
        $wp_customize->add_control(new Aiero_Customize_Control(
            $wp_customize,
            $wp_setting_name,
            array(
                'label'         => esc_html__('404 Error Title', 'aiero'),
                'section'       => 'aiero_error_page_settings',
                'type'          => 'textarea',
                'settings'      => $wp_setting_name
            )
        ));

        // ---------------------- //
        // --- 404 Error Text --- //
        // ---------------------- //
        $wp_setting_name = 'error_text';
        $wp_customize->add_setting(
            $wp_setting_name,
            array(
                'default'           => $aiero_customizer_default_values[$wp_setting_name],
                'sanitize_callback'	=> 'wp_kses_post'
            )
        );
        $wp_customize->add_control(new Aiero_Customize_Control(
            $wp_customize,
            $wp_setting_name,
            array(
                'label'         => esc_html__('404 Error Info Text', 'aiero'),
                'section'       => 'aiero_error_page_settings',
                'type'          => 'textarea',
                'settings'      => $wp_setting_name
            )
        ));

        // ----------------------------- //
        // --- 404 Error Logo Status --- //
        // ----------------------------- //
        $wp_setting_name = 'error_logo_status';
        $wp_customize->add_setting(
            $wp_setting_name,
            array(
                'default'           => $aiero_customizer_default_values[$wp_setting_name],
                'sanitize_callback' => 'aiero_sanitize_choice'
            )
        );
        $wp_customize->add_control(new Aiero_Customize_Control(
            $wp_customize,
            $wp_setting_name,
            array(
                'label'         => esc_html__('Show Logo Image', 'aiero'),
                'section'       => 'aiero_error_page_settings',
                'type'          => 'select',
                'settings'      => $wp_setting_name,
                'choices'       => array(
                    'on'    => esc_html__('Yes', 'aiero'),
                    'off'   => esc_html__('No', 'aiero')
                )
            )
        ));

        // --------------------------- //
        // --- 404 Page Logo Image --- //
        // --------------------------- //
        $wp_setting_name = 'error_logo_image';
        $wp_customize->add_setting(
            $wp_setting_name,
            array(
                'default'           => $aiero_customizer_default_values[$wp_setting_name],
                'sanitize_callback'	=> 'esc_url_raw'
            )
        );
        $wp_customize->add_control(new Aiero_Image_Custom_Control(
            $wp_customize,
            $wp_setting_name,
            array(
                'label'         => esc_html__('Logo Image', 'aiero'),
                'section'       => 'aiero_error_page_settings',
                'settings'      => $wp_setting_name
            )
        ));        

        // ------------------------------------ //
        // --- 404 Error Home Button Status --- //
        // ------------------------------------ //
        $wp_setting_name = 'error_button_status';
        $wp_customize->add_setting(
            $wp_setting_name,
            array(
                'default'           => $aiero_customizer_default_values[$wp_setting_name],
                'sanitize_callback'	=> 'aiero_sanitize_choice'
            )
        );
        $wp_customize->add_control(new Aiero_Customize_Control(
            $wp_customize,
            $wp_setting_name,
            array(
                'label'     => esc_html__('Show Home Button', 'aiero'),
                'section'   => 'aiero_error_page_settings',
                'type'      => 'select',
                'settings'  => $wp_setting_name,
                'choices'   => array(
                    'on'        => esc_html__('Yes', 'aiero'),
                    'off'       => esc_html__('No', 'aiero')
                )
            )
        ));

        // ----------------------------- //
        // --- 404 Error Button Text --- //
        // ----------------------------- //
        $wp_setting_name = 'error_button_text';
        $wp_customize->add_setting(
            $wp_setting_name,
            array(
                'default'           => $aiero_customizer_default_values[$wp_setting_name],
                'sanitize_callback'	=> 'sanitize_text_field'
            )
        );
        $wp_customize->add_control(new Aiero_Customize_Control(
            $wp_customize,
            $wp_setting_name,
            array(
                'label'         => esc_html__('Home Button Text', 'aiero'),
                'section'       => 'aiero_error_page_settings',
                'type'          => 'text',
                'settings'      => $wp_setting_name,
                'dependency'    => [
                    [
                        'control'   => 'error_button_status',
                        'operator'  => '==',
                        'value'     => 'on'
                    ]
                ]
            )
        ));

        // -------------------------------- //
        // --- 404 Error Socials Status --- //
        // -------------------------------- //
        $wp_setting_name = 'error_socials_status';
        $wp_customize->add_setting(
            $wp_setting_name,
            array(
                'default'           => $aiero_customizer_default_values[$wp_setting_name],
                'sanitize_callback' => 'aiero_sanitize_choice'
            )
        );
        $wp_customize->add_control(new Aiero_Customize_Control(
            $wp_customize,
            $wp_setting_name,
            array(
                'label'     => esc_html__('Show Social Buttons', 'aiero'),
                'section'   => 'aiero_error_page_settings',
                'type'      => 'select',
                'settings'  => $wp_setting_name,
                'choices'   => array(
                    'on'        => esc_html__('Yes', 'aiero'),
                    'off'       => esc_html__('No', 'aiero')
                )
            )
        ));

        // --------------------------------- //
        // --- 404 Page Text Color --- //
        // --------------------------------- //
        $wp_setting_name = 'error_text_color';
        $wp_customize->add_setting(
            $wp_setting_name,
            array(
                'default'           => $aiero_customizer_default_values[$wp_setting_name],
                'sanitize_callback' => 'aiero_sanitize_alpha_color'
            )
        );
        $wp_customize->add_control(new Aiero_Alpha_Color_Custom_Control(
            $wp_customize,
            $wp_setting_name,
            array(
                'label'         => esc_html__('Text Color', 'aiero'),
                'section'       => 'aiero_error_page_settings',
                'settings'      => $wp_setting_name,
                'show_opacity'  => true,
                'palette'       => aiero_get_custom_color_palette()
            )
        ));

        // --------------------------------- //
        // --- 404 Page Text Hover Color --- //
        // --------------------------------- //
        $wp_setting_name = 'error_text_hover_color';
        $wp_customize->add_setting(
            $wp_setting_name,
            array(
                'default'           => $aiero_customizer_default_values[$wp_setting_name],
                'sanitize_callback' => 'aiero_sanitize_alpha_color'
            )
        );
        $wp_customize->add_control(new Aiero_Alpha_Color_Custom_Control(
            $wp_customize,
            $wp_setting_name,
            array(
                'label'         => esc_html__('Text Hover Color', 'aiero'),
                'section'       => 'aiero_error_page_settings',
                'settings'      => $wp_setting_name,
                'show_opacity'  => true,
                'palette'       => aiero_get_custom_color_palette()
            )
        ));

        // -------------------------------------- //
        // --- 404 Error Background Customize --- //
        // -------------------------------------- //
        $wp_setting_name = 'error_background_customize';
        $wp_customize->add_setting(
            $wp_setting_name,
            array(
                'default'           => $aiero_customizer_default_values[$wp_setting_name],
                'sanitize_callback'	=> 'aiero_sanitize_choice'
            )
        );
        $wp_customize->add_control(new Aiero_Customize_Control(
            $wp_customize,
            $wp_setting_name,
            array(
                'label'     => esc_html__('Customize Background', 'aiero'),
                'section'   => 'aiero_error_page_settings',
                'type'      => 'select',
                'settings'  => $wp_setting_name,
                'choices'   => array(
                    'on'        => esc_html__('Yes', 'aiero'),
                    'off'       => esc_html__('No', 'aiero')
                )
            )
        ));

        // --------------------------------- //
        // --- 404 Page Background Color --- //
        // --------------------------------- //
        $wp_setting_name = 'error_background_color';
        $wp_customize->add_setting(
            $wp_setting_name,
            array(
                'default'           => $aiero_customizer_default_values[$wp_setting_name],
                'sanitize_callback'	=> 'aiero_sanitize_alpha_color'
            )
        );
        $wp_customize->add_control(new Aiero_Alpha_Color_Custom_Control(
            $wp_customize,
            $wp_setting_name,
            array(
                'label'         => esc_html__('Background Color', 'aiero'),
                'section'       => 'aiero_error_page_settings',
                'settings'      => $wp_setting_name,
                'show_opacity'  => true,
                'palette'       => aiero_get_custom_color_palette(),
                'dependency'    => [
                    [
                        'control'   => 'error_background_customize',
                        'operator'  => '==',
                        'value'     => 'on'
                    ]
                ]
            )
        ));

        // --------------------------------- //
        // --- 404 Page Background Image --- //
        // --------------------------------- //
        $wp_setting_name = 'error_background_image';
        $wp_customize->add_setting(
            $wp_setting_name,
            array(
                'default'           => $aiero_customizer_default_values[$wp_setting_name],
                'sanitize_callback'	=> 'esc_url_raw'
            )
        );
        $wp_customize->add_control(new Aiero_Image_Custom_Control(
            $wp_customize,
            $wp_setting_name,
            array(
                'label'         => esc_html__('Background Image', 'aiero'),
                'section'       => 'aiero_error_page_settings',
                'settings'      => $wp_setting_name,
                'dependency'    => [
                    [
                        'control'   => 'error_background_customize',
                        'operator'  => '==',
                        'value'     => 'on'
                    ]
                ]
            )
        ));

        // ------------------------------------ //
        // --- 404 Page Background Position --- //
        // ------------------------------------ //
        $wp_setting_name = 'error_background_position';
        $wp_customize->add_setting(
            $wp_setting_name,
            array(
                'default'           => $aiero_customizer_default_values[$wp_setting_name],
                'sanitize_callback'	=> 'aiero_sanitize_choice'
            )
        );
        $wp_customize->add_control(new Aiero_Customize_Control(
            $wp_customize,
            $wp_setting_name,
            array(
                'label'         => esc_html__('Background Position', 'aiero'),
                'section'       => 'aiero_error_page_settings',
                'type'          => 'select',
                'settings'      => $wp_setting_name,
                'choices'       => aiero_get_background_position_options(),
                'dependency'    => [
                    [
                        'control'   => 'error_background_customize',
                        'operator'  => '==',
                        'value'     => 'on'
                    ]
                ]
            )
        ));

        // ---------------------------------- //
        // --- 404 Page Background Repeat --- //
        // ---------------------------------- //
        $wp_setting_name = 'error_background_repeat';
        $wp_customize->add_setting(
            $wp_setting_name,
            array(
                'default'           => $aiero_customizer_default_values[$wp_setting_name],
                'sanitize_callback'	=> 'aiero_sanitize_choice'
            )
        );
        $wp_customize->add_control(new Aiero_Customize_Control(
            $wp_customize,
            $wp_setting_name,
            array(
                'label'         => esc_html__('Background Repeat', 'aiero'),
                'section'       => 'aiero_error_page_settings',
                'type'          => 'select',
                'settings'      => $wp_setting_name,
                'choices'       => aiero_get_background_repeat_options(),
                'dependency'    => [
                    [
                        'control'   => 'error_background_customize',
                        'operator'  => '==',
                        'value'     => 'on'
                    ]
                ]
            )
        ));

        // -------------------------------- //
        // --- 404 Page Background Size --- //
        // -------------------------------- //
        $wp_setting_name = 'error_background_size';
        $wp_customize->add_setting(
            $wp_setting_name,
            array(
                'default'           => $aiero_customizer_default_values[$wp_setting_name],
                'sanitize_callback'	=> 'aiero_sanitize_choice'
            )
        );
        $wp_customize->add_control(new Aiero_Customize_Control(
            $wp_customize,
            $wp_setting_name,
            array(
                'label'         => esc_html__('Background Size', 'aiero'),
                'section'       => 'aiero_error_page_settings',
                'type'          => 'select',
                'settings'      => $wp_setting_name,
                'choices'       => aiero_get_background_size_options(),
                'dependency'    => [
                    [
                        'control'   => 'error_background_customize',
                        'operator'  => '==',
                        'value'     => 'on'
                    ]
                ]
            )
        ));

        if ( class_exists('WooCommerce') ) {

            // ------------------------------------------ //
            // ---------- WooCommerce Settings ---------- //
            // ------------------------------------------ //

            // ---######################--- //
            // ---### Single Product ###--- //
            // ---######################--- //
            $wp_customize->add_section('aiero_woocommerce_single_product',
                array(
                    'title' => esc_html__('Single Product', 'aiero'),
                    'panel' => 'woocommerce'
                )
            );

            // ----------------------------------------------- //
            // --- Single Product Related Products Section --- //
            // ----------------------------------------------- //
            $wp_setting_name = 'woo_single_product_show_related_section';
            $wp_customize->add_setting(
                $wp_setting_name,
                array(
                    'default'           => $aiero_customizer_default_values[$wp_setting_name],
                    'sanitize_callback'	=> 'aiero_sanitize_choice'
                )
            );
            $wp_customize->add_control(new Aiero_Customize_Control(
                $wp_customize,
                $wp_setting_name,
                array(
                    'label'     => esc_html__('Show Related Products', 'aiero'),
                    'section'   => 'aiero_woocommerce_single_product',
                    'type'      => 'select',
                    'settings'  => $wp_setting_name,
                    'choices'   => array(
                        'on'        => esc_html__('Yes', 'aiero'),
                        'off'       => esc_html__('No', 'aiero')
                    )
                )
            ));

            // -------------------------------- //
            // --- Related Products Heading --- //
            // -------------------------------- //
            $wp_setting_name = 'woo_related_title';
            $wp_customize->add_setting(
                $wp_setting_name,
                array(
                    'default'           => $aiero_customizer_default_values[$wp_setting_name],
                    'sanitize_callback'	=> 'sanitize_text_field'
                )
            );
            $wp_customize->add_control(new Aiero_Customize_Control(
                $wp_customize,
                $wp_setting_name,
                array(
                    'label'         => esc_html__('Related Products Section Title', 'aiero'),
                    'section'       => 'aiero_woocommerce_single_product',
                    'type'          => 'text',
                    'settings'      => $wp_setting_name,
                    'dependency'    => [
                        [
                            'control'   => 'woo_single_product_show_related_section',
                            'operator'  => '==',
                            'value'     => 'on'
                        ]
                    ]
                )
            ));

            // --------------------------------- //
            // --- Single Product Page Title --- //
            // --------------------------------- //
            $wp_setting_name = 'woo_single_product_title';
            $wp_customize->add_setting(
                $wp_setting_name,
                array(
                    'default'           => stripslashes($aiero_customizer_default_values[$wp_setting_name]),
                    'sanitize_callback'	=> 'sanitize_text_field'
                )
            );
            $wp_customize->add_control(new Aiero_Customize_Control(
                $wp_customize,
                $wp_setting_name,
                array(
                    'label'         => esc_html__('Single Product Page Title', 'aiero'),
                    'section'       => 'aiero_woocommerce_single_product',
                    'type'          => 'text',
                    'settings'      => $wp_setting_name,
                    'description'   => esc_html__('Use variable \'%s\' for display Product title', 'aiero')
                )
            ));

            // ------------------------- //
            // --- Show Product Name --- //
            // ------------------------- //
            $wp_setting_name = 'woo_single_product_show_name';
            $wp_customize->add_setting(
                $wp_setting_name,
                array(
                    'default'           => $aiero_customizer_default_values[$wp_setting_name],
                    'sanitize_callback'	=> 'aiero_sanitize_checkbox'
                )
            );
            $wp_customize->add_control(new Aiero_Customize_Control(
                $wp_customize,
                $wp_setting_name,
                array(
                    'label'         => esc_html__('Show Product name above the Price', 'aiero'),
                    'section'       => 'aiero_woocommerce_single_product',
                    'type'          => 'checkbox',
                    'settings'      => $wp_setting_name
                )
            ));


            // --------------------------------- //
            // --- Up-sells Products Heading --- //
            // --------------------------------- //
            $wp_setting_name = 'woo_upsells_title';
            $wp_customize->add_setting(
                $wp_setting_name,
                array(
                    'default'           => stripslashes($aiero_customizer_default_values[$wp_setting_name]),
                    'sanitize_callback'	=> 'sanitize_text_field'
                )
            );
            $wp_customize->add_control(new Aiero_Customize_Control(
                $wp_customize,
                $wp_setting_name,
                array(
                    'label'         => esc_html__('Up-sells Section Title', 'aiero'),
                    'section'       => 'aiero_woocommerce_single_product',
                    'type'          => 'text',
                    'settings'      => $wp_setting_name
                )
            ));

            // ---##########################--- //
            // ---### Product Categories ###--- //
            // ---##########################--- //
            $wp_customize->add_section('aiero_woocommerce_product_archive',
                array(
                    'title' => esc_html__('Product Archive', 'aiero'),
                    'panel' => 'woocommerce'
                )
            );

            // -------------------------------- //
            // --- Product Categories Title --- //
            // -------------------------------- //
            $wp_setting_name = 'woo_product_categories_title';
            $wp_customize->add_setting(
                $wp_setting_name,
                array(
                    'default'           => stripslashes($aiero_customizer_default_values[$wp_setting_name]),
                    'sanitize_callback'	=> 'sanitize_text_field'
                )
            );
            $wp_customize->add_control(new Aiero_Customize_Control(
                $wp_customize,
                $wp_setting_name,
                array(
                    'label'         => esc_html__('Product Category Page Title', 'aiero'),
                    'section'       => 'aiero_woocommerce_product_archive',
                    'type'          => 'text',
                    'settings'      => $wp_setting_name,
                    'description'   => esc_html__('Use variable \'%s\' for display Product category name', 'aiero')
                )
            ));

            // -------------------------- //
            // --- Product Tags Title --- //
            // -------------------------- //
            $wp_setting_name = 'woo_product_tags_title';
            $wp_customize->add_setting(
                $wp_setting_name,
                array(
                    'default'           => stripslashes($aiero_customizer_default_values[$wp_setting_name]),
                    'sanitize_callback'	=> 'sanitize_text_field'
                )
            );
            $wp_customize->add_control(new Aiero_Customize_Control(
                $wp_customize,
                $wp_setting_name,
                array(
                    'label'         => esc_html__('Product Tag Page Title', 'aiero'),
                    'section'       => 'aiero_woocommerce_product_archive',
                    'type'          => 'text',
                    'settings'      => $wp_setting_name,
                    'description'   => esc_html__('Use variable \'%s\' for display Product tag name', 'aiero')
                )
            ));

        }        

        // ----------------------------------------------- //
        // ---------- Additional Settings Panel ---------- //
        // ----------------------------------------------- //
        $wp_customize->add_panel('aiero_additional_settings',
            array(
                'title'     => esc_html__('Additional Settings', 'aiero'),
                'priority'  => 220
            )
        );

        // ---###################--- //
        // ---### Page Loader ###--- //
        // ---###################--- //
        $wp_customize->add_section('aiero_page_loader',
            array(
                'title' => esc_html__('Page Loader', 'aiero'),
                'panel' => 'aiero_additional_settings'
            )
        );

        // -------------------------- //
        // --- Page Loader Status --- //
        // -------------------------- //
        $wp_setting_name = 'page_loader_status';
        $wp_customize->add_setting(
            $wp_setting_name,
            array(
                'default'           => $aiero_customizer_default_values[$wp_setting_name],
                'sanitize_callback'	=> 'aiero_sanitize_choice'
            )
        );
        $wp_customize->add_control(new Aiero_Customize_Control(
            $wp_customize,
            $wp_setting_name,
            array(
                'label'     => esc_html__('Show Page Loader', 'aiero'),
                'section'   => 'aiero_page_loader',
                'type'      => 'select',
                'settings'  => $wp_setting_name,
                'choices'   => array(
                    'on'        => esc_html__('Yes', 'aiero'),
                    'off'       => esc_html__('No', 'aiero')
                )
            )
        ));

        // ------------------------- //
        // --- Page Loader Image --- //
        // ------------------------- //
        $wp_setting_name = 'page_loader_image';
        $wp_customize->add_setting(
            $wp_setting_name,
            array(
                'default'           => $aiero_customizer_default_values[$wp_setting_name],
                'sanitize_callback'	=> 'esc_url_raw'
            )
        );
        $wp_customize->add_control(new Aiero_Image_Custom_Control(
            $wp_customize,
            $wp_setting_name,
            array(
                'label'         => esc_html__('Page Loader Image', 'aiero'),
                'section'       => 'aiero_page_loader',
                'settings'      => $wp_setting_name,
                'description'   => esc_html__('Maximum 100x100px', 'aiero'),
                'dependency'    => [
                    [
                        'control'   => 'page_loader_status',
                        'operator'  => '==',
                        'value'     => 'on'
                    ]
                ]
            )
        ));

        // ------------------------- //
        // --- Footer Scroll To Top --- //
        // ------------------------- //

        $wp_customize->add_section('aiero_footer_scrolltop',
            array(
                'title' => esc_html__('Scroll To Top Button', 'aiero'),
                'panel' => 'aiero_additional_settings'
            )
        );

        // ------------------------------------- //
        // --- Footer Scroll To Top Status --- //
        // -------------------------------------- //
        $wp_setting_name = 'footer_scrolltop_status';
        $wp_customize->add_setting(
            $wp_setting_name,
            array(
                'default'           => $aiero_customizer_default_values[$wp_setting_name],
                'sanitize_callback' => 'aiero_sanitize_choice'
            )
        );
        $wp_customize->add_control(new Aiero_Customize_Control(
            $wp_customize,
            $wp_setting_name,
            array(
                'label'     => esc_html__('Show Scroll To Top Button', 'aiero'),
                'section'   => 'aiero_footer_scrolltop',
                'type'      => 'select',
                'settings'  => $wp_setting_name,
                'choices'   => array(
                    'on'        => esc_html__('Yes', 'aiero'),
                    'off'       => esc_html__('No', 'aiero')
                )
            )
        ));

        // --------------------------------- //
        // --- Scroll Top Button Background Color --- //
        // --------------------------------- //
        $wp_setting_name = 'footer_scrolltop_bg_color';
        $wp_customize->add_setting(
            $wp_setting_name,
            array(
                'default'           => $aiero_customizer_default_values[$wp_setting_name],
                'sanitize_callback' => 'aiero_sanitize_alpha_color'
            )
        );
        $wp_customize->add_control(new Aiero_Alpha_Color_Custom_Control(
            $wp_customize,
            $wp_setting_name,
            array(
                'label'         => esc_html__('Scroll To Top Button Background Color', 'aiero'),
                'section'       => 'aiero_footer_scrolltop',
                'settings'      => $wp_setting_name,
                'show_opacity'  => true,
                'palette'       => aiero_get_custom_color_palette(),
                'dependency'    => [
                    [
                        'control'   => 'footer_scrolltop_status',
                        'operator'  => '==',
                        'value'     => 'on'
                    ]
                ]
            )
        ));   

        $wp_setting_name = 'footer_scrolltop_bg_color_hover';
        $wp_customize->add_setting(
            $wp_setting_name,
            array(
                'default'           => $aiero_customizer_default_values[$wp_setting_name],
                'sanitize_callback' => 'aiero_sanitize_alpha_color'
            )
        );
        $wp_customize->add_control(new Aiero_Alpha_Color_Custom_Control(
            $wp_customize,
            $wp_setting_name,
            array(
                'label'         => esc_html__('Scroll To Top Button Hover Background Color', 'aiero'),
                'section'       => 'aiero_footer_scrolltop',
                'settings'      => $wp_setting_name,
                'show_opacity'  => true,
                'palette'       => aiero_get_custom_color_palette(),
                'dependency'    => [
                    [
                        'control'   => 'footer_scrolltop_status',
                        'operator'  => '==',
                        'value'     => 'on'
                    ]
                ]
            )
        ));

        // --------------------------------- //
        // --- Scroll Top Button Background Color --- //
        // --------------------------------- //
        $wp_setting_name = 'footer_scrolltop_color';
        $wp_customize->add_setting(
            $wp_setting_name,
            array(
                'default'           => $aiero_customizer_default_values[$wp_setting_name],
                'sanitize_callback' => 'aiero_sanitize_alpha_color'
            )
        );
        $wp_customize->add_control(new Aiero_Alpha_Color_Custom_Control(
            $wp_customize,
            $wp_setting_name,
            array(
                'label'         => esc_html__('Scroll To Top Button Color', 'aiero'),
                'section'       => 'aiero_footer_scrolltop',
                'settings'      => $wp_setting_name,
                'show_opacity'  => true,
                'palette'       => aiero_get_custom_color_palette(),
                'dependency'    => [
                    [
                        'control'   => 'footer_scrolltop_status',
                        'operator'  => '==',
                        'value'     => 'on'
                    ]
                ]
            )
        ));

        $wp_setting_name = 'footer_scrolltop_color_hover';
        $wp_customize->add_setting(
            $wp_setting_name,
            array(
                'default'           => $aiero_customizer_default_values[$wp_setting_name],
                'sanitize_callback' => 'aiero_sanitize_alpha_color'
            )
        );
        $wp_customize->add_control(new Aiero_Alpha_Color_Custom_Control(
            $wp_customize,
            $wp_setting_name,
            array(
                'label'         => esc_html__('Scroll To Top Button Hover Color', 'aiero'),
                'section'       => 'aiero_footer_scrolltop',
                'settings'      => $wp_setting_name,
                'show_opacity'  => true,
                'palette'       => aiero_get_custom_color_palette(),
                'dependency'    => [
                    [
                        'control'   => 'footer_scrolltop_status',
                        'operator'  => '==',
                        'value'     => 'on'
                    ]
                ]
            )
        ));

    }
}
