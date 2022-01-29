<?php

namespace App\Http\Controllers;

use App\Models\UserRegister;
use Exception;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;

class UserRegisterController extends Controller
{
    public function viewUsers(){

        return view('homepage');
    }

    public function saveUser(Request $request){

        try{
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

            return back()->with('status' , "Successfully Added new User");
        }catch(Exception $e){
            return back()->with('danger' , "Error - ".$e);
        }

    }

    public function checkEmail($email){

        $users = UserRegister::where('email',$email)->get();

        return response()->json([
            "success" => true,
            "count" => count($users)
        ]);

    }
}
