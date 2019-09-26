remove_action( 'woocommerce_before_single_product_summary', 'woocommerce_show_product_sale_flash', 10); 
// define the woocommerce_before_shop_loop_item_title callback 
function woocommerce_show_product_sale_flash() { 
	echo '<h3><a href="' . get_the_permalink() . '">' . get_the_title() . '</a></h3>';
	echo '<span style="display:none;" class="prodcat';
	$categories = get_the_terms( get_the_ID(), 'product_cat' );
	foreach ($categories as $category) {
		echo ' ' . $category->name . '';
	};
	echo '"> </span>';

    foreach( wp_get_post_terms( get_the_id(), 'product_cat' ) as $term ){
	
		if( $term ){

            echo 'by:  ' .$term->slug . '<br>'; // product category name
            if ($term->description)
				echo $term->description . '<br>'; // Product category description
				
        }
    }


};         
// add the action 
add_action( 'woocommerce_before_single_product_summary', 'woocommerce_show_product_sale_flash', 10, 0 ); 
