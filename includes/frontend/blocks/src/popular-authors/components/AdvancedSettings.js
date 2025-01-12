import { __ } from '@wordpress/i18n';
import { TextareaControl, PanelRow } from '@wordpress/components';
import { InspectorControls } from '@wordpress/block-editor';
import { createAttributeChange } from '../utils/attributes';

const AdvancedSettings = ({ attributes, setAttributes }) => {
	const { other_attributes } = attributes;

	return (
		<InspectorControls group="advanced">
			<PanelRow>
				<TextareaControl
					label={__('Other attributes', 'popular-authors')}
					value={other_attributes}
					onChange={createAttributeChange(
						setAttributes,
						'other_attributes'
					)}
					help={__(
						'Enter other attributes in a URL-style string-query.',
						'popular-authors'
					)}
				/>
			</PanelRow>
		</InspectorControls>
	);
};

export default AdvancedSettings;
