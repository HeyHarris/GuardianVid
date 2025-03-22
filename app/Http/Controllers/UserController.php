<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Validation\Rule;
use Illuminate\Support\Facades\Auth;

class UserController extends Controller
{
    public function registerPost(Request $request) {
        $signupformFields = $request->validate([
            'name'     => ['required', 'string', 'min:1'],
            'email'    => ['required', 'email', 'min:1', Rule::unique('users', 'email')],
            'password' => ['required', 'string', 'min:1'],
        ]);
        
        $user = User::create($signupformFields);
        auth() -> login($user);

        return redirect('/mainpage');
    }

    public function loginPost(Request $request) {
        $loginFormFields = $request->validate([
            'email' => ['required'],
            'password' => ['required']
        ]);

        if(Auth::attempt($loginFormFields)) {
             $request->session()->regenerate();
             return redirect()->intended('mainpage');
        }

        return back()->withErrors([
            'email' => 'The provided credentials do not match our records.',
        ])->onlyInput('email');

}
}