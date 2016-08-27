<?php
/**
 * @package Yoast\YoastCom
 */

namespace Yoast\YoastCom\Theme;

$email_error_class = '';
if ( $email_error = has_edd_error( 'email_empty' ) ) {
	$email_error_class = 'error';
	edd_unset_error( 'email_empty' );
}
else if ( $email_error = has_edd_error( 'invalid_email' ) ) {
	$email_error_class = 'error';
	edd_unset_error( 'invalid_email' );
}

$fn_error_class = '';
if ( $fn_error = has_edd_error( 'invalid_first_name' ) ) {
	$fn_error_class = 'error';
	edd_unset_error( 'invalid_first_name' );
}

$ln_error_class = '';
if ( $ln_error = has_edd_error( 'invalid_last_name' ) ) {
	$ln_error_class = 'error';
	edd_unset_error( 'invalid_last_name' );
}

$customer = get_customer();

?>
<fieldset id="edd_checkout_user_info">
	<span><legend><?php echo apply_filters( 'edd_checkout_personal_info_text', __( 'Personal Info', 'yoast-theme' ) ); ?></legend></span>

	<p id="edd-first-name-wrap">
		<label class="edd-label <?php echo $fn_error_class; ?>" for="edd_first">
			<?php _e( 'First Name', 'yoast-theme' ); ?>
		</label>
		<input class="edd-input <?php echo $fn_error_class; ?>" type="text" name="edd_first" id="edd_first" value="<?php echo esc_attr( $customer['first_name'] ); ?>" />
		<?php if ( ! empty( $fn_error ) ) {
			echo '<span class="error">' . $fn_error . '</span>';
		} ?>
	</p>

	<p id="edd-last-name-wrap">
		<label class="edd-label <?php echo $ln_error_class; ?>" for="edd_last">
			<?php _e( 'Last Name', 'yoast-theme' ); ?>
		</label>
		<input class="edd-input <?php echo $ln_error_class; ?>" type="text" name="edd_last" id="edd_last" value="<?php echo esc_attr( $customer['last_name'] ); ?>" />
		<?php if ( ! empty( $ln_error ) ) {
			echo '<span class="error">' . $ln_error . '</span>';
		} ?>
	</p>

	<?php do_action( 'edd_purchase_form_before_email' ); ?>
	<p class="clear" id="edd-email-wrap">
		<label class="edd-label <?php echo $email_error_class; ?>" for="edd_email">
			<?php _e( 'Email Address', 'yoast-theme' ); ?>
		</label>
		<input class="edd-input <?php echo $email_error_class; ?>" type="email" name="edd_email" id="edd_email" value="<?php echo esc_attr( $customer['email'] ); ?>" />
		<?php if ( ! empty( $email_error ) ) {
			echo '<span class="error">' . $email_error . '</span>';
		} ?>
	</p>
	<?php do_action( 'edd_purchase_form_after_email' ); ?>

	<?php do_action( 'edd_purchase_form_user_info' ); ?>
</fieldset>
<?php
