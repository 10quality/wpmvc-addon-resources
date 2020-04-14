# WordPress MVC add-on resources

This package provides resources (in the form of assets) that may be shared by different add-ons or WordPress MVC projects.

## Setup

### Via composer

Install the package via composer:
```bash
composer install 10quality/wpmvc-addon-resources --no-plugins
```

### Via composer.json

Add this package as your add-on dependencies (`"require"`):
```json
{
    "require": {
        "10quality/wpmvc-addon-resources": "1.0.*"
    },
}
```

And run:

```bash
composer update --no-plugins
```

## Resources

* [Font Awesome v4](https://fontawesome.com/v4.7.0/) (css and fonts).
* [Select2](https://select2.org/) (js, css and i18n) and initializer script.
* [Spectrum colorpicker](https://bgrins.github.io/spectrum/) (js, css and i18n) and initializer script.
* [Datetimepicker](https://xdsoft.net/jqplugins/datetimepicker/) (js and css) and initializer script.
* [jQuery UI Datepicker](https://jqueryui.com/datepicker/) (css) and initializer script.
* **WP Media uploader** (js) and initializer script.
* **Radio group** (custom css).
* **Choose** (custom css).
* **Switch** (custom js and css).
* **Hide/show** (custom js).
* **Repeater** (custom js).

## Usage

This package provides 2 global functions:

### wpmvc_register_addon_resource

`wpmvc_register_addon_resource()` is used to register the asset.
```php
wpmvc_register_addon_resource( $resource_id );
```

And:

`wpmvc_enqueue_addon_resource()` is used to force enqueue the asset.
```php
wpmvc_enqueue_addon_resource( $resource_id );
```

### Resources list

| Resource ID | Description | Type |
| --- | --- | --- |
| `font-awesome` | Hide and show resources. | *css* |
| `select2` | Select2 resources. | *css*, *js* |
| `spectrum` | Spectrum colorpicker resources. | *css*, *js* |
| `datetimepicker` | jQuery datetimepicker resources. | *css*, *js* |
| `jquery-ui-datepicker` | jQuery UI datepicker resources. | *css* |
| `wordpress-media-uploader` | WordPress media uploader resources. | *js* |
| `wpmvc-hideshow` | Hide and show resources. | *js* |
| `wpmvc-repeater` | Repeater resources (depends on `wpmvc-hideshow`). | *css*, *js* |
| `wpmvc-choose` | Choose resources. | *css* |
| `wpmvc-radio` | Redio group resources. | *css* |
| `wpmvc-switch` | Redio group resources. | *css*, *js* |
| `wpmvc-select2` | Select2 implementation resources (depends on `select2`). | *css*, *js* |
| `wpmvc-colorpicker` | Colorpicker implementation resources (depends on `spectrum`). | *js* |
| `wpmvc-datepicker` | Datepicker implementation resources (depends on `jquery-ui-datepicker`). | *js* |
| `wpmvc-datetimepicker` | Datetimepicker implementation resources (depends on `datetimepicker`). | *js* |
| `wpmvc-media` | Media implementation resources (depends on `wordpress-media-uploader`). | *js* |

Samples:
```php
add_action( 'wp_enqueue_scripts', function() {
    
    wpmvc_register_addon_resource( 'font-awesome' );
    wpmvc_register_addon_resource( 'select2' );
    wpmvc_register_addon_resource( 'wpmvc-select2' );

} );
```

Or:
```php
add_action( 'wp_enqueue_scripts', function() {
    
    wpmvc_enqueue_addon_resource( 'font-awesome' );
    wpmvc_register_addon_resource( 'select2' );
    wpmvc_enqueue_addon_resource( 'wpmvc-select2' );

} );
```

You can also use regular WordPress enqueue functions after the resources have been registered:
```php
wp_enqueue_style( 'font-awesome' );
wp_enqueue_style( 'wpmvc-select2' );
wp_enqueue_script( 'wpmvc-select2' );
```