<?php
/**
 * In this function we will handle the form inputs and send our email.
 *
 * @since   1.0.0
 * @package Infinum\Theme
 */

namespace Infinum\Theme;

/**
 * Class Send_Email
 */
class Ajax_Posts {

  /**
   * Adding actions for ajax
   *
   * @since 1.0.0
   */
  public function __construct() {
    add_action( 'wp_ajax_ajax_posts', array( $this, 'ajax_posts' ) ); // This is for authenticated users.
    add_action( 'wp_ajax_nopriv_ajax_posts', array( $this, 'ajax_posts' ) ); // This is for unauthenticated users.
  }

  /**
   * Send email function
   *
   * @since 1.0.0
   */
  public function ajax_posts() {
    // This is a secure process to validate if this request comes from a valid source.
    check_ajax_referer( 'security-nonce', 'security' );

    /**
    * First we make some validations,
    * I think you are able to put better validations and sanitizations. =)
    */

    if ( isset( $_POST['post-type'] ) ) {
      $post_type = sanitize_text_field( wp_unslash( $_POST['post-type'] ) );
    }
    if ( isset( $_POST['post-per-page'] ) ) {
      $post_per_page = sanitize_text_field( wp_unslash( $_POST['post-per-page'] ) );
    }
    if ( isset( $_POST['tag'] ) ) {
      $tag = sanitize_text_field( wp_unslash( $_POST['tag'] ) );
    }
    if ( isset( $_POST['ignore-sticky'] ) ) {
      $ignore_sticky = sanitize_text_field( wp_unslash( $_POST['ignore-sticky'] ) );
    }
    if ( isset( $_POST['exclude-post'] ) ) {
      $exclude_post = sanitize_text_field( wp_unslash( $_POST['exclude-post'] ) );
    }

    $args = array(
        'post_type'           => array( $post_type ),
        'order_by'            => 'date',
        'order'               => 'DESC',
        'posts_per_page'      => $post_per_page,
        'post__not_in'        => explode( ',', $exclude_post ),
        'ignore_sticky_posts' => 1,
    );

    if ( isset( $_POST['page'] ) ) {
      $args['paged'] = sanitize_text_field( wp_unslash( $_POST['page'] + 1 ) ); // we need next page to be loaded.
    }

    $get_posts = new \WP_Query( $args );

    if ( $get_posts->have_posts() ) {
      while ( $get_posts->have_posts() ) {
        $get_posts->the_post();
        get_template_part( 'template-parts/listing/articles/grid' );

      }
    } else {

      get_template_part( 'template-parts/listing/articles/empty' );

    };

    exit();

  }
}
