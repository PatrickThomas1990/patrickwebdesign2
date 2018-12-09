<?php
/**
 * Template part - About Section
* @package Elentra
*/
$elentra_about_section_onoff = get_theme_mod("elentra_about_section_onoff", 'off');

$elentra_about_btntxt = get_theme_mod("elentra_about_btntxt");
$elentra_about_btnurl = get_theme_mod("elentra_about_btnurl");

$elentra_about_page = array();

for( $i = 1; $i <= 1; $i++ ) {
    $elentra_about_page[] = get_theme_mod( "elentra_about_page", '' );
}
$elentra_about_args  = array(
    'post_type' => 'page',
    'post__in' => array_map( 'absint', $elentra_about_page ),
    'posts_per_page' => 1,
    'orderby' => 'post__in'
); 
    
$elentra_about_query = new wp_Query( $elentra_about_args );
echo $elentra_about_section_onoff;
if( $elentra_about_section_onoff == "on") : ?>

<!--Corporate About Section 1-->
<div class="co-about-section-1 section pt-140 pb-100">
    <div class="container">
        <div class="row">
            <?php
                while($elentra_about_query->have_posts()) :
                $elentra_about_query->the_post();
            ?>
            <!--About Image-->
            <?php if(has_post_thumbnail()): ?>
                <div class="col-md-6 col-xs-12 float-right mb-40">
                    <div class="co-about-image-1">
                        <?php the_post_thumbnail( 'elentra-page-thumbnail' ); ?>
                    </div>
                </div>
                <!--About Content-->
                <div class="col-md-6 col-xs-12 mb-40">
                    <div class="co-about-content-1">
                        <h2><?php the_title(); ?></h2>

                        <?php the_content(); ?>
						
                        <?php if (!empty($elentra_about_btntxt)) : ?>
                            <a href="<?php echo esc_url( $elentra_about_btnurl ); ?>" class="btn btn-hover-gradient about-button"> <?php echo esc_html( $elentra_about_btntxt ); ?> </a>
                        <?php endif; ?>
                    </div>
                </div>
            <?php else: ?>
                 <!--About Content-->
                <div class="col-md-12 col-xs-12 mb-40">
                    <div class="co-about-content-1">
                        <h2><?php the_title(); ?></h2>

                        <?php the_content(); ?>
						 
                        <?php if (!empty($elentra_about_btntxt)) : ?>
                            <a href="<?php echo esc_url( $elentra_about_btnurl ); ?>" class="btn btn-hover-gradient about-button abt-btn"> <?php echo esc_html( $elentra_about_btntxt ); ?> </a>
                        <?php endif; ?>
                    </div>
                </div>
            <?php endif; ?>
            <?php
                endwhile;
                wp_reset_postdata();
            ?>
        </div>
    </div>
</div>
<?php endif; ?>