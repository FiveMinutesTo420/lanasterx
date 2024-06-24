<?php

namespace App\Actions;

use Illuminate\Support\Facades\Auth;

class AuthAction
{
    public function authorize($request)
    {
        $data = ['email' => $request->email, 'password' => $request->password];
        if (Auth::attempt($data)) {
            $request->session()->regenerate();
            return "ok";
        }
        return "not";
    }
}
