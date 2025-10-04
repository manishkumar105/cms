<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Auth\Events\Validated;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;


class AuthController extends Controller
{
    public function showRegistration()
    {
        return view("auth.registration");
    }

    public function registration(Request $request)
    {
        $validated = $request->validate([
            "name"=>"required|string",
            "email"=>"required|email|unique:users",
            "password"=>"required|min:6|confirmed",
            "gender"=>"required|in:male,female",
            "state"=>"required|string",
            "city"=>"required|string",
            "hobbies"=>"required|array",
            "hobbies.*"=>"string",
            "image"=>"required|mimes:jpeg,png,jpg,gif|max:2048",
        ]);
        $validated["password"] = Hash::make($request->password);
        $validated["hobbies"] = json_encode($validated["hobbies"]);

        if($request->hasFile("image")){
            $file = $request->file("image");
            $filename = "profile_".time().".".$file->getClientOriginalExtension();
            $path = $file->storeAs("profile",$filename,"public");
            $validated["image"] = $path;
        }
        // dd($request->all());

        User::create($validated);
        return redirect()->route("auth.showLogin")->with("success","Registration Successfully Done, Please Login");

    }

    public function showLogin()
    {
        return view("auth.login");
    }

    public function login(Request $request)
    {
        $credentials = $request->validate([
            "email"=>"required|email",
            "password"=>"required|min:6"
        ]);
        if(Auth::attempt($credentials)){
            $request->session()->regenerate();
            return redirect()->route("auth.dashboard");
        }else{
            return back()->withErrors([
                "email"=>"Invalid Credentials",
            ]);
        }
    }

    public function dashboard()
    {
        return view("auth.dashboard");
    }

    public function logout(Request $request)
    {
        Auth::logout();
        $request->session()->invalidate();
        $request->session()->regenerateToken();
        return redirect()->route("auth.showLogin");
    }
}
