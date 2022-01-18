<?php

if (!function_exists('asset')) {
    function asset($path)
    {
        return url("assets/{$path}");
    }
}

if (!function_exists('component')) {
    function component($name, $data = [])
    {
        $path = "component.{$name}";
        return view($path, $data);
    }
}

if (!function_exists('config_parser')) {
    function config_parser($array)
    {
        $result = [];
        foreach ($array as $key => $value) {
            $result[$value['key']] = $value;
        }
        return $result;
    }
}
