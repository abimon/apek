@extends('layouts.app')
@section('content')
<link href="{{asset('storage/css/style.css')}}" rel="stylesheet">
<link href="{{asset('storage/css/style.min.css')}}" rel="stylesheet">
<div class="bg-transparent" style="height:80px;"></div>
<header class="navbar navbar-dark bg-dark flex-md-nowrap p-0 shadow">
  <a class="navbar-brand col-md-3 col-lg-2 me-0 px-3" href="#">{{Auth()->user()->name}}</a>
  <div class="navbar-nav">
    <div class="nav-item text-nowrap">
      <a class="nav-link px-3 text-danger" href="/logout">Sign out</a>
    </div>
  </div>
</header>
<div class="" id='dashboard'>

<div class="row">
    <!-- #Left Sidebar ==================== -->
    <div class="col-md-2" id="">
        <ul class="nav flex-row bg-light rounded">
            <li class="nav-item">
                <a class="nav-link" href="/">
                    <span class="icon-holder">
                        <i class="c-green-500 bi bi-house mR-10"></i>
                    </span>
                    <span class="title">Home</span>
                </a>
            </li>
            <li class="nav-item">
                <a class="nav-link" href="/dashboard">
                    <span class="icon-holder">
                        <i class="c-deep-purple-500 bi bi-speedometer mR-10"></i>
                    </span>
                    <span class="title">Dashboard</span>
                </a>
            </li>
            <li class="nav-item">
                <a class="nav-link" href="/create">
                    <span class="icon-holder">
                        <i class="c-deep-orange-500 bi bi-card-list mR-10"></i>
                    </span>
                    <span class="title">Speaking Hearts</span>
                </a>
            </li>
            <li class="nav-item">
                <a class="nav-link" href="/create">
                    <span class="icon-holder">
                        <i class="c-black bi bi-card-list mR-10"></i>
                    </span>
                    <span class="title">Write Poem</span>
                </a>
            </li>
            @if(Auth()->user()->role=='Admin')
            <li class="nav-item">
                <a class="nav-link" href="/diary">
                    <span class="icon-holder">
                        <i class="c-black bi bi-journal mR-10"></i>
                    </span>
                    <span class="title">My Diary</span>
                </a>
            </li>
            @endif
            <li class="nav-item">
                <a class="nav-link" href="/music">
                    <span class="icon-holder">
                        <i class="c-black bi bi-music-note-list mR-10"></i>
                    </span>
                    <span class="title">My Music</span>
                </a>
            </li>
            <li class="nav-item">
                <a class="nav-link" href="" data-bs-toggle="modal" data-bs-target="#profile">
                    <span class="icon-holder">
                        <i class="c-deep-blue-500 bi bi-person-badge mR-10"></i>
                    </span>
                    <span class="title">My Profile</span>
                </a>
            </li>
            <li class="nav-item ">
                <a class="nav-link text-danger" href="/logout">
                    <span class="icon-holder ">
                        <i class="bi bi-power mR-10"></i>
                    </span>
                    <span>Logout</span>
                </a>
            </li>
            <hr>
        </ul>
    </div>

    <!-- #Main ============================ -->
    <div class="col-md-10">
        <!-- ### $Topbar ### -->
        <div>
            @yield('dashboard')
        </div>
    </div>
</div>
</div>
@endsection