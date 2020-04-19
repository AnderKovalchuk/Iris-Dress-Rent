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
        get_template_directory_uri() . '/css/main.css' );
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

class iris_walker_nav_menu extends Walker_Nav_Menu {
	function start_lvl( &$output, $depth, $args ) {
        $output .= '<ul class="header__main-nav">';
    }
    function start_el( &$output, $item, $depth, $args ) {
        global $wp_query;           
        $indent = ( $depth ) ? str_repeat( "\t", $depth ) : '';

        $output .= '<li>';
        $attributes  = ! empty( $item->attr_title ) ? ' title="'  . esc_attr( $item->attr_title ) .'"' : '';
        $attributes .= ! empty( $item->target )     ? ' target="' . esc_attr( $item->target     ) .'"' : '';
        $attributes .= ! empty( $item->xfn )        ? ' rel="'    . esc_attr( $item->xfn        ) .'"' : '';
        $attributes .= ! empty( $item->url )        ? ' href="'   . esc_attr( $item->url        ) .'"' : '';
        $attributes .= $item->current               ? ' class="header__menu-item header__menu-item--active"' : ' class="header__menu-item"';
        $item_output = $args->before;
        $item_output .= '<a'. $attributes .'>';
        $item_output .= $args->link_before . apply_filters( 'the_title', $item->title, $item->ID ) . $args->link_after;
        $item_output .= '</a>';
        $item_output .= $args->after;

        $output .= apply_filters( 'walker_nav_menu_start_el', $item_output, $item, $depth, $args );
    }
}

?>