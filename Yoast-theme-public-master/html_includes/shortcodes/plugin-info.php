<?php
namespace Yoast\YoastCom\Theme;
?>

<hr class="hr--no-pointer">

<section class="row grid">
	<div class="one-third">
		<h3 class="h4"><?php _e( 'Plugin information', 'yoastcom' ); ?></h3>
		<?php if ( plugin_latest_version() ) : ?>
			<p><?php printf( __( 'Current version: %s', 'yoastcom' ), plugin_latest_version() ); ?></p>
		<?php endif; ?>

		<?php if ( url_plugin_changelog() ) : ?>
			<p><?php
				printf(
					__( 'See the %s if you want details about recent changes.', 'yoastcom' ),
					'<a href="' . esc_url( url_plugin_changelog() ) . '">changelog</a>'
				);
			?></p>
		<?php endif; ?>
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
