<?php

	
 ?>

<div class="sidebar--share">
	<p class="hdg-grey-caps">SHARE THIS PAGE</p>
	<?php
	wp_reset_postdata();
	include (TEMPLATEPATH . '/page-templates/social_share.php' ); ?>
</div>

<div class="sidebar--search js-sidebar--search">
	<p class="hdg-grey-caps">Refine your search</p>

	<input type="hidden" value="<?php bloginfo('home'); ?>" class="js-rs__home">
	<?php
	$terms = get_terms( 'Destinations' );
	if ( ! empty( $terms ) && ! is_wp_error( $terms ) )
	{
		echo '<select class="js-rs__destination">';
		echo '<option value="">Destination</option>';
		foreach ( $terms as $term ) {
			echo '<option value="' . $term->slug . '">' . $term->name . '</option>';
		}
		echo '</select>';
	}

	$values = $wpdb->get_col("SELECT meta_value
		FROM $wpdb->postmeta WHERE meta_key = 'number_of_beds'" );
	$numbers = array_unique($values);
	sort($numbers);

	if( $numbers )
	{
		echo '<select class="js-rs__number">';
		echo '<option value="">Number of beds</option>';
		foreach( $numbers as $k => $v )
		{
			echo '<option value="' . $v . '">' . $v . '</option>';
		}
		echo '</select>';
	}


	?>

	<a href="" class="js-refineSearch sidebar--search--btn">Search</a>

</div>


