/**
 * Create a toggle attribute handler
 *
 * @param {Function} setAttributes The setAttributes function
 * @param {Object} attributes The current attributes
 * @param {string} attributeName The name of the attribute to toggle
 * @return {Function} The toggle handler
 */
export const createAttributeToggle =
	(setAttributes, attributes, attributeName) => () => {
		setAttributes({ [attributeName]: !attributes[attributeName] });
	};

/**
 * Create a change handler for an attribute
 *
 * @param {Function} setAttributes The setAttributes function
 * @param {string} attributeName The name of the attribute to change
 * @return {Function} The change handler
 */
export const createAttributeChange =
	(setAttributes, attributeName) => (value) => {
		// Convert to number for specific attributes
		if (
			['number', 'offset', 'daily_range', 'hour_range'].includes(
				attributeName
			)
		) {
			value = value === '' ? 0 : parseInt(value, 10);
		}
		setAttributes({ [attributeName]: value });
	};
