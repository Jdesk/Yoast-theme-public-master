<?php
namespace Yoast\YoastCom\Theme;

/** @var \WP_Query $downloads */
$downloads = $template_args['downloads'];

if ( $downloads->have_posts() ): ?>

	<div class="checkout-cross-sell">
		<div class="row promoblock">
			<h2><?php _e( 'Did you see:', 'yoastcom' ); ?></h2>

			<div class="checkout-cross-sell__promotions">
				<?php
				while ( $downloads->have_posts() ) {
					$downloads->the_post();
					get_template_part( 'html_includes/partials/promoblock-buy-discrete' );
				}
				?>
			</div>
		</div>
	</div>
	<?php

	wp_reset_postdata();

endif;
