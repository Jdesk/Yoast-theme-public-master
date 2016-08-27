<?php
namespace Yoast\YoastCom\Theme;

if ( isset( $template_args['testimonial'] ) ) {
	$testimonial = $template_args['testimonial'];
} else {
	$testimonial = post_meta( 'testimonial' );
}

if ( $testimonial === '' ) {
	return;
}

if ( isset( $template_args['image_id'] ) ) {
	$image = wp_get_attachment_image( $template_args['image_id'], array( 140, 140 ) );
}
elseif ( isset( $template_args['image_url'] ) ) {
	$image = sprintf(
		'<img src="%s" width="140" height="140" />',
		$template_args['image_url']
	);
}
else {
	$image_meta = post_meta( 'testimonial_image' );
	if ( strpos( $image_meta, 'http' ) === 0 ) {
		$image = sprintf(
			'<img src="%s" width="140" height="140" />',
			$image_meta
		);
	} else {
		$image = wp_get_attachment_image( $image_meta, array( 140, 140 ) );
	}
}
?>
<div class="testimonial">
	<div class="media media--nofloat">
		<div class="img--right hide-on-tablet">
			<?php echo $image; ?>
		</div>
		<div class="bd">
			<blockquote><?php echo kses_blockquote( $testimonial ); ?></blockquote>
		</div>
	</div>
</div>
