@extends('layouts.app',['title'=>'View Post'])
@section('content')
    <div class="row d-flex justify-content-center">
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
                        <h3 class="text-center">{{$post->title}}</h3>
                        <a href="/editpost/{{$post->title}}" style="text-decoration:none;">
                            <button type="button" class="btn btn-outline-info">Edit</button>
                        </a>
                        <div class='p-2 lh-sm'>
                             <?php echo html_entity_decode($post['body']); ?>       
                        </div>
                @endforeach
            </div>
        </div>
    </div>
@endsection