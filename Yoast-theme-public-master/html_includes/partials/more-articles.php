<?php
namespace Yoast\YoastCom\Theme;

$must_read = isset( $template_args['must_read'] ) && $template_args['must_read'];
$args = array( 'posts_per_page' => 3 );

$class = isset( $template_args['class'] ) ? $template_args['class'] : '';
if ( isset( $template_args['dev-blog'] ) && $template_args['dev-blog'] ) {
	$args['post_type'] = 'yoast_dev_article';
}
if ( $must_read ) {
	$args['term_id'] = $template_args['term_id'];
	$posts_query = query_must_read_articles( $args );
} else {
	$posts_query = new \WP_Query( $args );
}

theme_object()->excerpt->length( 8 );
theme_object()->excerpt->more( ' &raquo;' );

if ( is_object( $posts_query ) && ! is_wp_error( $posts_query ) && $posts_query->have_posts() ) :
	while ( $posts_query->have_posts() ) : $posts_query->the_post(); ?>
		<a href="<?php the_permalink(); ?>" class="more <?php echo $class; ?>">
			<div
				class="more__holder arrowed border-<?php echo $class; ?> <?php echo $class; ?>">
				<div class="more__title">
					<?php the_title(); ?>
				</div>
				<small
					class="more__link hide-on-tablet"><?php echo esc_html( strip_tags( wp_trim_words( get_the_excerpt(), 8, ' &hellip; &raquo;' ) ) ); ?></small>
			</div>
		</a>
	<?php endwhile;
	wp_reset_postdata();
	theme_object()->excerpt->clear();
endif;
