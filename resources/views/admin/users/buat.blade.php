@extends('layouts.admin.app-admin')

@section('pageTitle', 'Users')

@section('content')

<div class="box box-default">
  <div class="box-body">
    <div class="row">
      <div class="col-md-6">
        <form method="POST" action="{{ url('admin/user') }}" enctype="multipart/form-data" role="form">
          {{ csrf_field() }}
          <div class="form-group">
            <label>No Identitas</label>
            <input type="number" required class="form-control"  name="number" value="{{ old('number') }}" placeholder="No Identitas">
          </div>
          <div class="form-group">
            <label>Username</label>
            <input type="text" required class="form-control" name="username" value="{{ old('username') }}" placeholder="Username">
          </div>
          <div class="form-group">
            <label>Nama Lengkap</label>
            <input type="text" required class="form-control"  name="name" value="{{ old('name') }}" placeholder="Nama Lengkap">
          </div>
          <div class="form-group">
            <label>Email</label>
            <input type="email" required class="form-control" name="email" value="{{ old('email') }}" placeholder="Email">
          </div>
          @if(session('gagal'))
          <div class="form-group has-error" id="divpass">
            <label class="control-label" for="password"><i id="iconpass" class="fa fa-times-circle-o"></i> Password</label>
            <input type="password" onclick="passwordError();" onchange="passwordError();" required class="form-control" name="password" placeholder="Password" id="password">
            <span id="spanpass" class="help-block">{{ session('gagal')}}</span>
          </div>
          @else
          <div class="form-group">
            <label>Password</label>
            <input type="password" required class="form-control" name="password" placeholder="Password">
          </div>
          @endif
          <div class="form-group">
            <label>Ulangi Password</label>
            <input type="password" required class="form-control" name="repassword" placeholder="Password">
          </div>
          <div class="form-group">
            <label>Instansi</label>
            <input type="text" required class="form-control" name="instansi" value="{{ old('instansi') }}" placeholder="Instansi">
          </div>
          <div class="form-group">
            <label>Jenis Kelamin</label>
            <select class="form-control" name="gender" value="{{ old('gender') }}" style="width: 100%;">
              <option value="Laki - Laki">Laki - Laki</option>
              <option value="Perempuan">Perempuan</option>
            </select>
          </div>
        </div>
        <div class="col-md-6">
          <div class="form-group">
            <label>Tempat Lahir</label>
            <input type="text" required class="form-control" name="place" value="{{ old('place') }}" placeholder="Tempat Lahir">
          </div>
          <div class="form-group">
            <label>Tanggal Lahir</label>
            <div class="input-group date">
              <div class="input-group-addon">
                <i class="fa fa-calendar"></i>
              </div>
              <input type="text" name="date" value="{{ old('date') }}" class="form-control pull-right" id="datepicker">
            </div>
          </div>
          <div class="form-group">
            <label>Agama</label>
            <input type="text" required class="form-control" name="religion" value="{{ old('religion') }}" placeholder="Agama">
          </div>
          <div class="form-group">
            <label>Kewarganegaraan</label>
            <select class="form-control" name="citizenship" value="{{ old('citizenship') }}" style="width: 100%;">
              <option value="WNI">WNI</option>
              <option value="WNA">WNA</option>
            </select>
          </div>
          <div class="form-group">
            <label>Telp</label>
            <input type="number" required class="form-control" name="telp" value="{{ old('telp') }}" placeholder="Telp">
          </div>
          <div class="form-group">
            <label>Alamat</label>
            <textarea class="form-control" name="address" rows="3" placeholder="Alamat">{{ old('address') }}</textarea>
          </div>
          <div class="form-group">
            <label>Status</label>
            <select class="form-control" name="role" value="{{ old('role') }}" style="width: 100%;">
              <option value="1">User</option>
              <option value="2">Admin</option>
              <option value="3">Operator</option>
            </select>
          </div>
          <div class="form-group">
            <label>Photo</label>
            <input name="logo" name="photo" type="file">
            <p class="help-block">File berformat PNG, JPG, JPEG, GIF, ICO</p>
          </div>
        </div>
      </div>
      <div class="box-footer">
        <button type="submit" class="btn btn-primary">Save Settings</button>
        <button type="reset" class="btn btn-warning">Reset Settings</button>
      </div>
    </form>
  </div>
</div>

@if(session('gagal'))
{{ session('gagal')}}

@endif

@if(count($errors) > 0 )

@foreach($errors->all() as $error)
{{ $error }}
@endforeach

@endif

@section('js')
<script type="text/javascript">
  $('#datepicker').datepicker({
    autoclose: true
  })
  function passwordError() {
    document.getElementById("divpass").classList.remove('has-error');
    var elem = document.getElementById('iconpass');
    elem.parentNode.removeChild(elem);
    var elem2 = document.getElementById('spanpass');
    elem2.parentNode.removeChild(elem2);
    return false;    
  }
</script>
@endsection
@endsection
