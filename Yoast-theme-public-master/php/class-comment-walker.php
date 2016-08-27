<?php
/**
 * @package Yoast\YoastCom
 */

namespace Yoast\YoastCom\Theme;

/**
 * A custom walker to display comments our way
 */
class Comment_Walker extends \Walker_Comment {

	/**
	 * @param object $comment
	 * @param int    $depth
	 * @param array  $args
	 */
	protected function comment( $comment, $depth, $args ) {

		?>
		<li <?php comment_class( ( $this->has_children ) ? 'parent' : '', $comment->comment_ID ); ?> id="comment-<?php comment_ID(); ?>">
			<?php if ( 1 === $depth ) : ?><div class="row"><?php endif; ?>
				<div class="media media--nofloat">
					<div class="img">
						<?php
						$avatar_size = ( 1 === $depth ) ? 100 : 70;
						echo get_avatar( $comment, $avatar_size, '', get_comment_author() );
						?>
					</div>
					<div class="bd">
						<div class="comment-author">
							<?php
							printf(
								__( 'By&nbsp;<cite class="fn">%s</cite> <span class="date">on %s</span>', 'yoast-theme' ),
								get_comment_author_link(),
								get_comment_date()
							);
							?>
						</div>

						<div class="comment-content">
							<?php if ( $comment->comment_approved == '0' ) : ?>
								<p class="alert"><?php echo apply_filters( 'genesis_comment_awaiting_moderation', __( 'Your comment is awaiting moderation.', 'genesis' ) ); ?></p>
							<?php endif; ?>

							<?php comment_text(); ?>
						</div>
					</div>
				</div>

				<div class="reply">
					<?php comment_reply_link( array_merge( $args, array( 'add_below' => 'comment', 'depth' => $depth, 'max_depth' => $args['max_depth'] ) ) ); ?>
					<?php edit_comment_link( 'edit', ' | ', '' ); ?>
				</div>
		<?php
	}

	/**
	 * @param string $output
	 * @param object $comment
	 * @param int    $depth
	 * @param array  $args
	 */
	public function end_el( &$output, $comment, $depth = 0, $args = array() ) {

		// Use depth 0 here because the depth get's decremented before this function.
		if ( 0 === $depth ) {
			$output .= '</div>';
		}

		$output .= '</li>';
	}
}
