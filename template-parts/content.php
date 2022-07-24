<?php
/**
 * Template part for displaying posts
 *
 * @link https://developer.wordpress.org/themes/basics/template-hierarchy/
 *
 * @package Nari
 */

$show_excerpt = nari_get_option( 'show_excerpt' );

if ( is_singular() ) {
	$show_date = nari_get_option( 'show_date_single' );
	$show_author = nari_get_option( 'show_author_single' );
	$show_categories = nari_get_option( 'show_categories_single' );
}else {
	$show_date = nari_get_option( 'show_date' );
	$show_author = nari_get_option( 'show_author' );
	$show_categories = nari_get_option( 'show_categories' );
}

?>

<article id="post-<?php the_ID(); ?>" <?php post_class(); ?>>

	<?php
	$enable_social_share = nari_get_option( 'enable_social_share' );
	if( is_singular() && ( 'post' === get_post_type() ) && $enable_social_share === true  ) {
		get_template_part( 'template-parts/content', 'social-share' );
	}?>

	<div class="post-content">
		<?php nari_post_thumbnail(); ?>

		<header class="entry-header">
			<?php
			if ( is_singular() ) :
				the_title( '<h1 class="entry-title">', '</h1>' );
			else :
				the_title( '<h2 class="entry-title"><a href="' . esc_url( get_permalink() ) . '" rel="bookmark">', '</a></h2>' );
			endif;
			?>

			<?php if ( 'post' === get_post_type() ) : ?>
				<div class="entry-meta">
					<?php
					if( $show_date === true ){
						nari_posted_on();
					}
					if( $show_author === true ){
						nari_posted_by();
					}
					if( $show_categories === true ){
						nari_posted_category();
					}
					?>
				</div><!-- .entry-meta -->
			<?php endif; ?>
		</header><!-- .entry-header -->

		<?php if ( is_singular() ) : ?>
			<div class="entry-content">
				<?php
				the_content(
					sprintf(
						wp_kses(
							/* translators: %s: Name of current post. Only visible to screen readers */
							__( 'Continue reading<span class="screen-reader-text"> "%s"</span>', 'nari' ),
							array(
								'span' => array(
									'class' => array(),
								),
							)
						),
						wp_kses_post( get_the_title() )
					)
				);

				wp_link_pages(
					array(
						'before' => '<div class="page-links">' . esc_html__( 'Pages:', 'nari' ),
						'after'  => '</div>',
					)
				);
				?>
			</div><!-- .entry-content -->

		<?php elseif( $show_excerpt === true ) : ?>
			<div class="entry-content">
				<?php the_excerpt(); ?>
			</div><!-- .entry-content -->
		<?php endif; ?>

		<?php if ( is_singular() ) : ?>
			<footer class="entry-footer">
				<?php nari_entry_footer(); ?>
			</footer><!-- .entry-footer -->
		<?php endif; ?>
	</div>
</article><!-- #post-<?php the_ID(); ?> -->
