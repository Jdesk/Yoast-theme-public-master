<?php

namespace Yoast\YoastCom\Theme;

/** @noinspection PhpUndefinedVariableInspection */
$menu_item = $template_args['menu_item'];
$type      = $template_args['type'];

$anchor_class = ( ! empty( $menu_item['anchor_classes'] ) ? ' class="' . esc_attr( implode( ' ', $menu_item['anchor_classes'] ) ) . '"' : '' );

echo '<a href="' . esc_url( $menu_item['url'] ) . '"' . $anchor_class . '>';

if ( $type === 'main' ) {
	echo esc_html( $menu_item['label'] );
}

if ( ! empty( $menu_item['icon'] ) ) {
	echo '<span class="fa fa-' . esc_attr( $menu_item['icon'] ) . '" aria-hidden="true"></span>';
}

if ( $type === 'sub' ) {
	echo esc_html( $menu_item['label'] );
}

echo '</a>';
