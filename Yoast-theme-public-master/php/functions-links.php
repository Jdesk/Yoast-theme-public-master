<?php

namespace Yoast\YoastCom\Theme;

/**
 * The link text to link to an authors posts archive
 *
 * @return string
 */
function link_text_author_posts() {
	$gender = get_the_author_meta( 'gender' );

	switch ( $gender ) {
		case 'Female':
			$text = __( 'View her other posts', 'yoastcom' );
			break;

		case 'Male':
			$text = __( 'View his other posts', 'yoastcom' );
			break;

		default:
			$text = __( 'View their other posts', 'yoastcom' );
			break;
	}

	return $text;
}

/**
 * The link text to link to an author's post archive or social media
 *
 * @return string
 */
function link_text_author_posts_or_find() {
	$gender = get_the_author_meta( 'gender' );

	switch ( $gender ) {
		case 'Female':
			$text = __( '%1$sView her other posts%2$s or find her on %3$s' );
			break;

		case 'Male':
			$text = __( '%1$sView his other posts%2$s or find him on %3$s', 'yoastcom' );
			break;

		default:
			$text = __( '%1$sView their other posts%2$s or find them on %3$s', 'yoastcom' );
			break;
	}

	return $text;
}

/**
 * The link text to link to an author's post archive or social media
 *
 * @return string
 */
function link_text_author_bio_or_find() {
	$gender = get_the_author_meta( 'gender' );

	switch ( $gender ) {
		case 'Female':
			$text = __( '%1$sRead all about %3$s%2$s or find her on ' );
			break;

		case 'Male':
			$text = __( '%1$sRead all about %3$s%2$s or find him on ', 'yoastcom' );
			break;

		default:
			$text = __( '%1$sRead all about %3$s%2$s or find them on ', 'yoastcom' );
			break;
	}

	return $text;
}

/**
 * Return author image URL
 *
 * @return string
 */
function url_author_image() {
	$image_url = get_the_author_meta( 'author-picture' );
	if ( empty( $image_url ) ) {
		$image_url = get_the_author_meta( 'yst_image_url' );
	}
	if ( empty( $image_url ) ) {
		$image_url = get_avatar( get_the_author_meta( 'email' ) );
	}

	return $image_url;
}

/**
 * @return false|string
 */
function url_author_avatar() {
	$image_url = get_the_author_meta( 'author-avatar' );
	if ( empty( $image_url ) ) {
		$image_url = get_avatar_url( get_the_author_meta( 'ID' ) );
	}

	return $image_url;
}

/**
 * Return categories overview URL
 *
 * @return string
 */
function url_page_categories() {
	return home_url( 'categories/' );
}

/**
 * Returns an author's social site URL
 *
 * @param string $social_site The social site to retrieve the URL for.
 *
 * @return string
 */
function url_social_site( $social_site ) {
	$url = get_the_author_meta( $social_site );

	if ( ! empty( $url ) ) {
		switch ( $social_site ) {
			case 'twitter':
				$url = 'https://twitter.com/' . $url;
				break;
		}
	}

	return $url;
}

/**
 * Determines if the user has a social site account
 *
 * @param string $social_site The social site to check.
 *
 * @return bool
 */
function author_has( $social_site ) {
	$link = url_social_site( $social_site );

	return ! empty( $link );
}

/**
 * Returns the URL for the shop page
 *
 * @return string
 */
function url_shop_page() {
	return apply_filters( 'yoast:url', 'shop' );
}

/**
 * Returns the URL to the checkout page
 *
 * @return string
 */
function url_checkout() {
	return apply_filters( 'yoast:url', 'checkout' );
}

/**
 * Returns the URL for a zip download for a certain plugin
 *
 * @param int $post_ID The post ID to retrieve the plugin download url for.
 *
 * @return string
 */
function url_plugin_download( $post_ID = null ) {

	if ( null === $post_ID ) {
		$post_ID = get_the_ID();
	}

	return 'http://downloads.wordpress.org/plugin/' . get_post_meta( $post_ID, 'plugin', true ) . '.latest-stable.zip';
}

/**
 * Returns the URL of the plugin overview
 *
 * @return string
 */
function url_plugin_overview() {
	return apply_filters( 'yoast:url', 'plugin_overview' );
}

/**
 * Returns the URL where users can follow the plugin development
 *
 * @return string
 */
function url_follow_dev() {
	return post_meta( 'github' );
}

/**
 * Returns the URL where users can post bug reports
 *
 * @return string
 */
function url_bug_report() {
	return trailingslashit( post_meta( 'github' ) ) . 'issues/';
}

/**
 * Returns the URL to the plugin changelog
 *
 * @return string
 */
function url_plugin_changelog() {
	$url = '';

	// If the plugin is premium (buyable on yoast.com it has a changelog on yoast.com).
	if ( post_meta( 'download_id' ) ) {
		$url = get_permalink( get_the_ID() ) . 'change-log/';
	}

	return $url;
}

/**
 * Returns the URL to the website review page
 *
 * @return string
 */
function url_website_review() {
	return apply_filters( 'yoast:url', 'website_review' );
}

/**
 * Returns the URL of the ebooks archive
 */
function url_ebooks_archive() {
	return apply_filters( 'yoast:url', 'ebooks_archive' );
}

/**
 * Returns the URL of the academy overview
 */
function url_academy_overview() {
	return apply_filters( 'yoast:url', 'academy_overview' );
}
