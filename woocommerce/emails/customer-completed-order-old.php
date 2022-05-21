<?php
/**
 * Customer completed order email
 *
 * This template can be overridden by copying it to yourtheme/woocommerce/emails/customer-completed-order.php.
 *
 * HOWEVER, on occasion WooCommerce will need to update template files and you
 * (the theme developer) will need to copy the new files to your theme to
 * maintain compatibility. We try to do this as little as possible, but it does
 * happen. When this occurs the version of the template file will be bumped and
 * the readme will list any important changes.
 *
 * @see https://docs.woocommerce.com/document/template-structure/
 * @package WooCommerce/Templates/Emails
 * @version 3.5.0
 */

if ( ! defined( 'ABSPATH' ) ) {
	exit;
}

/*
 * @hooked WC_Emails::email_header() Output the email header
 */
do_action( 'woocommerce_email_header', $email_heading, $email ); ?>

<?php /* translators: %s: Customer first name */ ?>
<p><?php printf( esc_html__( 'Hi %s,', 'woocommerce' ), esc_html( $order->get_billing_first_name() ) ); ?></p>
<?php /* translators: %s: Site title */ ?>
<p><?php esc_html_e( 'Thank you for downloading a Network Weaver resource.', 'woocommerce' ); ?></p>
<p><?php _e( "If you haven't already done so, please sign up for our weekly newsletter for more tools, insights, inspirations and connections for your network. <strong>Every other issues offers a free resource!</strong>", 'woocommerce' ); ?></p>
<p><?php _e( 'Check out our newsletter <a href="https://mailchi.mp/07f564e9b842/network-weaver-newsletter">HERE</a>.  Subscribe <a href="https://networkweaver.us16.list-manage.com/subscribe?u=246fc4c8c6d22cb445b3f0a7a&id=646e892a9c">via this link</a>.', 'woocommerce' ); ?></p>

<table width="100%" style="width:100%;">
	<tr>
		<td align="center">
			<table width="300" style="width: 300px;-webkit-box-shadow: 2px 2px 12px 6px rgba(0,0,0,.1);box-shadow: 2px 2px 12px 6px rgba(0,0,0,.1);">
				<tr>
					<td> <a href="https://mailchi.mp/07f564e9b842/network-weaver-newsletter"><img src="https://networkweaver.com/wp-content/uploads/2018/04/nw_logo-header.png" alt="" width="300" style="width:300px;"></a> </td>
				</tr>
				<tr>
					<td><a class='image' href="https://mailchi.mp/07f564e9b842/network-weaver-newsletter"><img src='https://networkweaver.com/wp-content/uploads/2019/07/woo-email-image.jpg' style='width:300px;' width='300'></a></td>
				</tr>
			</table>
		</td>
	</tr>
</table>

<?php

/*
 * @hooked WC_Emails::order_details() Shows the order details table.
 * @hooked WC_Structured_Data::generate_order_data() Generates structured data.
 * @hooked WC_Structured_Data::output_structured_data() Outputs structured data.
 * @since 2.5.0
 */
do_action( 'woocommerce_email_order_details', $order, $sent_to_admin, $plain_text, $email );

/*
 * @hooked WC_Emails::order_meta() Shows order meta data.
 */
do_action( 'woocommerce_email_order_meta', $order, $sent_to_admin, $plain_text, $email );

/*
 * @hooked WC_Emails::customer_details() Shows customer details
 * @hooked WC_Emails::email_address() Shows email address
 */
do_action( 'woocommerce_email_customer_details', $order, $sent_to_admin, $plain_text, $email );

?>
<p>
	<?php _e('Best,<br> June Holley'); ?>
</p>
<p>
<em>
<?php _e( 'p.s. If you need assistance in your network building efforts, our site includes the resumes of <a href="https://networkweaver.com/category/team/">over 50 consultants</a> with experience in a wide range of network processes.', 'woocommerce' ); ?>
</em>
</p>
<?php

/*
 * @hooked WC_Emails::email_footer() Output the email footer
 */
do_action( 'woocommerce_email_footer', $email );
