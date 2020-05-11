<?php

namespace WPMVC\Addon\Resources;

use TenQuality\WP\File;

/**
 * Handles resources registration.
 * 
 * @author 10 Quality Studio <https://www.10quality.com>
 * @package wpmvc-addon-resources
 * @license MIT
 * @version 1.0.2
 */
class ResourceManager
{
    /**
     * Registers an asset using wp_register_script and wp_register_style.
     * @since 1.0.0
     * 
     * @param string $resource_id
     * @param bool   $enqueue     Flag that indiates if resource should be enqueued or only registered.
     */
    public static function handle( $resource_id, $enqueue = false )
    {
        $locale = substr( get_locale(), 0, 2 );
        $resources = [];
        switch ( $resource_id ) {
            case 'wpmvc-hideshow':
                $resources[] = [
                    'type' => 'script',
                    'id' => $resource_id,
                    'url' => addon_resource_url( 'js/jquery.hide-show.js', __FILE__ ),
                    'dep' => ['jquery'],
                    'version' => '1.0.5',
                ];
                break;
            case 'wpmvc-repeater':
                $resources[] = [
                    'type' => 'style',
                    'id' => $resource_id,
                    'url' => addon_resource_url( 'css/repeater.css', __FILE__ ),
                    'version' => '1.0.1',
                ];
                $resources[] = [
                    'type' => 'script',
                    'id' => $resource_id,
                    'url' => addon_resource_url( 'js/jquery.repeater.js', __FILE__ ),
                    'dep' => ['jquery', 'wpmvc-hideshow'],
                    'version' => '1.0.6',
                ];
                break;
            case 'wpmvc-choose':
                $resources[] = [
                    'type' => 'style',
                    'id' => $resource_id,
                    'url' => addon_resource_url( 'css/choose.css', __FILE__ ),
                    'version' => '1.0.0',
                ];
                break;
            case 'wpmvc-radio':
                $resources[] = [
                    'type' => 'style',
                    'id' => $resource_id,
                    'url' => addon_resource_url( 'css/radio.css', __FILE__ ),
                    'version' => '1.0.0',
                ];
                break;
            case 'wpmvc-switch':
                $resources[] = [
                    'type' => 'style',
                    'id' => $resource_id,
                    'url' => addon_resource_url( 'css/switch.css', __FILE__ ),
                    'version' => '1.0.4',
                ];
                $resources[] = [
                    'type' => 'script',
                    'id' => $resource_id,
                    'url' => addon_resource_url( 'js/jquery.switch.js', __FILE__ ),
                    'dep' => ['jquery'],
                    'version' => '1.0.4',
                ];
                break;
            case 'font-awesome':
                $resources[] = [
                    'type' => 'style',
                    'id' => $resource_id,
                    'url' => addon_resource_url( 'css/font-awesome.min.css', __FILE__ ),
                    'version' => '4.7.0',
                ];
                break;
            case 'select2':
                $resources[] = [
                    'type' => 'style',
                    'id' => $resource_id,
                    'url' => addon_resource_url( 'css/select2.min.css', __FILE__ ),
                    'version' => '4.0.13',
                ];
                $resources[] = [
                    'type' => 'script',
                    'id' => $resource_id,
                    'url' => addon_resource_url( 'js/select2.min.js', __FILE__ ),
                    'dep' => ['jquery'],
                    'version' => '4.0.13',
                ];
                $filename = addon_resource_url( 'js/i18n/' . $locale . '.js', __FILE__ );
                if ( File::auth()->exists( $filename ) )
                    $resources[] = [
                        'type' => 'script',
                        'id' => 'select2-i18n-' . $locale,
                        'url' => $filename,
                        'dep' => ['select2'],
                        'version' => '4.0.13',
                    ];
                break;
            case 'wpmvc-select2':
                $resources[] = [
                    'type' => 'style',
                    'id' => $resource_id,
                    'url' => addon_resource_url( 'css/select2.css', __FILE__ ),
                    'version' => '1.0.5',
                ];
                $resources[] = [
                    'type' => 'script',
                    'id' => $resource_id,
                    'url' => addon_resource_url( 'js/jquery.select2.js', __FILE__ ),
                    'dep' => ['jquery'],
                    'version' => '1.0.6',
                ];
                break;
            case 'spectrum':
                $resources[] = [
                    'type' => 'style',
                    'id' => $resource_id,
                    'url' => addon_resource_url( 'css/spectrum.css', __FILE__ ),
                    'version' => '1.8.0',
                ];
                $resources[] = [
                    'type' => 'script',
                    'id' => $resource_id,
                    'url' => addon_resource_url( 'js/spectrum.js', __FILE__ ),
                    'dep' => ['jquery'],
                    'version' => '1.8.0',
                ];
                $filename = addon_resource_url( 'js/i18n/jquery.spectrum-' . $locale . '.js', __FILE__ );
                if ( File::auth()->exists( $filename ) )
                    $resources[] = [
                        'type' => 'script',
                        'id' => 'spectrum-i18n-' . $locale,
                        'url' => $filename,
                        'dep' => ['spectrum'],
                        'version' => '1.8.0',
                    ];
                break;
            case 'wpmvc-colorpicker':
                $resources[] = [
                    'type' => 'script',
                    'id' => $resource_id,
                    'url' => addon_resource_url( 'js/jquery.colorpicker.js', __FILE__ ),
                    'dep' => ['jquery', 'spectrum'],
                    'version' => '1.0.6',
                ];
                break;
            case 'jquery-ui-datepicker':
                $resources[] = [
                    'type' => 'style',
                    'id' => 'jquery-ui-theme',
                    'url' => addon_resource_url( 'css/jquery-ui.theme.min.css', __FILE__ ),
                    'version' => '1.12.1',
                ];
                $resources[] = [
                    'type' => 'style',
                    'id' => $resource_id,
                    'url' => addon_resource_url( 'css/datepicker.css', __FILE__ ),
                    'dep' => ['jquery-ui-theme'],
                    'version' => '1.12.1',
                ];
                break;
            case 'wpmvc-datepicker':
                $resources[] = [
                    'type' => 'script',
                    'id' => $resource_id,
                    'url' => addon_resource_url( 'js/jquery.datepicker.js', __FILE__ ),
                    'dep' => ['jquery-ui-datepicker'],
                    'version' => '1.0.5',
                ];
                break;
            case 'datetimepicker':
                $resources[] = [
                    'type' => 'style',
                    'id' => 'jquery-datetimepicker',
                    'url' => addon_resource_url( 'css/jquery.datetimepicker.min.css', __FILE__ ),
                    'version' => '2.5.21',
                ];
                $resources[] = [
                    'type' => 'script',
                    'id' => 'jquery-datetimepicker',
                    'url' => addon_resource_url( 'js/jquery.datetimepicker.full.min.js', __FILE__ ),
                    'dep' => ['jquery'],
                    'version' => '2.5.21',
                ];
                break;
            case 'wpmvc-datetimepicker':
                $resources[] = [
                    'type' => 'script',
                    'id' => $resource_id,
                    'url' => addon_resource_url( 'js/jquery.datetimepicker.js', __FILE__ ),
                    'dep' => ['jquery-datetimepicker'],
                    'version' => '1.0.5',
                ];
                break;
            case 'wp-media-uploader':
                wp_enqueue_media();
                $resources[] = [
                    'type' => 'script',
                    'id' => $resource_id,
                    'url' =>  addon_resource_url( 'js/jquery.wp-media-uploader.min.js', __FILE__ ),
                    'dep' => ['jquery', 'jquery-ui-core', 'wp-api'],
                    'version' => '1.0.1',
                ];
                break;
            case 'wpmvc-media':
                $resources[] = [
                    'type' => 'style',
                    'id' => $resource_id,
                    'url' => addon_resource_url( 'css/media.css', __FILE__ ),
                    'version' => '1.0.1',
                ];
                $resources[] = [
                    'type' => 'script',
                    'id' => $resource_id,
                    'url' => addon_resource_url( 'js/jquery.media.js', __FILE__ ),
                    'dep' => ['wp-media-uploader'],
                    'version' => '1.0.6',
                ];
                break;
        }
        foreach ( $resources as $resource ) {
            switch ( $resource['type'] ) {
                case 'style':
                    if ( $enqueue ) {
                        wp_enqueue_style(
                            $resource['id'],
                            $resource['url'],
                            array_key_exists( 'dep', $resource ) ? $resource['dep'] : [],
                            array_key_exists( 'version', $resource ) ? $resource['version'] : null
                        );
                    } else {
                        wp_register_style(
                            $resource['id'],
                            $resource['url'],
                            array_key_exists( 'dep', $resource ) ? $resource['dep'] : [],
                            array_key_exists( 'version', $resource ) ? $resource['version'] : null
                        );
                    }
                    break;
                case 'script':
                    if ( $enqueue ) {
                        wp_enqueue_script(
                            $resource['id'],
                            $resource['url'],
                            array_key_exists( 'dep', $resource ) ? $resource['dep'] : [],
                            array_key_exists( 'version', $resource ) ? $resource['version'] : null,
                            array_key_exists( 'footer', $resource ) ? $resource['footer'] : true
                        );
                    } else {
                        wp_register_script(
                            $resource['id'],
                            $resource['url'],
                            array_key_exists( 'dep', $resource ) ? $resource['dep'] : [],
                            array_key_exists( 'version', $resource ) ? $resource['version'] : null,
                            array_key_exists( 'footer', $resource ) ? $resource['footer'] : true
                        );
                    }
                    break;
            }
        }
    }
}