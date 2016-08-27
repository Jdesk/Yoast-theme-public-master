<?php
/**
 * @package Yoast\YoastCom
 */

namespace Yoast\YoastCom\Theme;

/**
 * Class Featured_Image
 * @package Yoast\YoastCom\Theme
 */
class Featured_Image {

	/**
	 * Featured_Image constructor.
	 */
	public function __construct() {
		if ( ! is_admin() ) {
			add_filter( 'the_content', array( $this, 'article_mark_featured_image' ) );
		}
	}

	/**
	 * Add a class to the featured image inside the content
	 * 
	 * @param $content
	 *
	 * @return mixed
	 */
	public function article_mark_featured_image( $content ) {
		$post_type = get_post_type();
		if ( 'post' !== $post_type ) {
			return $content;
		}

		if ( ! has_post_thumbnail() ) {
			return $content;
		}

		$thumbnail_id = get_post_thumbnail_id();
		return preg_replace( '~(["\s])wp\-image\-' . $thumbnail_id . '(["\s])~', '\\1wp-image-' . $thumbnail_id . ' featured-image\\2', $content);
	}
}
