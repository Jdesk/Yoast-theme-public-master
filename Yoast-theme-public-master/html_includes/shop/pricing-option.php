<?php
/**
 * @package Yoast\YoastCom
 */

namespace Yoast\YoastCom\Theme;

$pricing_option = '';
if ( isset( $template_args['download_id'] ) && isset( $template_args['price_id'] ) ) {
	$pricing_options = edd_get_variable_prices( $template_args['download_id'] );

	$pricing_option = $pricing_options[ $template_args['price_id'] ];
	$pricing_option = $pricing_option['name'];
}

?>

<?php _e( 'Option:', 'yoastcom' ); ?> <?php echo esc_html( $pricing_option ); ?>
