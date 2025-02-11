<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
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

    /**
     * Where to redirect users after login.
     *
     * @var string
     */


    // protected $redirectTo = '/home';

    protected function redirectTo()
{
    if (auth()->user()->role_id === 1) {
        return route('teacher.students'); // Redirige a la vista de profesores
    } elseif (auth()->user()->role_id === 2) {
        return route('students.index'); // Redirige a la vista de estudiantes
    }

    return '/home'; // Ruta por defecto si no tiene rol
}


    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('guest')->except('logout');
        $this->middleware('auth')->only('logout');
    }
}
