<?php
/**
 * Render callback for the Dynamic Content Section block.
 *
 * @package DynamicContent
 */

if ( ! function_exists( 'render_dynamic_content_section' ) ) {
	/**
	 * Render the inner content of the Dynamic Content Section block.
	 *
	 * @param array  $attributes Block attributes.
	 * @param string $content    Block inner content.
	 * @param object $block      Block instance.
	 * @return string Filtered inner content.
	 */
	function render_dynamic_content_section( $attributes, $content, $block ) {
		return $content;
	}
}

// Output the rendered HTML.
echo wp_kses_post( render_dynamic_content_section( $attributes, $content, $block ) );
