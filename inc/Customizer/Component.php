<?php
/**
 * WP_Rig\WP_Rig\Customizer\Component class
 *
 * @package misho_zazil
 */

namespace WP_Rig\WP_Rig\Customizer;

use WP_Rig\WP_Rig\Component_Interface;
use function WP_Rig\WP_Rig\misho_zazil;
use WP_Customize_Manager;
use WP_Customize_Color_Control;
use function add_action;
use function bloginfo;
use function wp_enqueue_script;
use function get_theme_file_uri;

/**
 * Class for managing Customizer integration.
 */
class Component implements Component_Interface {

	/**
	 * Gets the unique identifier for the theme component.
	 *
	 * @return string Component slug.
	 */
	public function get_slug() : string {
		return 'customizer';
	}

	/**
	 * Adds the action and filter hooks to integrate with WordPress.
	 */
	public function initialize() {
		add_action( 'customize_register', [ $this, 'action_customize_register' ] );
		add_action( 'customize_preview_init', [ $this, 'action_enqueue_customize_preview_js' ] );
	}

	/**
	 * Adds postMessage support for site title and description, plus a custom Theme Options section.
	 *
	 * @param WP_Customize_Manager $wp_customize Customizer manager instance.
	 */
	public function action_customize_register( WP_Customize_Manager $wp_customize ) {
		$wp_customize->get_setting( 'blogname' )->transport         = 'postMessage';
		$wp_customize->get_setting( 'blogdescription' )->transport  = 'postMessage';
		//$wp_customize->get_setting( 'header_textcolor' )->transport = 'postMessage';

	 	// Removing some options from Customizer.
		 $wp_customize->remove_control('header_textcolor');
		 $wp_customize->remove_control('background_color');
		 $wp_customize->remove_section('background_image');
		 $wp_customize->remove_section('header_image');


		if ( isset( $wp_customize->selective_refresh ) ) {
			$wp_customize->selective_refresh->add_partial(
				'blogname',
				[
					'selector'        => '.site-title a',
					'render_callback' => function() {
						bloginfo( 'name' );
					},
				]
			);
			$wp_customize->selective_refresh->add_partial(
				'blogdescription',
				[
					'selector'        => '.site-description',
					'render_callback' => function() {
						bloginfo( 'description' );
					},
				]
			);
		}

		/**
		 * Theme options.
		 */
		$wp_customize->add_section(
			'theme_options',
			[
				'title'    => __( 'Theme Options', 'misho-zazil' ),
				'priority' => 130, // Before Additional CSS.
			]
		);

		// Color Theme Primary.
		$wp_customize->add_setting( 'color_theme_primary', array(
			'default'   => '#fb5012',
			'transport' => 'refresh',
		) );

		$wp_customize->add_control( new WP_Customize_Color_Control( $wp_customize, 'color_theme_primary', array(
			'section' => 'colors',
			'label'   => esc_html__( 'Color Theme Primary', 'misho-zazil' ),
		) ) );

		// Color Theme Secondary.
		$wp_customize->add_setting( 'color_theme_secondary', array(
			'default'   => '#2480f2',
			'transport' => 'refresh',
		) );

		$wp_customize->add_control( new WP_Customize_Color_Control( $wp_customize, 'color_theme_secondary', array(
			'section' => 'colors',
			'label'   => esc_html__( 'Color Theme Secondary', 'misho-zazil' ),
		) ) );

		// Color Theme Widget.
		$wp_customize->add_setting( 'color_theme_widget', array(
			'default'   => '#b4e33d',
			'transport' => 'refresh',
		) );

		$wp_customize->add_control( new WP_Customize_Color_Control( $wp_customize, 'color_theme_widget', array(
			'section' => 'colors',
			'label'   => esc_html__( 'Color Theme Widget', 'misho-zazil' ),
		) ) );

		// Color Theme Primary Shadow.
		$wp_customize->add_setting( 'color_theme_primary_shadow', array(
			'default'   => '#e74004',
			'transport' => 'refresh',
		) );

		$wp_customize->add_control( new WP_Customize_Color_Control( $wp_customize, 'color_theme_primary_shadow', array(
			'section' => 'colors',
			'label'   => esc_html__( 'Color Theme Primary Shadow', 'misho-zazil' ),
		) ) );

		// Color Theme Widget Shadow.
		$wp_customize->add_setting( 'color_theme_widget_shadow', array(
			'default'   => '#eded3b',
			'transport' => 'refresh',
		) );

		$wp_customize->add_control( new WP_Customize_Color_Control( $wp_customize, 'color_theme_widget_shadow', array(
			'section' => 'colors',
			'label'   => esc_html__( 'Color Theme Widget Gradient', 'misho-zazil' ),
		) ) );

		// Color Theme Body Shadow.
		$wp_customize->add_setting( 'color_theme_body_shadow', array(
			'default'   => '#7d18e2',
			'transport' => 'refresh',
		) );

		$wp_customize->add_control( new WP_Customize_Color_Control( $wp_customize, 'color_theme_body_shadow', array(
			'section' => 'colors',
			'label'   => esc_html__( 'Color Theme Body Gradient', 'misho-zazil' ),
		) ) );
	}

	/**
	 * Enqueues JavaScript to make Customizer preview reload changes asynchronously.
	 */
	public function action_enqueue_customize_preview_js() {
		wp_enqueue_script(
			'misho-zazil-customizer',
			get_theme_file_uri( '/assets/js/customizer.min.js' ),
			[ 'customize-preview' ],
			misho_zazil()->get_asset_version( get_theme_file_path( '/assets/js/customizer.min.js' ) ),
			true
		);
	}
}
