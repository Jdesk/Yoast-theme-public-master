<?php
namespace Yoast\YoastCom\Theme;

$args = $template_args;
unset( $args['return'] );

if ( ! isset( $args['class'] ) ) {
	$args['class'] = 'fill--transparent takeout';
}
else {
	$args['class'] .= ' fill--transparent takeout';
}

$sticky = true;
if ( isset( $args['no-sticky'] ) && $args['no-sticky'] ) {
	$sticky = false;
}
?>

<?php get_template_part( 'html_includes/partials/fullbanner', array_merge( $args, array( 'sticky' => $sticky ) ) ); ?>

<?php get_template_part( 'html_includes/partials/announcement', $args ); ?>
