(function($){

	var file_frame;

	function getContrastYIQ(hexcolor) {
		var hexcolor = hexcolor.replace('#', ''),
				r = parseInt(hexcolor.substr(0,2),16),
				g = parseInt(hexcolor.substr(2,2),16),
				b = parseInt(hexcolor.substr(4,2),16),
				yiq = ((r*299)+(g*587)+(b*114))/1000;

		return (yiq >= 128) ? 'light' : 'dark';
	}

	function getOptimalTextColor(hexcolor) {
		return getContrastYIQ(hexcolor) == 'dark' ? '#fff' : '#444';
	}

	function initialize_field( $el ) {

		// initialize container elements and labels
		var backgroundContainerEl = $('.acf-section-styles-padding', $el),
				backgroundContainerLabel = $('label', backgroundContainerEl).first(),
				borderContainerEl = $('.acf-section-styles-border', $el)
				borderContainerLabel = $('label', borderContainerEl).first();

		// initialize label color for background
		var backgroundColorPicker = $('.acf-section-styles-background-color', $el),
				backgroundColor = backgroundColorPicker.val(),
				backgroundTextColor = '#444';

		if ( backgroundColor !== '' ) {
			backgroundTextColor = getOptimalTextColor(backgroundColor);
		}

		backgroundContainerLabel.css('color', backgroundTextColor);

		// initialize label color for border
		var borderColorPicker = $('.acf-section-styles-border-color', $el),
				borderColor = borderColorPicker.val(),
				borderTextColor = '#444';

		if ( borderColor !== '' ) {
			borderTextColor = getOptimalTextColor( borderColor );
		}

		borderContainerLabel.css('color', borderTextColor);

		var defaultBorderColor = '#f9f9f9',
				defaultBackgroundColor = '#eeeeee';

		// border color picker
		borderColorPicker.wpColorPicker({
			hide: true,
			change: function(event, ui) {
				var borderContainerEl = $(event.target).parents('.acf-section-styles-container').find('.acf-section-styles-border'),
						borderContainerLabel = $('label', borderContainerEl).first();

				// change the border-color
				borderContainerEl.css( 'background-color', ui.color.toString());

				// if border is dark lighten up the text
				borderContainerLabel.css('color', getOptimalTextColor(ui.color.toString()));
			}
		});

		$('.acf-section-styles-border-color-container .wp-picker-clear', $el).on('click', function() {
			var borderContainerEl = $(this).parents('.acf-section-styles-container').find('.acf-section-styles-border'),
					borderContainerLabel = $('label', borderContainerEl).first();
					borderContainerEl.css( 'background-color', defaultBorderColor);
					borderContainerLabel.css('color', getOptimalTextColor(defaultBorderColor));
		});

		// background color picker
		backgroundColorPicker.wpColorPicker({
			hide: true,
			change: function(event, ui) {
				var backgroundContainerEl = $(event.target).parents('.acf-section-styles-container').find('.acf-section-styles-padding'),
						backgroundContainerLabel = $('label', backgroundContainerEl).first(),
						backgroundImageContainerEl = $(event.target).parents('.acf-section-styles-container').find('.acf-section-styles-background-image-preview-container');

				// change the background-color
				backgroundContainerEl.css('background-color', ui.color.toString());
				backgroundImageContainerEl.css('background-color', ui.color.toString());

				// if background is dark lighten up the text
				backgroundContainerLabel.css('color', getOptimalTextColor(ui.color.toString()));
			}
		});

		$('.acf-section-styles-background-color-container .wp-picker-clear', $el).on('click', function() {
			var backgroundContainerEl = $(this).parents('.acf-section-styles-container').find('.acf-section-styles-padding'),
					backgroundContainerLabel = $('label', backgroundContainerEl).first(),
					backgroundImageContainerEl = $(this).parents('.acf-section-styles-container').find('.acf-section-styles-background-image-preview-container');

			backgroundContainerEl.css('background-color', defaultBackgroundColor);
			backgroundImageContainerEl.css('background-color', defaultBackgroundColor);
			backgroundContainerLabel.css('color', getOptimalTextColor(defaultBackgroundColor));
		});

		// background image select
		$('.acf-section-styles-background-image-select', $el).on('click', function( event ) {

			event.preventDefault();

			var el = $(this);

			var backgroundImageContainerEl = el.parents('.acf-section-styles-background-image-container'),
					backgroundImageInput = $('.acf-section-styles-background-image-input', backgroundImageContainerEl),
					backgroundImagePreview = $('.acf-section-styles-background-image-preview', backgroundImageContainerEl);

			file_frame = wp.media.frames.file_frame = wp.media({
				title: acf._e( 'section_styles', 'file_select_title' ),
				button: {
					text: acf._e( 'section_styles', 'file_select_text' )
				},
				library: { type : 'image' },
				multiple: false
			});

			file_frame.on( 'select', function() {
				attachment = file_frame.state().get('selection').first().toJSON();
				backgroundImageInput.val(attachment.id);
				backgroundImageContainerEl.addClass('has-value');
				backgroundImagePreview.attr('src', attachment.sizes.medium.url);
			});

			// Finally, open the modal
			file_frame.open();

		});

		// remove background image
		$('.acf-section-styles-background-image-remove', $el).on('click', function( event ) {

			event.preventDefault();

			var backgroundImageContainerEl = $(this).parents('.acf-section-styles-background-image-container'),
					backgroundImageInput = $('.acf-section-styles-background-image-input', backgroundImageContainerEl);

			backgroundImageInput.val('');
			backgroundImageContainerEl.removeClass('has-value');

		});

	}


	if ( typeof acf.add_action !== 'undefined' ) {

		/*
		*  ready append (ACF5)
		*
		*  These are 2 events which are fired during the page load
		*  ready = on page load similar to $(document).ready()
		*  append = on new DOM elements appended via repeater field
		*
		*  @type	event
		*  @date	20/07/13
		*
		*  @param	$el (jQuery selection) the jQuery element which contains the ACF fields
		*  @return	n/a
		*/

		acf.add_action('ready append', function( $el ){

			// search $el for fields of type 'section_styles'
			acf.get_fields({ type : 'section_styles'}, $el).each(function() {
				initialize_field( $(this) );
			});

		});


	} else {


		/*
		*  acf/setup_fields (ACF4)
		*
		*  This event is triggered when ACF adds any new elements to the DOM. 
		*
		*  @type	function
		*  @since	1.0.0
		*  @date	01/01/12
		*
		*  @param	event		e: an event object. This can be ignored
		*  @param	Element		postbox: An element which contains the new HTML
		*
		*  @return	n/a
		*/

		$(document).on('acf/setup_fields', function(e, postbox){

			$(postbox).find('.field[data-field_type="section_styles"]').each(function(){
				initialize_field( $(this) );
			});

		});

	}

})(jQuery);