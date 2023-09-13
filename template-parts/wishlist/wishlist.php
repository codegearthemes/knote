<?php
/**
 * Template part for displaying wishlist content
 *
 * @package Knote
 */

$products = isset( $_COOKIE['woocommerce_products__wishlist'] ) ? sanitize_text_field( wp_unslash( $_COOKIE['woocommerce_products__wishlist'] ) ) : false;

if( $products ) :
    $products = explode( ',', $products ); ?>

    <div class="block-wishlist-wrapper woocommerce-cart-form">
        <table class="shop_table shop_table_responsive product-wishlist__table" cellspacing="0">
            <thead>
                <tr>
                    <th class="product-remove">&nbsp;</th>
                    <th class="product-thumbnail">&nbsp;</th>
                    <th class="product-name"><?php esc_html_e( 'Product Name', 'knote-toolkit' ); ?></th>
                    <th class="product-price"><?php esc_html_e( 'Price', 'knote-toolkit' ); ?></th>
                    <th class="product-quantity"><?php esc_html_e( 'Stock Status', 'knote-toolkit' ); ?></th>
                    <th class="product-subtotal">&nbsp;</th>
                </tr>
            </thead>
            <tbody>
                <?php
                foreach ( $products as $product_id ) {
                    $_product = wc_get_product( $product_id );

                    if ( $_product && $_product->exists() ) {
                        $product_permalink = $_product->is_visible() ? $_product->get_permalink() : '';
                        ?>
                        <tr class="knote-toolkit-wishlist-row-item woocommerce-cart-form__cart-item">

                            <td class="product-remove">
                                <?php
                                    // phpcs:ignore WordPress.Security.EscapeOutput.OutputNotEscaped
                                    echo apply_filters(
                                        'knote-toolkit_wishlist_remove_item_button',
                                        sprintf(
                                            '<a href="#" class="knote-toolkit-wishlist-remove-item remove" data-type="remove" aria-label="%s" data-product-id="%s" data-product_sku="%s" data-nonce="%s">&times;</a>',
                                            esc_html__( 'Remove this item', 'knote-toolkit' ),
                                            esc_attr( $product_id ),
                                            esc_attr( $_product->get_sku() ),
                                            esc_attr( wp_create_nonce( 'knote-toolkit-wishlist-nonce' ) )
                                        )
                                    );
                                ?>
                            </td>

                            <td class="product-thumbnail">
                                <?php
                                $thumbnail = $_product->get_image();

                                if ( ! $product_permalink ) {
                                    echo $thumbnail; // phpcs:ignore WordPress.Security.EscapeOutput.OutputNotEscaped
                                } else {
                                    printf( '<a href="%s">%s</a>', esc_url( $product_permalink ), $thumbnail ); // phpcs:ignore WordPress.Security.EscapeOutput.OutputNotEscaped
                                } ?>
                            </td>

                            <td class="product-name" data-title="<?php esc_attr_e( 'Product', 'knote-toolkit' ); ?>">
                                <?php
                                if ( ! $product_permalink ) {
                                    echo wp_kses_post( $_product->get_name() . '&nbsp;' );
                                } else {
                                    echo wp_kses_post( sprintf( '<a href="%s">%s</a>', esc_url( $product_permalink ), $_product->get_name() ) );
                                }

                                do_action( 'knote-toolkit_wishlist_after_item_name', $_product, $product_id ); ?>
                            </td>

                            <td class="product-price" data-title="<?php esc_attr_e( 'Price', 'knote-toolkit' ); ?>">
                                <?php
                                    echo wp_kses_post( wc_price( $_product->get_price() ) );
                                ?>
                            </td>

                            <td class="product-stock" data-title="<?php esc_attr_e( 'Stock', 'knote-toolkit' ); ?>">
                                <?php
                                if ( ! $_product->is_in_stock() ) {
                                    echo apply_filters( 'knote-toolkit_wishlist_out_of_stock', esc_html__( 'Out of Stock', 'knote-toolkit' ) ); // phpcs:ignore WordPress.Security.EscapeOutput.OutputNotEscaped
                                } else {
                                    echo apply_filters( 'knote-toolkit_wishlist_in_stock', esc_html__( 'In Stock', 'knote-toolkit' ) ); // phpcs:ignore WordPress.Security.EscapeOutput.OutputNotEscaped
                                }
                                ?>
                            </td>

                            <td class="product-addtocart" data-title="<?php esc_attr_e( 'Add to Cart', 'knote-toolkit' ); ?>">
                                <?php
                                    switch ( $_product->get_type() ) {
                                        case 'grouped':
                                            $button_class = '';
                                            $button_text  = __( 'View Products', 'knote-toolkit' );
                                            $button_url   = $_product->add_to_cart_url();
                                            break;

                                        case 'variable':
                                            $button_class = '';
                                            $button_text  = __( 'Select Options', 'knote-toolkit' );
                                            $button_url   = $_product->add_to_cart_url();
                                            break;

                                        case 'external':
                                            $button_class = '';
                                            $button_text  = $_product->single_add_to_cart_text();
                                            $button_url   = $_product->add_to_cart_url();
                                            break;

                                        default:
                                            $button_class = 'knote-toolkit-custom-addtocart';
                                            $button_text  = __( 'Add to Cart', 'knote-toolkit' );
                                            $button_url   = $_product->add_to_cart_url();
                                            break;
                                    }
                                    echo '<strong><a href="'. esc_url( $button_url ) .'" class="'. esc_attr( $button_class ) .'" data-product-id="'. absint( $product_id ) .'" data-loading-text="'. esc_attr__( 'Loading...', 'knote-toolkit' ) .'" data-added-text="'. esc_attr__( 'Added!', 'knote-toolkit' ) .'" data-nonce="'. esc_attr( wp_create_nonce( 'knote-toolkit-custom-addtocart-nonce' ) ) .'">'. esc_html( $button_text ) .'</a></strong>';
                                ?>
                            </td>
                        </tr>
                        <?php
                    }
                }
                ?>
            </tbody>
        </table>
        <div class="footer-buttons">
            <a href="<?php echo esc_url( wc_get_cart_url() ); ?>" class="button"><?php echo esc_html__( 'View Cart', 'knote-toolkit' ); ?></a>
        </div>
    </div>

<?php else : ?>

    <div class="knote-toolkit-wishlist-wrapper woocommerce-cart-form">
        <table class="shop_table shop_table_responsive knote-toolkit_wishlist_table empty" cellspacing="0">
            <thead>
                <tr>
                    <th class="product-remove">&nbsp;</th>
                    <th class="product-thumbnail">&nbsp;</th>
                    <th class="product-name"><?php esc_html_e( 'Product Name', 'knote-toolkit' ); ?></th>
                    <th class="product-price"><?php esc_html_e( 'Unit Price', 'knote-toolkit' ); ?></th>
                    <th class="product-quantity"><?php esc_html_e( 'Stock Status', 'knote-toolkit' ); ?></th>
                    <th class="product-subtotal">&nbsp;</th>
                </tr>
            </thead>
            <tbody>
                <tr class="knote-toolkit-wishlist-row-item woocommerce-cart-form__cart-item">
                    <td colspan="6"><?php echo esc_html__( 'No products added to the wishlist', 'knote-toolkit' ); ?></td>
                </tr>
            </tbody>
        </table>
    </div>

<?php endif; ?>
