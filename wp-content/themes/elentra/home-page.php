<?php
/**
* Template Name: Home Page
* @package Elentra
*/

get_header();

	get_template_part( 'include/section-parts/section', 'hero' );

    get_template_part( 'include/section-parts/section', 'feature' );

    get_template_part( 'include/section-parts/section', 'about' );

    get_template_part( 'include/section-parts/section', 'service' );

    get_template_part( 'include/section-parts/section', 'portfolio' );

    get_template_part( 'include/section-parts/section', 'blog' );

    get_template_part( 'include/section-parts/section', 'callout' );

get_footer();