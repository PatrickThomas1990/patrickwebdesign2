<form method="get" id="searchform" class="sidebar-search-form" action="<?php echo esc_url( home_url( '/' ) ); ?>">
	<input type="search" placeholder="<?php echo esc_attr_e( 'Search here', 'elentra' ); ?>" value="<?php echo get_search_query(); ?>" name="s" id="s"/>
	<button type="submit"><i class="ion-ios-search-strong"></i></button>
</form>