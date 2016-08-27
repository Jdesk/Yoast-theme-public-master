<?php
/**
 * @author 		codeBOX
 * @package 	lifterLMS/Templates
 */

if ( ! defined( 'ABSPATH' ) ) exit;
global $post;

$question = new LLMS_Question( $args['question_id'] );

if ( ! $question ) {

	$question = new LLMS_Question( $post->ID );

}

$quiz = LLMS()->session->get( 'llms_quiz' );

$question_count = count( $quiz->questions );
?>
	<p class="llms-question-count">
		<?php
		if ( ! empty( $quiz ) ) {

			foreach ( $quiz->questions as $key => $value ) {
				if ( $value['id'] == $question->id ) {
					$current_question = ( $key + 1 );
				}
			}

			printf( __( 'Question %d of %d', 'lifterlms' ), ( empty( $current_question ) ? '' : $current_question ), $question_count );

		}
		
		// Modification: allow directly editting of this question.
		if ( current_user_can( 'edit_posts' ) ) {
			printf( '<a href="%s">Edit</a>', admin_url( 'post.php?action=edit&post=' . $args['question_id'] ) );
		}

		?>
	</p>
<?php






