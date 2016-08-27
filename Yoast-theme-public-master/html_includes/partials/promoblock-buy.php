<?php
namespace Yoast\YoastCom\Theme;

if ( ! isset( $template_args['download_id'] ) ) {
	return;
}

$download_id = $template_args['download_id'];
$download = new \EDD_Download( $template_args['download_id'] );

?>
<div class="promoblock">
	<h2 class="tight"><?php echo esc_html( $download->post_title ); ?></h2>
	<p><?php _e( '1 year upgrades &amp; support', 'yoastcom' ); ?></p>
	<form action="<?php echo esc_url( edd_get_checkout_uri() ); ?>" id="yst_edd_purchase_<?php echo esc_attr( $download_id ); ?>" class="edd_download_purchase_form edd_purchase_<?php echo esc_attr( $download_id ); ?>" method="post">
		<?php if ( $download->has_variable_prices() ) : ?>
			<label for="yst_edd_purchase_<?php echo esc_attr( $download_id ); ?>_options">
				<?php get_template_part( 'html_includes/shop/pricing-options', array(
					'name'      => 'edd_options[price_id][]',
					'id'        => $download_id,
					'id_prefix' => 'yst_edd_purchase_',
				) ); ?>
			</label>
		<?php else : ?>
			<label>
				<?php _e( 'Amount', 'yoastcom' ); ?>
				<input type="number" min="1" step="1"
				       name="edd_options[quantity]"
				       class="edd-input edd-item-quantity size-s"
				       value="1" />
			</label>
		<?php endif; ?>

		<input type="hidden" name="edd_action" class="edd_action_input" value="add_to_cart" />
		<input type="hidden" name="download_id" value="<?php echo esc_attr( $download_id ); ?>" />
		<input type="hidden" name="edd_redirect_to_checkout" value="1" />

		<button type="submit" class="default bottom-right">
			<?php _e( 'Buy Premium', 'yoastcom' ); ?> &raquo;
		</button>
	</form>
</div>
