<?php
namespace Yoast\YoastCom\Theme;

/** @var \WP_Query $wp_query */
global $wp_query;
?>
<?php if ( $wp_query->max_num_pages > 1 ) : ?>
	<div class="pagination">
		<?php
		global $wp_query;

		$big = 999999999; // need an unlikely integer

		echo str_replace( '/page/1/', '/', paginate_links( array(
			'base'    => str_replace( $big, '%#%', esc_url( get_pagenum_link( $big ) ) ),
			'format'  => '?paged=%#%',
			'current' => max( 1, get_query_var( 'paged' ) ),
			'total'   => $wp_query->max_num_pages,
			'type'    => 'list',
		) ) );
		?>
	</div>
<?php endif; ?>
