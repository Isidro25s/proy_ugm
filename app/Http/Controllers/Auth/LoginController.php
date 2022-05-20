<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use Illuminate\Foundation\Auth\AuthenticatesUsers;
use Laravel\Socialite\Facades\Socialite as Socialite;

class LoginController extends Controller
{
    use AuthenticatesUsers;
    public function index()
    {
        return view('auth/login');
    }
    /**
     * Redirecciona al usuario a la página de Facebook para autenticarse
     *
     * @return \Illuminate\Http\Response
     */
    public function redirectToFacebookProvider()
    {
        return Socialite::driver('facebook')->redirect();
    }
    /**
     * Obtiene la información de Facebook
     *
     * @return \Illuminate\Http\RedirectResponse
     */
    public function handleProviderFacebookCallback()
    {
        $auth_user = Socialite::driver('facebook')->user(); // Fetch authenticated user
        // dd($auth_user);
        return redirect('/candidato');
    }
}
