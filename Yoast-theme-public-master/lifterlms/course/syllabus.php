<?php
/**
 * @author 		codeBOX
 * @package 	lifterLMS/Templates
 */

if ( ! defined( 'ABSPATH' ) ) exit;

global $post, $course;

if ( ! $course ) {
	$course = new LLMS_Course( $post->ID );
}

$html = '';
$html .= '<div class="clear"></div>';
$html .= '<div class="llms-lesson-tooltip"id="lockedTooltip"></div>';
$html .= '<div class="llms-syllabus-wrapper">';

//get section data
$sections = $course->get_children_sections();
if ( !$sections ) {
	$html .= LLMS_Language::output('This course does not have any sections.');
} else {

	$current_section = false;

	foreach ( $sections as $section_child ) {
		$section = new LLMS_Section( $section_child->ID);

		if ( false === $current_section && 100 !== (int) $section->get_percent_complete() ) {
			$current_section = $section_child->ID;
		}

		$classes = array( 'syllabus-section' );
		if ( false === $current_section ) {
			$classes[] = 'complete-section';
		}

		if ( $section_child->ID === $current_section ) {
			$classes[] = 'current-section open';

		// All sections after the current section are unavailable.
		}
		elseif ( false !== $current_section ) {
			$classes[] = 'unavailable-section';
		}

		$html .= '<section class="' . esc_attr( implode( ' ', $classes ) ) . '">';
		$html .= '<button class="llms-h3 llms-section-title toggle">';
			$html .= '<h3>';
				$html .= '<i class="fa fa-check-square" aria-hidden="true"></i>';
				$html .= $section->post->post_title;
		
		// updated?
		
		
				$html .= '<i class="fa fa-caret-down" aria-hidden="true"></i>';
			$html .= '</h3>';
		$html .= '</button>';

		//get lesson data
		$lessons = $section->get_children_lessons();

		if ( !$lessons ) {

			$html .= LLMS_Language::output('This section does not have any lessons.');

		} else {

			$html .= '<div class="lessons">';
			foreach( $lessons as $lesson_child ) {
				$lesson = new LLMS_Lesson($lesson_child->ID);

				//determine if lesson is complete to show complete icon
				if( $lesson->is_complete() ) {
					$check = '<span class="llms-lesson-complete"><i class="fa fa-check-circle"></i></span>';
					$complete = ' is-complete';
				} else {
					$complete = $check = '';
				}

				//set permalink
				$permalink = 'javascript:void(0)';
				$page_restricted = llms_page_restricted($course->id);
				$title = '';
				$linkclass = '';

				if ( ! $page_restricted['is_restricted'] ) {
					$permalink = get_permalink( $lesson->id );
					$linkclass = 'llms-lesson-link';
				}
				else {
					$title = LLMS_Language::output( 'Take this course to unlock this lesson' );
					$linkclass = 'llms-lesson-link-locked';
				}

				if ( $lesson->is_complete() ) {
					$linkclass .= ' is-complete';
				}

				$html .= '<a class="' . $linkclass . '" title="' . $title . '" href="' . $permalink . '">';
				$html .= $lesson->post->post_title;
				$html .= '</a>';
			}
			$html .= '</div>';
		}
		$html .= '</section>';
	}

}
$html .= '<div class="clear"></div>';
$html .= '</div>';

if (get_option('lifterlms_course_display_outline') === 'yes') {
	echo $html;
}
