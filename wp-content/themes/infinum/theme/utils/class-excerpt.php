<?php
/**
 * The Utils-Excerpt specific functionality.
 *
 * @since   1.0.0
 * @package Infinum\Theme\Utils
 */

namespace Infinum\Theme\Utils;

use Infinum\Includes\Internationalization;

/**
 * Class Excerpt
 */
class Excerpt {

  /**
   * Custom Excerpt to set word limit
   *
   * @param string  $source Excerpt text.
   * @param integer $limit  Number of characters to trim.
   * @param boolean $read_more  Adds read more link to excerpt.
   * @return string         Trimmed excerpt.
   *
   * @since 1.0.0
   */
  public static function get_excerpt( $source = null, $limit = null, $read_more = false ) {

    if ( empty( $source ) ) {
      return false;
    }

    if ( empty( $limit ) ) {
      $limit = 140;
    }
    if ( empty( $read_more ) ) {
      return false;
    }
    // Remove shortcode.
    $output = preg_replace( ' (\[.*?\])', '', $source );
    $output = strip_shortcodes( $output );

    // Remove html tags.
    $output = wp_strip_all_tags( $output );

    // Reduce string to limit.
    $output = substr( $output, 0, $limit );

    // Remove any whitespace character.
    $output = trim( preg_replace( '/\s+/', ' ', $output ) );

    // Check if strings are equal if not remove text until first space.
    if ( strcmp( $source, $output ) !== 0 ) {
      $output = substr( $output, 0, strripos( $output, ' ' ) );
    }

    if ( $read_more ) {
      $labels = Internationalization::global_labels();
      $output = '<p>' . $output . '... <a class="read-more" href="' . get_permalink() . '">' . $labels['label_read_more'] . '</a></p>';
    } else {
      $output = '<p>' . $output . '...</p>';
    }

    return $output;
  }

}
