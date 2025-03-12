<form role="search" method="get" id="searchform" class="searchform" action="<?php echo esc_url( home_url( '/' ) ); ?>">
		<input type="text" name="s" id="search" value="<?php the_search_query(); ?>" placeholder="Villas by Journey Mexico" />
		<input type="image" alt="Search" src="<?php bloginfo( 'template_url' ); ?>/images/btn-searchform.svg" />
</form>
