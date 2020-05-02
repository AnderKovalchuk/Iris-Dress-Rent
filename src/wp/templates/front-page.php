<?php get_header(); ?> 

<!-- <div class="full-width-banner full-width-banner--header-full-height">
	<figure><img src="<?php echo get_template_directory_uri() ?>/img/home_img.jpg" alt=""></figure>
</div> -->

<?php if ( have_posts() ) : while ( have_posts() ) : the_post(); ?>

    <main class="home-page__main">
        <?php echo the_content(); ?>
    </main>
    <article class="container container--small calc">
        <div class="section title__iner title__iner--center">
            <h2 class="title__like-h1 title__like-h1--uppercase">Калькулятор фотосесії</h2><span class="title__separator"></span>
            <p class="title__sub-title">Збери свою унікальну фотосесію </p>
        </div>
        <div class="section calc__iner">
            <div class="calc__package-row">
                <div class="calc__package">
                    <label for="package_1"><span>Light</span> 1 година
                        <input id="package_1" type="radio" name="package" value="light" checked>
                    </label>
                </div>
                <div class="calc__package">
                    <label for="package_2"><span>GOLD</span>  2 година
                        <input id="package_2" type="radio" name="package" value="gold">
                    </label>
                </div>
            </div>
            <section class="calc__price">
                <h3>Ціна </h3>
                <div class="title__separator"></div>
                <p id="price">0</p>
            </section>
            <div class="calc__arguments">
                <div class="calc__argument-row">
                    <label class="calc__checkbox" for="switch-1"> <i class="check"></i><span>Додаткові сукні </span>
                        <input type="checkbox" id="switch-1" data-price="400" data-price-gold="800">
                    </label>
                    <label class="calc__number" for="switch-num"><span class="calc__minuse">-</span>
                        <input type="number" id="switch-num" value="1" min="1" max="20"><span class="calc__pulse">+</span>
                    </label>
                </div>
                <div class="calc__argument-row">
                    <label class="calc__checkbox" for="switch-2"> <i class="check"></i><span>Оренда фотостудії</span>
                        <input type="checkbox" id="switch-2" data-price="700">
                    </label>
                </div>
                <div class="calc__argument-row">
                    <label class="calc__checkbox" for="switch-3"><i class="check"></i><span>Фотограф</span>
                        <input type="checkbox" id="switch-3" data-price="1600" data-price-gold="2500">
                    </label>
                </div>
                <div class="calc__argument-row">
                    <label class="calc__checkbox" for="switch-4"> <i class="check"></i><span>Макіяж</span>
                        <input type="checkbox" id="switch-4" data-price="900">
                    </label>
                </div>
                <div class="calc__argument-row">
                    <label class="calc__checkbox" for="switch-5"><i class="check"></i><span>Укладка</span>
                        <input type="checkbox" id="switch-5" data-price="800">
                    </label>
                </div>
                <div class="calc__argument-row">
                    <label class="calc__checkbox" for="switch-6"><i class="check"></i><span>Додаткова ретуш</span>
                        <input type="checkbox" id="switch-6" data-price="100">
                    </label>
                </div>
                <div class="calc__argument-row">
                    <label class="calc__checkbox" for="switch-7"><i class="check"></i><span>Запис фото на флешку</span>
                        <input type="checkbox" id="switch-7" data-price="250">
                    </label>
                </div>
                <div class="calc__argument-row">
                    <label class="calc__checkbox" for="switch-8"><i class="check"></i><span>Фотокнига</span>
                        <input type="checkbox" id="switch-8" data-price="2500">
                    </label>
                </div>
            </div>
            <div class="calc__action">
                <button class="btm btm--action" onclick="sendCalcBookingPhotoSession()">Забронювати</button>
            </div>
        </div>
    </article>
    <article class="popup" id="calcBookingPhotoSession">
        <div class="popup__iner">
            <div class="popup__title">
                <div class="title__iner">
                    <h3 class="title__like-h2">Забронювати фотосесію</h3><span class="title__separator"></span>
                </div>
                <div class="popup__close"><span>X</span></div>
            </div>
            <div class="popup__content content-section__content-iner">
                <?php echo do_shortcode( '[contact-form-7 id="2266" title="Замовлення з калькулятора"]'); ?>
            </div>
        </div>
    </article>
<?php endwhile; endif; ?>

<?php get_footer(); ?>