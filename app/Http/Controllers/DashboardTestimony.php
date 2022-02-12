<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Rest\Product;
use Carbon\Carbon;

class DashboardTestimony extends BaseViewController
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


    public function testimony(Request $request)
    {
        $toast = $request->input('toast', null);
        $this->toast($toast);

        $this->load(['testimony']);
        $this->extra['meta']['title'] = 'Testimoni';
        $this->extra['nav']['active'] = 'testimony';
        $this->extra['content']['main'] = 'dashboard.testimonies';

        $this->data['testimonies'] = $this->testimony->with($this->testimony->getRelations())->get();

        return $this->bootstrap(true);
    }

    public function testimonyNew(Request $request)
    {
        $this->load(['testimony']);
        $this->extra['meta']['title'] = 'Komoditas';
        $this->extra['nav']['active'] = 'testimony';
        $this->extra['content']['main'] = 'dashboard.testimony';
        
        $data = $this->validate($request, $this->testimony->validation());
        $data['created_at'] = Carbon::now('UTC');
        $data['updated_at'] = Carbon::now('UTC');
        $data = $this->testimony->filter($data);

        $toast = (!($this->testimony->insert($data))) ? "Gagal menambahkan komoditas" : "Komoditas berhasil ditambahkan";

        $this->data['commodities'] = $this->testimony->with($this->testimony->getRelations())->get();

        return redirect(rootDashboard('testimony?toast=' . $toast));
    }

    public function testimonyAt(Request $request, $testimonyID)
    {
        $toast = $request->input('toast', null);
        $this->toast($toast);

        $this->load('testimony');
        $this->extra['meta']['title'] = 'Testimoni';

        $this->extra['nav']['active'] = 'testimony';
        $this->extra['content']['main'] = 'dashboard.testimony';

        $this->data['testimony'] = $this->testimony->with($this->testimony->getRelations())->where('id', $testimonyID)->first();

        if ($this->data['testimony'] == null) {
            // abort(404, "Komoditas " . kebab_to_beauty($commodityName) . " tidak ditemukan");
            return redirect(rootDashboard('testimony'));
        }

        return $this->bootstrap(true);
    }

    public function testimonyUpdateAt(Request $request, $testimonyID)
    {
        $this->load('testimony');
        $this->extra['meta']['title'] = $testimonyID;

        $this->extra['nav']['active'] = 'testimony';
        $this->extra['content']['main'] = 'dashboard.testimony';

        $data = $request->all();
        $data['updated_at'] = Carbon::now();
        $data = $this->testimony->filter($data);

        $testimony = $this->testimony->where('id', $testimonyID)->first();

        if ($testimony == null) {
            abort(404, "Testimoni tidak ditemukan");
        }

        $toast = (!($testimony->update($data))) ? "Gagal memperbarui testimony" : "Testimony berhasil diperbarui";
        
        // $this->toast($toast);

        $this->data['testimony'] = $testimony;
        return redirect(rootDashboard('testimony/'.$testimonyID.'?toast=' . $toast));
    }

}
