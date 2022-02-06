<?php

if (!function_exists('offset')) {
    function offset(int $page, int $limit)
    {
        return ($page * $limit) - $limit;
    }
}

if (!function_exists('paginator')) {
    function paginator(int $page, int $limit, int $count)
    {
        return (object) [
            'current' => $page,
            'total' => ceil($count / $limit)
        ];
    }
}

if (!function_exists('cookie')) {
    function cookie($name, string $value = '', int $age = 0)
    {
        return setcookie($name, $value, time()+60*$age);
    }
}

if (!function_exists('beauty_to_kebab')) {
    function beauty_to_kebab($beautyString)
    {
        $a = explode(' ', $beautyString);
        $b = [];
        foreach ($a as $c) {
            $b[] = strtolower($c);
        }
        return implode('-', $b);
    }
}
if (!function_exists('kebab_to_beauty')) {
    function kebab_to_beauty($kebabString)
    {
        $a = explode('-', $kebabString);
        $b = [];
        foreach ($a as $c) {
            $b[] = ucwords($c);
        }
        return implode(' ', $b);
    }
}

if (!function_exists('root')) {
    function root($path = '/')
    {
        if ($path[0] == '/') {
            return $path;
        }
        return "/$path";
    }
}

if (!function_exists('asset')) {
    function asset($path)
    {
        return root("assets/$path");
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
        $type = [];
        foreach ($array as $key => $value) {
            $type[$value['type']][$value['key']] = $value;
        }
        return (object) $type;
    }
}

if (!function_exists('color')) {
    function color($colorConfig, bool $forText = false, bool $text = true, bool $hex = false)
    {
        if ($hex) {
            return $colorConfig->val3;
        }
        $main = $colorConfig->val1;
        if ($forText) {
            $main = "$main-text";
        }
        $mod = $colorConfig->val2;
        if ($forText && $mod != '') {
            $mod = "text-$mod";
        }
        $color = $main . ' ' . $mod;
        if ($text && !$forText) {
            $modifier = explode('-', $colorConfig->val2)[0];
            $contrast = "black-text";
            if ($modifier == 'darken') {
                $contrast = "white-text";
            }
            return $color . ' ' . $contrast;
        }

        return $color;
    }
}

if (!function_exists('random_align')) {
    function random_align()
    {
        $align = ['left', 'center', 'right'];
        return $align[rand(0, 2)];
    }
}

if (!function_exists('lorem_short')) {
    function lorem_short()
    {
        return "lorem_short";
    }
}

if (!function_exists('lorem_medium')) {
    function lorem_medium()
    {
        return "lorem_medium";
    }
}

if (!function_exists('lorem_long')) {
    function lorem_long()
    {
        return "lorem_long";
    }
}
