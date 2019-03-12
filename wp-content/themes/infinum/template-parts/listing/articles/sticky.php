<?php
/**
 * List Simple Article
 *
 * @package Infinum\Template_Parts\Listing\Articles
 */

use Infinum\Theme\Utils\Images;
use Infinum\Theme\Utils\Excerpt;
use Infinum\Includes\Internationalization;
use Infinum\Helpers\General_Helper;

$image        = Images::get_post_image( 'sticky' );
$excerpt      = Excerpt::get_excerpt( get_the_excerpt(), 165, true );
$allowed_html = array(
    'a' => array(
        'href' => array(),
        'title' => array(),
        'alt' => array(),
    ),
    'li' => array(),
);
$categories   = get_the_category();
$output       = '';
if ( ! empty( $categories ) ) {

  foreach ( $categories as $category ) {

    $output .= '<li><a href="' . esc_url( get_category_link( $category->term_id ) ) . '" alt="' . esc_attr( sprintf( __( 'View all posts in %s', 'textdomain' ), $category->name ) ) . '">' . esc_html( $category->name ) . '</a></li>';

  }
}
$icon_comment = General_Helper::get_manifest_assets_data( 'ic-comment.svg' );
$icon_feves   = General_Helper::get_manifest_assets_data( 'ic-heart.svg' );
?>
<article class="article-sticky">
  <div class="article-sticky__container">
    <div class="article-sticky__image">
      <a class="article-sticky__image-link" href="<?php the_permalink(); ?>">
        <img src="<?php echo esc_url( $image['image'] ); ?>" width="<?php echo esc_url( $image['width'] ); ?>" height="<?php echo esc_url( $image['height'] ); ?>" alt="<?php esc_html( the_title() ); ?>">
      </a>
    </div>
    <div class="article-sticky__content">
      <header>
        <h2 class="article-sticky__heading">
          <a class="article-sticky__heading-link" href="<?php the_permalink(); ?>">
          <?php esc_html( the_title() ); ?>
          </a>
        </h2>
        <ul class="article-sticky__categories">
          <?php echo wp_kses( $output, $allowed_html ); ?>
        </ul>
      </header>
      <div class="article-sticky__excerpt">
        <?php echo wp_kses( $excerpt, $allowed_html ); ?>
      </div>
    </div>
  </div>
  <?php require locate_template( 'template-parts/parts/google-rich-snippets.php' ); ?>
</article>
