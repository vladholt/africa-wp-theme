<?php
/**
 * The template for displaying 404 pages (not found)
 *
 * @link https://codex.wordpress.org/Creating_an_Error_404_Page
 *
 * @package Africa
 */
get_header("blog");
?>
	<main id="primary" class="site-main">
		<section class="error-404 not-found">
			<header class="page-header">
				<h1 class="page-title"><?php esc_html_e( 'Oops! That page can&rsquo;t be found.', 'africa' ); ?></h1>
			</header><!-- .page-header -->
				<p class="title-explanations"><?php esc_html_e( 'It looks like nothing was found at this location. Maybe try one of the links below or a search?', 'africa' ); ?></p>
					<?php
					get_search_form();
					//the_widget( 'WP_Widget_Recent_Posts' );
					?>
			<div class="page-content">
					<div class="widget widget_categories page-content__items">
						<h2 class="widget-title"><?php esc_html_e( 'Most Used Categories', 'africa' ); ?></h2>
						<ul>
							<?php
							wp_list_categories(
								array(
									'orderby'    => 'count',
									'order'      => 'DESC',
									'show_count' => 1,
									'title_li'   => '',
									'number'     => 10,
								)
							);
							?>
						</ul>
					</div><!-- .widget -->
					<div class="widget blog-archive page-content__items">
					<?php
					/* translators: %1$s: smiley */
						$africa_archive_content = '<p>' . sprintf( esc_html__( 'Try looking in the monthly archives. %1$s', 'africa' ),convert_smilies( ':)' ) ) . '</p>';

						the_widget( 'WP_Widget_Archives', 'dropdown=3', "after_title=</h2>$africa_archive_content" );
					?>
					</div>
					<div class="widget blog-tag-cloud page-content__items">
						<?php the_widget( 'WP_Widget_Tag_Cloud' ); ?>
					</div>
			</div><!-- .page-content -->
		</section><!-- .error-404 -->
	</main><!-- #main -->
<?php
get_footer('blog');
