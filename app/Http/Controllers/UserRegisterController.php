<?php

namespace App\Http\Controllers;

use App\Models\UserRegister;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;

class UserRegisterController extends Controller
{
    public function viewUsers(){

        $users = UserRegister::all();
        return view('homepage',compact('users'));
    }

    public function saveUser(Request $request){

        $user = new UserRegister();
        $user->first_name = $request->first_name;
        $user->last_name = $request->last_name;
        $user->dob = $request->dob;
        $user->gender = $request->gender;
        $user->email = $request->email;
        $user->contact_number = $request->contact_number;
        $user->password = Hash::make($request->password);
        $user->role = $request->role;
        $user->save();

        return back();

    }

    public function checkEmail($email){

        $users = UserRegister::where('email',$email)->get();
        
        return response()->json([
            "success" => true,
            "count" => count($users)
        ]);

    }
}
