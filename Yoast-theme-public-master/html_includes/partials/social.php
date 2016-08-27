<?php
namespace Yoast\YoastCom\Theme;

$class = '';
if ( isset( $template_args['class'] ) ) {
	$class = $template_args['class'];
}
?>
<div class="social promoblock <?php echo esc_attr( $class ); ?>">
	<a class="fa fa-facebook-square" data-name="facebook" data-action="view" target="_blank" rel="external" href="https://www.facebook.com/yoast">
		<span>Facebook</span>
		<?php output_social_counter( 'facebook_likes' ); ?>
	</a>
	<a class="fa fa-instagram" data-name="instagram" data-action="view" target="_blank" rel="publisher external" href="https://instagram.com/yoast">
		<span>Instagram</span>
		<?php output_social_counter( 'instagram_followers' ); ?>
	</a>
	<a class="fa fa-linkedin-square" data-name="linkedin" data-action="view" target="_blank" rel="external" href="https://www.linkedin.com/company/yoast-com">
		<span>LinkedIn</span>
		<?php output_social_counter( 'linkedin_followers' ); ?>
	</a>
	<a class="fa fa-pinterest-square" data-name="pinterest" data-action="view" target="_blank" rel="external" href="https://www.pinterest.com/yoast/">
		<span>Pinterest</span>
		<?php output_social_counter( 'pinterest_followers' ); ?>
	</a>
	<a class="fa fa-twitter-square" data-name="twitter" data-action="view" target="_blank" rel="external" href="https://twitter.com/yoast">
		<span>Twitter</span>
		<?php output_social_counter( 'twitter_subs' ); ?>
	</a>
	<a class="fa fa-youtube-square" data-name="youtube" data-action="view" target="_blank" rel="external" href="https://www.youtube.com/yoast">
		<span>YouTube</span>
		<?php output_social_counter( 'youtube_subs' ); ?>
	</a>
	<a class="fa fa-envelope-square manual-optin-trigger" data-name="newsletter" data-optin-slug="kbpo9ryqjbnahlcc" target="_blank" href="<?php echo apply_filters( 'yoast:url', 'newsletter' ); ?>">
		<span>Newsletter</span>
	</a>
</div>
