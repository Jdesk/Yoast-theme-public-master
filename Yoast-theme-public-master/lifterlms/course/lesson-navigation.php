<?php

namespace Yoast\YoastCom\Theme;

use Yoast\YoastCom\Academy\Lesson;

if ( ! defined( 'ABSPATH' ) ) exit;

/* @var Lesson $lesson */
$lesson = \Yoast\YoastCom\Academy\get_lesson();

$next_lesson_id = $lesson->get_global_next_lesson();
$previous_lesson_id = $lesson->get_global_previous_lesson();
$parent_course_id = $lesson->get_parent_course();
?>

<nav class="llms-course-navigation">

	<a class="button dimmed left" href="<?php echo esc_url( get_permalink( $parent_course_id ) ); ?>">
		<?php _e( 'Back to course overview', 'yoastcom' ); ?>
	</a>

	<?php if ( $previous_lesson_id && ! is_singular( 'llms_quiz' ) ) : ?>
		<a class="button previous-lesson dimmed left" href="<?php echo esc_url( get_permalink( $previous_lesson_id ) ); ?>">
			<?php _e( 'Previous lesson', 'yoastcom' ); ?>
		</a>
	<?php endif; ?>

	<?php if ( $next_lesson_id && $lesson->is_complete() ) : ?>
		<a class="button next-lesson" href="<?php echo esc_url( get_permalink( $next_lesson_id ) ); ?>">
			<?php _e( 'Next lesson', 'yoastcom' ); ?>
		</a>
	<?php endif; ?>

</nav>
<div class="clear"></div>
