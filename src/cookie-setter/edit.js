import { __ } from '@wordpress/i18n';
import { useBlockProps, InspectorControls } from '@wordpress/block-editor';
import { PanelBody, TextControl } from '@wordpress/components';

export default function Edit({ attributes, setAttributes }) {
	const { cookieKey, cookieValue } = attributes;
	const blockProps = useBlockProps();

	return (
		<>
			<InspectorControls>
				<PanelBody title={__('Cookie Settings', 'utk')}>
					{/* <TextControl
						label={__('Cookie Key', 'utk')}
						value={cookieKey}
						onChange={(value) => setAttributes({ cookieKey: value })}
					/> */}
					<TextControl
						label={__('Dynamic Key', 'utk')}
						value={cookieValue}
						onChange={(value) => setAttributes({ cookieValue: value })}
					/>
				</PanelBody>
			</InspectorControls>

			<div {...blockProps} className='wp-block-utk-set-cookie alignfull'>
				<p><strong>Cookie Setter Block</strong> | This block will set the cookie: <code>{cookieKey}={cookieValue}</code></p>
			</div>
		</>
	);
}