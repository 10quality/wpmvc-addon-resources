<?php

namespace WPMVC\Addon\Resources;

/**
 * Handles resources registration.
 * 
 * @author 10 Quality Studio <https://www.10quality.com>
 * @package wpmvc-addon-resources
 * @license MIT
 * @version 1.0.0
 */
class ResourceManager
{
    /**
     * Registers an asset using wp_register_script and wp_register_style.
     * @since 1.0.0
     * 
     * @param string $resource_id
     */
    public static function register( $resource_id )
    {
        switch ( $resource_id ) {
            case 'wpmvc-resources-hideshow':
                wp_register_script(
                    'wpmvc-resources-hideshow',
                    addon_assets_url( 'js/jquery.hide-show.js', __FILE__ ),
                    ['jquery'],
                    '1.0.5',
                    true
                );
                break;
            case 'wpmvc-resources-repeater':
                wp_register_style(
                    'wpmvc-resources-repeater',
                    addon_assets_url( 'css/repeater.css', __FILE__ ),
                    [],
                    '1.0.1'
                );
                wp_register_script(
                    'wpmvc-resources-repeater',
                    addon_assets_url( 'js/jquery.repeater.js', __FILE__ ),
                    ['jquery'],
                    '1.0.5',
                    true
                );
                break;
            case 'wpmvc-resources-choose':
                wp_register_style(
                    'wpmvc-resources-choose',
                    addon_assets_url( 'css/choose.css', __FILE__ ),
                    [],
                    '1.0.0'
                );
                break;
            case 'wpmvc-resources-radio':
                wp_register_style(
                    'wpmvc-resources-choose',
                    addon_assets_url( 'css/radio.css', __FILE__ ),
                    [],
                    '1.0.0'
                );
                break;
            case 'wpmvc-resources-switch':
                wp_register_style(
                    'wpmvc-resources-repeater',
                    addon_assets_url( 'css/switch.css', __FILE__ ),
                    [],
                    '1.0.4'
                );
                wp_register_script(
                    'wpmvc-resources-switch',
                    addon_assets_url( 'js/jquery.switch.js', __FILE__ ),
                    ['jquery'],
                    '1.0.4',
                    true
                );
                break;
        }
    }
}