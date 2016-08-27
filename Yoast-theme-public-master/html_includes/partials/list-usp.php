<?php
namespace Yoast\YoastCom\Theme;
?>
<ul class="list--usp <?php echo esc_attr( $template_args['class'] ); ?>">
	<?php foreach ( $template_args['usps'] as $usp ) : ?>
		<li><?php echo esc_html( $usp ); ?> &raquo;</li>
	<?php endforeach; ?>
</ul>
