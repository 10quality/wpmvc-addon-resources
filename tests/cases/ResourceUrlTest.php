<?php
use PHPUnit\Framework\TestCase;
/**
 * Test case.
 */
class ResourceUrlTest extends TestCase
{
    /**
     * Verify that global functions exist.
     * @group functions
     */
    public function testFunction()
    {
        $this->assertTrue( function_exists( 'addon_resource_url' ) );
    }
    /**
     * Test a basic call to "addon_resource_url" from a possible theme location.
     * @group functions
     * @requires function addon_resource_url
     */
    public function testFromTheme()
    {
        // Prepare and run
        $url = addon_resource_url(
            'img/addon.png',
            'C:\\www\\test\\wp-content\\themes\\my-theme\\vendor\\10quality\\wpmvc-addon-resource\\src\\ResourceManager.php'
        );
        // Assert
        $this->assertEquals(
            'http://www.test.com/wp-content/themes/my-theme/vendor/10quality/wpmvc-addon-resource/assets/img/addon.png',
            $url
        );
    }
    /**
     * Test a basic call to "addon_resource_url" from a possible plugin location.
     * @group functions
     * @requires function addon_resource_url
     */
    public function testFromPlugin()
    {
        // Prepare and run
        $url = addon_resource_url(
            'img/addon.png',
            'C:\\www\\test\\wp-content\\plugins\\my-plugin\\vendor\\10quality\\wpmvc-addon-resource\\src\\ResourceManager.php'
        );
        // Assert
        $this->assertEquals(
            'http://www.test.com/wp-content/plugins/my-plugin/vendor/10quality/wpmvc-addon-resource/assets/img/addon.png',
            $url
        );
    }
    /**
     * Test scheme implementation.
     * @group functions
     * @requires function addon_resource_url
     */
    public function testScheme()
    {
        // Prepare and run
        $url = addon_resource_url(
            'img/addon.png',
            'C:\\www\\test\\wp-content\\themes\\my-theme\\vendor\\10quality\\wpmvc-addon-resource\\src\\ResourceManager.php',
            'https'
        );
        // Assert
        $this->assertEquals(
            'https://www.test.com/wp-content/themes/my-theme/vendor/10quality/wpmvc-addon-resource/assets/img/addon.png',
            $url
        );
    }
}