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
        $destinationPath = project_path('public' . DIRECTORY_SEPARATOR . $path); // upload path

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

        $this->extra['nav']['active'] = 'gallery';
        $this->extra['content']['main'] = 'dashboard.image';

        $this->data['image'] = $this->image->with($this->image->getRelations())->where('id', $imageID)->first();

        if ($this->data['image'] == null) {
            // abort(404, "Komoditas " . kebab_to_beauty($commodityName) . " tidak ditemukan");
            return redirect(rootDashboard('gallery'));
        }
        $this->extra['meta']['title'] = 'Image ' . $this->data['image']->title;

        return $this->bootstrap(true);
    }

    public function galleryUpdateAt(Request $request, $imageID)
    {
        $this->load('image');

        $this->extra['nav']['active'] = 'gallery';
        $this->extra['content']['main'] = 'dashboard.image';

        $data = $request->all();
        $data['updated_at'] = Carbon::now();
        $data = $this->image->filter($data);

        $image = $this->image->where('id', $imageID)->first();

        if ($image == null) {
            // abort(404, "Gambar tidak ditemukan");
            return redirect(rootDashboard('gallery?toast=Gambar tidak ditemukan'));
        }
        $this->extra['meta']['title'] = $image->title;

        $toast = (!($image->update($data))) ? "Gagal memperbarui detail" : "Detail berhasil diperbarui";

        // $this->toast($toast);

        $this->data['testimony'] = $image;
        return redirect(rootDashboard('gallery/' . $imageID . '?toast=' . $toast));
    }
    public function galleryUpdateImageAt(Request $request, $imageID)
    {
        $this->load('image');

        $this->extra['nav']['active'] = 'gallery';
        $this->extra['content']['main'] = 'dashboard.image';

        $file = $request->file('image');

        $fn = explode('.', $file->getClientOriginalName()); // file path
        $format = $fn[(count($fn) - 1)];

        $picName = uniqid() . '.' . $format;
        $path = 'assets' . DIRECTORY_SEPARATOR . 'img';
        $destinationPath = project_path('public' . DIRECTORY_SEPARATOR . $path); // upload path

        $isMoved = $request->file('image')->move($destinationPath, $picName);

        $data = $request->all();
        $data = $this->image->filter($data);
        
        $image = $this->image->where('id', $imageID)->first();

        $isDeleted = unlink(project_path('public' . $image->file));

        $image->file = $picName;
        $image->updated_at = Carbon::now();


        if ($image == null) {
            return redirect(rootDashboard('gallery?toast=Gambar tidak ditemukan'));
        }
        $this->extra['meta']['title'] = $image->title;

        $toast = (!($image->save())) ? "Gagal memperbarui detail" : "Detail berhasil diperbarui";

        $this->data['testimony'] = $image;
        return redirect(rootDashboard('gallery/' . $imageID . '?toast=' . $toast));
    }
}
