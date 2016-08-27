<?php

namespace Yoast\YoastCom\Theme;

if ( ! isset( $template_args['rating_raw'] ) ) {
	$template_args['rating_raw'] = 0;
}

if ( ! isset( $template_args['rating'] ) ) {
	$template_args['rating'] = 0;
}

$friendly_rating = number_format( ( $template_args['rating_raw'] / 20 ), 1 );

?>
<div class="rating-wrapper">
	<div class="rating"
		title="<?php printf( __( 'Rated %s out of 5 Stars', 'yoastcom' ), esc_attr( $friendly_rating ) ); ?>"
		style="width: <?php echo esc_attr( $template_args['rating_raw'] ); ?>%">
		<span class="screen-reader-text"><?php printf( __( 'Rated %s out of 5 Stars', 'yoastcom' ), esc_attr( $friendly_rating ) ); ?></span>
	</div>
</div>
