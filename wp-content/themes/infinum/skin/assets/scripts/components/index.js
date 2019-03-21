import {ScrollToElement} from './scroll-to';
import {Lazyloading} from './lazyloading';
import {LoadMore} from './loadmore';
import {mobileMenu} from './mobilemenu';

$(function() {
  const scrollTo = new ScrollToElement();
  const lazyLoading = new Lazyloading();
  const loadMore = new LoadMore();

  // -------------------------------------------------------------
  // scrollTo
  scrollTo.scrolltoGlobalElement();
  scrollTo.scrolltoTopElement();

  // -------------------------------------------------------------
  // lazyLoading
  lazyLoading.init();

  // -------------------------------------------------------------
  // lazyLoading
  loadMore.loadMorePosts();

  // -------------------------------------------------------------
  // Mobile Menu
  mobileMenu();
});
