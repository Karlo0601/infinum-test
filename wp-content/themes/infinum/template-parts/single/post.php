<?php
/**
 * Single Post
 *
 * @package Infinum\Template_Parts\Single
 */

use Infinum\Theme\Utils\Images;

$image  = Images::get_post_image( 'full_width' );
$author = get_the_author();
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
  </div>
  <?php require locate_template( 'template-parts/parts/google-rich-snippets.php' ); ?>
</section>
