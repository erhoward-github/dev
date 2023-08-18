<?php
// Exit if accessed directly
if ( !defined( 'ABSPATH' ) ) exit;

// BEGIN ENQUEUE PARENT ACTION
// AUTO GENERATED - Do not modify or remove comment markers above or below:

if ( !function_exists( 'chld_thm_cfg_locale_css' ) ):
    function chld_thm_cfg_locale_css( $uri ){
        if ( empty( $uri ) && is_rtl() && file_exists( get_template_directory() . '/rtl.css' ) )
            $uri = get_template_directory_uri() . '/rtl.css';
        return $uri;
    }
endif;
add_filter( 'locale_stylesheet_uri', 'chld_thm_cfg_locale_css' );
         
if ( !function_exists( 'child_theme_configurator_css' ) ):
    function child_theme_configurator_css() {
        wp_enqueue_style( 'chld_thm_cfg_child', trailingslashit( get_stylesheet_directory_uri() ) . 'style.css', array(  ) );
    }
endif;
add_action( 'wp_enqueue_scripts', 'child_theme_configurator_css', 10 );

// END ENQUEUE PARENT ACTION


function dev_enqueue_scripts() 
{
    $version = rand(1000000001, 2147483647);
    
    # *********************************************************************************************
    # css
    # *********************************************************************************************
    wp_enqueue_style('bootstrap',  get_stylesheet_directory_uri() . '/css/bootstrap.min.css');
    wp_enqueue_style('datatables', get_stylesheet_directory_uri() . '/css/datatables.min.css');

    wp_enqueue_style('devcss',     get_stylesheet_directory_uri() . '/css/dev.css');


    # *********************************************************************************************
    # js
    # *********************************************************************************************
    wp_enqueue_script('bootstrap',  get_stylesheet_directory_uri() .'/js/bootstrap.bundle.js',  array('jquery'), null, true);
    wp_enqueue_script('datatables', get_stylesheet_directory_uri() .'/js/datatables.js', array('jquery'), null, true);
    wp_enqueue_script('d3js',       get_stylesheet_directory_uri() .'/js/d3.v7.js', array(), null, true);
    // wp_enqueue_script('chart',      get_stylesheet_directory_uri() .'/js/chart.js', array(), null, true);

    wp_enqueue_script('devjs',      get_stylesheet_directory_uri() .'/js/dev.js', array('jquery'), $version, true);

}
add_action('wp_enqueue_scripts', 'dev_enqueue_scripts');


function say_name( object $args ) 
{
    # http://dev.local/wp-json/api/say_name?name=elaine
    return $args['name'];
}

add_action('rest_api_init', function () {
    register_rest_route( 'api', '/say-name/', array(
        'methods'  => 'GET',
        'callback' => 'say_name',
    ));
});
