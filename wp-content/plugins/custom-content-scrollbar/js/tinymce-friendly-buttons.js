(function() {

	tinymce.create('tinymce.plugins.scrollbarButtonPlugin', {
		init : function(ed, url) {
			// Register commands
			ed.addCommand('custom_content_scrollbar_button', function() {
				ed.windowManager.open({
					file : url + '/../includes/button_popup.php?text_value='+custom_content_scrollbar_popup_text, // file that contains HTML for our modal window
					width : 550 + parseInt(ed.getLang('button.delta_width', 0)), // size of our window
					height : 500 + parseInt(ed.getLang('button.delta_height', 0)), // size of our window
					inline : 1
				}, {
					plugin_url : url
				});
			});
			 
			// Register buttons
			ed.addButton('custom_content_scrollbar_friendly_button', {title : 'Custom Content Scrollbar', cmd : 'custom_content_scrollbar_button', image: url + '/../includes/images/icon.gif' });
		},
		 
		getInfo : function() {
			return {
				longname : 'Custom Content Scrollbar',
				author : 'SoftHopper',
				authorurl : '//softhopper.net/',
				infourl : '//softhopper.net/',
				version : tinymce.majorVersion + "." + tinymce.minorVersion
			};
		}
	});
	 
	// Register plugin
	// first parameter is the button ID and must match ID elsewhere
	// second parameter must match the first parameter of the tinymce.create() function above
	tinymce.PluginManager.add('tinymce_custom_button', tinymce.plugins.scrollbarButtonPlugin);

})();