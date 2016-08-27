<?php
/**
 * @package Yoast\YoastCom
 */

namespace Yoast\YoastCom\Theme;
?>
<form id="edd_payment_mode" class="edd_form" action="<?php echo esc_url( edd_get_current_page_url() ); ?>" method="GET">
	<fieldset id="edd_payment_mode_select">
		<div class="row">
			<div class="grid">

				<div class="five-seventh">
					<div class="checkout-payment--title"><?php _e( 'How do you want to pay?', 'yoastcom' ); ?></div>

					<div class="checkout--payment-options">
						<fieldset>
							<?php $gateways = edd_get_enabled_payment_gateways( true ); ?>
							<?php foreach ( $gateways as $gateway_id => $gateway ) :
								$class = ( $gateway_id === edd_get_default_gateway() ) ? ' edd-gateway-option-selected' : '';
								?>
								<div class="checkout--payment-option <?php echo sanitize_title($gateway['admin_label']) ?>">
									<label class="edd-gateway-option<?php echo $class ?>"
									       for="edd-gateway-<?php echo esc_attr( $gateway_id ); ?>">
										<input type="radio" name="payment-mode" class="edd-gateway"
										       id="edd-gateway-<?php echo esc_attr( $gateway_id ); ?>"
										       value="<?php echo esc_attr( $gateway_id ); ?>"
											<?php checked( $gateway_id, edd_get_default_gateway() ); ?>/>

								<span
									class="text-icon checkout--payment-icon <?php echo esc_attr( get_gateway_css_class( $gateway ) ); ?>"
									title="<?php echo esc_attr( $gateway['checkout_label'] ); ?>"></span>

										<?php the_gateway_image( $gateway ); ?>
									</label>
								</div>
							<?php endforeach; ?>
						</fieldset>
					</div>
				</div>
				<div class="two-seventh">
					<input type="hidden" name="edd_action" value="gateway_select"/>
					<input type="hidden" name="page_id" value="<?php the_ID(); ?>"/>
					<button type="submit" name="gateway_submit" value="test123" id="edd_next_button"
					        class="edd-submit button default small">
						<?php _e( 'Continue', 'yoastcom' ); ?> &raquo;
					</button>
				</div>
			</div>
		</div>
	</fieldset>
</form>

