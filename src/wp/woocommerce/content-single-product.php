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

/**
 * Hook: woocommerce_before_single_product.
 *
 * @hooked wc_print_notices - 10
 */
do_action( 'woocommerce_before_single_product' );

if ( post_password_required() ) {
	echo get_the_password_form(); // WPCS: XSS ok.
	return;
}
?>

<main class="prodyct__main">
	<div class="page">
		<section class="sec product__iner">
			<div class="product__title">
				<div class="title__iner">
					<h2 class="title__like-h2">
						<?php echo $product->name; ?>
					</h2>
					<span class="title__separator"></span>
				</div>
			</div>
			<div class="product__image">
				<figure>
					<img src="<?php echo wp_get_attachment_image_url( $product->image_id,  'large' ); ?>" alt="">
				</figure>
			</div>
			<div class="product__info">
				<div class="product__description content-section__content-iner">
					<?php the_content(); ?>
				</div>
				
				<div class="product__characteristics">
					<ul>
						<?php foreach ($product->attributes as $product_attribute ): ?>
							<li>
								<span>
									<?php echo wc_attribute_label( $product_attribute[ 'name' ] );?> : 
								</span> 
								<?php echo $product-> get_attribute( $product_attribute[ 'name' ] );  ?>
							</li>
						<?php endforeach; ?>
					</ul>
				</div>
				<div class="product__action">
					<button class="btm btm--action">Забронировать   </button>
				</div>
			</div>
		</section>
		<?php $attachment_ids = $product->gallery_image_ids;
			if ( $attachment_ids ) : ?>	
			<section class="sec gallery"> 
				<div class="title__iner title__iner--center gallery__title">
					<h2 class="title__like-h2">Фото</h2><span class="title__separator"></span>
				</div>
				<div class="gallery__iner gallery__iner--3">
					<?php foreach ( $attachment_ids as $attachment_id ): ?>
						<figure class="gallery__image">
							<img src="<?php echo wp_get_attachment_image_url( $attachment_id,  'large' ); ?>" alt="">
						</figure>
					<?php endforeach; ?>
				</div>
			</section>
		<?php endif; ?>
	</div>
</main>

