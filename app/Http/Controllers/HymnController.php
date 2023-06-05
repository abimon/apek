<?php

namespace App\Http\Controllers;

use App\Models\Hymnal;
use Illuminate\Http\Request;

class HymnController extends Controller
{
    function createHymnal(){
        Hymnal::create([
            'e_title'=>request()->e_title,
            'composer'=>request()->composer,
            'key'=>request()->key,
            'stanza1'=>request()->stanza1,
            'stanza2'=>request()->stanza2,
            'stanza3'=>request()->stanza3,
            'stanza4'=>request()->stanza4,
            'stanza5'=>request()->stanza5,
            'stanza6'=>request()->stanza6,
            'chorus'=>request()-> chorus,
        ]);
    }
}
