<?php

namespace Yoast\YoastCom\Theme;

$savings = post_meta( 'savings' );
if ( ! empty( $savings ) ) {
	if ( false === strpos( $savings, '%' ) ) {
		$savings = str_replace( ' ', '', edd_currency_filter( $savings ) );
	}
	
	printf( '<div class="more__save more__save--alone color-cta">%s</div>', sprintf( __( 'Save %s', 'yoastcom' ), "<span>$savings</span>" ) );
}
