<?php
/**
* Template Name: Full width Page
* @package Elentra
*/
get_header();

elentra_banner();

?>

<div class="section pt-140 pb-140">
    <div class="container">
        <div class="row">
        	<?php if ( have_posts() ) :
                while ( have_posts() ) : the_post(); ?>
	            <div id="post-<?php the_ID(); ?>" class="full-width-page">

	            	<?php if( has_post_thumbnail() ): ?>
                        <?php the_post_thumbnail('elentra-page-thumbnail', array('class' => 'img-responsive mb-30')); ?>
                    <?php endif; ?>

                    <?php the_content(); ?>
                    
	            </div>
	        <?php endwhile; endif; ?>
        </div>
    </div>
</div>

<?php get_footer(); ?>