<?php
/**
 * Cart Page
 *
 * This template can be overridden by copying it to yourtheme/woocommerce/cart/cart.php.
 *
 * HOWEVER, on occasion WooCommerce will need to update template files and you
 * (the theme developer) will need to copy the new files to your theme to
 * maintain compatibility. We try to do this as little as possible, but it does
 * happen. When this occurs the version of the template file will be bumped and
 * the readme will list any important changes.
 *
 * @see     http://docs.woothemes.com/document/template-structure/
 * @author  WooThemes
 * @package WooCommerce/Templates
 * @version 2.3.8
 */

if ( ! defined( 'ABSPATH' ) ) {
	exit; // Exit if accessed directly
}

wc_print_notices();

do_action( 'woocommerce_before_cart' ); ?>

<form action="<?php echo esc_url( wc_get_cart_url() ); ?>" method="post">

<?php do_action( 'woocommerce_before_cart_table' ); ?>

<table class="shop_table shop_table_responsive cart" cellspacing="0">
	<thead>
		<tr>
			<th class="product-thumbnail">&nbsp;</th>
			<th class="product-name"><?php _e( 'Product', 'woocommerce' ); ?></th>
			<th class="product-quantity"><?php _e( 'Quantity', 'woocommerce' ); ?></th>
			<th class="product-price"><?php _e( 'Preço unitário', 'odin' ); ?></th>
			<th class="product-subtotal"><?php _e( 'Preço total', 'odin' ); ?></th>
			<th class="product-remove">&nbsp;</th>
		</tr>
	</thead>
	<tbody>
		<?php do_action( 'woocommerce_before_cart_contents' ); ?>
		<?php
		foreach ( WC()->cart->get_cart() as $cart_item_key => $cart_item ) {
			if ( isset( $cart_item['bundled_by'] ) ) {
				continue;
			}

			$_product   = apply_filters( 'woocommerce_cart_item_product', $cart_item['data'], $cart_item, $cart_item_key );

			$product_id = apply_filters( 'woocommerce_cart_item_product_id', $cart_item['product_id'], $cart_item, $cart_item_key );

			if ( $_product && $_product->exists() && $cart_item['quantity'] > 0 && apply_filters( 'woocommerce_cart_item_visible', true, $cart_item, $cart_item_key ) ) {
				$product_permalink = apply_filters( 'woocommerce_cart_item_permalink', $_product->is_visible() ? $_product->get_permalink( $cart_item ) : '', $cart_item, $cart_item_key );
				?>
				<tr class="<?php echo esc_attr( apply_filters( 'woocommerce_cart_item_class', 'cart_item', $cart_item, $cart_item_key ) ); ?>">

					<td class="product-thumbnail">
						<?php
							echo get_the_post_thumbnail( $_product->id, 'thumbnail' );
						?>
					</td>

					<td class="product-name" data-title="<?php _e( 'Product', 'woocommerce' ); ?>">
						<?php
							if ( ! $product_permalink ) {
								echo apply_filters( 'woocommerce_cart_item_name', $_product->get_title(), $cart_item, $cart_item_key ) . '&nbsp;';
							} else {
								echo apply_filters( 'woocommerce_cart_item_name', sprintf( '<a href="%s">%s</a>', esc_url( $product_permalink ), $_product->get_title() ), $cart_item, $cart_item_key );
							}

							// Meta data
							echo WC()->cart->get_item_data( $cart_item );?>

							<?php if ( $_product->product_type == 'yith_bundle' ) : ?>
								<div class="bundle-items">
									<?php $i = 0;?>
									<?php $item = '';?>
									<?php foreach( $_product->bundle_data as $bundle_item ) : ?>
										<?php if ( $i == 0 ) : ?>
											<?php $item .= get_the_title( $bundle_item[ 'product_id' ] );?>
										<?php else : ?>
											<?php $item .= ', ' . get_the_title( $bundle_item[ 'product_id' ] );?>
										<?php endif;?>
										<?php $i++;?>
									<?php endforeach;?>
									<?php echo $item;?>
								</div><!-- .bundle-items -->
							<?php endif;?>
							<?php
							// Backorder notification
							if ( $_product->backorders_require_notification() && $_product->is_on_backorder( $cart_item['quantity'] ) ) {
								echo '<p class="backorder_notification">' . esc_html__( 'Available on backorder', 'woocommerce' ) . '</p>';
							}
						?>
					</td>

					<td class="product-quantity" data-title="<?php _e( 'Quantity', 'woocommerce' ); ?>">
						<?php
							if ( $_product->is_sold_individually() ) {
								$product_quantity = sprintf( '1 <input type="hidden" name="cart[%s][qty]" value="1" />', $cart_item_key );
							} else {
								printf( '<select name="%s">', "cart[{$cart_item_key}][qty]" );
								if ( wp_is_mobile() ) {
									$max_value = 31;
								} else {
									$max_value = 500;
								}
								for ( $i = 1; $i < $max_value; $i++ ) {
									if ( (int) $cart_item['quantity'] === $i ) {
										printf( '<option value="%s" selected>%s</option>', $i, $i );
									} else {
										printf( '<option value="%s">%s</option>', $i, $i );
									}
								}
								echo '</select>';
							}
						?>
						<div class="buttons-qty">
							<span>+</span>
 							<input data-id="<?php echo "cart[{$cart_item_key}][qty]";?>" type="text" value="<?php echo esc_attr( $cart_item['quantity'] );?>" />
 							<span>-</span>
						</div><!-- .buttons-qty -->

					</td>
					<td class="product-price" data-title="<?php _e( 'Price', 'woocommerce' ); ?>">
						<?php
							echo apply_filters( 'woocommerce_cart_item_price', WC()->cart->get_product_price( $_product ), $cart_item, $cart_item_key );
						?>
					</td>
					<td class="product-subtotal" data-title="<?php _e( 'Total', 'woocommerce' ); ?>">
						<?php
							echo apply_filters( 'woocommerce_cart_item_subtotal', WC()->cart->get_product_subtotal( $_product, $cart_item['quantity'] ), $cart_item, $cart_item_key );
						?>
					</td>
					<td class="product-remove">
						<?php
							echo apply_filters( 'woocommerce_cart_item_remove_link', sprintf(
								'<a href="%s" class="remove" title="%s" data-title="%s" data-product_id="%s" data-product_sku="%s">(x)</a>',
								esc_url( WC()->cart->get_remove_url( $cart_item_key ) ),
								__( 'Remove this item', 'woocommerce' ),
								__( 'Remove this item', 'woocommerce' ),
								esc_attr( $product_id ),
								esc_attr( $_product->get_sku() )
							), $cart_item_key );
						?>
					</td>
				</tr>
				<?php
			}
		}

		do_action( 'woocommerce_cart_contents' );
		?>
		<?php do_action( 'woocommerce_cart_actions' ); ?>
		<?php wp_nonce_field( 'woocommerce-cart' ); ?>

		<?php do_action( 'woocommerce_after_cart_contents' ); ?>
	</tbody>
</table>
<div class="col-md-4 cart-coupon pull-left">
		<?php if ( wc_coupons_enabled() ) { ?>
			<label for="coupon_code" class="col-md-12">
				<?php _e( 'Cupom de desconto', 'odin' );?>
			</label>
			<div class="col-md-12">
				<input type="text" name="coupon_code" class="input-text" id="coupon_code" value="" placeholder="<?php esc_attr_e( 'Coupon code', 'woocommerce' ); ?>" /> <input type="submit" class="button" name="apply_coupon" value="<?php esc_attr_e( 'OK', 'odin' ); ?>" />
			</div><!-- .col-md-12 -->
			<?php do_action( 'woocommerce_cart_coupon' ); ?>
		<?php } ?>
</div><!-- .col-md-4 cart-coupon -->

<?php do_action( 'woocommerce_after_cart_table' ); ?>

<div class="cart-collaterals">

	<?php do_action( 'woocommerce_cart_collaterals' ); ?>

</div>

<?php do_action( 'woocommerce_after_cart' ); ?>
</form>
