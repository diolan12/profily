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
            return $color . ' '; // . $contrast;
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

if (!function_exists('materialColor')) {
    function materialColor()
    {
        return [
            'red' => [
                'lighten-5' => '#ffebee',
                'lighten-4' => '#ffcdd2',
                'lighten-3' => '#ef9a9a',
                'lighten-2' => '#e57373',
                'lighten-1' => '#ef5350',
                'neutral' => '#f44336',
                'darken-1' => '#e53935',
                'darken-2' => '#d32f2f',
                'darken-3' => '#c62828',
                'darken-4' => '#b71c1c',
                'accent-1' => '#ff8a80',
                'accent-2' => '#ff8a80',
                'accent-3' => '#ff1744',
                'accent-4' => '#d50000'
            ],
            'pink' => [
                'lighten-5' => '#fce4ec',
                'lighten-4' => '#f8bbd0',
                'lighten-3' => '#f48fb1',
                'lighten-2' => '#f06292',
                'lighten-1' => '#ec407a',
                'neutral' => '#e91e63',
                'darken-1' => '#d81b60',
                'darken-2' => '#c2185b',
                'darken-3' => '#ad1457',
                'darken-4' => '#880e4f',
                'accent-1' => '#ff80ab',
                'accent-2' => '#ff4081',
                'accent-3' => '#f50057',
                'accent-4' => '#c51162'
            ],
            'purple' => [
                'lighten-5' => '#ffebee',
                'lighten-4' => '#ffcdd2',
                'lighten-3' => '#ef9a9a',
                'lighten-2' => '#e57373',
                'lighten-1' => '#ef5350',
                'neutral' => '#f44336',
                'darken-1' => '#e53935',
                'darken-2' => '#d32f2f',
                'darken-3' => '#c62828',
                'darken-4' => '#b71c1c',
                'accent-1' => '#ff8a80',
                'accent-2' => '#ff8a80',
                'accent-3' => '#ff1744',
                'accent-4' => '#d50000'
            ],
            'deep-purple' => [
                'lighten-5' => '#ede7f6',
                'lighten-4' => '#d1c4e9',
                'lighten-3' => '#d1c4e9',
                'lighten-2' => '#9575cd',
                'lighten-1' => '#9575cd',
                'neutral' => '#673ab7',
                'darken-1' => '#5e35b1',
                'darken-2' => '#512da8',
                'darken-3' => '#4527a0',
                'darken-4' => '#311b92',
                'accent-1' => '#b388ff',
                'accent-2' => '#b388ff',
                'accent-3' => '#b388ff',
                'accent-4' => '#6200ea'
            ],
            'indigo' => [
                'lighten-5' => '#e8eaf6',
                'lighten-4' => '#c5cae9',
                'lighten-3' => '#9fa8da',
                'lighten-2' => '#7986cb',
                'lighten-1' => '#5c6bc0',
                'neutral' => '#3f51b5',
                'darken-1' => '#3949ab',
                'darken-2' => '#303f9f',
                'darken-3' => '#283593',
                'darken-4' => '#1a237e',
                'accent-1' => '#8c9eff',
                'accent-2' => '#536dfe',
                'accent-3' => '#3d5afe',
                'accent-4' => '#304ffe'
            ],
            'blue' => [
                'lighten-5' => '#e3f2fd',
                'lighten-4' => '#bbdefb',
                'lighten-3' => '#90caf9',
                'lighten-2' => '#64b5f6',
                'lighten-1' => '#42a5f5',
                'neutral' => '#2196f3',
                'darken-1' => '#1e88e5',
                'darken-2' => '#1976d2',
                'darken-3' => '#1565c0',
                'darken-4' => '#0d47a1',
                'accent-1' => '#82b1ff',
                'accent-2' => '#448aff',
                'accent-3' => '#2979ff',
                'accent-4' => '#2962ff'
            ],
            'light-blue' => [
                'lighten-5' => '#e1f5fe',
                'lighten-4' => '#b3e5fc',
                'lighten-3' => '#81d4fa',
                'lighten-2' => '#4fc3f7',
                'lighten-1' => '#29b6f6',
                'neutral' => '#03a9f4',
                'darken-1' => '#29b6f6',
                'darken-2' => '#0288d1',
                'darken-3' => '#0277bd',
                'darken-4' => '#01579b',
                'accent-1' => '#80d8ff',
                'accent-2' => '#40c4ff',
                'accent-3' => '#00b0ff',
                'accent-4' => '#0091ea'
            ],
            'cyan' => [
                'lighten-5' => '#e0f7fa',
                'lighten-4' => '#b2ebf2',
                'lighten-3' => '#80deea',
                'lighten-2' => '#4dd0e1',
                'lighten-1' => '#26c6da',
                'neutral' => '#00bcd4',
                'darken-1' => '#00acc1',
                'darken-2' => '#0097a7',
                'darken-3' => '#00838f',
                'darken-4' => '#006064',
                'accent-1' => '#84ffff',
                'accent-2' => '#18ffff',
                'accent-3' => '#00e5ff',
                'accent-4' => '#00b8d4'
            ],
            'teal' => [
                'lighten-5' => '#e0f2f1',
                'lighten-4' => '#b2dfdb',
                'lighten-3' => '#80cbc4',
                'lighten-2' => '#80cbc4',
                'lighten-1' => '#26a69a',
                'neutral' => '#009688',
                'darken-1' => '#00897b',
                'darken-2' => '#00796b',
                'darken-3' => '#00796b',
                'darken-4' => '#004d40',
                'accent-1' => '#a7ffeb',
                'accent-2' => '#64ffda',
                'accent-3' => '#1de9b6',
                'accent-4' => '#00bfa5'
            ],
            'green' => [
                'lighten-5' => '#e8f5e9',
                'lighten-4' => '#c8e6c9',
                'lighten-3' => '#a5d6a7',
                'lighten-2' => '#81c784',
                'lighten-1' => '#66bb6a',
                'neutral' => '#4caf50',
                'darken-1' => '#43a047',
                'darken-2' => '#388e3c',
                'darken-3' => '#2e7d32',
                'darken-4' => '#1b5e20',
                'accent-1' => '#b9f6ca',
                'accent-2' => '#69f0ae',
                'accent-3' => '#00e676',
                'accent-4' => '#00c853'
            ],
            'light-green' => [
                'lighten-5' => '#f1f8e9',
                'lighten-4' => '#dcedc8',
                'lighten-3' => '#c5e1a5',
                'lighten-2' => '#c5e1a5',
                'lighten-1' => '#9ccc65',
                'neutral' => '#9ccc65',
                'darken-1' => '#7cb342',
                'darken-2' => '#689f38',
                'darken-3' => '#558b2f',
                'darken-4' => '#33691e',
                'accent-1' => '#ccff90',
                'accent-2' => '#b2ff59',
                'accent-3' => '#76ff03',
                'accent-4' => '#64dd17'
            ],
            'lime' => [
                'lighten-5' => '#f9fbe7',
                'lighten-4' => '#f0f4c3',
                'lighten-3' => '#e6ee9c',
                'lighten-2' => '#dce775',
                'lighten-1' => '#d4e157',
                'neutral' => '#cddc39',
                'darken-1' => '#c0ca33',
                'darken-2' => '#c0ca33',
                'darken-3' => '#9e9d24',
                'darken-4' => '#827717',
                'accent-1' => '#f4ff81',
                'accent-2' => '#eeff41',
                'accent-3' => '#c6ff00',
                'accent-4' => '#aeea00'
            ],
            'yellow' => [
                'lighten-5' => '#fffde7',
                'lighten-4' => '#fff9c4',
                'lighten-3' => '#fff59d',
                'lighten-2' => '#fff176',
                'lighten-1' => '#fff176',
                'neutral' => '#fff176',
                'darken-1' => '#fdd835',
                'darken-2' => '#fbc02d',
                'darken-3' => '#f9a825',
                'darken-4' => '#f57f17',
                'accent-1' => '#ffff8d',
                'accent-2' => '#ffff00',
                'accent-3' => '#ffea00',
                'accent-4' => '#ffd600'
            ],
            'amber' => [
                'lighten-5' => '#fff8e1',
                'lighten-4' => '#ffecb3',
                'lighten-3' => '#ffe082',
                'lighten-2' => '#ffe082',
                'lighten-1' => '#ffca28',
                'neutral' => '#ffc107',
                'darken-1' => '#ffb300',
                'darken-2' => '#ffa000',
                'darken-3' => '#ff8f00',
                'darken-4' => '#ff6f00',
                'accent-1' => '#ffe57f',
                'accent-2' => '#ffd740',
                'accent-3' => '#ffc400',
                'accent-4' => '#ffab00'
            ],
            'orange' => [
                'lighten-5' => '#fff3e0',
                'lighten-4' => '#ffe0b2',
                'lighten-3' => '#ffcc80',
                'lighten-2' => '#ffb74d',
                'lighten-1' => '#ffa726',
                'neutral' => '#ff9800',
                'darken-1' => '#fb8c00',
                'darken-2' => '#f57c00',
                'darken-3' => '#ef6c00',
                'darken-4' => '#e65100',
                'accent-1' => '#ffd180',
                'accent-2' => '#ffab40',
                'accent-3' => '#ff9100',
                'accent-4' => '#ff6d00'
            ],
            'deep-orange' => [
                'lighten-5' => '#fbe9e7',
                'lighten-4' => '#ffccbc',
                'lighten-3' => '#ffab91',
                'lighten-2' => '#ff8a65',
                'lighten-1' => '#ff7043',
                'neutral' => '#ff5722',
                'darken-1' => '#f4511e',
                'darken-2' => '#e64a19',
                'darken-3' => '#d84315',
                'darken-4' => '#bf360c',
                'accent-1' => '#ff9e80',
                'accent-2' => '#ff6e40',
                'accent-3' => '#ff3d00',
                'accent-4' => '#dd2c00'
            ],
            'brown' => [
                'lighten-5' => '#efebe9',
                'lighten-4' => '#d7ccc8',
                'lighten-3' => '#d7ccc8',
                'lighten-2' => '#a1887f',
                'lighten-1' => '#8d6e63',
                'neutral' => '#795548',
                'darken-1' => '#6d4c41',
                'darken-2' => '#5d4037',
                'darken-3' => '#4e342e',
                'darken-4' => '#3e2723'
            ],
            'grey' => [
                'lighten-5' => '#fafafa',
                'lighten-4' => '#f5f5f5',
                'lighten-3' => '#eeeeee',
                'lighten-2' => '#e0e0e0',
                'lighten-1' => '#bdbdbd',
                'neutral' => '#9e9e9e',
                'darken-1' => '#757575',
                'darken-2' => '#616161',
                'darken-3' => '#424242',
                'darken-4' => '#212121'
            ],
            'blue-grey' => [
                'lighten-5' => '#eceff1',
                'lighten-4' => '#cfd8dc',
                'lighten-3' => '#cfd8dc',
                'lighten-2' => '#90a4ae',
                'lighten-1' => '#78909c',
                'neutral' => '#607d8b',
                'darken-1' => '#546e7a',
                'darken-2' => '#455a64',
                'darken-3' => '#37474f',
                'darken-4' => '#263238'
            ],
            'black' => [], 'white' => []
        ];
    }
}
