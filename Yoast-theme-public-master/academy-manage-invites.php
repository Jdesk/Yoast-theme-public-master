<?php

namespace Yoast\YoastCom\Theme;

use Yoast\YoastCom\Academy\Order;
use Yoast\YoastCom\Academy\Order_Invite;

/** @var Order $order */
$order   = $template_args['order'];
$invites = $template_args['invites'];
?>

<?php get_header(); ?>

<?php get_template_part( 'html_includes/siteheader', array( 'academy-sub' => true ) ); ?>

<div class="site">

	<div class="row">
		<?php get_template_part( 'html_includes/partials/breadcrumbs' ); ?>
	</div>

	<main role="main">

		<section class="row">
			<h1><?php _e( 'Manage invites', 'yoastcom' ); ?></h1>
		</section>

		<?php if ( $order->has_unused_invites() ) : ?>
			<section class="row iceberg island">
				<h2><?php _e( 'Invite a user', 'yoastcom' ); ?></h2>

				<form action="" method="post" class="manage-invites__form">
					<?php wp_nonce_field( 'send_invite_for_order_' . $order->get_order_id(), '_manage_invites_nonce' ); ?>
					<label for="email">
						<span class="screen-reader-text"><?php _e( 'Email address', 'yoastcom' ); ?></span>
						<input type="email" name="email" id="email" required="required" placeholder="<?php _e( 'Email address', 'yoastcom' ); ?>">
					</label>
					<button type="submit"><?php _e( 'Send invite', 'yoastcom' ); ?> &raquo;</button>
				</form>

<!--				<button class="button--naked manage-invites__add-email">-->
<!--					<i class="fa fa-plus-square" aria-hidden="true"></i>--><?php
//					_e( 'Add email address', 'yoastcom' );
//				?>
<!--				</button>-->
			</section>

			<hr class="hr--no-pointer" />
		<?php endif; ?>

		<section class="row iceberg">
			<h2><?php _e( 'Statistics', 'yoastcom' ); ?></h2>

			<table class="table--invite-overview">
				<thead>
					<tr>
						<th><?php _e( 'Invites total', 'yoastcom' ); ?></th>
						<th class="manage-invites__remaining"><?php _e( 'Remaining', 'yoastcom' ); ?></th>
						<th><?php _e( 'Send', 'yoastcom' ); ?></th>
						<th colspan="3"></th>
					</tr>
				</thead>
				<tbody>
					<tr>
						<td><?php echo esc_html( $order->get_amount() ); ?></td>
						<td><?php echo esc_html( $order->get_unused_invite_count() ); ?></td>
						<td><?php echo esc_html(  ( $order->get_send_invite_count() ) ); ?></td>
						<td aria-hidden="true"><i class="fa fa-arrow-circle-right"></i></td>
						<td><?php printf( __( 'used %d', 'yoastcom' ), esc_html( $order->get_used_invite_count() ) ); ?></td>
						<td>
							<i class="fa fa-check-square" aria-hidden="true"></i>
							<?php printf( __( 'completed %d', 'yoastcom' ), esc_html( $order->get_completed_invite_count() ) ); ?>
						</td>
					</tr>
				</tbody>
			</table>
		</section>

		<hr class="hr--no-pointer" />

		<section class="row">
			<h2><?php _e( 'All invites', 'yoastcom' ); ?></h2>
			<table class="table--invite-overview">
				<thead>
				<tr>
					<th><?php _e( 'Address', 'yoastcom' ); ?></th>
					<th><?php _e( 'Send on', 'yoastcom' ); ?></th>
					<th><?php _e( 'Used on', 'yoastcom' ); ?></th>
					<th><?php _e( 'Used by', 'yoastcom' ); ?></th>
					<th><?php _e( 'Completed', 'yoastcom' ); ?></th>
				</tr>
				</thead>
				<tbody>
				<?php /** @var Order_Invite $invite */ ?>
				<?php foreach ( $order->get_invites() as $invite ) : ?>
					<tr>
						<td><?php echo esc_html( $invite->get_email() ); ?></td>
						<td><?php echo date_i18n( 'j M Y', $invite->get_created() ); ?></td>
						<?php if ( $invite->is_used() ) : ?>
							<?php $user = $invite->get_used_by(); ?>
							<td>
								<?php echo date_i18n( 'j M Y', $invite->get_used() ); ?>
							</td>
							<td>
								<?php echo esc_html( $user->user_firstname . ' ' . $user->user_lastname ); ?>
							</td>
						<?php else : ?>
							<td>-</td><td>-</td>
						<?php endif; ?>
						<?php if ( $invite->course_is_completed() ) : ?>
							<td>
								<i class="fa fa-check-square" aria-hidden="true"></i>
								<?php $completed_on = $invite->get_course_completed_on(); ?>
								<?php if ( 0 === $completed_on ) : ?>
									<?php _e( 'Yes', 'yoastcom' ); ?>
								<?php else: ?>
									<?php echo date_i18n( 'j M Y', $completed_on ); ?>
								<?php endif; ?>
							</td>
						<?php else : ?>
							<td>-</td>
						<?php endif; ?>
					</tr>
				<?php endforeach; ?>
				</tbody>
			</table>
		</section>
	</main>
</div>

<?php get_footer(); ?>
