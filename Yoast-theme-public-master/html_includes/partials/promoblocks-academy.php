<?php
namespace Yoast\YoastCom\Theme;
?>
<div class="grid">

	<div class="three-fourth">
		
		<div class="grid">
			<div class="two-third relative">
				<div class="promoblock promoblock--icon-<?php echo post_meta( 'block_left_icon' ); ?> arrowed-small">
					<h2 class="h3"><a href="<?php echo esc_url( post_meta( 'block_left_link' ) ); ?>"><?php echo esc_html( post_meta( 'block_left_title' ) ); ?></a></h2>
					<p class="hide-on-mobile">
						<?php echo esc_html( post_meta( 'block_left_description' ) ); ?>
						<a href="<?php echo esc_url( post_meta( 'block_left_link' ) ); ?>"  class="color-cta font-default"><?php echo esc_html( post_meta( 'block_left_link_text' ) ); ?> &raquo;</a>
					</p>
				</div>
				<div class="boxes boxes--promo"></div>
			</div>

			<div class="one-third">
				<div class="promoblock promoblock--icon-<?php echo post_meta( 'block_middle_icon' ); ?> arrowed-small">
					<h2 class="h3"><a href="<?php echo esc_url( post_meta( 'block_middle_link' ) ); ?>"><?php echo esc_html( post_meta( 'block_middle_title' ) ); ?></a></h2>
					<p class="hide-on-mobile">
						<?php echo esc_html( post_meta( 'block_middle_description' ) ); ?>
						<a href="<?php echo esc_url( post_meta( 'block_middle_link' ) ); ?>" class="color-cta font-default"><?php echo esc_html( post_meta( 'block_middle_link_text' ) ); ?> &raquo;</a>
					</p>
				</div>
			</div>

			<div class="three-fourth offset-one-fourth">
				<div class="promoblock promoblock--icon-<?php echo post_meta( 'block_bottom_icon' ); ?> arrowed-small">
					<h2 class="h3"><a href="<?php echo esc_url( post_meta( 'block_bottom_link' ) ); ?>"><?php echo esc_html( post_meta( 'block_bottom_title' ) ); ?></a></h2>
					<p class="hide-on-mobile">
						<?php echo esc_html( post_meta( 'block_bottom_description' ) ); ?>
						<a href="<?php echo esc_url( post_meta( 'block_bottom_link' ) ); ?>" class="color-cta font-default"><?php echo esc_html( post_meta( 'block_bottom_link_text' ) ); ?> &raquo;</a>
					</p>
				</div>
			</div>
		</div>
	</div>

	<div class="one-fourth">
		<div class="promoblock promoblock--icon-<?php echo post_meta( 'block_right_icon' ); ?> arrowed-small">
			<h2 class="h3"><a href="<?php echo esc_url( post_meta( 'block_right_link' ) ); ?>"><?php echo esc_html( post_meta( 'block_right_title' ) ); ?></a></h2>
			<p class="hide-on-mobile">
				<?php echo esc_html( post_meta( 'block_right_description' ) ); ?>
				<a href="<?php echo esc_url( post_meta( 'block_right_link' ) ); ?>" class="color-cta font-default"><?php echo esc_html( post_meta( 'block_right_link_text' ) ); ?> &raquo;</a>
			</p>
		</div>
	</div>
</div>
