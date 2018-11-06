<?php get_header(); ?>

<div class="primary-content inner_page_content">
	<div class="container">
		<div class="search-section">
		<?php 
		if ( have_posts() ) :?>				
			<p class="sub-heading"><?php printf( __( 'search results for:', 'Divi' )); ?></p>
			<h2><?php printf( __( '%s', 'Divi' ), get_search_query()); ?></h2>
			<?php while ( have_posts() ) : the_post();
				$post_format = et_pb_post_format(); ?>
				<article id="post-<?php the_ID(); ?>" <?php post_class( 'et_pb_post' ); ?>>
					<div class="search-result">
						<?php 
						$post_type = get_post_type(get_the_ID());
						if('work' == $post_type){
							$taxonomies = get_object_taxonomies($post_type);
							
							foreach ($taxonomies as $taxonomy) {           
								$terms = get_the_terms(get_the_ID(), $taxonomy );								
								if ( !empty( $terms ) ) {
									if(get_field('page_title1', $terms[0])){
										echo '<p class="term_name">' .get_field('page_title1', $terms[0]).'</p> ';
									} else {
										echo '<p class="term_name">' .$terms[0]->name .'</p> ';
									}
								}
							}
						}?>
						<h3><?php the_title();?></h3>
						<div class="et_pb_button_module_wrapper">
							<a class="theme_custom_btn px-2" href="<?php the_permalink();?>">Learn More</a>
						</div>
					</div>	
				</article> <!-- .et_pb_post -->
				<?php endwhile; ?>
				<div class="navigation clearfix">
					<div class="alignleft"><?php previous_posts_link('« Previous') ?></div>
					<div class="alignright"><?php next_posts_link('Next »') ?></div>
				</div>
			<?php else :?>				
			<?php get_template_part( 'includes/no-results', 'index' );
			endif;?>			
		</div>
	</div>
</div>

<?php get_footer();