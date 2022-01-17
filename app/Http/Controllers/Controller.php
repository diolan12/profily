<?php

namespace App\Http\Controllers;

use Laravel\Lumen\Routing\Controller as BaseController;

class Controller extends BaseController
{
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        //
    }
    protected $data = [
        'nav' => [
            'active' => 'home'
        ],
        'content' => [
            'main' => 'content.home'
        ]
    ];
    
    protected function bootstrap() {
        return view('main', $this->data);
    }
}
