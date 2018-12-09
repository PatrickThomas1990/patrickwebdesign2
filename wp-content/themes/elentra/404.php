<?php
/**
* 404 full page with image
* @package Elentra
*/
get_header();

elentra_banner();

?>
<div class="section  pt-140 pb-140">
    <div class="container">
        <div class="row">
            <div class="error-section">
                <img src="<?php echo esc_url( get_template_directory_uri() ) .'/img/logo/404.png'?>" alt="<?php echo esc_attr__('404','elentra'); ?>">
                <h2 class="mb-20 mt-20"><a class="error-btn" href="<?php echo esc_url( home_url( '/' ) ); ?>"> <?php echo esc_html__( 'Go back to homepage', 'elentra' ); ?> </a></h2>
            </div>
        </div>
    </div>
</div>
<?php get_footer(); ?>