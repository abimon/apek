<?php

namespace App\Http\Controllers;

use App\Models\comment;
use App\Models\diary;
use App\Models\like;
use App\Models\mcomment;
use App\Models\music;
use App\Models\post;
use App\Models\User;
use Illuminate\Http\Request;

class viewsController extends Controller
{
    function blog()
    {
        $posts = post::where(['posted' => 1])->orderBy('id', 'desc')->get();
        $likes = like::all();
        $comments = comment::all();
        $mcomments = mcomment::all();
        $music = music::all();
        $users = User::select('id', 'name', 'passport')->get();
        $data = [
            'posts' => $posts,
            "users" => $users,
            'likes' => $likes,
            'comments' => $comments,
            'mcomments' => $mcomments,
            'music' => $music
        ];
        return view('blog', $data);
    }
    function song($title)
    {
        $post = music::where(['title' => $title])->get();
        $users = User::all();
        $comments = mcomment::all();
        $data = [
            'posts' => $post,
            'mcomments' => $comments,
            'users' => $users
        ];
        return view('music', $data);
    }
    function dashboard()
    {
        $posts = post::paginate(10);
        $users = User::select('name', 'email', 'id', 'profile')->get();
        $data = [
            'posts' => $posts,
            'users'=>$users
        ];
        return view('dashboard', $data);
    }
    function post($title)
    {
        $post = post::where(['title' => $title])->first();
        $posts = post::where(['posted' => 1])->select('title')->orderBy('id', 'desc')->get();
        $comments = comment::where(['post_id'=>$post->id])->get();
        $users = User::all();
        $likes = like::where(['post_id'=>$post->id])->get();
        $data = [
            'posts' => $posts, 
            'article' => $post,
            'comments' => $comments, 
            'users' => $users, 
            'likes' => $likes
        ];
        //return $data;
        return view('post', $data);
    }
    function viewPost($title)
    {
        $post = post::where(['title' => $title])->first();
        return view('view', ['post' => $post]);
    }
    function diary()
    {
        $entries = diary::all();
        return view('diary', ['entries' => $entries]);
    }
}
