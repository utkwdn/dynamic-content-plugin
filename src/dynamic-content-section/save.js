import { useBlockProps, InnerBlocks } from '@wordpress/block-editor';

export default function save( { attributes } ) {
	const { dynamicKey } = attributes;

	return (
		<div { ...useBlockProps.save( { 'data-dynamic-key': dynamicKey } ) }>
			<InnerBlocks.Content />
		</div>
	);
}
