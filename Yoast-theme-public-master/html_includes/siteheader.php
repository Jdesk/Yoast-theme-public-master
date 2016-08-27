<?php

namespace Yoast\YoastCom\Theme;

$yoast_url = apply_filters( 'yoast:domain', 'yoast.com' );

?>
<header role="banner" class="siteheader">

	<div class="row masthead">
		<a href="<?php echo $yoast_url; ?>" class="pagetitle"><span class="visuallyhidden">Yoast</span></a>

		<?php get_template_part( 'html_includes/header-controls-mobile' ); ?>
	</div>

	<?php
	get_template_part( 'html_includes/partials/search' );

	$navigation = new Yoast_Navigation();
	$navigation->output_menu_bar();

	?>

	<!-- Decoration -->
	<div class="row">
		<?php if ( Color_Scheme::ACADEMY === theme_object()->get_color_scheme() ) : ?>
			<div class="boxes boxes--header boxes--academy"></div>
		<?php elseif ( Color_Scheme::SOFTWARE === theme_object()->get_color_scheme() ) : ?>
			<div class="boxes boxes--header boxes--software"></div>
		<?php elseif ( Color_Scheme::REVIEW === theme_object()->get_color_scheme() ) : ?>
			<div class="boxes boxes--header boxes--review"></div>
		<?php elseif ( Color_Scheme::ABOUT === theme_object()->get_color_scheme() ) : ?>
			<div class="boxes boxes--header boxes--about"></div>
		<?php else : ?>
			<div class="boxes boxes--header"></div>
		<?php endif; ?>
	</div>
</header>
