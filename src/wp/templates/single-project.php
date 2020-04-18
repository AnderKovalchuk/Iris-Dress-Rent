<?php get_header(); ?> 
<?php the_post(); ?>
<main class="project__main">
	<div class="page">
		<section class="sec project__iner">
			<div class="project__image">
				<figure>
                    <img src="<?php the_post_thumbnail_url( 'large' ); ?>" alt="<?php the_title(); ?>">
                </figure>
			</div>
			<div class="project__info">
				<div class="title__iner project__title">
                    <h2 class="title__like-h1"><?php the_title(); ?></h2>
                    <span class="title__separator"></span>
					<p class="title__sub-title">Фотопроект проходит в лучшей фотостудии Киева IN LIGHT для мам с малышами 4-10 мес!</p>
				</div>
				<div class="project__description content-section__content-iner">
                    <?php the_content(); ?>
				</div>
			</div>
        </section>
        
        <?php if( have_rows('pdpp_service_list') ) : ?>
            <section class="sec project__packages">
                <?php while ( have_rows('pdpp_service_list') ) : the_row();?>
                    <div class="project__package">
						<div class="title__iner title__iner--center project__title">
                            <h2 class="title__like-h2">
                                <?php the_sub_field('pdpp_service_name'); ?>
                            </h2>
                            <span class="title__separator"></span>
                            <?php if( $service_subtitle = get_sub_field('pdpp_service_subtitle') ) : ?>
                                <p class="title__sub-title"> 
                                    <?php echo $service_subtitle; ?>
                                </p>
                            <?php endif; ?>
						</div>
						<div class="project__description content-section__content-iner">
                            <?php the_sub_field('pdpp_service_info'); ?>
                        </div>

                        <?php if( $service_price = get_sub_field('pdpp_service_price') ) : ?>
                            <div class="project__price">
                                <p><span>СТОИМОСТЬ: </span> <?php echo $service_price; ?> </p>
                            </div>
                        <?php endif; ?>

						<div class="project__action">
							<button class="btm btm--action">Забронировать</button>
						</div>
                    </div>

                <?php endwhile; ?>
            </section>
        <?php endif; ?>

        <?php if( $images = get_field('pdpp_galery') ) : ?>
        <section class="sec gallery"> 
			<div class="title__iner title__iner--center gallery__title">
				<h2 class="title__like-h1">Фото</h2><span class="title__separator"></span>
            </div>
            <div class="gallery__iner gallery__iner--3">
                <?php foreach( $images as $image_id ) : ?>
                    <figure class="gallery__image">
                        <img src="<?php echo wp_get_attachment_image_url( $image_id,  'large' ); ?>" alt=""/>
                    </figure>
                <?php endforeach; ?>
            </div>
        </section>
        <?php endif; ?>

        


    </div>
</main>

<?php get_footer(); ?>