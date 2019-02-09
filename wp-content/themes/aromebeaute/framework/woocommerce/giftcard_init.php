<?php
#Gift field...
add_action( 'product_type_options', 'wc_gift_product_field' );
if( !function_exists('wc_gift_product_field') ) {
	function wc_gift_product_field($types) {
	
		$types['gift'] = array('id' => '_gift', 
								'wrapper_class' => 'show_if_simple',
								'label' => __( 'Gift', 'spalab'),
								'description' => __( 'Gift products.', 'spalab'));
		return $types;
	}
}

#Save product...
add_action( 'save_post', 'wc_gift_save_product');
if( !function_exists('wc_gift_save_product') ) {
	function wc_gift_save_product( $product_id ) {
		
		if ( defined( 'DOING_AUTOSAVE' ) && DOING_AUTOSAVE )
		return;
		
		$is_gift = isset( $_POST['_gift'] ) ? 'yes' : 'no';
		update_post_meta($product_id, '_gift', $is_gift);
		update_post_meta($product_id, '_visibility', ($is_gift == 'yes') ? 'hidden' : 'visible');
	}
}

#Adding new form fields...
add_action('woocommerce_before_order_notes','wc_gift_before_order_notes');
if( !function_exists('wc_gift_before_order_notes') ) {
	function wc_gift_before_order_notes() {
		
		global $woocommerce;
		
		$exists_gift = false;
		foreach($woocommerce->cart->get_cart() as $cart_item_key => $p)
		{
			$gift = get_post_meta($p['product_id'], '_gift', 1);
			if( $gift == 'yes' ) {
				$exists_gift = true;
				break;
			}
		}
		if( !$exists_gift )
			return false; ?>
	
		<div style="clear:both;"></div>
		<div class="dt-sc-hr-invisible-small"></div>
		<h3><?php _e('I\'m sending this Gift Card to someone', 'spalab') ;?></h3>
		<p class="form-row form-row-first">
			<label><?php _e('Receiver name' , 'spalab'); ?></label>
			<input type="text" class="input-text" name="gift_receipt_name" />
		</p>
		<p class="form-row form-row-last">
			<label><?php _e('Receiver email' , 'spalab'); ?></label>
			<input type="text" class="input-text" name="gift_receipt_email" />
		</p>
		<p class="form-row form-row-wide">
			<label><?php _e('Message to Receiver' , 'spalab'); ?></label>
			<textarea style="height:100px;" name="gift_receipt_msg"></textarea>
		</p><?php
	}
}

#Updating order meta...
add_action('woocommerce_checkout_update_order_meta', 'wc_gift_checkout_update_order_meta');
if( !function_exists('wc_gift_checkout_update_order_meta') ) {
	function wc_gift_checkout_update_order_meta($order_id) {
	
		update_post_meta($order_id, '_gift_receiver_name', trim(@$_POST['gift_receipt_name']));
		update_post_meta($order_id, '_gift_receiver_email', trim(@$_POST['gift_receipt_email']));
		update_post_meta($order_id, '_gift_receiver_msg', trim(@$_POST['gift_receipt_msg']));
	}
}

#Update when order processing / complete...
add_action('woocommerce_order_status_completed', 'wc_gift_payment_complete');
add_action('woocommerce_order_status_processing', 'wc_gift_payment_complete');
if( !function_exists('wc_gift_payment_complete') ) {
function wc_gift_payment_complete($order_id) {
	
	$order = new WC_Order($order_id);
	$rname =  get_post_meta($order_id, '_gift_receiver_name', 1);
	$remail = get_post_meta($order_id, '_gift_receiver_email', 1);
	$rmsg = get_post_meta($order_id, '_gift_receiver_msg', 1);
	$email_tpl = dttheme_option('woo', 'gcemail-template');
	$subject = dttheme_option('woo', 'gcemail-subject');
	$customer = new WP_User(get_post_meta($order_id, '_customer_user', 1));
	$to = empty($remail) ? $order->billing_email : $remail;
	$message = str_replace('[receiver_name]', empty($rname) ? sprintf("%s %s", $order->billing_first_name, $order->billing_last_name) : $rname, $email_tpl);
	$coupons = $is_gift = '';
	
	foreach($order->get_items() as $item_id => $item)
	{
		$is_gift = get_post_meta($item['product_id'], '_gift', 1);
		if( $is_gift != 'yes' ) continue;

		$blogname = get_bloginfo();
		$giftname = $item['name'];
		$message = str_replace('[gift_name]', $giftname, $message);
		$message = str_replace('[blog_name]', $blogname, $message);
		$message = str_replace('[additional_message]', $rmsg, $message);
		$message = str_replace('[fname]', $order->billing_first_name, $message);
		$message = str_replace('[lname]', $order->billing_last_name, $message);		
	}
	if( $is_gift == 'yes' ) {

		$subject = $subject.' '.$order->billing_first_name;
		wp_mail($to,$subject, $message, array("From: $blogname <no-reply@nodomain.com>"));
	}
}
}
#Allow html type content while sending mail.
add_filter( 'wp_mail_content_type', 'wc_gift_set_html_content_type' );
if( !function_exists('wc_gift_set_html_content_type') ) {
	function wc_gift_set_html_content_type() {
		return 'text/html';
	}
}
?>