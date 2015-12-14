<?php 


add_theme_support( 'post-thumbnails' );

// Aggiunto per far funzionare il pplugin Simple Page Ordering
add_post_type_support( 'post', 'page-attributes' );
// Include i walkers per i menu 
require get_template_directory() . '/inc/custom-walkers.php';
require get_template_directory() . '/inc/custom-menu-walkers.php';

?>