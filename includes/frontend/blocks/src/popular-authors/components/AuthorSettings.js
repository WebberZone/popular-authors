import { __ } from '@wordpress/i18n';
import { TextControl, ToggleControl, PanelRow } from '@wordpress/components';
import {
	createAttributeToggle,
	createAttributeChange,
} from '../utils/attributes';

const AuthorSettings = ({ attributes, setAttributes }) => {
	const {
		showFullName,
		showAvatar,
		excludeAdmin,
		hideEmptyAuthors,
		include,
		exclude,
	} = attributes;

	return (
		<>
			<PanelRow>
				<ToggleControl
					label={__('Show Full Name', 'popular-authors')}
					help={
						showFullName
							? __('Full Name is displayed', 'popular-authors')
							: __('Display Name is displayed', 'popular-authors')
					}
					checked={showFullName}
					onChange={createAttributeToggle(
						setAttributes,
						attributes,
						'showFullName'
					)}
				/>
			</PanelRow>
			<PanelRow>
				<ToggleControl
					label={__('Show Avatar', 'popular-authors')}
					help={
						showAvatar
							? __('Avatar displayed', 'popular-authors')
							: __('No avatar displayed', 'popular-authors')
					}
					checked={showAvatar}
					onChange={createAttributeToggle(
						setAttributes,
						attributes,
						'showAvatar'
					)}
				/>
			</PanelRow>
			<PanelRow>
				<ToggleControl
					label={__('Exclude admin', 'popular-authors')}
					help={
						excludeAdmin
							? __(
									"'admin' account is excluded",
									'popular-authors'
								)
							: __(
									"'admin' account is included",
									'popular-authors'
								)
					}
					checked={excludeAdmin}
					onChange={createAttributeToggle(
						setAttributes,
						attributes,
						'excludeAdmin'
					)}
				/>
			</PanelRow>
			<PanelRow>
				<ToggleControl
					label={__('Hide authors with no posts', 'popular-authors')}
					help={
						hideEmptyAuthors
							? __(
									'Authors with no posts are excluded',
									'popular-authors'
								)
							: __(
									'Authors with no posts are included',
									'popular-authors'
								)
					}
					checked={hideEmptyAuthors}
					onChange={createAttributeToggle(
						setAttributes,
						attributes,
						'hideEmptyAuthors'
					)}
				/>
			</PanelRow>
			<PanelRow>
				<TextControl
					label={__('Author IDs to include', 'popular-authors')}
					value={include}
					onChange={createAttributeChange(setAttributes, 'include')}
					help={__(
						'Comma-separated list of author IDs to include. This has priority over exclude.',
						'popular-authors'
					)}
				/>
			</PanelRow>
			<PanelRow>
				<TextControl
					label={__('Author IDs to exclude', 'popular-authors')}
					value={exclude}
					onChange={createAttributeChange(setAttributes, 'exclude')}
					help={__(
						'Comma-separated list of author IDs to exclude',
						'popular-authors'
					)}
				/>
			</PanelRow>
		</>
	);
};

export default AuthorSettings;
