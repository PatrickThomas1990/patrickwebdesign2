<?php
/**
* @package Elentra
*/
?>
<div id="post-<?php the_ID(); ?>" <?php post_class(); ?> class="co-blog">

    <!-- Blog Media -->
    <div class="co-blog-media">
        <?php if( has_post_thumbnail() ): ?>
            <?php the_post_thumbnail('elentra-page-thumbnail'); ?>
        <?php endif; ?>
    </div>

    <!-- Blog Content -->
    <div class="co-blog-content">
        <h4 class="title"><a href="<?php the_permalink(); ?>"><?php the_title(); ?></a></h4>
   
        <!-- Meta -->
        <div class="co-blog-meta fix mb-20 mt-20">
            <a href="<?php echo esc_url(get_author_posts_url(get_the_author_meta('ID'))); ?>" class="author float-left">
                <img src="<?php echo esc_url( get_avatar_url( get_the_author_meta('ID') ) ); ?>" />
                <span><?php the_author(); ?></span>
            </a>
            <div class="date-comment float-left">
                <span><?php echo get_the_date(); ?></span>

                <a><?php comments_number( __('0 Comment', 'elentra'), __('1 Comment', 'elentra'), __('% Comments', 'elentra') ); ?></a>
            </div>
        </div>

        <?php the_excerpt(); ?>

        <div class="button mt-30">
            <a href="<?php the_permalink(); ?>" class="btn btn-border-gradient btn-hover-gradient"><?php echo esc_html__( 'Read More', 'elentra' ); ?></a>
        </div>

    </div>

</div>