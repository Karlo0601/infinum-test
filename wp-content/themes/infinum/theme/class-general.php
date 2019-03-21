<?php
/**
 * The General specific functionality.
 *
 * @since   1.0.0
 * @package Infinum\Theme
 */

namespace Infinum\Theme;

/**
 * Class General
 */
class General {

  /**
   * Enable theme support
   *
   * @since 1.0.0
   */
  public function add_theme_support() {
    add_theme_support( 'title-tag', 'html5' );
  }
}
