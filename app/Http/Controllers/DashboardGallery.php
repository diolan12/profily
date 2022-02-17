<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Carbon\Carbon;

class DashboardGallery extends BaseViewController
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


    public function gallery(Request $request)
    {
        $toast = $request->input('toast', null);
        $this->toast($toast);

        $this->load(['image']);
        $this->extra['meta']['title'] = 'Gallery';
        $this->extra['nav']['active'] = 'gallery';
        $this->extra['content']['main'] = 'dashboard.images';

        $this->data['images'] = $this->image->orderBy('created_at', 'DESC')->get();

        return $this->bootstrap(true);
    }

    public function galleryNew(Request $request)
    {
        $this->load(['image']);
        $this->extra['meta']['title'] = 'Gallery';
        $this->extra['nav']['active'] = 'gallery';
        $this->extra['content']['main'] = 'dashboard.gallery';

        $file = $request->file('image');

        $fn = explode('.', $file->getClientOriginalName()); // file path
        $format = $fn[(count($fn) - 1)];

        $picName = uniqid() . '.' . $format;
        $path = 'assets' . DIRECTORY_SEPARATOR . 'img';
        $destinationPath = base_path('public' . DIRECTORY_SEPARATOR . $path); // upload path
        
        $isSuccess = $request->file('image')->move($destinationPath, $picName);

        $data = $this->validate($request, $this->image->validation());
        $data['file'] = $picName;
        $data['created_at'] = Carbon::now('UTC');
        $data['updated_at'] = Carbon::now('UTC');
        $data = $this->image->filter($data);

        $toast = "Gagal menambahkan gambar";

        if ($isSuccess) {
            $toast = (!($this->image->insert($data))) ? "Gagal menambahkan gambar" : "Gambar berhasil ditambahkan";
        }

        $this->data['images'] = $this->image->with($this->image->getRelations())->get();

        return redirect(rootDashboard('gallery?toast=' . $toast));
    }

    public function galleryAt(Request $request, $imageID)
    {
        $toast = $request->input('toast', null);
        $this->toast($toast);

        $this->load('image');

        $this->extra['nav']['active'] = 'image';
        $this->extra['content']['main'] = 'dashboard.image';

        $this->data['image'] = $this->image->with($this->image->getRelations())->where('id', $imageID)->first();

        if ($this->data['image'] == null) {
            // abort(404, "Komoditas " . kebab_to_beauty($commodityName) . " tidak ditemukan");
            return redirect(rootDashboard('gallery'));
        }
        $this->extra['meta']['title'] = 'Image '.$this->data['image']->title;

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
        return redirect(rootDashboard('testimony/' . $testimonyID . '?toast=' . $toast));
    }
}
