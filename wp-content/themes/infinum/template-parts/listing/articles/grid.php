<?php
/**
 * Grid Article
 *
 * @package Infinum\Template_Parts\Listing\Articles
 */

use Infinum\Theme\Utils\Images;
use Infinum\Theme\Utils\Excerpt;
use Infinum\Helpers\General_Helper;

$image        = Images::get_post_image( 'grid' );
$excerpt      = Excerpt::get_excerpt( get_the_excerpt(), 155, true );
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

    $output .= '<li><a href="' . esc_url( get_category_link( $category->term_id ) ) . '" alt="' . esc_attr( sprintf( __( 'View all posts in %s', 'infinum' ), $category->name ) ) . '">' . esc_html( $category->name ) . '</a></li>';

  }
}
$icon_comment = General_Helper::get_manifest_assets_data( 'ic-comment.svg' );
$icon_feves   = General_Helper::get_manifest_assets_data( 'ic-heart.svg' );
if ( is_sticky() ) {
  $sticky = 'sticky';
}
?>
<article class="article-grid <?php echo esc_attr( $sticky ); ?>">
  <div class="article-grid__container">
  <a class="article-grid__image" href="<?php the_permalink(); ?>">
    <img src="<?php echo esc_url( $image['image'] ); ?>" width="<?php echo esc_url( $image['width'] ); ?>" height="<?php echo esc_url( $image['height'] ); ?>" alt="<?php esc_html( the_title() ); ?>">
  </a>
  <div class="article-grid__content">
    <header>
    <span class="article-grid__date"><?php echo esc_html( get_the_date( 'F d,Y' ) ); ?></span>
    <h2 class="article-grid__heading">
      <a class="article-grid__heading-link" href="<?php the_permalink(); ?>">
        <?php esc_html( the_title() ); ?>
      </a>
    </h2>
    <ul class="article-grid__categories">
      <?php echo wp_kses( $output, $allowed_html ); ?>
    </ul>
    </header>
    <div class="article-grid__excerpt">
      <?php echo wp_kses( $excerpt, $allowed_html ); ?>
    </div>
    <footer>
      <div class="article-grid__favorites">
        <?php comments_number( '0 faves', '1 faves', '% faves' ); ?>
      </div>
      <div class="article-grid__comments">
        <?php comments_number( '0 comments', '1 comments', '% comments' ); ?>
      </div>
    </footer>
  </div>
  </div>
  <?php require locate_template( 'template-parts/parts/google-rich-snippets.php' ); ?>
</article>
