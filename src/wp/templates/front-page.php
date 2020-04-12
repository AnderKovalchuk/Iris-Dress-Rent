<?php get_header(); ?> 

<div class="full-width-banner full-width-banner--header-full-height">
	<figure><img src="<?php echo get_template_directory_uri() ?>/img/home_img.jpg" alt=""></figure>
</div>

<main class="home-page__main">
    <?php the_content(); ?>
</main>

<?php get_footer(); ?>