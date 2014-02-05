<?php
/**
 * Loop Price
 *
 * @author 		WooThemes
 * @package 	WooCommerce/Templates
 * @version     1.6.4
 */

global $product;
?>

<?php if ($price_html = $product->get_price_html()) : ?>
	<p class="starting-at">Starting at <span class="price"><?php echo $price_html; ?></span>
	<p class="customize">Customize this Card &raquo;</p>
<?php endif; ?>