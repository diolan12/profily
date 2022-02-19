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

        $authCookie = $request->cookie(auth_cookie);
        if ($authCookie != null) {
            cookie(auth_cookie, $authCookie, 60 * 24);
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

    public function color()
    {
        $this->extra['meta']['title'] = 'Color';
        $this->extra['nav']['active'] = 'color';
        $this->extra['content']['main'] = 'dashboard.color';
        return $this->bootstrap(true);
    }

    public function general()
    {
        $this->extra['meta']['title'] = 'About';
        $this->extra['nav']['active'] = 'about';
        $this->extra['content']['main'] = 'dashboard.about';
        return $this->bootstrap(true);
    }
    public function mission()
    {
        $this->extra['meta']['title'] = 'Mission';
        $this->extra['nav']['active'] = 'mission';
        $this->extra['content']['main'] = 'dashboard.mission';
        return $this->bootstrap(true);
    }
    public function value()
    {
        $this->extra['meta']['title'] = 'Value';
        $this->extra['nav']['active'] = 'value';
        $this->extra['content']['main'] = 'dashboard.value';
        return $this->bootstrap(true);
    }
    public function connect()
    {
        $this->extra['meta']['title'] = 'Connect';
        $this->extra['nav']['active'] = 'connect';
        $this->extra['content']['main'] = 'dashboard.connect';
        return $this->bootstrap(true);
    }
    public function setting()
    {
        $this->extra['meta']['title'] = 'Setting';
        $this->extra['nav']['active'] = 'setting';
        $this->extra['content']['main'] = 'dashboard.setting';
        return $this->bootstrap(true);
    }
    public function logo(Request $request)
    {
        $this->load('config');
        $this->extra['meta']['title'] = 'Setting';
        $this->extra['nav']['active'] = 'setting';
        $this->extra['content']['main'] = 'dashboard.setting';

        $file = $request->file('logo');

        $fn = explode('.', $file->getClientOriginalName()); // file path
        $format = $fn[(count($fn) - 1)];

        $config = $this->config->find(2);

        $picName = 'logo.' . $format;
        $path = 'assets' . DIRECTORY_SEPARATOR . 'img';
        $destinationPath = project_path('public' . DIRECTORY_SEPARATOR . $path); // upload path

        if ($config->val1 != 'logo-long-light.png') {
            $isDeleted = unlink(project_path('public' . DIRECTORY_SEPARATOR . 'assets' . DIRECTORY_SEPARATOR . 'img' . DIRECTORY_SEPARATOR . $config->val1));
        }

        $isMoved = $request->file('logo')->move($destinationPath, $picName);

        $config->val1 = $picName;
        $config->updated_at = Carbon::now();

        $toast = (!($config->save())) ? "Gagal mengunggah logo" : "Logo berhasil diunggah";

        return redirect(rootDashboard('setting?toast=' . $toast));
    }
}
