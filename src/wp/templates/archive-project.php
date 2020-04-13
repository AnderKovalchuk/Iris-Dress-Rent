<?php get_header(); ?> 

<main class="category__main">
    <div class="container sec">
        <div class="title__iner title__iner--center">
            <h2 class="title__like-h1 title__like-h1--uppercase">Фотодни и Фотопроекты</h2>
            <span class="title__separator"></span>
		</div>
    </div>
        <?php 
        $num = 0;
        if ( have_posts() ) : while ( have_posts() ) : the_post();
            if( ++$num & 1 ): ?>
                <article class="container sec--full-height">
                    <div class="grid__iner grid__iner--sitebar-left">
                        <div class="grid__col grid__col--m-center grid__col--equal-height">
                            <div class="title__iner content-section__title">
                                <h2 class="title__like-h1 title__like-h1--uppercase">
                                    <?php the_title(); ?>
                                </h2>
                            </div>
                            <div class="content-section__content-iner">
                                <?php the_excerpt(); ?>
                            </div>
                            <div class="content-section__footer"><a class="btm btm--service" href="<?php the_permalink(); ?>">Узнать детальее</a>
                            </div>
                        </div>
                        <div class="grid__col grid__col--equal-height content-section__image-iner">
                            <figure><img src="<?php the_post_thumbnail_url( 'large' ); ?>" alt=""></figure>
                        </div>
                    </div>
                </article>
            <?php else: ?>
                <article class="sec sec--full-height sec--highlighted">
                    <div class="container">
                        <div class="grid__iner grid__iner--sitebar-right">
                            <div class="grid__col grid__col--equal-height content-section__image-iner">
                                <figure><img src="<?php the_post_thumbnail_url( 'large' ); ?>" alt=""></figure>
                            </div>
                            <div class="grid__col grid__col--m-first grid__col--m-center grid__col--equal-height">
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
                            </div>
                        </div>
                    </div>
                </article>
            <?php endif; ?>
        <?php endwhile; else: ?>
	        Записей нет.
        <?php endif; ?>

        <div class="container">
            <?php //the_content(); ?>
        </div>
    </section>
</main>
<?php get_footer(); ?>