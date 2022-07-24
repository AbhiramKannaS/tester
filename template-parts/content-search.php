<?php
/**
 * Template part for displaying results in search pages
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
	<?php nari_post_thumbnail(); ?>

	<header class="entry-header">
		<?php the_title( sprintf( '<h2 class="entry-title"><a href="%s" rel="bookmark">', esc_url( get_permalink() ) ), '</a></h2>' ); ?>

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

	<div class="entry-summary">
		<?php the_excerpt(); ?>
	</div><!-- .entry-summary -->

</article><!-- #post-<?php the_ID(); ?> -->
