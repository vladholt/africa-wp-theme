<?php
/**
 * The template for displaying tag pages
 *
 * @link https://developer.wordpress.org/themes/basics/template-hierarchy/
 *
 * @package Africa
 */
	get_header('blog');
?>
	<main id="primary" class="site-main">
		<div class="tag">
		<?php   if ( have_posts() ) : ?>
				<header class="tag__header">
					<?php
					the_archive_title( '<h2 class="tag-list__header--title">', '</h2>' );
					?>
				</header><!-- .page-header -->
				<section class="tag-list">	
					<div class="tag-list__block">
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
