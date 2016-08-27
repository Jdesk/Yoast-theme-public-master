<?php
namespace Yoast\YoastCom\Theme;
?>
<nav class="fullfooter row" id="fullfooter">

	<div class="grid">
		<div class="one-third medium-one-half small-full">
			<?php dynamic_sidebar( 'footer-1' ); ?>
		</div>

		<div class="one-third hide-on-tablet">
			<?php dynamic_sidebar( 'footer-2' ); ?>
		</div>

		<div class="one-third medium-one-half small-full">
			<?php dynamic_sidebar( 'footer-3' ); ?>
		</div>
	</div>

	<div class="boxes boxes--footer"></div>

</nav>
