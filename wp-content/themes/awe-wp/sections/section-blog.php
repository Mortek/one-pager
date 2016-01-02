<?php 
/**  section menu control by id.
--------------------------------------------------------------------------------------------------- */

$section_menu = zels_get_option('blog');
$id = strtolower(str_replace(' ', '-', $section_menu['name']));
 ?>

	<!-- Blog Section -->
	<section id="<?php echo esc_attr($id ); ?>" class="section-padding">
		<div class="container">
			<h2 class="section-title"><?php echo esc_html(zels_get_option('blog_section_title')) ?></h2>
			<div class="section-details text-center">
				<?php echo esc_html(zels_get_option('blog_section_des')) ?>
			</div><!-- /.section-details -->	

		<div class="recent-blog">
			<div class="col-lg-8">
				<div class="row">

					<?php 
					$num = 0; 
					query_posts('post_type=post&posts_per_page=2&ignore_sticky_posts=true' );
					if(have_posts()) : while(have_posts()) : the_post(); 
					if ($num++ % 2 == 0) {
							$style = 'style-1';
						}else {
							$style = 'style-2';
						}
					?> 
					<article class="post type-post <?php echo $style; ?> clearfix"> 
						<div class="post-meta-box">
							<div class="post-thumbnail">
								<?php the_post_thumbnail( ); ?>
							</div><!-- /.post-thumbnail -->
							<div class="entry-meta">
								<span class="post-cat-icon">
									<?php echo cc_post_format_icon() ?>
								</span>
								<span class="entry-date">
									<?php $time_string = '<i class="fa fa-calendar"></i> <time class="entry-date published" datetime="%1$s">%2$s</time>';
									
									$time_string = sprintf( $time_string,
										esc_attr( get_the_date( 'c' ) ),
										esc_html( get_the_date() ),
										esc_attr( get_the_modified_date( 'c' ) ),
										esc_html( get_the_modified_date() )
										);
									echo $time_string;
										?>
									 /
								</span>
								<span class="author">
									<i class="fa fa-user"></i> <?php the_author_link(); ?> /
								</span>
								<span class="comments-link">
									<i class="fa fa-comments"></i> <?php comments_popup_link( '0', '1', '%'); ?>
								</span> 	
							</div><!-- /.entry-meta -->
						</div><!-- /.post-meta-box -->
						<div class="post-content-box">
							<h3 class="entry-title"> <a href="<?php the_permalink(); ?>"><?php the_title(); ?></a></h3>
							<div class="entry-content">
								<?php the_excerpt(); ?>
								<div class="btn-container">
									<span class="read-more btn angle-effect">
										<a href="<?php the_permalink(); ?>"><?php _e('Read more', 'awe'); ?></a>
									</span>
								</div>
							</div><!-- /.entry-content -->
						</div><!-- /.post-content-box -->
					</article><!-- /.type-post -->
					<?php endwhile;endif; wp_reset_postdata(); ?>
				</div><!-- /.row -->
			</div><!-- /.col-lg-8 -->

			<div class="col-lg-4">
				<div class="row">
				<?php 
				query_posts('post_type=post&posts_per_page=1&offset=2&ignore_sticky_posts=true' );
				if(have_posts()) : while(have_posts()) : the_post(); ?>
					<article class="post type-post style-3 clearfix"> 
						<div class="post-meta-box">
							<div class="post-thumbnail">
								<?php the_post_thumbnail( ); ?>
							</div><!-- /.post-thumbnail -->
							<div class="entry-meta">
								<span class="post-cat-icon">
									<?php echo cc_post_format_icon() ?>
								</span>
								<span class="entry-date">
									<?php $time_string = '<i class="fa fa-calendar"></i> <time class="entry-date published" datetime="%1$s">%2$s</time>';
									

									$time_string = sprintf( $time_string,
										esc_attr( get_the_date( 'c' ) ),
										esc_html( get_the_date() ),
										esc_attr( get_the_modified_date( 'c' ) ),
										esc_html( get_the_modified_date() )
										);
									echo $time_string;
										?>
									 /
								</span>
								<span class="author">
									<i class="fa fa-user"></i> <?php the_author_link(); ?> /
								</span>
								<span class="comments-link">
									<i class="fa fa-comments"></i> <?php comments_popup_link( '0', '1', '%'); ?>
								</span> 	
							</div><!-- /.entry-meta -->
						</div><!-- /.post-meta-box -->
						<div class="post-content-box">
							<h3 class="entry-title"> <a href="<?php the_permalink(); ?>"><?php the_title(); ?></a></h3>
							<div class="entry-content">
								<?php the_excerpt(); ?>
								<div class="btn-container">
									<span class="read-more btn angle-effect">
										<a href="<?php the_permalink(); ?>"><?php _e('Read more', 'awe'); ?></a>
									</span>
								</div>
							</div><!-- /.entry-content -->
						</div><!-- /.post-content-box -->
					</article><!-- /.type-post -->
					<?php endwhile;endif; wp_reset_postdata(); ?>
				</div><!-- /.row -->
			</div><!-- /.col-lg-4 -->

			<div class="btn-container">
				<a class="view-all btn angle-effect" href="<?php echo cc_get_blog_link() ?>"><?php _e('View All', 'awe') ?></a>
			</div><!-- /.btn-container -->
			
		</div><!-- /.recent-blog -->
		</div><!-- /.container -->
	</section><!-- /#blog -->
	<!-- Blog Section End -->


