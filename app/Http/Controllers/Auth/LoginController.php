<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use App\Providers\RouteServiceProvider;
use Illuminate\Foundation\Auth\AuthenticatesUsers;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

use App\Models\Security\Permission;
use App\Models\User;

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
        $this->middleware('guest')->except('logout', 'primeiroAcesso', 'redefinirSenha');
    }

    // Login
    public function showLoginForm()
    {
        $pageConfigs = ['blankPage' => true];

        return view('auth/login', ['pageConfigs' => $pageConfigs]);
    }

    public function authenticate(Request $request)
    {
        $credentials = $request->only('email', 'password');

        if (Auth::attempt($credentials)) {
            $request->session()->regenerate();
            $user = Auth::user();
            $permission = new Permission();
           // dd($user->permissions);
            $user->permissions = $user->role->permissions->pluck('id');
           // array_push($user->permissions, 22);
            $user->menu = $permission->makeMenu();
            $request->session()->put('user', $user);
            if ($user->redefinir_senha == 1) {
                return redirect()->route('primeiroAcesso', ['id' => $user->id]);
            } else {
                $user->home = $user->home->url ?? '/';
                return redirect($user->home); //->intended('exemplo');
            }
        }

        return back()
            ->withInput()
            ->withErrors([
                'email' => 'Usuário e/ou Senha inválido.',
            ]);
    }
    public function primeiroAcesso($id)
    {
        $user = User::findOrFail($id);
        $pageConfigs = ['blankPage' => true];
        return response()->view('auth/redefinir-senha', ['pageConfigs' => $pageConfigs, 'user' => $user]);
    }

    public function redefinirSenha(Request $request)
    {
        $user = User::findOrFail($request->id);
        $user->password = bcrypt($request->resetPasswordNew);
        $user->redefinir_senha = false;
        $user->save();
        $redirect = $user->home->url ?? '/';
        return redirect($redirect);
    }


    public function logout(Request $request)
    {
        Auth::logout();

        $request->session()->invalidate();

        $request->session()->regenerateToken();

        return redirect('/');
    }
}
