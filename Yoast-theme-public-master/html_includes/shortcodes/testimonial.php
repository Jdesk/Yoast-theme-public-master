<?php
namespace Yoast\YoastCom\Theme;

$args = $template_args;
unset( $args['return'] );
?>

<hr>
<section class="row island">
	<?php get_template_part( 'html_includes/partials/testimonial', $args ); ?>
</section>
<hr>
