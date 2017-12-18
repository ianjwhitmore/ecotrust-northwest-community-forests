


	<div class="post-grid grid-3">
		<div class="kc-list-item-3">
	    	
	    	<?php if(has_post_thumbnail()):?>
				<a href="<?php echo esc_url( get_permalink( $post->ID ) ); ?>" class="entry-thumb-link">
					<?php the_post_thumbnail('ollo_1170x400', array('class' => 'img-responsive'));?>
				</a>
			<?php endif; ?>
			
				<div class="content">
					<h5 class="post-title-alt"><a
						href="<?php echo esc_url( get_permalink( $post->ID ) ); ?>"><?php echo get_the_title( $post ); ?></a>
					</h5>

					<div class="entry-meta">
						
						<span class="entry-date">
							<a href="<?php echo esc_url( get_permalink( $post->ID ) ); ?>"><?php echo get_the_date( 'F d, Y', $post->ID ); ?></a>
						</span>
						
						<span class="entry-cats">
							<?php the_category( ', ', '', $post->ID ); ?>
						</span>

					</div>

					<div class="entry-excerpt">
						<p><?php echo wp_trim_words( get_the_content(), 20 ); ?></p>
					</div>

					<a href="<?php echo esc_url( get_permalink( $post->ID ) ); ?>" class="kc-post-2-button">READ MORE</a>

				</div>
		</div>
	</div>
	
