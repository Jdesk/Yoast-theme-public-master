<?php
namespace Yoast\YoastCom\Theme;
?>
<hr class="hr--no-pointer">

<section class="row iceberg grid">
	<div class="one-third">
		<h3 class="h4"><?php _e( 'Stats about our free Yoast SEO Plugin', 'yoastcom' ); ?></h3>
		<dl>
			<dt><?php _e( '# Downloads', 'yoastcom' ); ?></dt>
			<dd><?php echo esc_html( get_plugin_info( post_meta( 'plugin' ), 'downloaded' ) ); ?></dd>

			<dt><?php _e( '# Ratings', 'yoastcom' ); ?></dt>
			<dd><?php echo esc_html( get_plugin_info( post_meta( 'plugin' ), 'num_ratings' ) ); ?></dd>

			<dt><?php _e( 'Rating', 'yoastcom' ); ?></dt>
			<dd itemprop="aggregateRating" itemscope itemtype="http://schema.org/AggregateRating">
				<?php get_template_part( 'html_includes/partials/plugin-rating', array(
					'rating'     => get_plugin_info( post_meta( 'plugin' ), 'rating' ),
					'rating_raw' => get_plugin_info( post_meta( 'plugin' ), 'rating_raw' ),
				) ); ?>
			</dd>
		</dl>
	</div>
	<div class="one-third">
		<?php if ( post_meta( 'extra_content' ) ) : ?>
			<?php echo post_meta( 'extra_content' ); ?>
		<?php endif; ?>
	</div>
	<div class="one-third">
		<?php get_template_part( 'html_includes/partials/plugin-refer-links' ); ?>
	</div>
</section>

<hr>
