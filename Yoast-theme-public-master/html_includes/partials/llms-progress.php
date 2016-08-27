<?php

namespace Yoast\YoastCom\Theme;

/* @var \LLMS_Course $course */
$course = \Yoast\YoastCom\Academy\get_course();

$percentage = (int) $course->get_percent_complete();
$percentage = apply_filters( 'yoast_llms_certificate_percentage_complete', $percentage, $course );

_e( 'Course progress' );

lifterlms_course_progress_bar( $percentage, false, false );
