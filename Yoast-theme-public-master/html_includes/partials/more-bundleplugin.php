<?php
namespace Yoast\YoastCom\Theme;

if ( ! isset( $template_args['class1'] ) ) {
	$template_args['class1'] = '';
}

if ( ! isset( $template_args['class2'] ) ) {
	$template_args['class2'] = '';
}

// Get all and randomize by JavaScript

$bundles = query_bundles(
	array(
		'posts_per_page' => - 1,
		'orderby' => 'rand',
		'post__not_in' => ['247896','99668'], // Exclude GA + GA eCommerce.
	)
);

?>
<div class="js-random-show-items" data-show-items="3">
	<?php

	while ( $bundles->have_posts() ) :
		$bundles->the_post();

		$url = post_meta( 'url' );
		if ( ! $url ) {
			$url = get_permalink();
		}

		$percentage = post_meta( 'savings' );
		$percentage = rtrim( $percentage, '%' );
		if ( ! $percentage || $percentage === '' ) {
			$percentage = '30';
		}

		?>
		<a href="<?php echo $url; ?>"
		   class="more hidden js-random-show-item <?php echo esc_attr( $template_args['class1'] ); ?>">
			<div class="more__save <?php echo esc_attr( $template_args['class2'] ); ?>">Save over
				<span><?php echo $percentage; ?>%</span></div>
			<div class="more__holder">
				<div class="more__title"><?php the_title(); ?></div>
				<small class="more__link hide-on-tablet">More about this bundle &raquo;</small>
			</div>
		</a>
		<?php

	endwhile;
	wp_reset_postdata();

	?>
</div>