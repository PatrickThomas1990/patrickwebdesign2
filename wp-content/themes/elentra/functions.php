<?php
/**
* @package Elentra
*/

function elentra_content_width() {
	$GLOBALS['content_width'] = apply_filters( 'elentra_content_width', 980 );
}
add_action( 'after_setup_theme', 'elentra_content_width', 0 );

function elentra_custom_excerpt_length( $length ) {
    return 30;
}
add_filter( 'excerpt_length', 'elentra_custom_excerpt_length', 900 );

if( ! function_exists( 'elentra_theme_setup' ) ) {


	function elentra_theme_setup() {

		// Add default posts and comments RSS feed links to head.
		add_theme_support( 'automatic-feed-links' );
       // Add title tag 
		add_theme_support( 'title-tag' );

		// Add default logo support
        add_theme_support( 'custom-logo');

        add_theme_support('post-thumbnails');
        add_image_size('elentra-page-thumbnail',738,423, true);
        add_image_size('elentra-blog-thumbnail',738,400, true);
        add_image_size('elentra-blog-front-thumbnail', 370, 270, true);
        add_image_size('elentra-projects-thumbnail',450,400, true);
        
         // Add theme support for Semantic Markup
		add_theme_support( 'html5', array(
			'search-form',
			'comment-form',
			'comment-list',
			'gallery',
			'caption'
		) ); 

		$defaults = array(
			'default-image' => get_template_directory_uri() .'/img/page-banner.jpg',
			'width'         => 1920,
			'height'        => 540,
			'uploads'       => true,
			'default-text-color'     => "000",
			'wp-head-callback'       => 'elentra_header_style',
		);

		add_theme_support( 'custom-header', $defaults );

		// Menus
		register_nav_menus(array(
       		'primary' => esc_html__('Primary Menu', 'elentra'),
       ));
		// add excerpt support for pages
        add_post_type_support( 'page', 'excerpt' );

        if ( is_singular() && comments_open() ) {
			wp_enqueue_script( 'comment-reply' );
        }
		  // Add theme support for selective refresh for widgets.
        add_theme_support( 'customize-selective-refresh-widgets' );
		
		//About Theme		
		if ( is_admin() ) {
			require( get_template_directory() . '/include/welcome-screen.php');
		}	 
		 
    	// To use additional css
 	    add_editor_style( 'assets/css/editor-style.css' );
	}
	add_action( 'after_setup_theme', 'elentra_theme_setup' );
}

function elentra_header_style()
{
	$header_text_color = get_header_textcolor();
	?>
		<style type="text/css">
			<?php
				//Check if user has defined any header image.
				if ( get_header_image() ) :
			?>
				.header-logo{
					color: #<?php echo esc_attr($header_text_color); ?>;
					
				}
			<?php endif; ?>	
		</style>
	<?php

}

/*
* TGM plugin activation register hook 
*/

require_once get_template_directory() . '/include/pro-features.php';
//require_once get_template_directory() . '/extras/theme-default-setup.php';

/**
 * Load Upsell Button In Customizer
 * 2016 &copy; [Justin Tadlock](http://justintadlock.com).
 */

require_once( trailingslashit( get_template_directory() ) . '/include/upgrade/class-customize.php' );

add_action( 'admin_init', 'elentra_detect_button' );
	function elentra_detect_button() {
	wp_enqueue_style( 'elentra-info-button', get_template_directory_uri() . '/css/import-button.css' );
}

/**
 * admin  JS scripts
 */
function elentra_admin_enqueue_scripts( $hook ) { 
	wp_enqueue_style( 
		'font-awesome', 
		get_template_directory_uri() . '/css/font-awesome.css', 
		array(), 
		'4.7.0', 
		'all' 
	);
	wp_enqueue_style( 
		'erzen-admin', 
		get_template_directory_uri() . '/css/admin/css/admin.css', 
		array(), 
		'1.0.0', 
		'all' 
	);
 
}
add_action( 'admin_enqueue_scripts', 'elentra_admin_enqueue_scripts' );



/**
 * Enqueue CSS stylesheets
 */		
if( ! function_exists( 'elentra_enqueue_styles' ) ) {
	function elentra_enqueue_styles() {	
	    wp_enqueue_style('elentra-font', 'https://fonts.googleapis.com/css?family=Open+Sans:300,300i,400,400i,600,700,800|Playfair+Display:400,400i,700,700i','');
		wp_enqueue_style('bootstrap', get_template_directory_uri() . '/css/bootstrap.css');
		wp_enqueue_style('font-awesome', get_template_directory_uri() .'/css/font-awesome.css');
		wp_enqueue_style('etline', get_template_directory_uri() .'/css/et-line.css');
		wp_enqueue_style('meanmenu', get_template_directory_uri() .'/css/meanmenu.css');
		wp_enqueue_style('animate', get_template_directory_uri() . '/css/animate.css');
		wp_enqueue_style('magnificpopup', get_template_directory_uri() .'/css/magnificpopup.css');
		wp_enqueue_style('elentra-default', get_template_directory_uri() .'/css/default.css');
		wp_enqueue_style('elentra-buttons', get_template_directory_uri() .'/css/buttons.css');
		// main style
		wp_enqueue_style( 'elentra-style', get_stylesheet_uri() );
		wp_enqueue_style('elentra-header', get_template_directory_uri() .'/css/header.css');
		wp_enqueue_style('responsive', get_template_directory_uri() .'/css/responsive.css');
	}
	add_action( 'wp_enqueue_scripts', 'elentra_enqueue_styles' );
}

/**
 * Enqueue JS scripts
 */

if( ! function_exists( 'elentra_enqueue_scripts' ) ) {
	function elentra_enqueue_scripts() {   
		wp_enqueue_script('jquery');
		wp_enqueue_script('bootstrap', get_template_directory_uri() . '/js/bootstrap.js',array(),'', true);
		wp_enqueue_script('magnificpopup', get_template_directory_uri() . '/js/magnificpopup.js',array(),'', true);
		wp_enqueue_script('meanmenu', get_template_directory_uri() . '/js/meanmenu.js',array(),'', true);	
		wp_enqueue_script('scrollup', get_template_directory_uri() . '/js/scrollup.js',array(),'', true);
		wp_enqueue_script('elentra-main', get_template_directory_uri() . '/js/main.js',array(),'', true);
	}
	add_action( 'wp_enqueue_scripts', 'elentra_enqueue_scripts' );
}

require get_template_directory() . '/include/templates/header-banner.php';

require get_template_directory() . '/include/elentra-nav-walker.php';

require get_template_directory() . '/include/customizer.php';
/*
	============================
	 SIDEBAR FUNCTIONS
	============================
*/
function elentra_sidebar_init() {

	// Blog Post Sidebar

	register_sidebar( 
		array(
			'name' => esc_html__( 'Elentra Sidebar', 'elentra'),
			'id' => 'blog_post_sidebar',
			'description' => esc_html__('Dynamic Right Sidebar','elentra'),
			'before_widget' => '<div id="%1$s" class="co-blog-sidebar %2$s">',
			'after_widget' => '</div>',
			'before_title' => '<h5 class="sidebar-title">',
			'after_title' => '</h5>'
		)
	);

	// Footer Sidebar
	
	register_sidebar(array(
		'name' => esc_html__( 'Footer Widget Area 1', 'elentra'),
		'id' => 'elentra-footer-widget-area-1',
		'description' => esc_html__( 'The footer widget area 1', 'elentra'),
		'before_widget' => ' <div class="co-footer-widget-1 %2$s">',
		'after_widget' => '</div> ',
		'before_title' => '<h4 class="title">',
		'after_title' => '</h4>',
	));	
	
	register_sidebar(array(
		'name' => esc_html__( 'Footer Widget Area 2', 'elentra'),
		'id' => 'elentra-footer-widget-area-2',
		'description' => esc_html__( 'The footer widget area 2', 'elentra'),
		'before_widget' => '<div class="co-footer-widget-1 %2$s"> ',
		'after_widget' => ' </div>',
		'before_title' => '<h4 class="title">',
		'after_title' => '</h4>',
	));	
	
	register_sidebar(array(
		'name' => esc_html__( 'Footer Widget Area 3', 'elentra'),
		'id' => 'elentra-footer-widget-area-3',
		'description' => esc_html__( 'The footer widget area 3', 'elentra'),
		'before_widget' => '<div class="co-footer-widget-1 %2$s">',
		'after_widget' => '</div>',
		'before_title' => '<h4 class="title">',
		'after_title' => '</h4>',
	));	
}
add_action( 'widgets_init', 'elentra_sidebar_init' );


function elentra_comments_data( $comment, $args, $depth ) {  ?>
    <div <?php comment_class('comments'); ?> id="<?php comment_ID() ?>">
        <?php if ($comment->comment_approved == '0') : ?>
		    <div class="alert alert-info">
		      <p><?php esc_html__( 'Your comment is awaiting moderation.', 'elentra' ) ?></p>
		    </div>
	    <?php endif; ?>
        <li>
        	<div class="co-single-comment fix">
        		<div class="image float-left">
					<?php echo get_avatar( $comment,'88', null,'User', array( 'class' => array( 'media-object','' ) )); ?>
				</div>

				<div class="content fix">
					<div class="head">
						<h5>
							<?php 
								/* translators: '%1$s %2$s: edit term */
								printf(
									esc_html( '%1$s', 'elentra' ),
									get_comment_author_link() )
							?>
						</h5>
						<span>
							<?php 
								$posted_on = human_time_diff( get_the_time('U') , current_time('timestamp') );
								echo esc_html($posted_on . ' ago', 'elentra');
							?></span>
					</div>
					<span class="reply">
					<?php comment_reply_link(array_merge( $args, array('depth' => $depth, 'max_depth' => $args['max_depth']))) ?>
					</span>
					<!-- <a href="" class="reply"><i class="fa fa-reply"></i> </a> -->

					<?php 
			
						comment_text();

						printf(
							/* translators: '%1$s: edit term */
							esc_html( '%1$s', 'elentra' ),
							edit_comment_link(esc_html__( 'Edit', 'elentra' ))
						)
					?>
			</div>
        </li>
    </div>
<?php } ?>