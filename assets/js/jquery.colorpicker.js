/**
 * Colorpicker (spectrum) control script.
 * @author 10 Quality <info@10quality.com>
 * @package wpmvc-addon-administrator
 * @license MIT
 * @version 1.0.6
 */
( function( $ ) { $( document ).ready( function() {
    /**
     * Init colorpicker plugin on every input requesting it.
     * @since 1.0.4
     */
    $( '.spectrum' ).each( function() {
        $( this ).spectrum( {
            showInput: $( this ).data( 'show-input' ) !== undefined ? $( this ).data( 'show-input' ) : true,
            allowEmpty: $( this ).data( 'allow-empty' ) !== undefined ? $( this ).data( 'allow-empty' ) : false,
            showAlpha: $( this ).data( 'show-alpha' ) !== undefined ? $( this ).data( 'allow-alpha' ) : false,
            showPalette: $( this ).data( 'show-palette' ) !== undefined ? $( this ).data( 'allow-palette' ) : false,
            showPaletteOnly: $( this ).data( 'show-palette-only' ) !== undefined ? $( this ).data( 'show-palette-only' ) : false,
            flat: $( this ).data( 'flat' ) !== undefined ? $( this ).data( 'flat' ) : false,
            disabled: $( this ).attr( 'disabled' ) !== undefined ? $( this ).attr( 'disabled' ) : false,
            containerClassName: $( this ).data( 'container-class' ) || undefined,
            preferredFormat: $( this ).data( 'format' ) || ( $( this ).data( 'allow-empty' ) ? 'rgb'  : 'hex' ),
        } );
    } );
    /**
     * Repeater support, init colorpicker after items is added
     * @since 1.0.4
     *
     * @param {object} event
     * @param {object} $items
     * @param {string} key
     */
    $( document ).on( 'repeater:items.add.after', function( event, $items, key ) {
        if ( $items.find( '*[data-repeater-key="' + key + '"] .spectrum' ).length ) {
            $items.find( '*[data-repeater-key="' + key + '"] .spectrum' ).each( function() {
                $( this ).spectrum( {
                    showInput: $( this ).data( 'show-input' ) !== undefined ? $( this ).data( 'show-input' ) : true,
                    allowEmpty: $( this ).data( 'allow-empty' ) !== undefined ? $( this ).data( 'allow-empty' ) : false,
                    showAlpha: $( this ).data( 'show-alpha' ) !== undefined ? $( this ).data( 'allow-alpha' ) : false,
                    showPalette: $( this ).data( 'show-palette' ) !== undefined ? $( this ).data( 'allow-palette' ) : false,
                    showPaletteOnly: $( this ).data( 'show-palette-only' ) !== undefined ? $( this ).data( 'show-palette-only' ) : false,
                    flat: $( this ).data( 'flat' ) !== undefined ? $( this ).data( 'flat' ) : false,
                    disabled: $( this ).attr( 'disabled' ) !== undefined ? $( this ).attr( 'disabled' ) : false,
                    containerClassName: $( this ).data( 'container-class' ) || undefined,
                    preferredFormat: $( this ).data( 'format' ) || ( $( this ).data( 'allow-empty' ) ? 'rgb'  : 'hex' ),
                } );
            } );
        }
    } );
    /**
     * Repeater support, destroy colorpicker before item is removed
     * @since 1.0.4
     *
     * @param {object} event
     * @param {object} $items
     * @param {string} key
     */
    $( document ).on( 'repeater:items.remove.before', function( event, $items, key ) {
        if ( $items.find( '*[data-repeater-key="' + key + '"] .spectrum' ).length ) {
            $items.find( '*[data-repeater-key="' + key + '"] .spectrum' ).spectrum( 'destroy' );
        }
    } );
} ); } )( jQuery );