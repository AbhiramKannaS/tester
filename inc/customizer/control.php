<?php
/**
 * Custom Customizer Controls
 *
 * @package Nari
 */

if ( ! class_exists( 'WP_Customize_Control' ) ) {
	return null;
}

/**
 * Customize Control for Category Select.
 *
 * @since 0.1
 *
 * @see WP_Customize_Control
 */
class Nari_Dropdown_Category_Control extends WP_Customize_Control {

	/**
	 * Render content.
	 *
	 * @since 0.1
	 */
	public function render_content() {
		$cat_dropdown = wp_dropdown_categories(
		    array(
		      'name'              => 'customize-dropdown-categories' . $this->id,
		      'echo'              => 0,
		      'show_option_none'  => esc_html__( '&mdash; Select Category &mdash;', 'nari'),
		      'option_none_value' => '0',
		      'selected'          => $this->value(),
		    )
		);

		$cat_dropdown = str_replace( '<select', '<select ' . $this->get_link(), $cat_dropdown );

		printf(
		  '<label class="customize-control-select"><span class="customize-control-title">%s</span><span class="description customize-control-description">%s</span> %s </label>',
		  $this->label,
		  $this->description,
		  $cat_dropdown
		);
	}
}
