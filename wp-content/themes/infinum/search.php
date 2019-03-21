<?php
/**
 * Display regular search page with
 * title and regular listing sorted by date
 *
 * @package Infinum
 */

get_header();

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

<!-- Listing Section -->
<div class="search-articles__container js-load-more-container">
<?php
if ( have_posts() ) {
  while ( have_posts() ) {
    the_post();
    get_template_part( 'template-parts/listing/articles/grid' );
  };

  the_posts_pagination(
    array(
        'screen_reader_text' => ' ',
    )
  );

} else {
  get_template_part( 'template-parts/listing/articles/empty' );

};
?>
</div>
<?php
get_footer();
