@extends('layouts.base', ['title'=>'Dashboard'])
@section('dashboard')
<style>
    /* The switch - the box around the slider */
    .switch {
        position: relative;
        display: inline-block;
        width: 30px;
        height: 20px;
    }

    /* Hide default HTML checkbox */
    .switch input {
        opacity: 0;
        width: 0;
        height: 0;
    }

    /* The slider */
    .slider {
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

    .slider:before {
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

    .checked+.slider {
        background-color: #2196F3;
    }

    .slider:focus {
        box-shadow: 0 0 1px #2196F3;
    }

    .checked+.slider:before {
        -webkit-transform: translateX(10px);
        -ms-transform: translateX(10px);
        transform: translateX(10px);
    }

    /* Rounded sliders */
    .slider.round {
        border-radius: 34px;
    }

    .slider.round:before {
        border-radius: 50%;
    }
</style>
<div class="m-2" style='min-height:500px;'>
    @if($posts->count() > 0)
    <div class="col-md-12">
        <!-- #posts Report ==================== -->
        <div class="bd bgc-white">
            <div class="layers" id="members">
                <div class="layer w-100 p-20">
                    <h6 class="lh-1">Speaking Hearts</h6>
                </div>
                <div class="layer w-100">
                    <div class="bg-info c-white p-20">
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
                                                    <label class="switch">
                                                        <i type="button" class="{{($post->posted)==1?'checked':''}}"></i>
                                                        <span class="slider round"></span>
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
                                                <a href="togglePost/{{$poem->id}}">
                                                    <label class="switch">
                                                        <i type="button" class="{{($poem->posted)==1?'checked':''}}"></i>
                                                        <span class="slider round"></span>
                                                    </label>
                                                </a>
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
                                                    <label class="switch">
                                                        <i type="button" class="{{($piece->posted)==1?'checked':''}}"></i>
                                                        <span class="slider round"></span>
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
                <div class="d-flex flex-row comment-row p-3 mt-0">
                    <div class="p-2"><img src="plugins/images/users/varun.jpg" alt="user" width="50" class="rounded-circle"></div>
                    <div class="comment-text ps-2 ps-md-3 w-100">
                        <h5 class="font-medium">James Anderson</h5>
                        <span class="mb-3 d-block">Lorem Ipsum is simply dummy text of the printing and type setting industry.It has survived not only five centuries. </span>
                        <div class="comment-footer d-md-flex align-items-center">
                            <span class="badge bg-primary rounded">Pending</span>

                            <div class="text-muted fs-2 ms-auto mt-2 mt-md-0">April 14, 2021</div>
                        </div>
                    </div>
                </div>
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
                        <div class="call-chat">
                            <a href="tel:{{$user->contact}}">
                                <button class="btn btn-success text-white btn-circle btn" type="button">
                                    <i class="fas fa-phone"></i>
                                </button>
                            </a>
                            <a href="https://wa.me/{{$user->contact}}">
                                <button class="btn btn-info btn-circle btn" type="button">
                                    <i class="bi bi-whatsapp text-white"></i>
                                </button>
                            </a>
                            @if(Auth()->user()->role=='Admin')
                            <button class="btn btn-warning btn-circle btn" type="button" data-bs-toggle="modal" data-bs-target="#modal{{$user->id}}">
                                <i class="bi bi-three-dots text-info"></i>
                            </button>
                            @endif
                        </div>
                        <div class="d-flex justify-content-start">
                            <img src="{{asset('storage/profile_images/'.$user->passport)}}" alt="user-img" class="img-circle">
                            
                        </div>
                        <!-- Modal -->
                        <div class="modal fade" id="modal{{$user->id}}" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
                            <div class="modal-dialog modal-dialog-centered">
                                <div class="modal-content">
                                    <div class="modal-header">
                                        <h1 class="modal-title fs-5" id="exampleModalLabel"><b>{{$user->username}}</b></h1>
                                        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                                    </div>
                                    <div class="modal-body">
                                        <div class="row">
                                            <div class="col-4">
                                                <img src="{{asset('storage/profile_images/'.$user->profile)}}" style="width:100%;">
                                            </div>
                                            <div class="col-8">
                                                <p></p>
                                                <p>Serves currently as {{$user->role}}</p>
                                                <p>Make
                                                    <a href="make/admin/{{$user->id}}"><span class="badge bg-info rounded">Admin</span></a>
                                                    <a href="make/editor/{{$user->id}}"><span class="badge bg-primary rounded">Editor</span></a>
                                                    <a href="make/user/{{$user->id}}"><span class="badge bg-success rounded">User</span></a>
                                                </p>
                                            </div>
                                        </div>
                                    </div>
                                </div>
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