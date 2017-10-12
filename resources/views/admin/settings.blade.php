@extends('layouts.admin.app-admin')

@section('pageTitle', 'Settings')

@section('content')
<div class="box box-default">
  <div class="box-body">
    <div class="row">
      <div class="col-md-6">
        <form method="POST" action="{{ url('admin/settings') }}" enctype="multipart/form-data" role="form">
          {{ csrf_field() }}
          <div class="form-group">
            <label>Nama Website</label>
            <input type="text" required class="form-control" value="{{ $setting->nama_web }}" name="nama" placeholder="Nama slider">
          </div>
          <div class="form-group">
            <label>Kontak Email</label>
            <input type="email" required class="form-control" value="{{ $setting->email }}" name="email" placeholder="Kontak Email">
          </div>
          <div class="form-group">
            <label>Title</label>
            <input type="text" required class="form-control" value="{{ $setting->title }}" name="title" placeholder="Title">
          </div>
           <div class="form-group">
            <label>Facebook</label> (contoh. <b>facebook.com/fanspage</b>)
            <input type="text" required class="form-control" value="{{ $setting->facebook }}" name="facebook" placeholder="Url Facebook">
          </div>
          <div class="form-group">
            <label for="exampleInputFile">Logo</label>
            <input name="logo" value="{{ $setting->logo }}" type="file">
            <p class="help-block">Usahakan Gambar berkualitas HD</p>
          </div>
      </div>
      <div class="col-md-6">
        <div class="form-group">
          <label>Web Color</label>
          <select class="form-control" name="webcolor" style="width: 100%;">
            <option value="red" {{ ($setting->color_web=='red')?'selected':'' }}>Red</option>
            <option value="blue" {{ ($setting->color_web=='blue')?'selected':'' }}>Blue</option>
            <option value="green" {{ ($setting->color_web=='green')?'selected':'' }}>Green</option>
            <option value="orange" {{ ($setting->color_web=='orange')?'selected':'' }}>Orange</option>
          </select>
        </div>
        <div class="form-group">
          <label>Admin Web Color</label>
          <select class="form-control" name="admincolor" style="width: 100%;">
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
          <select class="form-control" name="opcolor" style="width: 100%;">
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
      {{csrf_field()}}
      <button type="submit" class="btn btn-primary">Save Settings</button>
      <button type="reset" class="btn btn-warning">Reset Settings</button>
    </div>
  </form>
  </div>
</div>
@endsection
