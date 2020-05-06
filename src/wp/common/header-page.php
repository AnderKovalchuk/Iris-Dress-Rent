<?php
/**
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

	<!-- Facebook Pixel Code -->
<script>
  !function(f,b,e,v,n,t,s)
  {if(f.fbq)return;n=f.fbq=function(){n.callMethod?
  n.callMethod.apply(n,arguments):n.queue.push(arguments)};
  if(!f._fbq)f._fbq=n;n.push=n;n.loaded=!0;n.version='2.0';
  n.queue=[];t=b.createElement(e);t.async=!0;
  t.src=v;s=b.getElementsByTagName(e)[0];
  s.parentNode.insertBefore(t,s)}(window, document,'script',
  'https://connect.facebook.net/en_US/fbevents.js');
  fbq('init', '1008834179277375');
  fbq('track', 'PageView');
</script>
<noscript><img height="1" width="1" style="display:none" src="https://www.facebook.com/tr?id=1008834179277375&ev=PageView&noscript=1"
/></noscript>
<!-- End Facebook Pixel Code -->

<?php wp_head(); ?>
</head>

<body>
<header class="header">
	<div class="container header__iner">
		<div class="header__logo">
			<a href="<?php echo esc_url( home_url( '/' ) ); ?>">
				<figure>
					<img src="<?php echo get_template_directory_uri() ?>/img/logo-s.jpg" alt="<?php bloginfo( 'name' ); ?>">
					<p> Rent for photo </p>
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
		</nav>
		<div class="header__mobile-burger-iner"><span></span></div>
	</div>
</header>
<div class="navigation">
    <div class="container">
        <div class="navigation__title">
            <?php if( is_post_type_archive() ) : ?>
                <p> <?php echo post_type_archive_title(); ?> </p>
            <?php else : ?>
                <p> <?php echo esc_html( get_the_title() ); ?> </p>
            <?php endif; ?>
        </div>
        <?php dimox_breadcrumbs(); ?>
    </div>
</div>