<?php

namespace App\Http\Controllers;

use App\Models\diary;
use App\Models\User;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;

class ApiController extends Controller
{
    //
    public function register(){
        $extension = request()->file('avatar')->getClientOriginalExtension();
        $filename = (request()->fname).'.'. $extension;
        request()->file('avatar')->storeAs('public/profile_images', $filename);
        $data = request()->validate([
            'name' =>'required|string' ,
            'email' => 'required|email|unique:users, email|min:8',
            'password' => 'required|min|confirmed',
            'passport'=>'required|image|',
        ]);
        $user= User::create([
            'name' =>$data['name'] ,
            'email' => $data['email'],
            'password' => Hash::make($data['password']),
            'passport'=>$filename,
            'role'=>'Guest'
        ]);
        return response([
            'user'=>$user,
            'token'=>$user->createToken('secret')->plainTextToken
        ]);
    }
    public function store(){
        $attr = request()->validate([
            'emotions'=>'required|string'
        ]);
        $diary = diary::create([
            'emotions'=>$attr['emotions']
        ]);
        return response([
            'message'=>'Post created successifully',
            'posts'=>$diary
        ], 200);
    }
    public function update($id){
        $post = diary::find($id);
        if(!$post){
            return response([
                'message'=>'Post not found'
            ],403);
        }
        if(Auth()->user()->role!='Admin'){
            return response([
                'message'=>'Permission denied.'
            ],403);
        }
        $attr = request()->validate([
            'emotions'=>'required|string'
        ]);
        $diary = diary::where(['id'=>$id])->update([
            'emotions'=>$attr['emotions']
        ]);
        return response([
            'message'=>'Post created successifully',
            'posts'=>$diary
        ], 200);
    }
    public function destroy($id){
        $post = diary::find($id);
        if(!$post){
            return response([
                'message'=>'Post not found'
            ],403);
        }
        if(Auth()->user()->role!='Admin'){
            return response([
                'message'=>'Permission denied.'
            ],403);
        }
        diary::destroy($id);
        return response([
            'message'=>'Post deleted ssuccessiful'
        ],200);
    }
    public function read($token){
        //AbimonOmbati@2022
        $posts= diary::where('category','Blog')->first();
        if($token=='QWJpbW9uT21iYXRpQDIwMjI='){
            $data = [
                'posts'=>$posts
            ];
            return response()->json($data,200);
        }
        else{
            return response()->json(404);
        }
    }
}
