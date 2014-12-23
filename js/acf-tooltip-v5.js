(function($) {

	var tooltiptext;

	acf.add_action('ready append', function( $el ) {
		$('.acf-label').each(function() {
			tooltiptext = $(this).parent().find('p').html();
			if( !$.trim(tooltiptext) =='') {
				$(this).find('label').append('<span class="tooltip" title="'+tooltiptext+'"> <span class="dashicons dashicons-editor-help"></span></span>');
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
