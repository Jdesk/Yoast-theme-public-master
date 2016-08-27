<?php
/**
 * @package Yoast\YoastCom
 */

namespace Yoast\YoastCom\Theme;

edd_checkout_hidden_fields();

global $edd_options;
if ( isset( $edd_options['show_agree_to_terms'] ) ) {
$class = '';
if ( has_edd_error( 'agree_to_terms' ) ) {
$class = 'error';
edd_unset_error( 'agree_to_terms' );
}
?>
<fieldset id="edd_terms_agreement" class="<?php echo $class; ?>">
	<legend><?php _e( 'Terms of Service', 'yoast-theme' ); ?></legend>
	<input name="edd_agree_to_terms" type="checkbox" id="edd_agree_to_terms" value="1" />
	<label for="edd_agree_to_terms"><?php echo isset( $edd_options['agree_label'] ) ? $edd_options['agree_label'] : __( 'Agree to Terms?', 'yoast-theme' ); ?>
		<sup> *</sup></label>
</fieldset>
<br />
<?php
}
