<?php
/**
 * Define the internationalization functionality
 *
 * Loads and defines the internationalization files for this plugin
 * so that it is ready for translation.
 *
 * @since   1.0.0
 * @package Infinum\Includes
 */

namespace Infinum\Includes;

use Infinum\Includes\Config;

/**
 * Class Internationalization
 */
class Internationalization extends Config {

  /**
   * Load the plugin text domain for translation.
   *
   * @since 1.0.0
   */
  public function load_theme_textdomain() {
    load_theme_textdomain( static::THEME_NAME, get_template_directory() . '/languages' );
  }

  /**
   * Global labels
   */
  public static function global_labels() {
    $labels = [
        'label_read_more' => __( 'Read more', 'portfolio-inf' ),
    ];
    return $labels;
  }
}
