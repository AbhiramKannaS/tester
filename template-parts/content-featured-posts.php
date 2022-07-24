<?php
/**
 * Template part for displaying featured posts
 *
 * @link https://developer.wordpress.org/themes/basics/template-hierarchy/
 *
 * @package Nari
 */

$featured_posts_category = nari_get_option( 'featured_posts_category' );
$featured_posts_heading = nari_get_option( 'featured_posts_heading' );
?>

<div class="featured-posts">
	<div class="container">
		<?php if( !empty( $featured_posts_heading ) ) : ?>
			<h2 class="heading"><?php echo esc_html( $featured_posts_heading ); ?></h2>
		<?php endif;?>

		<div class="featured-posts-inner">
			<?php
			$feat_args = array(
				'cat' 			 => absint( $featured_posts_category ) ,
				'posts_per_page' => 3,
			);

			$feat_query = new WP_Query( $feat_args );

			if( $feat_query->have_posts() ):
				while( $feat_query->have_posts() ):
					$feat_query->the_post();
					?>
					<div class="featured-post">
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
								<?php nari_posted_on(); ?>
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
</div>
