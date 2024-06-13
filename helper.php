<?php

const PATH_ROOT = __DIR__ . '/';

if (!function_exists('asset')) {
    function asset($path)
    {
        return $_ENV['BASE_URL'] . $path;
    }
}

if (!function_exists('url')) {
    function url($uri = null)
    {
        return $_ENV['BASE_URL'] . $uri;
    }
}

if (!function_exists('debug')) {
    function debug($data)
    {
        echo '<pre>';

        print_r($data);

        die;
    }
}
