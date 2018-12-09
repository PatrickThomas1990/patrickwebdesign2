<?php
/**
 * Template part - About Section
* @package Elentra
*/
$elentra_callout_section_onoff = get_theme_mod("elentra_callout_section_onoff",'off');

$elentra_callout_text = get_theme_mod("elentra_callout_text");
$elentra_callout_btntxt = get_theme_mod("elentra_callout_btntxt");
$elentra_callout_btnurl = get_theme_mod("elentra_callout_btnurl");

if( $elentra_callout_section_onoff == "on") : ?>

<!--Corporate CTA Section 1-->
<div class="section bg-gradient pt-100 pb-100">
    <div class="container">
        <div class="row">
            <div class="col-lg-10 col-lg-offset-1 col-xs-12">
                <!--CTA Wrapper-->
                <div class="co-cta-wrapper-1 fix">

                    <?php if ( $elentra_callout_text ): ?>
                        <h3><?php echo esc_html( $elentra_callout_text ); ?></h3>
                    <?php endif; ?>

                    <?php if ( $elentra_callout_btntxt ): ?>
                        <a href="<?php echo esc_url( $elentra_callout_btnurl ); ?>" class="btn btn-white"> <?php echo esc_html( $elentra_callout_btntxt ); ?> </a>
                    <?php endif; ?>
                    
                </div>
            </div>
        </div>
    </div>
</div>
<?php endif; ?>