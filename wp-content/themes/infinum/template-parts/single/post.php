<?php
/**
 * Single Post
 *
 * @package Infinum\Template_Parts\Single
 */

use Infinum\Theme\Utils\Images;
use Infinum\Theme\Utils\Theme_Helpers;

$image        = Images::get_post_image( 'full_width' );
$author       = get_the_author();
$allowed_html = Theme_Helpers::allowed_html();
$tags         = get_the_tags();
$output       = '';
if ( ! empty( $tags ) ) {

  foreach ( $tags as $tag_term ) {

    $output .= '<li><a href="' . esc_url( get_category_link( $tag_term->term_id ) ) . '" alt="' . esc_attr( sprintf( __( 'View all posts in %s', 'infinum' ), $tag_term->name ) ) . '">' . esc_html( $tag_term->name ) . '</a></li>';

  }
}
?>

<!-- Single Content Section -->
<section class="single-post" id="<?php echo esc_attr( $post->ID ); ?>">
  <div class="single-post__image" data-normal="<?php echo esc_url( $image['image'] ); ?>">
     <h1 class="single-post__title">
      <?php the_title(); ?>
    </h1>
    <p class="single-post__author"><i class="icon-ic-writer"></i><?php echo esc_html( $author ); ?></p>
    <a href=" <?php echo esc_url( home_url() ); ?>" class="single-post__back-to-blog"><?php echo esc_html__( 'Back to Blog' ); ?></a>
  </div>
  <div class="single-post__content content-style content-media-style">
    <?php the_content(); ?>
    <ul class="single-post__tags">
      <?php echo wp_kses( $output, $allowed_html ); ?>
    </ul>
  </div>
  <?php
  if ( has_tag() !== '' ) {
    $related_post_title = get_theme_mod( 'related_posts_title', 'More Magic' );
    ?>
    <div class="related-posts">
      <?php if ( isset( $related_post_title ) && '' !== $related_post_title ) { ?>
        <h3 class="related-posts__title"><?php echo esc_html( $related_post_title ); ?></h3>
      <?php } ?>
      <?php
      $tags = get_the_terms( get_the_ID(), 'post_tag' );
      if ( $tags ) {
        $tax_ids = array();
        foreach ( $tags as $individual_tax ) {
          $tax_ids[] = $individual_tax->term_id;
        }
        $args    = array(
            'tag__in'             => $tax_ids,
            'post__not_in'        => array( get_the_ID() ),
            'posts_per_page'      => 1,
            'ignore_sticky_posts' => 1,
        );
        $related = new WP_Query( $args );
      }
      if ( isset( $related ) && $related->have_posts() ) {
        while ( $related->have_posts() ) {
          $related->the_post();
          ?>
          <div class="related-post">
            <div class="related-post__thumbnail">
              <a href="<?php echo esc_url( get_the_permalink() ); ?>"><?php echo get_the_post_thumbnail(); ?></a>
            </div>
            <div class="related-post__content">
              <a href="<?php echo esc_url( get_the_permalink() ); ?>" class="related-post__title"><?php echo get_the_title(); ?></a>
              <div class="related-post__excerpt"><?php echo esc_html( wp_trim_words( get_the_excerpt(), 17, '...' ) ); ?></div>
              <a class="related-post__read-more-link" href="<?php echo esc_url( get_the_permalink() ); ?>"><?php echo esc_html( 'Read more', 'infinum' ); ?></a>
            </div>
          </div>
          <?php
        }
      }
      ?>
    </div>
    <?php } ?>
  <?php require locate_template( 'template-parts/parts/google-rich-snippets.php' ); ?>
</section>
