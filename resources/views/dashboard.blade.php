@extends('layouts.base', ['title'=>'Dashboard'])
@section('dashboard')
<style>
    /* The switch - the box around the slider */
    .switchee {
        position: relative;
        display: inline-block;
        width: 30px;
        height: 20px;
    }

    /* Hide default HTML checkbox */
    .switchee input {
        opacity: 0;
        width: 0;
        height: 0;
    }

    /* The slider */
    .slideree {
        position: absolute;
        cursor: pointer;
        top: 0;
        left: 0;
        right: 0;
        bottom: 0;
        background-color: #ccc;
        -webkit-transition: .4s;
        transition: .4s;
    }

    .slideree:before {
        position: absolute;
        content: "";
        height: 16px;
        width: 16px;
        left: 2px;
        bottom: 2px;
        background-color: white;
        -webkit-transition: .4s;
        transition: .4s;
    }

    .checkedee+.slideree {
        background-color: #2196F3;
    }

    .slideree:focus {
        box-shadow: 0 0 1px #2196F3;
    }

    .checkedee+.slideree:before {
        -webkit-transform: translateX(10px);
        -ms-transform: translateX(10px);
        transform: translateX(10px);
    }

    /* Rounded sliders */
    .slideree.roundee {
        border-radius: 34px;
    }

    .slideree.roundee:before {
        border-radius: 50%;
    }
</style>
<div class="m-2" style='min-height:500px;'>
    @if($posts->count() > 0)
    <div class="col-md-12">
        <!-- #posts Report ==================== -->
        <div class="bd bg-white">
            <div class="layers" id="members">
                <div class="layer w-100 p-20">
                    <h6 class="lh-1">Speaking Hearts</h6>
                </div>
                <div class="layer w-100">
                    <div class="bg-info c-white p-2">
                        <div class="peers ai-c jc-sb gap-40">
                            <div class="peer peer-greed">
                                <h5>{{date('F Y')}}</h5>
                                <p class="mB-0">Speaking Hearts Report</p>
                            </div>
                            <div class="peer">
                                <h3 class="text-right text-light">{{$posts->count()}}</h3>
                            </div>
                        </div>
                    </div>
                    <div class="table-responsive p-20">
                        <table class="table">
                            <thead>
                                <tr>
                                    <th class=" bdwT-0">#</th>
                                    <th class=" bdwT-0">Title</th>
                                    <th class=" bdwT-0">Author</th>
                                    <th class=" bdwT-0">Creation Date</th>
                                    <th class=" bdwT-0">Status</th>
                                    <th class=" bdwT-0">Comments</th>
                                    <th class=" bdwT-0">Likes</th>
                                </tr>
                            </thead>
                            <tbody>
                                @foreach($posts as $id=>$post)
                                <tr>
                                    <th class=" bdwT-0">{{$id+1}}</th>
                                    <td class="fw-600">{{$post->title}}</td>
                                    @foreach($users->where('id', $post->user_id) as $user)
                                    <td>{{$user->name}}
                                        @endforeach
                                    </td>
                                    <td>{{date_format(($post->created_at),'F jS, Y')}}</td>
                                    <td>
                                        <span class="text-success">
                                            <div class="">
                                                <a href="togglePost/{{$post->id}}">
                                                    <label class="switchee">
                                                        <i type="button" class="{{($post->posted)==1?'checkedee':''}}"></i>
                                                        <span class="slideree roundee"></span>
                                                    </label>
                                                </a>
                                            </div>
                                        </span>
                                    </td>
                                    <td>{{$comments->where('post_id',$post->id)->count()}}</td>
                                    <td>{{$likes->where('post_id',$post->id)->count()}}</td>
                                </tr>
                                @endforeach
                            </tbody>
                        </table>
                    </div>
                    <div class="d-flex justify-content-center">{{$posts->onEachSide(1)->links()}}</div>
                </div>
            </div>
        </div>
    </div>
    @endif
    @if($poems->count()>0)
    <div class="col-md-12">
        <!-- #posts Report ==================== -->
        <div class="bd bgc-white">
            <div class="layers" id="members">
                <div class="layer w-100 p-20">
                    <h6 class="lh-1">Poetry</h6>
                </div>
                <div class="layer w-100">
                    <div class="bgc-light-blue-500 c-white p-20">
                        <div class="peers ai-c jc-sb gap-40">
                            <div class="peer peer-greed">
                                <h5>{{date('F Y')}}</h5>
                                <p class="mB-0">Poetry Report</p>
                            </div>
                            <div class="peer">
                                <h3 class="text-right text-light">{{$poems->count()}}</h3>
                            </div>
                        </div>
                    </div>
                    <div class="table-responsive p-20">
                        <table class="table">
                            <thead>
                                <tr>
                                    <th class=" bdwT-0">#</th>
                                    <th class=" bdwT-0">Title</th>
                                    <th class=" bdwT-0">Poet</th>
                                    <th class=" bdwT-0">Creation Date</th>
                                    <th class=" bdwT-0">Status</th>
                                    <th class=" bdwT-0">Likes</th>
                                    <th class=" bdwT-0">Comments</th>
                                </tr>
                            </thead>
                            <tbody>
                                @foreach($poems as $key=>$poem)
                                <tr>
                                    <th class=" bdwT-0">{{$key+1}}</th>
                                    <td class="fw-600">{{$poem->title}}</td>
                                    @foreach($users->where('id', $poem->user_id) as $user)
                                    <td>{{$user->name}}
                                        @endforeach
                                    </td>
                                    <td>{{date_format(($poem->created_at),'F jS, Y')}}</td>
                                    <td>
                                        <span class="text-success">
                                            <div class="">
                                                @if(($poem->user_id)==(Auth()->user()->id))
                                                <a href="togglePost/{{$poem->id}}">
                                                    <label class="switchee">
                                                        <i type="button" class="{{($poem->posted)==1?'checkedee':''}}"></i>
                                                        <span class="slideree roundee"></span>
                                                    </label>
                                                </a>
                                                @endif
                                            </div>
                                        </span>
                                    </td>
                                    <td>{{$comments->where('post_id',$poem->id)->count()}}</td>
                                    <td>{{$likes->where('post_id',$poem->id)->count()}}</td>
                                </tr>
                                @endforeach
                            </tbody>
                        </table>
                    </div>
                    <div class="d-flex justify-content-center">{{$poems->onEachSide(1)->links()}}</div>
                </div>
            </div>
        </div>
    </div>
    @endif
    @if($music->count()>0)
    <div class="col-md-12">
        <!-- #posts Report ==================== -->
        <div class="bd bgc-white">
            <div class="layers" id="members">
                <div class="layer w-100 p-20">
                    <h6 class="lh-1">Music</h6>
                </div>
                <div class="layer w-100">
                    <div class="bgc-light-blue-500 c-white p-20">
                        <div class="peers ai-c jc-sb gap-40">
                            <div class="peer peer-greed">
                                <h5>{{date('F Y')}}</h5>
                                <p class="mB-0">Music Report</p>
                            </div>
                            <div class="peer">
                                <h3 class="text-right text-light">{{$poems->count()}}</h3>
                            </div>
                        </div>
                    </div>
                    <div class="table-responsive p-20">
                        <table class="table">
                            <thead>
                                <tr>
                                    <th class=" bdwT-0">#</th>
                                    <th class=" bdwT-0">Title</th>
                                    <th class=" bdwT-0">Singer</th>
                                    <th class=" bdwT-0">Creation Date</th>
                                    <th class=" bdwT-0">Status</th>
                                    <th class=" bdwT-0">Comments</th>
                                </tr>
                            </thead>
                            <tbody>
                                @foreach($music as $y=>$piece)
                                <tr>
                                    <th class=" bdwT-0">{{$y+1}}</th>
                                    <td class="fw-600">{{$piece->title}}</td>
                                    <td>{{$piece->composer}}</td>
                                    <td>{{date_format(($piece->created_at),'F jS, Y')}}</td>
                                    <td>
                                        <span class="text-success">
                                            <div class="">
                                                <a href="togglePost/{{$piece->id}}">
                                                    <label class="switchee">
                                                        <i type="button" class="{{($piece->posted)==1?'checkedee':''}}"></i>
                                                        <span class="slideree roundee"></span>
                                                    </label>
                                                </a>
                                            </div>
                                        </span>
                                    </td>
                                    <td>{{$mcomments->where('post_id',$piece->id)->count()}}</td>
                                </tr>
                                @endforeach
                            </tbody>
                        </table>
                    </div>
                    <div class="d-flex justify-content-center">{{$music->onEachSide(1)->links()}}</div>
                </div>
            </div>
        </div>
    </div>
    @endif
    <div class="row">
        <!-- .col -->
        <div class="col-md-12 col-lg-7 col-sm-12">
            <div class="card white-box p-0">
                <div class="card-body">
                    <h3 class="box-title mb-0">Recent Comments</h3>
                </div>
                <div class="comment-widgets">
                    <!-- Comment Row -->
                    @foreach($lcomm as $comment)
                    <div class="d-flex flex-row comment-row p-3 mt-0">
                        @foreach($users->where('id',$comment->user_id) as $user)
                        <div class="p-2"><img src="{{asset('storage/profile_images/'.$user->passport)}}" alt="user" width="50" class="rounded-circle"></div>
                        <div class="comment-text ps-2 ps-md-3 w-100">
                            <h5 class="font-medium">
                                {{$user->name}}
                            </h5>
                            @endforeach
                            <span class="mb-3 d-block">{{$comment->comment}} </span>
                            <div class="comment-footer d-md-flex align-items-center">
                                <span class="badge bg-primary rounded">
                                    @foreach($posts->where('id',$comment->post_id) as $post)
                                    {{$post->title}}
                                    @endforeach
                                    @foreach($poems->where('id',$comment->post_id) as $poem)
                                    {{$poem->title}}
                                    @endforeach
                                </span>
                                <div class="text-muted fs-2 ms-auto mt-2 mt-md-0">{{date_format($comment->created_at, 'F jS, Y')}}</div>
                            </div>
                        </div>
                    </div>
                    @endforeach
                </div>
            </div>
        </div>
        <div class="col-lg-5 col-md-12 col-sm-12">
            <div class="card white-box p-0">
                <div class="card-heading">
                    <h3 class="box-title mb-0">Users Listing</h3>
                </div>
                <div class="card-body">
                    <ul class="chatonline">
                        @foreach($users as $user)
                        <li>
                            <div class="row">
                                <div class="col-4">
                                <img src="{{asset('storage/profile_images/'.$user->passport)}}" alt="user-img" style="width: 100%;" class="img-circle">
                                </div>
                                
                                <div class="col-8">
                                    <p class="text-bold"><b>{{$user->name}}</b></p>
                                    <p>Serves currently as {{$user->role}}</p>
                                    @if(Auth()->user()->role=='Admin')
                                    <?php $roles= ['Admin', 'Editor','Guest'];?>
                                    <p>Make 
                                        <a href="/make/admin/{{$user->id}}"><span class="badge bg-info rounded">Admin</span></a>
                                        <a href="/make/editor/{{$user->id}}"><span class="badge bg-primary rounded">Editor</span></a>
                                        <a href="/make/user/{{$user->id}}"><span class="badge bg-success rounded">User</span></a>
                                        <a href="/deleteUser/{{$user->id}}"><span class="badge bg-danger rounded">Delete</span></a>
                                    </p>
                                    @endif
                                </div>
                            </div>
                        </li>
                        @endforeach
                    </ul>
                </div>
            </div>
        </div>
        <!-- /.col -->
    </div>
</div>
@endsection