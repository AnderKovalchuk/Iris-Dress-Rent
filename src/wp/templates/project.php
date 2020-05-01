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
            <h2 class="title__like-h1 title__like-h1--uppercase">
                <?php echo esc_html( get_the_title() ); ?>
            </h2>
            <span class="title__separator"></span>
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
    <div class="container--small calculator__main">
			<div class="container--small calc">
				<div class="section title__iner title__iner--center">
                    <h2 class="title__like-h1 title__like-h1--uppercase">Калькулятор фотосесії</h2>
                    <span class="title__separator"></span>
                    <p class="title__sub-title">Збери свою унікальну фотосесію </p>
				</div>
				<div class="section calc__iner">
					<div class="calc__package-row">
						<div class="calc__package">
							<label for="package_1"><span>Light</span> 1 година
								<input id="package_1" type="radio" name="package" value="1" checked>
							</label>
						</div>
						<div class="calc__package">
							<label for="package_2"><span>GOLD</span>  2 година
								<input id="package_2" type="radio" name="package" value="2">
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
							<label class="calc__checkbox active" for="switch1"><span></span> Додаткові сукні 
								<input type="checkbox" id="switch1" data-price="700" data-count="1" data-current="" data-depend="true" checked>
							</label>
							<label class="calc__number" for="switch-num"><span class="calc__pulse">+</span>
								<input type="number" id="switch-num" min="1" max="20"><span class="calc__minuse">-</span>
							</label>
						</div>
						<div class="calc__argument-row">
							<label class="calc__checkbox" for="switch-2"> <span></span> Оренда фотостудії
								<input type="checkbox" id="switch-2" data-price="200" data-current="0"/>
							</label>
						</div>
						<div class="calc__argument-row">
							<label class="calc__checkbox" for="switch-3"> <span></span> Фотограф
								<input type="checkbox" id="switch-3" data-price="2000" data-current="0"/>
							</label>
						</div>
						<div class="calc__argument-row">
							<label class="calc__checkbox" for="switch-4"> <span></span> Макіяж
								<input type="checkbox" id="switch-4" data-price="200" data-current="0"/>
							</label>
						</div>
						<div class="calc__argument-row">
							<label class="calc__checkbox" for="switch-5undefined"> <span></span> Укладка
								<input type="checkbox" id="switch-5undefined" data-price="200" data-current="0" data-depend="true">
							</label>
						</div>
						<div class="calc__argument-row">
							<label class="calc__checkbox" for="switch-6"> <span></span> Додаткова ретуш
								<input type="checkbox" id="switch-6" data-price="300" data-current="0"/>
							</label>
						</div>
						<div class="calc__argument-row">
							<label class="calc__checkbox" for="switch-7"> <span></span> Прискорена обробка фотографій
								<input type="checkbox" id="switch-7" data-price="1100" data-current="0"/>
							</label>
						</div>
						<div class="calc__argument-row">
							<label class="calc__checkbox" for="switch-8"> <span></span> Запис фото на флешку
								<input type="checkbox" id="switch-8" data-price="1000" data-current="0"/>
							</label>
						</div>
						<div class="calc__argument-row">
							<label class="calc__checkbox" for="switch-9"> <span></span> Фотокнига
								<input type="checkbox" id="switch-9" data-price="1500" data-current="0"/>
							</label>
						</div>
					</div>
					<div class="calc__action">
						<button class="btm btm--action" onclick="send()">Забронювати</button>
					</div>
				</div>
            </div>
    </div>
</main>
<?php get_footer(); ?>