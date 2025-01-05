import { __ } from '@wordpress/i18n';
import ServerSideRender from '@wordpress/server-side-render';
import { useBlockProps, InspectorControls } from '@wordpress/block-editor';
import { PanelBody, Disabled } from '@wordpress/components';

/**
 * Internal dependencies
 */
import DisplaySettings from './components/DisplaySettings';
import TimeSettings from './components/TimeSettings';
import AuthorSettings from './components/AuthorSettings';

export default function Edit({ attributes, setAttributes }) {
	const blockProps = useBlockProps();

	return (
		<>
			<InspectorControls>
				<PanelBody
					title={__('Popular Authors Settings', 'popular-authors')}
					initialOpen={true}
				>
					<DisplaySettings
						attributes={attributes}
						setAttributes={setAttributes}
					/>
					<TimeSettings
						attributes={attributes}
						setAttributes={setAttributes}
					/>
					<AuthorSettings
						attributes={attributes}
						setAttributes={setAttributes}
					/>
				</PanelBody>
			</InspectorControls>

			<div {...blockProps}>
				<Disabled>
					<ServerSideRender
						block="popular-authors/popular-authors"
						attributes={attributes}
					/>
				</Disabled>
			</div>
		</>
	);
}
