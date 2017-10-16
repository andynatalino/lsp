@extends('layouts.admin.app-admin')

@section('pageTitle', 'Tentang')

@section('content')

<div class="row">
  <div class="col-md-12">
    <div class="box box-primary">
      <div class="box-header with-border"></div>
      <form method="POST" action="{{ url('admin/tentang') }}" enctype="multipart/form-data" role="form">
        {{ csrf_field() }}
        <div class="box-body">
          <div class="form-group">
            <textarea id="content" name="isi" class="form-control">{{ $tentang->tentang }}</textarea>
          </div>
        </div>
        <div class="box-footer">
          <button type="submit" class="btn btn-primary">Save Tentang</button>
        </div>
      </form>
    </div>
  </div>
</div>
@section('js')
<script src="{{ url('js/ckeditor/ckeditor.js') }}"></script>
<script type="text/javascript">
  CKEDITOR_BASEPATH = "{{ url('/js/ckeditor/') }}";
  CKEDITOR.replace('content', {toolbar : 'standard',width : '99%',height : '300px'});
</script>
@endsection
@endsection
