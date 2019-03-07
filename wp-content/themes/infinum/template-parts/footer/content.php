<?php
/**
 * Display footer content
 *
 * @package Infinum\Template_Parts\Footer
 */

use Infinum\Helpers\General_Helper;

$copyright        = get_theme_mod( 'footer_copyright' );
$blog_name        = get_bloginfo( 'name' );
$blog_description = get_bloginfo( 'description' );
$footer_logo_info = $blog_name . ' - ' . $blog_description;
$logo_footer_img  = General_Helper::get_manifest_assets_data( 'logo.png' );
?>

<footer class="footer">
  <div class="footer__container">
  <!-- insert content here -->
  <a class="footer__logo-link" href="<?php echo esc_url( home_url() ); ?>" title="<?php echo esc_attr( $blog_name ); ?>">
    <img class="footer__logo-img" src="<?php echo esc_url( $logo_footer_img ); ?>" title="<?php echo esc_attr( $footer_logo_info ); ?>" alt="<?php echo esc_attr( $footer_logo_info ); ?>" />
  </a>
  <?php
  if ( $copyright ) {
    echo '<p>' . esc_html( $copyright ) . '</p>';
  }
  ?>
  </div>
</footer>
