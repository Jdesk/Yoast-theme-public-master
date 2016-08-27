<?php
namespace Yoast\YoastCom\Theme;

?>
<form action="<?php echo esc_attr( home_url() ); ?>" class="searchform-global">
	<input type="search" name="s" class="size-m" placeholder="<?php _e( 'Search', 'yoastcom' ); ?>">
	<button class="button--naked">
		<span class="visuallyhidden focusable"><?php _e( 'Search', 'yoastcom' ); ?></span>
		<span class="text-icon">&#xf002;</span>
	</button>
</form>
