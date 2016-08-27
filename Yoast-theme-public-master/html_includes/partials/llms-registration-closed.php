<?php

namespace Yoast\YoastCom\Theme;

$academy_overview = apply_filters( 'yoast:url', 'academy_overview');

?>
<div class="col-2 llms-new-person-form-wrapper">
	<h2 class="llms-title llms-h2"><?php _e( 'New account', 'lifterlms' ); ?></h2>

	<?php
	_e( 'You can only register if you have bought a course.', 'yoastcom' );
	printf( __( 'Go to %1$s to buy a course', 'yoastcom' ), '<a href="' . $academy_overview . 'courses/">yoast.com</a>' );
	?>
</div>
