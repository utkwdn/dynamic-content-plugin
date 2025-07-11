import { useBlockProps, InnerBlocks } from '@wordpress/block-editor';

export default function Edit() {
	return (
		<div
			{ ...useBlockProps( {
				className: 'dynamic-content-wrapper',
			} ) }
		>
			<p className="wrapper-begin-text">BEGIN DYNAMIC CONTENT</p>

			<InnerBlocks
				allowedBlocks={ [ 'utk/dynamic-content-section' ] }
				template={ [
					[
						'utk/dynamic-content-section',
						{ dynamicKey: 'default' },
					],
				] }
				templateLock={ false }
			/>

			<p className="wrapper-end-text">END DYNAMIC CONTENT</p>
		</div>
	);
}
