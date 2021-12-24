<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use App\Providers\RouteServiceProvider;
use Illuminate\Foundation\Auth\AuthenticatesUsers;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class LoginGuruController extends Controller
{
    /*
    |--------------------------------------------------------------------------
    | Login Controller
    |--------------------------------------------------------------------------
    |
    | This controller handles authenticating users for the application and
    | redirecting them to your home screen. The controller uses a trait
    | to conveniently provide its functionality to your applications.
    |
    */

    use AuthenticatesUsers {
        logout as performLogout;
    }

    /**
     * Where to redirect users after login.
     *
     * @var string
     */
//    protected $redirectTo = RouteServiceProvider::HOME;

//    protected $redirectTo = '/home';
    protected function redirectTo()
    {
        if (auth()->user()->role == 'admin') {
            return '/admin/';
        }else if(auth()->user()->role == 'guru'){
            return '/guru/';
        }else{
            return '/login';
        }
    }

    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->redirectTo = '/gr'.app()->getLocale();
        $this->middleware('guest')->except('logout');
    }

    public function username()
    {
        return 'nik';
    }

    public function logout(Request $request)
    {
        if(Auth::user()->role == 'siswa'){
            $this->performLogout($request);
            return redirect()->route('siswa.home');
        }else{
            $this->performLogout($request);
            return redirect()->route('guru.home');
        }
    }
}
