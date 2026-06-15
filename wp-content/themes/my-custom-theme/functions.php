<?php
/**
 * Functions for the My Custom Theme
 * Author: Ashish Rana
 * Author URI: https://thetechinfo.net/
 * Version: 1.0
 */
    register_nav_menus(array(
        'primary' => 'Primary Menu', 'menu_class' => 'main-nav'
    ));

    add_theme_support('post-thumbnails');
    add_theme_support('title-tag');
    add_theme_support('custom-logo');
    add_theme_support('custom-background');
    add_theme_support('custom-header');
    add_theme_support('custom-footer');
    add_theme_support('custom-sidebar');
    add_theme_support('custom-widgets');
    add_theme_support('custom-menus');
    add_theme_support('custom-post-types');

    register_sidebar( array( 'name' => 'Sidebar Location', 'id' => 'sidebar'));
    
    

function my_custom_theme_enqueue_styles() {
    wp_enqueue_style('my-custom-theme-style', get_template_directory_uri() . '/style.css');
}
add_action('wp_enqueue_scripts', 'my_custom_theme_enqueue_styles');


function my_custom_theme_enqueue_scripts() {
    wp_enqueue_script('my-custom-theme-script', get_template_directory_uri() . '/script.js', array('jquery'), '1.0', true);
}
add_action('wp_enqueue_scripts', 'my_custom_theme_enqueue_scripts');
add_theme_support('custom-background');
add_post_type_support('page', 'excerpt');


/*
function my_custom_theme_widgets_init() {
    register_sidebar(array(
        'name' => 'Primary Sidebar',
        'id' => 'primary-sidebar',
        'description' => 'Primary sidebar for the theme',
        'before_widget' => '<div id="%1$s" class="widget %2$s">',   
        'after_widget' => '</div>',
        'before_title' => '<h3 class="widget-title">',
        'after_title' => '</h3>',
    ));
}
add_action('widgets_init', 'my_custom_theme_widgets_init');
*/

function my_custom_theme_register_menus() {
    register_nav_menus(array(
        'primary' => 'Primary Menu',
    ));
}
add_action('init', 'my_custom_theme_register_menus');


function my_custom_theme_register_sidebars() {
    register_sidebar(array(
        'name' => 'Primary Sidebar',
        'id' => 'primary-sidebar',
        'description' => 'Primary sidebar for the theme',
        'before_widget' => '<div id="%1$s" class="widget %2$s">',   
        'after_widget' => '</div>',
        'before_title' => '<h3 class="widget-title">',
        'after_title' => '</h3>',
    ));
}
add_action('widgets_init', 'my_custom_theme_register_sidebars');


/*
function my_custom_theme_register_widgets() {
    register_widget('My_Custom_Theme_Widget');
}
add_action('widgets_init', 'my_custom_theme_register_widgets');
*/

?>