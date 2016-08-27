<?php
/**
 * @package Yoast\YoastCom
 */

namespace Yoast\YoastCom\Theme;

/**
 * Handles the ajax requests in the theme
 */
class Ajax {

	/**
	 * Constructor
	 */
	public function __construct() {
		add_action( 'wp_ajax_cart_item_number', array( $this, 'cart_item_number' ) );
		add_action( 'wp_ajax_nopriv_cart_item_number', array( $this, 'cart_item_number' ) );

		add_action( 'wp_ajax_yst_update_variation', array( $this, 'update_variation' ) );
		add_action( 'wp_ajax_nopriv_yst_update_variation', array( $this, 'update_variation' ) );
	}

	/**
	 * Outputs a response to an AJAX request for the cart item number
	 */
	public function cart_item_number() {

		$data = wp_json_encode( [
			'status' => 'success',
			'data'   => [
				'cartItems' => function_exists( 'edd_get_cart_quantity' ) ? edd_get_cart_quantity() : 0,
			],
		] );

		header( 'Content-Type: text/javascript' );
		$callback = filter_input( INPUT_GET, 'callback' );
		printf( '%s(%s);', $callback, $data );

		wp_die();
	}

	/**
	 * Updates a product variation to a different one
	 */
	public function update_variation() {
		$download_id = filter_input( INPUT_POST, 'download_id' );
		$price_id    = filter_input( INPUT_POST, 'price_id' );

		if ( false === $download_id || false === $price_id ) {
			echo wp_json_encode( [
				'status' => 'error',
				'error'  => 'No download_id and price_id provided.',
			] );
			wp_die();
		}

		$old_download = edd_get_item_position_in_cart( $download_id );

		// Add first, then remove, to keep discount codes that might apply.
		edd_add_to_cart( $download_id, array( 'price_id' => $price_id ) );
		edd_remove_from_cart( $old_download );

		echo wp_json_encode( [
			'status' => 'success',
		] );
		wp_die();
	}
}
