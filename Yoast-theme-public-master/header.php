<?php
namespace Yoast\YoastCom\Theme;
?><!DOCTYPE html>
<!--[if lte IE 9]><html class="old-ie" lang="en"><![endif]-->
<!--[if (gt IE 9)|!(IE)]><!--><html lang="en"><!--<[endif]-->
<head>

	<meta charset="utf-8">
	<meta http-equiv="X-UA-Compatible" content="IE=edge">
	<meta name="viewport" content="width=device-width, initial-scale=1">

	<title><?php wp_title(); ?></title>

	<?php wp_head(); ?>
</head>
<body <?php body_class(); ?>>
	<?php do_action( 'yst_body_open' ); ?>
