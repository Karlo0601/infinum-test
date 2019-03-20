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
$footer_facebook  = get_theme_mod( 'footer_facebook', '' );
$footer_twitter   = get_theme_mod( 'footer_twitter', '' );
$footer_instagram = get_theme_mod( 'footer_instagram', '' );
?>

<footer class="footer">
  <div class="footer__container">
    <div class="footer__left-half">
      <!-- insert content here -->
      <a class="footer__logo-link" href="<?php echo esc_url( home_url() ); ?>" title="<?php echo esc_attr( $blog_name ); ?>">
        <img class="footer__logo-img" src="<?php echo esc_url( $logo_footer_img ); ?>" title="<?php echo esc_attr( $footer_logo_info ); ?>" alt="<?php echo esc_attr( $footer_logo_info ); ?>" />
      </a>
      <?php
      if ( $copyright ) {
        echo '<p class="footer__copyright">' . esc_html( $copyright ) . '</p>';
      }
      ?>
    </div>
    <div class="footer__right-half">
      <ul class="footer__socials">
        <?php
        if ( isset( $footer_facebook ) && '' !== $footer_facebook ) {
          ?>
          <li class="footer__social-link">
            <?php esc_html_e( 'Like ', 'infinum' ); ?>
            <a href="<?php echo esc_url( $footer_facebook ); ?>">
            <?php esc_html_e( 'Uniduck', 'infinum' ); ?>
            </a>
            <?php esc_html_e( ' on ', 'infinum' ); ?>
            <i class="icon-ic-facebook"></i>
          </li>
          <?php
        }
        if ( isset( $footer_twitter ) && '' !== $footer_twitter ) {
          ?>
          <li class="footer__social-link">
            <?php esc_html_e( 'Like ', 'infinum' ); ?>
            <a href="<?php echo esc_url( $footer_twitter ); ?>">
            <?php esc_html_e( '@uniduck', 'infinum' ); ?>
            </a>
            <?php esc_html_e( ' on ', 'infinum' ); ?>
            <i class="icon-ic-twitter"></i>
          </li>
          <?php
        }
        if ( isset( $footer_instagram ) && '' !== $footer_instagram ) {
          ?>
          <li class="footer__social-link">
            <?php esc_html_e( 'Like ', 'infinum' ); ?>
            <a href="<?php echo esc_url( $footer_instagram ); ?>">
            <?php esc_html_e( '@uniduck', 'infinum' ); ?>
            </a>
            <?php esc_html_e( ' on ', 'infinum' ); ?>
            <i class="icon-ic-instagram"></i>
          </li>
          <?php
        }
        ?>
      </ul>
    </div>
  </div>
</footer>
