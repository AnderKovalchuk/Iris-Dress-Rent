<?php get_header(); ?> 
<div class="navigation">
    <div class="container">
        <div class="navigation__title">
            <h1> <?php echo esc_html( get_the_title() ); ?> </h1>
        </div>
        <?php dimox_breadcrumbs(); ?>
    </div>
</div>
<?php the_post(); ?>
<main class="project__main">
    <div class="container--small">
        <section class="section project__iner">
            <div class="project__image">
                <figure>
                    <img src="<?php the_post_thumbnail_url( 'large' ); ?>" alt="<?php the_title(); ?>">
                </figure>
            </div>
            <div class="project__info">
                <div class="title__iner project__title">
                    <h1 class="title__like-h1">
                        <?php the_title(); ?>
                    </h1>
                    <span class="title__separator"></span>
                    <?php if( $subTitle = get_field('pdpp_sub_title') ) : ?>
                        <p class="title__sub-title">
                            <?php echo $subTitle; ?>
                        </p>
                    <?php endif; ?>
                </div>
                <div class="project__description content-section__content-iner">
                    <?php the_content(); ?>
                </div>
                <div class="project__action">
                    <a class="btm btm--action" href="#packages">Забронювати</a>
                    <a class="popup__open popup__open btm btm--service"  onclick="toggleInfoPopup('infoPopup')">Умови бронювання</a>
                </div>
            </div>
        </section>
        <?php if( $video = get_field('pdpp_video') ) : ?>
            <section class="section project__video">
                <div class="title__iner title__iner--center project__title">
                    <h2 class="title__like-h2">Відео</h2><span class="title__separator"></span>
                </div>
                <iframe src="<?php echo $video; ?>" allow="accelerometer; autoplay; encrypted-media; gyroscope; picture-in-picture" allowfullscreen></iframe>
            </section>
        <?php endif; ?>

        <?php if( $images = get_field('pdpp_galery') ) : ?>
            <section class="section gallery"> 
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

    <?php if( have_rows('pdpp_service_list') ) : ?>
        <section class="container container--highlighted" id="packages">
            <div class="section project__packages">
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
                                <p><span>Вартість: </span> <?php echo $service_price; ?> </p>
                            </div>
                        <?php endif; ?>

                        <div class="project__action">
                            <button class="btm btm--action"
                                onclick="openPopup('<?php echo the_title() . ' Пакет: ' . get_sub_field('pdpp_service_name'); ?>')">
                                Забронювати
                            </button>
                        </div>
                    </div>
                <?php endwhile; ?>
            </div>
        </section>
    <?php endif; ?>
</main>
<div class="popup" id="infoPopup">
    <div class="popup__iner">
        <div class="popup__title">
            <div class="title__iner">
                <h3 class="title__like-h2">Умови бронювання</h3><span class="title__separator"></span>
            </div><a class="popup__close" href="#cloce">X</a>
        </div>
        <div class="popup__content content-section__content-iner"> 
            <?php the_field('iris-add-info-project-text', 'option'); ?>
        </div>
    </div>
</div>
<script>
    function openPopup(name) {
        document.getElementById('iris-project-name').value = name;
        document.getElementById('iris-project').classList.toggle('popup--active');
        document.body.classList.toggle('body--hidden');
   }
   function closePopup(){
        document.getElementById('iris-project').classList.toggle('popup--active');
        document.body.classList.toggle('body--hidden');
   }
</script>
<div class="popup" id="iris-project">
    <div class="popup__iner">
        <div class="popup__title">
            <div class="title__iner">
                <h3 class="title__like-h2">Забронировать фотосессию </h3><span class="title__separator"></span>
            </div><a class="popup__close" href="#cloce" onclick="closePopup()">X</a>
        </div>
        <div class="popup__content content-section__content-iner"> 
            <?php echo do_shortcode( '[contact-form-7 id="1437" title="Заказ фотосессии"]'); ?>
        </div>
    </div>
</div>

<?php get_footer(); ?>