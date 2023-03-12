@extends('layouts.app',['title'=>'Blog Post'])
@section('content')
    <div class="row">
        <div>
            <?php $image=asset('storage/static/img/cover.PNG');?>
            <div style="background:url({{$image}}); background-size:cover; min-height:100px;">
                <div class="d-block text-center ">
                    <h2 class="text-light ">Speaking Hearts</h2>
                </div>
            </div>
        </div>
        <div class="col-sm-9 mt-2">
            <div class="bg-transparent shadow p-2" style="min-height:550px ;">
                @foreach($posts as $post)
                    @if($post->posted==true)
                        <h3 class="text-center">{{$post->title}}</h3>
                        <hr>
                        <audio class="text-center" src="{{asset('storage/music/'.$post->filepath)}}" controls></audio>
                        <div class='p-2 lh-sm'>
                             <?php echo html_entity_decode($post['body']); ?>       
                        </div>
                        <div class="d-flex justify-content-between me-3">
                            <div class="a2a_kit a2a_kit_size_32 a2a_default_style">
                                <a class="a2a_button_whatsapp"></a>
                                <a class="a2a_button_copy_link"></a>
                                <a class="a2a_button_facebook"></a>
                                <a class="a2a_button_twitter"></a>
                            </div>
                        </div>
                        <div>
                            @foreach($mcomments as $comment)
                                @if(($comment->post_id)==($post->id))
                                    <div class="text-dark me-5">
                                    @foreach($users as $user)
                                        @if(($user->id)==($comment->user_id))
                                            <hr>
                                            <img src="{{asset('storage/profile_images/'.$user['passport'])}}" class="rounded-circle" width=20 height=20> {{$comment->comment}}
                                        @endif
                                    @endforeach
                                </div>
                                @endif
                            @endforeach
                        </div>
                        <div class="mt-1">    
                            <form action="/mcomment/{{$post->id}}" method="post">
                                @csrf
                                <div class="input-group">
                                    <input type='text' class="form-control" name="comment">
                                    <label><button class="btn btn-outline-success" type="submit"><i class="fa fa-comment"></i></button></label>
                                </div>
                            </form>
                        </div>
                    @endif
                @endforeach
            </div>
        </div>
    </div>
@endsection