<?php
/**
 * The Template for displaying product archives, including the main shop page which is a post type archive
 *
 * This template can be overridden by copying it to yourtheme/woocommerce/archive-product.php.
 *
 * HOWEVER, on occasion WooCommerce will need to update template files and you
 * (the theme developer) will need to copy the new files to your theme to
 * maintain compatibility. We try to do this as little as possible, but it does
 * happen. When this occurs the version of the template file will be bumped and
 * the readme will list any important changes.
 *
 * @see https://docs.woocommerce.com/document/template-structure/
 * @package WooCommerce/Templates
 * @version 3.4.0
 */

defined( 'ABSPATH' ) || exit;

get_header( 'shop' );

?>
<section class="catalog__main">
	<div class="container sec">
		<div class="title__iner title__iner--center">
			<h2 class="title__like-h1 title__like-h1--uppercase">
				<?php woocommerce_page_title(); ?>
			</h2>
			<span class="title__separator"></span>
		</div>
		<?php do_action( 'woocommerce_archive_description' ); ?>
	</div>
<?php
if ( woocommerce_product_loop() ) {
	if ( wc_get_loop_prop( 'total' ) ) { ?>
		<div class="container catalog__iner">
			<?php while ( have_posts() ) { the_post(); ?>
				<div class="cart__iner">
					<a href="<?php echo  $product->get_permalink( ); ?>">
						<figure class="cart__image">
							<?php echo $product->get_image( 'large' ); ?>
							<img src="img/catalog_img_1.jpg" alt=""/>
						</figure>
					</a>
				</div>
			
			<?php } ?>
		</div>
	<?php
	}
} else {
	/**
	 * Hook: woocommerce_no_products_found.
	 *
	 * @hooked wc_no_products_found - 10
	 */
	do_action( 'woocommerce_no_products_found' );
}

get_footer( 'shop' );
