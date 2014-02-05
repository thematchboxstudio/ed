<?php
/**
 * Empty cart page
 *
 * @author 		WooThemes
 * @package 	WooCommerce/Templates
 * @version     1.6.4
 */
?>

<p><?php _e('Your cart is currently empty.', 'woocommerce') ?></p>

<?php do_action('woocommerce_cart_is_empty'); ?>

<p><a class="button" href="<?php echo get_site_url(); ?>"><?php _e('&larr; Return To Shop', 'woocommerce') ?></a></p>