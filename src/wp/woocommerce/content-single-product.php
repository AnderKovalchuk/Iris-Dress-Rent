<?php
/**
 * The template for displaying product content in the single-product.php template
 *
 * This template can be overridden by copying it to yourtheme/woocommerce/content-single-product.php.
 *
 * HOWEVER, on occasion WooCommerce will need to update template files and you
 * (the theme developer) will need to copy the new files to your theme to
 * maintain compatibility. We try to do this as little as possible, but it does
 * happen. When this occurs the version of the template file will be bumped and
 * the readme will list any important changes.
 *
 * @see     https://docs.woocommerce.com/document/template-structure/
 * @package WooCommerce/Templates
 * @version 3.6.0
 */

defined( 'ABSPATH' ) || exit;
global $product;
?>
<main class="prodyct__main">
			<section class="container sec product__iner">
				<div class="product__title">
					<div class="title__iner">
						<?php the_title( '<h2 class="title__like-h2">', '</h2>' ); ?>
						<span class="title__separator"></span>
					</div>
				</div>
				<div class="product__image">
					<figure>
						<?php echo $product->get_image( 'large' ); ?>
					</figure>
				</div>
				<div class="product__info">
					<div class="product__description content-section__content-iner">
						<?php echo $product->get_description( ); ?>
					</div>
					<?php if ( true ) : ?>
						<div class="product__characteristics">
							<ul>
								<?php foreach ( $product->$get_attributes() as $product_attribute_key => $product_attribute ) : ?>
									<li>
										<span> 
											<?php echo wp_kses_post( $product_attribute['label'] ); ?> 
										</span>
										<?php echo wp_kses_post( $product_attribute['value'] ); ?>
									</li>
								<?php endforeach; ?>
							</ul>
						</div>
					<?php endif; ?>
					<div class="product__action">
						<button class="btm btm--action">Забронировать   </button>
					</div>
				</div>
			</section>
			<section class="container sec gallery">
				<div class="gallery__title">
					<div class="title__iner title__iner--center">
						<h2 class="title__like-h2">Фото</h2><span class="title__separator"></span>
					</div>
				</div>
				<div class="gallery__iner">
					<div class="gallery__col">
						<figure class="gallery__image"><img src="img/home_img.jpg" alt=""/></figure>
						<figure class="gallery__image"><img src="img/catalog_img_0.jpg" alt=""/></figure>
						<figure class="gallery__image"><img src="img/catalog_img_2.jpg" alt=""/></figure>
						<figure class="gallery__image"><img src="img/catalog_img_1.jpg" alt=""/></figure>
					</div>
					<div class="gallery__col">
						<figure class="gallery__image"><img src="img/catalog_img_3.jpg" alt=""/></figure>
						<figure class="gallery__image"><img src="img/home_img.jpg" alt=""/></figure>
						<figure class="gallery__image"><img src="img/catalog_img_0.jpg" alt=""/></figure>
						<figure class="gallery__image"><img src="img/catalog_img_2.jpg" alt=""/></figure>
					</div>
				</div>
			</section>
		</main>
<?php
/**
 * Hook: woocommerce_before_single_product.
 *
 * @hooked wc_print_notices - 10
 */
//do_action( 'woocommerce_before_single_product' );

if ( post_password_required() ) {
	echo get_the_password_form(); // WPCS: XSS ok.
	return;
}
?>
<div id="product-<?php the_ID(); ?>" <?php wc_product_class( '', $product ); ?>>

	<?php
	/**
	 * Hook: woocommerce_before_single_product_summary.
	 *
	 * @hooked woocommerce_show_product_sale_flash - 10
	 * @hooked woocommerce_show_product_images - 20
	 */
	do_action( 'woocommerce_before_single_product_summary' );
	?>

	<div class="summary entry-summary">
		<?php
		/**
		 * Hook: woocommerce_single_product_summary.
		 *
		 * @hooked woocommerce_template_single_title - 5
		 * @hooked woocommerce_template_single_rating - 10
		 * @hooked woocommerce_template_single_price - 10
		 * @hooked woocommerce_template_single_excerpt - 20
		 * @hooked woocommerce_template_single_add_to_cart - 30
		 * @hooked woocommerce_template_single_meta - 40
		 * @hooked woocommerce_template_single_sharing - 50
		 * @hooked WC_Structured_Data::generate_product_data() - 60
		 */
		do_action( 'woocommerce_single_product_summary' );
		?>
	</div>

	<?php
	/**
	 * Hook: woocommerce_after_single_product_summary.
	 *
	 * @hooked woocommerce_output_product_data_tabs - 10
	 * @hooked woocommerce_upsell_display - 15
	 * @hooked woocommerce_output_related_products - 20
	 */
	do_action( 'woocommerce_after_single_product_summary' );
	?>
</div>

<?php do_action( 'woocommerce_after_single_product' ); ?>
