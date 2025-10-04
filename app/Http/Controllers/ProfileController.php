<?php

namespace App\Http\Controllers;

use Illuminate\Auth\Events\Validated;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Storage;





class ProfileController extends Controller
{
     public function __construct()
    {
        $this->middleware("authMiddleware");
    }
    
    public function index()
    {
        $userId = Auth::id();
        $profiles = DB::table("users")->where("id", $userId)->first();
        return view("profiles.index",compact("profiles"));
    }

    public function edit()
    {
        $userId = Auth::id();
        $profiles = DB::table("users")->where("id",$userId)->first();
        return view("profiles.edit",compact("profiles"));
    }

    public function update(Request $request,$id)
    {
       $validated = $request->validate([
            "name"=>"nullable|string",
            "gender"=>"nullable|in:male,female",
            "state"=>"nullable|string",
            "city"=>"nullable|string",
            "hobbies"=>"nullable|array",
            "hobbies.*"=>"string",
            "image"=>"nullable|mimes:png,jpeg,jpg,gif|max:2048",


        ]);
        $profile = DB::table("users")->find($id);
        $imagePath = $profile->image; // existing image

        //delete old image and update new
        if($request->hasFile("image"))
        {
            if($profile->image && Storage::disk("public")->exists($profile->image))
            {
                Storage::disk("public")->delete($profile->image);
            }
            $file = $request->file("image");
            $filename = "profile_".time().".".$file->getClientOriginalExtension();
            $imagePath = $file->storeAs("profile",$filename,"public");
            $validated["image"] = $imagePath;
        }


        DB::table("users")->update([
            "name"=>$validated["name"] ?? $profile->name,
            "gender"=>$validated["gender"] ?? $profile->gender,
            "state"=>$validated["state"] ?? $profile->state,
            "city"=>$validated["city"] ?? $profile->city,
            "hobbies"=>isset($validated["hobbies"]) ? json_encode($validated["hobbies"]) : $profile->hobbies,
            "image"=>$imagePath,
            "updated_at"=>now(),
        ]);
        return redirect()->route("auth.dashboard")->with("success","Profile Updated Succesfully");
    }
}
