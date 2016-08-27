<?php
namespace Yoast\YoastCom\Theme;

use Yoast\YoastCom\Settings\Hide_Comments;
?>
<?php $comments_number = get_comments_number(); ?>
<div class="meta__date">
	<?php if ( ! Hide_Comments::hide_comments() && $comments_number > 0 ) { ?>
		<?php the_time( 'F dS, Y' ); ?>
		&ndash;
		<a href="#comments"><?php
			get_template_part( 'html_includes/partials/comments-number' );
			?></a>
	<?php } else { ?>
		Last update: <?php the_modified_date( 'd F, Y' ); ?>
	<?php } ?>
</div>

<div class="meta meta--full">
	<div class="meta__author">
		<h4 class="p"><?php _e( 'Post author', 'yoastcom' ); ?></h4>
		<a href="<?php echo esc_attr( get_the_author_meta( 'yst_profile_url' ) ); ?>"><?php the_author(); ?></a>
		<a href="<?php echo esc_url( get_author_posts_url( get_the_author_meta( 'ID' ), get_the_author_meta( 'nicename' ) ) ); ?>" class="meta__readmore">
			<?php echo esc_html( link_text_author_posts() ); ?> &raquo;
		</a>
		<img src="<?php echo esc_url( url_author_image() ); ?>" class="meta__authorpic">
	</div>

	<?php if ( is_singular( 'post' ) ) : ?>
		<?php $categories = wp_get_post_categories( get_the_ID() ); ?>
		<?php if ( ! empty( $categories ) ) : ?>
			<div class="meta__category">
				<h4 class="p"><?php echo _n( 'Category', 'Categories', count( $categories ), 'yoastcom' ); ?></h4>
				<?php
				$primary_category = yoast_get_primary_term_id( 'category', get_the_ID() );
				foreach ( $categories as $category ) :
					$class = '';
					if ( $primary_category == $category ) {
						$class = 'primary';
					}
					?>
					<a class="<?php echo $class; ?>" href="<?php echo esc_url( get_category_link( $category ) ); ?>">
						<?php echo esc_html( get_cat_name( $category ) ); ?> &raquo;
					</a>
				<?php endforeach; ?>
			</div>
		<?php endif; ?>
	<?php elseif ( is_singular( 'yoast_dev_article' ) ) : ?>
		<?php $dev_categories = get_the_terms( get_the_ID(), 'yoast_dev_category' ); ?>
		<?php if ( ! empty( $dev_categories ) ) : ?>
			<div class="meta__category">
				<h4 class="p"><?php echo _n( 'Category', 'Categories', count( $dev_categories ), 'yoastcom' ); ?></h4>
				<?php foreach ( $dev_categories as $term ) : ?>
					<a href="<?php echo esc_url( get_term_link( $term->term_id, 'yoast_dev_category' ) ); ?>">
						<?php echo esc_html( $term->name ); ?> &raquo;
					</a>
				<?php endforeach; ?>
			</div>
		<?php endif; ?>
	<?php endif; ?>

	<?php $tags = get_the_tags(); ?>
	<?php if ( ! empty( $tags ) ) : ?>
		<div class="meta__tags">
			<h4 class="p"><?php echo _n( 'Tag', 'Tags', count( $tags ), 'yoastcom' ); ?></h4>
			<?php foreach ( $tags as $tag ) : ?>
				<a href="<?php echo esc_url( get_tag_link( $tag->term_id ) ); ?>"><?php echo esc_html( $tag->name ); ?> &raquo;</a>
			<?php endforeach; ?>
		</div>
	<?php endif; ?>
</div>
