export class LoadMore {
  constructor(
    globalElement = '.js-load-more',
    globalContainer = '.js-load-more-container',
  ) {
    this.globalElement = globalElement;
    this.globalContainer = globalContainer;
  }

  loadMorePosts() {
    $(this.globalElement).on('click', function(event) {
      event.preventDefault();
      const button = $(this);
      const {
        ajaxnonce,
        ajaxurl,
        maxpage,
      } = window.themeLocalization;
      let {currentpage} = window.themeLocalization;
      const data = {
        action: 'ajax_posts',
        'post-type': button.attr('data-post-type'),
        'post-per-page': button.attr('data-post-per-page'),
        tag: button.attr('data-tag'),
        page: window.themeLocalization.currentpage,
        'ignore-sticky': button.attr('ignore-sticky'),
        'exclude-post': button.attr('data-exclude-post'),
        security: ajaxnonce,
      };


      const container = button.attr('data-container');

      $.ajax({
        url: ajaxurl, // AJAX handler
        data,
        type: 'POST',
        beforeSend() {
          button.text('Loading...'); // change the button text, you can also add a preloader image
        },
        success(response) {

          if (response) {
            button.text('Load more');
            $(`.${container}`).append(response); // insert new posts
            if (window.themeLocalization.currentpage >= maxpage) {
              button.text('No more posts').attr('disabled', true); // if last page, remove the button
            }
            window.themeLocalization.currentpage++;
          } else {
            button.text('No more posts').attr('disabled', true); // if no data, remove the button as well
          }
        },
        fail(err) {

          // You can craft something here to handle an error if something goes wrong when doing the AJAX request.
          window.alert(`There was an error: ${err}`);
        },
      });
    });
  }
}
