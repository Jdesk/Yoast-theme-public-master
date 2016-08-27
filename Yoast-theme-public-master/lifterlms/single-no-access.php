<?php

if ( ! defined( 'ABSPATH' ) ) exit;

get_header();

get_template_part( 'html_includes/siteheader' );

?>
<div class="site">

	<div class="row">
		<?php get_template_part( 'html_includes/partials/breadcrumbs' ); ?>
	</div>

	<main role="main">

		<?php while ( have_posts() ) : the_post(); ?>
		<article class="row">
			<h1><?php _e( 'Restricted page', 'yoastcom' ); ?></h1>
			<div class="content iceberg">
				<?php llms_get_template_part( 'content', 'no-access' ); ?>
			</div>
		</article>
		<?php endwhile; ?>
	</main>
</div>

<?php

get_footer();