<?php
/**
 * @package Yoast\YoastCom
 */

namespace Yoast\YoastCom\Theme;

/**
 * Handles the Query modifications
 */
class Query {

	/**
	 * Class constructor
	 */
	public function __construct() {
		add_action( 'pre_get_posts', array( $this, 'pre_get_posts' ) );
	}

	/**
	 * Handles filtering queries
	 *
	 * @param \WP_Query $query
	 */
	public function pre_get_posts( $query ) {
		if ( is_admin() ) {
			$this->admin_filter( $query );
		}

		if ( ! $query->is_main_query() ) {
			return;
		}

		if ( $query->is_post_type_archive( 'yoast_courses' ) ) {
			$this->courses_filter( $query );
		}

		if ( $query->is_tag || $query->is_author ) {
			$this->posts_filter( $query );
		}

		/**
		 * Don't filter search on admin
		 */
		if ( ! is_admin() && $query->is_search ) {
			$this->search_filter( $query );
		}

		if ( ! is_admin() && $query->is_post_type_archive( 'yoast_ebooks' ) ) {
			$this->ebooks_filter( $query );
		}
	}

	/**
	 * Filter away sub-pages on the archive
	 *
	 * @param \WP_Query $query
	 */
	private function courses_filter( $query ) {
		$query->set( 'post_parent', 0 );
		$query->set( 'orderby', 'menu_order' );
	}

	/**
	 * Adds other post types to search
	 *
	 * @param \WP_Query $query
	 */
	private function search_filter( $query ) {
		$post_types = array( 'post', 'page', 'yoast_plugins', 'yoast_ebooks', 'yoast_dev_article' );

		if ( isset( $_GET['post_type'] ) && in_array( $_GET['post_type'], $post_types ) ) {
			$query->set( 'post_type', $_GET['post_type'] );
			$query->set( 'post_parent', 0 );  // We only want the main pages, not explanatory pages
		} else {
			$query->set( 'post_type', $post_types );
		}

		$query->set( 'meta_query', array(
				array(
					'key'     => 'search_exclude',
					'compare' => 'NOT EXISTS'
				)
			)
		);
	}

	/**
	 * Adjust the query for tag archives so that Dev Blog articles are included too
	 *
	 * @param $query \WP_Query $query
	 */
	private function posts_filter( $query ) {
		$query->set( 'post_type', array( 'post', 'yoast_dev_article' ) );
	}

	/**
	 * Handles filters for the eBooks archive page
	 *
	 * @param \WP_Query $query
	 */
	private function ebooks_filter( $query ) {
		$meta_query = array(
			'relation' => 'AND',
			array(
				'key'     => 'is_bundle',
				'compare' => 'NOT EXISTS',
			),
			array(
				'relation' => 'OR',
				array(
					'key'     => 'is_excluded',
					'value'   => 'on',
					'compare' => '!='
				),
				array(
					'key'     => 'is_excluded',
					'compare' => 'NOT EXISTS'
				)
			)
		);

		$query->set( 'meta_query', $meta_query );
		$query->set( 'orderby', 'menu_order' );
		$query->set( 'order', 'ASC' );
		$query->set( 'post_parent', 0 );
	}

	/**
	 * Allows filtering the edit.php screen by mustread articles
	 *
	 * @param \WP_Query $query
	 */
	private function admin_filter( $query ) {
		if ( filter_input( INPUT_GET, 'mustread', FILTER_VALIDATE_INT ) === 1 ) {
			$query->set( 'meta_key', 'must_read' );
			$query->set( 'meta_value', 'on' );
		}
	}
}
