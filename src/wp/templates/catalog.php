<?php
/*
Template Name: Каталог
*/

$prod_cat_args = array(
    'taxonomy'    => 'product_cat',
    'orderby'     => 'id', // здесь по какому полю сортировать
    'hide_empty'  => false, // скрывать категории без товаров или нет
    'parent'      => 0 // id родительской категории
);
$woo_categories = get_categories( $prod_cat_args );
?>

<?php get_header(); ?> 

<main class="category__main">
	<div class="page">
		<div class="title__iner title__iner--center page__title">
			<h2 class="title__like-h1 title__like-h1--uppercase">
                <?php echo esc_html( get_the_title() ); ?>
            </h2>
            <span class="title__separator"></span>
        </div>
        <div class="category__iner">
            <?php foreach ( $woo_categories as $woo_cat ) : ?>
                <div class="cart__iner">
                    <a href="<?php echo get_term_link( $woo_cat->term_id, 'product_cat' ); ?>">

                        <?php 
                            $category_thumbnail_id = get_term_meta(
                                $woo_cat->term_id, 'thumbnail_id', true); ?>

                        <figure class="cart__image cart__image--not-bottom-radius">
                            <img 
                                src="<?php echo wp_get_attachment_image_url( $category_thumbnail_id,  'large' ); ?>" 
                                alt="<?php echo $woo_cat->name; ?>">
                        </figure>
                        <h3 class="cart__title"> <?php echo $woo_cat->name; ?> </h3>
                    </a>
                </div>
            <?php endforeach; ?>
        </div>
    </div>
</main>
        
<?php get_footer(); ?>