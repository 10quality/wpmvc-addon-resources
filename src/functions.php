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
        Resource::handle( $resource_id, false );
    }
}

if ( !function_exists( 'wpmvc_enqueue_addon_resource' ) ) {
    /**
     * Enqueues an asset using wp_enqueue_script and wp_enqueue_style.
     * @since 1.0.0
     * 
     * @param string $resource_id
     */
    function wpmvc_enqueue_addon_resource( $resource_id )
    {
        Resource::handle( $resource_id, true );
    }
}

if ( ! function_exists( 'addon_resource_url' ) ) {
    /**
     * Returns url of a resource located in the addon resources package.
     * Addon package name should not be prefixed with "addon" or "assets".
     * @since 1.0.0
     *
     * @link https://codex.wordpress.org/Function_Reference/home_url
     * @link https://codex.wordpress.org/Function_Reference/network_home_url
     * 
     * @param string $path       Asset relative path.
     * @param string $file       File location path.
     * @param string $scheme     Scheme to give the home url context. Currently 'http','https'.
     * @param bool   $is_network Flag that indicates if base url should be retrieved from a network setup.
     *
     * @return string URL
     */
    function addon_resource_url( $path, $file, $scheme = null, $is_network = false )
    {
        // Preparation
        $route = preg_replace( '/\\\\/', '/', $file );
        $url = apply_filters(
            'asset_base_url',
            rtrim( $is_network ? network_home_url( '/', $scheme ) : home_url( '/', $scheme ), '/' )
        );
        // Clean base path
        $route = preg_replace( '/.+?(?=wp-content)/', '', $route );
        // Clean project relative path
        $route = preg_replace( '/\/src[\/\\\\A-Za-z0-9\.\-]+/', '', $route );
        $route = preg_replace( '/\/assets[\/\\\\A-Za-z0-9\.\-]+/', '', $route );
        $route = apply_filters( 'app_route', $route );
        return $url . '/' . apply_filters( 'app_route_addon', $route ) . '/assets/' . $path;
    }
}