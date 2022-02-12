<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Rest\Product;
use Carbon\Carbon;

class Dashboard extends BaseViewController
{
    static $default_item_show = 8;
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

    public function commodity(Request $request)
    {
        $toast = $request->input('toast', null);
        $this->toast($toast);

        $this->load(['commodity']);
        $this->extra['meta']['title'] = 'Komoditas';
        $this->extra['nav']['active'] = 'commodity';
        $this->extra['content']['main'] = 'dashboard.commodities';

        $this->data['commodities'] = $this->commodity->with($this->commodity->getRelations())->get();

        return $this->bootstrap(true);
    }

    public function commodityNew(Request $request)
    {
        $this->load(['commodity']);
        $this->extra['meta']['title'] = 'Komoditas';
        $this->extra['nav']['active'] = 'commodity';
        $this->extra['content']['main'] = 'dashboard.commodities';
        
        $data = $this->validate($request, $this->commodity->validation());
        $data['created_at'] = Carbon::now('UTC');
        $data['updated_at'] = Carbon::now('UTC');
        $data = $this->commodity->filter($data);

        $toast = (!($this->commodity->insert($data))) ? "Gagal menambahkan komoditas" : "Komoditas berhasil ditambahkan";

        $this->data['commodities'] = $this->commodity->with($this->commodity->getRelations())->get();

        return redirect(rootDashboard('commodity?toast=' . $toast));
    }

    public function commodityAt(Request $request, $commodityName)
    {
        $toast = $request->input('toast', null);
        $this->toast($toast);

        $this->load('commodity');
        $this->extra['meta']['title'] = kebab_to_beauty($commodityName);

        $this->extra['nav']['active'] = 'commodity';
        $this->extra['content']['main'] = 'dashboard.commodity';

        $this->data['commodity'] = $this->commodity->with($this->commodity->getRelations())->where('name', kebab_to_beauty($commodityName))->first();

        if ($this->data['commodity'] == null) {
            // abort(404, "Komoditas " . kebab_to_beauty($commodityName) . " tidak ditemukan");
            return redirect(rootDashboard('commodity'));
        }

        return $this->bootstrap(true);
    }

    public function commodityUpdateAt(Request $request, $commodityName)
    {
        $this->load('commodity');
        $this->extra['meta']['title'] = kebab_to_beauty($commodityName);

        $this->extra['nav']['active'] = 'commodity';
        $this->extra['content']['main'] = 'dashboard.commodity';

        $data = $request->all();
        $data['updated_at'] = Carbon::now();
        $data = $this->commodity->filter($data);

        $commodity = $this->commodity->with($this->commodity->getRelations())->where('name', kebab_to_beauty($commodityName))->first();

        if ($commodity == null) {
            abort(404, "Komoditas " . kebab_to_beauty($commodityName) . " tidak ditemukan");
        }

        $toast = (!($commodity->update($data))) ? "Gagal memperbarui komoditas" : "Komoditas berhasil diperbarui";
        
        // $this->toast($toast);

        $this->data['commodities'] = $this->commodity->with($this->commodity->getRelations())->get();
        return redirect(rootDashboard('commodity/'.beauty_to_kebab($data['name']).'?toast=' . $toast));
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

        $this->setupPaginations('product', $paginator->current, $paginator->total);

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

    public function about()
    {
        $this->extra['nav']['active'] = 'about us';
        $this->extra['content']['main'] = 'content.about';
        return $this->bootstrap();
    }
}
