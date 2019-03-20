<?php
/**
 * Single page for Posts
 *
 * @package Infinum
 */

use Infinum\Theme\Utils\Post_View_Count;

get_header();

if ( have_posts() ) {
  while ( have_posts() ) {
    the_post();
    Post_View_Count::post_views_counter( get_the_ID() );
    get_template_part( 'template-parts/single/post' );
  }
}

get_footer();
