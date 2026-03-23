<?php
/*
Plugin Name: Wheelbase Widget
Plugin URI: https://www.wheelbasepro.com
Description: Wheelbase Widget shortcode for embedding rental stores and listing pages
Version: 1.0.0
Author: Wheelbase Pro
Author URI: https://www.wheelbasepro.com
License: GPL2
*/

/* Load the wheelbase widget script as an ES module */
add_action('wp_enqueue_scripts', 'wheelbase_widget_init');

function wheelbase_widget_init() {
  wp_enqueue_script(
    'wheelbase-widget',
    'https://d2toxav8qvoos4.cloudfront.net/latest/wheelbase-widget.js',
    array(),
    null,
    true
  );
}

add_filter('script_loader_tag', 'wheelbase_widget_add_type_module', 10, 3);

function wheelbase_widget_add_type_module( $tag, $handle, $src ) {
  if ( 'wheelbase-widget' === $handle ) {
    $tag = '<script type="module" src="' . esc_url( $src ) . '"></script>';
  }
  return $tag;
}

/*-------------------
  Shortcodes
----------------------*/

// [wheelbase-widget dealer-id="12345" background-color="#f8f9fa" hide-hero="true"]
function wheelbase_widget_func( $atts ) {
  $attributes = '';

  foreach ( $atts as $key => $value ) {
    $key = esc_attr( $key );
    $value = esc_attr( $value );
    $attributes .= ' ' . $key . '="' . $value . '"';
  }

  return '<wheelbase-store' . $attributes . '></wheelbase-store>';
}

add_shortcode( 'wheelbase-widget', 'wheelbase_widget_func' );

// [wheelbase-listing dealer-id="12345" rental-id="67890"]
function wheelbase_listing_func( $atts ) {
  $attributes = '';

  foreach ( $atts as $key => $value ) {
    $key = esc_attr( $key );
    $value = esc_attr( $value );
    $attributes .= ' ' . $key . '="' . $value . '"';
  }

  return '<listing-details' . $attributes . '></listing-details>';
}

add_shortcode( 'wheelbase-listing', 'wheelbase_listing_func' );
