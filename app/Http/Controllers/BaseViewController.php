<?php

namespace App\Http\Controllers;

use Laravel\Lumen\Routing\Controller;
use Illuminate\Http\Request;
use App\Models\Rest\Config;
use Illuminate\Support\Facades\URL;

class BaseViewController extends Controller
{
    /**
     * Configuration from database.
     *
     * @var object $config
     */
    protected $config;

    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct(Request $request)
    {
        $this->config = config_parser(Config::all());
        $this->extra['meta']['canonical'] = URL::current();
        $this->extra['fab'] = (object) [
            'whatsapp' => null
        ];

        if ($request->user() != null) {
            $this->load('user');
            $this->extra['user'] = (object) json_decode(json_encode($this->user->with($this->user->getRelations())->where('id', $request->user()->id)->first()));
        }
    }

    /**
     * Data payload from required models.
     *
     * @var object[] $data
     */
    protected $data = [];

    /**
     * Extra data required by views.
     *
     * @var object[] $data
     */
    protected $extra = [
        'user' => null,
        'meta' => [
            'title' => '',
            'description' => 'Permata Agrindo is engaged in general supplier, general trading ,and distributor as well as cultivation in agriculture. We partner with Indonesian farmers to produce the highest quality products. We can be sure that our products are of superior quality.',
            'keywords' => [
                // make website keywords about Permata Agrindo, coffee, and coffee production
                'permata agrindo coffee',
                'permata agrindo coffee production',
                'permata agrindo coffee production indonesia',
                'Permata Agrindo',
                'Permata Agrindo Indonesia',
                'Permata Agrindo Indonesia Supplier',
                'Permata Agrindo Indonesia Distributor',
                'Permata Agrindo Indonesia Agriculture',
                'Permata Agrindo Indonesia Agriculture Supplier',
                'Permata Agrindo Indonesia Agriculture Distributor',
                'Coffee',
                'Coffee Supplier',
                'Coffee Distributor',
                'Coffee Agriculture',
                'Coffee Agriculture Supplier',
                'Coffee Agriculture Distributor',
            ],
            'image' => '',
            'url' => ''
        ],
        'nav' => [
            'active' => 'home'
        ],
        'content' => [
            'main' => 'content.home'
        ],
        'toast' => null,
        'pagination' => null,
        'fab' => [
            'whatsapp' => null
        ]
    ];

    protected function toast(string $message)
    {
        $this->extra['toast'] = $message;
    }

    protected function setupPaginations(string $path, int $current, int $total)
    {
        $this->extra['pagination'] = (object) [
            'path' => $path,
            'current' => $current,
            'total' => $total
        ];
    }

    protected function setupWhatssap(string $tooltip, string $link)
    {
        $this->extra['fab'] = (object) [
            'whatsapp' => (object) [
                'tooltip' => $tooltip,
                'link' => $link
            ]
        ];
    }
    /**
     * Create a new controller instance.
     *
     * @param string or string[] $model
     * @return void
     */
    protected function load($model)
    {
        if (!is_array($model)) {
            if ($model != null) {
                $m = "App\\Models\\Rest\\" . ucwords($model);
                $this->$model = new $m;
            }
        } else {
            foreach ($model as $key => $value) {
                $m = "App\\Models\\Rest\\" . ucwords($value);
                (object) $this->$value = new $m;
            }
        }
    }

    protected function bootstrap($dashboard = false)
    {
        $this->extra['config'] = (object) json_decode(json_encode($this->config));
        $this->extra['data'] = (object) json_decode(json_encode($this->data));
        $this->extra['extra'] = $this->extra;
        $this->extra['extra']['extra'] = $this->extra;
        if ($dashboard) {
            return view('main-dashboard', $this->extra);
        } else {
            return view('main', $this->extra);
        }
    }
}
