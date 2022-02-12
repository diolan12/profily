<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Rest\Product;
use Carbon\Carbon;

class DashboardProduct extends BaseViewController
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

    public function product(Request $request)
    {
        $this->load(['product', 'commodity']);
        $this->extra['meta']['title'] = 'Produk';

        $this->extra['nav']['active'] = 'product';
        $this->extra['content']['main'] = 'dashboard.products';

        $page = (int) $request->input('page', 1);
        $limit = (int) $request->input('show', $this::$default_item_show);
        $offset = offset($page, $limit);

        $count = $this->product->count();

        $paginator = paginator($page, $limit, $count);

        $this->data['commodities'] = $this->commodity->with($this->commodity->getRelations())->get();
        $this->data['products'] = $this->product->with($this->product->getRelations())->offset($offset)->limit($limit)->get();

        $this->setupPaginations(rootDashboard('product'), $paginator->current, $paginator->total);

        return $this->bootstrap(true);
    }

    public function productAt($productName)
    {
        $this->load('product');
        $this->extra['meta']['title'] = kebab_to_beauty($productName);

        $this->extra['nav']['active'] = 'product';
        $this->extra['content']['main'] = 'dashboard.product';

        $this->data['product'] = $this->product->with($this->product->getRelations())->where('name', kebab_to_beauty($productName))->first();

        if ($this->data['product'] == null) {
            // throw NotFoundHttpException();
        }

        return $this->bootstrap(true);
    }
}
