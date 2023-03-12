@extends('layouts.base' ['title'=>'Create Post'])
@section('dashboard')
    <div class="m-2" style='min-height:500px;'>
        <form action="/post" method="post"class="row" enctype="multipart/form-data" novalidate class="needs-validation">
            @csrf
            <div class="col-md-8 p-2"  style="min-height:400px;">
            <textarea name="post" id='ckeditor' class="form-control mb-1" required cols=30 row=50></textarea>
            <div class="invalid-feedback">This field is required.</div>
            </div>
            <div class="col-md-4 p-2">
                <div class="form-floating mb-2">
                    <input type="text" name="title" placeholder=' 'class="form-control" required>
                    <label for="">Title</label>
                    <div class="invalid-feedback">This field is required.</div>
                </div>
                <div class="form-select mb-2">
                    <select name="category" id="">
                        <option value="" selected disabled>Select Category</option>
                        <option value="poem">Poem</option>
                        <option value="blog">Blog</option>
                    </select>
                    <div class="invalid-feedback">This field is required.</div>
                </div>
                <div class="form-floating mb-2">
                    <textarea type="text" name="excerpt" placeholder=' 'class="form-control" cols=30 row=10 required></textarea>
                    <label for="">Excerpt</label>
                    <div class="invalid-feedback">This field is required.</div>
                </div>
                @if(Auth()->user()->role=='Admin')
                <div class="form-check mb-2">
                    <input class="form-check-input" type="checkbox" value="1" name="published">
                    <label class="form-check-label" for="">
                        Publish
                    </label>
                </div>
                @endif
                <div class="modal-footer">
                    <button type="reset" class='btn btn-outline-secondary m-1'> Clear</button>
                    <button type="submit" class='btn btn-outline-success m-1'> Post</button>
                </div>
            </div>
        </form>
    </div>
    
    <script src="{{asset('storage/static/js/form.js')}}"></script>
@endsection