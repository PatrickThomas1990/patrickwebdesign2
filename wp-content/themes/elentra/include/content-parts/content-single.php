<!-- Blog -->
<div id="post-<?php the_ID(); ?>" class="co-blog co-single-blog">
    <!-- Blog Media -->
    <?php if( has_post_thumbnail() ): ?>
        <div class="co-blog-media">
            <?php the_post_thumbnail( 'elentra-blog-thumbnail' ); ?>
        </div>
    <?php endif; ?>
    <!-- Blog Content -->
    <div class="co-blog-content">

        <h4 class="title"><?php the_title(); ?></h4>
        <!-- Meta -->
        <div class="co-blog-meta fix mb-20 mt-20">
            <a href="<?php echo esc_url(get_author_posts_url(get_the_author_meta('ID'))); ?>" class="author float-left">
                <img src="<?php echo esc_url( get_avatar_url( get_the_author_meta('ID') ) ); ?>" />
                <span><?php the_author(); ?></span>
            </a>
            <div class="date-comment float-left">
                <span><?php the_date(); ?></span>

                <span><?php comments_number( __('0 Comment', 'elentra'), __('1 Comment', 'elentra'), __('% Comments', 'elentra') ); ?></span>
            </div>
        </div>

        <?php the_content(); ?>

        <?php
            wp_link_pages( array(
                'before' => '<div class="page-links">' . esc_html__( 'Pages: ', 'elentra' ),
                'after'  => '</div>',
            ) );
        ?>

    </div>

    <div class="co-blog-share fix">
        <div class="tags-btn">
            <?php the_tags(); ?>
        </div>
    </div>

</div>

<!-- Comment Wrapper -->
<?php 
    if ( comments_open() ):
        comments_template(); 
    endif;
?>
<!-- Comment Wrapper -->