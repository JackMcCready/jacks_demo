<?php
/*
  USAGE
  the_field('name','option')
*/

if( function_exists('acf_add_options_page') ) {
  
  acf_add_options_page(array(
    'page_title'  => 'Admin Settings',
    'menu_title'  => 'Admin Settings',
    'menu_slug'   => 'theme-general-settings',
    'capability'  => 'edit_posts',
    'redirect'    => false
  ));
  
}