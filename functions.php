<?php

// INCLUDES
require_once( __DIR__ . '/functions_includes/banner-utils.php');
require_once( __DIR__ . '/functions_includes/remove-emoji.php');
require_once( __DIR__ . '/functions_includes/security.php');
require_once( __DIR__ . '/functions_includes/performance.php');
require_once( __DIR__ . '/functions_includes/acf-options.php');
require_once( __DIR__ . '/functions_includes/wp-navigation.php');

@ini_set( 'upload_max_size' , '50M' );
@ini_set( 'post_max_size', '51M');
@ini_set( 'max_execution_time', '7200' );

// Custom Post Thumbnails
add_theme_support( 'post-thumbnails' );


//CUSTOM POST TYPE REGISTERATION
function create_posttype() {
  
  register_post_type( 'news',

  array(
      'labels' => array(
      'name' => __( 'FAQs' ),
      'singular_name' => __( `FAQ` )
      ),
      'public' => true,
      'has_archive' => false,
      'rewrite' => array('slug' => 'FAQs'),
    )
  );

}
add_action( 'init', 'create_posttype' );




function faq_function( $atts = array() ) {

  extract(shortcode_atts(array(
    'id'      => false,
    'design'  => 'grid'
  ), $atts));

  $args = array(
    'post_type' => 'news',
    'numberposts' => -1
  );

  if($atts['id']){
    $args['p'] = $atts['id'];
  }

  $return_string = '<ul class="faq-list">';
   query_posts(array('orderby' => 'date', 'order' => 'ASC' , 'showposts' => $posts, 'post_type' => 'news'));
   if (have_posts()) :
      while (have_posts()) : the_post();
         $return_string .= '<li><div class="faq-title">'.get_the_title(). '</div><div class="faq-desc">' . get_the_content() . '</li>';
      endwhile;
   endif;
   $return_string .= '</ul>';

   wp_reset_query();
   return $return_string;
}
add_shortcode('faq_shortcode', 'faq_function');