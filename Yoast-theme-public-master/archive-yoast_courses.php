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
			<h1>Online SEO training by Yoast</h1>
			<div class="content">
				<p>Our online SEO courses will teach you about various aspects of SEO. We offer an online training
					which covers all the basics of SEO. We also offer a course that focuses on our Yoast
					SEO plugin, which teaches you everything you need to know to use our plugin to the
					fullest. For everyone who creates content we have the SEO copywriting training. This SEO training
					focuses on all aspects important in creating awesome and SEO-friendly articles.</p>

				<p>
					If you want to learn more about the specific courses and figure out which one's for you,
					<a href="<?php echo apply_filters( 'yoast:url', 'academy_overview' ); ?>seo-training/">read this article</a>.
				</p>
			</div>
		</div>

		<hr>

		<div class="row">
			<h2>Available online SEO courses</h2>
		</div>
		<?php while ( have_posts() ) : the_post(); ?>
			<article class="row">
				<?php get_template_part( 'html_includes/partials/course' ); ?>
			</article>

			<?php if ( ! is_last_post() ) : ?>
				<hr>
			<?php endif; ?>
		<?php endwhile; ?>

		<hr>

		<div class="row">
			<div class="content">
				<h2>What every online SEO course contains</h2>
				<p>All of our SEO courses contain lots of training videos in which Joost de Valk and other Yoast experts
					explain the topic. Every SEO training challenges you to check whether or not you understood the
					material. At the end of each lesson, you’ll have to fill out a quiz. All of our courses are
					developed with the help of an educational specialist. For the SEO copywriting training, we worked
					together with a linguist.</p>

				<p>All of the Yoast courses contain high quality and state-of-the-art material. We update every course
					at least annually, making sure we’ll teach you the latest insights. We give practical tips that’ll
					really allow you to make improvements on any website!</p>

				<p>Every course comes with a certificate for you to show your (prospective) customers that you know what
					you're doing when it comes to SEO!</p>
			</div>
		</div>

		<?php get_template_part( 'html_includes/partials/newsletter-subscribe' ); ?>

	</main>

	<div class="rowholder">
		<?php get_template_part( 'html_includes/fullfooter' ); ?>
	</div>

</div>

<?php get_footer(); ?>
