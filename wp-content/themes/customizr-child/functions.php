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




//REMOVING FILTER TO AVOID WP TO ADD A PARAGRAPH TO THE EDITOR
remove_filter( 'the_content', 'wpautop' );
remove_filter( 'the_excerpt', 'wpautop' );

// Custom Post Type
/*function services_custom_post() {
	register_post_type( 'colleges',
			array(
			'labels' => array(
					'name' => __( 'Colleges' ),
					'singular_name' => __( 'College' ),
			),
			'public' => true,
			'has_archive' => true,
                'supports' => array(
					'title',
					'thumbnail',
                    'editor'
			)
	   )
    );
}
add_action( 'init', 'services_custom_post' );*/

// remove width & height attributes from images
//
function remove_img_attr ($html)
{
    return preg_replace('/(width|height)="\d+"\s/', "", $html);
}
 
add_filter( 'post_thumbnail_html', 'remove_img_attr' );
?>