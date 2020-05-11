/**
 * Datetimepicker control script.
 * @author 10 Quality <info@10quality.com>
 * @package wpmvc-addon-administrator
 * @license MIT
 * @version 1.0.6
 */
( function( $ ) { $( document ).ready( function() {
    /**
     * Init datetimepicker plugin on every input requesting it.
     * @since 1.0.5
     */
    $( '.datetimepicker' ).each( function() {
        var i18n = $( this ).data( 'i18n' )
            ? window[$( this ).data( 'i18n' )]( $( this ).attr( 'lang' ) )
            : undefined;
        var allowTimes = $( this ).data( 'allowed-times' )
            ? window[$( this ).data( 'allowed-times' )]()
            : undefined;
        $( this ).datetimepicker( {
            timepicker: $( this ).data( 'show-time' ) !== undefined ? $( this ).data( 'show-time' ) : true,
            datepicker: $( this ).data( 'show-date' ) !== undefined ? $( this ).data( 'show-date' ) : true,
            format: $( this ).data( 'format' ) || 'Y-m-d H:i',
            startDate: $( this ).data( 'start-date' ) || undefined,
            minDate: $( this ).data( 'min-date' ) || undefined,
            maxDate: $( this ).data( 'max-date' ) || undefined,
            mask: $( this ).data( 'mask' ) !== undefined ? $( this ).data( 'mask' ) : false,
            inline: $( this ).data( 'show-inline' ) !== undefined ? $( this ).data( 'show-inline' ) : false,
            i18n: i18n || undefined,
            allowTimes: allowTimes || undefined,
            lang: $( this ).attr( 'lang' ) || undefined,
        } );
    } );
    /**
     * Repeater support, init datetimepicker after items is added
     * @since 1.0.5
     *
     * @param {object} event
     * @param {object} $items
     * @param {string} key
     */
    $( document ).on( 'repeater:items.add.after', function( event, $items, key ) {
        if ( $items.find( '*[data-repeater-key="' + key + '"] .datetimepicker' ).length ) {
            $items.find( '*[data-repeater-key="' + key + '"] .datetimepicker' ).each( function() {
                var i18n = $( this ).data( 'i18n' )
                    ? window[$( this ).data( 'i18n' )]( $( this ).attr( 'lang' ) )
                    : undefined;
                var allowTimes = $( this ).data( 'allowed-times' )
                    ? window[$( this ).data( 'allowed-times' )]()
                    : undefined;
                $( this ).datetimepicker( {
                    timepicker: $( this ).data( 'show-time' ) !== undefined ? $( this ).data( 'show-time' ) : true,
                    datepicker: $( this ).data( 'show-date' ) !== undefined ? $( this ).data( 'show-date' ) : true,
                    format: $( this ).data( 'format' ) || 'Y-m-d H:i',
                    startDate: $( this ).data( 'start-date' ) || undefined,
                    minDate: $( this ).data( 'min-date' ) || undefined,
                    maxDate: $( this ).data( 'max-date' ) || undefined,
                    mask: $( this ).data( 'mask' ) !== undefined ? $( this ).data( 'mask' ) : false,
                    inline: $( this ).data( 'show-inline' ) !== undefined ? $( this ).data( 'show-inline' ) : false,
                    i18n: i18n || undefined,
                    allowTimes: allowTimes || undefined,
                    lang: $( this ).attr( 'lang' ) || undefined,
                } );
            } );
        }
    } );
    /**
     * Repeater support, destroy datetimepicker before item is removed
     * @since 1.0.5
     *
     * @param {object} event
     * @param {object} $items
     * @param {string} key
     */
    $( document ).on( 'repeater:items.remove.before', function( event, $items, key ) {
        if ( $items.find( '*[data-repeater-key="' + key + '"] .datetimepicker' ).length ) {
            $items.find( '*[data-repeater-key="' + key + '"] .datetimepicker' ).datetimepicker( 'destroy' );
        }
    } );
} ); } )( jQuery );