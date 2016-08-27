<?php
namespace Yoast\YoastCom\Theme;

?>
<ul class="list--unstyled list--breath">
	<li><a href="<?php echo esc_url( url_plugin_overview() ); ?>"><?php _e( 'Check out all Yoast plugins', 'yoastcom' ); ?> &raquo;</a></li>
	<?php if ( post_meta( 'github' ) ) : ?>
		<li><a href="<?php echo esc_url( url_bug_report() ); ?>">Report a bug &raquo;</a></li>
		<li><a href="<?php echo esc_url( url_follow_dev() ); ?>">Follow development on GitHub &raquo;</a></li>
	<?php endif; ?>
</ul>
