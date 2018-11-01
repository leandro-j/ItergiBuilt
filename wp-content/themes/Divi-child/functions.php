<?php
add_action( 'wp_enqueue_scripts', 'my_theme_enqueue_styles' );
function my_theme_enqueue_styles() {
    wp_enqueue_style( 'parent-style', get_template_directory_uri() . '/style.css' );

}


function my_custom_sidebar() {
    register_sidebar(
        array (
            'name' => __( 'Footer Bottom', 'your-theme-domain' ),
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