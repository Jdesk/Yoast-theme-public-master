<?php

if ( ! defined( 'ABSPATH' ) ) exit;

global $quiz;

$user_id = get_current_user_id();
$passing_percent = $quiz->get_passing_percent();

$grade = $quiz->get_user_grade( $user_id );

// Modification: When passed we don't want to show what was needed to pass.
if ( $passing_percent && ! $quiz->is_passing_score( $user_id, $grade ) ) :
	?>

	<div class="clear"></div>
	<div class="llms-template-wrapper">
		<h3 class="llms-content-block">
			<?php if ( 100 === (int) $passing_percent ) : ?>
				<?php printf( __( 'A score of <span class="llms-content llms-pass-perc">%s%%</span> is required to pass this test.', 'yoastcom' ), $passing_percent ); ?>
			<?php else: ?>
				<?php printf( __( 'A score of <span class="llms-content llms-pass-perc">%s%%</span> or more is required to pass this test.', 'yoastcom' ), $passing_percent ); ?>
			<?php endif; ?>
		</h3>
	</div>

	<?php

endif;