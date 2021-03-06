(function($) {

	var tooltiptext;
	var label;

	acf.add_action('ready append', function( $el ) {
		$('.clones .table-layout').addClass('is_clone');

		$('.acf-label').each(function() {
			acf_label_tooltips($(this));
		});

		$('*').not('.clones').find('.table-layout').not('.is_clone').find('thead > tr > .acf-th').each(function() {
			acf_repeater_tooltips($(this));
		});

		$('.is_clone').removeClass('is_clone');

		acf_remove_clones();

		acf_tooltip();
		
	});

	function acf_remove_clones() {
		$('.acf-clone[data-layout="block"] td.acf-fields').each(function() {		
			acf_remove_class_and_span($(this));
		});

		$('.acf-clone[data-layout="row"] td.acf-label').each(function() {			
			acf_remove_class_and_span($(this));
		});

		$('.acf-clone[data-layout="table"] th.acf-th').each(function() {			
			// acf_remove_th_span($(this));
		});

		$('.acf-repeater .acf-clone .acf-label').each(function() {			
			acf_remove_class_and_span($(this));
		});
	};

	function acf_remove_class_and_span(that) {
		label = that.find('label');
		label.removeClass('has_tooltip')
			.find('span').remove();
	};

	function acf_remove_th_span(that) {
		that.find('span').remove();
	};


	function acf_tooltip() {
		$('.tooltip').each(function() {
			if ( $(this).hasClass('repeater') ) {
				tooltiptext = $(this).parent().find('.description').html()
			} else {
				tooltiptext = $(this).parent().next('.description').html()
			}
			$(this).qtip({
				style: {
					classes: 'qtip-acf',
					def: false
				},
				position: {
					my: 'center left',  // Position my top left...
					at: 'right center', // at the bottom right of...
				},
				content: {
					text: tooltiptext
				}
			});
		});
	}

	function acf_repeater_tooltips(repeaterfield) {	
		tooltiptext = repeaterfield.find('p.description').html();
		if( !$.trim(tooltiptext) == '') {
			repeaterfield.append('<span class="dashicons dashicons-editor-help repeater tooltip"></span>');
		}
	};

	function acf_label_tooltips(labelfield) {
		tooltiptext = labelfield.find('p').html();
		label = labelfield.find('label');
		if( !$.trim(tooltiptext) =='') {
			if ( !label.hasClass('has_tooltip') ) {
				label.append('<span class="dashicons dashicons-editor-help tooltip"></span>');
				label.addClass('has_tooltip');
			}
		}
	};
	
})(jQuery);
