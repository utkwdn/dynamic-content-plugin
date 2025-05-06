import { useBlockProps, InnerBlocks } from '@wordpress/block-editor';

export default function save({ attributes }) {
	const { dynamicKey } = attributes;

	const blockProps = useBlockProps.save({
		'data-dynamic-key': dynamicKey,
	});

	return (
		<div {...blockProps}>
			<InnerBlocks.Content />
		</div>
	);
}