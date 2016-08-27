<?php
/**
 * @package Yoast\YoastCom
 */

namespace Yoast\YoastCom\Theme;

$step = get_checkout_step();
?>
<div class="progress" id="steps-progress" data-step="<?php echo esc_attr( $step ); ?>">
	<div class="row">
		<ol class="list--steps">
			<li>
				<?php if ( 1 !== $step ) : ?><a href="<?php echo esc_url( url_shop_page() ); ?>"><?php endif; ?>
				<?php
					/* translators: Text between %1$s and %2$s is hidden on tablets, text between %3$s and %4$s is hidden on mobile. */
					printf(
						'%1$sChoose your %2$s%3$sproducts%4$s',
						'<span class="hide-on-tablet">',
						'</span>',
						'<span class="hide-on-mobile">',
						'</span>'
					);
				?>
				<?php if ( 1 !== $step ) : ?></a><?php endif; ?>
			</li>
			<li<?php if ( 2 === $step ) : ?> class="step--current"<?php endif; ?>>
				<?php if ( 2 !== $step ) : ?><a href="<?php echo esc_attr( url_checkout() ); ?>"><?php endif; ?>
				<?php
				/* translators: Text between %1$s and %2$s is hidden on tablets, text between %3$s and %4$s is hidden on mobile. */
					printf(
						'%1$sChoose your %2$s%3$spayment%4$s%1$s method%2$s',
						'<span class="hide-on-tablet">',
						'</span>',
						'<span class="hide-on-mobile">',
						'</span>'
					);
				?>
				<?php if ( 2 !== $step ) : ?></a><?php endif; ?>
			</li>
			<li<?php if ( 3 === $step ) : ?> class="step--current"<?php endif; ?>>
				<?php if ( 3 !== $step ) : ?><a href="#" id="yst-to-step-3"><?php endif; ?>
				<?php
					/* translators: Text between %1$s and %2$s is hidden on tablets, text between %3$s and %4$s is hidden on mobile. */
					printf(
						'%1$sEnter payment %2$s%3$sdetails%4$s',
						'<span class="hide-on-tablet">',
						'</span>',
						'<span class="hide-on-mobile">',
						'</span>'
					);
				?>
				<?php if ( 3 !== $step ) : ?></a><?php endif; ?>
			</li>
			<li<?php if ( 4 === $step ) : ?> class="step--current"<?php endif; ?>>
				<?php if ( 4 !== $step ) : ?><a href="#" id="yst-to-step-4"><?php endif; ?>
					<span class="hide-on-mobile"><?php _e( 'Finished', 'yoastcom' ); ?></span>
				<?php if ( 4 !== $step ) : ?></a><?php endif; ?>
			</li>
		</ol>
	</div>
</div>
