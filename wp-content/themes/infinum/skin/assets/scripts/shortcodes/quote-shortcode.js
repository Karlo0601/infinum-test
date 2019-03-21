jQuery(document).ready(function() {
  tinymce.create('tinymce.plugins.quote_plugin', {
    init(ed, url) {

      // Register command for when button is clicked
      ed.addCommand('quote_insert_shortcode', function() {
        let selected = tinyMCE.activeEditor.selection.getContent();

        if (selected) {

          // If text is selected when button is clicked
          // Wrap shortcode around it.
          const content = `[quotes align="left"]${selected}[/quotes]`;
        } else {
          const content = '[quotes align="left"]Quote Text[/quotes]';
        }

        tinymce.execCommand('mceInsertContent', false, content);
      });

      // Register buttons - trigger above command when clicked
      ed.addButton('quote_button', {
        title: 'Insert button',
        cmd: 'quote_insert_shortcode',
        image: `${url}../../../images/quotation.png`,
      });
    },
  });

  // Register our TinyMCE plugin
  // first parameter is the button ID1
  // second parameter must match the first parameter of the tinymce.create() function above
  tinymce.PluginManager.add('quote_button', tinymce.plugins.quote_plugin);
});
