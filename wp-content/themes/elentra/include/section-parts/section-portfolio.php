<?php
/**
 * Template part - Portfolio Section
 * @package Elentra
 */

$elentra_portfolio_section_onoff = get_theme_mod( 'elentra_portfolio_section_onoff','off');
$elentra_portfolio_title = get_theme_mod('elentra_portfolio_title');
$elentra_portfolio_subtitle = get_theme_mod('elentra_portfolio_subtitle');

$elentra_portfolio_no = 6;
$elentra_portfolio_pages = array();
$portfolio_icons = array();

for( $i = 1; $i <= $elentra_portfolio_no; $i++ ) {
    $elentra_portfolio_pages[] = get_theme_mod( "elentra_portfolio_page_$i", 1 );
}

$portfolio_args  = array(
    'post_type' => 'page',
    'post__in' => array_map( 'absint', $elentra_portfolio_pages ),
    'posts_per_page' => absint($elentra_portfolio_no),
    'orderby' => 'post__in'
   
); 

$elentra_portfolio_query = new wp_Query( $portfolio_args );
if( $elentra_portfolio_section_onoff == "on" ) : ?>

<!--Corporate Portfolio Section 1-->
<div class="co-portfolio-section-1  section pt-130 pb-130">
    <div class="container">
        <div class="row">
            <!--Section Title-->
            <div class="col-xs-12 text-center">
                <div class="co-section-title-1 text-center mb-60">

                    <?php if( $elentra_portfolio_title != "" ): ?>
                        <h2><?php echo esc_html( $elentra_portfolio_title )?></h2>
                        <span class="main-title-sep"><i class=" fa fa-superpowers"></i></span>
                    <?php endif; ?>

                    <?php if( $elentra_portfolio_subtitle != "" ): ?>
                        <p><?php echo esc_html( $elentra_portfolio_subtitle )?></p>
                    <?php endif; ?>

                </div>
            </div>
        </div>

        <div class="co-isotop-grid-1 isotop-grid row">
            <?php
                $count = 0;
                while($elentra_portfolio_query->have_posts()) :
                $elentra_portfolio_query->the_post();
            ?>
            <div class=" isotop-item branding web col-md-4 col-sm-6 col-xs-12 mb-30">
                <div class="co-isotop-item-1">

                    <?php if( has_post_thumbnail() ): ?>
                        <?php the_post_thumbnail( 'elentra-projects-thumbnail' ); ?>
                    <?php endif; ?>

                    <span class="content">
                        <a href="<?php the_post_thumbnail_url(); ?>" class="gallery-popup"><i class="fa fa-plus"></i></a>
                        <a href="<?php the_permalink(); ?>"><span class="title"><?php the_title(); ?></span></a>
                    </span>
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