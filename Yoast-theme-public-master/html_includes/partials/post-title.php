<?php

if ( has_post_thumbnail() ) {
	$thumbnail = get_the_post_thumbnail();

	?>
	<div class="hide-on-tablet">
		<div class="post-header">
			<div class="post-header__image"><?php echo $thumbnail ?></div>
			<div class="post-header__title">
				<div class="post-header__title__container">
					<h1><?php

						$custom_title_top    = get_post_meta( get_the_ID(), 'title_top_line', true );
						$custom_title_bottom = get_post_meta( get_the_ID(), 'title_bottom_line', true );

						if ( empty( $custom_title_top ) ) {
							$custom_title_top = get_the_title();
						}

						if ( empty( $custom_title_bottom ) ) {
							echo $custom_title_top;
						}
						else {
							printf( '<span class="post-header__title--first-line">%s</span>', $custom_title_top );
							printf( '<br>%s', $custom_title_bottom );
						}

						?></h1>

				</div>
			</div>
		</div>
		<div class="content__after-post-header"></div>
		<div class="meta__after-post_header"></div>
	</div>

	<div class="hide-on-desktop">
		<h1><?php the_title(); ?></h1>
	</div>
	<?php
}
else {
	?>
	<h1><?php the_title(); ?></h1>

	<?php
}