<?php
namespace Yoast\YoastCom\Theme;

if ( ! isset( $template_args['class'] ) ) {
	$template_args['class'] = '';
}
?>
<div class="announcement fill newsletter <?php echo esc_attr( $template_args['class'] ); ?>">
	<div class="row">
		<p><?php _e( 'Subscribe to our newsletter and never miss a post!', 'yoastcom' ); ?></p>
		<form action="https://yoast.us1.list-manage.com/subscribe/post?u=ffa93edfe21752c921f860358&amp;id=972f1c9122" method="post" enctype="multipart/form-data">
			<fieldset>
				<div class="grid">
					<div class="two-fifth medium-one-third">
						<label class="visuallyhidden" for="newsletter-name"><?php _e( 'Name', 'yoastcom' ); ?></label>
						<input type="text" placeholder="<?php _e( 'Name', 'yoastcom' ); ?>" id="newsletter-name" name="NAME">
					</div>
					<div class="two-fifth medium-one-third">
						<label class="visuallyhidden" for="newsletter-name"><?php _e( 'Email', 'yoastcom' ); ?></label>
						<input type="email" placeholder="<?php _e( 'Email', 'yoastcom' ); ?>" id="newsletter-email" name="EMAIL">
					</div>
					<div class="one-fifth medium-one-third">
						<button type="submit" class="default" name="subscribe"><?php _e( 'Subscribe &raquo;', 'yoastcom' ); ?></button>
					</div>
				</div>
			</fieldset>
		</form>
	</div>
</div>
