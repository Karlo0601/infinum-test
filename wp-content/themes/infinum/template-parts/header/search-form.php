<?php
/**
 * Header Search form
 *
 * @package Infinum\Template_Parts\Header
 */

 $search_title = get_theme_mod( 'website_search_title' );
?>
<section class="search-form">
  <div class="container">
    <?php
    if ( $search_title ) {
      echo '<h2 class="search-form__title">' . esc_html( $search_title ) . '</h2>';
    }
    ?>
    <form role="search" id="search-form" method="get" class="search-form__form js-header-search-form" action="<?php echo esc_url( home_url( '/' ) ); ?>" >
      <button form="search-form" class="search-form__button"><i class="icon-ic-search"></i></button>
      <input type="text" value="<?php echo get_search_query(); ?>" name="s" id="s" class="search-form__input js-search-form-input input" placeholder="<?php esc_html_e( 'Type in search', 'infinum' ); ?>" />
      <input type="hidden" name="post_type" value="any" />
    </form>
  </div>
</section>
