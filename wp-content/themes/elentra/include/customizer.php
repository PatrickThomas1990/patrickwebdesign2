<?php
/**
* Elentra Customizer
* @package Elentra
*/

function elentra_customize_register( $wp_customize ) {
	
	/*Select Options in setting*/
	if (!function_exists('elentra_section_option')) :
	    function elentra_section_option()
	    {
	        $elentra_section_option = array(
	            'on' => esc_html__('ON', 'elentra'),
	            'off' => esc_html__('OFF', 'elentra')
	        );
	        return apply_filters('elentra_section_option', $elentra_section_option);
	    }
	endif;

	if (!function_exists('elentra_col_layout_option')) :
	    function elentra_col_layout_option()
	    {
	        $elentra_col_layout_option = array(
	            '6' => esc_html__('2 Column Layout', 'elentra'),
				'4' => esc_html__('3 Column Layout', 'elentra'),
	        );
	        return apply_filters('elentra_col_layout_option', $elentra_col_layout_option);
	    }
	endif;

	/* Sanitization */
	if ( !function_exists('elentra_sanitize_select') ) :
	    function elentra_sanitize_select( $input, $setting ) {

	        // Ensure input is a slug.
	        $input = sanitize_text_field( $input );

	        // Get list of choices from the control associated with the setting.
	        $choices = $setting->manager->get_control( $setting->id )->choices;

	        // If the input is a valid key, return it; otherwise, return the default.
	        return ( array_key_exists( $input, $choices ) ? $input : $setting->default );
	    }
	endif;

	/**
	 * Drop-down Pages sanitization aboutback example.
	 *
	 * - Sanitization: dropdown-pages
	 * - Control: dropdown-pages
	 * 
	 * Sanitization aboutback for 'dropdown-pages' type controls. This aboutback sanitizes `$page_id`
	 * as an absolute integer, and then validates that $input is the ID of a published page.
	 * 
	 * @see absint() https://developer.wordpress.org/reference/functions/absint/
	 * @see get_post_status() https://developer.wordpress.org/reference/functions/get_post_status/
	 *
	 * @param int                  $page    Page ID.
	 * @param WP_Customize_Setting $setting Setting instance.
	 * @return int|string Page ID if the page is published; otherwise, the setting default.
	 */
	function elentra_sanitize_dropdown_pages( $page_id, $setting ) {
		// Ensure $input is an absolute integer.
		$page_id = absint( $page_id );
		
		// If $page_id is an ID of a published page, return it; otherwise, return the default.
		return ( 'publish' == get_post_status( $page_id ) ? $page_id : $setting->default );
	}
	
	/** Front Page Section Settings starts **/

	$wp_customize->add_panel('frontpage', 
		array('title' => esc_html__('Elentra Section Setting', 'elentra'),
		'description' => '',
		'priority' => 5,));
	
	/** Start top bar **/
	$wp_customize->add_section('elentra_header', array(
	    'title'   => esc_html__('Nav Button', 'elentra'),
	    'description' => '',
	    'panel' => 'frontpage',
	    'priority'    => 100
	));

	$wp_customize->add_setting(
	    'elentra_header_button_onoff',
	    array(
	        'default' => 'off',
	        'sanitize_callback' => 'elentra_sanitize_select',
	    )
	);

	$elentra_header_onoff = elentra_section_option();

	$wp_customize->add_control(
	    'elentra_header_button_onoff',
	    array(
	        'type' => 'radio',
	        'label' => esc_html__('Navbar Button', 'elentra'),
	        'description' => esc_html__('show/hide option for heade button.', 'elentra'),
	        'section' => 'elentra_header',
	        'choices' => $elentra_header_onoff,
	        'priority' => 1
	    )
	);

	$wp_customize->add_setting( 'elentra_header_button_text',
	    array(
	        'default' => '',
	        'sanitize_callback' => 'sanitize_text_field',
	    )
	);

	$wp_customize->add_control( 'elentra_header_button_text', array(
	        'label'     => esc_html__( 'Button Text ', 'elentra' ),
	        'section'   => 'elentra_header',
	        'type'      => 'text',
	        'priority'  => 5,
	    )
	);

	$wp_customize->add_setting( 'elentra_header_button_url',
	    array(
	        'default'           => '',
	        'sanitize_callback' => 'esc_url_raw',
	    )
	);

	$wp_customize->add_control( 'elentra_header_button_url', array(
	        'label'             => esc_html__( 'Button URL', 'elentra' ),
	        'section'           => 'elentra_header',
	        'priority'          => 6,
	    )
	);
	/*---------------------------------------------------------------------------------------------------------------*/


	/** Start Front Page Banner Section **/
	$wp_customize->add_section('elentra_banner', array(
	    'title'   => esc_html__('Home Banner', 'elentra'),
	    'description' => '',
	    'panel' => 'frontpage',
	    'priority'    => 110
	));

	$wp_customize->add_setting(
	    'elentra_banner_section_onoff',
	    array(
	        'default' => 'off',
	        'sanitize_callback' => 'elentra_sanitize_select',
	    )
	);

	$elentra_banner_section_onoff_option = elentra_section_option();

	$wp_customize->add_control(
	    'elentra_banner_section_onoff',
	    array(
	        'type' => 'radio',
	        'label' => esc_html__('Top Bar Option', 'elentra'),
	        'description' => esc_html__('on/off option home page banner.', 'elentra'),
	        'section' => 'elentra_banner',
	        'choices' => $elentra_banner_section_onoff_option,
	        'priority' => 1
	    )
	);
		   
	$wp_customize->add_setting('elentra_banner_image', array(     
	'default'   => '',
    'type'      => 'theme_mod',
	'sanitize_callback' => 'esc_url_raw'
    ));

    $wp_customize->add_control(new WP_Customize_Image_Control($wp_customize, 'elentra_banner_image', array(
      'label'    => esc_html__('Image', 'elentra'),
      'section'  => 'elentra_banner',
      'settings' => 'elentra_banner_image',
      'priority' => 2
    )));


    // Banner Title
	$wp_customize->add_setting('elentra_banner_title', array(
	    'default'   => '',
	    'type'      => 'theme_mod',
	   'sanitize_callback'  => 'sanitize_text_field'
	));

	$wp_customize->add_control('elentra_banner_title', array(
	    'label'   => esc_html__('Title', 'elentra'),
	    'section' => 'elentra_banner',
	    'priority'  => 2
	));

	// Banner Sub Title
	$wp_customize->add_setting('elentra_banner_sub_title', array(
	    'default'   => '',
	    'type'      => 'theme_mod',
	    'sanitize_callback' => 'sanitize_text_field'
	));

	$wp_customize->add_control('elentra_banner_sub_title', array(
	    'label'   => esc_html__('Sub Title', 'elentra'),
	    'section' => 'elentra_banner', 
	    'priority'  => 3
	));

	// Button 1 Text
	$wp_customize->add_setting( 'elentra_banner_button1_text', array(
        'default'           => '',
        'sanitize_callback' => 'sanitize_text_field'
	));

	$wp_customize->add_control( 'elentra_banner_button1_text', array(
        'label'     => esc_html__( 'Button Text ', 'elentra' ),
        'section'   => 'elentra_banner',
        'type'      => 'text',
        'priority'  => 4
	));

	// Button 1 URL
	$wp_customize->add_setting( 'elentra_banner_button1_url', array(
        'default'           => '',
        'sanitize_callback' => 'esc_url_raw'
	));

	$wp_customize->add_control( 'elentra_banner_button1_url', array(
        'label'             => esc_html__( 'Button URL', 'elentra' ),
        'section'           => 'elentra_banner',
        'priority'          => 5
	));

	// Button 2 Text
	$wp_customize->add_setting( 'elentra_banner_button2_text', array(
        'default'           =>  '',
        'sanitize_callback' => 'sanitize_text_field'
	));

	$wp_customize->add_control( 'elentra_banner_button2_text', array(
        'label'     => esc_html__( 'Button Text ', 'elentra' ),
        'section'   => 'elentra_banner',
        'type'      => 'text',
        'priority'  => 6
	));

	// Button 1 URL
	$wp_customize->add_setting( 'elentra_banner_button2_url', array(
        'default'           => '',
        'sanitize_callback' => 'esc_url_raw'
	));

	$wp_customize->add_control( 'elentra_banner_button2_url', array(
        'label'             => esc_html__( 'Button URL', 'elentra' ),
        'section'           => 'elentra_banner',
        'priority'          => 7
	));

	/*---------------------------------------------------------------------------------------------------------------*/

	/** Start feature customizer **/
	$wp_customize->add_section('feature',              
		array(
			'title' => esc_html__('Feature Section', 'elentra'),          
			'description' => '',             
			'panel' => 'frontpage',		 
			'priority' => 120
		)
	);

	$wp_customize->add_setting(
		'elentra_feature_section_onoff',
		array(
		    'default' => 'off',
		    'sanitize_callback' => 'elentra_sanitize_select',
		)
	);

	$elentra_feature_section_option = elentra_section_option();

	$wp_customize->add_control(
		'elentra_feature_section_onoff',
		array(
		    'type' => 'radio',
		    'label' => esc_html__('Feature Option', 'elentra'),
		    'description' => esc_html__('on/off option Section.', 'elentra'),
		    'section' => 'feature',
		    'choices' => $elentra_feature_section_option,
		    'priority' => 1
		)
	);

	$feature_no = 3;
	for( $i = 1; $i <= $feature_no; $i++ )
	{
		$elentra_feature_page_icon = 'elentra_feature_page_icon_' . $i;
		$elentra_feature_page = 'elentra_feature_page_' . $i;
		
		// Setting - Feature Icon
		$wp_customize->add_setting( $elentra_feature_page_icon,
			array(
				'default'           => '',
				'sanitize_callback' => 'sanitize_text_field',
			)
		);

		$wp_customize->add_control( $elentra_feature_page_icon,
			array(
				'label'    			=> esc_html__( 'Icon #', 'elentra' ).$i,
				'description' =>  __('Select a icon in this list <a target="_blank" href="https://fontawesome.com/v4.7.0/icons/">Font Awesome icons</a> and enter the class name','elentra'),
				'section'  			=> 'feature',
				'type'     			=> 'text',
				'priority' 			=> 100,
			)
		);

		// Setting - Page
		$wp_customize->add_setting( $elentra_feature_page,
			array(
				'default'           => '',
				'sanitize_callback' => 'elentra_sanitize_dropdown_pages',
			)
		);

		$wp_customize->add_control( $elentra_feature_page,
			array(
				'label'    			=> esc_html__( 'Page #', 'elentra' ) .$i,
				'section'  			=> 'feature',
				'type'     			=> 'dropdown-pages',
				'priority' 			=> 100,
			)
		);
	}
	/*---------------------------------------------------------------------------------------------------------------*/

	/** Start About Customizer **/
	$wp_customize->add_section('about',
		array(
	        'title' => esc_html__('About Section', 'elentra'),          
	    	'description' => '',             
	    	'panel' => 'frontpage',		 
	    	'priority' => 130
	    )
	);
		
	$wp_customize->add_setting(
	    'elentra_about_section_onoff',
	    array(
	        'default' => 'off',
	        'sanitize_callback' => 'elentra_sanitize_select',
	    )
	);

	$elentra_about_section_onoff = elentra_section_option();

	$wp_customize->add_control(

	    'elentra_about_section_onoff',
	    array(
	        'type' => 'radio',
	        'label' => esc_html__('About Option', 'elentra'),
	        'description' => esc_html__('on/off option Section.', 'elentra'),
	        'section' => 'about',
	        'choices' => $elentra_about_section_onoff,
	        'priority' => 1
	    )
	);

	$elentra_about_page = 'elentra_about_page';
	$elentra_about_btntxt = 'elentra_about_btntxt';
	$elentra_about_btnurl = 'elentra_about_btnurl';

	// Setting - Page
	$wp_customize->add_setting( $elentra_about_page,
		array(
			'default'           => 1,
			'sanitize_callback' => 'elentra_sanitize_dropdown_pages',
	));

	$wp_customize->add_control( $elentra_about_page,
		array(
			'label'    			=> esc_html__( 'About Page ', 'elentra' ),
			'section'  			=> 'about',
			'type'     			=> 'dropdown-pages',
			'priority' 			=> 100,
		)
	);

	$wp_customize->add_setting( $elentra_about_btntxt,
	    array(
	        'default'           => '',
	        'sanitize_callback' => 'sanitize_text_field',
	    )
	);

	$wp_customize->add_control( $elentra_about_btntxt,
	    array(
	        'label'             => esc_html__( 'Text ', 'elentra' ),
	        'section'           => 'about',
	        'type'              => 'text',
	        'priority'          => 100,
	    )
	);

	$wp_customize->add_setting( $elentra_about_btnurl,
	    array(
	        'default'           => '',
	        'sanitize_callback' => 'esc_url_raw',
	    )
	);

	$wp_customize->add_control( $elentra_about_btnurl,
	    array(
	        'label'             => esc_html__( 'URL', 'elentra' ),
	        'section'           => 'about',
	        'priority'          => 100,
	    )
	);

	/*---------------------------------------------------------------------------------------------------------------*/


	/** Start service customizer **/
	$wp_customize->add_section('service',              
		array(
			'title' => esc_html__('Service Section', 'elentra'),          
			'description' => '',             
			'panel' => 'frontpage',		 
			'priority' => 140
		)
	);

	$wp_customize->add_setting(
		'elentra_service_section_onoff',
		array(
		    'default' => 'off',
		    'sanitize_callback' => 'elentra_sanitize_select',
		)
	);

	$elentra_service_section_option = elentra_section_option();

	$wp_customize->add_control(
		'elentra_service_section_onoff',
		array(
		    'type' => 'radio',
		    'label' => esc_html__('Services Option', 'elentra'),
		    'description' => esc_html__('on/off option Section.', 'elentra'),
		    'section' => 'service',
		    'choices' => $elentra_service_section_option,
		    'priority' => 1
		)
	);

	 
	// Services Title
	$wp_customize->add_setting('elentra_service_title', array(
		'default'   => '',
	  	'type'      => 'theme_mod',
	  	'sanitize_callback'	=> 'sanitize_text_field'
	));

	$wp_customize->add_control('elentra_service_title', array(
		'label'   => esc_html__('Services Section Title', 'elentra'),
		'section' => 'service',
		'priority'  => 3
	));

	// Services Subtitle
	$wp_customize->add_setting('elentra_service_subtitle', array(
		'default'   => '',
	  	'type'      => 'theme_mod',
	  	'sanitize_callback'	=> 'sanitize_text_field'
	));

	$wp_customize->add_control('elentra_service_subtitle', array(
		'label'   => esc_html__('Services Section Sub Title', 'elentra'),
		'section' => 'service',
		'priority'  => 4
	));

	$service_no = 6;
	
	for( $i = 1; $i <= $service_no; $i++ )
	{
		$elentra_service_icon = 'elentra_service_icon_' . $i;
		$elentra_service_page = 'elentra_service_page_' . $i;
		
		// Setting - Feature Icon
		$wp_customize->add_setting( $elentra_service_icon,
			array(
				'default'           => '',
				'sanitize_callback' => 'sanitize_text_field',
			)
		);

		$wp_customize->add_control( $elentra_service_icon,
			array(
				'label'    			=> esc_html__( 'Service Icon ', 'elentra' ).$i,
				'description' =>  __('Select a icon in this list <a target="_blank" href="https://fontawesome.com/v4.7.0/icons/">Font Awesome icons</a> and enter the class name','elentra'),
				'section'  			=> 'service',
				'type'     			=> 'text',
				'priority' 			=> 100,
			)
		);

		// Setting - Page
		$wp_customize->add_setting( $elentra_service_page,
			array(
				'default'           => 1,
				'sanitize_callback' => 'elentra_sanitize_dropdown_pages',
			)
		);

		$wp_customize->add_control( $elentra_service_page,
			array(
				'label'    			=> esc_html__( 'Service Page ', 'elentra' ) .$i,
				'section'  			=> 'service',
				'type'     			=> 'dropdown-pages',
				'priority' 			=> 100,
			)
		);
	}
	/*---------------------------------------------------------------------------------------------------------------*/
	
	/** Start portfolio customizer **/
	$wp_customize->add_section('portfolio',              
	    array(
	        'title' => esc_html__('Portfolio Section', 'elentra'),          
	        'description' => '',             
	        'panel' => 'frontpage',		 
	        'priority' => 150
	    )
	);

	$wp_customize->add_setting(
	    'elentra_portfolio_section_onoff',
	    array(
	        'default' => 'off',
	        'sanitize_callback' => 'elentra_sanitize_select',
	    )
	);

	$elentra_portfolio_section_option = elentra_section_option();

	$wp_customize->add_control(

	    'elentra_portfolio_section_onoff',
	    array(
	        'type' => 'radio',
	        'label' => esc_html__('Portfolio Option', 'elentra'),
	        'description' => esc_html__('on/off option Section.', 'elentra'),
	        'section' => 'portfolio',
	        'choices' => $elentra_portfolio_section_option,
	        'priority' => 1
	    )
	);

	// Portfolio title
	$wp_customize->add_setting('elentra_portfolio_title', array(
	    'default'   => '',
	    'type'      => 'theme_mod',
	   'sanitize_callback'  => 'sanitize_text_field'
	));

	$wp_customize->add_control('elentra_portfolio_title', array(
	    'label'   => esc_html__('Title', 'elentra'),
	    'section' => 'portfolio',
	    'priority'  => 2
	));

	// portfolio sub title
	$wp_customize->add_setting('elentra_portfolio_subtitle', array(
	    'default'   => '',
	    'type'      => 'theme_mod',
	    'sanitize_callback' => 'sanitize_text_field'
	));

	$wp_customize->add_control('elentra_portfolio_subtitle', array(
	    'label'   => esc_html__('Sub Title', 'elentra'),
	    'section' => 'portfolio', 
	    'priority'  => 3
	));

	$portfolio_no = 6;

	for( $i = 1; $i <= $portfolio_no; $i++ )
	{
	    $elentra_portfoliopage = 'elentra_portfolio_page_' . $i;

	    // Setting - Page
	    $wp_customize->add_setting( $elentra_portfoliopage,
	        array(
	            'default'           => 1,
	            'sanitize_callback' => 'elentra_sanitize_dropdown_pages',
	        )
	    );

	    $wp_customize->add_control( $elentra_portfoliopage,
	        array(
	            'label'             => esc_html__( 'Page ', 'elentra' ) .$i,
	            'section'           => 'portfolio',
	            'type'              => 'dropdown-pages',
	            'priority'          => 100,
	        )
	    );
	}
	/*---------------------------------------------------------------------------------------------------------------*/

	/** Start blog customizer **/
	$wp_customize->add_section('blog',              
		array(
	        'title' => esc_html__('Blog Section', 'elentra'),          
	    	'description' => '',             
	    	'panel' => 'frontpage',		 
	    	'priority' => 160
	    )
	);

	$wp_customize->add_setting(
	    'elentra_blog_section_onoff',
	    array(
	        'default' => 'off',
	        'sanitize_callback' => 'elentra_sanitize_select',
	    )
	);

	$elentra_blog_section_option = elentra_section_option();

	$wp_customize->add_control(

	    'elentra_blog_section_onoff',
	    array(
	        'type' => 'radio',
	        'label' => esc_html__('Blog Option', 'elentra'),
	        'description' => esc_html__('on/off option Section.', 'elentra'),
	        'section' => 'blog',
	        'choices' => $elentra_blog_section_option,
	        'priority' => 1
	    )
	);

	// Blog title
	$wp_customize->add_setting('elentra_blog_title', array(
	    'default'   => '',
	    'type'      => 'theme_mod',
	   'sanitize_callback'  => 'sanitize_text_field'
	));

	$wp_customize->add_control('elentra_blog_title', array(
	    'label'   => esc_html__('Title', 'elentra'),
	    'section' => 'blog',
	    'priority'  => 2
	));

	// blog sub title
	$wp_customize->add_setting('elentra_blog_subtitle', array(
	    'default'   => '',
	    'type'      => 'theme_mod',
	    'sanitize_callback' => 'sanitize_text_field'
	));

	$wp_customize->add_control('elentra_blog_subtitle', array(
	    'label'   => esc_html__('Sub Title', 'elentra'),
	    'section' => 'blog', 
	    'priority'  => 3
	));
	/*---------------------------------------------------------------------------------------------------------------*/

	/** Start callout customizer **/
	$wp_customize->add_section('callout',
		array(
	        'title' => esc_html__('Callout Section', 'elentra'),          
	    	'description' => '',             
	    	'panel' => 'frontpage',		 
	    	'priority' => 170
	    )
	);
	
	$wp_customize->add_setting(
	    'elentra_callout_section_onoff',
	    array(
	        'default' => 'off',
	        'sanitize_callback' => 'elentra_sanitize_select',
	    )
	);

	$elentra_callout_section_option = elentra_section_option();

	$wp_customize->add_control(
	    'elentra_callout_section_onoff',
	    array(
	        'type' => 'radio',
	        'label' => esc_html__('Callout Option', 'elentra'),
	        'description' => esc_html__('on/off option for Footer Section.', 'elentra'),
	        'section' => 'callout',
	        'choices' => $elentra_callout_section_option,
	        'priority' => 1
	    )
	);

	$elentra_callout_text = 'elentra_callout_text';
	$elentra_callout_btntxt = 'elentra_callout_btntxt';
	$elentra_callout_btnurl = 'elentra_callout_btnurl';

	// Setting - Page
	$wp_customize->add_setting( $elentra_callout_text,
	    array(
	        'default'           => '',
	        'sanitize_callback' => 'sanitize_text_field',
	    )
	);

	$wp_customize->add_control( $elentra_callout_text,
	    array(
	        'label'             => esc_html__( 'Text', 'elentra' ),
	        'section'           => 'callout',
	        'type'              => 'text',
	        'priority'          => 100,
	    )
	);

	$wp_customize->add_setting( $elentra_callout_btntxt,
	    array(
	        'default'           => '',
	        'sanitize_callback' => 'sanitize_text_field',
	    )
	);

	$wp_customize->add_control( $elentra_callout_btntxt,
	    array(
	        'label'             => esc_html__( 'Button Text ', 'elentra' ),
	        'section'           => 'callout',
	        'type'              => 'text',
	        'priority'          => 100,
	    )
	);

	$wp_customize->add_setting( $elentra_callout_btnurl,
	    array(
	        'default'           => '',
	        'sanitize_callback' => 'esc_url_raw',
	    )
	);

	$wp_customize->add_control( $elentra_callout_btnurl,
	    array(
	        'label'             => esc_html__( 'URL', 'elentra' ),
	        'section'           => 'callout',
	        'priority'          => 100,
	    )
	);
	/*---------------------------------------------------------------------------------------------------------------*/

	/** Start footer customizer **/
	$wp_customize->add_section('footer', array(
	    'title'   => esc_html__('Footer Section', 'elentra'),
	    'description' => '',
	    'panel' => 'frontpage',
	    'priority'    => 180
	));

	$wp_customize->add_setting(
	    'elentra_footer_section_onoff',
	    array(
	        'default' => 'off',
	        'sanitize_callback' => 'elentra_sanitize_select',
	    )
	);

	$elentra_footer_section_option = elentra_section_option();

	$wp_customize->add_control(
	    'elentra_footer_section_onoff',
	    array(
	        'type' => 'radio',
	        'label' => esc_html__('Footer Option', 'elentra'),
	        'description' => esc_html__('on/off option for Footer Section.', 'elentra'),
	        'section' => 'footer',
	        'choices' => $elentra_footer_section_option,
	        'priority' => 1
	    )
	);

	$wp_customize->add_setting('elentra_footer_text', array(
	    'default'   => '',
	    'type'      => 'theme_mod',
	    'sanitize_callback'	=> 'sanitize_text_field'
	));

	$wp_customize->add_control('elentra_footer_text', array(
	    'label'   => esc_html__('Copy right text', 'elentra'),
	    'section' => 'footer',
	    'priority'  => 2
	));

	$social_icon_no = 5;
	for( $i = 1; $i <= $social_icon_no; $i++ )
	{
		$elentra_social_icon_url = 'elentra_social_icon_url_' . $i;
	
		$wp_customize->add_setting( $elentra_social_icon_url, array(
	        'default'           => '',
	        'sanitize_callback' => 'esc_url_raw'
		));

		$wp_customize->add_control( $elentra_social_icon_url, array(

	        'label'             => esc_html__( 'Social Icon URL', 'elentra' ),
	        'section'           => 'footer',
	        'priority'          => 100
		));
	}

	/*---------------------------------------------------------------------------------------------------------------*/

	/** Front Page Section Settings end **/	
}

add_action( 'customize_register', 'elentra_customize_register' );

remove_filter( 'the_content', 'wpautop' );