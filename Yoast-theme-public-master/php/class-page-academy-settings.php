<?php

namespace Yoast\YoastCom\Theme;

/**
 * Adds academy page settings
 */
class Page_Academy_Settings {

	/**
	 * Adds WordPress hooks
	 */
	public function __construct() {
		add_action( 'cmb2_init', array( $this, 'settings' ) );
	}

	/**
	 * Adds the settings for the academy page
	 */
	public function settings() {
		$meta_box = new_cmb2_box( array(
			'id'           => 'yoastcom_page_academy_settings',
			'title'        => __( 'Page Academy Settings', 'yoastcom' ),
			'object_types' => array( 'page' ),
			'show_on'      => array(
				'key'   => 'page-template',
				'value' => 'page-template-academy.php',
			),
		) );

		$this->add_blocks( $meta_box, array(
			'block' => __( 'Left', 'yoastcom' ),
			'name'  => 'left',
		) );

		$this->add_blocks( $meta_box, array(
			'block' => __( 'Middle', 'yoastcom' ),
			'name'  => 'middle',
		) );

		$this->add_blocks( $meta_box, array(
			'block' => __( 'Right', 'yoastcom' ),
			'name'  => 'right',
		) );

		$this->add_blocks( $meta_box, array(
			'block' => __( 'Bottom', 'yoastcom' ),
			'name'  => 'bottom',
		) );

		$meta_box->add_field( array(
			'name' => __( 'Announcement Banner Text', 'yoastcom' ),
			'id'   => 'announcement_text',
			'type' => 'text',
		) );

		$meta_box->add_field( array(
			'name' => __( 'Announcement Banner Link', 'yoastcom' ),
			'id'   => 'announcement_link',
			'type' => 'text_url',
		) );

		$meta_box->add_field( array(
			'name'             => __( 'Announcement Banner Image', 'yoastcom' ),
			'id'               => 'announcement_image',
			'type'             => 'select',
			'show_option_none' => true,
			'options'          => Banner::options(),
		) );
	}

	/**
	 * @param \CMB2 $meta_box The meta box to add fields to.
	 * @param array $params   The params to add fields with.
	 */
	private function add_blocks( $meta_box, $params ) {
		$meta_box->add_field( array(
			'name' => $params['block'] . ' ' . __( 'block title', 'yoastcom' ),
			'id'   => 'block_' . $params['name'] . '_title',
			'type' => 'text',
		) );

		$meta_box->add_field( array(
			'name' => $params['block'] . ' ' . __( 'block description', 'yoastcom' ),
			'id'   => 'block_' . $params['name'] . '_description',
			'type' => 'textarea',
		) );

		$meta_box->add_field( array(
			'name' => $params['block'] . ' ' . __( 'block link text', 'yoastcom' ),
			'id'   => 'block_' . $params['name'] . '_link_text',
			'type' => 'text',
		) );

		$meta_box->add_field( array(
			'name' => $params['block'] . ' ' . __( 'block link', 'yoastcom' ),
			'id'   => 'block_' . $params['name'] . '_link',
			'type' => 'text_url',
		) );

		$meta_box->add_field( array(
			'name'    => $params['block'] . ' ' . __( 'block icon', 'yoastcom' ),
			'id'      => 'block_' . $params['name'] . '_icon',
			'type'    => 'select',
			'options' => array(
				'academy'   => 'Academy',
				'blog'      => 'Blog',
				'book'      => 'Book',
				'calendar'  => 'Calendar',
				'check'     => 'Checkmark',
				'drupal'    => 'Drupal',
				'gears'     => 'Gears',
				'pencil'    => 'Pencil',
				'plug'      => 'Plug',
				'video'     => 'Video',
				'wordpress' => 'WordPress',
			),
		) );
	}
}
