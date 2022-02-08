<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Carbon\Carbon;
use App\Models\Rest\Visitor;

class Main extends BaseViewController
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

        $visitorCookie = $request->cookie('visitor-id');
        if ($visitorCookie == null) {
            $todayVisitor = Visitor::whereDate('created_at', Carbon::today())->get();
            if ($todayVisitor->count() == 0) {
                Visitor::create();
            } else {
                $visitor = $todayVisitor->first();
                $visitor->count = $visitor->count + 1;
                $visitor->save();
            }
            cookie('visitor-id', \Illuminate\Support\Str::random(32) . '_' . Carbon::now()->format('H-i-s_Y-m-d_T'), 60 * 12);
        }
    }

    public function index()
    {
        $this->load('commodity');
        $this->extra['meta']['title'] = 'Home';

        $this->extra['nav']['active'] = 'home';
        $this->extra['content']['main'] = 'content.home';

        $this->data['commodities'] = $this->commodity->with($this->commodity->getRelations())->get();

        return $this->bootstrap();
    }

    public function product(Request $request)
    {
        $this->load(['product', 'commodity']);
        $this->extra['meta']['title'] = 'Products';


        $this->extra['nav']['active'] = 'product';
        $this->extra['content']['main'] = 'content.products';

        $page = (int) $request->input('page', 1);
        $limit = (int) $request->input('show', $this::$default_item_show);
        $offset = offset($page, $limit);

        $count = $this->product->count();

        $paginator = paginator($page, $limit, $count);

        $this->data['commodities'] = $this->commodity->with($this->commodity->getRelations())->get();
        $this->data['products'] = $this->product->with($this->product->getRelations())->offset($offset)->limit($limit)->get();

        $this->setupPaginations('product', $paginator->current, $paginator->total);

        return $this->bootstrap();
    }

    public function productAt($productName)
    {
        $this->load('product');
        $this->extra['meta']['title'] = kebab_to_beauty($productName);

        $this->extra['nav']['active'] = 'product';
        $this->extra['content']['main'] = 'content.product';

        $this->data['product'] = $this->product->with($this->product->getRelations())->where('name', kebab_to_beauty($productName))->first();

        $this->extra['meta']['description'] = $this->data['product']['description'];
        
        if ($this->data['product'] == null) {
            abort(404, "Product " . kebab_to_beauty($productName) . " not found");
        }

        return $this->bootstrap();
    }

    public function productWhereCommodity(Request $request, $commodity)
    {
        $this->load(['product', 'commodity']);
        
        $this->extra['nav']['active'] = 'product';
        $this->extra['content']['main'] = 'content.commodities';

        $this->data['commodities'] = $this->commodity->with($this->commodity->getRelations())->get();
        $this->data['commodity'] = $this->commodity->where('name', kebab_to_beauty($commodity))->first();
        if ($this->data['commodity'] == null) {
            abort(404, "Commodity " . kebab_to_beauty($commodity) . " not found");
        }
        $this->extra['meta']['title'] = 'Commodity ' . kebab_to_beauty($commodity);
        $this->extra['meta']['description'] = $this->data['commodity']['description1'];

        $page = (int) $request->input('page', 1);
        $limit = (int) $request->input('show', $this::$default_item_show);
        $offset = offset($page, $limit);
        $count = $this->product->where('commodity', $this->data['commodity']['id'])->count();

        $paginator = paginator($page, $limit, $count);

        $this->data['products'] = $this->product->offset($offset)->limit($limit)->with($this->product->getRelations())->where('commodity', $this->data['commodity']['id'])->get();

        $this->setupPaginations('commodity/'.beauty_to_kebab($this->data['commodity']['name']), $paginator->current, $paginator->total);

        return $this->bootstrap();
    }

    public function gallery()
    {
        $this->load('image');
        $this->extra['meta']['title'] = 'Gallery';

        $this->extra['nav']['active'] = 'gallery';
        $this->extra['content']['main'] = 'content.gallery';

        $this->data['images'] = $this->image->all();

        return $this->bootstrap();
    }
    
    public function cookies_policy()
    {
        $this->extra['meta']['title'] = 'Cookies Policy';
        $this->extra['content']['main'] = 'content.cookies-policy';

        return $this->bootstrap();
    }
}
