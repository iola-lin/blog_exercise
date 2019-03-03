<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use Illuminate\Foundation\Auth\ResetsPasswords;
use Illuminate\Http\Request;
use App\User;

class ResetPasswordController extends Controller
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

    use ResetsPasswords;

    /**
     * Where to redirect users after resetting their password.
     *
     * @var string
     */
    protected $redirectTo = '/home';

    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('guest');
    }

    public function resetFixedPassword(Request $request)
    {
        $email = $request->email;
        $user = User::where('email', $email)->first();
        if (empty($user)) {
            return back()->withInput()
                ->withErrors(['user' => 'no such email.']);
        }
        $user->update([
            'password' => \Hash::make("fixed password"),
        ]);

        // flash data
        $request->session()->flash('reset_password', true);
        return redirect('/login');
            // ->with(['reset_password', true]);  //this doesn't show up
    }
}
