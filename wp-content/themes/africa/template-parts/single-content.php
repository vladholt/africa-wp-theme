<?php
/**
*  single content template
*
*/ ?>
<main id="primary" class="site-main">
		<div class="castom-blog">		
			<?php	
				$post = get_post(get_the_id());
				//var_dump($post);
				$auther = get_the_author_meta('nicename',$post->post_author);
			?> 
			<div class="section__image">
				<img src="<?php the_post_thumbnail_url();?>" alt="Image">
			</div>
		    <div class="castom-blog__content">
		    	<div class="blog-main-content">
			    	<h2> <?php echo $post->post_title;?>  </h2>
					<p>  <?php echo $post->post_content;?> </p>
					<div class="blog-main-content__fitures fitures-text">
						<div><?php echo get_the_author_meta('nicename',$post->post_author);?></div>
						<div><?php echo $post->post_date; ?></div>	
					</div> 
					<?php   if ( comments_open() || get_comments_number() ) :
							    comments_template();
							endif; 
					?> 	
			    </div>    
				<?php get_sidebar('blog-left-sidebar');?>
		    </div>
		</div>
	</main><!-- #main -->