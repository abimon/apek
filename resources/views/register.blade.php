@extends('layouts.app',['title'=>'Register'])
@section('content')
<div class="container" style="min-height:600px;">
    <div class="row m-2 d-flex justify-content-center">
        
        <div class="col-md-6 card p-3">
            <hr>
            <h3 class="d-flex justify-content-center">Register</h3>
            @foreach($errors as $error)
                <div class="alert alert-warning">{{$error}}</div>
            @endforeach
            <hr>
            <form action="/reg_user" method="post" enctype="multipart/form-data" novalidate class="needs-validation mt-2">
                @csrf
                <div class='form-floating mb-2'>
                    <input type="text" id="f-name" class="form-control" placeholder="First name"name="fullname" required/>
                    <label for="f-name">Full Name</label>
                    <div class="invalid-feedback">This field is required.</div>
                </div>
                <div class='form-floating mb-2'>
                    <input type="email" id="email" class="form-control" placeholder=" "name="email" required/>
                    <label for="email">Email</label>
                    <div class="invalid-feedback">This field is required.</div>
                </div>
                <div class='form-floating mb-2'>
                    <input type="button" class="form-control" id="loadFileXml"  placeholder="Passport" onclick="document.getElementById('file').click();" />
                    <label for="passport">Passport-size Photo</label>
                    <input type="file" style="display:none;" id="file" name="passport" accept="image/*" required/>
                    <div class="invalid-feedback">This field is required.</div>
                </div>
                <div class='form-floating mb-2'>
                    <input type="password" id="email" class="form-control" placeholder=" "name="password" required/>
                    <label for="email">Password</label>
                    <div class="invalid-feedback">This field is required.</div>
                </div>
                <div class='form-floating mb-2'>
                    <input type="password" id="email" class="form-control" placeholder=" "name="cpassword" required/>
                    <label for="email">Confirm Password</label>
                    <div class="invalid-feedback">This field is required.</div>
                </div>
                <div class = "modal-footer">
                    <button type="reset" class='btn btn-outline-secondary' >Clear</button>
                    <button type="submit" class='btn btn-outline-success' >Register</button>
                </div>
            </form>
        </div>
    </div>
</div>
<script src="{{asset('storage/static/js/form.js')}}"></script>
@endsection