<?php
/**
 * @package Yoast\YoastCom
 */

namespace Yoast\YoastCom\Theme;

/**
 * Adds some helper functions above the WP_Widget object
 */
class Widget extends \WP_Widget {

	/**
	 * Output a simple text input for the widget form
	 *
	 * @param string $name The name (and ID) of this input field.
	 * @param string $label The label for the input field label.
	 * @param string $value The value for this input.
	 */
	protected function input_text( $name, $label, $value ) {
		?>
		<p>
			<label for="<?php echo esc_attr( $this->get_field_id( $name ) ); ?>"><?php echo esc_html( $label ); ?></label>
			<input
				type="text"
				class="widefat"
				name="<?php echo esc_attr( $this->get_field_name( $name ) ); ?>"
				id="<?php echo esc_attr( $this->get_field_id( $name ) ); ?>"
				value="<?php echo esc_attr( $value ); ?>"
				/>
		</p>
		<?php
	}

	/**
	 * Output a simple textarea input for the widget form
	 *
	 * @param string $name The name (and ID) of this input field.
	 * @param string $label The label for the input field label.
	 * @param string $value The value for this input.
	 */
	protected function input_textarea( $name, $label, $value ) {

		?>
		<p>
			<label for="<?php echo esc_attr( $this->get_field_id( $name ) ); ?>"><?php echo esc_html( $label ); ?></label>
			<textarea
				class="widefat"
				name="<?php echo esc_attr( $this->get_field_name( $name ) ); ?>"
			    id="<?php echo esc_attr( $this->get_field_id( $name ) ); ?>"
				><?php echo esc_textarea( $value ); ?></textarea>
		</p>
		<?php
	}

	/**
	 * @param string $name The name (and ID) of this input field.
	 * @param string $label The label for the input field label.
	 * @param array  $options Key-value pairs of values and labels in the select.
	 * @param string $value The selected option.
	 */
	protected function input_select( $name, $label, $options, $value ) {
		?>
		<p>
			<label for="<?php echo esc_attr( $this->get_field_id( $name ) ); ?>"><?php echo esc_html( $label ); ?></label>
			<select
				class="widefat"
				name="<?php echo esc_attr( $this->get_field_name( $name ) ); ?>"
				id="<?php echo esc_attr( $this->get_field_id( $name ) ); ?>"
				>
				<?php foreach ( $options as $option => $label ) : ?>
					<option value="<?php echo esc_attr( $option ); ?>"<?php selected( $option, $value ); ?>>
						<?php echo esc_html( $label ); ?>
					</option>
				<?php endforeach; ?>
			</select>
		</p>
		<?php
	}
}
