@extends('layouts.app-operator2')

@section('pageTitle', 'Edit Kategori')

@section('content')
<div class="row">
  <!-- left column -->
  <div class="col-md-12">
    <!-- general form elements -->
    <div class="box box-primary">
      <div class="box-header with-border"></div>
      <!-- /.box-header -->
      <!-- form start -->
      <form method="POST"action="{{ url('operator/kategori/'.$kategori->id) }}" enctype="multipart/form-data" role="form">
        {{ csrf_field() }}
        <div class="box-body">
          <div class="form-group">
            <label for="exampleInputEmail1">Nama Kategori</label>
            <input type="text" required class="form-control" name="nama" id="exampleInputEmail1" value="{{ $kategori->nama_sp }}">
          </div>
          <div class="form-group">
            <label>Isi</label>
            <textarea required placeholder="Isi Keterangan" name="isi" class="form-control">{{ $kategori->isi }}</textarea>
          </div>
          <div class="form-group">
            <label for="exampleInputFile">Image</label>
            <a href="{{ url('assets/kategori/'.$kategori->image) }}" target="_blank"><img style="width:50px; height:50px;" src="{{ url('assets/kategori/'.$kategori->image) }}"></a><br><br>
            <input name="image" type="file" id="exampleInputFile">
            <p class="help-block">Usahakan Gambar berkualitas HD</p>
          </div>
          <!-- /.box-body -->
        </div>
        <div class="box-footer">
          <button type="submit" class="btn btn-primary">Edit Kategori</button>
          <a href="{{ url('operator/kategori') }}"><button type="button" class="btn btn-warning">Cancel</button></a>
        </div>
      </form>
    </div>
  </div>
</div>
@endsection
