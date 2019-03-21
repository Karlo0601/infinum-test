export class LoadMore {
  constructor(globalElement = '.js-load-more', ) {
    this.globalElement = globalElement;
  }
  loadMorePosts() {
    $(this.globalElement).on('click', function(event) {
      event.preventDefault();
      const button = $(this);
      const data = {
        action: 'ajax_posts',
        'post-type': button.attr('data-post-type'),
        'post-per-page': button.attr('data-post-per-page'),
        tag: button.attr('data-tag'),
        page: themeLocalization.current_page,
        'ignore-sticky': button.attr('ignore-sticky'),
        security: themeLocalization.ajax_nonce,
      };


      const container = button.attr('data-container');

      $.ajax({
        url: themeLocalization.ajaxurl, // AJAX handler
        data,
        type: 'POST',
        beforeSend(xhr) {
          button.text('Loading...'); // change the button text, you can also add a preloader image
        },
        success(data) {

          if (data) {
            button.text('Load more');
            $(`.${container}`).append(data); // insert new posts
            if (themeLocalization.current_page >= themeLocalization.max_page) {
              button.text('No more posts').attr('disabled', true); // if last page, remove the button
            }
            themeLocalization.current_page++;
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
