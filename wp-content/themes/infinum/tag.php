<?php
/**
 * Display Tag archive
 *
 * @package Infinum
 */

 use Infinum\Helpers\General_Helper;
 use Infinum\Theme\Utils\Theme_Helpers;

get_header();

$load_more = General_Helper::inf_do_shortcode(
  'loadmore',
  array(
      'container'     => 'js-load-more-container',
      'post-type'     => 'post',
      'post-per-page' => '6',
      'label'         => 'Load more',
      'tag'           => get_query_var( 'tag' ),
  )
);

$allowed_html = Theme_Helpers::allowed_html();

if ( have_posts() ) { ?>

  <!-- Page Title -->
  <header class="search-articles__header">
    <h1 class="search-articles__header-title">
      <?php
      // translators: 1: Search Query.
      printf( esc_html__( 'Search Results for: %s', 'infinum' ), '<span>' . get_search_query() . '</span>' );
      ?>
    </h1>
  </header>
<?php } ?>

<div class="container">

  <div class="articles-grid__container js-load-more-container">
  <?php
  $paged_tags = ( get_query_var( 'paged' ) ) ? get_query_var( 'paged' ) : 1;
  $args       = array(
      'post_type'           => array( 'post' ),
      'order_by'            => 'date',
      'order'               => 'DESC',
      'posts_per_page'      => 6,
      'paged'               => $paged_tags,
      'tag'                 => get_query_var( 'tag' ),
  );
  $tags_posts = new WP_Query( $args );
  if ( $tags_posts->have_posts() ) {
    while ( $tags_posts->have_posts() ) {
      $tags_posts->the_post();
      get_template_part( 'template-parts/listing/articles/grid' );
    };

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
