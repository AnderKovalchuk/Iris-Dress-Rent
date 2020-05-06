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
	<div class="page" itemscope itemtype="http://schema.org/Product">
		<meta itemprop="sku" content="<?php echo $product->sku; ?>">
		<section class="section product__iner">
			<div class="product__mob-title">
				<div class="title__iner title__iner--center">
					<h3 class="title__like-h1" itemprop="name">
						<?php echo $product->name; ?>
					</h3>
					<span class="title__separator"></span>
				</div>
			</div>
			<div class="product__image">
				<figure>
					<img src="<?php echo wp_get_attachment_image_url( $product->image_id,  'large' ); ?>" alt="<?php echo "Фотографія сукні" + $product->name; ?>"  itemprop="image" >
				</figure>
			</div>
			<div class="product__info">
				<div class="product__title">
					<div class="title__iner">
						<h1 class="title__like-h2">
							<?php echo $product->name; ?>
						</h1>
						<span class="title__separator"></span>
					</div>
				</div>
				<div class="product__description content-section__content-iner"  itemprop="description">
					<?php the_content(); ?>
				</div>
				<div class="product__characteristics">
					<ul>
						<?php foreach ($product->attributes as $product_attribute ): ?>
							<li>
								<span>
									<?php echo wc_attribute_label( $product_attribute[ 'name' ] );?> : 
								</span> 
								<?php echo $product->get_attribute( $product_attribute[ 'name' ] );  ?>
							</li>
						<?php endforeach; ?>
						<li itemprop="offers" itemscope itemtype="http://schema.org/Offer"><span>Вартість: </span>
							<meta itemprop="priceCurrency" content="UAH">
							<meta itemprop="price" content="<?php echo $product->price; ?>">
							<?php echo $product->price . ' ' . get_option('woocommerce_currency'); ?>
							<link itemprop="availability" href="http://schema.org/InStock"> 
						</li>
					</ul>
				</div>
				<div class="product__action">
					<?php echo awooc_html_custom_add_to_cart(); ?>
					<!-- <button class="btm btm--action">Забронировать</button> -->
					<button class="popup__open btm btm--service" onclick="toggleInfoPopup('infoPopup')">Як забронювати?</button>
				</div>
			</div>
			<link itemprop="url" href = "<?php echo get_permalink( $product->ID ); ?>">
		</section>

		<?php $attachment_ids = $product->gallery_image_ids;
			if ( $attachment_ids ) : ?>	
			<section class="section gallery"> 
				<div class="title__iner title__iner--center gallery__title">
					<h2 class="title__like-h2">Фото</h2><span class="title__separator"></span>
				</div>

				<div class="gallery__popup">
            		<span class="gallery__close">X</span><img src="" alt="" >
				</div>
				
				<div class="gallery__iner gallery__iner--3">
					<?php foreach ( $attachment_ids as $attachment_id ): ?>
						<figure class="gallery__image">
							<a href="<?php echo wp_get_attachment_image_url( $attachment_id,  'full' ); ?>">
								<img src="<?php echo wp_get_attachment_image_url( $attachment_id,  'large' ); ?>" alt="">
							</a>
						</figure>
					<?php endforeach; ?>
				</div>
			</section>
		<?php endif; ?>
	</div>
</main>

<div class="popup" id="infoPopup">
	<div class="popup__iner">
		<div class="popup__title">
			<div class="title__iner">
				<h3 class="title__like-h2">Умови бронювання суконь</h3><span class="title__separator"></span>
			</div><a class="popup__close" href="#cloce">X</a>
		</div>
		<div class="popup__content content-section__content-iner">   
			<?php the_field('iris-add-info-dress-text', 'option'); ?>
		</div>
	</div>
</div>
