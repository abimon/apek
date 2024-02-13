@extends('layouts.app',['title'=>$article->title,'desc'=>$article->except])
@section('content')
<div class="row">
    <div>
        <?php $image = asset('storage/static/img/cover.PNG'); ?>
        <div style="background:url('{{$image}}'); background-size:cover; min-height:100px;">
            <div class="d-block text-center ">
                <h2 class="text-light ">Speaking Hearts</h2>
            </div>
        </div>
    </div>
    <div class="col-sm-9 mt-2">
        <div class="bg-transparent shadow p-2" style="min-height:550px ;">

            <h3 class="text-center">{{$article->title}}</h3>
            <div class='p-2 lh-sm'>
                <?php echo html_entity_decode($article['body']); ?>
            </div>
            <div class="d-flex justify-content-between me-3">
                <div class="a2a_kit a2a_kit_size_32 a2a_default_style">
                    <a class="a2a_button_whatsapp"></a>
                    <a class="a2a_button_copy_link"></a>
                    <a class="a2a_button_facebook"></a>
                    <a class="a2a_button_twitter"></a>
                </div>
                <a href="/like/{{$article->id}}">
                    <i class="fa-regular fa-heart fa-fw fa-2x  text-warning"></i>{{$likes->count()}}
                </a>
            </div>
            <div>
                @foreach($comments as $comment)
                <div class="text-dark me-5">
                    @foreach($users as $user)
                    @if(($user->id)==($comment->user_id))
                    <hr>
                    <img src="{{asset('storage/profile_images/'.$user['passport'])}}" class="rounded-circle" width=20 height=20> {{$comment->comment}}
                    @endif
                    @endforeach
                </div>
                @endforeach
            </div>
            <div class="mt-1">
                <form action="/comment/{{$article->id}}" method="post">
                    @csrf
                    <div class="input-group">
                        <input type='text' class="form-control" name="comment">
                        <label><button class="btn btn-outline-success" type="submit"><i class="fa fa-comment"></i></button></label>
                    </div>

                </form>
            </div>
        </div>
    </div>
    <div class="col-sm-3 p-3">
        <h3 class='text-info text-center'>Other Posts</h3>
        <hr>
        @foreach($posts->where('id','!=', $article->id) as $post)
        <a href="/speakinghearts/{{$post->slug}}">
            <p>
                <i style="text-decoration:none; text-transform:uppercase;" class="text-secondary">{{$post->title}}</i>
            </p>
        </a>
        <hr>
        @endforeach
    </div>
</div>
@endsection