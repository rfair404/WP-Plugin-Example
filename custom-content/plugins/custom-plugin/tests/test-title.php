<?php
/**
 * Class SampleTest
 *
 * @package Custom_Plugin
 */

/**
 * Sample test case.
 */
class TitleTest extends WP_UnitTestCase {

	/**
	 * A single example test.
	 */
	public function test_title_has_filter() {
		// Replace this with some actual testing code.
		$this->assertEquals( 10, has_filter( 'bloginfo', 'wppe_convert_title') );
	}

	public function test_filter_returns_foo() {
	    $title = 'WP TEST SITE';
	    \update_option('blogname', $title );
	    $this->assertEquals( sprintf( '%s - %s', $title, 'foo' ), apply_filters( 'bloginfo', get_option( 'blogname' ) ) );
    }

}
