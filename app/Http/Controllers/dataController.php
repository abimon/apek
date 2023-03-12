<?php

namespace App\Http\Controllers;

use App\Models\post;
use App\Models\music;
use App\Models\diary;
use App\Models\User;
use App\Models\like;
use App\Models\comment;
use App\Models\mcomment;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Session;

class dataController extends Controller
{
    function createPost(Request $req)
    {
        if ($req->published == 1) {
            $pub = 1;
        } else {
            $pub = 0;
        }
        post::create([
            'user_id' => Auth()->user()->id,
            'title' => $req->title,
            'except' => $req->excerpt,
            'body' => $req->post,
            'category' => $req->category,
            'posted' => $pub,
        ]);
        return redirect('/dashboard');
    }
    function createmusic(Request $req)
    {
        if ($req->published == 1) {
            $pub = 1;
        } else {
            $pub = 0;
        }
        $extension = $req->file('music')->getClientOriginalExtension();
        $filepath = ($req->title) . time() . '.' . $extension;
        $path = $req->file('music')->storeAs('public/music', $filepath);
        music::create([
            'title' => $req->title,
            'filepath' => $filepath,
            'body' => $req->body,
            'composer' => $req->composer,
            'posted' => $pub,
        ]);

        return redirect('/blog/#songs4thesoul');
    }
    
    function post($title)
    {
        $post = post::where(['title' => $title])->get();
        $posts = post::where(['posted' => 1])->select('title')->orderBy('id', 'desc')->get();
        $comments = comment::all();
        $users = User::all();
        $likes = like::all();
        return view('post', [
            'posts' => $posts, 'post' => $post,
            'comments' => $comments, 'users' => $users, 'likes' => $likes
        ]);
    }
    
    function editpost($title)
    {
        $post = post::where(['title' => $title])->get();
        return view('editpost', ['post' => $post]);
    }
    function postedit($id)
    {
        if (request()->published == 1) {
            $pub = 1;
        } else {
            $pub = 0;
        }
        $post = post::where(['id' => $id])->first();
        $post->user_id = Auth()->user()->id;
        if (!empty(request()->title)) {
            $post->title = request()->title;
        }
        if (!empty(request()->excerpt)) {
            $post->except = request()->excerpt;
        }
        if (!empty(request()->post)) {
            $post->body = request()->post;
        }
        if (!empty(request()->category)) {
            $post->category = request()->category;
        }
        $post->posted = $pub;
        $post->update();
        return redirect('/dashboard');
    }
    
    
    function unpublish($id)
    {
        $post = post::find($id);
        if($post->posted==1){
            $post->posted = 0;
            $post->update(); 
        }
        else{
            $post->posted = 1;
            $post->update();
        }
        return redirect()->back();
    }
    function like($id)
    {
        if (session()->has('user')) {
            $user = Auth()->user()->id;
            $user1 = Auth()->user()->id; 
        } else {
            $user = 1;
            $user1 = 0;
        }
        $exist = like::where(['user_id' => $user1])->first();
        if (!$exist) {
            like::create([
                'post_id' => $id,
                'user_id' => $user,
            ]);
            return redirect()->back();
        } else {
            $exist = like::where(['user_id' => $user])->delete();
            return redirect()->back();
        }
    }
    function comment($id, Request $req)
    {
        if (session()->has('user')) {
            $user = Auth()->user()->id;
        } else {
            $user = 1;
        }
        comment::create([
            'post_id' => $id,
            'user_id' => $user,
            'comment' => $req->comment,
        ]);
        return redirect()->back();
    }
    function mcomment($id, Request $req)
    {
        if (session()->has('user')) {
            $user = Auth()->user()->id;
        } else {
            $user = 1;
        }
        mcomment::create([
            'post_id' => $id,
            'user_id' => $user,
            'comment' => $req->comment,
        ]);
        return redirect()->back();
    }
    function deleteComment($id)
    {
        comment::destroy($id);
        return redirect()->back();
    }
    function deletePost($id)
    {
        post::destroy($id);
        like::where(['post_id'=>$id])->delete();
        return redirect()->back();
    }
    function savediary(Request $req)
    {
        $entry = new diary;
        $entry->emotions = $req->post;
        $entry->save();
        return redirect()->back();
    }
    function sendsms()
    {
        $userid = 'APEKINC';
        $password = 'bulky78@Qaa';
        $mobile = '254701583807';
        $senderid = 'SENDER';

        $curl = curl_init();
        curl_setopt_array($curl, array(
            CURLOPT_URL => "https://smsportal.hostpinnacle.co.ke/SMSApi/send",
            CURLOPT_RETURNTRANSFER => true,
            CURLOPT_ENCODING => "",
            CURLOPT_MAXREDIRS => 10,
            CURLOPT_TIMEOUT => 30,
            CURLOPT_HTTP_VERSION => CURL_HTTP_VERSION_1_1,
            CURLOPT_POSTFIELDS =>
            "userid=$userid&
          password=$password&
          mobile=$mobile&
          msg=Hello+World%21+This+is+a+test+message%21&
          senderid=$senderid&
          msgType=text&
          duplicatecheck=true&
          output=json&
          sendMethod=quick",
            CURLOPT_CUSTOMREQUEST => "POST",
            CURLOPT_HTTPHEADER => array(
                "apikey: Net2W0r5tz",
                "cache-control: no-cache",
                "content-type: application/x-www-form-urlencoded"
            ),
        ));
        $response = curl_exec($curl);
        $err = curl_error($curl);

        curl_close($curl);

        if ($err) {
            echo "cURL Error #:" . $err;
        } else {
            echo $response;
        }
    }
}
