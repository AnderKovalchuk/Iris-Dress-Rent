<?php
/**
 * Главная страница (index.php)
 * @package IrisDress
*/
?>

<?php get_header(); ?> 

<div class="navigation">
    <div class="container">
        <div class="navigation__title">
            <h1>004_iris_dress</h1>
        </div>
        <div class="navigation__bread-crumbs">
            <ul>
                <li> <a href="/">Главная</a></li>
                <li><a href="#">Каталог платьев для аренды</a></li>
                <li><a href="#">Платья</a></li>
                <li><a href="#">004_iris_dress</a></li>
            </ul>
        </div>
    </div>
</div>

<?php the_content(); ?>

<?php get_footer(); ?>