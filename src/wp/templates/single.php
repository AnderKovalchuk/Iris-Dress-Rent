<?php get_header(); ?> 

<div class="navigation">
    <div class="container">
        <div class="navigation__title">
            <h1> <?php echo esc_html( get_the_title() ); ?> </h1>
        </div>
        <?php dimox_breadcrumbs(); ?>
    </div>
</div>

<?php if ( have_posts() ) : while ( have_posts() ) : the_post(); ?>
    <main class="page">
        
        <div class="title__iner title__iner--center page__title">
            <h2 class="title__like-h1 title__like-h1">
                <?php echo esc_html( get_the_title() ); ?>
            </h2>
            <span class="title__separator"></span>
		</div>
        <div class="content-section__content-iner">
            <?php echo the_content(); ?>
        </div>
    </main>
<?php endwhile; else: ?>
	Записей нет.
<?php endif; ?>




<?php get_footer(); ?>