<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Cookie;

/**
 * Class LoginController
 * @package App\Http\Controllers
 */
class LoginController extends Controller
{
    /**
     * @param Request $request
     * @return \Illuminate\Contracts\Foundation\Application|\Illuminate\Contracts\View\Factory|\Illuminate\Http\RedirectResponse|\Illuminate\Routing\Redirector|\Illuminate\View\View
     */
    public function login(Request $request)
    {

        $authToken = Cookie::get('auth_token');
        $admin = env("MEDIA_ADMIN");
        $pass = env("MEDIA_PASSWORD");
        $hash = base64_encode("$admin:$pass");

        if ($authToken == $hash)
            return redirect('statistic');

        return view('login');
    }

    /**
     * @param Request $request
     * @return \Illuminate\Contracts\Foundation\Application|\Illuminate\Contracts\View\Factory|\Illuminate\Http\RedirectResponse|\Illuminate\Routing\Redirector|\Illuminate\View\View
     */
    public function auth(Request $request)
    {
        $admin = env("MEDIA_ADMIN");
        $pass = env("MEDIA_PASSWORD");
        $hash = base64_encode("$admin:$pass");
        $user = $request->input('user');
        $pass = $request->input('pass');
        if (base64_encode("$user:$pass") == $hash) {
            Cookie::queue('auth_token', $hash);
            return redirect('statistic');
        }
        else
        {
            return view('login', ['wrong' => true]);
        }

    }

    /**
     * @param Request $request
     * @return \Illuminate\Contracts\Foundation\Application|\Illuminate\Contracts\View\Factory|\Illuminate\View\View
     */
    public function exit(Request $request)
    {
        Cookie::queue('auth_token', '');
        return view('login');
    }
}
