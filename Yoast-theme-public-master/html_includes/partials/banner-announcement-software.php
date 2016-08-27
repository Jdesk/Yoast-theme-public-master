<?php
namespace Yoast\YoastCom\Theme;

if ( ! isset( $template_args['class1'] ) ) {
	$template_args['class1'] = '';
}
?>
<div class="full-banner sticky" data-sticky data-sticky-stacked data-sticky-desktop style="background-image: url(<?php echo esc_attr( get_template_directory_uri() ); ?>/images/banner-academy.jpg)"></div>

<div class="announcement fill fill--transparent takeout">
	<div class="row">

		<a href="#" class="more <?php echo esc_attr( $template_args['class1'] ); ?>">
			<span class="more__icon text-icon show-on-desktop">&#xf002;</span>
			<div class="more__holder">
				<div class="more__title">Want to know what else you can do to improve your site?</div>
				<small class="more__link hide-on-tablet">Order a Website Review&raquo;</small>
			</div>
		</a>
	</div>
</div>
