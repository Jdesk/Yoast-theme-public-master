<?php
/**
 * @package Yoast\YoastCom
 */

namespace Yoast\YoastCom\Theme;

/**
 * A promo widget for certain promo areas
 */
class Promo_Widget extends Widget {

	/**
	 * Inits the widget with WordPress
	 */
	public static function init() {
		register_widget( __CLASS__ );
	}

	/**
	 * Constructor
	 */
	public function __construct() {
		parent::__construct( 'yst-promo-widget', 'Yoast Promo Widget', array(
			'classname' => 'promoblock arrowed-small',
		) );
	}

	/**
	 * Sets the defaults on the instance object
	 *
	 * @param array $instance
	 * @return array
	 */
	protected function set_defaults( $instance ) {

		if ( ! isset( $instance['link'] ) ) {
			$instance['link'] = home_url();
		}

		if ( ! isset( $instance['text'] ) ) {
			$instance['text'] = '';
		}

		if ( ! isset( $instance['title'] ) ) {
			$instance['title'] = '';
		}

		if ( ! isset( $instance['link_text'] ) ) {
			$instance['link_text'] = __( 'Read more', 'yoastcom' );
		}

		return $instance;
	}

	/**
	 * @param array $args
	 * @param array $instance
	 */
	public function widget( $args, $instance ) {

		$instance = $this->set_defaults( $instance );

		$args['before_widget'] = str_replace( 'width-seventh', $instance['width'], $args['before_widget'] );

		echo $args['before_widget'];

		?>
		<h2><a href="<?php echo esc_url( $instance['link'] ); ?>"><?php echo esc_html( $instance['title'] ); ?> &raquo;</a></h2>

			<p class="hide-on-mobile">
				<?php echo esc_html( $instance['text'] ); ?>
				<a href="<?php echo esc_url( $instance['link'] ); ?>" class="font-default"><?php echo esc_html( $instance['link_text'] ); ?> &raquo;</a>
			</p>
		<?php

		echo $args['after_widget'];
	}

	/**
	 * @param array $instance
	 *
	 * @return string
	 */
	public function form( $instance ) {
		$instance = $this->set_defaults( $instance );

		$this->input_text( 'title', __( 'Title', 'yoastcom' ), $instance['title'] );
		$this->input_text( 'link', __( 'Link (URL)', 'yoastcom' ), $instance['link'] );
		$this->input_textarea( 'text', __( 'Text', 'yoastcom' ), $instance['text'] );
		$this->input_text( 'link_text', __( 'Link text', 'yoastcom' ), $instance['link_text'] );

		?>

		<?php

		return '';
	}
}

