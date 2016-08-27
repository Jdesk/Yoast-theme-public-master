<?php
namespace Yoast\YoastCom\Theme;

$function_args = $template_args['function_args'];
?>

<button type="submit" class="edd-add-to-cart edd-no-js" name="edd_purchase_download" value="Buy this bundle now" data-action="edd_add_to_cart" data-download-id="<?php echo esc_attr( $template_args['download_id'] ); ?>"><?php echo esc_html( $function_args['text'] ); ?></button>
