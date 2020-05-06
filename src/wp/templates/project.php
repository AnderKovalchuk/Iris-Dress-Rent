<?php
/*
Template Name: Фотодни и фотопроекты
*/

$projects = get_posts( array(
	'orderby'     => 'date',
	'order'       => 'DESC',
	'include'     => array(),
	'exclude'     => array(),
	'meta_key'    => '',
	'meta_value'  =>'',
	'post_type'   => 'project',
	'suppress_filters' => true, // подавление работы фильтров изменения SQL запроса
) );
?>
<?php get_header('page'); ?> 
<?php the_post(); ?>
<main class="projects__main">
    <div class="container">
        <div class="title__iner title__iner--center page__title">
            <h1 class="title__like-h1 title__like-h1--uppercase">
                <?php echo esc_html( get_the_title() ); ?>
            </h1>
            <span class="title__separator"></span>
		</div>
		<div class="content-section__content-iner">
			<?php echo the_content(); ?>
		</div>
	</div>
	<div class="projects__iner">
        <?php foreach( $projects as $project ): ?>
            <article class="projects__item">
				<div class="projects__description">
					<div class="title__iner content-section__title">
						<h2 class="title__like-h1 title__like-h1--uppercase">
                            <?php echo $project->post_title; ?>
                        </h2>
					</div>
						<div class="content-section__content-iner">
							<?php echo $project->post_excerpt; ?>
						</div>
						<div class="content-section__footer">
                            <a class="btm btm--service" href="<?php the_permalink($project->ID); ?>">Детальніше</a>
						</div>
					</div>
					<div class="projects__image">
						<figure>
                            <img src="<?php echo get_the_post_thumbnail_url( $project->ID, 'large' ); ?>" alt=" <?php echo $project->post_title; ?>">
                        </figure>
					</div>
				</article>
        <?php endforeach; ?>
    </div>
    <article class="container container--small calc">
        <div class="section title__iner title__iner--center">
            <h2 class="title__like-h1 title__like-h1--uppercase">Калькулятор фотосесії</h2><span class="title__separator"></span>
            <p class="title__sub-title">Збери свою унікальну фотосесію </p>
        </div>
        <div class="section calc__iner">
            <div class="calc__package-row">
                <div class="calc__package-title">
                    <h3>Виберіть тариф</h3>
                </div>
                <div class="calc__package">
                    <label for="package_1"> <i class="check"></i><span>Light (1 година)</span>
                        <input id="package_1" type="radio" name="package" value="light" checked>
                    </label>
                </div>
                <div class="calc__package">
                    <label for="package_2"> <i class="check"></i><span>GOLD (2 година)</span>
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
                        <label class="calc__checkbox" for="switch-5"><i class="check"></i><span>Укладка стиліста</span>
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
                <h3>Ціна </h3>
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
                                <p>Ти можеш до замовити додаткову ретуш до основної кількості, обраного пакету. На терміни здачі твоїх світлин це не впливає. </p>
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
                <button class="btm btm--action" onclick="fbq('track', 'InitiateCheckout'); sendCalcBookingPhotoSession()">Забронювати</button>
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
</main>
<?php get_footer(); ?>