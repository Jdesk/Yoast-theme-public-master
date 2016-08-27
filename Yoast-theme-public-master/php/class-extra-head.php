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
class Extra_Head {

	/**
	 * Constructor, adds WordPress hooks
	 */
	public function __construct() {
		add_action( 'wp_head', array( $this, 'extra_head' ), 99 );
		add_action( 'cmb2_init', array( $this, 'extra_head_insertion' ) );
	}

	/**
	 * Output the extra header code
	 */
	public function extra_head() {
		$extra_head = $this->get_extra_head();
		if ( false !== $extra_head ) {
			echo $extra_head;
		}
	}

	/**
	 * Returns the color scheme for the current page
	 *
	 * @param int $post_id
	 *
	 * @return string
	 */
	public function get_extra_head( $post_id = null ) {
		if ( null === $post_id ) {
			$post_id = get_the_ID();
		}

		return get_post_meta( $post_id, 'yoastcom_extra_head', true );
	}

	/**
	 * Adds the custom meta boxes for the page color selection
	 */
	public function extra_head_insertion() {
		$meta_box = new_cmb2_box( array(
			'id'           => 'yoastcom_extra_head_input',
			'title'        => __( 'Advanced post settings', 'yoastcom' ),
			'object_types' => array( 'page', 'post', 'yoast_dev_article' ),
			'priority'     => 'low',
			'show_on'      => array( 'key' => 'role', 'value' => 'administrator' ),
		) );

		$meta_box->add_field( array(
			'name' => __( 'Add body class', 'yoastcom' ),
			'id'   => 'yoastcom_extra_body_class',
			'type' => 'text',
		) );

		$meta_box->add_field( array(
			'name' => __( 'Extra header scripts or tags', 'yoastcom' ),
			'id'   => 'yoastcom_extra_head',
			'desc' => __( 'Note that these are not escaped in any way, so be cautious!' ),
			'type' => 'textarea_code',
		) );
	}
}
