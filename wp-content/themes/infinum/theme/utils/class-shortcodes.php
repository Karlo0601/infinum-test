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
    add_shortcode( 'loadmore', array( $this, 'load_more_shortcode' ) );
    add_shortcode( 'responsive-video', array( $this, 'responsive_video_shortcode' ) );
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
      'quotes',
      'align'
    );

    $align = $atts['align'];
    return '<blockquote class="content__quote align--' . $align . '">' . $content . '</blockquote>';
  }

  /**
   * Create Load more button
   * Shortcode: [loadmore container="js-load-more-container" post-type="post" post-per-page="6" label="Load more"].
   *
   * @param Array $atts  Shortcode attributes.
   * @return string Returns Load more butto.
   *
   * @since 1.0.0
   */
  public static function load_more_shortcode( $atts ) {

    $atts = shortcode_atts(
      array(
          'post-type'     => '',
          'post-per-page' => '',
          'label'         => '',
          'container'     => '',
          'tag'           => '',
          'ignore-sticky' => '',
          'exclude-post'  => '',
      ),
      $atts
    );

    $button_attrs_str = '';
    $button_label     = $atts['label'];
    unset( $atts['label'] );

    foreach ( $atts as $key => $val ) {

      if ( $val ) {

          $button_attrs_str .= ' data-' . $key . '=' . esc_attr( $val ) . '';

      }
    }

    return '<div class="load-more__container">
    <a href="#" ' . $button_attrs_str . ' class="btn btn--load-more js-load-more">' . esc_html( $button_label ) . '</a>
    </div>';
  }

  /**
   * Register the shortcode to wrap html around the content
   * Shortcode: [responsive-video identifier="VIDEO-ID" poster="IMAGE-URL"].
   *
   * @param Array $atts  Shortcode attributes.
   * @return string Returns Load more butto.
   *
   * @since 1.0.0
   */
  public static function responsive_video_shortcode( $atts ) {
      $atts = shortcode_atts(
        array(
            'identifier'  => '',
            'poster'      => '',
            'video-title' => '',
        ),
        $atts
      );
    return '<div class="video__container u__embed-video-responsive js-video-container">
    <iframe src="//www.youtube.com/embed/' . $atts['identifier'] . '" height="240" width="320" allowfullscreen="" frameborder="0" class="js-video-iframe"></iframe>
    </div>
    <p class="video__title">' . $atts['video-title'] . '</p>
    <!--.video-container-->';
  }
}
