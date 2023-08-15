<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Models\User;
use Illuminate\Support\Facades\Hash;
use Session;
use Illuminate\Support\Facades\Auth;

class UserController extends Controller
{
    public function register(Request $request) {

        $request->validate([
            'name'=>"required",
            'email'=>"required",
            'password'=>"required"
        ]);

        $user = new User;
        $user->name = $request->name;
        $user->email = $request->email;
        $user->password = Hash::make($request->password);
        $user->role = $request->role;
        $user->save();
        return redirect('/login');
    }

    public function login (Request $request) {
        $request->validate([
            
            'email'=>"required",
            'password'=>"required"
        ]);

        $credentials = $request->only('email', 'password');
        if (Auth::attempt($credentials)) {
            return redirect('/');          
        }
        return back()->withErrors(['custom-name'=>'Email or Password Does not match! Try Again.']);
        
    }
}
