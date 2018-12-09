<?php
/**
 * Template part - Feature Section
* @package Elentra
*/
$elentra_feature_section_onoff = get_theme_mod("elentra_feature_section_onoff",'off');

$elentra_feature_no = 3;
$elentra_feature_pages = array();
$elentra_feature_icons = array();

for( $i = 1; $i <= $elentra_feature_no; $i++ ) {
    $elentra_feature_icons[] = get_theme_mod( "elentra_feature_page_icon_$i", '' );
    $elentra_feature_pages[] = get_theme_mod( "elentra_feature_page_$i", '' );
}

$elentra_feature_args  = array(
    'post_type' => 'page',
    'post__in' => array_map( 'absint', $elentra_feature_pages ),
    'posts_per_page' => absint($elentra_feature_no),
    'orderby' => 'post__in'
   
); 

$elentra_feature_query = new wp_Query( $elentra_feature_args );

if( $elentra_feature_section_onoff == "on") : ?>

    <!--Corporate Service Section 1-->
    <div class="co-service-section-1 upper-box">
        <!--Service Wrapper-->
        <div class="co-service-wrapper-1">
            <!--Single Service-->
            <?php
                $count = 0;
                while($elentra_feature_query->have_posts()) :
                $elentra_feature_query->the_post();
            ?>
            <div class="co-single-service-1 col-md-4 text-center">
                
                <?php if( $elentra_feature_icons[$count] ) : ?>
                    <i class="fa <?php echo esc_attr($elentra_feature_icons[$count]); ?>"></i>
                <?php endif; ?>

                <h3><?php the_title(); ?></h3>

                <?php the_excerpt(); ?>

            </div>
            <?php
                $count++;
                endwhile;
                wp_reset_postdata();
            ?>
        </div>
    </div>
<?php endif; ?>