<?php
/**
 * @package Yoast\YoastCom
 */

namespace Yoast\YoastCom\Theme;

/**
 * Adds filters to change default WordPress texts
 */
class Term {

	public function __construct() {
		add_action( 'cmb2_admin_init', array( $this, 'register_taxonomy_metabox' ) );
	}

	/**
	 * Hook in and add a metabox to add fields to taxonomy terms
	 */
	public function register_taxonomy_metabox() {
		$prefix = 'yoastcom_term_';
		/**
		 * Metabox to add fields to categories and tags
		 */
		$cmb_term = new_cmb2_box( array(
			'id'           => $prefix . 'edit',
			'title'        => __( 'Category Metabox', 'cmb2' ), // Doesn't output for term boxes
			'object_types' => array( 'term' ), // Tells CMB2 to use term_meta vs post_meta
			'taxonomies'   => array( 'category', 'post_tag' ), // Tells CMB2 which taxonomies should have these fields
			// 'new_term_section' => true, // Will display in the "Add New Category" section
		) );

		$cmb_term->add_field( array(
			'name' => __( 'Theme specific data', 'yoastcom' ),
			'id'   => $prefix . 'title',
			'type' => 'title',
		) );

		$cmb_term->add_field( array(
			'name' => __( 'Short description', 'yoastcom' ),
			'desc' => __( 'Used in category lists', 'yoastcom' ),
			'id'   => $prefix . 'shortdesc',
			'type' => 'text',
		) );

		$cmb_term->add_field( array(
			'name' => __( 'Icon', 'yoastcom' ),
			'desc' => __( 'Used in category lists, select a Font Awesome icon and put its name here, like <code>search</code>.', 'yoastcom' ),
			'id'   => $prefix . 'icon',
			'type' => 'text_small',
		) );

		$taxonomy = isset( $_GET['taxonomy'] ) ? $_GET['taxonomy'] : '';
		$tag_ID   = isset( $_GET['tag_ID'] ) ? (int) $_GET['tag_ID'] : 0;

		$cmb_term->add_field( array(
			'name'    => __( 'Must read posts', 'yoastcom' ),
			'desc'    => __( 'The must read posts for this term.', 'yoastcom' ),
			'id'      => $prefix . 'mustread_posts',
			'type'    => 'custom_attached_posts',
			'options' => array(
				'filter_boxes'    => true,
				'show_thumbnails' => true,
				'hide_selected'   => true,
				'query_args'      => array(
					'tax_query'      => array(
						array(
							'taxonomy' => $taxonomy,
							'field'    => 'term_id',
							'operator' => 'IN',
							'terms'    => array( $tag_ID ),
						)
					),
					'posts_per_page' => - 1,
				),
			),
		) );

		$cmb_term->add_field( array(
			'name'    => __( 'Term Image', 'yoastcom' ),
			'id'      => $prefix . 'image',
			'type'    => 'file',
			'options' => array(
				'url'                  => false,
				'add_upload_file_text' => __( 'Change term image', 'yoastcom' ),
			)
		) );

		$cmb_term->add_field( array(
			'name' => __( 'Banner on page', 'yoastcom' ),
			'id'   => $prefix . 'banner_title',
			'type' => 'title',
		) );

		$cmb_term->add_field( array(
			'name' => __( 'Banner Icon', 'yoastcom' ),
			'id'   => $prefix . 'banner_icon',
			'type' => 'text_small',
		) );

		$cmb_term->add_field( array(
			'name' => __( 'Banner Text', 'yoastcom' ),
			'id'   => $prefix . 'banner_text',
			'type' => 'text',
		) );

		$cmb_term->add_field( array(
			'name' => __( 'Banner URL', 'yoastcom' ),
			'id'   => $prefix . 'banner_url',
			'type' => 'text_url',
		) );

	}
}
