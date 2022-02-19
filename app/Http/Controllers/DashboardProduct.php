<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
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
        $this->setupWhatsapp('Chat with developer', 'https://wa.me/6285648535927');
    }

    public function index(Request $request)
    {
        // $toast = $request->input('toast', null);
        // $this->toast($toast);

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
        $this->data['products'] = $this->product->with($this->product->getRelations())->offset($offset)->limit($limit)->orderBy('updated_at', 'DESC')->get();

        $this->setupPaginations(rootDashboard('product'), $paginator->current, $paginator->total);

        return $this->bootstrap(true);
    }

    public function new(Request $request)
    {
        $this->load(['product']);
        $this->extra['meta']['title'] = 'Produk';
        $this->extra['nav']['active'] = 'product';
        $this->extra['content']['main'] = 'dashboard.products';
        
        $data = $this->validate($request, $this->product->validation());
        $data['created_at'] = Carbon::now('UTC');
        $data['updated_at'] = Carbon::now('UTC');
        $data = $this->product->filter($data);

        $toast = (!($this->product->insert($data))) ? "Gagal menambahkan produk" : "Produk berhasil ditambahkan";

        $this->data['products'] = $this->product->with($this->product->getRelations())->get();

        return redirect(rootDashboard('product?toast=' . $toast));
    }

    public function productAt($productName)
    {
        $this->load(['product', 'commodity', 'image']);
        $this->extra['meta']['title'] = kebab_to_beauty($productName);

        $this->extra['nav']['active'] = 'product';
        $this->extra['content']['main'] = 'dashboard.product';

        $this->data['images'] = $this->image->with($this->image->getRelations())->orderBy('updated_at', 'DESC')->get();
        $this->data['commodities'] = $this->commodity->with($this->commodity->getRelations())->get();
        $this->data['product'] = $this->product->with($this->product->getRelations())->where('name', kebab_to_beauty($productName))->first();

        if ($this->data['product'] == null) {
            return redirect(rootDashboard('product'));
        }

        return $this->bootstrap(true);
    }

    public function updateAt(Request $request, $productName)
    {
        $this->load('product');
        $this->extra['meta']['title'] = kebab_to_beauty($productName);

        $this->extra['nav']['active'] = 'product';
        $this->extra['content']['main'] = 'dashboard.product';

        $data = $request->all();
        $data['updated_at'] = Carbon::now();
        $data = $this->product->filter($data);

        $product = $this->product->with($this->product->getRelations())->where('name', kebab_to_beauty($productName))->first();

        if ($product == null) {
            abort(404, "Produk " . kebab_to_beauty($productName) . " tidak ditemukan");
        }

        $toast = (!($product->update($data))) ? "Gagal memperbarui komoditas" : "Komoditas berhasil diperbarui";
        
        // $this->toast($toast);

        // $this->data['commodities'] = $this->product->with($this->product->getRelations())->get();
        return redirect(rootDashboard('product/'.beauty_to_kebab($data['name']).'?toast=' . $toast));
    }
}
