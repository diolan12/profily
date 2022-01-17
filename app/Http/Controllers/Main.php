<?php

namespace App\Http\Controllers;

class Main extends Controller
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

    public function index()
    {
        $this->data['nav']['active'] = 'home';
        $this->data['content']['main'] = 'content.home';
        return $this->bootstrap();
    }

    public function product()
    {
        $this->data['nav']['active'] = 'product';
        $this->data['content']['main'] = 'content.product';
        return $this->bootstrap();
    }

    public function contact()
    {
        $this->data['nav']['active'] = 'contact';
        $this->data['content']['main'] = 'content.contact';
        return $this->bootstrap();
    }

    public function about()
    {
        $this->data['nav']['active'] = 'about';
        $this->data['content']['main'] = 'content.about';
        return $this->bootstrap();
    }
}
