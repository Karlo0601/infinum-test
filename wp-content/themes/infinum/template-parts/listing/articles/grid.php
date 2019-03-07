<?php
/**
 * Grid Article
 *
 * @package Infinum\Template_Parts\Listing\Articles
 */

use Infinum\Theme\Utils\Images;

$image = Images::get_post_image( 'grid' );
?>
<article class="article-grid">
  <div class="article-grid__container">
  <a class="article-grid__image" href="<?php the_permalink(); ?>" style="background-image:url(<?php echo esc_url( $image['image'] ); ?>)"></a>
  <div class="article-grid__content">
    <header>
    <span class="article-grid__date"><?php echo esc_html( get_the_date( 'F d,Y' ) ); ?></span>
    <h2 class="article-grid__heading">
      <a class="article-grid__heading-link" href="<?php the_permalink(); ?>">
        <?php esc_html( the_title() ); ?>
      </a>
    </h2>
    </header>
    <div class="article-grid__excerpt">
      <?php the_excerpt(); ?>
    </div>
  </div>
  </div>
  <?php require locate_template( 'template-parts/parts/google-rich-snippets.php' ); ?>
</article>
