<?php
/**
 * @package Yoast\YoastCom
 */

namespace Yoast\YoastCom\Theme;

/**
 * Manages excerpts for the theme
 */
class Excerpt_Manager {

	/**
	 * @var int The length of the excerpt.
	 */
	protected $excerpt_length = null;

	/**
	 * @var string The text after the excerpt is cut off.
	 */
	protected $excerpt_more = null;

	/**
	 * Registers WordPress hooks
	 */
	public function add_hooks() {
		add_filter( 'excerpt_length', array( $this, 'excerpt_length' ) );
		add_filter( 'excerpt_more', array( $this, 'excerpt_more' ) );
	}

	/**
	 * Sets the excerpt length
	 *
	 * @param int $length
	 */
	public function length( $length ) {
		$this->excerpt_length = $length;
	}

	/**
	 * Modifies the WordPress excerpt length
	 *
	 * @param int $length
	 *
	 * @return int
	 */
	public function excerpt_length( $length ) {

		if ( null !== $this->excerpt_length ) {
			$length = $this->excerpt_length;
		}

		return $length;
	}

	/**
	 * Sets the excerpt more
	 *
	 * @param string $more
	 */
	public function more( $more ) {
		$this->excerpt_more = $more;
	}

	/**
	 * Modifies the WordPress excerpt more text
	 *
	 * @param string $more
	 *
	 * @return string
	 */
	public function excerpt_more( $more ) {

		if ( null !== $this->excerpt_more ) {
			$more = $this->excerpt_more;
		}

		return $more;
	}

	/**
	 * Clears all excerpt modifications
	 */
	public function clear() {
		$this->excerpt_length = null;
		$this->excerpt_more = null;
	}
}
