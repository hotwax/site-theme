<?php

add_action( 'after_setup_theme', 'prospect_child_theme_setup' );
function prospect_child_theme_setup() {
    load_child_theme_textdomain( 'prospect', get_stylesheet_directory() . '/languages' );
}

?>
