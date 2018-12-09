<?php
/**
* The template for displaying single post.
* @package Elentra
*/
get_header();

elentra_banner();

?>
<!--Corporate Portfolio Section 1-->
<div class="co-blog-section section pt-140">
    <div class="container">
        <div class="row">
            <div class="col-md-8 col-xs-12 mb-80">
                <?php 
                    if ( have_posts() ) :
                    while ( have_posts() ) : the_post();
                        get_template_part('include/content-parts/content', 'single' );
                    endwhile;
                    endif;
                ?> 
            </div>

            <div class="col-md-4 col-xs-12 mb-50">
                <?php get_sidebar(); ?>
            </div>
        </div>
    </div>
</div>
<?php get_footer(); ?>