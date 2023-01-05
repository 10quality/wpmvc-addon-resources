<?php
use PHPUnit\Framework\TestCase;
/**
 * Test case.
 * @version 1.0.5
 */
class ResourcesTest extends TestCase
{
    /**
     * Clear globals. 
     */
    public function setUp(): void
    {
        $GLOBALS['styles'] = [];
        $GLOBALS['scripts'] = [];
    }
    /**
     * Verify that global functions exist.
     * @group functions
     */
    public function testFunctions()
    {
        $this->assertTrue( function_exists( 'wpmvc_register_addon_resource' ) );
        $this->assertTrue( function_exists( 'wpmvc_enqueue_addon_resource' ) );
    }
    /**
     * Verify registration.
     * @group register
     * @requires function wpmvc_register_addon_resource
     */
    public function testRegister()
    {
        // Prepare
        $id = 'select2';
        // Run
        wpmvc_register_addon_resource( $id );
        global $styles, $scripts;
        // Assert
        $this->assertArrayHasKey( $id, $styles );
        $this->assertArrayHasKey( $id, $scripts );
        $this->assertEquals( 'registered', $styles[$id] );
        $this->assertEquals( 'registered', $scripts[$id] );
    }
    /**
     * Verify enqueue.
     * @group enqueue
     * @requires function wpmvc_enqueue_addon_resource
     */
    public function testEnqueue()
    {
        // Prepare
        $id = 'select2';
        // Run
        wpmvc_enqueue_addon_resource( $id );
        global $styles, $scripts;
        // Assert
        $this->assertArrayHasKey( $id, $styles );
        $this->assertArrayHasKey( $id, $scripts );
        $this->assertEquals( 'enqueued', $styles[$id] );
        $this->assertEquals( 'enqueued', $scripts[$id] );
    }
    /**
     * Verify registration.
     * @group register
     * @requires function wpmvc_register_addon_resource
     */
    public function testNonRegister()
    {
        // Prepare
        $id = 'select2';
        // Run
        wpmvc_register_addon_resource( 'wpmvc-select2' );
        global $styles, $scripts;
        // Assert
        $this->assertArrayNotHasKey( $id, $styles );
        $this->assertArrayNotHasKey( $id, $scripts );
    }
    /**
     * Verify enqueue.
     * @group enqueue
     * @requires function wpmvc_enqueue_addon_resource
     */
    public function testNonEnqueue()
    {
        // Prepare
        $id = 'select2';
        // Run
        wpmvc_enqueue_addon_resource( 'wpmvc-select2' );
        global $styles, $scripts;
        // Assert
        $this->assertArrayNotHasKey( $id, $styles );
        $this->assertArrayNotHasKey( $id, $scripts );
    }
}