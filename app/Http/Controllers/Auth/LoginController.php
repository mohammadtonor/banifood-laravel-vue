<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use App\Http\Requests\Code;
use App\Providers\RouteServiceProvider;
use App\Services\Auth\TwoFactorAuthentication;
use App\User;
use Illuminate\Http\Request;
use Illuminate\Foundation\Auth\AuthenticatesUsers;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;


class LoginController extends Controller
{

    protected $twoFactor;
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
    public function __construct(TwoFactorAuthentication $twoFactor)
    {
        $this->middleware('guest')->except('logout','');
        $this->twoFactor = $twoFactor;
    }

    public function showLoginForm()
    {
        return view('auth.login');
    }


    public function showCodeForm()
    {
        return view('auth.two-factor.login-code');
    }


    public function login(Request $request)
    {

        $this->validateForm($request);
        if ($this->hasTooManyLoginAttempts($request)) {
            return $this->sendLockoutResponse($request);
        }


        $user = $this->getUser($request);

        if ( !Hash::check($request->input('password'),$user->password))
            return $this->sendLoginFailedResponse();

        if ($user->hasTwoFactor()) {
            $response = $this->twoFactor->requestCode($user);
            return $this->sendHasTwoFactorResponse();
        }

        Auth::login($user, $request->remember);
        return $this->sendSuccessResponse();
    }

    protected function sendHasTwoFactorResponse()
    {
        return redirect()->route('auth.login.code.form');
    }

    protected function sendLoginFailedResponse()
    {
        return back()->with('wrongCredentials', true);
    }

    protected function isValidCredentials($request)
    {
        return Auth::validate($request->only(['email', 'password']));
    }


    protected function sendSuccessResponse()
    {
        session()->regenerate();
        return redirect()->intended();
    }

    public function confirmCode(Code $request)
    {
        $response = $this->twoFactor->login();

        return   $response === $this->twoFactor::AUTHENTICATED
            ? $this->sendSuccessResponse()
            : back()->with('invalidCode', true);
    }


    protected function validateForm(Request $request)
    {
        $request->validate(
            [
                'email' => ['required', 'email', 'exists:users'],
                'password' =>  ['required'],
                // 'g-recaptcha-response' => ['required', new Recaptcha]
            ],
            [
                'g-recaptcha-response.required' => __('auth.recaptcha')
            ]
        );
    }

    protected function getUser($request)
    {
        return User::where('email', $request->email)->firstOrFail();
    }




    public function logout()
    {
        session()->invalidate();

        Auth::logout();

        return redirect()->route('home');
    }


    protected function username()
    {
        return 'email';
    }

}
