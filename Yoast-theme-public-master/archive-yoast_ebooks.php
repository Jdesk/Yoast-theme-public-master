<?php
namespace Yoast\YoastCom\Theme;
?>
<?php get_header(); ?>

<?php get_template_part( 'html_includes/siteheader', array( 'academy' => true ) ); ?>

<div class="site">
	<div class="row">
		<?php get_template_part( 'html_includes/partials/breadcrumbs' ); ?>
	</div>

	<main role="main">
		<div class="row">
			<h1>eBooks by Yoast</h1>
		</div>

		<?php while ( have_posts() ) : the_post(); ?>
			<article class="row">
				<?php get_template_part( 'html_includes/partials/ebook' ); ?>

				<?php if ( post_meta( 'testimonial' ) ) : ?>
					<blockquote><?php echo kses_blockquote( post_meta( 'testimonial' ) ); ?></blockquote>
				<?php endif; ?>
			</article>

			<hr>
		<?php endwhile; ?>

		<?php $bundles = query_bundles( array( 'query_ebook_bundles' => true ) ); $i = 0; ?>
		<?php while ( $bundles->have_posts() ) : $bundles->the_post(); $i++; ?>
			<article class="row island">
				<?php get_template_part( 'html_includes/partials/ebook-bundle' ); ?>
			</article>

			<?php // Don't display a seperator after the last bundle because the announcement is there already. ?>
			<?php if ( $i !== $bundles->post_count ) : ?>
				<hr>
			<?php endif; ?>
		<?php endwhile; wp_reset_postdata(); ?>

		<section class="announcement announcement--pointer-top fill fill--secondary">
			<div class="row">
				<p>
					<a href="<?php echo esc_url( url_website_review() ); ?>" class="link--naked"><?php _e( 'Want to know how to improve your site? Order an SEO Website Review', 'yoastcom' ); ?> &raquo;</a>
				</p>
			</div>
		</section>

		<?php get_template_part( 'html_includes/partials/newsletter-subscribe', array( 'class' => 'announcement--pointer' ) ); ?>

<!--		<article class="row island">-->
<!--			<h2>Creation of Yoast's Content SEO eBook cover &raquo;</h2>-->
<!--			<div class="content">-->
<!--				<p>-->
<!--					All illustrations related to Yoast are done bij Erwin Brouwe, our very own illustrator. For our Conttent SEO eBook he recorded the entire process of creating the cover art.-->
<!--				</p>-->
<!--				<p>-->
<!--					We think this recording is awesome and we&rsquo;re extremely proud to have suych a gifted illustrator in our midst, so we want to share this recording with you! Enjoy watching it!-->
<!---->
<!--					--><?php //get_template_part( 'html_includes/partials/video', array( 'class' => 'announcement--pointer' ) ); ?>
<!--				</p>-->
<!--			</div>-->
<!--		</article>-->
<!---->
<!--		<hr class="hr--no-pointer">-->

	</main>

	<div class="rowholder">
		<?php get_template_part( 'html_includes/fullfooter' ); ?>
	</div>

</div>

<?php get_footer(); ?>
