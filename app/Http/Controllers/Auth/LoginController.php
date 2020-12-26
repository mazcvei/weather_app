<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use App\Providers\RouteServiceProvider;
use App\User;
use Carbon\Carbon;
use Illuminate\Foundation\Auth\AuthenticatesUsers;
use Laravel\Socialite\Facades\Socialite;

class LoginController extends Controller
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

    use AuthenticatesUsers;

    /**
     * Where to redirect users after login.
     *
     * @var string
     */
    protected $redirectTo = RouteServiceProvider::HOME;

    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('guest')->except('logout');
    }

    public function redirectToProvider($social)
    {
        return Socialite::driver($social)->redirect();
    }
    public function handleProviderCallback($social)
    {
        if (!request()->get('code'))
            return $this->defaultRedirect(); //El usuario ha rechazado el login

        $userSocial = Socialite::with($social)->user();
        $user = User::where('email', $userSocial->email)->first();

        if ($user) {
            if ($user->provider == $social) {
                return $this->authAndRedirect($user);
            } else {
                die('Estas intentando iniciar sesión via ' . $social . ' pero ya estas vinculado con ' . $user->provider);
            }

        } else {
            $user = new User();
            $user->fill([
                'name' => $userSocial->name,
                'email' => $userSocial->email,
                'avatar' => $userSocial->avatar,
            ]);
            $user->provider = $social;
            $user->email_verified_at = Carbon::now()->toDateTimeString();
            $user->save();
            return $this->authAndRedirect($user);
        }

        return $this->defaultRedirect();
    }

    private function authAndRedirect($user)
    {
        Auth::login($user);
        return redirect()->action('IndexController@index');
    }

    /**
     * En caso de que los logins sociales fallen, redirigir con esto.
     * @return \Illuminate\Http\RedirectResponse
     */
    private function defaultRedirect()
    {
        return redirect()->action('IndexController@index');
    }

}
