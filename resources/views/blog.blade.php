@extends('layouts.app',['title'=>'Blog'])
@section('content')
    <div class="row" id='blog'>
        <div>
            <?php $image=asset('storage/static/img/cover.PNG');?>
            <div style="background:url('{{$image}}'); background-size:cover; min-height:100px;">
                <div class="d-block text-center ">
                    <h2 class="text-light ">Speaking Hearts</h2>
                </div>
            </div>
        </div>
        <div class="col-sm-7 p-2">
            <div class="bg-transparent shadow p-2 mt-2" style="min-height:550px ;">
                @foreach($posts as $post)
                <div class="row">
                    <div class="col-md-12 mt-1 p-4">
                        <a href="/speakinghearts/{{$post->slug}}">
                            <div class="text-uppercase" style="font-size:105%">
                                <strong>{{$post->title}}</strong>
                            </div>
                            <div class="text-dark text-end me-5">
                                @foreach($users as $user)
                                    @if(($user->id)==($post->user_id))
                                        <img src="{{asset('storage/profile_images/'.$user['passport'])}}" class="rounded-circle" width=20 height=20> {{$user->name}}
                                    @endif
                                @endforeach
                            </div>
                            <div style="text-decoration:none;" class="text-secondary">{{$post->except}}</div>
                            <div class='d-flex justify-content-between text-success me-5'>
                                <div>
                                    <i class="fa-regular fa-comment fa-fw text-info"></i>{{$comments->where('post_id',$post->id)->count()}}
                                    <i class="fa-regular fa-heart fa-fw text-warning"></i>{{$likes->where('post_id',$post->id)->count()}}
                                </div>
                                <div>
                                   <i class="fa-regular fa-clock fa-fw"></i> 
                                    {{date_format($post->created_at, 'F j, Y')}} 
                                </div>
                            </div>
                        </a>
                    </div>
                </div>
                <hr>
                @endforeach
            </div>
        </div>
        <div class="col-sm-5 p-2">
            <h3 class='text-info text-center mt-2' id='songs4thesoul'>Songs for the Soul</h3>
            <hr>
            <div class="bg-transparent shadow p-2 mt-2" style="min-height:550px ;">
                @foreach($music as $post)
                <div class="row">
                    <div class="col-3 d-flex justify-content-center">
                        <i class="fa-solid fa-music fa-2x"></i>
                    </div>
                    <div class="col-9">
                        <a href="/song/{{$post->title}}">
                            <div class="text-uppercase" style="font-size:105%">
                                <strong>{{$post->title}}</strong>
                            </div>
                            <div class="text-dark text-start me-5">
                                By: {{$post->composer}}
                            </div>
                            <div class='d-flex justify-content-between text-success me-5'>
                                <div>
                                    <i class="fa-regular fa-comment fa-fw text-info"></i>
                                    {{$mcomments->where('post_id',$post->id)->count()}}
                                </div>
                                <div>
                                   <i class="fa-regular fa-clock fa-fw"></i> 
                                    {{date_format($post->created_at, 'F j, Y')}} 
                                </div>
                            </div>
                        </a>
                    </div>
                </div>
                <hr>
                @endforeach
            </div>
        </div>
    </div>
@endsection