<?php

namespace App\Http\Controllers;

use App\Models\kalenjin;
use App\Models\ogotera;
use App\Models\post;

class ApiController extends Controller
{
    public function read($token){
        //AbimonOmbati@2022
        $post= post::where('category','Blog')->where('posted',1)->get();
        
        if($token=='QWJpbW9uT21iYXRpQDIwMjI='){
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
    function split(){
        $input=request()->string;
        $sents=explode('<br>',$input);
        foreach($sents as $sent){
            $out=explode('\n',$sent);
                kalenjin::create([
                    'j_title'=>$out[0],
                    'e_title'=>$out[1],
                    'composer'=>$out[2],
                    'doh'=>$out[3],
                    'stanza1'=>$out[4],
                    'stanza2'=>$out[5],
                    'stanza3'=>$out[6],
                    'stanza4'=>$out[7],
                    'stanza5'=>$out[8],
                    'stanza6'=>$out[9],
                    'chorus'=>$out[10],
                ]);
            
        }
        
    }
 
}
