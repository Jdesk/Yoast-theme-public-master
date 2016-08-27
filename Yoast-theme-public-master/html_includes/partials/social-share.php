<?php
namespace Yoast\YoastCom\Theme;

if ( yst_skip_social() ) {
	return;
}

/**
 * Create and output a share URL
 *
 * @param string $type
 */
function yst_build_share_url( $type ) {
	$article_url = \WPSEO_Frontend::get_instance()->canonical( false );
	$article_url .= '#utm_source=' . $type . '&utm_medium=social&utm_campaign=social_buttons';

	$og          = new \WPSEO_OpenGraph();
	$title       = html_entity_decode( $og->og_title( false ) );
	$description = html_entity_decode( $og->description( false ) );

	$url = '';

	switch ( $type ) {
		case 'facebook':
			$og_image = new \WPSEO_OpenGraph_Image( \WPSEO_Options::get_all() );
			$images   = $og_image->get_images();

			$url = 'http://www.facebook.com/sharer/sharer.php?s=100';

			$url .= '&p[url]=' . urlencode( $article_url );
			$url .= '&p[title]=' . urlencode( $title );
			$url .= '&p[images][0]=' . urlencode( $images[0] );
			$url .= '&p[summary]=' . urlencode( $description );
			$url .= '&u=' . urlencode( $article_url );
			$url .= '&t=' . urlencode( $title );

			break;

		case 'linkedin':
			$url = 'http://www.linkedin.com/shareArticle?mini=true&source=Yoast&summary=' . $description . '&title=' . urlencode( $title ) . '&url=' . urlencode( $article_url );
			break;

		case 'pinterest':
			$image_id = get_post_thumbnail_id( get_the_ID() );
			if ( $image_id ) {
				$img = wp_get_attachment_image_src( $image_id, 'original', false );
				$img = $img[0];
			} else {
				$og_image = new \WPSEO_OpenGraph_Image( \WPSEO_Options::get_all() );
				$images   = $og_image->get_images();
				$img      = $images[0];
			}
			$url = 'https://www.pinterest.com/pin/create/button/?url=' . urlencode( $article_url ) . '&media=' . urlencode( $img ) . '&description=' . urlencode( $description );
			break;

		case 'print':
			$url = 'http://www.printfriendly.com/print?url=' . urlencode( $article_url );
			break;

		case 'twitter':
			$tw_title = \WPSEO_Meta::get_value( 'twitter-title', get_the_ID() );
			if ( ! is_string( $tw_title ) || $tw_title === '' ) {
				$tw_title = $title;
			}
			$author = get_the_author_meta( 'twitter' );
			if ( ! is_string( $author ) || $author === '' ) {
				$author = 'jdevalk';
			}
			$url = 'https://twitter.com/intent/tweet?url=' . urlencode( $article_url ) . '&via=yoast&related=' . $author . '&text=' . urlencode( $tw_title );
			break;
	}

	echo esc_attr( $url );
}


?>
<div id="social-share">
	<div class="socialbox">
		<a rel="nofollow" target="_blank" data-name="facebook" data-action="share"
		   href="<?php yst_build_share_url( 'facebook' ); ?>"><i
				class="fa fa-facebook-square text-icon--facebook"></i>Share</a>
	</div>

	<div class="socialbox">
		<a rel="nofollow" target="_blank" data-name="twitter" data-action="tweet"
		   href="<?php yst_build_share_url( 'twitter' ); ?>"><i
				class="fa fa-twitter-square text-icon--twitter"></i>Tweet</a>
	</div>

	<div class="socialbox">
		<a rel="nofollow" target="_blank" data-name="linkedin" data-action="share"
		   href="<?php yst_build_share_url( 'linkedin' ); ?>"><i
				class="fa fa-linkedin-square text-icon--linkedin"></i>Share</a>
	</div>

	<div class="socialbox">
		<a rel="nofollow" target="_blank" data-name="pinterest" data-action="pin"
		   href="<?php yst_build_share_url( 'pinterest' ); ?>"><i
				class="fa fa-pinterest-square text-icon--pinterest"></i>Pin it</a>
	</div>

	<div class="socialbox">
		<a rel="nofollow" target="_blank" data-name="print" data-action="print"
		   href="<?php yst_build_share_url( 'print' ); ?>"><i
				class="fa fa-print"></i>Print</a>
	</div>

	<div class="socialbox">
		<a target="_blank" data-name="subscribe" data-action="subscribe" data-popup="false" class="manual-optin-trigger" data-optin-slug="kbpo9ryqjbnahlcc"
		   href="<?php echo apply_filters( 'yoast:url', 'newsletter' ); ?>"><i
				class="color-academy--secondary fa fa-envelope-square"></i>Subscribe</a>
	</div>
</div>
