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

}
