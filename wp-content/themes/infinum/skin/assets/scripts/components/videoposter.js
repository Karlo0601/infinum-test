export class VideoPoster {
  constructor(
    playElement = '.js-video-poster',
    containerElement = '.js-video-container',
  ) {
    this.playElement = playElement;
    this.containerElement = containerElement;
  }
  videoPlayEvent() {
    $(this.playElement).on('click', function(ev) {
      ev.preventDefault();
      const $poster = $(this);
      const $wrapper = $poster.closest(this.containerElement);
      this.videoPlay($wrapper);
    });
  }

  // play the targeted video (and hide the poster frame)
  videoPlay($wrapper) {
    const $iframe = $wrapper.find(this.playElement);
    const src = $iframe.data('src');

    // hide poster
    $wrapper.addClass('videoWrapperActive');

    // add iframe src in, starting the video
    $iframe.attr('src', src);
  }

  // stop the targeted/all videos (and re-instate the poster frames)
  videoStop($wrapper) {

    // if we're stopping all videos on page
    if (!$wrapper) {
      const $wrapper = $(this.containerElement);
      const $iframe = $(this.playElement);

      // if we're stopping a particular video
    } else {
      const $iframe = $wrapper.find(this.playElement);
    }

    // reveal poster
    $wrapper.removeClass('videoWrapperActive');

    // remove youtube link, stopping the video from playing in the background
    $iframe.attr('src', '');
  }
}
