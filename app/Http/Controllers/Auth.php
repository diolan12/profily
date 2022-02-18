<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Carbon\Carbon;
use App\Models\Rest\User;
use App\Models\Rest\View;
use Illuminate\Support\Facades\Hash;

class Auth extends BaseViewController
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
    }

    public function index()
    {
        $this->load('commodity');
        $this->extra['meta']['title'] = 'Login Dashboard';

        $this->extra['content']['main'] = 'content.login';

        return $this->bootstrap();
    }

    public function login(Request $request)
    {
        $this->load('user');
        $this->extra['meta']['title'] = 'Login Dashboard';
        $this->extra['content']['main'] = 'content.login';
        $credentials = $this->validate($request, [
            'email' => 'required',
            'password' => 'required'
        ]);

        $user = $this->user->withoutTrashed()->where('email', $credentials['email'])->first();
        if ($user == null) {
            $this->toast('No email records registered');
            return $this->bootstrap();
        }

        if (!Hash::check($credentials['password'], $user['password'])) {
            $this->toast('Password did not match');
            return $this->bootstrap();
        }

        $age = 60 * 24;
        $jwt = jwtEncode($user);

        cookie(auth_cookie, $jwt, $age);

        return redirect(rootDashboard().'?toast=Welcome ' . $user['name']);
    }

    public function logout(Request $request)
    {
        cookie(auth_cookie, '', 0);

        return redirect(root());
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

        $text = urlencode("Hello, I'm interested about " . kebab_to_beauty($productName));
        $link = $this->config->connect['connect_whatsapp']['val2'] . '?text=' . $text;
        $this->setupWhatsapp('Chat about ' . kebab_to_beauty($productName), $link);

        $this->extra['nav']['active'] = 'product';
        $this->extra['content']['main'] = 'content.product';

        $this->data['product'] = $this->product->with($this->product->getRelations())->where('name', kebab_to_beauty($productName))->first();

        $this->extra['meta']['description'] = $this->data['product']['description'];

        if ($this->data['product'] == null) {
            abort(404, "Product " . kebab_to_beauty($productName) . " not found");
        }

        $todayProductView = View::whereDate('created_at', Carbon::today())->where('product', $this->data['product']['id'])->get();
        if ($todayProductView->count() == 0) {
            View::create([
                'product' => $this->data['product']['id'],
            ]);
        } else {
            $productView = $todayProductView->first();
            $productView->product = $this->data['product']['id'];
            $productView->count = $productView->count + 1;
            $productView->save();
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

        $this->setupPaginations('commodity/' . beauty_to_kebab($this->data['commodity']['name']), $paginator->current, $paginator->total);

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
