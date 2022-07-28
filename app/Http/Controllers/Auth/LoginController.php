<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use App\Providers\RouteServiceProvider;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Foundation\Auth\AuthenticatesUsers;

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
    public function login(Request $request)
    {
        $this->validate($request, [
            'email' => 'required|string',
            'password' => 'required|string|min:6'
        ]);

        $loginType = filter_var($request->email, FILTER_VALIDATE_EMAIL) ? 'email' : 'email';
        $data = User::where('email', $request->email)->first();

        $login = [
            $loginType => $request->email,
            'password' => $request->password
        ];

        if (auth()->attempt($login)) {
            if ($data->role == 'Admin' || $data->role == 'Employee') {
                return redirect('dashboard');
            } else if ($data->role == 'Super Admin') {
                return redirect('dashboard-admin');
            } else {
                return redirect('/');
            }
        }

        return redirect()->route('login')->with(['error' => 'Email/Password salah!']);
    }

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
}
