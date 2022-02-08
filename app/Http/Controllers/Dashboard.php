<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Rest\Product;
use Carbon\Carbon;

class Dashboard extends BaseViewController
{
    protected function configure($key)
    {
        return $this->config[$key];
    }
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
        $this->setupWhatssap('Chat with developer', 'https://wa.me/6285648535927');
    }

    public function stat()
    {
        $this->load(['visitor', 'view']);
        $this->extra['meta']['title'] = 'Statistics';
        $this->extra['nav']['active'] = 'stats';
        $this->extra['content']['main'] = 'dashboard.stats';

        $this->data['visitors_today'] = $this->visitor->whereDate('created_at', Carbon::today())->first();
        $this->data['visitors_month'] = $this->visitor->whereMonth('created_at', Carbon::now('UTC')->month)->get();
        $this->data['visitors_year'] = $this->visitor->whereYear('created_at', Carbon::now('UTC')->year)->get();
        
        $this->data['views_today'] = $this->view->with($this->view->getRelations())->whereDate('created_at', Carbon::today())->orderBy('count', 'DESC')->get();
        $this->data['views_month'] = $this->view->with($this->view->getRelations())->whereMonth('created_at', Carbon::now('UTC')->month)->get();

        return $this->bootstrap(true);
    }

    public function product()
    {
        $product = new Product();
        $this->extra['meta']['title'] = 'Product';
        $this->extra['nav']['active'] = 'product';
        $this->extra['content']['main'] = 'dashboard.products';

        $this->data['products'] = $product->with($product->getRelations())->get();

        return $this->bootstrap();
    }

    public function productAt($productName)
    {
        $product = new Product();
        $this->extra['nav']['active'] = 'product';
        $this->extra['content']['main'] = 'content.product';

        $this->data['product'] = $product->with($product->getRelations())->where('name', kebab_to_beauty($productName))->first();

        if ($this->data['product'] == null) {
            // throw NotFoundHttpException();
        }

        return $this->bootstrap();
    }

    public function about()
    {
        $this->extra['nav']['active'] = 'about us';
        $this->extra['content']['main'] = 'content.about';
        return $this->bootstrap();
    }
}
