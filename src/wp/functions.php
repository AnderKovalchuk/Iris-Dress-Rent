<?
add_theme_support( 'widgets' );
add_theme_support( 'woocommerce' );

if( function_exists('acf_add_options_page') ) {
	
	acf_add_options_page(array(
		'page_title' 	=> 'Дополнительная информация',
		'menu_title'	=> 'Дополнительная информация',
		'menu_slug' 	=> 'iris-add-info',
		'capability'	=> 'edit_posts',
		'icon_url' 		=> 'dashicons-admin-generic',
		'redirect'		=> false
	));
	
	acf_add_options_sub_page(array(
		'page_title' 	=> 'Фото дни / фото проекты',
		'menu_title'	=> 'Фото дни / фото проекты',
		'menu_slug' 	=> 'iris-add-info-project',
		'parent_slug'	=> 'iris-add-info',
	));
	
	acf_add_options_sub_page(array(
		'page_title' 	=> 'Условия бронирования платья',
		'menu_title'	=> 'Условия бронирования платья',
		'menu_slug' 	=> 'iris-add-info-dress',
		'parent_slug'	=> 'iris-add-info',
	));
	
}

function iris_setup_theme(){
    register_nav_menus(array( 
            'iris-main-menu'    => 'Главное меню',
    ) );
    add_theme_support( 'title-tag' );
}

add_action( 'after_setup_theme', 'iris_setup_theme' );

function iris_style() {
	wp_enqueue_style(
        'iris-template-style',
        get_template_directory_uri() . '/css/main.css?v2' );
}
function iris_script() {
    wp_enqueue_script( 
        'iris-template-script', 
        get_template_directory_uri() . '/js/main.js', '1', true );
}

add_action( 'wp_print_styles', 'iris_style' );
add_action( 'wp_enqueue_scripts', 'iris_script' );


function iris_register_widgets(){
	register_sidebar( array(
		'name'          => 'Контакты',
		'id'            => "iris_w_contact",
		'description'   => '',
		'class'         => '',
		'before_widget' => false,
		'after_widget'  => false,
		'before_title'  => '<h3>',
		'after_title'   => "</h3>\n",
    ) );
    register_sidebar( array(
		'name'          => 'Адрес',
		'id'            => "iris_w_adress",
		'description'   => '',
		'class'         => '',
		'before_widget' => false,
		'after_widget'  => false,
		'before_title'  => '<h3>',
		'after_title'   => "</h3>\n",
	) );
}

add_action( 'widgets_init', 'iris_register_widgets' );


add_action('init', 'my_custom_init');
function my_custom_init(){
	register_post_type('project', array(
		'labels'             => array(
			'name'               => 'Фотодни и Фотопроекты', // Основное название типа записи
			'singular_name'      => 'Проект', // отдельное название записи типа Book
			'add_new'            => 'Добавить',
			'add_new_item'       => 'Добавить',
			'edit_item'          => 'Редактировать',
			'new_item'           => 'Новая',
			'view_item'          => 'Посмотреть',
			'search_items'       => 'Найти',
			'not_found'          => 'Не найдено',
			'not_found_in_trash' => 'В корзине ничего не найдено',
			'parent_item_colon'  => '',
            'menu_name'          => 'Фотодни и Фотопроекты'
        ),
		'public'             => true,
		'publicly_queryable' => true,
		'show_ui'            => true,
		'show_in_menu'       => true,
		'query_var'          => '/?{query_var_string}/{post_slug}',
		'rewrite'            => true,
		'capability_type'    => 'post',
		'has_archive'        => true,
		'hierarchical'       => false,
        'menu_position'      => '2-3',
        'menu_icon'          => 'dashicons-camera-alt',
		'supports'           => array('title', 'editor', 'excerpt', 'thumbnail','custom-fields')
	) );
}

/*
 * "Хлебные крошки" для WordPress
 * автор: Dimox
 * версия: 2019.03.03
 * лицензия: MIT
*/
function dimox_breadcrumbs() {

	/* === ОПЦИИ === */
	$text['home']     = 'Головна'; // текст ссылки "Главная"
	$text['category'] = '%s'; // текст для страницы рубрики
	$text['search']   = 'Результаты поиска по запросу "%s"'; // текст для страницы с результатами поиска
	$text['tag']      = 'Записи с тегом "%s"'; // текст для страницы тега
	$text['author']   = 'Статьи автора %s'; // текст для страницы автора
	$text['404']      = 'Сторінку не знайдено'; // текст для страницы 404
	$text['page']     = 'Сторінка %s'; // текст 'Страница N'
	$text['cpage']    = 'Страница комментариев %s'; // текст 'Страница комментариев N'

	$wrap_before    = '<div class="navigation__bread-crumbs"><ul>'; // открывающий тег обертки
	$wrap_after     = '</ul></div>'; // закрывающий тег обертки
	//$sep            = '<span class="breadcrumbs__separator"> › </span>'; // разделитель между "крошками"
	$before         = '<li><a>'; // тег перед текущей "крошкой"
	$after          = '</a></li>'; // тег после текущей "крошки"

	$show_on_home   = 0; // 1 - показывать "хлебные крошки" на главной странице, 0 - не показывать
	$show_home_link = 1; // 1 - показывать ссылку "Главная", 0 - не показывать
	$show_current   = 1; // 1 - показывать название текущей страницы, 0 - не показывать
	$show_last_sep  = 1; // 1 - показывать последний разделитель, когда название текущей страницы не отображается, 0 - не показывать
	/* === КОНЕЦ ОПЦИЙ === */

	global $post;
	$home_url       = home_url('/');
	$link          	= '<li><a href="%1$s">%2$s</a></li>';
	$link          .= '<meta itemprop="position" content="%3$s" />';
	$link          .= '';
	$parent_id      = ( $post ) ? $post->post_parent : '';
	$home_link      = sprintf( $link, $home_url, $text['home'], 1 );

	if ( is_home() || is_front_page() ) {

		if ( $show_on_home ) echo $wrap_before . $home_link . $wrap_after;

	} else {

		$position = 0;

		echo $wrap_before;

		if ( $show_home_link ) {
			$position += 1;
			echo $home_link;
		}

		if ( is_category() ) {
			$parents = get_ancestors( get_query_var('cat'), 'category' );
			foreach ( array_reverse( $parents ) as $cat ) {
				$position += 1;
				if ( $position > 1 ) echo $sep;
				echo sprintf( $link, get_category_link( $cat ), get_cat_name( $cat ), $position );
			}
			if ( get_query_var( 'paged' ) ) {
				$position += 1;
				$cat = get_query_var('cat');
				echo sprintf( $link, get_category_link( $cat ), get_cat_name( $cat ), $position );
				echo $before . sprintf( $text['page'], get_query_var( 'paged' ) ) . $after;
			} else {
				if ( $show_current ) {
					if ( $position >= 1 ) echo $sep;
					echo $before . sprintf( $text['category'], single_cat_title( '', false ) ) . $after;
				} elseif ( $show_last_sep ) echo $sep;
			}

		} elseif ( is_search() ) {
			if ( get_query_var( 'paged' ) ) {
				$position += 1;
				if ( $show_home_link ) echo $sep;
				echo sprintf( $link, $home_url . '?s=' . get_search_query(), sprintf( $text['search'], get_search_query() ), $position );
				echo $before . sprintf( $text['page'], get_query_var( 'paged' ) ) . $after;
			} else {
				if ( $show_current ) {
					if ( $position >= 1 ) echo $sep;
					echo $before . sprintf( $text['search'], get_search_query() ) . $after;
				} elseif ( $show_last_sep ) echo $sep;
			}

		} elseif ( is_year() ) {
			if ( $show_home_link && $show_current ) echo $sep;
			if ( $show_current ) echo $before . get_the_time('Y') . $after;
			elseif ( $show_home_link && $show_last_sep ) echo $sep;

		} elseif ( is_month() ) {
			if ( $show_home_link ) echo $sep;
			$position += 1;
			echo sprintf( $link, get_year_link( get_the_time('Y') ), get_the_time('Y'), $position );
			if ( $show_current ) echo $before . get_the_time('F') . $after;
			elseif ( $show_last_sep ) echo $sep;

		} elseif ( is_day() ) {
			if ( $show_home_link ) echo $sep;
			$position += 1;
			echo sprintf( $link, get_year_link( get_the_time('Y') ), get_the_time('Y'), $position ) . $sep;
			$position += 1;
			echo sprintf( $link, get_month_link( get_the_time('Y'), get_the_time('m') ), get_the_time('F'), $position );
			if ( $show_current ) echo $before . get_the_time('d') . $after;
			elseif ( $show_last_sep ) echo $sep;

		} elseif ( is_single() && ! is_attachment() ) {
			if ( get_post_type() != 'post' ) {
				$position += 1;
				$post_type = get_post_type_object( get_post_type() );
				if ( $position > 1 ) echo $sep;
				echo sprintf( $link, get_post_type_archive_link( $post_type->name ), $post_type->labels->name, $position );
				if ( $show_current ) echo $before . get_the_title() . $after;
				elseif ( $show_last_sep ) echo $sep;
			} else {
				$cat = get_the_category(); $catID = $cat[0]->cat_ID;
				$parents = get_ancestors( $catID, 'category' );
				$parents = array_reverse( $parents );
				$parents[] = $catID;
				foreach ( $parents as $cat ) {
					$position += 1;
					if ( $position > 1 ) echo $sep;
					echo sprintf( $link, get_category_link( $cat ), get_cat_name( $cat ), $position );
				}
				if ( get_query_var( 'cpage' ) ) {
					$position += 1;
					echo sprintf( $link, get_permalink(), get_the_title(), $position );
					echo $before . sprintf( $text['cpage'], get_query_var( 'cpage' ) ) . $after;
				} else {
					if ( $show_current ) echo $before . get_the_title() . $after;
					elseif ( $show_last_sep ) echo $sep;
				}
			}

		} elseif ( is_post_type_archive() ) {
			$post_type = get_post_type_object( get_post_type() );
			if ( get_query_var( 'paged' ) ) {
				$position += 1;
				if ( $position > 1 ) echo $sep;
				echo sprintf( $link, get_post_type_archive_link( $post_type->name ), $post_type->label, $position );
				echo $before . sprintf( $text['page'], get_query_var( 'paged' ) ) . $after;
			} else {
				if ( $show_home_link && $show_current ) echo $sep;
				if ( $show_current ) echo $before . $post_type->label . $after;
				elseif ( $show_home_link && $show_last_sep ) echo $sep;
			}

		} elseif ( is_attachment() ) {
			$parent = get_post( $parent_id );
			$cat = get_the_category( $parent->ID ); $catID = $cat[0]->cat_ID;
			$parents = get_ancestors( $catID, 'category' );
			$parents = array_reverse( $parents );
			$parents[] = $catID;
			foreach ( $parents as $cat ) {
				$position += 1;
				if ( $position > 1 ) echo $sep;
				echo sprintf( $link, get_category_link( $cat ), get_cat_name( $cat ), $position );
			}
			$position += 1;
			echo sprintf( $link, get_permalink( $parent ), $parent->post_title, $position );
			if ( $show_current ) echo $before . get_the_title() . $after;
			elseif ( $show_last_sep ) echo $sep;

		} elseif ( is_page() && ! $parent_id ) {
			if ( $show_home_link && $show_current ) echo $sep;
			if ( $show_current ) echo $before . get_the_title() . $after;
			elseif ( $show_home_link && $show_last_sep ) echo $sep;

		} elseif ( is_page() && $parent_id ) {
			$parents = get_post_ancestors( get_the_ID() );
			foreach ( array_reverse( $parents ) as $pageID ) {
				$position += 1;
				if ( $position > 1 ) echo $sep;
				echo sprintf( $link, get_page_link( $pageID ), get_the_title( $pageID ), $position );
			}
			if ( $show_current ) echo $before . get_the_title() . $after;
			elseif ( $show_last_sep ) echo $sep;

		} elseif ( is_tag() ) {
			if ( get_query_var( 'paged' ) ) {
				$position += 1;
				$tagID = get_query_var( 'tag_id' );
				echo sprintf( $link, get_tag_link( $tagID ), single_tag_title( '', false ), $position );
				echo $before . sprintf( $text['page'], get_query_var( 'paged' ) ) . $after;
			} else {
				if ( $show_home_link && $show_current ) echo $sep;
				if ( $show_current ) echo $before . sprintf( $text['tag'], single_tag_title( '', false ) ) . $after;
				elseif ( $show_home_link && $show_last_sep ) echo $sep;
			}

		} elseif ( is_author() ) {
			$author = get_userdata( get_query_var( 'author' ) );
			if ( get_query_var( 'paged' ) ) {
				$position += 1;
				echo sprintf( $link, get_author_posts_url( $author->ID ), sprintf( $text['author'], $author->display_name ), $position );
				echo $before . sprintf( $text['page'], get_query_var( 'paged' ) ) . $after;
			} else {
				if ( $show_home_link && $show_current ) echo $sep;
				if ( $show_current ) echo $before . sprintf( $text['author'], $author->display_name ) . $after;
				elseif ( $show_home_link && $show_last_sep ) echo $sep;
			}

		} elseif ( is_404() ) {
			if ( $show_home_link && $show_current ) echo $sep;
			if ( $show_current ) echo $before . $text['404'] . $after;
			elseif ( $show_last_sep ) echo $sep;

		} elseif ( has_post_format() && ! is_singular() ) {
			if ( $show_home_link && $show_current ) echo $sep;
			echo get_post_format_string( get_post_format() );
		}

		echo $wrap_after;

	}
} // end of dimox_breadcrumbs()

class iris_walker_nav_menu extends Walker_Nav_Menu {
	function start_lvl( &$output, $depth, $args ) {
		if( $depth == 1 )
			$output .= '<ul class="header__main-nav">';
		else
			$output .= '<ul class="header__sub-menu">';
	}
    function start_el( &$output, $item, $depth, $args ) {
        global $wp_query;           
        $indent = ( $depth ) ? str_repeat( "\t", $depth ) : '';

        $output .= '<li>';
        $attributes  = ! empty( $item->attr_title ) ? ' title="'  . esc_attr( $item->attr_title ) .'"' : '';
        $attributes .= ! empty( $item->target )     ? ' target="' . esc_attr( $item->target     ) .'"' : '';
        $attributes .= ! empty( $item->xfn )        ? ' rel="'    . esc_attr( $item->xfn        ) .'"' : '';
        $attributes .= ! empty( $item->url )        ? ' href="'   . esc_attr( $item->url        ) .'"' : '';

		if( $depth == 0 ){
			$attributes .= $item->current        	? ' class="header__menu-item header__menu-item--active"' : ' class="header__menu-item"';
		} 
		
        $item_output = $args->before;
        $item_output .= '<a'. $attributes .'>';
        $item_output .= $args->link_before . apply_filters( 'the_title', $item->title, $item->ID ) . $args->link_after;
        $item_output .= '</a>';
        $item_output .= $args->after;

        $output .= apply_filters( 'walker_nav_menu_start_el', $item_output, $item, $depth, $args );
    }
}

?>