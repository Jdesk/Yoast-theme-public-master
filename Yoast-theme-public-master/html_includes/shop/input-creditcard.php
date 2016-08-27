<?php
/**
 * @package Yoast\YoastCom
 */

namespace Yoast\YoastCom\Theme;
?>

<?php do_action( 'edd_before_cc_fields' ); ?>

<fieldset id="edd_cc_fields">
	<span><legend><?php _e( 'Credit Card Info', 'yoast-theme' ); ?></legend></span>
	<p>Credit cards are handled through <a href="https://stripe.com/">Stripe</a>, your Credit Card info never touches our server.</p>
	<p class="card-box" id="edd-card-number-wrap">
		<label class="edd-label" for="card_number">
			<?php _e( 'Card Number', 'yoast-theme' ); ?>
		</label>
		<input type="text" pattern="\d*" novalidate autocompletetype="cc-number" placeholder="•••• •••• •••• ••••" id="card_number" name="card_number" class="card-number edd-input" />
		<span class="card-type"></span>
	</p>

	<?php do_action( 'edd_before_cc_expiration' ); ?>
	<p class="card-box card-expiration">
		<label for="card_exp_month" class="edd-label">
			<?php _e( 'Expires', 'yoast-theme' ); ?>
		</label>
		<input type="text" min="1" max="12" placeholder="MM" pattern="\d*" name="card_exp_month" id="card_exp_month" class="card-expiry-month edd-input edd-input-cvc" />
		<span class="separator">/</span>
		<input type="text" min="1" max="99" placeholder="YY" pattern="\d*" name="card_exp_year" id="card_exp_year" class="card-expiry-year edd-input edd-input-cvc" />
	</p>
	<?php do_action( 'edd_after_cc_expiration' ); ?>

	<p class="card-box clear" id="edd-card-name-wrap">
		<label for="card_name" class="edd-label">
			<?php _e( 'Name on card', 'yoast-theme' ); ?>
		</label>
		<input type="text" autocompletetype="cc-full-name" id="card_name" name="card_name" class="card-name edd-input" />
	</p>

	<p class="card-box" id="edd-card-cvc-wrap">
		<label class="edd-label">
			<?php _e( 'Card code', 'yoast-theme' ); ?>
		</label>
		<input placeholder="CVC" type="text" size="8" pattern="\d*" novalidate autocomplete="off" autocompletetype="cc-csc" id="card_cvc" name="card_cvc" class="card-cvc edd-input edd-input-small" />
	</p>

</fieldset>
<?php
do_action( 'edd_after_cc_fields' );

