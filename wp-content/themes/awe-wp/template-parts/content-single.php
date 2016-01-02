<?php
/**
 * Template part for displaying single posts.
 *
 * @package AWE
 */

?>


<article id="post-<?php the_ID(); ?>" <?php post_class(); ?>>
	<figure class="entry-header">
		<div class="featured-image">
			<?php the_post_thumbnail('full', array('class'=>'img-responsive') ); ?>
		</div><!-- /.featured-image -->	
	</figure>
	<div class="entry-content">
		
		<div class="entry-header">
			<?php the_title( '<h2 class="entry-title">', '</h2>' ); ?>
		</div><!-- .entry-header -->

		<?php the_content(); ?>

		<footer class="post-meta">
			<div class="entry-social-share pull-left">
				
				<?php 
					$facebook = get_the_author_meta('facebook', $post->post_author);
					$pinterest = get_the_author_meta('pinterest', $post->post_author);
					$twitter = get_the_author_meta('twitter', $post->post_author);
					$googleplus = get_the_author_meta('googleplus', $post->post_author);
					
					 ?>
					<?php if(!empty($facebook)) { ?>
					<span>Share:</span>
					<a class="facebook-btn" href="<?php echo get_the_author_meta('facebook', $post->post_author); ?>"><i class="fa fa-facebook"></i></a>
					<?php } ?>
					<?php if(!empty($pinterest)) { ?>
					<a class="pinterest-btn" href="<?php echo get_the_author_meta('pinterest', $post->post_author); ?>"><i class="fa fa-pinterest"></i></a>
					<?php } ?>
					<?php if(!empty($twitter)) { ?>
					<a class="twitter-btn" href="<?php echo get_the_author_meta('twitter', $post->post_author); ?>"><i class="fa fa-twitter"></i></a>
					<?php } ?>
					<?php if(!empty($googleplus)) { ?>
					<a class="google-plus-btn" href="<?php echo get_the_author_meta('googleplus', $post->post_author); ?>"><i class="fa fa-google-plus"></i></a>
					<?php } ?>
					
				
			</div><!-- /.social-share -->

			<div class="entry-meta pull-right">
				<?php awe_posted_on(); ?>	 	
				<span class="comments-link">
					<i class="fa fa-comments"></i>
					<?php comments_popup_link( __( '0 comment', 'awe' ), __( '1 Comment', 'awe' ), __( '% Comments', 'awe' ) );?>
				</span> 
				<span class="comments-tags">
					<span class="tags">
						<i class="fa fa-tags"></i>
						<?php the_category(', ' ); ?>
					</span>
				</span> 

				
			</div><!-- /.entry-meta -->
			
		</footer><!-- .entry-meta -->
		<nav class="navigation post-navigation" role="navigation" style="display: block;">
						<div class="nav-links">

							<?php 
							$prv_post = get_previous_post();
							$next_post = get_next_post();
							 ?>
							 <?php if(!empty($prv_post)) { ?>
							<a href="<?php echo get_permalink($prv_post->ID ); ?>" class="prev" rel="prev">
								<span class="meta-nav"><?php _e('Previous Post', 'awe') ?></span>
								<span class="nav-icon"><i class="fa fa-angle-double-left"></i></span>
								<?php echo get_the_title($prv_post->ID ); ?> ...
							</a>
							<?php } ?>
							<?php if(!empty($next_post)) { ?>
							<a href="<?php echo get_permalink($next_post->ID ); ?>" class="next" rel="next">
								<span class="meta-nav"><?php _e('Next Post', 'awe') ?></span>
								<span class="nav-icon"><i class="fa fa-angle-double-right"></i></span>
								<?php echo get_the_title($next_post->ID ); ?> ...
							</a>
							<?php } ?>	
						</div><!-- .nav-links -->
					</nav><!-- /.post-navigation -->

		<?php
		wp_link_pages( array(
			'before' => '<div class="page-links">' . esc_html__( 'Pages:', 'awe' ),
			'after'  => '</div>',
			) );
			?>
		</div><!-- .entry-content -->

	</article><!-- #post-## -->

