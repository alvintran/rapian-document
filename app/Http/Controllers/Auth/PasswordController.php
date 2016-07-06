<?php

namespace Nht\Http\Controllers\Auth;

use Nht\Http\Controllers\Controller;
use Illuminate\Foundation\Auth\ResetsPasswords;
use Nht\Hocs\Users\PasswordResets;
use Nht\Hocs\Core\Metadata\MetadataTrait;
use Lang;

class PasswordController extends Controller
{
    /*
    |--------------------------------------------------------------------------
    | Password Reset Controller
    |--------------------------------------------------------------------------
    |
    | This controller is responsible for handling password reset requests
    | and uses a simple trait to include this behavior. You're free to
    | explore this trait and override any methods you wish to tweak.
    |
    */

    use ResetsPasswords, MetadataTrait;

    protected $subject = 'Link reset mật khẩu';
    protected $redirectPath = '/';
    protected $redirectTo = '/';

    /**
     * Create a new password controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('guest');
        $this->getMetadata();
    }

    /**
     * Override getEmail method in Illuminate\Foundation\Auth\ResetsPasswords trait
     * @return View
     */
    public function getEmail()
    {
        $this->metadata->setMetaTitle('Reset mật khẩu');
        return view('auth.password');
    }

    /**
     * Override getReset method in Illuminate\Foundation\Auth\ResetsPasswords trait
     *
     * @param  string  $token
     * @return \Illuminate\Http\Response
     */
    public function getReset($token = null, PasswordResets $rp)
    {
        $this->metadata->setMetaTitle('Reset mật khẩu');

        if (is_null($token)) {
            abort('404');
        }

        $email = $rp->where('token', $token)->lists('email');

        return view('auth.reset')->with(['token' => $token, 'email' => $email]);
    }
}
