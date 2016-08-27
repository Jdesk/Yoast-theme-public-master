<?php
namespace Yoast\YoastCom\Theme;
?>
<?php get_header(); ?>

<?php get_template_part( 'html_includes/siteheader-home', array( 'home-sub' => true ) ); ?>

<div class="site">

	<div class="row">
		<?php get_template_part( 'html_includes/partials/breadcrumbs' ); ?>
	</div>

	<main role="main">
		<div class="row">
			<h1>Checkout</h1>

			<a href="<?php echo esc_url( url_shop_page() ); ?>" class="link--naked"><?php _e( '&laquo; Continue shopping', 'yoastcom' ); ?></a>
		</div>

		<?php the_content(); ?>

		<?php get_template_part( 'html_includes/partials/newsletter-subscribe' ); ?>

	</main>

	<div class="rowholder">
		<?php get_template_part( 'html_includes/fullfooter' ); ?>
	</div>

</div>

<?php get_footer(); ?>
