import {ScrollToElement} from './scroll-to';
import {Lazyloading} from './lazyloading';
import {LoadMore} from './loadmore';
import {mobileMenu} from './mobilemenu';
import {VideoPoster} from './videoposter';

$(function() {
  const scrollTo = new ScrollToElement();
  const lazyLoading = new Lazyloading();
  const loadMore = new LoadMore();
  const videoPoster = new VideoPoster();

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

  // -------------------------------------------------------------
  // Video poster
  videoPoster.videoPlayEvent();
  videoPoster.videoPlayEvent();
  videoPoster.videoPlayEvent();
});
