<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Carbon\Carbon;

class DashboardUser extends BaseViewController
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
        $this->load(['user', 'commodity']);
        $this->extra['meta']['title'] = 'Data Pengguna';

        $this->extra['nav']['active'] = 'user';
        $this->extra['content']['main'] = 'dashboard.users';

        $this->data['users'] = $this->user->withTrashed()->with($this->user->getRelations())->get();

        return $this->bootstrap(true);
    }

    public function new(Request $request)
    {
        $this->load(['user']);
        $this->extra['meta']['title'] = 'Pengguna';
        $this->extra['nav']['active'] = 'user';
        $this->extra['content']['main'] = 'dashboard.user';
        
        $data = $this->validate($request, $this->user->validation());
        $data['created_at'] = Carbon::now('UTC');
        $data['updated_at'] = Carbon::now('UTC');
        $data = $this->user->filter($data);

        $toast = (!($this->user->insert($data))) ? "Gagal menambahkan pengguna" : "Pengguna berhasil ditambahkan";

        $this->data['users'] = $this->user->with($this->user->getRelations())->get();

        return redirect(rootDashboard('user?toast=' . $toast));
    }

    public function userAt(Request $request, $userName)
    {
        $toast = $request->input('toast', null);
        $this->toast($toast);

        $this->load('user');
        $this->extra['meta']['title'] = kebab_to_beauty($userName);

        $this->extra['nav']['active'] = 'user';
        $this->extra['content']['main'] = 'dashboard.user';

        $this->data['user'] = $this->user->withTrashed()->with($this->user->getRelations())->where('name', kebab_to_beauty($userName))->first();

        if ($this->data['user'] == null) {
            // abort(404, "Komoditas " . kebab_to_beauty($commodityName) . " tidak ditemukan");
            return redirect(rootDashboard('user'));
        }

        return $this->bootstrap(true);
    }

    public function userUpdateAt(Request $request, $userName)
    {
        $this->load('user');
        $this->extra['meta']['title'] = kebab_to_beauty($userName);

        $this->extra['nav']['active'] = 'user';
        $this->extra['content']['main'] = 'dashboard.user';

        $data = $request->all();
        $data['updated_at'] = Carbon::now();
        $data = $this->user->filter($data);

        $user = $this->user->withTrashed()->with($this->user->getRelations())->where('name', kebab_to_beauty($userName))->first();

        if ($user == null) {
            abort(404, "Pengguna " . kebab_to_beauty($userName) . " tidak ditemukan");
        }

        $toast = (!($user->update($data))) ? "Gagal memperbarui pengguna" : "Pengguna berhasil diperbarui";
        
        // $this->toast($toast);

        $this->data['user'] = $this->user->with($this->user->getRelations())->get();
        return redirect(rootDashboard('user/'.beauty_to_kebab($data['name']).'?toast=' . $toast));
    }
}
