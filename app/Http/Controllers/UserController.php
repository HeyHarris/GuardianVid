<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;

class UserController extends Controller
{
    public function register(Request $request) {
        $incoming_fields = $request->validate([
            'name' => 'required',
            'email' => 'required',
            'password' => 'required'
        ]);
        $incoming_fields['password'] = bcrypt($incoming_fields['password']);
        User::create($incoming_fields);

        return 'Hellow worlsd';
    }
}
