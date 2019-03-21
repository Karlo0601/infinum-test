<?php
/**
 * Main header bar
 *
 * @package Infinum\Template_Parts\Header
 */

use Infinum\Admin\Menu\Menu;
use Infinum\Helpers\General_Helper;

$main_menu        = new Menu();
$blog_name        = get_bloginfo( 'name' );
$blog_description = get_bloginfo( 'description' );
$header_logo_info = $blog_name . ' - ' . $blog_description;
$custom_logo_id   = get_theme_mod( 'custom_logo' );
$logo             = wp_get_attachment_image_src( $custom_logo_id, 'full' );
if ( has_custom_logo() ) {
  $logo_img = $logo[0];
} else {
  $logo_img = General_Helper::get_manifest_assets_data( 'logo.png' );
}

$get_ios_label        = get_theme_mod( 'get_ios_label' );
$unicorn_owners_label = get_theme_mod( 'unicorn_owners_label' );
$get_for_ios_link     = get_theme_mod( 'get_ios_link' );
$unicorn_owners_link  = get_theme_mod( 'unicorn_owners_link' );

?>
<div class="header">
  <div class="header__container">
    <!-- start:Logo -->
    <a class="header__logo-link" href="<?php echo esc_url( home_url() ); ?>" title="<?php echo esc_attr( $blog_name ); ?>">
      <img class="header__logo-img" src="<?php echo esc_url( $logo_img ); ?>" title="<?php echo esc_attr( $header_logo_info ); ?>" alt="<?php echo esc_attr( $header_logo_info ); ?>" />
    </a>
    <!-- End:Logo -->
    <!-- start:responsive buttons -->
      <div class="resp-buttons right">
        <div id="js-resp-menu-toggle" class="hamburger-menu">
          <div class="hamburger-menu__bar"></div>
        </div>
      </div>
    <!-- end:responsive buttons -->
    <!-- start:Navigation -->
    <div class="main-navigation__container">
    <?php
    echo esc_html( $main_menu->bem_menu( 'header_main_nav', 'main-navigation' ) );

    if ( ! empty( $get_for_ios_link ) && ! empty( $get_ios_label ) ) {
      echo '<button href="' . esc_url( $get_for_ios_link ) . '" class="btn btn--get-for-ios"><i class="icon-ic-apple"></i>' . esc_html( $get_ios_label ) . '</button>';
    }
    if ( ! empty( $unicorn_owners_link ) && ! empty( $unicorn_owners_label ) ) {
      echo '<button href="' . esc_url( $unicorn_owners_link ) . '" class="btn btn--unicorn-owners"><i class="icon-ic-unicorn"></i>' . esc_html( $unicorn_owners_label ) . '</button>';
    }
    ?>
    </div>
    <!-- end:Navigation -->

  </div>
</div>
