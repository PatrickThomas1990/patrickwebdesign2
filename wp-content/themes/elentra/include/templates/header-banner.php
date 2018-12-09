<?php

if( !function_exists('elentra_banner') ):
    function elentra_banner() { ?>
    <!--Corporate Page Banner Section-->
    <div class="co-page-banner-section section" data-page-title="Blog" <?php if ( get_header_image() ){ ?> style="background-image:url('<?php header_image(); ?>')"  <?php } ?>>
        <div class="banner-bg">
            <div class="container">
                <div class="row">
                    <div class="co-page-banner text-center col-xs-12">
                       <?php if (is_home() || is_front_page()) { ?>						
							<h1><?php echo esc_html__('Blog', 'elentra') ?></h1>
						<?php } else { ?>
							<h1><?php wp_title(''); ?></h1>							
						<?php } ?>	
                    </div>
                </div>
            </div>
        </div>
    </div>
    <!-- Start Main content Wrapper -->
<?php } endif; ?>