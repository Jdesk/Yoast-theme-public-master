<?php


namespace Yoast\YoastCom\Theme;

/**
 * Holds the banner options
 */
class Banner {

	const HOME = 'home';
	const REVIEWS = 'reviews';
	const ACADEMY = 'academy';
	const SOFTWARE = 'software';

	/**
	 * Returns the options for use in a CMB2 select field
	 *
	 * @return array
	 */
	public static function options() {
		return array(
			self::REVIEWS => __( 'Reviews', 'yoastcom' ),
			self::ACADEMY => __( 'Academy', 'yoastcom' ),
			self::SOFTWARE => __( 'Software', 'yoastcom' ),
		);
	}
}
