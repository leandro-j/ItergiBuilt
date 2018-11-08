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

function share_icon_shortcode(){
	ob_start();
	?>
	<ul class="footer_social">
		<?php if ( 'on' === et_get_option( 'divi_show_google_icon', 'on' ) ) : ?>
			<li class="et-social-icon et-social-google-plus">
				<a href="<?php echo esc_url( et_get_option( 'divi_google_url', '#' ) ); ?>" class="icon1">
					<i class="fa fa-google-plus"></i>
				</a>
			</li>
		<?php endif; ?>
		<?php if ( 'on' === et_get_option( 'divi_show_facebook_icon', 'on' ) ) : ?>
			<li class="et-social-icon et-social-facebook">
				<a href="<?php echo esc_url( et_get_option( 'divi_facebook_url', '#' ) ); ?>" class="icon1">
					<i class="fa fa-facebook"></i>
				</a>
			</li>
		<?php endif; ?>
		<?php if ( 'on' === et_get_option( 'divi_show_twitter_icon', 'on' ) ) : ?>
			<li class="et-social-icon et-social-twitter">
				<a href="<?php echo esc_url( et_get_option( 'divi_twitter_url', '#' ) ); ?>" class="icon1">
					<i class="fa fa-twitter"></i>
				</a>
			</li>
		<?php endif; ?>
		<?php if ( 'on' === et_get_option( 'divi_show_instagram_icon', 'on' ) ) : ?>
			<li class="et-social-icon et-social-instagram">
				<a href="<?php echo esc_url( et_get_option( 'divi_instagram_url', '#' ) ); ?>" class="icon1">
					<i class="fa fa-instagram"></i>
				</a>
			</li>
		<?php endif; ?>
		<?php if ( 'on' === et_get_option( 'divi_show_linkedin_icon', 'on' ) ) : ?>
			<li class="et-social-icon et-social-linkedin">
				<a href="<?php echo esc_url( et_get_option( 'divi_linkedin_url', '#' ) ); ?>" class="icon1">
					<i class="fa fa-linkedin"></i>
				</a>
			</li>
		<?php endif; ?>

		<?php if ( 'on' === et_get_option( 'divi_show_rss_icon', 'on' ) ) : ?>
		<?php
			$et_rss_url = '' !== et_get_option( 'divi_rss_url' )
				? et_get_option( 'divi_rss_url' )
				: get_bloginfo( 'rss2_url' );
		?>
			<li class="et-social-icon et-social-rss">
				<a href="<?php echo esc_url( $et_rss_url ); ?>" class="icon">
					<span><?php esc_html_e( 'RSS', 'Divi' ); ?></span>
				</a>
			</li>
		<?php endif; ?>

	</ul>	
	
<?php	return ob_get_clean();
}
add_shortcode('share_icon_shortcode','share_icon_shortcode');	