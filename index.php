<?php
/*
	Plugin Name: Jem's Genesis Columns
	Plugin URI: 
	Description: Columns shortcode for the Genesis Framework
	Version: 0.1
	Author: Jem Turner
	Author URI: http://jemturner.co.uk
	License: GPLv2 or whatever
*/


/*
	Credit for the below function to Genesis Easy Columns:
	https://wordpress.org/plugins/genesis-easy-columns/
*/
function gc_strip_autop($content){
	$content = do_shortcode(shortcode_unautop( $content ));
	$content = preg_replace('#^<\/p>|^<br \/>|<p>$#', '', $content);
	return $content;
}
/* credit end */


function jems_genesis_columns( $atts, $content = '' ) {
	$atts = shortcode_atts( array(
		'size' => 'one-half',
		'first' => 'no',
		'classes' => null
	), $atts, 'columns' );
	
	$classes = $atts['size'];
	
	if ( $atts['first'] == 'yes' )
		$classes .= ' first';
	
	if ( $atts['classes'] != null )
		$classes .= ' '. $atts['classes'];
	
	return '<div class="'. $classes .'">'. gc_strip_autop( $content ) .'</div>';
}
add_shortcode( "columns", "jems_genesis_columns" );