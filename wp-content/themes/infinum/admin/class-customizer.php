<?php
/**
 * Customizer options.
 *
 * @since   1.0.0
 * @package Infinum\Admin
 */

namespace Infinum\Admin;

/**
 * Customizer options.
 */
class Customizer {
  /**
   * Initialize class
   * Load hooks and define some global variables.
   *
   * @since 1.0.0
   */
  public function __construct() {
    add_action( 'customize_register', array( $this, 'load_customizer_settings' ) );
  }
  /**
   * Adds a new section to use custom controls in the WordPress customiser
   *
   * @param  Obj $wp_customize - WP Manager.
   */
  public function load_customizer_settings( $wp_customize ) {
    $wp_customize->add_section(
      'website_options',
      array(
          'title' => __( 'Website Options' ),
          'priority'    => 30,
          'description' => __( 'Website options' ),
      )
    );

    // Search title.
    $wp_customize->add_setting( 'website_search_title' );

    $wp_customize->add_control(
      'website_search_title',
      array(
          'label' => __( 'Homepage Search Title', 'infinum' ),
          'type' => 'text',
          'section' => 'website_options',
      )
    );

    // Footer options.
    $wp_customize->add_section(
      'footer_options',
      array(
          'title' => __( 'Footer Options' ),
          'priority'    => 31,
          'description' => __( 'Footer options' ),
      )
    );
    // Footer Logo.
    $wp_customize->add_setting( 'footer_logo' );

    $wp_customize->add_control(
      'footer_logo',
      array(
          'label' => __( 'Footer logo', 'infinum' ),
          'type' => 'text',
          'section' => 'footer_options',
      )
    );
    // Footer Copyright.
    $wp_customize->add_setting( 'footer_copyright' );

    $wp_customize->add_control(
      'footer_copyright',
      array(
          'label' => __( 'Footer copyright text', 'infinum' ),
          'type' => 'text',
          'section' => 'footer_options',
      )
    );
  }
}
