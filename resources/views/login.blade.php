@extends('layouts.app',['title'=>'Login'])
@section('content')
<div class="container" style="min-height:600px;">
    <div class="row m-2 d-flex justify-content-center">
        
        <div class="col-md-6 card p-3 shadow">
            <hr>
            <h3 class="d-flex justify-content-center">Login</h3>
            @foreach($errors as $error)
                <h6 class="alert alert-danger">{{$error}}</h6>
            @endforeach
            <hr>
            <form action="/log_user" method="post" novalidate class="needs-validation mt-2">
                @csrf
                <div class='form-floating mb-2'>
                    <input type="email" id="email" class="form-control" placeholder=" "name="email" required/>
                    <label for="email">Email</label>
                    <div class="invalid-feedback">This field is required.</div>
                </div>
                <div class='form-floating input-group mb-2'>
                    <input type="password" id="pword" class="form-control" placeholder=" "name="password"/>
                    <label for="pword">Password</label>
                    <span class="input-group-text" type="button" onclick="showpass()">
                        <i class="fa-regular fa-eye" id="eye"></i>
                    </span>
                </div>
                <button type="submit" class='btn btn-outline-success container' > Login</button>
                <hr>
                <div class="d-flex justify-content-center m-2">
                    <p>New here? <a href="/register" style="text-decoration:none;" >Signup</a><br>
                    Forgot password? <a href="/passwordreset" style="text-decoration:none;" >Reset</a></p>
                </div>
                
            </form>
        </div>
    </div>
</div>
<script src="{{asset('storage/js/form.js')}}"></script>
<script>
    function showpass(){
        var butt=document.getElementById('pword');
        if(butt.type==="password"){
            butt.type='text';
        }
        else{
            butt.type='password';
        }
    }
</script>
@endsection