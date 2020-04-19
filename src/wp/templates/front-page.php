<?php get_header(); ?> 

<div class="full-width-banner full-width-banner--header-full-height">
	<figure><img src="<?php echo get_template_directory_uri() ?>/img/home_img.jpg" alt=""></figure>
</div>

<?php if ( have_posts() ) : while ( have_posts() ) : the_post(); ?>

    <main class="home-page__main">
        <?php echo the_content(); ?>
    </main>

<?php endwhile; endif; ?>

<?php get_footer(); ?>