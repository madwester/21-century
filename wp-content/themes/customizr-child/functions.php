<?php

/* 
COPING THE PARENT THEME
*/

add_action( 'wp_enqueue_scripts', 'my_theme_enqueue_styles' );
function my_theme_enqueue_styles() {
    wp_enqueue_style( 'parent-style', get_template_directory_uri() . '/style.css' );
}



//INCLUDING MY STYLESHETTS AND SCRIPTS

function my_scripts(){
    wp_enqueue_style( 'custom-style', get_template_directory_uri() . 'style.css' );
    //wp_enqueue_style( 'bootstrap', get_template_directory_uri() . '../../../../components/bootstrap/dist/css/bootstrap.css' );
    //wp_enqueue_style( 'fontawesome', get_template_directory_uri() . '../../../../components/font-awesome/css/font-awesome.min.css' );
	//wp_enqueue_script( 'js-bootstrap', get_template_directory_uri() . '../../../../components/bootstrap/dist/js/bootstrap.min.js', array( 'jquery' ), '3.3.7', true );
}
add_action( 'wp_enqueue_scripts', 'my_scripts');


?>