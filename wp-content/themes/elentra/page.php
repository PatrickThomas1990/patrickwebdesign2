<?php
/**
* The template for displaying index page.
* @package Elentra
*/

get_header();

elentra_banner();

?>
<div class="section  pt-140 pb-140 pg-wrapper">
    <div class="container">
        <div class="row">
            <div class="col-md-8 col-xs-12">
                <div class="full-width-page">
                    <?php 
                        if ( have_posts() ) :
                            while ( have_posts() ) : the_post();
                                if(has_post_thumbnail()) :
                                    the_post_thumbnail();
                                endif;

                                the_content();
								wp_link_pages( array(
									'before' => '<div>' . esc_html__( 'Pages:', 'elentra' ),
									'after'  => '</div>',
									) );
                            endwhile;
                        else :  
                            get_template_part( 'include/content-parts/content', 'none' );
                        endif; ?>
                </div>
				<div class="row">
					<div class="col-md-12">
						<?php if ( comments_open() || get_comments_number() ) :
						comments_template();
						endif; ?> 
					</div>
				</div>
            </div>
            <div class="col-md-4 col-xs-12 mb-50">

                <?php get_sidebar(); ?>
                
            </div>
        </div>
    </div>
</div>

<?php get_footer(); ?>