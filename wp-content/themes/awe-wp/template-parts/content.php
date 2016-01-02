<?php
/**
 * Template part for displaying posts.
 *
 * @package AWE
 */

?>

<article id="post-<?php the_ID(); ?>" <?php post_class(); ?>>
	
	<div class="entry-content">
		<?php the_post_thumbnail(); ?>
		<header class="entry-header">
			<?php the_title( sprintf( '<h2 class="entry-title"><a href="%s" rel="bookmark">', esc_url( get_permalink() ) ), '</a></h2>' ); ?>
		</header><!-- .entry-header -->

		<?php
		/* translators: %s: Name of current post */
		the_content( sprintf(
			wp_kses( __( 'Continue reading %s <span class="meta-nav">&rarr;</span>', 'awe' ), array( 'span' => array( 'class' => array() ) ) ),
			the_title( '<span class="screen-reader-text">"', '"</span>', false )
			) );
			?>
		
			<?php
			wp_link_pages( array(
				'before' => '<div class="page-links">' . esc_html__( 'Pages:', 'awe' ),
				'after'  => '</div>',
				) );
				?>
				<footer class="entry-footer post-meta">
					<div class="btn-container text-center pull-left">
						<a href="<?php the_permalink(); ?>" class="btn sm-btn angle-effect read-on">
							<?php _e('Read On', 'magzy') ?>
						</a>
					</div>
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
					
				</footer><!-- .entry-footer -->
			</div><!-- .entry-content -->

		</article><!-- #post-## -->
