<?php
namespace Yoast\YoastCom\Theme;

$comments_number = get_comments_number();

printf( _n( __( '%d Comment', 'yoastcom' ),  __( '%d Comments', 'yoastcom' ), $comments_number ), $comments_number );
