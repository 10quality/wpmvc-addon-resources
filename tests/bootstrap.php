<?php
define('TMP_PATH', __DIR__.'/../.tmp');
define('FS_CHMOD_FILE', '0777');
require_once __DIR__.'/../vendor/autoload.php';
require_once __DIR__.'/../vendor/10quality/wp-file/tests/framework/wp-functions.php';
require_once __DIR__.'/../vendor/10quality/wp-file/tests/framework/class-wp-filesystem.php';
$wp_filesystem = new WP_Filesystem;
$styles = [];
$scripts = [];
function wp_register_style( $id )
{
    global $styles;
    $styles[$id] = 'registered';
}
function wp_register_script( $id )
{
    global $scripts;
    $scripts[$id] = 'registered';
}
function wp_enqueue_style( $id )
{
    global $styles;
    $styles[$id] = 'enqueued';
}
function wp_enqueue_script( $id )
{
    global $scripts;
    $scripts[$id] = 'enqueued';
}
function get_locale()
{
    return 'en';
}
function apply_filters( $value )
{
    return $value;
}
function home_url( $endpoint = '/' )
{
    return 'http://localhost' . $endpoint;
}