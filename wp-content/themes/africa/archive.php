<?php
/**
 * The template for displaying archive pages
 *
 * @link https://developer.wordpress.org/themes/basics/template-hierarchy/
 *
 * @package Africa
 */

get_header('blog');
?>

	<main id="primary" class="cetegory">
		
	<?php   if ( have_posts() ) : ?>
		<header class="cetegory__header">
			<?php
			the_archive_title( '<h2 class="cetegory-list__header--title">', '</h2>' );
			?>
		</header><!-- .page-header -->	
		<section class="category-list">	
		<?php
		/* Start the Loop */
			while ( have_posts() ) :
				the_post();
				get_template_part( 'template-parts/tag','category');
			endwhile; 
		?>
		</section>
		<?php
			endif;	
		 	get_sidebar('blog-left-sidebar');?>
	</main><!-- #main -->

<?php
get_sidebar('blog-bottom-sidebar');
get_footer('blog');
