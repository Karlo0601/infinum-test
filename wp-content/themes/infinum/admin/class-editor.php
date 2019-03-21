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

   /**
    * Register quotes button
    *
    * @since 1.0.0
    */
  public function tiny_mce_new_buttons() {
    add_filter( 'mce_external_plugins', array( $this, 'tiny_mce_add_buttons' ) );
    add_filter( 'mce_buttons', array( $this, 'tiny_mce_register_buttons' ) );
  }

  /**
   * Add our button to the TinyMCE toolbar
   *
   * @since 1.0.0
   */
  public function quote_shortcode_button_init() {

    // Abort early if the user will never see TinyMCE.
    if ( ! current_user_can( 'edit_posts' ) && ! current_user_can( 'edit_pages' ) && get_user_option( 'rich_editing' ) === 'true' ) {
      return;
    }

    // Add a callback to regiser our tinymce plugin.
    add_filter( 'mce_external_plugins', array( $this, 'quote_register_tinymce_plugin' ) );

    // Add a callback to add our button to the TinyMCE toolbar.
    add_filter( 'mce_buttons', array( $this, 'quote_add_tinymce_button' ) );
  }

  /**
   * This callback registers our plug-in.
   *
   * @param Array $plugin_array  Plugin array.
   *
   * @since 1.0.0
   */
  public function quote_register_tinymce_plugin( $plugin_array ) {
    $plugin_array['quote_button'] = get_template_directory_uri() . '/skin/assets/scripts/shortcodes/quote-shortcode.js';
    $plugin_array['video_button'] = get_template_directory_uri() . '/skin/assets/scripts/shortcodes/video-shortcode.js';
    return $plugin_array;
  }

  /**
   * This callback adds our button to the toolbar.
   *
   * @param Array $buttons  Buttons array.
   *
   * @since 1.0.0
   */
  public function quote_add_tinymce_button( $buttons ) {
        // Add the button ID to the $button array.
    $buttons[] = 'quote_button';
    $buttons[] = 'video_button';
    return $buttons;
  }

}
