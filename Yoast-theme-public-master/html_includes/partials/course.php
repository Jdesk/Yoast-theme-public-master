<?php
namespace Yoast\YoastCom\Theme;
?>
<div class="media media--nofloat product">
	<?php if ( post_meta( 'course_image' ) ) : ?>
		<div class="vid">
			<a href="<?php the_permalink(); ?>"><img alt="<?php esc_attr_e( get_the_title() ); ?>" src="<?php echo post_meta( 'course_image' ); ?>"/></a>
		</div>
	<?php elseif ( post_meta( 'promo_video_embed' ) ) : ?>
		<div class="vid">
			<?php echo wp_oembed_get( post_meta( 'promo_video_embed' ) ); ?>
		</div>
	<?php endif; ?>
	<div class="bd">
		<h2 class="tight">
			<a href="<?php the_permalink(); ?>"><?php the_title(); ?> &raquo;</a>
		</h2>
		<?php the_excerpt(); ?>

		<?php if ( post_meta( 'download_id' ) ) : ?>
			<?php
			$button_text = __( 'Follow this course now', 'yoastcom' );
			$download_id = post_meta( 'download_id' );

			if ( edd_is_bundled_product( $download_id ) ) {
				$button_text = __( 'Follow these courses', 'yoastcom' );
			}

			echo edd_get_purchase_link( array(
				'download_id' => post_meta( 'download_id' ),
				'text'        => $button_text . ' &raquo;',
				'class' => 'alignleft'
			) );
			?>
		<?php endif; ?>
<?php /*
		<?php if ( post_meta( 'testimonial' ) ) : ?>
			<blockquote>
				<?php if ( post_meta( 'testimonial_image' ) ) {
					echo '<img class="alignright" src="' . esc_url( post_meta( 'testimonial_image' ) ) . '"/>';
				} ?>
				<?php echo wpautop( kses_blockquote( post_meta( 'testimonial' ) ) ); ?>
			</blockquote>
			<br/><br/>
		<?php endif; ?>
*/ ?>
		<?php printf( __( 'More info on %s', 'yoastcom' ), '<a href="' . get_permalink() . '">' . get_the_title() . ' &raquo;</a>' ); ?>
	</div>
</div>
