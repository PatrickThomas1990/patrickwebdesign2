<?php
/**
 * Template part - Service Section
 * @package Elentra
 */
$elentra_service_section_onoff = get_theme_mod( 'elentra_service_section_onoff','off');
$elentra_service_title = get_theme_mod('elentra_service_title', '');
$elentra_service_subtitle = get_theme_mod('elentra_service_subtitle', '');

$elentra_service_no = 6;
$elentra_service_pages = array();
$elenta_service_icons = array();

for( $i = 1; $i <= $elentra_service_no; $i++ ) {
    $elenta_service_icons[] = get_theme_mod( "elentra_service_icon_$i", '' );
    $elentra_service_pages[] = get_theme_mod( "elentra_service_page_$i", 1 );
}

$elenta_service_args  = array(
    'post_type' => 'page',
    'post__in' => array_map( 'absint', $elentra_service_pages ),
    'posts_per_page' => absint($elentra_service_no),
    'orderby' => 'post__in'
   
); 

$elenta_service_query = new wp_Query( $elenta_service_args );
if( $elentra_service_section_onoff == "on" ) : ?>

<!--Corporate Mission Section 1-->
<div class="co-service-section-4 bg-gray section pt-140 pb-140">
    <div class="container">
        <div class="row">
            <!--Section Title-->
            <div class="col-xs-12 text-center">
                <div class="co-section-title-1 text-center mb-60">

                    <?php if( $elentra_service_title != "" ): ?>
                        <h2><?php echo esc_html( $elentra_service_title )?></h2>
                        <span class="main-title-sep"><i class="fa fa-superpowers"></i></span>
                    <?php endif; ?>

                    <?php if( $elentra_service_subtitle != "" ): ?>
                        <p><?php echo esc_html( $elentra_service_subtitle )?></p>
                    <?php endif; ?>

                </div>
            </div>
        </div>
        <div class="row">
            <!--Service Wrapper-->
            <div class="col-xs-12">
                <div class="">
                    <?php
                        $count = 0;
                        while($elenta_service_query->have_posts()) :
                        $elenta_service_query->the_post();
                    ?>
                        <!--Single Service-->
                        <div class="co-single-service-4 col-md-4 col-xs-12">
                            <?php if( $elenta_service_icons[$count] != "" ): ?>
                            <div class="service-icon">
                                <span class="icon"><i class="fa <?php echo esc_attr($elenta_service_icons[$count]); ?>"></i></span>
                            </div>
                        <?php endif; ?>

                            <div class="content fix">

                                <h3><?php the_title(); ?></h3>

                                <?php the_excerpt(); ?>

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
    </div>
</div>
<?php endif; ?>