<?php

namespace Yoast\YoastCom\Theme;

global $post;
if ( $post->post_parent !== 0 ) {
	get_template_part( 'single' );
	return;
}

?>
<?php get_header(); ?>

<?php get_template_part( 'html_includes/siteheader', array( 'software-sub' => true ) ); ?>

<div class="site">
	<div class="row">
		<?php get_template_part( 'html_includes/partials/breadcrumbs' ); ?>
	</div>

	<main role="main">

		<div class="row">
			<h1><?php the_title(); ?></h1>
		</div>

		<?php if ( ! empty( post_meta( 'usps' ) ) ) : ?>
		<hr class="hr--no-pointer">
		<div class="row">
			<div class="media">
				<?php if ( has_post_thumbnail() ) : ?>
					<div class="imgExt">
						<?php
						$thumb_id = get_post_thumbnail_id();
						$thumb_src = wp_get_attachment_image_src( $thumb_id, 'large' );
						?>
						<img class="noborder" src="<?php echo $thumb_src[0]; ?>" width="150" alt="<?php the_title(); ?>" />
					</div>
				<?php endif; ?>

				<div class="bd">
						<?php get_template_part( 'html_includes/partials/list-usp', array(
							'usps'  => wp_list_pluck( (array) post_meta( 'usps' ), 'usp' ),
							'class' => 'color-academy',
						) ); ?>

					<?php if ( post_meta( 'download_id' ) ) : ?>
						<?php
						echo edd_get_purchase_link( array(
							'download_id' => post_meta( 'download_id' ),
							'text'        => __( 'Follow this course now', 'yoastcom' ) . ' &raquo;',
						) );
						?>
					<?php endif; ?>
				</div>
			</div>
		</div>
		<hr class="hr--no-pointer">
		<?php endif; ?>

		<div class="row iceberg">

			<section class="content">
				<?php if ( post_meta( 'promo_video_embed' ) ) : ?>
							<?php echo wp_oembed_get( post_meta( 'promo_video_embed' ) ); ?>
				<?php endif; ?>

				<?php the_content(); ?>
			</section>

			<?php get_template_part( 'html_includes/partials/social-share' ); ?>
		</div>

		<hr>

		<div class="row">
			<h2><?php _e( 'You might also like', 'yoastcom' ); ?></h2>

			<?php get_template_part( 'html_includes/partials/recent-articles' ); ?>
		</div>

		<?php get_template_part( 'html_includes/partials/newsletter-subscribe' ); ?>

	</main>

	<div class="rowholder">
		<?php get_template_part( 'html_includes/fullfooter' ); ?>
	</div>

</div>

<?php get_footer(); ?>
