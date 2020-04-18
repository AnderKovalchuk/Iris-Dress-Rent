<?php get_header(); ?> 

<div class="full-width-banner full-width-banner--header-full-height">
	<figure><img src="<?php echo get_template_directory_uri() ?>/img/home_img.jpg" alt=""></figure>
</div>

<?php if ( have_posts() ) : while ( have_posts() ) : the_post(); ?>

    <main class="home-page__main">
        <?php echo the_content(); ?>

        <section class="sec sec--highlighted">
				<div class="container">
					<div class="title__iner title__iner--center">
						<h2 class="title__like-h2">Записаться на примерку</h2>
					</div>
					<form action="index.php" method="get">
						<div class="fitting-form">
							<input class="form__text" type="text" placeholder="Твое имя*">
							<input class="form__text" type="text" placeholder="Телефон*">
							<input class="form__text" type="text" placeholder="E-Mail">
							<button class="btm btm--action">Отправить   </button>
						</div>
					</form>
				</div>
			</section>
			<section class="container sec--full-height">
				<div class="grid__iner grid__iner--sitebar-left">
					<div class="grid__col grid__col--m-center grid__col--equal-height">
						<div class="title__iner content-section__title">
							<h2 class="title__like-h1 title__like-h1--uppercase">Подарочные сертификаты</h2>
						</div>
						<div class="content-section__content-iner">
							<p>Отличный сюрприз для друзей, близких и родных.</p>
							<p>Сертификат дает возможность сделать фотосессию в нашего фотографа вместе с выбором платья и работой стилиста.</p>
							<p>И чтобы ты не беспокоилась — мы его тебе доставим бесплатно!</p>
						</div>
						<div class="content-section__footer"><a class="btm btm--service" href="http://www.iris.anderkovalchuk.com/gift-certificates/">Узнать детальее</a>
						</div>
					</div>
					<div class="grid__col grid__col--equal-height content-section__image-iner">
						<figure><img src="<?php echo get_template_directory_uri() ?>/img/img-1.jpg" alt=""></figure>
					</div>
				</div>
			</section>
			<section class="sec sec--full-height sec--highlighted">
				<div class="container">
					<div class="grid__iner grid__iner--sitebar-right">
						<div class="grid__col grid__col--equal-height content-section__image-iner">
							<figure><img src="<?php echo get_template_directory_uri() ?>/img/img-2.jpg" alt=""></figure>
						</div>
						<div class="grid__col grid__col--m-first grid__col--m-center grid__col--equal-height">
							<div class="title__iner content-section__title">
								<h2 class="title__like-h1 title__like-h1--uppercase">Фотодни и Фотопроекты «Все Включено»</h2>
							</div>
							<div class="content-section__content-iner">
								<p>Авторские тематические фотосессии с готовой концепцией от нашей команды «Happy Moments Group» by Iris Dress Rent!</p>
								<p> <i>Жизнь соткана из моментов…</i></p>
							</div>
							<div class="content-section__footer"><a class="btm btm--service" href="http://www.iris.anderkovalchuk.com/project/">Узнать детальее</a>
							</div>
						</div>
					</div>
				</div>
			</section>
    </main>

<?php endwhile; endif; ?>

<?php get_footer(); ?>