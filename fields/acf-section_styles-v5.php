<?php

// exit if accessed directly
if ( ! defined( 'ABSPATH' ) ) exit;

// check if class already exists
if ( !class_exists('acf_field_section_styles') ) :

	class acf_field_section_styles extends acf_field {

		/*
		*  __construct
		*
		*  This function will setup the field type data
		*
		*  @type	function
		*  @date	5/03/2014
		*  @since	5.0.0
		*
		*  @param	n/a
		*  @return	n/a
		*/

		function __construct( $settings ) {

			$this->name = 'section_styles';
			$this->label = __( 'Section Styles', 'acf-section_styles' );
			$this->category = apply_filters( 'acf_section_styles_category', 'Appearance' );

			$this->l10n = array(
				'file_select_title'	=> __( 'Select background image', 'acf-section_styles' ),
				'file_select_text'	=> __( 'Select image', 'acf-section_styles' ),
			);

			$this->defaults = array(
				'margin_top'			=> '0',
				'margin_right'			=> '0',
				'margin_bottom'			=> '0',
				'margin_left'			=> '0',
				'border_top'			=> '0',
				'border_right'			=> '0',
				'border_bottom'			=> '0',
				'border_left'			=> '0',
				'border_style'			=> 'solid',
				'padding_top'			=> '0',
				'padding_right'			=> '0',
				'padding_bottom'		=> '0',
				'padding_left'			=> '0',
				'background_style'		=> 'default',
			);

			$this->border_options = apply_filters( 'acf_section_styles_border_options', array(
				'none'			=> __( 'None', 'acf-section_styles' ),
				'solid'			=> __( 'Solid', 'acf-section_styles' ),
				'dotted' 		=> __( 'Dotted', 'acf-section_styles' ),
				'dashed' 		=> __( 'Dashed', 'acf-section_styles' ),
				'double'		=> __( 'Double', 'acf-section_styles' ),
				'groove'		=> __( 'Groove', 'acf-section_styles' ),
				'ridge'			=> __( 'Ridge', 'acf-section_styles' ),
				'inset'			=> __( 'Inset', 'acf-section_styles' ),
				'outset'		=> __( 'Outset', 'acf-section_styles' ),
			) );

			$this->background_style_options = apply_filters( 'acf_section_styles_background_style_options', array(
				'default'		=> __( 'Theme Default', 'acf-section_styles' ),
				'cover'			=> __( 'Cover', 'acf-section_styles' ),
				'contain'		=> __( 'Contain', 'acf-section_styles' ),
				'no-repeat'		=> __( 'No Repeat', 'acf-section_styles' ),
				'repeat'		=> __( 'Repeat', 'acf-section_styles' ),
				'repeat-x'		=> __( 'Repeat Horizontally', 'acf-section_styles' ),
				'repeat-y'		=> __( 'Repeat Vertically', 'acf-section_styles' ),
			) );

			$this->background_position_options_1 = apply_filters( 'acf_section_styles_background_position_options_1', array(
				'top'			=> __( 'Top', 'acf-section_styles' ),
				'center'		=> __( 'Center', 'acf-section_styles' ),
				'bottom'		=> __( 'Bottom', 'acf-section_styles' )
			) );

			$this->background_position_options_2 = apply_filters( 'acf_section_styles_background_position_options_2', array(
				'left'			=> __( 'Left', 'acf-section_styles' ),
				'center'		=> __( 'Center', 'acf-section_styles' ),
				'right'			=> __( 'Right', 'acf-section_styles' )
			) );

			$this->settings = $settings;

			// do not delete!
			parent::__construct();

		}


		/*
		*  render_field_settings()
		*
		*  Create extra settings for your field. These are visible when editing a field
		*
		*  @type	action
		*  @since	3.6
		*  @date	23/01/13
		*
		*  @param	$field (array) the $field being edited
		*  @return	n/a
		*/

		function render_field_settings( $field ) {

			// Default margins
			acf_render_field_wrap(array(
				'label'					=> __( 'Default Margins', 'acf-section_styles' ),
				'type'					=> 'text',
				'name'					=> 'margin_top',
				'prefix'				=> $field['prefix'],
				'value'					=> $field['margin_top'],
				'prepend'				=> __( 'top', 'acf-section_styles' ),
				'wrapper'				=> array(
					'data-name' => 'margin-wrapper'
				)
			), 'tr');

			acf_render_field_wrap(array(
				'type'					=> 'text',
				'name'					=> 'margin_right',
				'prefix'				=> $field['prefix'],
				'value'					=> $field['margin_right'],
				'prepend'				=> __( 'right', 'acf'),
				'wrapper'				=> array(
					'data-append' => 'margin-wrapper'
				)
			), 'tr');

			acf_render_field_wrap(array(
				'type'					=> 'text',
				'name'					=> 'margin_bottom',
				'prefix'				=> $field['prefix'],
				'value'					=> $field['margin_bottom'],
				'prepend'				=> __( 'bottom', 'acf' ),
				'wrapper'				=> array(
					'data-append' => 'margin-wrapper'
				)
			), 'tr');

			acf_render_field_wrap(array(
				'type'					=> 'text',
				'name'					=> 'margin_left',
				'prefix'				=> $field['prefix'],
				'value'					=> $field['margin_left'],
				'prepend'				=> __( 'left', 'acf' ),
				'wrapper'				=> array(
					'data-append' => 'margin-wrapper'
				)
			), 'tr');

			// Default borders
			acf_render_field_wrap(array(
				'label'					=> __( 'Default Borders', 'acf-section_styles' ),
				'type'					=> 'text',
				'name'					=> 'border_top',
				'prefix'				=> $field['prefix'],
				'value'					=> $field['border_top'],
				'prepend'				=> __( 'top', 'acf-section_styles' ),
				'wrapper'				=> array(
					'data-name' => 'border-wrapper'
				)
			), 'tr');

			acf_render_field_wrap(array(
				'type'					=> 'text',
				'name'					=> 'border_right',
				'prefix'				=> $field['prefix'],
				'value'					=> $field['border_right'],
				'prepend'				=> __( 'right', 'acf'),
				'wrapper'				=> array(
					'data-append' => 'border-wrapper'
				)
			), 'tr');

			acf_render_field_wrap(array(
				'type'					=> 'text',
				'name'					=> 'border_bottom',
				'prefix'				=> $field['prefix'],
				'value'					=> $field['border_bottom'],
				'prepend'				=> __( 'bottom', 'acf' ),
				'wrapper'				=> array(
					'data-append' => 'border-wrapper'
				)
			), 'tr');

			acf_render_field_wrap(array(
				'type'					=> 'text',
				'name'					=> 'border_left',
				'prefix'				=> $field['prefix'],
				'value'					=> $field['border_left'],
				'prepend'				=> __( 'left', 'acf' ),
				'wrapper'				=> array(
					'data-append' => 'border-wrapper'
				)
			), 'tr');

			// Default border styles
			acf_render_field_wrap(array(
				'label'					=> __( 'Default Border Style', 'acf-section_styles' ),
				'type'					=> 'select',
				'name'					=> 'border_style',
				'choices'				=> $this->border_options,
				'prefix'				=> $field['prefix'],
				'value'					=> $field['border_style'],
				'wrapper'				=> array(
					'data-name' => 'border-settings-wrapper'
				)
			), 'tr');

			acf_render_field_wrap(array(
				'type'					=> 'color_picker',
				'name'					=> 'border_color',
				'prefix'				=> $field['prefix'],
				'value'					=> $field['border_color'],
				'wrapper'				=> array(
					'data-append' => 'border-settings-wrapper'
				)
			), 'tr');

			// Default padding
			acf_render_field_wrap(array(
				'label'					=> __( 'Default Padding', 'acf-section_styles' ),
				'type'					=> 'text',
				'name'					=> 'padding_top',
				'prefix'				=> $field['prefix'],
				'value'					=> $field['padding_top'],
				'prepend'				=> __( 'top', 'acf-section_styles' ),
				'wrapper'				=> array(
					'data-name' => 'padding-wrapper'
				)
			), 'tr');

			acf_render_field_wrap(array(
				'type'					=> 'text',
				'name'					=> 'padding_right',
				'prefix'				=> $field['prefix'],
				'value'					=> $field['padding_right'],
				'prepend'				=> __( 'right', 'acf'),
				'wrapper'				=> array(
					'data-append' => 'padding-wrapper'
				)
			), 'tr');

			acf_render_field_wrap(array(
				'type'					=> 'text',
				'name'					=> 'padding_bottom',
				'prefix'				=> $field['prefix'],
				'value'					=> $field['padding_bottom'],
				'prepend'				=> __( 'bottom', 'acf' ),
				'wrapper'				=> array(
					'data-append' => 'padding-wrapper'
				)
			), 'tr');

			acf_render_field_wrap(array(
				'type'					=> 'text',
				'name'					=> 'padding_left',
				'prefix'				=> $field['prefix'],
				'value'					=> $field['padding_left'],
				'prepend'				=> __( 'left', 'acf' ),
				'wrapper'				=> array(
					'data-append' => 'padding-wrapper'
				)
			), 'tr');

			// Default background styles
			acf_render_field_wrap(array(
				'label'					=> __( 'Default Background Style', 'acf-section_styles' ),
				'type'					=> 'select',
				'name'					=> 'background_style',
				'choices'				=> $this->background_style_options,
				'prefix'				=> $field['prefix'],
				'value'					=> $field['background_style'],
				'wrapper'				=> array(
					'data-name' => 'background-settings-wrapper'
				)
			), 'tr');

			acf_render_field_wrap(array(
				'type'					=> 'color_picker',
				'name'					=> 'background_color',
				'prefix'				=> $field['prefix'],
				'value'					=> $field['background_color'],
				'wrapper'				=> array(
					'data-append' => 'background-settings-wrapper'
				)
			), 'tr');

			acf_render_field_wrap(array(
				'label'					=> __( 'Default Background Position', 'acf-section_styles' ),
				'type'					=> 'select',
				'name'					=> 'background_position_1',
				'choices'				=> $this->background_position_options_1,
				'prefix'				=> $field['prefix'],
				'value'					=> $field['background_position_1'],
				'wrapper'				=> array(
					'data-name' => 'background-position-wrapper'
				)
			), 'tr');

			acf_render_field_wrap(array(
				'type'					=> 'select',
				'name'					=> 'background_position_2',
				'choices'				=> $this->background_position_options_2,
				'prefix'				=> $field['prefix'],
				'value'					=> $field['background_position_2'],
				'wrapper'				=> array(
					'data-append' => 'background-position-wrapper'
				)
			), 'tr');

		}

		/*
		*  render_field()
		*
		*  Create the HTML interface for your field
		*
		*  @param	$field (array) the $field being rendered
		*
		*  @type	action
		*  @since	3.6
		*  @date	23/01/13
		*
		*  @param	$field (array) the $field being edited
		*  @return	n/a
		*/

		function render_field( $field ) {

			// if values are empty fetch defaults
			if ( empty( $field['value'] ) ) {
				$field['value']['margin_top'] = $field['margin_top'];
				$field['value']['margin_right'] = $field['margin_right'];
				$field['value']['margin_bottom'] = $field['margin_bottom'];
				$field['value']['margin_left'] = $field['margin_left'];
				$field['value']['border_top'] = $field['border_top'];
				$field['value']['border_right'] = $field['border_right'];
				$field['value']['border_bottom'] = $field['border_bottom'];
				$field['value']['border_left'] = $field['border_left'];
				$field['value']['border_color'] = $field['border_color'];
				$field['value']['border_style'] = $field['border_style'];
				$field['value']['padding_top'] = $field['padding_top'];
				$field['value']['padding_right'] = $field['padding_right'];
				$field['value']['padding_bottom'] = $field['padding_bottom'];
				$field['value']['padding_left'] = $field['padding_left'];
				$field['value']['background_color'] = $field['background_color'];
				$field['value']['background_style'] = $field['background_style'];
				}
			?>

			<div class="acf-section-styles-container" tabindex="-1">

				<!-- Box Model -->
				<div class="acf-section-styles-box-model">
					<div class="acf-section-styles-margin acf-section-style-param">
						<!-- Margin -->
						<div class="acf-label">
							<label for="<?php echo $field['id']; ?>_margin"><?php _e( 'margin', 'acf-section_styles' ); ?></label>
						</div>

						<input id="<?php echo $field['id']; ?>_margin" class="top" placeholder="&ndash;" name="<?php echo esc_attr($field['name']) ?>[margin_top]" value="<?php if ( !empty( $field['value']['margin_top'] ) ) echo $field['value']['margin_top']; ?>" />
						<input class="right" placeholder="&ndash;" name="<?php echo esc_attr($field['name']) ?>[margin_right]" value="<?php if ( !empty( $field['value']['margin_top'] ) ) echo $field['value']['margin_right']; ?>" />
						<input class="bottom" placeholder="&ndash;" name="<?php echo esc_attr($field['name']) ?>[margin_bottom]" value="<?php if ( !empty( $field['value']['margin_top'] ) ) echo $field['value']['margin_bottom']; ?>" />
						<input class="left" placeholder="&ndash;" name="<?php echo esc_attr($field['name']) ?>[margin_left]" value="<?php if ( !empty( $field['value']['margin_top'] ) ) echo $field['value']['margin_left']; ?>" />
						<!-- End Margin -->

						<div id="<?php echo $field['id']; ?>_border_container" class="acf-section-styles-border acf-section-style-param"<?php if ( !empty( $field['value']['border_color'] ) ) echo ' style="background-color: ' . $field['value']['border_color'] . '"'; ?>>
							<!-- Border -->
							<div class="acf-label">
								<label for="<?php echo $field['id']; ?>_border"><?php _e( 'border', 'acf-section_styles' ); ?></label>
							</div>

							<input  id="<?php echo $field['id']; ?>_border" class="top" placeholder="&ndash;" min="0" name="<?php echo esc_attr($field['name']) ?>[border_top]" value="<?php if ( !empty( $field['value']['border_top'] ) ) echo $field['value']['border_top']; ?>" />
							<input class="right" placeholder="&ndash;" min="0" name="<?php echo esc_attr($field['name']) ?>[border_right]" value="<?php if ( !empty( $field['value']['border_right'] ) ) echo $field['value']['border_right']; ?>" />
							<input class="bottom" placeholder="&ndash;" min="0" name="<?php echo esc_attr($field['name']) ?>[border_bottom]" value="<?php if ( !empty( $field['value']['border_bottom'] ) ) echo $field['value']['border_bottom']; ?>" />
							<input class="left" placeholder="&ndash;" min="0" name="<?php echo esc_attr($field['name']) ?>[border_left]" value="<?php if ( !empty( $field['value']['border_left'] ) ) echo $field['value']['border_left']; ?>" />
							<!-- End Border -->

							<div id="<?php echo $field['id']; ?>_padding_container" class="acf-section-styles-padding acf-section-style-param"<?php if ( !empty( $field['value']['background_color'] ) ) echo ' style="background-color: ' . $field['value']['background_color'] . '"'; ?>>
								<!-- Padding -->
									<div class="acf-label">
										<label for="<?php echo $field['id']; ?>_padding"><?php _e( 'padding', 'acf-section_styles' ); ?></label>
									</div>

									<input  id="<?php echo $field['id']; ?>_padding" class="top" placeholder="&ndash;" min="0" name="<?php echo esc_attr($field['name']) ?>[padding_top]" value="<?php if ( !empty( $field['value']['padding_top'] ) ) echo $field['value']['padding_top']; ?>" />
									<input class="right" placeholder="&ndash;" min="0" name="<?php echo esc_attr($field['name']) ?>[padding_right]" value="<?php if ( !empty( $field['value']['padding_right'] ) ) echo $field['value']['padding_right']; ?>" />
									<input class="bottom" placeholder="&ndash;" min="0" name="<?php echo esc_attr($field['name']) ?>[padding_bottom]" value="<?php if ( !empty( $field['value']['padding_bottom'] ) ) echo $field['value']['padding_bottom']; ?>" />
									<input class="left" placeholder="&ndash;" min="0" name="<?php echo esc_attr($field['name']) ?>[padding_left]" value="<?php if ( !empty( $field['value']['padding_left'] ) ) echo $field['value']['padding_left']; ?>" />
									<!-- End Padding -->

							</div> <!-- End .acf-section-styles-padding -->

						</div> <!-- End .acf-section-styles-border -->

					</div> <!-- End .acf-section-styles-margin -->

				</div>
				<!-- End Box Model -->

				<!-- Style Options -->
				<div class="acf-section-styles-options">

					<div class="acf-section-styles-input-row">
						<div class="acf-section-styles-input-col-half">
							<!-- Border Style -->
							<div class="acf-section-styles-border-style-container">
								<div class="acf-label">
									<label for= ""><?php _e( 'Border Style', 'acf-section_styles' ); ?></label>
								</div>

								<select id="<?php echo $field['id']; ?>_border_style" name="<?php echo esc_attr($field['name']) ?>[border_style]">
									<?php foreach ( $this->border_options as $v => $label ): ?>
									<option value="<?php echo $v; ?>"<?php if ( !empty( $field['value']['border_style'] ) && $field['value']['border_style'] == $v ) echo ' selected'; ?>><?php echo $label; ?></option>
									<?php endforeach; ?>
								</select>
							</div>
							<!-- End Border Style -->
						</div>
						<div class="acf-section-styles-input-col-half">
							<!-- Border Color -->
							<div class="acf-section-styles-border-color-container">
								<div class="acf-label">
									<label for= "<?php echo $field['id']; ?>_border_color"><?php _e( 'Border Color', 'acf-section_styles' ); ?></label>
								</div>
								<input class="acf-section-styles-border-color" name="<?php echo esc_attr($field['name']) ?>[border_color]" id="<?php echo $field['id']; ?>_border_color" type="text" value="<?php if ( !empty( $field['value']['border_color'] ) ) echo $field['value']['border_color']; ?>" />
							</div>
							<!-- End Border Color -->
						</div>
					</div>

					<!-- Background Color -->
					<div class="acf-section-styles-background-color-container">
						<div class="acf-label">
							<label for= "<?php echo $field['id']; ?>_background_color"><?php _e( 'Background Color', 'acf-section_styles' ); ?></label>
						</div>
						<input class="acf-section-styles-background-color" name="<?php echo esc_attr($field['name']) ?>[background_color]" id="<?php echo $field['id']; ?>_background_color" type="text" value="<?php if ( !empty( $field['value']['background_color'] ) ) echo $field['value']['background_color']; ?>" />
					</div>
					<!-- End Background Color -->

					<!-- Background Image -->
					<?php
					$div = array(
						'class'	=> 'acf-section-styles-background-image-container',
					);

					$url = '';

					if ( !empty( $field['value']['background_image'] ) ) {

						// update vars
						$attachment = wp_get_attachment_image_src($field['value']['background_image'], 'medium');

						// url exists
						if ( $attachment ) {
							$url = $attachment[0];
							$div['class'] .= ' has-value';
						}
					}
					?>
					<div <?php acf_esc_attr_e( $div ); ?>>
						<div class="acf-label">
							<label for="<?php echo $field['id']; ?>_background_image"><?php _e( 'Background Image', 'acf-section_styles' ); ?></label>
						</div>

						<input type="hidden" id="<?php echo $field['id']; ?>_background_image" name="<?php echo esc_attr($field['name']) ?>[background_image]" value="<?php if ( !empty( $field['value']['background_image'] ) ) echo $field['value']['background_image']; ?>" class="acf-section-styles-background-image-input" />

						<div class="view show-if-value">
							<div class="acf-section-styles-background-image-preview-container"<?php if ( !empty( $field['value']['background_color'] ) ) echo ' style="background-color: ' . $field['value']['background_color'] . '"'; ?>>
								<img id="<?php echo $field['id']; ?>_background_image_preview" src="<?php echo $url; ?>" alt="" class="acf-section-styles-background-image-preview" />
							</div>

							<p style="margin: 5px 0 0;"><a href="#" class="acf-section-styles-background-image-remove" data-target="<?php echo $field['id']; ?>"><?php _e( 'Remove selected image', 'acf-section_styles' ); ?></a></p>

							<div class="acf-section-styles-background-style-container">
								<div class="acf-label">
									<label for="<?php echo $field['id']; ?>_background_style"><?php _e( 'Background Style', 'acf-section_styles' ); ?></label>
								</div>

								<select id="<?php echo $field['id']; ?>_background_style" name="<?php echo esc_attr($field['name']) ?>[background_style]">
									<?php foreach ( $this->background_style_options as $v => $label ): ?>
									<option value="<?php echo $v; ?>"<?php if ( !empty( $field['value']['background_style'] ) && $field['value']['background_style'] == $v ) echo ' selected'; ?>><?php echo $label; ?></option>
									<?php endforeach; ?>
								</select>
							</div>

							<div class="acf-section-styles-background-position-container">
								<div class="acf-label">
									<label for="<?php echo $field['id']; ?>_background_position_1"><?php _e( 'Background Position', 'acf-section_styles' ); ?></label>
								</div>

								<div class="acf-section-styles-input-row">
									<div class="acf-section-styles-input-col-half">
										<select id="<?php echo $field['id']; ?>_background_position_1" name="<?php echo esc_attr($field['name']) ?>[background_position_1]" >
											<?php foreach ( $this->background_position_options_1 as $v => $label ): ?>
											<option value="<?php echo $v; ?>"<?php if ( !empty( $field['value']['background_position_1'] ) && $field['value']['background_position_1'] == $v ) echo ' selected'; ?>><?php echo $label; ?></option>
											<?php endforeach; ?>
										</select>
									</div>
									<div class="acf-section-styles-input-col-half">
										<select id="<?php echo $field['id']; ?>_background_position_2" name="<?php echo esc_attr($field['name']) ?>[background_position_2]" class="acf-section-styles-background-position-1">
											<?php foreach ( $this->background_position_options_2 as $v => $label ): ?>
											<option value="<?php echo $v; ?>"<?php if ( !empty( $field['value']['background_position_2'] ) && $field['value']['background_position_2'] == $v ) echo ' selected'; ?>><?php echo $label; ?></option>
											<?php endforeach; ?>
										</select>
									</div>
								</div>
							</div>

						</div>

						<div class="view hide-if-value">
							<p style="margin: 0;"><?php _e( 'No image selected','acf-section_styles' ); ?> <a data-target="<?php echo $field['id']; ?>" class="acf-button button acf-section-styles-background-image-select" href="#"><?php _e( 'Add Image','acf-section_styles' ); ?></a></p>
						</div>

					</div>
					<!-- End Background Image -->

				</div>
				<!-- End Style Options -->

			</div> <!-- End .acf-section-styles-container -->
		<?php
		}


		/*
		*  input_admin_enqueue_scripts()
		*
		*  This action is called in the admin_enqueue_scripts action on the edit screen where your field is created.
		*  Use this action to add CSS + JavaScript to assist your render_field() action.
		*
		*  @type	action (admin_enqueue_scripts)
		*  @since	3.6
		*  @date	23/01/13
		*
		*  @param	n/a
		*  @return	n/a
		*/

		function input_admin_enqueue_scripts() {

			// vars
			$url = $this->settings['url'];
			$version = $this->settings['version'];

			// register & include JS
			wp_enqueue_media();
			wp_enqueue_style( 'wp-color-picker' );
			wp_register_script( 'acf-input-section_styles', "{$url}assets/js/input.js", array('acf-input'), $version );
			wp_enqueue_script('acf-input-section_styles');

			// register & include CSS
			wp_register_style( 'acf-input-section_styles', "{$url}assets/css/input.css", array('acf-input'), $version );
			wp_enqueue_style('acf-input-section_styles');

		}	

		/*
		*  format_value()
		*
		*  This filter is appied to the $value after it is loaded from the db and before it is returned to the template
		*
		*  @type	filter
		*  @since	3.6
		*  @date	23/01/13
		*
		*  @param	$value (mixed) the value which was loaded from the database
		*  @param	$post_id (mixed) the $post_id from which the value was loaded
		*  @param	$field (array) the field array holding all the field options
		*
		*  @return	$value (mixed) the modified value
		*/

		function format_value( $value, $post_id, $field ) {

			// bail early if no value
			if ( empty( $value ) ) return $value;

			if ( !empty( $value['background_image'] ) ) {
				$value['background_image'] = acf_get_attachment( $value['background_image'] );
			}

			// background position value
			$value['background_position'] = $value['background_position_1'] . ' ' . $value['background_position_2'];

			// format padding value
			$value['margin'] = !empty( $value['margin_top'] ) ? $value['margin_top'] : '0';
			$value['margin'] .= ' ';	// space
			$value['margin'] .= !empty( $value['margin_right'] ) ? $value['margin_right'] : '0';
			$value['margin'] .= ' ';	// space
			$value['margin'] .= !empty( $value['margin_bottom'] ) ? $value['margin_bottom'] : '0';
			$value['margin'] .= ' ';	// space
			$value['margin'] .= !empty( $value['margin_left'] ) ? $value['margin_left'] : '0';

			// format border value
			$value['border_width'] = !empty( $value['border_top'] ) ? $value['border_top'] : '0';
			$value['border_width'] .= ' ';	// space
			$value['border_width'] .= !empty( $value['border_right'] ) ? $value['border_right'] : '0';
			$value['border_width'] .= ' ';	// space
			$value['border_width'] .= !empty( $value['border_bottom'] ) ? $value['border_bottom'] : '0';
			$value['border_width'] .= ' ';	// space
			$value['border_width'] .= !empty( $value['border_left'] ) ? $value['border_left'] : '0';

			// format padding value
			$value['padding'] = !empty( $value['padding_top'] ) ? $value['padding_top'] : '0';
			$value['padding'] .= ' ';	// space
			$value['padding'] .= !empty( $value['padding_right'] ) ? $value['padding_right'] : '0';
			$value['padding'] .= ' ';	// space
			$value['padding'] .= !empty( $value['padding_bottom'] ) ? $value['padding_bottom'] : '0';
			$value['padding'] .= ' ';	// space
			$value['padding'] .= !empty( $value['padding_left'] ) ? $value['padding_left'] : '0';

			return $value;
		}

		/*
		*  update_value()
		*
		*  This filter is applied to the $field before it is saved to the database
		*
		*  @type	filter
		*  @date	23/01/2013
		*  @since	3.6.0
		*
		*  @param	$field (array) the field array holding all the field options
		*  @return	$field
		*/

		function update_value( $value, $post_id, $field  ) {

			$default_unit = apply_filters( 'acf_section_styles_default_unit', 'px' );

			// if fields do not have a unit attached apply default unit
			$auto_append_unit_items = apply_filters( 'acf_section_styles_append_units', array(
				'margin_top',
				'margin_right',
				'margin_bottom',
				'margin_left',
				'border_top',
				'border_right',
				'border_bottom',
				'border_left',
				'padding_top',
				'padding_right',
				'padding_bottom',
				'padding_left'
			) );

			foreach ( $auto_append_unit_items as $i ) {
				if ( ctype_digit( $value[$i] ) ) {
					$value[$i] .= $default_unit;
				}
			}

			return $value;

		}	

	}

	// initialize
	new acf_field_section_styles( $this->settings );

// class_exists check
endif;
