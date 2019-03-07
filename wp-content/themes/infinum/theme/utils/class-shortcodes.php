<?php
/**
 * The Utils-Excerpt specific functionality.
 *
 * @since   1.0.0
 * @package Infinum\Theme\Utils
 */

namespace Infinum\Theme\Utils;

/**
 * Class Excerpt
 */
class Shortcodes {

  /**
   * Initialize class
   * Load hooks and define some global variables.
   *
   * @since 1.0.0
   */
  public function __construct() {
    add_shortcode( 'quotes', array( $this, 'quotes_shortcode' ) );
  }


  /**
   * Create Shortcode quotes
   * Shortcode: [quotes align="left"]Content[/quotes].
   *
   * @param Array  $atts  Shortcode attributes.
   * @param string $content  Shortcode content.
   *
   * @return string Returns blockquote with text.
   *
   * @since 1.0.0
   */
  public static function quotes_shortcode( $atts, $content = null ) {

    $atts = shortcode_atts(
      array(
          'align' => 'left',
      ),
      $atts,
      'quotes'
    );

    $align = $atts['align'];
    return '<blockquote class="content__quote align' . $align . '">' . $content . '</blockquote>';
  }
}
