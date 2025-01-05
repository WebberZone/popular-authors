import { __ } from '@wordpress/i18n';
import { TextControl, ToggleControl, PanelRow } from '@wordpress/components';
import {
	createAttributeToggle,
	createAttributeChange,
} from '../utils/attributes';

const TimeSettings = ({ attributes, setAttributes }) => {
	const { daily, daily_range, hour_range } = attributes;

	return (
		<>
			<PanelRow>
				<ToggleControl
					label={__('Custom period?', 'top-10')}
					help={
						daily
							? __('Set range below', 'top-10')
							: __(
									'Overall popular posts will be shown',
									'top-10'
								)
					}
					checked={daily}
					onChange={createAttributeToggle(
						setAttributes,
						attributes,
						'daily'
					)}
				/>
			</PanelRow>
			{daily && (
				<>
					<PanelRow>
						<TextControl
							type="number"
							label={__('Daily range', 'top-10')}
							value={daily_range}
							onChange={createAttributeChange(
								setAttributes,
								'daily_range'
							)}
							help={__('Number of days', 'top-10')}
							min={0}
						/>
					</PanelRow>
					<PanelRow>
						<TextControl
							type="number"
							label={__('Hour range', 'top-10')}
							value={hour_range}
							onChange={createAttributeChange(
								setAttributes,
								'hour_range'
							)}
							help={__('Number of hours', 'top-10')}
							min={0}
						/>
					</PanelRow>
				</>
			)}
		</>
	);
};

export default TimeSettings;
