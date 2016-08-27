<?php

namespace Yoast\YoastCom\Theme;

use Yoast\YoastCom\Academy\Manual_Approval;

$url_certificate = \Yoast\YoastCom\Academy\get_certificate_url();

/* @var \LLMS_Course $course */
$course = \Yoast\YoastCom\Academy\get_course();

$percentage = (int) $course->get_percent_complete();
$percentage = apply_filters( 'yoast_llms_certificate_percentage_complete', $percentage, $course );

$pending_approval = Manual_Approval::has_pending_approval( get_current_user_id(), $course );

if ( \Yoast\YoastCom\Academy\course_has_certificate( $course ) ) :

	if ( 100 === (int) $percentage ):
	?>
	<a class="button" href="<?php echo esc_attr( $url_certificate ); ?>">
		<i class="fa fa-graduation-cap" aria-hidden="true"></i>
		<?php _e( 'Show certificate', 'yoastcom' ); ?>
	</a>
	<?php
	endif;

	if( $pending_approval ):
		?><p>You’ve completed the entire course! Well done! The only thing that’s left is for the Yoast team to check your send-in assignments. If you’ve done them well, they'll mark them as completed and your certificate will be issued.</p><?php

	endif;
endif;

