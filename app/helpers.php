<?php

use App\Models\Rest\User;
use Firebase\JWT\JWT;
use Firebase\JWT\Key;
use Illuminate\Support\Facades\URL;
use Carbon\Carbon;
use Illuminate\Support\Facades\Hash;

if (!function_exists('jwtEncode')) {
    function jwtEncode(User $user)
    {
        $payload = [
            "iss" => URL::to('/'), // base url server ini
            "sub" => "Dashboard Authorization",
            "aud" => $user['email'],
            "iat" => Carbon::now()->timestamp, // epoch time
            "jti" => Hash::make($user['id']),
            "name" => $user['name'],
            "picture" => $user['picture'],
            "email" => $user['email'],
            "admin" => $user['role']
        ];
        return JWT::encode($payload, privateKey, algorithm);
    }
}

if (!function_exists('jwtDecode')) {
    function jwtDecode(string $jwt)
    {
        $key = new Key(publicKey, algorithm);
        try {
            return JWT::decode($jwt, $key);
        } catch (Exception $exception) {
            throw $exception;
        }
    }
}

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
        return setcookie($name, $value, time() + 60 * $age, '/');
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

if (!function_exists('project_path')) {
    function project_path($path = DIRECTORY_SEPARATOR)
    {
        if ($path[0] == DIRECTORY_SEPARATOR) {
            return $path;
        }
        return app()->basePath() . DIRECTORY_SEPARATOR . "$path";
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

if (!function_exists('rootAuth')) {
    function rootAuth($path = '/')
    {
        if ($path[0] == '/') {
            return $path . 'rWVfHZH4ge8vmZAQvre5IaHKToURoEQq';
        }
        return "/rWVfHZH4ge8vmZAQvre5IaHKToURoEQq/$path";
    }
}

if (!function_exists('rootDashboard')) {
    function rootDashboard($path = '/')
    {
        if ($path[0] == '/') {
            return $path . 'J2mV38xHiH4abejTlpY9pXhbGtubTCZi';
        }
        return "/J2mV38xHiH4abejTlpY9pXhbGtubTCZi/$path";
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

if (!function_exists('js_utc_date')) {
    function js_utc_date(string $utcTime)
    {
        return "new Date('$utcTime')";
    }
}

if (!function_exists('utc_to_locale_string')) {
    function utc_to_locale_string($js_utc_date, string $dateStyle = "full", string $timeStyle = "full")
    {
        $option = '{ timeZone: Intl.DateTimeFormat().resolvedOptions().timeZone, dateStyle: "' . $dateStyle . '", timeStyle: "' . $timeStyle . '" }';
        return "$js_utc_date.toLocaleString(undefined, $option)";
    }
}
