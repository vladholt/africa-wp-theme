<?php
/**
 * The sidebar containing the main widget area
 *
 * @link https://developer.wordpress.org/themes/basics/template-files/#template-partials
 *
 * @package Africa
 */
    if ( ! is_active_sidebar( 'blog-left-sidebar' ) ) {
    	return;
    }
    ?>
    <aside id="sidebar-blog-left" class="widget-area blog-left-sidebar">
        <?php dynamic_sidebar('blog-left-sidebar'); ?>	
    </aside><!-- #secondary -->