<?php
/**
 * Class PopularAuthorsTest
 *
 * @package Popular_Authors
 */

/**
 * Sample test case.
 */
class PopularAuthorsTest extends WP_UnitTestCase {

	/**
	 * Test initialization of the plugin
	 */
	public function test_plugin_initialized() {
		$this->assertTrue( class_exists( '\WebberZone\Popular_Authors\Main' ) );
	}

}
