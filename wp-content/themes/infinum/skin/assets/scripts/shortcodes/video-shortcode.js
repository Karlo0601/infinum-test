jQuery(document).ready(function() {
  const {tinymce, tinyMCE} = window.tinymce;
  tinymce.create('tinymce.plugins.video_plugin', {
    init(ed, url) {

      // Register command for when button is clicked
      ed.addCommand('video_insert_shortcode', function() {
        const selected = tinyMCE.activeEditor.selection.getContent();
        let content = '';
        if (selected) {

          // If text is selected when button is clicked
          // Wrap shortcode around it.
          content = `[responsive-video identifier="${selected}" poster="POSTER IMAGE URL" video-title="VIDEO TITLE"]`;
        } else {
          content = '[responsive-video identifier="VIDEO ID" poster="POSTER IMAGE URL" video-title="VIDEO TITLE"]';
        }

        tinymce.execCommand('mceInsertContent', false, content);
      });

      // Register buttons - trigger above command when clicked
      ed.addButton('video_button', {
        title: 'Insert button',
        cmd: 'video_insert_shortcode',
        image: `${url}../../../images/video.png`,
      });
    },
  });

  // Register our TinyMCE plugin
  // first parameter is the button ID1
  // second parameter must match the first parameter of the tinymce.create() function above
  tinymce.PluginManager.add('video_button', tinymce.plugins.video_plugin);
});
