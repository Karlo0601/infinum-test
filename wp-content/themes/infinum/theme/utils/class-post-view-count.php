<?php
/**
 * The Post View Counter specific functionality.
 *
 * @since   1.0.0
 * @package Infinum\Theme
 */

namespace Infinum\Theme\Utils;

/**
 * Class General
 */
class Post_View_Count {

  /**
   * Output post views
   *
   * @param int $post_id Current post ID.
   * @since Infinum Theme 1.0
   */
  public static function post_views_output( $post_id ) {
    $count_key = 'post_views_count';
    $count     = get_post_meta( $post_id, $count_key, true );

    if ( $count === '' ) {

        delete_post_meta( $post_id, $count_key );
        add_post_meta( $post_id, $count_key, '0' );
        return '0';

    }
    return $count;
  }

  /**
   * Set post views
   *
   * @param int $post_id Current post ID.
   * @since Infinum Theme 1.0
   */
  public static function post_views_counter( $post_id ) {
    $count_key = 'post_views_count';
    $count     = get_post_meta( $post_id, $count_key, true );
    if ( $count === '' ) {

        $count = 0;
        delete_post_meta( $post_id, $count_key );
        add_post_meta( $post_id, $count_key, '0' );

    } elseif ( ! is_user_logged_in() ) {
        $count++;
        update_post_meta( $post_id, $count_key, $count );
    }
  }

}
