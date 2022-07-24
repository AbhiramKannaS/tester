<?php

//add admin page
add_action( 'admin_menu', 'nari_admin_menu' );

function nari_admin_menu() {
	add_theme_page(
        __( 'About Nari', 'nari' ),
        __( 'About Nari', 'nari' ),
        'edit_theme_options',
        'about-nari',
        'nari_theme_info_page'
    );
}

function nari_theme_info_page(){

	if ( ! current_user_can( 'manage_options' ) ) {
		wp_die( esc_html__( 'You do not have sufficient permissions to access this page.', 'nari' ) );
	}

	$theme_info = wp_get_theme(); ?>

	<div class="wrap about-wrap theme-info-wrap">
		<h1>
			<?php
			/* translators: 1: Theme Name 2: Version of the theme */
			echo sprintf( esc_html__( 'Welcome to %1$s - %2$s', 'nari' ), esc_html( $theme_info->get( 'Name' ) ), esc_html( $theme_info->get( 'Version' ) ) );
			?>
		</h1>

		<div class="about-text">
			<?php echo esc_html( $theme_info->get( 'Description' ) ); ?>
		</div>

		<p>
			<a href="https://dandure.com/nari/" class="button button-primary" target="_blank"><?php echo esc_html__( ' View Demos', 'nari' ); ?></a>
			<a href="https://wphait.com/documentation/nari" class="button" target="_blank"><?php echo esc_html__( 'Documentation', 'nari' ); ?></a>
			<a href="https://wordpress.org/support/theme/nari/" class="button" target="_blank"><?php echo esc_html__( 'Support', 'nari' ); ?></a>
			<a href="https://wordpress.org/support/theme/nari/reviews/" class="button" target="_blank"><?php echo esc_html__( 'Leave a Review', 'nari' ); ?></a>
		</p>

		<div class="feature-section has-2-columns alignleft">
			<div class="card">
				<h3><?php echo esc_html__( 'Customize Everything', 'nari' ); ?></h3>
				<p><?php echo esc_html__( 'Start customizing every aspect of the website with customizer.', 'nari' ); ?></p>
				<p><a target="_self" href="<?php echo esc_url( wp_customize_url() ); ?>" class="button button-primary"><?php echo esc_html__( 'Go to Customizer', 'nari' ); ?></a></p>
			</div>

			<div class="card">
				<h3><?php echo esc_html__( 'Recommended Plugins', 'nari' ); ?></h3>
				<ol>
					<li><a href="https://wordpress.org/plugins/advanced-google-recaptcha/" target="_blank"><?php echo esc_html__( 'Advanced Google reCAPTCHA', 'nari' ); ?></a></li>
					<li><a href="https://wordpress.org/plugins/woocommerce-product-tabs/" target="_blank"><?php echo esc_html__( 'WooCommerce Product Tabs', 'nari' ); ?></a></li>
					<li><a href="https://wordpress.org/plugins/post-grid-elementor-addon/" target="_blank"><?php echo esc_html__( 'Post Grid Elementor Addon', 'nari' ); ?></a></li>
					<li><a href="https://wordpress.org/plugins/nifty-coming-soon-and-under-construction-page/" target="_blank"><?php echo esc_html__( 'Coming Soon & Maintenance Mode Page', 'nari' ); ?></a></li>
				</ol>
			</div>

			<div class="card">
				<h3><?php echo esc_html__( 'Customize Dashboard', 'nari' ); ?></h3>
				<p><?php echo esc_html__( 'Customize wp-admin interface of your website.', 'nari' ); ?></p>
				<ul>
					<li><a href="https://wordpress.org/plugins/admin-customizer/" target="_blank"><?php echo esc_html__( 'Admin Customizer', 'nari' ); ?></a></li>
				</ul>
			</div>
		</div>

	</div>
	<?php
}
