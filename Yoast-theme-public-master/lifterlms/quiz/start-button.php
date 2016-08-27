<?php
/**
 * @author        codeBOX
 * @package       lifterLMS/Templates
 */

if ( ! defined( 'ABSPATH' ) ) {
	exit;
}

global $quiz;

$user_id      = get_current_user_id();
$quiz_session = LLMS()->session->get( 'llms_quiz' );
$lesson_id    = $quiz->get_assoc_lesson( $user_id );
$lesson       = new LLMS_Lesson( $lesson_id );

if ( $quiz ) {
	$attempts = $quiz->get_remaining_attempts_by_user( $user_id );
} else {
	$attempts = 0;
}
?>

<div class="clear"></div>
<div class="llms-button-wrapper" id="quiz-start-button">

	<?php

	if ( $attempts === 'unlimited' || $attempts > 0 || $quiz->get_end_date( $user_id ) == '' ) {

		// Should this be 'Start Quiz' sometimes?
		$title = 'Re-take quiz';

		?>
		<form method="POST" action="" name="llms_start_quiz" enctype="multipart/form-data">
			<?php do_action( 'lifterlms_before_start_quiz' ); ?>
			<input id="llms-user" name="llms-user_id" type="hidden" value="<?php echo $user_id; ?>"/>
			<input id="llms-quiz" name="llms-quiz_id" type="hidden" value="<?php echo $quiz->id; ?>"/>
			<input id="llms_start_quiz" type="button" class="button" name="llms_start_quiz"
			       value="<?php _e( $title, 'lifterlms' ); ?>"/>
			<input type="hidden" name="action" value="llms_start_quiz"/>

			<?php

			$next_lesson_id = $lesson->get_next_lesson();
			if ( $next_lesson_id && $lesson->is_complete() ) {
				?>
				<a class="button next-lesson"
				   href="<?php echo esc_url( get_permalink( $next_lesson_id ) ); ?>"><?php _e( 'Next lesson', 'yoastcom' ); ?></a>
				<?php
			}

			?>

			<?php wp_nonce_field( 'llms_start_quiz' ); ?>
			<?php do_action( 'lifterlms_after_start_quiz' ); ?>
		</form>
		<?php
	}
	else {
		_e( '<p>You are not able take this quiz</p>', 'lifterlms' );
	}

	?>
</div>
