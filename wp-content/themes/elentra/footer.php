<?php
/**
* Template part - Footer Section
* @package Elentra
*/
?>
    <!--Corporate Footer Section 1-->
    <div class="co-footer-section-1 section bg-dark-light pt-120 pb-60">
        <div class="container">
            <div class="row">

                <div class="col-md-4 col-sm-6 col-xs-12 mb-40">
                    <?php dynamic_sidebar('elentra-footer-widget-area-1'); ?>
                </div>

                <div class="col-md-4 col-sm-6 col-xs-12 mb-40">
                    <?php dynamic_sidebar('elentra-footer-widget-area-2'); ?>
                </div>

                <div class="col-md-4 col-sm-6 col-xs-12">
                    <?php dynamic_sidebar('elentra-footer-widget-area-3'); ?>
                </div>

            </div>
        </div>

    </div>
    <?php
        $elentra_footer_section_onoff = get_theme_mod("elentra_footer_section_onoff", 'off');
        $social_icon_url1 = get_theme_mod( "elentra_social_icon_url_1");
        $social_icon_url2 = get_theme_mod( "elentra_social_icon_url_2");
        $social_icon_url3 = get_theme_mod( "elentra_social_icon_url_3");
        $social_icon_url4 = get_theme_mod( "elentra_social_icon_url_4");
        $social_icon_url5 = get_theme_mod( "elentra_social_icon_url_5");

        if( $elentra_footer_section_onoff == 'on' ) :
    ?>
    
    <div class="co-footer-bottom-3 section bg-dark">
        <div class="container">
            <div class="row">

                <div class="co-copyright-3 col-md-6 col-xs-12">
                <?php

                    if( get_theme_mod('elentra_footer_text') ) : ?>
                        <p><?php echo wp_kses_post( html_entity_decode(get_theme_mod('elentra_footer_text'))); ?></p>
                    <?php else : 
                        /* translators: 1: poweredby, 2: link, 3: span tag closed  */
                        printf( esc_html__('%1$sPowered by %2$s%3$s','elentra'),'<span>','<a href="'. esc_url( __( 'https://wordpress.org/','elentra')).'"target="_blank">WordPress.</a>','</span>');
                        /* translators: 1: poweredby, 2: link, 3: span tag closed  */
                        printf( esc_html__( ' Theme: Elentra by: %1$sDesign By %2$s%3$s', 'elentra' ), '<span>', '<a href="'. esc_url( __( 'http://nickthemes.com', 'elentra' ) ) .'" target="_blank">"'.esc_html__('Elentra','elentra').'"</a>', '</span>' );
                    endif; ?>
                </div>

                <div class="co-footer-social-3 text-right col-md-6 col-xs-12">

                    <?php if ( $social_icon_url1 ): ?>
                        <a href="<?php echo esc_url( $social_icon_url1 ); ?>">
                            <i class="icon-facebook"></i>
                        </a>
                    <?php endif; if ( $social_icon_url2 ): ?>
                        <a href="<?php echo esc_url( $social_icon_url2 ); ?>">
                            <i class="icon-twitter"></i>
                        </a>
                    <?php endif; if ( $social_icon_url3 ): ?>
                        <a href="<?php echo esc_url( $social_icon_url3 ); ?>">
                            <i class="icon-googleplus"></i>
                        </a>

                    <?php endif; if ( $social_icon_url4 ): ?>
                        <a href="<?php echo esc_url( $social_icon_url4 ); ?>">
                            <i class="icon-dribbble"></i>
                        </a>

                    <?php endif; if ( $social_icon_url5 ): ?>
                        <a href="<?php echo esc_url( $social_icon_url5 ); ?>">
                            <i class="icon-linkedin"></i>
                        </a>
                    <?php endif; ?>
                </div>
            </div>
        </div>
    </div>
    <?php endif; ?>
    <?php wp_footer(); ?>

</body>

</html>