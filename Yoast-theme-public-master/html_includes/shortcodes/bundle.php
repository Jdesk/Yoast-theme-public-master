<?php
namespace Yoast\YoastCom\Theme;
?>
<div class="announcement announcement--pointer-top fill fill--secondary">
	<div class="row">
		<h2><?php echo esc_html( $template_args['heading'] ); ?></h2>
		<?php $bundles = query_bundles( array(
			'post__in'       => $template_args['bundles'],
			'posts_per_page' => 2
		) ); ?>
		<?php while ( $bundles->have_posts() ) : $bundles->the_post(); ?>
			<?php
			$url = post_meta( 'url' );
			if ( ! $url ) {
				$url = get_permalink();
			}

			$savings = trim( post_meta( 'savings' ) );
			if ( empty( $savings ) ) {
				$savings = '20';
			}
			?>
			<a href="<?php echo esc_url( $url ); ?>" class="more ">
				<div
					class="more__save "><?php printf( __( 'Save %s', 'yoastcom' ), '<span>' . $savings . '</span>' ); ?></div>
				<div class="more__holder">
					<div class="more__title"><?php the_title(); ?></div>
					<small
						class="more__link hide-on-tablet"><?php _e( 'More about this bundle &raquo;', 'yoastcom' ); ?></small>
				</div>
			</a>
		<?php endwhile;
		wp_reset_postdata(); ?>

	</div>
</div>
