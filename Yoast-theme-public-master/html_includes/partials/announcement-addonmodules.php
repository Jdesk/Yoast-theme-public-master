<?php
namespace Yoast\YoastCom\Theme;

$plugins = query_plugins( array(
	'posts_per_page' => 2,
	'orderby'        => 'rand',
	'tax_query' => array(
		array(
			'taxonomy' => 'yoast_plugin_category',
			'field'    => 'term_id',
			'terms'    => array( 303, 407 ),
		),
	),
) );
?>
<div class="announcement fill <?php echo esc_attr( $template_args['class'] ); ?>">
	<div class="row">
		<h2><?php _e( 'Yoast Premium Add-On Modules', 'yoastcom' ); ?></h2>

		<?php $i = 0; ?>
		<?php while ( $plugins->have_posts() ) : $plugins->the_post(); ?>
			<?php $icon = get_product_icon( get_the_ID(), 'diapositive' ); ?>
			<a href="<?php the_permalink(); ?>" class="more">
				<?php if ( $icon && 0 === ( $i % 2 ) ) : ?>
					<img src="<?php echo esc_url( $icon ); ?>" class="more__plug show-on-desktop" width="40" height="40" />
				<?php endif; ?>
				<div class="more__holder">
					<div class="more__title"><?php the_title(); ?>
						<small class="hide-on-tablet"><!-- Byline --></small></div>
					<small class="more__link hide-on-tablet"><?php printf( __( 'More about %s', 'yoastcom' ), get_the_title() ); ?> &raquo;</small>
				</div>
				<?php if ( $icon && 1 === ( $i++ % 2 ) ) : ?>
					<img src="<?php echo esc_url( $icon ); ?>" class="more__plug show-on-desktop" width="40" height="40" />
				<?php endif; ?>
			</a>
		<?php endwhile; wp_reset_postdata(); ?>
	</div>
</div>
