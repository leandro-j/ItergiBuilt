<?php
/**
 * Category taxonomy
 */
get_header();
$term = get_term_by( 'slug', get_query_var( 'term' ), get_query_var( 'taxonomy' ) );
$image = get_field('fetured_image1', $term);
?>
<div class="et_pb_section inner_page_banner" style="background-image:url(<?php echo $image; ?>)">		
	<div class="et_pb_row">
		<?php if(get_field('page_title1', $term)):?>
			<h1><?php echo get_field('page_title1', $term); ?><h1>
		<?php else:?>
			<h1><?php echo $term->name; ?><h1>
		<?php endif;?>
	</div>
</div>

<div class="primary-content inner_page_content">
	<div class="container">
		<div class="work-category-description">
			<h2 class="work-category-title"><?php echo apply_filters( 'the_title', $term->name ); ?>
				<?php if ( !empty( $term->description ) ): ?>
				  <span><?php echo esc_html($term->description); ?></span>
				<?php endif; ?>
			</h2>
		</div>
		<div class="work-post">	
			<div class="et_pb_row et_pb_gutters2 width90 et_pb_equal_columns ">
				<?php $i=1 ;
				if ( have_posts() ):
					while ( have_posts() ): the_post(); ?>			 
					<div class="et_pb_column et_pb_column_1_2 <?php echo ($i%2==0) ? 'et-last-child' : '';?>">
						<div id="post-<?php the_ID(); ?>" <?php post_class('post clearfix'); ?>>
							<div class="work_thumbnail">
								<a href="<?php the_permalink();?>"><?php the_post_thumbnail('work-cropped-480x350');?></a>
							</div>
							<div class="post-content">
								<h3 class="post-title work-post-title">
									<a href="<?php the_permalink(); ?>" rel="bookmark"><?php the_title(); ?></a>
								</h3>
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
					<?php $i++;
					endwhile;?>
					<div class="navigation clearfix">
						<div class="alignleft"><?php previous_posts_link('« Previous') ?></div>
						<div class="alignright"><?php next_posts_link('Next »') ?></div>
					</div>			
				<?php else: ?>
					<div class="content no-result">
						<p>No Result Found</p>
					</div>
				<?php endif; ?>
			</div>			
		</div>
	</div>
</div>
<?php get_footer(); ?>