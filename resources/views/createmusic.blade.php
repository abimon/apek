@extends('base')
@section('dashboard')
    <div class="m-2" style='min-height:500px;'>
        <form action="/createmusic" method="post" class="row" enctype="multipart/form-data" novalidate class="needs-validation">
            @csrf
            
            <div class="col-md-4 p-2">
                <div class="form-floating mb-2">
                    <input type="text" name="title" placeholder=' 'class="form-control" required>
                    <label for="">Title</label>
                    <div class="invalid-feedback">This field is required.</div>
                </div>
                <div class="form-floating mb-2">
                    <input type="text" name="composer" placeholder=' 'class="form-control" required>
                    <label for="">Composer</label>
                    <div class="invalid-feedback">This field is required.</div>
                </div>
                <div class="form-floating mb-2">
                    <input type="file" name="music" placeholder=' 'class="form-control" required>
                    <label for="">Music</label>
                    <div class="invalid-feedback">This field is required.</div>
                </div>
            </div>
            <div class="col-md-8 p-2"  style="min-height:400px;">
                <textarea name="body" id='ckeditor' class="form-control mb-1" required cols=30 row=50></textarea>
                <div class="invalid-feedback">This field is required.</div>
            </div>
            <hr>
            <div class='d-flex justify-content-between'>
                @if(Session::get('user')['is_admin']==true)
                    <div class="form-check m-1">
                        <input class="form-check-input" type="checkbox" value="1" name="published">
                        <label class="form-check-label text-info" for="">
                            Publish
                        </label>
                    </div>
                @endif
                    <div >
                        <button type="reset" class='btn btn-outline-secondary m-1'> Clear</button>
                        <button type="submit" class='btn btn-outline-success m-1'> Post</button>
                    </div>
            </div>
        </form>
    </div>
    
    <script src="{{asset('storage/static/js/form.js')}}"></script>
@endsection