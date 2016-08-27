<?php
/**
 * @package Yoast\YoastCom
 */

namespace Yoast\YoastCom\Theme;

/**
 * Extends the default walker to add a wrapper around the submenus
 */
class Menu_Walker extends \Walker_Nav_Menu
{
	/**
	 * Add the wrapper start
	 *
	 * @param string $output The current output.
	 * @param int    $depth The depth we are at.
	 * @param array  $args The nav menu arguments.
	 */
	function start_lvl( &$output, $depth = 0, $args = array() ) {
		$indent = str_repeat("\t", $depth);
		$output .= "\n$indent<div class='subnav'><ul class='sub-menu'>\n";
	}

	/**
	 * Add the wrapper end
	 *
	 * @param string $output The current output.
	 * @param int    $depth The depth we are at.
	 * @param array  $args The nav menu arguments.
	 */
	function end_lvl( &$output, $depth = 0, $args = array() ) {
		$indent = str_repeat("\t", $depth);
		$output .= "$indent</ul></div>\n";
	}
}
