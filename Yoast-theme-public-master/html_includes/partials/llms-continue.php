<?php

namespace Yoast\YoastCom\Theme;

/* @var \LLMS_Course $course */
$course = \Yoast\YoastCom\Academy\get_course();

?>

<?php if ( $course->get_next_uncompleted_lesson() ) : ?>
	<a href="<?php echo esc_url( get_permalink( $course->get_next_uncompleted_lesson() ) ); ?>" class="button">
		<i class="fa fa-arrow-circle-right" aria-hidden="true"></i>
		<?php _e( 'Continue', 'yoastcom' ); ?>
	</a>
<?php endif; ?>
