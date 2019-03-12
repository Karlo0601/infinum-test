<?php
/**
 * Sticky Simple Article
 *
 * @package Infinum\Template_Parts\Listing\Articles
 */

use Infinum\Theme\Utils\Images;

$image = Images::get_post_image( 'full_width' );
?>
<article class="article-sticky">
  <div class="article-sticky__container">
    <div class="article-sticky__image">
      <a class="article-sticky__image-link" href="<?php the_permalink(); ?>" style="background-image:url(<?php echo esc_url( $image['image'] ); ?>)"></a>
    </div>
    <div class="article-sticky__content">
      <header>
        <h2 class="article-sticky__heading">
          <a class="article-sticky__heading-link" href="<?php the_permalink(); ?>">
          <?php esc_html( the_title() ); ?>
          </a>
        </h2>
      </header>
      <div class="article-sticky__excerpt">
        <?php the_excerpt(); ?>
      </div>
    </div>
  </div>
  <?php require locate_template( 'template-parts/parts/google-rich-snippets.php' ); ?>
</article>
