<?php
/**
 * The Theme helpers functions.
 *
 * @since   1.0.0
 * @package Infinum\Theme
 */

namespace Infinum\Theme\Utils;

/**
 * Class General
 */
class Theme_Helpers {

  /**
   * Output allowed html
   *
   * @since Infinum Theme 1.0
   */
  public static function allowed_html() {
    $allowed_html = array(
        'a' => array(
            'class'  => array(),
            'href'   => array(),
            'rel'    => array(),
            'title'  => array(),
            'data-*' => true,
        ),
        'b' => array(),
        'br' => array(),
        'span' => array(
            'class' => array(),
            'title' => array(),
            'style' => array(),
        ),
        'del' => array(
            'datetime' => array(),
            'title' => array(),
        ),
        'dd' => array(),
        'div' => array(
            'class' => array(),
            'title' => array(),
            'style' => array(),
        ),
        'em' => array(),
        'ul' => array(
            'class' => array(),
        ),
        'ol' => array(
            'class' => array(),
        ),
        'li' => array(
            'class' => array(),
        ),
        'dl' => array(),
        'dt' => array(),
        'em' => array(),
        'h1' => array(),
        'h2' => array(),
        'h3' => array(),
        'h4' => array(),
        'h5' => array(),
        'h6' => array(),
        'img' => array(
            'alt'    => array(),
            'class'  => array(),
            'height' => array(),
            'src'    => array(),
            'width'  => array(),
        ),
        'input' => array(
            'accept' => array(),
            'class' => array(),
            'id' => array(),
            'align' => array(),
            'alt' => array(),
            'autocomplete' => array(),
            'autofocus' => array(),
            'clicked' => array(),
            'dirname' => array(),
            'disabled' => array(),
            'form' => array(),
            'formenctype' => array(),
            'formmethod' => array(),
            'formnovalidate' => array(),
            'formtarget' => array(),
            'height' => array(),
            'list' => array(),
            'max' => array(),
            'maxlength' => array(),
            'min' => array(),
            'multiple' => array(),
            'name' => array(),
            'pattern' => array(),
            'placeholder' => array(),
            'readonly' => array(),
            'required' => array(),
            'size' => array(),
            'step' => array(),
            'type' => array(),
            'value' => array(),
            'width' => array(),
        ),
        'strong' => array(),
        'pre' => array(),
        'code' => array(),
        'blockquote' => array(
            'cite' => true,
        ),
        'i' => array(
            'class' => array(),
        ),
        'cite' => array(
            'title' => array(),
        ),
        'abbr' => array(
            'title' => true,
        ),
        'select' => array(
            'id'   => array(),
            'class' => array(),
            'name' => array(),
        ),
        'option' => array(
            'value' => array(),
            'selected' => array(),
        ),
        'strike' => array(),
    );

    return $allowed_html;
  }
}
