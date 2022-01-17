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
        $this->extra['nav']['active'] = 'home';
        $this->extra['content']['main'] = 'content.home';
        return $this->bootstrap();
    }

    public function product()
    {
        $this->extra['nav']['active'] = 'product';
        $this->extra['content']['main'] = 'content.product';
        return $this->bootstrap();
    }

    public function contact()
    {
        $this->extra['nav']['active'] = 'contact';
        $this->extra['content']['main'] = 'content.contact';
        return $this->bootstrap();
    }

    public function about()
    {
        $this->extra['nav']['active'] = 'about us';
        $this->extra['content']['main'] = 'content.about';
        return $this->bootstrap();
    }
}
