<?php
/**
 * @author 		codeBOX
 * @package 	lifterLMS/Templates
 */

if ( ! defined( 'ABSPATH' ) ) exit;

global $post, $lesson;

if ( ! $lesson ) {

	$lesson = new LLMS_Lesson( $post->ID );

}

$user = new LLMS_Person;
$user_postmetas = $user->get_user_postmeta_data( get_current_user_id(), $lesson->id );

//get associated quiz
$associated_quiz = get_post_meta( $post->ID, '_llms_assigned_quiz', true );
?>

<div class="clear"></div>
<div class="llms-lesson-button-wrapper iceberg">
	<?php
	if ( isset($user_postmetas['_is_complete']) ) {
		if ( $user_postmetas['_is_complete']->meta_value === 'yes' ) {

			if ( $associated_quiz ) {
				echo '<em>' . __( 'You\'ve already completed this quiz.', 'yoastcom' ) . '</em>';
			}
			else {
				echo '<em>' . __( 'You\'ve already completed this lesson.', 'yoastcom' ) . '</em>';
			}
		}
	}

	if ( !isset( $user_postmetas['_is_complete'] ) && !$associated_quiz ) {

		?>
		<form method="POST" action="" name="mark_complete" enctype="multipart/form-data">
			<?php do_action( 'lifterlms_before_mark_complete_lesson' ); ?>

			<input type="hidden" name="mark-complete" value="<?php echo esc_attr( $post->ID ); ?>" />

			<button type="submit" class="button" name="mark_complete"><?php echo $lesson->single_mark_complete_text(); ?></button>
			<input type="hidden" name="action" value="mark_complete" />

			<?php wp_nonce_field( 'mark_complete' ); ?>
			<?php do_action( 'lifterlms_after_mark_complete_lesson'  ); ?>
		</form>

	<?php }

	if ($associated_quiz) {

		$button_text = __( 'Start quiz', 'yoastcom' );
		
		?>

		<form method="POST" action="" name="take_quiz" enctype="multipart/form-data">

			<input type="hidden" name="associated_lesson" value="<?php echo esc_attr( $post->ID ); ?>" />
			<input type="hidden" name="quiz_id" value="<?php echo esc_attr( $associated_quiz ); ?>" />
			<button type="submit" class="button" name="take_quiz" value="<?php echo $button_text; ?>">
				<i class="fa fa-pencil-square-o"></i><?php echo $button_text; ?></button>
			<input type="hidden" name="action" value="take_quiz" />

			<?php wp_nonce_field( 'take_quiz' ); ?>
		</form>

	<?php } ?>

</div>
