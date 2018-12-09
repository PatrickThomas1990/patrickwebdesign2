<?php
/**
* The template for displaying search result.
* @package Elentra
*/

get_header();

?>

<div class="co-page-banner-section section" data-page-title="Blog" <?php if ( get_header_image() ){ ?> style="background-image:url('<?php header_image(); ?>')"  <?php } ?>>
    <div class="banner-bg">
        <div class="container">
            <div class="row">
                <div class="co-page-banner text-center col-xs-12">
                    <?php if ( have_posts() ) : ?>
					<h1> 
						<?php 
						/* translators: %s: search term */
						printf( esc_html__( 'Search Results for : %s', 'elentra' ), '<span>' . get_search_query() . '</span>' ); ?>
					</h1>
				<?php else : ?>
					<h1><?php
						/* translators: %s: nothing found term */
						printf( esc_html__( 'Nothing Found for: %s', 'elentra' ), '<span>' . get_search_query() . '</span>' ); ?>
					</h1>
				<?php endif; ?>   
                </div>
            </div>
        </div>
    </div>
</div>

<div class="co-blog-section section pt-140">
    <div class="container">
        <div class="row">
            <div class="col-md-8 col-xs-12 mb-100">
            <!-- Blog -->
            <?php 
                if ( have_posts() ) :
                while ( have_posts() ) : the_post();
                    get_template_part( 'include/content-parts/content', 'search' );
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