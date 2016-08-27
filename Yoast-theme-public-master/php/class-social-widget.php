<?php
/**
 * @package Yoast\YoastCom
 */

namespace Yoast\YoastCom\Theme;

/**
 * A promo widget for certain promo areas
 */
class Social_Widget extends Widget {

	/**
	 * Inits the widget with WordPress
	 */
	public static function init() {
		register_widget( __CLASS__ );
	}

	/**
	 * Constructor
	 */
	public function __construct() {
		parent::__construct( 'yst-social-widget', 'Yoast Social Links Widget', array(
			'classname' => '',
		) );
	}

	/**
	 * Outputs the social links
	 */
	public function widget( $args, $instance ) {
		get_template_part( 'html_includes/partials/social' );
	}
}
