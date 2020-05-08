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
                <div class="calc__package-title">
                    <h3>Вибери тариф</h3>
                </div>
                <div class="calc__package">
                    <label for="package_1"> 
                        <i class="check"></i>
                        <p>Light <span>(1 година)</span></p>
                        <input id="package_1" type="radio" name="package" value="light" checked>
                    </label>
                </div>
                <div class="calc__package">
                    <label for="package_2">
                        <i class="check"></i>
                        <p>GOLD <span>(2 години)</span></p>
                        <input id="package_2" type="radio" name="package" value="gold">
                    </label>
                </div>
            </div>
            <div class="calc__arguments">
                <div class="calc__argument-row">
                    <div class="calc__argument-item">
                        <label class="calc__checkbox" for="switch-1"> <i class="check"></i><span>Додаткові сукні </span>
                            <input type="checkbox" id="switch-1" data-price="400" data-price-gold="800">
                        </label>
                    </div>
                    <div class="calc__argument-item calc__argument-item--help">
                        <label class="calc__number" for="switch-num"><span class="calc__minuse">-</span>
                            <input type="number" id="switch-num" value="1" min="1" max="20"><span class="calc__pulse">+</span>
                        </label>
                    </div>
                </div>
                <div class="calc__argument-row">
                    <div class="calc__argument-item">
                        <label class="calc__checkbox" for="switch-2"> <i class="check"></i><span>Оренда фотостудії</span>
                            <input type="checkbox" id="switch-2" data-price="700">
                        </label>
                        <div class="calc__info">
                            <div class="calc__info-icon">i</div>
                            <div class="calc__info-block">
                                <p>Включає в себе послуги з пошуку, підбору, бронювання та оплати необхідних локацій.</p>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="calc__argument-row">
                    <div class="calc__argument-item">
                        <label class="calc__checkbox" for="switch-3"><i class="check"></i><span>Фотограф</span>
                            <input type="checkbox" id="switch-3" data-price="1600" data-price-gold="2500">
                        </label>
                        <div class="calc__info">
                            <div class="calc__info-icon">i</div>
                            <div class="calc__info-block">
                                <p>Включає в себе складання попереднього плану зйомки, узгодження всіх образів</p>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="calc__argument-row">
                    <div class="calc__argument-item">
                        <label class="calc__checkbox" for="switch-4"> <i class="check"></i><span>Макіяж</span>
                            <input type="checkbox" id="switch-4" data-price="800">
                        </label>
                        <div class="calc__info">
                            <div class="calc__info-icon">i</div>
                            <div class="calc__info-block">
                                <p>Ти отримаєш 1 повноцінний Make up для фотосесії. У послугу врахована вартість гримерного місця при фотосесії і планування образу.</p>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="calc__argument-row">
                    <div class="calc__argument-item">
                        <label class="calc__checkbox" for="switch-5"><i class="check"></i><span>Укладка від стиліста</span>
                            <input type="checkbox" id="switch-5" data-price="700">
                        </label>
                        <div class="calc__info">
                            <div class="calc__info-icon">i</div>
                            <div class="calc__info-block">
                                <p>Тобі зроблять 1 повноцінну укладку волосся для фотосесії. У вартість враховані всі витратні матеріали майстра, послуги самого фахівця, оренда гримерного місця і планування образу.</p>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="calc__argument-row">
                    <div class="calc__argument-item">
                        <label class="calc__checkbox" for="switch-6"><i class="check"></i><span>Фірмова флешка</span>
                            <input type="checkbox" id="switch-6" data-price="250">
                        </label>
                        <div class="calc__info">
                            <div class="calc__info-icon">i</div>
                            <div class="calc__info-block">
                                <p>Всі твої фото зі зйомки будуть на нашій брендовій флешці розміром 1Гб</p>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="calc__argument-row">
                    <div class="calc__argument-item">
                        <label class="calc__checkbox" for="switch-7"><i class="check"></i><span>Фотокнига</span>
                            <input type="checkbox" id="switch-7" data-price="2500">
                        </label>
                        <div class="calc__info">
                            <div class="calc__info-icon">i</div>
                            <div class="calc__info-block">
                                <p>Розмір 25*25, 15 розворотів. Обкладинка може бути з тканини або ж з іншого матеріалу, сюди входить компонування фотокниги та її верстка нашим фотографом. Термін виготовлення до 3 тижнів. Передача з рук в руки або відправка поштою.</p>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="calc__argument-row">
                    <div class="calc__argument-item">
                        <label class="calc__checkbox" for="switch-8"><i class="check"></i><span>Конфіденційність зйомки</span>
                            <input type="checkbox" id="switch-8" data-price="1000">
                        </label>
                        <div class="calc__info">
                            <div class="calc__info-icon">i</div>
                            <div class="calc__info-block">
                                <p>Якщо ти хочеш аби твої фото не публікувалися у нашому каталозі та на сторінках наших соціальних мереж.</p>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <section class="calc__price">
                <p id="price">0</p>
                <div class="title__separator"></div>
                <h3>1 Сукня</h3>
            </section>
            <div class="calc__addition-arguments">
                <div class="calc__argument-row">
                    <div class="calc__argument-item calc__argument-item--no-border">
                        <label class="calc__checkbox calc__checkbox--no-border" for="switch-9"><i class="check"></i><span>Додаткова ретуш</span>
                            <input type="checkbox" id="switch-9" data-price="30" data-percent="true">
                        </label>
                        <div class="calc__info">
                            <div class="calc__info-icon">i</div>
                            <div class="calc__info-block">
                                <p>Ти можеш дозамовити додаткову ретуш до основної кількості, обраного пакету. На терміни здачі твоїх світлин це не впливає. </p>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="calc__argument-row">
                    <div class="calc__argument-item calc__argument-item--no-border">
                        <label class="calc__checkbox calc__checkbox--no-border" for="switch-10"><i class="check"></i><span>Прискорена обробка</span>
                            <input type="checkbox" id="switch-10" data-price="25" data-percent="true">
                        </label>
                        <div class="calc__info">
                            <div class="calc__info-icon">i</div>
                            <div class="calc__info-block">
                                <p>Обробка фотографій відбувається в порядку черги. Зазвичай, ми віддаємо через 3 тижні. Ти можеш прискорити цей процес до 2-3 днів за доплату 25% від вартості пакету. Твої фото будуть зроблені в пріоритетному режимі.</p>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <div class="calc__background"></div>
            <div class="calc__action">
                <button class="btm btm--action" onclick="fbq('track', 'InitiateCheckout'); sendCalcBookingPhotoSession()">ЗАМОВИТИ</button>
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