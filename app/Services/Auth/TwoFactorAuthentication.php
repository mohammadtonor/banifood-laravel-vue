<?php

namespace App\Services\Auth;

use App\TwoFactor;
use App\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use PhpParser\Node\Stmt\Static_;

class TwoFactorAuthentication
{

    const CODE_SENT = 'code.sent';
    const CODE_INVALID = 'code.invalid';
    const AUTHENTICATED = 'code.authenticated';

    protected $code;
    protected $request;

    public function __construct(Request $request)
    {
        $this->request = $request;
    }

    public function requestCode(User $user)
    {
        $code = TwoFactor::generateCodeFor($user);

        $response = $code->send();

        $this->setSession($code);

        return $response;
    }

    protected function setSession($code)
    {
        session([
            'code_id' => $code->id,
            'user_id' => $code->user_id,
            'remember' => $this->request->remember
        ]);
    }

    public function login()
    {
        if (!$this->isValidCode()) return self::CODE_INVALID;

        $this->getToken()->delete();

        Auth::login($this->getUser(),session('remember'));

        $this->fogotSesssion();

        return self::AUTHENTICATED;
    }

    protected function isValidCode()
    {
        return !$this->getToken()->isExpired() && $this->getToken()->isEqualWith($this->request->code);
    }

    protected function getToken()
    {
        return $this->code ?? $this->code = TwoFactor::findOrFail(session('code_id'));
    }

    protected function fogotSesssion()
    {
        session(['code_id', 'user_id', 'remember']);
    }

    protected function getUser()
    {
        return User::findOrFail(session('user_id'));
    }


}
