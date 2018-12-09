<?php
/**
* The template for displaying sidebar widgets
* @package Elentra
*/

if ( ! is_active_sidebar( 'blog_post_sidebar' ) ) {
	return;
}
 dynamic_sidebar( 'blog_post_sidebar' ); ?>