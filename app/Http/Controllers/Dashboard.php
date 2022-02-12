<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Rest\Product;
use Carbon\Carbon;

class Dashboard extends BaseViewController
{
    static $default_item_show = 8;

    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct(Request $request)
    {
        parent::__construct($request);
        $ref = $request->server('HTTP_REFERER');
        if ($ref == url() . rootAuth()) {
            $this->toast('Welcome ' . $request->user()->name);
        }
        $this->setupWhatsapp('Chat with developer', 'https://wa.me/6285648535927');
    }

    public function stat(Request $request)
    {
        $this->extra['server']['client']['refresh'] = $request->input('refresh', false);
        $this->load(['visitor', 'view']);
        $this->extra['meta']['title'] = 'Statistics';
        $this->extra['nav']['active'] = 'stats';
        $this->extra['content']['main'] = 'dashboard.stats';

        $this->data['visitors_today'] = $this->visitor->whereDate('created_at', Carbon::today())->first();
        $this->data['visitors_month'] = $this->visitor->whereMonth('created_at', Carbon::now()->month)->get();
        $this->data['visitors_year'] = $this->visitor->whereYear('created_at', Carbon::now()->year)->get();

        $this->data['views_today'] = $this->view->with($this->view->getRelations())->whereDate('created_at', Carbon::today())->orderBy('count', 'DESC')->orderBy('updated_at', 'DESC')->get();
        $this->data['views_month'] = $this->view->with($this->view->getRelations())->whereMonth('created_at', Carbon::now()->month)->orderBy('count', 'DESC')->get();

        return $this->bootstrap(true);
    }

    public function about()
    {
        $this->extra['nav']['active'] = 'about us';
        $this->extra['content']['main'] = 'content.about';
        return $this->bootstrap();
    }
}
