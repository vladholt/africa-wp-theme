<?php
/**
 * The template for displaying search pages
 *
 * @link https://developer.wordpress.org/themes/basics/template-hierarchy/
 *
 * @package Africa
 */
    if ( !have_posts() ) :
    	wp_redirect(home_url('/404/'));
		exit();
	else : 	
	    get_header('blog');
?>
		<main id="primary" class="site-main">
			<div class="search">
				<header class="search__header">
					<?php
	    				the_archive_title( '<h2 class="search-list__header--title">', '</h2>' );
					?>
				</header><!-- .page-header -->
				<section class="search-list">	
					<div class="search-list__block">
						<?php
							while ( have_posts() ) :
								the_post();
								get_template_part( 'template-parts/tag','category');	
							endwhile; 
						?>
					</div>
					<?php 
						get_sidebar('blog-left-sidebar');
					?>
				</section>
<?php				
	endif;	
?>
			</div>	
		</main><!-- #main -->
<?php
get_sidebar('blog-bottom-sidebar');
get_footer('blog');
