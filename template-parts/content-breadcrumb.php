<?php
/**
 * Template part for displaying breadcrumb content
 *
 * @link https://developer.wordpress.org/themes/basics/template-hierarchy/
 *
 * @package Nari
 */

$enable_breadcrumb = nari_get_option( 'enable_breadcrumb' );

if( is_archive() && class_exists( 'WooCommerce' ) &&  is_woocommerce() && $enable_breadcrumb === false ) {

	return;
}
?>

<div class="page-header-breadcrumb">
	<?php if( $enable_breadcrumb === true ) : ?>
		<div class="page-breadcrumb">
			<div class="container">
				<?php
				$breadcrumb_type = nari_get_option( 'breadcrumb_type' );

				if ( function_exists( 'rank_math_the_breadcrumbs' ) && ( $breadcrumb_type === 'rankmath' ) ) {

					rank_math_the_breadcrumbs();

				}elseif( function_exists( 'yoast_breadcrumb' ) && ( $breadcrumb_type === 'yoast' ) ) {

					yoast_breadcrumb( '<p id="breadcrumbs">','</p>' );

				}
				?>
			</div>
		</div>
	<?php endif; ?>

	<div class="container">
		<?php

		if( is_archive() && !class_exists( 'WooCommerce' ) ) {
			the_archive_title( '<h1 class="page-title">', '</h1>' );
			the_archive_description( '<div class="archive-description">', '</div>' );

		}elseif( is_archive() && class_exists( 'WooCommerce' ) && !is_woocommerce()  ) {
			the_archive_title( '<h1 class="page-title">', '</h1>' );
			the_archive_description( '<div class="archive-description">', '</div>' );

		}elseif( is_search() ) { ?>

			<h1 class="page-title">
				<?php
				/* translators: %s: search query. */
				printf( esc_html__( 'Search Results for: %s', 'nari' ), '<span>' . get_search_query() . '</span>' );
				?>
			</h1>
			<?php

		}elseif( is_404() ) { ?>

			<h1 class="page-title"><?php esc_html_e( 'Oops! That page can&rsquo;t be found.', 'nari' ); ?></h1>
			<?php

		} ?>

	</div>
</div><!-- .page-header-breadcrumb -->
