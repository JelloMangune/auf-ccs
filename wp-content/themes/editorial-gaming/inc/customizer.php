<?php
/**
 * File to define functions and classes related to customizer.
 *
 * @package Editorial
 * @subpackage Editorial Gaming
 * @since 1.0.0
 */
 
add_action( 'customize_register', 'editorial_gaming_general_settings_register' );

function editorial_gaming_general_settings_register( $wp_customize ) {
    
    /**
     * Switch option for dark mode.
     */
    $wp_customize->add_setting(
        'editorial_gaming_dark_mode_option', 
        array(
            'default'       => '',
            'capability'    => 'edit_theme_options',
            'sanitize_callback' => 'editorial_enable_switch_sanitize'
        )
    );
    $wp_customize->add_control( new Editorial_Customize_Switch_Control(
        $wp_customize,
            'editorial_gaming_dark_mode_option', 
            array(
                'type'          => 'switch',
                'label'         => __( 'Dark Mode Option', 'editorial-gaming' ),
                'description'   => __( 'Enable/disable dark mode layout.', 'editorial-gaming' ),
                'priority'      => 35,
                'section'       => 'editorial_site_layout',
                'choices'       => array(
                    'enable'          => __( 'Enable', 'editorial-gaming' ),
                    'disable'         => __( 'Disable', 'editorial-gaming' )
                )
            )
        )
    );
    
}