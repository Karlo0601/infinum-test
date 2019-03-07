<?php
/**
 * The Widgets specific functionality.
 *
 * @since   1.0.0
 * @package Infinum\Admin
 */

namespace Infinum\Admin;

/**
 * Class Widgets
 */
class Widgets {

  /**
   * Set up widget areas
   *
   * @since 1.0.0
   */
  public function register_widget_position() {
    register_sidebar(
      array(
          'name'          => esc_html__( 'Blog', 'infinum' ),
          'id'            => 'blog',
          'description'   => esc_html__( 'Description', 'infinum' ),
          'before_widget' => '',
          'after_widget'  => '',
          'before_title'  => '',
          'after_title'   => '',
      )
    );
  }

}
