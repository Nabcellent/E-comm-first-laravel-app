<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;
use App\Models\User;

class userController extends Controller {
    function register(Request $req): \Illuminate\Routing\Redirector|\Illuminate\Contracts\Foundation\Application|\Illuminate\Http\RedirectResponse
    {
        $user = new User;
        $user -> name = $req -> name;
        $user -> email = $req -> email;
        $user -> password = Hash::make($req -> password);
        $user -> save();

        return redirect('/login');
    }

    function login(Request $req): \Illuminate\Routing\Redirector|string|\Illuminate\Http\RedirectResponse|\Illuminate\Contracts\Foundation\Application
    {
        $user = User::where(['email' => $req -> email]) -> first();

        if($user && Hash::check($req -> password, $user -> password)) {
            $req -> session() -> put('user', $user);

            return redirect('/');
        } else {
            return "Invalid Credentials!";
        }
    }
}
