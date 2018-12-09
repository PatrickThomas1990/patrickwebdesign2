<?php
/**
* The template for displaying index page.
* @package Elentra
*/

get_header();

elentra_banner();

?>

<!--Corporate Portfolio Section 1-->
<div class="co-blog-section section pt-140">
    <div class="container">
        <div class="row">
            <div class="col-md-8 col-xs-12 mb-100">
            <!-- Blog -->
            <?php 
                if ( have_posts() ) :
                while ( have_posts() ) : the_post();
                    get_template_part( 'include/content-parts/content', get_post_format() );
                endwhile; ?>

                <!-- Pagination -->
                <ul class="co-pagination">
                    <?php the_posts_pagination(
                        array(
                            'prev_text' => __( '<i class="fa fa-angle-left"></i>', 'elentra' ),
                            'next_text' => __( '<i class="fa fa-angle-right"></i>', 'elentra' )
                        )
                    ); ?>
                </ul>
            <?php endif; ?>
            </div>

            <div class="col-md-4 col-xs-12 mb-50">
                <?php get_sidebar(); ?>
            </div>
        </div>
    </div>
</div>

<?php get_footer(); ?>