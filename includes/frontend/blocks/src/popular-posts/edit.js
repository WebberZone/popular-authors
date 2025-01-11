/**
 * WordPress dependencies
 */
import { __ } from '@wordpress/i18n';
import {
	PanelBody,
	FormTokenField,
	SelectControl,
	ToggleControl,
	RangeControl,
	Spinner,
	Disabled,
} from '@wordpress/components';
import { InspectorControls, useBlockProps } from '@wordpress/block-editor';
import ServerSideRender from '@wordpress/server-side-render';
import { useSelect } from '@wordpress/data';
import { store as coreStore } from '@wordpress/core-data';

/**
 * Edit function for Popular Posts by Author block
 *
 * @param {Object} props Block properties
 * @return {WPElement} Element to render.
 */
export default function Edit(props) {
	const { attributes, setAttributes } = props;
	const blockProps = useBlockProps();

	const {
		author,
		postsPerPage,
		postType,
		orderby,
		order,
		daily,
		dailyRange,
		hourRange,
		showOptionCount,
	} = attributes;

	const { authors, isLoading, postTypes, postTypeMap } = useSelect(
		(select) => {
			const { getUsers } = select('core');
			const { getPostTypes } = select('core');
			const queryArgs = {
				per_page: -1,
				has_published_posts: true,
				context: 'edit',
			};

			// Create a map of post type slugs to names for suggestions
			const postTypeMap = {};
			const types =
				getPostTypes({ per_page: -1 })?.filter(
					(type) => type.viewable
				) || [];
			types.forEach((type) => {
				postTypeMap[type.slug] = type.name;
			});

			return {
				authors: getUsers(queryArgs),
				isLoading: !select('core').hasFinishedResolution('getUsers', [
					queryArgs,
				]),
				postTypes: types,
				postTypeMap,
			};
		},
		[]
	);

	const getAuthorOptions = () => {
		if (!authors) {
			return [];
		}

		return authors.map((author) => {
			let displayName = '';

			// Try first name + last name
			if (author.first_name && author.last_name) {
				displayName = `${author.first_name} ${author.last_name}`;
			}
			// Try just first name
			else if (author.first_name) {
				displayName = author.first_name;
			}
			// Try just last name
			else if (author.last_name) {
				displayName = author.last_name;
			}
			// Fall back to display name
			else if (author.display_name) {
				displayName = author.display_name;
			}
			// Last resort: username
			else {
				displayName = author.name;
			}

			return {
				label: displayName,
				value: author.id.toString(),
			};
		});
	};

	// Get the current post types as an array
	const currentPostTypes = postType ? postType.split(',') : ['post'];

	// Create suggestions array with proper labels
	const suggestions =
		postTypes?.map((type) => ({
			value: type.slug,
			label: type.name,
		})) || [];

	return (
		<div {...blockProps}>
			<InspectorControls>
				<PanelBody title={__('Settings', 'popular-authors')}>
					{isLoading ? (
						<Spinner />
					) : (
						<SelectControl
							label={__('Author', 'popular-authors')}
							value={author}
							options={[
								{
									label: __(
										'Select an author',
										'popular-authors'
									),
									value: '',
								},
								...getAuthorOptions(),
							]}
							onChange={(value) => {
								setAttributes({
									author: value,
									field: 'id', // Always set to ID when using dropdown
								});
							}}
						/>
					)}
					<RangeControl
						label={__('Number of posts', 'popular-authors')}
						value={postsPerPage}
						onChange={(value) =>
							setAttributes({ postsPerPage: value })
						}
						min={1}
						max={100}
					/>
					<FormTokenField
						label={__('Post Types', 'popular-authors')}
						value={currentPostTypes.map(
							(slug) =>
								suggestions.find((s) => s.value === slug)
									?.label || slug
						)}
						suggestions={suggestions.map((s) => s.label)}
						onChange={(tokens) => {
							const slugs = tokens.map(
								(token) =>
									suggestions.find((s) => s.label === token)
										?.value || token
							);
							setAttributes({ postType: slugs.join(',') });
						}}
						__experimentalShowHowTo={false}
						__experimentalExpandOnFocus={true}
					/>
					<SelectControl
						label={__('Order By', 'popular-authors')}
						value={orderby}
						options={[
							{
								label: __('Visits', 'popular-authors'),
								value: 'visits',
							},
							{
								label: __('Date', 'popular-authors'),
								value: 'date',
							},
							{
								label: __('Title', 'popular-authors'),
								value: 'title',
							},
						]}
						onChange={(value) => setAttributes({ orderby: value })}
					/>
					<SelectControl
						label={__('Order', 'popular-authors')}
						value={order}
						options={[
							{
								label: __('Descending', 'popular-authors'),
								value: 'DESC',
							},
							{
								label: __('Ascending', 'popular-authors'),
								value: 'ASC',
							},
						]}
						onChange={(value) => setAttributes({ order: value })}
					/>
					<ToggleControl
						label={__('Custom period?', 'popular-authors')}
						checked={daily}
						onChange={(value) => setAttributes({ daily: value })}
					/>
					{daily && (
						<>
							<RangeControl
								label={__('Number of days', 'popular-authors')}
								value={dailyRange}
								onChange={(value) =>
									setAttributes({ dailyRange: value })
								}
							/>
							<RangeControl
								label={__('Number of hours', 'popular-authors')}
								value={hourRange}
								onChange={(value) =>
									setAttributes({ hourRange: value })
								}
								max={24}
							/>
						</>
					)}
					<ToggleControl
						label={__('Display post count?', 'popular-authors')}
						checked={showOptionCount}
						onChange={(value) =>
							setAttributes({ showOptionCount: value })
						}
					/>
				</PanelBody>
			</InspectorControls>

			<div {...blockProps}>
				<Disabled>
					<ServerSideRender
						block="popular-authors/popular-posts"
						attributes={attributes}
					/>
				</Disabled>
			</div>
		</div>
	);
}
