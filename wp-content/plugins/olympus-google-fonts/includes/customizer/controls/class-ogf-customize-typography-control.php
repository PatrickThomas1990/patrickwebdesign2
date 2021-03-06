<?php
/**
 * Typography Custom Control
 *
 * @package   olympus-google-fonts
 * @copyright Copyright (c) 2018, Danny Cooper
 * @license   http://opensource.org/licenses/gpl-2.0.php GNU Public License
 */

/**
 * Typography control class.
 *
 * @since  1.0.0
 * @access public
 */
class OGF_Customize_Typography_Control extends WP_Customize_Control {

	/**
	 * The type of customize control being rendered.
	 *
	 * @since  1.0.0
	 * @access public
	 * @var    string
	 */
	public $type = 'typography';

	/**
	 * Array
	 *
	 * @since  1.0.0
	 * @access public
	 * @var    string
	 */
	public $l10n = array();

	/**
	 * Set up our control.
	 *
	 * @since  1.0.0
	 * @access public
	 * @param  object $manager Customizer manager.
	 * @param  string $id      Control ID.
	 * @param  array  $args    Arguments to override class property defaults.
	 * @return void
	 */
	public function __construct( $manager, $id, $args = array() ) {
		// Let the parent class do its thing.
		parent::__construct( $manager, $id, $args );
		// Make sure we have labels.
		$this->l10n = wp_parse_args(
			$this->l10n,
			array(
				'family'      => esc_html__( 'Font Family', 'olympus-google-fonts' ),
				'weight'      => esc_html__( 'Font Weight', 'olympus-google-fonts' ),
				'style'       => esc_html__( 'Font Style', 'olympus-google-fonts' ),
				'size'        => esc_html__( 'Font Size (px)', 'olympus-google-fonts' ),
				'line_height' => esc_html__( 'Line Height', 'olympus-google-fonts' ),
				'color'       => esc_html__( 'Color', 'olympus-google-fonts' ),
			)
		);

	}

	/**
	 * Enqueue scripts/styles for the color picker.
	 */
	public function enqueue() {
		wp_enqueue_script( 'wp-color-picker' );
		wp_enqueue_style( 'wp-color-picker' );
		wp_enqueue_script( 'chosen', esc_url( OGF_DIR_URL . 'assets/js/chosen.min.js' ), array( 'jquery' ), OGF_VERSION, true );
	}

	/**
	 * Add custom parameters to pass to the JS via JSON.
	 */
	public function to_json() {
		parent::to_json();
		// Loop through each of the settings and set up the data for it.
		foreach ( $this->settings as $setting_key => $setting_id ) {
			$this->json[ $setting_key ] = array(
				'link'  => $this->get_link( $setting_key ),
				'value' => $this->value( $setting_key ),
				'label' => isset( $this->l10n[ $setting_key ] ) ? $this->l10n[ $setting_key ] : '',
			);

			if ( 'weight' === $setting_key ) {
				$this->json[ $setting_key ]['choices'] = $this->get_font_weight_choices( $this->value( 'family' ) );
			} elseif ( 'style' === $setting_key ) {
				$this->json[ $setting_key ]['choices'] = $this->get_font_style_choices();
			}
		}
	}
	/**
	 * Underscore JS template to handle the control's output.
	 */
	public function content_template() {
		?>

		<# if ( data.label ) { #>
			<span class="customize-control-title">{{ data.label }}</span>
		<# } #>

		<# if ( data.description ) { #>
			<span class="description customize-control-description">{{{ data.description }}}</span>
		<# } #>

		<ul>

		<# if ( data.family && ogf_font_choices ) { #>

			<li class="typography-font-family">

				<# if ( data.family.label ) { #>
					<span class="customize-control-title">{{ data.family.label }}</span>
				<# } #>

				<select class="ogf-select" {{{ data.family.link }}}>

					<# _.each( ogf_font_choices, function( label, font_id ) { #>
						<option value="{{ font_id }}" <# if ( font_id === data.family.value ) { #> selected="selected" <# } #>>{{ label }}</option>
					<# } ) #>

				</select>

				<button type="button" class="advanced-button">
					<span class="screen-reader-text">Advanced</span>
				</button>
			</li>
		<# } #>


		<div class="advanced-settings-wrapper">

			<# if ( data.weight && data.weight.choices ) { #>

				<li class="typography-font-weight">

					<# if ( data.weight.label ) { #>
						<span class="customize-control-title">{{ data.weight.label }}</span>
					<# } #>

					<select {{{ data.weight.link }}}>

						<# _.each( data.weight.choices, function( label, choice ) { #>

							<option value="{{ choice }}" <# if ( choice === data.weight.value ) { #> selected="selected" <# } #>>{{ label }}</option>

						<# } ) #>

					</select>
				</li>
			<# } #>

			<# if ( data.style && data.style.choices ) { #>

				<li class="typography-font-style">

					<# if ( data.style.label ) { #>
						<span class="customize-control-title">{{ data.style.label }}</span>
					<# } #>

					<select {{{ data.style.link }}}>

						<# _.each( data.style.choices, function( label, choice ) { #>

							<option value="{{ choice }}" <# if ( choice === data.style.value ) { #> selected="selected" <# } #>>{{ label }}</option>

						<# } ) #>

					</select>
				</li>
			<# } #>

			<# if ( data.size ) { #>

				<li class="typography-font-size">

					<div class="slider-custom-control">

							<# if ( data.size.label ) { #>
								<span class="customize-control-title">{{ data.size.label }}</span>
							<# } #>
							<span class="slider-reset dashicons dashicons-image-rotate" slider-reset-value="{{ data.size.value }}"></span>

							<div class="slider" slider-max-value="72" slider-step-value="1"></div>
							<input class="customize-control-slider-value" {{{ data.size.link }}} type="number" value="{{ data.size.value }}">

					</div>

				</li>
			<# } #>

			<# if ( data.line_height ) { #>

				<li class="typography-line-height">

					<div class="slider-custom-control">

							<# if ( data.line_height.label ) { #>
								<span class="customize-control-title">{{ data.line_height.label }}</span>
							<# } #>
							<span class="slider-reset dashicons dashicons-image-rotate" slider-reset-value="{{ data.line_height.value }}"></span>

							<div class="slider" slider-max-value="3" slider-step-value=".1"></div>
							<input class="customize-control-slider-value" {{{ data.line_height.link }}} type="number" value="{{ data.line_height.value }}">

					</div>

				</li>
			<# } #>

			<# if ( data.color ) { #>

				<li class="typography-font-color">

					<# if ( data.color.label ) { #>
						<span class="customize-control-title">{{ data.color.label }}</span>
					<# } #>

					<input class="color-picker-hex" type="text" maxlength="7" {{{ data.color.link }}} value="{{ data.color.value }}" />

				</li>
			<# } #>

		</div>

		</ul>
		<?php
	}

	/**
	 * Returns the available font weights.
	 *
	 * @param string $font User's font choice.
	 */
	public function get_font_weight_choices( $font ) {

		if ( 'default' === $font ) {
			return array(
				'0'   => esc_html__( '- Default -', 'olympus-google-fonts' ),
				'100' => esc_html__( 'Thin', 'olympus-google-fonts' ),
				'200' => esc_html__( 'Extra Light', 'olympus-google-fonts' ),
				'300' => esc_html__( 'Light', 'olympus-google-fonts' ),
				'400' => esc_html__( 'Normal', 'olympus-google-fonts' ),
				'500' => esc_html__( 'Medium', 'olympus-google-fonts' ),
				'600' => esc_html__( 'Semi Bold', 'olympus-google-fonts' ),
				'700' => esc_html__( 'Bold', 'olympus-google-fonts' ),
				'800' => esc_html__( 'Extra Bold', 'olympus-google-fonts' ),
				'900' => esc_html__( 'Ultra Bold', 'olympus-google-fonts' ),
			);
		}

		$fonts = ogf_fonts_array();

		$variants = $fonts[ $font ]['variants'];

		return $variants;
	}

	/**
	 * Returns the available font styles.
	 */
	public function get_font_style_choices() {
		return array(
			'normal'  => esc_html__( 'Normal', 'olympus-google-fonts' ),
			'italic'  => esc_html__( 'Italic', 'olympus-google-fonts' ),
			'oblique' => esc_html__( 'Oblique', 'olympus-google-fonts' ),
		);
	}
}
