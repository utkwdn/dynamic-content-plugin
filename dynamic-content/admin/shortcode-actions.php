<?php // DMC Shortcode Actions

// Exit if accessed directly
if ( ! defined( 'ABSPATH' ) ) {
	exit;
}

function dmc_shortcode($atts, $content = null) {
    $atts = shortcode_atts(
        [
            'param' => '', 
        ],
        $atts,
        'dmc'
    );

    if (empty($atts['param']) || !$content) {
        return 'No parameter or content found.';
    }

    // Correct curly quotes
    $content = str_replace(
        ['&#8220;', '&#8221;', '&#8243;', '&#8217;'], 
        ['"', '"', '"', "'"], 
        $content
    );

    // Sanitize URL parameter
    $param_value = isset($_GET[$atts['param']]) ? sanitize_text_field($_GET[$atts['param']]) : '';

    // Ensure shortcodes are processed
    $content = do_shortcode(shortcode_unautop($content));

    // Match all [case value="..."]...[/case] blocks
    if (preg_match_all('/\[case value="([^"]+)"\](.*?)\[\/case\]/is', $content, $matches, PREG_SET_ORDER)) {
        foreach ($matches as $match) {
            $case_value = trim($match[1]);
            $case_content = trim($match[2]);

            if ($param_value === $case_value) {
                return $case_content;
            }
        }
    }

    // Handle fallback content
    if (preg_match('/\[fallback\](.*?)\[\/fallback\]/is', $content, $fallback_match)) {
        return $fallback_match[1];
    }

    return 'No matching content or fallback found.';
}

add_shortcode('dmc', 'dmc_shortcode');