<?php
/**
 * The sidebar containing the main widget area
 *
 * @link https://developer.wordpress.org/themes/basics/template-files/#template-partials
 *
 * @package Africa
 */

    if ( ! is_active_sidebar( 'blog-bottom-sidebar' ) ) {
    	return;
    }
    ?>
    <aside id="sidebar-blog-bottom" class="widget-area blog-bottom-sidebar">
        <?php dynamic_sidebar('blog-bottom-sidebar'); ?>	
    </aside><!-- #secondary -->
