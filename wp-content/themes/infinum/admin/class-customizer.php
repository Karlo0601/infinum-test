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
      'website_customizer_options',
      array(
          'title' => __( 'Website Options' ),
          'priority'    => 30,
          'description' => __( 'Website options' ),
      )
    );

    // Get iOS link.
    $wp_customize->add_setting(
      'get_ios_link',
      array(
          'default'           => '#',
          'capability'        => 'edit_theme_options',
          'sanitize_callback' => 'esc_url_raw',
      )
    );
    $wp_customize->add_control(
      'get_ios_link',
      array(
          'label'      => esc_html__( 'Get for iOS link', 'infinum' ),
          'section'    => 'website_customizer_options',
          'type'       => 'text',
      )
    );

    // GetUnicorn link.
    $wp_customize->add_setting(
      'unicorn_owners_link',
      array(
          'default'           => '#',
          'capability'        => 'edit_theme_options',
          'sanitize_callback' => 'esc_url_raw',
      )
    );
    $wp_customize->add_control(
      'unicorn_owners_link',
      array(
          'label'      => esc_html__( 'Unicorn owners link', 'infinum' ),
          'section'    => 'website_customizer_options',
          'type'       => 'text',
      )
    );

    // Search title.
    $wp_customize->add_setting( 'website_search_title' );

    $wp_customize->add_control(
      'website_search_title',
      array(
          'label' => __( 'Homepage Search Title', 'infinum' ),
          'type' => 'text',
          'section' => 'website_customizer_options',
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

    // Footer copyright text.
    $wp_customize->add_setting(
      'footer_copyright_text',
      array(
          'default'           => '&#169; 2015 Uniduck. All rights reserved.',
          'capability'        => 'edit_theme_options',
          'sanitize_callback' => 'sanitize_text_field',
      )
    );
    $wp_customize->add_control(
      'footer_copyright_text',
      array(
          'label'   => esc_html__( 'Footer copyright', 'infinum' ),
          'section' => 'footer_options',
          'type'    => 'text',
      )
    );
    // Facebook.
    $wp_customize->add_setting(
      'footer_facebook',
      array(
          'default'           => '#',
          'capability'        => 'edit_theme_options',
          'sanitize_callback' => 'esc_url_raw',
      )
    );
    $wp_customize->add_control(
      'footer_facebook',
      array(
          'label'      => esc_html__( 'Facebook link', 'infinum' ),
          'section'    => 'footer_options',
          'type'       => 'text',
      )
    );
    // Twitter.
    $wp_customize->add_setting(
      'footer_twitter',
      array(
          'default'           => '#',
          'capability'        => 'edit_theme_options',
          'sanitize_callback' => 'esc_url_raw',
      )
    );
    $wp_customize->add_control(
      'footer_twitter',
      array(
          'label'      => esc_html__( 'Twitter link', 'infinum' ),
          'section'    => 'footer_options',
          'type'       => 'text',
      )
    );
    // Instagram.
    $wp_customize->add_setting(
      'footer_instagram',
      array(
          'default'           => '#',
          'capability'        => 'edit_theme_options',
          'sanitize_callback' => 'esc_url_raw',
      )
    );
    $wp_customize->add_control(
      'footer_instagram',
      array(
          'label'      => esc_html__( 'Instagram link', 'infinum' ),
          'section'    => 'footer_options',
          'type'       => 'text',
      )
    );
  }
}
