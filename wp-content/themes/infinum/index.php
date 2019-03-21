<?php
/**
 * Display regular index/home page
 *
 * @package Infinum
 */

 use Infinum\Helpers\General_Helper;
 use Infinum\Theme\Utils\Theme_Helpers;

get_header();

$load_more    = General_Helper::inf_do_shortcode(
  'loadmore',
  array(
      'container'     => 'js-load-more-container',
      'post-type'     => 'post',
      'post-per-page' => '6',
      'label'         => 'Load more',
  )
);
$allowed_html = Theme_Helpers::allowed_html();
?>
<div class="container">

<?php
get_template_part( 'template-parts/header/search', 'form' );
?>

<div class="articles-grid__sticky-post">
  <?php
  $sticky       = get_option( 'sticky_posts' );
  $args_sticky  = array(
      'posts_per_page' => 1,
      'post__in'  => $sticky,
      'ignore_sticky_posts' => 1,
  );
  $sticky_query = new WP_Query( $args_sticky );
  if ( $sticky_query->have_posts() ) {
    while ( $sticky_query->have_posts() ) {
      $sticky_query->the_post();
      $exclude_post = array();
      get_template_part( 'template-parts/listing/articles/sticky' );
      $exclude_post[] = get_the_ID();
    }
  }
  ?>
</div>

<div class="articles-grid__container js-load-more-container">
<?php
$paged_archive = ( get_query_var( 'paged' ) ) ? get_query_var( 'paged' ) : 1;
$args          = array(
    'post_type'           => array( 'post' ),
    'order_by'            => 'date',
    'order'               => 'DESC',
    'posts_per_page'      => 6,
    'post__not_in'        => $exclude_post,
    'paged'               => $paged_archive,
    'ignore_sticky_posts' => 1,
);
$archive_posts = new WP_Query( $args );
if ( $archive_posts->have_posts() ) {
  while ( $archive_posts->have_posts() ) {
    $archive_posts->the_post();
    get_template_part( 'template-parts/listing/articles/grid' );

  }
} else {

  get_template_part( 'template-parts/listing/articles/empty' );

};
?>
</div>
<?php

  echo wp_kses( $load_more, $allowed_html );

?>
</div>

<?php
get_footer();
