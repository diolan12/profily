<?php

namespace App\Http\Controllers;

use Laravel\Lumen\Routing\Controller;
use App\Models\Rest\Config;

class BaseViewController extends Controller
{
    /**
     * Configuration from database.
     *
     * @var object[] $config
     */
    protected $config;

    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->config = config_parser(Config::all());
    }
    protected $extra = [
        'nav' => [
            'active' => 'home'
        ],
        'content' => [
            'main' => 'content.home'
        ]
    ];
    
    protected function bootstrap() {
        $this->extra['config'] = (object) $this->config;
        $this->extra['extra'] = $this->extra;
        return view('main', $this->extra);
    }
}
