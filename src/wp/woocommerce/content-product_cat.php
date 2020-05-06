<?php
/**
 * The template for displaying product category thumbnails within loops
 *
 * This template can be overridden by copying it to yourtheme/woocommerce/content-product_cat.php.
 *
 * HOWEVER, on occasion WooCommerce will need to update template files and you
 * (the theme developer) will need to copy the new files to your theme to
 * maintain compatibility. We try to do this as little as possible, but it does
 * happen. When this occurs the version of the template file will be bumped and
 * the readme will list any important changes.
 *
 * @see     https://docs.woocommerce.com/document/template-structure/
 * @package WooCommerce/Templates
 * @version 2.6.1
 */

if ( ! defined( 'ABSPATH' ) ) {
	exit;
}
?>
<div class="cart__iner">
	<a href="<?php echo get_term_link( $category->term_id, 'product_cat' ); ?>">

		<?php 
			$category_thumbnail_id = get_term_meta(
				$category->term_id, 'thumbnail_id', true); ?>

		<figure class="cart__image cart__image--not-bottom-radius">
			<img 
				src="<?php echo wp_get_attachment_image_url( $category_thumbnail_id,  'large' ); ?>" 
				alt="<?php echo $category->name; ?>">
		</figure>
		<h3 class="cart__title"> <?php echo $category->name; ?> </h3>
	</a>
</div>