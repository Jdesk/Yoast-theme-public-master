<?php
namespace Yoast\YoastCom\Theme;

if ( is_author() ) {
	$twitter_url = get_the_author_meta( 'twitter' );
	if ( ! empty( $twitter_url ) && strpos( $twitter_url, 'http' ) !== 0 ) {
		$twitter_url = 'https://twitter.com/' . $twitter_url;
	}
	$linkedin_url = get_the_author_meta( 'linkedin' );
	$facebook_url = get_the_author_meta( 'facebook' );
}
?>
<?php if ( ! empty( $twitter_url ) ) { ?>
<a href="<?php echo esc_url( $twitter_url ) ; ?>" class="link--naked">
	<span class="visuallyhidden focusable">Twitter</span>
	<span class="text-icon text-icon--twitter text-icon--social">&#xf081;</span>
</a>
<?php } ?>
<?php if ( ! empty( $linkedin_url ) ) { ?>
<a href="<?php echo esc_url( $linkedin_url ) ; ?>" class="link--naked">
	<span class="visuallyhidden focusable">Linkedin</span>
	<span class="text-icon text-icon--linkedin text-icon--social">&#xf08c;</span>
</a>	
<?php } ?>
<?php if ( ! empty( $facebook_url ) ) { ?>
	<a href="<?php echo esc_url( $facebook_url ) ; ?>" class="link--naked">
		<span class="visuallyhidden focusable">Facebook</span>
		<span class="text-icon text-icon--facebook text-icon--social">&#xf082;</span>
	</a>
<?php } ?>
