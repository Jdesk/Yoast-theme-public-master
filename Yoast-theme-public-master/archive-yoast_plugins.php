<?php

namespace Yoast\YoastCom\Theme;
?>
<?php get_header(); ?>

<?php get_template_part( 'html_includes/siteheader' ); ?>

<div class="site">
	<div class="row">
		<?php get_template_part( 'html_includes/partials/breadcrumbs' ); ?>
	</div>

	<main role="main">

		<div class="row iceberg">
			<h1 id="seo-plugins"><?php _e( 'SEO plugins by Yoast' ); ?></h1>
			<ul class="list list--unstyled">
				<li><a href="#other-plugins"><?php _e( 'Other plugins', 'yoastcom' ); ?> &raquo;</a></li>
			</ul>
			<?php get_template_part( 'html_includes/partials/more-pluginlist', array( 'categories' => array( 303 ) ) ); ?>
		</div>

		<div class="announcement announcement--pointer announcement--pointer-top fill fill--secondary">
			<div class="row">
				<h2 class="h3"><?php _e( 'Bundle plugins and save money!', 'yoastcom' ); ?></h2>
				<?php get_template_part( 'html_includes/partials/more-bundleplugin' ); ?>
			</div>
		</div>

		<hr>

		<div class="row iceberg">
			<h2 class="h1" id="other-plugins"><?php _e( 'Other plugins', 'yoastcom' ); ?></h2>
			<ul class="list list--unstyled">
				<li><a href="#seo-plugins"><?php _e( 'WordPress SEO plugins', 'yoastcom' ); ?> &raquo;</a></li>
			</ul>
			<?php get_template_part( 'html_includes/partials/promoblocks-plugins' ); ?>
		</div>

		<?php get_template_part( 'html_includes/partials/newsletter-subscribe', array( 'class' => 'theme-software announcement--pointer-top island' ) ); ?>

	</main>

	<div class="rowholder">
		<?php get_template_part( 'html_includes/fullfooter' ); ?>
	</div>

</div>

<?php get_footer(); ?>
