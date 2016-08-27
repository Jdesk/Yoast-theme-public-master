<?php

namespace Yoast\YoastCom\Theme;

use Yoast\YoastCom\Academy;

if ( ! defined( 'ABSPATH' ) ) { exit; }

$in_progress = Academy\get_user_in_progress_courses();
$completed = Academy\get_user_completed_courses();

?>

<div class="llms-my-courses">
	<?php if ( ! empty( $in_progress ) ) : ?>
		<h2><?php _e( 'Courses in progress', 'yoastcom' ); ?></h2>

		<ul class="course-list">
			<?php foreach ( $in_progress as $course ) : ?>
				<?php get_template_part( 'html_includes/partials/llms-my-courses-course', array( 'course' => $course ) ); ?>
			<?php endforeach; ?>
		</ul>
	<?php endif; ?>

	<?php if ( ! empty( $completed ) ) : ?>
		<h2><?php _e( 'Completed courses', 'yoastcom' ); ?></h2>

		<ul class="course-list">
			<?php foreach ( $completed as $course ) : ?>
				<?php get_template_part( 'html_includes/partials/llms-my-courses-course', array( 'course' => $course ) ); ?>
			<?php endforeach; ?>
		</ul>
	<?php endif; ?>

	<?php if ( empty( $in_progress ) && empty( $completed ) ) : ?>
		<p><?php _e( 'You are not enrolled in any courses', 'yoastcom' ); ?></p>
	<?php endif; ?>
</div>


