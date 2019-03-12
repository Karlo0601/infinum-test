<?php
/**
 * Display regular Search page
 *
 * @package Infinum
 */

get_header();
?>
<div class="container">
<?php
get_template_part( 'template-parts/header/search', 'form' );
?>
<div class="articles-grid__container js-load-more-container">
<?php
if ( have_posts() ) {
  while ( have_posts() ) {
    the_post();
    get_template_part( 'template-parts/listing/articles/grid' );
  }

  the_posts_pagination();

} else {

  get_template_part( 'template-parts/listing/articles/empty' );

};
?>
</div>

</div>

<?php
get_footer();
