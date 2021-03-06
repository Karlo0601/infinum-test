<?php
/**
 * The Pagination specific functionality.
 *
 * @since   1.0.0
 * @package Infinum\Theme
 */

namespace Infinum\Theme;

/**
 * Class Pagination
 */
class Pagination {

  /**
   * Posts next attibutes
   *
   * @return string Return class for link
   *
   * @since 1.0.0
   */
  public function pagination_link_next_class() {
    return 'class="page-numbers next"';
  }

  /**
   * Posts prev attibutes
   *
   * @return string Return class for link
   *
   * @since 1.0.0
   */
  public function pagination_link_prev_class() {
    return 'class="page-numbers prev"';
  }
}
