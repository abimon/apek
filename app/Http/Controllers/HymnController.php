<?php

namespace App\Http\Controllers;

use App\Models\dholuo;
use App\Models\Hymnal;
use App\Models\kalenjin;
use App\Models\kikuyu;
use App\Models\ogotera;
use Illuminate\Http\Request;

class HymnController extends Controller
{
    function createHymnal(){
        Hymnal::create([
            'e_title'=>request()->e_title,
            'composer'=>request()->composer,
            'key'=>request()->key,
            'stanza1'=>request()->post1,
            'stanza2'=>request()->post2,
            'stanza3'=>request()->post3,
            'stanza4'=>request()->post4,
            'stanza5'=>request()->post5,
            'stanza6'=>request()->post6,
            'chorus'=>request()-> chorus,
        ]);
    }
    function createNZK(){
        kikuyu::create([
            's_title'=>request()->s_title,
            'e_title'=>request()->e_title,
            'composer'=>request()->composer,
            'key'=>request()->key,
            'stanza1'=>request()->post1,
            'stanza2'=>request()->post2,
            'stanza3'=>request()->post3,
            'stanza4'=>request()->post4,
            'stanza5'=>request()->post5,
            'stanza6'=>request()->post6,
            'chorus'=>request()-> chorus,
        ]);
    }
    function createKisii(){
        ogotera::create([
            'k_title'=>request()->k_title,
            'e_title'=>request()->e_title,
            'composer'=>request()->composer,
            'key'=>request()->key,
            'stanza1'=>request()->post1,
            'stanza2'=>request()->post2,
            'stanza3'=>request()->post3,
            'stanza4'=>request()->post4,
            'stanza5'=>request()->post5,
            'stanza6'=>request()->post6,
            'chorus'=>request()-> chorus,
        ]);
    }
    function createDholuo(){
        dholuo::create([
            'd_title'=>request()->d_title,
            'e_title'=>request()->e_title,
            'composer'=>request()->composer,
            'key'=>request()->key,
            'stanza1'=>request()->post1,
            'stanza2'=>request()->post2,
            'stanza3'=>request()->post3,
            'stanza4'=>request()->post4,
            'stanza5'=>request()->post5,
            'stanza6'=>request()->post6,
            'chorus'=>request()-> chorus,
        ]);
    }
    function createKalenjin(){
        kalenjin::create([
            'j_title'=>request()->j_title,
            'e_title'=>request()->e_title,
            'composer'=>request()->composer,
            'key'=>request()->key,
            'stanza1'=>request()->post1,
            'stanza2'=>request()->post2,
            'stanza3'=>request()->post3,
            'stanza4'=>request()->post4,
            'stanza5'=>request()->post5,
            'stanza6'=>request()->post6,
            'chorus'=>request()-> chorus,
        ]);
    }
    function createKikuyu(){
        kikuyu::create([
            'y_title'=>request()->y_title,
            'e_title'=>request()->e_title,
            'composer'=>request()->composer,
            'key'=>request()->key,
            'stanza1'=>request()->post1,
            'stanza2'=>request()->post2,
            'stanza3'=>request()->post3,
            'stanza4'=>request()->post4,
            'stanza5'=>request()->post5,
            'stanza6'=>request()->post6,
            'chorus'=>request()-> chorus,
        ]);
    }
}
