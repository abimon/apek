@extends('layouts.base', ['title'=>'Hymnal'])
@section('dashboard')
<div class="m-2" style='min-height:500px;'>
    <form action="/uploadhymnal" method="post" class="row" enctype="multipart/form-data" novalidate class="needs-validation">
        @csrf
        <div class="col-md-4 p-2">
            <div class="form-floating mb-2">
                <input type="text" name="title" placeholder=' ' class="form-control" required>
                <label for="">Swahili Title</label>
            </div>
            <div class="form-floating mb-2">
                <input type="text" name="title" placeholder=' ' class="form-control" required>
                <label for="">English Title</label>
            </div>
            <div class="form-floating mb-2">
                <input type="text" name="title" placeholder=' ' class="form-control" required>
                <label for="">Composer</label>
            </div>
            <div class="form-floating mb-2">
                <input type="text" name="title" placeholder=' ' class="form-control" required>
                <label for="">Key</label>
            </div>
            <h3>Stanza 1</h3>
            <div class="col-md-8 p-2">
                <textarea name="post1" id='stanza1' class="form-control mb-1" required cols=30 row=50></textarea>
                <div class="invalid-feedback">This field is required.</div>
            </div>
            <h3>Chorus</h3>
            <div class="col-md-8 p-2">
                <textarea name="chorus" id='chorus' class="form-control mb-1" required cols=30 row=50></textarea>
                <div class="invalid-feedback">This field is required.</div>
            </div>
            <h3>Stanza 2</h3>
            <div class="col-md-8 p-2">
                <textarea name="post2" id='stanza2' class="form-control mb-1" required cols=30 row=50></textarea>
                <div class="invalid-feedback">This field is required.</div>
            </div>
            <h3>Stanza 3</h3>
            <div class="col-md-8 p-2">
                <textarea name="post3" id='stanza3' class="form-control mb-1" required cols=30 row=50></textarea>
                <div class="invalid-feedback">This field is required.</div>
            </div>
            <h3>Stanza 4</h3>
            <div class="col-md-8 p-2">
                <textarea name="post4" id='stanza4' class="form-control mb-1" cols=30 row=50></textarea>
                <div class="invalid-feedback">This field is required.</div>
            </div>
            <h3>Stanza 5</h3>
            <div class="col-md-8 p-2">
                <textarea name="post5" id='stanza5' class="form-control mb-1" cols=30 row=50></textarea>
                <div class="invalid-feedback">This field is required.</div>
            </div>
            <h3>Stanza 6</h3>
            <div class="col-md-8 p-2">
                <textarea name="post6" id='stanza6' class="form-control mb-1" cols=30 row=50></textarea>
                <div class="invalid-feedback">This field is required.</div>
            </div>
            <div class="modal-footer">
                <button type="submit" class='btn btn-outline-success m-1'> Post</button>
            </div>
        </div>
    </form>
</div>
<script src="https://cdn.ckeditor.com/ckeditor5/36.0.0/super-build/ckeditor.js"></script>
<script>
    CKEDITOR.ClassicEditor
        .create(document.getElementById("stanza1"))
    CKEDITOR.ClassicEditor
        .create(document.getElementById("stanza2"))
    CKEDITOR.ClassicEditor
        .create(document.getElementById("stanza3"))
    CKEDITOR.ClassicEditor
        .create(document.getElementById("stanza4"))
    CKEDITOR.ClassicEditor
        .create(document.getElementById("stanza5"))
    CKEDITOR.ClassicEditor
        .create(document.getElementById("stanza6"))
    CKEDITOR.ClassicEditor
        .create(document.getElementById("chorus"))
</script>
@endsection