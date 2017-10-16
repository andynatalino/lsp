@extends('layouts.admin.app-admin')

@section('pageTitle', 'Users')

@section('content')

<div class="box box-default">
  <div class="box-body">
    <div class="row">
      <div class="col-md-6">
        <form method="POST" action="{{ url('admin/User') }}" enctype="multipart/form-data" role="form">
          {{ csrf_field() }}
          <div class="form-group">
            <label>No Identitas</label>
            <input type="number" required class="form-control"  name="number" placeholder="No Identitas">
          </div>
          <div class="form-group">
            <label>Username</label>
            <input type="text" required class="form-control"  name="username" placeholder="Username">
          </div>
          <div class="form-group">
            <label>Nama Lengkap</label>
            <input type="text" required class="form-control"  name="name" placeholder="Nama Lengkap">
          </div>
          <div class="form-group">
            <label>Email</label>
            <input type="email" required class="form-control" name="email" placeholder="Email">
          </div>
          <div class="form-group">
            <label>Password</label>
            <input type="password" required class="form-control" name="password" placeholder="Password">
          </div>
          <div class="form-group">
            <label>Ulangi Password</label>
            <input type="password" required class="form-control" name="repassword" placeholder="Password">
          </div>
          <div class="form-group">
            <label>Instansi</label>
            <input type="text" required class="form-control"  name="instansi" placeholder="Instansi">
          </div>
          <div class="form-group">
            <label>Jenis Kelamin</label>
            <select class="form-control" name="gender" style="width: 100%;">
              <option>Laki - Laki</option>
              <option>Perempuan</option>
            </select>
          </div>
        </div>
        <div class="col-md-6">
          <div class="form-group">
            <label>Tempat Lahir</label>
            <input type="text" required class="form-control"  name="place" placeholder="Tempat Lahir">
          </div>
          <div class="form-group">
            <label>Tanggal Lahir</label>
            <div class="input-group date">
              <div class="input-group-addon">
                <i class="fa fa-calendar"></i>
              </div>
              <input type="text" name="date" class="form-control pull-right" id="datepicker">
            </div>
          </div>
          <div class="form-group">
            <label>Agama</label>
            <input type="text" required class="form-control"  name="religion" placeholder="Agama">
          </div>
          <div class="form-group">
            <label>Kewarganegaraan</label>
            <select class="form-control" name="citizenship" style="width: 100%;">
              <option>WNI</option>
              <option>WNA</option>
            </select>
          </div>
          <div class="form-group">
            <label>Telp</label>
            <input type="number" required class="form-control"  name="telp" placeholder="Telp">
          </div>
          <div class="form-group">
            <label>Alamat</label>
            <textarea class="form-control" name="address" rows="3" placeholder="Alamat"></textarea>
          </div>
          <div class="form-group">
            <label>Status</label>
            <select class="form-control" name="role" style="width: 100%;">
              <option>Admin</option>
              <option>Operator</option>
              <option>User</option>
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
@section('js')
<script type="text/javascript">
  $('#datepicker').datepicker({
    autoclose: true
  })
</script>
@endsection
@endsection
