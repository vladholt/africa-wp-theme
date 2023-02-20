<form method="get" id="searchform" action="<?php echo $_SERVER['PHP_SELF']; ?>">
	<div class="castom-searchbox">
		<input type="search" value="<?php the_search_query(); ?>" name="s" id="s" size="14" />
		<button type="submit" id="searchsubmit">	
		</button>
		<input type="hidden" name="post_type" value="post" />
	</div>
</form>
