<?php
/**
 * The template for displaying category pages
 *
 * @link https://developer.wordpress.org/themes/basics/template-hierarchy/
 *
 * @package Africa
 */
	get_header('blog');
?>
	<main id="primary" class="site-main">
		<div class="category">
		<?php   if ( have_posts() ) : ?>
				<header class="category__header">
					<?php
					the_archive_title( '<h2 class="category-list__header--title">', '</h2>' );
					?>
				</header><!-- .page-header -->
				<section class="category-list">	
					<div class="category-list__block">
						<?php
						/* Start the Loop */
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
