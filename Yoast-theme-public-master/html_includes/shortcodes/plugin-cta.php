<?php

namespace Yoast\YoastCom\Theme;

$premium_plugin = post_meta( 'connected_premium_plugin' );
?>
<?php  ?>
<?php if ( $premium_plugin ) : ?>
	<a href="<?php echo esc_url( get_permalink( $premium_plugin ) ); ?>#download-plugin" class="button default"><?php printf( __( 'Buy Premium from $%d', 'yoastcom' ), get_post_meta( $premium_plugin, 'min_price', true ) ); ?> &raquo;</a>
<?php endif; ?>

<?php if ( post_meta( 'download_id' ) ) : ?>
	<a href="#download-plugin" class="button default"><?php printf( __( 'Buy Premium from $%d', 'yoastcom' ), post_meta( 'min_price' ) ); ?> &raquo;</a>
<?php endif; ?>

<?php if ( post_meta( 'plugin' ) ) : ?>
	<a href="<?php echo esc_url( url_plugin_download() ); ?>" class="button dimmed"><?php _e( 'Download the free plugin', 'yoastcom' ); ?> &raquo;</a>
<?php endif; ?>
