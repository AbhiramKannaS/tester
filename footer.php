<?php
/**
 * The template for displaying the footer
 *
 * Contains the closing of the #content div and all content after.
 *
 * @link https://developer.wordpress.org/themes/basics/template-files/#template-partials
 *
 * @package Nari
 */

?>
    	</div><!-- .inner-wrapper -->
    </div><!-- .container -->
</div><!-- #content -->

<?php
if ( is_active_sidebar( 'footer-1' ) ||
	is_active_sidebar( 'footer-2' ) ||
	is_active_sidebar( 'footer-3' ) ) :
	?>
	<div id="site-footer-widgets" class="footer-widgets">
		<div class="container">
			<div class="footer-widgets-inner">
				<?php
				for ( $i = 1; $i <= 3; $i ++ ) {
					if ( is_active_sidebar( 'footer-' . $i ) ) {
						?>
						<div class="footer-widget footer-widget-<?php echo $i; ?>">
							<?php dynamic_sidebar( 'footer-' . $i ); ?>
						</div>
						<?php
					}
				}
				?>
			</div><!-- .footer-widgets-inner -->
		</div><!-- .container -->
	</div><!-- #footer-widget-area -->
<?php endif; ?>

	<footer id="colophon" class="site-footer">
		<div class="container">
			<div class="site-footer-inner">
				<?php if ( has_nav_menu( 'footer-menu' ) ) : ?>
					<div class="footer-menu">
						<?php
						wp_nav_menu(
							array(
								'theme_location' => 'footer-menu',
								'menu_id'        => 'footer-menu',
								'depth'          => 1,
							)
						);
						?>
					</div><!-- .footer-menu -->
				<?php endif ?>
				<div class="site-info">
					<?php
					$copyright_text = nari_get_option( 'copyright_text' );
					if ( ! empty( $copyright_text ) ) {
						$copyright = nari_apply_theme_shortcode( wp_kses_post( $copyright_text ) );
						echo do_shortcode( $copyright );
					}

					/* translators: 1: Theme name, 2: Theme author. */
					
					?>
				</div><!-- .site-info -->

			</div><!-- .site-footer-inner -->
		</div><!-- .container -->
	</footer><!-- #colophon -->
</div><!-- #page -->

<div id="back_to_top">&uarr;</div>

<?php wp_footer(); ?>

</body>
</html>
