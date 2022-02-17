<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Carbon\Carbon;

class DashboardCommodity extends BaseViewController
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

        // $this->data['commodities'] = $this->commodity->with($this->commodity->getRelations())->get();
        return redirect(rootDashboard('commodity/'.beauty_to_kebab($data['name']).'?toast=' . $toast));
    }

    public function typeAtCommodity(Request $request, $commodityName, $typeID)
    {
        $toast = $request->input('toast', null);
        $this->toast($toast);

        $this->load(['commodity', 'type']);
        $this->extra['meta']['title'] = kebab_to_beauty($commodityName);

        $this->extra['nav']['active'] = 'commodity';
        $this->extra['content']['main'] = 'dashboard.type';

        $this->data['type'] = $this->type->with($this->type->getRelations())->where('id', $typeID)->first();

        if ($this->data['type'] == null) {
            // abort(404, "Komoditas " . kebab_to_beauty($commodityName) . " tidak ditemukan");
            return redirect(rootDashboard('commodity/'.beauty_to_kebab($commodityName)));
        }

        return $this->bootstrap(true);
    }

    public function typeUpdateAtCommodity(Request $request, $commodityName, $typeID)
    {
        $this->load(['commodity', 'type']);
        $this->extra['meta']['title'] = kebab_to_beauty($commodityName);

        $this->extra['nav']['active'] = 'commodity';
        $this->extra['content']['main'] = 'dashboard.type';

        $data = $request->all();
        $data['updated_at'] = Carbon::now();
        $data = $this->type->filter($data);

        $type = $this->type->with($this->type->getRelations())->where('id', $typeID)->first();

        if ($type == null) {
            abort(404, "Jenis komoditas " . kebab_to_beauty($commodityName) . " tidak ditemukan");
        }

        $toast = (!($type->update($data))) ? "Gagal memperbarui jenis komoditas" : "Jenis komoditas berhasil diperbarui";
        
        // $this->toast($toast);

        $this->data['types'] = $this->type->with($this->type->getRelations())->get();
        return redirect(rootDashboard('commodity/'.$commodityName.'?toast=' . $toast));
    }

}
