<?php get_header(); ?> 
<main class="projects__main">
    <div class="container">
        <div class="title__iner title__iner--center page__title">
            <h2 class="title__like-h1 title__like-h1--uppercase">
            Фотодни и Фотопроекты
            </h2>
            <span class="title__separator"></span>
        </div>
	</div>
	<div class="projects__iner">
        <?php if ( have_posts() ) : while ( have_posts() ) : the_post(); ?>
            <article class="projects__item">
				<div class="projects__description">
					<div class="title__iner content-section__title">
						<h2 class="title__like-h1 title__like-h1--uppercase">
                            <?php the_title(); ?>
                        </h2>
					</div>
						<div class="content-section__content-iner">
							<?php the_excerpt(); ?>
						</div>
						<div class="content-section__footer">
                            <a class="btm btm--service" href="<?php the_permalink(); ?>">Узнать детальее</a>
						</div>
					</div>
					<div class="projects__image">
						<figure><img src="<?php the_post_thumbnail_url( 'large' ); ?>" alt="<?php the_title(); ?>"></figure>
					</div>
				</article>
        <?php endwhile; endif ?>
    </div>
</main>
<?php get_footer(); ?>