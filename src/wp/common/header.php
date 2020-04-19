<?php
/**
	* Шаблон шапки (header.php)
	* @package IrisDress
*/
?>
<!DOCTYPE html>
<html <?php language_attributes(); ?>>
<head>
	<meta charset="<?php bloginfo( 'charset' ); ?>">
	<meta name="viewport" content="width=device-width, initial-scale=1">
	
	<link rel="profile" href="https://gmpg.org/xfn/11">
	<link rel="apple-touch-icon" sizes="144x144" href="<?php echo get_template_directory_uri() ?>/apple-touch-icon.png">
	<link rel="icon" type="image/png" sizes="32x32" href="<?php echo get_template_directory_uri() ?>/favicon-32x32.png">
	<link rel="icon" type="image/png" sizes="16x16" href="<?php echo get_template_directory_uri() ?>/favicon-16x16.png">
	<link rel="manifest" href="<?php echo get_template_directory_uri() ?>/ite.webmanifest">
	<meta name="msapplication-TileColor" content="#ffffff">
	<meta name="theme-color" content="#ffffff">

	<?php wp_head(); ?>
</head>

<body>
<header class="header">
	<div class="container header__iner">
		<div class="header__logo">
			<a href="<?php echo esc_url( home_url( '/' ) ); ?>">
				<figure>
					<img src="<?php echo get_template_directory_uri() ?>/img/logo-s.jpg" alt="<?php bloginfo( 'name' ); ?>">
				</figure>
			</a>
		</div>
		<nav class="header__nav-list">
			<?php 
				wp_nav_menu( array(
					'menu'            => '',
					'container'       => false,
					'menu_class'      => 'header__main-nav',
					'menu_id'         => '',
					'echo'            => true,
					'fallback_cb'     => 'wp_page_menu',
					'depth'           => 2,
					'walker'          => new iris_walker_nav_menu(),
					'theme_location'  => 'iris-main-menu'
				) );
			?>
			<!-- <div class="header__lang"><span class="header__menu-item">UA</span>
				<ul class="header__lang-list">
					<li class="header__lang-item"><a href="/">RU</a></li>
					<li class="header__lang-item header__lang-item--active"><a href="/">UA</a></li>
				</ul>
			</div> -->
		</nav>
		<div class="header__mobile-burger-iner"><span></span></div>
	</div>
</header>