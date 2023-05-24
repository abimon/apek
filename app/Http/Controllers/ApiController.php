<?php

namespace App\Http\Controllers;

use App\Models\diary;
use App\Models\post;
use App\Models\User;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;

class ApiController extends Controller
{
    public function read($token){
        //AbimonOmbati@2022
        $posts= post::where('category','Blog')->first();
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
