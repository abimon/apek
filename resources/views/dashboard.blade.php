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
    <div class="col-md-12">
        <!-- #posts Report ==================== -->
        <div class="bd bgc-white">
            <div class="layers" id="members">
                <div class="layer w-100 p-20">
                    <h6 class="lh-1">Speaking Hearts</h6>
                </div>
                <div class="layer w-100">
                    <div class="bgc-light-blue-500 c-white p-20">
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
                                    <th class=" bdwT-0">Likes</th>
                                    <th class=" bdwT-0">Comments</th>
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
                                                <a href="togglePost/{{$poem->id}}">
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
                                    <th class=" bdwT-0">Likes</th>
                                    <th class=" bdwT-0">Comments</th>
                                </tr>
                            </thead>
                            <tbody>
                                @foreach($music as $y=>$piece)
                                <tr>
                                    <th class=" bdwT-0">{{$y+1}}</th>
                                    <td class="fw-600">{{$piece->title}}</td>
                                    @foreach($users->where('id', $piece->user_id) as $user)
                                    <td>{{$user->name}}
                                        @endforeach
                                    </td>
                                    <td>{{date_format(($piece->created_at),'F jS, Y')}}</td>
                                    <td>
                                        <span class="text-success">
                                            <div class="">
                                                <a href="togglePost/{{$poem->id}}">
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
</div>
@endsection