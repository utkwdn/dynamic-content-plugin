<?php // DMC Settings Page

// Exit if accessed directly
if (!defined('ABSPATH')) {
    exit;
}

function dmc_settings_page_content() {
    $example = '
[dmc param="dmc"]

[case value="meet"]
Meet content here
[/case]

[case value="awareness"]
Awareness content here
[/case]

[fallback]
Default content here
[/fallback]

[/dmc]
';
    ?>
    <div class="wrap">
        <h1>Dynamic Content</h1>
        <p>This plugin allows conditional content display based on URL parameters (e.g. www.url.com<span style="font-weight: bold;">?dmc=meet</span>).</p>

        <h2>How to Use</h2>
        <p>Copy and paste this example shortcode into your page or post and change case values and content as needed. </p>

        <pre id="dmc-shortcode-example" style="background: #ffffff;border: 1px solid #8d8d8d;padding: 0 10px;font-family: monospace;max-width: 400px;width: 100%;">
            <?php echo htmlspecialchars($example); ?>
        </pre>

        <br>
        <button id="dmc-copy-button" class="button button-primary">Copy Shortcode</button>
    
        <div id="dmc-admin-notice" class="notice notice-success is-dismissible" style="display: none;">
            <p>Shortcode copied to clipboard</p>
        </div>
    </div>

    <script>
        document.getElementById('dmc-copy-button').addEventListener('click', function() {
            const shortcode = document.getElementById('dmc-shortcode-example').innerText;

            // Try modern API first
            if (navigator.clipboard && navigator.clipboard.writeText) {
                navigator.clipboard.writeText(shortcode).then(() => {
                    showAdminNotice('Shortcode copied to clipboard!');
                }).catch(() => {
                    fallbackCopy(shortcode);  // Fallback if error
                });
            } else {
                fallbackCopy(shortcode);  // Fallback if API not supported
            }
        });

        // Fallback to execCommand
        function fallbackCopy(text) {
            const textarea = document.createElement('textarea');
            textarea.value = text;
            document.body.appendChild(textarea);
            textarea.select();
            try {
                document.execCommand('copy');
                showAdminNotice('Shortcode copied to clipboard!');
            } catch (err) {
                alert('Failed to copy shortcode.');
            }
            document.body.removeChild(textarea);
        }

        // Show the admin notice
        function showAdminNotice(message) {
            const notice = document.getElementById('dmc-admin-notice');
            notice.querySelector('p').innerText = message;
            notice.style.display = 'block';

            // Auto-hide notice after 5 seconds
            setTimeout(() => {
                notice.style.display = 'none';
            }, 5000);
        }
    </script>
    <?php
}