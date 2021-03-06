<?php
/**
 * Grid Article
 *
 * @package Infinum\Template_Parts\Listing\Articles
 */

use Infinum\Theme\Utils\Images;
use Infinum\Theme\Utils\Excerpt;
use Infinum\Helpers\General_Helper;
use Infinum\Theme\Utils\Post_View_Count;
use Infinum\Theme\Utils\Theme_Helpers;

$image        = Images::get_post_image( 'grid-sticky' );
$excerpt      = Excerpt::get_excerpt( get_the_excerpt(), 155, true );
$allowed_html = Theme_Helpers::allowed_html();

$tags   = get_the_tags();
$output = '';
if ( ! empty( $tags ) ) {

  foreach ( $tags as $tag_term ) {

    $output .= '<li><a href="' . esc_url( get_category_link( $tag_term->term_id ) ) . '" alt="' . esc_attr( sprintf( __( 'View all posts in %s', 'infinum' ), $tag_term->name ) ) . '">' . esc_html( $tag_term->name ) . '</a></li>';

  }
}
?>
<article class="article-grid article-grid--sticky">

  <div class="article-grid__container">
  <a class="article-grid__image" href="<?php the_permalink(); ?>">
    <img src="<?php echo esc_url( $image['image'] ); ?>" width="<?php echo esc_attr( $image['width'] ); ?>" height="<?php echo esc_attr( $image['height'] ); ?>" alt="<?php esc_html( the_title() ); ?>">
  </a>
  <div class="article-grid__content">
    <header>
    <span class="article-grid__date"><?php echo esc_html( get_the_date( 'F d,Y' ) ); ?></span>
    <h2 class="article-grid__heading">
      <a class="article-grid__heading-link" href="<?php the_permalink(); ?>">
        <?php esc_html( the_title() ); ?>
      </a>
    </h2>
    <ul class="article-grid__tags">
      <?php echo wp_kses( $output, $allowed_html ); ?>
    </ul>
    </header>
    <div class="article-grid__excerpt">
      <?php echo wp_kses( $excerpt, $allowed_html ); ?>
    </div>
    <footer>
      <div class="article-grid__favorites">
        <i class="icon-ic-heart"></i>
        <?php printf( esc_html( '%s faves', 'infinum-theme' ), esc_html( Post_View_Count::post_views_output( get_the_ID() ) ) ); ?>
      </div>
      <div class="article-grid__comments">
        <i class="icon-ic-comment"></i>
        <?php comments_number( '0 comments', '1 comments', '% comments' ); ?>
      </div>
    </footer>
  </div>
  </div>
  <?php require locate_template( 'template-parts/parts/google-rich-snippets.php' ); ?>
</article>
