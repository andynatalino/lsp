@extends('layouts.users.app')
@section('title')
Register
@endsection

@section('content')
<!-- <div class="container">
<div class="row">
<div class="col-md-8 col-md-offset-2">
<div class="panel panel-default">
<div class="panel-heading">Register</div>
<div class="panel-body">
<form class="form-horizontal" method="POST" action="{{ route('register') }}">
{{ csrf_field() }}

<div class="form-group{{ $errors->has('name') ? ' has-error' : '' }}">
<label for="name" class="col-md-4 control-label">Name</label>

<div class="col-md-6">
<input id="name" type="text" class="form-control" name="name" value="{{ old('name') }}" required autofocus>

@if ($errors->has('name'))
<span class="help-block">
<strong>{{ $errors->first('name') }}</strong>
</span>
@endif
</div>
</div>

<div class="form-group{{ $errors->has('email') ? ' has-error' : '' }}">
<label for="email" class="col-md-4 control-label">E-Mail Address</label>

<div class="col-md-6">
<input id="email" type="email" class="form-control" name="email" value="{{ old('email') }}" required>

@if ($errors->has('email'))
<span class="help-block">
<strong>{{ $errors->first('email') }}</strong>
</span>
@endif
</div>
</div>

<div class="form-group{{ $errors->has('password') ? ' has-error' : '' }}">
<label for="password" class="col-md-4 control-label">Password</label>

<div class="col-md-6">
<input id="password" type="password" class="form-control" name="password" required>

@if ($errors->has('password'))
<span class="help-block">
<strong>{{ $errors->first('password') }}</strong>
</span>
@endif
</div>
</div>

<div class="form-group">
<label for="password-confirm" class="col-md-4 control-label">Confirm Password</label>

<div class="col-md-6">
<input id="password-confirm" type="password" class="form-control" name="password_confirmation" required>
</div>
</div>

<div class="form-group">
<div class="col-md-6 col-md-offset-4">
<button type="submit" class="btn btn-primary">
Register
</button>
</div>
</div>
</form>
</div>
</div>
</div>
</div>
</div> -->

<h2>Register</h2>
<p>
  Daftarkan diri Anda dan dapatkan pelatihan sekarang!
  <hr>
  <form id="form_update" method="POST" action="https://it-club.smkn10jakarta.sch.id/mine/update" enctype="multipart/form-data">

    <table style="width:100%">
      <tr>
        <td>No. Identitas (KTP/SIM)</td>
        <td>Nama Lengkap</td>
      </tr>
      <tr>
        <td>
          <div class="input-control text full-size">
            <input type="text" name="no" required>
            {{ csrf_field() }}
          </div>
        </td>
        <td>
          <div class="input-control text full-size">
            <input type="text" name="namabelakang" value="" required>
          </div>
        </td>
      </tr>
      <tr>
        <td>Instansi</td>
        <td>Perpanjang (sertifikat sebelumnya)</td>
      </tr>
      <tr>
        <td>
          <div class="input-control text full-size">
            <input type="text" name="no" required>
          </div>
        </td>
        <td>
          <div class="input-control select full-size">
            <select name="jeniskelamin">
              <option value="Male" >Ya</option>
              <option value="Female" >Tidak</option>
            </select>
          </div>
        </td>
      </tr>
      <tr>
        <td>Jenis Kelamin</td>
        <td>Kewarganegaraan</td>
      </tr>
      <tr>
        <td>
          <div class="input-control select full-size">
            <select name="jeniskelamin">
              <option value="Male" >Laki - Laki</option>
              <option value="Female" >Perempuan</option>
            </select>
          </div>
        </td>
        <td>
          <div class="input-control select full-size">
            <select name="jeniskelamin">
              <option value="Male">WNI</option>
              <option value="Female">WNA</option>
            </select>
          </div>
        </td>
      </tr>
      <tr>
        <td>Pendidikan Terakhir</td>
        <td>No. Telp (HP)</td>
      </tr>
      <tr>
        <td>
          <div class="input-control text full-size">
            <input type="number" max="16" min="5" name="phone" value="" required>
          </div>
        </td>
        <td>
          <div class="input-control text full-size">
            <input type="text" name="phone" value="">
          </div>
        </td>
      </tr>
      <tr>
      <tr>
        <td>Tempat Lahir</td>
        <td>Tanggal Lahir</td>
      </tr>
      <tr>
        <td>
          <div class="input-control text full-size">
            <input type="text" required name="tempatlahir" value="">
          </div>
        </td>
        <td>
          <div class="input-control text full-size" data-role="datepicker" data-format="dd mmmm yyyy">
            <input type="text" name="tanggallahir"  value="24 Aug 2017">
            <button class="button"><span class="mif-calendar"></span></button>
          </div>
        </td>
      </tr>
      <tr>
        <td>Email</td>
        <td>Password</td>
      </tr>
      <tr>
        <td>
          <div class="input-control text full-size">
            <input type="text" required name="tempatlahir" value="">
          </div>
        </td>
        <td>
          <div class="input-control text full-size">
            <input type="password" required name="tempatlahir" value="">
          </div>
          </div>
        </td>
      </tr>
        <td colspan="2">Photo</td>
      </tr>
      <tr>
        <td colspan="2">
          <div class="input-control file full-size" data-role="input">
            <input type="file" name="foto" required>
            <button class="button"><span class="mif-folder"></span></button>
          </div>
        </td>
      </tr>
      <tr>
        <td colspan="2">Alamat</td>
      </tr>
      <tr>
        <td colspan="2">
          <div class="input-control textarea full-size">
            <textarea name="addr"></textarea>
          </div>
        </td>
      </tr>
      <tr>
        <td colspan="2">
         <br><div class="g-recaptcha" data-sitekey="6Lff6C0UAAAAADecOFWMqGGpfXWjsf0CFKRSP0NG"></div>
        </td>
      </tr>
      <tr>
        <td colspan="2"><button class="button place-left" id="submit_update"><span id="span_process" style="display:none;" class="mif-spinner2 mif-ani-spin"></span> <span style="display:none;" id="span_process_1">Processing</span> <span id="span_process_2">Register</span></button></td>
      </tr>
    </table>
  </form>
</p>

@endsection
