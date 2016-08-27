<?php
/**
 * @package Yoast\YoastCom
 */

namespace Yoast\YoastCom\Theme;

/**
 * Handles the color scheme in the theme
 *
 * @package Yoast\YoastCom
 */
class Color_Scheme {

	const HOME = 'theme-home';
	const ACADEMY = 'theme-academy';
	const SOFTWARE = 'theme-software';
	const REVIEW = 'theme-review';
	const ABOUT = 'theme-about';

	/**
	 * Constructor, adds WordPress hooks
	 */
	public function __construct() {
		add_filter( 'body_class', array( $this, 'body_class' ) );
		// replaced by the Page_Menu_Type selector.
//		add_action( 'cmb2_init', array( $this, 'page_color_selection' ) );
	}

	/**
	 * Adds the color scheme class to the body class
	 *
	 * @param array $classes The classes set by WordPress.
	 *
	 * @return array The new classes
	 */
	public function body_class( $classes ) {

		$color_scheme = $this->get_color_scheme();
		if ( '' !== $color_scheme ) {
			$classes[] = $color_scheme;
		}

		return $classes;
	}

	/**
	 * Returns the color scheme for the current page
	 *
	 * @return string
	 */
	public function get_color_scheme() {
		$color_scheme = apply_filters( 'yst_pre_get_color_scheme', false );
		if ( $color_scheme !== false ) {
			return $color_scheme;
		}

		$color_scheme = '';

		if ( $this->is_home_color_scheme() ) {
			$color_scheme = self::HOME;
		}
		elseif ( $this->is_academy_color_scheme() ) {
			$color_scheme = self::ACADEMY;
		}
		elseif ( $this->is_software_color_scheme() ) {
			$color_scheme = self::SOFTWARE;
		}
		elseif ( $this->is_review_color_scheme() ) {
			$color_scheme = self::REVIEW;
		}
		elseif ( $this->is_about_color_scheme() ) {
			$color_scheme = self::ABOUT;
		}

		return $color_scheme;
	}

	/**
	 * Adds the custom meta boxes for the page color selection
	 */
	public function page_color_selection() {
		$meta_box = new_cmb2_box( array(
			'id'           => 'yoastcom_color_selection',
			'title'        => __( 'Select color', 'yoastcom' ),
			'object_types' => array( 'page' ),
		) );

		$meta_box->add_field( array(
			'name'             => __( 'Color scheme', 'yoastcom' ),
			'id'               => 'yoastcom_color_scheme',
			'type'             => 'select',
			'show_option_none' => __( 'Inherit', 'yoastcom' ),
			'options'          => array(
				self::ACADEMY  => __( 'Academy (Purple)', 'yoastcom' ),
				self::SOFTWARE => __( 'Software (Blue)', 'yoastcom' ),
				self::REVIEW   => __( 'Review (Green)', 'yoastcom' ),
				self::ABOUT    => __( 'About (Pink)', 'yoastcom' ),
			),
		) );
	}

	/**
	 * Determines if this is the home color scheme
	 *
	 * @return bool
	 */
	private function is_home_color_scheme() {
		return is_page_template( 'page-template-front-page.php' ) || ( is_home() && is_front_page() ) || ( function_exists( 'edd_is_checkout' ) && edd_is_checkout() );
	}

	/**
	 * Determines if this is the academy color scheme
	 *
	 * @return bool
	 */
	private function is_academy_color_scheme() {
		return (
			is_singular( 'post' )
			|| is_singular( 'yoast_ebooks' )
			|| is_singular( 'course' )
			|| is_singular( 'lesson' )
			|| is_singular( 'llms_quiz' )
			|| is_singular( 'yoast_courses' )
			|| is_home()
			|| is_search()
			|| (
				is_archive()
				&& ! is_post_type_archive( array( 'yoast_plugins', 'yoast_dev_article' ) )
				&& ! is_tax( 'yoast_dev_category' )
			)
			|| self::ACADEMY === $this->get_color_scheme_setting()
		);
	}

	/**
	 * Determines if this is the software color scheme
	 *
	 * @return bool
	 */
	private function is_software_color_scheme() {
		return (
			is_post_type_archive( array( 'yoast_plugins', 'yoast_dev_article' ) )
			|| is_tax( 'yoast_dev_category' )
			|| in_array( get_post_type(), array(
				'plugin_review',
				'yoast_plugins',
				'yoast_themes',
				'yoast_dev_article'
			) )
			|| self::SOFTWARE === $this->get_color_scheme_setting()
		);
	}

	/**
	 * Determines if this is the review color scheme
	 *
	 * @return bool
	 */
	private function is_review_color_scheme() {
		return (
			self::REVIEW === $this->get_color_scheme_setting()
		);
	}

	/**
	 * Determines if this is the about color scheme
	 *
	 * @return bool
	 */
	private function is_about_color_scheme() {
		return (
			'speaking_event' === get_post_type()
			|| self::ABOUT === $this->get_color_scheme_setting()
		);
	}

	/**
	 * Returns the color scheme setting as set in the admin
	 *
	 * @param int $post_id Optional The ID to get the color scheme for.
	 *
	 * @return string
	 */
	private function get_color_scheme_setting( $post_id = null ) {
		if ( null === $post_id ) {
			$post_id = get_the_ID();
		}

		$color_scheme = get_post_meta( $post_id, 'yoastcom_color_scheme', true );

		// If no color scheme is set try the parents color scheme.
		if ( '' === $color_scheme ) {
			$color_scheme = $this->get_parent_color_scheme_setting( $post_id );
		}

		return $color_scheme;
	}

	/**
	 * Returns the color scheme setting for the parent as set in the admin
	 *
	 * @param int $post_id The ID to get the parent setting for.
	 *
	 * @return string
	 */
	private function get_parent_color_scheme_setting( $post_id ) {
		$parent_id    = wp_get_post_parent_id( $post_id );
		$color_scheme = '';

		// If there is a parent return the parents color scheme.
		if ( $parent_id ) {
			$color_scheme = $this->get_color_scheme_setting( $parent_id );
		}

		return $color_scheme;
	}
}
