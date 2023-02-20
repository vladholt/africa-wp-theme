<?php
/**
*  single content tag / category
*
*/ ?>
<article class="category-list__item">
	<div class="category-list__item--image">
		<img src="<?php the_post_thumbnail_url();?>" alt="Image">
	</div>
    <div class="category-list__content">
    	<h2> <?php the_title();?>  </h2>
		<p>  <?php the_excerpt();?> 
			<span> <a href="<?php the_permalink(); ?>">Read more</a> </span> 
		</p>
		<div class="category-list__fitures fitures-text">
			<div><?php the_author();?></div>
			<div><?php echo get_the_date('j . F . Y');?></div>	
		</div>  					      
    </div>
</article>
<hr>