<?php
/**
* This is the template for the hedaer
* @package Elentra
*/
?>

<!DOCTYPE html>
<html <?php language_attributes(); ?>>
	<head>
		<meta charset="<?php bloginfo( 'charset' ); ?>">
		<meta name="viewport" content="width=device-width, initial-scale=1">
		<meta http-equiv="x-ua-compatible" content="ie=edge">
		<link rel="profile" href="http://gmpg.org/xfn/11">
		<?php if( is_singular() && pings_open( get_queried_object() ) ): ?>
			<link rel="pingback" href="<?php bloginfo( 'pingback_url' ); ?>">
		<?php endif; ?>
		<?php wp_head(); ?>
	</head>

<body <?php body_class(); ?> >
    
    <div id="loader-wrapper">
        <svg viewBox="-2000 -1000 4000 2000">
            <path id="inf" d="M354-354A500 500 0 1 1 354 354L-354-354A500 500 0 1 0-354 354z"></path>
            <use xlink:href="#inf" stroke-dasharray="1570 5143" stroke-dashoffset="6713px"></use>
        </svg>
    </div>
    <!--Corporate 1 Header Section-->
    <div class="header-section  header-sticky">
        <div class="container">
            <div class="row">
                <div class="col-xs-12">
                    <!--Logo-->
                    <div class="float-left">

                        <?php if (has_custom_logo()) :
                            the_custom_logo();
                        else :  
						if (display_header_text()==true){?>
                            <a href="<?php echo esc_url( home_url( '/' ) ); ?>" class="header-logo">
                            <?php bloginfo( 'title' ); ?>
				            </a>     
						 <?php }		
                          endif; ?>

                    </div>
                    <!--Menu-->
                    <?php if ( has_nav_menu( 'primary' ) ) : ?>
                        <div class="float-right">
                            <nav class="main-menu multi-page-menu text-black">
                                <?php
                                    wp_nav_menu( array(
                                        'theme_location' => 'primary',
                                        'container' => false,
                                        'menu_class' => '',
                                        'walker' => new Elentra_Walker_Nav_Primary()
                                    ) ); 
                                ?>
                            </nav>

                            <?php
                                $elentra_header_button_onoff = get_theme_mod("elentra_header_button_onoff",'off');
                                $bt_text = get_theme_mod("elentra_header_button_text", '');
                                $bt_url = get_theme_mod("elentra_header_button_url", '');

                                if ($elentra_header_button_onoff == 'on') :
                                    if ( $bt_text ) :
                            ?>
                                <a href="<?php echo esc_url( $bt_url ); ?>" class="btn btn-border-gradient btn-hover-gradient"> <?php echo esc_html( $bt_text ); ?> </a>
                            <?php endif; endif; ?>
                        </div>
                        <!--Mobile Menu-->
                        <div class="mobile-menu multi-page text-black"></div>
                    <?php else: ?>
                        <div class="float-right">
                            <nav class="main-menu multi-page-menu text-black">
                                <div class="menu-text"> <?php echo esc_html__( 'Add Menu Here', 'elentra' ); ?></div>
                            </nav>
                            <?php
                                $elentra_header_button_onoff = get_theme_mod("elentra_header_button_onoff",'off');
                                $bt_text = get_theme_mod("elentra_header_button_text", '');
                                $bt_url = get_theme_mod("elentra_header_button_url", '');

                                if ($elentra_header_button_onoff == 'on' ) :

                                    if ( $bt_text ) :
                                ?>
                                <a href="<?php echo esc_url( $bt_url ); ?>" class="btn btn-border-gradient btn-hover-gradient"> <?php echo esc_html( $bt_text ); ?> </a>
                                <?php endif; endif; ?>
                        </div>
                    <?php endif; ?>
                </div>
            </div>
        </div>
    </div>