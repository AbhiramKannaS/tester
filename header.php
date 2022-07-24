<?php
/**
 * The header for our theme
 *
 * This is the template that displays all of the <head> section and everything up until <div id="content">
 *
 * @link https://developer.wordpress.org/themes/basics/template-files/#template-partials
 *
 * @package Nari
 */

?>
<!doctype html>
<html <?php language_attributes(); ?>>
<head>
	<meta charset="<?php bloginfo( 'charset' ); ?>">
	<meta name="viewport" content="width=device-width, initial-scale=1">
	<link rel="profile" href="https://gmpg.org/xfn/11">
<link href="https://fonts.googleapis.com/css?family=Karla:400,700|Martel:400,700" rel="stylesheet">
	<?php wp_head(); ?>
</head>

<body <?php body_class(); ?>>
<?php wp_body_open(); ?>
<div id="page" class="site">
	<a class="skip-link screen-reader-text" href="#primary"><?php esc_html_e( 'Skip to content', 'nari' ); ?></a>

	<header id="masthead" class="site-header">
		<div class="site-branding">
			<div class="container">
				<div class="site-branding-inner">
					<?php if ( has_custom_logo() ) : ?>
						<div class="site-logo">
							<?php the_custom_logo(); ?>
						</div>
					<?php endif; ?>

					<div class="site-title-tagline">
						<?php
						$hide_site_title =  nari_get_option( 'hide_site_title' );

						if( $hide_site_title === false ) {
							if ( is_front_page() && is_home() ) :
								?>
							<h1 class="site-title"><a href="<?php echo esc_url( home_url( '/' ) ); ?>" rel="home"><?php bloginfo( 'name' ); ?></a></h1>
							<?php
							else :
								?>
								<p class="site-title"><a href="<?php echo esc_url( home_url( '/' ) ); ?>" rel="home"><?php bloginfo( 'name' ); ?></a></p>
								<?php
							endif;
						}

						$hide_tagline =  nari_get_option( 'hide_tagline' );

						if( $hide_tagline === false ) {
							$nari_description = get_bloginfo( 'description', 'display' );
							if ( $nari_description || is_customize_preview() ) :
								?>
								<p class="site-description"><?php echo $nari_description; // phpcs:ignore WordPress.Security.EscapeOutput.OutputNotEscaped ?></p>
							<?php endif;
						} ?>
					</div><!-- .site-title-tagline -->
				</div><!-- .site-branding-inner -->
			</div><!-- .container -->
		</div><!-- .site-branding -->

		<div class="main-navigation-wrap">
			<div class="container">
				<button class="menu-toggle" aria-controls="primary-menu" aria-expanded="false"><span class="menu-bar"></span><span class="menu-bar"></span><span class="menu-bar"></span></button>
				<nav id="site-navigation" class="main-navigation">
					<?php
					wp_nav_menu(
						array(
							'theme_location' => 'menu-1',
							'menu_id'        => 'primary-menu',
							'fallback_cb'    => 'nari_menu_fallback'
						)
					);
					?>
				</nav><!-- #site-navigation -->
			</div>
		</div><!-- .main-navigation-wrap -->
	</header><!-- #masthead -->

	<?php
	$enable_banner = nari_get_option( 'enable_banner' );
	if( is_front_page() && is_home() && $enable_banner === true  ) {
		get_template_part( 'template-parts/content', 'banner' );
	}?>

	<?php
	$enable_featured_posts = nari_get_option( 'enable_featured_posts' );
	if( is_front_page() && is_home() && $enable_featured_posts === true  ) {
		get_template_part( 'template-parts/content', 'featured-posts' );
	}?>

	<?php
	$enable_breadcrumb = nari_get_option( 'enable_breadcrumb' );

	if( !is_front_page() && !is_home() && !is_404() && ( $enable_breadcrumb === true  || is_archive() || is_search() ) ){
		get_template_part( 'template-parts/content', 'breadcrumb' );
	} ?>

	<div id="content" class="site-content">
		<div class="container">
			<div class="inner-wrapper">
