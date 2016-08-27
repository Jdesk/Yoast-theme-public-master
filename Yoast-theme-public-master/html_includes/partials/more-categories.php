<?php
namespace Yoast\YoastCom\Theme;

$categories = query_categories( array( 'number' => 10 ) );
?>
<?php foreach ( $categories as $category ) : ?>
	<a href="<?php echo esc_url( get_category_link( $category->term_id ) ); ?>" class="more more--category arrowed-medium <?php echo esc_attr( $template_args['class'] ); ?>">
		<span class="more__plug show-on-desktop"><i class="fa fa-<?php echo get_term_meta( $category->term_id, 'yoastcom_term_icon', true ); ?>" aria-hidden="true"></i></span>
		<div class="more__holder more__holder--naked more__holder--left">
			<div class="more__supertitle"><?php echo esc_html( $category->name ); ?>
			<?php if ( $shortdesc = get_term_meta( $category->term_id, 'yoastcom_term_shortdesc', true ) ) : ?>
				<i class="fa fa-angle-right"></i>
			</div>
			<div class="more__superlink color-black hide-on-tablet"><?php echo $shortdesc; ?> &raquo;</div>
			<?php else: ?>
			</div>
			<?php endif; ?>
		</div>
	</a>
<?php endforeach; ?>
