<?php
namespace Yoast\YoastCom\Theme;
?>
<div class="media media--nofloat product">
	<?php if ( has_post_thumbnail() ) : ?>
		<a href="<?php the_permalink(); ?>" class="img img--large promoblock promoblock--imageholder">
			<?php the_post_thumbnail( array( 240, 320 ) ); ?>
		</a>
	<?php endif; ?>
	<div class="bd">
		<h2 class="tight">
			<a href="<?php the_permalink(); ?>"><?php the_title(); ?> &raquo;</a>
		</h2>
		<?php the_excerpt(); ?>

		<?php if ( post_meta( 'download_id' ) ) : ?>
			<?php
			echo edd_get_purchase_link( array(
				'download_id' => post_meta( 'download_id' ),
				'text'        => __( 'Buy this ebook now', 'yoastcom' ) . ' &raquo;',
			) );
			?>
		<?php endif; ?>
	</div>
</div>
