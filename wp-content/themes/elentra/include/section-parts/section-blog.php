<?php
/**
 * Template part - Portfolio Section
 * @package Elentra
 */

$elentra_blog_section_onoff = get_theme_mod( 'elentra_blog_section_onoff','on');
$elentra_blog_title = get_theme_mod('elentra_blog_title', '');
$elentra_blog_subtitle = get_theme_mod('elentra_blog_subtitle', '');

$elentra_blog_args  = array(
    'post_type' => 'post',
    'posts_per_page' => 3
);

$elentra_blog_query = new wp_Query( $elentra_blog_args );
if( $elentra_blog_section_onoff == "on" ) : ?>

<!--Corporate Blog Section 1-->
<div class="co-blog-section-1 bg-gray section  pt-140 pb-110">
    <div class="container">

        <!--Section Title-->
        <div class="row">
            <div class="col-xs-12">
                <div class="co-section-title-1 text-center mb-80">

                    <?php if( $elentra_blog_title != "" ): ?>
                        <h2><?php echo esc_html( $elentra_blog_title )?></h2>
                        <span class="main-title-sep"><i class=" fa fa-superpowers"></i></span>
                    <?php endif; ?>

                    <?php if( $elentra_blog_subtitle != "" ): ?>
                        <p><?php echo esc_html( $elentra_blog_subtitle )?></p>
                    <?php endif; ?>

                </div>
            </div>
        </div>

        <div class="row">
            <?php
                $count = 0;
                while($elentra_blog_query->have_posts()) :
                $elentra_blog_query->the_post();
            ?>
            <div class="col-sm-6 col-lg-4 col-xs-12 mb-30">
                <!-- Blog Media -->
                <?php if( has_post_thumbnail() ): ?>
                    <div class="">
                        <?php the_post_thumbnail( 'elentra-blog-front-thumbnail' ); ?>
                    </div>
                <?php endif; ?>                
                <!-- Blog Content -->
                <div class="co-blog-content">
              
                    <h4 class="title"><a href="<?php the_permalink(); ?>"><?php the_title(); ?></a></h4>
                    <!-- Meta -->
                    <div class="co-blog-meta fix">

                        <a href="<?php echo esc_url(get_author_posts_url(get_the_author_meta('ID'))); ?>" class="author float-left">
                            <span><?php the_author(); ?></span>
                        </a>

                        <div class="date-comment float-left">
                            <span> <?php echo get_the_date(); ?> </span>
                        </div>
                    </div>
                    <p><?php the_excerpt(); ?></p>
                </div>
            </div>
            <?php
                $count++;
                endwhile;
                wp_reset_postdata();
            ?>
        </div>
    </div>
</div>
<?php endif; ?>