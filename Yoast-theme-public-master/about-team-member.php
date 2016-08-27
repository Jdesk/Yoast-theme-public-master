<?php
/**
 * Template Name: About team member
 */

namespace Yoast\YoastCom\Theme;
?>
<?php get_header(); ?>

<?php get_template_part( 'html_includes/siteheader', array( 'about-sub' => true, ) ); ?>
<div class="site">

	<div class="row">
		<?php get_template_part( 'html_includes/partials/breadcrumbs' ); ?>
	</div>

	<main role="main">
		<section class="row">
			<h1>Michiel Heijmans</h1>
		</section>

		<hr class="hr--no-pointer">

		<article class="row">
			<div class="media media--nofloat">
				<a href="#" class="imgExt">
					<img src="http://placehold.it/160x160" class="promoblock promoblock--imageholder">
				</a>
				<div class="bd content">
					<div class="meta">
						<p>By <a href="./about-author.html">Michiel Heijmans</a> - Last update 9 October 2014</p>
					</div>

					<p>
						I built my first website around 1995, TheTropics 7907 on GeoCities, if I recall correctly. &lsaquo;blink&rsaquo; was still accepted. Superman could still move his legs. HTML 1.0.
					</p>

					<p>
						Studied marketing and ended up:<br>
						starting an internet division in a major dutch consultancy agency (CSS became more and more the standard), doing marketing for a large internet agency (closed CMSes all around) and being a web editor for the largest dutch recipes website (finally usability gained importance).
					</p>
				</div>
			</div>
		</article>

		<section class="row">
			<?php get_template_part( 'html_includes/partials/quote' ); ?>
			<div class="content">
				<p>
					Besides that, I started blogging at Badlog.nl in 2001 and maintained that blog for almost ten years. Participated in a couple of design contests with the blog in these days (actually won one in 2005). My business started getting more and more serious, the blog was not, so I eventually buried it. Co-founded About:blank, the main online blog magazine of the Netherlands.
				</p>

				<p>
					In the last couple of years I have been general manager of a local web design company, started my own business (internet consultancy and websites) in 2009 and met Joost during these years. April 2011, we started working together and February 2012 we sealed that cooperation with a contract.
				</p>

				<p>
					Esther agreed to marry me in 2005 and we have two beautiful daughters, Puck and Linde. Although sometimes pretty pigheaded, those little girls usually give me less headaches than a lot of websites do :) At Yoast, my days are currently filled managing and doing the site reviews.
				</p>

				<p>You can find Michiel on:
					<?php get_template_part( 'html_includes/partials/social-icons' ); ?>
				</p>
			</div>
		</section>

		<div class="announcement announcement--pointer-top fill fill--secondary">
			<div class="row">
				<p>
					Read more about <a class="link--explicit" href="#">Joost de Valk</a>, <a class="link--explicit" href="#">Marieke van de Rakt</a>, <a href="#" class="link--explicit">Omar Reiss</a> or another <a class="link--explicit" href="#">Yoast Team Member</a>.
				</p>
			</div>
		</div>

		<section class="row">
			<h2>Recent posts by Michiel</h2>
			<?php get_template_part( 'html_includes/partials/recent-articles' ); ?>
		</section>

		<?php get_template_part( 'html_includes/partials/newsletter-subscribe', array( 'class' => " announcement--pointer-top fill--tertiary", ) ); ?>

	</main>

	<div class="rowholder">
		<?php get_template_part( 'html_includes/fullfooter' ); ?>
	</div>

</div>


<?php get_footer(); ?>
