<?
add_theme_support( 'woocommerce' );

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

class iris_walker_nav_menu extends Walker_Nav_Menu {
	function start_lvl(&$output, $depth) {
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