<?php global $product_container_class;
add_theme_support( 'wc-product-gallery-zoom' );
add_theme_support( 'wc-product-gallery-lightbox' );
add_theme_support( 'wc-product-gallery-slider' );


#Disable WooCommerce Styles
if ( version_compare( get_option('woocommerce_version'), "2.1" ) >= 0 ) {
	add_filter( 'woocommerce_enqueue_styles', '__return_false' );
} else {
	define( 'WOOCOMMERCE_USE_CSS', false );
}

if(!is_admin()){
	add_action('wp','init');
}

function init(){
	global $post,$dt_page_layout;
	if( !is_null($post) ) {
	$id = $post->ID;
		$tpl_default_settings = get_post_meta( $id ,'_tpl_default_settings',TRUE);
		$tpl_default_settings = is_array($tpl_default_settings) ? $tpl_default_settings  : array();
		$dt_page_layout  = array_key_exists("layout",$tpl_default_settings) ? $tpl_default_settings['layout'] : "content-full-width";
		$dt_page_layout = ( $dt_page_layout === "content-full-width" ) ? "" : "-with-sidebar";
	}
}

//register my own styles, remove woo theme style sheet
if(!is_admin()){
	add_action('init', 'dt_woocommerce_register_assets');
	
	#To add extra class form product images
	add_filter( 'post_class', 'dt_product_has_gallery' );

}

if( !function_exists('dt_woocommerce_register_assets') ) {
	function dt_woocommerce_register_assets() {
		wp_enqueue_style( 'dt-woocommerce-css', IAMD_FW_URL.'woocommerce/style.css');
	}
}

if( !function_exists('dt_product_has_gallery') ) {
	function dt_product_has_gallery( $classes ) {
		global $product;
		
		if(isset($product) && !empty($product)){
		  $post_type = get_post_type( get_the_ID() );
		  if ( $post_type == 'product' ) {
				  $attachment_ids = $product->get_gallery_image_ids();
				  if ( $attachment_ids ) {
					  $classes[] = 'pif-has-gallery';
				  }
		  }
		}
		return $classes;
	}
}
#End of Adding extra class to product

/*No of products per row*/
add_filter( 'loop_shop_columns', 'dt_woocommerce_loop_columns' );	
if (!function_exists('dt_woocommerce_loop_columns')) {
	function dt_woocommerce_loop_columns() {
		$shop_layout = dttheme_option('woo',"shop-page-product-layout");
		$columns = "";
		switch($shop_layout) {
			case "one-half-column":
				$columns = 2;
				break;
			case "one-third-column":
				$columns = 3;
				break;				
			case "one-fourth-column":
				$columns = 4;
				break;				
			default:
				$columns = 4;
		}
		return $columns;
		
	}
}

// No of products per page
add_filter( 'loop_shop_per_page', 'dt_woocommerce_product_count' );
if (!function_exists('dt_woocommerce_product_count')) {
	function dt_woocommerce_product_count() {
		$shop_product_per_page = trim(stripslashes(dttheme_option('woo','shop-product-per-page')));
		$shop_product_per_page = !empty( $shop_product_per_page)  ? $shop_product_per_page : 10;
		return $shop_product_per_page;
	}
}

#Remove Shop Page Title
add_action( 'woocommerce_show_page_title', 'dt_woocommerce_show_page_title', 10);
if( !function_exists('dt_woocommerce_show_page_title') ) {
       function dt_woocommerce_show_page_title() {
               return false;
       }
}

//woo update - product title
remove_action( 'woocommerce_shop_loop_item_title', 'woocommerce_template_loop_product_title', 10 );
add_action( 'woocommerce_shop_loop_item_title', 'dt_woocommerce_template_loop_product_title', 10 );
if( !function_exists('dt_packages_labels') ) {
	function dt_woocommerce_template_loop_product_title() {
			echo '<h3>' . get_the_title() . '</h3>';
	}
}

//Woo update - review
add_filter( 'woocommerce_product_review_comment_form_args', 'dt_woocommerce_product_review_comment_form_args');
if( !function_exists('dt_woocommerce_product_review_comment_form_args') ) {
	function dt_woocommerce_product_review_comment_form_args( $comment_form ){
			$comment_form['title_reply_before']  = '<h3 id="reply-title" class="comment-reply-title">';
			$comment_form['title_reply_after'] = '</h3>';
			$comment_form['comment_notes_before'] = '';
	
			return $comment_form;
	}
}

remove_action( 'woocommerce_sidebar', 'woocommerce_get_sidebar', 10);
remove_action( 'woocommerce_pagination', 'woocommerce_catalog_ordering', 20 );
remove_action( 'woocommerce_pagination', 'woocommerce_pagination', 10 );

#Add / Remove WooCommerce actions
remove_action( 'woocommerce_before_shop_loop', 'woocommerce_result_count', 20 ); #remove result count above products
//remove_action( 'woocommerce_before_shop_loop', 'woocommerce_catalog_ordering', 30 ); #remove woo commerce ordering drop down
remove_action( 'woocommerce_after_shop_loop_item_title', 'woocommerce_template_loop_rating', 5 ); #remove rating
remove_action( 'woocommerce_after_shop_loop', 'woocommerce_pagination', 10 ); //remove woo pagination

#Adjust markup on all WooCommerce pages
remove_action( 'woocommerce_before_main_content', 'woocommerce_breadcrumb', 20, 0);
remove_action( 'woocommerce_before_main_content', 'woocommerce_output_content_wrapper', 10);
remove_action( 'woocommerce_after_main_content', 'woocommerce_output_content_wrapper_end', 10 );

add_action( 'woocommerce_before_main_content', 'dt_woocommerce_before_main_content', 10);
if( !function_exists('dt_woocommerce_before_main_content') ) {
	function dt_woocommerce_before_main_content() {

		global $product_container_class;
		$product_layout = dttheme_option('woo',"shop-page-product-layout");
		$product_layout = !empty( $product_layout ) ? $product_layout : "one-half-column";
		switch( $product_layout ){
			case "one-half-column":
				$product_layout = 2;
			break;

			case "one-third-column":
				$product_layout = 3;
			break;

			case "one-fourth-column":
				$product_layout = 4;
			break;

			default:
				$product_layout = 3;
			break;
		}

		if( is_shop() ){

			$tpl_default_settings = get_post_meta( get_option('woocommerce_shop_page_id') ,'_tpl_default_settings',TRUE);
			$tpl_default_settings = is_array($tpl_default_settings) ? $tpl_default_settings  : array();

			$page_layout  = array_key_exists("layout",$tpl_default_settings) ? $tpl_default_settings['layout'] : "content-full-width";

		}elseif( is_product()) {
			$page_layout = dttheme_option('woo',"product-layout");
			$page_layout = !empty($page_layout) ? $page_layout : "content-full-width";

		}elseif( is_product_category() ) {
			$page_layout = dttheme_option('woo',"product-category-layout");
			$page_layout = !empty($page_layout) ? $page_layout : "content-full-width";

		}elseif( is_product_tag() ) {
			$page_layout = dttheme_option('woo',"product-tag-layout");
			$page_layout = !empty($page_layout) ? $page_layout : "content-full-width";
		}

		#Define Product Layout 
		switch( $product_layout ):
			case '2':	$product_container_class = "product-two-column";	break;
			case '3':	$product_container_class = "product-three-column";	break;
			case '4':	$product_container_class = "product-four-column";	break;
		endswitch;

		#Define Page Layout
		switch($page_layout):
			case 'with-left-sidebar':
				$page_layout =  $page_layout." page-with-sidebar";
			break;
			
			case 'with-right-sidebar':
				$page_layout =  $page_layout." page-with-sidebar";				
			break;
			
			default:
				$product_container_class = $product_container_class;
			break;
		endswitch;

		echo  "<!-- **Primary Section** -->";
		echo  "<section id='primary' class='{$page_layout}'>";
	}
}

add_action( 'woocommerce_after_main_content', 'dt_woocommerce_after_main_content', 20);
if( !function_exists('dt_woocommerce_after_main_content') ) {
	function dt_woocommerce_after_main_content() {
		echo " </section><!-- **Primary Section** -->";

		if( is_shop() ) {
		
			#Page Settings
			$tpl_default_settings = get_post_meta( get_option('woocommerce_shop_page_id') ,'_tpl_default_settings',TRUE);
			$tpl_default_settings = is_array($tpl_default_settings) ? $tpl_default_settings  : array();
			
			$page_layout  = array_key_exists("layout",$tpl_default_settings) ? $tpl_default_settings['layout'] : "content-full-width";

		}elseif( is_product()) {
			$page_layout = dttheme_option('woo',"product-layout");
			$page_layout = !empty($page_layout) ? $page_layout : "content-full-width";

		}elseif( is_product_category() ) {
			$page_layout = dttheme_option('woo',"product-category-layout");
			$page_layout = !empty($page_layout) ? $page_layout : "content-full-width";

		}elseif( is_product_tag() ) {
			$page_layout = dttheme_option('woo',"product-tag-layout");
			$page_layout = !empty($page_layout) ? $page_layout : "content-full-width";
		}


		$show_sidebar = false;
		$sidebar_class= "";

		switch($page_layout):

			case 'with-left-sidebar':
				$page_layout 	=	"page-with-sidebar with-left-sidebar";
				$show_sidebar 	= 	true;
				$sidebar_class 	=	"left-sidebar";
			break;
		
			case 'with-right-sidebar':
				$show_sidebar 	= 	true;
				$page_layout 	=	"page-with-sidebar with-right-sidebar";
			break;

		endswitch;

		if($show_sidebar) {
			echo "<!-- **Secondary Section ** -->";
			echo "<section id='secondary' class='{$sidebar_class}'>";
			get_sidebar();
			echo '</section><!-- **Secondary Section - End** -->';
		}
	}
}

#Product Loop
#
# wrap products on overview pages into an extra div for improved styling options. adds "product_on_sale" class if prodct is on sale
#
add_action( 'woocommerce_before_shop_loop_item', 'dt_woocommerce_shop_overview_extra_div', 5);

if( !function_exists('dt_woocommerce_shop_overview_extra_div') ) {
	function dt_woocommerce_shop_overview_extra_div() {
		
		global $product, $woocommerce_loop;
	
				$class = "";
				if( is_shop() || is_product_category() || is_product_tag() ):
					$product_layout = dttheme_option('woo',"shop-page-product-layout");
					$product_layout = !empty( $product_layout ) ? $product_layout : "one-half-column";
	
					switch ($product_layout) {
						case 'one-half-column': 
							$class .= " product-two-column";
						break;
						case 'one-third-column':
							$class .= " product-three-column";
						break;
						case 'one-fourth-column': 
							$class .= " product-four-column";
						break;
					}
				else:
					$column = $woocommerce_loop['columns'];
	
					switch($column) {
						case '2':					$class .= "product-two-column";					break;
						case '3':					$class .= "product-three-column";				break;
						case '4':					$class .= "product-four-column";				break;
						default:					$class .= "product-two-column";					break;
					}
				endif;
	
				if( $product->is_featured() )
					$class .= " featured-product ";
			
				if( $product->is_on_sale() )
					$class .= " on-sale-product ";
	
				if( $product->is_in_stock() )
					$class .= " in-stock-product ";
				else	
					$class .= " out-of-stock-product ";
	
				echo "<div class='product-wrapper {$class}'>";
				echo '	<div class="product-container">';
	}
}

#Thumbnail
remove_action( 'woocommerce_before_shop_loop_item_title', 'woocommerce_show_product_loop_sale_flash', 10 );

remove_action( 'woocommerce_before_shop_loop_item_title', 'woocommerce_template_loop_product_thumbnail', 10);
add_action( 'woocommerce_before_shop_loop_item_title', 'dt_woocommerce_template_loop_product_thumbnail', 10);
if( !function_exists('dt_woocommerce_template_loop_product_thumbnail') ) {
	function dt_woocommerce_template_loop_product_thumbnail() {
		global $post,$product,$woocommerce;
		
		$out = "";
		$id = get_the_ID();
		$image =  get_the_post_thumbnail( $id );
		$image = !empty( $image ) ? $image : '<img  width="100%" height="100%" src="http'.dt_ssl().'://placehold.it/500x500" />';
	
		$out .= '<!-- Product Thumnail -->';
		$out .= "<div class='product-thumb'>";
		
		$out .= $image;
		
		$attachment_ids = $product->get_gallery_image_ids();
		if ( $attachment_ids ) {
				$secondary_image_id = $attachment_ids['0'];
				$out .= wp_get_attachment_image( $secondary_image_id, array(500,500), '', $attr = array( 'class' => 'secondary-image attachment-shop-catalog' ) );
		}
	
		$out .= '<div class="product-rating-wrapper"><div class="product-rating-container">'.wc_get_rating_html( $product->get_average_rating() ).'</div></div>';
		
		
		if ($product->is_on_sale() and $product->is_in_stock() ) :
			$out .= apply_filters('woocommerce_sale_flash', '<span class="onsale"><span>'.__( 'Sale!', 'spalab' ).'</span></span>', $post, $product);
	
		elseif(!$product->is_in_stock()):
			$out .= apply_filters( 'woocommerce_sale_flash', '<span class="out-of-stock"><span>'.__( 'Out of Stock', 'spalab' ).'</span></span>', $post, $product );
		endif;
	
		if( $product->is_featured() )
			$out .=  apply_filters( 'woocommerce_sale_flash', '<span class="featured"><span>'.__( 'Featured', 'spalab' ).'</span></span>', $post, $product );
			
		$out .= "</div><!-- Product Thumbnail -->";
		
	echo ( $out );
	}
}

add_action( 'woocommerce_before_shop_loop_item_title', 'dt_woocommerce_before_shop_loop_item_title', 10);
if( !function_exists('dt_woocommerce_before_shop_loop_item_title') ) {
	function dt_woocommerce_before_shop_loop_item_title() {
		$out = "";
		$out .= "<div class='product-title'>";
		echo ( $out );
	}
}

add_action( 'woocommerce_after_shop_loop_item_title', 'dt_woocommerce_after_shop_loop_item_title', 10);
if( !function_exists('dt_woocommerce_after_shop_loop_item_title') ) {
	function dt_woocommerce_after_shop_loop_item_title() {
		$out = "";
		$out .= "</div>";
		echo ( $out );
	}
}
 	
add_action( 'woocommerce_after_shop_loop_item', 'dt_woocommerce_shop_overview_extra_div_close', 1000);
if( !function_exists('dt_woocommerce_shop_overview_extra_div_close') ) {
	function dt_woocommerce_shop_overview_extra_div_close() {
		global $product;
		$link = apply_filters( 'out_of_stock_add_to_cart_url', get_permalink( $product->get_id() ) );
		$out = "";
	
		ob_start();
		woocommerce_template_loop_price();
		$price = ob_get_clean();
	
		ob_start();
		woocommerce_template_loop_add_to_cart();
		$add_to_cart = ob_get_clean();
		
		$out .= '<!-- Product Details -->';
		$out .= "<div class='product-details'>";
		
		$out .= $price;
		$out .= "<div class='product-buttons'>";
		$out .= $add_to_cart;
		if ( shortcode_exists( 'yith_wcwl_add_to_wishlist' ) )
		$out .= do_shortcode('[yith_wcwl_add_to_wishlist]');	
		$out .= "</div>";
		$out .= '</div><!-- Product Details -->';
		$out .= '</div><!-- Product container -->';
		$out .= "</div> <!-- Product Wrapper End-->";
		echo ( $out );
	}
}

#To Pagination
add_action( 'woocommerce_after_shop_loop', 'dt_woocommerce_after_shop_loop', 10);
if( !function_exists('dt_woocommerce_after_shop_loop') ) {
	function dt_woocommerce_after_shop_loop() { ?>
	<div class="pagination">
			<div class="prev-post"><?php previous_posts_link(__('<span class="fa fa-angle-double-left"></span> Prev','spalab'));?></div>
			<?php   echo dttheme_pagination(); ?>
			<div class="next-post"><?php next_posts_link(__('Next <span class="fa fa-angle-double-right"></span>','spalab'));?></div>
		</div>
	<?php    
	}
}

#Single Product
#Showing Related Products
remove_action( 'woocommerce_after_single_product_summary', 'woocommerce_output_related_products',20);
remove_action( 'woocommerce_after_single_product', 'woocommerce_output_related_products',10);
add_action( 'woocommerce_after_single_product_summary', 'dt_woocommerce_output_related_products', 20);

if( !function_exists('dt_woocommerce_output_related_products') ) {
	function dt_woocommerce_output_related_products() {
		
		$page_layout = dttheme_option('woo',"product-layout");
		$page_layout = !empty($page_layout) ? $page_layout : "content-full-width";
		
		$related_products = ( $page_layout === "content-full-width" ) ? 4 : 3;
		
		$output = "";
		ob_start();
		woocommerce_related_products(array('posts_per_page'=>$related_products,'columns'=>$related_products));
		$content = ob_get_clean();
		if($content):
			$content =  str_replace('<h2>','<h2 class="aligncenter dark-title">', $content);
			$content =  str_replace('</h2>','<span></span></h2>', $content);
			$output .= "<div class='related-products-container'>{$content}</div>";
		endif;
		echo ( $output );
	}
}

#Showing Upsell Products( You may also like)
remove_action( 'woocommerce_after_single_product_summary', 'woocommerce_upsell_display', 15 );
remove_action( 'woocommerce_after_single_product', 'woocommerce_upsell_display',10);
add_action( 'woocommerce_after_single_product_summary', 'dt_woocommerce_output_upsells', 21); // needs to be called after the "related product" function to inherit columns and product count

if( !function_exists('dt_woocommerce_output_upsells') ) {
	function dt_woocommerce_output_upsells() {
		
		$page_layout = dttheme_option('woo',"product-layout");
		$page_layout = !empty($page_layout) ? $page_layout : "content-full-width";
		
		$upsell_products = ( $page_layout === "content-full-width" ) ? 4 : 3;
		
		$output = "";
		ob_start();
		woocommerce_upsell_display($upsell_products,$upsell_products); // X products, X columns
		$content = ob_get_clean();
		if($content):
			$content =  str_replace('<h2>','<div class="border-title"><h2>', $content);
			$content =  str_replace('</h2>','<span></span></h2></div>', $content);
			$output .= "<div class='upsell-products-container'>{$content}</div>";
		endif;
		echo ( $output );
	}
}

remove_action( 'woocommerce_before_single_product_summary', 'woocommerce_show_product_sale_flash', 10 );
add_action('woocommerce_before_single_product_summary','dt_woocommerce_show_product_sale_flash',10);
if( !function_exists('dt_woocommerce_show_product_sale_flash') ) {
	function dt_woocommerce_show_product_sale_flash() {
		global $product;
		$out = "";
		if( $product->is_on_sale() and $product->is_in_stock() )
			$out .= '<span class="onsale">'.__('Sale!','spalab').'</span>';
			
		elseif(!$product->is_in_stock())
			$out .= '<span class="out-of-stock">'.__('Out of Stock','spalab').'</span>';
			
		if( $product->is_featured() )
			$out .= '<span class="featured-product">'.__('Featured','spalab').'</span>';
		echo ( $out );
	}
}?>