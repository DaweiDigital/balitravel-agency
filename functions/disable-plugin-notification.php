<?php


/**
 * Zrušení notifikací k aktualizacím pluginů
 *
 * Zdroj:
 * https://wordpress.stackexchange.com/questions/25358/turn-off-auto-update-for-single-plugin
 * https://wordpress.stackexchange.com/questions/151932/attempt-to-modify-property-of-non-object-warning
 */
// function filter_plugin_updates( $value ) {
// 	$plugins = array(
// 		// 'woocommerce/woocommerce.php',
// 		// 'woocommerce-pdf-invoices-packing-slips/woocommerce-pdf-invoices-packingslips.php',
// 		// 'polylang-pro/polylang.php'
// 	);
// 	foreach( $plugins as $plugin ) {
// 		if ( isset( $value->response[$plugin] ) ) {
// 			unset( $value->response[$plugin] );
// 		}
// 	}
// 	return $value;
// }
// add_filter( 'site_transient_update_plugins', 'filter_plugin_updates' );


/**
 * Disable update notification for plugins
 */
function remove_update_notifications( $value ) {
	if ( isset( $value ) && is_object( $value ) ) {
		// unset( $value->response[ 'woocommerce-pdf-invoices-packing-slips/woocommerce-pdf-invoices-packingslips.php' ] );
		// unset( $value->response[ 'polylang-pro/polylang.php' ] );
		// unset( $value->response[ 'woo-gpwebpay/woo-gpwebpay.php' ] );
	}
	return $value;
}
add_filter( 'site_transient_update_plugins', 'remove_update_notifications' );
