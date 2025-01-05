import { __ } from '@wordpress/i18n';
import {
	TextControl,
	TextareaControl,
	ToggleControl,
	PanelRow,
} from '@wordpress/components';
import {
	createAttributeToggle,
	createAttributeChange,
} from '../utils/attributes';

const DisplaySettings = ({ attributes, setAttributes }) => {
	const { number, offset, showOptionCount, other_attributes } = attributes;

	return (
		<>
			<PanelRow>
				<TextControl
					type="number"
					label={__('Max authors to display', 'popular-authors')}
					value={number}
					onChange={createAttributeChange(setAttributes, 'number')}
					help={__(
						'Value -1 (all authors) is supported, but should be used with caution on larger sites.',
						'popular-authors'
					)}
					min={-1}
				/>
			</PanelRow>
			<PanelRow>
				<TextControl
					type="number"
					label={__('Offset', 'popular-authors')}
					value={offset}
					onChange={createAttributeChange(setAttributes, 'offset')}
					help={__(
						'Number of authors to offset in retrieved results. Only applies if number of authors set above is >0',
						'popular-authors'
					)}
					min={0}
				/>
			</PanelRow>
			<PanelRow>
				<ToggleControl
					label={__('Show count', 'popular-authors')}
					help={
						showOptionCount
							? __('Count displayed', 'popular-authors')
							: __('No count displayed', 'popular-authors')
					}
					checked={showOptionCount}
					onChange={createAttributeToggle(
						setAttributes,
						attributes,
						'showOptionCount'
					)}
				/>
			</PanelRow>
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
		</>
	);
};

export default DisplaySettings;
