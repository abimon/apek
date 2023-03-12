@extends('base')
@section('dashboard')
    <div class="m-2" style='min-height:500px;'>
        <form action="/savediary" method="post"class="row" enctype="multipart/form-data" novalidate class="needs-validation">
            @csrf
            <div class="col-md-8 p-2">
                <textarea name="post" id='ckeditor' class="form-control mb-1" required cols=30 row=50></textarea>
                <div class="invalid-feedback">This field is required.</div>
                <div class="modal-footer">
                    <button type="reset" class='btn btn-outline-secondary m-1'> Clear</button>
                    <button type="submit" class='btn btn-outline-success m-1'> Save</button>
                </div>
            </div>
        </form>
        <div>
            @foreach($entries as $entry)
            <p>
              <button class="btn btn-outline-info" type="button" data-bs-toggle="collapse" data-bs-target="#post{{$entry->id}}" aria-expanded="false" aria-controls="collapseExample">
                {{date_format(($entry->created_at),'d-m-Y H:i')}}
              </button>
            </p>
            <div class="collapse" id="post{{$entry->id}}">
              <div class="card card-body">
                <?php echo html_entity_decode($entry['emotions']); ?>
              </div>
            </div>
            @endforeach
        </div>
    </div>
    
    <script src="{{asset('storage/static/js/form.js')}}"></script>
@endsection