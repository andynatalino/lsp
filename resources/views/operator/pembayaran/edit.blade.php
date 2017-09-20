@extends('layouts.op.app-operator')

@section('pageTitle', 'Edit Tipe Pembayaran')

@section('content')
<div class="row">  
  <div class="col-md-12">
    <div class="box box-primary">
      <div class="box-header with-border"></div>
      <form method="POST"action="{{ url('operator/pembayaran/'.$tipe->id) }}" enctype="multipart/form-data" role="form">
        {{ csrf_field() }}
        <div class="box-body">
          <div class="form-group">
            <label>Nama Pembayaran</label>
            <input type="text" required class="form-control" name="tipe" value="{{ $tipe->tipe }}">
          </div>
        </div>
        <div class="box-footer">
          <button type="submit" class="btn btn-primary">Edit Tipe Pembayaran</button>
          <a href="{{ url('operator/pembayaran') }}"><button type="button" class="btn btn-warning">Cancel</button></a>
        </div>
      </form>
    </div>
  </div>
</div>
@endsection
