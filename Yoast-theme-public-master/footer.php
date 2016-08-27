<?php
namespace Yoast\YoastCom\Theme;
?>
<footer role="contentinfo" class="sitefooter fill fill--secondary bordered bordered--top">
	<div class="row">
		<?php echo get_theme_option( 'footer', 'child-settings' ); ?>
	</div>
</footer>

<?php wp_footer(); ?>
</body>
</html>
