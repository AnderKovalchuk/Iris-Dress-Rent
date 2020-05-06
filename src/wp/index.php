<?php
/**
 * Главная страница (index.php)
 * @package IrisDress
*/
?>

<?php get_header(); ?> 
<div class="navigation">
    <div class="container">
        <div class="navigation__title">
            <h1> <?php echo esc_html( get_the_title() ); ?> </h1>
        </div>
        <?php dimox_breadcrumbs(); ?>
    </div>
</div>
<main class="page">
    <?php if ( have_posts() ) : while ( have_posts() ) : the_post(); ?>
        <article class="section content-section">
            <header class="title__iner content-section__title">
                <h1 class="title__like-h1 title__like-h1">
                    <?php the_title(); ?>
                </h1>
                <span class="title__separator"></span>
            </header>
            <div class="content-section__content-iner">
                <?php echo the_excerpt(); ?>
            </div>
            <footer class="content-section__footer">
                <a href="<?php the_permalink(); ?>" class="btm btm--action">Читати детальніше</a>
            </footer>
        </article>
    <?php endwhile; endif; ?>
</main>

<?php get_footer(); ?>