@extends('layouts.base', ['title'=>'Dashboard'])
@section('dashboard')
    <div class="m-2" style='min-height:500px;'>
        <div class="row alert alert-success">
            <div class="col-4">Title</div>
            <div class='col-4'>Published on</div>
            <div class="col-4">Toggle Status</div>
        </div>
        @foreach($posts as $post)
            <div class="row alert alert-success">
                <div class="col-4"><a href="/view/{{$post->title}}" style="text-decoration:none; color:black;">{{$post->title}}</a></div>
                <div class="col-3">{{date_format($post->created_at, 'd-m-Y')}}</div>
                <div type='button' class='col-3'>
                    <a href='/togglepublish/{{$post->id}}' style="text-decoration:none;" class='text-danger'>
                    @if($post->posted == 1)
                    Unpublish 
                    @else 
                    Publish 
                    @endif</a>
                </div>
                <div type='button' class='col-2'>
                    <a href='/deletePost/{{$post->id}}' style="text-decoration:none;" class='text-info'><i class="fa fa-trash"></i></a>
                </div>
            </div>
        @endforeach
        <div class="d-flex justify-content-center">{{$posts->onEachSide(1)->links()}}</div>
    </div>
@endsection