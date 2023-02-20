<?php
/**
 * The template for displaying all single posts
 *
 * @link https://developer.wordpress.org/themes/basics/template-hierarchy/#single-post
 *
 * @package Africa
 */

get_header("blog");



get_template_part( 'template-parts/single', 'content' );
/*
			the_post_navigation(
				array(
					'prev_text' => '<span class="nav-subtitle">' . esc_html__( 'Previous:', 'africa' ) . '</span> <span class="nav-title">%title</span>',
					'next_text' => '<span class="nav-subtitle">' . esc_html__( 'Next:', 'africa' ) . '</span> <span class="nav-title">%title</span>',
				)
			);
*/
get_sidebar('blog-bottom-sidebar'); 
get_footer('blog');
