@extends('layouts.app-operator2')

@section('pageTitle', 'Buat Kategori')

@section('content')
<div class="row">
  <!-- left column -->
  <div class="col-md-12">
    <!-- general form elements -->
    <div class="box box-primary">
      <div class="box-header with-border"></div>
      <!-- /.box-header -->
      <!-- form start -->
      <form method="POST" action="{{ url('operator/kategori') }}" enctype="multipart/form-data" role="form">
        {{ csrf_field() }}
        <div class="box-body">
          <div class="form-group">
            <label for="exampleInputEmail1">Nama Kategori</label>
            <input type="text" required class="form-control" name="nama" placeholder="Nama Kategori" id="exampleInputEmail1">
          </div>
          <div class="form-group">
            <label>Isi</label>
            <textarea required placeholder="Isi Keterangan" name="isi" class="form-control"></textarea>
          </div>
          <div class="form-group">
            <label for="exampleInputFile">Image</label>
            <input name="image" type="file" id="exampleInputFile">
            <p class="help-block">Usahakan Gambar berkualitas HD</p>
          </div>
          <!-- /.box-body -->
        </div>
        <div class="box-footer">
          <button type="submit" class="btn btn-primary">Buat Kategori</button>
        </div>
      </form>
    </div>
  </div>
</div>
@endsection
