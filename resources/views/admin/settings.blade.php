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
            <label>Logo</label>
            <input name="logo" type="file">
            <p class="help-block">File berformat PNG, JPG, JPEG, GIF, ICO</p>
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
              <option disabled selected="selected">--- Color ---</option>    
              <option value="skin-red" {{ ($setting->color_admin=='skin-red')?'selected':'' }}>Red</option>
              <option value="skin-blue" {{ ($setting->color_admin=='skin-blue')?'selected':'' }}>Blue</option>
              <option value="skin-yellow" {{ ($setting->color_admin=='skin-yellow')?'selected':'' }}
                >Yellow</option>
                <option value="skin-green" {{ ($setting->color_admin=='skin-green')?'selected':'' }}>Green</option>
                <option value="skin-purple" {{ ($setting->color_admin=='skin-purple')?'selected':'' }}>Purple</option>
                <option value="skin-black" {{ ($setting->color_admin=='skin-black')?'selected':'' }}>Black</option>
                <option disabled>--- Light ---</option>
                <option value="skin-red-light" {{ ($setting->color_admin=='skin-red-light')?'selected':'' }}>Red Light</option>
                <option value="skin-blue-light" {{ ($setting->color_admin=='skin-blue-light')?'selected':'' }}>Blue Light</option>             
                <option value="skin-yellow-light" {{ ($setting->color_admin=='skin-yellow-light')?'selected':'' }}>Yellow Light</option>
                <option value="skin-green-light" {{ ($setting->color_admin=='skin-green-light')?'selected':'' }}>Green Light</option>
                <option value="skin-purple-light" {{ ($setting->color_admin=='skin-purple-light')?'selected':'' }}>Purple Light</option>
                <option value="skin-black-light" {{ ($setting->color_admin=='skin-black-light')?'selected':'' }}>Black Light</option>
              </select>
            </div>
            <div class="form-group">
              <label>Operator Web Color</label>
              <select class="form-control" name="opcolor" style="width: 100%;">
               <option disabled selected="selected">--- Color ---</option>    
               <option value="skin-red" {{ ($setting->color_operator=='skin-red')?'selected':'' }}>Red</option>
               <option value="skin-blue" {{ ($setting->color_operator=='skin-blue')?'selected':'' }}>Blue</option>
               <option value="skin-yellow" {{ ($setting->color_operator=='skin-yellow')?'selected':'' }}
                >Yellow</option>
                <option value="skin-green" {{ ($setting->color_operator=='skin-green')?'selected':'' }}>Green</option>
                <option value="skin-purple" {{ ($setting->color_operator=='skin-purple')?'selected':'' }}>Purple</option>
                <option value="skin-black" {{ ($setting->color_operator=='skin-black')?'selected':'' }}>Black</option>
                <option disabled>--- Light ---</option>
                <option value="skin-red-light" {{ ($setting->color_operator=='skin-red-light')?'selected':'' }}>Red Light</option>
                <option value="skin-blue-light" {{ ($setting->color_operator=='skin-blue-light')?'selected':'' }}>Blue Light</option>             
                <option value="skin-yellow-light" {{ ($setting->color_operator=='skin-yellow-light')?'selected':'' }}>Yellow Light</option>
                <option value="skin-green-light" {{ ($setting->color_operator=='skin-green-light')?'selected':'' }}>Green Light</option>
                <option value="skin-purple-light" {{ ($setting->color_operator=='skin-purple-light')?'selected':'' }}>Purple Light</option>
                <option value="skin-black-light" {{ ($setting->color_operator=='skin-black-light')?'selected':'' }}>Black Light</option>
              </select>
            </div>
            <div class="form-group">
              <label>Icon</label>
              <input name="favicon" type="file">
              <p class="help-block">File berformat PNG, JPG, JPEG, GIF, ICO</p>
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
