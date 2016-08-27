<?php
/**
 * @package Yoast\YoastCom
 */

namespace Yoast\YoastCom\Theme;

$id = get_the_ID();
if ( isset( $template_args['id'] ) ) {
	$id = $template_args['id'];
}

$selected = -1;
if ( isset( $template_args['selected'] ) ) {
	$selected = $template_args['selected'];
}

$name = 'product-option';
if ( isset( $template_args['name'] ) ) {
	$name = $template_args['name'];
}

$label = __( 'Options', 'yoastcom' );
if ( isset( $template_args['label'] ) ) {
	$label = $template_args['label'];
}

$class = '';
if ( isset( $template_args['class'] ) ) {
	$class = $template_args['class'];
}

$pricing_options = edd_get_variable_prices( $id );

$html_id = $id . '_options';
if ( isset( $template_args['id_prefix'] ) ) {
	$html_id = $template_args['id_prefix'] . $html_id;
}
?>

<label for="<?php echo esc_attr( $html_id ); ?>">
	<?php echo esc_html( $label ); ?>
	<select name="<?php echo esc_attr( $name ); ?>"
	        id="<?php echo esc_attr( $html_id ); ?>"
	        class="<?php echo esc_attr( $class ); ?>"
	        data-download-id="<?php echo esc_attr( $id ); ?>">
	<?php foreach ( $pricing_options as $price_id => $pricing_option ) : ?>
			<option value="<?php echo esc_attr( $price_id ); ?>"<?php selected( $price_id, $selected ); ?>>
				<?php echo esc_html( $pricing_option['name'] ); ?>
				-
				<?php echo esc_html( edd_currency_filter( edd_format_amount( $pricing_option['amount'] ) ) ); ?>
			</option>
		<?php endforeach; ?>
	</select>
</label>
