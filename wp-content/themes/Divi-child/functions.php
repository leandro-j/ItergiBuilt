<?php
add_action( 'wp_enqueue_scripts', 'my_theme_enqueue_styles' );
function my_theme_enqueue_styles() {
    wp_enqueue_style( 'parent-style', get_template_directory_uri() . '/style.css' );
	wp_enqueue_style( 'custom_css', get_stylesheet_directory_uri() . '/css/custom.css' );
	wp_enqueue_style( 'custom_css2', get_stylesheet_directory_uri() . '/css/custom2.css' );
	wp_enqueue_style( 'owl_css', get_stylesheet_directory_uri() . '/css/owl.css' );
	wp_enqueue_style( 'owl_theme_css', get_stylesheet_directory_uri() . '/css/owl.theme.default.css' );
	wp_enqueue_script( 'owl_js', get_stylesheet_directory_uri() . '/js/owl.carousel.min.js',false);
	wp_enqueue_script( 'custom-js', get_stylesheet_directory_uri() . '/js/custom.js?'.time(),false);
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

function work_custom_post_type(){
	$args = array(
		'label'=>'Our Work',
		'public'=>true,
		'show_ui'=>true,
		'capability_type'=>'post',
		'has_archive'=>true,
		'hierarchical' => false,
        'rewrite' => array('slug' => 'work'),
        'query_var' => true,
        'menu_icon' => 'dashicons-admin-post',
        'supports' => array(
            'title',
            'editor',
            'excerpt',
            'trackbacks',
            'custom-fields',
            'comments',
            'revisions',
            'thumbnail',
            'author',
            'page-attributes',
            )
	);
	register_post_type( 'work', $args );
}
add_action('init','work_custom_post_type',0);

function work_custom_category() {
  $args = array(
    'label' => 'Categories',
    'hierarchical' => true,
    'show_ui'=>true,
    "rewrite" => array( 'slug' => 'our-work','with_front'=> false )
  );
  register_taxonomy( 'work_category',array('work'), $args );
}
add_action( 'init', 'work_custom_category');

/*divi faq toggle*/
add_action('wp_footer','faq_toggle_closed_default');
function faq_toggle_closed_default(){?>
	<script>
	jQuery(function($){
		$('.et_pb_accordion .et_pb_toggle_open').addClass('et_pb_toggle_close').removeClass('et_pb_toggle_open');

		$('.et_pb_accordion .et_pb_toggle').click(function() {
			$this = $(this);
			setTimeout(function(){
				$this.closest('.et_pb_accordion').removeClass('et_pb_accordion_toggling');
			},700);
		});	
	});
	jQuery(window).load(function(){
		var distance = jQuery('.scroll_sticky,.main-menu').offset().top,
		$window = jQuery(window);
		jQuery(window).scroll(function(){			
			if ( $window.scrollTop() >= distance  ) {
				jQuery('.scroll_sticky,.main-menu').addClass('fixed-header');
			} else {
				jQuery('.scroll_sticky,.main-menu').removeClass('fixed-header');
			}			
		});
	});
	</script>
<?php }

add_action('init','image_resize_custom');
function image_resize_custom(){
	add_image_size( 'work-cropped-480x350', 480, 350, true );
}

/*******Contact Form Date Slider*********/
function contact_date_shortcode(){
	ob_start();
	?>
	<?php
		$current_date = date('Y/m/d');
		$period = new DatePeriod(new DateTime($current_date), new DateInterval('P1D'), new DateTime('2020-01-15 +1 day'));
		?>
		<div class="slider_section">
		<div id="owl-demo" class="owl-carousel owl-theme">
			<?php foreach ($period as $date) {
			$dates1 = $date->format("D");
			$current_date1 = $date->format("Y/m/d");
			$dates = $date->format("M d");
			if($current_date1 == $current_date){
				if($dates1 == 'Mon' || $dates1 == 'Tue' || $dates1 == 'Wed' || $dates1 == 'Thu'  ){
					echo '<div class="item unavailable"><h3>-Today-</h3>
				<div class="date_cricle"><a href=""><h4>'. $dates1 .'</h4><p>'.$dates.'</p></a></div>
				<h5>Unavailable</h5>
			</div>';
				}
			}elseif($dates1 == 'Mon' || $dates1 == 'Tue' || $dates1 == 'Wed' || $dates1 == 'Thu'  ){
				echo '<div class="item">
				<div class="date_cricle"><a href=""><h4>'. $dates1 .'</h4><p>'.$dates.'</p></a></div>
			</div>';
			}?>
			<?php } ?>
		</div>
	</div>
	<?Php
	return ob_get_clean();
}
add_shortcode('contact_date_shortcode','contact_date_shortcode');