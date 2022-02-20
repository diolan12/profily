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

        return redirect(rootDashboard() . '?toast=Welcome ' . $user['name']);
    }

    public function logout()
    {
        cookie(auth_cookie, '', 0);

        return redirect(root());
    }

    public function profile(Request $request)
    {
        $toast = $request->input('toast', null);
        $this->toast($toast);

        $this->load('user');
        $this->extra['meta']['title'] = 'Profile';
        $this->extra['nav']['active'] = 'profile';
        $this->extra['content']['main'] = 'dashboard.profile';
        $this->data['user'] = $this->user->with($this->user->getRelations())->find(auth()->user()->id);
        return $this->bootstrap(true);
    }

    public function update(Request $request)
    {
        $this->load('user');

        $data = $this->validate($request, $this->user->getValidator());
        $data['updated_at'] = Carbon::now('UTC');
        $data = $this->user->filter($data);

        $user = $this->user->with($this->user->getRelations())->find(auth()->user()->id);

        if ($user == null) {
            return redirect(rootAuth('profile?toast=No email records registered'));
        }
        $user->update($data);

        return redirect(rootAuth('profile?toast=Profile updated'));
    }

    public function uploadPicture(Request $request)
    {
        $this->load('user');

        $file = $request->file('avatar');

        $fn = explode('.', $file->getClientOriginalName()); // file path
        $format = $fn[(count($fn) - 1)];

        $user = $this->user->with($this->user->getRelations())->find(auth()->user()->id);

        $picName = uniqid() . '.' . $format;
        $path = 'assets' . DIRECTORY_SEPARATOR . 'img';
        $destinationPath = project_path(public_path . DIRECTORY_SEPARATOR . $path); // upload path


        // return dd($user->avatar);
        if ($user->avatar != asset('img/default-avatar.png')) {
            $isDeleted = unlink(project_path(public_path . $user->avatar));
        }

        $isMoved = $request->file('avatar')->move($destinationPath, $picName);

        $user->avatar = $picName;
        $user->updated_at = Carbon::now();

        if ($user == null) {
            return redirect(rootAuth('profile?toast=No email records registered'));
        }
        // $user->update($data);
        $toast = (!($user->save())) ? "Gagal memperbarui profil" : "Profil berhasil diperbarui";

        return redirect(rootAuth('profile?toast=' . $toast));
    }
}
