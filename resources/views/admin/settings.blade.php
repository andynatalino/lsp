@extends('layouts.admin.app-admin')

@section('pageTitle', 'Settings')

@section('content')
<div class="box box-default">
  <div class="box-body">
    <div class="row">
      <div class="col-md-6">
        <form method="POST" action="{{ url('operator/slider') }}" enctype="multipart/form-data" role="form">
          {{ csrf_field() }}
          <div class="form-group">
            <label>Nama Website</label>
            <input type="text" required class="form-control" name="nama" placeholder="Nama slider">
          </div>
          <div class="form-group">
            <label>Kontak Email</label>
            <input type="text" required class="form-control" name="nama" placeholder="Nama slider">
          </div>
          <div class="form-group">
            <label>Title</label>
            <input type="text" required class="form-control" name="nama" placeholder="Nama slider">
          </div>
          <div class="form-group">
            <label for="exampleInputFile">Logo</label>
            <input name="gambar" type="file">
            <p class="help-block">Usahakan Gambar berkualitas HD</p>
          </div>
      </div>
      <div class="col-md-6">
        <div class="form-group">
          <label>Web Color</label>
          <select class="form-control" style="width: 100%;">
            <option selected="selected">Blue</option>
            <option>Alaska</option>
            <option>California</option>
            <option>Delaware</option>
            <option>Tennessee</option>
            <option>Texas</option>
            <option>Washington</option>
          </select>
        </div>
        <div class="form-group">
          <label>Admin Web Color</label>
          <select class="form-control" style="width: 100%;">
            <option selected="selected">Red</option>
            <option>Alaska</option>
            <option>California</option>
            <option>Delaware</option>
            <option>Tennessee</option>
            <option>Texas</option>
            <option>Washington</option>
          </select>
        </div>
        <div class="form-group">
          <label>Operator Web Color</label>
          <select class="form-control" style="width: 100%;">
            <option selected="selected">Blue</option>
            <option>Alaska</option>
            <option>California</option>
            <option>Delaware</option>
            <option>Tennessee</option>
            <option>Texas</option>
            <option>Washington</option>            
          </select>
        </div>
      </div>
    </div>
    <div class="box-footer">
      <button type="submit" class="btn btn-primary">Save Settings</button>
      <button type="submit" class="btn btn-warning">Reset Settings</button>
    </div>
  </form>
  </div>
</div>
@endsection
