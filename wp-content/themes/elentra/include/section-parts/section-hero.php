<?php
/**
 * Template part - Hero Section
* @package Elentra
*/
$elentra_image_section_onoff = get_theme_mod("elentra_banner_section_onoff", 'off' );
$b_image = get_theme_mod("elentra_banner_image");
$title = get_theme_mod("elentra_banner_title");
$sub_title = get_theme_mod("elentra_banner_sub_title");
$bt_text1 = get_theme_mod("elentra_banner_button1_text");
$bt_url1 = get_theme_mod("elentra_banner_button1_url");
$bt_text2 = get_theme_mod("elentra_banner_button2_text");
$bt_url2 = get_theme_mod("elentra_banner_button2_url");


if( $elentra_image_section_onoff == "on") { ?>
<!--Corporate Hero Section 1-->
<div class="co-hero-section-1 section">

    <!--Creative 1 Hero Slider-->
    <div class="co-hero-slider-1 hero-slider">
        <div class="co-hero-slide-item-1" <?php if ( $b_image ) { ?> style="background-image:url('<?php echo esc_url( $b_image ); ?>')"  <?php } ?>>
            <div class="container">
                <div class="row">
                    <div class="col-xs-12 text-center">
                        <!--Hero Slide Content-->
                        <div class="co-hero-slide-content-1">

                            <?php if (!empty($title)) : ?>
                                <h4> <?php echo esc_html( $title ); ?> </h4>
                            <?php endif; ?>

                            <?php if (!empty($sub_title)) : ?>
                                <h1> <?php echo esc_html( $sub_title ); ?> </h1>
                            <?php endif; ?>

                            <?php if (!empty($bt_text1)) : ?>
                                <a href="<?php echo esc_url( $bt_url1 ); ?>" class="btn btn-white btn-lg btn-hover-gradient"> <?php echo esc_html( $bt_text1 ); ?> </a>
                            <?php endif; ?>

                            <?php if (!empty($bt_text2)) : ?>
                                <a href="<?php echo esc_url( $bt_url2 ); ?>" class="btn btn-border-white btn-lg btn-hover-gradient"> <?php echo esc_html( $bt_text2 ); ?> </a>
                            <?php endif; ?>
                            
                        </div>
                    </div>
                </div>
            </div>
        </div>

    </div>
</div>
<?php
}

else 
	{ ?>
	  <div class="co-page-banner-section section" data-page-title="Blog" <?php if ( get_header_image() ){ ?> style="background-image:url('<?php header_image(); ?>')"  <?php } ?>>
        <div class="banner-bg">
            <div class="container">
                <div class="row">
                    <div class="co-page-banner text-center col-xs-12">
                       <?php if (is_home() || is_front_page()) { ?>						
							<h1><?php echo esc_html__('Home', 'elentra') ?></h1>
						<?php } else { ?>
							<h1><?php wp_title(''); ?></h1>							
						<?php } ?>	
                    </div>
                </div>
            </div>
        </div>
    </div>
	<?php
}
?>