<?php

namespace App\Http\Controllers\Auth;

use Adldap\Laravel\Facades\Adldap;
use App\Http\Controllers\Controller;
use App\Models\User;
use App\Providers\RouteServiceProvider;
use Illuminate\Foundation\Auth\AuthenticatesUsers;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Hash;
use Mockery\Exception;

class LoginController extends Controller
{
    use AuthenticatesUsers;

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
//    protected $redirectTo = RouteServiceProvider::HOME;
//

    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('guest')->except('logout');

    }

//     /**
//     * Обработка попыток аутентификации.
//     *
//     * @param  \Illuminate\Http\Request $request
//     * @return \Illuminate\Http\Response
//     */


    public function login(Request $request)
    {


        $username = $request->input('email');
        $password = $request->input('password');
        $userdn = sprintf($username . '@almau.edu.kz', $username);


        if (Adldap::auth()->attempt($userdn, $password, $bindAsUser = true)) {
            Adldap::auth()->bind($userdn, $password);
//            $ldap_user = Adldap::getDefaultProvider()->search()->where('samaccountname', '=', $username)->first();
            // $user использовал ранее Auth::login($user) - для поиска пользователя в базе если все ок то авторизовываю его
            $user = User::query()->firstWhere('email', 'i.kudaikulov@almau.edu.kz');


            // данный метод сам делает проверку в базе а далее вставляет в таблицу данные о пользователе

            if (Auth::attempt(['email' => $userdn, 'password' => $password])) {
                // пересоздаем сессию при каждом входе, здесь можем написать логику типа записываем свои данные в базу
                $request->session()->regenerate();

//
//                 return response()->view('home');
                return redirect()->route('dash');

            }

        } else {
            return back()->withErrors([
                'email' => 'Логин или пароль введен неверно.'
            ]);
        }


    }
}
