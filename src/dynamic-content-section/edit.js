import { __ } from '@wordpress/i18n';
import { InnerBlocks, InspectorControls, useBlockProps } from '@wordpress/block-editor';
import { PanelBody, TextControl } from '@wordpress/components';

export default function Edit({ attributes, setAttributes }) {
	const { dynamicKey } = attributes;
	const blockProps = useBlockProps({ 'data-dynamic-key': dynamicKey });

	return (
		<>
			<InspectorControls>
				<PanelBody title="Dynamic Key" initialOpen={true}>
					<TextControl
						label="Dynamic Key"
						value={attributes.dynamicKey}
						onChange={(value) => setAttributes({ dynamicKey: value })}
					/>
				</PanelBody>
			</InspectorControls>
			<div {...blockProps}>
				<p className='section-begin-text'><strong>{__('DYNAMIC KEY:', 'dynamic-content-plugin')} </strong><code>{dynamicKey}</code></p>
				<InnerBlocks />
			</div>
		</>
	);
}