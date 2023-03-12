<?php

namespace App\Http\Controllers;

use App\Models\User;
use App\Models\member;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;

class userController extends Controller
{
    function register(Request $req){
        
        $errors=array();
        $password=$req->password;
        $cpassword=$req->cpassword;
        $find=User::where(['email'=>$req->email])->orWhere(['name'=>$req->fullname])->first();
        if($find){array_push($errors, 'User with the same email or name already exist');}
        if(strlen($req->password)<8){array_push($errors, 'Password too short');}
        if($password!=$cpassword){array_push($errors, 'The passwords do not match');}
        if(count($errors)==0){
            $user=new User;
            $extension=$req->file('passport')->getClientOriginalExtension();
            $filenametostore='user_'.time().'.'.$extension;   
            $path=$req->file('passport')->storeAs('public/profile_images', $filenametostore);
            $user->name=$req->fullname;
            $user->email=$req->email;
            $user->passport=$filenametostore;
            $user->password=hash::make($password);
            $user->is_admin=0;
            $user->save();
            $req->session()->put('user',$user);
            return redirect('/');
        }
        else{
            return view('register', ['errors'=>$errors]);
        }
        
    }
    function log_user(Request $req){
        $username=$req->email;
        $user=User::where(['email'=>$username])->first();
        if(!$user || !Hash::check($req->password,$user->password)){
            return redirect(back());
        }
        else{
            $req->session()->put('user',$user);
            return redirect('/');
        }
        
    }
    function resetPassword(Request $req){
        $errors=array();
        $users= User::where('email','=',$req->email)->get('id','email');
        foreach($users as $user){
            $id=$user->id;
        }
        if(!$user){
            array_push($errors,'Email not matching any record');
        }
        if(($req->password)!=($req->cpassword)){
            array_push($errors,'The two passwords are not matching.');
        }
        if(count($errors)>0){
            return view('reset', ['errors'=>$errors]);
        }
        else{
            $user= User::find($id);
            $user->password=Hash::make($req->password);
            $user->update();
            $req->session()->put('user',$user);
            return redirect('/');
        }
    }
    
    function reg_user(Request $req){
        
        $errors=array();
        $password=$req->password;
        $cpassword=$req->cpassword;
        $find=User::where(['email'=>$req->email])->orWhere(['name'=>$req->fullname])->first();
        if($find){array_push($errors, 'User with the same email or name already exist');}
        if(strlen($req->password)<8){array_push($errors, 'Password too short');}
        if($password!=$cpassword){array_push($errors, 'The passwords do not match');}
        if(count($errors)==0){
            $user=new User;
            $extension=$req->file('passport')->getClientOriginalExtension();
            $filenametostore='user_'.time().'.'.$extension;   
            $path=$req->file('passport')->storeAs('public/profile_images', $filenametostore);
            $user->name=$req->fullname;
            $user->email=$req->email;
            $user->passport=$filenametostore;
            $user->password=hash::make($password);
            $user->is_admin=0;
            $user->save();
            $req->session()->put('user',$user);
            return response()->json([
              'success' => true,
              'token' => $success,
              'user' => $user
          ]);
        } else {
       //if authentication is unsuccessfull, notice how I return json parameters
          return response()->json([
            'success' => false,
            'message' => 'Invalid Email or Password',
        ], 401);
        }
        
    }
    function login_user(Request $req){
        $email=$req->email;
        $user=member::where(['email'=>$email])->first();
        if(!$user || !Hash::check($req->password,$user->password)){
            return response()->json([
              'success' => true,
              'token' => $success,
              'user' => $user
          ]);
        } else {
       //if authentication is unsuccessfull, notice how I return json parameters
          return response()->json([
            'success' => false,
            'message' => 'Invalid Email or Password',
        ], 401);
        }
        
    }
}
