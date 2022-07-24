<?php
/**
 * Template part for displaying related posts
 *
 * @link https://developer.wordpress.org/themes/basics/template-hierarchy/
 *
 * @package Nari
 */
$post_id = get_the_ID();
$related_posts_heading = nari_get_option( 'related_posts_heading' );
$related_posts_number = nari_get_option( 'related_posts_number' );

?>

<div class="related-posts">
	<?php if( !empty( $related_posts_heading ) ) : ?>
		<h2 class="heading"><?php echo esc_html( $related_posts_heading ); ?></h2>
	<?php endif;?>

	<div class="related-posts-inner">
		<?php
		$categories = get_the_category( $post_id );

		$category_ids = array();

		foreach( $categories as $category ) {

		    $category_ids[] = $category->term_id;

		}

		$related_args = array(
			'category__in'   => $category_ids,
			'post__not_in'   => array( $post_id ),
			'posts_per_page' => absint( $related_posts_number ),
		);

		$related_query = new WP_Query( $related_args );

		if( $related_query->have_posts() ):
			while( $related_query->have_posts() ):
				$related_query->the_post();
				?>
				<div class="related-post">
					<a class="post-thumbnail" href="<?php the_permalink(); ?>" aria-hidden="true" tabindex="-1">
						<?php
							the_post_thumbnail(
								'nari-thumb',
								array(
									'alt' => the_title_attribute(
										array(
											'echo' => false,
										)
									),
								)
							);
						?>
					</a>
					<header class="entry-header">
						<?php the_title( '<h3 class="entry-title"><a href="' . esc_url( get_permalink() ) . '" rel="bookmark">', '</a></h3>' ); ?>
						<div class="entry-meta">
							<?php
							nari_posted_on();
							nari_posted_category();
							?>
						</div><!-- .entry-meta -->
					</header><!-- .entry-header -->
				</div>
				<?php
			endwhile;
			wp_reset_postdata();
		endif;
		?>
	</div>
</div>
