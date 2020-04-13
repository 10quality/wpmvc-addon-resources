<?php

use WPMVC\Addon\Resources\ResourceManager as Resource;

/**
 * Global functions.
 * 
 * @author 10 Quality Studio <https://www.10quality.com>
 * @package wpmvc-addon-resources
 * @license MIT
 * @version 1.0.0
 */

if ( !function_exists( 'wpmvc_register_addon_resource' ) ) {
    /**
     * Registers an asset using wp_register_script and wp_register_style.
     * @since 1.0.0
     * 
     * @param string $resource_id
     */
    function wpmvc_register_addon_resource( $resource_id )
    {
        Resource::register( $resource_id );
    }
}