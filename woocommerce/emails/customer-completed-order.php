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
 * @package WooCommerce\Templates\Emails
 * @version 3.7.0
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
<p><?php _e( "<a href='https://network-weaver.raisely.com/' style='color:#A25C82;'>Please consider donating</a> to help us continue to offer free content <strong class='#A25C82'>to all</strong> – in support of equity, justice and transformation <strong class='color:#A25C82;'>for all</strong>." ); ?></p>
<table width="100%" style="width:100%;">
    <tr>
        <td align="center">
            <a href="https://mailchi.mp/07f564e9b842/network-weaver-newsletter"><img src="https://networkweaver.com/wp-content/uploads/2022/07/donate-new.png" alt="" width="274" style="width:274px;"></a>
        </td>
    </tr>
</table>
<p><?php _e( 'If you haven’t already done so, sign up for Network Weaver’s newsletter to receive fresh resources and opportunities in your inbox every week.
', 'woocommerce' ); ?></p>
<p><?php _e( 'Check out our newsletter <a href="https://mailchi.mp/07f564e9b842/network-weaver-newsletter">HERE</a>.  Subscribe <a href="https://networkweaver.us16.list-manage.com/subscribe?u=246fc4c8c6d22cb445b3f0a7a&id=646e892a9c">via this link</a>.', 'woocommerce' ); ?></p>


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

/**
 * Show user-defined additional content - this is set in each email's settings.
 */
if ( $additional_content ) {
	echo wp_kses_post( wpautop( wptexturize( $additional_content ) ) );
}

?>
<p>
    <?php _e('Best,<br> June Holley'); ?>
</p>

<?php

/*
 * @hooked WC_Emails::email_footer() Output the email footer
 */
do_action( 'woocommerce_email_footer', $email );
