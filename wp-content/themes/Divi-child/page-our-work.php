<?php
/*
Template Name: Our Work
*/

get_header(); ?>
<?php 
if ( have_posts() ): while ( have_posts() ): the_post(); 
	$image = get_the_post_thumbnail_url( get_the_ID() );?>	
	<div class="et_pb_section inner_page_banner" style="background-image:url(<?php echo $image; ?>)">		
		<div class="et_pb_row">
			<h1><?php the_title();?><h1>
		</div>
	</div>

	<div class="primary-content inner_page_content">
		<div class="container">
			<?php 
				$terms = get_terms( array(
					'taxonomy' => 'work_category',
					'hide_empty' => false,
				) );
				foreach ( $terms as $term ) {
					$args = array(
						'post_type' => 'work',
						'work_category' => $term->slug
					);
					$query = new WP_Query( $args );?>
					<div class="work-category-section <?php echo $term->name;?>">
						<div class="work-category-description">
							<h2 class="work-category-title"><?php echo $term->name;?>
								<?php if ( !empty( $term->description ) ): ?>
								  <span><?php echo esc_html($term->description); ?></span>
								<?php endif; ?>
							</h2>
						</div>
						<div class="work-post">	
							<div class="et_pb_row et_pb_gutters2 width90 et_pb_equal_columns ">
								<?php $i=1 ;?>
								<?php while ( $query->have_posts() ) : $query->the_post(); ?>					 
									<div class="et_pb_column et_pb_column_1_2 <?php echo ($i%2==0) ? 'et-last-child' : '';?>">
										<div id="post-<?php the_ID(); ?>" <?php post_class('post clearfix'); ?>>
											<div class="work_thumbnail">
												<a href="<?php the_permalink();?>"><?php the_post_thumbnail('work-cropped-480x350');?></a>
											</div>
											<div class="post-content">
												<h3 class="post-title work-post-title"><a href="<?php the_permalink(); ?>" rel="bookmark"><?php the_title(); ?></a></h3>
												<div class="work-post-meta post-meta">
													<ul>
														<li><?php the_time(get_option('date_format')); ?></li>
														<li><?php the_field('location'); ?></li>
														<li><?php the_field('type_of_roof'); ?></li>
													</ul>
												</div><!--// end .post-info -->
											</div>
										</div>
									</div>									 
								<?php $i++;endwhile;
								wp_reset_postdata(); ?>
							</div>
						</div>	
					</div>	
			<?php } ?>
		</div>
	</div>
<?php 
	endwhile; 
endif;
get_footer(); ?>
