<?php

namespace App\Http\Controllers;

use App\Models\ogotera;
use App\Models\post;

class ApiController extends Controller
{
    public function read($token){
        //AbimonOmbati@2022
        $post= post::where('category','Blog')->where('posted',1)->get();
        if($token=='QWJpbW9uT21iYXRpQDIwMjI='){
            $data = [
                'posts'=>$post
            ];
            return $post;
        }
        else{
            return response()->json(404);
        }
    }
    function kisii($token){
        $posts=ogotera::all();
        if($token=='QWJpbW9uT21iYXRpQDIwMjI='){
            return $posts;
        }
        else{
            return response()->json(404);
        }
    }
}
