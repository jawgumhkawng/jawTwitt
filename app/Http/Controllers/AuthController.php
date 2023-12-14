<?php

namespace App\Http\Controllers;

use App\Mail\TwittEmail;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Mail;
use Illuminate\Validation\Rules\Password;

class AuthController extends Controller
{
    public function register()
    {
        return view("auth.register");
    }

    public function store()
    {
        $validated = request()->validate([

            "name" => "required|min:5|max:40",
            "email" => "required|email|unique:users,email",
            "password" => ["required", Password::min(8)
                ->letters()
                ->mixedCase()
                ->numbers()
                ->symbols()
                ->uncompromised()],
            "password_confirmation" => "required|same:password"
        ]);

        $user = User::create([
            "name" => $validated["name"],
            "email" => $validated["email"],
            "password" => Hash::make($validated["password"]),
        ]);

        Mail::to($user->email)->send(new TwittEmail($user));

        return redirect()->route('dashboard')->with("success", "Account Created successfully!");
    }

    public function login()
    {
        return view("auth.login");
    }

    public function authenticate()
    {
        $validated = request()->validate([


            "email" => "required|email",
            "password" => "required|min:8",

        ]);


        if (auth()->attempt($validated)) {

            request()->session()->regenerate();

            return redirect()->route("dashboard")->with("success", "Login Success !");
        }

        return redirect()->route("login")->withErrors([
            "error" => "No Matching User Found With Provided Email And Password !"
        ]);
    }

    public function logout()
    {
        auth()->logout();

        request()->session()->invalidate();
        request()->session()->regenerateToken();

        return redirect()->route('dashboard')->with("delete", "User Logout !");
    }
}
