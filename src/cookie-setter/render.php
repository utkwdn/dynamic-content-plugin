<?php
/**
 * Render callback for the Cookie Setter block.
 *
 * @package DynamicContent
 */

if ( ! function_exists( 'render_set_cookie_block' ) ) {
	/**
	 * Render the JavaScript code to set a cookie.
	 *
	 * @param array $attributes Block attributes.
	 * @return string The script tag for setting a cookie.
	 */
	function render_set_cookie_block( $attributes ) {
		if ( empty( $attributes['cookieKey'] ) || empty( $attributes['cookieValue'] ) ) {
			return '';
		}

		$key   = esc_js( $attributes['cookieKey'] );
		$value = esc_js( $attributes['cookieValue'] );

		// Encode the value using encodeURIComponent and set cookie in JS.
		ob_start();
		?>
		<script>
			document.cookie = '<?php echo esc_js( $key ); ?>=' + encodeURIComponent('<?php echo esc_js( $value ); ?>') + '; path=/';
		</script>
		<?php
		return ob_get_clean();
	}
}

// Output the rendered HTML.
// phpcs:ignore WordPress.Security.EscapeOutput.OutputNotEscaped -- safe inline script output
echo render_set_cookie_block( $attributes );
