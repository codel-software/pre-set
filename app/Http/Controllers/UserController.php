<?php

namespace App\Http\Controllers;

use App\Core\User\User;
use App\Core\User\UserType;
use Illuminate\Foundation\Auth\Access\AuthorizesRequests;
use Illuminate\Foundation\Bus\DispatchesJobs;
use Illuminate\Foundation\Validation\ValidatesRequests;
use Illuminate\Http\Request;
use Illuminate\Routing\Controller as BaseController;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;

class UserController extends Controller
{

    public function loginWeb(Request $request){

        $credentials = $request->validate([
            'email' => ['required', 'email'],
            'password' => ['required'],
        ]);

        if (Auth::attempt($credentials)) {
            $request->session()->regenerate();

            return redirect()->intended('/user/dashboard');
        }

        return back()->withErrors([
            'email' => 'The provided credentials do not match our records.',
        ]);
    }





    public function update(Request $request){
        $user = Auth::user();

        $user->update($request->all());

        return redirect('/user/dashboard');
    }

    public function register(Request $request){
        $requestData = $request->all();
        
        $requestData['password'] = Hash::make($requestData['password']);
        
        return User::create($requestData);

    }
    public function getUsuarios(){
        return User::all();
    }
    
    /**
     * service de login de usuario
     *
     * @param Request $request
     */
    public function login(Request $request)
    {
        $email = $request->input('email');

        $user = User::getUserByEmail($email);

        if (is_null($user)) {
            throw new \Exception('Usuário não encontrado', 400);
        }

        if ($user->validatePassword( $request->input('password'))) {
            return [
                'token' => $user->generateNewToken($user->id),
                'user' => $user
            ];
        }

        throw new \Exception('E-mail ou senha incorreto', 401);

    }
}
