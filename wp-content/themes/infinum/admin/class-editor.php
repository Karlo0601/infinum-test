<?php
/**
 * The Wysiwyg editor specific functionality.
 *
 * @since   1.0.0
 * @package Infinum\Admin
 */

namespace Infinum\Admin;

/**
 * Class Editor
 */
class Editor {

  /**
   * Add theme specific styles to editor
   *
   * @since 1.0.0
   */
  public function add_editor_styles() {
    add_editor_style( '/skin/public/styles/applicationAdmin.css' );
  }

}
