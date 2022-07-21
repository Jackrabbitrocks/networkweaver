<?php
function enqueue_parent_styles() {
    wp_enqueue_style( 'parent-style', get_template_directory_uri().'/style.css' );
}
add_action( 'wp_enqueue_scripts', 'enqueue_parent_styles' );

function nq_js(){
    wp_enqueue_script('nw_js', get_stylesheet_directory_uri().'/assets/js/networkweaver.js');
}

add_action('wp_enqueue_scripts', 'nq_js');

function add_last_nav_item($items) {
  return $items .= '<li class="donate"><a target="_blank" rel="noopener noreferrer" href="https://network-weaver.raisely.com/">
<img src="https://networkweaver.com/wp-content/uploads/2020/03/donate-button.png" border="0">
</a></li>';
}
add_filter('wp_nav_menu_items','add_last_nav_item');




/**
* @snippet Display "FREE" if WooCommerce Product Price is Zero or Empty - WooCommerce
* @how-to Watch tutorial @ https://businessbloomer.com/?p=19055
* @sourcecode https://businessbloomer.com/?p=73147
* @author Rodolfo Melogli
* @testedwith WooCommerce 3.2.2
*/
 
add_filter( 'woocommerce_get_price_html', 'bbloomer_price_free_zero_empty', 100, 2 );
  
function bbloomer_price_free_zero_empty( $price, $product ){
 
if ( '' === $product->get_price() || 0 == $product->get_price() ) {
    $price = '<span class="woocommerce-Price-amount amount">FREE</span>';
} 
 
return $price;
}

function custom_excerpt_length( $length ) {
	return 30;
}
add_filter( 'excerpt_length', 'custom_excerpt_length', 999 );

remove_filter( 'the_content', 'wpautop' );

function admin_bar(){
  if(is_user_logged_in()){
    add_filter( 'show_admin_bar', '__return_true' , 1000 );
  }
}
add_action('init', 'admin_bar' );

/**  function to show all the consultants on the team page. Update to the archive tempate  **/
function rab_all_team($query){
	if( is_archive() && is_category( $category = '76' )){
	  $query->query_vars['posts_per_page'] = -1; // Show all posts on a single page
	}
}

add_action( 'pre_get_posts', 'rab_all_team' );

function conditional_checkout_fields_products(){
  $cart = WC()->cart->get_cart();
  $field_toggle_cost = true;

  foreach ( $cart as $item_key => $values ) {
    $product = $values['data'];
    $price = $product->get_price();

    if ($price > 0){
      $field_toggle_cost = false;
      break;
    } 
  }
    if ($field_toggle_cost){  
      add_filter( 'woocommerce_checkout_fields', 'rab_remove_checkout_fields' );
    }
}


// remove_action('woocommerce_before_main_content', 'woocommerce_breadcrumb', 20, 0);

add_filter( 'woocommerce_default_address_fields' , 'free_address_fields', 20, 1 );


// remove required from fields when cart value = 0
function free_address_fields( $address_fields ) {
    // Only on checkout page
    if( ! is_checkout() ) return $address_fields;
    $cart = WC()->cart->get_cart();

    // iterate through each item of the cart 
    foreach ( $cart as $item_key => $values ) {
      $product = $values['data'];
      $price = $product->get_price();

      // if any cart items are greater than 0 end loop the rest of the function is dunzo
      if ($price > 0){
        $see_ya = 1;
        break;
      } 
    }

    if($see_ya) return $address_fields;
    
      // All field keys in this array
      $key_fields = array('country','company','address_1','address_2','city','state','postcode');

      // Loop through each address fields (billing and shipping)
      foreach( $key_fields as $key_field )
          $address_fields[$key_field]['required'] = false;

      return $address_fields;
    }

    add_filter( 'woocommerce_default_address_fields' , 'free_address_fields', 20, 1 );

// For billing email and phone - Make them not required
add_filter( 'woocommerce_billing_fields', 'filter_billing_fields', 20, 1 );
function filter_billing_fields( $billing_fields ) {
    // Only on checkout page
    if( ! is_checkout() ) return $billing_fields;

    $cart = WC()->cart->get_cart();

    // iterate through each item of the cart 
    foreach ( $cart as $item_key => $values ) {
      $product = $values['data'];
      $price = $product->get_price();

      // if any cart items are greater than 0 end loop the rest of the function is dunzo
      if ($price > 0){
        $see_ya = 1;
        break;
      } 
    }

    if($see_ya) return $billing_fields;

      $billing_fields['billing_phone']['required'] = false;
      return $billing_fields;
}

    /**
 * Remove all possible fields - example.
 */
function js_remove_checkout_fields( $fields ) {
  if( ! is_checkout() ) return $fields;
  $cart = WC()->cart->get_cart();
  $total_price = 0;
  // iterate through each item of the cart 
  foreach ( $cart as $item_key => $values ) {
    $product = $values['data'];
    $price = $product->get_price();
    $total_price += $price;
  }
    // if any cart items are greater than 0 end loop the rest of the function is dunzo
    if ($total_price > 0){
      return $fields;
    } 

    // Billing fields
    unset( $fields['billing']['billing_company'] );
    unset( $fields['billing']['billing_phone'] );
    unset( $fields['billing']['billing_state'] );
    unset( $fields['billing']['billing_address_1'] );
    unset( $fields['billing']['billing_address_2'] );
    unset( $fields['billing']['billing_city'] );
    unset( $fields['billing']['billing_postcode'] );

    // Shipping fields
    unset( $fields['shipping']['shipping_company'] );
    unset( $fields['shipping']['shipping_phone'] );
    unset( $fields['shipping']['shipping_state'] );
    unset( $fields['shipping']['shipping_first_name'] );
    unset( $fields['shipping']['shipping_last_name'] );
    unset( $fields['shipping']['shipping_address_1'] );
    unset( $fields['shipping']['shipping_address_2'] );
    unset( $fields['shipping']['shipping_city'] );
    unset( $fields['shipping']['shipping_postcode'] );

    // Order fields
    unset( $fields['order']['order_comments'] );
  
    return $fields;
}
add_filter( 'woocommerce_checkout_fields', 'js_remove_checkout_fields' );

/* Add GA tracking to the <head> */
add_action('wp_head', 'add_GA_code');
function add_GA_code(){
?>
<!-- Global site tag (gtag.js) - Google Analytics -->
<script async src="https://www.googletagmanager.com/gtag/js?id=G-8TNF1QV2K9"></script>
<script>
  window.dataLayer = window.dataLayer || [];
  function gtag(){dataLayer.push(arguments);}
  gtag('js', new Date());

  gtag('config', 'G-8TNF1QV2K9');
</script>
<?php
};

/* start Woo Commerce updating */

/**
 * @snippet       Change Thank You Page Title
 * @author        Misha Rudrastyh
 * @url           https://rudrastyh.com/woocommerce/thank-you-page.html#change_title
 */
add_filter( 'woocommerce_endpoint_order-received_title', 'misha_thank_you_title' );
 
function misha_thank_you_title( $old_title ){

  return 'THANK YOU FOR YOUR ORDER';

}


add_filter( 'woocommerce_thankyou_order_received_text', 'wpb_thankyou' );
function wpb_thankyou() {
  $added_text = '<img class="thank-you-donation-logo" src="https://i0.wp.com/networkweaver.com/wp-content/uploads/2022/05/show-your-appreciation.png?ssl=1" border="0"><p>Appreciate the free content and resources at Network Weaver? Please <a href="https://network-weaver.raisely.com/" target="_blank">consider making a donation</a> to help us continue developing these materials.</p><div id="raisely-donate" data-campaign-path="network-weaver" data-width="100%" data-height="800"><script src="https://cdn.raisely.com/v3/public/embed.js"></script></div><p class="thankyou">Thank you,</p><p>All contributions will be used in the effort to grow our on-site base of blogs, events, and resources for systems change, expand our outreach, to make Network Weaver more accessible, and fund the emerging Network Weaver BIPOC initiatives</p>';
  return $added_text ;
}