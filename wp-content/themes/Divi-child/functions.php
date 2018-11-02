<?php
add_action( 'wp_enqueue_scripts', 'my_theme_enqueue_styles' );
function my_theme_enqueue_styles() {
    wp_enqueue_style( 'parent-style', get_template_directory_uri() . '/style.css' );

}


function my_custom_sidebar() {
    register_sidebar(
        array (
            'name' => __( 'Footer Bottom', 'Divi' ),
            'id' => 'footer_bottom',
            'description' => __( 'Footer Sidebar', 'Divi' ),
            'before_widget' => '<div class="footer_bottom">',
            'after_widget' => "</div>",
            'before_title' => '<h3 class="footer_bottom_heading">',
            'after_title' => '</h3>',
        )
    );
}
add_action( 'widgets_init', 'my_custom_sidebar' );

 function custom_register_theme_customizer( $wp_customize ) {
 
    $wp_customize->add_section('home_page_banner_section', array(
		'title'          => 'Home Page Banner Section'
	));
		//adding setting for footer text area
	$wp_customize->add_setting('sk_home_top_slider_image1',array(
			'default'		=> 'wp-content/uploads/2018/11/pic1.png',
			'sanitize_callback'	=> 'esc_url_raw',
			'transport'		=> 'postMessage'
		)
	);
	$wp_customize->add_control(
		new WP_Customize_Image_Control($wp_customize,'sk_home_top_slider_image1',
			array(
				'settings'		=> 'sk_home_top_slider_image1',
				'section'		=> 'home_page_banner_section',
				'label'			=> __( 'Banner First Image', 'theme-slug' ),
				'description'	=> __( 'Select the image to be used for Home Top Background.', 'theme-slug' )
			)
		)
	); 
	$wp_customize->add_setting('sk_home_top_slider_image2',array(
			'default'		=> 'wp-content/uploads/2018/11/pic2.png',
			'sanitize_callback'	=> 'esc_url_raw',
			'transport'		=> 'postMessage'
		)
	);
	$wp_customize->add_control(
		new WP_Customize_Image_Control($wp_customize,'sk_home_top_slider_image2',
			array(
				'settings'		=> 'sk_home_top_slider_image2',
				'section'		=> 'home_page_banner_section',
				'label'			=> __( 'Banner Second Image', 'Divi' ),
			)
		)
	);
	$wp_customize->add_setting('banner_btn_text', array(
		'default'        => 'INTEGRITY ABOVE',
	 ));
	$wp_customize->add_control('banner_btn_text', array(
	 'label'   => 'Banner Button Text',
	  'section' => 'home_page_banner_section',
	 'type'    => 'text',
	));
	$wp_customize->add_setting('banner_btn_link', array(
	 'default'        => 'example@gmail.com',
	 ));
	$wp_customize->add_control('banner_btn_link', array(
	 'label'   => 'Banner Button Link',
	  'section' => 'home_page_banner_section',
	 'type'    => 'text',
	));	
}
add_action( 'customize_register', 'custom_register_theme_customizer' );