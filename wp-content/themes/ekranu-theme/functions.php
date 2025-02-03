<?php
function ekranu_enqueue_styles() {
    wp_enqueue_style('theme-style', get_stylesheet_uri(), array(), filemtime(get_stylesheet_directory() . '/style.css'));
}
add_action('wp_enqueue_scripts', 'ekranu_enqueue_styles');


