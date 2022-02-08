<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Rest\Product;

class Dashboard extends BaseViewController
{
    protected function configure($key) {
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
    }

    public function stat()
    {
        $this->extra['meta']['title'] = 'Statistics';
        $this->extra['nav']['active'] = 'stats';
        $this->extra['content']['main'] = 'dashboard.home';
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