<?php
namespace Yoast\YoastCom\Theme;

$image = get_template_directory_uri() . '/images/banner-academy.jpg';
if ( isset( $template_args['image'] ) ) {
	$image = $template_args['image'];
}

$classes = array( 'full-banner' );
$sticky = '';
if ( isset( $template_args['sticky'] ) && $template_args['sticky'] ) {
	$sticky = ' data-sticky data-sticky-stacked data-sticky-mobile data-sticky-desktop';
	$classes[] = 'sticky';
}

if ( isset( $template_args['banner'] ) ) {
	$classes[] = $template_args['banner'];
}
?>
<div class="announcement--pointer-top <?php echo esc_attr( implode( ' ', $classes ) ); ?>"<?php echo esc_attr( $sticky ); ?>></div>
