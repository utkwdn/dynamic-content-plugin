<?php
/**
 * Render callback for the Cookie Setter block.
 */

if (!function_exists('render_set_cookie_block')) {
	function render_set_cookie_block($attributes) {
		if (empty($attributes['cookieKey']) || empty($attributes['cookieValue'])) {
			return '';
		}

		$key = esc_js($attributes['cookieKey']);
		$value = esc_js($attributes['cookieValue']);

		// Encode the value using encodeURIComponent and set cookie in JS
		return "<script>
			document.cookie = '{$key}=' + encodeURIComponent('{$value}') + '; path=/';
		</script>";
	}
}

// Output the rendered HTML
echo render_set_cookie_block($attributes);