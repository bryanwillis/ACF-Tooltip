(function($) {

	var tooltiptext;
	var label;

	$(document).live('acf/setup_fields', function (e, div) {
		$('.acf_postbox p.label').each(function() {
			label = $(this).find('label');
			label.detach();
			tooltiptext = $(this).html();
			$(this).html('')
			label.appendTo( $(this) );
			if( !$.trim(tooltiptext) =='') {
				label.append('<span class="tooltip" title="'+tooltiptext+'"> <span class="dashicons dashicons-editor-help"></span></span>');
			}
			
		});

		$('.tooltip').qtip({
			style: {
				classes: 'qtip-acf',
				def: false
			},
			position: {
				my: 'center left',  // Position my top left...
				at: 'right center', // at the bottom right of...
			}
		});

	});
	
})(jQuery);
