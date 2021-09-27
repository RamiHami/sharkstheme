<?php
//  функция добавления стилей
function theme_enqueue_style() {
  wp_enqueue_style('style', get_stylesheet_uri());
}

//  функция добавления js
function theme_enqueue_script() {
  wp_enqueue_script( 'add_kitty', get_template_directory_uri() . '/add_kitty.js');
}



// function true_js_in_admin() {
//   wp_enqueue_script( 'jquery' );
//   wp_enqueue_script( 'add_kitty', get_stylesheet_directory_uri() . '/add_kitty.js', array('jquery'), null );
// }

// add_action( 'admin_enqueue_scripts', 'true_js_in_admin');

//  регистрируем функции
add_action( 'wp_enqueue_scripts', 'theme_enqueue_style');
add_action( 'wp_enqueue_scripts', 'theme_enqueue_script');

//  регестрируем новый тип постов
//  инициализировать хук register_post_type 
//  нужно до регистрации
add_action( 'init', 'kittens');

//  функция регистрации нового типа поста
function kittens() {
  $args = array(
    'labels' => array(
      'menu_name' => 'Котики',
      'add_new' => 'Добавить котика',
      'add_new_item' => 'Добавить нового котика', 
      'edit_item' => 'Изменить котика',
      'new_item'  => 'Новый котик',
      'view_item' => 'Просмотр котика',
      'search_items' => 'Найти котика',
      'not_found' => 'котиков не найдено',
      'not_found_in_trash' => 'В корзине нет котиков',
      'parent_item_colon' => 'Родительский котик', 
      'all_items' => 'Все котики', 
      'archives' => 'Архивы котиков',
      'menu_name' => 'котики', 
      'name_admin_bar' => 'котики', 
      'attributes' => 'Свойства котика', 
    ),
    'public' => true,
  );
  register_post_type( 'kittens', $args );
}
?>