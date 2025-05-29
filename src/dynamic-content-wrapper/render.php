<?php
/**
 * Render callback for the Dynamic Content Wrapper block.
 */

 if (!function_exists('get_dmc_value')) {
	function get_dmc_value() {
		// Check URL params first
		if ( isset( $_GET['dmc'] ) ) {
			return sanitize_text_field( $_GET['dmc'] );
		}
		
		// Next, check cookies
		if ( isset( $_COOKIE['utk-dmc'] ) ) {
			// Decode the value before sanitizing
			return sanitize_text_field( urldecode( $_COOKIE['utk-dmc'] ) );
		}

		return 'default';
	}
}

if ( ! function_exists( 'render_dynamic_content_wrapper' ) ) {
	function render_dynamic_content_wrapper( $attributes, $content, $block ) {
		$target_key = get_dmc_value();
		$parsed     = $block->parsed_block;

		if ( empty( $parsed['innerBlocks'] ) ) {
			return '';
		}

		$default_section = null;
		$rendered_content = '';

		// Loop through each dynamic content section block
		foreach ( $parsed['innerBlocks'] as $section ) {
			if (
				isset( $section['blockName'] ) &&
				$section['blockName'] === 'utk/dynamic-content-section' &&
				isset( $section['attrs']['dynamicKey'] )
			) {
				if ( $section['attrs']['dynamicKey'] === $target_key ) {
					// Use render_block to render the full block with filters and context
					$rendered_content = render_block( $section );
					break;
				}

				// Save default content for fallback
				if ( $section['attrs']['dynamicKey'] === 'default' ) {
					$default_section = $section;
				}
			}
		}

		if ( empty( $rendered_content ) && $default_section ) {
			$rendered_content = render_block( $default_section );
		}

		if ( empty( $rendered_content ) ) {
			$rendered_content = '<p>No content found for key: ' . esc_html( $target_key ) . '</p>';
		}

		// Add align class if alignment is set (e.g., alignwide, alignfull)
		$align_class = isset( $attributes['align'] ) ? 'align' . sanitize_html_class( $attributes['align'] ) : '';

		return '<div class="dynamic-content-wrapper ' . esc_attr( $align_class ) . '">' . $rendered_content . '</div>';
	}
}

// Output the rendered HTML
echo render_dynamic_content_wrapper($attributes, $content, $block);
