<?php

function register_navigation(){
  register_nav_menus(array('header_menu'=> __('Header Menu')));
}
add_action('init', 'register_navigation');

function add_theme_scripts() {
  //wp_enqueue_script( 'menu', get_template_directory_uri() . '/assets/script/menu.js', 1.1, true);

}
add_action( 'wp_enqueue_scripts', 'add_theme_scripts' );

function add_theme_stylesheets(){
  wp_enqueue_style( 'style', get_stylesheet_uri() );
  wp_enqueue_style( 'font_and_color', get_template_directory_uri() . '/assets/css/font_and_color.css',false,'1.1','all');
  wp_enqueue_style( 'layout', get_template_directory_uri() . '/assets/css/layout.css',false,'1.1','all');
  wp_enqueue_style( 'header_layout', get_template_directory_uri() . '/assets/css/header_layout.css',false,'1.1','all');
  wp_enqueue_style( 'header_font_and_color', get_template_directory_uri() . '/assets/css/header_font_and_color.css',false,'1.1','all');
}

add_action( 'wp_enqueue_scripts', 'add_theme_stylesheets' );

 ?>
