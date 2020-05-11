/**
 * Media control script.
 * @author 10 Quality <info@10quality.com>
 * @package wpmvc-addon-resources
 * @license MIT
 * @version 1.0.7
 */
( function( $ ) { $( document ).ready( function() {
    /**
     * Repeater support, init select2 after items is added
     * @since 1.0.6
     *
     * @param {object} event
     * @param {object} $items
     * @param {string} key
     */
    $( document ).on( 'repeater:items.add.after', function( event, $items, key ) {
        if ( $items.find( '*[data-repeater-key="' + key + '"] .media-uploader' ).length ) {
            $items.find( '*[data-repeater-key="' + key + '"] .media-uploader' ).each( function() {
                $( this ).wp_media_uploader();
            } );
        }
    } );
    /**
     * Repeater support, destroy datepicker before item is removed
     * @since 1.0.4
     *
     * @param {object} event
     * @param {object} $items
     * @param {string} key
     */
    $( document ).on( 'repeater:items.remove.before', function( event, $items, key ) {
        if ( $items.find( '*[data-repeater-key="' + key + '"] .media-uploader' ).length ) {
            $items.find( '*[data-repeater-key="' + key + '"] .media-uploader' ).wp_media_uploader( 'destroy' );
        }
    } );
} ); } )( jQuery );