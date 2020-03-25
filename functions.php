<?php
/**
 * Fitts Theme Functions
 *
 * @package fitts
 * @since 1.0.0
 */

function fitts_theme_support() {
	register_nav_menu('header-menu-location', 'Main Menu');
	add_theme_support( 'post-thumbnails' ); 
}

add_action( 'after_setup_theme', 'fitts_theme_support' );

/**
 * Register and Enqueue Styles.
 */
function fitts_register_styles() {

	$theme_version = wp_get_theme()->get( 'Version' );

	wp_enqueue_style( 'fitts-style', get_stylesheet_uri(), array('bootstrap-css', 'googlefonts'), $theme_version );
	wp_style_add_data( 'fitts-style', 'rtl', 'replace' );

	wp_enqueue_style('bootstrap-css', 'https://stackpath.bootstrapcdn.com/bootstrap/4.4.1/css/bootstrap.min.css', array(), null);

	wp_enqueue_style('fontAwesome', 'https://stackpath.bootstrapcdn.com/font-awesome/4.7.0/css/font-awesome.min.css', array('bootstrap-css'), null);

	wp_enqueue_style('googlefonts', 'https://fonts.googleapis.com/css?family=Gelasio|Roboto&display=swap', array(), null);

}

function add_style_cdn_attributes( $html, $handle ) {

    if ( 'fontAwesome' === $handle ) {
        return str_replace( "media='all'", "media='all' integrity='sha384-wvfXpqpZZVQGK6TAh5PVlGOfQNHSoD2xbE+QkPxCAFlNEevoEH3Sl0sibVcOQVnN' crossorigin='anonymous'", $html );
    }

    if ( 'bootstrap-css' === $handle ) {
        return str_replace( "media='all'", "media='all' integrity='sha384-Vkoo8x4CGsO3+Hhxv8T/Q5PaXtkKtu6ug5TOeNV6gBiFeWPGFN9MuhOf23Q9Ifjh' crossorigin='anonymous'", $html );
    }

    return $html;
}

add_filter( 'style_loader_tag', 'add_style_cdn_attributes', 10, 2 );
add_action( 'wp_enqueue_scripts', 'fitts_register_styles' );

/**
 * Register and Enqueue Scripts.
 */
function fitts_register_scripts() {

	$theme_version = wp_get_theme()->get( 'Version' );

	if ( ( ! is_admin() ) && is_singular() && comments_open() && get_option( 'thread_comments' ) ) {
		wp_enqueue_script( 'comment-reply' );
	}

	wp_enqueue_script( 'fitts-js', get_template_directory_uri() . '/assets/js/index.js', array('word-wrap'), $theme_version, true);
	wp_script_add_data( 'fitts-js', 'async', true );

	wp_enqueue_script( 'word-wrap', get_template_directory_uri() . '/assets/js/jQuery-widowFix-master/js/jquery.widowFix.min.js', array('jquery'), null, true);
	wp_script_add_data( 'word-wrap', 'async', true );

	wp_enqueue_script('bootstrap-js', 'https://stackpath.bootstrapcdn.com/bootstrap/4.4.1/js/bootstrap.min.js', array('jquery'), null, false);

}

function add_script_cdn_attributes( $tag, $handle ) {
    if ( 'bootstrap-js' === $handle ) {
        return str_replace( "src", "integrity='sha384-wfSDF2E50Y2D1uUdj0O3uMBJnjuUD4Ih7YwaYd1iqfktj0Uod8GCExl3Og8ifwB6' crossorigin='anonymous' src", $tag );
    }
    return $tag;
}
add_filter( 'script_loader_tag', 'add_script_cdn_attributes', 10, 2 );


add_action( 'wp_enqueue_scripts', 'fitts_register_scripts' );

/**
 * Register and Enqueue Scripts.
 */

function fitts_widget_areas() {



}

add_action( 'widgets_init', 'fitts_widget_areas' );