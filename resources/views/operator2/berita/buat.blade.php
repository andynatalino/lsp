@extends('layouts.app-operator2')

@section('pageTitle', 'Buat Berita')

@section('content')
<div class="row">
  <!-- left column -->
  <div class="col-md-12">
    <!-- general form elements -->
    <div class="box box-primary">
      <div class="box-header with-border"></div>
      <!-- /.box-header -->
      <!-- form start -->
      <form method="POST" action="{{ url('operator/berita') }}" enctype="multipart/form-data" role="form">
        {{ csrf_field() }}
        <div class="box-body">
          <div class="form-group">
            <label for="exampleInputEmail1">Judul Berita</label>
            <input type="text" required class="form-control" name="judul" placeholder="Nama Berita" id="exampleInputEmail1">
          </div>
          <div class="form-group">
            <label>Isi Berita</label>
            <textarea required placeholder="Isi Berita" id="content" name="isi" class="form-control"></textarea>
          </div>
          <div class="form-group">
            <label for="exampleInputFile">Image</label>
            <input name="image" type="file" id="exampleInputFile">
            <p class="help-block">Usahakan Gambar berkualitas HD</p>
          </div>
          <!-- /.box-body -->
        </div>
        <div class="box-footer">
          <button type="submit" class="btn btn-primary">Buat Berita</button>
        </div>
      </form>
    </div>
  </div>
</div>
<script src="{{ url('js/ckeditor/ckeditor.js') }}"></script>
<script type="text/javascript">
  CKEDITOR_BASEPATH = "{{ url('/js/ckeditor/') }}";
  CKEDITOR.replace('content', {toolbar : 'standard',width : '99%',height : '300px'});
</script>
@endsection
