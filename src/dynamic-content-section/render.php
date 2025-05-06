<?php
/**
 * Render callback for the Dynamic Content Section block.
 */

if (!function_exists('render_dynamic_content_section')) {
    function render_dynamic_content_section( $attributes, $content, $block ) {
		return($content);
	}
}

// Output the rendered HTML
echo render_dynamic_content_section($attributes, $content, $block);
